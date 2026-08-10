# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repo is

A classic (non-block) WordPress theme for a WooCommerce clothing store, named `my-esport-theme`.
**The repository root *is* the theme directory** — there is no `src/`, no build step, no package
manager, no test suite, and no linter. Files are edited and shipped as-is.

## Build / test / deploy

There is nothing to build and nothing to run locally from this repo alone. To see changes you need a
WordPress + WooCommerce install with this repo placed (or symlinked) at
`wp-content/themes/my-esport-theme`, then activate the theme.

Deployment is `.github/workflows/deploy.yaml`: every push to `main` FTP-syncs the whole repo into
`/htdocs/wp-content/themes/my-esport-theme/` on InfinityFree. Consequences:

- Anything committed to `main` is live. There is no staging branch.
- The remote theme folder name is fixed — don't rename the theme or change `Theme Name` in
  `style.css` without updating `server-dir` in the workflow.
- Cache busting is automatic: `functions.php` versions `style.css` and `assets/js/main.js` with
  `filemtime()`, so never hand-bump a version string.

## Architecture

**Everything ships from four surfaces:** `functions.php` (setup + WooCommerce hook surgery),
`front-page.php` (the whole homepage), `style.css` (all CSS, ~1900 lines), and
`assets/js/main.js` (all JS).

### WooCommerce integration is the core of the theme

`functions.php` removes WooCommerce's default content wrappers and re-emits its own:

```php
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
// replaced with: <main class="main-content"><section class="category-section"><div class="container">
```

This is deliberate — it makes shop/archive/single/cart/checkout/account pages inherit the same
section rhythm and container width as the hand-built homepage sections. If a WooCommerce page looks
structurally wrong, check these wrappers before touching CSS. The sidebar is also unhooked; the
theme has no registered sidebars, widget areas, or nav menus.

Template overrides live in `woocommerce/`, mirroring WooCommerce's own template paths. Currently
only `content-product.php` (the loop product card) is overridden; add further overrides by copying
the plugin template into the same relative path here.

### Homepage

`front-page.php` is a fixed sequence of hard-coded sections (`#home` hero, category grid, `#shop`
featured products, `#collection`, `#promotion`, benefits, `#about`, newsletter, contact). It is not
driven by the Customizer or by page content. It queries WooCommerce directly — `get_terms()` on
`product_cat` for the category grid, a `WP_Query` on `post_type => product` rendered through
`wc_get_template_part( 'content', 'product' )` for featured products.

Every WooCommerce-touching block is guarded by `class_exists( 'WooCommerce' )` with a text fallback,
and every direct query is followed by `wp_reset_postdata()`. Preserve both patterns when adding
sections. Header/footer links similarly guard `function_exists('wc_get_page_permalink')` /
`wc_get_cart_url()` before use.

`index.php` is the generic blog fallback and is intentionally plain.

### Navigation and i18n

The header nav in `header.php` is hard-coded `<li>` markup pointing at homepage anchors
(`#collection`, `#about`, `#contact`) plus the WooCommerce shop page — not `wp_nav_menu()`. Anchor
links are smooth-scrolled by `main.js` with an 80px fixed-header offset, so new sections need an `id`
that matches a nav `href`.

All user-facing strings go through `esc_html_e` / `esc_attr_e` / `esc_html__` with text domain
`my-esport-theme`. There is no `languages/` directory yet.

Language switching is optional Polylang: `header.php` calls `pll_the_languages( ['raw' => 1] )`,
**skips the `en` entry** (English is the default and is not offered as a button), and falls back to a
static `VI` button when Polylang is absent.

### Styling

`style.css` holds the WordPress theme header comment (required — do not move it off line 1), the
design tokens, and all component CSS in one file, organised by `/* Section */` comment banners.

Tokens live in `:root`: `--color-*`, `--space-xs … --space-4xl`, `--radius-*`, `--shadow-*`,
`--font-main`. Below them is a "Legacy mapping helpers" block (`--primary-color`, `--bg-secondary`,
`--border-radius`, `--transition`, …) kept alive for older rules. **Prefer the `--color-*` /
`--space-*` tokens in new CSS.** Watch for typos in this area: `index.php` references
`var(--spacing-xl)` and `var(--spacing-sm)`, which do not exist (the tokens are `--space-*`).

Section vertical rhythm is set globally near the top of the file (96px desktop / 72px tablet / 56px
mobile) rather than per-section — adjust spacing there, not on individual sections.

`assets/js/main.js` is dependency-free vanilla JS inside one `DOMContentLoaded` handler: mobile menu
toggle (swaps inline SVG icons), header search reveal, and anchor smooth-scroll. It is enqueued in
the footer with no dependency array, so don't assume jQuery is available.

## Conventions

- PHP escapes at output: `esc_url`, `esc_attr`, `esc_html` on every dynamic value.
- Product/category images use `loading="lazy"` and fall back to `wc_placeholder_img_src()`.
- Icons are inline SVG (Feather-style, `stroke="currentColor"`, `stroke-width="2"`); there is no icon
  font or sprite.
- The hero image is a remote Unsplash URL in `front-page.php`, not a bundled asset.

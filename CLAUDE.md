# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repo is

A classic (non-block) WordPress theme for a WooCommerce clothing store, named `my-esport-theme`.
**The repository root *is* the theme directory** — there is no `src/`, no build step, no package
manager, no test suite, and no linter. Files are edited and shipped as-is.

## Build / test / deploy

There's no build step, but there is a local dev stack: `docker-compose.yml` spins up WordPress
(`php8.3-apache`), MySQL, and phpMyAdmin, mounting this repo into
`wp-content/themes/esportStore` (note: the docker mount uses `esportStore`, not the `Theme Name`
slug `my-esport-theme`). Bring it up with `docker compose up -d`; WordPress is on `localhost:8080`,
phpMyAdmin on `localhost:8081`. The `wordpress/` directory (WP core + plugins, e.g. WooCommerce,
Polylang) is git-ignored and lives only in the local/deployed environment, not in this repo.

There's no WP-CLI installed in the container by default — download `wp-cli.phar` into the container
(`docker exec <container> curl -sSL -o /tmp/wp-cli.phar https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar`)
if you need to inspect/modify site content or options from the shell. For anything permalink-related,
know that pretty permalinks require both the `permalink_structure` option AND a real `RewriteRule`
block in `wordpress/.htaccess` — `wp rewrite flush --hard` from a non-web-server context can silently
fail to write the `.htaccess` rules even though it reports success, so verify the file directly.

Deployment is `.github/workflows/deploy.yaml`: every push to `main` FTP-syncs the whole repo into
`/htdocs/wp-content/themes/my-esport-theme/` on InfinityFree. Consequences:

- Anything committed to `main` is live. There is no staging branch.
- The remote theme folder name is fixed — don't rename the theme or change `Theme Name` in
  `style.css` without updating `server-dir` in the workflow.
- Cache busting is automatic: `functions.php` versions `style.css` and `assets/js/main.js` with
  `filemtime()`, so never hand-bump a version string.

## Architecture

**Core surfaces:** `functions.php` (setup + WooCommerce hook surgery + page routing),
`front-page.php` (the whole homepage), `header.php` / `footer.php`, `page.php` and the
slug-specific `page-about.php` / `page-contact.php` / `page-collections.php` templates,
`style.css` (all CSS, ~2100 lines), and `assets/js/main.js` (all JS).

### WooCommerce integration is the core of the theme

`functions.php` removes WooCommerce's default content wrappers and re-emits its own:

```php
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
// replaced with: <main class="main-content"><section class="category-section"><div class="container">
```

This is deliberate — it makes shop/archive/single/cart/checkout/account pages inherit the same
section rhythm and container width as the hand-built homepage sections. If a WooCommerce page looks
structurally wrong, check these wrappers before touching CSS. The sidebar is also unhooked; there
are no registered widget areas.

Template overrides live in `woocommerce/`, mirroring WooCommerce's own template paths. Currently
only `content-product.php` (the loop product card) is overridden; add further overrides by copying
the plugin template into the same relative path here.

### Static pages route through a `template_include` filter, not just the template hierarchy

`page-about.php`, `page-contact.php`, and `page-collections.php` each declare a `Template Name:`
header, but they are also force-selected by slug via `my_esport_theme_core_page_routing()` in
`functions.php` (hooked on `template_include`), which matches both English and Vietnamese slugs
(`about`/`gioi-thieu`, `contact`/`lien-he`, `collections`/`collection`/`bo-suu-tap`) via `is_page()`.
This means the actual WordPress `page` post with that slug **must exist and be published** — the
template file alone renders nothing. When one of these routes 404s, check (in order): the page
exists in the DB with a matching slug, permalinks are not set to "Plain" (pretty permalink rewrite
rules are required for any of this to resolve), and only then look at the filter/template code.

`index.php` is the generic blog fallback; `page.php` is the generic single-page fallback for any
page that isn't one of the three slugs above.

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

### Navigation and i18n

The header nav in `header.php` uses `wp_nav_menu( ['theme_location' => 'primary', ...] )`, with
`'primary'` registered in `functions.php` via `register_nav_menus()`. No menu is currently assigned
to that location, so it always falls back to `my_esport_theme_default_menu()` (also in
`functions.php`), which hard-codes links to `home_url('/collections/')`, `/about/`, `/contact/`,
plus Home and the WooCommerce shop page. If a real menu is ever created and assigned to `primary` in
wp-admin, this fallback stops being used. `footer.php` has its own separate, independently
hard-coded links to `/contact` and `/about` (not generated from the header's menu/fallback).

All user-facing strings go through `esc_html_e` / `esc_attr_e` / `esc_html__` with text domain
`my-esport-theme`. There is no `languages/` directory yet.

Polylang is an active plugin, but the theme currently has **no language-switcher UI** — nothing in
`header.php` or `footer.php` calls `pll_the_languages()` or similar. Don't assume English is the
default language from the code; that's a Polylang admin/DB setting (`default_lang` option), not
something the theme enforces.

### Styling

`style.css` holds the WordPress theme header comment (required — do not move it off line 1), the
design tokens, and all component CSS in one file, organised by `/* Section */` comment banners.

Tokens live in `:root`: `--color-*`, `--space-xs … --space-4xl`, `--radius-*`, `--shadow-*`,
`--font-main`. Below them is a "Legacy aliases" block (`--primary-color`, `--bg-secondary`,
`--border-radius`, `--transition`, …) kept alive for older rules. **Prefer the `--color-*` /
`--space-*` tokens in new CSS.** Watch for typos in this area: `index.php` references
`var(--spacing-xl)` and `var(--spacing-sm)`, which do not exist (the tokens are `--space-*`) — the
newer `page-*.php` templates use the correct `--space-*` names.

Section vertical rhythm is set globally near the top of the file (96px desktop / 72px tablet / 56px
mobile) rather than per-section — adjust spacing there, not on individual sections.

`assets/js/main.js` is dependency-free vanilla JS inside one `DOMContentLoaded` handler: mobile menu
toggle (swaps inline SVG icons), header search reveal, and anchor smooth-scroll with an 80px
fixed-header offset. It is enqueued in the footer with no dependency array, so don't assume jQuery
is available.

## Conventions

- PHP escapes at output: `esc_url`, `esc_attr`, `esc_html` on every dynamic value.
- Product/category images use `loading="lazy"` and fall back to `wc_placeholder_img_src()`.
- Icons are inline SVG (Feather-style, `stroke="currentColor"`, `stroke-width="2"`); there is no icon
  font or sprite.
- The hero image is a remote Unsplash URL in `front-page.php`, not a bundled asset.

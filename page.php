<?php
/**
 * The template for displaying all single pages
 *
 * @package my-esport-theme
 */

get_header();
?>

<main id="primary" class="site-main container" style="padding: var(--space-xl) var(--space-sm); min-height: 50vh;">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header" style="margin-bottom: var(--space-xl);">
                <?php the_title( '<h1 class="section-heading entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                the_content();
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
        <?php
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->

<?php
get_footer();

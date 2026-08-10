<?php
/**
 * The main template file
 */

get_header();
?>

<main id="primary" class="site-main container" style="padding: var(--spacing-xl) var(--spacing-sm); min-height: 50vh;">
    <?php
    if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) :
            ?>
            <header>
                <h1 class="section-heading page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
            <?php
        endif;

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            
            echo '<article id="post-' . get_the_ID() . '" ' . get_post_class() . '>';
            if ( is_singular() ) {
                the_title( '<h1 class="section-heading entry-title">', '</h1>' );
            } else {
                the_title( '<h2 class="section-heading entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }
            echo '<div class="entry-content">';
            the_content();
            echo '</div></article>';

        endwhile;

        the_posts_navigation();

    else :
        echo '<p>' . esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'my-esport-theme' ) . '</p>';
    endif;
    ?>
</main><!-- #main -->

<?php
get_footer();

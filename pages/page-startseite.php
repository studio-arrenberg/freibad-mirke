<?php

/**
 * 
 * Template Name: Startseite
 * Template Post Type: page
 * 
 */

get_header();

?>

<main class="" role="main" data-track-content>
    
<div class="entry-content">

        <section class="">
 
        <?php if( '' !== get_post()->post_content ) { ?>

            <div class="gutenberg-content">
                <?php
                    // Gutenberg
                    if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                        the_excerpt();
                    } else {
                        the_content( __( 'Continue reading', 'twentytwenty' ) );
                    }
                ?>
            </div>
            
        <?php } ?>
    </section>

</div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>
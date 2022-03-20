<?php

/**
 *
 * Template Name: Verein
 * Template Post Type: page
 *
 */

get_header(); ?>

<!-- <main class="max-w-screen-lg mx-auto my-12 py-48" role="main" data-track-content> -->
    
<div class="">

 
        <?php if ('' !== get_post()->post_content) { ?>

            <div >
                <?php
                if (
                  is_search() ||
                  (!is_singular() &&
                    'summary' === get_theme_mod('blog_content', 'full'))
                ) {
                  the_excerpt();
                } else {
                  the_content(__('Continue reading', 'twentytwenty'));
                } ?>
            </div>
            
        <?php } ?>
        

<?php

/**
 * Alle aktuellen Nachrichten im Freibad Mirke
 */

?>


</div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>



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
        <div class="veranstaltungen">
        <?php 
        
            /**
 * Setup query to show the ‘services’ post type with ‘8’ posts.
 * Output the title with an excerpt.
 */
     $args = array(  
         'post_type' => 'event',
         'post_status' => 'publish',
         'posts_per_page' => 1 , 
         'orderby' => 'date' , 
         'order' => 'ASC', 
     );

     $loop = new WP_Query( $args ); 
        
     while ( $loop->have_posts() ) : $loop->the_post(); ?>
     <h1><?php the_field("title"); ?></h1>
     <p><?php the_field("date"); ?></p>
     
     <p><?php the_field("text"); ?></p>
     
     <?php
     
         
         the_excerpt(); 
     endwhile;

     wp_reset_postdata(); 

     ?>

</div>
    </section>

</div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>



<?php

/**
 *
 * Template Name: Veranstaltungen
 * Template Post Type: page
 *
 */

get_header(); ?>

<!-- <main class="max-w-screen-lg mx-auto my-12 py-48" role="main" data-track-content>         -->
  <?php if ('' !== get_post()->post_content) { ?>
    <div class="gutenberg-content">
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
    
  <?php } 

  /**
  * Alle aktuellen Veranstaltungen im Freibad Mirke
  */

  ?>
    <div id="veranstaltungen" class=" mt-24 mx-auto container max-w-screen-lg ">
              <h2 class="text-3xl mt-60 text-secondary font-bold mb-16">Kommende Veranstaltungen im Freibad Mirke</h2>
                <?php
                /**
                 * Alle aktuellen Veranstaltungen im Freibad Mirke
                 */

                $args = [
                'post_type' => 'event',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC',
                ];

                $loop = new WP_Query($args);

                while ($loop->have_posts()):
                $loop->the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class( ' block mb-12' ); ?>>
                          <a class="flex transition-opacity opacity-80 hover:opacity-100 hover:bg-white" href="<?php echo  esc_url( get_permalink())?>"> 
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                              <div class="w-2/5">
                                  <?php the_post_thumbnail('large'); ?>
                              </div>
                            <?php endif; ?>

                            <div class="w-3/5 pl-8 pt-6">
                              <p class="text-secondary text-lg font-light leading-4">Veranstaltung am <?php the_date(); ?></p>

                                <h2 class="text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight  mb-4">
                                  <?php the_title(); ?>
                                </h2>

                                <div class="font-light text-base leading-6 mb-8 ">
                                  <?php the_excerpt(); ?>
                                </div>
                                <button class="block hover:text-primary font-light  text-base" href="<?php // echo get_permalink(); ?>"> Zur Veranstaltung ></button>        


                            </div>
                          </a>
                      </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>



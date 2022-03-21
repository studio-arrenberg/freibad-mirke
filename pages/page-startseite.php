<?php

/**
 *
 * Template Name: Startseite
 *
 */

get_header(); 
?>




        <?php if ('' !== get_post()->post_content) { ?>

            <div class="">
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
       
            <div id="veranstaltungen" class=" mt-24 mx-auto container max-w-screen-lg ">
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
                if($loop->have_posts()){?>
            <h2 class="text-3xl mt-8 mb-6 md:mt-60  md:mb-16  font-bold  text-secondary ">Kommende Veranstaltungen im Freibad Mirke</h2>
                <?php
                }

                while ($loop->have_posts()):
                $loop->the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class( ' block mb-12' ); ?>>
                          <a class="flex flex-wrap transition-opacity opacity-80 hover:opacity-100 hover:bg-white" href="<?php echo  esc_url( get_permalink())?>"> 
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                              <div class="w-full md:w-2/5">
                                  <?php the_post_thumbnail('large'); ?>
                              </div>
                            <?php endif; ?>

                            <div class="w-full p-6 md:w-3/5 md:pl-8 md:pt-6">
                              <p class="text-secondary text-lg font-light leading-4">Veranstaltung am <?php the_date(); ?></p>

                                <h2 class="text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight  mb-4">
                                  <?php the_title(); ?>
                                </h2>

                                <div class="font-light text-base leading-6 mb-8 md:block ">
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
            
        

            <!-- Alle aktuellen Nachrichten im Freibad Mirke -->
            <div class="nachrichten mt-24 mx-auto container max-w-screen-lg ">

                <h2 class="text-3xl mt-8 mb-6 md:mt-60  md:mb-16 font-bold text-primary">Aktuelles aus dem Freibad</h2>
                    <?php
                        $args = [
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        ];

                        $loop = new WP_Query($args);
                        
                        while ($loop->have_posts()):
                        $loop->the_post(); 
                    ?>
                      <div id="post-<?php the_ID(); ?>" <?php post_class( ' block mb-12' ); ?>>
                          <a class="flex flex-wrap" href="<?php echo  esc_url( get_permalink())?>"> 
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                              <div class="w-3/5 md:w-2/5">
                                  <?php the_post_thumbnail('large'); ?>
                              </div>
                            <?php endif; ?>

                            <div class="w-full py-6 md:w-3/5 md:pl-8 md:pt-6">
                              <div class="mb-4">
                                <p class=" text-gray-700 text-sm font-light "><?php echo get_the_author(); ?> am <?php the_date(); ?></p>
                                <h2 class="text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight mb-1">
                                  <?php the_title(); ?>
                                </h2>
                              </div>

                              <div class="font-light leading-6">
                                <?php the_excerpt(); ?>
                              </div>
                              <button class="mt:32 block hover:text-primary font-light" href="<?php // echo get_permalink(); ?>"> Weiterlesen ></button>        

                              <!-- <a class="border border-primary text-primary px-5 py-3 font-semibold " href="<?php echo get_permalink(); ?>">Weiterlesen</a>         -->

                            </div>
                          </a>
                      </div>

                    <?php
                        endwhile;
                        wp_reset_postdata();
                    ?>
                    
            </div>
        </div>
     </div>
  </section>
</div>
                
<?php get_footer(); ?>



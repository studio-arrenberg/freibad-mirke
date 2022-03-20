<?php

/**
 *
 * Template Name: Startseite
 *
 */

get_header(); 
?>

<main class="max-w-screen-lg mx-auto my-12 py-48" role="main" data-track-content>
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
            
       <?php } ?>
       
            
            <div class="veranstaltungen">
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
                    <h1 class="text-3xl mt-60 text-secondary font-bold">Kommende Veranstaltungen im Freibad Mirke</h1>
                <?php
                }

                while ($loop->have_posts()):
                $loop->the_post(); ?>
                    <div class="events">
                        <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl  lg:rounded-lg mt-28">
                            <div class="lg:w-1/2">
                                <div class="h-64 bg-cover lg:h-80" style="background-image:url('<?php the_post_thumbnail_url(); ?>')"></div>
                            </div>
                            <div class="px-6 max-w-xl lg:max-w-5xl lg:w-1/2">
                                <h2 class="text-3xl text-secondary font-bold"><?php the_title(); ?></h2>
                                <p class="text-small"><?php echo get_the_author(); ?> am <?php echo get_the_date(); ?></p>
                                <p class="mt-4 text-seconday"><?php the_excerpt(); ?></p>
                                <div class="mt-8">
                                    <a class="border border-secondary text-secondary px-5 py-3 font-semibold " href="<?php echo get_permalink(); ?>">Weiterlesen</a>        
                                </div>
                            </div>
                        </div>
                    </div>    
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
            
        

            <!-- Alle aktuellen Nachrichten im Freibad Mirke -->
            <div class="nachrichten mt-24">
                <h1 class="text-3xl text-primary font-bold">Aktuelles aus dem Freibad</h1>
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
                    <div class="nachrichten">
                        <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl  lg:rounded-lg mt-28 mb-60">
                            <div class="lg:w-1/2">
                                <div class="h-64 bg-cover lg:h-80" style="background-image:url('<?php the_post_thumbnail_url(); ?>')"></div>
                            </div>
                            <div class="px-6 max-w-xl lg:max-w-5xl lg:w-1/2">
                                <h2 class="text-3xl text-primary font-bold"><?php the_title(); ?></h2>
                                <p class="text-small"><?php echo get_the_author(); ?> am <?php echo get_the_date(); ?></p>
                                <p class="mt-4 text-seconday"><?php the_excerpt(); ?></p>
                                <div class="mt-8">
                                    <a class="border border-primary text-primary px-5 py-3 font-semibold " href="<?php echo get_permalink(); ?>">Weiterlesen</a>        
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>



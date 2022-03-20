<?php

/**
 *
 * Template Name: Startseite
 *
 */

get_header(); 
?>

<main class="container max-w-screen-lg mx-auto my-12 py-48" role="main" data-track-content>
    
<div class="">

        <section class="">
 
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
        <h1>Kommende Veranstaltungen im Freibad Mirke</h1>
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

while ($loop->have_posts()):
  $loop->the_post(); ?>
     <div class="events">
        <?php the_post_thumbnail(); ?>
        <h1><?php the_title(); ?></h1>
        <p><?php echo get_the_author(); ?> am <?php the_date(); ?></p>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php echo get_permalink(); ?>"><button>Weiterlesen</button></a>
     
     <?php
endwhile;

/**
 * Alle aktuellen Nachrichten im Freibad Mirke
 */
wp_reset_postdata();
?>
     </div>
     <h1>Aktuelles aus dem Freibad</h1>
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
              $loop->the_post(); ?>
     <article>
        <h1><?php the_post_thumbnail(); ?></h1>
        <h1><?php echo get_the_title(); ?></h1>
        <p><?php echo get_the_author(); ?> am <?php the_date(); ?></p>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php echo get_permalink(); ?>"><button>Weiterlesen</button></a>
     </article>
     <?php
            endwhile;

            wp_reset_postdata();
            ?>

</div>
    </section>

</div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>



<?php

/**
 *
 * Template Name: Verein
 * Template Post Type: page
 *
 */

get_header(); ?>

<main class="" role="main" data-track-content>
    
<div class="entry-content">

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
  'post_type' => 'members',
  'post_status' => 'publish',
  'posts_per_page' => 4,
  'orderby' => 'date',
  'order' => 'DESC',
];

$loop = new WP_Query($args);

while ($loop->have_posts()):
  $loop->the_post(); ?>
     <div class="members">
        <?php
        $image = get_field('image');
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        <h1><?php echo get_field("vorname")." ".get_field("nachname"); ?></h1>
        <p><?php echo get_field("mail"); ?></p>
        <p><?php echo get_field("phone"); ?></p>
        <p><?php echo get_field("lieblingsort"); ?></p>
        <hr>
     
     <?php
endwhile;
wp_reset_postdata();
/**
 * Alle aktuellen Nachrichten im Freibad Mirke
 */

?>
</div>
    </section>

</div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>



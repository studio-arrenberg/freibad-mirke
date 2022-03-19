<?php

/**
 * Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Load values and assign defaults.
$text = get_field('text') ?: 'Hier steht der Titel.';

?>

<?php if( have_rows('mitgliederauswahl') ): ?>
 
 <ul>

 <?php while( have_rows('mitgliederauswahl') ): the_row(); ?>

     <li>Benutzerauswahl<?php get_sub_field('benutzerauswahl'); ?></li>
     
     <?php 
     
     
     
     // do something with $sub_field_3
     
     ?>
     
 <?php endwhile; ?>

 </ul>

<?php endif; ?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="blockquote">
        <h1><?php echo $text; ?></h1>
        <?php if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </blockquote>
</div>
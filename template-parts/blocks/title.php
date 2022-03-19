<?php

/**
 * Headline Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title') ?: 'Hier steht der Titel.';
$text = get_field('text') ?: 'Hier steht der Text.';
$subheadline = get_field('subheadline') ?: 'Hier steht die Subheadline.';
$buttontext = get_field('buttontext') ?: 'Linktext';
$buttonlink = get_field('buttonlink') ?: 'https://freibad-mirke.de';

?>
<div id="<?php echo esc_attr($id); ?>" class=" container max-w-screen-lg mx-auto my-12 py-48  <?php echo esc_attr($className); ?>">
    <h3 class="font-bold text-lg text-secondary uppercase"><?php echo $subheadline; ?></h3>
    <h1 class="text-3xl lg:text-7xl tracking-tight font-extrabold mb-8 text-primary"><?php echo $title; ?></h1>
    <p class="max-w-screen-md text-lg lg:text-xl font-light md:ml-16 mb-4"><?php echo $text; ?></p>
    
    <a class="text-lg leading-6 font-semibold  hover:underline hover:underline-offset-3 hover:decoration-wavy transition-colors duration-200  md:ml-16" href="<?php echo $buttonlink; ?>"><?php echo $buttontext; ?> ></a>
</div>



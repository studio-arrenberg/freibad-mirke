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
$title = get_field('title') ?: 'Hier steht dein Titel.';
$text = get_field('text') ?: 'Hier steht dein Text.';
$subheadline = get_field('subheadline') ?: 'Hier steht deine subheadline.';
$buttontext = get_field('buttontext') ?: 'Linktext';
$buttonlink = get_field('buttonlink') ?: 'https://freibad-mirke.de';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="blockquote">
        <h3><?php echo $subheadline; ?></h3>
        <h1><span class=""><?php echo $title; ?></span></h1>
        <p><span class=""><?php echo $text; ?></span></p>
        <button><a class="button" href="<?php echo $buttonlink; ?>"><?php echo $buttontext; ?><span class=""></span></a></button>
    </blockquote>
</div>
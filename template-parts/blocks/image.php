<?php

/**
 * Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = '-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('text') ?: 'Hier steht die Beschreibung.';
$headline = get_field('headline') ?: 'Hier steht der Titel.';
$image = get_field('image') ;


?>
        

<?php //if( !empty( $image ) ): ?>
        <!-- <img src="<?php //echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> -->
<?php // endif; ?>
	
<div style="background-image: url('<?php echo esc_url($image['url']); ?>')" id="<?php echo esc_attr($id); ?>" class=" relative  py-8 bg-url bg-cover bg-center <?php echo esc_attr($className); ?>" >
    <div class="container mx-auto">
        <div class="bg-white max-w-lg p-6  min-h-[500px]">
            <h3 class="text-primary font-bold text-lg mb-6">
                <?php echo $headline; ?>
            </h3>
            <p><?php echo $text; ?></p>
        </div>
    </div>
</div>
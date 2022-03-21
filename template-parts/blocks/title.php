<?php

/**
 * Headline Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Load values and assign defaults.
$title = get_field('title') ?: 'Hier steht der Titel.';
$text = get_field('text') ?: 'Hier steht der Text.';
$subheadline = get_field('subheadline') ?: 'Hier steht die Subheadline.';
$buttontext = get_field('buttontext') ?: 'Linktext';
$buttonlink = get_field('buttonlink') ?: 'https://freibad-mirke.de';
?>


<div id="title-block" class=" my-32 mx-auto container max-w-screen-lg  ">
    <h3 class="font-bold text-base md:text-lg text-secondary uppercase"><?php echo $subheadline; ?></h3>
    <h1 class="text-4xl lg:text-7xl tracking-tight font-extrabold mb-8 text-primary"><?php echo $title; ?></h1>
    <p class="max-w-screen-md text-lg lg:text-xl font-light md:ml-16 mb-4"><?php echo $text; ?></p>
    <a class="text-lg leading-6 font-semibold  hover:underline hover:underline-offset-3 hover:decoration-wavy transition-colors duration-200  md:ml-16" href="<?php echo $buttonlink; ?>">
        <?php echo $buttontext; ?> >
    </a>
</div>



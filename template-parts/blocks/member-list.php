<?php

/**
 * Member Block Template.
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
 <div class="member">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <?php while( have_rows('mitgliederauswahl') ): the_row(); 
            $featured_post = get_sub_field('benutzerauswahl') ;
            $vorname = get_field( 'vorname', $featured_post->ID ) ?: "Vorname";
            $nachname = get_field( 'nachname', $featured_post->ID ) ?: "Vorname";
            $phone = get_field( 'phone', $featured_post->ID ) ?: "Telefonnummer";
            $mail = get_field( 'mail', $featured_post->ID ) ?: "E-Mail";
            $image = get_field( 'image', $featured_post->ID );
            $lieblingsort = get_field( 'lieblingsort', $featured_post->ID );
        ?>
        <div class="w-full h-60 bg-white overflow-hidden flex flex-col md:flex-row">
            <div class="w-full md:w-2/5 h-40">
                <?php if( !empty( $image ) ): ?>
                    <img class="object-center object-cover w-full h-full" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>        
            </div>
            <div class="w-full md:w-3/5 text-left p-6 md:p-4 space-y-2">
                <p class="text-xl text-primary font-bold"><?php echo $vorname." ".$nachname; ?></p>
                <h2 class="text-primary">Lieblingsort</h2>
                <p class="text-base leading-relaxed text-primary-dark font-normal"><?php echo $lieblingsort; ?></p>
                <p class="text-base text-primary-dark font-normal">
                    <a href="mailto:<?php echo $mail; ?>" class="text-primary-dark hover:text-gray-600">    
                        <span class="dashicons dashicons-email"> </span> 
                        <?php echo $mail; ?></p>
                    </a>
                </p>
                <p class="text-base text-primary-dark font-normal">
                    <a href="tel:<?php echo $phone; ?>" class="text-primary-dark hover:text-gray-600">    
                        <span class="dashicons dashicons-phone"> </span> 
                        <?php echo $phone; ?></p>
                    </a>
                </p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
 </div>
 

 
 
<?php endif; ?>
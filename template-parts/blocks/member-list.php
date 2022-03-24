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
    <div id="memberlist" class=" container  max-w-screen-lg mx-auto my-32 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php while( have_rows('mitgliederauswahl') ): the_row(); 
            
            $featured_post = get_sub_field('benutzerauswahl');
            // if( !empty($featured_post)){
            //     echo "<script>console.log('Ist nicht leer')</script>";
            // }else{
            //     echo "<script>console.log('Jetzt schon')</script>";
            // };
            $vorname = get_field( 'vorname', $featured_post->ID ) ?: "Vorname";
            $nachname = get_field( 'nachname', $featured_post->ID ) ?: "Vorname";
            $phone = get_field( 'phone', $featured_post->ID ) ?: "Telefonnummer";
            $mail = get_field( 'mail', $featured_post->ID ) ?: "E-Mail";
            // $image = get_field( 'image', $featured_post->ID );
            $lieblingsort = get_field( 'lieblingsort', $featured_post->ID );

            $image = get_field('image', $featured_post->ID );
            if( $image ):
                // Image variables.
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];
            
                // Thumbnail size attributes.
                $size = 'thumbnail';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
            
                // Begin caption wrap.
                if( $caption ): ?>
                    <div class="wp-caption">
                <?php endif; ?>
            
               
                <?php 
                // End caption wrap.
                if( $caption ): ?>
                    <p class="wp-caption-text"><?php echo esc_html($caption); ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>


        <div class="w-full h-auto flex flex-col ">
            <div class="w-full  h-auto">
                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />

            </div>
            <div class="w-full  py-4 space-y-2">
                <p class="text-lg text-primary font-bold"><?php echo $vorname." ".$nachname; ?></p>
                <!-- <h2 class="text-primary">Lieblingsort</h2> -->
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
 

 
 
<?php endif; ?>
<?php /**
 * Add ACF Block Titel und Text
 * @return array
 */

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'title',
            'title'             => __('Titel und Text'),
            'description'       => __('Titel und Beschreibungstext für die Seite.'),
            'render_template'   => 'template-parts/blocks/title.php',
            'category'          => 'formatting',
            'icon'              => 'editor-underline',
            'keywords'          => array( 'Titel', 'quote' ),
        ));
    }
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'Bild',
            'title'             => __('Bild mit Beschreibung'),
            'description'       => __('Bild mit Beschreibungstext'),
            'render_template'   => 'template-parts/blocks/image.php',
            'category'          => 'formatting',
            'icon'              => 'cover-image            ',
            'keywords'          => array( 'Bild', 'quote' ),
        ));
    }
}

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_6234a26488ab8',
        'title' => 'Überschrift',
        'fields' => array(
            array(
                'key' => 'field_6234a27274c88',
                'label' => 'Titel',
                'name' => 'title',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6234ac00e17df',
                'label' => 'Subheadline',
                'name' => 'subheadline',
                'type' => 'text',
                'instructions' => 'Hier kannst du die kleine Überschrift über der eigentlichen Überschrift festlegen.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6234a7409c2b5',
                'label' => 'Text',
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => 'Beschreibungstext für die Seite.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 4,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_6234bf2bb0ebf',
                'label' => 'Buttontext',
                'name' => 'buttontext',
                'type' => 'text',
                'instructions' => 'Hier kannst du den Text für den Link Button festlegen.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6234bf99b0ec0',
                'label' => 'Buttonlink',
                'name' => 'buttonlink',
                'type' => 'url',
                'instructions' => 'Hier kannst du den Link für den Button eintragen.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/title',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;



/**
* Add ACF Block Überschrift und Bild
* @return array
*/







?>
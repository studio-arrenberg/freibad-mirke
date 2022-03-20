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
    };
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
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'Mitgliederauswahl',
            'title'             => __('Mitgliederauswahl mit Beschreibung'),
            'description'       => __('Hier kannst du die Mitglieder auswählen, die angezeigt werden sollen.'),
            'render_template'   => 'template-parts/blocks/member-list.php',
            'category'          => 'formatting',
            'icon'              => 'businessperson',
            'keywords'          => array( 'Mitglieder', 'quote' ),
        ));
    }
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'Vereinsmitglied Kontakt',
            'title'             => __('Vereinsmitglied mit Kontakt'),
            'description'       => __('Hier kannst du ein Vereinsmitglied auswählen, um die Kontaktdaten einzublenden.'),
            'render_template'   => 'template-parts/blocks/member.php',
            'category'          => 'formatting',
            'icon'              => 'admin-users',
            'keywords'          => array( 'Mitglieder', 'quote' ),
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
                'key' => 'field_62372c8f71a52',
                'label' => 'Buttonlink',
                'name' => 'buttonlink',
                'type' => 'page_link',
                'instructions' => 'Hier kannst du den Link auswählen, der in dem Block angezeigt wird.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'allow_archives' => 0,
                'multiple' => 0,
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

        acf_add_local_field_group(array(
            'key' => 'group_62359b1c4cfab',
            'title' => 'Bild und Text',
            'fields' => array(
                array(
                    'key' => 'field_6236e759a05a0',
                    'label' => 'Überschrift',
                    'name' => 'headline',
                    'type' => 'text',
                    'instructions' => 'Hier kannst du die Überschrift für deinen Block eintragen.',
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
                    'key' => 'field_62359b2baa2f3',
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'instructions' => 'Hier kommt der Beschreibungstext für dein Bild hin.',
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
                    'key' => 'field_62359b4aaa2f4',
                    'label' => 'Bild',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => 'Hier kannst du das Bild für deinen Block hochladen.',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/bild',
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
        acf_add_local_field_group(array(
            'key' => 'group_6236621b6119c',
            'title' => 'Mitglied Kontaktdaten',
            'fields' => array(
                array(
                    'key' => 'field_6236629730b23',
                    'label' => 'Benutzer',
                    'name' => 'user',
                    'type' => 'post_object',
                    'instructions' => 'Wähle das Vereinsmitglied aus, dessen Kontaktdaten angezeigt werden sollen.',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => array(
                        0 => 'members',
                    ),
                    'taxonomy' => '',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'return_format' => 'object',
                    'ui' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/vereinsmitglied-kontakt',
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
        
        acf_add_local_field_group(array(
            'key' => 'group_62364b3d145be',
            'title' => 'Mitgliederauswahl',
            'fields' => array(
                array(
                    'key' => 'field_62364d9a73693',
                    'label' => 'Mitgliederauswahl',
                    'name' => 'mitgliederauswahl',
                    'type' => 'repeater',
                    'instructions' => 'Hier kannst du die Vereinsmitglieder angeben, die angezeigt werden sollen.',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => 'field_62364e35256f9',
                    'min' => 0,
                    'max' => 8,
                    'layout' => 'block',
                    'button_label' => 'Mitglied hinzufügen',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_62364e35256f9',
                            'label' => 'Benutzerauswahl',
                            'name' => 'benutzerauswahl',
                            'type' => 'post_object',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'post_type' => array(
                                0 => 'members',
                            ),
                            'taxonomy' => '',
                            'allow_null' => 0,
                            'multiple' => 0,
                            'return_format' => 'object',
                            'ui' => 1,
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/mitgliederauswahl',
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
<?php 
/**
 * 
 *  Veranstaltungen Setup
 * 
 *  1. ACF
 *  2. CPT
 * 
 */

/**
 *  --------------------------------------------------------
 *  1. Veranstaltungen ACF
 *  --------------------------------------------------------
 */
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_62311f5b7c4cb',
        'title' => 'Veranstaltungen',
        'fields' => array(
            array(
                'key' => 'field_62311f7b96d9c',
                'label' => 'Datum',
                'name' => 'date',
                'type' => 'date_time_picker',
                'instructions' => 'Das genaue Datum und die Uhrzeit für die Veranstaltung.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd.m.Y H:i',
                'return_format' => 'd.m.Y H:i',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_6231204396d9d',
                'label' => 'Titel',
                'name' => 'title',
                'type' => 'text',
                'instructions' => 'Der Titel für die Veranstaltung.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'Das wird die beste Veranstaltung in Wuppertal!',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6231209c96d9e',
                'label' => 'Beschreibung',
                'name' => 'text',
                'type' => 'textarea',
                'instructions' => 'Die Beschreibung für die Veranstaltung.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'event',
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
 *  --------------------------------------------------------
 *  2. Veranstaltungen Post Type
 *  --------------------------------------------------------
 */

function cptui_register_my_cpts_event() {

	/**
	 * Post Type: Veranstaltungen.
	 */

	$labels = [
		"name" => __( "Veranstaltungen", "freibadmirke" ),
		"singular_name" => __( "Veranstaltung", "freibadmirke" ),
		"add_new_item" => __( "Erstelle eine neue Veranstaltung", "freibadmirke" ),
	];

	$args = [
		"label" => __( "Veranstaltungen", "freibadmirke" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "event", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-calendar-alt",
		"supports" => false,
		"show_in_graphql" => false,
	];

	register_post_type( "event", $args );
}

add_action( 'init', 'cptui_register_my_cpts_event' );


 

 ?>
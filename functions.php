<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Hauptmenü', 'freibadmirke' ),
			'secondary' => __( 'I. Footer', 'freibadmirke' ),
			'third' => __( 'II. Footer', 'freibadmirke' ),

		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );


	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );





/**
 * Call setup files
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
require_once dirname( __FILE__ ) .'/advanced-custom-fields/blocks.php'; # Custom Blocks
require_once dirname( __FILE__ ) .'/advanced-custom-fields/veranstaltungen.php'; # Veranstaltungen ACF und CPT
require_once dirname( __FILE__ ) .'/advanced-custom-fields/mitglieder.php'; # Veranstaltungen ACF und CPT
require_once dirname( __FILE__ ) .'/advanced-custom-fields/pages.php'; # Seiten erstellen


/**
 * Update Post Title from an ACF field value on post save.
 *
 * Triggers on save, edit or update of published posts.
 * Works in "Quick Edit", but not bulk edit.
 */

 function sync_acf_post_title($post_id, $post, $update) {
	if( function_exists('get_field') ) {
		$acf_title = get_field('vorname', $post_id);
		if( !empty( $acf_title )){

			if ( $title ) {
				$title = $acf_title;
			} else {
				$title = get_field('vorname')." ".get_field("nachname");
			}
			
			$content = array(
				'ID' => $post_id,
				'post_title' => $title
			);
			remove_action('save_post', 'sync_acf_post_title'); // prevent a loop
			wp_update_post($content);
		}; 
	};
}
add_action('save_post', 'sync_acf_post_title', 10, 3);



/**
 *
 * Add Menu Items and genereate if not already done
 *
 */

function setup_main_menu() {
	// Check if the menu exists
	$menu_name   = 'Hauptmenü';
	$menu_exists = wp_get_nav_menu_object( $menu_name );
	
	// If it doesn't exist, let's create it.
	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu($menu_name);
	
		// Set up default menu items
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'   =>  __( 'Freibad', 'freibadmirke' ),
			'menu-item-classes' => 'freibad',
			'menu-item-url'     => home_url( '/' ), 
			'menu-item-status'  => 'publish'
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  =>  __( 'Verein', 'freibadmirke' ),
			'menu-item-url'    => home_url( '/verein/' ), 
			'menu-item-status' => 'publish'
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  =>  __( 'Veranstaltungen', 'freibadmirke' ),
			'menu-item-url'    => home_url( '/veranstaltungen/' ), 
			'menu-item-status' => 'publish'
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  =>  __( 'Ziele', 'freibadmirke' ),
			'menu-item-url'    => home_url( '/ziele/' ), 
			'menu-item-status' => 'publish'
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  =>  __( 'Unterstützen', 'freibadmirke' ),
			'menu-item-url'    => home_url( '/unterstuetzen/' ), 
			'menu-item-status' => 'publish'
		) );
		$locations = get_theme_mod('nav_menu_locations');
    	$locations['primary'] = $menu_id;
    	set_theme_mod( 'nav_menu_locations', $locations );
	}
}

function setup_first_footer_menu() {
	// Check if the menu exists
	$menu_name   = 'Wir bauen ein Freibad';
	$menu_exists = wp_get_nav_menu_object( $menu_name );
	
	// If it doesn't exist, let's create it.
	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu($menu_name);
	
		// Set up default menu items
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'   =>  __( 'Projekt', 'freibadmirke' ),
			'menu-item-classes' => 'freibad',
			'menu-item-url'     => home_url( '/' ), 
			'menu-item-status'  => 'publish'
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  =>  __( 'Verein', 'freibadmirke' ),
			'menu-item-url'    => home_url( '/verein/' ), 
			'menu-item-status' => 'publish'
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  =>  __( 'Veranstaltungen', 'freibadmirke' ),
			'menu-item-url'    => home_url( '/veranstaltungen/' ), 
			'menu-item-status' => 'publish'
		) );
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'  =>  __( 'Unterstützen', 'freibadmirke' ),
			'menu-item-url'    => home_url( '/unterstuetzen/' ), 
			'menu-item-status' => 'publish'
		) );
		$locations = get_theme_mod('nav_menu_locations');
    	$locations['secondary'] = $menu_id;
    	set_theme_mod( 'nav_menu_locations', $locations );
	}
}

function setup_second_footer_menu() {
	// Check if the menu exists
	$menu_name   = 'Für Künstler  Agenturen & die Presse';
	$menu_exists = wp_get_nav_menu_object( $menu_name );
	
	// If it doesn't exist, let's create it.
	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu($menu_name);
	
		// Set up default menu items
		wp_update_nav_menu_item( $menu_id, 0, array(
			'menu-item-title'   =>  __( 'Pressebereich', 'freibadmirke' ),
			'menu-item-classes' => 'presse',
			'menu-item-url'     => home_url( '/presse/' ), 
			'menu-item-status'  => 'publish'
		) );
		$locations = get_theme_mod('nav_menu_locations');
    	$locations['third'] = $menu_id;
    	set_theme_mod( 'nav_menu_locations', $locations );
	}
}

add_action( 'after_setup_theme', 'setup_main_menu' , 6);
add_action( 'after_setup_theme', 'setup_first_footer_menu', 6 );
add_action( 'after_setup_theme', 'setup_second_footer_menu', 6 );

/**
 *
 * Assign Templates to pages
 *
 */

function get_custom_post_type_template( $page_template ) {
    global $post;
	$title = get_the_title();	
    $post_states = [];
	$prefix = "Freibad Mirke - ";
    if ($title == "Verein") {
        $post_states[] = $prefix."Verein";
		$page_template = get_stylesheet_directory() . "/pages/page-verein.php";
	}else if ($title == "Veranstaltungen"){
        $post_states[] = $prefix.'Veranstaltungen';
		$page_template = get_stylesheet_directory() . "/pages/page-veranstaltungen.php";
    }else if ($title == "Projekt"){
        $post_states[] = $prefix.'Freibad';
		$page_template = get_stylesheet_directory() . "/pages/page-startseite.php";
    }else if ($title == "Unterstützen"){
        $post_states[] = $prefix.'Unterstützen';
		// $page_template = get_stylesheet_directory() . "/pages/page-startseite.php";
    }
	else if ($title == "Ziele"){
        $post_states[] = $prefix.'Ziele';
		$page_template = get_stylesheet_directory() . "/pages/page-startseite.php";
    }

    if (doing_filter( 'page_template') && !empty($page_template)) {
		return $page_template;
	}
	else if (doing_filter( 'display_post_states') && !empty($post_states)) {
		return $post_states;
	}
}
add_filter( 'page_template', 'get_custom_post_type_template', 10, 1 );
add_filter( 'display_post_states', 'get_custom_post_type_template', 1, 1);

/**
 *
 * Create Pages After Setup
 *
 */

add_action( 'after_setup_theme', 'create_pages', 2 );
function create_pages() {

    $pages = array(
        0 => array('title' => __('Projekt',"freibadmirke"), 'slug' => 'startseite'),
        1 => array('title' => __('Veranstaltungen', "freibadmirke"), 'slug' => 'veranstaltungen'),
        2 => array('title' => __('Verein',"freibadmirke"), 'slug' => 'verein'),
        3 => array('title' => __('Unterstützen',"freibadmirke"), 'slug' => 'unterstuetzen'),
        4 => array('title' => __('Ziele',"freibadmirke"), 'slug' => 'ziele'),
    );

    for ($i = 0; $i < count($pages); $i++) {

        $my_post = [];
        $my_post = array(
            'post_title'    => wp_strip_all_tags($pages[$i]['title']),
            'post_status'   => 'publish',
            'post_content' => '',
            'post_author'   => 1,
            'post_type'		=> 'page',
        );

        if ( ! function_exists( 'post_exists' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/post.php' );
        }
        if(post_exists($pages[$i]['title'],'','','page') === 0){
            # create post
            wp_insert_post( $my_post, true );
        }
    }

}


/**
 *
 * Set Home Page Settings
 *
 */
$about = get_page_by_title( 'Projekt' );
update_option( 'page_on_front', $about->ID );
update_option( 'show_on_front', 'page' );

/**
 *
 * Shorten Excerpt Length for posts
 *
 */

function my_excerpt_length($length){
	return 30;
	}
add_filter("excerpt_length", "my_excerpt_length");



// custom image sizes/ratios 
// https://developer.wordpress.org/reference/functions/add_image_size/
// with array( 'center', 'center' ) = (cropped to fit)

// square (1:1)

add_image_size( 'square_s', 400, 400, array( 'center', 'center' ));
add_image_size( 'fullwidth', 1920, 1080, array( 'center', 'center' ));

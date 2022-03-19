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




function card_list($args, $element = 'card') {

	$query2 = new WP_Query($args);
	// The Loop
	while ( $query2->have_posts() ) {
		$query2->the_post();
		get_template_part('elements/'.$element, get_post_type());
	}
	// Restore original Post Data
	wp_reset_postdata();

}



/**
 * Count Query
 *
 * @since Quartiersplattform 1.7
 * 
 * @return string
 */
function count_query($query, $amount = 1, $number = false) {

	if (!$query) {
		return false;
	}

	$my_query = new WP_Query($query);

	if ($number) {
		return $my_query->post_count;
	}

	if ($my_query->post_count >= $amount) {
		return true;
	}
	else {
		return false;
	}
    
}
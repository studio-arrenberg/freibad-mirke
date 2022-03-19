<?php 

/**
 *  --------------------------------------------------------
 *  1. Menu
 *  --------------------------------------------------------
 */

function menu_setup() {

    $menuname = 'Freibad';
    // get menu id
    $menu_array = wp_get_nav_menus();
    for ($i=0; $i < count($menu_array) ; $i++) { 

        if ($menu_array[$i]->slug == $menuname) {
            $menu_id = $menu_array[$i]->term_id;
        }
        else {
            $menu_id = false;
        }
    }

    
    // defined menus
    $defined_menu_item = array(
        0 => array ('title' => __('Freibad','quartiersplattform'), 'page_name' => 'Freibad', 'ID' => '100300', 'attr' => 'Freibad'),
        1 => array ('title' => __('Verein','quartiersplattform'), 'page_name' => 'Verein', 'ID' => '100300', 'attr' => 'Verein'),
        2 => array ('title' => __('Veranstaltungen','quartiersplattform'), 'page_name' => 'Veranstaltungen', 'ID' => '100300', 'attr' => 'Veranstaltungen'),
        3 => array ('title' => __('Ziele','quartiersplattform'), 'page_name' => 'Ziele', 'ID' => '100300', 'attr' => 'Ziele'),
        4 => array ('title' => __('Unterstützen','quartiersplattform'), 'page_name' => 'Unterstützen', 'ID' => '100300', 'attr' => 'Unterstützen'),
        
    );
    // create menu if not exists 
    if (!$menu_id) {
        $menu_id = wp_create_nav_menu($menuname);        
    }

    // get menu items
    $menu_items = wp_get_nav_menu_items($menu_id);
    // print_r($menu_items);

    // iterate through given menu items
    for ($i=0; $i < count($defined_menu_item); $i++) { 
        $id = '0';
        // iterate and check existing menu items
        for ($a=0; $a < count($menu_items); $a++) { 
            if ($defined_menu_item[$i]['attr'] == $menu_items[$a]->attr_title) {
                $id = $menu_items[$a]->ID;
            }
        }
        // update or create menu item
        wp_update_nav_menu_item($menu_id, $id, array(
            'menu-item-title' =>  __($defined_menu_item[$i]['title']),
            'menu-item-object-id' => get_page_by_title( $defined_menu_item[$i]['page_name'], OBJECT, 'page' )->ID,
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-db-id' => $defined_menu_item[$i]['ID'],
            'menu-item-attr-title' => $defined_menu_item[$i]['attr'],
            'menu-item-status' => 'publish')
        );

    }

    // set menu location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );


    if (count($defined_menu_item) < count($menu_items)) {
        wp_delete_nav_menu($menuname);
    }

}


/**
 * Assign templates to pages
 *
 * @since Quartiersplattform 1.0
 * @param array $page_template 
 * @param array $post_states
 * @return string
 */
function custom_page_template( $page_template, $post_states ) {
	global $post;

	$post_states = [];
	$prefix = "Freibad ";

	// !!! use post_name (slug) not post_title 

	if ($post->post_title == "Startseite") {
		$post_states[] = $prefix.'Startseite';
		$page_template= get_stylesheet_directory() . '/pages/page-startseite.php';
	}
	else if ($post->post_title == "Verein") {
		$post_states[] = $prefix.'Verein';
		$page_template= get_stylesheet_directory() . '/pages/page-verein.php';
	}
    else if ($post->post_title == "Veranstaltungen") {
		$post_states[] = $prefix.'Veranstaltungen';
		$page_template= get_stylesheet_directory() . '/pages/page-veranstaltungen.php';
	}
	
	
	if (doing_filter( 'page_template') && !empty($page_template)) {
		return $page_template;
	}
	else if (doing_filter( 'display_post_states') && !empty($post_states)) {
		return $post_states;
	}
}
add_filter( 'page_template', 'custom_page_template', 10, 2 );
add_filter( 'display_post_states', 'custom_page_template', 1, 2);



/**
 *  --------------------------------------------------------
 *  4. Set Home Page
 *  --------------------------------------------------------
 */


function themename_after_setup_theme() {
  
    $site_type = get_option('show_on_front');
    $home = get_page_by_title( 'Freibad', OBJECT, 'page' );
}
add_action( 'after_setup_theme', 'themename_after_setup_theme' );

/**
 *  --------------------------------------------------------
 *  5. Create Pages
 *  --------------------------------------------------------
 */
add_action( 'after_setup_theme', 'create_pages' );
function create_pages() {

    $pages = array(
        0 => array('title' => __('Freibad',"freibadmirke"), 'slug' => 'startseite'),
        1 => array('title' => __('Veranstaltungen', "freibadmirke"), 'slug' => 'veranstaltungen'),
        2 => array('title' => __('Verein',"freibadmirke"), 'slug' => 'verein'),
        3 => array('title' => __('Unterstützen',"freibadmirke"), 'slug' => 'unterstuetzen'),
        4 => array('title' => __('Ziele',"freibadmirke"), 'slug' => 'ziele'),
    );

    for ($i = 0; $i < count($pages); $i++) {

        $my_post = [];
        $my_post = array(
            'post_title'    => wp_strip_all_tags($pages[$i]['title']),
            // 'post_content'  => $sdgs[$i]['content'],
            'post_status'   => 'publish',
            'post_content' => '',
            'post_author'   => 1,
            'post_type'		=> 'page',
            // 'post_slug'     => $pages[$i]['slug']
        );

        if ( ! function_exists( 'post_exists' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/post.php' );
        }

        // wp_insert_post( $my_post, true );
        // echo post_exists($pages[$i]['title'],'','','page');
        if(post_exists($pages[$i]['title'],'','','page') === 0){
            # create post
            wp_insert_post( $my_post, true );
        }
    }

}


/**
 *  --------------------------------------------------------
 *  2. Permalink structure
 *  --------------------------------------------------------
 */

function qp_rewrite_permalink() {
    
    global $wp_rewrite; 

    //Write the rule
    $wp_rewrite->set_permalink_structure('/%postname%/'); 

    //Set the option
    update_option( "rewrite_rules", FALSE ); 

    //Flush the rules and tell it to write htaccess
    $wp_rewrite->flush_rules( true );

} add_action( 'after_setup_theme', 'qp_rewrite_permalink' );
add_action( 'after_switch_theme', 'qp_rewrite_permalink' );
add_action( 'activated_plugin', 'qp_rewrite_permalink' );
add_action( 'save_post_page', 'qp_rewrite_permalink' );

?>
<?php 

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
// add_filter( 'page_template', 'custom_page_template', 10, 2 );
// add_filter( 'display_post_states', 'custom_page_template', 1, 2);



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
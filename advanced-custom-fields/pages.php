<?php 




/**
 *  --------------------------------------------------------
 *  5. Create Pages
 *  --------------------------------------------------------
 */


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
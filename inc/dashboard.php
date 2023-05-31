<?php
/**
 * Dashboard Modification File
 */

// Customize login logo
function wpgood_custom_login_logo() { 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    if ( has_custom_logo() ) {
        echo '
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url("' . esc_url( $logo[0] ) .'");
                background-position: center center;
                background-size: contain;
                width: 100%;
            }
        </style>';
    }
}
add_action( 'login_enqueue_scripts', 'wpgood_custom_login_logo' );

function wpgood_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpgood_login_logo_url' );

function wpgood_login_logo_url_title() {
    return 'Back to site';
}
add_filter( 'login_headertitle', 'wpgood_login_logo_url_title' );

// Replace 'Howdy' in admin bar with custom greeting.
function wpgood_replace_howdy($wp_admin_bar) {
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);   
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'wpgood_replace_howdy', 25);

// Clean up initial dashboard view
function remove_dashboard_meta() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

// Remove unnecessary menu items from admin bar
function wpgood_remove_nodes( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'wpgood_remove_nodes', 999 );




//Set default image settings
function wpgood_default_image_settings() {
    update_option( 'image_default_align', 'none' );
	update_option( 'image_default_link_type', 'none' );
	update_option( 'image_default_size', 'full-size' );
}
add_action( 'after_setup_theme', 'wpgood_default_image_settings' );


// Move Yoast SEO box below other meta boxes.
function wpgood_position_wpseo_metabox() {
    return 'low';
 }
add_filter( 'wpseo_metabox_prio', 'wpgood_position_wpseo_metabox' );
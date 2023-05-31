<?php
/**
 * Disable comments
 */

// Disable support for comments and trackbacks in post types.
function wpgood_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ( $post_types as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
}
add_action( 'admin_init', 'wpgood_disable_comments_post_types_support' );

// Close comments on the front-end. 
function wpgood_disable_comments_status() {
	return false;
}
add_filter( 'comments_open', 'wpgood_disable_comments_status', 20, 2 );
add_filter( 'pings_open', 'wpgood_disable_comments_status', 20, 2 );

// Hide existing comments.
// @param string $comments Being the comments.
function wpgood_disable_comments_hide_existing_comments( $comments ) {
	$comments = array();
	return $comments;
}
add_filter( 'comments_array', 'wpgood_disable_comments_hide_existing_comments', 10, 2 );

// Remove comments page in menu. 
function wpgood_disable_comments_admin_menu() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'wpgood_disable_comments_admin_menu' );

// Remove comments metabox from dashboard. 
function wpgood_disable_comments_dashboard() {
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'wpgood_disable_comments_dashboard' );

// Remove comments links from admin bar. 
function wpgood_remove_comment_node( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'comments' );
}
add_action( 'admin_bar_menu', 'wpgood_remove_comment_node', 999 );

// Redirect any user trying to access comments page. 
function wpgood_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ( 'edit-comments.php' === $pagenow ) {
		wp_redirect( admin_url() );
		exit;
	}
}
add_action( 'admin_init', 'wpgood_disable_comments_admin_menu_redirect' );
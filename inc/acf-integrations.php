<?php
if (!defined('ABSPATH')) {
    exit;
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
}

/**
 *  Home Page
 */
function station_8_theme_menu() {
    add_menu_page(
        'Station 8', 
        'Station 8', 
        'manage_options',
        'station_8_options', 
        '',
        '',
        3
    );
}
add_action( 'admin_menu', 'station_8_theme_menu' );

/**
 * Register Regional Reps
 */
function aircraft_brands()
{
    $args = array(
        'label' => 'Aircraft Brands',
        'public' => true,
        'show_ui' => true,
        'show_in_menu'  => 'station_8_options',
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'aircraft-brand'),
        'query_var' => true,
        'menu_icon' => 'dashicons-images-alt',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
        )
    );
    register_post_type('aircraft_brand', $args);
}
add_action('init', 'aircraft_brands');


function testimonials()
{
    $args = array(
        'label' => 'Testimonials',
        'public' => true,
        'show_ui' => true,
        'show_in_menu'  => 'station_8_options',
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'testimonials'),
        'query_var' => true,
        'menu_icon' => 'dashicons-images-alt',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
        )
    );
    register_post_type('testimonials', $args);
}
add_action('init', 'testimonials');

function team_members()
{
    $args = array(
        'label' => 'Team Members',
        'public' => true,
        'show_ui' => true,
        'show_in_menu'  => 'station_8_options',
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'team_members'),
        'query_var' => true,
        'menu_icon' => 'dashicons-images-alt',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',
        )
    );
    register_post_type('team_member', $args);
}
add_action('init', 'team_members');
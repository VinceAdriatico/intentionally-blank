<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Regional Reps
 */
function regional_reps()
{
    $args = array(
        'label' => 'Regional Reps',
        'public' => true,
        'show_ui' => true,
        'show_in_menu'  => 'station_8_options',
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'regional-rep'),
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
    register_post_type('regional_rep', $args);
}
add_action('init', 'regional_reps');



/**
 *  Contact Ajax
 */
add_action('wp_ajax_get_reps', 'get_reps');
add_action('wp_ajax_nopriv_get_reps', 'get_reps');

function get_reps()
{
    $param = $_POST['projectType'];

    if ($param == 'default') {

        // Default Render
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'regional_rep',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            )
        );
    } elseif ($param == 'search-project') {

        // Search Input
        $value = $_POST['value'];
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'regional_rep',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
                's' => $value
            )
        );
    } else {

        // Tabbed
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'regional_rep',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
                'meta_key'  => 'region', 
                'meta_value'    => $param
            )
        );
    }

    $projekty = ($projectsQuery->posts);

    $projektyString = [];
    $contents = [];

    foreach($projekty as $projekt) {
        // Get Meta Information
        $id = $projekt->ID;
        $name = get_the_title($id);
        $image = get_the_post_thumbnail_url($id);
        $title = get_field('title', $id);
        $phone = get_field('phone_number', $id);
        $email = get_field('email', $id);
        $content_post = get_post($id);
        $excerpt = $content_post->post_content;
        $phoneIcon = get_template_directory_uri() . '/images/phone.svg';
        $mailIcon = get_template_directory_uri() . '/images/mail.svg';

        $projektyString[] = "
            <div class='rep-information'>
                <div class='rep-title'>Regional Contact</div>
                <div class='rep-profile-block'>
                    <img src='$image' loading='lazy' alt='$name' class='rep-picture' />
                    <div class='rep-profile-content'>
                        <div class='rep-name'>$name</div>
                        <div class='rep-job-title'>$title</div>
                        <a href='tel:$phone' class='phone-url w-inline-block'>
                            <img src='$phoneIcon' loading='lazy' alt='phone icon' />
                                <div class='number'>$phone</div>
                        </a>
                        <a href='mailto:$email' class='email-url w-inline-block'>
                            <img src='$mailIcon' loading='lazy' alt='mail icon' />
                            <div class='number'>$email</div>
                        </a>
                    </div>
                </div>
                <div class='rep-bio'>
                    $excerpt
                </div>
            </div>
        ";
    }

    $contents = json_encode([$projektyString]);
    echo $contents;
    die();
}
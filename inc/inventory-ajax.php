<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 *  Inventory Ajax
 */
add_action('wp_ajax_get_projects', 'get_projects');
add_action('wp_ajax_nopriv_get_projects', 'get_projects');


function get_projects()
{
    $param = $_POST['projectType'];
    $ppp = $_POST['ppp'];
    $single = $_POST['single'];
    // Default
    if ($param == 'aircraft') {
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'aircraft',
                'posts_per_page' => $ppp,
                'orderby' => 'date',
                // change to date - done
                'order' => 'ASC'
            )
        );
        // All Aircrafts
    } elseif ($param == 'all') {
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'aircraft',
                'posts_per_page' => $ppp,
                'orderby' => 'date',
                'order' => 'ASC'
            )
        );
		// 	Deal Pending
	} elseif ($param == 'deal-pending')	{
		 $projectsQuery = new WP_Query(
            array(
                'post_type' => 'aircraft',
                'posts_per_page' => $ppp,
                'orderby' => 'date',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'ac_sold',
                        'value' => 1,
                        'compare' => '='
                    )
                )
            )
        );
        // Recent Transactions
    } elseif ($param == 'recent-transactions') {
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'aircraft',
                'posts_per_page' => $ppp,
                'orderby' => 'date',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'ac_sold',
                        'value' => 1,
                        'compare' => '='
                    )
                )
            )
        );
        // For Sale
    } elseif ($param == 'for-sale') {
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'aircraft',
                'posts_per_page' => $ppp,
                'orderby' => 'date',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'ac_for_sale',
                        'value' => 1,
                        'compare' => '='
                    )
                )
            )
        );
        // Wanted
    } elseif ($param == 'wanted') {
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'aircraft',
                'posts_per_page' => $ppp,
                'orderby' => 'date',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'ac_wanted',
                        'value' => 1,
                        'compare' => '='
                    )
                )
            )
        );
        // Search Input
    } elseif ($param == 'search-project') {
        $value = $_POST['value'];
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'aircraft',
                'posts_per_page' => $ppp,
                'orderby' => 'title',
                'order' => 'ASC',
                's' => $value
            )
        );
        // Fail Safe
    } else {
        $projectsQuery = new WP_Query(
            array(
                'post_type' => 'aircraft',
                'posts_per_page' => 1,
                'p' => $single,
                'orderby' => 'title',
                'order' => 'ASC',
            )
        );
    }

    $projekty = ($projectsQuery->posts);
    if (count($projekty) == 0) {
        $projektyString = "<div style='display: block; margin: 3rem auto'>No aircrafts found</div>";
    } else {
        $projektyString = [];
    }

    $typyString = [];
    $contents = [];

    $i = 0;
    foreach ($projekty as $projekt) {

        // get metadata
        $id = $projekt->ID;
        $imgSource = get_field('ac_main_image', $id);
        $title = get_the_title($id);
        $link = get_the_permalink($id);

        // aircraft info
        $model = get_field('ac_model', $id);
        $nNumber = get_field('ac_n_number', $id);
        $serial = get_field('ac_serial_number', $id);
        $year = get_field('ac_year', $id);
        $model = get_field('ac_model', $id);

        // specs
        $highlights = get_field('ac_highlights', $id);
        $performance = get_field('ac_performance', $id);
        $interior= get_field( 'ac_interior', $id);
        $speed = get_field( 'ac_speed', $id);

        // contact
        $pdf = get_field( 'ac_pdf', $id);
        $phone = get_field('ac_phone_rep', $id);


        if (!$single) {
            /**
             *  Getting inventory
             */

            // build card
            $recent = "
            <h5 class='listed'>Recently Listed</h5>
        ";
            if ($i <= 12) {
                $tag = $recent;
            } else {
                $tag = "";
            }

            // create sequence delay
            $h = $i * 0.1;

            $projektyString[] =
                "<a class='project-card fade-in ease' data-project-type='$id' style='animation-delay: {$h}s'>
            <div class='header ease'>
                <img src='$imgSource' alt='$title' />
                $tag
            </div>
            <div class='body'>
                <h3 class='title'>Model $model</h3>
                <p class='info'>$nNumber | $serial</p>
                <sub class='year'>$year</sub>
            </div>
        </a>";
            $i++;
        } else {
            /**
             *  Getting Single aircraft
             */

            // get media
            $video = get_field('aircraft_video', $id);
            $images = get_field('ac_images', $id);

            // get info 
            $forSale = get_field('ac_for_sale', $id);
            $wanted = get_field('ac_wanted', $id);
            $excerpt = get_field('ac_excerpt', $id); 

            // Switch listing title
            switch (true) {
                case $forSale:
                    $listing = 'For Sale:';
                    break;
                case $wanted:
                    $listing = 'Wanted:';
                    break;
                default:
                    $listing = '';
            }

            $media = '';
            if (!$video) {
                // No video found
                if ($images) {

                    $count = 0;
                    $imageCount = count($images);

                    // create container if more than 1 in array
                    if( $imageCount > 1 ):
                        $media .= "<div class='air-pop media'>";
                    else: endif;

                    // Get last item count
                    // $last = end($items); 

                    // Loop through images
                    foreach ($images as $image) {
                        // Get sub-field
                        $src = $image['ac_image'];

                        // increase counter at start of loop
                        $count++;

                        // Feature image
                        $img = wp_get_attachment_image_url($src, 'large');

                        if ($count == 1) {
                            
                            // Don't render tag if not provided
                            if( $img == '' ) {
                                $imgTag = '';
                            } else {
                                $imgTag = "<div class='featured'><a href='$img' data-lightbox='aircraft'><img src='$img' /></a></div>";
                            }
                        
                        } elseif( $count == 2) {
                            // Open row on second item
                            $imgTag = "<div class='thumbnails outer-wrapper'>";

                        } elseif( $count == $imageCount ) {

                            // Last item in array
                            $imgTag = "
                                <a href='$img' data-lightbox='aircraft'>
                                    <img src='$img' />
                                </a>
                                </div>";
                        } else {

                            // every other item
                            $img = wp_get_attachment_image_url($src, 'large');
                            $imgTag = "<a href='$img' data-lightbox='aircraft'>
                                <img src='$img' />
                            </a>
                            ";
                        }

                        // concatenate to media
                        $media .= $imgTag;

                        
                    }
                    // close container
                    if( $imageCount > 1 ):
                        $media .= "</div>";
                    else: endif;
                }
            } else {
                
                // Create video container
                $vid = "
                    <div class='air-pop media'>
                        <video controls>
                            <source src='$video' type='video/mp4'>
                        </video>
                ";
                // concatenate to media
                $media .= $vid;

                // thumbnail container
                $count = 0;
                $imageCount = count($images);

                // create container if more than 1 in array
                if( $imageCount > 1 ):
                    $media .= "<div class='thumbnails outer-wrapper'>";
                else: endif;

                foreach($images as $image) {
                    // Get sub-field
                    $src = $image['ac_image'];

                    // Feature image
                    $img = wp_get_attachment_image_url($src, 'large');

                    // increase counter at start of loop
                    $count++;
                    if( $count == 1 ) {
                        // Don't render tag if not provided
                        if( $img == '' ) {
                            $imgTag = '';
                        } else {
                            $imgTag = "<a href='$img' data-lightbox='aircraft'><img src='$img' /></a>";
                        }
                    } else {
                        $imgTag = "<a href='$img' data-lightbox='aircraft'><img src='$img' /></a>";
                    }

                    $media .= $imgTag;
                }
                $media .= "</div></div>";

            }
            
            if( $highlights ) {
                $light .= "<ul>";
                foreach($highlights as $highlight) {

                    // lol
                    $yagami = $highlight['ac_bullet'];
                    $light .= "<li>$yagami</li>";
                }
                $light .= "</ul>";
            }

            // Render pdf if avail
            if( $pdf ) {
                $pdfTag = "<a href='$pdf' class='pdf'>PDF Prochure</a>";
            } else {
                $pdfTag = '';
            }

            // Render phone if avail
            if( $phone ) {
                $phoneTag = "<a href='tel:$phone' rel='nofollow' class='contact-rep'>Contact Rep</a>";
            } else {
                $phoneTag = '';
            }
            $share = get_template_directory_uri() . '/images/external-link.svg';
            // Create popup
            $projektyString[] = "
                <div class='aircraft-popup'>
                    $media
                    <div class='air-pop info'>
                        <span><h2>$listing $year $model</h2><a href='$link' title='$title'><img src='$share' /></a></span>
                        <h5>$nNumber | $serial</h5>
                        <p class='excerpt'>$excerpt</p>
                        $light
                        <div class='specs'>
                        <ul>
                            <li><a data-project-type='performance' class='active spec-tab'>Performance</a></li>
                            <li><a data-project-type='interior' class='spec-tab'>Interior</a></li>
                            <li><a data-project-type='speed' class='spec-tab'>Speed</a></li>
                        </ul>
                        <div class='specContainer'>
                            <div id='performance' class='spec show'>
                                $performance
                            </div>
                            <div id='interior' class='spec'>
                                $interior
                            </div>
                            <div id='speed' class='spec'>
                                $speed
                            </div>                                                        
                        </div>
                        <div class='cta'>
                            $phoneTag
                            $pdfTag
                        </div>
                    </div>
                    </div>

                    <a class='close-pop'>X <span>Close</span></a>
                </div>
            ";

        }
    }
    wp_reset_postdata();
    $typyString = [
        '<a class="project-type" data-project-type="for-sale">For Sale</a>',
        '<a class="project-type" data-project-type="wanted">Wanted</a>',
        '<a class="project-type" data-project-type="recent-transactions">Recent Transactions</a>',
		'<a class="project-type" data-project-type="deal-pending">Deal Pending</a>'
    ];

    // Add load more 
    if (count($projektyString) >= 8) {
        $loadMore = "
            <a id='load-more' data-project-type='$param'>Show All</a>
        ";
    } else {
        $loadMore = '';
    }

    $contents = json_encode([$projektyString, $typyString, $loadMore]);
    echo $contents;
    die();
}
?>
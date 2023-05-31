<?php
/**
 * Template Name: Home Page
 *
 * Template for Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package active-g
 */

if (!defined('ABSPATH')) {
    exit;
}

// conditionals
$stats_1_monetary = get_field('stats_1_monetary');
if ($stats_1_monetary) {
    $statsMon = '$';
} else {
    $statsMon = '';
}

// Get stats
$stat1 = get_field('stats_1_number');
$stat2 = get_field('stats_2_number');
$stat3 = get_field('stats_3_number');
$stat4 = get_field('stats_4_number');

// Get Header
get_template_part('header');
?>
<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
        <div class="home-hero wf-section">
            <div class="wrapper">
                <div class="hero-grid">
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee5034-cf829869" class="hero-left-block">
                        <h1 data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee5035" class="hero-title">
                            <?php echo get_field('hero_title'); ?>
                        </h1>
                        <div class="hero-left-logo-block">
                            <img class='logo-link w-inline-block static-brand'
                                src="<?php echo esc_url(get_field('static_aircraft_1')); ?>" loading="lazy"
                                alt="<?php echo get_field('static_brand_1_alt'); ?>">
                            <img class='logo-link w-inline-block static-brand'
                                src="<?php echo esc_url(get_field('static_aircraft_2')); ?>" loading="lazy"
                                alt="<?php echo get_field('static_brand_2_alt'); ?>">
                        </div>
                    </div>
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee503e-cf829869" class="hero-right-block">
                        <div class="slick-slider">
                            <?php
                            /**
                             *  Get Aircraft Brands
                             */
                            $args = array(
                                'post_type' => 'aircraft_brand',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'ASC'
                            );

                            // The Query
                            $query = new WP_Query($args);

                            // The Loop
                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();

                                    // Get meta information
                                    $image = get_the_post_thumbnail_url();
                                    $title = get_the_title();
                                    ?>
                                    <div class="slider-one w-inline-block"><img src="<?php echo esc_url($image); ?>" loading="lazy"
                                            alt="<?php echo esc_attr($title); ?>" class="slider-logo"></div>
                                    <?php
                                }
                            } else {
                                ?>
                                <h2>No Posts Found</h2>
                                <?php
                            }

                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee504a" class="section dark wf-section">
            <div class="wrapper">
                <div class="two-grid">
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee504d-cf829869" class="text-container">
                        <h3 data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee504e" class="heading">
                            <?php echo get_field('section_1_title'); ?>
                        </h3>
                        <p data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee5052" class="description">
                            <?php echo get_field('section_1_content'); ?>
                        </p>
                    </div>
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee5054-cf829869" class="image-container"><img
                            src="<?php echo esc_url(get_field('section_1_image')); ?>" loading="lazy"
                            data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee5055" alt="" class="drov-box-img"></div>
                </div>
            </div>
            <div class="seperator"></div>
            <div class="wrapper">
                <div class="two-grid">
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee5059-cf829869" class="image-container"><img
                            src="<?php echo esc_url(get_field('section_2_image')); ?>" loading="lazy"
                            data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee505a"
                            sizes="(max-width: 876px) 90vw, (max-width: 991px) 789px, (max-width: 1919px) 42vw, 570px" alt=""
                            class="drov-box-img"></div>
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee505b-cf829869" class="text-container middle">
                        <p data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee505c" class="description">
                            <?php echo get_field('section_2_content'); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="cloud-overlay"><img src="<?php echo esc_url(get_template_directory_uri() . "/images/cloudfix1.svg"); ?>"
                    loading="lazy" alt="" class="cloud"></div>
        </div>
        <div class="section stat stat-section wf-section">
            <div class="wrapper stat">
                <div class="stat-heading-center">
                    <h3 data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee5066" class="stat-heading">
                        <?php echo get_field('stats_title'); ?>
                    </h3>
                </div>
                <div class="state-grid">
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee5069-cf829869" class="stat-box">
                        <div class="stat-block">
                            <div class="stat-number">
                                <?php echo $statsMon; ?>
                                <span class='counter' data-endVal='<?= $stat1; ?>'>0</span>M
                            </div>
                            <div class="stat-details">
                                <?php echo get_field('stats_1_label'); ?>
                            </div>
                        </div>
                        <div class="stat-block">
                            <div id='stat-2' class="stat-number">
                                <span class='counter' data-endVal='<?= $stat2; ?>'>0</span>
                            </div>
                            <div class="stat-details">
                                <?php echo get_field('stats_2_label'); ?>
                            </div>
                        </div>
                    </div>
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee5074-cf829869" class="stat-animation-box"><img
                            src="<?php echo esc_url(get_template_directory_uri() . "/images/ring.svg"); ?>" loading="lazy"
                            alt="" class="ring"></div>
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee5076-cf829869" class="stat-box">
                        <div class="stat-block">
                            <div id='stat-3' class="stat-number">
                                <span class='counter' data-endVal='<?= $stat3; ?>'>0</span>
                            </div>
                            <div class="stat-details">
                                <?php echo get_field('stats_3_label'); ?>
                            </div>
                        </div>
                        <div class="stat-block">
                            <div id='stat-4' class="stat-number">
                                <span class='counter' data-endVal='<?= $stat4; ?>'>0</span>
                            </div>
                            <div class="stat-details">
                                <?php echo get_field('stats_4_label'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat-bottom-block">
                    <h4 data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee5082" class="stat-bottom-title">
                        <?php echo get_field('stats_title_bottom'); ?>
                    </h4>
                    <div data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee5084" class="stat-bottom-detials">
                        <?php echo get_field('stats_content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section testi wf-section">
            <div class="wrapper">
                <div class="two-grid testi">
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee5089-cf829869" class="testi-img"><img
                            src="<?php echo esc_url(get_template_directory_uri() . "/images/Rectangle-32.png"); ?>"
                            loading="lazy" data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee508a" alt="" class="testii-left-img">
                    </div>
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee508b-cf829869" class="testimonial-block">
                        <div class="test-logo"><img
                                src="<?php echo esc_url(get_template_directory_uri() . "/images/ts-logo.svg"); ?>"
                                loading="lazy" alt=""></div>
                        <div data-delay="8000" data-animation="slide" class="slider-wrapper w-slider" data-autoplay="true"
                            data-easing="ease" data-hide-arrows="false" data-disable-swipe="true" data-autoplay-limit="0"
                            data-nav-spacing="3" data-duration="500" data-infinite="true">
                            <div class="w-slider-mask">
                                <?php
                                /**
                                 *  Get Aircraft Brands
                                 */
                                $args = array(
                                    'post_type' => 'testimonials',
                                    'posts_per_page' => -1,
                                    'orderby' => 'date',
                                    'order' => 'ASC'
                                );

                                // The Query
                                $query = new WP_Query($args);

                                // The Loop
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        $title = get_the_title();
                                        $content = get_the_content();
                                        ?>
                                        <div class="slider w-slide">
                                            <div class="slider-content">
                                                <p class="testimonial-text">
                                                    <?php echo $content; ?>
                                                </p>
                                                <div class="testi-author">-
                                                    <?php echo $title; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <h2>No Posts Found</h2>
                                    <?php
                                }

                                wp_reset_postdata();
                                ?>
                            </div>
                            <div class="arrow-left w-slider-arrow-left">
                                <div class="w-icon-slider-left"></div>
                            </div>
                            <div class="arrow-right w-slider-arrow-right">
                                <div class="w-icon-slider-right"></div>
                            </div>
                            <div class="slider-nav w-slider-nav w-shadow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const $jq = jQuery.noConflict();
            $jq(document).ready(function () {

                // Slick Slider
                $jq('.slick-slider').slick({
                    dots: false,
                    vertical: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    cssEase:'linear',
                    speed: 3000,
                    autoplaySpeed: 0,
                    arrows: false,
                    verticalSwiping: true,
                    responsive: [
                        {
                            breakpoint: 770,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
                $jq(window).scroll(function () {
                    var top_of_element = $(".stat-section").offset().top + 300;
                    var bottom_of_element = $(".stat-section").offset().top + $(".stat-section").outerHeight();
                    var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
                    var top_of_screen = $(window).scrollTop();
                    if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
                        setTimeout(() => {
                            $jq('.counter').each(function () {
                                // no need to specify options unless they differ from the defaults
                                var target = this;
                                var endVal = parseInt($(this).attr('data-endVal'));
                                theAnimation = new countUp(target, 0, endVal, 0, 3);
                                theAnimation.start();
                            });
                        }, "1000");
                        $jq(window).off('scroll');
                    } else {
                        // the element is not visible, do something else
                    }
                });
            });

        </script>
    <?php endwhile; ?>
<?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<?php get_template_part('footer'); ?>
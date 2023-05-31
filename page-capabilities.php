<?php
/**
 * Template Name: Capabilities Page
 *
 * Template for Capabilities Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package active-g
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get Header
get_template_part('header');
?>
<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
        <div class="section hero wf-section" style='background-image: url(<?php echo get_field('hero_bg'); ?>)'>
            <div class="wrapper">
                <div class="hero-text-block">
                    <h1 class="hero-heading">
                        <?php echo get_field('hero_title'); ?>
                    </h1>
                    <div class="hero-details">
                        <?php echo get_field('hero_content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section capabilites wf-section">
            <div class="wrapper">
                <h2 class="heading-two">Capabilities</h2>

                <div class="cap-tabs-container">
                    <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100"
                        class="cap-tabs w-tabs">
                        <div class="cap-tabs-menu w-tab-menu">
                            <a data-w-tab="Tab 1" class="cap-tab-link w-inline-block w-tab-link w--current">
                                <div class="cap-tab-line"></div>
                                <div>
                                    <?php echo get_field('tab_1_title'); ?>
                                </div>
                            </a>
                            <a data-w-tab="Tab 2" class="cap-tab-link w-inline-block w-tab-link">
                                <div class="cap-tab-line"></div>
                                <div>
                                    <?php echo get_field('tab_2_title'); ?>
                                </div>
                            </a>
                            <a data-w-tab="Tab 3" class="cap-tab-link w-inline-block w-tab-link">
                                <div class="cap-tab-line"></div>
                                <div>
                                    <?php echo get_field('tab_3_title'); ?>
                                </div>
                            </a>
                            <a data-w-tab="Tab 4" class="cap-tab-link w-inline-block w-tab-link">
                                <div class="cap-tab-line"></div>
                                <div>
                                    <?php echo get_field('tab_4_title'); ?>
                                </div>
                            </a>
                        </div>
                        <div class="cap-tabs-cont w-tab-content">
                            <div data-w-tab="Tab 1" class="cap-tab-pane w-tab-pane w--tab-active">
                                <div class="cap-tab-ctn">
                                    <?php echo get_field('tab_1_content'); ?>
                                </div>
                            </div>
                            <div data-w-tab="Tab 2" class="cap-tab-pane w-tab-pane">
                                <div class="cap-tab-ctn">
                                    <?php echo get_field('tab_2_content'); ?>
                                </div>
                            </div>
                            <div data-w-tab="Tab 3" class="cap-tab-pane w-tab-pane">
                                <div class="cap-tab-ctn">
                                    <?php echo get_field('tab_3_content'); ?>
                                </div>
                            </div>
                            <div data-w-tab="Tab 4" class="cap-tab-pane w-tab-pane">
                                <div class="cap-tab-ctn">
                                    <?php echo get_field('tab_4_content'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="wrapper process">
                <h2 class="heading-two">
                    <?php echo get_field('buying_title'); ?>
                </h2>
                <div class="buying-process">
                    <div class="process-card"><img src="<?php echo get_field('process_1_icon'); ?>" loading="lazy" alt=""
                            class="process-img">
                        <div class="process-detals">
                            <?php echo get_field('process_1_title'); ?>
                        </div>
                    </div>
                    <div class="process-card"><img src="<?php echo get_field('process_2_icon'); ?>" loading="lazy" alt=""
                            class="process-img">
                        <div class="process-detals">
                            <?php echo get_field('process_2_title'); ?>
                        </div>
                    </div>
                    <div class="process-card"><img src="<?php echo get_field('process_3_icon'); ?>" loading="lazy" alt=""
                            class="process-img">
                        <div class="process-detals">
                            <?php echo get_field('process_3_title'); ?>
                        </div>
                    </div>
                    <div class="process-card"><img src="<?php echo get_field('process_4_icon'); ?>" loading="lazy" alt=""
                            class="process-img">
                        <div class="process-detals">
                            <?php echo get_field('process_4_title'); ?>
                        </div>
                    </div>
                    <div class="process-card"><img src="<?php echo get_field('process_5_icon'); ?>" loading="lazy" alt=""
                            class="process-img">
                        <div class="process-detals">
                            <?php echo get_field('process_5_title'); ?>
                        </div>
                    </div>
                    <div class="process-card"><img src="<?php echo get_field('process_6_icon'); ?>" loading="lazy" alt=""
                            class="process-img">
                        <div class="process-detals">
                            <?php echo get_field('process_6_title'); ?>
                        </div>
                    </div>
                    <div class="process-card last-item"><img src="<?php echo get_field('process_7_icon'); ?>" loading="lazy"
                            alt="" class="process-img">
                        <div class="process-detals">
                            <?php echo get_field('process_7_title'); ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo get_field('get_in_touch'); ?>" class="get-in-touch w-inline-block">
                    <div>Get in touch</div>
                    <div class="btn-arrow ease"><svg width="16" height="25" viewBox="0 0 16 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 24L15 12.5L1 1" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg></div>
                </a>
            </div>
            <div class="wrapper promise">
                <div class="center-heading-box">
                    <h2 class="heading-two center">
                        <?php echo get_field('promise_title'); ?>
                    </h2>
                    <p class="sub-center">
                        <?php echo get_field('promise_description'); ?>
                    </p>
                </div>
                <div class="promise-grid">
                    <div class="promise-card"><img src="<?php echo get_field('pro_1_icon'); ?>" loading="lazy" alt=""
                            class="promise-icon">
                        <div class="promise-card-title">
                            <?php echo get_field('pro_1_title'); ?>
                        </div>
                        <p class="promise-card-details">
                            <?php echo get_field('pro_1_desc'); ?>
                        </p>
                    </div>
                    <div class="promise-card"><img src="<?php echo get_field('pro_2_icon'); ?>" loading="lazy" alt=""
                            class="promise-icon">
                        <div class="promise-card-title">
                            <?php echo get_field('pro_2_title'); ?>
                        </div>
                        <p class="promise-card-details">
                            <?php echo get_field('pro_2_desc'); ?>
                        </p>
                    </div>
                    <div class="promise-card"><img src="<?php echo get_field('pro_3_icon'); ?>" loading="lazy" alt=""
                            class="promise-icon">
                        <div class="promise-card-title">
                            <?php echo get_field('pro_3_title'); ?>
                        </div>
                        <p class="promise-card-details">
                            <?php echo get_field('pro_3_desc'); ?>
                        </p>
                    </div>
                    <div class="promise-card"><img src="<?php echo get_field('pro_4_icon'); ?>" loading="lazy" alt=""
                            class="promise-icon">
                        <div class="promise-card-title">
                            <?php echo get_field('pro_4_title'); ?>
                        </div>
                        <p class="promise-card-details">
                            <?php echo get_field('pro_4_desc'); ?>
                        </p>
                    </div>
                    <div class="promise-card"><img src="<?php echo get_field('pro_5_icon'); ?>" loading="lazy" alt=""
                            class="promise-icon">
                        <div class="promise-card-title">
                            <?php echo get_field('pro_5_title'); ?>
                        </div>
                        <p class="promise-card-details">
                            <?php echo get_field('pro_5_desc'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<script>
    const $jq = jQuery.noConflict();
    $jq(document).ready(function () {
        $jq(window).scroll(function () {
            var top_of_buying = $(".buying-process").offset().top;
            var bottom_of_buying = $(".buying-process").offset().top + $(".buying-process").outerHeight();
            var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
            var top_of_screen = $(window).scrollTop();
            if ((bottom_of_screen > top_of_buying) && (top_of_screen < bottom_of_buying)) {
                // Add css class to buying
                $('.buying-process').addClass('appear');
            } else {
                // the buying is not visible, do something else
            }
            var top_of_element = $(".promise-grid").offset().top;
            var bottom_of_element = $(".promise-grid").offset().top + $(".promise-grid").outerHeight();
            var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
            var top_of_screen = $(window).scrollTop();
            if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
                // Add css class to element
                $('.promise-grid').addClass('appear');
            } else {
                // the element is not visible, do something else
            }
        });
    });   
</script>

<?php get_template_part('footer'); ?>
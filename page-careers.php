<?php
/**
 * Template Name: Careers Page
 *
 * Template for Careers Page
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
        <div class="section career-hero wf-section" style='background-image: url(<?php echo get_field('hero_bg'); ?>)'>
            <div class="wrapper">
                <div class="hero-text-block">
                    <h1 class="hero-heading"><?php echo get_field('hero_title'); ?></h1>
                    <div class="hero-details"><?php echo get_field('hero_content'); ?></div>
                    <a href="<?php echo get_field('hero_btn_url'); ?>" class="button hero w-inline-block">
                        <div>See positions</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="section career-content wf-section">
            <div class="wrapper">
                <h2 class="heading-two"><?php echo get_field('section_title'); ?></h2>
                <p><?php echo get_field('section_content'); ?></p>
                <div class="career-cta">
                    <div class="career-cta-title"><?php echo get_field('cta_title'); ?></div>
                    <a href="<?php echo get_field('cta_url'); ?>" class="button w-inline-block">
                        <div>See Positions</div>
                    </a>
                </div>
            </div>
            <div class="seperator _70"></div>
            <div class="wrapper">
                <h3 class="heading-two"><?php echo get_field('learn_more_title'); ?></h3>
                <div class="cap-tabs-container">
                    <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100"
                        class="cap-tabs w-tabs">
                        <div class="cap-tabs-menu w-tab-menu">
                            <a data-w-tab="Tab 1" class="cap-tab-link w-inline-block w-tab-link w--current">
                                <div class="cap-tab-line"></div>
                                <div><?php echo get_field('tab_1_title'); ?></div>
                            </a>
                            <a data-w-tab="Tab 2" class="cap-tab-link w-inline-block w-tab-link">
                                <div class="cap-tab-line"></div>
                                <div><?php echo get_field('tab_2_title'); ?></div>
                            </a>
                            <a data-w-tab="Tab 3" class="cap-tab-link w-inline-block w-tab-link">
                                <div class="cap-tab-line"></div>
                                <div><?php echo get_field('tab_3_title'); ?></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<?php get_template_part('footer'); ?>
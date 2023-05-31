<?php
/**
 * Template Name: Culture Page
 *
 * Template for Culture Page
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
        <div class="section culture wf-section" style='background-image: url(<?php echo get_field('hero_bg'); ?>)'>
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
        <div class="section culture-body wf-section">
            <div class="wrapper">
                <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100"
                    class="plane-tab w-tabs">
                    <div class="plane-tab-menu w-tab-menu">
                        <a data-w-tab="Tab 1" class="culture-tab-link w-inline-block w-tab-link w--current">
                            <div>
                                <?php echo get_field('tab_1_title'); ?>
                            </div>
                        </a>
                        <a data-w-tab="Tab 2" class="culture-tab-link w-inline-block w-tab-link">
                            <div>
                                <?php echo get_field('tab_2_title'); ?>
                            </div>
                        </a>
                    </div>
                    <div class="plane-tab-content w-tab-content">
                        <div data-w-tab="Tab 1" class="plane-tab-pane w-tab-pane w--tab-active">
                            <?php echo get_field('tab_1_content'); ?>
                        </div>
                        <div data-w-tab="Tab 2" class="plane-tab-pane w-tab-pane">
                            <p class="plane-content">
                                <?php echo get_field('tab_2_content'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper process">

                <div class="culture-lightbox">


                </div>

                <a href="<?php echo get_field('get_in_touch'); ?>" class="get-in-touch w-inline-block">
                    <div>Get in touch</div>
                    <div class="btn-arrow"><img
                            src="<?php echo esc_url(get_template_directory_uri() . "/images/chevron-right.svg"); ?>"
                            loading="lazy" alt="" class="arrow-img"></div>
                </a>
            </div>
        </div>
        <?php if (have_rows('gallery')): ?>
            <div class="section wf-section culture-gallery">
                <div class="wrapper">
                    <div class='slider'>
                        <?php while (have_rows('gallery')):
                            the_row();
                            $src = get_sub_field('image');
                            $alt = get_sub_field('alt');
                            ?>
                            <div>
                                <img src='<?= $src; ?>' alt='<?= $alt; ?>' />
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class='slider-nav-gallery outer-wrapper'>
                        <?php while (have_rows('gallery')):
                            the_row();
                            $src = get_sub_field('image');
                            $alt = get_sub_field('alt');
                            ?>
                            <div>
                                <img src='<?= $src; ?>' alt='<?= $alt; ?>' />
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="section culture-cta wf-section" style='background-image: url(<?php echo get_field('cta_bg'); ?>)'>
            <div class="wrapper">
                <div class="hero-text-block">
                    <h1 class="hero-heading">
                        <?php echo get_field('cta_title'); ?>
                    </h1>
                    <div class="hero-details">
                        <?php echo get_field('cta_content'); ?>
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
    $jq(document).ready(function() {
        $jq('.slider').slick({
            arrows: false, dots: false, infinite: true, speed: 500,
            autoplay: true, autoplaySpeed: 3000, slidesToShow: 1, slidesToScroll: 1
        });
        //On click of slider-nav childern,
        //Slick slider navigate to the respective index.
        $jq('.slider-nav-gallery > div').click(function () {
            $jq('.slider').slick('slickGoTo', $(this).index());
        });
    });
</script>
<?php get_template_part('footer'); ?>
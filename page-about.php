<?php
/**
 * Template Name: About Page
 *
 * Template for About Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package station-8
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
        <div class="section hero-about wf-section" style='background-image: url(<?php echo get_field('hero_bg'); ?>)'>
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
        <div data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee504a" class="section dark wf-section">
            <div class="wrapper abt">
                <div class="abt-ctn-block">
                    <h2 class="heading-two">
                        <?php echo get_field('section_1_title'); ?>
                    </h2>
                    <p class="paragraph">
                        <?php echo get_field('section_1_content'); ?>
                    </p>
                </div>
                <a href="<?php echo get_field('section_1_cta_label'); ?>" class="get-in-touch w-inline-block">
                    <div>
                        <?php echo get_field('section_1_cta_label'); ?>
                    </div>
                    <div class="btn-arrow"><img
                            src="<?php echo esc_url(get_template_directory_uri() . '/images/chevron-right.svg'); ?>"
                            loading="lazy" alt="" class="arrow-img"></div>
                </a>
            </div>
            <div class="wrapper">
                <div class="two-grid">
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee504d-d688333f" class="text-container middle">
                        <h3 data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee504e" style="opacity:0" class="heading-three">
                            <?php echo get_field('section_2_title'); ?>
                        </h3>
                        <div class="seperator _40"></div>
                        <p data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee5052" style="opacity:0" class="description">
                            <?php echo get_field('section_2_content'); ?>
                        </p>
                    </div>
                    <div id="w-node-c95472e7-8344-1d9a-d1c5-8f1380ee5054-d688333f" class="image-container"><img
                            src="<?php echo esc_url(get_field('section_2_bg')); ?>" loading="lazy"
                            data-w-id="c95472e7-8344-1d9a-d1c5-8f1380ee5055" class="drov-box-img"></div>
                </div>
            </div>
            <div class="seperator abt"></div>
            <div class="wrapper">
                <div class="cap-tabs-container about">
                    <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100"
                        class="cap-tabs w-tabs">
                        <div class="cap-tabs-menu abt w-tab-menu">
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
                        </div>
                        <div class="cap-tabs-cont w-tab-content">
                            <div data-w-tab="Tab 1" class="cap-tab-pane abt w-tab-pane w--tab-active">
                                <div class="abt-col w-row">
                                    <div class="abt-col-block w-col w-col-12">
                                        <?php
                                        if (have_rows('tab_1_content')): ?>
                                            <ul role='list' class='list-order xp-list'>
                                                <?php while (have_rows('tab_1_content')):
                                                    the_row();
                                                    $sub = get_sub_field('value');
                                                    ?>
                                                    <li class='list-item'>
                                                        <?php echo $sub; ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div data-w-tab="Tab 2" class="cap-tab-pane abt w-tab-pane">
                                <p>
                                    <?php echo get_field('tab_2_content'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cloud-overlay"><img src="<?php echo esc_url(get_template_directory_uri() . "/images/cloud2.png"); ?>"
                    loading="lazy" sizes="(max-width: 3840px) 100vw, 3840px" alt="" class="cloud"></div>
        </div>
        <div class="section team wf-section">
            <div class="wrapper">
                <h3 class="heading">
                    <?php echo get_field('team_title'); ?>
                </h3>
                <div class="team-tab-ctnr">
                    <div data-current="Tab 3" data-easing="ease" data-duration-in="300" data-duration-out="100"
                        class="team-tabs w-tabs">
                        <div class='tab-container-menu team-tab-menu  w-tab-menu'>
                            <div class="team-tab-menu outer-wrapper">
                                <?php
                                /**
                                 *  Get Team Members
                                 */
                                $args = array(
                                    'post_type' => 'team_member',
                                    'posts_per_page' => -1,
                                    'orderby' => 'order',
                                    'order' => 'ASC'
                                );

                                // The Query
                                $query = new WP_Query($args);

                                // Increment
                                $i = 0;

                                // The Loop
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();

                                        // Get meta information
                                        $title = get_the_title();
                                        $position = get_field('job_position');
                                        $images = get_field('gallery');
                                        if ($i == 0) {
                                            $current = 'w--current';
                                        } else {
                                            $current = '';
                                        }
                                        ?>

                                        <a data-w-tab="Tab <?php echo $i; ?>"
                                            class="team-tab-link w-inline-block w-tab-link <?php echo $current; ?>">
                                            <div class="team-thumbs">
                                                <div class="team-thumb">
                                                    <?php
                                                    $bb = 0;
                                                    foreach ($images as $image) {
                                                        $src = $image['image'];
                                                        $img = wp_get_attachment_image_url($src, 'thumbnail');
                                                        ?>
                                                        <img src='<?php echo esc_url($img); ?>' loading='lazy' />
                                                        <?php
                                                        break;
                                                    } ?>
                                                </div>
                                                <div class="team-thumb-ctn">
                                                    <div class="team-name">
                                                        <?php echo esc_attr($title); ?>
                                                    </div>
                                                    <div class="team-job-title">
                                                        <?php echo esc_attr($position); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php

                                        // Increment +1
                                        $i++;
                                    }
                                } else {
                                    ?>
                                    <h2>No Posts Found</h2>
                                    <?php
                                }

                                wp_reset_postdata();
                                ?>
                            </div>
                            <div class='overlay'></div>
                        </div>

                        <div class="team-tab-cnt w-tab-content">
                            <?php
                            /**
                             *  Get Team Members
                             */
                            $args = array(
                                'post_type' => 'team_member',
                                'posts_per_page' => -1,
                                'orderby' => 'order',
                                'order' => 'ASC'
                            );

                            // The Query
                            $query = new WP_Query($args);

                            // Increment
                            $g = 0;

                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();

                                    // Get meta information
                                    $name = get_the_title();
                                    $position = get_field('job_position');
                                    $exp = get_field('aviation_experience');
                                    $hobbies = get_field('top_3_hobbies');
                                    $resident = get_field('resident_of');
                                    $artifact = get_field('favorite_historical_artifact');
                                    $advice = get_field('#1_piece_of_aviation_advice');
                                    $inspirations = get_field('inspirations');
                                    $images = get_field('gallery');

                                    if ($g == 0) {
                                        $current = 'w--tab-active';
                                    } else {
                                        $current = '';
                                    }
                                    ?>
                                    <div data-w-tab="Tab <?php echo $g; ?>" class="team-tab-pan w-tab-pane <?php echo $current; ?>">
                                        <div class="team-details-tab">
                                            <div id="w-node-_3170d1cd-bb3f-79c8-35d8-bb4f7a08cb3e-d688333f" class="team-lightbox">
                                                <div class='container'>
                                                    <?php
                                                    // Default Image
                                                    foreach ($images as $image) {
                                                        $src = $image['image'];
                                                        $img = wp_get_attachment_image_url($src, 'thumbnail');
                                                        ?>
                                                        <img src='<?php echo esc_url($img); ?>' alt='<?php echo $name; ?>' loading='lazy'
                                                            id='expandedImg-<?php echo $g; ?>' />
                                                        <?php
                                                        break;
                                                    } ?>
                                                </div>
                                                <div class='team gallery'>
                                                    <?php
                                                    $bb = 0;
                                                    // Default Image
                                                    foreach ($images as $image) {
                                                        $src = $image['image'];
                                                        $img = wp_get_attachment_image_url($src, 'thumbnail');
                                                        if ($bb === 0):
                                                            $active = 'active-thumb';
                                                        else:
                                                            $active = '';
                                                        endif;
                                                        ?>
                                                        <div class='team-image <?= $active; ?>' onclick='tabImage(this)'
                                                            value='expandedImg-<?php echo $g; ?>'>
                                                            <img src='<?php echo esc_url($img); ?>' alt='<?php echo $title; ?>'
                                                                loading='lazy' />
                                                        </div>
                                                        <?php
                                                        $bb++;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="w-node-_13739e36-ca26-b64d-907a-ea5dc2b9b67d-d688333f" class="team-details">
                                                <div class="name-team">
                                                    <?php echo esc_attr($name); ?>
                                                </div>
                                                <div class="position-team">
                                                    <?php echo esc_attr($position); ?>
                                                </div>
                                                <div class="team-exp">Aviation experience - <strong class="team-output">
                                                        <?php echo esc_attr($exp); ?>
                                                    </strong>
                                                </div>
                                                <div class="team-hobbi">Top 3 hobbies - <strong class="team-output">
                                                        <?php echo esc_attr($hobbies); ?>
                                                    </strong></div>
                                                <div class="team-resident">Resident of - <strong class="team-output">
                                                        <?php echo esc_attr($resident); ?>
                                                    </strong></div>
                                                <div class="fav-aircraft">Favorite historical aircraft - <strong
                                                        class="team-output"><?php echo esc_attr($artifact); ?></strong></div>
                                                <div class="team-advice">#1 piece of aviation advice? </div>
                                                <p class="advice-details">
                                                    <?php echo esc_attr($advice); ?>
                                                </p>
                                                <div class="team-insp">Inspirations</div>
                                                <p class="team-insp-details">
                                                    <?php echo esc_attr($inspirations); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                    // Increment +1
                                    $g++;
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
        <script>
            function tabImage(imgs) {

                // Get featured image
                var value = imgs.getAttribute('value');
                var expandImg = document.getElementById(value);
                var imgSrc = imgs.getElementsByTagName("img")

                // clear active thumb
                var thumbs = document.getElementsByClassName('team-image');
                for (var i = 0; i < thumbs.length; i++) {
                    thumbs[i].classList.remove('active-thumb');
                }
                // add active thumb
                imgs.classList.add('active-thumb');

                expandImg.src = imgSrc[0].src;
                expandImg.parentElement.style.display = "block";
            }
        </script>
    <?php endwhile; ?>
<?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<?php get_template_part('footer'); ?>
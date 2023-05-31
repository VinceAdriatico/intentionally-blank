<?php
/**
 * Template Name: Single Post
 *
 * Template for Single Post Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aerovision
 */
if (!defined('ABSPATH')) {
    exit;
}
// Get Header
get_template_part('/partials-new/header-new');

?>

<div class="section inventory wf-section">
    <div class="wrapper">
        <div class="tob-block news">
            <div id="w-node-_2b402595-ff53-6c65-4fa4-bf784e691614-c57d9785" class="category">
                <div class="category-block">
                    <a href="/news" aria-current="page" class="cate-url w-inline-block">
                        <div>Insights</div>
                    </a>
                    <a href="/market-reports" class="cate-url w-inline-block">
                        <div>Market Reports</div>
                    </a>
                    <a href="/faq" class="cate-url w-inline-block">
                        <div>Ask Omni</div>
                    </a>
                </div>
            </div>
            <div id="w-node-_11b84914-146f-2c7c-6c72-a31ba214a310-c57d9785" class="serch-block">
                <div class="serch-block">
                    <div id="inv-search" class="w-form">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-main-block">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post();
                    /**
                     *  Meta Information
                     */

                    // Info
                    $categories = get_the_category();

                    // next and before post
            
                    $prevPost = get_previous_post();
                    $nextPost = get_next_post();


                    // Background
                    if (has_post_thumbnail()) {
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                        if (!empty($large_image_url[0])) {
                            $bg = 'background-image: url(' . $large_image_url[0] . ');';
                        } else {
                            $bg = '';
                        }
                    }
                    ?>
                    <div class="news-hero-img" style='<?php echo $bg; ?>'></div>
                    <div class="news-details-block compress-content" style="max-width: unset;">
                        <div class="news-cate-block">
                            <a href="#" class="author-date w-inline-block">
                                <div>
                                    <?php echo get_the_author(); ?> |
                                    <?php echo get_the_date(); ?>
                                </div>
                            </a>
                            <a href="#" class="news-cate w-inline-block">
                                <div>
                                    <?php echo esc_html($categories[0]->name); ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="news-full-block content-news compress-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="news-bottom-grid" style='display: none;'>
                        <?php
                        // Images
                            $prevImage = wp_get_attachment_image_src(get_post_thumbnail_id($prevPost->ID), 'large');
                            if( $prevPost ) {
                                $prevImag = '<img src="' . $prevImage[0] . '" id="w-node-c2ea670d-fb19-6375-91f3-47c3319bba69-03261039" />';
                            } else {
                                $prevImag = '';
                            }
                            $nextImage = wp_get_attachment_image_src(get_post_thumbnail_id($nextPost->ID), 'large');
                            if( $nextPost ) {
                                $nextImag = '<img src="' . $nextImage[0] . '" id="w-node-eaea9e39-c4d2-37ba-8b21-29b4c58afd94-03261039" />';
                            } else {
                                $nextImag = '';
                            }
                        ?>
                        <?php echo $prevImag; ?>
                        <?php echo $nextImag; ?>
                    </div>
                    <div class="next-previous-block compress-content">
                        <?php previous_post_link('<strong>%link</strong>', '&lt; Previous'); ?>
                        <?php next_post_link('<strong>%link</strong>', 'Next &gt;'); ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="section cta wf-section">
    <div class="wrapper">
        <div class="hero-text-block">
            <h1 class="hero-heading">True aviation experience since 1983.</h1>
            <div class="hero-details">Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae
                luctus
                metus
                libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed
                lectus.
                Praesent elementum hendrerit tortor. Sed semper lorem at felis.</div>
        </div>
    </div>
</div>
<?php get_template_part('footer'); ?>
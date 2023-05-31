<?php
/**
 * Template Name:  Category Page
 *
 * Template for Category Page
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

<div class="page-wrapper">
    <div class="section inventory wf-section">
        <div class="wrapper">
            <div class="tob-block news">
                <div id="w-node-_2b402595-ff53-6c65-4fa4-bf784e691614-c57d9785" class="category">
                    <div class="category-block">
                        <a href="/news" aria-current="page" class="cate-url w-inline-block">
                            <div>Insights</div>
                        </a>
                        <a href="/market-reports" class="cate-url w-inline-block w--current active-blog">
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
            <div class="news-grid">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()):
                        the_post();
                        $term = get_queried_object();
                        ?>


                        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"
                            class="news-card w-inline-block">
                            <h3 class="news-title">
                                <?php echo wp_trim_words(get_the_content(), 13); ?>
                            </h3>
                            <div class="news-card-details">
                                <?php echo get_the_author(); ?> |
                                <?php echo get_the_date(); ?>
                            </div>
                            <div class="news-card-cate">

                            </div>
                        </a>

                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="section cta wf-section">
    <div class="wrapper">
        <div class="hero-text-block">
            <h1 class="hero-heading">True aviation experience since 1983.</h1>
            <div class="hero-details">Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae
                luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida
                id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</div>
        </div>
    </div>
</div>
</div>
</div>

<?php get_template_part('footer'); ?>
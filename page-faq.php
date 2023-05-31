<?php
/**
 * Template Name: FAQ Page
 *
 * Template for FAQ Page
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
<div class="section faq wf-section">
    <div class="wrapper">
        <div class="tob-block news-details">
            <div id="w-node-_2b402595-ff53-6c65-4fa4-bf784e691614-6955aa68" class="category">
                <div class="category-block">
                    <a href="/news" class="cate-url w-inline-block">
                        <div>Insights</div>
                    </a>
                    <a href="/market-reports" class="cate-url w-inline-block">
                        <div>Market Reports</div>
                    </a>
                    <a href="/faq" aria-current="page" class="cate-url w-inline-block w--current active-blog">
                        <div>Ask Omni</div>
                    </a>
                </div>
            </div>
            <div id="w-node-_11b84914-146f-2c7c-6c72-a31ba214a310-6955aa68" class="serch-block">
                <div class="serch-block">
                    <div id="inv-search" class="w-form">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq-grid">
            <div id="w-node-efd24e75-1af4-eb48-5a40-19e66be0235f-6955aa68" class="faq-conact-block">
                <h1 class="faq-title">Even if you aren’t ready to buy or sell, we are available to be your go-to
                    resource for all aviation topics. We love an opportunity to connect with a new friend!</h1>
                <div class="faq-topics-title">Common Discussion Topics:</div>
                <ul role="list" class="faq-lists">
                    <li class="faq-list-item">
                        <div>What is my aircraft worth?</div>
                    </li>
                    <li class="faq-list-item">
                        <div>What aircraft works best for my business or personal travel?</div>
                    </li>
                    <li class="faq-list-item">
                        <div>I need an aviation attorney. Who do you recommend?</div>
                    </li>
                    <li class="faq-list-item">
                        <div>What’s happening in the market today?</div>
                    </li>
                </ul>
                <div class='form-container'>
                    <?= do_shortcode('[gravityform id="7" title="true"]'); ?>
                </div>
            </div>
            <div id="w-node-c5adae15-9f69-7d8b-4c04-9b50ca2efa02-6955aa68" class="faq-img-block">
            </div>
        </div>
    </div>
</div>
<?php get_template_part('footer'); ?>
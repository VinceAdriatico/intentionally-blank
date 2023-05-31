<?php
/**
 * Template Name:  Blog Header
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

?>

<div id="w-node-_2b402595-ff53-6c65-4fa4-bf784e691614-c57d9785" class="category">
    <div class="category-block">
        <a href="/news" aria-current="page" class="cate-url w-inline-block <?php (is_home()) ? 'w--current' : ''; ?>">
            <div>Insights</div>
        </a>
        <a href="/market-reports" class="cate-url w-inline-block <?php ($slug == 'market-reports') ? 'w--current' : ''; ?>">
            <div>Market Reports</div>
        </a>
        <a href="/faq" class="cate-url w-inline-block <?php ($slug == 'faq') ? 'w--current' : ''; ?>">
            <div>Ask Omni</div>
        </a>
    </div>
</div>

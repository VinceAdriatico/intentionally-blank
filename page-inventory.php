<?php
/**
 * Template Name: Inventory Path
 *
 * Template for Inventory Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aerovision
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get Header
get_template_part('header');
?>
<div class="filter-container">
<div class="project-info"></div>
    <div class="categories">
        <div class='tabs'>
            <h3>Categories</h3>
            <div class="projects-types"></div>
        </div>
        <div class="search-bar">
            <h3>Search</h3>
            <label>
                <input class="search-project" id="search-project" data-project-type="search-project" />
            </label>
        </div>
    </div>

    <div class="projects-container"></div>
</div>
<div id="loading-bar-spinner" class="spinner">
    <div class="spinner-icon"></div>
</div>

<?php get_template_part('footer'); ?>
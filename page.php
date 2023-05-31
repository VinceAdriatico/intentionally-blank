<?php
get_template_part('header');

if( has_post_thumbnail() ) {
    $bg = get_the_post_thumbnail_url(); 
} else {
    $bg = get_template_directory_uri() . '/images/Cap-Hero.jpeg';
}
?>
<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
    <section class='section hero wf-section' style='background-image: url(<?php echo esc_url($bg); ?>);'>
        <div class='wrapper'>
            <div class='hero-text-block'>
                <h1 class='hero-heading'><?php echo get_the_title(); ?></h1>
                <?php if(has_excerpt()) { ?>
                    <p><?php echo get_the_excerpt(); ?></p>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
<?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>


<?php get_template_part('footer'); ?>
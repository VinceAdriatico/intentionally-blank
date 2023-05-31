<?php get_template_part('header'); ?>

<div class="message-404">

    <h1><?php esc_html_e( 'Page not found.', 'wpgood' ); ?></h1>

    <p>It looks like nothing was found at this location. Please select one of our menu links or <a href="<?php echo esc_url( home_url( '/' ) ); ?>">visit our home page</a>.</p>

</div>

<?php include( locate_template( 'footer.php', false, false ) ); ?>

<footer id="footer">
    <div class="footers">
        <div class="section footer wf-section">
            <div class="wrapper">

                <div class="two-column">

                    <div id="w-node-_0838e7b1-a365-eb9c-48f8-3130aff9edd7-aff9edd3"
                        class="footer-menu-block border-gradient border-gradient-purple">
                        <div class="footer-menu-grid">
                            <div id="w-node-_0838e7b1-a365-eb9c-48f8-3130aff9edd9-aff9edd3" class="footer-menu">
                                <ul>
                                    <?php
                                    $footerItems = wp_get_nav_menu_items('footer-main-menu', array('order' => 'DESC'));
                                    foreach ($footerItems as $item) {
                                        $title = $item->title;
                                        $link = $item->url;
                                        $class = $item->classes[0];
                                        ?>
                                        <li>
                                            <a href='<?= $link; ?>' title='<?= $title; ?>'
                                                class='footer-link w-inline-block <?= $class; ?>'>
                                                <div>
                                                    <?= $title; ?>
                                                </div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <a href="/" class="footer-logo w-inline-block"><img
                                src="<?php echo esc_url(get_template_directory_uri() . "/images/OAS-White.svg"); ?>"
                                loading="lazy" alt="" class="logo-white"></a>
                    </div>

                    <div id="w-node-_0838e7b1-a365-eb9c-48f8-3130aff9edf5-aff9edd3" class="footer-form-block">
                        <h3>Get in touch, we would love to help find your next jet!</h3>
                        <div id="footer--form">
                            <?php echo do_shortcode('[gravityform id="6" title="false" description="false"]'); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-bottom wf-section">
            <div class="wrapper">
                <div class="two-column">
                    <div id="w-node-ec15ebdd-ab44-9d7d-874a-7885ed0369b1-ed0369ae" class="social-block">
                        <a target="_blank" href="<?php echo get_field('facebook_url', 'options'); ?>"
                            class="social-url w-inline-block"><img
                                src="<?php echo esc_url(get_template_directory_uri() . "/images/facebook_icon.svg"); ?>"
                                loading="lazy" alt="" class="image"></a>
                        <a target="_blank" href="<?php echo get_field('twitter_url', 'options'); ?>"
                            class="social-url w-inline-block"><img
                                src="<?php echo esc_url(get_template_directory_uri() . "/images/twitter_icon.svg"); ?>"
                                loading="lazy" alt="" class="image"></a>
                        <a target="_blank" href="<?php echo get_field('linkedin_url', 'options'); ?>"
                            class="social-url w-inline-block"><img
                                src="<?php echo esc_url(get_template_directory_uri() . "/images/linkedin_icon.svg"); ?>"
                                loading="lazy" alt="" class="image"></a>
                    </div>
                    <div id="w-node-ec15ebdd-ab44-9d7d-874a-7885ed0369b8-ed0369ae" class="copyright-block">
                        <div class="copyright-text">
                            <?php the_delimited_date(); ?> all rights reserved | © Copyright 2023. <a href="https://station8branding.com/" target="_blank">Website by Station8.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=64259d0566af612283829868"
    type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="<?php echo esc_url(get_template_directory_uri() . "/js/webflow.js"); ?>" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>
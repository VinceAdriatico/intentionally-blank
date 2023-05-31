<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html data-wf-page="64259d0566af6154cf829869" data-wf-site="64259d0566af612283829868" <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <title>
        <?php wp_title(''); ?>
    </title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script
        type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154659741-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-154659741-1');
    </script>

</head>

<body <?php body_class(); ?>>

    <div class="page-wrapper">

        <header>
            <div data-collapse="none" data-animation="default" data-duration="400" data-easing="ease"
                data-easing2="ease" role="banner" class="navbar w-nav">
                <div class="header-top">
                    <div class="top-bar-content">
                        <div class="top-left-block">
                            <a href='tel:18003596664' rel='noreferrer' class="top-link w-inline-block">
                                <div>+1 800 FLY OMNI</div>
                            </a>
                        </div>
                        <div class="top-right-block">
                            <?php
                            $utilItems = wp_get_nav_menu_items('utility-menu', array('order' => 'DESC'));
                            foreach ($utilItems as $item) {
                                $title = $item->title;
                                $link = $item->url;
                                $class = $item->classes;
                                $classt = '';
                                foreach($class as $cl) {
                                    $classt .= " $cl";
                                }
                                ?>
                                <a href='<?= $link; ?>' title='<?= $title; ?>'
                                    class='top-link w-inline-block <?= $classt; ?>'>
                                    <div>
                                        <?= $title; ?>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="background-animation"></div>
                </div>
                <div class="wrapper navbar-wrapper">
                    <div class="left-navbar">
                        <a href="/" aria-current="page" class="brand w-nav-brand w--current"><img
                                src="<?php echo esc_url(get_template_directory_uri() . "/images/OAS-Fullcolor-RGB.svg"); ?>"
                                loading="lazy" alt="" class="logo"></a>
                        <div data-w-id="daa62615-7085-cf47-4f2b-bf94f57b1ab7" class="full-menu-button">
                            <div data-is-ix2-target="1" class="menu-lottie"
                                data-w-id="daa62615-7085-cf47-4f2b-bf94f57b1ab8" data-animation-type="lottie"
                                data-src="<?php echo esc_url(get_template_directory_uri() . "/json/menu-nav.json"); ?>"
                                data-loop="0" data-direction="1" data-autoplay="0" data-renderer="svg"
                                data-default-duration="2.875" data-duration="0" data-ix2-initial-state="0"></div>
                        </div>
                    </div>
                    <div class="menu-wrapper">
                        <nav role="navigation" class="nav-menu w-nav-menu">
                            <div class="navigation-links">
                                <?php
                                $menuItems = wp_get_nav_menu_items('main-menu', array('order' => 'DESC'));
                                foreach ($menuItems as $item) {
                                    $title = $item->title;
                                    $link = $item->url;
                                    $class = $item->classes;
                                    $classt = '';
                                    foreach($class as $cl) {
                                        $classt .= " $cl";
                                    }
                                    $page = get_post_meta($item->ID, '_menu_item_object_id', true);
                                    if (is_page($page)):
                                        $active = 'w--current';
                                    else:
                                        $active = '';
                                    endif;
                                    $add = $active;

                                    ?>
                                    <a href='<?= $link; ?>' title='<?= $title; ?>'
                                        class='nav-link w-inline-block <?= $classt; ?> <?= $add; ?>'>
                                        <div class="button-text">
                                            <?= $title; ?>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </nav>
                        <div class="w-nav-button">
                            <div data-is-ix2-target="1" class="menu-lottie"
                                data-w-id="daa62615-7085-cf47-4f2b-bf94f57b1acf" data-animation-type="lottie"
                                data-src="<?php echo esc_url(get_template_directory_uri() . "/json/menu-nav.json"); ?>"
                                data-loop="0" data-direction="1" data-autoplay="0" data-renderer="svg"
                                data-default-duration="2.875" data-duration="0" data-ix2-initial-state="0"></div>
                        </div>
                        <div class="navigation-cover"></div>
                    </div>
                    <div class="mega-menu">
                        <div class="large-menu-wrapper">
                            <div id="w-node-daa62615-7085-cf47-4f2b-bf94f57b1ad3-f57b1a9e"
                                class="projects-search-wrapper">
                                <div id="w-node-daa62615-7085-cf47-4f2b-bf94f57b1ad4-f57b1a9e"
                                    class="mega-social-wrapper">
                                    <div class="team-social-wrapper">
                                        <a href="https://www.linkedin.com/company/" target="_blank"
                                            class="team-social-icon outline w-inline-block"><img
                                                src="<?php echo esc_url(get_template_directory_uri() . "/images/linkedin.svg"); ?>"
                                                loading="lazy" alt=""></a>
                                        <a href="https://twitter.com/" target="_blank"
                                            class="team-social-icon outline w-inline-block"><img
                                                src="<?php echo esc_url(get_template_directory_uri() . "/images/twitter.svg"); ?>"
                                                loading="lazy" alt=""></a>
                                        <a href="https://www.youtube.com/" target="_blank"
                                            class="team-social-icon outline w-inline-block"><img
                                                src="<?php echo esc_url(get_template_directory_uri() . "/images/YT.svg"); ?>"
                                                loading="lazy" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div id="w-node-daa62615-7085-cf47-4f2b-bf94f57b1adc-f57b1a9e" class="tablet-mobile-menu">
                                <?php
                                $mobileItems = wp_get_nav_menu_items('mobile-menu', array('order' => 'DESC'));
                                foreach ($mobileItems as $item) {
                                    $title = $item->title;
                                    $link = $item->url;
                                    $class = $item->classes;
                                    $classt = '';
                                    foreach($class as $cl) {
                                        $classt .= " $cl";
                                    }
                                    ?>
                                    <a href='<?= $link; ?>' title='<?= $title; ?>'
                                        class='nav-link w-inline-block <?= $classt; ?>'>
                                        <div class="button-text">
                                            <?= $title; ?>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                            <div id="w-node-daa62615-7085-cf47-4f2b-bf94f57b1af2-f57b1a9e"
                                class="tablet-mobile-nav-links">
                                <div class="navigation-links">
                                    <a href="#" class="nav-link btn w-inline-block btn buy-aircraft">
                                        <div class="button-text">Buy an aircraft</div>
                                    </a>
                                    <a href="#" class="nav-link btn w-inline-block btn sell-aircraft">
                                        <div class="button-text">Sell your aircraft</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mega-menu-overlay"></div>
                </div>
                <div class='popup-form-container' id='popup-form'>
                    <h2>
                        <?= get_field('popup_form_title', 'options'); ?>
                    </h2>
                    <div class='subtitle'>
                        <p>I'd like to talk about</p>
                        <div class="switches-container">
                            <input type="radio" id="switchBuying" name="switchPlan" value="Buying"
                                checked="checked" />
                            <input type="radio" id="switchSelling" name="switchPlan" value="Selling" />
                            <label for="switchBuying" class='switch-button'>Buying</label>
                            <label for="switchSelling" class='switch-button'>Selling</label>
                            <div class="switch-wrapper">
                                <div class="switch">
                                    <div class='buying'>Buying</div>
                                    <div class='selling'>Selling</div>
                                </div>
                            </div>
                        </div>
                        <p>an aircraft</p>
                    </div>
                    <?= do_shortcode('[gravityform id="8" title="true"]'); ?>
                    <span class='close-form-popup'>X</span>
                </div>
            </div>
        </header>
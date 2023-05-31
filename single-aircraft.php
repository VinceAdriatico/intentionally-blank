<?php
/**
 * 
 * Template Name: Aircraft
 * 
 * Template for Aircraft'
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package aerovision
 * 
 */

if (!defined('ABSPATH')) {
    exit;
}

get_template_part('/partials-new/header-new');

?>
<?php if (have_posts()): ?>
    <?php while (have_posts()): ?>
        <?php the_post();
        // Get meta information
        $video = get_field('aircraft_video');
        $main = get_field('ac_main_image');
        $images = get_field('aircraft_images');

        // aircraft info
        $model = get_field('ac_model', $id);
        $nNumber = get_field('ac_n_number', $id);
        $serial = get_field('ac_serial_number', $id);
        $year = get_field('ac_year', $id);
        $model = get_field('ac_model', $id);

        // specs
        $highlights = get_field('ac_highlights', $id);
        $performance = get_field('ac_performance', $id);
        $interior = get_field('ac_interior', $id);
        $speed = get_field('ac_speed', $id);

        // contact
        $pdf = get_field('ac_pdf', $id);
        $phone = get_field('ac_phone_rep', $id);

        // Render pdf if avail
        if ($pdf) {
            $pdfTag = "<a href='$pdf' class='pdf'>PDF Prochure</a>";
        } else {
            $pdfTag = '';
        }

        // Render phone if avail
        if ($phone) {
            $phoneTag = "<a href='tel:$phone' rel='nofollow' class='contact-rep'>Contact Rep</a>";
        } else {
            $phoneTag = '';
        }

        ?>
        <section class='section aircraft wf-section'>'
            <div class='aircraft-popup static'>
                <div class='air-pop media'>
                    <div class='featured'>
                        <?php if ($video): ?>
                            <video controls>
                                <source src='<?= $video; ?>' type='video/mp4'>
                            </video>
                        <?php else: ?>
                            <a href='<?= $main; ?>' data-lightbox='aircraft'>
                                <img src='<?= $main; ?>' alt='<?= get_the_title(); ?>' />
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php
                    $counter = 1;
                    if (have_rows('ac_images')) { ?>
                        <div class='thumbnails outer-wrapper'>
                            <?php
                            while (have_rows('ac_images')) {
                                the_row();

                                // meta information
                                $src = get_sub_field('ac_image');
                                $img = wp_get_attachment_image_url($src, 'large');
                                $count = count($src); 
                                ?>
                                <?php if( $counter > 1 ): ?>
                                <a href='<?= $img; ?>' data-lightbox='aircraft'>
                                    <img src='<?= $img; ?>' />
                                </a>
                                <?php endif; ?>
                                <?php
                                $counter++;
                            } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class='air-pop info'>
                    <h2>
                        <?= $listing; ?>
                        <?= $year; ?>
                        <?= $model; ?>
                    </h2>
                    <h5>
                        <?= $nNumber; ?> |
                        <?= $serial; ?>
                    </h5>
                    <div class='specs'>
                        <ul>
                            <li><a data-project-type='performance' class='active spec-tab'>Performance</a></li>
                            <li><a data-project-type='interior' class='spec-tab'>Interior</a></li>
                            <li><a data-project-type='speed' class='spec-tab'>Speed</a></li>
                        </ul>
                        <div class='specContainer'>
                            <div id='performance' class='spec show'>
                                <?= $performance; ?>
                            </div>
                            <div id='interior' class='spec'>
                                <?= $interior; ?>
                            </div>
                            <div id='speed' class='spec'>
                                <?= $speed; ?>
                            </div>
                        </div>
                        <div class='cta'>
                            <?= $phoneTag; ?>
                            <?= $pdfTag; ?>
                        </div>
                    </div>
                </div>
                <a class='close-pop' href='/inventory'>X <span>Go to Inventory</span></a>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<script>
    jQuery(document).on('click', '.spec-tab', function () {
        // Get clicked tabs value
        var select = jQuery(this).data('projectType');

        // remove active from all listed items
        var tabs = document.getElementsByClassName('spec-tab');
        for (var i = 0; i < tabs.length; i++) {
            tabs[i].classList.remove('active');
        }
        jQuery(this).addClass('active');

        // hide all spec tabs
        var elements = document.getElementsByClassName('spec');
        for (var i = 0; i < elements.length; i++) {
            elements[i].classList.remove('show');
        }
        // show spec
        var activeTab = document.getElementById(select);
        activeTab.classList.add('show');
    })
</script>
<?php get_template_part('footer'); ?>
<?php 
	$bg_img = get_sub_field('background_image');
	$copy   = get_sub_field('copy');
?>

<section class="skypass-banner">
	<div class="container-fluid">
		<div class="row skypass-banner-image" style="background-image: url(<?php echo $bg_img['url']; ?>);">
			<div class="card-cont"><?php get_template_part('images/inline', 'skypass-card-paths'); ?></div>
		</div>
		<div class="skypass-copy-row row">
			<div class="skypass-lower-copy col-lg-3 offset-lg-3 col-md-6 offset-md-3">
				<?php echo $copy; ?>
			</div>
		</div>
</section>

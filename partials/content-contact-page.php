<?php
	$copy = get_sub_field('copy');
	$image = get_sub_field('background_image');
?>

<section class="contact-section" style="background-image: url(<?php echo $image['url']; ?>);">
	<div class="container-fluid">
		<div class="row contact-container will_animate">
			<hr id="contact-striped-bar" class="repeating-linear-gradient-vertical white">
			<div class="contact-info">
				<div class="fade_in_up"><?php echo $copy; ?></div>
				<h2 class="white fade_in_up">Have a question?</h2>
				<div class="contact-form-opener fade_in_up"></div>
			</div>
			<div class="contact-form-cont">
				<?php gravity_form( 4, false, false, false, '', true ); ?>
			</div>
		</div>
	</div>
</section>


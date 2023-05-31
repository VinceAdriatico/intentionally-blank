<?php 
//------VARIABLES
	$bg_left = get_sub_field('background_left');
	$button_left = get_sub_field('button_left');
	$copy_left = get_sub_field('copy_left');
	$bg_right = get_sub_field('background_right');
	$button_right = get_sub_field('button_right');
	$copy_right = get_sub_field('copy_right');
?>

<section class="cta-block">
	<div class="container-80">
		<div class="row will_animate">
			<div class="col-md-6 cta-left">
				<div class="cta-image-container">
					<img src="<?php echo $bg_left['url']; ?>" alt="<?php echo $bg_left['alt']; ?>" />
				</div>
				<div class="cta-copy-block will_animate">
					<?php echo $copy_left; ?>
					<a class="btn-light fade_in_up" href="<?php echo $button_left['url']; ?>"><?php echo $button_left['title']; ?></a>
				</div>
			</div>
			<div class="col-md-6 cta-right">
				<div class="cta-image-container">
					<img src="<?php echo $bg_right['url']; ?>" alt="<?php echo $bg_right['alt']; ?>" />
				</div>
				<div class="cta-copy-block will_animate">
					<?php echo $copy_right; ?>
					<a class="btn-light fade_in_up" href="<?php echo $button_right['url']; ?>"><?php echo $button_right['title']; ?></a>
				</div>
			</div>
		</div>		
	</div>	
</section>
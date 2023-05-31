<?php
	$subheading	   = get_sub_field('subheading');
	$heading	   = get_sub_field('heading');
	$copyleft 	   = get_sub_field('copy_left');
	$copyright 	   = get_sub_field('copy_right');
	$has_striped_decorator = get_sub_field('has_striped_decorator');
	$column = get_sub_field('column');
?>

<section class="fullpage--copy-section fp-auto-height will_animate">
	<div class="container">
		<div class="row">
			<?php if( $has_striped_decorator ) : ?>
			<hr class="repeating-linear-gradient blue">
			<?php endif; ?>
			<div class="col-md-12 fade_in_up">
				<h3 class="oas-red h2"><?php echo $subheading; ?></h3>
				<h2 class="oas-blue h1"><?php echo $heading; ?></h2>
				<?php if( $column ) : ?> 
					<?php echo $copyleft; ?>
				<?php else: ?>
			</div>
			<div class="col-md-6 fade_in_up">
				<?php echo $copyleft; ?>
			</div>
			<div class="col-md-6 fade_in_up">
				<?php echo $copyright; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
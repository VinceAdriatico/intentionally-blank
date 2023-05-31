<?php 
	$style = get_sub_field('slider_style');
	$has_bg_text = get_sub_field('has_background_text');
?>

<section id="revSlider" class="revolving-slider will_animate <?php echo $style; ?>" data-type="<?php echo $style; ?>">
	<div class="container-fluid">
		<?php
			if( $style == 'regular-rev-slider'){
				include( locate_template( 'templates/regular-rev-slider.php') );
			} else if( $style == 'alt-rev-slider' ){
				include( locate_template( 'templates/alt-rev-slider.php') );
			} else {
				include( locate_template( 'templates/cta-rev-slider.php') );
			}
		?>
	</div>
</section>
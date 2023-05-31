<?php 
	if(is_page(1020)){
		$indicator = 'Brokerage';
	} else if (is_page(1019)){
		$indicator = 'Acquisition';
	} else {
		$indicator = false;
	}
?>
<section class="process-banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 will_animate" style="background-image:url(<?php echo get_sub_field('ts_bg_image')['url']; ?>);">
				<div class="fade_in_up" style="z-index: 100;"><?php echo get_sub_field('ts_banner_copy'); ?></div>
			</div>		
		</div>
	</div>
</section>
<?php $i = 0; 
	if( have_rows('testimonial_step') ) : ?>	
<section class="process-steps">
	<div class="container-90">
		<div class="row">
						
			<?php	
				while( have_rows('testimonial_step') ) : the_row();				
				$number = get_sub_field('ts_heading_copy');
				$heading = get_sub_field('ts_heading');
				$desc = get_sub_field('ts_description');
			?>
			<div class="process_step col-lg-6">
				<div class="will_animate">
					<div class="step-top d-flex fade_in_up">
						<div class="step-top-copy">
							<p class="process_number"><span><?php echo $number; ?></span><span class="step-top-slash">&nbsp;//&nbsp;</span><?php if ($indicator !== false): ?><span class="step-top-page-indicator"><?php echo $indicator; ?></span><?php endif; ?></p>
							<h2><?php echo $heading; ?></h2>
						</div>
					</div>	
					<div class="step-bottom fade_in_up">
						<?php echo $desc; ?>
					</div>
				</div>				
			</div>
			<?php $i++;	endwhile; ?>						
		</div>
	</div>
	<div class="repeating-linear-gradient-vertical blue"></div>
	<div class="solid-linear-gradient-vertical blue"></div>
</section>
<?php endif; ?>

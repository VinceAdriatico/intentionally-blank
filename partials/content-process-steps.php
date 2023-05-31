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
			<div class="col-12 will_animate" style="background-image:url(<?php echo get_sub_field('ps_bg_image')['url']; ?>);">
				<div class="fade_in_up"><?php echo get_sub_field('ps_banner_copy'); ?></div>
			</div>		
		</div>
	</div>
</section>
<section class="process-subcopy">
	<div class="container-80">
		<div class="row">
			<div class="col-xl-6 col-md-8 col-12 will_animate">
				<div class="fade_in_up"><?php echo get_sub_field('ps_subcopy'); ?></div>
			</div>		
		</div>
	</div>
</section>
<?php $i = 0; 
	if( have_rows('process_step') ) : ?>	
<section class="process-steps">
	<div class="container-90">
		<div class="row">
						
			<?php	
				while( have_rows('process_step') ) : the_row();				
				$number = get_sub_field('ps_prefix');
				$heading = get_sub_field('ps_heading');
				$desc = get_sub_field('ps_description');
				$icon = get_sub_field('ps_icon');
				$image = get_sub_field('ps_image');
			?>
			<div class="process_step d-flex col-12 ">
				<div class="col-xl-6 will_animate">
					<div class="step-top d-flex fade_in_up">
						<div class="step-top-copy">
							<p class="process_number"><span><?php echo $number; ?></span><span class="step-top-slash">&nbsp;//&nbsp;</span><?php if ($indicator !== false): ?><span class="step-top-page-indicator"><?php echo $indicator; ?></span><?php endif; ?></p>
							<h2><?php echo $heading; ?></h2>
						</div>
											
						<div class="step-top-icon">
							<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
						</div>
					</div>	
					<div class="step-bottom fade_in_up">
						<?php echo $desc; ?>
					</div>
				</div>
				<div class="col-xl-6">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
				
			</div>
			<?php $i++;	endwhile; ?>						
		</div>
	</div>
	<div class="repeating-linear-gradient-vertical blue"></div>
	<div class="solid-linear-gradient-vertical blue"></div>
</section>
<?php endif; ?>

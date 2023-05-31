<section class="scrollable-slider">
	<div class="container-90">
		<div class="row">
			<?php if( have_rows('ss_slide') ): ?>
			<div id="scrollable_slider" class="carousel carousel-fade" data-ride="carousel">
							
				<div class="carousel-inner col-lg-6" role="listbox">
				<?php $i=0; ?>	
				<?php while( have_rows('ss_slide') ): the_row(); 					
					$slide_image = get_sub_field('ss_slide_image');	
					$slide_explanation = get_sub_field('ss_slide_explanation');	
					$slide_icon = get_sub_field('ss_slide_icon');				
				?>
				
					<?php	
					if ($i == 0) {
							echo '<div class="carousel-item active">';
					} else {
							echo '<div class="carousel-item">';
					}
					?>				
						<div class="ss_slide_inner will_animate" style="background-image: url(<?php echo $slide_image['sizes']['scrollable']; ?>);">
							<div class="ss_slide_explanation fade_in_up"><div class="ss_inslide_icon_container"><img src="<?php echo $slide_icon['url']; ?>" alt="<?php echo $slide_icon['alt']; ?>" /></div><p><?php echo $slide_explanation; ?></p></div>
						</div>					
					</div>			
					<?php $i++; ?>
				<?php endwhile; ?>	
				</div>
				
				<ol class="carousel-indicators col-lg-6 will_animate">
				<?php $i=0; ?>	
				<?php while( have_rows('ss_slide') ): the_row(); $slide_copy = get_sub_field('ss_slide_copy'); $slide_icon = get_sub_field('ss_slide_icon'); ?>
				    <li data-target="#scrollable_slider" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {echo 'class="active"';} ?>>
				    	<div class="ss_icon_container"><img src="<?php echo $slide_icon['url']; ?>" alt="<?php echo $slide_icon['alt']; ?>" /></div>
				    	<p class="h3 fade_in_up"><?php echo $slide_copy; ?></p>		
				    </li>			    
				<?php $i++; ?>
				<?php endwhile; ?>	   
				</ol>						
			
			<?php endif; ?>
		</div>
	</div>
</section>

<?php 	
	$gallery_title = get_sub_field('sg_title');
	$gallery_subtitle = get_sub_field('sg_subtitle');
?>

<section class="slider--gallery">
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			
			<?php if( have_rows('sg_slides') ): ?>
			<div id="gallery_slider" class="carousel carousel-fade" data-ride="carousel">				
				
				<div class="carousel-inner" role="listbox">
				<?php $i=0; ?>	
				<?php while( have_rows('sg_slides') ): the_row(); 
					$slide_title = get_sub_field('sg_slide_title');
					$slide_image = get_sub_field('sg_slide_image');
					$slide_copy = get_sub_field('sg_slide_copy');
				?>
				
					<?php	
					if ($i == 0) {
							echo '<div class="carousel-item active">';
					} else {
							echo '<div class="carousel-item">';
					}
					?>				
						<div class="slide_inner" style="background-image: url(<?php echo $slide_image['url']; ?>); ">
							<div class="col-lg-6 col-12">	
								<h3 class="oat-blue fade_in_up"><?php echo $slide_title; ?></h3>					
								<p class="fade_in_up"><?php echo $slide_copy; ?></p>			
							</div>
						</div>					
					</div>			
					<?php $i++; ?>
				<?php endwhile; ?>	
					
				</div>	
				
				<div class="slider--gallery__title will_animate">
					<h2 class="oat-blue fade_in_up"><?php echo $gallery_title; ?></h2>
					<p class="oat-red fade_in_up"><?php echo $gallery_subtitle; ?></p>
				</div>
				
				<ol class="carousel-indicators">
				<?php $i=0; ?>	
				<?php while( have_rows('sg_slides') ): the_row(); $slide_image = get_sub_field('sg_slide_image'); ?>
				    <li data-target="#gallery_slider" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {echo 'class="active"';} ?> style="background-image: url(<?php echo $slide_image['sizes']['thumbnail']; ?>);"></li>			    
				<?php $i++; ?>
				<?php endwhile; ?>	   
				</ol>			
			</div>
			<?php endif; ?>
			
			
			
		</div>
	</div>
</section>

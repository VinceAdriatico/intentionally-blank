<section class="slider--timeline">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<h2><?php the_sub_field('timeline_title'); ?></h2>
		</div>
		<div class="row">
		<?php $i = 0; ?>	
		<?php if( have_rows('years') ): ?>
			<div class="timeline-slides">			
				<?php while( have_rows('years') ): the_row(); 			
					// vars
					$image = get_sub_field('tsy_image');
					$copy = get_sub_field('tsy_copy');
					$year = get_sub_field('tsy_year');			
					?>			
					<div class="timeline-slide d-flex <?php echo ($i == 0) ? 'active enlarged' : '' ?>">
						<div class="timeline-slide-image-container">
							<div class="timeline-slide-image" style="background-image: url(<?php echo $image['url'];//['sizes']['scrollable']; ?>);">
								
							</div>
						</div>
						<div class="timeline-slide-copyblock">
							<div class="timeline-copy">
								<?php echo $copy; ?>
							</div>
							<div class="timeline-year oat-red h2">
								<?php echo $year; ?>
							</div>
						</div>
					</div>
				<?php $i++; ?>				
				<?php endwhile; ?>	
			</div>			
		<?php endif; ?>	
		<div class="prev-year team-control oat-blue-bg"></div>
		<div class="next-year team-control oat-blue-bg visible"></div>		
		</div>
	</div>
</section>

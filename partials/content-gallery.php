<section class="gallery-section">
	<div class="container-fluid">
		<div class="row">
			<div id="tab-gallery">
			<?php if( have_rows('full_gallery_images') ): ?>
			<div class="gallery-inner">
			    <?php while ( have_rows('full_gallery_images') ) : the_row(); 
			    	$image = get_sub_field('full_gallery_image');
			    ?>
			        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endwhile; ?>
			</div>	
			<?php endif; ?>
			</div>
			<!--<div class="prev-scroll"></div>
			<div class="next-scroll"></div>-->
		</div>
	</div>
</section>

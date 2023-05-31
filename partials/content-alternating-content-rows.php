<?php
	
?>
<section class="alt-content-section">
	<div class="container-fluid">
		<div class="row">
			<?php 
				$i = 0;
				if( have_rows('rows') ) :
				while( have_rows('rows') ) : the_row();
				$image = get_sub_field('image');
				$copy = get_sub_field('copy');
				
				if( $i === 0 ){
					$image_classes = ' col-lg-7 col-md-6';
					$copy_classes = ' col-lg-5 col-md-6 will_animate';
				} else if( $i === 1 ){
					$image_classes = ' col-lg-5';
					$copy_classes = ' col-lg-4 offset-lg-3 will_animate';
				} else if( $i === 2 ){
					$image_classes = '';
					$copy_classes = ' will_animate';
				}
			?>
			<div id="alt-content-row-<?php echo $i; ?>" class="alt-content-row d-flex">
				<div class="alt-content-row-image col-md-6 col-12<?php echo $image_classes; ?>" style="background-image: url(<?php echo $image['url']; ?>);"></div>
				<div class="alt-content-row-copy col-md-6 col-12<?php echo $copy_classes; ?>">
					<?php echo $copy; ?>
				</div>
			</div>
			<?php $i++; endwhile; endif; ?>
		</div>
	</div>
</section>
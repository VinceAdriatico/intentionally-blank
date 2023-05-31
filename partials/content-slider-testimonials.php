<?php
	$bg_img = get_sub_field('bg_image');
?>

<section class="tst-slider-section fullpage--banner" style="background-image: url(<?php echo $bg_img; ?>);">
	<div class="container-fluid">
		<div class="row">
			<div class="tst-carousel">
				<?php
					$i = 0;
					if( have_rows('tst_slides') ) :
					while( have_rows('tst_slides') ) : the_row();
					
					$copy = get_sub_field('tst_copy');
					$author = get_sub_field('tst_author');
					$title = get_sub_field('tst_title');
				?>
				
				<div class="tst-carousel-item<?php if($i === 1) echo ' active'; ?>" tst-index="<?php echo $i + 1; ?>">
					<div class="tst-copy">
						<?php echo $copy; ?>
					</div>
					<div class="tst-author">
						-&nbsp;<?php echo $author; ?>
					</div>
					<div class="tst-author-title">
						<em><?php echo $title; ?></em>
					</div>
				</div>
				
				<?php $i++; endwhile; endif;?>
			</div>
				
			<div class="white-bar">
				<div class="repeating-linear-gradient white"></div>
				<div class="solid-linear-gradient white"></div>
				<div class="repeating-linear-gradient white"></div>
			</div>
			
			<div class="all-testimonials">
				<a href="/testimonials" class="btn-dark">View all testimonials</a> 
			</div>

		</div>
	</div>
</section>

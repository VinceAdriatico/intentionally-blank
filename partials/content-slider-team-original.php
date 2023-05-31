<?php 
	$heading = get_sub_field('team_heading');
?>

<section class="team-section">
	<div class="container-fluid">
		<div class="row">
			<div class="team-copy">
				<p class="oas-blue"><?php echo $heading; ?></p>
			</div>
		</div>
		<div id="team-indicator"></div>
		<hr id="team-bar" class="repeating-linear-gradient blue">
		<div class="prev-team team-control oat-blue-bg"></div>
		<div class="next-team team-control visible oat-blue-bg"></div>
		<div class="row team-slider-cont">
			
			<div class="team-slider">
				<?php 				
					$args = array(
						'post_type' => 'team',
						'posts_per_page' => -1,
					); 
					$query = new WP_Query( $args );
					$i = 0;
					if( $query->have_posts() ) :
					while( $query->have_posts() ) : $query->the_post(); 
					
					$image = get_the_post_thumbnail_url();
					$title = get_field('title');
					
					if( $i == 0 ) {
						$first_post = $post;
						$first_post_image = $image;
						$video_mp4  = get_field('video_mp4');
						$vide_webm  = get_field('video_webm');
						$fp_title   = get_field('title');
					}
				?>
				<div id="<?php echo $post->ID; ?>" class="team-member<?php if($i == 0) echo ' active'; ?>">
					<div class="team-member--pic" style="background-image: url(<?php echo $image; ?>);"></div>
					<p class="team-member--name nomargin b h4"><?php the_title(); ?></p>
					<p class="sm-text"><?php echo $title; ?></p>
				</div>
				<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
			</div>
			
		</div>
		<div class="row active-team--row">
			<div class="active-team--visual active-team--col">
				<img src="<?php echo $first_post_image; ?>" alt="">
			</div>
			<div class="active-team--copy-cont active-team--col">
				<h5 class="active-team--info oas-red"><?php echo $fp_title; ?></h5>
				<div class="active-team--copy">
					<?php echo apply_filters('the_content', $first_post->post_content);?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
	$heading = get_sub_field('team_heading');
	
	$args = array(
		'post_type' => 'team',
		'posts_per_page' => -1,
	); 
	$team_query = new WP_Query( $args );
?>

<section class="team-section">
	<div class="container-fluid">
		<div class="row">
			<div class="team-heading">
				<p class="oas-blue"><?php echo $heading; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-12">
				<div class="team-slider">
					<div class="team-sliding-cont">
						<?php 
						$i = 0;
						if( $team_query->have_posts() ) :
						while( $team_query->have_posts() ) : $team_query->the_post(); 
						
						$image = get_the_post_thumbnail_url();
						$title = get_field('title');
						
						
						if( $i == 0 ) {
							$first_post = $post;
							$first_post_image = $image;
							$video_mp4  = get_field('video_mp4');
							$vide_webm  = get_field('video_webm');
							$fp_name 	= get_the_title();
							$fp_title   = get_field('title');
							$fp_vcard   = get_field('vcard');
						}
					?>
						<div id="<?php echo $post->ID; ?>" class="team-member<?php if($i == 0) echo ' active'; ?>" data-index="<?php echo $i; ?>">
							<img class="team-member--pic" src="<?php echo $image; ?>">
							<div class="team-member--copy">
								<p class="team-member--name nomargin b h4"><?php the_title(); ?></p>
								<p class="sm-text"><?php echo $title; ?></p>
							</div>
						</div>
						<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>
				<i id="prevTeamPage" class="team-control hidden" data-dir='up'></i>
				<i id="nextTeamPage" class="team-control" data-dir='down'></i>
			</div>
			<div class="col-lg-8 col-12 active-team--col">
				<div class="team-closer"><span></span><span></span></div>
				<div class="active-team--container row">
					<div class="col-lg-5">
						<img class="active-team--image" src="<?php echo $first_post_image; ?>">
						
						<a href="<?php echo $fp_vcard; ?>"><img src="https://omniaircraftsales.com/wp-content/uploads/2019/03/email.svg" alt="<?php echo $fp_name; ?> vcard" style="width: 1.6em; margin-top: .5em"/></a>
					</div>
					<div class="col-lg-7 active-team--content-cont">
						<p class="active-team--name nomargin b h4 oas-red"><?php echo $fp_name; ?></p>
						<p class="active-team--title h5 oas-blue"><?php echo $fp_title; ?></p>
						<hr id="team-bar" class="repeating-linear-gradient blue">
						<div class="active-team--copy">
							<?php echo apply_filters('the_content', $first_post->post_content);?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
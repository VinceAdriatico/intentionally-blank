<?php 
	
	$args = array(
		'post_type' => 'team',
		'status' => 'published',
		'posts_per_page' => -1,
	); 
	$team_query = new WP_Query( $args );
?>


<section class="team-section">
	<div class="container-fluid">
		<div class="row">			
		<?php 
			if( $team_query->have_posts() ) :
			while( $team_query->have_posts() ) : $team_query->the_post(); 	
				$post = $post;
				$image = get_the_post_thumbnail_url();
				$title = get_field('title');		
				$post_image = $image;
				$video_mp4  = get_field('video_mp4');
				$vide_webm  = get_field('video_webm');
				$name 	= get_the_title();
				$title   = get_field('title');
				$vcard   = get_field('vcard');
		?>
			<div class="col-lg-4 team_member">
				<img class="active-team--image" src="<?php echo $post_image; ?>">
				<p class="active-team--name b h4 oas-red"><?php echo $name; ?></p>
				<p class="active-team--title h5 oas-blue"><?php echo $title; ?>&nbsp;//&nbsp;&nbsp;<a href="<?php echo $vcard; ?>"><img src="https://omniaircraftsales.com/wp-content/uploads/2019/03/id-card.svg" alt="<?php echo $name; ?> vcard" style="width: 1.2em;"/></a></p>
				<hr id="team-bar" class="repeating-linear-gradient blue">
				<div class="active-team--copy">
					<?php echo apply_filters('the_content', $post->post_content);?>							
				</div>
			</div>
		<?php endwhile; endif; ?>
		</div>
	</div>
</section>
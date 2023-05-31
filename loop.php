<?php 
	$i = 1;
	$is_faqs = is_post_type_archive('faqs');
	if ( have_posts() ) :
?>
<div id="post-container" class="col-lg-9 col-12<?php if( $is_faqs ) echo ' faqs'?>">
	<?php
	if( $is_faqs ) :
		while( have_posts() ) { 
			the_post();
			
			get_template_part('partials/content', 'faq');
		}
	else : ?>
	
<?php while ( have_posts() ): the_post(); 
	$month = get_the_date('F, ');
	$day = get_suffixed_day( get_the_date('j') );	
?>
			<div class="blog_gallery_item post col-md-6">
				<a href="<?php the_permalink(); ?>">
				<div class="blog_gallery_inner">
					<?php the_post_thumbnail('blog-gallery-image', array('class' => 'blog_gallery_image') ); ?>
					<div class="blog_gallery_copy">
						<h2 class="oas-blue"><?php the_title(); ?></h2>
						<h4 class="oas-red"><?php 
							$post_tags = get_the_tags();
 
							if ( $post_tags ) {
							    foreach( $post_tags as $tag ) {
							    	echo $tag->name; 
							    }
							}
						?></h4>
						<p class="oas-dark_gray">Posted <?php echo $month . $day; echo ' - ';  the_author(); ?></p>
					</div>
				</div>
				</a>
			</div>	
	
<?php $i++; endwhile; ?>
<?php endif; ?>
</div>
<?php endif; ?>
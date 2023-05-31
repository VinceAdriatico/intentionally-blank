<?php 
	global $post; 
	$month = get_the_date('F, ');
 	$day = get_suffixed_day( get_the_date('j') );
?>

<article class="single-post col-lg-9">
		<!--<ul class="post-type-categories">
		<li class="post-category">Categories //</li>
		<?php 
			$terms = wp_get_post_categories($post->ID, array( 'fields' => 'all'));

			$index = 0;
			foreach( $terms as $term) :
			$term_name = $term->name;
			
			if( $index !== count($terms) - 1 ){ $term_name .= " //"; } //Add trailing slashes to category name.
		?>
		<li class="post-category oas-blue"><a href="/category/<?php echo $term->slug;?>"><?php echo $term_name; ?></a></li>
		<?php $index++; endforeach; ?>
	</ul>-->
	<?php the_post_thumbnail('single-blog-image', array('class' => 'post-image') ); ?>
	<h1 class="post-title oas-blue"><?php the_title(); ?></h1>
	<h4 class="post-title oas-red"><?php 
							$post_tags = get_the_tags();
 
							if ( $post_tags ) {
							    foreach( $post_tags as $tag ) {
							    	echo $tag->name; 
							    }
							}
						?></h4>
	<p class="post-date oas-dark_gray">Posted <?php echo $month . $day; echo ' - '; the_author(); ?></p>
	<div class="post-content">
		<?php the_content(); ?>
	</div>

	<hr id="post-separator" class="repeating-linear-gradient blue">
</article>


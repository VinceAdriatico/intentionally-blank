<?php 
/*  Template Name: Passenger Info   */
	get_template_part('header');
	
	$pid = 43; //Passenger Info Page id
	
	//Variable fields
	$bg_img = get_field('bg_img', $pid);
	$copy 	= get_field('banner_copy', $pid);
	$post_count = wp_count_posts('faqs');
	
	
	//Get Career Types
	$terms = get_terms(array(
		'taxonomy' 	 => 'faq-types',
		'hide_empty' => false
	));
	
	$faq_args = array(
		'post_type' => 'faqs',
		'order' 	=> 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'faq-types',
				'field' => 'slug',
				'terms' => $terms[0]->slug
			)
		)
	);
	$faq_query = new WP_Query($faq_args);
?>
<viewport class="viewport">
<main id="main-content">
	
<section class="career--bnr_cont banner-overlay" style="background-image: url(<?php echo $bg_img; ?>);">
	<div class="container-fluid">
		<div class="row">
			<div class="career--bnr_copy_cont white">
				<h1><?php echo wp_title(''); ?></h1>
				<div><?php echo $copy; ?></div>
			</div>
		</div>
	</div>
	<div class="career--cat_cont">
		<div class="career--inner_cat_cont">
		<?php
			$i = 0;
			foreach( $terms as $term ) :
			
			if( $i == 0 ):
			?>
			<div class="career--cat white active" data-slug="<?php echo $term->slug; ?>">
				<?php echo $term->name; ?>
			</div>
		<?php
			$i++; 
			continue;
			endif;
		?>
			<div class="career--cat white" data-slug="<?php echo $term->slug; ?>">
				<?php echo $term->name; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="career--main_cont">
	<div class="container-fluid">
		<div class="faq-list row flex-column col-lg-6 offset-lg-3">
			<h3 class="faq-title oat-blue"><?php echo $terms[0]->name; ?></h3>
			<?php
			$i = 0;
			if( $faq_query->have_posts() ) :
			while( $faq_query->have_posts() ) : $faq_query->the_post();
			?>
			<div class="faq-item">
				<p class="faq-arrow"><a class="oat-red" data-toggle="collapse" href="#faq<?php echo $i?>"><?php the_title(); ?></a></p>
				<div class="collapse" id="faq<?php echo $i; ?>">
					<div class="faq-content oat-blue">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</section>


	
	
<?php get_template_part('footer'); ?>
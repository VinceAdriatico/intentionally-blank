<?php 
    // Get Header
    get_template_part('/partials-new/header-new');
?>

<section id="blog">
	<div class="container-fluid">
		<div class="row">
			<?php 
				if( is_single() ){
					get_template_part('single-post-type'); 
				}else{
					get_template_part('loop'); 
				}
				get_template_part('sidebar');
			?>
		</div>
	</div>
</section>

<?php get_template_part('footer'); ?>
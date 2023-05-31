<?php
	$image = get_sub_field('background_image');
	$copy = get_sub_field('copy');
	$author = get_sub_field('author');
?>

<section class="animated-logo-banner will_animate" style="background-image: url(<?php echo $image['url']; ?>);">
	<div class="container-fluid">
		<div class="row">
			<div class="animated-logo-copy-cont">
				<?php //get_template_part('images/inline', 'OAS-Mark-closed.svg'); 
					get_template_part('images/inline', 'OAS-Mark-dot');
					get_template_part('images/inline', 'OAS-Mark-plane');
				?>
				<p class="animated-logo-copy oas-blue h4 fade_in_up"><?php echo $copy; ?> </p>
				<p class="animated-logo-author oas-blue fade_in_up"><?php echo $author; ?></p>
			</div>
		</div>
	</div>
</section>
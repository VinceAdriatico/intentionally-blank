<?php 
//------VARIABLES
	$title = get_sub_field('ct_title');
	$copy = get_sub_field('ct_copy');
?>

<section class="comparison">
	<div class="container-90">
		<div class="row justify-content-center will_animate">
			<div class="col-md-7">
				<h2 class="h1 fade_in_up"><?php echo $title; ?></h2>
				<p class="h4 fade_in_up"><?php echo $copy; ?></p>
			</div>
		</div>
		<?php if( have_rows('ct_table') ): ?>
		<div class="row justify-content-center">
			<div class="col-12 table-controls">
			<?php $i = 0; ?>		
			<?php while( have_rows('ct_table') ): the_row(); 
				$tb_title = get_sub_field('table_title');	
			?>

				<a class="table-control <?php echo ($i == 1 ? "active" : ""); ?>" id="tab-<?php echo $i; ?>"><?php echo $tb_title; ?></a>

			<?php $i++; ?>
			<?php endwhile; ?>
			</div>
		</div>
		<div class="row comparison--container will_animate">			
			<?php while( have_rows('ct_table') ): the_row(); 
				// vars
				$tb_icon = get_sub_field('table_icon');
				$tb_title = get_sub_field('table_title');
				$tb_copy = get_sub_field('table_main_copy');
				$tb_link = get_sub_field('table_link');			
			?>		
			<div class="comparison--table">		
				<h3 class="h4 fade_in_up"><?php echo $tb_title; ?></h3>
				<?php if($tb_icon): ?><img src="<?php echo $tb_icon['sizes']['medium']; ?>" alt="<?php echo $tb_icon['alt']; ?>" /><?php endif; ?>
				<?php if($tb_copy): ?><p class="fade_in_up"><?php echo $tb_copy; ?></p><?php endif; ?>
				<hr class="hr-large oat-red-bg">
				<?php if( have_rows('features') ): ?>
				<ul>
					<?php while( have_rows('features') ): the_row(); 
						// vars
						$ft_icon = get_sub_field('feature_icon');
						$ft_copy = get_sub_field('feature_copy');
					?>
						<li class="fade_in_up">
							<img src="<?php echo $ft_icon['url']; ?>" alt="<?php echo $ft_icon['url']; ?>" />
							<?php echo $ft_copy; ?>
							<hr class="hr-small oat-dark_gray">
						</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
				<?php if($tb_link): ?>
				<div class="lightlink oat-light_blue-bg">
					<a href="<?php echo $tb_link['url']; ?>"><?php echo $tb_link['title']; ?></a>
				</div>
				<?php endif; ?>
			</div>			
			<?php endwhile; ?>		
		</div>		
		<?php endif; ?>
	</div>	
</section>
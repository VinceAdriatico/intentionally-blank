<?php 
	$heading = get_sub_field('ls_slide_heading');
?>
<section class="logo-slider">
	<div class="container-fluid">
		<div class="row">
			<div class="ls_slide--heading-cont col-lg-6 offset-lg-3 col-8 offset-2 text-center">
				<h2><?php echo $heading; ?></h2>
			</div>
			<div class="ls_slide--content">
				<div class="ls_slide--titles col-lg-4 col-12">
				<?php 
					$i = 0;
					if( have_rows('ls_slide') ) :
					while( have_rows('ls_slide') ) : the_row();
					
					$logo = get_sub_field('ls_slide_sm_logo');
					$title = get_sub_field('ls_slide_logo_title');
				?>
				<div id="lstitle-<?php echo $i; ?>" class="ls_slide--title<?php if( $i == 0 ) echo ' active'?>" data-lsTitle-id="<?php echo $i;?>">
					<img class="ls_slide--sm-logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
					<p><?php if( $title !== '' ) { echo $title; }?></p>
				</div>
				<?php $i++; endwhile; endif; ?>
				</div>
				<div class="ls_slide--cur-logo col-lg-4">
				<?php
					$i = 0;
					if( have_rows('ls_slide') ) :
					while( have_rows('ls_slide') ) : the_row();
					
					$logo = get_sub_field('ls_slide_lg_logo');
				?>
					<img id="lsimage-<?php echo $i; ?>" class="ls_slide--main-logo<?php if( $i == 0 ) echo ' active'?>" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
				<?php
					
					$i++; endwhile; endif; 
				?>
				</div>
				<div class="ls_slide--copy-cont col-lg-4">
				<?php 
					$i = 0;
					if( have_rows('ls_slide') ) :
					while( have_rows('ls_slide') ) : the_row();
					
					$copy = get_sub_field('ls_slide_copy');
				?>
					<div id="lscopy-<?php echo $i; ?>" class="ls_slide--copy<?php if( $i == 0 ) echo ' active'?> sm-text">
						<?php echo $copy; ?>
					</div>
				<?php $i++; endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

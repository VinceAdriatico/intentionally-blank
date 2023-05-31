<?php
	$link = get_sub_field('gallery_cta');
	$image_sizes = array('340x280', '900x600', '350x350', '200x350', '1200x600', '550x350', '450x350', '650x550');
	$images = array();
	
	$index = 0;
	if( have_rows('full_gallery_images') ) {
		while( have_rows('full_gallery_images') ) {
			the_row();
			$img = get_sub_field('full_gallery_image');
			
			$size = $image_sizes[$index];
			
			$src = wp_get_attachment_image_src($img, $size);
			
			if( $src == false){
				$temp_src = wp_get_attachment_image_src($img);
				$src = $temp_src[0];
			}
			
			array_push($images, $src[0]);
			
			$index++;
		}
	} 
	
?>
<!--
<div class="fg--first-row fg--row">
	<img class="fg--img1 gallery-image" src="<?php echo $images[0]; ?>">
	<img class="fg--img2 gallery-image" src="<?php echo $images[1]; ?>">
	<img class="fg--img3 gallery-image" src="<?php echo $images[2]; ?>">
</div>
<div class="fg--second-row d-flex fg--row">
	<div class="fg--col-left">
		<img class="fg--img4 gallery-image" src="<?php echo $images[3]; ?>">
		<img id="middleImg" class="fg--img5 gallery-image" src="<?php echo $images[4]; ?>">
	</div>
	<div class="fg--col-right d-flex flex-column">
		<img class="fg--img6 gallery-image" src="<?php echo $images[5]; ?>">
		<div class="fg--cta"><a class="arrow arrow--blue arrow--red_border" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div>
	</div>
</div>
<div class="fg--third-row fg--row">
	<img class="fg--img7 gallery-image" src="<?php echo $images[6]; ?>">
	<img class="fg--img8 gallery-image" src="<?php echo $images[7]; ?>">
</div>
-->

<div class="fg--first-row fg--row">
	<div class="fg--img1"><img class="gallery-image" src="<?php echo $images[0]; ?>"></div>
	<div class="fg--img2"><img class="gallery-image" src="<?php echo $images[1]; ?>"></div>
	<div class="fg--img3"><img class="gallery-image" src="<?php echo $images[2]; ?>"></div>
</div>
<div class="fg--second-row d-flex fg--row">
	<div class="fg--col-left">
		<div class="fg--img4"><img class="gallery-image" src="<?php echo $images[3]; ?>"></div>
		<div class="fg--img5"><img class="gallery-image" src="<?php echo $images[4]; ?>"></div>
	</div>
	<div class="fg--col-right d-flex flex-column">
		<div class="fg--img6"><img class="gallery-image" src="<?php echo $images[5]; ?>"></div>
		<div class="fg--cta"><a class="arrow arrow--blue arrow--dark_red_bg" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div>
	</div>
</div>
<div class="fg--third-row fg--row">
	<div class="fg--img7"><img class="gallery-image" src="<?php echo $images[6]; ?>"></div>
	<div class="fg--img8"><img class="gallery-image" src="<?php echo $images[7]; ?>"></div>
</div>
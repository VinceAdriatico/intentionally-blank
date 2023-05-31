
<?php
	$link = get_sub_field('gallery_cta');
	$image_sizes = array('550x375', '450x250', '850x550', '350x350', '850x550', '340x450', '450x350', '600x400', '300x330');
	$images = array();
	$mobile_images = array();
	
	$str = '';
	$index = 0;
	if( have_rows('diagonal_gallery_images') ) {
		while( have_rows('diagonal_gallery_images') ) {
			the_row();
			$img = get_sub_field('diagonal_gallery_image');
			
			$size = $image_sizes[$index];
			
			$src = wp_get_attachment_image_src($img, $size);
			$mobile_src = wp_get_attachment_image_src($img, '350x350');
			
			if( $src == false){
				$temp_src = wp_get_attachment_image_src($img);
				$src = $temp_src;
			}
			if( $mobile_src == false ){
				$temp_src = wp_get_attachment_image_src($img);
				$mobile_src = $temp_src;
			}
			
			array_push($images, $src[0]);
			array_push($mobile_images, $mobile_src[0]);
			
			
			$index++;
		}
	} 
?>
<div class="dg--first-row fg--row">
	<div class="dg--col-left d-flex flex-column">
		<div class="dg--img1"><img class="gallery-image" src="<?php echo $images[0]; ?>" data-mobile-version="<?php echo $mobile_images[0]?>"></div>
		<div class="dg--img2"><img class="gallery-image" src="<?php echo $images[1]; ?>" data-mobile-version="<?php echo $mobile_images[1]?>"></div>
	</div>
	<div class="dg--img3"><img class="gallery-image" src="<?php echo $images[2]; ?>" data-mobile-version="<?php echo $mobile_images[2]?>"></div>
	<div class="dg--img4"><img class="gallery-image" src="<?php echo $images[3]; ?>" data-mobile-version="<?php echo $mobile_images[3]?>"></div>
</div>
<div class="dg--second-row d-flex fg--row">
		
	<div class="dg--img5"><img class="gallery-image" src="<?php echo $images[4]; ?>" data-mobile-version="<?php echo $mobile_images[4]?>"></div>
	<div class="dg--img6"><img class="gallery-image" src="<?php echo $images[5]; ?>" data-mobile-version="<?php echo $mobile_images[5]?>"></div>
	<div class="dg--img7"><img class="gallery-image" src="<?php echo $images[6]; ?>" data-mobile-version="<?php echo $mobile_images[6]?>"></div>
</div>
<div class="dg--third-row fg--row">
	<div class="dg--img8"><img class="gallery-image" src="<?php echo $images[7]; ?>" data-mobile-version="<?php echo $mobile_images[7]?>"></div>
	<div class="dg--img9"><img class="gallery-image" src="<?php echo $images[8]; ?>" data-mobile-version="<?php echo $mobile_images[8]?>"></div>
</div>
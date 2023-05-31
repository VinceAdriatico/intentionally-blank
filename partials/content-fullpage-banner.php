<?php 
//------VARIABLES
	$section_id 		  = get_sub_field('section_id');
    $img                  = get_sub_field('fb_bg_image');
    $title                = get_sub_field('fb_title');
    $title_size           = get_sub_field('fb_title_size');
    $copy                 = get_sub_field('fb_copy');
    $bg_overflow          = get_sub_field('bg_overflow');
    $has_video_bg         = get_sub_field('has_video_bg');
    $is_cta_banner        = get_sub_field('cta_banner');
    $text_position        = get_sub_field('text_position');
    $text_style 		  = get_sub_field('text_style');
    $has_icon             = get_sub_field('has_icon');
    $has_background_text  = get_sub_field('has_background_text');
    $has_overlay          = get_sub_field('has_overlay');
    $for_skypass          = get_sub_field('for_skypass');
    
    //String variable creation
    if( $section_id ){
	    $section_id_string = 'id="' . $section_id . '"';
    }else{
	    $section_id_string = '';
    }
    $bg_img_string = 'style="background-image: url(' . $img . ');"';
    
    //Determine text alignment and visibility
    if( $text_position === 'left' ){ $textcont_class_list = ' offset-md-2'; } //if the text is on the left
    else if( $text_position === 'center' ){ $textcont_class_list = ' offset-lg-3 offset-1 centered'; } //if the text is in the middle
    else if( $text_position === 'right' ){ $textcont_class_list = ' offset-lg-6 offset-4'; } //if the text is on the right side
    
    if( $for_skypass == 1 ){ $textcont_class_list = ' skypass-copy'; } //if the banner is for the skypass
    if( $bg_overflow ){ $textcont_class_list = ' offset-md-4 centered-bnr-text'; } //if the banner overflows
    
    //If the banner has a video
    if( $has_video_bg ){
        if( have_rows('video_options') ) :
        while( have_rows('video_options') ) : the_row();
            $mp4  = get_sub_field('mp4_video');
            $webm = get_sub_field('webm_video');
            $loops = get_sub_field('loop');
            if( $loops == 1 ){
	            $loop_str = 'loop="true" autoplay="true" playsinline="true"';
	            $scrolling_video = 'playsinline="true"';
            } else{
	            $loop_str = '';
	            $scrolling_video = 'id="scroll-video"';
            }
            
        endwhile;
        endif;
        
        $video_el = <<<HTML
        <div {$scrolling_video} class="video-contain">
            <video muted {$loop_str}">
                <source src="{$mp4['url']}" type="video/mp4">
                <source src="{$webm['url']}" type="video/webm">
            </video>
        </div>
HTML;
    }
    //If the banner has a call-to-action
    if( $is_cta_banner ){
        $link          = get_sub_field('fb_link');
        $link_color = get_sub_field('fb_link_color');
        $link_style = get_sub_field('fb_link_style');
    }
    
    if( $has_background_text ){ $bg_text = get_sub_field('fb_bg_text'); }
    
    if( $has_icon ){ 
        $icon = get_sub_field('icon');
        
        $icon_el = "<img class='fullpage--banner_icon' src='" . $icon['url'] . "' alt='" . $icon['alt'] . "'>";
        $textcont_class_list .= ' offset';
    }
    
    if( $text_style === 'dark' ){
	    $textcont_class_list .= ' oat-blue';
    } else if( $text_style === 'light' ){
	    $textcont_class_list .= ' white';
    }
    
?>
<section <?php echo $section_id_string; ?> class="fullpage--banner<?php if( $bg_overflow ){echo ' bnr-oflow'; } if( $has_overlay ){ echo ' banner-overlay'; } if( $for_skypass ){ echo ' fullpage--skypass-banner'; } ?>" <?php if( !$bg_overflow ) echo $bg_img_string; ?>>
	<?php if( $has_video_bg ) echo $video_el; //if it's a video background ?>
	<?php if( $bg_overflow ) echo "<div class='banner-overflow' " . $bg_img_string . "></div>"; //if the bg should overflow, add a new div w/ bg image ?>
	<div class="container-fluid">
		<div class="row">
			<?php if($for_skypass == 1) : ?>
			<div class="skypass-col will_animate col-lg-6 d-flex justify-content-center align-items-center">
				<?php get_template_part('images/inline', 'skypass-card-paths'); ?>
			</div>
			<?php endif;?>
			<div class="col-lg-6 col-8 will_animate<?php echo $textcont_class_list; ?>">
				<?php if( $has_icon )  echo $icon_el; ?>
				<<?php echo $title_size; ?> class="fade_in_up"><?php echo $title; ?></<?php echo $title_size; ?>>
				<p class="fade_in_up"><?php echo $copy; ?></p>
				<?php if( $is_cta_banner ) : ?><a class="arrow arrow--white <? echo $link_style . ' ' . $link_color; ?>" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a><?php endif; ?>
			</div>
		</div>
	</div>
	<div id="scrolldown"><img src="https://omniaircraftsales.com/wp-content/uploads/2019/02/chevron-arrow-down.png" alt="scroll down icon" /></div>
	<?php if( $has_background_text ) : ?><div class="fb-bg-text"><?php echo $bg_text; ?></div><?php endif; ?>
</section>
<?php

if (!function_exists('blank_setup')):
	function blank_setup()
	{
		register_sidebar(
			array(
				'name' => __('Main Sidebar', 'intentionally-blank'),
				'id' => 'sidebar',
				'desciption' => __('All widgets in this area will be shown in the sidebar in the Knowledge Base', 'intentionally-blank'),
				'before_title' => '<h2 class="widget-title oas-blue">',
				'after_title' => '</h2>'
			)
		);
		load_theme_textdomain('intentionally-blank');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');

		// This theme allows users to set a custom background.
		add_theme_support(
			'custom-background',
			apply_filters(
				'intentionally_blank_custom_background_args',
				array(
					'default-color' => 'f5f5f5',
				)
			)
		);

		add_theme_support('custom-logo');
		add_theme_support(
			'custom-logo',
			array(
				'height' => 256,
				'width' => 256,
				'flex-height' => true,
				'flex-width' => true,
				'header-text' => array('site-title', 'site-description'),
			)
		);

		add_theme_support('post-thumbnails'); // Add featured image to posts

		function blank_custom_logo()
		{
			if (function_exists('the_custom_logo')) {
				return get_custom_logo();
			} else {
				return '';
			}
		}
	}
endif; // blank_setup
add_action('after_setup_theme', 'blank_setup');

function blank_customizer_cleanup($wp_customize)
{
	$wp_customize->remove_section('static_front_page');
}
add_action('customize_register', 'blank_customizer_cleanup');

function register_my_menus()
{
	register_nav_menus(
		array(
			'main-menu' => __('Main Menu'),
			'utility-menu' => __('Utility Menu'),
			'passenger-menu' => __('Passenger Info Menu'),
			'mobile-menu' => __('Mobile Menu'),
			'footer-main-menu' => __('Footer Main Menu'),
			'footer-utility-menu' => __('Footer Utility Menu')
		)
	);
}
add_action('init', 'register_my_menus');

function get_suffixed_day($str)
{
	$day = $str;
	$num = intval($str);

	if ($num === 1 || $num === 21 || $num === 31) {
		$day .= 'st';
	} elseif ($num === 2 || $num === 22) {
		$day .= 'nd';
	} else {
		$day .= 'th';
	}
	return $day;
}

function s8_add_image_sizes()
{
	add_image_size('single-blog-image', 1500, 500, false);
	add_image_size('blog-gallery-image', 750, 500, false);
	add_image_size('blog-category-image', '', 360, true);
	add_image_size('scrollable', 960, 720, true);
}
add_action('after_setup_theme', 's8_add_image_sizes');

function fire_up_your_brand_scripts()
{
	// wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.2.1', true );
	// wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style('style', get_stylesheet_uri() . '');
	//   wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.1.2', true );   
	// wp_enqueue_script('timeline-lite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TimelineMax.min.js');
	// wp_enqueue_script('tween-lite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js');
	// wp_enqueue_script('laxjs', 'https://cdn.jsdelivr.net/npm/lax.js');

	// wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
	//  wp_enqueue_script('jquery-js', 'https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=64259d0566af612283829868');

	//wp_enqueue_script( 'scrollmagic', get_template_directory_uri() . '/js/ScrollMagic.js' );
	//wp_enqueue_script( 'scollmagic-gsap', get_template_directory_uri() . '/js/animation.gsap.js' );
	//wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '4.0.0', true );   
	// wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js?v1.1', array(), '1.0.0', true);
	// wp_enqueue_script('jquery-inview', get_template_directory_uri() . '/js/jquery.inview.min.js', array('jquery'));
	// wp_enqueue_script('coutup', get_template_directory_uri() . '/js/countUp.js');
	// wp_enqueue_style('edcss', get_template_directory_uri() . '/css/ed.css?v1.2');
	// wp_enqueue_script('edjs', get_template_directory_uri() . '/js/ed.js?v=1.2');


	/**
	 *  Add Scripts
	 */
	if( is_front_page() ) {
		wp_enqueue_script('countUp', get_template_directory_uri() . '/js/countUp.min.js', array('jquery'), filemtime(get_template_directory_uri() . '/js/countUp.min.js'));
		// wp_enqueue_script('home', get_template_directory_uri() . '/js/home.js', array('jquery'), filemtime(get_template_directory_uri() . '/js/home.js'));
	}

	wp_enqueue_script('nav-menu', get_template_directory_uri() . '/js/nav-menu.js', array('jquery'), filemtime(get_template_directory_uri() . '/slick/nav-menu.js'));

	wp_enqueue_style('slick', get_template_directory_uri() . '/slick/slick.css');
	wp_enqueue_script('slick', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), filemtime(get_template_directory_uri() . '/slick/slick.min.js'));

	// Lightbox
	wp_enqueue_style('lightbox', get_template_directory_uri() . '/css/lightbox.css');
	wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.js');

	// Webflow CSS
	wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), filemtime(get_template_directory_uri() . '/css/normalize.css'));
	wp_enqueue_style('webflow', get_template_directory_uri() . '/css/webflow.css', array(), filemtime(get_template_directory_uri() . '/css/webflow.css'));
	wp_enqueue_style('oas-webflow', get_template_directory_uri() . '/css/oas.css', array(), filemtime(get_template_directory_uri() . '/css/oas.css'));

	// Custom CSS
	wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), filemtime(get_template_directory_uri() . '/css/custom.css'));

	// wp_enqueue_script('webflow', get_template_directory_uri() . '/js/webflow.js', array('jquery'), '', true);
	wp_enqueue_style('inventory-css', get_template_directory_uri() . '/css/inventory-css.css', array(), filemtime(get_template_directory_uri() . '/css/inventory-css.css'));

	if (is_page('inventory')) {

		// Add inventory ajax script
		wp_enqueue_script('inventory', get_template_directory_uri() . '/js/inventory-ajax.js', array('jquery'), filemtime(get_template_directory_uri() . '/js/inventory-ajax.js'));
		if (isset($_SERVER['HTTPS']))
			$protocol = 'https://';
		else
			$protocol = 'http://';

		// pass Ajax Url to inventory.js
		wp_localize_script('inventory', 'ajaxurl', admin_url('admin-ajax.php', $protocol));
	}

	if (is_page('contact')) {
		wp_enqueue_script('contact', get_template_directory_uri() . '/js/contact.js', array('jquery'), filemtime(get_template_directory_uri() . '/js/contact.js'));

		if (isset($_SERVER['HTTPS']))
			$protocol = 'https://';
		else
			$protocol = 'http://';

		// pass Ajax Url to contact.js
		wp_localize_script('contact', 'ajaxurl', admin_url('admin-ajax.php', $protocol));
	}
}
add_action('wp_enqueue_scripts', 'fire_up_your_brand_scripts');


function enqueue_scripts_styles_init()
{
	wp_enqueue_script('getteam', get_stylesheet_directory_uri() . '/js/ajax-script.js', array('jquery'), 1.0);
	wp_localize_script('getteam', 'ajax_object', array('ajaxurl' => site_url('/wp-admin/admin-ajax.php'))); // setting ajaxurl
}
add_action('init', 'enqueue_scripts_styles_init');

function theme_slug_setup()
{
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_slug_setup');

function custom_excerpt_length($length)
{
	return 10;
}
add_filter('excerpt_length', 'custom_excerpt_length', 10);

function get_blog_post()
{
	$id = $_POST['id'];
	$blog_post = get_post($id);
	$col1 = get_field('column_1', $id);
	$col2 = get_field('column_2', $id);
	// 	var_dump($blog_post);
	?>
	<div class="general-career career-post--col1 col-lg-6 col-12">
		<div>
			<p class="h5 oat-blue">
				<?php echo $blog_post->post_title ?>
			</p>
		</div>
		<div class="general-career-copy">
			<?php echo $col1; ?>
		</div>
	</div>
	<div class="general-career career-post--col2 col-lg-6 col-12">
		<?php echo $col2; ?>
	</div>
	<?php
	die();
}
add_action('wp_ajax_getblogpost', 'get_blog_post');
add_action('wp_ajax_nopriv_getblogpost', 'get_blog_post');

function get_blog_by_cat()
{
	$slug = $_POST['slug'];
	if ($slug == 'all') {
		$post_args = array(
			'post_type' => 'post',
		);
	} else {
		$post_args = array(
			'post_type' => 'post',
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $slug,
				),
			),
		);
	}
	$post_query = new WP_Query($post_args);
	if ($post_query->have_posts()):
		while ($post_query->have_posts()):
			$post_query->the_post(); ?>
			<div class="career--item fade_in_up">
				<h4 class="oat-blue open-post" data-post-id="<?php echo $post->ID; ?>"><?php the_title(); ?></h4>
				<p>
					<?php the_excerpt(); ?>
				</p>
				<p class="open-post oat-blue career--right-arrow" data-post-id="<?php echo get_the_ID(); ?>">Read More</p>
			</div>
		<?php endwhile; endif;
	wp_reset_postdata();
	die();
}
add_action('wp_ajax_getblogcat', 'get_blog_by_cat');
add_action('wp_ajax_nopriv_getblogcat', 'get_blog_by_cat');

function the_delimited_date()
{
	$site_launch_year = 2018;
	$date = getdate();
	$str = '&copy;';
	if ($date['year'] > $site_launch_year) {
		$str .= $site_launch_year . ' - ' . $date['year'] . ' ' . get_bloginfo('name');
	} else {
		$str .= $site_launch_year;
	}
	echo $str;
}

function _thz_enable_vcard_upload($mime_types)
{
	$mime_types['vcf'] = 'text/vcard';
	$mime_types['vcard'] = 'text/vcard';
	return $mime_types;
}
add_filter('upload_mimes', '_thz_enable_vcard_upload');

// Add custom post types
require get_template_directory() . '/inc/custom-post-types.php';

// Add gravity form custom functionality
require get_template_directory() . '/inc/custom-gravity-forms.php';

// Add disable comments
require get_template_directory() . '/inc/disable-comments.php';

// Add dashboard modifications
require get_template_directory() . '/inc/dashboard.php';

// Add inventory ajax
require get_template_directory() . '/inc/inventory-ajax.php';

// Add contact ajax
require get_template_directory() . '/inc/contact-ajax.php';

// Add ACF integrations
require get_template_directory() . '/inc/acf-integrations.php';


/**
 *  Custom Filters
 */
function custom_search_form($form)
{
	$form = '<form role="search" method="get" id="wf-form-inv-search" data-name="inv-search" class="inv-search" action="' . home_url('/') . '" >
	  <input type="text" value="' . get_search_query() . '" name="s" id="s" class="search-input w-input" id="name"/>
	  <input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '" class="serchbtn w-button" />
	  
	</form>';

	return $form;
}

add_filter('get_search_form', 'custom_search_form', 100);

add_filter('next_posts_link_attributes', 'previous_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'next_posts_link_attributes');
function previous_posts_links_attributes()
{
	return 'class="previous-btn w-inline-block';
}
function next_posts_links_attributes()
{
	return 'class="next-btn w-inline-block';
}
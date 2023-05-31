<?php
/**
 * Custom Post Types and functions
 */

// -----------CREATING CUSTOM POST TYPE : Aircrafts--------
function s8aircrafts(){
	$labels = array(
		'name'               => _x( 'Aircrafts', 'post type general name', 's8' ),
		'singular_name'      => _x( 'Aircraft', 'post type singular name', 's8' ),
		'menu_name'          => _x( 'Aircrafts', 'admin menu', 's8' ),
		'name_admin_bar'     => _x( 'Aircraft', 'add new on admin bar', 's8' ),
		'add_new'            => _x( 'Add New', 'Aircraft', 's8' ),
		'add_new_item'       => __( 'Add New Aircraft', 's8' ),
		'new_item'           => __( 'New Aircraft', 's8' ),
		'edit_item'          => __( 'Edit Aircraft', 's8' ),
		'view_item'          => __( 'View Aircraft', 's8' ),
		'all_items'          => __( 'All Aircrafts', 's8' ),
		'search_items'       => __( 'Search Aircrafts', 's8' ),
		'parent_item_colon'  => __( 'Parent Aircraft:', 's8' ),
		'not_found'          => __( 'No aircrafts found.', 's8' ),
		'not_found_in_trash' => __( 'No aircrafts found in Trash.', 's8' )
	);
	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 's8' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'aircraft' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'show_in_rest' 		 => true,
		'supports'           => array( 'title')
	);
	register_post_type( 'aircraft', $args);
}
add_action('init', 's8aircrafts');

// Add the columns for "Aircrafts" post type
function add_acf_columns($columns) {
    $columns = array(
           'cb' => '<input type="checkbox" />',
           'title' => 'Title',
           'ac_acquired_copy' => 'Acquired/Inventory',
           'date' => 'Date',
       );
    return $columns;
}
add_filter('manage_edit-aircraft_columns', 'add_acf_columns');
   
// Render the custom columns for "Aircrafts" post type
function render_acf_columns($column_name) {
    global $post;
    switch ($column_name) {
    case 'ac_acquired_copy':
    $acquired = get_field($column_name, $post->ID);
    if(!empty($acquired)) { 	 
        echo(sprintf( '<span class="acf-field %s">%s</span>', $column_name, 'Acquired' ) );
    } else {
        echo(sprintf( '<span class="acf-field %s">%s</span>', $column_name, 'Inventory' ) ); 
    }
        break;
    }
}
add_action('manage_aircraft_posts_custom_column', 'render_acf_columns', 10, 2);
   
function get_aircraft_content_callback() {
    $post_id = $_POST['post_id'];
    if ( $post_id == 0 ) {
        echo "Invalid Input";
        die();
    }
    $thispost = get_post( $post_id );
    if ( !is_object( $thispost ) ) {
        echo 'There is no post with the ID ' . $post_id;
        die();
    }
    $args = array(  'post_type' => 'aircraft', 'p' => $post_id);
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $content = get_template_part('aircraft-loop');			
        }
        wp_reset_postdata();
    }
    die();
}
add_action( 'wp_ajax_get_aircraft_content', 'get_aircraft_content_callback' );
add_action( 'wp_ajax_nopriv_get_aircraft_content', 'get_aircraft_content_callback' );

// -----------CREATING CUSTOM POST TYPE : TEAM--------
function s8team(){
	$labels = array(
		'name'               => _x( 'Team', 'post type general name', 's8' ),
		'singular_name'      => _x( 'Team', 'post type singular name', 's8' ),
		'menu_name'          => _x( 'Team', 'admin menu', 's8' ),
		'name_admin_bar'     => _x( 'Team', 'add new on admin bar', 's8' ),
		'add_new'            => _x( 'Add New', 'Team Member', 's8' ),
		'add_new_item'       => __( 'Add New Team Member', 's8' ),
		'new_item'           => __( 'New Team Member', 's8' ),
		'edit_item'          => __( 'Edit Team Member', 's8' ),
		'view_item'          => __( 'View Team Member', 's8' ),
		'all_items'          => __( 'All Team Members', 's8' ),
		'search_items'       => __( 'Search Team Members', 's8' ),
		'parent_item_colon'  => __( 'Parent Team Member:', 's8' ),
		'not_found'          => __( 'No team members found.', 's8' ),
		'not_found_in_trash' => __( 'No team members found in Trash.', 's8' )
	);
	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 's8' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'team' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'show_in_rest' 		 => true,
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);
    register_post_type( 'team', $args);
}
add_action('init', 's8team');
    
//TEAM AJAX CALL
function get_team(){
	$teamID = $_POST['teamID'];
	$team_post = get_post($teamID);
	$person_name = $team_post->post_title;
	$image = get_the_post_thumbnail_url($teamID);
	$person_title = $team_post->title;
	$vcard = get_field('vcard', $teamID)
	?>
	<div class="col-lg-5 col-12">
		<img class="active-team--image" src="<?php echo $image; ?>">
		<a href="<?php echo $vcard; ?>"><img src="https://omniaircraftsales.com/wp-content/uploads/2019/03/email.svg" alt="<?php echo $person_name; ?> vcard" style="width: 1.6em; margin-top: .5em"/></a>
	</div>
	<div class="col-lg-7 col-12 active-team--content-cont">
		<p class="active-team--name nomargin b h4 oas-red"><?php echo $person_name; ?></p>
		<p class="active-team--title h5 oas-blue"><?php echo $person_title; ?></p>
		<hr id="team-bar" class="repeating-linear-gradient blue">
		<div class="active-team--copy">
			<?php echo apply_filters('the_content', $team_post->post_content);?>
		</div>
	</div>
	<?php
	die();	
}
add_action('wp_ajax_getteam', 'get_team');
add_action('wp_ajax_nopriv_getteam', 'get_team');
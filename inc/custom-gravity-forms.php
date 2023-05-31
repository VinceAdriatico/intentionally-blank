<?php
/**
 * Custom Gravity Forms
 */

add_filter( 'gform_confirmation_anchor', '__return_true' );

function populate_posts( $form ) {
    foreach ( $form['fields'] as $field ) {
        if ( strpos( $field->cssClass, 'populate-aircrafts' ) === false ) {
            continue;
        }
		$args = array(
		  'numberposts' => -1,
		  'post_type'   => 'aircraft',
		  'meta_query'  => array(
				array(
				    'key' => 'ac_sold',
				    'value' => '0',
				    'compare' => '==' 
				),
				array(
				    'key' => 'ac_acquired_copy',
				    'value' => '0',
				    'compare' => '==' 
				)
			)
		);
        $posts = get_posts( $args);
        $choices = array();
		$choices[] = array('text' => "Help me choose my next aircraft", 'value' => 'help');
        foreach ( $posts as $post ) {
            $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
        }
		$choices[] = array('text' => "Other", 'value' => 'other');
        $field->placeholder = 'Select an aircraft';
        $field->choices = $choices;
    }
    return $form;
}
add_filter( 'gform_pre_render_3', 'populate_posts' );
add_filter( 'gform_pre_validation_3', 'populate_posts' );
add_filter( 'gform_pre_submission_filter_3', 'populate_posts' );
add_filter( 'gform_admin_pre_render_3', 'populate_posts' );

function populate_posts_footer( $form ) {
    foreach ( $form['fields'] as $field ) {
        if ( strpos( $field->cssClass, 'populate-aircrafts' ) === false ) {
            continue;
        }
		$args = array(
		  'numberposts' => -1,
		  'post_type'   => 'aircraft',
		  'meta_query'  => array(
				array(
				    'key' => 'ac_sold',
				    'value' => '0',
				    'compare' => '==' 
				),
				array(
				    'key' => 'ac_acquired_copy',
				    'value' => '0',
				    'compare' => '==' 
				)
			)
		);
        $posts = get_posts( $args);
        $choices = array();
		$choices[] = array('text' => "Help me choose my next aircraft", 'value' => 'help');
        foreach ( $posts as $post ) {
            $choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
        }
		$choices[] = array('text' => "Other", 'value' => 'other');
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select an aircraft';
        $field->choices = $choices;
    }
    return $form;
}
add_filter( 'gform_pre_render_1', 'populate_posts_footer' );
add_filter( 'gform_pre_validation_1', 'populate_posts_footer' );
add_filter( 'gform_pre_submission_filter_1', 'populate_posts_footer' );
add_filter( 'gform_admin_pre_render_1', 'populate_posts_footer' );

?>
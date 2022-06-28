<?php
/**
 * ACAM Gravity Forms
 *
 * @package acam
 */

namespace acam\inc;


function custom_action_after_apc( $entry, $form ) {

	if ( $form['id'] !== 1 ) {
		return;
	}
	// If the Advanced Post Creation add-on is used, more than one post may be created for a form submission
	// The post ids are stored as an array in the entry meta
	$created_posts = gform_get_meta( $entry['id'], 'gravityformsadvancedpostcreation_post_id' );
	foreach ( $created_posts as $post ) {
		$the_post = get_post( $post['post_id'] );

		$decode_content = wp_specialchars_decode($the_post->post_content);

		$the_post->post_content = $decode_content;

		wp_update_post( $the_post );

	}
};

add_action( 'gform_after_submission', __NAMESPACE__ . '\custom_action_after_apc', 10, 2 );

/**
 * Only one submit by User
 *
 * @author Alfredo Navas <elpuas@gmail.com>
 * @since 1.0.0
 * @param string $form_string
 * @param object $form
 * @return string returns form or alert
 */
function one_submit_per_user( $form_string, $form ) {


		$current_user = wp_get_current_user();

		$search_criteria = array(
			'status'        => 'active',
			'field_filters' => array( //which fields to search
				array(
					'key' => 'created_by', 'value' => $current_user->ID, //Current logged in user
				)
			)
		);
		$form_id = 6;
		$entry = GFAPI::get_entries( $form_id, $search_criteria );

		if ( !empty( $entry ) ) {
			$form_string = '<h2 class="text-center">Gracias tu voto ya esta Registrado</h2>';
		}
		return $form_string;
}

add_filter( 'gform_get_form_filter_6', __NAMESPACE__ . 'one_submit_per_user', 10, 2 );

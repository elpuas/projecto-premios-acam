<?php

/**
 * Catalina functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package acam
 */

/**
 * Get all the include files for the theme.
 *
 * @author Alfredo Navas <elpuas@gmail.com>
 */
function catalina_get_theme_include_files() {
	return [
		'inc/scripts.php', // Load styles and scripts.
		'inc/patterns.php', // Gutenberg patterns for this theme.
		'inc/gravity-forms.php', // Gravity Forms Customizations.
		'inc/extras.php', // WordPress Extras Customizations.
	];
}

foreach ( catalina_get_theme_include_files() as $include ) {
	require trailingslashit( get_template_directory() ) . $include;
}

/**
* Gravity Wiz // Gravity Forms // Post Permalink Merge Tag
* http://gravitywiz.com
*/
class GWPostPermalink {

	function __construct() {

		add_filter('gform_custom_merge_tags', array($this, 'add_custom_merge_tag'), 10, 4);
		add_filter('gform_replace_merge_tags', array($this, 'replace_merge_tag'), 10, 3);

	}

	function add_custom_merge_tag($merge_tags, $form_id, $fields, $element_id) {

		if(!GFCommon::has_post_field($fields))
			return $merge_tags;

		$merge_tags[] = array('label' => 'Post Permalink', 'tag' => '{post_permalink}');

		return $merge_tags;
	}

	function replace_merge_tag($text, $form, $entry) {

		$custom_merge_tag = '{post_permalink}';
		if(strpos($text, $custom_merge_tag) === false || !rgar($entry, 'post_id'))
			return $text;

		$post_permalink = get_permalink(rgar($entry, 'post_id'));
		$text = str_replace($custom_merge_tag, $post_permalink, $text);

		return $text;
	}
}

new GWPostPermalink();

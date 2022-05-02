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
	];
}

foreach ( catalina_get_theme_include_files() as $include ) {
	require trailingslashit( get_template_directory() ) . $include;
}

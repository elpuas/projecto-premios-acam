<?php
/**
 * Catalina Theme Patterns
 *
 * @package acam
 */

namespace acam\inc;

/**
 * Remove 'core-block-patterns' from theme support to avoid cluttering the editor.
 */
function disable_core_block_patterns() {
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\disable_core_block_patterns', 10, 0 );

<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Pocono
 */

/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function pocono_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'pocono_theme_options', array() ), pocono_default_options() );

	// Return theme options.
	return $theme_options;

}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function pocono_default_options() {

	$default_options = array(
		'site_title'						=> true,
		'site_description'					=> false,
		'archive_layout' 					=> 'three-columns',
		'single_layout' 					=> 'right-sidebar',
		'sticky_header'						=> false,
		'blog_title'						=> '',
		'blog_description'					=> '',
		'excerpt_length' 					=> 0,
		'meta_date'							=> true,
		'meta_author'						=> true,
		'meta_comments'						=> true,
		'meta_category'						=> true,
		'meta_tags'							=> true,
		'post_navigation'					=> true,
		'slider_blog' 						=> false,
		'slider_category' 					=> 0,
		'slider_limit' 						=> 8,
		'slider_animation' 					=> 'slide',
		'slider_speed' 						=> 7000,
	);

	return $default_options;
}

<?php
/**
 * Custom functions that are not template related
 *
 * @package Pocono
 */

if ( ! function_exists( 'pocono_default_menu' ) ) :
	/**
	 * Display default page as navigation if no custom menu was set
	 */
	function pocono_default_menu() {

		echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">' . wp_list_pages( 'title_li=&echo=0' ) . '</ul>';

	}
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pocono_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = pocono_theme_options();

	// Add sticky header class.
	if ( true == $theme_options['sticky_header'] ) {
		$classes[] = 'sticky-header';
	}

	// Add single layout classes.
	if ( is_active_sidebar( 'sidebar-1' ) && 'left-sidebar' === $theme_options['single_layout'] ) {
		$classes[] = 'sidebar-left';
	} elseif ( is_active_sidebar( 'sidebar-1' ) && 'right-sidebar' === $theme_options['single_layout'] ) {
		$classes[] = 'sidebar-right';
	}

	// Add archive layout classes.
	if ( 'two-columns' == $theme_options['archive_layout'] ) {
		$classes[] = 'post-layout-two-columns post-layout-columns';
	} elseif ( 'three-columns' == $theme_options['archive_layout'] ) {
		$classes[] = 'post-layout-three-columns post-layout-columns';
	} elseif ( 'four-columns' == $theme_options['archive_layout'] ) {
		$classes[] = 'post-layout-four-columns post-layout-columns';
	}

	// Hide Date?
	if ( false === $theme_options['meta_date'] ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( false === $theme_options['meta_author'] ) {
		$classes[] = 'author-hidden';
	}

	// Hide Categories?
	if ( false === $theme_options['meta_category'] ) {
		$classes[] = 'categories-hidden';
	}

	// Hide Comments?
	if ( false === $theme_options['meta_comments'] ) {
		$classes[] = 'comments-hidden';
	}

	return $classes;
}
add_filter( 'body_class', 'pocono_body_classes' );


/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function pocono_hide_elements() {

	// Get theme options from database.
	$theme_options = pocono_theme_options();

	$elements = array();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$elements[] = '.site-title';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$elements[] = '.site-description';
	}

	// Hide Post Tags?
	if ( false === $theme_options['meta_tags'] ) {
		$elements[] = '.type-post .entry-footer .entry-tags';
	}

	// Hide Post Navigation?
	if ( false === $theme_options['post_navigation'] ) {
		$elements[] = '.type-post .entry-footer .post-navigation';
	}

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes = implode( ', ', $elements );
	$custom_css = $classes . ' { position: absolute; clip: rect(1px, 1px, 1px, 1px); width: 1px; height: 1px; overflow: hidden; }';

	// Add Custom CSS.
	wp_add_inline_style( 'pocono-stylesheet', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'pocono_hide_elements', 11 );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function pocono_excerpt_length( $length ) {

	// Get theme options from database.
	$theme_options = pocono_theme_options();

	// Return excerpt text.
	if ( $theme_options['excerpt_length'] >= 0 ) {

		return absint( $theme_options['excerpt_length'] );

	} else {

		return 30; // Number of words.

	}
}
add_filter( 'excerpt_length', 'pocono_excerpt_length' );


/**
 * Change excerpt more text for posts
 *
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function pocono_excerpt_more( $more_text ) {

	return '';

}
add_filter( 'excerpt_more', 'pocono_excerpt_more' );


/**
 * Set wrapper start for wooCommerce
 */
function pocono_wrapper_start() {
	echo '<section id="primary" class="content-area">';
	echo '<main id="main" class="site-main" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'pocono_wrapper_start', 10 );


/**
 * Set wrapper end for wooCommerce
 */
function pocono_wrapper_end() {
	echo '</main><!-- #main -->';
	echo '</section><!-- #primary -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'pocono_wrapper_end', 10 );

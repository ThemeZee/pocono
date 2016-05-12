<?php
/**
 * Implement theme options in the Customizer
 *
 * @package Pocono
 */

 
// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/functions/custom-controls.php' );
require( get_template_directory() . '/inc/customizer/functions/sanitize-functions.php' );

// Load Customizer Section Files
require( get_template_directory() . '/inc/customizer/sections/customizer-general.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-featured.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );


/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 */
function pocono_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel
	$wp_customize->add_panel( 'pocono_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'pocono' ),
		'description'    => '',
	) );
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = esc_html__( 'Background', 'pocono' );
	
	// Add Display Site Title Setting
	$wp_customize->add_setting( 'pocono_theme_options[site_title]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'pocono_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'pocono_theme_options[site_title]', array(
        'label'    => esc_html__( 'Display Site Title', 'pocono' ),
        'section'  => 'title_tagline',
        'settings' => 'pocono_theme_options[site_title]',
        'type'     => 'checkbox',
		'priority' => 10
		)
	);
	
	// Add Header Image Link
	$wp_customize->add_setting( 'pocono_theme_options[custom_header_link]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url'
		)
	);
    $wp_customize->add_control( 'pocono_control_custom_header_link', array(
        'label'    => esc_html__( 'Header Image Link', 'pocono' ),
        'section'  => 'header_image',
        'settings' => 'pocono_theme_options[custom_header_link]',
        'type'     => 'url',
		'priority' => 10
		)
	);
	
	// Add Custom Header Hide Checkbox
	$wp_customize->add_setting( 'pocono_theme_options[custom_header_hide]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'pocono_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'pocono_control_custom_header_hide', array(
        'label'    => esc_html__( 'Hide header image on front page', 'pocono' ),
        'section'  => 'header_image',
        'settings' => 'pocono_theme_options[custom_header_hide]',
        'type'     => 'checkbox',
		'priority' => 15
		)
	);
	
} // pocono_customize_register_options()
add_action( 'customize_register', 'pocono_customize_register_options' );


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 *
 */
function pocono_customize_preview_js() {
	wp_enqueue_script( 'pocono-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151202', true );
}
add_action( 'customize_preview_init', 'pocono_customize_preview_js' );


/**
 * Embed JS file for Customizer Controls
 *
 */
function pocono_customize_controls_js() {
	
	wp_enqueue_script( 'pocono-customizer-controls', get_template_directory_uri() . '/js/customizer-controls.js', array(), '20151202', true );
	
	// Localize the script
	wp_localize_script( 'pocono-customizer-controls', 'pocono_theme_links', array(
		'title'	=> esc_html__( 'Theme Links', 'pocono' ),
		'themeURL'	=> esc_url( __( 'https://themezee.com/themes/pocono/', 'pocono' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=pocono&utm_content=theme-page' ),
		'themeLabel'	=> esc_html__( 'Theme Page', 'pocono' ),
		'docuURL'	=> esc_url( __( 'https://themezee.com/docs/pocono-documentation/', 'pocono' ) . '?utm_source=customizer&utm_medium=textlink&utm_campaign=pocono&utm_content=documentation' ),
		'docuLabel'	=>  esc_html__( 'Theme Documentation', 'pocono' ),
		'rateURL'	=> esc_url( 'http://wordpress.org/support/view/theme-reviews/pocono?filter=5' ),
		'rateLabel'	=> esc_html__( 'Rate this theme', 'pocono' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'pocono_customize_controls_js' );


/**
 * Embed CSS styles for the theme options in the Customizer
 *
 */
function pocono_customize_preview_css() {
	wp_enqueue_style( 'pocono-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20151202' );
}
add_action( 'customize_controls_print_styles', 'pocono_customize_preview_css' );
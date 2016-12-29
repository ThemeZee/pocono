<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package Pocono
 */

/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function pocono_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'pocono_section_general', array(
		'title'    => esc_html__( 'General Settings', 'pocono' ),
		'priority' => 10,
		'panel' => 'pocono_options_panel',
		)
	);

	// Add Post Layout Settings for archive posts.
	$wp_customize->add_setting( 'pocono_theme_options[archive_layout]', array(
		'default'           => 'three-columns',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'pocono_sanitize_select',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[archive_layout]', array(
		'label'    => esc_html__( 'Archives Layout', 'pocono' ),
		'section'  => 'pocono_section_general',
		'settings' => 'pocono_theme_options[archive_layout]',
		'type'     => 'select',
		'priority' => 1,
		'choices'  => array(
			'two-columns' => esc_html__( 'Two Columns', 'pocono' ),
			'three-columns' => esc_html__( 'Three Columns', 'pocono' ),
			),
		)
	);

	// Add Post Layout Settings for archive posts.
	$wp_customize->add_setting( 'pocono_theme_options[single_layout]', array(
		'default'           => 'right-sidebar',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'pocono_sanitize_select',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[single_layout]', array(
		'label'    => esc_html__( 'Sidebar Position (Single Posts)', 'pocono' ),
		'section'  => 'pocono_section_general',
		'settings' => 'pocono_theme_options[single_layout]',
		'type'     => 'select',
		'priority' => 2,
		'choices'  => array(
			'left-sidebar' => esc_html__( 'Left Sidebar', 'pocono' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'pocono' ),
			),
		)
	);

	// Add Sticky Header Setting.
	$wp_customize->add_setting( 'pocono_theme_options[sticky_header_title]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Pocono_Customize_Header_Control(
		$wp_customize, 'pocono_theme_options[sticky_header_title]', array(
		'label' => esc_html__( 'Sticky Header', 'pocono' ),
		'section' => 'pocono_section_general',
		'settings' => 'pocono_theme_options[sticky_header_title]',
		'priority' => 3,
		)
	) );
	$wp_customize->add_setting( 'pocono_theme_options[sticky_header]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'pocono_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[sticky_header]', array(
		'label'    => esc_html__( 'Enable sticky header feature', 'pocono' ),
		'section'  => 'pocono_section_general',
		'settings' => 'pocono_theme_options[sticky_header]',
		'type'     => 'checkbox',
		'priority' => 4,
		)
	);

	// Add Homepage Title.
	$wp_customize->add_setting( 'pocono_theme_options[blog_title]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'pocono' ),
		'section'  => 'pocono_section_general',
		'settings' => 'pocono_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 5,
		)
	);

	// Add Homepage Title.
	$wp_customize->add_setting( 'pocono_theme_options[blog_description]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'pocono' ),
		'section'  => 'pocono_section_general',
		'settings' => 'pocono_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 6,
		)
	);

}
add_action( 'customize_register', 'pocono_customize_register_general_settings' );

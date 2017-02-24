<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Pocono
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function pocono_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'pocono_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'pocono' ),
		'priority' => 30,
		'panel' => 'pocono_options_panel',
		)
	);

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'pocono_theme_options[excerpt_length]', array(
		'default'           => 0,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'pocono' ),
		'section'  => 'pocono_section_post',
		'settings' => 'pocono_theme_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 2,
		)
	);

	// Add Post Meta Settings.
	$wp_customize->add_setting( 'pocono_theme_options[postmeta_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Pocono_Customize_Header_Control(
		$wp_customize, 'pocono_theme_options[postmeta_headline]', array(
		'label' => esc_html__( 'Post Meta', 'pocono' ),
		'section' => 'pocono_section_post',
		'settings' => 'pocono_theme_options[postmeta_headline]',
		'priority' => 4,
		)
	) );

	$wp_customize->add_setting( 'pocono_theme_options[meta_date]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'pocono_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display post date', 'pocono' ),
		'section'  => 'pocono_section_post',
		'settings' => 'pocono_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 5,
		)
	);

	$wp_customize->add_setting( 'pocono_theme_options[meta_author]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'pocono_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display post author', 'pocono' ),
		'section'  => 'pocono_section_post',
		'settings' => 'pocono_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 6,
		)
	);

	$wp_customize->add_setting( 'pocono_theme_options[meta_comments]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'pocono_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[meta_comments]', array(
		'label'    => esc_html__( 'Display post comments', 'pocono' ),
		'section'  => 'pocono_section_post',
		'settings' => 'pocono_theme_options[meta_comments]',
		'type'     => 'checkbox',
		'priority' => 7,
		)
	);

	$wp_customize->add_setting( 'pocono_theme_options[meta_category]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'pocono_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[meta_category]', array(
		'label'    => esc_html__( 'Display post categories', 'pocono' ),
		'section'  => 'pocono_section_post',
		'settings' => 'pocono_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 8,
		)
	);

	// Add Single Post Settings.
	$wp_customize->add_setting( 'pocono_theme_options[single_post_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Pocono_Customize_Header_Control(
		$wp_customize, 'pocono_theme_options[single_post_headline]', array(
		'label' => esc_html__( 'Single Posts', 'pocono' ),
		'section' => 'pocono_section_post',
		'settings' => 'pocono_theme_options[single_post_headline]',
		'priority' => 9,
		)
	) );

	$wp_customize->add_setting( 'pocono_theme_options[meta_tags]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'pocono_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display post tags on single posts', 'pocono' ),
		'section'  => 'pocono_section_post',
		'settings' => 'pocono_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 10,
		)
	);

	$wp_customize->add_setting( 'pocono_theme_options[post_navigation]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'pocono_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display post navigation on single posts', 'pocono' ),
		'section'  => 'pocono_section_post',
		'settings' => 'pocono_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 11,
		)
	);

}
add_action( 'customize_register', 'pocono_customize_register_post_settings' );

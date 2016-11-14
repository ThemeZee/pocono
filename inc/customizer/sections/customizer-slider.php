<?php
/**
 * Slider Settings
 *
 * Register Post Slider section, settings and controls for Theme Customizer
 *
 * @package Pocono
 */

/**
 * Adds slider settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function pocono_customize_register_slider_settings( $wp_customize ) {

	// Add Sections for Slider Settings.
	$wp_customize->add_section( 'pocono_section_slider', array(
		'title'    => esc_html__( 'Post Slider', 'pocono' ),
		'priority' => 60,
		'panel' => 'pocono_options_panel',
		)
	);

	// Add settings and controls for Post Slider.
	$wp_customize->add_setting( 'pocono_theme_options[slider_activate]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Pocono_Customize_Header_Control(
		$wp_customize, 'pocono_theme_options[slider_activate]', array(
		'label' => esc_html__( 'Activate Post Slider', 'pocono' ),
		'section' => 'pocono_section_slider',
		'settings' => 'pocono_theme_options[slider_activate]',
		'priority' => 10,
		)
	) );
	$wp_customize->add_setting( 'pocono_theme_options[slider_blog]', array(
		'default'           => false,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'pocono_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[slider_blog]', array(
		'label'    => esc_html__( 'Show Slider on blog index', 'pocono' ),
		'section'  => 'pocono_section_slider',
		'settings' => 'pocono_theme_options[slider_blog]',
		'type'     => 'checkbox',
		'priority' => 20,
		)
	);

	// Add Setting and Control for Slider Category.
	$wp_customize->add_setting( 'pocono_theme_options[slider_category]', array(
		'default'           => 0,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( new Pocono_Customize_Category_Dropdown_Control(
		$wp_customize, 'pocono_theme_options[slider_category]', array(
		'label' => esc_html__( 'Slider Category', 'pocono' ),
		'section' => 'pocono_section_slider',
		'settings' => 'pocono_theme_options[slider_category]',
		'active_callback' => 'pocono_slider_activated_callback',
		'priority' => 30,
		)
	) );

	// Add Setting and Control for Number of Posts.
	$wp_customize->add_setting( 'pocono_theme_options[slider_limit]', array(
		'default'           => 8,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[slider_limit]', array(
		'label'    => esc_html__( 'Number of Posts', 'pocono' ),
		'section'  => 'pocono_section_slider',
		'settings' => 'pocono_theme_options[slider_limit]',
		'type'     => 'text',
		'active_callback' => 'pocono_slider_activated_callback',
		'priority' => 40,
		)
	);

	// Add Setting and Control for Slider Animation.
	$wp_customize->add_setting( 'pocono_theme_options[slider_animation]', array(
		'default'           => 'slide',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'pocono_sanitize_select',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[slider_animation]', array(
		'label'    => esc_html__( 'Slider Animation', 'pocono' ),
		'section'  => 'pocono_section_slider',
		'settings' => 'pocono_theme_options[slider_animation]',
		'type'     => 'radio',
		'priority' => 50,
		'active_callback' => 'pocono_slider_activated_callback',
		'choices'  => array(
			'slide' => esc_html__( 'Slide Effect', 'pocono' ),
			'fade' => esc_html__( 'Fade Effect', 'pocono' ),
			),
		)
	);

	// Add Setting and Control for Slider Speed.
	$wp_customize->add_setting( 'pocono_theme_options[slider_speed]', array(
		'default'           => 7000,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'pocono_theme_options[slider_speed]', array(
		'label'    => esc_html__( 'Slider Speed (in ms)', 'pocono' ),
		'section'  => 'pocono_section_slider',
		'settings' => 'pocono_theme_options[slider_speed]',
		'type'     => 'number',
		'active_callback' => 'pocono_slider_activated_callback',
		'priority' => 60,
		'input_attrs' => array(
			'min'   => 1000,
			'step'  => 100,
			),
		)
	);

}
add_action( 'customize_register', 'pocono_customize_register_slider_settings' );

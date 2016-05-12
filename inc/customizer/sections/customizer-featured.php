<?php
/**
 * Featured Content Settings
 *
 * Register Featured Posts section, settings and controls for Theme Customizer
 *
 * @package Pocono
 */


/**
 * Adds featured settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object
 */
function pocono_customize_register_featured_settings( $wp_customize ) {

	// Add Sections for Featured Posts Settings
	$wp_customize->add_section( 'pocono_section_featured', array(
        'title'    => esc_html__( 'Featured Posts', 'pocono' ),
        'priority' => 60,
		'panel' => 'pocono_options_panel' 
		)
	);

	// Add settings and controls for Featured Posts
	$wp_customize->add_setting( 'pocono_theme_options[featured_activate]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Pocono_Customize_Header_Control(
        $wp_customize, 'pocono_theme_options[featured_activate]', array(
            'label' => esc_html__( 'Activate Featured Posts', 'pocono' ),
            'section' => 'pocono_section_featured',
            'settings' => 'pocono_theme_options[featured_activate]',
            'priority' => 1
            )
        )
    );
	$wp_customize->add_setting( 'pocono_theme_options[featured_magazine]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'pocono_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'pocono_theme_options[featured_magazine]', array(
        'label'    => esc_html__( 'Show featured posts on Magazine Homepage', 'pocono' ),
        'section'  => 'pocono_section_featured',
        'settings' => 'pocono_theme_options[featured_magazine]',
        'type'     => 'checkbox',
		'priority' => 2
		)
	);
	$wp_customize->add_setting( 'pocono_theme_options[featured_blog]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'pocono_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'pocono_theme_options[featured_blog]', array(
        'label'    => esc_html__( 'Show featured posts on posts page', 'pocono' ),
        'section'  => 'pocono_section_featured',
        'settings' => 'pocono_theme_options[featured_blog]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);
	
	// Add Setting and Control for Featured Posts Category
	$wp_customize->add_setting( 'pocono_theme_options[featured_category]', array(
        'default'           => 0,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Pocono_Customize_Category_Dropdown_Control(
        $wp_customize, 'pocono_theme_options[featured_category]', array(
            'label' => esc_html__( 'Featured Posts Category', 'pocono' ),
            'section' => 'pocono_section_featured',
            'settings' => 'pocono_theme_options[featured_category]',
            'priority' => 4
            )
        )
    );
	
}
add_action( 'customize_register', 'pocono_customize_register_featured_settings' );
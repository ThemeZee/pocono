<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package Pocono
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function pocono_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'pocono_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'pocono' ),
		'priority' => 70,
		'panel' => 'pocono_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'pocono_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Pocono_Customize_Upgrade_Control(
		$wp_customize, 'pocono_theme_options[upgrade]', array(
		'section' => 'pocono_section_upgrade',
		'settings' => 'pocono_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'pocono_customize_register_upgrade_settings' );

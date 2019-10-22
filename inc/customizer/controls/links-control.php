<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Pocono
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Pocono_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'pocono' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/pocono/', 'pocono' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=pocono&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'pocono' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=pocono&utm_source=customizer&utm_campaign=pocono" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'pocono' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/pocono-documentation/', 'pocono' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=pocono&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'pocono' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=pocono/', 'pocono' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'pocono' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/pocono/reviews/', 'pocono' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'pocono' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;

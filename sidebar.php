<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Pocono
 */

// Get theme options from database
$theme_options = pocono_theme_options();

// Display Sidebar based on theme options
if( $theme_options['single_layout'] <> 'no-sidebar' ) : ?>

	<section id="secondary" class="sidebar widget-area clearfix" role="complementary">

		<?php // Check if Sidebar has widgets
		if( is_active_sidebar( 'sidebar' ) ) : 
		
			dynamic_sidebar( 'sidebar' );
		
		// Show hint where to add widgets
		else : ?>

			<aside class="widget clearfix">
				<div class="widget-header"><h3 class="widget-title"><?php esc_html_e( 'Sidebar', 'pocono' ); ?></h3></div>
				<div class="textwidget">
					<p><?php esc_html_e( 'Please go to Appearance &#8594; Widgets and add some widgets to your sidebar.', 'pocono' ); ?></p>
				</div>
			</aside>
	
	<?php endif; ?>

	</section><!-- #secondary -->
	
<?php 
endif;
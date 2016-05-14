<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Pocono
 */

?>
	<section id="main-navigation" class="primary-navigation navigation widget-area clearfix" role="complementary">
		
		<?php // Check if Sidebar has widgets
		if( is_active_sidebar( 'navigation-menu' ) ) : 
		
			dynamic_sidebar( 'navigation-menu' );
		
		// Show hint where to add widgets
		else : ?>

			<aside class="widget widget_pages clearfix">
				<div class="widget-header"><h3 class="widget-title"><?php esc_html_e( 'Navigation', 'pocono' ); ?></h3></div>
				<ul class="default-navigation">
					<?php wp_list_pages( 'title_li=&depth=1' ); ?>
				</ul>
			</aside>
	
	<?php endif; ?>

	</section><!-- #main-navigation -->
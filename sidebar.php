<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Pocono
 */

?>
	<section id="secondary" class="sidebar widget-area clearfix" role="complementary">
		
		<?php // Check if Sidebar has widgets
		if( is_active_sidebar( 'sidebar' ) ) : 
		
			dynamic_sidebar( 'sidebar' );
		
		// Show hint where to add widgets
		else : ?>

			<aside class="widget widget_pages clearfix">
				<div class="widget-header"><h3 class="widget-title"><?php esc_html_e( 'Navigation', 'pocono' ); ?></h3></div>
				<ul class="default-navigation">
					<?php wp_list_pages( 'title_li=&depth=1' ); ?>
				</ul>
			</aside>
	
	<?php endif; ?>

	</section><!-- #secondary -->
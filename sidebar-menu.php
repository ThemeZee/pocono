<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Pocono
 */

?>
	<section id="sidebar-navigation" class="sidebar-navigation widget-area clearfix" role="complementary">

		<?php // Check if there is a sidebar menu.
		if ( has_nav_menu( 'secondary' ) ) : ?>

			<aside class="widget widget_nav_menu sidebar-menu-widget clearfix">

				<div class="widget-header">
					<h3 class="widget-title"><?php esc_html_e( 'Navigation', 'pocono' ); ?></h3>
				</div>

				<nav id="sidebar-menu" class="secondary-navigation navigation menu-navigation-container clearfix" role="navigation">
					<?php
						// Display Header Navigation.
						wp_nav_menu( array(
							'theme_location' => 'secondary',
							'container' => false,
							'menu_class' => 'sidebar-navigation-menu menu',
							'echo' => true,
							'fallback_cb' => '',
							)
						);
					?>
				</nav><!-- #sidebar-navigation -->

			</aside>

		<?php endif;

		// Check if Sidebar has widgets.
		if ( is_active_sidebar( 'navigation-menu' ) ) :

			dynamic_sidebar( 'navigation-menu' );

		endif;

		// Display List of Pages if no Menu or Widgets are set.
		if ( ! ( has_nav_menu( 'secondary' ) || is_active_sidebar( 'navigation-menu' ) ) ) : ?>

			<aside class="widget widget_pages clearfix">
				<div class="widget-header"><h3 class="widget-title"><?php esc_html_e( 'Navigation', 'pocono' ); ?></h3></div>
				<ul class="default-navigation">
					<?php wp_list_pages( 'title_li=&depth=1' ); ?>
				</ul>
			</aside>

	<?php endif; ?>

	</section><!-- #sidebar-navigation -->

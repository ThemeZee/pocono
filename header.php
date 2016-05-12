<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pocono
 */
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">
		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pocono' ); ?></a>
		
		<div id="header-top" class="header-bar-wrap"><?php do_action( 'pocono_header_bar' ); ?></div>
		
		<header id="masthead" class="site-header clearfix" role="banner">
			
			<div class="header-main container clearfix">
				
				<button id="sidebar-toggle" class="sidebar-navigation-toggle"></button>
				
				<div id="logo" class="site-branding clearfix">
				
					<?php pocono_site_logo(); ?>
					<?php pocono_site_title(); ?>
				
				</div><!-- .site-branding -->
				
				<div id="header-social-icons" class="header-social-icons social-icons-navigation clearfix">
					<?php 
						wp_nav_menu( array(
							'theme_location' => 'social',
							'container' => false,
							'menu_class' => 'social-icons-menu',
							'echo' => true,
							'fallback_cb' => '',
							'link_before' => '<span class="screen-reader-text">',
							'link_after' => '</span>',
							'depth' => 1
							)
						); 
					?>
				</div>
				


			</div><!-- .header-main -->
		
		</header><!-- #masthead -->
		
		<?php pocono_header_image(); ?>
		
		<?php pocono_breadcrumbs(); ?>
		
		<div id="content" class="site-content container clearfix">
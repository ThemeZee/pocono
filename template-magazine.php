<?php
/**
 * Template Name: Magazine Homepage
 *
 * Description: A custom page template for displaying the magazine homepage widgets.
 *
 * @package Pocono
 */

get_header();

// Get Theme Options from Database.
$theme_options = pocono_theme_options();

// Display Post Slider.
if ( true == $theme_options['slider_blog'] ) :

	get_template_part( 'template-parts/post-slider' );

endif;
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Display Magazine Homepage Widgets.
		pocono_magazine_widgets();
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>

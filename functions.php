<?php
/**
 * Pocono functions and definitions
 *
 * @package Pocono
 */

/**
 * Pocono only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}


if ( ! function_exists( 'pocono_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pocono_setup() {

		// Make theme available for translation. Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'pocono', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set detfault Post Thumbnail size.
		set_post_thumbnail_size( 800, 500, true );

		// Add Single Posts Image Size.
		add_image_size( 'pocono-single-posts', 1200, 550, true );

		// Register Navigation Menus.
		register_nav_menus( array(
			'primary'   => esc_html__( 'Main Navigation', 'pocono' ),
			'secondary' => esc_html__( 'Sidebar Navigation', 'pocono' ),
			'social'    => esc_html__( 'Social Icons', 'pocono' ),
		) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pocono_custom_background_args', array( 'default-color' => 'ffffff' ) ) );

		// Set up the WordPress core custom logo feature.
		add_theme_support( 'custom-logo', apply_filters( 'pocono_custom_logo_args', array(
			'height' => 40,
			'width' => 200,
			'flex-height' => true,
			'flex-width' => true,
		) ) );

		// Set up the WordPress core custom header feature.
		add_theme_support('custom-header', apply_filters( 'pocono_custom_header_args', array(
			'header-text' => false,
			'width'	=> 1920,
			'height' => 480,
			'flex-height' => true,
		) ) );

		// Add Theme Support for wooCommerce.
		add_theme_support( 'woocommerce' );

		// Add extra theme styling to the visual editor.
		add_editor_style( array( 'css/editor-style.css', pocono_google_fonts_url() ) );

		// Add Theme Support for Selective Refresh in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'pocono_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pocono_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pocono_content_width', 780 );
}
add_action( 'after_setup_theme', 'pocono_content_width', 0 );


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pocono_widgets_init() {

	// Register Sidebar widget area for single posts.
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'pocono' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears only on single posts and pages.', 'pocono' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

	// Register widget area for navigation menu.
	register_sidebar( array(
		'name' => esc_html__( 'Navigation Menu', 'pocono' ),
		'id' => 'navigation-menu',
		'description' => esc_html__( 'Appears on the slide-in navigation menu.', 'pocono' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

	// Register widget area for magazine page template.
	register_sidebar( array(
		'name' => esc_html__( 'Magazine Homepage', 'pocono' ),
		'id' => 'magazine-homepage',
		'description' => esc_html__( 'Appears on blog index and Magazine Homepage template. You can use the Magazine Posts widgets here.', 'pocono' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

}
add_action( 'widgets_init', 'pocono_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function pocono_scripts() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Register and Enqueue Stylesheet.
	wp_enqueue_style( 'pocono-stylesheet', get_stylesheet_uri(), array(), $theme_version );

	// Register Genericons.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons/genericons.css', array(), '3.4.1' );

	// Register and enqueue navigation.js.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script( 'pocono-jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20161129' );
	}

	// Register and enqueue sidebar.js.
	wp_enqueue_script( 'pocono-jquery-sidebar', get_template_directory_uri() . '/js/sidebar.js', array( 'jquery' ), '20161129' );

	// Register and enqueue sticky-header.js.
	wp_enqueue_script( 'pocono-jquery-sticky-header', get_template_directory_uri() . '/js/sticky-header.js', array( 'jquery' ), '20160512' );

	// Register and Enqueue Google Fonts.
	wp_enqueue_style( 'pocono-default-fonts', pocono_google_fonts_url(), array(), null );

	// Register Comment Reply Script for Threaded Comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'pocono_scripts' );


/**
 * Retrieve Font URL to register default Google Fonts
 */
function pocono_google_fonts_url() {

	// Set default Fonts.
	$font_families = array( 'Roboto:400,400italic,700,700italic', 'Montserrat:400,400italic,700,700italic' );

	// Build Fonts URL.
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	return apply_filters( 'pocono_google_fonts_url', $fonts_url );
}


/**
 * Include Files
 */

// Include Theme Info page.
require get_template_directory() . '/inc/theme-info.php';

// Include Theme Customizer Options.
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include Extra Functions.
require get_template_directory() . '/inc/extras.php';

// Include Template Functions.
require get_template_directory() . '/inc/template-tags.php';

// Include support functions for Theme Addons.
require get_template_directory() . '/inc/addons.php';

// Include Post Slider Setup.
require get_template_directory() . '/inc/slider.php';

// Include Magazine Functions.
require get_template_directory() . '/inc/magazine.php';

// Include Widget Files.
require get_template_directory() . '/inc/widgets/widget-magazine-posts-grid.php';

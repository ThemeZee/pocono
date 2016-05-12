<?php
/***
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 * @package Pocono
 */

 
if ( ! function_exists( 'pocono_site_logo' ) ): 
/**
 * Displays the site logo in the header area
 */
function pocono_site_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
		
		the_custom_logo();
	
	} 
	
}
endif;


if ( ! function_exists( 'pocono_site_title' ) ): 
/**
 * Displays the site title in the header area
 */
function pocono_site_title() {
	
	// Get theme options from database
	$theme_options = pocono_theme_options();	
	
	// Return early if site title is deactivated
	if( false == $theme_options['site_title'] ) {
		return;
	}
	
	if ( is_home() or is_page_template( 'template-magazine.php' )  ) : ?>
		
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	
	<?php else : ?>
		
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	
	<?php endif; 
	
}
endif;


if ( ! function_exists( 'pocono_header_image' ) ):
/**
 * Displays the custom header image below the navigation menu
 */
function pocono_header_image() {
	
	// Get theme options from database
	$theme_options = pocono_theme_options();	
	
	// Display default header image set on Appearance > Header
	if( get_header_image() ) : 

		// Hide header image on front page
		if ( true == $theme_options['custom_header_hide'] and is_front_page() ) {
			return;
		}
		?>
		
		<div id="headimg" class="header-image">
			
			<?php // Check if custom header image is linked
			if( $theme_options['custom_header_link'] <> '' ) : ?>
			
				<a href="<?php echo esc_url( $theme_options['custom_header_link'] ); ?>">
					<img src="<?php echo get_header_image(); ?>" />
				</a>
				
			<?php else : ?>
			
				<img src="<?php echo get_header_image(); ?>" />
				
			<?php endif; ?>
			
		</div>
	
	<?php 
	endif;
}
endif;


if ( ! function_exists( 'pocono_post_image_single' ) ):
/**
 * Displays the featured image on single posts
 */
function pocono_post_image_single() {
	
	// Get Theme Options from Database
	$theme_options = pocono_theme_options();
	
	// Display Post Thumbnail if activated
	if ( true == $theme_options['featured_image'] ) {

		the_post_thumbnail();

	}

} // pocono_post_image_single()
endif;


if ( ! function_exists( 'pocono_entry_meta' ) ):	
/**
 * Displays the date, author and comments of a post
 */
function pocono_entry_meta() {

	// Get Theme Options from Database
	$theme_options = pocono_theme_options();
	
	$postmeta = '';
	
	// Display date unless user has deactivated it via settings
	if ( true == $theme_options['meta_date'] ) {
		
		$postmeta .= pocono_meta_date();
		
	}

	// Display author unless user has deactivated it via settings
	if ( true == $theme_options['meta_author'] ) {
	
		$postmeta .= pocono_meta_author();
	
	}
	
	// Display comments unless user has deactivated it via settings
	if ( true == $theme_options['meta_comments'] ) {
	
		$postmeta .= pocono_meta_comments();
	
	}
		
	if( $postmeta ) {
		
		echo '<div class="entry-meta">' . $postmeta . '</div>';
			
	}

} // pocono_entry_meta()
endif;


if ( ! function_exists( 'pocono_meta_date' ) ):
/**
 * Displays the post date
 */
function pocono_meta_date() { 

	$time_string = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date published updated" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	return '<span class="meta-date">' . $time_string . '</span>';

}  // pocono_meta_date()
endif;


if ( ! function_exists( 'pocono_meta_author' ) ):
/**
 * Displays the post author
 */
function pocono_meta_author() {  
	
	$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>', 
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( esc_html__( 'View all posts by %s', 'pocono' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
	
	return '<span class="meta-author"> ' . $author_string . '</span>';

}  // pocono_meta_author()
endif;


if ( ! function_exists( 'pocono_meta_comments' ) ):
/**
 * Displays the post comments
 */
function pocono_meta_comments() {  
	
	ob_start();
	comments_popup_link( '0', '1', '%' );
	$comments_string = ob_get_contents();
	ob_end_clean();
	
	return '<span class="meta-comments"> ' . $comments_string . '</span>';

}  // pocono_meta_comments()
endif;


if ( ! function_exists( 'pocono_entry_categories' ) ):
/**
 * Displays the category of posts
 */	
function pocono_entry_categories() { 
	
	// Get Theme Options from Database
	$theme_options = pocono_theme_options();
	
	// Display categories unless user has deactivated it via settings
	if ( true == $theme_options['meta_category'] ) : ?>
	
		<div class="entry-categories clearfix">
			
			<span class="meta-category">
				<?php echo get_the_category_list(' '); ?>
			</span>
			
		</div><!-- .entry-categories -->
		
	<?php
	endif;
	
} // pocono_entry_categories()
endif;


if ( ! function_exists( 'pocono_entry_tags' ) ):
/**
 * Displays the post tags on single post view
 */
function pocono_entry_tags() {
	
	// Get Theme Options from Database
	$theme_options = pocono_theme_options();
	
	// Get Tags
	$tag_list = get_the_tag_list('', '');
	
	// Display Tags
	if ( $tag_list && $theme_options['meta_tags'] ) : ?>
	
		<div class="entry-tags clearfix">
			<span class="meta-tags">
				<?php echo $tag_list; ?>
			</span>
		</div><!-- .entry-tags -->
<?php 
	endif;

} // pocono_entry_tags()
endif;


if ( ! function_exists( 'pocono_more_link' ) ):
/**
 * Displays the more link on posts
 */
function pocono_more_link() { 

	// Get Theme Options from Database
	$theme_options = pocono_theme_options();
	
	// Display Read More Button if there is excerpt
	if ( $theme_options['excerpt_length'] > 0 ) : ?>

		<a href="<?php echo esc_url( get_permalink() ) ?>" class="more-link"><?php esc_html_e( 'Read more', 'pocono' ); ?></a>

		<?php
	endif;

}
endif;


if ( ! function_exists( 'pocono_post_navigation' ) ):
/**
 * Displays Single Post Navigation
 */	
function pocono_post_navigation() { 
	
	// Get Theme Options from Database
	$theme_options = pocono_theme_options();
	
	if ( true == $theme_options['post_navigation'] ) {

		the_post_navigation( array( 'prev_text' => '&laquo; %title', 'next_text' => '%title &raquo;' ) );
			
	}
	
}	
endif;


if ( ! function_exists( 'pocono_breadcrumbs' ) ):
/**
 * Displays ThemeZee Breadcrumbs plugin
 */	
function pocono_breadcrumbs() { 
	
	if ( function_exists( 'themezee_breadcrumbs' ) ) {

		themezee_breadcrumbs( array( 
			'before' => '<div class="breadcrumbs-container container clearfix">',
			'after' => '</div>'
		) );
		
	}
}	
endif;


if ( ! function_exists( 'pocono_related_posts' ) ):
/**
 * Displays ThemeZee Related Posts plugin
 */	
function pocono_related_posts() { 
	
	if ( function_exists( 'themezee_related_posts' ) ) {

		themezee_related_posts( array( 
			'class' => 'related-posts clearfix',
			'before_title' => '<header class="related-posts-header"><h2 class="related-posts-title">',
			'after_title' => '</h2></header>'
		) );
		
	}
}	
endif;


if ( ! function_exists( 'pocono_pagination' ) ):
/**
 * Displays pagination on archive pages
 */	
function pocono_pagination() { 
	
	global $wp_query;

	$big = 999999999; // need an unlikely integer
	
	 $paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',				
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total' => $wp_query->max_num_pages,
			'next_text' => '&raquo;',
			'prev_text' => '&laquo',
			'add_args' => false
		) );

	// Display the pagination if more than one page is found
	if ( $paginate_links ) : ?>
			
		<div class="post-pagination clearfix">
			<?php echo $paginate_links; ?>
		</div>
	
	<?php
	endif;
	
} // pocono_pagination()
endif;


/**
 * Displays credit link on footer line
 */	
function pocono_footer_text() { ?>

	<span class="credit-link">
		<?php printf( esc_html__( 'Powered by %1$s and %2$s.', 'pocono' ), 
			'<a href="http://wordpress.org" title="WordPress">WordPress</a>',
			'<a href="https://themezee.com/themes/pocono/" title="Pocono WordPress Theme">Pocono</a>'
		); ?>
	</span>

<?php
}
add_action( 'pocono_footer_text', 'pocono_footer_text' );
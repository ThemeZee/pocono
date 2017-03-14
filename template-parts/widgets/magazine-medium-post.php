<?php
/**
 * The template for displaying medium posts in Magazine Post widgets
 *
 * @package Pocono
 */

// Get widget settings.
$post_excerpt = get_query_var( 'pocono_post_excerpt', false );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'medium-post clearfix' ); ?>>

	<div class="post-image">

		<?php pocono_post_image(); ?>

		<?php pocono_entry_categories(); ?>

	</div>

	<div class="post-content clearfix">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php pocono_entry_meta(); ?>

		</header><!-- .entry-header -->

		<?php // Display post excerpt if enabled.
		if ( $post_excerpt ) : ?>

			<div class="entry-content entry-excerpt clearfix">

				<?php the_excerpt(); ?>
				<?php pocono_more_link(); ?>

			</div><!-- .entry-content -->

		<?php endif; ?>

	</div>

</article>

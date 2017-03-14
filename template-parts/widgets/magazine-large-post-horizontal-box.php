<?php
/**
 * The template for displaying large posts in Magazine Horizontal Box widget
 *
 * @package Pocono
 */

?>

<div class="post-column">

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'large-post clearfix' ); ?>>

		<div class="post-image">

			<?php pocono_post_image(); ?>

			<?php pocono_entry_categories(); ?>

		</div>

		<div class="post-content clearfix">

			<header class="entry-header">

				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php pocono_entry_meta(); ?>

			</header><!-- .entry-header -->

			<div class="entry-content entry-excerpt clearfix">

				<?php the_excerpt(); ?>
				<?php pocono_more_link(); ?>

			</div><!-- .entry-content -->

		</div>

	</article>

</div>

<?php
/**
 * The template for displaying articles in the slideshow loop
 *
 * @package Pocono
 */

?>

<li id="slide-<?php the_ID(); ?>" class="zeeslide clearfix">

	<?php pocono_slider_image( 'pocono-single-posts', array( 'class' => 'slide-image' ) ); ?>

	<?php pocono_entry_categories(); ?>

	<div class="slide-content clearfix">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php pocono_entry_meta(); ?>

		</header><!-- .entry-header -->

	</div>

</li>

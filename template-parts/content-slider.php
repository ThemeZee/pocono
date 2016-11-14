<?php
/**
 * The template for displaying articles in the slideshow loop
 *
 * @package Pocono
 */

?>

<li id="slide-<?php the_ID(); ?>" class="zeeslide clearfix">

	<?php // Display Post Thumbnail or default thumbnail.
	if ( has_post_thumbnail() ) :

		the_post_thumbnail( 'pocono-single-posts', array( 'class' => 'slide-image' ) );

	else : ?>

		<img src="<?php echo get_template_directory_uri(); ?>/images/default-slider-image.png" class="slide-image default-slide-image wp-post-image" alt="default-image" />

	<?php endif;?>

	<?php pocono_entry_categories(); ?>

	<div class="slide-content clearfix">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php pocono_entry_meta(); ?>

		</header><!-- .entry-header -->

	</div>

</li>

<?php
/**
 * The template for displaying single posts
 *
 * @package Pocono
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php the_post_thumbnail(); ?>
		
		<?php pocono_entry_categories(); ?>
		
		<div class="post-content clearfix">
			
			<header class="entry-header">
				
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				
				<?php pocono_entry_meta(); ?>

			</header><!-- .entry-header -->
			
			<div class="entry-content clearfix">
				<?php the_content(); ?>
				<!-- <?php trackback_rdf(); ?> -->
				<div class="page-links"><?php wp_link_pages(); ?></div>
			</div><!-- .entry-content -->
			
			<footer class="entry-footer">
				
				<?php pocono_entry_tags(); ?>
				<?php pocono_post_navigation(); ?>
				
			</footer><!-- .entry-footer -->
			
		</div>

	</article>
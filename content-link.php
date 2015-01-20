<?php
/**
 * content-link.php
 *
 * the default template for showing the content of link post format.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- article content -->
	<div class="entry-content">
		<?php 
			the_content( __( 'Read More &rarr;', 'opal' ) );

			wp_link_pages();
		?>
	</div> <!-- .entry-content -->
	
	<!-- article footer -->
	<footer class="entry-footer">
		<?php 
			// display the post meta information
			opal_post_meta();
		?>

		<?php
			// if we have a single page and the author bio exists
			if ( is_single() && get_the_author_meta( 'description' ) ) {
				echo '<h2>' . __( 'Written by ', 'opal' ) . get_the_author() . '</h2>';
				echo '<p>' . the_author_meta( 'description' ) . '</p>';
			}
		?>
	</footer> <!-- .entry-footer -->

</article>
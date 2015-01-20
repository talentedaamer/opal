<?php
/**
 * content-quote.php
 *
 * the default template for showing the content of quote post format.
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
	</footer> <!-- .entry-footer -->

</article>
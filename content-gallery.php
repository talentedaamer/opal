<?php
/**
 * content-gallery.php
 *
 * the default template for showing the gallery post formats.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- article header -->
	<header class="entry-header"><?php
		// display single page title if is single
		// else display the title in a anchor tag
		if ( is_single() ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php 
			// display the post meta information
			opal_post_meta();
		?>
	</header>

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
			// if we have a single page and the author bio exists
			if ( is_single() && get_the_author_meta( 'description' ) ) {
				echo '<h2>' . __( 'Written by ', 'opal' ) . get_the_author() . '</h2>';
				echo '<p>' . the_author_meta( 'description' ) . '</p>';
			}
		?>
	</footer> <!-- .entry-footer -->

</article>
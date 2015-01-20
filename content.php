<?php
/**
 * content.php
 *
 * the default template for showing the content of the post.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- article header -->
	<header class="entry-header"><?php
		// if post has thumbnail and not password protected
		// show the post thumbnail
		if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<figure class="entry-thumbnail">
				<?php the_post_thumbnail( 'blog-thumbs' ); ?>
			</figure>
		<?php endif;
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
		if ( is_search() ) {
				the_excerpt();
			} else {
				the_content( __( 'Read More &rarr;', 'opal' ) );

				wp_link_pages();
			}
		?>
	</div> <!-- .entry-content -->
	
	<!-- article footer -->
	<footer class="entry-footer">
		<?php
			// if we have a single page and the author bio exists
			if ( is_single() && get_the_author_meta( 'description' ) ) {
				$author_icon = '<i class="fa fa-user"></i> ';
				echo '<hr>';
				echo '<h3 class="author-title">' . $author_icon . __( 'Written by ', 'opal' ) . get_the_author() . '</h3>';
				echo '<p>';
					echo the_author_meta( 'description' );
				echo '</p>';
			}
		?>
	</footer> <!-- .entry-footer -->

</article>
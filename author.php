<?php
/**
 * author.php
 *
 * Template for displaying author archives.
 */
?>


<!-- get header.php -->
<?php get_header(); ?>

	<div class="main-content col-md-8" role="main">
		<?php if ( have_posts() ) : the_post(); ?>
			<header class="page-header">
				<h1>
					<?php printf( __( 'All posts by %s.', 'opal' ), get_the_author() ); ?>
				</h1>

				<?php 
					// if author bio exists.
					if ( get_the_author_meta( 'description' ) ) {
						echo '<p>' . get_the_author_meta( 'description' ) . '</p>';
					}
				?>

				<?php rewind_posts(); ?>
			</header> <!-- .page-header -->

			<?php while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php opal_pagination(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div> <!-- .main-content -->

	<!-- get sidebar.php -->
	<?php get_sidebar(); ?>

<!-- get footer.php -->
<?php get_footer(); ?>
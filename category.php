<?php
/**
 * category.php
 *
 * Template for displaying category pages.
 */
?>


<!-- get header.php -->
<?php get_header(); ?>

	<div class="main-content col-md-8" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1>
					<?php
						printf( __( 'Category archive for %s', 'opal' ), single_cat_title( '', false ) );
					?>
				</h1>

				<?php
					// show optional category description
					if ( category_description() ) {
						echo category_description();
					}
				?>
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
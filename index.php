<?php
/**
 * index.php
 *
 * The main template file
 */
?>

<!-- get theme header.php -->
<?php get_header(); ?>

	<div class="main-content col-md-8" role="main">
		<!-- if there are posts to show get the template content-*.php -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php opal_pagination(); ?>

		<!-- else if there are no post show the content-none.php -->
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div> <!-- .main-content -->

	<!-- get theme sidebar.php -->
	<?php get_sidebar(); ?>

<!-- get theme footer.php -->
<?php get_footer(); ?>
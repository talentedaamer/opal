<?php
/**
 * single.php
 *
 * Template for displaying posts.
 */
?>

<?php get_header(); ?>

	<div class="main-content col-md-8" role="main">
		<?php while( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>
			
			<!-- page comments -->
			<?php comments_template(); ?>

		<?php endwhile; ?>
	</div> <!-- .main-content -->

<!-- get the sidebar.php -->
<?php get_sidebar(); ?>

<!-- get the footer.php -->
<?php get_footer(); ?>

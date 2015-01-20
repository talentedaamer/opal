<?php
/**
 * page.php
 *
 * Template for displaying all pages.
 */
?>

<?php get_header(); ?>

	<div class="main-content col-md-8" role="main">
		<?php while( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- article header -->
				<header class="entry-header"><?php
					// if post has thumbnail and not password protected
					// show the post thumbnail
					if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<figure class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</figure>
					<?php endif; ?>
					
					<!-- page title -->
					<h1><?php the_title(); ?></h1>

				</header>

				<!-- article content -->
				<div class="entry-content">
					<?php the_content(); ?>

					<?php wp_link_pages(); ?>
				</div> <!-- .entry-content -->
				
				<!-- article footer -->
				<footer class="entry-footer">
					<?php
						// post edit link
						if ( is_user_logged_in() ) {
							echo '<p>';
							edit_post_link( __( 'Edit', 'opal' ), '<span class="meta-edit">', '</span>' );
							echo '</p>';
						}
					?>
				</footer> <!-- .entry-footer -->

			</article>

			<!-- page comments -->
			<?php comments_template(); ?>

		<?php endwhile; ?>
	</div> <!-- .main-content -->

<!-- get the sidebar.php -->
<?php get_sidebar(); ?>

<!-- get the footer.php -->
<?php get_footer(); ?>

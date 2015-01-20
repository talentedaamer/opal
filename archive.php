<?php
/**
 * archive.php
 *
 * Template for displaying archive pages.
 */
?>


<!-- get header.php -->
<?php get_header(); ?>

	<div class="main-content col-md-8" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1>
					<?php
						if ( is_day() ) {
							printf( __( 'Daily Archives for %s', 'opal' ), get_the_date() );
						} elseif ( is_month() ) {
							printf( __( 'Monthly Archives for %s', 'opal' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'opal' ) ) );
						} elseif ( is_year() ) {
						printf( __( 'Yearly Archives for %s', 'opal' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'opal' ) ) );
						} else {
							_e( 'Archives', 'opal' );
						}
					?>
				</h1>
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
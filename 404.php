<?php 
/**
 * 404.php
 *
 * template for displaying error 404 or not found page.
 */
?>


<!-- get header.php -->
<?php get_header() ?>

<div class="col-md-12">
	<div class="container-404">
		<header class="entry-header text-center mb-5">
			<h1><?php _e( 'Error 404 - Not Found', 'opal' ) ?></h1>
			<?php _e( 'It looks like nothing was found here. Try searching for something else.', 'opal' ) ?>
		</header>

		<div class="search-wrap col-md-6 mx-auto">
			<!-- get searchForm template -->
			<?php get_search_form(); ?>
		</div>

		<div class="recent-posts mt-5">
		<header class="entry-header mb-3">
			<h3><?php _e( 'Recent Posts', 'opal' ) ?></h3>
		</header>
		<?php 
		// WP_Query arguments
		$query_args = array (
			'post_type'              => 'post',
			'posts_per_page'		 => 10,
			'offset'				 => 0,
			'ignore_sticky_posts'    => 1
		);
		// The Query
		$recent_posts = new WP_Query( $query_args );
		if( $recent_posts->have_posts() ) :
		?>
		<div class="recent-posts-wrap row">
			<?php while($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
				<div class="col-md-6 mb-4">
					<?php get_template_part( 'template-parts/loop', 'card-grid' ); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php
		else:
			_e( 'Sorry ! There are no posts yet.', 'opal' );
		endif; // have_posts()
		?>
		</div> <!-- recent-posts -->

	</div> <!-- .container-404 -->
</div>

<!-- get footer.php-->
<?php get_footer(); ?>

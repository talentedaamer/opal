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
		<header class="entry-header">
			<h1><?php _e( 'Error 404 - Nothing Found', 'opal' ) ?></h1>
		</header>
		<p><?php _e( 'It looks like nothing was found here. Try searching for something else.', 'opal' ) ?></p>

		<div class="search-wrap col-md-6">
			<!-- get search form -->
			<?php get_search_form(); ?>
		</div>

		<header class="entry-header">
			<h3><?php _e( 'Recent Posts', 'opal' ) ?></h3>
		</header>

		<div class="recent-posts-wrap row">
			<?php 
			// WP_Query arguments
			$query_args = array (
				'post_type'              => 'post',
				'posts_per_page'		 => 12,
				'offset'				 => 0,
				'ignore_sticky_posts'    => 1
			);
			// The Query
			$recent_posts = new WP_Query( $query_args );
			if($recent_posts->have_posts()) : ?>
			
			<?php while($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
		    <div class="item-wrap col-md-3 col-sm-4 col-xs-12">
		    	<div class="item">
		         <?php if( has_post_thumbnail() ) : ?>
		         	<figure class="post-thumb">
			         	<a href="<?php the_permalink(); ?>">
			         		<?php the_post_thumbnail('404-thumbs'); ?>
			         	</a>
		         <?php else : ?>
		         	<figure class="no-post-thumb">
				         <a href="<?php the_permalink(); ?>">
				         	<span class="no-image-icon fa fa-picture-o"></span>
				         </a>
		         <?php endif; ?>	
				        <div class="overlay post-desc">
				         	<h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				        </div> <!-- .overlay -->   
			        </figure>
				</div> <!-- .item -->
			</div> <!-- .col-md-3 -->
			<?php endwhile; ?>

			<?php else: ?>
			      Sorry ! There are no posts yet.
			<?php endif; ?>
		</div>

	</div> <!-- .container-404 -->
</div>

<!-- get footer.php-->
<?php get_footer(); ?>

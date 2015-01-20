<?php

/**
 * --------------------------------------------------------------------------------------------------------------
 *	Post Meta information.
 * --------------------------------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'opal_post_meta' ) ) {

	function opal_post_meta() {
		echo '<ul class="list-inline entry-meta">';


		if ( get_post_type() === 'post' ) {

			global $post_id;

			// if post is sticky
			if ( is_sticky() ) {
				echo '<li class="meta-icon fa fa-thumb-tack"></li>';
			}
			if ( has_post_format( 'gallery',$post_id ) ) {
				echo '<li class="meta-icon fa fa-camera"></li>';
			}
			elseif ( has_post_format( 'image',$post_id ) ) {
				echo '<li class="meta-icon fa fa-camera"></li>';
			}
			elseif ( has_post_format( 'audio',$post_id ) ) {
				echo '<li class="meta-icon fa fa-volume-up"></li>';
			}
			elseif ( has_post_format( 'video',$post_id ) ) {
				echo '<li class="meta-icon fa fa-video-camera"></li>';
			}
			elseif ( has_post_format( 'link',$post_id ) ) {
				echo '<li class="meta-icon fa fa-link"></li>';
			}
			elseif ( has_post_format( 'quote',$post_id ) ) {
				echo '<li class="meta-icon fa fa-quote-left"></li>';
			}

			// get the post author
			printf(
				'<li class="meta-author"><i class="fa fa-user"></i><a href="%1s" rel="author">%2s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);

			// get the postdate
			echo '<li class="meta-date"><i class="fa fa-clock-o"></i>' . get_the_date() .'</li>';

			// get the categories
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"><i class="fa fa-folder-o"></i>'. $category_list .'</li>';
			}

			// get the tags
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"><i class="fa fa-bookmark-o"></i>'. $tag_list .'</li>';
			}

			// get the comments
			if ( comments_open() ) :
				echo '<li class="meta-reply"><i class="fa fa-comment-o"></i>';
				comments_popup_link( __( 'Leave a comment', 'opal' ), __( 'One Comment', 'opal' ), __( '% Comments', 'opal' ) );
				echo '</li>';
			endif;

			// post edit link
			if ( is_user_logged_in() ) {
				echo '<li><i class="fa fa-pencil"></i>';
				edit_post_link( __( 'Edit', 'opal' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
	}
}

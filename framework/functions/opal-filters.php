<?php

/**
 * --------------------------------------------------------------------------------------------------------------
 *	0.1 - Site Title Filter wp_title
 * --------------------------------------------------------------------------------------------------------------
 */

function opal_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'opal' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'opal_wp_title', 10, 2 );


/**
 * --------------------------------------------------------------------------------------------------------------
 *	0.2 - Password Protected Form
 * --------------------------------------------------------------------------------------------------------------
 */

function opal_password_form() {
	global $post;
	$label = 'password-'.( empty( $post->ID ) ? rand() : $post->ID );
	$password_form = '<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
    '.__('<p>This post is password protected. To view it please enter your password below:</p>', 'opal').'
	    <div class="protected-form input-group has-info col-md-6">
	        <input class="form-control" value="' . get_search_query() . '" name="post_password" id="' . $label . '" type="password">
	        <span class="input-group-btn"><button type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="Submit"><span class="fa fa-lock"></span></button>
	        </span>
	    </div>
	</form>';
	return $password_form;
}
add_filter( 'the_password_form', 'opal_password_form' );

/**
 * --------------------------------------------------------------------------------------------------------------
 *	0.3 - Comment reply link filter
 * --------------------------------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'opal_comment_reply_link' ) ):
	// Style comment reply links as buttons
	function opal_comment_reply_link( $link ) {
		return str_replace( 'comment-reply-link', 'btn btn-primary btn-xs', $link );
	}
	add_filter( 'comment_reply_link', 'opal_comment_reply_link' );
endif;
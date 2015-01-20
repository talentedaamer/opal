<?php
/**
 * comments.php
 *
 * template for displaying comments and comments form.
 */
?>

<?php 
	// Prevent the direct loading of comments.php.
	if ( ! empty( $_SERVER['SCRIPT-FILENAME'] ) && basename( $_SERVER['SCRIPT-FILENAME'] ) == 'comments.php' ) {
		die( __( 'You cannot access this page directly.', 'opal' ) );
	}
?>

<?php 
	// If the post is password protected, display info text and return.
	if ( post_password_required() ) : ?>
		<p class="alert alert-info">
			<?php 
				_e( 'This post is password protected. Enter the password to view the comments.', 'opal' );

				return;
			?>
		</p>
	<?php endif; ?>

	<!-- Comments Area -->
	<div class="comments-area" id="comments">
		<?php if ( have_comments() ) : ?>

			<h2 class="comments-title">
				<?php 
					printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'Comment title', 'opal' ), number_format_i18n( get_comments_number() ) );
				?>
			</h2>

			<ol class="comments">
				<?php wp_list_comments(); ?>
			</ol>

			<?php 
				// If the comments are paginated, display the controls.
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
			<ul class="pager comment-nav" role="navigation">
				<li class="previous comment-nav-prev">
					<?php previous_comments_link( __( '&larr; Older Comments', 'opal' ) ); ?>
				</li>

				<li class="next comment-nav-next">
					<?php next_comments_link( __( 'Newer Comments &rarr;', 'opal' ) ); ?>
				</li>
			</ul> <!-- end comment-nav -->
			<?php endif; ?>

			<?php 
				// If the comments are closed, display an info text.
				if ( ! comments_open() && get_comments_number() ) :
			?>
				<p class="alert alert-info no-comments">
					<?php _e( 'Comments are closed.', 'opal' ); ?>
				</p>
			<?php endif; ?>

		<?php endif; ?> <!-- have_comments -->

		<?php comment_form(); ?>
		
	</div> <!-- end comments-area -->
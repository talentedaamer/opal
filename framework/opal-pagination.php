<?php

/**
 * --------------------------------------------------------------------------------------------------------------
 *	Theme Next/Prev Pagination
 * --------------------------------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'opal_pagination' ) ) {
	function opal_pagination() { ?>
		<ul class="pager"><?php
			// previous posts link
			if ( get_previous_posts_link() ) : ?>
			<li class="previous">
				<?php previous_posts_link( __( '&larr; Newer Posts', 'opal' ) ); ?>
			</li>
			<?php endif;

			// next posts link
			if ( get_next_posts_link() ) : ?>
			<li class="next">
				<?php next_posts_link( __( 'Older Posts &rarr;', 'opal' ) ); ?>
			</li>
			<?php endif; ?>
		</ul><?php
	}
}
<?php
/**
 * Searchform.php
 *
 * Template for displaying search form.
 * use get_search_form() function to display the search form
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="text" class="field form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'opal' ); ?>">
		<div class="input-group-append">
			<button class="btn btn-primary submit" type="submit" name="submit" id="searchsubmit">
				<?php _e( 'Search', 'opal' ); ?>
			</button>
		</div>
	</div><!-- /input-group -->
</form>
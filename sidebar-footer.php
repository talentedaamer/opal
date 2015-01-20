<?php
/**
 * sidebar-footer.php
 *
 * The footer sidebar.
 */
?>

<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
	<aside class="footer-sidebar" role="complementary">
		<div class="row">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div> <!-- .row -->
	</aside> <!-- .sidebar -->
<?php endif; ?>

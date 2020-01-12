<?php
/**
 * footer.php
 *
 * The template for displaying the footer
 */
?>


			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- .main-content -->


	<!-- footer -->
	<footer class="site-footer">
		<div class="container">

			<!-- get sidebar-footer -->
			<?php get_sidebar( 'footer' ); ?>
			
			<div class="copyright">
				<p>
					&copy; <?php echo date( 'Y' ); ?>
					<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?></a>

					<?php _e( 'All rights reserved', 'opal' ); ?>
				</p>
			</div> <!-- .copyright -->

		</div> <!-- .container -->
	</footer> <!-- .site-footer -->

	<?php wp_footer(); ?>

</body>
</html>
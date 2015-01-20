<?php

/**
 * --------------------------------------------------------------------------------------------------------------
 *	Register Theme Widget Areas
 * --------------------------------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'opal_widget_init' ) ) {
	function opal_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// register main widget area
			register_sidebar(
				array(
					'name' => __( 'Main Widget Area', 'opal' ),
					'id' =>	'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'opal' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
			// register main footer widget area
			register_sidebar(
				array(
					'name' => __( 'Footer Widget Area', 'opal' ),
					'id' =>	'footer-1',
					'description' => __( 'Appears on the footer.', 'opal' ),
					'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
		}
	}

	add_action( 'widgets_init', 'opal_widget_init' );

}
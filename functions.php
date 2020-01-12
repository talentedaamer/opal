<?php
/**
 *	functions.php
 *
 * Theme main functions and definations file.
 */


/**
 * --------------------------------------------------------------------------------------------------------------
 *	0.1 - defination constants
 * --------------------------------------------------------------------------------------------------------------
 */
$theme = wp_get_theme('opal');

if ( $theme ) {
	define( 'OPAL_VERSION', $theme->version );
}

if ( ! defined( 'OPAL_DIR_PATH' ) ) {
	define( 'OPAL_DIR_PATH', trailingslashit( get_template_directory() ) );
}
if ( ! defined( 'OPAL_DIR_URI' ) ) {
	define( 'OPAL_DIR_URI', trailingslashit( get_stylesheet_directory_uri() ) );
}

define( 'FRAMEWORK', OPAL_DIR_PATH . 'framework' );
define( 'THEMEROOT', OPAL_DIR_URI );
define( 'IMAGES', OPAL_DIR_URI . 'assets/images' );
define( 'SCRIPTS', OPAL_DIR_URI . 'assets/js' );
define( 'STYLES', OPAL_DIR_URI . 'assets/css' );


/**
 * --------------------------------------------------------------------------------------------------------------
 *	0.2 - load theme framework
 * --------------------------------------------------------------------------------------------------------------
 */

require_once( FRAMEWORK . '/init.php');

/**
 * --------------------------------------------------------------------------------------------------------------
 *	0.3 - setup theme default features and register support features
 * --------------------------------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'opal_setup' ) ) {
	function opal_setup() {
		global $content_width;

		/**
		 * set the width of the main content
		 * 780 is a pixel value
		 */
		if ( ! isset( $content_width ) )
		$content_width = 780;

		/**
		 * make the theme translation ready
		 */
		$lang_dir = THEMEROOT . '/lang';
		load_theme_textdomain( 'opal', $lang_dir );

		/**
		 * add support for post formats
		 */
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			)
		);

		/**
		 * add support for automatic feed links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * add suppot for post thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'blog-thumbs', 670, 400, true );
		add_image_size( '404-thumbs', 250, 250, true );

		/**
		 * register navigation menus
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'opal' )
			)
		);

		/**
		 * custom background support
		 */
		$background_args = array(
		  'default-color'  => 'f0f0f0',
		  'default-repeat' => 'fixed',
		);
		add_theme_support( 'custom-background', $background_args );
		
		/**
		 * custom header support
		 */
		$header_args = array(
		    'random-default'         => false,
		    'width'                  => 1400,
		    'height'                 => 500,
		    'flex-height'            => false,
		    'flex-width'             => false,
		    'header-text'            => false,
		    'uploads'                => true,
		);
		add_theme_support( 'custom-header', $header_args );
	}

	add_action( 'after_setup_theme', 'opal_setup' );
}

/**
 * --------------------------------------------------------------------------------------------------------------
 *	0.4 - register theme scripts and styles
 * --------------------------------------------------------------------------------------------------------------
 */

// if ( ! function_exists( 'opal_scripts' ) ) {
// 	function opal_scripts() {
// 		// google fonts
// 		wp_enqueue_style(
// 			'opal-google-fonts',
// 			'https://fonts.googleapis.com/css?family=Gelasio|Roboto&display=swap'
// 		);
		
// 		// Load the stylesheets
// 		// wp_enqueue_style( 'master', STYLES . '/master.css' );
// 		wp_enqueue_style( 'font-awesome', STYLES . '/font-awesome.css' );
// 		wp_enqueue_style( 'style', THEMEROOT . '/style.css' );

// 		// load scripts
// 		wp_enqueue_script( 'bootstrap.min', SCRIPTS . '/bootstrap/bootstrap.min.js', array( 'jquery' ), null, true );
// 		wp_enqueue_script( 'masonry' );
// 		wp_enqueue_script( 'opal-custom', SCRIPTS . '/scripts.js', array( 'jquery' ), null, true );

// 		// Adds support for pages with threaded comments
// 		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 			wp_enqueue_script( 'comment-reply' );
// 		}
// 	}

// 	add_action( 'wp_enqueue_scripts', 'opal_scripts' );
// }

<?php
/**
 * header.php
 *
 * header of the theme.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <!-- mobile specific meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<!-- top navigation -->
	<div class="top-menu">
		<div class="container">
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="menu-text"><i class="fa fa-reorder"></i> Menu</span>
		        </button>
		    </div>
			<nav class="main-nav navbar-default" role="navigation">
			    <?php
			        wp_nav_menu( array(
			            'theme_location'    => 'main-menu',
			            'depth'             => 0,
			            'container'         => 'div',
			            'container_class'   => 'main-nav navbar collapse navbar-collapse navbar-ex1-collapse',
			            'menu_class'        => 'nav navbar-nav',
			            'fallback_cb'       => 'opal_navwalker::fallback',
			            'walker'            => new opal_navwalker())
			        );
			    ?>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .top-menu -->

	<!-- header -->
	<header class="site-header" role="banner">

	    <?php 
        $header_image = get_header_image();
        if ( ! empty($header_image) && is_home() ) { ?>    
			<div class="header-banner">
	            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
				<div class="absolute-logo">
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				</div>
            </div> <!-- .header-banner -->
        <?php } else { ?>
			<div class="container header-contents">
				<div class="header-inner row">
					<div class="col-sm-6 col-md-4">
						<div class="site-logo">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
					</div> <!-- .col-sm-6 -->
					<div class="col-sx-8 col-md-8"></div> <!-- .col-sx-8 -->
				</div> <!-- .row -->
			</div> <!-- .container .header-contents -->
        <?php } ?>
	</header> <!-- .site-header -->
	<div class="opal-breadcrumb">
		<div class="container">
			<?php opal_breadcrumbs(); ?>
		</div>
	</div>

	<!-- main content area -->
	<div class="container">
		<div class="row">
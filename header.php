<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <?php
        $root_url = get_home_url();
        if ( get_post_type() === 'monoblock' && is_single() ) {
            echo '<meta name="searchimage" content="'.$root_url.'/wp-content/themes/msawheels/fonts/detailed-rims/png/rim-10.png">' . "\n";
        } elseif ( get_post_type() === 'legacy' && is_single() ) {
            echo '<meta name="searchimage" content="'.$root_url.'/wp-content/themes/msawheels/fonts/detailed-rims/png/rim-4.png">' . "\n";
        } elseif ( get_post_type() === 'post' && is_single() ) {
            echo '<meta name="searchimage" content="'.$root_url.'/wp-content/themes/msawheels/icons/blog.png">' . "\n";
        }
         elseif ( is_post_type_archive( 'gallery' ) ) {
            echo '<meta name="searchimage" content="'.$root_url.'/wp-content/themes/msawheels/icons/gallery.png">' . "\n";
        }
  ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!-- Top Header Bar -->
  <?php

  // get menu
  $menu = wp_get_nav_menu_object('primary');
  		// vars
      $left_link = get_field('left_link', $menu);
      $right_link = get_field('right_link', $menu);
  		$facebook = get_field('facebook', $menu);
      $instagram = get_field('instagram', $menu);
  ?>

  <header>
		<div id="header">
			<div class="container-fluid">
	      <div class="pull-left">
          <a class="text-uppercase" href="<?php echo $left_link['url']; ?>" target="<?php echo $left_link['target']; ?>"><?php echo $left_link['title']; ?></a>
					<span class="navbar-divider">|</span>
					  <a href="javascript:void(0)"><i class="far fa-search"></i></a>
				</div>
				<div class="pull-right">
					  <a class="text-uppercase" href="<?php echo $right_link['url']; ?>" target="<?php echo $right_link['target']; ?>"><?php echo $right_link['title']; ?></a>
					<span class="navbar-divider">|</span>
					<a class="text-uppercase" href="<?php echo $facebook; ?>" class="icon"><i class="fab fa-facebook"></i></a>
					<a class="text-uppercase" href="<?php echo $instagram; ?>" class="icon"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
		</div>
	</header>
  <!-- /Top Header Bar -->

  <!-- Side Navigation -->
  <div id="sidenav" class="sidenav full-screen">
      <div class="sidenav-inner">
        <div class="sidenav-left col-sm-12 col-md-6 col-lg-8">
            <div class="sidenav-logo-wrapper">
                <a href="#" class="sidenav-logo">
                    <img alt="MSA Logo" src="<?= content_url('uploads/2018/03/sidenav-logo.jpg'); ?>" />
                </a>
            </div>
            <div class="sidenav-social-media">
                <a href="javascript:void(0)" class="icon"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="javascript:void(0)" class="icon"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
        </div>
        <div class="sidenav-right col-sm-12 col-md-6 col-lg-4">
            <div class="sidenav-right-inner">
                <form class="navbar-form" role="search">
                    <div class="input-wrapper">
                            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                    </div>
                </form>
                <?php
                  wp_nav_menu( array(
                     'menu'              => 'sidenav',
                     'theme_location'    => 'sidenav',
                     'depth'             => 2,
                     'container'         => false,
                     'container_class'   => false,
                     'container_id'      => false,
                     'menu_class'        => 'nav flex-column text-uppercase',
                     //'fallback_cb'       => '',
                     //'items_wrap'        => '%3$s'
                  ));
                ?>
                <div class="sidenav-social-media">
                    <a href="javascript:void(0)" class="icon"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="javascript:void(0)" class="icon"><i class="fab fa-instagram fa-2x"></i></a>
                </div>
                <div class="sidenav-copyright">MSA COPYRIGHT &copy; 2018</div>
            </div>
            <div class="sidenav-right-texture"></div>
        </div>
        <div class="toggle-wrapper">
            <button type="button" class="navbar-toggle side-nav-close" data-sidenav="sidenav">
                <span class="sr-only">Toggle navigation</span>
                <div class="close-icon"></div>
            </button>
        </div>
    </div>
</div>
  <!-- /Side Navigation -->

  <!-- Navigation -->
  <div class="nav-wrapper">
    <nav class="navbar navbar-default navbar-static-top" id="navColor" data-spy="affix" data-offset-top="40">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo get_bloginfo( 'url' ); ?>">
            <?php
                // vars
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                global $display_logo;
                $display_logo = esc_url( $logo[0] );
                if ( has_custom_logo() ) {
                    echo '<img src="'. $display_logo .'" alt="' . get_bloginfo( 'name' ) . '" id="navLogo">';
                } else {
                    echo get_bloginfo( 'name' );
                }
            ?>
          </a>
        </div>
        <div class="navbar-right">
          <!-- .navbar-collapse -->
          <?php
            wp_nav_menu( array(
               'menu'              => 'primary',
               'theme_location'    => 'primary',
               'depth'             =>  1,
               'container'         => 'div',
               'container_class'   => 'collapse navbar-collapse',
               'container_id'      => 'navbar',
               'menu_class'        => 'nav navbar-nav text-uppercase',
               'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
               'walker'            => new wp_bootstrap_navwalker())
            );
          ?>
          <!--/.nav-collapse -->
          <div class="toggle-wrapper">
            <button type="button" class="navbar-toggle side-nav-open" data-sidenav="sidenav">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </div>

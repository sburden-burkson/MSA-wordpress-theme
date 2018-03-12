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
      $left_link_1 = get_field('left_link_1', $menu);
      $left_link_2 = get_field('left_link_2', $menu);
      $right_link_1 = get_field('right_link_1', $menu);
  		$facebook = get_field('facebook', $menu);
      $instagram = get_field('instagram', $menu);
  ?>

  <header>
		<div id="header">
			<div class="container-fluid">
	      <div class="pull-left">
          <a class="text-uppercase" href="<?php echo $left_link_1['url']; ?>" target="<?php echo $left_link_1['target']; ?>"><?php echo $left_link_1['title']; ?></a>
					<span class="navbar-divider">|</span>
					  <a href="<?php echo $left_link_2['url']; ?>" target="<?php echo $left_link_2['target']; ?>"><?php echo $left_link_2['title']; ?></a>
				</div>
				<div class="pull-right">
					  <a class="text-uppercase" href="<?php echo $right_link_1['url']; ?>" target="<?php echo $right_link_1['target']; ?>"><?php echo $right_link_1['title']; ?></a>
					<span class="navbar-divider">|</span>
					<a class="text-uppercase" href="<?php echo $facebook; ?>" class="icon"><i class="fa fa-facebook-official"></i></a>
					<a class="text-uppercase" href="<?php echo $instagram; ?>" class="icon"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
		</div>
	</header>
  <!-- /Top Header Bar -->

  <!-- Side Navigation -->
  <?php /*
      wp_nav_menu( array(
         'menu'              => 'sidenav',
         'theme_location'    => 'sidenav',
         'depth'             => 2,
         'container'         => false,
         'container_class'   => false,
         'container_id'      => false,
         'menu_class'        => false,
         'fallback_cb'       => '',
     	   'items_wrap'        => '%3$s',
         'walker'            => new sidenav_navwalker()
      )); */
  ?>
  <!-- /Side Navigation -->

  <!-- Navigation -->
  <div class="nav-wrapper">
    <nav class="navbar navbar-default navbar-static-top" data-spy="affix" data-offset-top="40">
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
                    echo '<img src="'. $display_logo .'" alt="' . get_bloginfo( 'name' ) . '" class="navLogo">';
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
  		               'menu_class'        => 'nav navbar-nav',
  		               'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
  		               'walker'            => new wp_bootstrap_navwalker())
  		            );
          		?>
          <!--/.nav-collapse -->
          <div class="toggle-wrapper">
            <button type="button" class="navbar-toggle side-nav-open">
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

<?php
  // get menu
  $menu = wp_get_nav_menu_object('footer');
  // vars
  $background_image = get_field('background_image', $menu);
  $bottom_right_footer_content = get_field('bottom_right_footer_content', $menu);
  $top_area_content = get_field('top_area_content', $menu);
  $top_texture_image = get_field('top_texture_image', $menu);
?>

<div class="texture-section no-padding">
  <div class="texture-top" style="background-image: url('<?php echo $top_texture_image['url']; ?>');">
  </div>
  <img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>" class="wp-full-width" />
  <div class="absolute-center">
    <?php echo $top_area_content; ?>
  </div>
</div>

    <?php
        // vars
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        $display_logo = esc_url( $logo[0] );
        $year = date('Y');
    ?>
    <footer class="black-footer">
      <div class="container copyright">
        <div class="pull-left">
          <img alt="<?php echo get_bloginfo( 'name' ); ?>" class="footerLogo" src="<?php echo $display_logo; ?>">
        </div>
      </div>
        <div class="container footer-link-wrap">
          <div class="row">
            <div class="col-sm-3 col-sm-push-9 pad-bottom footer-sub">
                <?php echo $bottom_right_footer_content; ?>
            </div>
            <div class="col-sm-9 col-sm-pull-3">
              <div class="row">
                <div aria-multiselectable="true" class="panel-group" id="footerAccordion" role="tablist">
                  <?php
                    wp_nav_menu(array(
                      'menu'          => 'footer',
                      'theme_location' => 'footer',
                      'items_wrap' => '%3$s',
                      'walker' => new Footer_Navwalker(),
                      'container' => false,
                      'menu_class' => '',
                      'fallback_cb' => false
                    ));
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
  </footer>
  <?php wp_footer(); ?>


  </body>
</html>

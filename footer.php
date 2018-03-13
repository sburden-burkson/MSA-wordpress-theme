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
                <?php
                  // get menu
                  $menu = wp_get_nav_menu_object('footer');
                  // vars
                  $footer_text_area = get_field('footer_text_area', $menu);

                  echo $footer_text_area;
                ?>
                <!-- <h4>STAY INFORMED</h4>
                <div class="input-group">
                  <input class="form-control black-bg" placeholder="email" type="text">
                  <span class="input-group-btn">
                  <button class="btn trans-bg" type="button"><i class="fal fa-long-arrow-right fa-lg"></i></button>
                 </span>
                </div> -->
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

    <?php
        // vars
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        $display_logo = esc_url( $logo[0] );
        $year = date('Y');
    ?>
    <footer>
      <div class="container copyright">
        <div class="pull-left">
          <img alt="<?php echo get_bloginfo( 'name' ); ?>" class="footerLogo" src="<?php echo $display_logo; ?>">
        </div>
            <div class="pull-right">
          <p>&copy; <?php echo $year; ?></p>
        </div>
      </div>
      <div class="container links">
        <div class="row">

          <div class="col-sm-3 col-sm-push-9 pad-bottom">
            <p><b>STAY INFORMED</b></p>
            <input type="text" class="form-control" placeholder="EMAIL">
          </div>

          <div class="col-sm-9 col-sm-pull-3">
            <div class="row">
              <div class="col-sm-2 col-xs-6">
                <p class="links-heading">WHEELS</p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
              </div>
              <div class="col-sm-2 col-xs-6">
                <p class="links-heading">WHEELS</p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
              </div>
              <div class="col-sm-2 col-xs-6">
                <p class="links-heading">WHEELS</p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
              </div>
              <div class="col-sm-2 col-xs-6">
                <p class="links-heading">WHEELS</p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
              </div>
              <div class="col-sm-2 col-xs-6">
                <p class="links-heading">WHEELS</p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
              </div>
              <div class="col-sm-2 col-xs-6">
                <p class="links-heading">WHEELS</p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
                <p><a href="javascript:void(0)">Link here</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>

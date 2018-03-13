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
        <div class="container footer-link-wrap">
          <div class="row">
            <div class="col-sm-3 col-sm-push-9 pad-bottom footer-sub">
                <h4 class="">STAY INFORMED</h4>
                <div class="input-group">
                <input class="form-control black-bg" placeholder="email" type="text">
                <span class="input-group-btn">
                  <button class="btn trans-bg" type="button"><i class="fal fa-long-arrow-right fa-lg"></i></button>
                 </span>
              </div>
            </div>
            <div class="col-sm-9 col-sm-pull-3">
              <div class="row">
                <div aria-multiselectable="true" class="panel-group" id="footerAccordion" role="tablist">
                  <div class="panel col-sm-2">
                    <div class="panel-heading" id="heading1" role="tab">
                      <h4 class="panel-title"><a href="javascript:void(0)">WHEELS</a> <span class="visible-xs pull-right"><a aria-controls="collapse1"
                        aria-expanded="false" class="collapsed" data-parent="#footerAccordion" data-toggle="collapse" href="#collapse1" role=
                        "button"><i class="fal fa-plus"></i></a></span></h4>
                    </div>
                    <div aria-labelledby="heading1" class="panel-collapse collapse" id="collapse1" role="tabpanel">
                      <div class="panel-body">
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="panel col-sm-2">
                    <div class="panel-heading" id="heading2" role="tab">
                      <h4 class="panel-title"><a href="javascript:void(0)">WHEELS</a> <span class="visible-xs pull-right"><a aria-controls="collapse2"
                        aria-expanded="false" class="collapsed" data-parent="#footerAccordion" data-toggle="collapse" href="#collapse2" role=
                        "button"><i class="fal fa-plus"></i></a></span></h4>
                    </div>
                    <div aria-labelledby="heading2" class="panel-collapse collapse" id="collapse2" role="tabpanel">
                      <div class="panel-body">
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="panel col-sm-2">
                    <div class="panel-heading" id="heading3" role="tab">
                      <h4 class="panel-title"><a href="javascript:void(0)">WHEELS</a> <span class="visible-xs pull-right"><a aria-controls="collapse3"
                        aria-expanded="false" class="collapsed" data-parent="#footerAccordion" data-toggle="collapse" href="#collapse3" role=
                        "button"><i class="fal fa-plus"></i></a></span></h4>
                    </div>
                    <div aria-labelledby="heading3" class="panel-collapse collapse" id="collapse3" role="tabpanel">
                      <div class="panel-body">
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="panel col-sm-2">
                    <div class="panel-heading" id="heading4" role="tab">
                      <h4 class="panel-title"><a href="javascript:void(0)">WHEELS</a> <span class="visible-xs pull-right"><a aria-controls="collapse4"
                        aria-expanded="false" class="collapsed" data-parent="#footerAccordion" data-toggle="collapse" href="#collapse4" role=
                        "button"><i class="fal fa-plus"></i></a></span></h4>
                    </div>
                    <div aria-labelledby="heading4" class="panel-collapse collapse" id="collapse4" role="tabpanel">
                      <div class="panel-body">
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="panel col-sm-2">
                    <div class="panel-heading" id="heading5" role="tab">
                      <h4 class="panel-title"><a href="javascript:void(0)">WHEELS</a> <span class="visible-xs pull-right"><a aria-controls="collapse5"
                        aria-expanded="false" class="collapsed" data-parent="#footerAccordion" data-toggle="collapse" href="#collapse5" role=
                        "button"><i class="fal fa-plus"></i></a></span></h4>
                    </div>
                    <div aria-labelledby="heading5" class="panel-collapse collapse" id="collapse5" role="tabpanel">
                      <div class="panel-body">
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="panel col-sm-2">
                    <div class="panel-heading" id="heading6" role="tab">
                      <h4 class="panel-title"><a href="javascript:void(0)">WHEELS</a> <span class="visible-xs pull-right"><a aria-controls="collapse6"
                        aria-expanded="false" class="collapsed" data-parent="#footerAccordion" data-toggle="collapse" href="#collapse6" role=
                        "button"><i class="fal fa-plus"></i></a></span></h4>
                    </div>
                    <div aria-labelledby="heading6" class="panel-collapse collapse" id="collapse6" role="tabpanel">
                      <div class="panel-body">
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                        <p><a href="javascript:void(0)">Link here</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>

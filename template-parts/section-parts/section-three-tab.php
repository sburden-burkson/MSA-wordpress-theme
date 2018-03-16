<?php if( have_rows('tabs') ): ?>
  <!-- Three Tab -->
  <div class="section container">

    <div class="warranty-options">
      <div class="row">
      <?php
          $count = 0;
          while ( have_rows('tabs') ) : $count++; the_row();
            //vars
            $heading = get_sub_field('heading');
            $tab_id = preg_replace("/[^a-zA-Z]+/", "", ucwords($heading));
            $active = "";
            if ($count == 1) {
              $active = " active";
              $text_align = "text-left";
            } elseif ($count == 2) {
              $text_align = "text-center";
            } else {
              $text_align = "text-right";
            }
      ?>

        <div class="col-xs-4 <?php echo $text_align; ?>">
          <div class="warranty-option center">
              <a class="warrantyOptionHeight text-uppercase<?php echo $active; ?>" href="#<?php echo $tab_id; ?>" data-toggle="tab"><?php echo $heading; ?></a>
          </div>
        </div>

      <?php endwhile; ?>
      </div>
    </div>

    <div class="tab-content pad-bottom-lg warranty-panes">
      <?php
          $count2 = 0;
          while ( have_rows('tabs') ) : $count2++; the_row();
            //vars
            $heading = get_sub_field('heading');
            $heading_word_array = explode(" ", strtoupper($heading));
            $tab_id = preg_replace("/[^a-zA-Z]+/", "", ucwords($heading));
            $content_heading = get_sub_field('content_heading');
            $content = get_sub_field('content');
            $add_a_button = get_sub_field('add_a_button');
            $button_text = get_sub_field('button_text');
            $button_url = get_sub_field('button_url');
            $active = ($count2 == 1) ? "in active" : "";
      ?>
      <div class="row tab-pane fade <?php echo $active; ?>" id="<?php echo $tab_id; ?>">

        <div class="col-sm-9">
          <div class="warranty-info">
            <div class="warrantyHeight warranty-heading text-uppercase">
              <?php for ($i = 0; $i <= count($heading_word_array); $i++): ?>
                <h1><?php echo $heading_word_array[$i]; ?></h1>
              <?php endfor; ?>
            </div>
            <div class="warrantyInfoHeight">
              <?php echo $content; ?>
            </div>
            <?php echo $section_content; ?>
            <?php if ($add_a_button): ?>
              <p class="pad-top pad-bottom"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-xs-3 hidden-xs">
          <div class="warrantyHeight">
          </div>
        <?php if( have_rows('tab_highlight_checks') ): ?>
          <div class="warranty-checks">
          <?php
            while ( have_rows('tab_highlight_checks') ) : the_row();
              $highlight = get_sub_field('highlight');
          ?>
            <h5 class="pad-bottom"><i class="fal fa-check red"></i> <?php echo $highlight; ?></h5>
            <?php endwhile; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- /Three Tab -->
<?php endif; ?>

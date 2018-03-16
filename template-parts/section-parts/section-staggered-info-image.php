<?php
    //vars
    $left_or_right = get_sub_field('left_or_right');
    $count = ($left_or_right == 'left') ? -1 : 0;
    // check if the repeater field has rows of data
?>
<!-- Staggered Info Image Row-->
  <?php if( have_rows('info_image_pair') ):
          while ( have_rows('info_image_pair') ) : $count++; the_row();
            //vars
            $content = get_sub_field('content');
            $content_image = get_sub_field('content_image');
            $large_image = get_sub_field('large_image');
            $add_a_button = get_sub_field('add_a_button');
            $button_text = get_sub_field('button_text');
            $button_url = get_sub_field('button_url');
            $column_push = ($count % 2 == 0) ? ' col-sm-push-8' : '';
            $column_pull = ($count % 2 == 0) ? '  col-sm-pull-4' : '';
      ?>
      <div class="container-fluid v-center-section">
        <div class="row">
          <div class="col-sm-4<?php echo $column_push; ?>">
            <div class="accessoryHeight center text-center pad-top">
              <img src="<?php echo $content_image['url']; ?>" alt="<?php echo $content_image['alt']; ?>" class="img-responsive">
              <?php echo $content; ?>
              <?php if ($add_a_button): ?>
                <p class="pad-top pad-bottom"><a href="javascript:void(0)" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-8<?php echo $column_pull; ?> no-pad-right no-pad-left">
            <div class="accessoryHeight dark-bg texture-section" style="background-image: url('<?php echo $large_image; ?>')"></div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
<!-- /Staggered Info Image Row -->

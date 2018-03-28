<?php
    //vars
    $background_image = get_sub_field('background_image');
    $shade_of_background = get_sub_field('shade_of_background');
    $contain_background_size = get_sub_field('contain_background_size') ? ' contain-bg' : '';
    $centered_text = get_sub_field('centered_text') ? 'text-center ' : '';
    $vertical_padding = get_sub_field('vertical_padding') . " ";
    $texture_bottom = get_sub_field('texture_bottom');
    $overlay = get_sub_field('overlay');
    $add_a_button = get_sub_field('add_a_button');
    $button_text = get_sub_field('button_text');
    $button_url = get_sub_field('button_url');
    $scroll_down_arrow = get_sub_field('scroll_down_arrow');
    $scroll_down_arrow_color = get_sub_field('scroll_down_arrow_color');

    $centered_header = get_sub_field('centered_header');
    $left_column_content = get_sub_field('left_column_content');
    $right_column_content = get_sub_field('right_column_content');
?>

<!-- Header w 2 Column Section -->
<div class="section <?php echo $shade_of_background . $contain_background_size; ?>" style="background-image: url('<?php echo $background_image; ?>');">
    <div class="<?php echo $vertical_padding . $overlay; ?>container">
      <div class="text-center pad-bottom">
        <?php echo $centered_header; ?>
      </div>
      <div class="row pad-top">
        <div class="col-sm-6">
          <div class="<?php echo $centered_text; ?>restricted-width">
            <?php echo $left_column_content; ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="<?php echo $centered_text; ?>restricted-width">
            <?php echo $right_column_content; ?>
          </div>
        </div>
      </div>
      <?php if ($add_a_button): ?>
        <p class="text-center pad-top"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
      <?php endif; ?>
      <?php if ($scroll_down_arrow): ?>
        <div class="text-center down-arrows">
          <a href="javascript:void(0)" class="trans-white-md">
            <img src="/wp-content/themes/msawheels/icons/chevron-<?php echo $scroll_down_arrow_color; ?>.png" alt="">
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>
<!-- /Header w 2 Column Section -->

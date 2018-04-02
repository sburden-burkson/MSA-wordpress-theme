<?php
    //vars
    $section_content = get_sub_field('section_content');
    $background_image = get_sub_field('background_image');
    $shade_of_background = get_sub_field('shade_of_background') . " ";
    $width_restriction = get_sub_field('width_restriction') . " ";
    $centered_text = get_sub_field('centered_text') ? 'text-center ' : '';
    $vertical_padding = get_sub_field('vertical_padding');
    $texture_bottom = get_sub_field('texture_bottom');
    $overlay = get_sub_field('overlay');
    $add_a_button = get_sub_field('add_a_button');
    $button_text = get_sub_field('button_text');
    $button_url = get_sub_field('button_url');
    $scroll_down_arrow = get_sub_field('scroll_down_arrow');
    $scroll_down_arrow_color = get_sub_field('scroll_down_arrow_color');
    $parallax = get_sub_field('parallax') ? "fixed-bg scroll-effect " : "";
?>

<!-- Top Section -->
<div class="section <?php echo $parallax . $shade_of_background;?>texture-section" style="background-image: url('<?php echo $background_image; ?>');">
      <div class="<?php echo $centered_text . $overlay; ?>" id="<?php echo $vertical_padding; ?>">
        <?php echo $section_content; ?>
        <?php if (isset($tag_name)): ?>
          <h4 class="text-uppercase fw-300">#<?php echo $tag_name; ?></h4>
        <?php endif; ?>
        <?php if ($add_a_button): ?>
          <p class="<?php echo $centered_text; ?>pad-top pad-bottom"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
        <?php endif; ?>
        <?php if ($scroll_down_arrow): ?>
          <div class="down-arrows pad-bottom">
            <a href="javascript:void(0)" class="trans-white-md">
              <img src="/wp-content/themes/msawheels/icons/chevron-<?php echo $scroll_down_arrow_color; ?>.png" alt="">
            </a>
          </div>
        <?php endif; ?>
      </div>
    <div class="texture-top" style="background-image: url('/wp-content/themes/msawheels/textures/top-gradient.png');"></div>
    <div class="texture-bottom" style="background-image: url('<?php echo $texture_bottom; ?>');"></div>
  </div>
<!-- /Top Section -->

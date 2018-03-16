<?php
    //vars
    $section_content = get_sub_field('section_content');
    $background_image = get_sub_field('background_image')['url'];
    $shade_of_background = get_sub_field('shade_of_background');
    $width_restriction = get_sub_field('width_restriction') . " ";
    $centered_text = get_sub_field('centered_text') ? 'text-center ' : '';
    $vertical_padding = get_sub_field('vertical_padding') . " ";
    $overlay = get_sub_field('overlay');
    $add_a_button = get_sub_field('add_a_button');
    $button_text = get_sub_field('button_text');
    $button_url = get_sub_field('button_url');
    $texture_top = get_sub_field('texture_top')['url'];
    $texture_bottom = get_sub_field('texture_bottom')['url'];
?>

<!-- Full Section -->
<div class="section texture-section <?php echo $shade_of_background; ?>" style="background-image: url('<?php echo $background_image; ?>');">
  <div class="<?php echo $vertical_padding . $width_restriction . $centered_text . $overlay; ?>">
    <?php echo $section_content; ?>
    <?php if ($add_a_button): ?>
      <p class="text-center pad-top"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
    <?php endif; ?>
  </div>
  <div class="texture-top" style="background-image: url('<?php echo $texture_top; ?>');"></div>
  <div class="texture-bottom" style="background-image: url('<?php echo $texture_bottom; ?>');"></div>
</div>
<!-- /Full Section -->

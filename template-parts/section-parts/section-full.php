<?php
    //vars
    $section_content = get_sub_field('section_content');
    $background_image = get_sub_field('background_image');
    $shade_of_background = get_sub_field('shade_of_background') . " ";
    $width_restriction = get_sub_field('width_restriction') . " ";
    $centered_text = get_sub_field('entered_text') ? 'text-center ' : '';
    $vertical_padding = get_sub_field('vertical_padding') . " ";
    $texture_section = get_sub_field('texture_section') ? 'texture-section ' : '';
    $overlay = get_sub_field('overlay');
    $add_a_button = get_sub_field('add_a_button');
    $button_text = get_sub_field('button_text');
    $button_url = get_sub_field('button_url');
    // $section_type = $section_background ? "-bg " : "-section ";
    // $reduced_height = get_sub_field('reduced_height') ? "half" . $section_type : "full" . $section_type;

    // $content_side = (get_sub_field('content_side') != "Center") ? get_sub_field('content_side') . " " : "";
    // $vertical_arrangement = get_sub_field('vertical_arrangement');
    // $content_width = get_sub_field('width_restricted_content') ? "restricted-width " : "";
    // $texture_secttion = get_sub_field('centered_text') ? "text-center " : "";
    // $spaced_out_text = get_sub_field('spaced_out_text') ? "spaced-section " : "";

?>

<!-- Full Section -->
<div class="section <?php echo $shade_of_background . $texture_section; ?>" style="background-image: url('<?php echo $background_image; ?>');">
  <div class="<?php echo $vertical_padding . $width_restriction . $centered_text . $overlay; ?>">
    <?php echo $section_content; ?>
    <?php if ($add_a_button): ?>
      <p class="text-center pad-top"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
    <?php endif; ?>
  </div>
</div>
<!-- /Full Section -->

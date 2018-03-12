<?php
    //vars
    $section_background = get_sub_field('section_background');
    $section_type = $section_background ? "-bg " : "-section ";
    $reduced_height = get_sub_field('reduced_height') ? "half" . $section_type : "full" . $section_type;
    $shade_of_background = get_sub_field('shade_of_background') . " ";
    $content_side = (get_sub_field('content_side') != "Center") ? get_sub_field('content_side') . " " : "";
    $vertical_arrangement = get_sub_field('vertical_arrangement');
    $content_width = get_sub_field('width_restricted_content') ? "restricted-width " : "";
    $centered_text = get_sub_field('centered_text') ? "text-center " : "";
    $spaced_out_text = get_sub_field('spaced_out_text') ? "spaced-section " : "";
    $section_content = get_sub_field('section_content');
?>

<!-- Full Section -->
<div class="<?php echo $shade_of_background . $reduced_height; ?>" style="background-image: url('<?php echo $section_background; ?>');">
  <div class="container wp-full-height">
    <div class="row wp-full-height">
      <div class="<?php echo $content_side; ?>wp-full-height">
        <div class="wp-table wp-full-height">
          <div class="<?php echo $vertical_arrangement; ?>">
            <div class="<?php echo $content_width . $spaced_out_text . $centered_text; ?>section-info-wrap">
              <?php echo $section_content; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Full Section -->

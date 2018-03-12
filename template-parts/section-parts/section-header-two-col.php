<?php
    //vars
    // $section_background = get_sub_field('section_background');
    // $section_type = $section_background ? "-bg " : "-section ";
    // $reduced_height = get_sub_field('reduced_height') ? "half".$section_type : "full".$section_type;
    // $shade_of_background = get_sub_field('shade_of_background') . " ";
    // $centered_text = get_sub_field('centered_text') ? "text-center " : "";
    // $spaced_out_text = get_sub_field('spaced_out_text') ? "spaced-section " : "";
    $header = get_sub_field('header');
    $left_column_content= get_sub_field('left_column_content');
    $right_column_content= get_sub_field('right_column_content');
?>

<!-- Header w 2 Column Section -->
<div class="half-section" style="">
  <div class="container wp-full-height">
    <div class="section-info-wrap center pad-bottom">
      <?php echo $header; ?>
    </div>
    <div class="row wp-full-height">
      <div class="col-sm-6 wp-full-height">
        <div class="wp-table wp-full-height">
          <div class="wp-table-cell-middle">
            <div class="section-info-wrap restricted-width spaced-section">
              <?php echo $left_column_content; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 wp-full-height">
        <div class="wp-table wp-full-height">
          <div class="wp-table-cell-middle">
            <div class="section-info-wrap restricted-width spaced-section">
              <?php echo $right_column_content; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Header w 2 Column Section -->

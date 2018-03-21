<?php
    //vars
    $section_content = get_sub_field('section_content');
    $width = get_sub_field('width') . " ";
    $vertical_padding = (get_sub_field('vertical_padding') !== 'none') ? get_sub_field('vertical_padding') : '';
    $wysiwyg_editor = get_sub_field('wysiwyg_editor');
    // $scroll_down_arrow = get_sub_field('scroll_down_arrow');
    // $scroll_down_arrow_color = get_sub_field('scroll_down_arrow_color');
?>

<!-- Top Section -->
<div class="section <?php echo $width . $vertical_padding;?>">
  <?php echo $wysiwyg_editor; ?>
</div>
<!-- /Top Section -->

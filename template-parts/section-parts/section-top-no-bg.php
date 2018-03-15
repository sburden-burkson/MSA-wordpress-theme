<?php
    //vars
    $section_content = get_sub_field('section_content');
    $width_restriction = get_sub_field('width_restriction');
    $centered_text = get_sub_field('centered_text') ? 'text-center ' : '';
    $add_a_button = get_sub_field('add_a_button');
    $button_text = get_sub_field('button_text');
    $button_url = get_sub_field('button_url');
    $scroll_down_arrow = get_sub_field('scroll_down_arrow');
    $scroll_down_arrow_color = get_sub_field('scroll_down_arrow_color');
?>

<!-- Top Section No Background -->
<div class="section container no-banner <?php echo $centered_text . $width_restriction; ?>">
  <?php echo $section_content; ?>
  <?php if ($add_a_button): ?>
    <p class="<?php echo $centered_text ?>pad-top"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
  <?php endif; ?>
  <?php if ($scroll_down_arrow): ?>
    <div class="<?php echo $centered_text ?>down-arrows">
      <a href="javascript:void(0)" class="trans-white-md">
        <img src="/wp-content/uploads/2018/03/chevron-grey.png" alt="">
      </a>
    </div>
  <?php endif; ?>
</div>
<!-- /Top Section No Background -->

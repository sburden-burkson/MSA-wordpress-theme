<?php
  //vars
  $left_or_right = strtolower(get_sub_field('left_or_right'));
  $count = 0;
  $side_counter = ($left_or_right == 'right') ? 0 : 1;
?>

<?php if( have_rows('image_caption_pair') ): ?>
<!-- Stacked Image Section -->
<div class="article-body">
  <div class="staggered-image-section">
  <?php while ( have_rows('image_caption_pair') ) : $count++; $side_counter++; the_row();
        //vars
        $stagger = ($count > 1) ? "stagger-top " : "";
        $css_position = ($count % 2 == 1) ? "wp-relative " : "";
        $image_side = ($side_counter % 2 == 1) ? "right" : "left";
        $image = get_sub_field('image');
        $image_url = $image['url'];
        $image_alt = $image['alt'];
        $caption = get_sub_field('caption');
  ?>
    <div class="<?php echo $stagger . $css_position; ?>wp-table">

      <?php if($image_side == "right"): ?>
        <div class="wp-table-cell-middle pad-left-right">
          <p><?php echo $caption; ?></p>
        </div>
        <div class="wp-table-cell-middle">
          <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="img-responsive">
        </div>
      <?php else: ?>
        <div class="wp-table-cell-middle">
          <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="img-responsive">
        </div>
        <div class="wp-table-cell-middle pad-left-right">
          <p><?php echo $caption; ?></p>
        </div>
      <?php endif; ?>

    </div>
<?php endwhile; ?>
  </div>
</div>
<!-- /Stacked Image Section -->
<?php endif; ?>

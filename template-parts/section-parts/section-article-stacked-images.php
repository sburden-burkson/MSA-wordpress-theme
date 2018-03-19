<?php
  //vars
  $image_left_or_right = strtolower(get_sub_field('left_or_right'));
  $count = 0;
  $side_counter = ($image_left_or_right == 'right') ? 0 : 1;
?>

<?php if( have_rows('image_caption_pair') ): ?>
<!-- Stacked Image Section -->
<div class="section article-body">
  <div class="staggered-image-section">
  <?php while ( have_rows('image_caption_pair') ) : $count++; $side_counter++; the_row();
        //vars
        $image = get_sub_field('image');
        $image_url = $image['url'];
        $image_alt = $image['alt'];
        $caption = get_sub_field('caption');
        $z_position = ($count % 2 == 1) ? ' position-top' : '';
        $image_side = ($side_counter % 2 == 1) ? " col-sm-push-3" : "";
        $caption_side = ($side_counter % 2 == 1) ? " col-sm-pull-9" : "";
  ?>
    <div class="row blogStagger">
      <div class="col-sm-9 stagger-top<?php echo $image_side . $z_position; ?>">
        <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="wp-full-width">
      </div>
      <div class="col-sm-3<?php echo $caption_side; ?>">
        <div class="wp-table wp-full-width blogStagger">
          <div class="wp-table-cell-middle text-center">
            <p><?php echo $caption; ?></p>
          </div>
        </div>
      </div>
    </div>
<?php endwhile; ?>
  </div>
</div>
<!-- /Stacked Image Section -->
<?php endif; ?>

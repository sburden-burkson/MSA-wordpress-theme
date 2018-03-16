<?php
    //vars
    $content_side = strtolower(get_sub_field('content_side'));
    $content = get_sub_field('content');
    $background_image = get_sub_field('background_image');
    $column_pull = ($content_side == 'right') ? " col-sm-pull-6 " : " ";
    $column_push = ($content_side == 'right') ? " col-sm-push-6 " : " ";
    $other_side = ($content_side == 'right') ? 'left' : 'right';
?>

<!-- Content on Side with Images -->
<div class="section container v-center-section photo-grid">
  <div class="row">
    <div class="col-sm-6<?php echo $column_push; ?>photo-grid-<?php echo $content_side; ?>">
    <?php
      if( have_rows($other_side.'_side_images') ): while ( have_rows($other_side.'_side_images') ) : the_row();
        //vars
        $image = get_sub_field($other_side.'_image');
        $image_url = $image['url'];
        $image_alt = $image['alt'];
    ?>
			<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="img-responsive photo-grid-img">
    <?php endwhile; endif; ?>
    </div>
		<div class="col-sm-6<?php echo $column_pull; ?>photo-grid-<?php echo $content_side; ?>">
			<div class="photo-grid-text">
        <div class="restricted-width-left full-width-tablet pad-bottom">
          <?php echo $content; ?>
			  </div>
			</div>
      <?php
        if( have_rows($content_side.'_side_images') ): while ( have_rows($content_side.'_side_images') ) : the_row();
          //vars
          $image = get_sub_field($content_side.'_image');
          $image_url = $image['url'];
          $image_alt = $image['alt'];
      ?>

  			<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="img-responsive photo-grid-img">
      <?php endwhile; endif; ?>
		</div>
  </div>
</div>
<!-- /Content on Side with Images -->

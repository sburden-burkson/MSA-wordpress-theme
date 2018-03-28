<?php
  $column_count = count(get_sub_field('info_image_pair'));
?>
<!-- Info Image Columns  -->
<?php if( have_rows('info_image_pair') ): ?>
<div class="section container-fluid v-center-section">
  <div class="row">
  <?php while ( have_rows('info_image_pair') ) : the_row();
      //vars
      $image = get_sub_field('image');
      $image_url = $image['url'];
      $image_alt = $image['alt'];
      $header = get_sub_field('header');
      $content = get_sub_field('content');
      $add_a_button = get_sub_field('add_a_button');
      $button_text = get_sub_field('button_text');
      $button_url = get_sub_field('button_url');
      $column_width = ($column_count == 2) ? '6' : '4';
?>

      <div class="col-sm-12 col-md-<?php echo $column_width; ?> center pad-desktop">
        <div class="accessoryHeightCTA" style="background-image: url('<?php echo $image_url; ?>')">
          <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="img-responsive">
        </div>
        <h3 class="pad-bottom text-center text-uppercase"><?php echo $header; ?></h3>
        <div class="restricted-width pad-bottom text-center">
          <?php echo $content; ?>
          <?php if ($add_a_button): ?>
            <p class="pad-top"><a href="<?php echo $image_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
          <?php endif; ?>
        </div>
      </div>

    <?php endwhile; ?>
  </div>
</div>
<?php endif; ?>
<!-- /Info Image Columns  -->

<?php
    //vars
    $background_image = get_sub_field('background_image');
    $left_or_right = get_sub_field('left_or_right');
    $count = ($left_or_right == 'left') ? -1 : 0;
    // check if the repeater field has rows of data
?>
<!-- Carousel  -->
<div class="section container-fluid v-center-section background-cover-center" style="background-image: url('<?php echo $background_image; ?>');">
  <!-- Staggered Carousel  -->
  <?php if( have_rows('slides') ): ?>
    <div class="container center visible-md visible-lg pad-left pad-right " id="staggeredCarousel">
        <?php
          while ( have_rows('slides') ) : $count++; the_row();
            //vars
            $slide_content = get_sub_field('slide_content');
            $slide_image = get_sub_field('slide_image');
            $content_background = get_sub_field('content_background');
            $shade_of_content_background = get_sub_field('shade_of_content_background');
            $add_a_button = get_sub_field('add_a_button');
            $button_text = get_sub_field('button_text');
            $button_url = get_sub_field('button_url');
            $button_alignment = get_sub_field('button_alignment');
      ?>
      <?php if ($count % 2 == 0): ?>
        <div class="carousel-item staggeredCarouselHeight pad-top-bottom">
          <div class="dark-bg wp-full-height" style="background-image: url('<?php echo $slide_image; ?>');"></div>
        </div>

        <div class="carousel-item <?php echo $shade_of_content_background; ?> staggeredCarouselHeight" style="background-image: url('<?php echo $content_background; ?>');">
          <div class="carousel-info-pad">
            <div class="carouselInfoHeight">
              <?php echo $count . $slide_content; ?>
            </div>
            <?php if ($add_a_button): ?>
              <p class="pad-top <?php echo $button_alignment; ?>"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
            <?php endif; ?>
          </div>
        </div>

      <?php else: ?>
        <div class="carousel-item <?php echo $shade_of_content_background; ?> staggeredCarouselHeight" style="background-image: url('<?php echo $content_background; ?>');">
          <div class="carousel-info-pad">
            <div class="carouselInfoHeight">
              <?php echo $count . $slide_content; ?>
            </div>
            <?php if ($add_a_button): ?>
              <p class="pad-top <?php echo $button_alignment; ?>"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
            <?php endif; ?>
          </div>
        </div>

        <div class="carousel-item staggeredCarouselHeight pad-top-bottom">
          <div class="dark-bg wp-full-height" style="background-image: url('<?php echo $slide_image; ?>');"></div>
        </div>

      <?php endif; ?>

    <?php endwhile; //reset_rows(); ?>
    </div>
  <?php endif; ?>
<!-- /Staggered Carousel  -->

  <!--  Staggered Carousel on smaller screen-->
  <?php if( have_rows('slides') ): ?>
    <div class="center visible-sm visible-xs pad-left-right" id="staggeredCarouselMobile">

      <?php
          while ( have_rows('slides') ) : the_row();
            //vars
            $slide_content = get_sub_field('slide_content');
            $slide_image = get_sub_field('slide_image');
            $content_background = get_sub_field('content_background');
            $shade_of_content_background = get_sub_field('shade_of_content_background');
            $add_a_button = get_sub_field('add_a_button');
            $button_text = get_sub_field('button_text');
            $button_url = get_sub_field('button_url');
            $button_alignment = get_sub_field('button_alignment');
      ?>
      <div class="carousel-item">
        <div class="dark-bg carousel-info-image" style="background-image: url('<?php echo $slide_image; ?>');"></div>
        <div class="dark-bg" style="background-image: url('<?php echo $content_background; ?>');">
          <div class="carousel-info-pad">
              <div class="carouselInfoMobileHeight">
                <?php echo $slide_content; ?>
              </div>
            <?php if ($add_a_button): ?>
              <p class="pad-top <?php echo $button_alignment; ?>"><a href="<?php echo $button_url; ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red"><?php echo $button_text; ?> <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php endwhile; ?>
    </div>
  <?php endif; ?>
  <!-- /Staggered Carousel on smaller screen -->
</div>
<!-- /Carousel  -->

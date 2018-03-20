<?php
/**
 * The template for displaying 404 pages (not found).
 */
get_header();
?>

<!-- 404 -->
<div class="dark-bg texture-section" id="top-section" style="background-image: url(<?php echo esc_url( home_url( '/wp-content/uploads/2018/03/install-bg.jpg' ) ); ?>);">
  <div class="container-fluid">
    <div class="text-center">
      <h1 class="">¡ 404 !</h1>
      <h5 class="pad-top text-uppercase">No Wheels Here</h5>
      <p class="pad-top pad-bottom"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn wp-btn-extra-long text-uppercase wp-btn-red">Return Home <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
    </div>
  </div>
  <div class="texture-top" style="background-image: url(<?php echo esc_url( home_url( '/wp-content/uploads/2018/03/top-gradient.png' ) ); ?>);"></div>
  <div class="texture-bottom" style="background-image: url(<?php echo esc_url( home_url( '/wp-content/uploads/2018/03/texture-home-1.png' ) ); ?>);"></div>
</div>
<!-- /404 -->

<?php get_footer(); ?>

<?php
/**
 * The template for displaying the Gallery
 */
?>
<?php
  acf_form_head();
  get_header();
  $gallery_page_id = get_page_by_title('gallery')->ID;
?>

<?php
  if( have_rows('sections', $gallery_page_id) ):
    // loop through the rows of data
    while ( have_rows('sections', $gallery_page_id) ) : the_row();
      if( get_row_layout() == 'top_section' ):
        get_template_part( 'template-parts/section-parts/section', 'top');

      elseif( get_row_layout() == 'top_section_no_bg' ):
        get_template_part( 'template-parts/section-parts/section', 'top-no-bg');

      endif;
    endwhile;
  endif;
?>
<?php
  $args = array(
      'post_type' => 'gallery',
      'posts_per_page' => -1
  );
  $query = new WP_Query($args);

  $wheels = array();
  $finishes = array();
  $terrains = array();

  if ($query->have_posts()) : $titles = array(); while ($query->have_posts()) : $query->the_post();
    $wheel = get_field('wheel');
    $finish = get_field('finish');
    $terrain = get_field('terrain');

    $post_type = get_post_type();
    if (!in_array($wheel, $wheels)) {
      array_push($wheels, $wheel);
    }
    if (!in_array($terrain, $terrains)) {
      array_push($terrains, $terrain);
    }
    if (!in_array($finish, $finishes)) {
      array_push($finishes, $finish);
    }
    endwhile;
    wp_reset_postdata();
  endif;
?>
  <div class="section container-fluid">
    <div class="row text-uppercase filter-block-wrap">
      <div class="col-sm-4 filter-left">
        <div class="filter-header">Showing</div>
          <select class="filter-select filter-wheel-select" name="wheel" onchange="wheelFilter();">
            <option class="text-uppercase" value="all">All Wheels</option>
            <?php for ($i=0; $i < count($wheels); $i++): ?>
              <option class="text-uppercase" value="<?php echo $wheels[$i]; ?>"><?php echo $wheels[$i]; ?></option>
            <?php endfor; ?>
          </select>
      </div>
      <div class="col-sm-4 filter-center">
        <div class="filter-header">In</div>
          <select class="filter-select filter-finish-select" name="finish" onchange="finishFilter();">
            <option class="text-uppercase" value="all">All Finishes</option>
            <?php for ($i=0; $i < count($finishes); $i++): ?>
              <option class="text-uppercase" value="<?php echo $finishes[$i]; ?>"><?php echo $finishes[$i]; ?></option>
            <?php endfor; ?>
          </select>
      </div>
      <div class="col-sm-4 filter-right">
        <div class="filter-header">Driving In</div>
          <select class="filter-select filter-terrain-select" name="terrain" onchange="terrainFilter();">
            <option class="text-uppercase" value="all">All Terrains</option>
            <?php for ($i=0; $i < count($terrains); $i++): ?>
              <option class="text-uppercase" value="<?php echo $terrains[$i]; ?>"><?php echo $terrains[$i]; ?></option>
            <?php endfor; ?>
          </select>
      </div>
    </div>
  </div>

<?php get_template_part( 'template-parts/content', 'gallery' ); ?>

  <div id="imageModal" class="modal fade gallery-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg wp-full-height" role="document">
      <div class="wp-table wp-full-height" style="margin: 0 auto;">
        <div class="wp-table-cell-middle">
            <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="far fa-times"></i>
              </button>
              <div class="modal-body">
                  <img class="modal-image-loader" src="<?php echo esc_url( home_url( '/wp-content/themes/msawheels/icons/grid.svg' ) ); ?>" alt="Loading">
              </div>
            </div><!-- /.modal-content -->
        </div>
      </div>
    </div><!-- /.modal-dialog -->
  </div>

<!-- Upload Modal -->
  <div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog wp-full-height" style="margin: 0 auto;">
      <div class="wp-table wp-full-height wp-full-width">
        <div class="wp-table-cell-middle">
          <div class="modal-content">
            <div class="modal-header">
              <div class="text-right modal-close">
                <a href="javascript:void(0)" data-dismiss="modal"><img src="<?php echo esc_url( home_url( '/wp-content/themes/msawheels/icons/x-icon.png' ) ); ?>" alt="Close Modal Image"></a>
              </div>
              <h4 class="modal-title">UPLOAD YOUR IMAGE TO THE GALLERY</h4>
            </div>
            <div class="modal-body">
              <?php
                  acf_form(array(
                    'post_id'		=> 'new_post',
                    'updated_message' => __('Thank you for uploading your image to our gallery'),
                    'new_post'		=> array(
                      'post_type'		=> 'gallery',
                      'post_status'	=> 'pending',
                      'post_title'    => 'user-upload-' . time(),
                    ),
                    'submit_value'		=> 'Upload to Gallery',
                    'html_submit_button'	=> '<input type="submit" class="btn wp-btn-no-arrow text-uppercase wp-btn-red" value="%s" />'
                  ));
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /modal -->=
<?php get_footer(); ?>

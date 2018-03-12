<?php
/**
 * The template for displaying the Gallery
 */
?>
<?php
    get_header();

    $page = get_page_by_path( 'gallery' );
    $gallery_background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
?>

  <!-- Page Content -->
  <div class="main-content fullpage-content" data-fp-disabled="true" id="gallery-content">
      <div class="section">
          <div class="container k-full-width k-full-height">
              <div class="row k-full-height">
                  <div class="col-lg-12 text-center section-dark covered-bg k-full-height" style="background-image: url(<?php echo $gallery_background[0]; ?>);">
                      <div class="k-table k-full-height">
                          <div class="k-table-cell k-with-padding">
                              <div class="section-info-wrap top-center-redline">
                                  <p class="section-sub-header text-uppercase">#Kinesis</p>
                                  <p class="section-header sh-smaller text-uppercase">Gallery</p>
                                  <a href="<?php echo esc_url( home_url( '/' . get_post_type() . '/upload' ) ); ?>" class="btn k-btn-transparent k-btn-extra-long text-uppercase k-btn-red k-no-margin-bottom">Upload</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div><!-- /.row -->
          </div>
      </div>
      <?php
          $gallery_post_types = array('monoblock', 'legacy');
          $options = array();

          for ($i=0; $i < count($gallery_post_types); $i++) {
              $args = array(
                  'post_type' => $gallery_post_types[$i],
                  'posts_per_page' => -1
              );
              $query = new WP_Query($args);

              if ($query->have_posts()) : $titles = array(); while ($query->have_posts()) : $query->the_post();
                $post_type = get_post_type();
                array_push($titles, get_the_title());
            endwhile; $options[$post_type] = $titles; wp_reset_postdata(); endif;
          }
      ?>
      <div class="section">
          <div class="filter-block-wrap product-menu-list text-uppercase text-center">
              <div class="filter-block">
                  <div class="filter-header">Showing</div>
                  <select class="filter-select filter-collection-select" name="collection" onchange="collectionFilter();">
                      <option value="all">All Collections</option>
                      <?php foreach ($options as $key => $value): ?>
                         <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                      <?php endforeach; ?>
                  </select>
                  <div class="filter-header">In</div>
                  <select class="filter-select filter-style-select" name="style" onchange="styleFilter();">
                      <option value="all">All Styles</option>
                      <?php foreach ($options as $key => $value):
                          for ($i=0; $i < count($value); $i++): ?>
                              <option value="<?php echo $value[$i]; ?>"><?php echo $value[$i]; ?></option>
                      <?php endfor; endforeach; ?>
                  </select>
              </div>
          </div>
      </div>
      <?php get_template_part( 'template-parts/content', 'gallery' ); ?>
  </div>

<div class="modal fade gallery-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg k-full-height" role="document">
      <div class="k-table k-full-height">
          <div class="k-table-cell">
              <div class="modal-content">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="modal-body">
                      <img class="modal-image-loader" src="<?php echo esc_url( home_url( '/wp-content/themes/kinesismotorsport/icons/grid.svg' ) ); ?>" alt="Loading">
                  </div>
              </div><!-- /.modal-content -->
          </div>
      </div>
  </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    var options = <?php echo json_encode($options); ?>;
</script>
<?php get_footer(); ?>

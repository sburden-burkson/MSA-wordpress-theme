<?php
/**
 * The template for displaying the Gallery
 */
?>
<?php
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
      <div class="section container-fluid">
        <div class="row text-uppercase">

              <div class="col-sm-4 filter-left">
                <div class="filter-header">Showing</div>
                <select class="filter-select filter-wheel-select" name="wheel" onchange="wheelFilter();">
                    <option value="all">All Wheels</option>
                    <?php foreach ($options as $key => $value): ?>
                       <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>

              <div class="col-sm-4 filter-center">
                <div class="filter-header">In</div>
                <select class="filter-select filter-finish-select" name="finish" onchange="finishFilter();">
                    <option value="all">All Finishes</option>
                    <?php foreach ($options as $key => $value):
                        for ($i=0; $i < count($value); $i++): ?>
                            <option value="<?php echo $value[$i]; ?>"><?php echo $value[$i]; ?></option>
                    <?php endfor; endforeach; ?>
                </select>
              </div>

              <div class="col-sm-4 filter-right">
                <div class="filter-header">Driving In</div>
                <select class="filter-select filter-terrain-select" name="terrain" onchange="terrainFilter();">
                    <option value="all">All Terrains</option>
                    <?php foreach ($options as $key => $value):
                        for ($i=0; $i < count($value); $i++): ?>
                            <option value="<?php echo $value[$i]; ?>"><?php echo $value[$i]; ?></option>
                    <?php endfor; endforeach; ?>
                </select>
              </div>
            </div>

        </div>
      <?php get_template_part( 'template-parts/content', 'gallery' ); ?>

<div class="modal fade gallery-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg wp-full-height" role="document">
      <div class="wp-table wp-full-height">
          <div class="wp-table-cell-middle">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="text-right modal-close">
                    <a href="javascript:void(0)" data-dismiss="modal"><img src="<?php echo esc_url( home_url( '/wp-content/themes/msawheels/icons/x-icon.png' ) ); ?>" alt="" style=""></a>
                  </div>
                </div>
                  <div class="modal-body">
                      <img class="modal-image-loader" src="<?php echo esc_url( home_url( '/wp-content/themes/msawheels/icons/grid.svg' ) ); ?>" alt="Loading">
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

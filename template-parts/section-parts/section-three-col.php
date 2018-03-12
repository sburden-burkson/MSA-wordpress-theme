<?php
// check if the repeater field has rows of data
if( have_rows('columns') ):
?>
<!-- 3 Column Section -->
<div class="container-fluid row-section">
  <div class="row">
<?php
 	// loop through the rows of data
  while ( have_rows('columns') ) : the_row();
  
    //vars
    $column_background = get_sub_field('column_background');
    $heading = get_sub_field('heading');
    $url = get_sub_field('url');
?>

    <div class="col-sm-4 dark-bg" style="background-image: url('<?php echo $column_background; ?>');">
      <div class="wp-table wp-full-height">
        <div class="wp-table-cell-middle">
          <div class="section-info-wrap center">
            <h4><a href="<?php echo $url; ?>"><?php echo $heading; ?></a></h4>
          </div>
        </div>
      </div>
    </div>

<?php
  endwhile;
?>
  </div>
</div>

<?php
  else :
    // no rows found
endif;
?>
<!-- /3 Column Section -->

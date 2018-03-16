<?php
    // section vars
    $header_above_columns = get_sub_field('header_above_columns');
    $vertical_padding = get_sub_field('vertical_padding');
    $texture_top = get_sub_field('texture_top');
    $texture_bottom = get_sub_field('texture_bottom');
    $column_count = 0;
    if( have_rows('columns') ): while ( have_rows('columns') ) : $column_count++; the_row();
    endwhile; endif;
?>

<?php
// check if the repeater field has rows of data
if( have_rows('columns') ):
?>
<!-- 3 Column Section -->
<?php if ($header_above_columns != ""): ?>
  <div class="text-center pad-top-md">
    <?php echo $header_above_columns; ?>
  </div>
<?php endif; ?>
<div class="section container-fluid row-section texture-section margin-top-bottom">
  <div class="row">
<?php
 	// loop through the rows of data
  while ( have_rows('columns') ) : the_row();

    //column vars
    if ($column_count == 1) {
      $column_width = "12";
    } elseif ($column_count == 2) {
      $column_width = "6";
    } else {
      $column_width = "4";
    }
    $column_background = get_sub_field('column_background');
    $shade_of_background = get_sub_field('shade_of_background');
    $heading = get_sub_field('heading');
    $url = get_sub_field('url');
    $overlay = get_sub_field('overlay') . " ";
?>

    <div class="col-sm-<?php echo $column_width; ?> no-padding <?php echo $shade_of_background; ?>" style="background-image: url('<?php echo $column_background; ?>');">
      <?php if($url != ""): ?><a href="<?php echo $url; ?>"><?php endif; ?>
        <div class="text-center <?php echo $overlay . $vertical_padding; ?>">
          <h4><?php echo $heading; ?></h4>
        </div>
      <?php if($url != ""): ?></a><?php endif; ?>
    </div>
<?php
  endwhile;
?>
  </div>
  <div class="texture-top" style="background-image: url('<?php echo $texture_top; ?>');"></div>
  <div class="texture-bottom" style="background-image: url('<?php echo $texture_bottom; ?>');"></div>
</div>

<?php
  else :
    // no rows found
endif;
?>
<!-- /3 Column Section -->

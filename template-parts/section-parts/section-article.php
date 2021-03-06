<?php
  //vars
  $width_restriction = (get_sub_field('restrict_width')) ? " article-body-wrap" : "";
  // check if the flexible content field has rows of data
  if( have_rows('article_sections') ):
?>
<!--  Article Section -->
  <div class="section container pad-top-bottom-xtra<?php echo $width_restriction; ?>">
  <?php
    global $articleBody;
    // loop through the rows of data
    while ( have_rows('article_sections') ) : the_row();
      if ( get_row_layout() == 'text_section' ):
        // get_template_part( 'template-parts/section-parts/section-article', 'text');
        include(locate_template('template-parts/section-parts/section-article-text.php'));

      elseif ( get_row_layout() == 'stacked_images_with_captions' ):
        get_template_part( 'template-parts/section-parts/section-article', 'stacked-images');

      endif;
  ?>
  <?php endwhile; ?>
  </div>
<!--  /Article Section -->
<?php endif; ?>

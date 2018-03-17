<?php
  // check if the flexible content field has rows of data
  if( have_rows('article_sections') ):
?>
<!--  Article Section -->
  <div class="container article-body-wrap pad-top-bottom-xtra">
  <?php
    // loop through the rows of data
    while ( have_rows('article_sections') ) : the_row();
      if ( get_row_layout() == 'text_section' ):
        get_template_part( 'template-parts/section-parts/section-article', 'text');

      elseif ( get_row_layout() == 'stacked_images_with_captions' ):
        get_template_part( 'template-parts/section-parts/section-article', 'stacked-images');

      endif;
  ?>
  <?php endwhile; ?>
  </div>
<!--  /Article Section -->
<?php endif; ?>

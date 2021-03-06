<!-- Sections -->
<?php
	if( have_rows('sections') ):
    // loop through the rows of data
    while ( have_rows('sections') ) : the_row();
			if( get_row_layout() == 'top_section' ):
				get_template_part( 'template-parts/section-parts/section', 'top');

			elseif( get_row_layout() == 'top_section_no_bg' ):
				get_template_part( 'template-parts/section-parts/section', 'top-no-bg');

			elseif( get_row_layout() == 'top_video_background' ):
				get_template_part( 'template-parts/section-parts/section', 'top-video');

			elseif( get_row_layout() == 'wysiwyg_section' ):
				get_template_part( 'template-parts/section-parts/section', 'wysiwyg');

			elseif( get_row_layout() == 'full_section' ):
				get_template_part( 'template-parts/section-parts/section', 'full');

			elseif( get_row_layout() == 'three_column_section' ):
				get_template_part( 'template-parts/section-parts/section', 'three-col');

			elseif( get_row_layout() == 'header_two_columns' ):
				get_template_part( 'template-parts/section-parts/section', 'header-two-col');

			elseif( get_row_layout() == 'staggered_carousel' ):
				get_template_part( 'template-parts/section-parts/section', 'staggered-carousel');

			elseif( get_row_layout() == 'qa_accordion' ):
				get_template_part( 'template-parts/section-parts/section', 'qa-accordion');

			elseif( get_row_layout() == 'three_tab_section' ):
				get_template_part( 'template-parts/section-parts/section', 'three-tab');

			elseif( get_row_layout() == 'staggered_info_image' ):
				get_template_part( 'template-parts/section-parts/section', 'staggered-info-image');

			elseif( get_row_layout() == 'info_image_columns' ):
				get_template_part( 'template-parts/section-parts/section', 'info-image-columns');

			elseif( get_row_layout() == 'content_top_corner_with_images' ):
				get_template_part( 'template-parts/section-parts/section', 'content-top-corner-w-images');

			elseif( get_row_layout() == 'article' ):
				get_template_part( 'template-parts/section-parts/section', 'article');

			// elseif( get_row_layout() == 'product_specs_table' ):
			// 	get_template_part( 'template-parts/section-parts/section', 'product-specs-table');

			endif;

		endwhile;

	else :

	    // no section layouts found

	endif;
?>
<!-- /Sections -->

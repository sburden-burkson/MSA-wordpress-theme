<?php
/**
 * Template for Blog Landing Page
 *
 * A custom page template for displaying all posts.
 *
 */
get_header(); ?>

<?php
	$tag_name = single_tag_title("", false);
  $blog_page = get_option('page_for_posts');
  if( have_rows('sections', $blog_page) ):
    // loop through the rows of data
    while ( have_rows('sections', $blog_page) ) : the_row();
      if( get_row_layout() == 'top_section' ):
				include(locate_template('template-parts/section-parts/section-top.php'));

      elseif( get_row_layout() == 'top_section_no_bg' ):
				include(locate_template('template-parts/section-parts/section-top-no-bg.php'));

      endif;
    endwhile;
  endif;
?>
<div class="section blog-wrapper light-bg" style="background-image: url('');">
  <div class="container-fluid">
    <div class="blog-item-container">
      <?php
					$current_year = date('Y');
          // Get Tagges Posts
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $num_posts = get_option( 'posts_per_page' );
          $args = array(
              'posts_per_page' => $num_posts,
              'paged'          => $paged,
              'post__not_in'  => array( $featured_id ),
              'tag' => $tag_name
          );
          $query = new WP_Query($args);

          if ( $query->have_posts()) :
            while ( $query->have_posts()) :  $query->the_post();
              $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(  $post->ID ), 'medium' );
              $post_date = ($current_year == get_the_date('Y')) ? get_the_date('M j.') : get_the_date('M j, Y');
              // get_the_ID()
      ?>
      <div class="blog-item">
        <a href="<?php the_permalink(); ?>">
          <div class="blog-item-image-wrap dark-bg" style="background-image: url('<?php echo $thumbnail[0]; ?>');"></div>
        </a>
        <div class="blog-item-info-wrap blog-item-header">
              <a href="<?php the_permalink(); ?>" class="text-uppercase"><h3><?php the_title(); ?></h3></a>
        </div>
        <div class="blog-item-more">
          <p><?php echo $post_date; ?> <span><a href="<?php the_permalink(); ?>"><i class="fal fa-long-arrow-right fa-lg"></i></a></span></p>
        </div>
      </div>
    <?php endwhile; //endif; ?>
    </div>
  </div>
</div><!-- /.container -->
<div class="blog-wrapper">
  <div class="container text-center pagination-links">
    <?php echo paginate_links( array( 'total' => $query->max_num_pages ) ); ?>
  </div>
</div>
<?php endif; ?>

<?php get_footer(); ?>

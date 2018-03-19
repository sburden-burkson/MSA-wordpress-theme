<?php
/**
 * Template for Blog Landing Page
 *
 * A custom page template for displaying all posts.
 *
 */
get_header(); ?>

<?php
the_content();
  $blog_page = get_option('page_for_posts');
  if( have_rows('sections', $blog_page) ):
    // loop through the rows of data
    while ( have_rows('sections', $blog_page) ) : the_row();
      if( get_row_layout() == 'top_section' ):
        get_template_part( 'template-parts/section-parts/section', 'top');

      elseif( get_row_layout() == 'top_section_no_bg' ):
        get_template_part( 'template-parts/section-parts/section', 'top-no-bg');

      endif;
    endwhile;
  endif;
?>

<div class="section blog-wrapper light-bg" style="background-image: url('');">
  <div class="container-fluid">
    <div class="blog-item-container">
<?php
    //Get Featured Post
    $featured_args = array(
        'posts_per_page' => 1,
        'post__in'            => get_option( 'sticky_posts' ),
    	  'ignore_sticky_posts' => 1,
    );
    $featured_query = new WP_Query($featured_args);

    if ($featured_query->have_posts()) : while ($featured_query->have_posts()): $featured_query->the_post();
        $featured_id = get_the_ID();
        $featured_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
    <!--  Featured Blog Item -->
    <div class="blog-item blog-item-full container-fluid featured-blog no-pad-top">
      <div class="row">
        <div class="col-sm-6 no-padding">
          <a href="<?php the_permalink(); ?>">
            <div class="featuredBlogHeight dark-bg" style="background-image: url('<?php echo $featured_thumbnail[0]; ?>');">
          </div>
        </a>
        </div>
        <div class="col-sm-6 white-bg">
          <div class="featured-blog-info-wrap spaced-section featuredBlogHeight">
            <a href="<?php the_permalink(); ?>"><h3 class="text-uppercase pad-bottom"><?php the_title(); ?></h3></a>
            <p><?php the_excerpt(); ?></p>
            <p class="pad-top"><a href="<?php the_permalink(); ?>" class="btn wp-btn-extra-long wp-btn-red">READ MORE <i class="fal fa-long-arrow-right fa-lg"></i></a></p>
            <p class="text-right main-font">Feb 21.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- /Featured Blog Item -->
    <?php endwhile; wp_reset_query(); wp_reset_postdata(); rewind_posts(); endif;  ?>
      <?php
          // Get Rest of Posts
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $num_posts = get_option( 'posts_per_page' );
          $args = array(
              'posts_per_page' => $num_posts,
              'paged'          => $paged,
              'post__not_in'  => array( $featured_id ),
              // 'offset'          => 1,
          );
          $query = new WP_Query($args);

          if ( $query->have_posts()) : while ( $query->have_posts()) :  $query->the_post();
              $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(  $post->ID ), 'medium' );
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
          <p>Feb 21. <span><a href="<?php the_permalink(); ?>"><i class="fal fa-long-arrow-right fa-lg"></i></a></span></p>
        </div>
      </div>
    <?php endwhile; endif; ?>

      <div class="container text-center" style="padding: 20px; font-family: 'Barlow Condensed', sans-serif; font-size: 16px;"><?php echo paginate_links( array( 'total' => $query->max_num_pages ) ); ?></div>

      <!-- <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
      <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div> -->
    </div>
  </div>
</div><!-- /.container -->

<?php get_footer(); ?>

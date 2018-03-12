<?php
/**
 * Template for Blog Landing Page
 *
 * A custom page template for displaying all posts.
 *
 */
get_header(); ?>

<div class="main-content fullpage-content" data-fp-disabled="true" id="blog-landing-content">
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
        <div class="section">
          <div class="container k-full-width k-90-width-lg">
              <div class="row k-padded-row">
                  <div class="col-sm-6 k-sm-no-padding">
                      <div class="section-image-wrap">
                          <img src="<?php echo $featured_thumbnail[0]; ?>" alt="<?php the_title(); ?>">
                      </div>
                  </div>
                  <div class="col-sm-6 text-center section-light k-ruler-col">
                      <div class="section-info-wrap top-center-redline">
                          <p class="section-sub-header text-uppercase">Featured</p>
                          <p class="section-header text-uppercase"><?php the_title(); ?></p>
                          <p class="section-paragraph"><?php the_excerpt(); ?></p>
                          <p><a href="<?php the_permalink(); ?>" class="btn k-btn-transparent k-btn-extra-long text-uppercase k-btn-red">Read More</a></p>
                      </div>
                  </div>
              </div><!-- /.row -->
          </div>
        </div>
    <?php endwhile; wp_reset_query(); wp_reset_postdata(); rewind_posts(); endif;  ?>
        <div class="section k-gray-bg">
            <div class="container k-full-width k-80-width-lg">
                <div class="blog-item-container">

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
                            <div class="blog-item-image-wrap"><img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>"></div>
                            <div class="blog-item-info-wrap">
                                <p class="blog-item-header text-uppercase"><?php the_title(); ?></p>
                                <p class="blog-item-desc"><?php the_excerpt(); ?></p>
                            </div>
                            <div class="text-center blog-item-more">
                                <a href="<?php the_permalink(); ?>" class="btn k-btn-transparent k-btn-extra-long text-uppercase k-btn-red">Read More</a>
                            </div>
                        </div>
      <?php endwhile; endif; ?>
                </div>
            </div>
            <div class="container text-center" style="padding: 20px; font-family: 'Oswald', sans-serif; font-size: 16px;"><?php echo paginate_links( array( 'total' => $query->max_num_pages ) ); ?></div>
        </div>
        <!-- <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
        <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div> -->

</div><!-- /.container -->

<?php get_footer(); ?>

<?php
/**
 * The template for displaying a each gallery image
 */
?>
<?php
// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $num_posts = 20;

    $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => $num_posts
    );
    $query = new WP_Query($args);
    $post_count = count($query->posts);

    if ($query->have_posts()) :
?>
        <div class="section container-fluid">
            <div class="gallery-image-container">
                <!-- <img src="<?php echo esc_url( home_url( '/wp-content/themes/msawheels/icons/spinning-circles-red.svg' ) ); ?>" class="loader-center-middle" /> -->
        <?php
            while ($query->have_posts()) : $query->the_post();

                //vars
                $gallery_image = get_field( 'gallery_image' );
                $wheel = get_field( 'wheel' );
                $finish = get_field( 'finish' );
                $terrain = get_field( 'terrain' );

                $alt_tag = ucwords($wheel . " in " . $finish . " driving in " . $terrain);

                // 1 chance out of 4 to be a larger medium sized thumbnail
                $thumb_size = (mt_rand(0, 3) === 0 ? 'medium' : 'thumbnail');

                $thumb_class = ($thumb_size === 'medium' ? ' double-sized' : '');
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $thumb_size );
        ?>
                <a class="gallery-image<?php echo $thumb_class; ?>" data-full-img="<?php echo $gallery_image; ?>" data-wheel="<?php echo $wheel; ?>" data-finish="<?php echo $finish; ?>" data-terrain="<?php echo $terrain; ?>" href="javascript:void(0);"><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $alt_tag; ?>"></a>

    <?php   endwhile; ?>
            </div><!-- /.container -->
        </div>
        <?php wp_reset_postdata(); ?>
<?php endif; ?>

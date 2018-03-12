<?php
/**
 * The template for displaying the Legacy Wheel Collection
 */
?>
<?php get_header();

    $num_posts = -1;

    $args = array(
        'post_type' => 'legacy',
        'posts_per_page' => $num_posts
    );
    $query = new WP_Query($args);
    $post_count = count($query->posts);
    $breakpoint = ($post_count > 4 ? 992 : 768);
    $right_block = ($post_count > 4 ? " tile-block-".($post_count-4) : "");
    $left_block = ($post_count > 4 ? " tile-block-4" : "");
    $column_type = ($post_count == 4 ? "col-md-3 col-sm-6 " : "col-md-6 ");

    if ($query->have_posts()) :
?>
        <div class="main-content fullpage-content single-full-page" data-with-nav="false" data-fp-breakpoint="<?php echo $breakpoint; ?>" data-fp-paddingtop="60px" id="collection-content">
            <div class="section">
                <div class="container k-full-width k-full-height">
                    <div class="row k-full-height">
                        <?php $count = 0; ?>
                        <?php while ($query->have_posts()) : $query->the_post();
                                //vars
                                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                                $count++;
                        ?>
                            <?php if( ( $post_count > 4 && $count == 1 ) || ($post_count == 4) ): ?>
                                <div class="<?php echo $column_type; ?>section-collection-col section-dark<?php echo $left_block; ?>">
                            <?php endif; ?>
                                <?php if( $post_count > 4 && $count == 5 ): ?>
                                    <div class="<?php echo $column_type; ?>section-collection-col section-dark<?php echo $right_block; ?>">
                                <?php endif; ?>
                                        <div class="section-collection-cell">
                                            <div class="covered-bg collection-table-bg" style="background-image:url(<?php echo $thumbnail[0]; ?>);">
                                            </div>
                                            <div class="k-table">
                                                <div class="section-info-wrap product-info k-bottom k-table-cell top-left-redline">
                                                    <p class="product-header text-uppercase"><?php the_title(); ?></p>
                                                    <p class="product-desc product-short-desc"><?php the_field('short_description'); ?></p>
                                                    <div class="product-desc product-full-desc">
                                                        <p><?php the_field('full_description'); ?></p>
                                                        <a href="<?php the_permalink(); ?>" class="btn k-btn-transparent k-btn-extra-long text-uppercase" tabindex="0">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php if( ($post_count > 4 && ($count == 4 || $count == $post_count)) || ($post_count == 4) ): ?>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    endif;
?>

<?php get_footer(); ?>

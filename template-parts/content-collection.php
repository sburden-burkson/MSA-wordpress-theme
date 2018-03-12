<?php
/**
 * The template for displaying a short summary, image and link for every wheel
 */
?>
<?php
    $num_posts = -1;

    $args = array(
        'post_type' => 'collection',
        'posts_per_page' => $num_posts
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
?>

    <?php
        while ($query->have_posts()) {
        $query->the_post();
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    ?>

            <div class="product-block">
                <div class="product-wrap covered-bg k-table" style="background-image: url(<?php echo $thumbnail[0]; ?>)">
                  <div class="product-info top-left-redline k-table-cell k-bottom">
                      <p class="product-header text-uppercase"><?php the_title(); ?></p>
                      <p class="product-desc product-short-desc"><?php the_field('short_description'); ?></p>
                      <div class="product-desc product-full-desc">
                          <p><?php the_field('full_description'); ?></p>
                          <a href="<?php the_permalink(); ?>" class="btn k-btn-transparent k-btn-extra-long text-uppercase">Details</a>
                      </div>
                  </div>
                </div>
            </div>
    <?php } ?>

<?php } ?>

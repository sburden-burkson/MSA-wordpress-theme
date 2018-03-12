<!-- Similar Wheel Section -->
<div class="section">
    <div class="container k-full-width k-full-height">
        <div class="row k-full-height">
            <div class="col-lg-12">
                <div class="k-table k-full-height">
                    <div class="k-table-cell">
                        <div class="product-info-wrap top-left-redline related-products">
                            <p class="text-uppercase section-sub-header k-size-xs">We Think You’d Like</p>
                            <div class="product-showcase-list row">
                            <?php
                                $type = get_post_type();
                                $this_wheel = get_the_title();
                                $num_posts = -1;

                                $args = array(
                                    'post_type' => $type,
                                    'posts_per_page' => $num_posts
                                );

                                $query = new WP_Query($args);
                                $post_count = count($query->posts);

                                if ($query->have_posts()) : $count = 0; while ($query->have_posts() && $count < 4 ) : $query->the_post();

                                    //vars
                                    $similar_wheel = get_the_title();
                                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                                    $count += ( $similar_wheel !== $this_wheel ? 1 : 0 );
                            ?>
                                <?php if( $count < 4 && $similar_wheel !== $this_wheel ): ?>
                                    <div class="col-sm-4 section-dark">
                                        <div class="covered-bg section-collection-cell" style="background-image: url(<?php echo $thumbnail[0]; ?>)">
                                            <div class="covered-bg k-table">
                                                <a class="section-info-wrap product-info k-bottom k-table-cell top-left-redline" href="<?php the_permalink(); ?>">
                                                    <p class="product-header text-uppercase"><?php the_title(); ?></p>
                                                    <p class="product-desc product-short-desc"><?php the_field('short_description'); ?></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; endif; ?>
                        </div>
                        <?php if( $post_count > 4 ): ?>
                            <p class="text-right"><a href="<?php echo get_post_type_archive_link($type); ?>" class="btn k-btn-transparent k-btn-extra-long text-uppercase k-btn-red">More</a></p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="bottom-center-band">
                    <div class="bottom-left-marker-line"></div>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>
<!-- /Similar Wheel Section -->

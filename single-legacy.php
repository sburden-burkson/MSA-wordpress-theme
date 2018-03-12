<?php
/**
 * The page template for displaying a single Legacy Wheel
 */
?>

<?php get_header(); ?>

<!-- Page Content -->
<div class="main-content product-content fullpage-content" data-fp-paddingtop="60px" id="product-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/wheel-parts/content', 'wheel-main' ); ?>
        <?php get_template_part( 'template-parts/wheel-parts/content', 'wheel-details' ); ?>
        <?php get_template_part( 'template-parts/wheel-parts/content', 'wheel-specs' ); ?>
        <?php get_template_part( 'template-parts/content', 'slides' ); ?>
        <?php get_template_part( 'template-parts/wheel-parts/content', 'wheel-similar' ); ?>

    <?php endwhile; else: ?>

        <h1>Oh no!</h1>
        <p>No content is appearing for this page!</p>

    <?php endif; ?>
</div>

<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "brand": "<?php bloginfo('name') ?>",
  "logo": "<?php echo $display_logo; ?>",
  "name": "<?php echo $product_name; ?>",
  "image": "<?php echo $schema_image; ?>",
  "description": "<?php the_field('full_description'); ?>",
  "offers": {
    "@type": "Offer",
    "priceCurrency": "USD",
    "price": "<?php the_field('price'); ?>",
    "itemCondition": "new"
  }
}
</script>
<div class="modal fade gallery-modal" tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog modal-lg k-full-height" role="document">
		<div class="k-table k-full-height">
			  <div class="k-table-cell">
				  <div class="modal-content">
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					  <div class="modal-body">
                          <p class="section-header sh-smaller text-uppercase">Product Inquiry</p>
						  <?php echo do_shortcode('[contact-form-7 id="465" title="Product Inquiry Form" html_class="full-width-form"]'); ?>
					  </div>
				  </div><!-- /.modal-content -->
			  </div>
		</div>
	</div><!-- /.modal-dialog -->
</div>
<?php get_footer(); ?>

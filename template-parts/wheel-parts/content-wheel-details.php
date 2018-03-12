<!-- Details Section -->
<div class="section">
    <div class="container k-full-width k-full-height">
	    <div class="row k-full-height">
            <div class="col-sm-6">
                <div class="k-table k-full-height">
            	    <div class="k-table-cell">
                        <div class="product-info-wrap top-left-redline">
                            <h2 class="section-header sh-extra-small text-uppercase">Details</h2>
                            <p class="text-uppercase section-sub-header k-size-xs">The Craft</p>
                            <?php the_field('details'); ?>
                        </div>
                		<div class="product-info-wrap">
                			<div class="row text-center product-menu-list">
                				<div class="col-xs-4 text-uppercase"><a class="k-gray-link product-menu-link active" href="javascript:void(0);" data-section="2">Details</a></div>
                				<div class="col-xs-4 text-uppercase"><a class="k-gray-link product-menu-link" href="javascript:void(0);" data-section="3">Specifications</a></div>
                				<div class="col-xs-4 text-uppercase"><a class="k-gray-link product-menu-link" href="javascript:void(0);" data-section="4">Similar</a></div>
                			</div>
                		</div>
                		<div class="bottom-center-band text-center">
                			<a href="javascript:void(0);" class="text-uppercase section-explore-btn"><i class="angle-arrow-thin angle-arrow-down k-no-margin" aria-hidden="true"></i></a>
                		</div>
            	    </div>
                </div>
	            <div class="vertical-middle-band left-band">
	            	<div class="left-marker-line"></div>
	            </div>
            </div>
		    <div class="col-sm-6 k-no-padding reverse-col-sm">
				<div id="product-detail-carousel" class="carousel slide product-detail-carousel k-table k-full-height" data-interval="false">

				<?php if (have_rows('detailed_images')): ?>
					<ol class="carousel-indicators">
						<?php $count = -1; ?>
                        <?php while (have_rows('detailed_images')): the_row();
    						$image = get_sub_field('detailed_image');
    					?>
                            <?php if( strlen($image) > 0): $count++;  ?>
    							<?php if ($count == 0): ?>
    								<li data-target="#product-detail-carousel" data-slide-to="<?php echo $count; ?>" class="active">
    							<?php else: ?>
    								<li data-target="#product-detail-carousel" data-slide-to="<?php echo $count; ?>">
    							<?php endif; ?>
    								</li>
                            <?php endif; ?>
						<?php endwhile; ?>
					</ol>

					<?php $count = -1; ?>
					<div class="carousel-inner k-table-cell" role="listbox">
					<?php while (have_rows('detailed_images')): the_row();
						$image = get_sub_field('detailed_image');
					?>
                        <?php if( strlen($image) > 0): $count++;  ?>
    						<?php if ($count == 1): ?>
    							<div class="item active">
    						<?php else: ?>
    							<div class="item">
    						<?php endif; ?>
    								<div class="covered-bg product-detail-image" style="background-image: url(<?php echo $image; ?>);"></div>
    								<div class="carousel-caption"></div>
    							</div>
                        <?php endif; ?>
					<?php endwhile; ?>
					</div>
					<?php endif; ?>
			    </div>
			</div>
	 	</div><!-- /.row -->
    </div>
</div>
<!-- /Details Section -->

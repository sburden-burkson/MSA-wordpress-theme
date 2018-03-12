<?php /*  Top Wheel Section */ ?>
<?php
	global $product_name;
	$product_name = html_entity_decode( get_the_title() );
?>
<div class="section">
            <div class="container k-full-width k-full-height">
                <div class="row k-full-height">
				<?php /*  If Finish Images  */ ?>
				<?php if( have_rows('finish_images') ): $thumb_index = -1; $image_index = -1; global $schema_image; ?>
                    <div class="col-sm-6 k-no-padding-bottom">
                        <div class="row k-full-height">
                            <div class="col-sm-4 hidden-xs">
                                <div class="k-table k-full-height">
                                    <div class="k-table-cell">
                                        <ol class="carousel-image-indicators">
											<?php /* Loop Through Finish Images */ ?>
											<?php $finish_index = -1; while ( have_rows('finish_images') ) : the_row(); $finish_index++; ?>
												<?php /*  Get Name of Finish */ ?>
												<?php $finish_name = get_sub_field('finish'); ?>
												<?php /*   Loop Through Thumbnails */ ?>
												<?php while ( have_rows('product_images') ) : the_row(); ?>
													<?php /*  Get Thumbnail Image */ ?>
													<?php
														$thumb_image = get_sub_field('product_thumbnail');
														$product_image = get_sub_field('product_image');
													?>
													<?php if ( strlen($product_image) > 0 && strlen($thumb_image) > 0 ): $thumb_index++; ?>
														<?php /*  If 1st in list have these as 'active' */ ?>
														<?php $thumb_class = $thumb_index == 0 ? 'active' : ''; ?>

														<li data-finish="<?php echo $finish_name; ?>" data-target="#product-image-carousel" data-slide-to="<?php echo $thumb_index; ?>" class="<?php echo $thumb_class; ?>">
			                                                <img src="<?php echo $thumb_image; ?>" alt="<?php echo the_title() . " " . $finish_name; ?> Product Image Thumb" />
			                                            </li>

													<?php endif; ?>
												<?php  endwhile; ?>
											    <?php /* Loop Through Thumbnails */ ?>
											<?php  endwhile; ?>
											<?php /* /Loop Through Finish Images */ ?>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="k-table k-full-height">
                                    <div id="product-image-carousel" class="carousel slide product-image-carousel k-table-cell">
                                        <ol class="carousel-indicators k-carousel-light visible-xs-block">
											<?php /*  Loop Through Finish Images */ ?>
											<?php $finish_index = -1; while ( have_rows('finish_images') ) : the_row(); $finish_index++; ?>
												<?php /*  Get Name of Finish */ ?>
												<?php $finish_name = get_sub_field('finish'); ?>

												<?php /*   Loop Through Indicators (product_images -> product_thumbnail)*/ ?>
												<?php $indicator_index = -1; while ( have_rows('product_images') ) : the_row(); ?>
													<?php
														$thumb_image = get_sub_field('product_thumbnail');
														$product_image = get_sub_field('product_image');
													?>
													<?php if ( strlen($product_image) > 0 && strlen($thumb_image) > 0 ): $indicator_index++; ?>
														<?php /*  If 1st in list have these as 'active' */ ?>
														<?php $indicator_class = $indicator_index == 0 ? 'active' : ''; ?>

			                                            <li data-finish="<?php echo $finish_name; ?>" data-target="#product-image-carousel" data-slide-to="<?php echo $indicator_index; ?>" class="<?php echo $indicator_class; ?>"></li>

													<?php endif; ?>
													<?php  endwhile; ?>
													<?php /*   Loop Through Indicators (product_images -> product_thumbnail)*/ ?>
											<?php  endwhile; ?>
											<?php /* / Loop Through Finish Images */ ?>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
											<?php /*  Loop Through Finish Images */ ?>
											<?php $finish_index = -1; while ( have_rows('finish_images') ) : the_row(); $finish_index++; ?>
												<?php /*  Get Name of Finish */ ?>
												<?php $finish_name = get_sub_field('finish'); ?>
												<?php /*   Loop Through Images*/ ?>
												<?php while ( have_rows('product_images') ) : the_row(); ?>
													<?php /*  Get Product Image */ ?>
													<?php
														$product_image = get_sub_field('product_image');
														$thumb_image = get_sub_field('product_thumbnail');
													?>
													<?php if ( strlen($product_image) > 0 && strlen($thumb_image) > 0 ): $image_index++; ?>
														<?php /*  If 1st in list have these as 'active' */ ?>
														<?php $image_class = $image_index == 0 ? ' active' : ''; ?>
														<?php /*  If 1st in list have this set this as main schema image */ ?>
														<?php if ( $image_index == 0 ): $schema_image = $product_image; endif; ?>

			                                            <div data-finish="<?php echo $finish_name; ?>" class="item<?php echo $image_class; ?>">
			                                                <img src="<?php echo $product_image; ?>" alt="<?php echo the_title() . " " . $finish_name; ?> Product Image" />
			                                            </div>

													<?php endif; ?>
												<?php  endwhile; ?>
												<?php /*   Loop Through Images*/ ?>
											<?php  endwhile; ?>
											<?php /* / Loop Through Finish Images */ ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
				<?php /* / If Finish Images  */ ?>

			<div class="col-sm-6 k-gray-bg">
				<div class="k-table k-full-height">
					<div class="k-table-cell">
						<div class="product-info-wrap top-left-redline">
							<h1 class="section-header sh-extra-small product-name text-uppercase"><?php the_title(); ?></h1>
							<p class="product-price section-sub-header k-size-xs">$<?php the_field('price'); ?></p>
							<p class="product-description"><?php the_field('full_description'); ?></p>
						<?php if( $finish_index > 0): ?>
							<p>
                                <form class="finish-form filter-block">
                                    <select name="finish">
                                        <option value="Finishes">Sample Finishes</option>
									<?php /* Loop Through Finish Images */ ?>
									<?php while ( have_rows('finish_images') ) : the_row(); ?>
										<?php /*  Get Name of Finish */ ?>
										<?php $finish_name = get_sub_field('finish'); ?>
                                        <option value="<?php echo $finish_name; ?>"><?php echo $finish_name; ?></option>
									<?php endwhile; ?>
									<?php /* / Loop Through Finish Images */ ?>
                                    </select>
                                </form>
                            </p>
						<?php endif; ?>
						</div>
						<div class="product-info-wrap">
							<div class="row text-center product-menu-list">
								<div class="col-xs-4 text-uppercase">
									<a class="k-gray-link product-menu-link" data-section="2" href="javascript:void(0);">Details</a>
								</div>
								<div class="col-xs-4 text-uppercase">
									<a class="k-gray-link product-menu-link" data-section="3" href="javascript:void(0);">Specifications</a>
								</div>
								<div class="col-xs-4 text-uppercase">
									<a class="k-gray-link product-menu-link" data-section="4" href="javascript:void(0);">Similar</a>
								</div>
							</div>
						</div>
						<p class="text-center"><a href="#" class="center btn k-btn-transparent k-btn-extra-long text-uppercase k-btn-red" onclick="(function(){jQuery('.product-name input').val('<?php the_title(); ?>');jQuery('.gallery-modal').modal('show');}());return false;">Inquire About <?php the_title(); ?></a></p>
					</div>
				</div>
				<div class="bottom-center-band text-center">
					<a class="text-uppercase section-explore-btn" href="javascript:void(0);"><i aria-hidden="true" class=
					"angle-arrow-thin angle-arrow-down k-no-margin"></i></a>
				</div>
			</div>
		</div><?php /*  /.row */ ?>
	</div>
</div>
<?php /*  /Top Wheel Section */ ?>

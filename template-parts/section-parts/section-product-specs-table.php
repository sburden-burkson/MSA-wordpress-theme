<!-- Product Specs Table -->
<?php
    $varSpecs = [];
    if(get_post_type() == 'product'){
        // Get $product
        global $product;
        
        // Variations
        if($product->is_type( 'variable' )){
            $variations = $product->get_available_variations();
            foreach($variations as $var){
                $varSpecs[] = get_field_objects( $var['variation_id'] );
            }
        }
    }else{
        echo 'NOT A PRODUCT';
    }
?>
<?php if(!empty($varSpecs)){ ?>
    <div class="container product-specs-wrapper">
        <div id="specs" class="product-specs">
            <div class="product-specs-title">
                <h3 class="text-center pad-bottom">SPECS</h3>
            </div>
            <!-- product-specs-carousel -->
            <div id="product-specs-carousel" class="clearfix">

                <?php foreach($varSpecs[0] as $curFieldSlug => $varCol){ ?>

                <div class="product-specs-carousel-slide">
                    <div class="product-specs-carousel-head">
                        <h5 class="h-grey text-uppercase"><?= $varCol['label'] ?></h5>
                    </div>

                    <?php foreach($varSpecs as $varRow){ ?>

                    <div class="product-specs-carousel-row">
                        <?= $varRow[$curFieldSlug]['value'] ?>
                    </div>

                    <?php } ?>

                </div>

                <?php } ?>

            </div>
            <!-- /product-specs-carousel -->
        </div>
    </div>
<?php }else{
        echo 'NO VARIATIONS FOUND';
    } ?>
<!-- /Product Specs Table -->
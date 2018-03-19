jQuery(function($){
    
    // Update Attributes
    var updateAttributesTimeout;
    var updateAttributesTOCounter = 0;
    function updateAttributes(update_counter){
        
        // Iterate each attribute row and enable/disable custom attributes
        $('table.variations tr td.value').each(function(){
            var selectOptions = $(this).find('select > option');
            var customOptions = $(this).find('a.pa-option');
            
            // Iterate custom attributes
            customOptions.each(function(){
                var currOption = $(this);
                var attrValue = currOption.data('attrvalue');
                var optionEnabled = false;
                
                // Iterate select options
                selectOptions.each(function(){
                    // Match attribute values
                    if($(this).attr('value') == attrValue){
                        // Most likely if it's there then it's enabled, but there is a class we can check.
                        if($(this).hasClass('enabled')){
                            optionEnabled = true;
                        }
                    }
                });
                
                // Update custom attributes
                if(optionEnabled){
                    if(currOption.hasClass('disabled')){
                        currOption.removeClass('disabled');
                    }
                }else{
                    if(!currOption.hasClass('disabled')){
                        currOption.removeClass('active').addClass('disabled');
                    }
                }
            });
        });
        
        // Run this function 5 times to make sure it catches the change.
        // THIS MIGHT BE UNNECESSARY
        updateAttributesTOCounter = (update_counter === false)? updateAttributesTOCounter : 5;
        if(updateAttributesTOCounter > 0){
            updateAttributesTOCounter--;
            if(update_counter !== false){
                // If first run, clear timeouts (if any)
                clearTimeout(updateAttributesTimeout);
            }
            updateAttributesTimeout = setTimeout(function(){
                updateAttributes(false);
            }, 100);
        }
    }
    
    // Update custom attributes on select change & variation update
    // MIGHT NOT NEED ALL 3, MAYBE JUST USE woocommerce_update_variation_values
    $('table.variations tr td.value select').change(function(){
        updateAttributes();
    });
    $('.variations_form').on('woocommerce_variation_select_change', function(){
        updateAttributes();
    });
    $('.variations_form').on('woocommerce_update_variation_values', function(){
        updateAttributes();
    });
    
    // Price watch
    $('.single_variation_wrap').before($('h5.product-price'));
    $('.single_variation_wrap').on('hide_variation', function(e){
        // Fired when the user selects all the required dropdowns / attributes
        // and a final variation is selected / shown
        $('h5.product-price').show();
        $('.single_variation_wrap .woocommerce-variation').stop().removeAttr('style').hide();
    });
    $('.single_variation_wrap').on('show_variation', function(e, variation){
        // Fired when the user selects all the required dropdowns / attributes
        // and a final variation is selected / shown
        $('h5.product-price').hide();
        $('.single_variation_wrap .woocommerce-variation').stop().removeAttr('style').show();
    });
    
    // Custom Attributes Option Click Event
    var optionClickTimeout;
    var optionClickTOCounter = 0;
    function optionClickChange(el, skip_change){
        // Check if already active
        var alreadyActive = (el.hasClass('active'))? true : false;
        // Set attrValue to '' if it's being de-activated
        var attrValue = (!alreadyActive && skip_change !== true || alreadyActive && skip_change === true)? el.data('attrvalue') : '';
        var optionSelect = el.closest('td').find('select');
        
        // Remove all active siblings, and activate if not de-activating
        if(skip_change !== true){
            el.closest('td.value').find('a.pa-option').removeClass('active');
            if(!alreadyActive){
                el.addClass('active');
            }
            
            // Update select value for WooCommerce
            optionSelect.val(attrValue).change();
            
            // Clear timeouts (if any)
            optionClickTOCounter = 5;
            clearTimeout(optionClickTimeout);
        }
        
        // Check if the select has been updated
        var optionUpdated = false;
        if(optionSelect.val() == attrValue){
            optionUpdated = true;
            optionClickTOCounter = 0;
        }else{
            // Update if it hasn't been updated
            // THIS MIGHT BE UNNECESSARY
            console.log('Not updated yet... trying again...');
            optionSelect.val(attrValue).change();
        }
        // Run this function 5 times to make sure it updates
        // THIS MIGHT BE UNNECESSARY
        if(optionClickTOCounter > 0){
            optionClickTOCounter--;
            optionClickTimeout = setTimeout(function(){
                optionClickChange(el, true);
            }, 100);
        }
    }
    $('table.variations tr td.value a.pa-option').click(function(e){
        e.preventDefault();
        optionClickChange($(this));
        return false;
    });
    
    // First run sync with select dropdown
    $('table.variations tr td.value').each(function(){
        var selectValue = $(this).find('select').val();
        var customOptions = $(this).find('a.pa-option');
            
        customOptions.each(function(){
            var currOption = $(this);
            var attrValue = currOption.data('attrvalue');
            
            if(attrValue == selectValue) {
                currOption.addClass('active');
            }
        });
    });
    
    // Product Image Carousel
    $('#product-image-carousel').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      asNavFor: '#product-thumbs',
      dots: true,
      infinite: false,
    });
    
    // Product Image Carousel Thumbnails
    $('#product-thumbs').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '#product-image-carousel',
      focusOnSelect: true,
      vertical: true,
      verticalSwiping: true,
      arrows: false,
      infinite: false,
    });
    
    // Window resize catch
    $( window ).resize(function() {
        $('#product-thumbs').each(function() {
          $(this).slick("getSlick").refresh();
        });
    });
    
    // Product Images Match Height
    $('.product-image-height').matchHeight();
    
    // Tab click event
    $('.productTabsHeight').click(function(){
        if(!$(this).hasClass('active-skip')){
            $('.productTabsHeight').removeClass('active');
            $(this).addClass("active");
            
            // Hide the variation attributes
            if($(this).hasClass('showAttributes')){
                $('form.variations_form.cart table.variations').stop().fadeIn('fast');
            }else{
                $('form.variations_form.cart table.variations').stop().fadeOut('fast');
            }
        }
    });
    
    // Scroll-to buttons
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
        var anchorId = $.attr(this, 'href');
        if(anchorId.length > 1){
            $('html, body').animate({
                scrollTop: $(anchorId).offset().top
            }, 500);
        }
    });
    
    // Specs Table Carousel
    var specsSlides = $('#product-specs-carousel .product-specs-carousel-slide').length;
    function specsSlickCheck() {
        if($(window).width() > 1214) {
            if($('#product-specs-carousel').hasClass('slick-initialized')) {
                $('#product-specs-carousel').slick('unslick');
            }
        }else{
            if(!$('#product-specs-carousel').hasClass('slick-initialized')) {
                $('#product-specs-carousel').not('.slick-initialized').slick({
                    dots: true,
                    arrows: true,
                    infinite: false,
                    speed: 300,
                    slidesToShow: (specsSlides > 4)? 4 : specsSlides,
                    slidesToScroll: (specsSlides > 4)? 4 : 1,
                    variableWidth: true,
                    prevArrow: '<button type="button" class="product-specs-carousel-button carousel-button-left form-control"><i class="fal fa-angle-left"></i></button>',
                    nextArrow: '<button type="button" class="product-specs-carousel-button carousel-button-right form-control"><i class="fal fa-angle-right"></i></button>',
                    responsive: [
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: true,
                                dots: true,
                            }
                        }
                    ]
                });
            }
        }
    }
    specsSlickCheck(); // First run
    
    // Window resize event
    $(window).on('resize', function() {
        $('#product-thumbs').each(function() {
          $(this).slick("getSlick").refresh();
        });
        specsSlickCheck();
    });
});
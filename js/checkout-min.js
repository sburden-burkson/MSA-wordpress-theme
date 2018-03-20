jQuery(function($){

    /* 
    MULTI-PART CHECKOUT
    Convert WooCommerce checkout page to multi-part process */

    // Enable shipping form
    $('#ship-to-different-address-checkbox').attr('checked', 'checked').change();

    // Get page elements
    var page_title = $('#woo-page-title');
    var shipping_section = $('#shipping_section');
    var billing_section = $('#billing_section');
    var payment_section = $('#payment');
    var shipping_button = $('#shipping_section_button');
    var billing_button = $('#billing_section_button');

    // minimizeSection function
    function minimizeSection(section_slug){
        console.log('Minimizing '+section_slug+'.');

        switch (section_slug){
            case 'shipping':

                break;

            case 'billing':
                break;
        }
    }

    // goToSection function
    var current_section = false;
    function goToSection(section_slug, scroll_to_top){
        console.log('Going to '+section_slug+'.');
        scroll_to_top = (scroll_to_top === true)? true : false;
        
        // Update current section
        current_section = section_slug;
        
        // Blur all inputs
        $('input').each(function(){
          $(this).trigger('blur');
        })
        
        switch (section_slug){
            case 'shipping':
                page_title.html('SHIPPING');
                shipping_section.show();
                billing_section.hide();
                payment_section.hide();
                break;

            case 'billing':
                page_title.html('BILLING');
                shipping_section.hide();
                billing_section.show();
                payment_section.show();
                break;

            case 'review':
                page_title.html('REVIEW');
                minimizeSection('shipping');
                minimizeSection('billing');

                shipping_section.show();
                billing_section.show();
                payment_section.show();
                break;
        }
        
        if(scroll_to_top){
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        }
    }
    
    $(document.body).on( 'updated_checkout', function(){
        // Update payment_section var
        payment_section = $('#payment');
        
        // Check section, hide if not on review section
        if(current_section !== 'review'){
            payment_section.hide();
        }
    });

    /* 
        INSTANT INIT
    */

    // Button click handlers
    shipping_button.click(function(e) {
        e.preventDefault();
        goToSection('billing', true);
        return false;
    });
    billing_button.click(function(e) {
        e.preventDefault();
        goToSection('review', true);
        return false;
    });

    /* /INSTANT INIT */

    /* 
        DOCUMENT LOAD INIT
    */
    $(window).load(function(){
        
        // Go to first section
        goToSection('shipping');

    });
    /* /DOCUMENT LOAD INIT */

    /* /MULTI-PART CHECKOUT */

});
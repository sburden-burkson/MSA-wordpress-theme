jQuery(function($){
    // Collection Masonry
    var $collectionGrid = $('.collection-item-container').masonry({
      // options
      itemSelector: '.collection-item',
      columnWidth: 300,
      isFitWidth: true,
      gutter: 20,
      horizontalOrder: true
    });
    $collectionGrid.imagesLoaded().progress(function() {
      $collectionGrid.masonry('layout');
    });

    // Match Height JS
    $(".collectionHeight").matchHeight({byRow: false});
    $(".collection-img-wrap").matchHeight({byRow: false});
    $(".collection-col").matchHeight({byRow: false});
    
    // Convert query string to object (For color filters code below)
    function queryObject(queryString){
        var queryObj = {};
        var queryArr1 = queryString.split('&');
        for(var i=0; i < queryArr1.length; i++){
            var currVar = queryArr1[i].split('=');
            var currFilter = currVar[0].split('filter_');
            currFilter = currFilter[currFilter.length-1];
            var currValues = currVar[currVar.length-1].replace('%2C', ',').split(',');
            queryObj[currFilter] = currValues;
        }
        return queryObj;
    }
    
    // Compare two query objects with array values
    function diffObject(a, b) {
        var foundDiff = false;
        return Object.keys(a).concat(Object.keys(b)).reduce(function(map, k) {
            var warningTriggered = false;
            c = $(a[k]).not(b[k]).get();
            d = $(b[k]).not(a[k]).get();
            e = c.concat(d);
            if (e.length && e[0].length) {
                if(foundDiff && (map['slug'] !== k || map['value'] !== e[0])){
                    console.log('Warning: Found more than one difference in diffObject().');
                    console.log(' ^ Before: ', JSON.stringify(map));
                    warningTriggered = true;
                }else{
                    foundDiff = true;
                }
                map['slug'] = k;
                map['value'] = e[0];
                if(warningTriggered){
                    console.log(' ^ After: ', JSON.stringify(map));
                }
            }
            return map;
        }, {});
    }
    
    // Colors to Swatches (Filter Modal)
    // use var `colorVals` and `queryString` from archive-product.php
    // Unfortunately, WooCommerce did not include information about each attribute in the HTML.
    // Goal: Use the current URL and the URL link from each filter to glean attribute slugs and values.
    //       Once we know what is what, we can decide which values are to be "swatchified".
    //console.log(queryString);
    //console.log(colorVals);
    $('.shop-filters-widget-area .woocommerce-widget-layered-nav-list').each(function(){
        var isColorList = false;
        var isColorListArr = [];
        var isColorListCount = 0;
        var valuesCount = $(this).find('li').length;
        
        $(this).find('li').each(function(){
            var isChosen = ($(this).hasClass('chosen'))? true : false;
            var aHref = $(this).find('a').attr('href')+'';
            
            // Check for URL query
            if(aHref.indexOf('?') !== -1){
                var hrefQuery = aHref.split('?');
                hrefQuery = hrefQuery[hrefQuery.length-1];
            }else{
                hrefQuery = '';
            }
            
            // If filter is chosen, then the value will not be in the new URL.
            // Goal: Find the difference between the new URL vars and the current URL vars.
            //       The difference is the value of the current attribute.
            if(isChosen){
                
                // Convert query string to object
                var currQuery = queryObject(queryString);
                var linkQuery = queryObject(hrefQuery);
                
                // Find missing attribute
                var linkDiff = diffObject(currQuery, linkQuery);
                var attrSlug = linkDiff['slug'];
                var attrValue = linkDiff['value'];
            
            // If filter is NOT chosen, then the value will be at the end of the new URL.
            // Goal: Chop off the end of the URL vars to find the current attribute value.
            }else{
                // Find last value (which is the current attribute)
                var aHrefSplit = hrefQuery.split('&');
                var aHrefLast = aHrefSplit[aHrefSplit.length-1];
                var aHrefLastSplit = aHrefLast.split('=');
                var attrSlug = aHrefLastSplit[0];
                var attrValue = aHrefLastSplit[aHrefLastSplit.length-1];

                // Check for multiple values
                if(attrValue.indexOf(',') !== -1){
                    attrValue = attrValue[attrValue.length-1].split(',');
                    attrValue = attrValue[attrValue.length-1];
                }
            }
            
            // Remove "filter_" from slug
            if(attrSlug.indexOf('filter_') == 0){
                attrSlug = attrSlug.substring(7);
            }
            
            // Check if color swatch exists
            if(attrSlug in colorVals && attrValue in colorVals[attrSlug]){
                isColorListArr.push(true);
                isColorListCount++;
            }else{
                isColorListArr.push(false);
            }
            
            //console.log(attrSlug+': '+attrValue);
            $(this).data('attrslug', attrSlug);
            $(this).data('attrvalue', attrValue);
        });
        
        // If list of colors, replace with swatches
        if(isColorListCount > 1 || isColorListCount == valuesCount){
            
            $(this).find('li').each(function(){
                var attrSlug = $(this).data('attrslug');
                var attrValue = $(this).data('attrvalue');
                if(attrSlug in colorVals && attrValue in colorVals[attrSlug]){
                    var attrColor = colorVals[attrSlug][attrValue];
                    $(this).addClass('color-swatch hover-tooltip-trigger');
                    var attrName = $(this).find('a').html();
                    $(this).find('a').html('').css({'background-color': attrColor});
                    
                    // Add tooltip
                    $(this).append('<div class="hover-tooltip">'+attrName+'</div>');
                }
            });
            
        }
    });
});
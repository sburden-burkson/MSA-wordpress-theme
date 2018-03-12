jQuery(document).ready(function ($) {
    if (!kinesis.isInitialized)
        kinesis.initialize();

    setTimeout(function () { $('select[name=finish]').chosen({ 'disable_search': true }) }, 600);

    var prodImgIndicatorsContainer = $('.carousel-image-indicators'),
        dotIndicatorsContainer = $('#product-image-carousel .carousel-indicators'),
        innerProdImagesContainer = $('#product-image-carousel .carousel-inner');

    var prodImgIndicators = $('.carousel-image-indicators > li'),
        dotIndicators = $('#product-image-carousel .carousel-indicators > li'),
        innerProdImages = $('#product-image-carousel .carousel-inner > div');

    $('select[name=finish]').on('change', function (e) {
        var $that = $(this);
        var finishVal = $that.val();
        if (finishVal.toLowerCase() == 'finishes') {
            prodImgIndicatorsContainer.empty().append(prodImgIndicators);
            dotIndicatorsContainer.empty().append(dotIndicators);
            innerProdImagesContainer.empty().append(innerProdImages);
        }
        else {
            var selectedProdImgIndicators = prodImgIndicators.clone().filter(function () {
                return $(this).data('finish') === finishVal;
            }),
                selectedDotIndicators = dotIndicators.clone().filter(function () {
                    return $(this).data('finish') === finishVal;
                }),
                selectedInnerProdImages = innerProdImages.clone().filter(function () {
                    return $(this).data('finish') === finishVal;
                });

            selectedProdImgIndicators.each(function (idx, ele) {
                $(ele).attr('data-slide-to', idx);
            });
            selectedDotIndicators.each(function (idx, ele) {
                $(ele).attr('data-slide-to', idx);
            });

            selectedProdImgIndicators.removeClass('active').eq(0).addClass('active');
            selectedDotIndicators.removeClass('active').eq(0).addClass('active');
            selectedInnerProdImages.removeClass('active').eq(0).addClass('active');

            prodImgIndicatorsContainer.empty().append(selectedProdImgIndicators);
            dotIndicatorsContainer.empty().append(selectedDotIndicators);
            innerProdImagesContainer.empty().append(selectedInnerProdImages);
        }
        $('html, body').animate({ 'scrollTop': $('#product-image-carousel').offset().top - $('.navbar-fixed-top').height() }, 500);
    });
});

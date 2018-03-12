jQuery(document).ready(function ($) {
    if (!kinesis.isInitialized)
        kinesis.initialize();

    var $blogGrid = $('.blog-item-container').masonry({
        itemSelector: '.blog-item',
        columnWidth: 360,
        isFitWidth: true,
        gutter: 18
    });

    $blogGrid.imagesLoaded().progress( function() {
        $blogGrid.masonry('layout');
    });
});

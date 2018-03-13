jQuery(document).ready(function ($) {
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
});

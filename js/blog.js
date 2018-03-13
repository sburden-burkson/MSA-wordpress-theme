jQuery(document).ready(function ($) {
  var blogItemOptions = {
    byRow: false
  }
  $(".featuredBlogHeight").matchHeight();
  $(".blog-item-info-wrap").matchHeight(blogItemOptions);

  // Blog Item Masonry
  var $blogGrid = $('.blog-item-container').masonry({
    // options
    itemSelector: '.blog-item',
    columnWidth: 320,
    isFitWidth: true,
    gutter: 20,
    horizontalOrder: true,
  });

  $blogGrid.imagesLoaded().progress(function() {
    $blogGrid.masonry('layout');
  });

  // Match Height & Masonry to work in tandem
  var timer;
  $(window).bind('resize', function() {
    clearTimeout(timer);
    timer = setTimeout(function(){ $(".featuredBlogHeight").matchHeight(); $blogGrid.masonry('layout'); }, 200);
  });
});

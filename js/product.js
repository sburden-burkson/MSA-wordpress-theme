jQuery(document).ready(function ($) {
  // Slick Slider
  $('#product-image-carousel').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    asNavFor: '#product-thumbs',
    dots: true
  });
  $('#product-thumbs').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '#product-image-carousel',
    focusOnSelect: true,
    vertical: true,
    verticalSwiping: true,
    arrows: false,
  });
  $( window ).resize(function() {
    // if ($(window).width() > 766 && $('#product-thumbs .slick-list').outerHeight() < 50) {
      $('#product-thumbs').each(function() {
        $(this).slick("getSlick").refresh();
      });
     // }
  });
  $('.product-image-height').matchHeight();
  // $(".productTabsHeight").matchHeight();
  $(".tab-pane").matchHeight(false);
  function productTabsCorrectHeight() {
  	/* Same function as in warranty.js */
    if ($(window).width() > 767) {
      $(".tab-pane").matchHeight(false);
    } else {
      $('.tab-pane').matchHeight({ remove: true });
    }
  }
  productTabsCorrectHeight();
  $(window).on('resize', function() {
    productTabsCorrectHeight();
  	specsSlickCheck();
  });
  $(".productTabsHeight").click(function(){
  	if(!$(this).hasClass('active-skip')){
  		$(".productTabsHeight").removeClass("active");
  		$(this).addClass("active");
  	}
  });
  $(document).on('click', 'a[href^="#"]', function (event) {
      event.preventDefault();

      $('html, body').animate({
          scrollTop: $($.attr(this, 'href')).offset().top
      }, 500);
  });
  var specsSlides = $('#product-specs-carousel .product-specs-carousel-slide').length;
  function specsSlickCheck() {
  	if($(window).width() > 1214) {
  		if($('#product-specs-carousel').hasClass('slick-initialized')) {
  			$('#product-specs-carousel').slick('unslick');
  		}
  	}else{
  		// if(!specsIsSlick) {
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
  							slidesToShow: (specsSlides > 3)? 3 : specsSlides,
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
  specsSlickCheck();
});

jQuery(document).ready(function ($) {
// Match Height JS Options
  var notByRow = {byRow: false};
// Navbar
  //Affix Navbar
  var headerHeight = 40;
  // var headerHeight = $('header').outerHeight();
  // $('#navColor').data('offset-top', headerHeight);

  var topSection;

  if (!$('[id^="top-section"]')[0] && !$('.home-video-wrapper')[0]) {
    topSection = false;
    $('#navColor').addClass("changeBlack");
  } else {
    $('#navColor').addClass("changeWhite");
    topSection = true;
  }
  // Navbar Height and Transparency
  var navHeight = $('nav').outerHeight();
  var brandPad = $('nav .navbar-brand').css('padding-top');
  function navResize(){
    var scrollTop = $(window).scrollTop();
    var navTop = scrollTop - $('header').outerHeight();
    var newNavHeight = navHeight - (navTop * 0.1);
    var opacity = 0 + Math.abs((navTop * 0.01));
    var navLogoHeight = $('#navLogo').outerHeight();
    var logoPad = (newNavHeight - navLogoHeight) / 2;
    if (scrollTop <= headerHeight) {
      $('#navColor').css(
        'background-color', 'rgba(255, 255, 255, 0.05)',
        'height', '80px'
      );
      $('nav .nav>li>a').css(
        'line-height', '80px'
      );
      $('nav, nav .navbar-toggle').css(
        'height', '80px'
      );
      $('nav .navbar-brand').css(
        'padding-top', brandPad,
        'padding-bottom', brandPad
      );
    }
    if (navTop > 200) {
      $('#navColor').css(
        'background-color', 'rgba(255, 255, 255, 1)'
      );
    }
    if (newNavHeight >= 60 && newNavHeight <= navHeight) {
      $('nav, nav .navbar-toggle').css(
        'height', newNavHeight
      );
      $('nav .navbar-brand').css(
        'padding-top', logoPad,
        'padding-bottom', logoPad
      );
      $('nav .nav>li>a').css(
        'line-height', newNavHeight + 'px'
      );
      $('#navColor').css(
        'background-color', 'rgba(255, 255, 255,' + opacity + ')'
      );
    }
    if (topSection) {
      if (opacity > 0.4) {
        $('#navColor').removeClass("changeWhite");
        $('#navColor').addClass("changeBlack");
      } else {
        $('#navColor').removeClass("changeBlack");
        $('#navColor').addClass("changeWhite");
      }
    }
  }
  $(window).on('scroll', function() {
    navResize();
  });
  navResize();

// Footer
  function footerAccordion() {
    if ($(window).width() > 767) {
      $('[id^="collapse"]', 'footer').addClass('in');
    } else {
      $('[id^="collapse"]', 'footer').removeClass('in');
    }
  }
  footerAccordion();
  $(window).on('resize', function() {
    footerAccordion();
  });
  $('.collapse').on('shown.bs.collapse', function() {
    $(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
  }).on('hidden.bs.collapse', function() {
    $(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
  });

// Side Nav
	// $('nav .navbar-right .side-nav-open, #sidenav .side-nav-close').click(function(){
	$('*[data-sidenav]').click(function() {
		sidenavId = $(this).data('sidenav');
		sidenav = $('#'+sidenavId);
		sidenav.stop().toggleClass('active');
		if(sidenav.hasClass('active')){
			sidenav.css({'right': '-10%'}).animate({'right': '0%'}, 300);
			if(sidenav.hasClass('full-screen')){
				$('html, body').css({'overflow': 'hidden'});
			}
		}else if(sidenav.hasClass('full-screen')){
			$('html, body').css({'overflow': 'auto'});
		}
	});

// Parrallax
  function getBackgroundImageSize(el) {
      var imageUrl = $(el).css('background-image').match(/^url\(["']?(.+?)["']?\)$/);
      var dfd = new $.Deferred();

      if (imageUrl) {
          var image = new Image();
          image.onload = dfd.resolve;
          image.onerror = dfd.reject;
          image.src = imageUrl[1];
      } else {
          dfd.reject();
      }

      return dfd.then(function() {
          return { width: this.width, height: this.height };
      });
  }
  var scrollSpeed = 0.3;
  function parallaxScroll() {
  		var scrolled = $(window).scrollTop() + 1;
  		$('.scroll-effect').each(function() {
  			// Get window and element values
  			windowViewTop = $(window).scrollTop();
  			windowViewBottom = windowViewTop + $(window).height();
  			elTop = $(this).offset().top;
  			elBottom = elTop + $(this).outerHeight();

  			// Find scroll position and adjust for element location
  			// scrolledAdjusted = scrolled - (elTop-($(this).outerHeight()/2));
  			scrolledAdjusted = scrolled - (elTop - $(window).height()/2);
  			scrolledAdjusted = elTop - (scrolled + $(window).height());
  			scrolledAdjusted = (scrolled + $(window).height()) - elTop;
  			// console.log('scrolledAdjusted = '+scrolledAdjusted);

  			// Get actual img height
  			var elImgHeight = $(this).data('imgHeight');
  			//							Get half height, use actual img height if possible          Adjust for parallax effect
  			var newImgPos = -( ((elImgHeight)? elImgHeight : $(this).outerHeight()) /2) + (scrolledAdjusted * scrollSpeed);
  			// var newImgPos = -(scrolledAdjusted * scrollSpeed) - ($(this).outerHeight()/2);

  			// Check to make sure the img fills the element
  			// NOT WORKING FOR SOME REASON... FORCES TOO SOON
  			// if(newImgPos > 0 || elImgHeight && newImgPos < -(elImgHeight)){
  			// 	newImgPos = '50%';
  			// 	$(this).addClass('scroll-effect-forced');
  			// }else{
  				newImgPos += 'px';
  				$(this).removeClass('scroll-effect-forced');
  			// }

  			// Set the position
  			$(this).css({'background-position': '50% '+newImgPos});
  		});
  }
	var parallaxSizeAdjustInitial = 200;

	// 100 = No size adjustment, 120 = 20% larger
	var parallaxSizeAdjust = 100;

	$('.scroll-effect').css({'background-size':'auto '+parallaxSizeAdjustInitial+'%', 'background-attachment':'scroll'}).each(function(){
		var currEl = $(this);
		getBackgroundImageSize(currEl).then(function(size) {
			// Increase height of photo so that it fills element with room for parallax scrolling
			justInCase = 10;
			var heightAdjusted = currEl.outerHeight() + (($(window).height() * scrollSpeed)) + justInCase;
			var widthAdjusted = (size.width / size.height) * heightAdjusted;
			if(widthAdjusted < currEl.width()){
				// console.log('Warning: Parallax image is portrait. Will adjust to fill width. (Img width (150%): '+widthAdjusted+', El width: '+currEl.width()+')');
				currEl.data('imgWidth', size.width).data('imgHeight', size.height);
				currEl.css({'background-size':'100% auto'}).addClass('scroll-effect-adjusted');
			}else{
				// console.log('Success: Parallax image fits. (Img width (150%): '+widthAdjusted+', El width: '+currEl.width()+')');
				currEl.data('imgWidth', widthAdjusted).data('imgHeight', heightAdjusted);
				currEl.css({'background-size':widthAdjusted+'px '+heightAdjusted+'px'});
			}
			parallaxScroll();
		}).fail(function() {
			// console.log('Failed to load image size');
		});
	});
	$(window).scroll(function (e) {
			parallaxScroll();
	});
	parallaxScroll();


// Next arrow scroll
  // every section must have a class of 'section' to scroll past the bottom of it
  $(".down-arrows a").click(function() {
    var section = $(this).closest('.section');
    $('html,body').animate({
      scrollTop: section.offset().top + section.outerHeight(true) - 60
    }, 'slow');
  });


// Accessory Info Page
  $(".accessoryHeight").matchHeight(notByRow);
  $(".accessoryHeight1").matchHeight(notByRow);
  $(".accessoryHeight2").matchHeight(notByRow);
  $(".accessoryHeight3").matchHeight(notByRow);
  $(".accessoryHeight4").matchHeight(notByRow);
  $(".accessoryHeightCTA").matchHeight();

// FAQ Page
  $('#faqAccordion .collapse').on('shown.bs.collapse', function() {
    $(this).parent().find('.panel-heading').removeClass("border-bottom");
  }).on('hidden.bs.collapse', function() {
    $(this).parent().find('.panel-heading').addClass("border-bottom");
  });

// Staggered Slider Section
  $('#staggeredCarousel').slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    arrows: true,
    dots: true
  });
  $('#staggeredCarouselMobile').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true
  });
  $(window).resize(function() {
    if ($(window).width() > 990 && $('#staggeredCarousel .slick-list').outerHeight() < 300) {
      $('#staggeredCarousel').each(function() {
        $(this).slick("getSlick").refresh();
      });
    }
    $(".staggeredCarouselHeight").matchHeight();
    $(".carouselInfoHeight").matchHeight();
  });
  $(".staggeredCarouselHeight").matchHeight();
  $(".carouselInfoHeight").matchHeight();
  $(".carouselInfoMobileHeight").matchHeight();

// Warranty Page
  $(".warrantyHeight").matchHeight();
  $(".warrantyOptionHeight").matchHeight();
  $(".warranty-panes .tab-pane").matchHeight(false);
  function warrantyInfoCorrectHeight() {
    if ($(window).width() > 767) {
      $(".warranty-panes .tab-pane").matchHeight(false);
    } else {
      $('.warranty-panes .tab-pane').matchHeight({remove: true});
    }
  }
  warrantyInfoCorrectHeight();
  $(window).on('resize', function() {
    warrantyInfoCorrectHeight();
  });
  $(".warrantyOptionHeight").click(function(){
    $(".warrantyOptionHeight").removeClass("active");
    $(this).addClass("active");
  });

  // Article Stacked Images Section
  $(".blogStagger").matchHeight();

  // Video Section
  function checkIframeLoaded() {
    if($('#topVideo').length > 0) {
    // Get a handle to the iframe element
      var iFrameHeight = $('#topVideo').height();
      // Check if loading is complete
      if ( iFrameHeight > 10 ) {
        videoSizing();
        return;
      }
      // If we are here, it is not loaded. Set things up so we check the status again in 100 milliseconds
      window.setTimeout(checkIframeLoaded, 100);
    }
  }
  function videoSizing() {
    var width = parseInt(document.getElementById("topVideo").width);
    var height = parseInt(document.getElementById("topVideo").height);
    if ($(window).width() > 480) {
      var percentage = (height/width) * 100;
      // console.log("480+: "+percentage);
    } else {
      var percentage = (height/width) * 200;
      // console.log("not 480: "+percentage);
    }
    $('.home-video-wrapper').css('padding-bottom', percentage + '%');
  }

  checkIframeLoaded();

  $(window).on('resize', function() {
    checkIframeLoaded();
  });

});

jQuery(document).ready(function(e){function t(){var t=e(window).scrollTop(),a=t-e("header").outerHeight(),o=l-.1*a,i=0+Math.abs(.01*a),s=e("#navLogo").outerHeight(),n=(o-s)/2;t<=h&&(e("#navColor").css("background-color","rgba(255, 255, 255, 0.05)","height","80px"),e("nav .nav>li>a").css("line-height","80px"),e("nav, nav .navbar-toggle").css("height","80px"),e("nav .navbar-brand").css("padding-top",g,"padding-bottom",g)),a>200&&e("#navColor").css("background-color","rgba(255, 255, 255, 1)"),o>=60&&o<=l&&(e("nav, nav .navbar-toggle").css("height",o),e("nav .navbar-brand").css("padding-top",n,"padding-bottom",n),e("nav .nav>li>a").css("line-height",o+"px"),e("#navColor").css("background-color","rgba(255, 255, 255,"+i+")")),d&&(i>.4?(e("#navColor").removeClass("changeWhite"),e("#navColor").addClass("changeBlack")):(e("#navColor").removeClass("changeBlack"),e("#navColor").addClass("changeWhite")))}function a(){e(window).width()>767?e('[id^="collapse"]',"footer").addClass("in"):e('[id^="collapse"]',"footer").removeClass("in")}function o(t){var a=e(t).css("background-image").match(/^url\(["']?(.+?)["']?\)$/),o=new e.Deferred;if(a){var i=new Image;i.onload=o.resolve,i.onerror=o.reject,i.src=a[1]}else o.reject();return o.then(function(){return{width:this.width,height:this.height}})}function i(){var t=e(window).scrollTop()+1;e(".scroll-effect").each(function(){windowViewTop=e(window).scrollTop(),windowViewBottom=windowViewTop+e(window).height(),elTop=e(this).offset().top,elBottom=elTop+e(this).outerHeight(),scrolledAdjusted=t-(elTop-e(window).height()/2),scrolledAdjusted=elTop-(t+e(window).height()),scrolledAdjusted=t+e(window).height()-elTop;var a=e(this).data("imgHeight"),o=-(a||e(this).outerHeight())/2+scrolledAdjusted*u;o+="px",e(this).removeClass("scroll-effect-forced"),e(this).css({"background-position":"50% "+o})})}function s(){e(window).width()>767?e(".warranty-panes .tab-pane").matchHeight(!1):e(".warranty-panes .tab-pane").matchHeight({remove:!0})}function n(){if(e("#topVideo").length>0){if(e("#topVideo").height()>10)return void r();window.setTimeout(n,100)}}function r(){var t=parseInt(document.getElementById("topVideo").width),a=parseInt(document.getElementById("topVideo").height);if(e(window).width()>480)var o=a/t*100;else var o=a/t*200;e(".home-video-wrapper").css("padding-bottom",o+"%")}var d,c={byRow:!1},h=40;e('[id^="top-section"]')[0]||e(".home-video-wrapper")[0]?(e("#navColor").addClass("changeWhite"),d=!0):(d=!1,e("#navColor").addClass("changeBlack"));var l=e("nav").outerHeight(),g=e("nav .navbar-brand").css("padding-top");e(window).on("scroll",function(){t()}),t(),a(),e(window).on("resize",function(){a()}),e(".collapse").on("shown.bs.collapse",function(){e(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus")}).on("hidden.bs.collapse",function(){e(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus")}),e("*[data-sidenav]").click(function(){sidenavId=e(this).data("sidenav"),sidenav=e("#"+sidenavId),sidenav.stop().toggleClass("active"),sidenav.hasClass("active")?(sidenav.css({right:"-10%"}).animate({right:"0%"},300),sidenav.hasClass("full-screen")&&e("html, body").css({overflow:"hidden"})):sidenav.hasClass("full-screen")&&e("html, body").css({overflow:"auto"})});var u=.3;e(".scroll-effect").css({"background-size":"auto 200%","background-attachment":"scroll"}).each(function(){var t=e(this);o(t).then(function(a){justInCase=10;var o=t.outerHeight()+e(window).height()*u+justInCase,s=a.width/a.height*o;s<t.width()?(t.data("imgWidth",a.width).data("imgHeight",a.height),t.css({"background-size":"100% auto"}).addClass("scroll-effect-adjusted")):(t.data("imgWidth",s).data("imgHeight",o),t.css({"background-size":s+"px "+o+"px"})),i()}).fail(function(){})}),e(window).scroll(function(e){i()}),i(),e(".down-arrows a").click(function(){var t=e(this).closest(".section");e("html,body").animate({scrollTop:t.offset().top+t.outerHeight(!0)-60},"slow")}),e(".accessoryHeight").matchHeight(c),e(".accessoryHeight1").matchHeight(c),e(".accessoryHeight2").matchHeight(c),e(".accessoryHeight3").matchHeight(c),e(".accessoryHeight4").matchHeight(c),e(".accessoryHeightCTA").matchHeight(),e("#faqAccordion .collapse").on("shown.bs.collapse",function(){e(this).parent().find(".panel-heading").removeClass("border-bottom")}).on("hidden.bs.collapse",function(){e(this).parent().find(".panel-heading").addClass("border-bottom")}),e("#staggeredCarousel").slick({slidesToShow:2,slidesToScroll:2,arrows:!0,dots:!0}),e("#staggeredCarouselMobile").slick({slidesToShow:1,slidesToScroll:1,arrows:!1,dots:!0}),e(window).resize(function(){e(window).width()>990&&e("#staggeredCarousel .slick-list").outerHeight()<300&&e("#staggeredCarousel").each(function(){e(this).slick("getSlick").refresh()}),e(".staggeredCarouselHeight").matchHeight(),e(".carouselInfoHeight").matchHeight()}),e(".staggeredCarouselHeight").matchHeight(),e(".carouselInfoHeight").matchHeight(),e(".carouselInfoMobileHeight").matchHeight(),e(".warrantyHeight").matchHeight(),e(".warrantyOptionHeight").matchHeight(),e(".warranty-panes .tab-pane").matchHeight(!1),s(),e(window).on("resize",function(){s()}),e(".warrantyOptionHeight").click(function(){e(".warrantyOptionHeight").removeClass("active"),e(this).addClass("active")}),e(".blogStagger").matchHeight(),n(),e(window).on("resize",function(){n()});var w=setInterval(function(){e("#email_address_0").length&&(e("#email_address_0").attr("placeholder","Email"),clearInterval(w))},100)});

jQuery(document).ready(function($) {

  // new js
  effectOnLoad();
  // end of new js

  /*
   postSlick();
  homeSlick();
  slimbannerSlick();
  mobileMenuDrop();
  mobileSlider();
  mobileSearchOpen();
  tabs();
  popup();
  shortenTextList();
  mobileCategorySearch();
  fullSliderSlick();
  reviewEqualHeight();


    // basic
    mobileMenu();
    accordian();
    apartmentsToggle();
    smoothScroll();
    relocateDiv();
    slickBannerSlider();
    accordianInside();

    navOnScroll();

    // gutembergs
    slickSlider();
    slickColumnSlider();
    lightBox();

    setTimeout(function() {
      jQuery('.main-kv-text').addClass('main-kv-text-active');
      jQuery('.main-kv.main-kv-text h1').addClass('active-line');
    }, 1000);


    workSlider();
 */

});

jQuery(window).resize(function() {
    setTimeout(relocateDiv, 200);
});

jQuery(window).scroll(function($){
     navOnScroll();
});

// new js

function effectOnLoad() {
  setTimeout(function() {
    jQuery('.loader').fadeOut(1000);
  }, 700);

  setTimeout(function() {
    jQuery('.overlay').fadeOut(1000);
  }, 1700);
}


// end of new js

function navOnScroll() {
  var headerWrapper = jQuery('.header-wrapper');

  if (headerWrapper.offset().top > 50){
    headerWrapper.addClass('header-wrapper-scrolled');
  } else {
    headerWrapper.removeClass('header-wrapper-scrolled');
  }
}

function reviewEqualHeight() {
  var maxHeight = 0;

  jQuery('.section-reviews-equal').each(function(){
      var thisHeight = jQuery(this).height();
      if (thisHeight > maxHeight) { maxHeight = thisHeight; }
  });

  jQuery('.section-reviews-equal').height(maxHeight);
}

// slick sliders
function slickBannerSlider() {
  jQuery('.slick-banner').slick({
      autoplay: true,
      speed: 800,
      infinite: true,
      dots: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<button class="slick-prev slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></button>',
      nextArrow: '<button class="slick-next slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></button>',
  });

  jQuery('.slick-banner').fadeIn();
}


// navigation
function mobileMenu() {
    jQuery('.menu-icon').on('click', function() {
      var $this = jQuery(this);
      jQuery('.header-wrapper').toggleClass('active');

      jQuery('.nav-toggle').toggleClass('nav-toggle-active');
      $this.toggleClass('menu-icon--close-x');
    });

    /*
    jQuery('#primary-menu li a').on('click', function() {
      jQuery('.nav-toggle').removeClass('nav-toggle-active');
      jQuery('.menu-icon').removeClass('menu-icon--close-x');
    });*/
}

function smoothScroll() {
  // Select all links with hashes
  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 700, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    });
}

// slick sliders
function slickSlider() {
    const slideNum = jQuery('.slick-slider').data('slide-num');

    jQuery('.slick-slider').slick({
        infinite: true,
        dots: true,
        slidesToShow: slideNum,
        slidesToScroll: 1
    });
}

function slickColumnSlider() {
    jQuery('.slick-column-slider').slick({
        infinite: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });
}

function workSlider() {
  jQuery('.work-other').slick({
      infinite: false,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
  });
}

// light box
function lightBox() {
    var lightbox = GLightbox({
        selector: '.wp-block-gallery figure img'
    });
}

function accordian() {
  if (self.innerWidth) {
    x = self.innerWidth;
  } else if (document.body) {
      x = 600;
  }

  jQuery('.accordian .accordian-q').on('click', function() {
    var answer = jQuery(this).next();
    var parentRow = jQuery(this).closest('.accordian-row');

    jQuery(this).addClass('accordian-visited');

    if (x > 601) { jQuery('.accordian-a').not(answer).slideUp(); }

    answer.slideToggle();

    if (x > 601) { jQuery('.accordian-row').not(parentRow).removeClass('accordian-row-arrow-active'); }
    parentRow.toggleClass('accordian-row-arrow-active');


  });
}

function accordianInside() {
  if (self.innerWidth) {
    x = self.innerWidth;
  } else if (document.body) {
      x = 600;
  }

  jQuery('.accordian-inside .accordian-inside-q').on('click', function() {
    var answer = jQuery(this).next();
    var parentRow = jQuery(this).closest('.accordian-inside-row');

    if (x > 601) { jQuery('.accordian-inside-a').not(answer).slideUp(); }
    answer.slideToggle();

    if (x > 601) { jQuery('.accordian-inside-row').not(parentRow).removeClass('accordian-inside-row-arrow-active'); }
    parentRow.toggleClass('accordian-inside-row-arrow-active');

    /*
    jQuery('html, body').animate({
      scrollTop: jQuery(this).offset().top - 90
    }, 1000);
    */
  });
}

function apartmentsToggle() {
  jQuery('.apartment-col-1').on('click', function() {
    jQuery(this).addClass('apartment-col-active');
    jQuery('.apartment-col-2').removeClass('apartment-col-active');

    jQuery('.apartment-desc-2').removeClass('apartment-desc-active');
    jQuery('.apartment-desc-1').addClass('apartment-desc-active');
  });

  jQuery('.apartment-col-2').on('click', function() {
    jQuery(this).addClass('apartment-col-active');
    jQuery('.apartment-col-1').removeClass('apartment-col-active');

    jQuery('.apartment-desc-1').removeClass('apartment-desc-active');
    jQuery('.apartment-desc-2').addClass('apartment-desc-active');
  });
}

function relocateDiv() {
  if (self.innerWidth) {
    x = self.innerWidth;
  } else if (document.body) {
      x = 600;
  }

  if (x < 601) {
    jQuery('.apartment-mobile-book-1').append(jQuery('#firstBooker'));
    jQuery('.apartment-mobile-book-2').append(jQuery('#secondBooker'));
  } else {
    jQuery('.apartment-desc-1 .apartment-desc-right').append(jQuery('#firstBooker'));
    jQuery('.apartment-desc-2 .apartment-desc-right').append(jQuery('#secondBooker'));
  }

}

function onScrollEffects() {
  var wScroll = jQuery(this).scrollTop();
  
  

  if(jQuery('.scroll-section').length > 0) {
    var about = jQuery('.scroll-section').offset().top - 600;
    if(wScroll>about) {
      jQuery('.scroll-section .scroll-effect').each(function(i){
           setTimeout(function(){
             jQuery('.scroll-section .scroll-effect').eq(i).addClass('scroll-effect-active');
           }, 300 * (i+1));
       });
    }
  }

}

jQuery(window).scroll(function($){
    onScrollEffects();
});


// new code that I'm using
function slimbannerSlick() {
  jQuery('.slim-slick').slick({
      autoplay: true,
      speed: 800,
      infinite: true,
      dots: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<button class="slick-prev slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></button>',
      nextArrow: '<button class="slick-next slick-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg></button>',
  });

  jQuery('.slim-slick').css('opacity', 1);
}

function mobileMenuDrop() {
  
  jQuery('.main-navigation .menu a').on('click', function() {
    const thisMenu = jQuery(this).next();
    jQuery('.main-navigation .sub-menu').not(thisMenu).removeClass('sub-menu-open');
    thisMenu.toggleClass('sub-menu-open');
  });
}


function mobileSlider() {
  if (self.innerWidth) {
    x = self.innerWidth;
  } else if (document.body) {
      x = 600;
  }

  if (x < 601) {
    jQuery('.slick-mobile').slick({
      slidesToShow: 4,
      infinite: false,
      responsive: [
        {
          breakpoint: 640,
          settings: {
            arrows: false,
            slidesToShow: 1
          }
        }
      ]
    });
  }

}

function mobileSearchOpen() {
  jQuery('.header-search-mobile').on('click', function() {
    jQuery('.main-search').fadeToggle();
  });
}

function tabs() {
  const navItem = jQuery('.tabNav a');
  
  navItem.on('click', function() {
    const $this = jQuery(this);
    const tabId = $this.data('id');
    
    navItem.not(this).removeClass('active');
    $this.addClass('active');

    jQuery('.tabs .tab').hide();
    jQuery(`#${tabId}`).fadeIn();

  });
}

function popup() {
  jQuery('.popup-open').on('click', function() {
    jQuery('.popup, .popup-back').fadeIn();
  });

  jQuery('.popup-back, .popup-close').on('click', function() {
    jQuery('.popup, .popup-back').fadeOut();
  });

  document.addEventListener( 'wpcf7mailsent', function( event ) {
    setTimeout(function() {
      jQuery('.popup, .popup-back').fadeOut();
    }, 2000);
  }, false );
}

function shortenTextList() {

  function shortenText(text, maxLength) {
    if (text.length <= maxLength) {
      return text;
    }
  
    var shortenedText = text.substr(0, maxLength - 3) + "...";
    return shortenedText;
  }
  
  var elements = jQuery('.post-type-item .post-type-item-desc p');
  var maxLength = 120;
  
  elements.each(function() {
    var originalText = jQuery(this).text();
    var shortenedText = shortenText(originalText, maxLength);
    jQuery(this).text(shortenedText);
  });

  var elements2 = jQuery('.drug-item .drug-item-desc p');
  var maxLength = 100;

  elements2.each(function() {
    var originalText = jQuery(this).text();
    var shortenedText = shortenText(originalText, maxLength);
    jQuery(this).text(shortenedText);
  });
  

}

function mobileCategorySearch() {
  jQuery('.mobile-search-icon').on('click', function() {
    jQuery('.page-header-filter-search').slideToggle();
  });
}

function homeSlick() {
  jQuery('.home-slick').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true
  })
}

function fullSliderSlick() {

  jQuery('.full-slider-slick').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    //variableWidth: true,
    //adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
  ]
  })


}

function postSlick() {
  const postSlick = jQuery('.post-slick');
  const slickLeft = jQuery('.related-posts-nav-left')
  const slickRight =  jQuery('.related-posts-nav-right')

  const status = jQuery('.pagingInfoRelated');

  postSlick.slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: true,
      dots: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: true
          }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
          }
        },
      ]
  });

}


jQuery(document).ready(function($) {
  formLink();
  formFunction();
  console.log('test');
});

jQuery(window).on('pageshow', formFunction);


function formFunction() {
  function checkInputValue($input) {
      const $label = $input.closest('._form_element').find('._form-label');
      if ($input.val().trim() !== '') {
          $label.addClass('active');
      } else {
          $label.removeClass('active');
      }
  }

  jQuery('input[type="text"]').focus(function(){
      const $this = jQuery(this);
      $this.closest('._form_element').find('._form-label').addClass('active');
  });

  jQuery('input[type="text"]').blur(function() {
      const $this = jQuery(this);
      checkInputValue($this);
  });

  jQuery('input[type="text"]').each(function() {
      checkInputValue(jQuery(this));
  });
}

function formLink() {
  jQuery('._checkbox-radio label').on('click', function(e) {
      e.preventDefault(); 
      window.open('https://grouglobal.com/privacy-policy/', '_blank'); 
  });
}


jQuery(function($){
  $('#filter').submit(function(){
      var filter = $('#filter');
      $.ajax({
          url:filter.attr('action'),
          data:filter.serialize(), // form data
          type:filter.attr('method'), // POST
          success:function(data){
              $('.blog-articles-list').html(data);
          }
      });
      return false;
  });
});

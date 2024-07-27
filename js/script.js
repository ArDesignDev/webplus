var string = "Hi! I am Aljoša and I will turn your ideas into an awesome website.";
var array = string.split("");
var timer;

jQuery(document).ready(function($) {
    particles();
    navOnScroll();
    mobileMenu();
    activeNavOnScroll();
    smoothScroll();
    //setTimeout(frameLooper, 1700);
    animationShow();
    effectOnLoad();
    projectFilter();
    if (window.innerWidth > 640) { courserEffect();}

    onScrollEffects();


  
});

jQuery('.section-title').each(function() {
  var words = jQuery(this).text().split(' ');
  var html = '';
  for (var i = 0; i < words.length; i++) {
    html += '<span>' + words[i] + '</span>';
    if (i < words.length - 1) {
      html += ' '; // Add space between words
    }
  }
  jQuery(this).html(html);
});

jQuery(window).scroll(function($){
    navOnScroll();
    activeNavOnScroll();
    onScrollEffects();
});

function checkWindowSize() {
  if (window.innerWidth < 640) {
      document.getElementById('link1').setAttribute('href', '#service');
      document.getElementById('link2').setAttribute('href', '#service');
  } else {
      document.getElementById('link1').setAttribute('href', '#intro');
      document.getElementById('link2').setAttribute('href', '#intro');
  }
}

document.addEventListener("DOMContentLoaded", function() {
  checkWindowSize(); // Check initial window size
});

window.addEventListener('resize', function() {
  checkWindowSize(); // Check window size on resize
});

function projectFilter() {
  //const ajaxurl = 'http://localhost/webplus/wp-admin/admin-ajax.php'; // local
  const ajaxurl = 'https://webplussolution.com/wp-admin/admin-ajax.php'; // live

  jQuery('#category-filter li').on('click', function() {
    // Remove active class from all list items
    jQuery('#category-filter li').removeClass('active');

    // Add active class to the clicked list item
    jQuery(this).addClass('active');

    var category = jQuery(this).data('cat-id');

    // Check if the clicked category is 'All' (assumes data-cat-id="" for 'All')
    if (category === "") {
        jQuery('#posts-container').removeClass('category-selected');
        jQuery('#load-more').show();  // Ensure Load More is visible when 'All' is selected
        loadPosts(category, 1);  // Always load from the first page for 'All'
        jQuery('#load-more').data('page', 1);  // Reset the Load More button's data-page attribute
    } else {
        jQuery('#posts-container').addClass('category-selected');
        jQuery('#load-more').hide();  // Hide Load More when a specific category is selected
        loadPosts(category, 1);  // Always load from the first page for categories
    }
  });

  function loadPosts(category, page) {
    jQuery.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'filter_posts_by_category',
        cat: category,
        page: page
      },
      beforeSend: function() {
        jQuery('#posts-container').html('<p class="post-loading"><span class="loader"></span></p>'); // Display a loading message
      },
      success: function(response) {
        jQuery('#posts-container').html(response);
        jQuery('.project-section-item').hide();

        // Fade in each .project-section-item one by one with a delay
        jQuery('.project-section-item').each(function(i) {
          jQuery(this).delay(i * 300).fadeIn(600);
        });
      }
    });
  }

  jQuery(document).on('click', '#load-more', function() {
    var category = jQuery('#category-filter li.active').data('cat-id') || '';
    var nextPage = parseInt(jQuery(this).data('page'), 10) + 1; // Increment the page number

    jQuery.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'filter_posts_by_category',
        cat: category,
        page: nextPage
      },
      beforeSend: function() {
        jQuery('#load-more').text('Loading...');
      },
      success: function(response) {
        if (response) {
          var newItems = jQuery('<div/>').html(response).find('.project-section-item').hide();
          jQuery('#posts-container').append(newItems);
          newItems.each(function(i) {
            jQuery(this).delay(i * 300).fadeIn(600);
          });

          // Update 'Load More' button
          jQuery('#load-more').text('Load More').data('page', nextPage);
        } else {
          jQuery('#load-more').remove(); // Remove the button if no more posts to load
        }
      }
    });
  });
}


function onScrollEffects() {
  const wScroll = jQuery(this).scrollTop();
  const intro = jQuery('.intro-section').offset().top - 400;
  const about = jQuery('.service-section').offset().top - 600;
  const projects = jQuery('.project-section').offset().top - 500;
  const aboutMe = jQuery('.about-section').offset().top - 500;
  const contact = jQuery('.contact-section').offset().top - 500;

  if(wScroll>intro) {

    setTimeout(function() {

      jQuery('.intro-section h2 span').each(function(i){
        setTimeout(function(){
          jQuery('.intro-section h2 span').eq(i).addClass('scrolled');
        }, 120 * (i+1));
      });

    }, 300);

  }

  if(wScroll>about) {

    setTimeout(function() {

      jQuery('.service-section .section-title span').each(function(i){
        setTimeout(function(){
          jQuery('.service-section .section-title span').eq(i).addClass('scrolled');
        }, 140 * (i+1));
      });

      setTimeout(function() {
        jQuery('.service-section .service-section-items li').each(function(i){
          setTimeout(function(){
            jQuery('.service-section .service-section-items li').eq(i).addClass('scrolled');
          }, 400 * (i+1));
        });
      }, 2100);

    }, 300);

  }

  if(wScroll>projects) {
    setTimeout(function() {

      jQuery('.project-section .section-title span').each(function(i){
        setTimeout(function(){
          jQuery('.project-section .section-title span').eq(i).addClass('scrolled');
        }, 140 * (i+1));
      });

      setTimeout(function() {
        jQuery('.project-section .category-filter li').each(function(i){
          setTimeout(function(){
            jQuery('.project-section .category-filter li').eq(i).addClass('scrolled');
          }, 150 * (i+1));
        });
      }, 1400);

      setTimeout(function() {

        jQuery('.project-section .project-section-item').each(function(i){
          setTimeout(function(){
            jQuery('.project-section .project-section-item').eq(i).fadeIn(600);
          }, 350 * (i+1));
        });

        setTimeout(function() {
          jQuery('.btn-load-more').addClass('scrolled');
        }, 2000);


      }, 1600);

    }, 300);

    
  }

  if(wScroll>aboutMe) {
    setTimeout(function() {
      jQuery('.about-section h2').addClass('scrolled');
      jQuery('.about-section .about-section-img').addClass('scrolled');

      setTimeout(function() {
        jQuery('.about-section .about-text').addClass('scrolled');
      }, 150);

      setTimeout(function() {
        jQuery('.about-section .btn').addClass('scrolled');
      }, 300);


    }, 300);
  }

  if(wScroll>contact) {
    setTimeout(function() {

      jQuery('.contact-section .section-title span').each(function(i){
        setTimeout(function(){
          jQuery('.contact-section .section-title span').eq(i).addClass('scrolled');
        }, 140 * (i+1));
      });

      setTimeout(function() {
        jQuery('.contact-section .section-text').addClass('scrolled');
      }, 150);

      setTimeout(function() {
        jQuery('.contact-section .contact-section-form').addClass('scrolled');
      }, 3600);

    }, 300);
  }

 
}

function effectOnLoad() {

  // load effect
  setTimeout(function() {
    jQuery('.loader').fadeOut(1000);
  }, 700);

  setTimeout(function() {
    jQuery('.overlay').fadeOut(1000);
  }, 1700);

  // header text
  setTimeout(function() {

    jQuery('.main-header-text h1 span').each(function(i){
      setTimeout(function(){
        jQuery('.main-header-text h1 span').eq(i).addClass('scrolled');
      }, 180 * (i+1));
    });

  }, 2100);

    let repeatCount = 0;
    const maxRepeats = 2;
    const repeatInterval = 8400;

    setTimeout(function() {
        const intervalId = setInterval(function() {
            textEffect();

            repeatCount++;
            if (repeatCount >= maxRepeats) {
                clearInterval(intervalId);
                setTimeout(finalEffect, repeatInterval); // Ensure the final effect runs after the last interval
            }
        }, repeatInterval);

        // Start the first animation immediately
        textEffect();
        repeatCount++;
    }, 3000);

    function textEffect() {
        jQuery('.main-header-text .first-text span').each(function(i){
            setTimeout(function(){
                jQuery('.main-header-text .first-text span').eq(i).addClass('scrolled');
            }, 140 * (i+1));
        });

        setTimeout(function() {
            jQuery('.main-header-text .first-text span').each(function(i){
                setTimeout(function(){
                    jQuery('.main-header-text .first-text span').eq(i).removeClass('scrolled');
                }, 140 * (i+1));
            });
        }, 2800);

        setTimeout(function() {
            jQuery('.main-header-text .second-text span').each(function(i){
                setTimeout(function(){
                    jQuery('.main-header-text .second-text span').eq(i).addClass('scrolled');
                }, 180 * (i+1));
            });
        }, 3800);

        setTimeout(function() {
            jQuery('.main-header-text .second-text span').each(function(i){
                setTimeout(function(){
                    jQuery('.main-header-text .second-text span').eq(i).removeClass('scrolled');
                }, 180 * (i+1));
            });
        }, 7600);
    }

    function finalEffect() {
        jQuery('.main-header-text .first-text span').each(function(i){
            setTimeout(function(){
                jQuery('.main-header-text .first-text span').eq(i).addClass('scrolled');
            }, 140 * (i+1));
        });
    }


    // cookie banner show
    setTimeout(function() {
      jQuery('.cky-consent-container').addClass('cookie-show');
    }, 5000);


}

function navOnScroll() {
  var mainNav = jQuery('.main-nav');
  const scrollIcon = jQuery('.social-header');
  var scrollPosition = jQuery(window).scrollTop();
  
  if (scrollPosition > 50) {
    mainNav.fadeIn();
    scrollIcon.fadeOut();
  } else {
    mainNav.fadeOut();
    scrollIcon.fadeIn();
  }

  
}

jQuery(window).scroll(function() {
  var scrollTop = jQuery(window).scrollTop();
  jQuery('.main-header-inner img').css('transform', 'translateY(-' + scrollTop / 2 + 'px)');
  /*
  if (jQuery(window).width() > 640) {
    jQuery('#textWrite2').css('transform', 'translateX(' + scrollTop / 2 + 'px)');
  }
*/
});

function mobileMenu() {
  jQuery('.site-header__menu-icon').on('click', function() {
    jQuery('.main-nav ul').toggle();
    jQuery('.site-header__menu-icon').toggleClass('site-header__menu-icon--close-x');
  });

  if (jQuery(window).width() < 860) {
    jQuery('.main-nav ul li a').on('click', function(){
      jQuery('.main-nav ul').hide();
      jQuery('.site-header__menu-icon').toggleClass('site-header__menu-icon--close-x');
    });
  }
}

function activeNavOnScroll() {
  var scrollDistance = jQuery(window).scrollTop();
  var wScroll = jQuery(this).scrollTop();

  jQuery('.section-active').each(function(i) {
      if (jQuery(this).position().top-270 <= scrollDistance) {
          jQuery('.main-nav ul li a.active-nav').removeClass('active-nav');
          jQuery('.main-nav ul li a').eq(i).addClass('active-nav');
      }
  });
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

function frameLooper() {
  if (array.length > 0) {
    document.getElementById("textWrite").innerHTML += array.shift();
  } else {
    clearTimeout(timer);
    // Use setTimeout to append the link after a 500ms delay
    setTimeout(function() {
      document.getElementById("textWrite").innerHTML += ' <a href="#service">Click to start!</a>';
    }, 500); // 500ms = 0.5 seconds
    return; // Stop the function from calling itself again
  }
  loopTimer = setTimeout(frameLooper, 50); // Use the function reference directly
}

function particles() {
  particlesJS("particles-js", {
    particles: {
      number: { value: 300, density: { enable: true, value_area: 2400 } },
      color: { value: "#ffffff" },
      shape: {
        type: "circle",
        stroke: { width: 0, color: "#000000" },
        polygon: { nb_sides: 5 },
        image: { src: "img/github.svg", width: 100, height: 100 }
      },
      opacity: {
        value: 0.5,
        random: false,
        anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false }
      },
      size: {
        value: 3,
        random: true,
        anim: { enable: false, speed: 20, size_min: 0.1, sync: false }
      },
      line_linked: {
        enable: true,
        distance: 150,
        color: "#2fc0cc",
        opacity: 0.3,
        width: 1
      },
      move: {
        enable: true,
        speed: 1.5,
        direction: "none",
        random: false,
        straight: false,
        out_mode: "out",
        bounce: false,
        attract: { enable: false, rotateX: 600, rotateY: 1200 }
      }
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: { enable: false, mode: "repulse" },
        onclick: { enable: true, mode: "push" },
        resize: true
      },
      modes: {
        grab: { distance: 400, line_linked: { opacity: 1 } },
        bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
        repulse: { distance: 200, duration: 0.4 },
        push: { particles_nb: 4 },
        remove: { particles_nb: 2 }
      }
    },
    retina_detect: true
  });
  
}

function animationShow() {
  jQuery('.service-section-items li .service-section-more').on('click', function() {
    var $this = jQuery(this);
    var parent = $this.closest('.service-section-items li');
    var desc = parent.find('.services-desc');
    var btns = parent.find('.service-all');

    jQuery('.service-section-items li').not(parent).removeClass('active');
    parent.addClass('active');

    jQuery('.services-desc').not(desc).removeClass('active');
    jQuery('.service-all').not(btns).removeClass('active');

    if (jQuery(window).width() <= 640) {
       desc.addClass('active');
    }

    setTimeout(function() {
      if (jQuery(window).width() > 640) {
        desc.addClass('active');
      }
      btns.addClass('active');
    }, 100);


  });

}

function courserEffect() {
  const cursor = document.querySelector("#cursor");
  const cursorBorder = document.querySelector("#cursor-border");
  const cursorPos = { x: 0, y: 0 };
  const cursorBorderPos = { x: 0, y: 0 };

  document.addEventListener("mousemove", (e) => {
    cursorPos.x = e.clientX;
    cursorPos.y = e.clientY;

    cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
  });

  requestAnimationFrame(function loop() {
    const easing = 8;
    cursorBorderPos.x += (cursorPos.x - cursorBorderPos.x) / easing;
    cursorBorderPos.y += (cursorPos.y - cursorBorderPos.y) / easing;

    cursorBorder.style.transform = `translate(${cursorBorderPos.x}px, ${cursorBorderPos.y}px)`;
    requestAnimationFrame(loop);
  });

  // Select all <a> link elements and add event listeners for mouseover and mouseout
  document.querySelectorAll("a").forEach((link) => {
    link.addEventListener("mouseover", (e) => {
      cursorBorder.style.backgroundColor = "rgba(0, 255, 255, 0)";
      //cursorBorder.style.mixBlendMode = "difference";
      cursorBorder.style.setProperty("--size", "40px");
    });

    link.addEventListener("mouseout", (e) => {
      cursorBorder.style.backgroundColor = "unset";
      cursorBorder.style.mixBlendMode = "unset";
      cursorBorder.style.setProperty("--size", "20px");
    });
  });

  // Select all .hero-text elements and add event listeners for mouseover and mouseout
  document.querySelectorAll(".main-header-text").forEach((div) => {
    div.addEventListener("mouseover", (e) => {
      cursorBorder.style.backgroundColor = "#2fc0cc";
      cursorBorder.style.setProperty("--size", "60px");
      cursorBorder.textContent = "Click to start";
      cursorBorder.style.display = "flex";
      cursorBorder.style.alignItems = "center";
      cursorBorder.style.justifyContent = "center";
      cursorBorder.style.color = "#fff";
      cursorBorder.style.fontSize = "12px";
      cursorBorder.style.textAlign = "center";
      cursorBorder.style.fontWeight = "bold";
    });

    div.addEventListener("mouseout", (e) => {
      cursorBorder.style.backgroundColor = "unset";
      cursorBorder.style.setProperty("--size", "20px");
      cursorBorder.textContent = "";
      cursorBorder.style.display = "block";
      cursorBorder.style.color = "unset";
    });
  });
}


/*
$(document).ready(function() {
  let introSection = $('.intro-section');
  let serviceSection = $('.service-section');

  let isAnimating = false; // Flag to prevent multiple animations
  let introScrollCounter = 0; // Counter for scroll events in intro section

  $(window).on('wheel', function(event) {
      if (isAnimating) return; // Prevent further scroll events during animation

      let scrollTop = $(window).scrollTop();
      let introTop = introSection.offset().top;
      let serviceTop = serviceSection.offset().top;

      // Scroll from intro-section to service-section after 3 scroll events
      if (scrollTop >= introTop && scrollTop < serviceTop) {
          if (event.originalEvent.deltaY > 0) {
              introScrollCounter++;
              if (introScrollCounter >= 0) { // Check if scroll event counter is reached
                  isAnimating = true;
                  $('html, body').animate({
                      scrollTop: serviceTop
                  }, 500, function() {
                      isAnimating = false;
                      introScrollCounter = 0; // Reset scroll counter
                  });
                  return false; // Prevent default scroll behavior when scrolling down
              }
          } else {
              introScrollCounter = 0; // Reset scroll counter if scrolling up
          }
      }
  });
});*/

$(document).ready(function() {
  function blockScroll(event) {
      let scrollTop = $(window).scrollTop();

      // Disable scroll when at the very top of the page
      if (scrollTop === 0) {
          event.preventDefault(); // Prevent default scroll behavior
      } else {
          // Remove the event listener once the user scrolls down
          window.removeEventListener('wheel', blockScroll, { passive: false });
      }
  }

  window.addEventListener('wheel', blockScroll, { passive: false }); // Set passive to false to allow preventDefault
});


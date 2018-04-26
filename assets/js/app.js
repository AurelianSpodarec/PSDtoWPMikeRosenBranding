const css = require('../scss/app.scss');

var body = document.querySelector('body');
 

 

 


document.addEventListener('DOMContentLoaded', function() {

  // transitionend event stuff
var transitions = {
    'transition': 'transitionend',
    'OTransition': 'oTransitionEnd',
    'MozTransition': 'transitionend',
    'WebkitTransition': 'webkitTransitionEnd'
};
var transitionEvent = 'NO_TRANSITION_EVENT';
var _elem = document.createElement('div');
var __t = null;

for (__t in transitions)
    if (_elem.style[__t] !== undefined)
        transitionEvent = transitions[__t];

if (transitionEvent == 'NO_TRANSITION_EVENT') {
    var transEvent = document.createEvent('Event');
    transEvent.initEvent(transitionEvent, true, false);
}

// helper mixins

function asNodeList() {
    this.forEach = function(cb) {
        [].forEach.call(this, cb);
    };
    this.css = function(cssObj) {
        this.forEach(function(node) {
            for (var style in cssObj) node.style[style] = cssObj[style];
        });
    };
    return this;
}

// Carousel stuff

var carousels = asNodeList.call(document.querySelectorAll('[data-carousel]'));

carousels.forEach(function(elem) {
    var current = 0;
    var carouselSlide = elem.querySelector('.Carousel-Slide');
    var carouselSlideItems = asNodeList.call(
        carouselSlide.querySelectorAll('.Carousel-Slide-item')
    );

    carouselSlide.style.width = (carouselSlideItems.length * 100) + '%';
    carouselSlideItems.css({
        width: (100 / carouselSlideItems.length) + '%'
    });
    carouselSlideItems.forEach(function(item) {
        item.style.backgroundImage = item.getAttribute('data-background');
    });

    elem.querySelector('.Carousel-Controller-Nav-left')
        .addEventListener('click', function(e) {
            current--;
            slide(current);
        });
    elem.querySelector('.Carousel-Controller-Nav-right')
        .addEventListener('click', function(e) {
            current++;
            slide(current);
        });

    elem.addEventListener(transitionEvent, (function() {
        var completedElem = document.getElementById('completed');
        return function(e) {
            completedElem.style.display = 'block';
            setTimeout(function() {
                completedElem.style.display = 'none';
            }, 100);
        }
    })());

    function slide(place) {
        if (current < 0) current = carouselSlideItems.length - 1;
        else if (current >= carouselSlideItems.length) current = 0;
        carouselSlide.style.left = -(current * 100) + '%';

        if (transitionEvent == 'NO_TRANSITION_EVENT')
            elem.dispatchEvent(transEvent);
    }

    function automate() {
        current++;
        slide();
    }

    setInterval(automate, 4000);
});











  var intervalId = 0;
  var scrollButton = document.querySelector('.arrow-up');

  function scrollStep() {
      if (window.pageYOffset === 0) {
          clearInterval(intervalId);
      }
      window.scroll(0, window.pageYOffset - 50);
  }

  function scrollToTop() {
      intervalId = setInterval(scrollStep, 4.66);
  }

  scrollButton.addEventListener('click', scrollToTop);



  
  // MAIN NAVIGATION MENU TOGGLE
  var siteNav = document.querySelector(".site-nav");
  var siteHamburger = document.querySelector(".site-header__hamburger");

  function toggleMainMenu() {   
    siteNav.classList.toggle("is-active");
    siteHamburger.classList.toggle("is-active");
  }

  siteHamburger.addEventListener('click', toggleMainMenu, false);








var siteHeader = document.querySelector('.site-header'),
      siteHeaderHeight = siteHeader.offsetHeight,
      prevScroll = 0;

document.querySelector('body').style.paddingTop = siteHeaderHeight + "px";
  
  function stickyNav(e) {
    if(siteNav.classList.contains("is-active")) {
          return;
      }
    if (window.scrollY >= siteHeaderHeight) {
      siteHeader.classList.add('is-sticky');
    } else{
          siteHeader.classList.remove('is-sticky');
      }
  }

  function showNav(e) {

    if(siteNav.classList.contains("is-active")) {
          return;
      }
    var currentScroll = window.pageYOffset;

    if(currentScroll < prevScroll) {
      siteHeader.classList.add('sticky-show');
    } else {
      siteHeader.classList.remove('sticky-show');
    }
    
      prevScroll = currentScroll;
  }

  window.addEventListener('scroll', showNav);
  window.addEventListener('scroll', stickyNav);









});


window.onload = function() {









/*
 * Replace all SVG images with inline SVG
 */
document.querySelectorAll('img.svg').forEach(function(img){
    var imgID = img.id;
    var imgClass = img.className;
    var imgURL = img.src;

    fetch(imgURL).then(function(response) {
        return response.text();
    }).then(function(text){

        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(text, "text/xml");

        // Get the SVG tag, ignore the rest
        var svg = xmlDoc.getElementsByTagName('svg')[0];

        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
            svg.setAttribute('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
            svg.setAttribute('class', imgClass+' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        svg.removeAttribute('xmlns:a');

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
        if(!svg.getAttribute('viewBox') && svg.getAttribute('height') && svg.getAttribute('width')) {
            svg.setAttribute('viewBox', '0 0 ' + svg.getAttribute('height') + ' ' + svg.getAttribute('width'))
        }

        // Replace image with new SVG
        img.parentNode.replaceChild(svg, img);

    });

});









}
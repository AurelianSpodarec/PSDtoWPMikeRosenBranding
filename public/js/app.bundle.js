/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

const css = __webpack_require__(1);

var body = document.querySelector('body');

window.addEventListener('load', function(){
  body.classList.add('-loaded');
})

window.onload = function() {

 	


// function parallaxEffect() {
// 	var scroll = window.pageYOffset; 
// 	parallax.style.transform = 'translate3d(0, ' + scroll * .2 +'px,0)';
// }
  
// window.addEventListener('scroll', parallaxEffect);
  
	var parallax = document.getElementsByClassName('js-parallax')[0];
	var xScrollPosition;
    var yScrollPosition;

 	function setTranslate(xPos, yPos, el) {
        el.style.transform = "translate3d(" + xPos + ", " + yPos + "px, 0)";
    }
   
    function scrollLoop() {
        xScrollPosition = window.scrollX;
        yScrollPosition = window.scrollY;
 
        setTranslate(0, yScrollPosition * -0.2, parallax);

    }
 	window.addEventListener("scroll", scrollLoop, false);



  var parallax = document.getElementsByClassName('js-parallax');
  var xScrollPosition;
  var yScrollPosition;

 	function setTranslate(xPos, yPos, el) {
        el.style.transform = "translate3d(" + xPos + ", " + yPos + "px, 0)";
    }
   
 
	function scrollLoop() {
    	xScrollPosition = window.scrollX;
     	yScrollPosition = window.scrollY;
        document.querySelectorAll('.js-parallax').forEach(function (parallax) {
          return setTranslate(0, scrollY * parallax.dataset.parallaxSpeed, parallax);
        });
    
 	}
 	window.addEventListener("scroll", scrollLoop, false);




  	//TABS

	// Variables 	
  // var tabLinks = document.querySelectorAll('.services-tab__link-item');
  // var tabContents = document.querySelectorAll('.services-tab__tab-item');

  // // Loop through the tab link
  // for (var i = 0; i < tabLinks.length; i++) {
  //   tabLinks[i].addEventListener('click', function(e) {
  //     var id = this.hash.replace('#', '');

  //     // Loop through the tab content
  //     for (var j = 0; j < tabContents.length; j++) {
		// var tabContent = tabContents[j];
  //       tabContent.classList.remove('is-visible');
  //       tabLinks[j].classList.remove('is-active');
  //       if (tabContent.id === id) {
  //         tabContent.classList.add('is-visible');
  //       }
  //     }
			
  //     this.classList.add('is-active');
  //   });
  // }





	// MAIN NAVIGATION MENU TOGGLE
	var siteNav = document.querySelector(".site-nav"),
		siteHamburger = document.querySelector(".site-header__toggle-button"),
		overlayDiv	= document.createElement('div'),
		menuOverlay = document.createElement('div');
		menuOverlay.className = 'overlay';

	 function openMenu() {
        siteNav.classList.add('is-active');
        siteHamburger.classList.add('is-active');
        document.body.appendChild(menuOverlay);
    }

    function closeMenu() {
        document.body.removeChild(menuOverlay);
        siteNav.classList.remove("is-active");
        siteHamburger.classList.remove("is-active");
    }

    function toggle() {

	    if(siteNav.classList.contains("is-active")) {
	        return closeMenu();
	    }

	    return openMenu();
	}

	siteHamburger.addEventListener('click', toggle, false);
	menuOverlay.addEventListener('click', closeMenu, false);


	// MAIN NAVIGATION STICKY
	var siteHeader = document.querySelector('.site-header'),
	    siteHeaderHeight = siteHeader.offsetHeight,
	    prevScroll = 0;
	
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

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);
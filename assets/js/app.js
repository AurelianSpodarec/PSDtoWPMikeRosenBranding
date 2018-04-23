const css = require('../scss/app.scss');

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
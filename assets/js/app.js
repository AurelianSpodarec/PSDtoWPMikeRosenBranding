const css = require('../scss/app.scss');

var body = document.querySelector('body');
 

 

 


document.addEventListener('DOMContentLoaded', function() {

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
require('../sass/main.scss');
require('../js/modernizr-custom');
const $ = require('admin-lte/bower_components/jquery/dist/jquery.min');
const jQuery = $;
const boostrap = require('admin-lte/bower_components/bootstrap/dist/js/bootstrap.min');
require('admin-lte/dist/js/adminlte.js');

window.$ = $;
window.jQuery = $;

(function($) {
    'use strict';
    // Main Navigation
    $( '.menu-mobile' ).on( 'click', function() {
        $(this).toggleClass('close');
        $('.oLogo').toggleClass('hide');
        $('.navBar').toggleClass('show');
        $('.oHeader').toggleClass('no-shadow');
    });
	//console.log('hello');
	
})(jQuery);


jQuery(document).ready(function($){
  // Defining a function to fullscreen size for #header 
	function fullscreen(){
		jQuery('#home').css({
			width: jQuery(window).width(),
			height: jQuery(window).height(),
		});
	}
	fullscreen();
	
	
   // Run the function in case of window resize
   jQuery(window).resize(function() {
        fullscreen();         
     });
});

$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
    });
});

$(document).ready(function(){
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			$('.back-to-top').fadeIn('slow');
			$('#home').addClass('header-fixed');
		} else {
			$('.back-to-top').fadeOut('slow');
			$('#home').removeClass('header-fixed');
		}
	});
	$('.back-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
		return false;
	});
});


// Anim scrolling
$(document).ready(function(){

	jQuery('.post').addClass("hidden").viewportChecker({
		classToAdd: 'visible animated fadeIn', // Class to add to the elements when they are visible
		offset: 100
	});
});	
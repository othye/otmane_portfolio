require('../sass/main.scss');
require('../js/modernizr-custom');

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
		jQuery('#header').css({
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





/*eslint-env jquery*/
/* global, ga, google */

/*
	Responsive Screen detect ver 2.0
	andrewfairlie.net
*/
(function ($) {

	var defaults = {
		isXS : false,
		isSM : false,
		isMD : false,
		isLG : false
	};

	$.fn.responsive = function(options) {
		var	settings = $.extend({}, defaults, options || {});

		settings.isXS = $.fn.xsDetect();
		settings.isSM = $.fn.smDetect();
		settings.isMD = $.fn.mdDetect();
		settings.isLG = $.fn.lgDetect();

		if( settings.isXS ) {
			console.log('Is a XS screen');
		} else if ( settings.isSM ) {
			console.log('Is a SM screen');
		} else if ( settings.isMD ) {
			console.log('Is a MD screen');
		} else if ( settings.isLG) {
			console.log('Is a LG screen');
		}

		// Store settings on window object
		$(window).data('responsive', settings);
		// console.log( $(window).data('responsive') );
	};

	$(window).resize($.fn.responsive);

	$.fn.xsDetect = function() {
		if (jQuery('#RESPONSIVE_XS').css('display') === 'block' ) {
			return true;
		} else {
			return false;
		}
	};

	$.fn.smDetect = function() {
		if (jQuery('#RESPONSIVE_SM').css('display') === 'block') {
			return true;
		} else {
			return false;
		}
	};

	$.fn.mdDetect = function() {
		if (jQuery('#RESPONSIVE_MD').css('display') === 'block') {
			return true;
		} else {
			return false;
		}
	};

	$.fn.lgDetect = function() {
		if (jQuery('#RESPONSIVE_LG').css('display') === 'block' ) {
			return true;
		} else {
			return false;
		}
	};

	$.fn.defaults = defaults;

}(window.jQuery));

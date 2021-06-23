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
			console.log('Is a extra Small screen');
		} else if ( settings.isSM ) {
			console.log('Is a Small screen');
		} else if ( settings.isMD ) {
			console.log('Is a Medium screen');
		} else if ( settings.isLG) {
			console.log('Is a Large screen');
		}

		// Store settings on window object
		$(window).data('responsive', settings);
		// console.log( $(window).data('responsive') );
	};

	$(window).resize($.fn.responsive);

	$.fn.xsDetect = function() {
		if (jQuery('.d-xs-block').css('display') === 'block' ) return true;
	};

	$.fn.smDetect = function() {
		if (jQuery('.d-sm-block').css('display') === 'block') return true;
	};

	$.fn.mdDetect = function() {
		if (jQuery('.d-md-block').css('display') === 'block') return true;
	};

	$.fn.lgDetect = function() {
		if (jQuery('.d-lg-block').css('display') === 'block' ) return true;
	};

	$.fn.defaults = defaults;

}(window.jQuery));

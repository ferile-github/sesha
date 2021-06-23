/* eslint-disable no-undef */
/*eslint-env jquery*/

const SB = {
	cache : {},
	updateCache : ($) => {
		SB.cache = {
			body: 		$('body'),
			navigation: $('#site-navigation'),
			header:		$('#site-header'),
			sidebar:	$('#site-sidebar'),
			filters:	$('#site-filters'),
			minicart: 	$('#site-minicart'),
			content: 	$('#site-content'),
			contentWrapper: 	$('#site-content-wrapper'),
			footer: 	$('#site-footer'),
			searchForm:	$('#site-header .search__form'),
			preview : 		$('#woocommerce-product-preview'),
			previewMobile : $('#woocommerce-product-preview-mobile'),
			previewThumbs : $('#woocommerce-product-thumbnails'),
			pdpSummary : 	$('#summary'),
			sizeGuideBtn : 	$('#btn-size-guide'),
			sizeGuideModal : $('#modal-size-guide'),
			faq : $('#site-faq')
		};
	},
	init : ($) => {
		'use strict';

		SB.updateCache($);

		// Store Responsive Screen Sizes
		// ------------------------------------------------------------------
		const RESPONSIVE = $(window).data('responsive');


		// Remove animation class on content wrapper
		// ------------------------------------------------------------------
		// This resolves issues around the Bootstrap Modal z-index not being honoured
		setTimeout( () => {
			SB.cache.contentWrapper.removeClass('fadeIn').removeClass('animated');
		}, 1000)

		// Window scroll - navbar animation
		// ------------------------------------------------------------------
		$(window).on('scroll', () => {
			var scrollposition = $(window).scrollTop();

			if (scrollposition > 400) {
				SB.cache.body.addClass('has-reduced-menu');
			} else {
				SB.cache.body.removeClass('has-reduced-menu');
			}
		});


		// Window scroll to a anchor
		// ------------------------------------------------------------------
		// SB.cache.body.on('click', 'a[href^="#"]', function (event) {
		// 	var target = $(this)[0].hash;

		// 	if (target && location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
		// 		// console.log('The Pathname: ' + location.pathname, ', This pathname: ' + this.pathname, ', The Hostname : ' + location.hostname);
		// 		event.preventDefault();
		// 		$('html, body').animate({
		// 			scrollTop: $(target).offset().top
		// 		}, 500);

		// 	// SB.cache.body.toggleClass('has-navigation-active');
		// 	}
		// });


		// Slideshows
		// ------------------------------------------------------------------

		$('.js-slideshow').slick({
			'infinite': true,
			'draggable': true,
			'dots' : true,
			'appendDots': $('.slideshow__pagination'),
			'slidesToShow': 1,
			'autoplay': false,
			'nextArrow': '<button aria-label="Next slide" class="slick-arrow slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
			'prevArrow': '<button aria-label="Previous slide" class="slick-arrow slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>'
		});


		$('.js-product-slideshow').slick({
			'infinite': true,
			'draggable': true,
			'slidesToShow': 3,
			'slidesToScroll': 3,
			'dots': false,
			'autoplay': false,
			'nextArrow': '<button aria-label="Next slide" class="slick-arrow slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
			'prevArrow': '<button aria-label="Previous slide" class="slick-arrow slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
			'responsive': [{
				'breakpoint': 700,
				'settings': {
					'slidesToShow': 1,
					'slidesToScroll': 1
				}
			}]
		});

		$('.js-images-slideshow').slick({
			'infinite': true,
			'draggable': true,
			'dots' : false,
			'arrows' : false,
			'fade': true,
			'slidesToShow': 1,
			'lazyLoad': 'ondemand',
			'speed': 500,
			'autoplaySpeed': 2500,
			'autoplay': true,
		});

		// Google Analytics Tracking Event
		// ------------------------------------------------------------------
		$('[data-ga-category]').on('click', (event) => {
			const $el = $(event.currentTarget),
				data = $el.data();

			let tracking = {};

			// Category and Action are mandatory events. Some error handling for when these are not provided
			if (data.gaCategory) {
				tracking.eventCategory = data.gaCategory;
			} else {
				tracking.eventCategory = 'Event Category';
			}
			if (data.gaAction) {
				tracking.eventAction = data.gaAction;
			} else {
				tracking.eventAction = 'Event Action';
			}
			// Some optional event labels
			if (data.gaLabel) {
				tracking.eventLabel = data.gaLabel;
			}
			// Optional numeric value. Has to be a number
			if (data.gaValue && $.isNumeric(data.gaValue)) {
				tracking.eventValue = data.gaValue;
			}

			// console.log(tracking);
			ga('send', 'event', tracking);

		});


		// Overlays
		// ------------------------------------------------------------------
		$('.overlay__mobile-menu').on('click', () => {
			SB.cache.body.toggleClass('has-navigation-active');
		});
		$('.overlay__search').on('click', () => {
			SB.cache.body.toggleClass('has-search-active');
		});
		$('.overlay__cart, .js-close-cart').on('click', () => {
			SB.cache.body.toggleClass('has-cart-active');
		});


		// Navigation menu
		// ------------------------------------------------------------------
		// Show the off canvas menu
		SB.cache.header.on('click', '.js-toggle-offcanvas-menu', () => {
			SB.cache.body.toggleClass('has-navigation-active');
			SB.cache.body.removeClass('has-search-active');
			SB.cache.body.removeClass('has-cart-active');
		});


		// Search Dropdown toggle
		// ------------------------------------------------------------------
		// If a user clicks on the search toggle button for mobile
		SB.cache.header.on('click', '.js-toggle-dropdown', (event) => {
			const $el = $(event.currentTarget),
				$parent = $el.parents('.search__dropdown');

			if($el.hasClass('search__toggle') ) {
				SB.cache.body.toggleClass('has-search-active');
				SB.cache.body.removeClass('has-cart-active');
				$parent.find('input[type=search]').focus();
			} else {
				SB.cache.body.toggleClass('has-cart-active');
				SB.cache.body.removeClass('has-search-active');
			}

			SB.cache.body.removeClass('has-navigation-active');

			return false;
		});


		// Search field focus
		// ------------------------------------------------------------------
		// If a user clicks on the search toggle button for mobile
		SB.cache.header.on('focus', '.search__input', () => {
			if (RESPONSIVE.isMD || RESPONSIVE.isLG) {
				if(SB.cache.body.hasClass('has-standard-search')) {
					SB.cache.body.addClass('has-search-active');
				}
			}
		});



		// Mobile Flyout menu
		// -----------------------------------------------------------
		var cascadeLevel = 1;
		$('#site-navigation').on('click', '.menu-item-has-children > .menu-main-link', (event) => {
			const $el = $(event.currentTarget),
				$parent = $el.parent('li');

			// Force next navigation level to be shown
			$parent.addClass('is-expanded').siblings().removeClass('is-expanded');

			cascadeLevel++;
			SB.cache.navigation.addClass('cascade-level-' + cascadeLevel);

			if (RESPONSIVE.isSM || RESPONSIVE.isXS) {
				return false;
			}
		});

		// Back Button - Mobile Flyout menu
		// -----------------------------------------------------------
		$('#site-navigation').on('click', '.js-menu-back-button', () => {
			SB.cache.navigation.removeClass('cascade-level-' + cascadeLevel);
			cascadeLevel--;
			SB.cache.navigation.addClass('cascade-level-' + cascadeLevel);

			return false;
		});



		// Comment field validation
		// ------------------------------------------------------------------
		var commentfield = [
			$('#comment'),
			$('#author'),
			$('#email')
		];
		var emailregex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		$.each(commentfield, (index, element) => {
			var errors = 0,
				label = $(element).attr('id');

			$(element).after('<label for="' + label + '" class="validation-message">This field is required</label>');

			$(element).on('blur', () => {
				validate(element, errors);
			});
		});

		$('#commentform').on('submit', () => {
			var errors = 0;

			for (var index = 0; index < commentfield.length; index++) {
				var $el = commentfield[index];
				errors = validate($el, errors);
			}

			if (errors > 0) { return false; }

		});

		 function validate($el, errors) {
			// Test for any value
			if ($el.val() === '') {
				$el.addClass('has-error');
				errors++;
			} else {
				$el.removeClass('has-error');
			}

			// Test for email
			if ($el.prop('type') === 'email') {
				if (!emailregex.test($el.val())) {
					$el.addClass('has-error');
					errors++;
				} else {
					$el.removeClass('has-error');
				}
			}
			return errors;
		}

		// FAQ toggle
		// ------------------------------------------------------------------
		SB.cache.faq.on('click', '.js-faq__question', (event) => {
			const $el = $(event.currentTarget),
				$parent = $el.parent('.js-faq__question-answer'),
				activeClass = 'is-active';

			$parent.toggleClass(activeClass);
		});

		// Scale Youtube clips nicely
		// ------------------------------------------------------------------
		$('iframe[src*="youtube"], iframe[src*="vimeo"]').wrap('<div class="video-container"></div>');


	}
};

(($) => {
	'use strict';
	$(window).responsive();
	SB.init($);
})(jQuery);


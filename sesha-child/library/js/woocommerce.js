/* eslint-disable no-undef */
/*eslint-env jquery*/
const SBWOO = {
	pdp : {
		pageLoaded : {
			mobile: false,
			desktop : false
		},
		sizingGuideLoaded : false,
		pdpThumbnails : {
			count : 0
		}
	},
	init : ($) => {
		'use strict';

		// Store Responsive Screen Sizes
		const RESPONSIVE = $(window).data('responsive');

		// Gather how many thumbnails we have on the PDP
		SBWOO.pdp.pdpThumbnails.count = SB.cache.previewThumbs.find('.product_gallery__item').length;

		// PDP thumbnails and preview
		// -----------------------------------------------------------
		SBWOO.pdpLayout($);
		$(window).on('load', () => {
			$('.woocommerce-product-gallery').addClass('is-loaded');
		});
		$(window).resize( ($) => {
			// handle the resize event between breakpoints
			SBWOO.pdpLayout($);
		});

		// Filters Accordian
		// -----------------------------------------------------------
		if(!RESPONSIVE.isXS && $('body').hasClass('has-vertical-filters-layout') ) {
			SB.cache.sidebar.find('.js-filter__panel-toggle').eq(0).parent().addClass('is-active');
		}

		SB.cache.sidebar.on('click', '.js-filter__panel-toggle',  (event) => {
			var $el = $(event.currentTarget),
				$parent = $el.parent();

			$parent.toggleClass('is-active');
			$parent.siblings().removeClass('is-active');
		});

		// Toggle filters menu on mobile
		SB.cache.sidebar.on('click', '.js-toggle-filters-menu', (event) => {
			var $el = $(event.currentTarget),
				$panel = $('.js-filters-panel-wrapper');

			$el.toggleClass('is-active');
			$panel.toggleClass('is-active');
		});

		// PDP image preview and zoom
		// -----------------------------------------------------------
		if( SB.cache.body.hasClass('has-product-zoom') ) {
			SB.cache.preview.zoom();
			SB.cache.preview.on('click', '.js-gallery-image', () => {
				return false;
			});
		} else {
			SB.cache.preview.on('click', '.js-gallery-image', () => {
				return false;
			});
			SB.cache.previewMobile.on('click', '.js-gallery-image', () => {
				return false;
			});
		}

		// Image thumbnails
		// -----------------------------------------------------------
		SB.cache.previewThumbs.on('click', '.js-gallery-image', (event) => {
			var $el 		= $(event.currentTarget),
				$parent 	= $el.parent('li'),
				src 	= $el.attr('href');

			SB.cache.preview.html('<img src="'+src+'">');
			$parent.addClass('is-active');
			$parent.siblings().removeClass('is-active');

			if( SB.cache.body.hasClass('has-product-zoom') ) {
				SB.cache.preview.trigger('zoom.destroy');
				SB.cache.preview.zoom({
					url: src
				});
			}
			return false;
		});


		// PLP Alternate Image Rollover
		// -----------------------------------------------------------
		SB.cache.body.on('mouseover', '.products .product', (event) => {
			var $el = $(event.currentTarget);

			if( $el.hasClass('has-rollover') ) return false;

			$el.find('.js-product__alternate-thumbnail').each( (index, element) => {
				let $lazyImage = $(element),
					i = index,
					data = $lazyImage.data(),
					img = $('<img />').attr({
					'src': data.url,
					'class' : 'product__alternate-thumbnail'
				}).on('load', (event) => {
					let image = event.currentTarget;
					if (!image.complete || typeof image.naturalWidth == 'undefined' || image.naturalWidth == 0) {
						console.log('broken image!');
					} else {
						$lazyImage.after(img);
					}
				});

				$el.addClass('has-rollover');
			});
		});





		// Quantity stepper
		// -----------------------------------------------------------
		SB.cache.body.on('click', '.quantity .js-plus', (event) => {
			var $input = $(event.currentTarget).siblings('.qty'),
				val = parseInt($input.val()),
				step = $input.attr('step');

			step = 'undefined' !== typeof step ? parseInt(step) : 1;
			$input.val(val + step).change();
		});

		SB.cache.body.on('click', '.quantity .js-minus', (event) => {
			var $input = $(event.currentTarget).siblings('.qty'),
				val = parseInt($input.val()),
				step = $input.attr('step');

			step = 'undefined' !== typeof step ? parseInt(step) : 1;

			if (val > 0) {
				$input.val(val - step).change();
			}
		});


		// Minicart counter decrement
		// -----------------------------------------------------------
		SB.cache.minicart.on('click', '.remove_from_cart_button', (event) => {
			var $el = $(event.currentTarget),
				$counter = $('#site-minicart .js-minicart-counter'),
				qty = $el.siblings('.quantity').contents().get(0).nodeValue.replace(' ×', ''),
				totalCounter = $counter.html();

			// Decrement counter HTML value
			$counter.html(parseInt(totalCounter) - parseInt(qty));
		});


		// Ajax 'Add to Cart' button - update counter
		// -----------------------------------------------------------
		SB.cache.body.on('click', '.ajax_add_to_cart', (event) => {
			let $el = $(event.currentTarget),
				data = $el.data(),
				$counter = $('#site-minicart .js-minicart-counter'),
				totalCounter = $counter.html();

			$el.addClass('disabled');
			e.preventDefault();

			// Increment counter HTML value
			$counter.html(parseInt(totalCounter) + parseInt(data.quantity));
		});



		// Sizing Guide modal
		// -----------------------------------------------------------
		// Get Sizing guide URL
		var sizingGuideURL = SB.cache.sizeGuideBtn.attr('href');

		// Create Sizing Guide button
		if(sizingGuideURL) {
			SB.cache.sizeGuideModal.load( sizingGuideURL, () => {
				SBWOO.pdp.sizingGuideLoaded = true;
				SB.cache.sizeGuideBtn.insertAfter('#pa_size');
			});
		}
	},
	pdpLayout : () => {
		// Store Responsive Screen Sizes
		const RESPONSIVE = $(window).data('responsive');

		// Grab all full size images, and ammend thumbnails menu. Only done once!
		SB.cache.previewThumbs.find('.product_gallery__item').each( (index, element) => {
			var $el 	= $(element),
				$img 	= $el.find('img'),
				src 	= $img.attr('src');

			// Remove title tags from images
			$img.attr('title', '');

			if(SBWOO.pdp.pageLoaded.mobile === false && (RESPONSIVE.isXS || RESPONSIVE.isSM) ) {
				// Add all full size images to mobile preview
				SB.cache.previewMobile.append('<div><img data-lazy="'+src+'" /></div>');
				if(index === SBWOO.pdp.pdpThumbnails.count - 1) {
					SBWOO.pdp.pageLoaded.mobile = true;
					SB.cache.previewMobile.slick({
						'lazyLoad': 'ondemand',
						'slidesToShow': 1,
						'slidesToScroll': 1,
						'infinite': false,
						'draggable': true,
						'dots' : true,
						'autoplay': false,
						'nextArrow': '<button type="button" class="slick-arrow slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
						'prevArrow': '<button type="button" class="slick-arrow slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
						'responsive': [{
							'breakpoint': 500,
							'settings': {
								'slidesToShow': 1,
								'slidesToScroll': 1
							}
						},{
							'breakpoint': 900,
							'settings': {
								'slidesToShow': 2,
								'slidesToScroll': 1
							}
						}]
					});
				}
				SB.cache.preview.on('click', '.js-gallery-image', () => {
					return false;
				});
			}
		});
	}
};

(($) => {
	'use strict';
	SBWOO.init($);
})(jQuery);

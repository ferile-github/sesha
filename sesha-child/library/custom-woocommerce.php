<?php
// WooCommerce
// -------------------------------------------------------------------------------
function launch_woocommerce_customisations () {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 600,
		'gallery_thumbnail_image_width' => 300,
		'single_image_width' => 1000,
	) );

	if( get_setting('plp_add_to_cart_toggle') === 'hide' ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	}
	if( get_setting('pdp_add_to_cart_toggle') === 'hide' ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}


	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
	add_action( 'wp_enqueue_scripts', 'sesha_dequeue_woocommerce_styles', 100 );
	add_filter( 'woocommerce_single_product_image_thumbnail_html','sesha_pdp_product_image_gallery_html' );
	add_filter( 'woocommerce_breadcrumb_defaults', 'sesha_woocommerce_breadcrumbs' );
	add_action( 'woocommerce_after_shop_loop_item_title', 'sesha_output_product_excerpt', 35 ); // Add this if you want to show a short description to each PLP item
	add_action( 'widgets_init', 'sesha_woocommerce_sidebar_init' );

	if( get_setting('pdp_additional_info_tab_toggle') === 'hide' ) {
		add_filter( 'woocommerce_product_tabs', 'sesha_remove_additional_info_tab', 98 ); // Remove additional info PDP tab
	} else {
		add_filter( 'woocommerce_product_tabs', 'sesha_product_tabs', 98 ); // Show Additional Info PDP tab
	}

	add_filter( 'the_title', 'sesha_title_order_received', 10, 2 ); // rename order complete page title
	add_filter( 'the_title', 'sesha_endpoint_titles', 10, 2 ); // rename the account details page title
	// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 ); // Remove on sale message
	// add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 2 );  // move on sale message to summary
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 ); // Remove product excerpt, using the tabbed description content instead
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' ); // Remove tabs hook, and move to product summary
	add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 70 ); // Add the tabs back, but in the 'woocommerce_single_product_summary' hook

	add_action( 'woocommerce_before_add_to_cart_form', 'sesha_add_sizing_guide_button', 5 ); // Add Sizing guide button to PDP

	add_action( 'woocommerce_account_content', 'sesha_add_my_account_banner_content', 5 ); // Add My Account Banner
	// add_action( 'woocommerce_account_navigation', 'sesha_add_my_account_banner_navigation', 5 ); // Add My Account Banner

	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' ); // Remove Cross Sells From Default Position ...
	add_action( 'woocommerce_after_cart_totals', 'woocommerce_cross_sell_display' ); // .. and add them back UNDER the Cart totals

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );// Remove Cross Sells From Default Position ...
	add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 15 ); // .. and add them back UNDER the product details page

	add_action( 'woocommerce_before_shop_loop_item_title', 'sesha_woocommerce_before_shop_loop_item_title', 5); // Add another image to the PLP

	add_action( 'woocommerce_shop_loop_item_title', 'sesha_woocommerce_shop_loop_item_title', 5); // Add PLP product title wrapper
	add_action( 'woocommerce_after_shop_loop_item', 'sesha_woocommerce_after_shop_loop_item', 5); // Add PLP product title wrapper

	add_action( 'woocommerce_before_quantity_input_field', 'sesha_woocommerce_before_quantity_input_field', 5); // Add PLP stepper buttons
	add_action( 'woocommerce_after_quantity_input_field', 'sesha_woocommerce_after_quantity_input_field', 5); // Add PLP stepper buttons

	// Rename add to basket button
	add_filter('woocommerce_product_single_add_to_cart_text', 'sesha_custom_add_to_cart_text');
	add_filter('woocommerce_product_add_to_cart_text', 'sesha_custom_add_to_cart_text');

	// Star Ratings
	add_filter('woocommerce_product_get_rating_html', 'sesha_star_rating', 10, 2);

}
add_action( 'after_setup_theme', 'launch_woocommerce_customisations' );



// Show stars for product ratings
// -------------------------------------------------------------------------------
function sesha_star_rating($rating_html, $rating) {
	$rating_html = '<div class="star-ratings__wrapper">';

	if ( $rating > 0 ) {
		$stars = floor($rating);

		for ($i=0; $i < $stars; $i++) {
			$rating_html .= '<span class="star"></span>';
		}
		if( is_decimal($rating) ) {
			$rating_html .= '<span class="star-half"></span>';
		}
	} else {
		// $rating_html .= 'Not yet rated';
	}

	$rating_html .= '</div>';

  return $rating_html;
}


// PDP thumbnail HTML for grid items
// -------------------------------------------------------------------------------
function searchbar_single_product_thumbnail_html($value) {
	$alt = get_post_meta($value, '_wp_attachment_image_alt', TRUE);
	$image = wp_get_attachment_image_src($value, 'medium');
	return '
	<div class="product_gallery__item">
		<img alt="'.$alt.'" loading="lazy" class="product_gallery__thumbnail" src="'. $image[0] .'">
	</div>';
}

add_filter( 'searchbar_single_product_image_thumbnail_html', 'searchbar_single_product_thumbnail_html' );


// My Account Banner
// -------------------------------------------------------------------------------
function sesha_add_my_account_banner_content() {
	if(get_setting('account_banner')) {
		echo '<img src="'.get_setting('account_banner').'" class="my-account__banner_content / mb-3" alt="My Account Banner Image">';
	}
}

function sesha_add_my_account_banner_navigation() {
	if(get_setting('account_banner')) {
		echo '<img src="'.get_setting('account_banner').'" class="my-account__banner_navigation / mb-3" alt="My Account Banner Image">';
	}
}


// Quantity Stepper
// -------------------------------------------------------------------------------
function sesha_woocommerce_before_quantity_input_field() {
	echo '<input class="js-minus / btn btn-default" type="button" value="-">';
}
function sesha_woocommerce_after_quantity_input_field() {
	echo '<input class="js-plus / btn btn-default" type="button" value="+">';
}


// Add PLP product title wrapper
// -------------------------------------------------------------------------------
function sesha_woocommerce_shop_loop_item_title() {
	echo '<div class="product__title-wrapper">';
}

function sesha_woocommerce_after_shop_loop_item() {
	echo '</div>';
}


// PLP alternate image
// -------------------------------------------------------------------------------
function sesha_woocommerce_before_shop_loop_item_title() {
	global $post;
	if ( get_field('alternate_product_image', $post->ID) ) :
		$thumb = get_field('alternate_product_image', $post->ID)['sizes']['thumbnail'];
		echo '<div class="js-product__alternate-thumbnail" data-url="'.$thumb.'"></div>';
	endif;
}

// Sizing guide button
// -------------------------------------------------------------------------------
function sesha_add_sizing_guide_button() {
	$url = get_setting('sizing_guide_link');
	if($url) {
		echo '<div class="size-guide-button__wrapper">
			<a id="btn-size-guide" data-bs-toggle="modal" data-bs-target="#sizingModal" class="size-guide-button / btn btn-outline-secondary" href="'.get_the_permalink( get_setting('sizing_guide_link') ).'">
				Size Guide
			</a>
		</div>';
	}
}

// Rename Order confirmation title
// -------------------------------------------------------------------------------
function sesha_title_order_received( $title, $id ) {
	if ( is_order_received_page() && get_the_ID() === $id ) {
		$title = "Thank you! Your Order is Complete";
	}
	return $title;
}

// Rename My Account titles
// -------------------------------------------------------------------------------
function sesha_endpoint_titles( $title, $id ) {
	if ( is_wc_endpoint_url( 'edit-account' ) && in_the_loop() ) {
		$title = "Account Details";
	}
	return $title;
}



// Adds SKUs and product images to WooCommerce order emails
// -------------------------------------------------------------------------------
function sesha_modify_wc_order_emails( $args ) {
	$args['show_sku'] = true;
	$args['show_image'] = true;
	$args['image_size'] = array( 100, 100 );
	return $args;
}
add_filter( 'woocommerce_email_order_items_args', 'sesha_modify_wc_order_emails' );


// Remove WooCommerce Stylesheets
// -------------------------------------------------------------------------------
function sesha_dequeue_woocommerce_styles() {
	if ( class_exists( 'woocommerce' ) ) {
		wp_dequeue_style( 'select2' );
		wp_deregister_style( 'select2' );
	}
}

// Sort Shipping options by price
// -------------------------------------------------------------------------------
// credit: ChromeOrange - https://gist.github.com/ChromeOrange/10013862
add_filter( 'woocommerce_package_rates' , 'sesha_sort_woocommerce_available_shipping_methods', 10, 2 );
function sesha_sort_woocommerce_available_shipping_methods( $rates, $package ) {
	//  if there are no rates don't do anything
	if ( ! $rates ) {
		return;
	}

	// get an array of prices
	$prices = array();
	foreach( $rates as $rate ) {
		$prices[] = $rate->cost;
	}

	// use the prices to sort the rates
	array_multisort( $prices, $rates );

	// return the rates
	return $rates;
}

// PDP Image Gallery
// -------------------------------------------------------------------------------
function sesha_pdp_product_image_gallery_html( $html ) {
	$string = strip_tags($html, '<a><img>');
	return str_replace('<a', '<a class="js-gallery-image"', $string);
}


// Remove Additional Info tab
// -------------------------------------------------------------------------------
function sesha_remove_additional_info_tab($tabs ) {
	unset( $tabs['additional_information'] ); //  remove additional info
	return $tabs;
}

// Add custom information tab
// -------------------------------------------------------------------------------
function sesha_product_tabs( $tabs ) {
	if( get_field('additional_product_information_tab', get_the_ID() ) )  {
		$tabs['additional_product_information_tab'] = array(
			'title'     => __( 'More Information', 'sesha' ),
			'priority'  => 50,
			'callback'  => 'sesha_additional_product_information_tab_content'
		);
		$tabs['additional_product_information_tab']['priority'] = 20;
	}
	return $tabs;
}

function sesha_additional_product_information_tab_content()  {
	echo get_field('additional_product_information_tab', get_the_ID());
}

// Sidebars
// -------------------------------------------------------------------------------
function sesha_woocommerce_sidebar_init() {

	register_sidebar( array(
		'name' => __( 'Cart', 'sesha' ),
		'id' => 'cart',
		'description' => __( 'Cart Widget Area', 'sesha' ),
		'before_widget' => '<aside class="cart__wrapper">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="cart__heading">',
		'after_title'   => '</h2>
			<button class="btn-cart__close btn-masthead-button / js-close-cart"><i class="fa fa-close" aria-hidden="true"></i></button>',
	) );

	register_sidebar( array(
		'name' => __( 'Product Filters', 'sesha' ),
		'id' => 'filters',
		'description' => __( 'Product Listing Filters Sidebar', 'sesha' ),
		'before_widget' => '<div id="%1$s" class="filter__item %2$s">',
		'after_widget'  => '</div></div>', // see : sesha_check_sidebar_params
		'before_title'  => '<h2 class="filter__heading / js-filter__panel-toggle">',
		'after_title'   => '<i class="filter__toggle-arrow"></i></h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Active Product Filters', 'sesha' ),
		'id' => 'active_filters',
		'description' => __( 'For use with the Active Product Filters Widget', 'sesha' ),
		'before_widget' => '<div id="%1$s" class="filter__item-active-filters %2$s">',
		'after_widget'  => '</div>', // see : sesha_check_sidebar_params
		'before_title'  => '<h2 class="visually-hidden">',
		'after_title'   => '</h2>',
	) );

}


// if no title then add widget content wrapper to before widget
add_filter( 'dynamic_sidebar_params', 'sesha_check_sidebar_params' );

function sesha_check_sidebar_params( $params ) {
	global $wp_registered_widgets;

	$settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
	$settings = $settings_getter->get_settings();
	$settings = $settings[ $params[1]['number'] ];

	if ( $params[0][ 'after_widget' ] =='</div></div>' &&  isset( $settings[ 'title' ] ) && !empty( $settings[ 'title' ] ) ) {
		$params[0][ 'after_title' ] .= '<div class="js-filter__panel">';
	}

	if ( $params[0][ 'after_widget' ] == '</div></div>' && ( $settings[ 'title' ] === '' || empty( $settings[ 'title' ] ) ) ) {
		$params[0][ 'before_widget' ] .= '<div class="filter__panel">';
	}


	return $params;
}


// Breadcrumbs bar
// -------------------------------------------------------------------------------
function sesha_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => '',
		'wrap_before' => '<ol class="woocommerce-breadcrumb / breadcrumb" itemprop="breadcrumb">',
		'wrap_after'  => '</ol>',
		'before'      => '<li class="breadcrumb-item">',
		'after'       => '</li>',
		'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	);
}


// Add product details to PLP
// -------------------------------------------------------------------------------
function sesha_output_product_excerpt() {
	global $post;
	echo '<div class="product__short-desc">';
	echo $post->post_excerpt;
	echo '</div>';
}

// Rename Add to Basket
// -------------------------------------------------------------------------------
function sesha_custom_add_to_cart_text() {
	$text = '';
	if( get_setting('woocommerce_add_to_cart_text') ) {
		$text = get_setting('woocommerce_add_to_cart_text');
	} else {
		$text = 'Add to Basket';
	}
	return __($text, 'sesha');
}
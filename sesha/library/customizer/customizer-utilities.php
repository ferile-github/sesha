<?php
/**
 * Adjust a HEX CSS color
 */
function adjustBrightness($hex, $steps) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter
	$steps = max(-255, min(255, $steps));

	// Normalize into a six character long hex string
	$hex = str_replace('#', '', $hex);
	if (strlen($hex) == 3) {
		$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
	}

	// Split into three parts: R, G and B
	$color_parts = str_split($hex, 2);
	$return = '#';

	foreach ($color_parts as $color) {
		$color   = hexdec($color); // Convert to decimal
		$color   = max(0,min(255,$color + $steps)); // Adjust color
		$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
	}

	return $return;
}

/**
 * Get a Wordpress setting
 */
function get_setting($setting) {
	if( !empty(get_option('sesha')[$setting]) ) {
		return get_option('sesha')[$setting];
	}
}


/**
 * Calculate the reduced header height when scrolling down the page
 */
function calculateReducedHeaderHeight($option) {
	$elementDimension = get_setting( $option );
	$reduceAmount =  get_setting('masthead_reduced_height');

	return $elementDimension * $reduceAmount / 100;
}

/**
 * Calculate the body padding for desktop
 */
function calculateFixedHeaderBodyPadding() {
	$padding = (int)get_setting('masthead_height');
	$unit = 'px';
	if( get_setting('messaging_header_toggle') ) {
		$padding = $padding + (int)get_setting('masthead_user_details_height');
	}

	return $padding.$unit;
}



/**
 * Sanitize a checkbox setting
 */
function sesha_sanitize_checkbox( $input ) {
	return ( $input ? true : false );
}

/**
 * Sanitize a checkboxes setting
 */
function sesha_sanitize_checkboxes( $input ) {
	return true;
}


/**
 * Sanitize a select setting
 */
function sesha_sanitize_select( $input, $setting ){
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}


/**
 * Sanitize a radio setting
 */
function sesha_sanitize_radio( $input, $setting ){
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible radio box options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}



/**
 * Sanitize an image setting
 */

function sesha_sanitize_image( $input, $default = '' ) {
	// Array of valid image file types
	// The array includes image mime types
	// that are included in wp_get_mime_types()
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'pdf'          => 'application/pdf'
	);
	// Return an array with file extension
	// and mime_type
	$file = wp_check_filetype( $input, $mimes );
	// If $input has a valid mime_type,
	// return it; otherwise, return
	// the default.
	return ( $file['ext'] ? $input : $default );
}


/**
 * Sanitize a number range
 */
function sesha_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}




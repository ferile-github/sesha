<?php
// Remove default colour swatches and add our own ones
// ---------------------------------------------------------
function mce_colour_swatches($init) {
	$default_colours = '
		"1f1f1f", "Black",
		"ffffff", "White",
		"49b7c0", "Teal",
		"20bf81", "Green",
		"5acd1b", "Lime"
	';

	$custom_colours =  '';

	// build colour grid default+custom colors
	$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

	// enable 6th row for custom colours in grid
	$init['textcolor_rows'] = 6;

	return $init;
}



// Add New drop down select for our custom styles
// ---------------------------------------------------------
function mce_custom_styles($buttons) {
	// Add our own style select drop down
	array_unshift($buttons, 'styleselect');
	return $buttons;
}

// Remove poofy MCE buttons
// ---------------------------------------------------------
function mce_remove_default_buttons( $buttons ){
	// remove from top row in MCE
	$remove = array( 'wp_more' );
	return array_diff( $buttons, $remove );
}

function mce_remove_default_buttons2( $buttons ){
	// remove from second row in MCE
	$remove = array( 'wp_help', 'justifyfull', 'alignjustify', 'charmap', 'indent', 'outdent', 'underline' );
	return array_diff( $buttons, $remove );
}



// Add our custom styles to the custom select
// ---------------------------------------------------------
function mce_add_custom_styles( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Standard Size Buttons',
			'items' => array(
				array(
					'title' => 'Primary Button',
					'selector' => 'a',
					'classes' => 'btn btn-primary',
				),
				array(
					'title' => 'Secondary Button',
					'selector' => 'a',
					'classes' => 'btn btn-secondary',
				),
				array(
					'title' => 'White Button',
					'selector' => 'a',
					'classes' => 'btn btn-white',
				)
			),
		),
		array(
			'title' => 'Large Size Buttons',
			'items' => array(
				array(
					'title' => 'Primary Button',
					'selector' => 'a',
					'classes' => 'btn btn-primary btn-lg',
				),
				array(
					'title' => 'Secondary Button',
					'selector' => 'a',
					'classes' => 'btn btn-secondary btn-lg',
				),
				array(
					'title' => 'White Button',
					'selector' => 'a',
					'classes' => 'btn btn-white btn-lg',
				)
			),
		)
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}

// HTML5 Figcaption and Figure
// ---------------------------------------------------------
// Courtesy Addon Grogg
// https://github.com/aarontgrogg/wp-plugin-figure-figcaption/blob/master/functions.php

function sesha_figure_caption( $output, $attr, $content ) {
	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() ) { return $output; }
	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);
	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );
	/* If the width is less than 1, return the content wrapped between the [caption] tags. */
	if ( 1 > $attr['width'] ) { return $content; }
	/* Set up the attributes for the caption <figure>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
	//$attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';
	/* Open the caption <figure>. */
	$output = '<figure' . $attributes .'>';
	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );
	/* Append the caption text. */
	if ($attr['caption'] !== '') :
		$output .= '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>';
	endif;
	/* Close the caption </figure>. */
	$output .= '</figure>';
	/* Return the formatted, clean figure & figcaption. */
	return $output;
}


// Call filters and actions
// -------------------------------------------------------------------------------
add_filter('mce_buttons', 'mce_remove_default_buttons');
add_filter('mce_buttons_2', 'mce_remove_default_buttons2');
add_filter('mce_buttons_2', 'mce_custom_styles');
add_filter('tiny_mce_before_init', 'mce_add_custom_styles');
add_filter('tiny_mce_before_init', 'mce_colour_swatches');
add_filter( 'img_caption_shortcode', 'sesha_figure_caption', 10, 3 );
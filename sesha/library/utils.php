<?php
// Print Picture Elements
// -------------------------------------------------------------------------------
function print_picture($image, $class = '', $mobile_high_res = false) {
	$string = '<picture class="'. $class .'">';
		$string .= '<source srcset="'. $image['sizes']['large'] .'" media="(min-width: 1200px)">';
		$string .= '<source srcset="'. $image['sizes']['medium'] .'" media="(min-width: 800px)">';
		if($mobile_high_res) {
			$string .= '<img src="'. $image['sizes']['medium'] .'">';
		} else {
			$string .= '<img src="'. $image['sizes']['thumbnail'] .'">';
		}
	$string .= '</picture>';

	return $string;
}

// Print SVG Files
// -------------------------------------------------------------------------------
function print_svg($path) {
	if ( $path ) {
		$filesystem = get_theme_file_path();
		$url  = get_stylesheet_directory_uri();

		if(file_exists($filesystem.$path) ) {
			// We have a file from the theme folder
			$response = wp_remote_get( esc_url_raw( $url.$path ) );
			if($response['body']) {
				echo $response['body'];
			}
		}
		elseif( !file_exists($filesystem.$path) ) {
			// We have a file from the WP Media Library
			$response = wp_remote_get( esc_url_raw( $path ) );
			if($response['body']) {
				echo $response['body'];
			}
		}
	}
}
// usage in theme files :
// print_svg('/library/svg/filename.svg');

// Site brand logo
// -------------------------------------------------------------------------------
function printSiteBrandLogo($path) {
	if ( $path ) {
		$response = wp_remote_get( esc_url_raw( $path ) );
		if($response['headers']['content-type'] !== 'image/svg+xml' ) {
			echo '<img class="custom-logo" src='.$path.' alt="'.get_bloginfo('name').'">';
		} else {
			print_svg($path);
		}
	}
}

// Convert UPPERCASE words to Camel Case
// -------------------------------------------------------------------------------
function sesha_titlecase($string) {
	return ucwords( strtolower( $string ) );
}


// Number has a decimal
// -------------------------------------------------------------------------------
function is_decimal( $val ) {
    return is_numeric( $val ) && floor( $val ) != $val;
}


// CSS and JS inspect utility
// -------------------------------------------------------------------------------
function sesha_inspect_scripts_and_styles() {
	global $wp_scripts;
	global $wp_styles;

	// Runs through the queue scripts
	foreach( $wp_scripts->queue as $handle ) :
	$scripts_list .= $handle . ' | ';
	endforeach;

	// Runs through the queue styles
	foreach( $wp_styles->queue as $handle ) :
	$styles_list .= $handle . ' | ';
	endforeach;

	printf('<br><br><br>Scripts: %1$s  Styles: %2$s',
	$scripts_list,
	$styles_list);
}

// Uncomment if you need to view all enqueued scripts and styles
// add_action( 'wp_print_scripts', 'sesha_inspect_scripts_and_styles' );
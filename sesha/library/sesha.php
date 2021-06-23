<?php
// Get the theme rollin'
// -------------------------------------------------------------------------------
function launch_sesha() {
	// Flush rewrite rules for custom post types
	add_action( 'after_switch_theme', 'sesha_flush_rewrite_rules' );

	// Flush your rewrite rules
	function sesha_flush_rewrite_rules() {
		flush_rewrite_rules();
	}

	// Enqueue parent scripts and styles
	if( defined('SESHA_THEME_BUILDER') && SESHA_THEME_BUILDER ) {
		add_action( 'wp_enqueue_scripts', 'sesha_parent_scripts_and_styles' );
	}

	// Enqueue child scripts and styles
	add_action( 'wp_enqueue_scripts', 'sesha_child_scripts_and_styles' );

	// launching operation cleanup
	add_action( 'init', 'sesha_head_cleanup' );
	// remove WP version from RSS
	add_filter( 'the_generator', 'sesha_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'sesha_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'sesha_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'sesha_gallery_style' );

	// launching this stuff after theme setup
	sesha_theme_support();

}
add_action( 'after_setup_theme', 'launch_sesha' );


// Theme Suppport
// -------------------------------------------------------------------------------
// Adding WP 3+ Functions & Theme Support
function sesha_theme_support() {
	// rss thingy
	add_theme_support('automatic-feed-links');

	// Title Tag
	add_theme_support( "title-tag" ) ;

	// Add theme support for Featured Image
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 450, 450, array( 'center', 'center') );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height'  => true,
		'header-text' => array( 'site-title', 'site-description' )
	) );


	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Editor Styles
	add_editor_style( get_stylesheet_directory_uri().'/library/css/editor-style.css');
	add_theme_support( 'editor-styles' );

	if ( ! isset( $content_width ) ) $content_width = 1200;
}

// CSS and JS assets loading from parent and child themes
// -------------------------------------------------------------------------------
function sesha_parent_scripts_and_styles() {
	wp_register_style( 'sesha-parent-styles', get_template_directory_uri() . '/library/css/style-parent.css', array(), '' );
	wp_enqueue_style( 'sesha-parent-styles' );

	wp_register_script( 'sesha-js-fontloader', 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js', array(), '' );
	wp_enqueue_script( 'sesha-js-fontloader' );

}

// CSS and JS assets loading from parent and child themes
// -------------------------------------------------------------------------------
function sesha_child_scripts_and_styles() {

	// Update Jquery version, and remove old WP default version
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"), false);
		wp_enqueue_script('jquery');
	}

	if( defined('SESHA_THEME_BUILDER') || SESHA_THEME_BUILDER ) {
		wp_register_style( 'sesha-child-styles', get_stylesheet_directory_uri() . '/library/css/style-child.css', array(), '' );
		wp_enqueue_style( 'sesha-child-styles' );
	}

	wp_register_script( 'sesha-js-child', get_stylesheet_directory_uri() . '/library/scripts/scripts.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'sesha-js-child' );

	// Load WooCommerce script, if it is WooCommerce available
	if(check_for_woocommerce()) {
		wp_register_script( 'sesha-js-woocommerce', get_stylesheet_directory_uri() . '/library/scripts/woocommerce.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'sesha-js-woocommerce' );
	}
}





// Wordpress HEAD cleanup
// -------------------------------------------------------------------------------
function sesha_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'sesha_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'sesha_remove_wp_ver_css_js', 9999 );

}


// Remove Wordpress versions from HEAD
// -------------------------------------------------------------------------------
// remove WP version from RSS
function sesha_rss_version() { return ''; }

// remove WP version from scripts
function sesha_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}


// Remove injected CSS for recent comments widget
// -------------------------------------------------------------------------------
function sesha_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}
// remove injected CSS from recent comments widget
function sesha_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}
// remove injected CSS from gallery
function sesha_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}
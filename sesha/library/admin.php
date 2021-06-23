<?php
// disable default dashboard widgets
// -------------------------------------------------------------------------------
function sesha_disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //

	// remove plugin dashboard boxes
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget
}


// Remove post custom boxes
// -------------------------------------------------------------------------------
function sesha_remove_boxes() {
	remove_meta_box( 'postcustom' , 'post' , 'normal' );
	remove_meta_box( 'postcustom' , 'page' , 'normal' );
}


// Add CSS for customizer panels
// -------------------------------------------------------------------------------
if(is_admin()) {
	function sesha_add_customizer_stylesheet() {
		wp_register_style( 'sesha_customizer_styles', get_template_directory_uri() .  '/library/css/customizer.css', array(), '' );
		wp_enqueue_style( 'sesha_customizer_styles' );
	}
	add_action( 'customize_controls_print_styles', 'sesha_add_customizer_stylesheet' );
}


// Wordpress Appearance menu customise
// -------------------------------------------------------------------------------
function sesha_theme_customizer($wp_customize) {
	$wp_customize->remove_control('blogdescription');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('nav');
}
add_action( 'customize_register', 'sesha_theme_customizer' );

// calling your own login css so you can style it
// -------------------------------------------------------------------------------
function sesha_login_css() {
	wp_enqueue_style( 'sesha_login_css', get_stylesheet_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
// -------------------------------------------------------------------------------
function sesha_login_url() {  return home_url(); }

// Custom Backend Footer
// -------------------------------------------------------------------------------
function sesha_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://www.searchbar.co.za" target="_blank" rel="noreferrer">SearchBAR</a></span>', 'sesha' );
}


// Call filters and actions
// -------------------------------------------------------------------------------
add_action('admin_init', 'sesha_remove_boxes');
add_action( 'wp_dashboard_setup', 'sesha_disable_default_dashboard_widgets' );
add_action( 'login_enqueue_scripts', 'sesha_login_css', 10 );
add_filter( 'login_headerurl', 'sesha_login_url' );
add_filter( 'admin_footer_text', 'sesha_custom_admin_footer' );
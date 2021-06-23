<?php
// Masthead search
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[masthead_search_layout]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'has-standard-search',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[masthead_search_layout]', array(
	'label'      => __('Site Search UI layout', 'sesha'),
	'section'    => 'section_masthead_options',
	'settings'   => 'sesha[masthead_search_layout]',
	'type'       => 'radio',
	'choices'    => array(
		'no-search' => 'No Search in Masthead',
		'has-standard-search' => 'Standard Search field',
		'has-dropdown-search' => 'Search field in a drop down'
	),
));

// Masthead cart
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[masthead_cart_layout]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'has-dropdown-cart',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[masthead_cart_layout]', array(
	'label'      => __('Shopping Cart UI layout', 'sesha'),
	'section'    => 'section_masthead_options',
	'settings'   => 'sesha[masthead_cart_layout]',
	'type'       => 'radio',
	'choices'    => array(
		'no-cart' => 'No Cart in Masthead',
		'has-flyout-cart' => 'Flyout Cart',
		'has-dropdown-cart' => 'Cart in a drop down'
	),
));


// Social Media in Masthead
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[social_media_masthead_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => true,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[social_media_masthead_toggle]', array(
	'label'      => __('Show Social Media?', 'sesha'),
	'section'    => 'section_masthead_options',
	'settings'   => 'sesha[social_media_masthead_toggle]',
	'type'     	 => 'checkbox'
));

// User login bar
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[user_details_bar_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => true,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[user_details_bar_toggle]', array(
	'label'      => __('Show User Details Bar?', 'sesha'),
	'section'    => 'section_masthead_options',
	'settings'   => 'sesha[user_details_bar_toggle]',
	'type'     	 => 'checkbox'
));


// Message Bar
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[messaging_header_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => true,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[messaging_header_toggle]', array(
	'label'      => __('Show Messaging Bar?', 'sesha'),
	'section'    => 'section_masthead_options',
	'settings'   => 'sesha[messaging_header_toggle]',
	'type'     	 => 'checkbox'
));


// Messaging bar
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[messaging_header]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => ' Enter your sitewide message here...',
	'sanitize_callback' => 'wp_filter_nohtml_kses'

));

$wp_customize->add_control('sesha[messaging_header]', array(
	'label'      => __('Message', 'sesha'),
	'section'    => 'section_masthead_options',
	'settings'   => 'sesha[messaging_header]',
));

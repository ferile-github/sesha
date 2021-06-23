<?php

// PLP - Add to Cart Button Toggle
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[pdp_add_to_cart_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'show',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[pdp_add_to_cart_toggle]', array(
	'label'      => __('Toggle the Add to Cart, Size Guide and Quantity buttons ', 'sesha'),
	'section'    => 'section_pdp',
	'settings'   => 'sesha[pdp_add_to_cart_toggle]',
	'type'       => 'radio',
	'choices'    => array(
		'show' => 'Show Product Purchase Buttons',
		'hide' => 'Hide Product Purchase Buttons'
	),
));



// PDP - Toggle Product Zoom
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[pdp_toggle_product_zoom]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => 'has-product-zoom',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[pdp_toggle_product_zoom]', array(
	'label'      => __('PDP Product Zoom', 'sesha'),
	'section'    => 'section_pdp',
	'settings'   => 'sesha[pdp_toggle_product_zoom]',
	'type'       => 'radio',
	'choices'    => array(
		'has-product-zoom' => 'Enable Product Zoom',
		'no-product-zoom' => 'Disable Product Zoom'
	),
));


// PDP - toggle additional information tab
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[pdp_additional_info_tab_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'show',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[pdp_additional_info_tab_toggle]', array(
	'label'      => __('PDP additional information tab', 'sesha'),
	'section'    => 'section_pdp',
	'settings'   => 'sesha[pdp_additional_info_tab_toggle]',
	'type'       => 'radio',
	'choices'    => array(
		'show' => 'Show PDP Additional Information Tab',
		'hide' =>'Hide PDP Additional Information Tab'
	),
));


// PDP - Thumbnails layout
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[pdp_thumbnail_layout]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'has-vertical-thumbnail-gallery',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[pdp_thumbnail_layout]', array(
	'label'      => __('Product Thumbnails Layout', 'sesha'),
	'section'    => 'section_pdp',
	'settings'   => 'sesha[pdp_thumbnail_layout]',
	'type'       => 'radio',
	'choices'    => array(
		'has-vertical-thumbnail-gallery' => 'Vertical',
		'has-horizontal-thumbnail-gallery' => 'Horizontal',
		'has-grid-thumbnail-gallery' => 'Grid'
	),
));


// PDP - Related Products layout
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[pdp_related_products_layout]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'has-vertical-related-products',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[pdp_related_products_layout]', array(
	'label'      => __('Related Products Layout', 'sesha'),
	'section'    => 'section_pdp',
	'settings'   => 'sesha[pdp_related_products_layout]',
	'type'       => 'radio',
	'choices'    => array(
		'has-vertical-related-products' => 'Vertical',
		'has-horizontal-related-products' => 'Horizontal'
	),
));

// PDP - Accordion or Tabs information
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[pdp_information_layout]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'has-pdp-tabs',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[pdp_information_layout]', array(
	'label'      => __('Product Information Layout', 'sesha'),
	'section'    => 'section_pdp',
	'settings'   => 'sesha[pdp_information_layout]',
	'type'       => 'radio',
	'choices'    => array(
		'no-pdp-tabs' => 'No Tabs or Accordion',
		'has-pdp-tabs' => 'Tabs',
		'has-pdp-accordion' => 'Accordion'
	),
));


// PDP sizing button
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[sizing_guide_link]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'absint'

));

$wp_customize->add_control('sesha[sizing_guide_link]', array(
	'label'      => __('Sizing Guide Page', 'sesha'),
	'section'    => 'section_pdp',
	'type'    	 => 'dropdown-pages',
	'settings'   => 'sesha[sizing_guide_link]',
	'allow_addition' => true,
));




<?php
// PDP and PLP - Add to Basket text
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[woocommerce_add_to_cart_text]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => 'Add to Basket',
	'sanitize_callback' => 'wp_filter_nohtml_kses'

));

$wp_customize->add_control('sesha[woocommerce_add_to_cart_text]', array(
	'label'      => __('Add to Basket Button Text', 'sesha'),
	'section'    => 'section_plp',
	'settings'   => 'sesha[woocommerce_add_to_cart_text]',
));

// PLP - Filters layout
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[plp_filters_layout]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'has-vertical-filters-layout',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[plp_filters_layout]', array(
	'label'      => __('Product Filters Layout', 'sesha'),
	'section'    => 'section_plp',
	'settings'   => 'sesha[plp_filters_layout]',
	'type'       => 'radio',
	'choices'    => array(
		'has-vertical-filters-layout' => 'Vertical',
		'has-horizontal-filters-layout' => 'Horizontal'
	),
));


// PLP - Add to Cart Button Toggle
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[plp_add_to_cart_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'show',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[plp_add_to_cart_toggle]', array(
	'label'      => __('Add to Cart Button ', 'sesha'),
	'section'    => 'section_plp',
	'settings'   => 'sesha[plp_add_to_cart_toggle]',
	'type'       => 'radio',
	'choices'    => array(
		'show' => 'Show Add to Cart',
		'hide' => 'Hide Add to Cart'
	),
));

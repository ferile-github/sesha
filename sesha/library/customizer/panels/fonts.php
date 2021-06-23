<?php



// Google Fonts
// ----------------------------------------------------------------------------
$fonts_array = array(
	'Arvo' => 'Arvo',
	'Droid Sans' => 'Droid Sans',
	'Josefin Slab' => 'Josefin Slab',
	'Lato' => 'Lato',
	'Montserrat' => 'Montserrat',
	'Open Sans' => 'Open Sans',
	'Open Sans Condensed' => 'Open Sans Condensed',
	'PT Sans' => 'PT Sans',
	'Roboto' => 'Roboto',
	'Ubuntu' => 'Ubuntu',
	'Vollkorn' => 'Vollkorn'
);

$font_weights_array = array(
	'100' => 'Thin',
	'200' => 'Extra Light',
	'300' => 'Light',
	'400' => 'Regular',
	'500' => 'Medium',
	'600' => 'Semi Bold',
	'700' => 'Bold',
	'800' => 'Extra Bold',
	'900' => 'Black'
);


// Body Font
// ----------------------------------------------------------------------------
$wp_customize->add_setting( 'sesha[fonts]', array(
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sesha_sanitize_select'
) );


$wp_customize->add_control( 'sesha[fonts]', array(
	'settings' => 'sesha[fonts]',
	'label'   => 'Body Font Family',
	'section' => 'section_fonts',
	'type'    => 'select',
	'choices'    => $fonts_array
));

// Body Font Weight
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[fonts_weight_body]', array(
	'capability' => 'edit_theme_options',
	'type'       => 'option',
	'sanitize_callback' => 'sesha_sanitize_select'
));
$wp_customize->add_control('sesha[fonts_weight_body]', array(
	'settings' => 'sesha[fonts_weight_body]',
	'section'  => 'section_fonts',
	'label' => __( 'Body Font Weight', 'sesha' ),
	'type'    => 'select',
	'choices'    => $font_weights_array
));


// Heading Font
// ----------------------------------------------------------------------------
$wp_customize->add_setting( 'sesha[fonts_headings]', array(
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'sesha_sanitize_select'
) );


$wp_customize->add_control( 'sesha[fonts_headings]', array(
	'settings' => 'sesha[fonts_headings]',
	'label'   => __( 'Headings Font Family', 'sesha' ),
	'section' => 'section_fonts',
	'type'    => 'select',
	'choices'    => $fonts_array
));

// Heading Font Weight
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[fonts_weight_headings]', array(
	'capability' => 'edit_theme_options',
	'type'       => 'option',
	'sanitize_callback' => 'sesha_sanitize_select'
));
$wp_customize->add_control('sesha[fonts_weight_headings]', array(
	'settings' => 'sesha[fonts_weight_headings]',
	'section'  => 'section_fonts',
	'label' => __( 'Headings Font Weight', 'sesha' ),
	'type'    => 'select',
	'choices'    => $font_weights_array
));
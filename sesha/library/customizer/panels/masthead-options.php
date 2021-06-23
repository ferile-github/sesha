<?php
// Masthead Options
// ----------------------------------------------------------------------------


// Is this a fixed masthead or static?
$wp_customize->add_setting('sesha[masthead_fixed]', array(
	'capability' => 'edit_theme_options',
	'default' 	 => 0,
	'type'       => 'option',
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[masthead_fixed]', array(
	'settings' => 'sesha[masthead_fixed]',
	'label'    => __('Sticky header, viewable as you scroll down the page', 'sesha'),
	'section'  => 'section_masthead_options',
	'type'     => 'checkbox'
));

// Reduced Masthead
$wp_customize->add_setting('sesha[masthead_reduced]', array(
	'capability' => 'edit_theme_options',
	'default' 	 => 0,
	'type'       => 'option',
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[masthead_reduced]', array(
	'settings' => 'sesha[masthead_reduced]',
	'label'    => __('Does the header shrink in size as you scroll down?', 'sesha'),
	'section'  => 'section_masthead_options',
	'type'     => 'checkbox'
));


// Masthead Height
$wp_customize->add_setting('sesha[masthead_height]', array(
	'default' 	 => 200,
	'capability'        => 'edit_theme_options',
	'type'              => 'option',
	'sanitize_callback' => 'sesha_sanitize_number_range'
));

$wp_customize->add_control( 'sesha[masthead_height]', array(
	'type'        => 'range',
	'priority'    => 10,
	'section'     => 'section_masthead_options',
	'label'       => 'Masthead Height',
	'settings'    => 'sesha[masthead_height]',
	'input_attrs' => array(
		'min'   => 100,
		'max'   => 300,
		'step'  => 10,
		'class' => 'range-control',
		'style' => 'width: 100%',
	),
) );



// Masthead Reduced Height
$wp_customize->add_setting('sesha[masthead_reduced_height]', array(
	'default'           => 70,
	'capability'        => 'edit_theme_options',
	'type'              => 'option',
	'sanitize_callback' => 'sesha_sanitize_number_range'
));

$wp_customize->add_control( 'sesha[masthead_reduced_height]', array(
	'type'        => 'range',
	'priority'    => 10,
	'section'     => 'section_masthead_options',
	'label'       => 'Masthead Reduced Amount',
	'Description' => 'How much to reduce the masthead by in percentage.',
	'settings'    => 'sesha[masthead_reduced_height]',
	'input_attrs' => array(
		'min'   => 50,
		'max'   => 95,
		'step'  => 5,
		'class' => 'range-control',
		'style' => 'width: 100%',
	),
) );



// Masthead User details height
$wp_customize->add_setting('sesha[masthead_user_details_height]', array(
	'default'           => 30,
	'capability'        => 'edit_theme_options',
	'type'              => 'option',
	'sanitize_callback' => 'sesha_sanitize_number_range'
));

$wp_customize->add_control( 'sesha[masthead_user_details_height]', array(
	'type'        => 'range',
	'priority'    => 10,
	'section'     => 'section_masthead_options',
	'label'       => 'User Details Height',
	'settings'    => 'sesha[masthead_user_details_height]',
	'input_attrs' => array(
		'min'   => 30,
		'max'   => 60,
		'step'  => 5,
		'class' => 'range-control',
		'style' => 'width: 100%',
	),
) );

// Masthead Navbar height
$wp_customize->add_setting('sesha[masthead_navbar_height]', array(
	'default'           => 40,
	'capability'        => 'edit_theme_options',
	'type'              => 'option',
	'sanitize_callback' => 'sesha_sanitize_number_range'
));

$wp_customize->add_control( 'sesha[masthead_navbar_height]', array(
	'type'        => 'range',
	'priority'    => 10,
	'section'     => 'section_masthead_options',
	'label'       => 'Navigation menu height',
	'settings'    => 'sesha[masthead_navbar_height]',
	'input_attrs' => array(
		'min'   => 30,
		'max'   => 60,
		'step'  => 5,
		'class' => 'range-control',
		'style' => 'width: 100%',
	),
) );


// Logo width
$wp_customize->add_setting('sesha[logo_width]', array(
	'default'           => 200,
	'capability'        => 'edit_theme_options',
	'type'              => 'option',
	'sanitize_callback' => 'sesha_sanitize_number_range'
));

$wp_customize->add_control( 'sesha[logo_width]', array(
	'type'        => 'range',
	'priority'    => 10,
	'section'     => 'section_masthead_options',
	'label'       => 'Masthead Logo Width',
	'settings'    => 'sesha[logo_width]',
	'input_attrs' => array(
		'min'   => 140,
		'max'   => 600,
		'step'  => 5,
		'class' => 'range-control',
		'style' => 'width: 100%',
	),
) );

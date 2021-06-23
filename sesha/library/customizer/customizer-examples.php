<?php
function sesha_customize_register_examples($wp_customize){

	// Add Panels
	// ----------------------------------------------------------------------------
	$wp_customize->add_panel( 'panel_example', array(
		'priority'       => 1,
		'title'          => 'Example Panel'
	) );


	// Add Sections
	// ----------------------------------------------------------------------------
	$wp_customize->add_section('section_customise_options', array(
		'title'    => __('Example Section', 'sesha'),
		'priority' => 10,
		'description' => 'Section Description',
		'panel' => 'panel_example',
	));



	// Text Input
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_text]', array(
		'default'        => 'Some default text',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'wp_filter_nohtml_kses'

	));

	$wp_customize->add_control('sesha[setting_text]', array(
		'label'      => __('Text', 'sesha'),
		'section'    => 'section_customise_options',
		'settings'   => 'sesha[setting_text]',
	));


	// Radio Input
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_radio]', array(
		'default'        => 'value2',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'sesha_sanitize_radio'
	));

	$wp_customize->add_control('sesha[setting_radio]', array(
		'label'      => __('Radio', 'sesha'),
		'section'    => 'section_customise_options',
		'settings'   => 'sesha[setting_radio]',
		'type'       => 'radio',
		'choices'    => array(
			'value1' => 'Choice 1',
			'value2' => 'Choice 2',
			'value3' => 'Choice 3',
		),
	));


	// Checkbox
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_checkbox]', array(
		'capability' => 'edit_theme_options',
		'type'       => 'option',
		'default' 	 => false,
		'sanitize_callback' => 'sesha_sanitize_checkbox'
	));

	$wp_customize->add_control('sesha[setting_checkbox]', array(
		'settings' => 'sesha[setting_checkbox]',
		'label'    => __('Checkbox Option', 'sesha'),
		'section'  => 'section_customise_options',
		'type'     => 'checkbox'
	));



	// Select Box
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_header_select]', array(
		'default'        => 'value2',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'sesha_sanitize_select'

	));
	$wp_customize->add_control('sesha[setting_header_select]', array(
		'settings' => 'sesha[setting_header_select]',
		'label'   => 'Select Something',
		'section' => 'section_customise_options',
		'type'    => 'select',
		'choices'    => array(
			'value1' => 'Choice 1',
			'value2' => 'Choice 2',
			'value3' => 'Choice 3',
		),
	));


	// Image Upload
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_image_upload]', array(
		'default'           => get_stylesheet_directory_uri().'/library/images/customiser-example.jpg',
		'capability'        => 'edit_theme_options',
		'type'           	=> 'option',
		'sanitize_callback' => 'sesha_sanitize_image'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'sesha[setting_image_upload]', array(
		'label'    => __('Image Upload', 'sesha'),
		'section'  => 'section_customise_options',
		'settings' => 'sesha[setting_image_upload]',
	)));



	// File Upload
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_upload]', array(
		'capability'        => 'edit_theme_options',
		'type'           	=> 'option',
		'sanitize_callback' => 'sesha_sanitize_image'
	));

	$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'sesha[setting_upload]', array(
		'label'    => __('File Upload', 'sesha'),
		'section'  => 'section_customise_options',
		'settings' => 'sesha[setting_upload]'
	)));




	// Color Picker
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_link_color]', array(
		'default'           => '000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           	=> 'option',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sesha[setting_link_color]', array(
		'label'    => __('Color Picker', 'sesha'),
		'section'  => 'section_customise_options',
		'settings' => 'sesha[setting_link_color]',
	)));


	// Range Picker
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_range]', array(
		'capability'        => 'edit_theme_options',
		'type'           	=> 'option',
		'sanitize_callback' => 'sesha_sanitize_number_range'
	));

	$wp_customize->add_control( 'sesha[setting_range]', array(
		'label' => __( 'Range', 'sesha' ),
		'type'        => 'range',
		'section'     => 'section_customise_options',
		'settings'    => 'sesha[setting_range]',
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 100,
			'step'  => 1,
			'class' => 'range-control',
			'style' => 'width: 100%',
		),
	) );



	// Page Dropdown
	// ----------------------------------------------------------------------------
	$wp_customize->add_setting('sesha[setting_pages]', array(
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('sesha[setting_pages]', array(
		'label'      => __('Pages', 'sesha'),
		'section'    => 'section_customise_options',
		'type'    	 => 'dropdown-pages',
		'settings'   => 'sesha[setting_pages]',
		'allow_addition' => true,
	));

}


add_action('customize_register', 'sesha_customize_register_examples');
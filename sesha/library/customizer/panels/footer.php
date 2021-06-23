<?php
// Site info in Footer
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[site_info_footer_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => true,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[site_info_footer_toggle]', array(
	'label'      => __('Show Site Information and SearchBAR logo?', 'sesha'),
	'section'    => 'section_footer_options',
	'settings'   => 'sesha[site_info_footer_toggle]',
	'type'     	 => 'checkbox'
));

// Contact Details in Footer
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[menu_footer_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => true,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[menu_footer_toggle]', array(
	'label'      => __('Show Menu?', 'sesha'),
	'section'    => 'section_footer_options',
	'settings'   => 'sesha[menu_footer_toggle]',
	'type'     	 => 'checkbox'
));

// Contact Details in Footer
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[contact_details_footer_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => true,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[contact_details_footer_toggle]', array(
	'label'      => __('Show Contact Details?', 'sesha'),
	'section'    => 'section_footer_options',
	'settings'   => 'sesha[contact_details_footer_toggle]',
	'type'     	 => 'checkbox'
));

// Social Media in Footer
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[social_media_footer_toggle]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		 => true,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[social_media_footer_toggle]', array(
	'label'      => __('Show Social Media?', 'sesha'),
	'section'    => 'section_footer_options',
	'settings'   => 'sesha[social_media_footer_toggle]',
	'type'     	 => 'checkbox'
));


// Footer Heading - Contact
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[footer_contact]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'wp_filter_nohtml_kses'

));

$wp_customize->add_control('sesha[footer_contact]', array(
	'label'      => __('Contact', 'sesha'),
	'section'    => 'section_footer_options',
	'settings'   => 'sesha[footer_contact]',
));

// Footer Heading - Menu
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[footer_menu]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'wp_filter_nohtml_kses'

));

$wp_customize->add_control('sesha[footer_menu]', array(
	'label'      => __('Menu', 'sesha'),
	'section'    => 'section_footer_options',
	'settings'   => 'sesha[footer_menu]',
));

// Footer Heading - Newsletter
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[footer_widgets]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'wp_filter_nohtml_kses'

));

$wp_customize->add_control('sesha[footer_widgets]', array(
	'label'      => __('Widgets', 'sesha'),
	'section'    => 'section_footer_options',
	'settings'   => 'sesha[footer_widgets]',
));

// Footer Heading - Social
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[footer_social]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'wp_filter_nohtml_kses'

));

$wp_customize->add_control('sesha[footer_social]', array(
	'label'      => __('Social', 'sesha'),
	'section'    => 'section_footer_options',
	'settings'   => 'sesha[footer_social]',
));



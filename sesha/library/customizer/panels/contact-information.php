<?php
// Contact Information
// ----------------------------------------------------------------------------


// Telephone
$wp_customize->add_setting('sesha[telephone]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('sesha[telephone]', array(
	'label'      => __('Telephone Number', 'sesha'),
	'section'    => 'section_contact_information',
	'settings'   => 'sesha[telephone]',
));

// Mobile Number
$wp_customize->add_setting('sesha[mobile]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('sesha[mobile]', array(
	'label'      => __('Mobile Number', 'sesha'),
	'section'    => 'section_contact_information',
	'settings'   => 'sesha[mobile]',
));



// Fax
$wp_customize->add_setting('sesha[fax]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('sesha[fax]', array(
	'label'      => __('Fax Number', 'sesha'),
	'section'    => 'section_contact_information',
	'settings'   => 'sesha[fax]',
));



// Email
$wp_customize->add_setting('sesha[email]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'sanitize_email',
));

$wp_customize->add_control('sesha[email]', array(
	'label'      => __('Email Address', 'sesha'),
	'section'    => 'section_contact_information',
	'settings'   => 'sesha[email]',
	'type'       => 'email'
));



// Physical Address
$wp_customize->add_setting('sesha[address]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'wp_kses'
));

$wp_customize->add_control('sesha[address]', array(
	'label'      => __('Physical Address', 'sesha'),
	'section'    => 'section_contact_information',
	'settings'   => 'sesha[address]',
	'type'       => 'textarea'
));
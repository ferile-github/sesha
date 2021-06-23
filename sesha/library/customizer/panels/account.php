<?php
// Footer Heading - Contact Message
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[account_banner]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'sanitize_callback' => 'sesha_sanitize_image'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sesha[account_banner]', array(
	'label'      => __('My Account Banner', 'sesha'),
	'section'    => 'section_account',
	'settings'   => 'sesha[account_banner]',
)));
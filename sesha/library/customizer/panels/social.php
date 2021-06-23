<?php
// Social Media
// ----------------------------------------------------------------------------
$wp_customize->add_setting( 'sesha[social_facebook]', array(
	'default' => 'https://facebook.com/',
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'

) );
$wp_customize->add_control( 'social_facebook', array(
	'type' => 'url',
	'label' => __( 'Facebook', 'sesha' ),
	'section' => 'section_social',
	'settings'   => 'sesha[social_facebook]'
) );


$wp_customize->add_setting( 'sesha[social_twitter]', array(
	'default' => 'https://twitter.com/',
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'sesha[social_twitter]', array(
	'type' => 'url',
	'label' => __( 'Twitter', 'sesha' ),
	'section' => 'section_social',
	'settings'   => 'sesha[social_twitter]'
) );


$wp_customize->add_setting( 'sesha[social_pinterest]', array(
	'default' => 'https://pinterest.com/',
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'sesha[social_pinterest]', array(
	'type' => 'url',
	'label' => __( 'Pinterest', 'sesha' ),
	'section' => 'section_social',
	'settings'   => 'sesha[social_pinterest]'
) );


$wp_customize->add_setting( 'sesha[social_linkedin]', array(
	'default' => 'https://linkedin.com/',
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'sesha[social_linkedin]', array(
	'type' => 'url',
	'label' => __( 'Linkedin', 'sesha' ),
	'section' => 'section_social',
	'settings'   => 'sesha[social_linkedin]'
) );


$wp_customize->add_setting( 'sesha[social_youtube]', array(
	'default' => 'https://youtube.com/',
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'sesha[social_youtube]', array(
	'type' => 'url',
	'label' => __( 'Youtube', 'sesha' ),
	'section' => 'section_social',
	'settings'   => 'sesha[social_youtube]'
) );


$wp_customize->add_setting( 'sesha[social_instagram]', array(
	'default' => 'https://instagram.com/',
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'sesha[social_instagram]', array(
	'type' => 'url',
	'label' => __( 'Instagram', 'sesha' ),
	'section' => 'section_social',
	'settings'   => 'sesha[social_instagram]'
) );

$wp_customize->add_setting( 'sesha[social_whatsapp]', array(
	'default' => 'https://api.whatsapp.com/',
	'type' => 'option',
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'sesha[social_whatsapp]', array(
	'type' => 'url',
	'label' => __( 'WhatsApp', 'sesha' ),
	'section' => 'section_social',
	'settings'   => 'sesha[social_whatsapp]'
) );


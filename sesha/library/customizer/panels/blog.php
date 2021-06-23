<?php
// Blog Layout
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[blog_layout_columns]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'blog-column-left',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[blog_layout_columns]', array(
	'label'      => __('Blog Column Layout', 'sesha'),
	'section'    => 'section_blog',
	'settings'   => 'sesha[blog_layout_columns]',
	'type'       => 'radio',
	'choices'    => array(
		'blog-column-left' => 'Left Aligned Column',
		'blog-column-right' => 'Right Aligned Column'
	),
));



// Blog post listing layout
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[blog_post_listing_layout]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> 'blog-post-listing-row',
	'sanitize_callback' => 'sesha_sanitize_radio'
));

$wp_customize->add_control('sesha[blog_post_listing_layout]', array(
	'label'      => __('Blog Posts Listing Layout', 'sesha'),
	'section'    => 'section_blog',
	'settings'   => 'sesha[blog_post_listing_layout]',
	'type'       => 'radio',
	'choices'    => array(
		'blog-post-listing-row' => 'Row Layout',
		'blog-post-listing-grid' => 'Grid Layout',
	),
));



// Blog Thumbnails
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[blog_show_thumbnail]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> false,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[blog_show_thumbnail]', array(
	'label'      => __('Show Blog Thumbnails', 'sesha'),
	'section'    => 'section_blog',
	'settings'   => 'sesha[blog_show_thumbnail]',
	'type'       => 'checkbox'
));

// Blog sticky sidebar
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[blog_sticky_sidebar]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> false,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[blog_sticky_sidebar]', array(
	'label'      => __('Sidebar sticks to the page as you scroll down?', 'sesha'),
	'section'    => 'section_blog',
	'settings'   => 'sesha[blog_sticky_sidebar]',
	'type'       => 'checkbox',
));

// Blog Posted Date
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[blog_show_posted_date]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> false,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[blog_show_posted_date]', array(
	'label'      => __('Show Posted Date', 'sesha'),
	'section'    => 'section_blog',
	'settings'   => 'sesha[blog_show_posted_date]',
	'type'       => 'checkbox',
));

// Blog Categories
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[blog_show_posted_categories]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> false,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[blog_show_posted_categories]', array(
	'label'      => __('Show Categories', 'sesha'),
	'section'    => 'section_blog',
	'settings'   => 'sesha[blog_show_posted_categories]',
	'type'       => 'checkbox',
));

// Blog tags
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[blog_show_posted_tags]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> false,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[blog_show_posted_tags]', array(
	'label'      => __('Show Tags', 'sesha'),
	'section'    => 'section_blog',
	'settings'   => 'sesha[blog_show_posted_tags]',
	'type'       => 'checkbox',
));

// Blog Author
// ----------------------------------------------------------------------------
$wp_customize->add_setting('sesha[blog_show_posted_author]', array(
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default' 		=> false,
	'sanitize_callback' => 'sesha_sanitize_checkbox'
));

$wp_customize->add_control('sesha[blog_show_posted_author]', array(
	'label'      => __('Show Author', 'sesha'),
	'section'    => 'section_blog',
	'settings'   => 'sesha[blog_show_posted_author]',
	'type'       => 'checkbox',
));


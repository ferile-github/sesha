<?php
function sesha_customize_register($wp_customize) {
	// Add Section
	// ----------------------------------------------------------------------------
	$wp_customize->add_panel( 'sesha_panel', array(
		'priority'       => 1,
		'title'          => 'Sesha Theme Builder'
	) );


	// Add Panels
	// ----------------------------------------------------------------------------
	$wp_customize->add_section( 'section_masthead_options', array(
		'title' => __( 'Masthead Options', 'sesha' ),
		'panel' => 'sesha_panel',
	) );


	$wp_customize->add_section('section_blog', array(
		'title'    => __('Blog', 'sesha'),
		'panel' => 'sesha_panel',
		'priority' => 200
	));
	$wp_customize->add_section('section_footer_options', array(
		'title'    => __('Footer Options', 'sesha'),
		'panel' => 'sesha_panel',
		'priority' => 300
	));

	$wp_customize->add_section( 'section_contact_information', array(
		'title' => __( 'Contact Information', 'sesha' ),
		'panel' => 'sesha_panel',
	) );

	$wp_customize->add_section( 'section_social', array(
		'title' => __( 'Social Media Links', 'sesha' ),
		'panel' => 'sesha_panel',
	) );


	if(check_for_woocommerce()) {
		$wp_customize->add_section('section_pdp', array(
			'title'    => __('Product Details', 'sesha'),
			'panel' => 'sesha_panel',
			'priority' => 400
		));
		$wp_customize->add_section('section_plp', array(
			'title'    => __('Product Listing', 'sesha'),
			'panel' => 'sesha_panel',
			'priority' => 500
		));
		$wp_customize->add_section('section_account', array(
			'title'    => __('Member Account', 'sesha'),
			'panel' => 'sesha_panel',
			'priority' => 600
		));
	}



	// Add Sections
	// ----------------------------------------------------------------------------
	if(check_for_woocommerce()) {
		require_once( 'panels/pdp.php' );
		require_once( 'panels/plp.php' );
		require_once( 'panels/account.php' );
	}

	require_once( 'panels/masthead-layout.php' );
	require_once( 'panels/masthead-options.php' );

	require_once( 'panels/blog.php' );
	require_once( 'panels/social.php' );
	require_once( 'panels/contact-information.php' );
	require_once( 'panels/footer.php' );


}
add_action( 'customize_register', 'sesha_customize_register');
<?php
// Reference : https://www.advancedcustomfields.com/resources/acf_register_block_type/
if(function_exists('acf_register_block')) {
	function acf_block_callback($block) {
		$slug = str_replace('acf/', '', $block['name']);
		$path = get_stylesheet_directory();
		if( file_exists($path . "/template-parts/blocks/block-{$slug}.php") ) {
			include( $path . "/template-parts/blocks/block-{$slug}.php" );
		}
	}
	function acf_enqueue_stylesheet() {
		if(is_admin()) {
			wp_enqueue_style( 'acf-blocks-styles', get_stylesheet_directory_uri() . '/library/css/acf-blocks.css' );
		}
	}

	function sesha_acf_blocks_init() {
		// acf_register_block(array(
		// 	'name' => 'example',
		// 	'title' => __('Example ACF Block'),
		// 	'description' => __('Example ACF Block'),
		// 	'render_callback' => 'acf_block_callback',
		// 	'category' => 'common',
		// 	'mode' => 'preview',
		// 	'icon' => array(
		// 	'background' => '#fff',
		// 		'foreground' => '#ed706f',
		// 		'src' => 'heart',
		// 	),
		// 	'enqueue_assets' => 'acf_enqueue_stylesheet',
		// 	'keywords' => array('example', 'acf'),
		// 	'supports' => array(
		// 		'align' => false, // Disabled Alignment options
		// 		'mode' => false,  // Disabled Edit option
		// 	),
		// ));


		acf_register_block(array(
			'name' => 'faq',
			'title' => __('FAQ', 'sesha'),
			'description' => __('FAQ', 'sesha'),
			'render_callback' => 'acf_block_callback',
			'category' => 'common',
			'icon' => array(
				'background' => '#fff',
				'foreground' => '#ed706f',
				'src' => 'analytics',
			),
			'keywords' => array('faq', 'acf'),
			'supports' => array(
				'align' => false
			),
		));

		acf_register_block(array(
			'name' => 'content-box',
			'title' => __('Content Box', 'sesha'),
			'description' => __('Content Box', 'sesha'),
			'render_callback' => 'acf_block_callback',
			'category' => 'common',
			'icon' => array(
				'background' => '#fff',
				'foreground' => '#ed706f',
				'src' => 'analytics',
			),
			'keywords' => array('content', 'acf'),
			'supports' => array(
				'align' => false
			),
		));

		acf_register_block(array(
			'name' => 'adaptive-image',
			'title' => __('Adaptive Image', 'sesha'),
			'description' => __('Adaptive Image', 'sesha'),
			'render_callback' => 'acf_block_callback',
			'category' => 'common',
			'mode' => 'edit',
			'icon' => array(
				'background' => '#0f6bb4',
				'foreground' => '#ffffff',
				'src' => 'images-alt',
			),
			'keywords' => array('adaptive', 'image', 'acf'),
			'supports' => array(
				'align' => false
			),
		));

		acf_register_block(array(
			'name' => 'slideshow-images',
			'title' => __('Image Slideshow', 'sesha'),
			'description' => __('A Slideshow of images', 'sesha'),
			'render_callback' => 'acf_block_callback',
			'category' => 'common',
			'mode' => 'edit',
			'icon' => array(
				'background' => '#0f6bb4',
				'foreground' => '#ffffff',
				'src' => 'format-gallery',
			),
			'enqueue_assets' => 'acf_enqueue_stylesheet',
			'keywords' => array('slideshow', 'acf'),
			'supports' => array(
				'align' => false
			),
		));

		acf_register_block(array(
			'name' => 'video-block',
			'title' => __('Video Block', 'sesha'),
			'description' => __('Video Block', 'sesha'),
			'render_callback' => 'acf_block_callback',
			'category' => 'common',
			'mode' => 'edit',
			'icon' => array(
				'background' => '#0f6bb4',
				'foreground' => '#ffffff',
				'src' => 'format-video',
			),
			'enqueue_assets' => 'acf_enqueue_stylesheet',
			'keywords' => array('video', 'acf'),
			'supports' => array(
				'align' => false
			),
		));

	}

	add_action('acf/init', 'sesha_acf_blocks_init');
}


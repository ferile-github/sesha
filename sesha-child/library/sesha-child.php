<?php
// Get the theme rollin'
// -------------------------------------------------------------------------------
function launch_sesha_child() {

	// Add new sidebars
	add_action( 'widgets_init', 'sesha_sidebar_init' );

	// launching this stuff after theme setup
	sesha_theme_support_child();

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Site Settings',
			'menu_title'	=> 'Site Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}

	add_action( 'wp_enqueue_scripts', 'sesha_extend_scripts_and_styles' );

}


// Extend CSS and JS assets loading
// -------------------------------------------------------------------------------
function sesha_extend_scripts_and_styles() {
	// Add additional scripts here...
	// wp_register_script( 'sesha-js-custom', '...', array(), '' );
	// wp_enqueue_script( 'sesha-js-custom' );
}


// Call filters and actions
// -------------------------------------------------------------------------------
add_action( 'after_setup_theme', 'launch_sesha_child' );


// Get page ID, used for banners
// -------------------------------------------------------------------------------
function get_banner_id($term) {
	$ID = '';

	if($term === null) {
		return false;
	} else {
		if( is_archive() && ( isset($term->taxonomy) ) ) {
			// Are we on a taxonomy archive page?
			$ID = $term->taxonomy . '_' . $term->term_id;
		} elseif( isset($term->term_id) ) {
			// Are we on a single page?
			$ID = $term->ID;
		} elseif( is_home() || is_date() || is_category() || ( is_search() && $_GET['post_type'] === 'post' ) ) {
			// Handle Blog posts page
			if( get_option( 'page_for_posts' ) ) {
				$ID = get_option( 'page_for_posts' );
			}
		} elseif ( check_for_woocommerce() && is_shop() ) {
			if( get_option( 'woocommerce_shop_page_id' ) ) {
				$ID = get_option( 'woocommerce_shop_page_id' );
			}
		}

		return $ID;
	}
}



// Theme Suppport
// -------------------------------------------------------------------------------
function sesha_theme_support_child() {
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'sesha' ),   // Main nav in header
			'mobile-nav' => __( 'Mobile Only Menu', 'sesha' ),   // Mobile only menu
			'footer-links' => __( 'The Footer Menu', 'sesha' ), // Secondary nav in footer
		)
	);

	add_theme_support( 'disable-custom-colors' );

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'White', 'sesha' ),
			'slug'  => 'white',
			'color'	=> '#ffffff',
		),
		array(
			'name'  => __( 'Black', 'sesha' ),
			'slug'  => 'black',
			'color'	=> '#000000',
		),
		array(
			'name'  => __( 'Teal', 'sesha' ),
			'slug'  => 'teal',
			'color'	=> '#199eda',
		),
		array(
			'name'  => __( 'Blue', 'sesha' ),
			'slug'  => 'blue',
			'color' => '#0f6bb4',
		),
		array(
			'name'  => __( 'Navy', 'sesha' ),
			'slug'  => 'navy',
			'color' => '#005280',
		),
		array(
			'name'	=> __( 'Indigo', 'sesha' ),
			'slug'	=> 'indigo',
			'color'	=> '#083c65',
		),
		array(
			'name'	=> __( 'Green', 'sesha' ),
			'slug'	=> 'green',
			'color'	=> '#26b787',
		),
		array(
			'name'	=> __( 'Yellow', 'sesha' ),
			'slug'	=> 'yellow',
			'color'	=> '#fed24c',
		),
	) );

}


// Sidebars
// -------------------------------------------------------------------------------
function sesha_sidebar_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'sesha' ),
		'id' => 'sidebar',
		'description' => __( 'Widgets that appear in the blog sidebar', 'sesha' ),
		'before_widget' => '<div id="%1$s" class="sidebar__item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebar__heading">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer', 'sesha' ),
		'id' => 'footer',
		'description' => __( 'Widgets that appear in the Footer', 'sesha' ),
		'before_widget' => '<div id="%1$s" class="mb-3 footer__item / %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer__title">',
		'after_title'   => '</h2>',
	) );
}




// Author sesha_get_author_details
// -------------------------------------------------------------------------------
function sesha_get_author_details() {
	if(get_the_author_posts() > 1)  {
		$author_posts = 'Posts';
	} else {
		$author_posts = 'Post';
	};


	printf("
		<figure class='author__wrapper'>
			<img src='%s' class='author__avatar'>
			<a href='mailto:%s' class='author__link'>%s</a> |
			<a href='%s' class='author__posts'>%s %s</a>
		</figure>
		",
		get_avatar_url(get_the_author_meta('ID')),
		get_the_author_meta('user_email'),
		get_the_author_meta('display_name'),
		get_author_posts_url(get_the_author_meta('ID')),
		get_the_author_posts(),
		$author_posts
	);
}


// This removes the annoying […] to a Read More link
// -------------------------------------------------------------------------------
function sesha_excerpt_more($more) {
	global $post;
	// edit here if you like
	return ' &hellip; <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="'. __( 'Read ', 'sesha' ) . esc_attr( get_the_title( $post->ID ) ).'">'. __( 'Read more', 'sesha' ) .'</a>';
}
// cleaning up excerpt
add_filter( 'excerpt_more', 'sesha_excerpt_more' );



// Check for Woocommerce utility
// -------------------------------------------------------------------------------
function check_for_woocommerce() {
	if (!defined('WC_VERSION')) {
		return false;
	} else {
		return true;
	}
}
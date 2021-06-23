<?php
/**
 * Displays top navigation
 *
*/
?>
<nav role="navigation" id="site-navigation"  class="navbar-primary cascade-level-1" aria-label="<?php _e( 'Top Menu', 'sesha' ); ?>">

	<?php if( get_setting('user_details_bar_toggle') && check_for_woocommerce()  ) : ?>
	<div class="user-details__wrapper user-details__mobile / d-block d-md-none">
		<?php get_template_part('template-parts/masthead/masthead-user-details');  ?>
	</div>
	<?php endif; ?>


	<?php
		wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'container_class' => '',                 // class of container (should you choose to use it)
		'menu' => __( 'The Main Menu', 'sesha' ),  // nav name
		'menu_class' => 'level-1-list nav ',               // adding custom nav class
		'theme_location' => 'main-nav',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => '',                            // fallback function (if there is one)
		'walker' => new site_navigation_menu()
	));

	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'container_class' => '',                 // class of container (should you choose to use it)
		'menu' => __( 'Mobile Only Menu', 'sesha' ),  // nav name
		'menu_class' => 'level-1-list nav d-flex d-md-none',               // adding custom nav class
		'theme_location' => 'mobile-nav',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => '',                            // fallback function (if there is one)
		'walker' => new site_navigation_menu()
	));
	?>

	<?php if( get_setting('social_media_masthead_toggle') ) : ?>
	<div class="masthead-social-media__mobile / d-block d-md-none">
		<?php get_template_part('template-parts/social-media/social-media');  ?>
	</div>
	<?php endif; ?>
</nav>
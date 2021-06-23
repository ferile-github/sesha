<?php if( get_setting('footer_menu') ) : ?>
	<h2 class="footer__title">
		<?php echo get_setting('footer_menu'); ?>
	</h2>
<?php endif; ?>

<?php wp_nav_menu(array(
	'container' => false,                           // remove nav container
	'container_class' => '',                 // class of container (should you choose to use it)
	'menu' => __( 'The Footer Menu', 'sesha' ),  // nav name
	'menu_class' => 'footer__menu / nav',               // adding custom nav class
	'theme_location' => 'footer-links',
	'before' => '',                                 // before the menu
	'after' => '',                                  // after the menu
	'link_before' => '',                            // before each link
	'link_after' => '',                             // after each link
	'depth' => 0,                                   // limit the depth of the nav
	'fallback_cb' => '',                            // fallback function (if there is one)
	'walker' => new site_footer_menu()
));
?>
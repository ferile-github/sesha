<?php
// Inject CSS into the head of the webpage
// ----------------------------------------------------------------------------
add_action( 'wp_head' , 'sesha_dynamic_css' );
function sesha_dynamic_css() {
?>
<style id="customiser-styles">
:root {
	--sb-body-padding-desktop: <?php echo calculateFixedHeaderBodyPadding(); ?>;

	--sb-masthead-height: <?php echo get_setting('masthead_height').'px' ?>;
    --sb-masthead-height-reduced: <?php echo calculateReducedHeaderHeight('masthead_height').'px' ?>;

    --sb-masthead-user-messaging-height: <?php echo get_setting('masthead_user_details_height') .'px' ?>;

	--sb-masthead-logo-width: <?php echo get_setting('logo_width') .'px' ?>;
    --sb-masthead-logo-width-reduced: <?php echo calculateReducedHeaderHeight('logo_width').'px'; ?>;

	--sb-masthead-navbar-height: <?php echo get_setting('masthead_navbar_height') .'px' ?>;
}
</style>
<?php
}
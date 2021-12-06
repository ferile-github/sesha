<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */
$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<div class="custom-logo__wrapper" itemscope itemtype="http://schema.org/Organization">
	<a href="<?php echo get_home_url(); ?>">
		<?php if ($custom_logo) printSiteBrandLogo( $custom_logo[0] ) ?>
	</a>
</div>
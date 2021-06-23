<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$post_thumbnail_id 	= $product->get_image_id();
$html  				= wc_get_gallery_image_html( $post_thumbnail_id, true );
$attachment_ids 	= $product->get_gallery_image_ids();

if ( $attachment_ids && has_post_thumbnail() ) :

	if( get_setting('pdp_thumbnail_layout') === 'has-grid-thumbnail-gallery' ) :  ?>

	<div class="product_gallery__grid / row">
		<div class="col-6 col-sm-3 col-md-6 mb-2">
			<?php echo apply_filters( 'searchbar_single_product_image_thumbnail_html', $post_thumbnail_id ); ?>
		</div>
		<?php foreach ( $attachment_ids as $attachment_id ) : ?>
		<div class="col-6 col-sm-3 col-md-6 mb-2">
			<?php echo apply_filters( 'searchbar_single_product_image_thumbnail_html', $attachment_id ); ?>
		</div>
		<?php endforeach; ?>
	</div>

	<?php else :
		echo '<ol id="woocommerce-product-thumbnails" class="product_gallery__menu / nav">';
		echo '<li class="product_gallery__item is-active">';
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );
		echo '</li>';
		foreach ( $attachment_ids as $attachment_id ) :
			echo '<li class="product_gallery__item">';
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
			echo '</li>';
		endforeach;
		echo '</ol>';

		echo '<figure id="woocommerce-product-preview-mobile"></figure>';

	endif;

endif;
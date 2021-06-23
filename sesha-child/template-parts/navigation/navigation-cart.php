<?php
if( check_for_woocommerce() ) :
$count = WC()->cart->cart_contents_count;
?>

<div id="site-minicart" class="cart__dropdown / has-dropdown">
	<a class="btn-masthead-button / cart__toggle / js-toggle-dropdown" href="<?php  echo wc_get_cart_url(); ?>" title="<?php __( 'View your shopping cart', 'sesha' ); ?>">
		<div class="visually-hidden">
			<?php _e('Cart','sesha'); ?>
		</div>
		<span class="cart__toggle-count / js-minicart-counter">
			<?php echo esc_html( $count ); ?>
		</span>
		<i class="fa fa-shopping-bag" aria-hidden="true"></i>
		<i class="fa fa-close" aria-hidden="true"></i>
	</a>

	<?php if ( is_active_sidebar( 'cart' ) ) :  ?>
		<?php dynamic_sidebar( 'cart' ); ?>
	<?php endif; ?>
</div>

<div class="overlay__cart"></div>

<?php endif;
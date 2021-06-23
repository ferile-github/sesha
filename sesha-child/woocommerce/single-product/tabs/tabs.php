<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
$product_tabs_ui = get_setting('pdp_information_layout');

if ( !empty( $product_tabs ) ) : ?>

	<?php if ($product_tabs_ui === 'has-pdp-accordion') : ?>
	<div class="accordion" id="pdp-accordion">

	<?php
	$count = 0;
	if( sizeof($product_tabs) > 1 ) : // If we have more than one tabbed content available
	foreach ( $product_tabs as $key => $product_tab ) :
		if($count === 0) {
			$aria_exanded = 'true';
			$panel_class = 'show';
			$button_class = '';
		} else {
			$aria_exanded = 'false';
			$panel_class = '';
			$button_class = 'collapsed';
		}
	?>

		<div class="accordion-item">
			<h2 class="accordion-header" id="panel-<?php echo esc_attr( $key ); ?>-heading">
			<button class="accordion-button <?php echo $button_class ?>" type="button" data-bs-toggle="collapse" data-bs-target="#panel-<?php echo esc_attr( $key ); ?>" aria-expanded="<?php echo $aria_exanded ?>" aria-controls="panel-<?php echo esc_attr( $key ); ?>">
				<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
			</button>
			</h2>
			<div id="panel-<?php echo esc_attr( $key ); ?>" class="accordion-collapse collapse <?php echo $panel_class ?>" aria-labelledby="panel-<?php echo esc_attr( $key ); ?>-heading" data-bs-parent="#pdp-accordion">
				<div class="accordion-body">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
				</div>
			</div>
		</div>

	<?php  $count++; endforeach; endif; ?>

	</div>



	<?php elseif ($product_tabs_ui === 'has-pdp-tabs') : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<?php if( sizeof($product_tabs) > 1 ) : // If we have more than one tabbed content available ?>
		<ul class="nav nav-tabs wc-tabs" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="nav-item <?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a class="nav-link" href="#tab-<?php echo esc_attr( $key ); ?>">
					<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>


		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<?php if( sizeof($product_tabs) > 1 ) : // If we have more than one tabbed content available ?>
				<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
			<?php endif; ?>

				<?php
					if ( isset( $product_tab['callback'] ) ) {
						call_user_func( $product_tab['callback'], $key, $product_tab );
					}
				?>
			<?php if( sizeof($product_tabs) > 1 ) : // If we have more than one tabbed content available ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>


	<?php else : // No tabs or accordion ?>
		<div class="woocommerce-tabs wc-tabs-wrapper">
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>



<?php endif; ?>

<?php do_action( 'woocommerce_product_after_tabs' );
<?php
global $post;
$term = get_queried_object();
$colour_scheme = 	get_field('colour_scheme', $term);
$colour_text = 		get_field('colour_text', $term);

if(!empty($term->term_id)) :
	$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
	$image = wp_get_attachment_url( $thumbnail_id );
	if($image) :
?>
	<div class="plp__banner mb-3" style="background-color: <?php echo $colour_scheme ?>">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9">
				<header class="p-2" style="color: <?php echo $colour_text ?>">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="woocommerce-products-header__title page-title" style="color: <?php echo $colour_text ?>">
							<?php woocommerce_page_title(); ?>
						</h1>
					<?php endif; ?>
					<?php do_action( 'woocommerce_archive_description' ); ?>
				</header>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3">
				<img src="<?php echo $image ?>" alt="">
			</div>
		</div>

	</div>

<?php else : ?>

	<header class="woocommerce-products-header">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>

		<?php
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );
		?>

	</header>

<?php endif;endif;


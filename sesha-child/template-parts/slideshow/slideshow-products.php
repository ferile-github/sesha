<?php
$popular_products = new WP_Query(
	array(
		'posts_per_page' => 6,  
		'post_type' => 'product',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',   // taxonomy name
				'field' => 'slug',             // term_id, slug or name
				'terms' => 'popular-products', // term id, term slug or term name
			)
		)	
	)	
); 
?>

<section id="popular-products" class="section__homepage section__popular-products background__orange-texture">

	<div class="container">
	<?php if ($popular_products->have_posts()) :  ?>
		<h1 class="mb-5">Popular Products</h1>
		<div class="slideshow__products / js-product-slideshow">
		<?php while ($popular_products->have_posts()) : $popular_products->the_post();  ?>
			<div class="slideshow__products-slide">
				<?php
					$meta = get_post_meta($post->ID);			
					$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];		

				?>
			
				<img class="slideshow__products-thumbnail" src="<?php echo $thumbnail; ?>" alt="">		
				<div class="slideshow__products-item-details">
					<?php the_title('<h2 class="h3">','</h2>'); ?>
					<span class="price">
						<?php echo wc_price($meta['_price'][0]); ?>
					</span>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata();  ?>
			</div>
	<?php endif; ?>
	</div>

</section>
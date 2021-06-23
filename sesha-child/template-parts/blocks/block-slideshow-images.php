<?php
/**
 * Block Name: Images Slideshow
 */
?>

<?php if ( have_rows('images_slides') ) : ?>
<div class="js-images-slideshow / box-gutterless">
	<?php while( have_rows('images_slides') ) : the_row(); ?>
		<div class="slideshow__slide text-center">
			<img class="slideshow__slide-image img-expand" src="<?php echo get_sub_field('slide')['sizes']['large']; ?>" alt="<?php echo get_sub_field('slide')['alt']; ?>">
		</div>
	<?php endwhile; ?>
</div>
<?php endif; ?>
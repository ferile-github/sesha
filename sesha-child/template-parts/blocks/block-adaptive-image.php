<?php
/**
 * Block Name: Adpative Image
 */
?>

<?php if ( get_field('adaptive-image-desktop') ) : ?>
	<div class="text-center d-none d-sm-block">
		<img loading="lazy" src="<?php echo get_field('adaptive-image-desktop')['url']; ?>" alt="<?php echo get_field('adaptive-image-desktop')['alt']; ?>">
	</div>
<?php endif; ?>

<?php if ( get_field('adaptive-image-mobile') ) : ?>
	<div class="text-center d-block d-sm-none">
		<img loading="lazy" src="<?php echo get_field('adaptive-image-mobile')['url']; ?>" alt="<?php echo get_field('adaptive-image-mobile')['alt']; ?>">
	</div>
<?php endif; ?>
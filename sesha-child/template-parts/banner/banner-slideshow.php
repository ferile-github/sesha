<?php
$ID 	= get_banner_id( get_queried_object() );

if(class_exists('ACF') && have_rows('slideshow_banner', $ID) ) :
$index = 1;
?>
	<div class="slideshow__banner / js-slideshow has-menu-animation">
		<?php while( have_rows('slideshow_banner', $ID) ): the_row();
			$title = 	get_sub_field('slideshow_title');
			$link = 	get_sub_field('slideshow_link');
			$button = 	get_sub_field('slideshow_button_text');
		?>

			<div class="slideshow__banner-slide" id="banner-slide-<?php echo $index ?>">
				<?php if($title) :?>
				<div class="slideshow__banner-title-wrapper">
					<p class="slideshow__banner-title / h1 mb-5">
						<?php echo $title; ?>
					</p>

					<?php if($link) :?>
					<p>
						<a class="slideshow__banner-link / btn btn-primary btn-lg " href="<?php echo $link ?>">
							<?php echo $button ?>
						</a>
					</p>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>

		<?php $index++; endwhile; ?>
	</div>

	<div class="slideshow__pagination container position-relative"></div>
	<?php endif; ?>

	<?php
	// Media queries for each slide
	// --------------------------------------------------------
	if(class_exists('ACF') &&  have_rows('slideshow_banner', $ID) ) :
	$index = 1;
	?>
	<style>
	<?php
		while( have_rows('slideshow_banner', $ID) ): the_row();
		$image = get_sub_field('slideshow_image');
	?>
		@media (min-width: 800px) {
			#banner-slide-<?php echo $index ?> {
				background-image: url('<?php echo $image['url']  ?>');
			}
		}
		@media (max-width: 800px) {
			#banner-slide-<?php echo $index ?> {
				background-image: url('<?php echo $image['sizes']['medium_large'] ?>');
			}
		}
	<?php $index++; endwhile; ?>
	</style>
<?php endif;
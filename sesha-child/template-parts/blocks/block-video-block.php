<?php
/**
 * Block Name: Video Block
 */
?>

<?php if ( have_rows('video_blocks') ) : ?>
<div class="box-shaded p-4 box-gutterless">
<div class="row">
<?php while( have_rows('video_blocks') ) : the_row(); ?>
	<div class="col-sm-4">
		<div class="videoblock__item mb-3">

		<?php
			// the_sub_field('video');
			$video = get_sub_field('video');

			// use preg_match to find iframe src
			preg_match('/src="(.+?)"/', $video, $matches);
			$src = $matches[1];
			// add extra params to iframe src
			$params = array(
				'controls'    => 0,
				'hd'        => 1,
				'autohide'    => 1,
				'rel'    => 0,
				'modestbranding'    => 1,
				'showsearch'    => 0,
				'loop'    => 1
			);
			$new_src 	= add_query_arg($params, $src);
			$video 		= str_replace($src, $new_src, $video);
			$attributes = 'frameborder="0"';
			$video 		= str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
			echo $video;
			?>

			<div class="p-2 text-center">
				<header class="videoblock__header">
					<h2 class="h4 strong mb-2">
						<?php the_sub_field('title'); ?>
					</h2>
				</header>

				<?php if( get_sub_field('sub_title') ): ?>
				<p>
					<?php the_sub_field('sub_title'); ?>
				</p>
				<?php endif; ?>

				<?php if( get_sub_field('link') ): ?>
				<p class="mb-0">
					<a href="<?php the_sub_field('link'); ?>" class="btn btn-primary btn-lg" target="_blank" rel="noreferrer">
						<?php the_sub_field('button_text'); ?>
					</a>
				</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>
</div>
</div>
<?php endif; ?>

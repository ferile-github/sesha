<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-listing__item'); ?>>
	<div class="row">
		<?php if ( get_the_post_thumbnail() && get_setting('blog_show_thumbnail') === true ) : ?>
			<figure class="post-listing__thumbnail-wrapper / col-sm-6 col-md-4">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('thumbnail', ['class' => 'post-listing__thumbnail', 'alt' => get_the_title(), 'loading' => "lazy" ]);?>
				</a>
			</figure>
		<?php endif; ?>


		<div class="post-listing__summary / col">
			<h2 class="post-listing__header">
				<?php the_title(); ?>
			</h2>

			<?php if ( get_setting('blog_show_posted_date') || get_setting('blog_show_posted_author') === true ) : ?>
			<header class="post-listing__meta">
				<?php if ( get_setting('blog_show_posted_date') === true ) : ?>
				<p class="small mb-0">
					Posted:
					<?php echo sesha_time_link(); ?>
				</p>
				<?php endif; ?>

				<?php if ( get_setting('blog_show_posted_author') === true ) : ?>
				<p class="small mb-0">
					Author:
					<strong>
						<?php echo get_the_author_meta('display_name'); ?>
					</strong>
				</p>
				<?php endif; ?>
			</header>
			<?php endif; ?>

			<div class="post-listing__excerpt">
				<?php the_excerpt(); ?>
			</div>

			<footer class="post-listing__footer / d-flex d-block-xs justify-content-between align-items-center">
				<div class="mb-2 mb-sm-0">
				<?php if ( get_setting('blog_show_posted_categories') === true ) : ?>
					<p class="small mb-0">
						Categories:
						<?php sesha_get_taxonomy_items( get_the_category(), true ); ?>
					</p>
				<?php endif; ?>

				<?php if ( get_setting('blog_show_posted_tags') === true ) : ?>
					<p class="small mb-0">
						Tags:
						<?php sesha_get_taxonomy_items( get_the_tags(), true ); ?>
					</p>
				<?php endif; ?>
				</div>

				<p class="text-end mb-0">
					<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block-xs">
						Read More <i class="fa fa-arrow-right" aria-hidden="true"></i>
					</a>
				</p>

			</footer>

		</div>

	</div>

	<?php sesha_edit_link(); ?>

</article>

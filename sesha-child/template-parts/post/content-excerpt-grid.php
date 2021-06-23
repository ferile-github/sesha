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




<div class="col-sm-6 col-md-4 mb-3">
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-listing__item / card h-100'); ?>>

		<figure class="post-listing__thumbnail-wrapper / mb-0">
			<?php if ( get_the_post_thumbnail() && get_setting('blog_show_thumbnail') === true ) : ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('thumbnail', ['class' => 'post-listing__thumbnail / card-img-top', 'alt' => get_the_title(), 'loading' => "lazy" ]);?>
			</a>
			<?php endif; ?>
		</figure>


		<div class="post-listing__summary card-body">
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


			<?php if ( get_setting('blog_show_posted_categories') || get_setting('blog_show_posted_tags') === true ) : ?>
			<footer class="post-listing__footer / mb-2">
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
			</footer>
			<?php endif; ?>

			<p class="text-center mb-0">
				<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block">
					Read More <i class="fa fa-arrow-right" aria-hidden="true"></i>
				</a>
			</p>

		</div>

		<?php sesha_edit_link(); ?>

	</article>
</div>
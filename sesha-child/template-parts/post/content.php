<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-single__item mb-4 position-relative'); ?>>

	<header class="post-single__header / page-header">
		<h1 class="post-single__title / page-title mb-2">
			<?php the_title(); ?>
		</h1>

		<?php if ( get_setting('blog_show_posted_date') || get_setting('blog_show_posted_author') === true ) : ?>
		<div class="post-single__meta">
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
		</div>
		<?php endif; ?>
	</header>


	<?php if ( get_the_post_thumbnail() && get_setting('blog_show_thumbnail') === true ) : ?>
		<figure class="post-single__thumbnail-wrapper / text-center mb-0">
			<?php the_post_thumbnail('large', ['class' => 'post-single__thumbnail mb-3', 'alt' => get_the_title(), 'loading' => "lazy" ]);?>
		</figure>
	<?php endif; ?>

	<div class="post-single__content">
		<?php the_content(); ?>
	</div>


	<?php if ( get_setting('blog_show_posted_categories') || get_setting('blog_show_posted_tags') === true ) : ?>
	<footer class="post-single__footer / mb-2 mb-sm-0">
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

	<?php sesha_edit_link(); ?>

</article>

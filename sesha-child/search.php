<?php
/**
 * The template for displaying search results pages
 *
 */

get_header(); ?>

<?php global $wp_query; ?>

<header class="page-header">
	<h1 class="page-title">
		<?php echo $wp_query->found_posts; ?>
		Search results for
		<?php echo '"'.get_search_query().'"' ?>
	</h1>
</header>


<?php
$layout = get_setting('blog_post_listing_layout');

if($layout === 'blog-post-listing-grid') {
	$layout = 'excerpt-grid';
} else {
	$layout = 'excerpt-row';
}
?>

<div class="mb-3">
	<?php get_search_form(); ?>
</div>

<?php if ( have_posts() ) :	?>

	<?php if($layout === 'excerpt-grid') : ?>
		<div class="row justify-content-center">
	<?php endif ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/post/content', $layout); ?>
	<?php endwhile; ?>

	<?php if($layout === 'excerpt-grid') : ?>
		</div>
	<?php endif ?>

	<?php sesha_page_navi(); ?>

	<?php else : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sesha' ); ?></p>

<?php endif; ?>

<?php get_footer();

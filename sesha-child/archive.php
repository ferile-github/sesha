<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<header class="page-header">
	<h1 class="page-title">
		<?php single_term_title(); ?>
	</h1>
</header>
<?php endif; ?>

<?php
$layout = get_setting('blog_post_listing_layout');

if($layout === 'blog-post-listing-grid') {
	$layout = 'excerpt-grid';
} else {
	$layout = 'excerpt-row';
}

if ( have_posts() ) :	?>

<?php if($layout === 'excerpt-grid') : ?>
	<div class="row">
<?php endif ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'template-parts/post/content', $layout); ?>
<?php endwhile; ?>

<?php sesha_page_navi(); ?>

<?php
	else :
	get_template_part( 'template-parts/post/content', 'none' );
?>

<?php if($layout === 'excerpt-grid') : ?>
	</div>
<?php endif ?>

<?php endif; ?>

<?php get_footer();
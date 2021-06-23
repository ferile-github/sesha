<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 */

get_header(); ?>

<header class="page-header">
<?php if ( is_home() && ! is_front_page() ) : ?>
	<h1 class="page-title"><?php single_post_title(); ?></h1>
<?php else : ?>
	<h1 class="page-title"><?php _e( 'Posts', 'sesha' ); ?></h1>
<?php endif; ?>
</header>

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
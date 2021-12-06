<?php
/**
 * The template for displaying a Single Example Custom Post
 *
 */
get_header();
?>

<?php
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/post/content' );
endwhile;
?>

<?php get_footer();
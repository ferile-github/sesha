<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy

 */

get_header(); ?>

<?php
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/page/content', 'page' );
endwhile;
?>

<?php get_footer();
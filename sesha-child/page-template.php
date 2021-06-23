<?php
/*
 * Template Name: Custom Page Template
 * Description: Custom Page Template
 */
get_header(); ?>

<?php
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/page/content', 'page' );

endwhile; // End of the loop.
?>

<?php get_footer();

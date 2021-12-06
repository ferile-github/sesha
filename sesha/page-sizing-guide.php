<?php
/*
 * Template Name: Sizing Guide
 * Description: Custom template with only wordpress content field
 */ ?>

<?php
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/page/content', 'modal' );
endwhile;
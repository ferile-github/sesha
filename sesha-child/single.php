<?php
/**
 * The template for displaying all single posts
 *
 */
get_header();
?>

<?php
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/post/content', get_post_format() );

	the_post_navigation( array(
		'prev_text' => '<span class="sr-only"> %title </span>
			<span class="nav-title">
				<i class="fa fa-chevron-left" aria-hidden="true"></i> '. __( 'Previous Post', 'sesha' ) .'
			</span>',
		'next_text' => '<span class="sr-only"> %title </span>
			<span class="nav-title">
			' . __( 'Next Post', 'sesha' ) . ' <i class="fa fa-chevron-right" aria-hidden="true"></i></span>',
	) );

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;
?>

<?php get_footer();
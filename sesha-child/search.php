<?php
/**
 * The template for displaying search results pages
 *
 */

get_header(); ?>
	<header class="page-header">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'sesha' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php else : ?>
		<h1 class="page-title"><?php _e( 'Nothing Found', 'sesha' ); ?></h1>
	<?php endif; ?>
	</header>

	<?php
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) : the_post();

	/**
	* Run the loop for the search to output the results.
	* If you want to overload this in a child theme then include a file
	* called content-search.php and that will be used instead.
	*/
			get_template_part( 'template-parts/post/content', 'excerpt' );

		endwhile; // End of the loop.
		sesha_page_navi();
	else : ?>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sesha' ); ?></p>
		<?php get_search_form();
	endif;
	?>

<?php get_footer();

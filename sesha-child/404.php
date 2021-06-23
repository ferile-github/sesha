<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<header class="page-header">
	<h1 class="page-title text-center"><?php _e( 'Oops! That page cannnot be found.', 'sesha' ); ?></h1>
</header>

<div class="row justify-content-center">
	<div class="col-sm-8">

		<p>This page does not exist. Try searching for something or visit our homepage.</p>

		<div class="mb-4">
			<?php get_search_form(); ?>
		</div>

		<p class="text-center">
			<a href="/" class="btn btn-primary btn-large">Go Home</a>
		</p>

	</div>
</div>

<?php get_footer();
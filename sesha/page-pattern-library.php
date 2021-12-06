<?php
/*
 * Template Name: Pattern Library
 * Description: Style guide of page elements
 */
get_header(); ?>

<header class="page-header">
	<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
</header>

<?php get_template_part('pattern-library/swatches') ?>
<?php get_template_part('pattern-library/type') ?>
<?php get_template_part('pattern-library/buttons') ?>
<?php get_template_part('pattern-library/tables') ?>
<?php get_template_part('pattern-library/forms') ?>
<?php get_template_part('pattern-library/navs') ?>
<?php get_template_part('pattern-library/woocommerce') ?>

<style>
	.bs-docs-section {
		border: solid 1px silver;
		border-bottom: solid 3px var(--sb-secondary);
		padding: 1rem;
		padding-top: 0;
	}
	.bs-docs-title {
		margin: 0 -1rem;
		margin-bottom: 2rem;
		font-size: 1.5rem;
		background: var(--sb-primary);
		border-bottom: solid 3px var(--sb-secondary);
		color: var(--sb-white);
		padding: .8rem;
		text-transform: uppercase;
		position: sticky;
    	top: var(--sb-body-padding-desktop);
		z-index: 800;
	}
	.logged-in .bs-docs-title {
		top: calc(var(--sb-body-padding-desktop) + 32px);
	}

</style>


<?php get_footer();

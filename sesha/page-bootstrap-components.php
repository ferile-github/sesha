<?php
/*
 * Template Name: Bootstrap Components
 * Description: Style guide of Bootstrap components using JavaScript
 */
get_header(); ?>
<header class="page-header">
	<h1 class="page-title">
		<?php single_post_title(); ?>
	</h1>
</header>

<section class="mb-5">
	<h2>Accordion</h2>
	<?php get_template_part('bootstrap-components/accordion') ?>
</section>

<section class="mb-5">
	<h2>Modal</h2>
	<?php get_template_part('bootstrap-components/modal') ?>
</section>


<section class="mb-5">
	<h2>Tabs</h2>
	<?php get_template_part('bootstrap-components/tabs') ?>
</section>

<?php get_footer();

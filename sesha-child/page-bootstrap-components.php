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
	<?php include('bootstrap-components/accordion.php') ?>
</section>

<section class="mb-5">
	<h2>Modal</h2>
	<?php include('bootstrap-components/modal.php') ?>
</section>


<section class="mb-5">
	<h2>Tabs</h2>
	<?php include('bootstrap-components/tabs.php') ?>
</section>

<?php get_footer();

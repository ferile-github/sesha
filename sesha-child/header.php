<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<?php get_template_part('template-parts/header/header', 'head');  ?>
</head>
<?php get_template_part('template-parts/header/header-body-tag'); ?>
<?php get_template_part('template-parts/masthead/masthead'); ?>
<?php get_template_part('template-parts/banner/banner-slideshow'); ?>
<?php get_template_part('template-parts/layout/page-layout'); ?>
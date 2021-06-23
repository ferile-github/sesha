<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*/

?>
<?php get_sidebar(); ?>

<footer id="site-footer" class="site-footer / has-menu-animation  clearfix" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	<h1 class="visually-hidden">Footer</h1>
	<div class="container">
		<?php get_template_part('template-parts/footer/footer-main'); ?>
	</div>
</footer>


<div class="overlay__mobile-menu"></div>
<div id="modal-size-guide" class="sizing-guide__wrapper"></div>

<div class="d-xs-block / d-sm-none d-md-none d-lg-none"></div>
<div class="d-none d-sm-block / d-md-none d-lg-none"></div>
<div class="d-none d-md-block / d-lg-none"></div>
<div class="d-none d-lg-block"></div>

<?php wp_footer(); ?>

</body>
</html>

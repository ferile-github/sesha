<?php
$main = '<main id="site-content" class="site-content / has-menu-animation / clearfix" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">';
$sidebar_class  = $filters_class = '';


$GLOBALS['sidebar']['frontpage'] =
	is_front_page() && is_home();

$GLOBALS['sidebar']['staticfrontpage'] =
	is_front_page();

$GLOBALS['sidebar']['blog'] =
	is_home() ||
	( is_search() && isset( $_GET['post_type'] ) === 'post' ) ||
	is_date() ||
	is_category() ||
	is_tag();

$GLOBALS['sidebar']['woocommerce'] =
	( check_for_woocommerce() && is_product_category() ) ||
	( check_for_woocommerce() && is_shop() );

if ( is_active_sidebar( 'sidebar' ) ) {
	$sidebar_class = 'has-sidebar';
}
if ( is_active_sidebar( 'filters' ) ) {
	$filters_class = 'has-filters';
}
?>

<div id="anchor-top" class="anchor"></div>

<?php if ( $GLOBALS['sidebar']['frontpage'] ) : // Default homepage  ?>
<div id="site-content-wrapper" class="site-content__wrapper container / animated fadeIn ">
	<?php echo $main ?>

<?php elseif ( $GLOBALS['sidebar']['staticfrontpage'] ) :  // static homepage ?>
<div id="site-content-wrapper" class="site-content__wrapper container / animated fadeIn ">
	<?php echo $main ?>

<?php elseif ( $GLOBALS['sidebar']['blog'] ) : // blog page ?>
<div id="site-content-wrapper" class="site-content__wrapper container / animated fadeIn / <?php echo $sidebar_class ?> ">
	<?php echo $main ?>

<?php elseif ( is_singular('post') && is_active_sidebar( 'sidebar' ) ) : // Single blog post ?>
<div class="site-content__wrapper container / animated fadeIn / <?php echo $sidebar_class ?> ">
	<?php echo $main ?>

<?php elseif ( $GLOBALS['sidebar']['woocommerce'] ) : // WooCommerce listing page ?>
<div id="site-content-wrapper" class="site-content__wrapper container / animated fadeIn / <?php echo $filters_class ?>">
	<?php echo $main ?>
	<?php if( get_setting('plp_filters_layout') === 'has-vertical-filters-layout' ) dynamic_sidebar( 'active_filters' ); ?>

<?php else : //everything else ?>
<div id="site-content-wrapper" class="site-content__wrapper container / animated fadeIn">
	<?php echo $main ?>
<?php endif; ?>
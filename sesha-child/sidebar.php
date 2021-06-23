<?php
$sidebar = '<aside id="site-sidebar" class="site-sidebar / clearfix" role="complementary">';

if ( $GLOBALS['sidebar']['frontpage'] ) : // Default homepage  ?>
	</main>
</div> <!--  .container-->

<?php elseif ( $GLOBALS['sidebar']['staticfrontpage'] ) :  // static homepage ?>
	</main>
</div> <!--  .container-->

<?php elseif ( $GLOBALS['sidebar']['blog'] && is_active_sidebar( 'sidebar' ) ) : // blog page ?>
	</main>

	<?php echo $sidebar ?>
		<h1 class="visually-hidden">Sidebar</h1>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside>

</div> <!--  .container-->

<?php elseif ( $GLOBALS['sidebar']['woocommerce'] && is_active_sidebar( 'filters' ) ) : // WooCommerce listing page ?>
	</main>

	<?php echo $sidebar ?>
		<h1 class="visually-hidden">Sidebar</h1>
		<button class="js-toggle-filters-menu / btn btn-default btn-block-xs">
			Product Filters
			<i class="fa fa-bars"></i>
			<i class="fa fa-close"></i>
		</button>
		<div class="js-filters-panel-wrapper">
			<?php dynamic_sidebar( 'filters' ); ?>
		</div>
		<?php
		if( get_setting('plp_filters_layout') === 'has-horizontal-filters-layout' ) {
			dynamic_sidebar( 'active_filters' );
		} ?>
	</aside>
</div> <!--  .container-->

<?php else : //everything else ?>
	</main>
</div> <!--  .container-->
<?php endif; ?>
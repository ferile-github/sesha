<div class="col-sm mb-4 mb-sm-0">
	<?php if( get_setting('footer_widgets') ) : ?>
	<h2 class="footer__title">
		<?php echo get_setting('footer_widgets'); ?>
	</h2>
	<?php endif; ?>

	<div class="footer__col-widgets">
		<?php dynamic_sidebar( 'footer' ); ?>
	</div>
</div>

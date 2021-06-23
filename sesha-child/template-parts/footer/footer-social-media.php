
<div class="footer__col-social / col-sm mb-4 mb-sm-0">
	<?php if( get_setting('footer_social') ) : ?>
		<h2 class="footer__title">
			<?php echo get_setting('footer_social'); ?>
		</h2>
	<?php endif; ?>

	<div class="footer-social-media__wrapper / text-center">
		<?php get_template_part( 'template-parts/social-media/social-media' ); ?>
	</div>
</div>


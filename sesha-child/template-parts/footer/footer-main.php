<?php if( get_setting('menu_footer_toggle') ) : ?>
<nav class="footer__col-menu / mb-4">
	<?php get_template_part( 'template-parts/footer/footer-menu' ); ?>
</nav>
<?php endif; ?>

<div class="row align-items-start">
	<?php if( get_setting('contact_details_footer_toggle') ) : ?>
		<?php get_template_part( 'template-parts/footer/footer-contact-details' ); ?>
	<?php endif; ?>

	<?php if( get_setting('social_media_footer_toggle') ) : ?>
		<?php get_template_part( 'template-parts/footer/footer-social-media' ); ?>
	<?php endif; ?>

	<?php if(is_active_sidebar( 'footer' ) ) : ?>
		<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
	<?php endif; ?>
</div>

<?php if( get_setting('site_info_footer_toggle') ) : ?>
	<?php get_template_part( 'template-parts/footer/footer-site-info' ); ?>
<?php endif; ?>
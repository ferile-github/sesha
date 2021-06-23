<?php if(
	get_setting('footer_contact') ||
	get_setting('footer_contact') ||
	get_setting('telephone') ||
	get_setting('mobile') ||
	get_setting('fax') ||
	get_setting('email') ||
	get_setting('address') ) :
?>

<div class="footer__col-contact / col-sm mb-4 mb-sm-0">

	<?php if( get_setting('footer_contact') ) : ?>
		<h2 class="footer__title">
			<?php echo get_setting('footer_contact'); ?>
		</h2>
	<?php endif; ?>


	<p class="mb-0">
	<?php if( get_setting('telephone') ) : ?>
		<span class="contact__detail / contact__detail-tel">
		Telephone :
		<a href="tel:<?php echo get_setting('telephone'); ?>">
			<?php echo get_setting('telephone'); ?>
		</a>
		</span>
	<?php endif; ?>

	<?php if( get_setting('mobile') ) : ?>
		<span class="contact__detail / contact__detail-mobile">
		Mobile :
		<a href="tel:<?php echo get_setting('mobile'); ?>">
			<?php echo get_setting('mobile'); ?>
		</a>
		</span>
	<?php endif; ?>

	<?php if( get_setting('fax') ) : ?>
		<span class="contact__detail / contact__detail-fax">
		Fax :
		<?php echo get_setting('fax'); ?>
		</span>
	<?php endif; ?>

	<?php if( get_setting('email') ) : ?>
		<span class="contact__detail / contact__detail-email">
		Email :
		<a href="mail:<?php echo get_setting('email'); ?>">
			<?php echo get_setting('email'); ?>
		</a>
		</span>
	<?php endif; ?>
	</p>

	<?php if( get_setting('address') ) : ?>
		<p class="contact__detail contact__detail-address / mb-0"> Address : </p>
		<address class="contact__detail contact__detail-address / mb-0">
			<?php echo wpautop( get_setting('address'), true ); ?>
		</address>
	<?php endif; ?>

</div>
<?php endif; ?>
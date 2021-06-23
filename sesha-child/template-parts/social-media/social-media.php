<?php if(
	get_setting('social_facebook') ||
	get_setting('social_twitter') ||
	get_setting('social_instagram') ||
	get_setting('social_pinterest') ||
	get_setting('social_linkedin') ||
	get_setting('social_youtube') ||
	get_setting('social_whatsapp')
) : ?>

	<ul class="social-media__menu nav">
	<?php if( get_setting('social_facebook') ) : ?>
		<li>
			<a href="<?php echo get_setting('social_facebook'); ?>" class="social-icon" target="_blank" rel="noreferrer">
				<i class="fa fa-facebook-square" aria-hidden="true"></i>
				<span class="visually-hidden">Facebook</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if( get_setting('social_twitter') ) : ?>
		<li>
			<a href="<?php echo get_setting('social_twitter'); ?>" class="social-icon" target="_blank" rel="noreferrer">
				<i class="fa fa-twitter-square" aria-hidden="true"></i>
				<span class="visually-hidden">Twitter</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if( get_setting('social_instagram') ) : ?>
		<li>
			<a href="<?php echo get_setting('social_instagram'); ?>" class="social-icon" target="_blank" rel="noreferrer">
				<i class="fa fa-instagram" aria-hidden="true"></i>
				<span class="visually-hidden">Instagram</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if( get_setting('social_pinterest') ) : ?>
		<li>
			<a href="<?php echo get_setting('social_pinterest'); ?>" class="social-icon" target="_blank" rel="noreferrer">
				<i class="fa fa-pinterest-square" aria-hidden="true"></i>
				<span class="visually-hidden">Pinterest</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if( get_setting('social_linkedin') ) : ?>
		<li>
			<a href="<?php echo get_setting('social_linkedin'); ?>" class="social-icon" target="_blank" rel="noreferrer">
				<i class="fa fa-linkedin-square" aria-hidden="true"></i>
				<span class="visually-hidden">LinkedIn</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if( get_setting('social_youtube') ) : ?>
		<li>
			<a href="<?php echo get_setting('social_youtube'); ?>" class="social-icon" target="_blank" rel="noreferrer">
				<i class="fa fa-youtube" aria-hidden="true"></i>
				<span class="visually-hidden">Youtube</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if( get_setting('social_whatsapp') ) : ?>
		<li>
			<a href="<?php echo get_setting('social_whatsapp'); ?>" class="social-icon" target="_blank" rel="noreferrer">
				<i class="fa fa-whatsapp" aria-hidden="true"></i>
				<span class="visually-hidden">WhatsApp</span>
			</a>
		</li>
	<?php endif; ?>
	</ul>

<?php endif; ?>
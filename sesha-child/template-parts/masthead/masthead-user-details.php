
<ol class="user-details__menu / nav">
	<?php
	if ( is_user_logged_in() )	: $user_info = wp_get_current_user(); ?>
	<li class="user-details__item">
		<a class="user-details__link" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
			<?php _e('Welcome','sesha'); ?> <?php echo $user_info->display_name; ?>
		</a>
	</li>
	<?php else : ?>
	<li class="user-details__item">
		<a class="user-details__link" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
			<?php _e('Login / Register','sesha'); ?>
		</a>
	</li>
	<?php endif; ?>
</ol>

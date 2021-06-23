<header id="site-header" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

	<?php if( get_setting('messaging_header_toggle')  ) : ?>
	<div class="member__wrapper">
		<div class="container d-flex align-items-center">

			<?php if( get_setting('messaging_header') ) : ?>
				<?php get_template_part('template-parts/masthead/masthead-message');  ?>
			<?php endif; ?>

			<?php if( get_setting('user_details_bar_toggle') && check_for_woocommerce()  ) : ?>
			<div class="user-details__wrapper user-details__desktop / d-none d-md-flex">
				<?php get_template_part('template-parts/masthead/masthead-user-details');  ?>
			</div>
			<?php endif; ?>

			<?php if( get_setting('social_media_masthead_toggle') ) : ?>
			<div class="masthead-social-media__desktop / d-none d-md-flex">
				<?php get_template_part( 'template-parts/social-media/social-media' ); ?>
			</div>
			<?php endif; ?>

		</div>
	</div>
	<?php endif; ?>

	<div class="container site-header__inner">

		<div class="branding__wrapper">

			<?php get_template_part('template-parts/masthead/masthead-branding');  ?>

			<?php if( get_setting('masthead_search_layout') !== 'no-search' ) :
				get_template_part('template-parts/navigation/navigation-search');
			endif; ?>

			<?php if( get_setting('masthead_cart_layout') !== 'no-cart' ) :
				get_template_part('template-parts/navigation/navigation-cart');
			endif; ?>

			<?php get_template_part('template-parts/navigation/navigation-toggle');  ?>
		</div>

		<div class="site-navigation__wrapper">
			<?php get_template_part('template-parts/navigation/navigation');  ?>
		</div>

	</div>

</header>
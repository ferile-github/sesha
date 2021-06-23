<?php
/*
 * Template Name: Contact Us
 * Description: Contact Us Page Template
 */
get_header(); ?>

<header class="page-header">
	<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
</header>

<div class="row justify-content-center">
	<div class="col-sm-8 contact__wrapper / mb-4">
		<?php the_content(); ?>
	</div>

	<div class="col-sm-4">
	<?php if ( have_rows('contact_addresses') ) : ?>
		<?php while( have_rows('contact_addresses') ) : the_row(); ?>
		<div class="contact__address / mb-4">
			<h2 class="contact__address-title / h6 mb-2 text-uppercase strong">
				<?php the_sub_field('location'); ?>
			</h2>

			<address class="mb-2">
				<?php the_sub_field('address'); ?>
			</address>

			<?php if ( get_sub_field('contact_number') ) : ?>
			<p class="mb-2">
				Tel :
				<a href="tel:<?php echo get_sub_field('contact_number'); ?>">
					<?php echo get_sub_field('contact_number'); ?>
				</a>
			</p>
			<?php endif; ?>

			<?php if ( get_sub_field('google_map') ) : ?>
			<p class="mb-0">
				<a target="_blank" rel="noreferrer" class="btn btn-secondary" href="<?php the_sub_field('google_map'); ?>">Google Map</a>
			</p>
			<?php endif; ?>
		</div>

		<?php endwhile; ?>


	<?php endif; ?>
	</div>
</div>

<?php get_footer();
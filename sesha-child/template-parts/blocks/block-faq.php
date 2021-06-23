<?php
/**
 * Block Name: FAQ
 */
?>

<?php if ( have_rows('faq_group') ) : ?>
<div id="site-faq" class="faq__wrapper">
	<?php while( have_rows('faq_group') ) : the_row(); ?>

		<h2 class="faq__title / h3"><?php the_sub_field('title'); ?></h2>

		<div class="faq__group / flex-vertical mb-2">

		<?php if ( have_rows('faq') ) : ?>
		<?php while( have_rows('faq') ) : the_row(); ?>
			<div class="js-faq__question-answer / mb-2">
				<button class="js-faq__question / btn btn-secondary btn-lg mb-0 text-left">
					<?php the_sub_field('question'); ?>
				</button>

				<div class="js-faq__answer">
					<div class="faq__answer-padding">
						<?php the_sub_field('answer'); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>

		</div>
	<?php endwhile; ?>
</div>
<?php endif; ?>
<?php
/**
 * Block Name: Content Box
 */
?>

<?php if ( get_field('content_box') ) :
	$title_color 	= get_field('content_box_title_colour');
	$text_color 	= get_field('content_box_text_colour');
	$bg_color 		= get_field('content_box_background_colour');
?>

<div class="content-box__wrapper / box-padded" style="background-color: <?php echo $bg_color ?>; color: <?php echo $text_color ?>">

	<?php if ( get_field('content_box_title') ) : ?>
	<h1 class="content-box__title" style="color: <?php echo $title_color ?>">
		<?php echo get_field('content_box_title'); ?>
	</h1>
	<?php endif; ?>

	<div class="content-box__text">
		<?php echo get_field('content_box'); ?>
	</div>


</div>
<?php endif; ?>

<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */

?>

<div class="site-info / small clearfix text-center">
	<div class="container">
		&copy; <?php bloginfo( 'name' );  ?> <?php echo date('Y'); ?>

		<a href="https://searchbar.co.za" target="_blank" rel="noreferrer">
			<?php print_svg('/library/svg/searchbar_logo.svg'); ?>
		</a>
	</div>
</div>
<div class="search__dropdown / has-dropdown">
	<button aria-label="Search the website" class="btn-masthead-button / search__toggle / js-toggle-dropdown">
		<i class="fa fa-search" aria-hidden="true"></i>
		<i class="fa fa-close" aria-hidden="true"></i>
	</button>

	<div class="search__wrapper">
		<?php
		if( check_for_woocommerce() ) {
			get_product_search_form();
		} else {
			get_search_form();
		}
		?>
	</div>
</div>

<div class="overlay__search"></div>
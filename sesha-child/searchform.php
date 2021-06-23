<form role="search" method="get" class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search_label" class="visually-hidden"><?php _e('Search for:','sesha'); ?></label>
	<input type="search" id="search_label" name="s" placeholder="Search for ..." class="search__input / js-focus-search"  autocomplete="off" />

	<button type="submit" class="search__button btn btn-reset" >
		<span class="visually-hidden">
			<?php _e('Search','sesha'); ?>
		</span>

		<i class="fa fa-search" aria-hidden="true"></i>

	</button>
</form>
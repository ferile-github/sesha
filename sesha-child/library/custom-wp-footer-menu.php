<?php
// Customise the HTML for the main menu
// -------------------------------------------------------------------------------
class site_footer_menu extends Walker_Nav_Menu {
	// Displays start of a level. E.g '<ul>'
	// @see Walker::start_lvl()
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class='nav'>\n";
	}

	// Displays end of a level. E.g '</ul>'
	// @see Walker::end_lvl()
	public function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "</ul>\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		if( $depth > 0) return false;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		// $class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li class="menu-footer__item">';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ' class="menu-footer__link"';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		// $item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
?>
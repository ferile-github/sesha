<?php
function launch_sesha_cleanup() {
	// cleaning up random code around images
	add_filter( 'the_content', 'sesha_filter_ptags_on_images' );
}

add_action( 'after_setup_theme', 'launch_sesha_cleanup' );


$theme_styles = '';

// Add Theme Colours to Editor Dashboard
// -------------------------------------------------------------------------------
function sesha_add_theme_colors($theme_colors) {
	$editor_color_palette = array();


	foreach ($theme_colors as $key => $value) {
		array_push($editor_color_palette, array(
			'name'  => __( $key, 'sesha' ),
			'slug'  => strtolower($key),
			'color'	=> $value
		));

		$GLOBALS['theme_styles'] .= '.has-'.strtolower($key).'-color {
			color: var(--sb-'.strtolower($key).')
		}
		.has-'.strtolower($key).'-background-color {
			background-color: var(--sb-'.strtolower($key).')
		}';
	};

	// Enqueue child scripts and styles
	add_action( 'wp_enqueue_scripts', 'sesha_theme_colors_stylesheet' );

	add_theme_support( 'editor-color-palette', $editor_color_palette); // Add editor theme styles to dashboard

}


function sesha_theme_colors_stylesheet() {
	wp_register_style( 'theme-colors', false );  // Register a stylesheet for theme color styles
	wp_enqueue_style( 'theme-colors' ); // Enqueue the inline stylesheet
	wp_add_inline_style( 'theme-colors', $GLOBALS['theme_styles'] ); // Add inline styles for theme from editor dashboard
}



// Body Class
// -------------------------------------------------------------------------------
function sesha_update_body_class() {
	$ID = get_banner_id(get_queried_object());
	$body_class = 'no-banner ';

	if(class_exists('ACF') && have_rows('slideshow_banner', $ID) ) {
		$body_class = 'has-banner ';
	}

	// PDP
	if(!get_setting('pdp_toggle_product_zoom')) {
		$body_class.='has-product-zoom ';
	} else {
		$body_class.=get_setting('pdp_toggle_product_zoom').' ';
	}

	if(!get_setting('pdp_information_layout')) {
		$body_class.='has-pdp-tabs ';
	} else {
		$body_class.=get_setting('pdp_information_layout').' ';
	}

	if(!get_setting('pdp_related_products_layout')) {
		$body_class.='has-vertical-related-products ';
	} else {
		$body_class.=get_setting('pdp_related_products_layout').' ';
	}

	if(!get_setting('pdp_thumbnail_layout')) {
		$body_class.='has-vertical-thumbnail-gallery ';
	} else {
		$body_class.=get_setting('pdp_thumbnail_layout').' ';
	}

 	// PLP
	if(!get_setting('plp_filters_layout')) {
		$body_class.='has-vertical-filters-layout ';
	} else {
		$body_class.=get_setting('plp_filters_layout').' ';
	}

	// Masthead
	if(!get_setting('masthead_search_layout')) {
		$body_class.='has-standard-search ';
	} else {
		$body_class.=get_setting('masthead_search_layout').' ';
	}
	if(!get_setting('masthead_cart_layout')) {
		$body_class.='has-dropdown-cart ';
	} else {
		$body_class.=get_setting('masthead_cart_layout').' ';
	}
	if(!get_setting('masthead_fixed')) {
		$body_class.='no-fixed-masthead ';
	} else {
		$body_class.='has-fixed-masthead ';
	}
	if(!get_setting('masthead_reduced')) {
		$body_class.='no-reduced-masthead ';
	} else {
		$body_class.='has-reduced-masthead ';
	}
	if(!get_setting('user_details_bar_toggle')) {
		$body_class.='no-user-details-bar ';
	} else {
		$body_class.='has-user-details-bar ';
	}


	// Blog
	if(!get_setting('blog_layout_columns')) {
		$body_class.='blog-column-left ';
	} else {
		$body_class.=get_setting('blog_layout_columns').' ';
	}
	if(!get_setting('blog_post_listing_layout')) {
		$body_class.='blog-post-listing-row ';
	} else {
		$body_class.=get_setting('blog_post_listing_layout').' ';
	}

	if(!get_setting('blog_sticky_sidebar')) {
		$body_class.='blog-sticky-sidebar-disabled ';
	} else {
		$body_class.='blog-sticky-sidebar-enabled ';
	}


	return $body_class;
}



// Random Cleanup items
// -------------------------------------------------------------------------------
// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function sesha_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}



// Returns an accessibility-friendly link to edit a post or page.
// -------------------------------------------------------------------------------
//  This also gives us a little context about what exactly we're editing
//  (post or page?) so that users understand a bit more where they are in terms
//  of the template hierarchy and their content. Helpful when/if the single-page
//  layout with multiple posts/pages shown gets confusing.
function sesha_edit_link() {
	$link = edit_post_link(
		sprintf(
			__( '<span class="dashicons dashicons-edit va-middle"></span>  <span class="va-middle">Edit</span> <span class="visually-hidden"> "%s"</span>', 'sesha' ),
			get_the_title()
		),
		'',
		''
	);
	return $link;
}

// Gets a nicely formatted string for the published date.
 // -------------------------------------------------------------------------------
 function sesha_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date()
	);
	return $time_string;
}


// Print out all taxonomy items
// -------------------------------------------------------------------------------
function sesha_get_taxonomy_items($categories, $hascommas = false, $listitems = false, $classname = 'nav') {
	if( !empty($categories) ) {
		if($listitems) echo '<ol class="'.$classname.'">';
		foreach ($categories as $key => $value) {
			if($listitems) echo '<li>';
				echo '<a href="'.get_category_link($value).'">';
				echo $value->name;
				if( count($categories) - 1 !== $key && $hascommas ) {
					echo ', ';
				}
				echo '</a>';
			if($listitems) echo '</li>';
		}
		if($listitems) echo '</ol>';
	} else {
		echo 'None';
	}
}

// Usage :
// sesha_get_taxonomy_items( get_the_category(), false, true, 'classname mb-3'  );
// sesha_get_taxonomy_items( get_the_tags(), false, true, 'classname mb-3'  );
// sesha_get_taxonomy_items( get_terms('custom_taxonomy'), false, true, 'classname mb-3' );



// Better Comments for posts
// -------------------------------------------------------------------------------
function better_comments( $comment, $args, $depth ) {
	global $post;
	$author_id = $post->post_author;
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments. ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment__item mb-2 clearfix'); ?>>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'sesha' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :
		// Proceed with normal comments. ?>
	<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class('comment__item mb-2 clearfix'); ?>>
		<article id="comment-<?php comment_ID(); ?>" <?php comment_class('comment__reply clearfix'); ?>>
			<div class="row xs-row middle">
				<div class="comment__author vcard">
					<?php echo get_avatar( $comment, 100 ); ?>
				</div><!-- .comment-author -->

				<div class="comment__details / col col-xs">
					<header class="comment__meta mb-2">
						<h2 class="h4 inline-block mb-0"><?php comment_author_link(); ?></h2>

						<span class="comment__date">
						<?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							sprintf( _x( '%1$s', '1: date', 'sesha' ), get_comment_date() )
						); ?> <?php esc_html_e( 'at', 'sesha' ); ?> <?php comment_time(); ?>
						</span><!-- .comment-date -->
					</header><!-- .comment-meta -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment__awaiting-moderation mb-2 small">
							<em>
								<?php esc_html_e( 'Your comment is awaiting moderation.', 'sesha' ); ?>
							</em>
						</p>
					<?php endif; ?>

					<div class="comment__content">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->

					<?php comment_reply_link( array_merge( $args, array(
						'reply_text' => esc_html__( 'Reply to this message', 'sesha' ),
						'depth'      => $depth,
						'max_depth'	 => $args['max_depth'] )
					) ); ?>

				</div><!-- .comment-details -->
			</div>
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // End comment_type check.
}



// Pagination
// -------------------------------------------------------------------------------
function sesha_page_navi($total_pages=NULL) {
	if(!$total_pages) {
		global $wp_query;
		$total_pages = $wp_query->max_num_pages;
	}
	$bignum = 999999999;
	echo '<nav class="pagination__posts">';
	echo paginate_links( array(
		'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
		'format'       => '',
		'current'      => max( 1, get_query_var('paged') ),
		'total'        => $total_pages,
		'prev_text'    => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
		'next_text'    => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
		'type'         => 'list',
		'end_size'     => 3,
		'mid_size'     => 3
	) );
	echo '</nav>';
}


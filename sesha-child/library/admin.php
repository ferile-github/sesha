<?php
// Remove Admin stuff
// -------------------------------------------------------------------------------
function sesha_remove_menu_pages() {
	// remove_menu_page('edit.php?post_type=page'); // Pages
	// remove_menu_page('edit.php'); // Posts
	// remove_menu_page('upload.php'); // Media
	remove_menu_page('link-manager.php'); // Links
	remove_menu_page('edit-comments.php'); // Comments
}

function sesha_remove_dashboard_meta() {
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'sesha_remove_menu_pages' );
add_action( 'admin_init', 'sesha_remove_dashboard_meta' );

function sesha_filter_rest_data( $data, $post, $request ) {
	$_data = $data->data;
	$params = $request->get_params();

	if ( ! isset( $params['id'] ) ) {
		unset( $_data['date'] );
		unset( $_data['slug'] );
		unset( $_data['date_gmt'] );
		unset( $_data['modified'] );
		unset( $_data['modified_gmt'] );
		unset( $_data['template'] );
		unset( $_data['guid'] );
		unset( $_data['type'] );
		unset( $_data['yoast_head'] );
	};

	$data->data = $_data;
	return $data;
};

function sesha_post_taxonomies($data, $post, $request) {
	$_data = $data->data;
	$_data['taxonomy_terms'] = get_the_terms( $_data['id'], 'custom_taxonomy_slug' );

	$data->data = $_data;
	return $data;
}

function sesha_post_featured_image_json( $data, $post, $context ) {
	$featured_image_id = $data->data['featured_media'];
	$featured_image_url = wp_get_attachment_image_src( $featured_image_id, 'original' );
	$medium = wp_get_attachment_image_src( $featured_image_id, 'medium' );
	$thumbnail = wp_get_attachment_image_src( $featured_image_id, 'thumbnail' );


	if( $featured_image_url ) {
		$data->data['featured_image_url'] = $featured_image_url[0];
		$data->data['featured_image_medium'] = $medium[0];
		$data->data['featured_image_thumbnail'] = $thumbnail[0];
	}

	return $data;
};

add_filter( 'rest_prepare_CPTSLUG', 'sesha_filter_rest_data', 10, 3 );
add_filter( 'rest_prepare_CPTSLUG', 'sesha_post_taxonomies', 10, 3 );
add_filter( 'rest_prepare_CPTSLUG', 'sesha_post_featured_image_json', 10, 3 );

add_filter( 'rest_prepare_CPTSLUGTAXONOMY', 'sesha_filter_rest_data', 10, 3 );
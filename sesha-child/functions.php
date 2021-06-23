<?php
define('SESHA_THEME_BUILDER', false);

// LOAD ADMIN
// require_once( 'library/admin.php' );

// LOAD CHILD CORE
require_once( 'library/sesha-child.php' );
// CUSTOMIZER
require_once( 'library/customizer.php' );
// WOOCOMMERCE CUSTOMISATIONS
if(check_for_woocommerce()) {
	require_once( 'library/custom-woocommerce.php' );
}
// CUSTOMISE MAIN MENU HTML OUTPUT
require_once( 'library/custom-wp-main-menu.php' );
// CUSTOMISE FOOTER MENU HTML OUTPUT
require_once( 'library/custom-wp-footer-menu.php' );
// CUSTOM MCE WYSIWYG EDITOR STYLES
require_once( 'library/custom-mce.php' );
// ACF BLOCKS
require_once( 'library/acf-blocks.php' );
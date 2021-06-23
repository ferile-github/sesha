<?php
// Any additional customizer options for child theme
// ----------------------------------------------------------------------------
add_action( 'wp_head' , 'sesha_dynamic_css_extend' );
function sesha_dynamic_css_extend() {
?>
<style id="customiser-styles-extended">
:root {
	--sb-variable-name: 'value';
}
</style>
<?php
}
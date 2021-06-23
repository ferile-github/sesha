<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */

?>
<div class="modal fade" id="sizingModal" tabindex="-1" aria-labelledby="sizingModalLabel">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="h5 modal-title" id="sizingModalLabel">
			<?php the_title(); ?>
		</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  	<?php the_content(); ?>
      </div>
    </div>
  </div>
</div>
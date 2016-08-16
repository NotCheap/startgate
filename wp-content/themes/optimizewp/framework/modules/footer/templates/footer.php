<?php
/**
 * Footer template part
 */

optimize_mikado_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<?php if (!isset($_REQUEST["ajax_req"]) || $_REQUEST["ajax_req"] != 'yes') { ?>
<footer <?php optimize_mikado_class_attribute($footer_classes); ?>>
	<div class="mkdf-footer-inner clearfix">

		<?php

		if($display_footer_top) {
			optimize_mikado_get_footer_top();
		}
		if($display_footer_bottom) {
			optimize_mikado_get_footer_bottom();
		}
		?>

	</div>
</footer>
<?php } ?>

</div> <!-- close div.mkdf-wrapper-inner  -->
</div> <!-- close div.mkdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
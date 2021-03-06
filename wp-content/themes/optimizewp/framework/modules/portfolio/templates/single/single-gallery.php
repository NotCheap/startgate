<div class="mkdf-portfolio-gallery">
	<?php
	$media = optimize_mikado_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="mkdf-portfolio-media">
			<?php foreach($media as $single_media) : ?>
				<div class="mkdf-portfolio-single-media">
					<?php optimize_mikado_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<div class="mkdf-two-columns-75-25 clearfix">
	<div class="mkdf-column1">
		<div class="mkdf-column-inner">
			<?php optimize_mikado_portfolio_get_info_part('content'); ?>
		</div>
	</div>
	<div class="mkdf-column2">
		<div class="mkdf-column-inner">
			<div class="mkdf-portfolio-info-holder">
				<?php
				//get portfolio custom fields section
				optimize_mikado_portfolio_get_info_part('custom-fields');

				//get portfolio date section
				optimize_mikado_portfolio_get_info_part('date');

				//get portfolio tags section
				optimize_mikado_portfolio_get_info_part('tags');

				//get portfolio share section
				optimize_mikado_portfolio_get_info_part('social');
				?>
			</div>
		</div>
	</div>
</div>
<?php
if(!function_exists('optimize_mikado_register_side_area_sidebar')) {
	/**
	 * Register side area sidebar
	 */
	function optimize_mikado_register_side_area_sidebar() {

		register_sidebar(array(
			'name'          => 'Side Area',
			'id'            => 'sidearea', //TODO Change name of sidebar
			'description'   => 'Side Area',
			'before_widget' => '<div id="%1$s" class="widget mkdf-sidearea %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="mkdf-sidearea-widget-title">',
			'after_title'   => '</h4>'
		));

	}

	add_action('widgets_init', 'optimize_mikado_register_side_area_sidebar');

}

if(!function_exists('optimize_mikado_side_menu_body_class')) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function optimize_mikado_side_menu_body_class($classes) {

		if(is_active_widget(false, false, 'mkdf_side_area_opener')) {

			if(optimize_mikado_options()->getOptionValue('side_area_type')) {

				$classes[] = 'mkdf-'.optimize_mikado_options()->getOptionValue('side_area_type');

				if(optimize_mikado_options()->getOptionValue('side_area_type') === 'side-menu-slide-with-content') {

					$classes[] = 'mkdf-'.optimize_mikado_options()->getOptionValue('side_area_slide_with_content_width');

				}

			}

		}

		return $classes;

	}

	add_filter('body_class', 'optimize_mikado_side_menu_body_class');
}


if(!function_exists('optimize_mikado_get_side_area')) {
	/**
	 * Loads side area HTML
	 */
	function optimize_mikado_get_side_area() {

		if(is_active_widget(false, false, 'mkdf_side_area_opener')) {

			$parameters = array(
				'show_side_area_title' => optimize_mikado_options()->getOptionValue('side_area_title') !== '' ? true : false,
				//Dont show title if empty
			);

			optimize_mikado_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);

		}

	}

}

if(!function_exists('optimize_mikado_get_side_area_title')) {
	/**
	 * Loads side area title HTML
	 */
	function optimize_mikado_get_side_area_title() {

		$parameters = array(
			'side_area_title' => optimize_mikado_options()->getOptionValue('side_area_title')
		);

		optimize_mikado_get_module_template_part('templates/parts/title', 'sidearea', '', $parameters);

	}

}

if(!function_exists('optimize_mikado_get_side_menu_icon_html')) {
	/**
	 * Function that outputs html for side area icon opener.
	 * Uses $optimize_mikado_IconCollections global variable
	 * @return string generated html
	 */
	function optimize_mikado_get_side_menu_icon_html() {

		$icon_html                       = '';
		$sidearea_default_opener_enabled = optimize_mikado_options()->getOptionValue('side_area_enable_default_opener') === 'yes';

		if($sidearea_default_opener_enabled) {
			$icon_html = '<span class="mkdf-side-area-icon">
							<span class="mkdf-sai-first-line"></span>
							<span class="mkdf-sai-second-line"></span>
							<span class="mkdf-sai-third-line"></span>
			              </span>';
		} elseif(optimize_mikado_options()->getOptionValue('side_area_button_icon_pack') !== '') {
			$icon_pack = optimize_mikado_options()->getOptionValue('side_area_button_icon_pack');

			$icons              = optimize_mikado_icon_collections()->getIconCollection($icon_pack);
			$icon_options_field = 'side_area_icon_'.$icons->param;

			if(optimize_mikado_options()->getOptionValue($icon_options_field) !== '') {

				$icon      = optimize_mikado_options()->getOptionValue($icon_options_field);
				$icon_html = optimize_mikado_icon_collections()->renderIcon($icon, $icon_pack);

			}

		}

		return $icon_html;
	}
}
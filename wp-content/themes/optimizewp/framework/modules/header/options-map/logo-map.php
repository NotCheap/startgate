<?php

if ( ! function_exists('optimize_mikado_logo_options_map') ) {

	function optimize_mikado_logo_options_map() {

		optimize_mikado_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => 'Logo',
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = optimize_mikado_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => 'Logo'
			)
		);

		optimize_mikado_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => 'Hide Logo',
				'description' => 'Enabling this option will hide logo image',
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#mkdf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = optimize_mikado_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		optimize_mikado_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
				'label' => 'Logo Image - Default',
				'description' => 'Choose a default logo image to display ',
				'parent' => $hide_logo_container
			)
		);

		optimize_mikado_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
				'label' => 'Logo Image - Dark',
				'description' => 'Choose a default logo image to display ',
				'parent' => $hide_logo_container
			)
		);

		optimize_mikado_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
				'label' => 'Logo Image - Light',
				'description' => 'Choose a default logo image to display ',
				'parent' => $hide_logo_container
			)
		);

		optimize_mikado_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo_white.png",
				'label' => 'Logo Image - Sticky',
				'description' => 'Choose a default logo image to display ',
				'parent' => $hide_logo_container
			)
		);

		optimize_mikado_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
				'label' => 'Logo Image - Mobile',
				'description' => 'Choose a default logo image to display ',
				'parent' => $hide_logo_container
			)
		);

	}

	//add_action( 'optimize_mikado_options_map', 'optimize_mikado_logo_options_map');

}
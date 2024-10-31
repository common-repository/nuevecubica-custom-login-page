<?php // ADMIN MENU PAGE

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ADD TOP MENU ITEM
function nuevecubica_clp_plugins_main_page() {
	add_menu_page(
		'nuevecubica Custom Login Page',
		esc_html__('Custom Login','nuevecubica-custom-login-page'),
		'manage_options',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_display_settings_page',
		plugins_url( '/assets/images/logo-nc-menu-icon.svg', __DIR__ )
	);
}

add_action( 'admin_menu', 'nuevecubica_clp_plugins_main_page' );


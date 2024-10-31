<?php
/**
 * Plugin Name:         nuevecubica | Custom Login Page
 * Plugin URI:          https://nuevecubica.net/product/custom-login-page
 * Description:         nuevecubica |<strong> Custom Login Page</strong> is an excellent WordPress <strong>Login Page Customizer plugin </strong>. You can change the logo, customize the message, change the color background, change the login and password container of the login page, and much more.
 * Version:             1.0
 * Stable tag:          1.0
 * Requires at least:   4.5
 * Tested up to:        5.4.1
 * Contributors:        alex vaught,
 * Donate link:         Https://donate.com
 * Author:              Alex Vaught
 * License:             GPL2+
 * Author URI:          https://www.nuevecubica.dev
 * Text Domain:         nuevecubica-custom-login-page
 * Domain Path:         /languages
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version
 * 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * with this program. If not, visit: https://www.gnu.org/licenses/
 */

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// VARS
define( 'CLP_PLUGIN_URL_NAME', 'nuevecubica-custom-login-page' );
define( 'CLP_PLUGIN_NAME', 'nuevecubica | Custom Login Page' );


// ADD CKEDITOR FROM VENDOR
add_action( 'admin_enqueue_scripts', 'nuevecubica_clp_setting_up_ckeditor' );
function nuevecubica_clp_setting_up_ckeditor() {
	wp_enqueue_script( CLP_PLUGIN_URL_NAME . '1', plugins_url( '/assets/vendor/ckeditor/ckeditor.js', __FILE__ ) );
}

// ADD ADMIN STYLES AND SCRIPTS
add_action( 'admin_enqueue_scripts', 'nuevecubica_clp_setting_up_scripts' );
function nuevecubica_clp_setting_up_scripts() {
	wp_enqueue_style( CLP_PLUGIN_URL_NAME, plugins_url( '/assets/css/' . CLP_PLUGIN_URL_NAME . '_main.min.css', __FILE__ ) );
	wp_enqueue_script( CLP_PLUGIN_URL_NAME, plugins_url( '/assets/js/' . CLP_PLUGIN_URL_NAME . '_main.min.js', __FILE__ ) );
}

// ADD LOGIN PAGE STYLES AND SCRIPTS
add_action( 'login_enqueue_scripts', 'nuevecubica_clp_logins_scripts' );
function nuevecubica_clp_logins_scripts() {
	wp_enqueue_style( CLP_PLUGIN_URL_NAME, plugins_url( '/assets/css/nc-clp-login.css', __FILE__ ), array(), null, 'screen' );
	wp_enqueue_script( CLP_PLUGIN_URL_NAME, plugins_url( '/assets/js/nc-clp-login.js', __FILE__ ), array(), null, true );
}


// LOAD TEST DOMAIN

add_action( 'plugins_loaded', 'nuevecubica_clp_load_textdomain' );
function nuevecubica_clp_load_textdomain() {
	load_plugin_textdomain( 'nuevecubica-custom-login-page', false, plugin_dir_path( __FILE__ ) . 'languages/' );
}


// if admin area
if ( is_admin() ) {
	// include plugin dependencies
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
}

// CORE FUNCTIONS | include dependencies: admin and public.
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';

/**
 * PLUGIN OPTIONS DEFAULT
 */
function nc_clp_plugin_options_default() {
	return array(
		'custom_link_logo_text'            => esc_html__( 'Powered by nuevecubica', 'nuevecubica-custom-login-page' ),
		'custom_url'                   => 'https://nuevecubica.dev/',
		'custom_logo'                  => plugins_url( '/assets/images/logo-nuevecubica-square-white.png', __FILE__ ),
		'custom_page_bg_color'         => 'rgba(0,0,0,0.5)',
		'custom_page_bg_image'         => plugins_url( '/assets/images/bg-background-demo.jpg', __FILE__ ),
		'custom_message'               => __( '<h1>Custom login page</h1><p>make with love</p><small>----------</small>' ),
		'custom_message_color'         => '#ffffff',
		'custom_form_bg_color'         => 'rgba(0,0,0,0.5)',
		'custom_form_label_color'      => '#ffffff',
		'custom_form_input_text_color' => '#ffffff',
		'custom_form_input_bg_color'   => 'rgba(255,255,255,0.2)',
		'custom_form_border_radius'    => '10',
		'custom_form_box_shadow'        => '2px 2px 16px 7px rgba(255,255,255,0.4)',
		'custom_link_bg_color'          => 'rgba(30,115,190,0.85)',
		'custom_link_text_color'        => '#ffffff',
		'custom_link_bg_padding'        => '10',
		'custom_link_border_radius'     => '12'

	);
}


// remove options on uninstall
function nc_clp_on_uninstall() {

	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	delete_option( 'nc_clp_options' );

}

register_uninstall_hook( __FILE__, 'nc_clp_on_uninstall' );

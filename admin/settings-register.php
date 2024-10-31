<?php

	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * SETTINGS REGISTER
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 *
	 * set the page plugin options, sections and fields
	 *
	 */

/** disable direct file access */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nc_clp_register_settings() {
	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * REGISTER THE SETTINGS
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 */

	/**
	 * string   $option_group,
	 * string   $option_name,
	 * callable $sanitize_callback = ''
	 */

	register_setting(
		'nc_clp_options',
		'nc_clp_options',
		'nc_clp_callback_validate_options'
	);

	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * REGISTER THE SECTION
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 */

	/**
	 * add_settings_section:
	 * string   $id,
	 * string   $title,
	 * callable $callback,
	 * string   $page
	 */

	/** LOGO */
	add_settings_section(
		'nc_clp_section_logo',
		__( 'Customize Logo' ),
		'nc_clp_callback_section_logo',
		CLP_PLUGIN_URL_NAME
	);
	/** MESSAGE */
	add_settings_section(
		'nc_clp_section_message',
		__( 'Customize Message' ),
		'nc_clp_callback_section_message',
		CLP_PLUGIN_URL_NAME
	);
	/** PAGE BACKGROUND */
	add_settings_section(
		'nc_clp_section_bg',
		__( 'Customize Background' ),
		'nc_clp_callback_section_bg',
		CLP_PLUGIN_URL_NAME
	);
	/** FORMS */
	add_settings_section(
		'nc_clp_section_form',
		__( 'Customize Forms' ),
		'nc_clp_callback_section_forms',
		CLP_PLUGIN_URL_NAME
	);
	/** LINKS */
	add_settings_section(
		'nc_clp_section_links',
		__( 'Customize Links' ),
		'nc_clp_callback_section_links',
		CLP_PLUGIN_URL_NAME
	);

	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * REGISTER THE FIELDS
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 */

	/**
	 * add_settings_field:
	 * string   $id,
	 * string   $title,
	 * callable $callback,
	 * string   $page,
	 * string   $section = 'default',
	 * array    $args = []
	 */





	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * LOGO
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 */

	/** 1. Custom LINK TEXT  */
	add_settings_field(
		'custom_link_logo_text',
		esc_html__( 'Custom link text', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_field_text',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_logo',
		[ 'id' => 'custom_link_logo_text', 'label' => esc_html__( 'Custom link text of the header logo above the login form', 'nuevecubica-custom-login-page' ) ]
	);

	/** 2. Custom URL  */
	add_settings_field(
		'custom_url',
		esc_html__( 'Custom URL' ),
		'nc_clp_callback_field_text',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_logo',
		[ 'id' => 'custom_url', 'label' => esc_html__( 'Custom URL for the login logo link', 'nuevecubica-custom-login-page' ) ]
	);
	/** 3. Custom LOGO IMAGE  */
	add_settings_field(
		'custom_logo',
		esc_html__( 'Custom Logo Image' ),
		'nc_clp_callback_find_file',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_logo',
		[ 'id' => 'custom_logo', 'label' => esc_html__( 'Custom image for the login logo', 'nuevecubica-custom-login-page' ) ]
	);
	//todo: next update
	/** 4. Custom LOGO  SIZE future add */
	/*add_settings_field(
		'custom_logo_size',
		esc_html__( 'Custom Logo size' ),
		'nc_clp_callback_field_number',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_logo',
		[ 'id' => 'custom_logo_size', 'label' => esc_html__( 'Custom size in pixels for the login logo', 'nuevecubica-custom-login-page' ) ]
	);*/

	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * MESSAGE
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 */

	/** 1. Custom HTML MESSAGE  */
	add_settings_field(
		'custom_message',
		esc_html__( 'Custom Message', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_field_textarea',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_message',
		[ 'id' => 'custom_message', 'label' => __( 'Custom text and/or markup' ) ]
	);
	/** 2. Custom MESSAGE COLOR  */
	add_settings_field(
		'custom_message_color',
		esc_html__( 'Custom message color', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_color_picker',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_message',
		[ 'id' => 'custom_message_color', 'label' => esc_html__( 'Custom message Color', 'nuevecubica-custom-login-page' ) ]
	);

	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * PAGE BACKGROUND
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 */

	/** 1. Custom BACKGROUND COLOR  */
	add_settings_field(
		'custom_page_bg_color',
		esc_html__( 'Custom page background color', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_color_picker',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_bg',
		[ 'id' => 'custom_page_bg_color', 'label' => esc_html__( 'Custom background Color', 'nuevecubica-custom-login-page' ) ]
	);
	/** 2. Custom IMAGE BACKGROUND COLOR  */
	add_settings_field(
		'custom_page_bg_image',
		esc_html__( 'Custom page image background', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_find_file',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_bg',
		[ 'id' => 'custom_page_bg_image', 'label' => esc_html__( 'Custom page image background', 'nuevecubica-custom-login-page' ) ]
	);

	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * FORMS
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 */

	/** 1. Custom FORM BACKGROUND COLOR  */
	add_settings_field(
		'custom_form_bg_color',
		esc_html__( 'Form color background', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_color_picker',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_form',
		[ 'id' => 'custom_form_bg_color', 'label' => esc_html__( 'Form background Color', 'nuevecubica-custom-login-page' ) ]
	);

	/** 2. Custom FORM LABEL COLOR  */
	add_settings_field(
		'custom_form_label_color',
		esc_html__( 'Form label color', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_color_picker',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_form',
		[ 'id' => 'custom_form_label_color', 'label' => esc_html__( 'Form text Color', 'nuevecubica-custom-login-page' ) ]
	);

	/** 3. Custom FORM INPUT TEXT COLOR  */
	add_settings_field(
		'custom_form_input_text_color',
		esc_html__( 'Form input text color', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_color_picker',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_form',
		[ 'id' => 'custom_form_input_text_color', 'label' => esc_html__( 'Form input text Color', 'nuevecubica-custom-login-page' ) ]
	);
	/** 4. Custom FORM INPUT BACKGROUND COLOR  */
	add_settings_field(
		'custom_form_input_bg_color',
		esc_html__( 'Form input bg color', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_color_picker',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_form',
		[ 'id' => 'custom_form_input_bg_color', 'label' => esc_html__( 'Form input BG Color', 'nuevecubica-custom-login-page' ) ]
	);
	/** 5. Custom FORM BORDER RADIUS  */
	add_settings_field(
		'custom_form_border_radius',
		esc_html__( 'Form border radius', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_field_number',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_form',
		[ 'id' => 'custom_form_border_radius', 'label' => esc_html__( 'Form input BG Color', 'nuevecubica-custom-login-page' ) ]
	);
	/** 5. Custom FORM BOX SHADOW  */
	add_settings_field(
		'custom_form_box_shadow',
		esc_html__( 'Form box shadow', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_box_shadow',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_form',
		[ 'id' => 'custom_form_box_shadow', 'label' => esc_html__( 'Form box shadow generator', 'nuevecubica-custom-login-page' ) ]
	);
	/**
	 *+++++++++++++++++++++++++++++++++++++++++++++++++
	 * LINKS
	 * ++++++++++++++++++++++++++++++++++++++++++++++++
	 */

	/** 1. Custom LINK TEXT COLOR  */
	add_settings_field(
		'custom_link_text_color',
		esc_html__( 'Custom link text color', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_color_picker',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_links',
		[ 'id' => 'custom_link_text_color', 'label' => esc_html__( 'Form link text color', 'nuevecubica-custom-login-page' ) ]
	);
	/** 2. Custom LINK BACKGROUND COLOR  */
	add_settings_field(
		'custom_link_bg_color',
		esc_html__( 'Custom link background color', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_color_picker',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_links',
		[ 'id' => 'custom_link_bg_color', 'label' => esc_html__( 'Form link bg color', 'nuevecubica-custom-login-page' ) ]
	);
	/** 3. Custom LINK PADDING COLOR  */
	add_settings_field(
		'custom_link_bg_padding',
		esc_html__( 'Custom link background padding', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_field_number',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_links',
		[ 'id' => 'custom_link_bg_padding', 'label' => esc_html__( 'Form link background padding in pixels', 'nuevecubica-custom-login-page' ) ]
	);

	/** 4. Custom LINK BACKGROUND RADIUS  */
	add_settings_field(
		'custom_link_border_radius',
		esc_html__( 'Custom link border radius', 'nuevecubica-custom-login-page' ),
		'nc_clp_callback_field_number',
		CLP_PLUGIN_URL_NAME,
		'nc_clp_section_links',
		[ 'id' => 'custom_link_border_radius', 'label' => esc_html__( 'Form link border radius in pixels', 'nuevecubica-custom-login-page' ) ]
	);


}

add_action( 'admin_init', 'nc_clp_register_settings' );




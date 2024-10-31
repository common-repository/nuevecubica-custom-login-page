<?php // CORE FUNCTIONS

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// custom login logo url
function nc_clp_custom_login_url( $url ) {
	$options = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	if ( isset( $options['custom_url'] ) && ! empty( $options['custom_url'] ) ) {
		$url = esc_url( $options['custom_url'] );
	}
	?>
    <!-- ADDED CUSTOM LOGO -->
	<?php
	return $url;
}

add_filter( 'login_headerurl', 'nc_clp_custom_login_url' );

// custom login logo img
function nc_clp_custom_login_img( $img ) {
	$options = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	if ( isset( $options['custom_logo'] ) && ! empty( $options['custom_logo'] ) ) {
		$logo = esc_url( $options['custom_logo'] );
		?>
        <!-- NC CLP START STYLES -->
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo $logo; ?>);
                /*height: 300px;*/
                width: 300px;
                background-size: contain;
                background-position: center center;
                background-repeat: no-repeat;
                padding-bottom: 0;
            }
        </style>
		<?php
	}
}

add_filter( 'login_headertext', 'nc_clp_custom_login_img' );

// custom login logo title
function nc_clp_custom_login_title( $title ) {
	$options = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	if ( isset( $options['custom_link_logo_text'] ) && ! empty( $options['custom_link_logo_text'] ) ) {
		$pagetitle = esc_attr( $options['custom_link_logo_text'] );
	}

	return $pagetitle;
}

add_filter( 'login_headertext', 'nc_clp_custom_login_title' );


/**
 * BODY
 */

// custom login message
function nc_clp_custom_login_message( $message ) {
	$options = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	if ( isset( $options['custom_message'] ) && ! empty( $options['custom_message'] ) ) {
		$message = wp_kses_post( $options['custom_message'] ) . $message;
	}

	return '<!-- MESSAGE --><div id="nc-clp-login-message">' . $message . '</div>';
}

add_filter( 'login_message', 'nc_clp_custom_login_message' );

// custom all
function nc_clp_custom_login_page() {
	$options = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	?>

	<?php
	if ( isset( $options['custom_message_color'] ) && ! empty( $options['custom_message_color'] ) ) {
		$color = esc_attr( $options['custom_message_color'] );
		?>
        <!-- MESSAGE TEXT COLOR -->
        <style type="text/css">
            #nc-clp-login-message {
                color: <?php echo $color; ?> !important;
                margin-bottom: 20px;
            }
        </style>
		<?php
	}

	if ( isset( $options['custom_page_bg_color'] ) && ! empty( $options['custom_page_bg_color'] ) ) {
		$bg = esc_attr( $options['custom_page_bg_color'] );
		?>
        <!-- BODY BACKGROUND COLOR -->
        <style type="text/css">
            body {
                background-color: <?php echo $bg; ?> !important;
            }
        </style>
		<?php
	}
	if ( isset( $options['custom_page_bg_image'] ) && ! empty( $options['custom_page_bg_image'] ) ) {
		$image_bg = esc_attr( $options['custom_page_bg_image'] );
		?>
        <!-- BODY BACKGROUND IMAGE -->
        <style type="text/css">
            body {
                background-image: url(<?php echo $image_bg; ?>) !important;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-size: cover !important;
            }
        </style>
		<?php
	}

	if ( isset( $options['custom_form_bg_color'] ) && ! empty( $options['custom_form_bg_color'] ) ) {
		$form_bg_color = esc_attr( $options['custom_form_bg_color'] );
		?>
        <!-- FORMS BACKGROUND COLOR -->
        <style type="text/css">
            .login form {
                background: <?php echo $form_bg_color; ?> !important;
            }
        </style>
		<?php
	}
	if ( isset( $options['custom_form_label_color'] ) && ! empty( $options['custom_form_label_color'] ) ) {
		$form_label_color = esc_attr( $options['custom_form_label_color'] );
		?>
        <!-- FORM LABEL COLOR -->
        <style type="text/css">
            .login form label {
                color: <?php echo $form_label_color; ?> !important;
            }

            .login .dashicons {
                color: <?php echo $form_label_color; ?> !important;
            }
        </style>

		<?php
	}
	if ( isset( $options['custom_form_input_bg_color'] ) && ! empty( $options['custom_form_input_bg_color'] ) ) {
		$form_input_bg_color = esc_attr( $options['custom_form_input_bg_color'] );
		?>
        <!-- FORMS INPUT BACK GROUND COLOR -->
        <style type="text/css">
            .login form input[type="text"] {
                background: <?php echo $form_input_bg_color; ?> !important;
            }

            .login form input[type="password"] {
                background: <?php echo $form_input_bg_color; ?> !important;
            }

            .login form input:-webkit-autofill,
            .login form input:-webkit-autofill:hover,
            .login form input:-webkit-autofill:focus {
                border: 0;
                -webkit-text-fill-color: white;
                -webkit-box-shadow: 0 0 0px 1000px rgba(0, 0, 0, 0.1) inset;
                transition: background-color 5000s ease-in-out 0s;
                background: <?php echo $form_input_bg_color; ?> !important;
            }
        </style>

		<?php
	}
	if ( isset( $options['custom_form_input_text_color'] ) && ! empty( $options['custom_form_input_text_color'] ) ) {
		$form_input_text_color = esc_attr( $options['custom_form_input_text_color'] );
		?>
        <!-- FORM INPUT TEXT COLOR -->
        <style type="text/css">
            .login form input[type="text"] {
                color: <?php echo $form_input_text_color; ?> !important;
            }

            .login form input:-webkit-autofill,
            .login form input:-webkit-autofill:hover,
            .login form input:-webkit-autofill:focus {
                border: 0;
                -webkit-text-fill-color: white;
                -webkit-box-shadow: 0 0 0px 1000px rgba(0, 0, 0, 0.1) inset;
                transition: background-color 5000s ease-in-out 0s;
                color: <?php echo $form_input_text_color; ?> !important;
            }

            }
        </style>

		<?php
	}

	if ( isset( $options['custom_form_border_radius'] ) && ! empty( $options['custom_form_border_radius'] ) ) {
		$form_custom_radius = esc_attr( $options['custom_form_border_radius'] );
		?>
        <!-- FORM BORDER RADIUS -->
        <style type="text/css">
            .login form {
                border-radius: <?php echo $form_custom_radius; ?>px !important;
            }
        </style>

		<?php
	}
	if ( isset( $options['custom_form_box_shadow'] ) && ! empty( $options['custom_form_box_shadow'] ) ) {
		$form_custom_box_shadow = esc_attr( $options['custom_form_box_shadow'] );
		?>
        <!-- FORM BOX SHADOW  -->
        <style type="text/css">
            .login form {
                box-shadow: <?php echo $form_custom_box_shadow; ?> !important;
            }
        </style>

		<?php
	}
	if (
		isset( $options['custom_link_bg_color'] ) && ! empty( $options['custom_link_bg_color'] )
		|| isset( $options['custom_link_text_color'] ) && ! empty( $options['custom_link_text_color'] )
		|| isset( $options['custom_link_bg_padding'] ) && ! empty( $options['custom_link_bg_padding'] )
		|| isset( $options['custom_link_border_radius'] ) && ! empty( $options['custom_link_border_radius'] )

	) {
		$link_bg      = esc_attr( $options['custom_link_bg_color'] );
		$link_text    = esc_attr( $options['custom_link_text_color'] );
		$link_padding = esc_attr( $options['custom_link_bg_padding'] );
		$link_radius  = esc_attr( $options['custom_link_border_radius'] );
		?>
        <!-- LINKS -->
        <style type="text/css">

            #nav a {
                background-color: <?php echo $link_bg; ?> !important;
                color: <?php echo $link_text; ?> !important;
                padding:  <?php echo $link_padding; ?>px !important;
                border-radius: <?php echo $link_radius; ?>px !important;
                display: block;

            }

            #backtoblog a {
                background-color: <?php echo $link_bg; ?> !important;
                color: <?php echo $link_text; ?> !important;
                padding:  <?php echo $link_padding; ?>px !important;
                border-radius: <?php echo $link_radius; ?>px !important;
                display: block;
            }
        </style>
        <!-- NC CLP END STYLES -->
		<?php
	}
	// here to continue from if to here
}

add_filter( 'login_enqueue_scripts', 'nc_clp_custom_login_page' );



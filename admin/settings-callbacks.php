<?php // SETTING CALLBACKS

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * SECTIONS
 */

// callback: login section
function nc_clp_callback_section_title() {
	echo "<p>" . esc_html__( 'These settings enable you to customize the WP Login page title.', 'nuevecubica-custom-login-page' ) . "</p>";
}

// callback: login section
function nc_clp_callback_section_logo() {
	echo "<p>" . esc_html__( 'These settings enable you to customize the WP Login screen.', 'nuevecubica-custom-login-page' ) . "</p>";
}

// callback: message section
function nc_clp_callback_section_message() {
	echo "<p>" . esc_html__( 'These settings enable you to customize the WP Login message Section.', 'nuevecubica-custom-login-page' ) . "</p>";
}

// callback: background section
function nc_clp_callback_section_bg() {
	echo "<p>" . esc_html__( 'These settings enable you to customize the WP Login background.', 'nuevecubica-custom-login-page' ) . "</p>";
}

// callback: form section
function nc_clp_callback_section_forms() {
	echo "<p>" . esc_html__( 'These settings enable you to customize the WP Login Forms.', 'nuevecubica-custom-login-page' ) . "</p>";
}

// callback: form section
function nc_clp_callback_section_links() {
	echo "<p>" . esc_html__( 'These settings enable you to customize the WP Login form links.', 'nuevecubica-custom-login-page' ) . "</p>";
}

/**
 * FIELDS
 *
 * @param $args
 */
// callback: text field
function nc_clp_callback_field_text( $args ) {
	$options = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	$id      = isset( $args['id'] ) ? $args['id'] : '';
	$label   = isset( $args['label'] ) ? $args['label'] : '';
	$value   = isset( $options[ $id ] ) ? sanitize_text_field( $options[ $id ] ) : '';

	$className = 'nc-clp-input-text';

	echo '<div class="nc-group--elem"><input class="' . $className . '" id="nc_clp_options_' . $id . '" name="nc_clp_options[' . $id . ']" type="text" size="40" value="' . $value . '">';
	echo '<br><label for="nc_clp_options_' . $id . '">' . $label . '</label></nc-group--elem>';
}

// callback: textarea field
function nc_clp_callback_field_textarea( $args ) {
	$options      = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	$id           = isset( $args['id'] ) ? $args['id'] : '';
	$label        = isset( $args['label'] ) ? $args['label'] : '';
	$allowed_tags = wp_kses_allowed_html( 'post' );
	$value        = isset( $options[ $id ] ) ? wp_kses( stripslashes_deep( $options[ $id ] ), $allowed_tags ) : '';
	$className    = 'nc-clp-text-area';
	echo '<textarea class="' . $className . '" id="nc_clp_options_' . $id . '" name="nc_clp_options[' . $id . ']" rows="5" cols="40">' . $value . '</textarea><br />';
	echo '<label for="nc_clp_options_' . $id . '">' . $label . '</label>';
}

// SELECT
function nc_clp_callback_find_file( $args ) {
	wp_enqueue_media();
	$options   = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	$id        = isset( $args['id'] ) ? $args['id'] : '';
	$label     = isset( $args['label'] ) ? $args['label'] : '';
	$value     = isset( $options[ $id ] ) ? sanitize_text_field( $options[ $id ] ) : '';
	$className = 'nc-clp-input-text' . $id;
	echo '<img id="nc_clp_thumb_nail_' . $id . '" src="' . $value . '"><br>';
	echo '<input class="' . $className . '" id="nc_clp_options_' . $id . '" name="nc_clp_options[' . $id . ']" type="text" size="40" value="' . $value . '"><br />';
	echo '<input type="button" name="upload-btn" id="nc_clp_upload_' . $id . '" class="button-secondary" value="Upload Image"><br>';
	echo '<label for="nc_clp_options_' . $id . '">' . $label . '</label>';
}

// COLOR PICKER
function nc_clp_callback_color_picker( $args ) {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( CLP_PLUGIN_URL_NAME.'/assets/vendor/wp-color-picker-alpha-kallokoo/wp-color-picker-alpha.js'), array( 'wp-color-picker' ), null, true );
	$options   = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	$id        = isset( $args['id'] ) ? $args['id'] : '';
	$value     = isset( $options[ $id ] ) ? sanitize_text_field( $options[ $id ] ) : '';
	$className = 'nc-clp-color_bg_' . $id . ' color-picker';
	$label     = isset( $args['label'] ) ? $args['label'] : '';
	echo '<input class="' . $className . '" id="nc_clp_options_' . $id . '" name="nc_clp_options[' . $id . ']" type="text" size="40" value="' . $value . '" data-default-color="#f2f2f2" data-alpha="true"><br />';
	echo '<label for="nc_clp_options_' . $id . '">' . $label . '</label>';
}

// callback: text field
function nc_clp_callback_field_number( $args ) {
	$options = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	$id      = isset( $args['id'] ) ? $args['id'] : '';
	$label   = isset( $args['label'] ) ? $args['label'] : '';
	$value   = isset( $options[ $id ] ) ? sanitize_text_field( $options[ $id ] ) : '';

	$className = 'nc-clp-input-text';

	echo '<div class="nc-group--elem"><input class="' . $className . '" id="nc_clp_options_' . $id . '" name="nc_clp_options[' . $id . ']" type="number" size="20" value="' . $value . '" max="100" min="0">';
	echo '<br><label for="nc_clp_options_' . $id . '">' . $label . '</label></nc-group--elem>';
}

// callback: box shadow
function nc_clp_callback_box_shadow( $args ) {
	$options = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );
	$id      = isset( $args['id'] ) ? $args['id'] : '';
	$value   = isset( $options[ $id ] ) ? sanitize_text_field( $options[ $id ] ) : '';
	$className = 'nc-clp-input-text';
	echo '<div class="nc-group--elem"><input class="' . $className . '" id="nc_clp_options_' . $id . '" name="nc_clp_options[' . $id . ']" type="text" value="' . $value . '" size="40" data-box-shadow="'.$value.'">';

	?>
	<div class="nc-box-shadow-generator">
		<div class="calc">
			<input type="checkbox">
			<label for="">do you want to add a box-shadow to the forms</label>
		</div>
		<div class="calc-holder">
			<div class="nc-box-shadow-generator-code">
				<span class="token">box-shadow:</span><span id="nc-bsg-code-text">  <?php echo $value?> </span>
			</div>
			<div class="calc calc-app">
				<div class="calc-item">
					<label for="">Inset</label>
					<input id="nc_box_shadow_generator_inset" id="size" name="inset" type="checkbox" value="1">
				</div>
				<div class="calc-item">
					<label for="">Shadow color</label>
					<input id="nc_box_shadow_generator_shadow-color" class="color-picker" name="shadow-color" type="color-picker" value="" data-default-color="#f2f2f2" data-alpha="true">
				</div>
				<div class="calc-item">
					<label for="">Horizontal length:</label>
					<input id="nc_box_shadow_generator_h-offset" id="size" name="h-offset" type="range" value="0" min="-50" max="50" step="1">
					<span class="calc-item-h-offset calc-item-tooltip">0</span>
				</div>
				<div class="calc-item">
					<label for="">Vertical length: <span class="calc-item-v-offset calc-item-tooltip">0</span></label>
					<input id="nc_box_shadow_generator_v-offset" id="size" name="v-offset" type="range" value="0" min="-50" max="50" step="1">
				</div>
				<div class="calc-item">
					<label for="">blur radius: <span class="calc-item-blur calc-item-tooltip">0</span></label>
					<input id="nc_box_shadow_generator_blur" id="size" name="blur" type="range" value="0" min="0" max="50" step="1">
				</div>
				<div class="calc-item">
					<label for="">Spread radius: <span class="calc-item-spread calc-item-tooltip">0</span></label>
					<input id="nc_box_shadow_generator_spread" id="size" name="spread" type="range" value="0" min="0" max="50" step="1">
				</div>
			</div>
		</div>
	</div>
	<?php

}
<?php
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// VARS
$Logo = plugins_url( '/'.CLP_PLUGIN_URL_NAME.'/assets/images/logo-nuevecubica-square.png');

?>

<div class="nc-fcb-main-plugin-page">
	<img class="img-logo" src="<?php echo  $Logo; ?>" alt="nuevecubica's logo">
	<h1><?php echo CLP_PLUGIN_NAME; ?></h1>
	<h2>A nuevecubica's WordPress plugin</h2>
	<hr>
	<div class="nc-alert warning">You have to be an Administrator to use this plugin!</div>
</div>




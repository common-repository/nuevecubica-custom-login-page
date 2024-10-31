<?php // CREATE PAGE

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// display the plugin settings page
function nc_clp_display_settings_page() {
	// check if user is allowed access
	// VARS
	$Icon = plugins_url( '/assets/images/call-now-icon.png', __DIR__ );
	$Logo = plugins_url( 'assets/images/logo-nuevecubica-square.png', __DIR__ );

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$option = get_option( 'nc_clp_options', nc_clp_plugin_options_default() );

	?>
    <!-- PLUGIN HOLDER -->
    <div id="nc-clp-main-page">
        <!-- PLUGIN HEADER -->
        <div class="flex">
            <div class="col-one">
                <img class="img-logo" src="<?php echo $Logo; ?>" alt="nuevecubica's logo">
            </div>
            <div class="col-two">
                <h1><?php echo CLP_PLUGIN_NAME; ?></h1>
                <h2>A nuevecubica's WordPress plugin <span>by Alex Vaught</span></h2>

            </div>
        </div>
        <hr>

        <!-- PLUGIN MAIN CONTENT -->
        <div class="nc-clp-main-plugin-page">
            <div id="nc-clp-form-holder" class="wrap" style="display: flex">
                <div class="col-one">
                    <form action="options.php" method="post">
                        <div id="nc-clp-form">
							<?php
							// output security fields
							settings_fields( 'nc_clp_options' );
							// output setting sections
							do_settings_sections( CLP_PLUGIN_URL_NAME );
							?>
                        </div>
						<?php
						// submit button
						submit_button();
						?>
                    </form>

                    <footer class="nc-info-support-donate-thanks">
                        <h2><?php echo CLP_PLUGIN_NAME; ?></h2>
                        <ul class="nc-footer-items">
                            <li><a href="https://nuevecubica.dev/product/<?php echo CLP_PLUGIN_URL_NAME; ?>">Support</a></li>
                            <li><a href="http://nuevecubica.dev/product/suggestions?product=<?php echo CLP_PLUGIN_URL_NAME; ?>">Suggestions</a></li>
                            <li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RFG2UTQPX8UC2&source=url">Donate</a></li>
                            <li><a href="mailto:admin@nuevecubica.net">Just say Thanks</a></li>
                        </ul>
                        <div class="postbox">
                            <p>made with love by alex vaught</p>
                        </div>
                        <div class="nc-clp-donations">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick"/>
                                <input type="hidden" name="hosted_button_id" value="RFG2UTQPX8UC2"/>
                                <input type="image" src="https://www.paypalobjects.com/en_US/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button"/>
                            </form>
                        </div>
                    </footer>


                </div>
                <div class="col-two">
					<?php include_once( 'settings-styles.php' ) ?>
                    <p class="nc-clp-page-title">demo login<span></span></p>
                    <div class="nc-clp-page-display">
                        <img class="nc-clp-logo-display" src="<?php echo $option['custom_logo']; ?>" alt="<?php echo $option['custom_link_logo_text']; ?>">
                        <div class="nc-clp-message-display"><?php echo $option['custom_message']; ?></div>
                        <div class="nc-clp-form-display box-shadow-element" action="#">
                            <p>
                                <label for="nc-clp-user_login">Username or Email Address</label>
                                <input type="text" name="log" id="nc-clp-user_login" class="input" value="info@nuevecubica.net" size="20" autocapitalize="off">
                            </p>
                            <div class="user-pass-wrap">
                                <label for="nc-clp-user_pass">Password</label>
                                <div class="wp-pwd">
                                    <input type="password" name="pwd" id="nc-clp-user_pass" class="input password-input" value="*****" size="20">
                                    <span class="dashicons dashicons-visibility wp-hide-pw" aria-hidden="true" ></span>
                                </div>
                            </div>
                            <p class="forgetmenot"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> <label for="rememberme">Remember Me</label></p>
                            <p class="submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In">
                            </p>
                        </div>
                        <p id="nav" ><a href="#">Lost your password?</a></p>
                        <p id="backtoblog"><a href="#">← Back to your site </a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

	<?php
}

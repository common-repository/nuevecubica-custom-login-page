<style>
    .nc-clp-page-display {
        background-color: <?php echo $option['custom_page_bg_color']?>;
        background-image: url( <?php echo $option['custom_page_bg_image']?>);
    }

    .nc-clp-message-display h1, .nc-clp-message-display h2, .nc-clp-message-display h3, .nc-clp-message-display h4, .nc-clp-message-display h5, .nc-clp-message-display h6, .nc-clp-message-display a, .nc-clp-message-display p {
        color: <?php echo $option['custom_message_color'];   ?> !important;
    }

    .nc-clp-form-display {
        margin-top: 20px;
        margin-left: 0;
        padding: 26px 24px 46px;
        font-weight: 400;
        overflow: hidden;
        border: 1px solid #ccd0d4;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
        background: <?php echo $option['custom_form_bg_color']; ?>;
        box-shadow: <?php echo $option['custom_form_box_shadow']; ?>;
        border-radius: <?php echo $option['custom_form_border_radius']; ?>px;
    }

    .nc-clp-form-display label {
        font-size: 14px;
        line-height: 1.5;
        display: inline-block;
        margin-bottom: 3px;
        color: <?php echo $option['custom_form_label_color']; ?>;
        border-radius: <?php echo $option['custom_form_border_radius']; ?>;;

    }

    .nc-clp-form-display input[type="text"], .nc-clp-form-display input[type="password"] {
        font-size: 24px;
        line-height: 1.33333333;
        width: 100%;
        border-width: .0625rem;
        padding: .1875rem .3125rem;
        margin: 0 6px 16px 0;
        min-height: 40px;
        max-height: none;
        background: <?php echo $option['custom_form_input_bg_color']; ?> !important;
        color: <?php echo $option['custom_form_input_text_color']; ?> !important;
    }

    .nc-clp-form-display .dashicons {
        color: <?php echo $option['custom_form_input_text_color']; ?> !important;
    }

    .nc-clp-form-display input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover,
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
        border: 0;
        -webkit-text-fill-color: white;
        -webkit-box-shadow: 0 0 0px 1000px rgba(0, 0, 0, 0.1) inset;
        transition: background-color 5000s ease-in-out 0s;
        background: <?php echo $option['custom_form_input_bg_color']; ?> !important;
        color: <?php echo $option['custom_form_input_text_color']; ?> !important;
    }


    .nc-clp-form-display .user-pass-wrap .dashicons {
        color: <?php echo $option['custom_form_input_text_color']; ?> !important;
        position: absolute;
        top: 14px;
        right: 10px;
    }


    .nc-clp-form-display .wp-pwd {
        position: relative;
    }

    #nav a {
        color: <?php echo $option['custom_link_text_color']; ?> !important;
        background-color: <?php echo $option['custom_link_bg_color']; ?> !important;
        padding:<?php echo $option['custom_link_bg_padding']; ?>px  !important;
        border-radius:<?php echo $option['custom_link_border_radius']; ?>px !important;
        display: block;
    }

    #backtoblog a {
        color: <?php echo $option['custom_link_text_color']; ?> !important;
        background-color: <?php echo $option['custom_link_bg_color']; ?> !important;
        padding:<?php echo $option['custom_link_bg_padding']; ?>px !important;
        border-radius:<?php echo $option['custom_link_border_radius']; ?>px !important;
        display: block;
    }


</style>
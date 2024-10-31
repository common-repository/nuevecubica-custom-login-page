'use strict'

jQuery(document).ready(function ($) {

    if (window.location.href.slice(-29) == 'nuevecubica-custom-login-page') {
        console.log('welcome some NC-CLP js logic...');
        // CKEDITOR
        CKEDITOR.replace('nc_clp_options_custom_message', {
            'skin': 'moono',
            'language': 'eng',
            'width': '400',
        });
        CKEDITOR.editorConfig = function (config) {
            config.removePlugins = 'maximize';
            config.font_names = 'Open Sans Sans Serif';
        }

        // UPLOAD BTN
        $('[id^=nc_clp_upload]').click(function (e) {
            var elemId = this.id.replace('nc_clp_upload_','');
            e.preventDefault();
            var image = wp.media({
                title: 'Select Image for Background',
                multiple: false
            }).open().on('select', function (e) {
                var uploaded_image2 = image.state().get('selection').first();
                var image_url = uploaded_image2.toJSON().url;
                $('#nc_clp_options_'+elemId).val(image_url);
                $('#nc_clp_thumb_nail_'+elemId).attr("src", image_url);
            });
        });


        // COLOR PICKER
        $('#nc_clp_options_custom_bg').wpColorPicker();
        //

    }
});
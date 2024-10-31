'use strict'

if (window.location.href.slice(-29) == 'nuevecubica-custom-login-page') {
    console.log('nuevecubica box shadow generator is on....');
    jQuery(document).ready(function ($) {
        /**
         * SET VARS
         */
        var boxShadowValue = '', h_offset_val = 0, v_offset_val = 0, blur_val = 0, spread_val = 0, shadow_color_val = '', inset_val = '';

        // GET OPTION VALUES AND POPULATE BACK VARS
        var oldValue = $('#nc_clp_options_custom_form_box_shadow').attr('data-box-shadow');
        var oldValueCommaSeparated = oldValue.split(/[ ,]+/).filter(function (v) {
            return v !== ''
        }).join(',');
        // SET THE NEW VARS
        var temp = [];
        temp = oldValueCommaSeparated.split(",");
        h_offset_val = temp[0].replace('px', '');
        v_offset_val = temp[1].replace('px', '');
        blur_val = temp[2].replace('px', '');
        spread_val = temp[3].replace('px', '');

        // REPLACE THE VALUES
        setRangeValues(h_offset_val, 'h-offset');
        setRangeValues(v_offset_val, 'v-offset');
        setRangeValues(blur_val, 'blur');
        setRangeValues(spread_val, 'spread');

        if (temp[4].indexOf('#') > -1) {
            var insetValue;
            if (!temp[5]) {

                insetValue = '';
            } else if (temp[5]) {
                insetValue = temp[5];
            }
            replaceBoxShadowAndInsetCheckBoxValue(temp[4], insetValue);

        } else {
            if (!temp[8]) {
                insetValue = '';
            } else if (temp[8]) {
                insetValue = temp[8];
            }
            var combineValue = temp[4] + ',' + temp[5] + ',' + temp[6] + ',' + temp[7];
            replaceBoxShadowAndInsetCheckBoxValue(combineValue, insetValue);
        }

        function setRangeValues(var_name, element_id) {
            $('#nc_box_shadow_generator_' + element_id).val(var_name);
            updateToolTip(element_id, 'nc_box_shadow_generator_' + element_id);

        }

        function replaceBoxShadowAndInsetCheckBoxValue(value, check) {
            shadow_color_val = value;
            inset_val = check;
            $('#nc_box_shadow_generator_shadow-color').val(value);
            if (check == 'inset') {
                $('#nc_box_shadow_generator_inset').attr('checked', 'checked');
            }

            boxShadowValue = h_offset_val + 'px     ' + v_offset_val + 'px     ' + blur_val + 'px  ' + spread_val + 'px  ' + shadow_color_val + '  ' + inset_val;
            updateElem(boxShadowValue);
        }

//---


        //44

        // CHANGES ON INPUT VALUES
        $('[id^=nc_box_shadow_generator_]').on("input change wpColorPicker", function () {
            var item_id = $(this).attr('id');
            var item_name = item_id.replace('nc_box_shadow_generator_', '');
            var item_value = $(this).val();
            switch (item_name) {
                case 'inset':
                    if ($('#' + item_id).prop('checked') == true) {
                        inset_val = 'inset';
                    } else {
                        inset_val = '';
                    }
                    break;
                case 'h-offset':
                    h_offset_val = item_value;
                    break;
                case 'v-offset':
                    v_offset_val = item_value;
                    break;
                case 'blur':
                    blur_val = item_value;
                    break;
                case 'spread':
                    spread_val = item_value;

                    break;
            }

            boxShadowValue = h_offset_val + 'px     ' + v_offset_val + 'px     ' + blur_val + 'px  ' + spread_val + 'px  ' + shadow_color_val + '  ' + inset_val;
            updateElem(boxShadowValue);
            updateToolTip(item_name, item_id);

        });

        // update Elem
        function updateElem() {
            boxShadowValue = h_offset_val + 'px ' + v_offset_val + 'px ' + blur_val + 'px ' + spread_val + 'px ' + shadow_color_val + ' ' + inset_val;
            $('.box-shadow-element').attr('style', 'box-shadow:' + boxShadowValue);
            $("#nc-bsg-code-text").html(boxShadowValue);
            $("#nc_clp_options_custom_form_box_shadow").val(boxShadowValue);
        }

        /**
         * UPDATE TOOLTIP
         * @param item_name
         * @param item_id
         */
        function updateToolTip(item_name, item_id) {
            if (item_name !== "inset") {
                var newPoint, newPlace, offset;
                var el = $("#" + item_id);
                var width = el.width();
                offset = -1;
                newPoint = (el.val() - el.attr("min")) / (el.attr("max") - el.attr("min"));
                if (newPoint < 0) {
                    newPlace = 0;
                } else if (newPoint > 1) {
                    newPlace = width;
                } else {
                    newPlace = width * newPoint + offset;
                    offset -= newPoint;
                }
                //console.log(newPlace);
                $('.calc-item-' + item_name).css({
                    left: newPlace,
                    marginLeft: offset + "%"
                })
                    .text(el.val());
            }
        }

        // colorPicker
        $('#nc_box_shadow_generator_shadow-color').wpColorPicker({
            change: function (event, ui) {
                shadow_color_val = ui.color.toString();

                updateElem(ui.color.toString());


            },
            close: function (event, ui) {

            }
        });

    });
}

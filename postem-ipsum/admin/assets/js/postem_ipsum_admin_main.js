(function ($) {
    "use strict";

    var delay = function (ms) {
        return new Promise(function (r) {
            setTimeout(r, ms)
        })
    };
    var time = 2000;
    var cat_random = 0;
    var author_random = 0;
    var format_random = 0;
    var bg_random = 0;
    var group_status_random = 0;
    var user_random = 0;
    var activity_type_random = 0;


    var price_min = document.getElementById('price_slider-padding-value-min'),
        price_max = document.getElementById('price_slider-padding-value-max');

    var weight_min = document.getElementById('weight_slider-padding-value-min'),
        weight_max = document.getElementById('weight_slider-padding-value-max');

    var length_min = document.getElementById('length_slider-padding-value-min'),
        length_max = document.getElementById('length_slider-padding-value-max');

    var width_min = document.getElementById('width_slider-padding-value-min'),
        width_max = document.getElementById('width_slider-padding-value-max');

    var height_min = document.getElementById('height_slider-padding-value-min'),
        height_max = document.getElementById('height_slider-padding-value-max');


    function download(filename, text) {
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);

        element.style.display = 'none';
        document.body.appendChild(element);

        element.click();

        document.body.removeChild(element);
    }

    // Populate form with Json
    function populate(frm, data) {
        $.each(data, function(key, value){
            $('[name='+key+']', frm).val(value);
        });
    }


    $(document).ready(function () {

        $(".generic-table").show();
        $(".generic-woo-table").show();
        $(".order-settings-table").show();
        $(".user-settings-table").show();
        $(".taxonomy-settings-table").show();
        $(".buddy-groups-settings-table").show();
        $(".buddy-activity-settings-table").show();


        $("#postem_ipsum_date_begin").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            onSelect: function (date) {
                var date = $('#postem_ipsum_date_begin').datepicker('getDate');
               $('#postem_ipsum_date_begin').datepicker('setDate', date);
                $('#postem_ipsum_date_end').datepicker('option', 'minDate', date);
            }
        });

        $("#postem_ipsum_date_end").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            maxDate: 0,

        });

        $("#postem_ipsum_woo_date_begin").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            onSelect: function (date) {
                var date = $('#postem_ipsum_woo_date_begin').datepicker('getDate');
                $('#postem_ipsum_woo_date_begin').datepicker('setDate', date);
                $('#postem_ipsum_woo_date_end').datepicker('option', 'minDate', date);
            }
        });

        $("#postem_ipsum_woo_date_end").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            maxDate: 0,

        });

       // $('select').niceSelect();








        // Color picker
        $(function () {
            $('.color-field').wpColorPicker();
        });

        // Creating sliders
        var price_slider = document.getElementById('price_slider');

        if ($("#price_slider").length > 0) {
            noUiSlider.create(price_slider, {
                start: [200, 800],
                connect: true,
                step: 10,
                tooltips: [true, true],
                range: {
                    'min': 0,
                    'max': 1000
                }
            });
        }

        // Creating sliders
        var weight_slider = document.getElementById('weight_slider');

        if ($("#weight_slider").length > 0) {
            noUiSlider.create(weight_slider, {
                start: [200, 800],
                connect: true,
                step: 10,
                tooltips: [true, true],
                range: {
                    'min': 0,
                    'max': 1000
                }
            });
        }

        var length_slider = document.getElementById('length_slider');

        if ($("#length_slider").length > 0) {
            noUiSlider.create(length_slider, {
                start: [200, 800],
                connect: true,
                step: 10,
                tooltips: [true, true],
                range: {
                    'min': 0,
                    'max': 1000
                }
            });
        }

        var width_slider = document.getElementById('width_slider');

        if ($("#width_slider").length > 0) {
            noUiSlider.create(width_slider, {
                start: [200, 800],
                connect: true,
                step: 10,
                tooltips: [true, true],
                range: {
                    'min': 0,
                    'max': 1000
                }
            });
        }

        var height_slider = document.getElementById('height_slider');

        if ($("#height_slider").length > 0) {
            noUiSlider.create(height_slider, {
                start: [200, 800],
                connect: true,
                step: 10,
                tooltips: [true, true],
                range: {
                    'min': 0,
                    'max': 1000
                }
            });
        }

        $(".select_taxonomy").hide();
        $(".select_term").hide();

        // Price sliders
        if ($("#price_slider").length > 0) {
            price_slider.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    price_max = values[handle];
                } else {
                    price_min = values[handle];
                }
            });
        }

        if ($("#weight_slider").length > 0) {
            weight_slider.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    weight_max = values[handle];
                } else {
                    weight_min = values[handle];
                }
            });
        }

        if ($("#length_slider").length > 0) {
            length_slider.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    length_max = values[handle];
                } else {
                    length_min = values[handle];
                }
            });
        }

        if ($("#width_slider").length > 0) {
            width_slider.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    width_max = values[handle];
                } else {
                    width_min = values[handle];
                }
            });
        }

        if ($("#height_slider").length > 0) {
            height_slider.noUiSlider.on('update', function (values, handle) {
                if (handle) {
                    height_max = values[handle];
                } else {
                    height_min = values[handle];
                }
            });
        }
    });

    // Elegimos categoria aletatoria?
    $(document).on("change", "#cat_random", function () {

        if ($('input[name="cat_random"]').is(':checked')) {

            $("#cat").prop("disabled", true);

            $(".checks_terms").attr("disabled", true);
            //$("#postem_ipsum_term").prop("disabled", true);
            cat_random = 1;
        } else {

            $("#cat").prop("disabled", false);

            $(".checks_terms").attr("disabled", false);
            //$("#postem_ipsum_term").prop("disabled", false);

            cat_random = 0;
        }
    });

    // Elegimos author aletatoria?
    $(document).on("change", "#author_random", function () {

        if ($('input[name="author_random"]').is(':checked')) {

            $("#postem_ipsum_author").prop("disabled", true);

            author_random = 1;
        } else {

            $("#postem_ipsum_author").prop("disabled", false);

            author_random = 0;
        }
    });

    // Elegimos format aletatori0?
    $(document).on("change", "#format_random", function () {

        if ($('input[name="format_random"]').is(':checked')) {

            $("#postem_ipsum_format").prop("disabled", true);

            format_random = 1;
        } else {

            $("#postem_ipsum_format").prop("disabled", false);

            format_random = 0;
        }


    });

    // Elegimos group status aleatorio?
    $(document).on("change", "#group_status_random", function () {

        if ($('input[name="group_status_random"]').is(':checked')) {

            $("#postem_ipsum_buddy_groups_status").prop("disabled", true);

            group_status_random = 1;
        } else {

            $("#postem_ipsum_buddy_groups_status").prop("disabled", false);

            group_status_random = 0;
        }


    });

    // Elegimos user aletatoria?
    $(document).on("change", "#user_random", function () {

        if ($('input[name="user_random"]').is(':checked')) {

            $("#postem_ipsum_buddy_activity_user").prop("disabled", true);

            user_random = 1;
        } else {

            $("#postem_ipsum_buddy_activity_user").prop("disabled", false);

            user_random = 0;
        }
    });

    // Elegimos activity type aletatoria?
    $(document).on("change", "#activity_type_random", function () {

        if ($('input[name="activity_type_random"]').is(':checked')) {

            $("#postem_ipsum_buddy_activity_type").prop("disabled", true);

            activity_type_random = 1;
        } else {

            $("#postem_ipsum_buddy_activity_type").prop("disabled", false);

            activity_type_random = 0;
        }
    });


    // Click on table header close/open
    $(document).on("click", ".nav-tab", function (e) {
        if (!$(this).hasClass("nav-tab-active")) {
            $(".nav-tab").removeClass("nav-tab-active");
            $(this).toggleClass("nav-tab-active");
            var data_table = $(this).attr("data-tab");
            $(".table_container").hide();
            $("." + data_table).show();
        }
        else {

        }


    });

    // Elegimos color aletatorio?
    $(document).on("change", "#bg_random", function () {
        if ($('input[name="bg_random"]').is(':checked')) {
            $('.wp-picker-container').hide();
            bg_random = 1;
        } else {
            $('.wp-picker-container').show();
            bg_random = 0;
        }
    });

    // Metabox selection
    $(document).on("change", ".dynamic_metabox", function () {

        var selection = $(this).val();
        var order = $(this).attr("data-order")
        if (selection == "select" || selection == "checkboxes" || selection == "radio") {
            $(".meta_select_options[data-order="+ order + "]").show();
        }
        else {
            $(".meta_select_options[data-order="+ order + "]").hide();
        }
    });


    ///////////////////////////////////////////////// IMPORT FILE ///////////////////
    $(document).on("click", ".postem-ipsum-import-file", function (e) {

        e.preventDefault();
        var imported_option = "";
        //get file object
        var file = document.getElementById('postem-lipsum-import').files[0];
        if (file) {
            // create reader
            var reader = new FileReader();
            reader.readAsText(file);
            reader.onload = function (e) {

                imported_option = e.target.result;

                var imported_json = jQuery.parseJSON(imported_option)

                $('body').loadingModal({
                    position: 'auto',
                    text: 'We are importing data for you...',
                    color: '#fff',
                    opacity: '0.7',
                    backgroundColor: 'rgb(0,0,0)',
                    animation: 'doubleBounce'
                });

                populate('form', imported_json);



                // Abrimos todas las persianas para ver los valores importados
                $(".table_container").removeClass("closed")

                // Importamos los valores de los selects
                //$(".result").html(imported_option)

                var post_type = imported_json.postem_ipsum_post_type
                var taxonomy = imported_json.postem_ipsum_taxonomy
                var category_random = imported_json.cat_random
                var auth_random = imported_json.author_random
                var background_random = imported_json.bg_random
                var featured_image = imported_json.postem_ipsum_featured_image
                var featured_image_bg = imported_json.postem_ipsum_featured_image_bg
                var featured_image_w = imported_json.postem_ipsum_image_w
                var featured_image_h = imported_json.postem_ipsum_image_h
                var comments = imported_json.postem_ipsum_comments
                var taxonomy_terms = imported_json.terms

                var metaboxes = imported_json.metaboxes

                // Taxonomy
                $.post(ajaxurl,
                    {
                        action: "postem_ipsum_get_taxonomies",
                        post_type: post_type,
                    })

                    .done(function (result) {
                            $(".select_taxonomy").show().html(result);
                            $("#postem_ipsum_featured_image").prop('disabled', false);
                            $("#postem_ipsum_taxonomy").val(taxonomy)

                        // Terms
                        $.post(ajaxurl,
                            {
                                action: "postem_ipsum_get_terms",
                                taxonomy: taxonomy,
                            })
                            .done(function (result) {

                                    $(".select_term").show().html(result);

                                    // Cat Random
                                    if (category_random == "on") {
                                        $("#cat_random").prop("disabled", false);
                                        $(".checks_terms").attr("disabled", true);
                                        $("#cat_random").attr('checked','checked')
                                        cat_random = 1;
                                    } else {
                                        $(".checks_terms").attr("disabled", false);
                                        cat_random = 0;
                                        $.each(taxonomy_terms, function (i, value) {
                                            //console.log(i + " " + value)
                                            $('.checks_terms[value="'+ value +'"]').attr('checked', 'checked');
                                        });

                                    }
                            });


                    });





                // AUTHOR RANDOM
                if (auth_random == "on") {
                    $("#author_random").attr('checked','checked')
                    $("#postem_ipsum_author").prop("disabled", true);
                    author_random = 1;
                } else {
                    $("#postem_ipsum_author").prop("disabled", false);
                    author_random = 0;
                }

                // FEATURED IMAGE
                if (featured_image == "yes") {
                    $(".postem_ipsum_image_color").show();
                    if(background_random == "on"){
                        $('.wp-picker-container').hide();
                        $("#bg_random").attr("checked", "checked")
                        bg_random = 1;
                    }
                    else{
                        $('.wp-picker-container').show();
                        bg_random = 0;
                        $("#postem_ipsum_featured_image_bg").val(featured_image_bg)
                        $('.color-field').wpColorPicker('color', featured_image_bg)
                    }
                    $(".postem_ipsum_image_w").show().val(featured_image_w);
                    $(".postem_ipsum_image_h").show().val(featured_image_h);
                    $(".postem_ipsum_image_table").css('min-height', '400px');

                }

                // COMMENTS
                if (comments == "yes") {
                    $(".postem_ipsum_comments_row").show();
                    $("#postem_ipsum_comments_number").val(imported_json.postem_ipsum_comments_number)
                }

                // METABOXES
                var metaboxes_number = Object.keys(metaboxes).length/3;

                var metaboxes_values = $.map( metaboxes, function( value, key ) {
                    return value;
                });

               for (var i = 0; i < metaboxes_number; i++) {
                    $.post(ajaxurl,
                        {
                            action: "postem_ipsum_add_metabox",
                            meta_number: i*3,
                        })
                        .done(function (result) {
                            $(".metaboxes-table").append(result)

                        });
                }

                var tester = 0;

                var checkExist = setInterval(function() {
                    for(var tester = 0; tester < metaboxes_number; tester++){
                        if ($("#postem_ipsum_meta_field_" + tester).length > 0) {

                            $("#postem_ipsum_meta_field_" + tester).val(metaboxes_values[tester * 3]);
                            $("#postem_ipsum_meta_field_type_" + tester).val(metaboxes_values[(tester * 3) + 1]);
                            $("#dynamic_metabox_select_options_" + tester).val(metaboxes_values[(tester * 3) + 2]);

                            if (metaboxes_values[(tester * 3) + 2] != "") {
                                $(".meta_select_options[data-order="+ tester + "]").show();
                            }

                            clearInterval(checkExist);
                        }
                    }

                }, 1000); // check every 100ms


                // hide the loading modal
                delay(time)
                    .then(function () {
                        $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('hide');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('destroy');
                    });



            };
        }

    });


    ///////////////////////////////////////////////// POSTS ///////////////////
    $(document).on("change", "#postem_ipsum_post_type", function (e) {
        var post_type = $("#postem_ipsum_post_type").val();

        if (post_type != "page" && post_type != "0") {

            // AJAX CALL
            $.post(ajaxurl,
                {
                    action: "postem_ipsum_get_taxonomies",
                    post_type: post_type,
                })

                .done(function (result) {
                    if (result == 0) {
                        alert("Something goes wrong")
                    } else {
                        $(".select_taxonomy").show().html(result);
                        $(".select_term").html("");
                        $("#postem_ipsum_featured_image").prop('disabled', false);
                    }
                });
        }
        else {
            $(".select_taxonomy").hide();

            $(".select_term").hide();

            $("#postem_ipsum_featured_image").prop('disabled', 'disabled');
        }


    });

    $(document).on("change", "#postem_ipsum_taxonomy", function (e) {
        var taxonomy = $("#postem_ipsum_taxonomy").val();
        // AJAX CALL
        $.post(ajaxurl,
            {
                action: "postem_ipsum_get_terms",
                taxonomy: taxonomy,
            })
            .done(function (result) {
                if (result == 0) {
                    alert("Something goes wrong")
                } else {
                    $(".select_term").show().html(result);
                }
            });
    });

    $(document).on("click", ".postem-ipsum-generate", function (e) {

        e.preventDefault();
        var $inputs = $('#postem-ipsum-generation:input');
        var bg_color = $("#postem_ipsum_featured_image_bg").val();
        var variables = {};
        $.each($('#postem-ipsum-generation').serializeArray(), function (i, field) {

            if (field.name != "postem_ipsum_term[]") {
                variables[field.name] = field.value;
            }

        });

        var terms = [];
        $('.checks_terms:checked').each(function (i) {
            terms[i] = $(this).val();
        });

        var metaboxes = {};
        var metafields = $(".dynamic_metabox").serializeArray();
        $.each(metafields, function (i, field) {

            metaboxes[field.name] = field.value;


        });

        // AJAX CALL
        if (
            $("#postem_ipsum_post_type").val() != "0" &&
            $("#postem_ipsum_post_number").val() != "" &&
            $("#postem_ipsum_paragraphs").val() != "") {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating content for you...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            });

            $.post(ajaxurl,
                {
                    action: "postem_ipsum_generate_posts",
                    variables: variables,
                    metaboxes: metaboxes,
                    bg_color: bg_color,
                    bg_random: bg_random,
                    cat_random: cat_random,
                    author_random: author_random,
                    format_random: format_random,
                    postem_ipsum_term: terms,
                })
                .done(function (result) {

                    $(".result").html(result);
                    $(".select_taxonomy").html("");
                    $(".select_term").html("");
                    $('#postem-ipsum-generation').trigger("reset");

                    $(".postem_ipsum_image_color").hide();
                    $(".postem_ipsum_image_w").hide();
                    $(".postem_ipsum_image_h").hide();
                    $(".postem_ipsum_image_table").css('min-height', '0px');
                    $(".postem_ipsum_comments_row").hide();


                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                            //location.reload();
                        });
                });
        }
        else {
            alert("Fill the form");
        }
    });

    $(document).on("click", ".postem-ipsum-delete", function (e) {
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting content for you...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });

        $.post(ajaxurl,
            {
                action: "postem_ipsum_remove_posts",
            })
            .done(function (result) {

                $(".select_taxonomy").html("");
                $(".select_term").html("");
                // hide the loading modal
                delay(time)
                    .then(function () {
                        $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('hide');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('destroy');
                    });
            });
    });

    $(document).on("change", "#postem_ipsum_featured_image", function () {
        var selection = $("#postem_ipsum_featured_image").val();
        if (selection == "yes") {
            $(".postem_ipsum_image_color").show();
            $(".postem_ipsum_image_w").show();
            $(".postem_ipsum_image_h").show();
            $(".postem_ipsum_image_table").css('min-height', '400px');
        }
        else {
            $(".postem_ipsum_image_color").hide();
            $(".postem_ipsum_image_w").hide();
            $(".postem_ipsum_image_h").hide();
            $(".postem_ipsum_image_table").css('min-height', '0px');
        }
    });

    $(document).on("change", "#postem_ipsum_comments", function () {
        var selection = $("#postem_ipsum_comments").val();

        if (selection == "yes") {
            $(".postem_ipsum_comments_row").show();
        }
        else {
            $(".postem_ipsum_comments_row").hide();
        }
    });

    $(document).on("click", ".postem-ipsum-export-posts", function (e) {

        e.preventDefault();
        var $inputs = $('#postem-ipsum-generation:input');
        var bg_color = $("#postem_ipsum_featured_image_bg").val();
        var variables = {};
        $.each($('#postem-ipsum-generation').serializeArray(), function (i, field) {


            if (field.name != "postem_ipsum_term[]"
            && field.name != "action"
            && field.name != "_wpnonce"
            && field.name != "_wp_http_referer"
            ) {
                variables[field.name] = field.value;
            }

        });

        $.each($('#postem-ipsum-product-generation').serializeArray(), function (i, field) {


            if (field.name != "postem_ipsum_term[]"
                && field.name != "action"
                && field.name != "_wpnonce"
                && field.name != "_wp_http_referer") {
                variables[field.name] = field.value;
            }

        });

        var terms = {};
        $('.checks_terms:checked').each(function (i) {
            terms[i] = $(this).val();
        });


        var metaboxes = {};
        var metafields = $(".dynamic_metabox").serializeArray();
        $.each(metafields, function (i, field) {

            metaboxes[field.name] = field.value;


        });

        variables["terms"] = terms;

        variables["metaboxes"] = metaboxes;

        download("data.json", JSON.stringify(variables));

    });

    ///////////////////////////////////////////////// WOO ///////////////////
    $(document).on("click", ".postem-ipsum-generate-products", function (e) {
        e.preventDefault();
        var $inputs = $('#postem-ipsum-product-generation:input');
        var bg_color = $('#postem_ipsum_product_image_bg').val();
        var variables = {};
        $.each($('#postem-ipsum-product-generation').serializeArray(), function (i, field) {
            variables[field.name] = field.value;
        });
        // AJAX CALL
        if (
            $("#cat").val() != "" &&
            $("#postem_ipsum_woo_products_number").val() != "" &&
            $("#postem_ipsum_woo_product_paragraphs").val() != "") {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating products for you...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            });

            $.post(ajaxurl,
                {
                    action: "postem_ipsum_generate_products",
                    variables: variables,
                    price_min: price_min,
                    price_max: price_max,
                    weight_min: weight_min,
                    weight_max: weight_max,
                    length_min: length_min,
                    length_max: length_max,
                    width_min: width_min,
                    width_max: width_max,
                    height_min: height_min,
                    height_max: height_max,
                    cat_random: cat_random,
                    bg_random: bg_random,
                    bg_color: bg_color
                })
                .done(function (result) {
                    $(".result").html(result);
                    $(".image_color").hide();
                    $(".image_w").hide();
                    $(".image_h").hide();
                    $('.wp-picker-container').show();
                    price_slider.noUiSlider.set([200, 800]);
                    $("#cat").prop("disabled", false);
                    $('#postem-ipsum-product-generation').trigger("reset");
                    $(".postem_ipsum_woo_comments_row").hide();
                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        });
                });
        }
        else {
            alert("Fill the form");
        }
    });

    $(document).on("click", ".postem-ipsum-delete-products", function (e) {
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting products for you...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });
        $.post(ajaxurl,
            {
                action: "postem_ipsum_remove_products",
            })
            .done(function (result) {
                $('#postem-ipsum-product-generation').trigger("reset");
                // hide the loading modal
                delay(time)
                    .then(function () {
                        $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('hide');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('destroy');
                    });
            });
    });

    $(document).on("change", "#postem_ipsum_woo_product_image", function () {
        var selection = $("#postem_ipsum_woo_product_image").val();
        if (selection == "yes") {
            $(".postem_ipsum_image_color").show();
            $(".postem_ipsum_image_w").show();
            $(".postem_ipsum_image_h").show();
            $(".postem_ipsum_image_table").css('min-height', '400px');
        }
        else {
            $(".postem_ipsum_image_color").hide();
            $(".postem_ipsum_image_w").hide();
            $(".postem_ipsum_image_h").hide();
            $(".postem_ipsum_image_table").css('min-height', '0px');
        }
    });

    $(document).on("change", "#postem_ipsum_woo_comments", function () {
        var selection = $("#postem_ipsum_woo_comments").val();

        if (selection == "yes") {
            $(".postem_ipsum_woo_comments_row").show();
        }
        else {
            $(".postem_ipsum_woo_comments_row").hide();
        }
    });

    $(document).on("change", "#postem_ipsum_woo_weight", function () {
        var selection = $("#postem_ipsum_woo_weight").val();

        if (selection == "yes") {
            $(".weight_row").show();
        }
        else {
            $(".weight_row").hide();
        }
    });

    $(document).on("change", "#postem_ipsum_woo_length", function () {
        var selection = $("#postem_ipsum_woo_length").val();

        if (selection == "yes") {
            $(".length_row").show();
        }
        else {
            $(".length_row").hide();
        }
    });

    $(document).on("change", "#postem_ipsum_woo_width", function () {
        var selection = $("#postem_ipsum_woo_width").val();

        if (selection == "yes") {
            $(".width_row").show();
        }
        else {
            $(".width_row").hide();
        }
    });

    $(document).on("change", "#postem_ipsum_woo_height", function () {
        var selection = $("#postem_ipsum_woo_height").val();

        if (selection == "yes") {
            $(".height_row").show();
        }
        else {
            $(".height_row").hide();
        }
    });

    $(document).on("change", "#postem_ipsum_woo_product_type", function () {
        var selection = $("#postem_ipsum_woo_product_type").val();

        if (selection == "variable") {
            $(".attributer_selection").show();
        }
        else {
            $(".attributer_selection").hide();
        }
    });


    //////////////////////////////////// USERS /////////////////////////////////////////////////
    $(document).on("click", ".postem-ipsum-generate-users", function (e) {

        e.preventDefault();

        var users_number = $("#postem_ipsum_users_number").val();
        var $inputs = $('#postem-ipsum-user-generation:input');
        // var bg_color = $("#postem_ipsum_featured_image_bg").val();
        var variables = {};
        $.each($('#postem-ipsum-user-generation').serializeArray(), function (i, field) {
            variables[field.name] = field.value;
        });

        // AJAX CALL
        if (
            $("#postem_ipsum_users_number").val() != "" &&
            $("#postem_ipsum_users_role").val() != 0
        ) {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating users for you...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            });

            $.ajax({
                url: 'https://randomuser.me/api/?results=' + users_number,
                dataType: 'json',
                success: function (data) {
                    $.post(ajaxurl,
                        {
                            action: "postem_ipsum_generate_users",
                            users_data: data,
                            variables: variables,
                        })
                        .done(function (result) {

                            $(".result").html(result);
                            $('#postem-ipsum-user-generation').trigger("reset");

                            // hide the loading modal
                            delay(time)
                                .then(function () {
                                    $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                                    return delay(time);
                                })
                                .then(function () {
                                    $('body').loadingModal('hide');
                                    return delay(time);
                                })
                                .then(function () {
                                    $('body').loadingModal('destroy');
                                });
                        });
                }

            });


        }
        else {
            alert("Fill the form");
        }
    });


    $(document).on("click", ".postem-ipsum-delete-users", function (e) {
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting users for you...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });
        $.post(ajaxurl,
            {
                action: "postem_ipsum_remove_users",
            })
            .done(function (result) {
                $('#postem-ipsum-user-generation').trigger("reset");
                // hide the loading modal
                delay(time)
                    .then(function () {
                        $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('hide');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('destroy');
                    });
            });
    });


    //////////////////////////////////// TERMS /////////////////////////////////////////////////
    $(document).on("click", ".postem-ipsum-generate-terms", function (e) {

        e.preventDefault();

        var terms_number = $("#postem_ipsum_terms_number").val();
        var $inputs = $('#postem-ipsum-terms-generation:input');

        var variables = {};
        $.each($('#postem-ipsum-terms-generation').serializeArray(), function (i, field) {
            variables[field.name] = field.value;
        });

        // AJAX CALL
        if (
            $("#postem_ipsum_post_type").val() != "0" &&
            $("#postem_ipsum_taxonomy").val() != "0" &&
            $("#postem_ipsum_terms_number").val() != ""

        ) {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating terms for you...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            });


            $.post(ajaxurl,
                {
                    action: "postem_ipsum_generate_terms",
                    variables: variables,
                })
                .done(function (result) {

                    $(".result").html(result);
                    $('#postem-ipsum-terms-generation').trigger("reset");
                    $(".select_taxonomy").html("");

                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        });
                });
        }
        else {
            alert("Fill the form");
        }
    });

    $(document).on("click", ".postem-ipsum-delete-terms", function (e) {
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting terms for you...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });
        $.post(ajaxurl,
            {
                action: "postem_ipsum_remove_terms",
            })
            .done(function (result) {
                $('#postem-ipsum-terms-generation').trigger("reset");
                $(".result").append("<p><strong>Note:</strong><br>Deleting a term/category does not delete the items in that term/category. Instead, items that were only assigned to the deleted term/category are set to the term/category <strong>Uncategorized</strong></p>")
                // hide the loading modal
                delay(time)
                    .then(function () {
                        $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('hide');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('destroy');
                    });
            });
    });

    //////////////////////////////////// ORDERS /////////////////////////////////////////////////
    $(document).on("click", ".postem-ipsum-generate-orders", function (e) {

        e.preventDefault();

        var orders_number = $("#postem_ipsum_woo_orders_number").val();
        var $inputs = $('#postem-ipsum-woo-orders-generation:input');
        // var bg_color = $("#postem_ipsum_featured_image_bg").val();
        var variables = {};
        $.each($('#postem-ipsum-woo-orders-generation').serializeArray(), function (i, field) {
            variables[field.name] = field.value;
        });

        // AJAX CALL
        if (
            $("#postem_ipsum_woo_orders_number").val() != 0
        ) {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating orders for you...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            });


            $.post(ajaxurl,
                {
                    action: "postem_ipsum_generate_orders",
                    users: orders_number,
                    variables: variables,
                })
                .done(function (result) {

                    $(".result").html(result);
                    $('#postem-ipsum-woo-orders-generation').trigger("reset");

                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        });
                });


        }
        else {
            alert("Fill the form");
        }
    });


    $(document).on("click", ".postem-ipsum-delete-orders", function (e) {
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting orders for you...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });
        $.post(ajaxurl,
            {
                action: "postem_ipsum_remove_orders",
            })
            .done(function (result) {
                $(".result").html(result);
                $('#postem-ipsum-user-generation').trigger("reset");
                // hide the loading modal
                delay(time)
                    .then(function () {
                        $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('hide');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('destroy');
                    });
            });
    });

    /////////////////////////////// META BOXES /////////////////////////////////////////////////////////////

    $(document).on("click", ".postem-ipsum-add-new-metafield", function (e) {
        e.preventDefault();

        var meta_numbers = $('.metaboxes-table').children('tr').length;
        $.post(ajaxurl,
            {
                action: "postem_ipsum_add_metabox",
                meta_number: meta_numbers,
            })
            .done(function (result) {

                $(".metaboxes-table").append(result)


            });
    });


    //////////////////////////////////// BuddyPress Groups /////////////////////////////////////////////////
    $(document).on("click", ".postem-ipsum-buddy-generate-groups", function (e) {

        e.preventDefault();

        var group_number = $("#postem_ipsum_buddy_groups_number").val();
        var $inputs = $('#postem-ipsum-buddy-groups-generation:input');

        var variables = {};
        $.each($('#postem-ipsum-buddy-groups-generation').serializeArray(), function (i, field) {
            variables[field.name] = field.value;
        });

        // AJAX CALL
        if ($("#postem_ipsum_buddy_groups_number").val() != "") {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating groups for you...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            });


            $.post(ajaxurl,
                {
                    action: "postem_ipsum_buddy_generate_groups",
                    group_status_random: group_status_random,
                    variables: variables,
                })
                .done(function (result) {

                    $(".result").html(result);
                    $('#postem-ipsum-buddy-groups-generation').trigger("reset");


                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        });
                });
        }
        else {
            alert("Fill the form");
        }
    });

    $(document).on("click", ".postem-ipsum-buddy-delete-groups", function (e) {
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting groups for you...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });
        $.post(ajaxurl,
            {
                action: "postem_ipsum_remove_groups",
            })
            .done(function (result) {
                $('#postem-ipsum-buddy-groups-generation').trigger("reset");
                // hide the loading modal
                delay(time)
                    .then(function () {
                        $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('hide');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('destroy');
                    });
            });
    });

    $(document).on("click", ".postem-ipsum-buddy-generate-activities", function (e) {

        e.preventDefault();

        var activities_number = $("#postem_ipsum_buddy_activities_number").val();
        var $inputs = $('#postem-ipsum-buddy-activity-generation:input');

        var variables = {};
        $.each($('#postem-ipsum-buddy-activity-generation').serializeArray(), function (i, field) {
            variables[field.name] = field.value;
        });

        // AJAX CALL
        if ($("#postem_ipsum_buddy_activities_number").val() != "") {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating activities for you...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(0,0,0)',
                animation: 'doubleBounce'
            });


            $.post(ajaxurl,
                {
                    action: "postem_ipsum_buddy_generate_activities",
                    activity_type_random: activity_type_random,
                    user_random: user_random,
                    variables: variables,
                })
                .done(function (result) {

                    $(".result").html(result);
                    $('#postem-ipsum-buddy-activity-generation').trigger("reset");


                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        });
                });
        }
        else {
            alert("Fill the form");
        }
    });

    $(document).on("click", ".postem-ipsum-buddy-delete-activities", function (e) {
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting activities for you...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });
        $.post(ajaxurl,
            {
                action: "postem_ipsum_buddy_remove_activities",
            })
            .done(function (result) {
                $('#postem-ipsum-buddy-activity-generation').trigger("reset");
                // hide the loading modal
                delay(time)
                    .then(function () {
                        $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(0,0,0)');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('hide');
                        return delay(time);
                    })
                    .then(function () {
                        $('body').loadingModal('destroy');
                    });
            });
    });


    /////////////////////////////// CLOSE NOTICE /////////////////////////////////////////////////////////////

    $(document).on("click", ".postem-ipsum-close-notice", function (e) {
        e.preventDefault();

        $(".postem-ipsum-notice").hide();
    });

}(jQuery));
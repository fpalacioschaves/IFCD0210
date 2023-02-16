(function ($) {
    "use strict";

    var delay = function (ms) {
        return new Promise(function (r) {
            setTimeout(r, ms)
        })
    };
    var time = 2000;

    var pieces = [];

    $(document).ready(function () {



        if ($('#card-generate').length > 0) {




            $(function () {

                $("#card-generate").sortable({
                    revert: true,
                    cancel: ".unsortable"
                });



                $(".piece").draggable({
                    connectToSortable: "#card-generate,.pieces_container",
                    start: function() {

                    },
                    stop: function(){
                        pieces = [];
                        setTimeout(
                            function()
                            {
                                $('#card-generate .piece').each(function(i) {
                                    var atribute = $(this).attr("data-type");
                                    pieces[$(this).index()] = $(this).attr("data-type");

                                });



                                // AJAX CALL
                                $.post(ajaxurl,
                                    {
                                        action: "easy_filtering_refresch_card_preview",
                                        pieces: pieces,
                                    })

                                    .done(function (result) {

                                        if (result == 0) {
                                            alert("Something goes wrong")
                                        } else {
                                            $("#card-preview").html(result);
                                            pieces = [];

                                        }
                                    });
                            }, 1000);




                    }
                });

                $(".pieces_container").sortable({
                    revert: true,
                    cancel: ".unsortable"
                });



                $("ul, li").disableSelection();
            });

        }


    });


    $(document).on("click", ".table_header", function (e) {
        $(".table_container").addClass("closed");
        $(this).nextAll('.table_container').first().toggleClass("closed");
        $(this).find(".header_icon").toggleClass("dashicons-arrow-up-alt2 dashicons-arrow-down-alt2")
    });


    ///////////////////////////////////////////////// SELECT POST TYPE GET TAXONOMIES ///////////////////
    $(document).on("change", "#easy_filtering_post_type", function (e) {
        var post_type = $("#easy_filtering_post_type").val();

        // AJAX CALL
        $.post(ajaxurl,
            {
                action: "easy_filtering_get_taxonomies",
                post_type: post_type,
            })

            .done(function (result) {
                if (result == 0) {
                    alert("Something goes wrong")
                } else {
                    $(".select_taxonomy").show().html(result);

                }
            });
    });


    ///////////////////////////////////////////////// GENERATE ///////////////////
    $(document).on("click", ".easy-filtering-generate", function (e) {

        e.preventDefault();
        var $inputs = $('#easy-filtering-generation:input');

        var variables = {};
        $.each($('#easy-filtering-generation').serializeArray(), function (i, field) {

            if(field.name != "easy_filtering_taxonomy["){
                variables[field.name] = field.value;
            }

        });




        var taxonomies = [];
        $('.easy_filtering_taxonomy:checked').each(function(i){
            taxonomies[i] = $(this).val();
        });

        var valid = false;

        if((taxonomies.length > 0 && $("#easy_filtering_mode").val() == "filter") ||
            $("#easy_filtering_mode").val() == "list"){
            valid = true;
        }

        // AJAX CALL
        if (
            $("#easy_filtering_post_type").val() != "0" &&
            valid &&
            //$("#easy_filtering_taxonomy").val() != 0 &&
            $("#easy_filtering_title").val != "" &&
            parseInt($("#easy_filtering_post_number").val) != 0 &&
            $("#easy_filtering_post_number").val() != "") {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating the filter shortcode...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(5,44,99)',
                animation: 'doubleBounce'
            });

            $.post(ajaxurl,
                {
                    action: "easy_filtering_generate_shortcode",
                    variables: variables,
                    taxonomies: taxonomies
                })
                .done(function (result) {

                    //$(".result").html(result);
                    $(".select_taxonomy").html("");
                    $('#easy-filtering-generation').trigger("reset");


                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(153,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        })
                        .then(function () {
                            var queryParameters = {}, queryString = location.search.substring(1),
                                re = /([^&=]+)=([^&]*)/g, m;
                            while (m = re.exec(queryString)) {
                                queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                            }
                            queryParameters['page'] = 'easy-filtering-view-filters';
                            location.search = $.param(queryParameters); // Causes page to reload
                        });
                });
        }
        else {
            alert("Fill the form");
        }
    });


    ///////////////////////////////////////////////// EDIT ///////////////////
    $(document).on("click", ".easy-filtering-edit", function (e) {

        e.preventDefault();
        var $inputs = $('#easy-filtering-edition:input');

        var variables = {};
        $.each($('#easy-filtering-edition').serializeArray(), function (i, field) {

            if(field.name != "easy_filtering_taxonomy[]"){

                variables[field.name] = field.value;

            }

        });


        var taxonomies = [];
        $('.easy_filtering_taxonomy:checked').each(function(i){
            taxonomies[i] = $(this).val();
        });

        var valid = false;

        if((taxonomies.length > 0 && $("#easy_filtering_mode").val() == "filter") ||
            $("#easy_filtering_mode").val() == "list"){
            valid = true;
        }

        // AJAX CALL
        if (
            $("#easy_filtering_post_type").val() != "0" &&
            valid &&
            parseInt($("#easy_filtering_post_number").val()) != 0 &&
            $("#easy_filtering_title").val != "" &&
            $("#easy_filtering_post_number").val() != "") {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are editing the filter shortcode...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(5,44,99)',
                animation: 'doubleBounce'
            });

            $.post(ajaxurl,
                {
                    action: "easy_filtering_edit_shortcode",
                    variables: variables,
                    taxonomies: taxonomies
                })
                .done(function (result) {

                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(153,0,0)');
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


////////////////////////////////////// REMOVE //////////////////////////////
    $(document).on("click", ".easy-filtering-delete", function (e) {

        var filter_id = $(this).attr("data-filter-id");
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting the filter...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });

        $.post(ajaxurl,
            {
                filter_id: filter_id,
                action: "easy_filtering_remove_shortcode",
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
                    })

                    .then(function () {
                        location.reload();
                    });


            });
    });


    ////////////////////////////////////// Generate Card //////////////////////////////
    $(document).on("click", ".easy-filtering-card-generate", function (e) {

        e.preventDefault();


        if ($("#easy_filtering_card_title").val() != ""){

            var pieces = [];

            $('#card-generate .piece').each(function(i, obj) {

                var atribute = $(this).attr("data-type");
                pieces.push(atribute);
            });

            console.log(pieces)

            // AJAX CALL
            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating the card structure...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(5,44,99)',
                animation: 'doubleBounce'
            });

            $.post(ajaxurl,
                {
                    action: "easy_filtering_generate_card",
                    card_title: $("#easy_filtering_card_title").val(),
                    pieces: pieces
                })
                .done(function (result) {

                    //$(".result").html(result);


                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(153,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        })
                        .then(function () {
                            var queryParameters = {}, queryString = location.search.substring(1),
                                re = /([^&=]+)=([^&]*)/g, m;
                            while (m = re.exec(queryString)) {
                                queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                            }
                            queryParameters['page'] = 'easy-filtering-view-cards';
                            location.search = $.param(queryParameters); // Causes page to reload
                        });

                });

        }
        else{
            alert("Some fields are empty")
        }



    });

    ///////////////////////////////////////////////// Edit Card ///////////////////
    $(document).on("click", ".easy-filtering-card-edit", function (e) {

        e.preventDefault();


        if ($("#easy_filtering_card_title").val() != ""){

            var pieces = [];

            $('#card-generate .piece').each(function(i, obj) {

                var atribute = $(this).attr("data-type");
                pieces.push(atribute);
            });

            console.log(pieces)

            // AJAX CALL
            $('body').loadingModal({
                position: 'auto',
                text: 'We are editing the card structure...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(5,44,99)',
                animation: 'doubleBounce'
            });

            $.post(ajaxurl,
                {
                    action: "easy_filtering_edition_card",
                    card_title: $("#easy_filtering_card_title").val(),
                    card_id : $("#easy_filtering_card_id").val(),
                    pieces: pieces
                })
                .done(function (result) {

                    //$(".result").html(result);


                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(153,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        })
                        .then(function () {
                            var queryParameters = {}, queryString = location.search.substring(1),
                                re = /([^&=]+)=([^&]*)/g, m;
                            while (m = re.exec(queryString)) {
                                queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                            }
                            queryParameters['page'] = 'easy-filtering-view-cards';
                            //location.search = $.param(queryParameters); // Causes page to reload

                            location.reload();
                        });

                });

        }

        else{
            alert("Some fields are empty")
        }
    });

    ////////////////////////////////////// Remove card //////////////////////////////
    $(document).on("click", ".easy-filtering-delete-card", function (e) {


        var card_id = $(this).attr("data-card-id");
        e.preventDefault();
        $('body').loadingModal({
            position: 'auto',
            text: 'We are deleting the card...',
            color: '#fff',
            opacity: '0.7',
            backgroundColor: 'rgb(0,0,0)',
            animation: 'doubleBounce'
        });

        $.post(ajaxurl,
            {
                card_id: card_id,
                action: "easy_filtering_remove_card",
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
                    })

                    .then(function () {
                        location.reload();
                    });


            });
    });

    ///////////////////////////////////////////////// GENERATE FOR PRODUCTS ///////////////////
    $(document).on("click", ".easy-filtering-generate-product", function (e) {

        e.preventDefault();
        var $inputs = $('#easy-filtering-generation:input');

        var variables = {};
        $.each($('#easy-filtering-generation').serializeArray(), function (i, field) {
            variables[field.name] = field.value;
        });

        var attrs = [];
        $('.easy_filtering_attrs:checked').each(function(i){
            attrs[i] = $(this).val();
        });

        // AJAX CALL
        if (
            $("#easy_filtering_title").val != "" &&
            $("#easy_filtering_post_number").val() != "") {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are creating the filter shortcode...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(5,44,99)',
                animation: 'doubleBounce'
            });

            $.post(ajaxurl,
                {
                    action: "easy_filtering_generate_shortcode_product",
                    variables: variables,
                    filter_attributes: attrs
                })
                .done(function (result) {

                    //$(".result").html(result);
                    $(".select_taxonomy").html("");
                    $('#easy-filtering-generation').trigger("reset");


                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(153,0,0)');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('hide');
                            return delay(time);
                        })
                        .then(function () {
                            $('body').loadingModal('destroy');
                        })
                        .then(function () {
                            var queryParameters = {}, queryString = location.search.substring(1),
                                re = /([^&=]+)=([^&]*)/g, m;
                            while (m = re.exec(queryString)) {
                                queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                            }
                            queryParameters['page'] = 'easy-filtering-view-filters';
                            location.search = $.param(queryParameters); // Causes page to reload
                        });
                });
        }
        else {
            alert("Fill the form");
        }
    });

    ///////////////////////////////////////////////// EDIT FOR PRODUCT ///////////////////
    $(document).on("click", ".easy-filtering-edit-product", function (e) {

        e.preventDefault();
        var $inputs = $('#easy-filtering-edition:input');

        var variables = {};
        $.each($('#easy-filtering-edition').serializeArray(), function (i, field) {
            variables[field.name] = field.value;
        });

        var attrs = [];
        $('.easy_filtering_attrs:checked').each(function(i){
                attrs[i] = $(this).val();
        });


        // AJAX CALL
        if (
            $("#easy_filtering_title").val != "" &&
            $("#easy_filtering_post_number").val() != "") {

            $('body').loadingModal({
                position: 'auto',
                text: 'We are editing the filter shortcode...',
                color: '#fff',
                opacity: '0.7',
                backgroundColor: 'rgb(5,44,99)',
                animation: 'doubleBounce'
            });

            $.post(ajaxurl,
                {
                    action: "easy_filtering_edit_shortcode_product",
                    variables: variables,
                    filter_attributes: attrs
                })
                .done(function (result) {

                    // hide the loading modal
                    delay(time)
                        .then(function () {
                            $('body').loadingModal('color', '#fff').loadingModal('text', 'Done :-)').loadingModal('backgroundColor', 'rgb(153,0,0)');
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

}(jQuery));
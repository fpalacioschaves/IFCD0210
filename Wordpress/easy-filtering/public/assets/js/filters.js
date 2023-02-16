(function ($) {

    "use strict";

    // GLOBAL VARS
    var $grid;
    var filter_running = false;
    var grid_block_width = 450;
    var paginator;
    var min_price = 0;
    var max_price = 0;
    var filter_search_string = "";



    $(document).ready(function () {

        var cont_width = parseInt($(".easy-filtering-container").width());
        var round = Math.floor(cont_width / grid_block_width);
        var grid_width = round * grid_block_width;
        var padding = (cont_width - grid_width) / 2;
        $(".easy-filtering-container").css("padding-left", padding);

        var found = $("[data-p-found]").attr("data-p-found");
        $(".amount-results").html("Found: " + found);

        //Load total posts value in input field
        $("#filter_total_posts").val(found);

        get_params_and_work();

        // If we Have selector, we hide labels
        if ($("select.filter-dropdown").length > 0) {
            $(".active-filters").hide();
            $(".labels-block").hide();
        }
        ;

    });


    // Change order
    $(document).on("change", "#filter_order_selector", function () {

        $(".grid").html("");

        var order = $(this).val();
        $("#filter_order").val(order)

        $(".js-filter-load-more").attr("data-page", 1);

        $(".easy-filtering-running-layer").addClass("active");

        filter_running = true;

        apply_filters();

    });


    // Change order by
    $(document).on("change", "#filter_orderby_selector", function () {

        $(".grid").html("");

        var orderby = $(this).val();
        $("#filter_orderby").val(orderby)

        $(".js-filter-load-more").attr("data-page", 1);

        $(".easy-filtering-running-layer").addClass("active");

        filter_running = true;

        apply_filters();

    });


    // Case Selectior
   $(document).on("change", ".filter-dropdown", function () {



        $(".grid").html("");

        $(".js-filter-tag-list").html("")
        var selected = $(this).find(':selected');

        $.each(selected, function (key, value) {

            var $this = $(this);

            paginator = 1;

            if ($(this).attr("data-reset")) {
                $(this).parent('.filter-dropdown').val(null).trigger('change');


            }
            else {


            }

            $(".js-filter-load-more").attr("data-page", 1);

            $(".easy-filtering-running-layer").addClass("active");

            filter_running = true;

            if ($(".price-filter-container").length > 0) {
                apply_price_filtering();
            }



        });

       apply_filters();
    });


    // Click on filter
    $(document).on("click", ".filter-dropdown-li", function () {



        paginator = 1;

        $(".grid").html("");

        var taxonomy_name = $(this).attr("data-taxonomy-name");

        if ($(this).attr("data-reset")) {

            $(this).parent("ul").find(".filter-dropdown-li").removeClass("active");
            $(this).addClass("active");
            add_label($(this));

        }
        else {

            if (!$(this).hasClass("active")) {
                $(this).parent("ul").find("[data-taxonomy-slug = 'all']").removeClass("active");
                $(this).addClass("active");
                add_label($(this));


            } else {
                $(this).removeClass("active");
                remove_label($(this))
            }

        }

        $(".js-filter-load-more").attr("data-page", 1);

        $(".easy-filtering-running-layer").addClass("active");

        filter_running = true;

        if ($(".price-filter-container").length > 0) {
            apply_price_filtering();
        }

        max_price = $("#easy_filtering_max_price").val();

        min_price = $("#easy_filtering_min_price").val();


        apply_filters();

    });

    // Click on Search button
    $(document).on("click", "#filtering_search_submit", function () {

        $(".grid").html("");

        paginator = 1;

        var search = $("#filtering_search").val();

        $(".js-filter-load-more").attr("data-page", 1);

        $(".easy-filtering-running-layer").addClass("active");

        filter_running = true;

        if ($(".price-filter-container").length > 0) {
            apply_price_filtering();
        }

        max_price = $("#easy_filtering_max_price").val();

        min_price = $("#easy_filtering_min_price").val();

        apply_filters();

    });

    // Click on Filter Price Button button
    $(document).on("click", ".js-filter-price", function (e) {

        $(".grid").html("");

        e.preventDefault();

        paginator = 1;

        max_price = $("#easy_filtering_max_price").val();

        min_price = $("#easy_filtering_min_price").val();

        $(".js-filter-load-more").attr("data-page", 1);

        $(".easy-filtering-running-layer").addClass("active");

        filter_running = true;

        apply_filters();

    });


    // Elimina bloques y deselecciona terms en los selects del filtro
    $(document).on("click", ".tag-block span", function () {

        $(".grid").html("");

        var object = $(this).closest("li");

        $(".easy-filtering-running-layer").addClass("active");

        filter_running = true;

        if (object.data().filterType) {

            if (object.attr("data-filter-type") == "all") {
                $(".filter-dropdown li[data-filter-type]").removeClass("active");
                $(".js-filter-tag-list li[data-filter-type]").remove();
            } else {

                $(".filter-dropdown [data-filter-type='" + object.attr("data-filter-type") + "']").removeClass("active");
                $(".js-filter-tag-list li[data-filter-type='" + object.attr("data-filter-type") + "']").remove();
            }


        } else {
            var taxonomy_name = object.attr("data-taxonomy-name")


            if (object.attr("data-" + taxonomy_name) == "all") {
                $(".filter-dropdown li[data-" + taxonomy_name + "]").removeClass("active");
                $(".js-filter-tag-list li[data-" + taxonomy_name + "]").remove();
            } else {

                $(".filter-dropdown [data-" + taxonomy_name + "='" + object.attr("data-" + taxonomy_name) + "']").removeClass("active");
                $(".js-filter-tag-list li[data-" + taxonomy_name + "='" + object.attr("data-" + taxonomy_name) + "']").remove();
            }


        }
        apply_filters();


    });

    // Click in Load More
    $(document).on("click", ".js-filter-load-more, .js-filter-load-infinite", function (e) {

        e.preventDefault();

        var paged = $(this).attr("data-page");

        $(".easy-filtering-running-layer").addClass("active");
        filter_running = true;
        apply_filters(true);

    });


    // Click in Pagination
    $(document).on("click", ".js-filter-paginator", function (e) {

        e.preventDefault();

        var paged = $(this).attr("data-page");
        paginator = paged;
        $(".easy-filtering-running-layer").addClass("active");
        filter_running = true;
        apply_filters(true);

    });


    // Detect scroll to filter bottom
    $(window).bind('scroll', function () {

        if ($('.easy-filtering-container').length > 0) {

            if ($(window).scrollTop() >= $('.easy-filtering-container').offset().top + $('.easy-filtering-container').outerHeight() - window.innerHeight) {

                $(".js-filter-load-infinite").click();

            }
        }
    });


    // Click on attribute value
    $(document).on("click", ".filter-attribute-dropdown-li", function () {

        $(".grid").html("");

        paginator = 1;

        var attribute_name = $(this).attr("data-attribute-name");

        var ul_parent = $("ul[data-attribute-name=value" + attribute_name + "]")

        // Search the UL Parent

        if ($(this).attr("data-reset")) {

            $(this).parents("ul").find(".filter-attribute-dropdown-li").removeClass("active");
            $(this).addClass("active");
            //add_label($(this));

        }
        else {

            if (!$(this).hasClass("active")) {
                $(this).parents("ul").find("[data-attribute-slug = 'all']").removeClass("active");
                $(this).addClass("active");
                //add_label($(this));


            } else {
                $(this).removeClass("active");
                //remove_label($(this))
            }

        }

        $(".js-filter-load-more").attr("data-page", 1);

        $(".easy-filtering-running-layer").addClass("active");

        filter_running = true;

        apply_filters();

    });


    // FUNCTION

    // apply filtering
    function apply_filters(pagination) {


        // Pagination mode

        if ($("#filter_pagination").val() == "load_more") {
            var paged = ($(".js-filter-load-more").length > 0
                ? $(".js-filter-load-more").attr("data-page")
                : 1);

        }

        if ($("#filter_pagination").val() == "load_infinite") {
            var paged = ($(".js-filter-load-infinite").length > 0
                ? $(".js-filter-load-infinite").attr("data-page")
                : 1);

        }

        if ($("#filter_pagination").val() == "pagination") {
            var paged = paginator

        }

        // Search mode
        if ($("#filtering_search").length > 0) {
            filter_search_string = $("#filtering_search").val();
        }
        else {
            filter_search_string = "";
        }

        $("[data-p-found]").remove();

        if (!pagination) {
            var elements_to_remove = $(".filter-grid-item");
            //$grid.masonry('remove', elements_to_remove).masonry('layout');
        } else {
            var elements_to_remove = $(".js-filter-load-more");
            //$grid.masonry('remove', elements_to_remove).masonry('layout');
        }


        var post_type = $("#filter_post_type").val();

        var post_type_string = "";

        var search_string = "";

        if (post_type.length !== 0) {
            post_type_string = "?post-type=" + post_type;
        } else {
            post_type_string = "?post-type=";
        }

        if (filter_search_string.length !== 0) {
            search_string = "&search=" + filter_search_string;
        }


        var terms_array = [];
        var this_terms_string
        this_terms_string = "";


        // Filter select mode
        if ($("select.filter-dropdown").length > 0) {

            $('select.filter-dropdown').each(function (i, obj) {

                var taxonomy_name = $(this).attr("data-taxonomy-name")

                var temporal_terms = [];

                var selected = $(this).find(':selected');
                $.each(selected, function (key, value) {

                    var category_name = $(this).attr("data-taxonomy-slug")

                    if (category_name != null && category_name != "all") {

                        temporal_terms.push(category_name);

                    }


                });

                terms_array.push({"tax_name": taxonomy_name, "tax_values": temporal_terms});

            });


        }

        // Filter tabs mode
        else {

            $('.filter-dropdown').each(function (i, obj) {

                var taxonomy_name = $(this).attr("data-taxonomy-name")

                var temporal_terms = [];

                $(this).find('.filter-dropdown-li[data-taxonomy-slug].active').each(function (i, obj) {

                    var category_name = $(this).attr("data-taxonomy-slug")

                    if (category_name != null && category_name != "all") {

                        temporal_terms.push(category_name);

                    }
                });
                terms_array.push({"tax_name": taxonomy_name, "tax_values": temporal_terms});

            });


            //console.log(terms_array)
            //console.log(this_terms_string);


        }

        if (terms_array.length !== 0) {
            $.each(terms_array, function (i, obj) {
                if (obj.tax_values.length > 0) {
                    this_terms_string = this_terms_string + "&" + obj.tax_name + "=" + obj.tax_values.join(',');
                }
            });

        }

        var this_attributes_string
        this_attributes_string = "";
        var attributes_array = [];
        var temporal;

        $('.filter-attribute-dropdown').each(function (i, obj) {

            var attribute_name = $(this).attr("data-attribute-name")

            var $this = $(this)

            temporal = [];

            $this.find('.filter-attribute-dropdown-li[data-attribute-slug].active').each(function (i, obj) {

                var attribute_value = $(this).attr("data-attribute-slug")

                if (attribute_name != null && attribute_value != "all") {

                    temporal.push(attribute_value);

                }

            });


            if (temporal.length !== 0) {

                this_attributes_string = this_attributes_string + "&" + attribute_name + "=" + temporal.join(',');
            }

            obj = {}

            obj[attribute_name] = temporal

            attributes_array.push(obj);

        });


        var data = {
            action: "easy_filtering_filters_apply_filter_ajax",
            paged: paged,
            filter_terms: terms_array,
            filter_attrs: attributes_array,
            filter_taxonomy: $("#filter_taxonomy").val(),
            filter_post_number: $("#filter_post_number").val(),
            filter_columns: $("#filter_columns").val(),
            filter_post_type: $("#filter_post_type").val(),
            filter_pagination: $("#filter_pagination").val(),
            filter_order: $("#filter_order").val(),
            filter_orderby: $("#filter_orderby").val(),
            filter_card: $("#filter_card").val(),
            filter_search_string: filter_search_string,
            filter_min_price: min_price,
            filter_max_price: max_price,
        };



        $.post(PublicGlobal.ajax_url, data, function (res) {

            var render = $(res);
           

            var current_slug = window.location.href.split('?')[0];

            if ($("#filter_pagination").val() == "pagination") {

                $(".grid").html("");

            }

            //$(".grid").html("");
            $('.grid').append(render);
            //$grid.masonry('appended', render);
            //$grid.masonry('layout');

            filter_running = false;
            $(".easy-filtering-running-layer").removeClass("active");

            var delay = setInterval(function () {

                $(".amount-results").html("Found: " + parseInt($(".data-p-found").attr("data-p-found")));
                clearInterval(delay);

            }, 500);

            window.history.pushState('page2', 'Title', current_slug + post_type_string + this_terms_string + this_attributes_string + search_string);

        });

    }


    // apply filtering
    function apply_price_filtering() {


        if ($("#filtering_search").length > 0) {
            filter_search_string = $("#filtering_search").val();
        }
        else {
            filter_search_string = "";
        }


        var post_type = $("#filter_post_type").val();

        var post_type_string = "";

        var terms_array = [];


        if ($("select.filter-dropdown").length > 0) {

            var selected = $("select.filter-dropdown").find(':selected');
            $.each(selected, function (key, value) {
                var $this = $(this);

                var taxonomy_name = $this.attr("data-taxonomy-slug")
                if (taxonomy_name != null) {
                    terms_array.push(taxonomy_name);
                }

            });

        }
        else {
            $('.filter-dropdown-li[data-taxonomy-slug].active').each(function (i, obj) {

                var taxonomy_name = $(this).attr("data-taxonomy-slug")
                if (taxonomy_name != null && taxonomy_name != "all") {
                    terms_array.push(taxonomy_name);
                }
            });
        }


        var attributes_array = [];
        var temporal;

        $('.filter-attribute-dropdown').each(function (i, obj) {

            var attribute_name = $(this).attr("data-attribute-name")

            var $this = $(this)

            temporal = [];

            $this.find('.filter-attribute-dropdown-li[data-attribute-slug].active').each(function (i, obj) {

                var attribute_value = $(this).attr("data-attribute-slug")

                if (attribute_name != null && attribute_value != "all") {

                    temporal.push(attribute_value);

                }

            });

            obj = {}

            obj[attribute_name] = temporal

            attributes_array.push(obj);

        });


        var data = {
            action: "easy_filtering_get_prices_range_ajax",
            filter_terms: terms_array,
            filter_attrs: attributes_array,
            filter_taxonomy: $("#filter_taxonomy").val(),
            filter_post_number: $("#filter_post_number").val(),
            filter_post_type: $("#filter_post_type").val(),
            filter_pagination: $("#filter_pagination").val(),
            filter_order: $("#filter_order").val(),
            filter_orderby: $("#filter_orderby").val(),
            filter_card: $("#filter_card").val(),
            filter_search_string: filter_search_string,
        };


        $.post(PublicGlobal.ajax_url, data, function (res) {


            var this_max_price = res.max_price;

            var this_min_price = res.min_price;

            $("#easy_filtering_max_price").val(this_max_price)

            $("#easy_filtering_min_price").val(this_min_price)


        }, "json");

    }


    // Add labels on click in li
    function add_label(object) {

        var tab = "";

        var taxonomy_slug = object.attr("data-taxonomy-slug")

        if (object.attr("data-taxonomy-slug") === "all") {

            $(".js-filter-tag-list [data-taxonomy-slug]").remove();
            $(".js-filter-tag-list").append("<li class='tag-block' data-taxonomy-slug='" + taxonomy_slug + "'>All content<span></span></li>");

        } else {

            tab = $("[data-taxonomy-slug='" + taxonomy_slug + "'").html().replace(/\[\[.*?\]\]/, "");
            tab = tab.replace(/\[.*?\]/, "")
            $(".js-filter-tag-list li[data-taxonomy-slug='all']").remove();
            $(".js-filter-tag-list").append("<li class='tag-block' data-taxonomy-slug='" + taxonomy_slug + "'>" + tab + "<span></span></li>");
        }


    }

    // Remove labels on click in li
    function remove_label(object) {


        var taxonomy_slug = object.attr("data-taxonomy-slug")

        $(".js-filter-tag-list li[data-taxonomy-slug='" + taxonomy_slug + "'").remove();


    }


    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined
                    ? true
                    : sParameterName[1];
            }
        }
    };

    function get_params_and_work() {

        location.queryString = {};
        var post_type;
        var terms = "";
        location.search.substr(1).split("&").forEach(function (pair) {
            if (pair === "") {

                return;
            }

            var parts = pair.split("=");

            var taxonomy = parts[0]
            terms = parts[1]


            if (terms === undefined || terms === null) {
                terms = "";
            }


            terms = decodeURIComponent(terms)

            //console.log(terms)

            if ($("select.filter-dropdown").length > 0) {

                if (taxonomy != "post-type" && taxonomy != "search") {
                    if (terms.length > 0) {
                        var all_terms = terms.split(",")
                        //console.log(all_terms)
                        $('#' + taxonomy).val(all_terms);
                    }

                    //$('select.filter-dropdown').trigger('change');

                }

            }
            else {

                if (taxonomy != "post-type" && taxonomy != "search") {

                    var all_terms = terms.split(",")
                    $.each(all_terms, function (i, val) {


                        // Es una tax o es un atributo
                        if ($("[data-taxonomy-slug=" + val + "]").length > 0) {
                            //marcamos los li
                            $("[data-taxonomy-slug=" + val + "]").addClass("active")
                            // añadimos los bloques
                            var tab = $("[data-taxonomy-slug='" + val + "']").attr("data-taxonomy-slug");
                            $(".js-filter-tag-list").prepend("<li class='tag-block' data-taxonomy-slug='" + tab + "'>" + tab + "<span></span></li>");
                        }

                        if ($("[data-attribute-slug=" + val + "]").length > 0) {

                            $("[data-attribute-slug=" + val + "]").addClass("active")

                        }

                    });


                }

            }


        });

    }


})(jQuery);

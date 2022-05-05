<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('EasyFiltering_Public')) {
    class EasyFiltering_Public
    {

        public function __construct()
        {

            // Add Public scripts ...
            add_action(
                'wp_enqueue_scripts', function () {
                // Styles ...

                wp_enqueue_style("plugin-public", plugin_dir_url(__FILE__) . 'assets/css/filters.css', array(), '1.0.0', 'all');

                // For Select
                wp_enqueue_style("select2-css", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css", array(), '1.0.0', 'all');
                wp_enqueue_script("select2-js", "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js", array('jquery'), '1.0.0', FALSE);


                // Scripts ..
                //wp_enqueue_script('masonry-js', plugin_dir_url(__FILE__) . 'assets/js/masonry.pkgd.min.js', array('jquery'), '0.0.1', TRUE);

                wp_enqueue_script("plugin-public-js", plugin_dir_url(__FILE__) . 'assets/js/filters.js', array('jquery'), '1.0.0', FALSE);


                wp_localize_script(
                    'plugin-public-js',
                    'PublicGlobal',
                    array(
                        'ajax_url' => admin_url('admin-ajax.php'),
                    )
                );
            }
            );

            add_shortcode("easy-filtering", array(
                    $this,
                    "easy_filtering_container")
            );

            add_action(
                'wp_ajax_nopriv_easy_filtering_filters_apply_filter_ajax', array(
                    $this,
                    'easy_filtering_filters_apply_filter_ajax',
                )
            );

            add_action(
                'wp_ajax_easy_filtering_filters_apply_filter_ajax', array(
                    $this,
                    'easy_filtering_filters_apply_filter_ajax',
                )
            );

            add_action(
                'wp_ajax_nopriv_easy_filtering_products_apply_filter_ajax', array(
                    $this,
                    'easy_filtering_products_apply_filter_ajax',
                )
            );

            add_action(
                'wp_ajax_easy_filtering_products_apply_filter_ajax', array(
                    $this,
                    'easy_filtering_products_apply_filter_ajax',
                )
            );

            add_action(
                'wp_ajax_nopriv_easy_filtering_get_prices_range_ajax', array(
                    $this,
                    'easy_filtering_get_prices_range_ajax',
                )
            );

            add_action(
                'wp_ajax_easy_filtering_get_prices_range_ajax', array(
                    $this,
                    'easy_filtering_get_prices_range_ajax',
                )
            );


        }

        // Get filter data by id
        public function get_filter_data($filter_id)
        {

            global $wpdb;

            $my_filter = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "easy_filtering_filters WHERE filter_id = $filter_id");

            return $my_filter;

        }

        public function get_card_data($card_id)
        {

            global $wpdb;

            $my_card = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "easy_filtering_card WHERE card_id = $card_id");

            return $my_card;

        }

        // Filtering shortcode fallback
        function easy_filtering_container($atts = [], $content = null, $tag = '')
        {

            $atts = array_change_key_case((array)$atts, CASE_LOWER);

            // override default attributes with user attributes
            $shortcode_atts = shortcode_atts([
                'filter_id' => 0,
            ], $atts, $tag);

            $filter_id = $shortcode_atts['filter_id'];

            $data = $this->get_filter_data($filter_id);


            $filter_data = $data[0];

            $filter = json_decode($filter_data->filter_data);

            $filter_mode = isset($filter->easy_filtering_mode) ? $filter->easy_filtering_mode : "";

            $filter_post_type = isset($filter->easy_filtering_post_type) ? $filter->easy_filtering_post_type : "";

            $filter_title = isset($filter->easy_filtering_title) ? $filter->easy_filtering_title : "";

	        $filter_columns = isset($filter->easy_filtering_columns) ? $filter->easy_filtering_columns : "2";

	        $filter_taxonomy = isset($filter->easy_filtering_taxonomy) ? $filter->easy_filtering_taxonomy : "";

            $filter_show_price_filter = isset($filter->easy_filtering_show_price_filter) ? $filter->easy_filtering_show_price_filter : "no";

            $filter_show_count = isset($filter->easy_filtering_show_count) ? $filter->easy_filtering_show_count : "no";

            $filter_show_empty = isset($filter->easy_filtering_show_empty_terms) ? $filter->easy_filtering_show_empty_terms : "no";

            $filter_post_number = isset($filter->easy_filtering_post_number) ? $filter->easy_filtering_post_number : 5;

            $filter_show_search = isset($filter->easy_filtering_show_search) ? $filter->easy_filtering_show_search : "no";

            $filter_order_frontend = isset($filter->easy_filtering_order_frontend) ? $filter->easy_filtering_order_frontend : "no";

            $filter_order = isset($filter->easy_filtering_order) ? $filter->easy_filtering_order : "ASC";

            $filter_orderby = isset($filter->easy_filtering_orderby) ? $filter->easy_filtering_orderby : "default";

            $filter_pagination = isset($filter->easy_filtering_pagination) ? $filter->easy_filtering_pagination : "none";

            $filter_select_type = isset($filter->easy_filtering_select_type) ? $filter->easy_filtering_select_type : "tabs";

            $filter_card = isset($filter->easy_filtering_select_card) ? $filter->easy_filtering_select_card : "default";

            $postem_ipsum_taxonomies = get_object_taxonomies($filter_post_type, 'object');

            $taxonomy_selection = $this->easy_filtering_taxonomies_filters($filter_id);


            // We need different functions for posts or for products;
            if ($filter_show_price_filter == "yes") {

                // If we have filter price we need to get the min and max price for the price selector

                $prices = $this->easy_filtering_get_prices_range($filter_id);

                $max_price = $prices["max_price"];

                $min_price = $prices["min_price"];

                $filter_price_selector = $this->easy_filtering_price_filters($max_price, $min_price);

            }

            if ($filter_post_type == "product") {

                $filter_attributes = isset($filter->easy_filtering_attrs) ? $filter->easy_filtering_attrs : array();

                $attributes_selector = $this->easy_filtering_attributes_filters($filter_id, $filter_attributes);

                $items = $this->easy_filtering_filters_apply_filter($filter_id);

            } else {

                $items = $this->easy_filtering_filters_apply_filter($filter_id);

            }


            // Check file in theme or not

            $theme_url = get_stylesheet_directory() . "/templates/views/filter-page.php";

            $plugin_url = plugin_dir_path(__FILE__) . 'views/filter-page.php';

            if (file_exists($theme_url)) {
                $include_url = $theme_url;
            } else {
                $include_url = $plugin_url;
            }


            ob_start();

            include $include_url;

            $shortcode = ob_get_contents();

            ob_end_clean();

            return $shortcode;

        }


        public function easy_filtering_taxonomies_filters($filter_id)
        {

            $data = $this->get_filter_data($filter_id);

            $filter_data = $data[0];

            $filter = json_decode($filter_data->filter_data);

            $filter_style = $filter->easy_filtering_select_type;

            $filename = $filter_style == "tabs" ? "filter_taxonomy_list.php" : "filter_taxonomy_select.php";
            // Check file in theme or not

            $theme_url = get_stylesheet_directory() . "/templates/views/$filename";

            $plugin_url = plugin_dir_path(__FILE__) . "views/$filename";

            if (file_exists($theme_url)) {
                $include_url = $theme_url;
            } else {
                $include_url = $plugin_url;
            }


            ob_start();

            include $include_url;

            $filter = ob_get_contents();

            ob_end_clean();
            return $filter;
        }

        public function easy_filtering_attributes_filters($filter_id, $filter_attributes)
        {

            $filename = "filter_attributes_list.php";
            // Check file in theme or not

            $theme_url = get_stylesheet_directory() . "/templates/views/$filename";

            $plugin_url = plugin_dir_path(__FILE__) . "views/$filename";

            if (file_exists($theme_url)) {
                $include_url = $theme_url;
            } else {
                $include_url = $plugin_url;
            }


            ob_start();

            foreach ($filter_attributes as $attribute) {

                include $include_url;

            }


            $filter = ob_get_contents();

            ob_end_clean();
            return $filter;
        }

        public function easy_filtering_price_filters($max_price, $min_price)
        {

            $filename = "filter_prices.php";
            // Check file in theme or not

            $theme_url = get_stylesheet_directory() . "/templates/views/$filename";

            $plugin_url = plugin_dir_path(__FILE__) . "views/$filename";

            if (file_exists($theme_url)) {
                $include_url = $theme_url;
            } else {
                $include_url = $plugin_url;
            }


            ob_start();

            include $include_url;

            $filter = ob_get_contents();

            ob_end_clean();

            return $filter;
        }

        public function easy_filtering_get_prices_range($filter_id)
        {

            $data = $this->get_filter_data($filter_id);

            $filter_data = $data[0];

            $filter = json_decode($filter_data->filter_data);

            $filter_taxonomy = isset($filter->easy_filtering_taxonomy) ? $filter->easy_filtering_taxonomy : "";

            $filter_search = (isset($_GET["search"]) ? $_GET["search"] : "");

            $attrs = array();


            if (!empty($_GET)) {
                $key_array = array_keys($_GET);

                for ($i = 1; $i < count($key_array); $i++) {
                    if (taxonomy_exists($key_array[$i])) {
                        $filter_taxonomy = $key_array[$i];
                        $terms_array = isset($_GET[$filter_taxonomy]) ? explode(",", $_GET[$filter_taxonomy]) : "";

                    }
                    if (taxonomy_exists("pa_" . $key_array[$i])) {

                        $attr = "pa_" . $key_array[$i];

                        $attrs[] = array($attr => $_GET[$key_array[$i]]);


                    }
                }


            } else {

                $filter_taxonomy = isset($filter->easy_filtering_taxonomy) ? $filter->easy_filtering_taxonomy : "";

                $attrs = "";
            }


            $args = array();


            $args['post_status'] = 'publish';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
            $args['post_type'] = "product";
            $args['ignore_sticky_posts'] = true;
            $args['posts_per_page'] = -1;

            $args["meta_query"] = array(
                array(
                    'key' => '_price',
                )
            );

            $args["tax_query"] = array('relation' => 'AND');


            if (!empty($terms_array) && !in_array("all", $terms_array)) {
                $args["tax_query"][] = array(
                    'taxonomy' => $filter_taxonomy,
                    'field' => 'slug',
                    "terms" => $terms_array,
                    "operator" => "IN",
                );
            }

            if (!empty($attrs)) {
                foreach ($attrs as $attr) {
                    foreach ($attr as $index => $value) {
                        //print_r($value);
                        $args["tax_query"][] = array(
                            'taxonomy' => "$index",
                            'field' => 'slug',
                            "terms" => $value,
                            "operator" => 'IN',
                            'include_children' => 1,
                        );
                    }
                }
            }


            if (isset($filter_search)) {
                $args["s"] = $filter_search;
            }


            $max_query = new WP_Query($args);

            wp_reset_postdata();

            $args["order"] = "ASC";

            $min_query = new WP_Query($args);

            wp_reset_postdata();

            $prices = array(
                "max_price" => get_post_meta($max_query->posts[0]->ID, '_price', true),
                "min_price" => get_post_meta($min_query->posts[0]->ID, '_price', true)
            );

            return $prices;

        }

        public function easy_filtering_get_prices_range_ajax()
        {

            $filter_taxonomy = (isset($_POST["filter_taxonomy"]) ? $_POST["filter_taxonomy"] : "");

            $filter_search = (isset($_POST["filter_search_string"]) ? $_POST["filter_search_string"] : "");

            $terms = (isset($_POST["filter_terms"]) ? $_POST["filter_terms"] : "");

            $attrs = (isset($_POST["filter_attrs"]) ? $_POST["filter_attrs"] : "");


            $args = array();


            $args['post_status'] = 'publish';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
            $args['post_type'] = "product";
            $args['ignore_sticky_posts'] = true;
            $args['posts_per_page'] = -1;

            $args["meta_query"] = array(
                array(
                    'key' => '_price',
                )
            );

            $args["tax_query"] = array('relation' => 'AND');


            if (!empty($terms) && !in_array("all", $terms)) {
                $args["tax_query"][] = array(
                    'taxonomy' => $filter_taxonomy,
                    'field' => 'slug',
                    "terms" => $terms,
                    "operator" => "IN",
                );
            }

            if (!empty($attrs)) {
                foreach ($attrs as $attr) {
                    foreach ($attr as $index => $value) {
                        //print_r($value);
                        $args["tax_query"][] = array(
                            'taxonomy' => "$index",
                            'field' => 'slug',
                            "terms" => $value,
                            "operator" => 'IN',
                            'include_children' => 1,
                        );
                    }
                }
            }


            if (isset($filter_search)) {
                $args["s"] = $filter_search;
            }


            $max_query = new WP_Query($args);

            wp_reset_postdata();

            $args["order"] = "ASC";

            $min_query = new WP_Query($args);

            wp_reset_postdata();

            $prices = array(
                "max_price" => get_post_meta($max_query->posts[0]->ID, '_price', true),
                "min_price" => get_post_meta($min_query->posts[0]->ID, '_price', true)
            );

            echo json_encode($prices);

            wp_die();

        }


        // CREATE AND ADD CARDS
        public function easy_filtering_filters_apply_filter($filter_id)
        {

            ob_start();

            $data = $this->get_filter_data($filter_id);

            $filter_data = $data[0];

            $filter = json_decode($filter_data->filter_data);

            $filter_post_type = isset($filter->easy_filtering_post_type) ? $filter->easy_filtering_post_type : "";

            $filter_title = isset($filter->easy_filtering_title) ? $filter->easy_filtering_title : "";

	        $filter_columns = isset($filter->easy_filtering_columns) ? $filter->easy_filtering_columns : "2";

            $filter_taxonomy = isset($filter->easy_filtering_taxonomy) ? $filter->easy_filtering_taxonomy : array();

            $filter_show_price_filter = isset($filter_data->easy_filtering_show_price_filter) ? $filter_data->easy_filtering_show_price_filter : "no";

            $filter_show_count = isset($filter->easy_filtering_show_count) ? $filter->easy_filtering_show_count : "no";

            $filter_post_number = isset($filter->easy_filtering_post_number) ? $filter->easy_filtering_post_number : 5;

            $filter_order_frontend = isset($filter->easy_filtering_order_frontend) ? $filter->easy_filtering_order_frontend : "no";

            $filter_order = isset($filter->easy_filtering_order) ? $filter->easy_filtering_order : "ASC";

            $filter_orderby = isset($filter->easy_filtering_orderby) ? $filter->easy_filtering_orderby : "default";

            $filter_pagination = isset($filter->easy_filtering_pagination) ? $filter->easy_filtering_pagination : "none";

            $filter_card = isset($filter->easy_filtering_select_card) ? $filter->easy_filtering_select_card : "default";

            $filter_search = (isset($_GET["search"]) ? $_GET["search"] : "");

            $woocommerce_shortcode = false;

            $attrs = array();


            if (!empty($_GET)) {
                $key_array = array_keys($_GET);

                $post_type = isset($key_array[0]) ? $key_array[0] : $filter->easy_filtering_post_type;

                for ($i = 1; $i < count($key_array); $i++) {
                    if (taxonomy_exists($key_array[$i])) {
                        $filter_taxonomy = $key_array[$i];
                        $terms_array[$filter_taxonomy] = isset($_GET[$filter_taxonomy]) ? explode(",", $_GET[$filter_taxonomy]) : "";

                    }
                    if (taxonomy_exists("pa_" . $key_array[$i])) {

                        $attr = "pa_" . $key_array[$i];

                        $attrs[] = array($attr => $_GET[$key_array[$i]]);


                    }
                }

                $filter_post_type = $_GET[$post_type];


            } else {
                $filter_post_type = isset($filter->easy_filtering_post_type) ? $filter->easy_filtering_post_type : "";

                $filter_taxonomy = isset($filter->easy_filtering_taxonomy) ? $filter->easy_filtering_taxonomy : "";

                $attrs = "";
            }


            $get_post_types = $filter_post_type;


            global $wpdb;

            $paged = 1;

            $per_page = $filter_post_number;

            $posts_per_page = $per_page != "" ? intval($per_page) : 16;


            $args = array();

            if ($filter_pagination == "none") {
                if($posts_per_page == -1){
                    $args['nopaging'] = true;
                }
                else{
                    $args['nopaging'] = false;
                }

                $args["posts_per_page"] = $posts_per_page;

            } else {
                $args['paged'] = $paged;
                $args["posts_per_page"] = $posts_per_page;
            }


            $args['post_status'] = 'publish';
            $args["orderby"] = $filter_orderby != "default" ? $filter_orderby : "date";
            $args["order"] = $filter_order;
            $args["fields"] = array("post_title", "post_content", "post_excerpt", "guid");
            $args['post_type'] = $get_post_types;
            $args['ignore_sticky_posts'] = true;


            $args["tax_query"] = array('relation' => 'AND');

            if (!empty($terms_array)) {
                foreach($terms_array as $taxonomy=>$terms){
                    if (!empty($terms) && !in_array("all", $terms)) {
                        $args["tax_query"][] = array(
                            'taxonomy' => $taxonomy,
                            'field' => 'slug',
                            "terms" => $terms,
                            "operator" => "IN",
                        );
                    }
                }

            }

            if (!empty($attrs)) {
                foreach ($attrs as $attr) {
                    foreach ($attr as $index => $value) {
                        //print_r($value);
                        $args["tax_query"][] = array(
                            'taxonomy' => "$index",
                            'field' => 'slug',
                            "terms" => $value,
                            "operator" => 'IN',
                            'include_children' => 1,
                        );
                    }
                }
            }


            if (isset($filter_search)) {
                $args["s"] = $filter_search;
            }



            $filter_query = new WP_Query($args);


            // Check file in theme or not

            $theme_url = get_stylesheet_directory() . "/templates/views/cards";

            $plugin_url = plugin_dir_path(__FILE__) . 'views/cards';


            $card_build_theme_url = get_stylesheet_directory() . "/templates/views/cards/card_build.php";

            $card_build_plugin_url = plugin_dir_path(__FILE__) . 'views/cards/card_build.php';

            // Default card or build cart
            if(!ctype_digit($filter_card)) {

                if (file_exists($theme_url."/".$filter_card.".php")) {
                    $include_url = $theme_url ."/".$filter_card.".php";
                } else {
                    $include_url = $plugin_url ."/".$filter_card.".php";
                }
            } else {

                $card_selected = $this->get_card_data($filter_card);

                $card_data = $card_selected[0];

                $card_blocks = json_decode($card_data->card_data);

                if (file_exists($card_build_theme_url)) {
                    $include_url = $card_build_theme_url;
                } else {
                    $include_url = $card_build_plugin_url;
                }
            }


            if ($filter_query->have_posts()) {

                while ($filter_query->have_posts()) {

                    $filter_query->the_post();

                    global $post;

                    include $include_url;

                }
            }

            $big = 999999999;
            $max_pages = ceil($filter_query->found_posts / $posts_per_page);

            $paginate = paginate_links(
                array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'type' => 'array',
                    'total' => $max_pages,
                    'format' => '?paged=%#%',
                    'current' => max(1, $paged),
                    'prev_text' => __('« Prev', EASY_FILTERING_TEXT_DOMAIN),
                    'next_text' => __('Next »', EASY_FILTERING_TEXT_DOMAIN),
                )
            );

            if ($filter_query->max_num_pages > 1) {

                if ($filter_pagination == "load_more" && $paged < $max_pages) {

                    echo "<div class='js-filter-load-more pagination-block link data-p-found' data-link-style='secondary' data-p-found='$filter_query->found_posts' data-page='" . ($paged + 1) . "'>" . __('Load More', EASY_FILTERING_TEXT_DOMAIN) . "</div>";

                } elseif ($filter_pagination == "pagination") {

                    echo "<div class='pagination-container link data-p-found' data-link-style='secondary' data-p-found='$filter_query->found_posts'>";

                    $this->easy_filtering_pagination($max_pages, $paged);

                    echo "</div>";

                } elseif ($filter_pagination == "load_infinite" && $paged < $max_pages) {

                    echo "<div class='js-filter-load-infinite pagination-block link active data-p-found' style='display: none;' data-link-style='secondary' data-p-found='$filter_query->found_posts' data-page='" . ($paged + 1) . "'>" . __('Load Infinite', EASY_FILTERING_TEXT_DOMAIN) . "</div>";

                } elseif ($filter_pagination == "none") {

                    echo "<div class='js-filter-load-more pagination-block link data-p-found' data-link-style='secondary' data-p-found='$filter_query->found_posts' data-page='" . ($paged + 1) . "' style='display: none;'></div>";

                }


            } else {

                echo "<div class='js-filter-load-more data-p-found' data-p-found='$filter_query->found_posts'></div>";

            }

            wp_reset_postdata();
            wp_reset_query();

            $items_list = ob_get_contents();

            ob_end_clean();
            return $items_list;

        }


        // CREATE AND ADD CARDS (AJAX)
        public function easy_filtering_filters_apply_filter_ajax()
        {

            $taxonomy = "";

            $term_slug = "";

            global $wpdb;

           

            $args = array();


            $paged = (isset($_POST["paged"]) ? $_POST["paged"] : 1);

            $terms = (isset($_POST["filter_terms"]) ? $_POST["filter_terms"] : "");

            $attrs = (isset($_POST["filter_attrs"]) ? $_POST["filter_attrs"] : "");

	        $filter_columns = isset($_POST["filter_columns"]) ? $_POST["filter_columns"] : "2";

            $filter_taxonomy = (isset($_POST["filter_taxonomy"]) ? $_POST["filter_taxonomy"] : array());

            $post_type = (isset($_POST["filter_post_type"]) ? $_POST["filter_post_type"] : "");

            $posts_per_page = (isset($_POST["filter_post_number"]) ? $_POST["filter_post_number"] : 10);

            $filter_pagination = (isset($_POST["filter_pagination"]) ? $_POST["filter_pagination"] : "none");

            $filter_order = (isset($_POST["filter_order"]) ? $_POST["filter_order"] : "ASC");

            $filter_orderby = (isset($_POST["filter_orderby"]) ? $_POST["filter_orderby"] : "default");

            $filter_search = (isset($_POST["filter_search_string"]) ? $_POST["filter_search_string"] : "");

            $filter_card = (isset($_POST["filter_card"]) ? $_POST["filter_card"] : "default");

            $filter_min_price = (isset($_POST["filter_min_price"]) ? $_POST["filter_min_price"] : 0);

            $filter_max_price = (isset($_POST["filter_max_price"]) ? $_POST["filter_max_price"] : 0);

            if ($filter_pagination == "none") {
                $args['nopaging'] = true;
                $args["posts_per_page"] = $posts_per_page;
            } else {
                $args['paged'] = $paged;
                $args["posts_per_page"] = $posts_per_page;
            }

            $args['post_status'] = 'publish';
            $args["cache_results"] = true;
            $args["orderby"] = $filter_orderby;
            $args["order"] = $filter_order;
            $args["fields"] = array("post_title", "post_content", "post_excerpt", "guid");
            $args['post_type'] = $post_type;
            $args['ignore_sticky_posts'] = true;

            $args["tax_query"] = array('relation' => 'AND');

            $args['post_type'] = $post_type;



            if (!empty($terms)) {
                foreach($terms as $row){
                    $taxonomy_name = $row["tax_name"];
                    $taxonomy_terms = $row["tax_values"];
                    if (!empty($taxonomy_terms) && !in_array("all", $taxonomy_terms)) {
                        $args["tax_query"][] = array(
                            'taxonomy' => $taxonomy_name,
                            'field' => 'slug',
                            "terms" => $taxonomy_terms,
                            "operator" => "IN",
                        );
                    }
                }

            }



            if (!empty($attrs)) {
                foreach ($attrs as $attr) {
                    foreach ($attr as $index => $value) {
                        $args["tax_query"][] = array(
                            'taxonomy' => "pa_$index",
                            'field' => 'slug',
                            "terms" => $value,
                            "operator" => 'IN',
                            'include_children' => 1,
                        );
                    }
                }
            }

            if ($filter_min_price != 0 || $filter_max_price != 0) {
                $args["meta_query"] = array(
                    'relation' => 'OR',
                    array(
                        array(
                            'key' => '_price',
                            'value' => $filter_min_price,
                            'compare' => '>=',
                            'type' => 'NUMERIC'
                        ),
                        array(
                            'key' => '_price',
                            'value' => $filter_max_price,
                            'compare' => '<=',
                            'type' => 'NUMERIC'
                        )
                    ),
                    array(
                        array(
                            'key' => '_sale_price',
                            'value' => $filter_min_price,
                            'compare' => '>=',
                            'type' => 'NUMERIC'
                        ),
                        array(
                            'key' => '_sale_price',
                            'value' => $filter_max_price,
                            'compare' => '<=',
                            'type' => 'NUMERIC'
                        )
                    )
                );
            }

            $args['paged'] = $paged;

            if (isset($filter_search)) {
                $args["s"] = $filter_search;
            }


            $filter_query = new WP_Query($args);

            // Check file in theme or not

            $theme_url = get_stylesheet_directory() . "/templates/views/cards";

            $plugin_url = plugin_dir_path(__FILE__) . 'views/cards';


            $card_build_theme_url = get_stylesheet_directory() . "/templates/views/cards/card_build.php";

            $card_build_plugin_url = plugin_dir_path(__FILE__) . 'views/cards/card_build.php';

            // Default card or build cart
            if(!ctype_digit($filter_card)) {

                if (file_exists($theme_url."/".$filter_card.".php")) {
                    $include_url = $theme_url ."/".$filter_card.".php";
                } else {
                    $include_url = $plugin_url ."/".$filter_card.".php";
                }
            } else {

                $card_selected = $this->get_card_data($filter_card);

                $card_data = $card_selected[0];

                $card_blocks = json_decode($card_data->card_data);

                if (file_exists($card_build_theme_url)) {
                    $include_url = $card_build_theme_url;
                } else {
                    $include_url = $card_build_plugin_url;
                }
            }

            //echo $include_url;

            if ($filter_query->have_posts()) {

                while ($filter_query->have_posts()) {

                    $filter_query->the_post();

                    include $include_url;

                }
            }


            $big = 999999999;
            $max_pages = ceil($filter_query->found_posts / $posts_per_page);

            $paginate = paginate_links(
                array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'type' => 'array',
                    'total' => $max_pages,
                    'format' => '?paged=%#%',
                    'current' => max(1, $paged),
                    'prev_text' => __('« Prev', EASY_FILTERING_TEXT_DOMAIN),
                    'next_text' => __('Next »', EASY_FILTERING_TEXT_DOMAIN),
                )
            );

            //echo $paged . " " . $max_pages;

            if ($filter_query->max_num_pages > 1) {

                if ($filter_pagination == "load_more" && $paged < $max_pages) {

                    echo "<div class='js-filter-load-more pagination-block link data-p-found' data-link-style='secondary' data-p-found='$filter_query->found_posts' data-page='" . ($paged + 1) . "'>" . __('Load More', EASY_FILTERING_TEXT_DOMAIN) . "</div>";

                }

                elseif($filter_pagination == "load_more" && $paged >= $max_pages){

	                echo "<div class='js-filter-load-more pagination-block link data-p-found' data-link-style='secondary' data-p-found='$filter_query->found_posts' data-page='" . ($paged + 1) . "'></div>";

                }
                elseif ($filter_pagination == "pagination") {

                    echo "<div class='pagination-container link data-p-found' data-link-style='secondary' data-p-found='$filter_query->found_posts'>";

                    $this->easy_filtering_pagination($max_pages, $paged);

                    echo "</div>";


                } elseif ($filter_pagination == "load_infinite" && $paged < $max_pages) {

                    echo "<div  class='js-filter-load-infinite pagination-block link data-p-found' data-link-style='secondary' data-p-found='$filter_query->found_posts' data-page='" . ($paged + 1) . "'>" . __('Load Infinite', EASY_FILTERING_TEXT_DOMAIN) . "</div>";

                } elseif ($filter_pagination == "none") {

                    echo "<div class='js-filter-load-more pagination-block link data-p-found' data-link-style='secondary' data-p-found='$filter_query->found_posts' data-page='" . ($paged + 1) . "' style='display: none;'></div>";

                }


            } else {

                echo "<div class='data-p-found' style='display: none;' data-p-found='$filter_query->found_posts'></div>";

            }

            wp_reset_postdata();
            wp_reset_query();


            die();

        }


        function easy_filtering_pagination($pages = '', $paged)
        {

            if (empty($paged)) $paged = 1;

            if (1 != $pages) {
                for ($i = 1; $i <= $pages; $i++) {
                    if (1 != $pages) {
                        echo ($paged == $i) ? "<span class='current'>" . $i . "</span>" : "<a class='js-filter-paginator' data-page='" . $i . "' href='#' class='inactive' >" . $i . "</a>";
                    }
                }
            }
        }


    }
}
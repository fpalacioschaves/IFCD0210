<?php

$data = $this->get_filter_data($filter_id);

$filter_data = $data[0];

$filter = json_decode($filter_data->filter_data);

$filter_taxonomy = $filter->easy_filtering_taxonomy;

$filter_post_type = $filter->easy_filtering_post_type;

$filter_show_count = isset($filter->easy_filtering_show_count) ? $filter->easy_filtering_show_count : "";

$filter_show_empty = isset($filter->easy_filtering_show_empty_terms) ? $filter->easy_filtering_show_empty_terms : "";;

$args = $filter_show_empty == "yes" || $filter_show_empty == "1" ? array('hide_empty' => false,) : array('hide_empty' => true,);

if (isset($filter_taxonomy)) {

    foreach ($filter_taxonomy as $taxonomy) {

        $my_taxonomy = get_taxonomy($taxonomy);

        $terms = get_terms($taxonomy, $args);

        ?>

        <h3 class="filter-header"><?php echo ucfirst(str_replace("_"," ", $taxonomy)); ?></h3>

        <select
                id="<?php echo $taxonomy;?>"
                data-taxonomy-name="<?php echo $taxonomy; ?>"
                class="js-example-basic-multiple filter-dropdown"
                name="<?php echo $taxonomy; ?>[]"
                multiple="multiple"
                style="width: 100%">

            <option
                    class="filter-dropdown-li"
                    data-taxonomy-slug='all'
                    data-taxonomy-name='<?php echo $taxonomy; ?>'
                    data-<?php echo $taxonomy; ?>-slug='all'
                    data-reset='true'
                    value="all">

                <?php _e("Clear All", EASY_FILTERING_TEXT_DOMAIN); ?>

            </option>

            <?php
            foreach ($terms as $term) {

                if ($filter_show_count == "yes" || $filter_show_count == "1") {
                    $posts_array = get_posts(
                        array(
                            'posts_per_page' => -1,
                            'post_type' => $filter_post_type,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                )
                            )
                        )

                    );

                    $count = "[" . count($posts_array) . "]";
                } else {
                    $count = "";
                }


                ?>

                <option
                        class="filter-dropdown-li"
                        data-taxonomy-name='<?php echo $taxonomy; ?>'
                        data-taxonomy-slug='<?php echo $term->slug; ?>'
                        data-<?php echo $taxonomy; ?>='<?php echo $term->term_id; ?>'
                        value="<?php echo $term->slug; ?>">
                    <?php echo $term->name; ?><?php echo $count; ?>
                </option>

            <?php } ?>

        </select>

        <?php
    }
} else {
    ?>
    <span class='error'><?php __("SELECT SOME TAXONOMIES TO FILTERING", EASY_FILTERING_TEXT_DOMAIN); ?></span>
    <?php
}
?>
<script>
    (function ($) {
        "use strict";
        $(".js-example-basic-multiple").select2({
            placeholder: "Select terms/categories",
            allowClear: false,
        });
    }(jQuery));

</script>
<?php

$data = $this->get_filter_data($filter_id);

$filter_data = $data[0];

$filter = json_decode($filter_data->filter_data);

$filter_taxonomy = $filter->easy_filtering_taxonomy;

$filter_post_type = $filter->easy_filtering_post_type;

$filter_show_count = isset($filter->easy_filtering_show_count) ? $filter->easy_filtering_show_count : "";

$filter_show_empty = isset($filter->easy_filtering_show_empty_terms) ? $filter->easy_filtering_show_empty_terms : "";

$args = $filter_show_empty == "yes" || $filter_show_empty == "1" ? array('hide_empty' => false,) : array('hide_empty' => true,);

if (!empty($filter_taxonomy)) { ?>

    <ul class="filter-list" data-filter-list="main">

        <?php

        foreach ($filter_taxonomy as $taxonomy) {


            $my_taxonomy = get_taxonomy($taxonomy);

            $terms = get_terms($taxonomy, $args);

            ?>


            <h3 class="filter-header"><?php echo ucfirst(str_replace("_"," ", $taxonomy)); ?></h3>

            <ul class="filter-dropdown" data-taxonomy-name="<?php echo $taxonomy; ?>">

                <li class="filter-dropdown-li" data-taxonomy-slug='all'
                    data-taxonomy-name='<?php echo $taxonomy; ?>'
                    data-<?php echo $taxonomy; ?>-slug='all'
                    data-reset='true'><?php _e("All", EASY_FILTERING_TEXT_DOMAIN); ?></li>
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
                    <li class="filter-dropdown-li" data-taxonomy-name='<?php echo $taxonomy; ?>'
                        data-taxonomy-slug='<?php echo $term->slug; ?>'
                        data-<?php echo $taxonomy; ?>='<?php echo $term->term_id; ?>'><?php echo $term->name; ?><?php echo $count; ?></li>
                    <?php
                }
                ?>
            </ul>
        <?php } ?>
    </ul>

    <?php

} else {
    ?>
    <span class='error'><?php __("SELECT SOME TAXONOMIES TO FILTERING", EASY_FILTERING_TEXT_DOMAIN); ?></span>
    <?php
}
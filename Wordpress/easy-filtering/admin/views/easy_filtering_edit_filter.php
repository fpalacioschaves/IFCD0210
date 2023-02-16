<?php
if (!defined('WPINC')) {
    die;
}

?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e("Easy Filtering :: Edit Filter Shortcode", EASY_FILTERING_TEXT_DOMAIN); ?></h1>
        <div class="wrap">
            <form id="easy-filtering-edition" method="post" action="options.php">

                <input type="hidden" name="easy_filtering_filter_id" id="easy_filtering_filter_id"
                       value="<?php echo $my_filter->filter_id; ?>">


                <div class="slider table_container">
                    <table class="form-table widefat">
                        <tr>
                            <th scope="row"><?php _e('Filter Title', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>

                                <input type="text" name="easy_filtering_title" id="easy_filtering_title"
                                       placeholder="Filter Title" value="<?php echo $filter_title; ?>">


                            </td>

                            <th scope="row"><?php _e('Filter Columns', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>

                                <input type="number" name="easy_filtering_columns" id="easy_filtering_columns" min="1" max="5" step="1"
                                       placeholder="Filter Title" value="<?php echo $filter_columns; ?>">


                            </td>
                        </tr>



                        <tr>
                            <th scope="row"><?php _e('Plugin Mode', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_mode" id="easy_filtering_mode">
                                    <option value="filter" <?php echo $filter_mode == "filter" ? "selected" : ""; ?>><?php _e('Filter Mode', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="list" <?php echo $filter_mode == "list" ? "selected" : ""; ?>><?php _e('List Mode', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>

               
                            </td>

                            <th scope="row"><?php _e('Select Post Type', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_post_type" id="easy_filtering_post_type">
                                    <option value="0"
                                    ><?php _e('Select a post type', EASY_FILTERING_TEXT_DOMAIN); ?></option>
			                        <?php foreach ($post_types as $post_type): ?>
				                        <?php if ($post_type->name != "attachment" && $post_type->name != "product"): ?>
                                            <option
                                                    value="<?php echo $post_type->name; ?>"
						                        <?php echo $filter_post_type == $post_type->name ? "selected" : ""; ?>><?php echo $post_type->labels->name; ?></option>
				                        <?php endif; ?>
			                        <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>


                        <tr >
                            <th scope="row"><?php _e('Select Taxonomy', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td class="select_taxonomy">

                                <?php foreach ($filter_taxonomies as $taxonomy): ?>

                                    <?php if ($taxonomy->name != "post_format"): ?>
                                        <input type="checkbox" class="easy_filtering_taxonomy"
                                               name="easy_filtering_taxonomy[]"
                                               id="<?php echo $taxonomy->name; ?>"
                                        <?php if (in_array($taxonomy->name, $filter_taxonomy)) {
                                            echo " checked ";
                                        } ?>
                                               value="<?php echo $taxonomy->name; ?>" /><label for="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->label; ?></label>


                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </td>

                            <th scope="row"><?php _e('Show empty categories/terms?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>

                                <input type="checkbox" class="easy_filtering_show_empty_terms"
                                       name="easy_filtering_show_empty_terms" id="easy_filtering_show_empty_terms"
                                       value="1" <?php echo $filter_show_empty == "1" || $filter_show_empty == "yes" ? "checked" : ""; ?>/>

                            </td>
                        </tr>



                        <tr>
                            <th scope="row"><?php _e('Show count posts in terms?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>

                                <input type="checkbox" class="easy_filtering_show_count"
                                       name="easy_filtering_show_count"
                                       id="easy_filtering_show_count"
                                       value="1" <?php echo $filter_show_count == "yes" || $filter_show_count == "1" ? "checked" : ""; ?>/>

                            </td>

                            <th scope="row"><?php _e('How many posts per page', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <input type="number" min="-1" step="1" name="easy_filtering_post_number"
                                       id="easy_filtering_post_number" value="<?php echo $filter_post_number; ?>">

                            </td>
                        </tr>



                        <tr>
                            <th scope="row"><?php _e('Show search input field?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>

                                <input type="checkbox" class="easy_filtering_show_search"
                                       name="easy_filtering_show_search"
                                       id="easy_filtering_show_search"
                                       value="1" <?php echo $filter_show_search == "yes" || $filter_show_search == "1" ? "checked" : ""; ?>/>


                            </td>

                            <th scope="row"><?php _e('Do you want reorder in frontend?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>

                                <input type="checkbox" class="easy_filtering_order_frontend"
                                       name="easy_filtering_order_frontend" id="easy_filtering_order_frontend"
                                       value="1" <?php echo $filter_order_frontend == "yes" || $filter_order_frontend == "1" ? "checked" : ""; ?>/>
                            </td>
                        </tr>



                        <tr>
                            <th scope="row"><?php _e('Order', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_order" id="easy_filtering_order">
                                    <option value="ASC" <?php echo $filter_order == "ASC" ? "selected" : ""; ?>><?php _e('Ascending', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="DESC" <?php echo $filter_order == "DESC" ? "selected" : ""; ?>><?php _e('Descending', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>

                            <th scope="row"><?php _e('Order by', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_orderby" id="easy_filtering_orderby">
                                    <option value="default" <?php echo $filter_order_orderby == "default" ? "selected" : ""; ?>><?php _e('Default', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="id" <?php echo $filter_order_orderby == "id" ? "selected" : ""; ?>><?php _e('ID', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="author" <?php echo $filter_order_orderby == "author" ? "selected" : ""; ?>><?php _e('Author', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="title" <?php echo $filter_order_orderby == "title" ? "selected" : ""; ?>><?php _e('Title', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="date" <?php echo $filter_order_orderby == "date" ? "selected" : ""; ?>><?php _e('Date', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="rand" <?php echo $filter_order_orderby == "rand" ? "selected" : ""; ?>><?php _e('Random', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>




                        <tr>
                            <th scope="row"><?php _e('Pagination', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_pagination" id="easy_filtering_pagination">
                                    <option value="none" <?php echo $filter_pagination == "none" ? "selected" : ""; ?>><?php _e('None', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="pagination" <?php echo $filter_pagination == "pagination" ? "selected" : ""; ?>><?php _e('Pagination', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="load_more" <?php echo $filter_pagination == "load_more" ? "selected" : ""; ?>><?php _e('Load more', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="load_infinite" <?php echo $filter_pagination == "load_infinite" ? "selected" : ""; ?>><?php _e('Load infinite', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>

                            <th scope="row"><?php _e('Filtering Selection Type', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_select_type" id="easy_filtering_select_type">
                                    <option value="tabs" <?php echo $filter_select_type == "tabs" ? "selected" : ""; ?>><?php _e('Tabs', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="select" <?php echo $filter_select_type == "select" ? "selected" : ""; ?>><?php _e('Select Dropdown', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>



                        <tr>
                            <th scope="row"><?php _e('Filtering Card Selection', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_select_card" id="easy_filtering_select_card">

                                    <?php

                                    foreach ($card_files as $card_file):
                                        if ($card_file != "." && $card_file != ".." && $card_file != "card_build.php"):
                                            $card_value = preg_replace('/\\.[^.\\s]{3,4}$/', '', $card_file);
                                            $card_label = ucfirst($card_value);
                                            ?>
                                            <option value="<?php echo $card_value; ?>"
                                                <?php echo $filter_select_card == $card_value ? "selected" : ""; ?>
                                            ><?php echo $card_label; ?></option>
                                        <?php
                                        endif;
                                    endforeach;
                                    ?>

                                    <?php if (!empty($cards)):
                                        foreach ($cards as $card):
                                            ?>
                                            <option
                                                    value="<?php echo $card->card_id; ?>"
                                                <?php echo $filter_select_card == $card->card_id ? "selected" : ""; ?>
                                            ><?php echo $card->card_title; ?></option>
                                        <?php endforeach;
                                    endif;
                                    ?>
                                </select>
                            </td>
                        </tr>

                    </table>
                </div>


            </form>
        </div>
        <button class="button button-primary easy-filtering-edit"><?php _e("Edit", EASY_FILTERING_TEXT_DOMAIN); ?></button>

        <a href="<?php echo admin_url('admin.php?page=easy-filtering-view-filters'); ?>"
           class="button button-primary"><?php _e("Go to filters", EASY_FILTERING_TEXT_DOMAIN); ?></a>
        <div class="result"></div>
    </div>
</div>
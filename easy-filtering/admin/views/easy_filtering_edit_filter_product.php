<?php
if (!defined('WPINC')) {
    die;
}

?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e("Easy Filtering ::  Filter Product Shortcode Edition", EASY_FILTERING_TEXT_DOMAIN); ?></h1>
        <div class="wrap">
            <form id="easy-filtering-edition" method="post" action="options.php">

                <input type="hidden" name="easy_filtering_filter_id" id="easy_filtering_filter_id" value="<?php echo $my_filter->filter_id;?>">


                <div class="slider table_container">
                    <table class="form-table widefat">
                        <tr>
                            <th scope="row"><?php _e('Filter Title', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <input type="text" name="easy_filtering_title" id="easy_filtering_title"
                                       placeholder="Filter Title" value="<?php echo $filter_title;?>">
                            </td>
                        </tr>


                        <tr>
                            <th scope="row"><?php _e('Select attributes', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <?php foreach ($attributes as $attr): ?>

                                    <input
                                    type="checkbox"
                                    class="easy_filtering_attrs"
                                    <?php if(in_array($attr->attribute_name,$filter_attributes)) { echo "checked";}?>
                                    value="<?php echo $attr->attribute_name;?>" />
                                    <?php echo $attr->attribute_label;?><br />

                                <?php endforeach;?>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Show Price Filter', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_show_price_filter" id="easy_filtering_show_price_filter">
                                    <option value="no" <?php echo $filter_show_price_filter == "no" ? "selected" : ""; ?>><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes" <?php echo $filter_show_price_filter == "yes" ? "selected" : ""; ?>><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <th scope="row"><?php _e('Show empty categories/terms?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_show_empty_terms" id="easy_filtering_show_empty_terms">
                                    <option value="no" <?php echo $filter_show_empty == "no" ? "selected" : ""; ?>><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes" <?php echo $filter_show_empty == "yes" ? "selected" : ""; ?>><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Show count posts in terms?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_show_count" id="easy_filtering_show_count">
                                    <option value="no" <?php echo $filter_show_count == "no" ? "selected" : ""; ?>><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes" <?php echo $filter_show_count == "yes" ? "selected" : ""; ?>><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('How many posts per page', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <input type="number" min="1" step="1" name="easy_filtering_post_number"
                                       id="easy_filtering_post_number" value="<?php echo $filter_post_number;?>">
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Show search input field?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_show_search" id="easy_filtering_show_search">
                                    <option value="no"  <?php echo $filter_show_search == "no" ? "selected" : ""; ?>><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes"  <?php echo $filter_show_search == "yes" ? "selected" : ""; ?>><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Do you want reorder in frontend?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_order_frontend" id="easy_filtering_order_frontend">
                                    <option value="yes" <?php echo $filter_order_frontend == "yes" ? "selected" : ""; ?>><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="no"  <?php echo $filter_order_frontend == "no" ? "selected" : ""; ?>><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <th scope="row"><?php _e('Order', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_order" id="easy_filtering_order">
                                    <option value="ASC"  <?php echo $filter_order == "ASC" ? "selected" : ""; ?>><?php _e('Ascending', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="DESC" <?php echo $filter_order == "DESC" ? "selected" : ""; ?>><?php _e('Descending', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>


                        <tr>
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
                                    <option value="none"  <?php echo $filter_pagination == "none" ? "selected" : ""; ?>><?php _e('None', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="pagination" <?php echo $filter_pagination == "pagination" ? "selected" : ""; ?>><?php _e('Pagination', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="load_more" <?php echo $filter_pagination == "load_more" ? "selected" : ""; ?>><?php _e('Load more', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="load_infinite" <?php echo $filter_pagination == "load_infinite" ? "selected" : ""; ?>><?php _e('Load infinite', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
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
                                    <option value="default"
                                        <?php echo $filter_select_card == "select" ? "selected" : ""; ?>
                                            ><?php _e('Default', EASY_FILTERING_TEXT_DOMAIN); ?></option>

                                    <?php if (!empty($cards)):
                                        foreach ($cards as $card):
                                            ?>
                                            <option
                                                    value="<?php echo $card->card_id; ?>"
                                                <?php echo $filter_select_card ==  $card->card_id ? "selected" : ""; ?>
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
        <button class="button button-primary easy-filtering-edit-product"><?php _e("Edit", EASY_FILTERING_TEXT_DOMAIN); ?></button>

        <a href="<?php echo admin_url( 'admin.php?page=easy-filtering-view-filters');?>" class="button button-primary"><?php _e("Go to filters", EASY_FILTERING_TEXT_DOMAIN); ?></a>
        <div class="result"></div>
    </div>
</div>
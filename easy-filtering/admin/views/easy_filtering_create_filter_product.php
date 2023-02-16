<?php
if (!defined('WPINC')) {
    die;
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e("Easy Filtering :: Generate Filter Product Shortcode", EASY_FILTERING_TEXT_DOMAIN); ?></h1>
        <div class="wrap">
            <form id="easy-filtering-generation" method="post" action="options.php">


                <div class="slider table_container">
                    <table class="form-table widefat">
                        <tr>
                            <th scope="row"><?php _e('Filter Title', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <input type="text" name="easy_filtering_title" id="easy_filtering_title"
                                       placeholder="Filter Title">
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Select attributes', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                    <?php foreach ($attributes as $attr): ?>

                                        <input type="checkbox" class="easy_filtering_attrs" name="easy_filtering_attrs[]" value="<?php echo $attr->attribute_name;?>" /><?php echo $attr->attribute_label;?><br />

                                    <?php endforeach;?>
                            </td>
                        </tr>


                        <tr>
                            <th scope="row"><?php _e('Show Price Filter', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_show_price_filter" id="easy_filtering_show_price_filter">
                                    <option value="no" selected><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes"><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <th scope="row"><?php _e('Show empty categories/terms?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_show_empty_terms" id="easy_filtering_show_empty_terms">
                                    <option value="no" selected><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes"><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Show count products in terms?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_show_count" id="easy_filtering_show_count">
                                    <option value="no" selected><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes"><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('How many products per page', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <input type="number" min="1" step="1" name="easy_filtering_post_number"
                                       id="easy_filtering_post_number" value="1">
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Show search input field?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_show_search" id="easy_filtering_show_search">
                                    <option value="no" selected><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes"><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Do you want reorder in frontend?', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_order_frontend" id="easy_filtering_order_frontend">
                                    <option value="yes"
                                            selected><?php _e('Yes', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="yes"><?php _e('No', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <th scope="row"><?php _e('Order', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_order" id="easy_filtering_order">
                                    <option value="ASC"
                                            selected><?php _e('Ascending', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="DESC"><?php _e('Descending', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <th scope="row"><?php _e('Order by', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_orderby" id="easy_filtering_orderby">
                                    <option value="default"
                                            selected><?php _e('Default', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="price"><?php _e('Price', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="id"><?php _e('ID', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="author"><?php _e('Author', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="title"><?php _e('Title', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="date"><?php _e('Date', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="rand"><?php _e('Random', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Pagination', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_pagination" id="easy_filtering_pagination">
                                    <option value="none"
                                            selected><?php _e('None', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="pagination"><?php _e('Pagination', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="load_more"><?php _e('Load more', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="load_infinite"><?php _e('Load infinite', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Filtering Selection Type', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_select_type" id="easy_filtering_select_type">
                                    <option value="tabs"
                                            selected><?php _e('Tabs', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                    <option value="select"><?php _e('Select Dropdown', EASY_FILTERING_TEXT_DOMAIN); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php _e('Filtering Card Selection', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                            <td>
                                <select name="easy_filtering_select_card" id="easy_filtering_select_card">
                                    <option value="default"
                                            selected><?php _e('Default', EASY_FILTERING_TEXT_DOMAIN); ?></option>

                                    <?php if (!empty($cards)):
                                        foreach ($cards as $card):
                                            ?>
                                            <option value="<?php echo $card->card_id; ?>"><?php echo $card->card_title; ?></option>
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
        <button class="button button-primary easy-filtering-generate-product"><?php _e("Generate", EASY_FILTERING_TEXT_DOMAIN); ?></button>
        <div class="result"></div>
    </div>
</div>
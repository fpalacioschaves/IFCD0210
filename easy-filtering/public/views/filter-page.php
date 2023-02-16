<?php
$search = isset($_GET['search']) ? $_GET['search'] : "";

$search = str_replace(" ", "+", $search);

?>

<div class="easy-filtering-container">

    <input type="hidden" name="filter_post_type" id="filter_post_type" value="<?php echo $filter_post_type; ?>">
    <input type="hidden" name="filter_post_number" id="filter_post_number" value="<?php echo $filter_post_number; ?>">
    <input type="hidden" name="filter_columns" id="filter_columns" value="<?php echo $filter_columns; ?>">
    <input type="hidden" name="filter_taxonomy" id="filter_taxonomy" value="<?php echo implode(",",$filter_taxonomy); ?>">
    <input type="hidden" name="filter_pagination" id="filter_pagination" value="<?php echo $filter_pagination; ?>">
    <input type="hidden" name="filter_order_frontend" id="filter_order_frontend" value="<?php echo $filter_order_frontend; ?>">
    <input type="hidden" name="filter_order" id="filter_order" value="<?php echo $filter_order; ?>">
    <input type="hidden" name="filter_orderby" id="filter_orderby" value="<?php echo $filter_orderby; ?>">
    <input type="hidden" name="filter_card" id="filter_card" value="<?php echo $filter_card; ?>">
    <input type="hidden" name="filter_total_posts" id="filter_total_posts" value="">
    <input type="hidden" name="filter_search_string" id="filter_search_string" value="<?php echo $search; ?>">

    <div class="filter-list-wrap">

        <?php
        if ($filter_mode == "filter") {
            echo $taxonomy_selection;
        }
        ?>

        <?php if (!empty($filter_attributes)): ?>

            <?php echo $attributes_selector; ?>

        <?php endif; ?>

        <?php if ($filter_show_price_filter == "yes"): ?>

            <?php echo $filter_price_selector; ?>

        <?php endif; ?>

        <?php if ($filter_show_search == "yes" || $filter_show_search == "1"): ?>

            <div class="filtering-search-block">

                <input id="filtering_search" class="filtering_search" placeholder="Search …"
                       value="<?php echo $search; ?>" name="filtering_search" type="text">
                <button id="filtering_search_submit" type="submit" class="button alt" value="Search">Search</button>

            </div>

        <?php endif; ?>

        <?php  if ($filter_mode == "filter") : ?>

        <div class="js-amount-results amount-results"></div>

        <?php endif;?>

        <?php if ($filter_order_frontend == "yes" || $filter_order_frontend == "1") { ?>

            <div class="js-order-selector">

                <select name="filter_orderby_selector" id="filter_orderby_selector">

                    <option value="default" <?php echo $filter_orderby == "default" ? "selected" : ""; ?>>Default
                    </option>
                    <option value="title" <?php echo $filter_orderby == "title" ? "selected" : ""; ?>>Title</option>
                    <option value="date" <?php echo $filter_orderby == "date" ? "selected" : ""; ?>>Date</option>
                    <option value="id" <?php echo $filter_orderby == "id" ? "selected" : ""; ?>>ID</option>
                    <option value="random" <?php echo $filter_orderby == "random" ? "selected" : ""; ?>>Random</option>

                </select>

                <select name="filter_order_selector" id="filter_order_selector">

                    <option value="ASC" <?php echo $filter_order == "ASC" ? "selected" : ""; ?>>ASC</option>
                    <option value="DESC" <?php echo $filter_order == "DESC" ? "selected" : ""; ?>>DESC</option>

                </select>

            </div>


        <?php } ?>


        <div class="filters-actives-container">

            <?php  if ($filter_mode == "filter") : ?>

            <span class="active-filters">Active filters: </span>

            <?php endif;?>

            <ul class="js-filter-tag-list labels-block">

            </ul>

        </div>

    </div>


    <div data-grid-type="grid" class="grid filter-grid-container card-group" data-columns="4">

        <?php echo $items; ?>

    </div>

</div>

<div class="easy-filtering-running-layer">

</div>


        










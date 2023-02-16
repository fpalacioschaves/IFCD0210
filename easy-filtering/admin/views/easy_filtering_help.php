<?php
if (!defined('WPINC')) {
    die;
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e("Easy Filtering :: Help", EASY_FILTERING_TEXT_DOMAIN); ?></h1>
        <div class="wrap">

                <h1 class="table_header">
                    <?php _e("How works Easy Filtering", EASY_FILTERING_TEXT_DOMAIN); ?>
                </h1>

                <div class="slider table_container">
                   <p>We need to give a name to the filter, to choose after in the post or page content editor. We have two ways to show the plugin in the public view:</p>
                    <p
                    <ul>
                        <li>
                            <strong>Filter Mode</strong>: we show filter tabs or selects to filter the element to show in the post list
                        </li>

                        <li>
                            <strong>List Mode</strong>: We show the posts without filtering tabs or selects
                        </li>
                    </ul>
                    </p>

                    <p>
                        We select the <strong>post type</strong> to show in our page, and then we can choose the <strong>taxonomies</strong> we want to use as filter. We can select one or more than one, if we want.
                    </p>

                    <p>
                        There are other parameters that we can include in our filter or post list: if we want to add a <strong>Search</strong>, if we want to add <strong>Order selection</strong>, the default order we want in the filter, and so on.
                    </p>
                </div>

            <h1 class="table_header">
                <?php _e("Different filters/lists", EASY_FILTERING_TEXT_DOMAIN); ?>
            </h1>

            <div class="slider table_container closed">
                <p>
                    <ul>
                    <li>
                        In both modes, if you select No pagination, the system only shows  as many posts as those selected in Posts per page
                    </li>
                    <li>To show all posts in only one page, you can select -1 as Posts per page and No pagination</li>
                </ul>
                </p>
            </div>

            <h1 class="table_header">
                <?php _e("How can i change the filter aspect?", EASY_FILTERING_TEXT_DOMAIN); ?>
            </h1>

            <div class="slider table_container closed">
                <p>
                    The plugin has the default files in public/views folder:
                    <ul>
                    <li>
                        <strong>filter-page</strong>: the complete page filter used. Its the container for all the filter elements (filter tabs or selects, items, pagination, load more...)
                    </li>
                    <li>
                        <strong>filter_taxonomy_list</strong>: the view if you select tabs as filtering
                    </li>
                    <li>
                        <strong>filter_taxonomy_select</strong>: the view if you choose selects as filtering
                    </li>
                </ul>
                </p>
                <p>
                    If you want to change some styles for these files, you need to create, in the <strong>templates</strong> folder of your theme, a new folder <strong>views</strong>, and move these files to this folder
                </p>
                <p>You can change styles in the file <strong>filter.css</strong> in <strong>public/assets/css folder</strong></p>
            </div>

            <h1 class="table_header">
                <?php _e("What are cards?", EASY_FILTERING_TEXT_DOMAIN); ?>
            </h1>

            <div class="slider table_container closed">
                <p>
                    Cards is the way we use to show each element in the post list. We have a <strong>default.php</strong> card design. To add more designs, create a folder <strong>cards</strong> in the <strong>templates/views</strong> folder inside your <strong>templates</strong> folder theme.
                    Then in this folder, move the <strong>default.php file</strong>, copy the file and rename as you like it. The system detects how many cards have you created to be choosen in the filter create or
                    edit option.
                </p>
            </div>

            <h1 class="table_header">
                <?php _e("What is the Card Creator?", EASY_FILTERING_TEXT_DOMAIN); ?>
            </h1>

            <div class="slider table_container closed">
                <p>
                    I added a card creator. In it you can see some blocks <strong>(title. featured image, excerpt, read more, terms)</strong>. You can drag and drop these blocks and reorder
                    to create an ad-hoc card
                </p>
                <p>These cards created with these method can be choosen in the <strong>Filter Card Selection</strong> select. These cards uses the <strong>card_build.php</strong> file, so if you want to change
                some style in it, or add some elements, you can move the file into the folder <strong>views/cards</strong> in the <strong>templates</strong> folder of your theme.</p>
            </div>

        </div>
        <button class="button button-primary easy-filtering-generate"><?php _e("Generate", EASY_FILTERING_TEXT_DOMAIN); ?></button>
        <div class="result"></div>
    </div>
</div>
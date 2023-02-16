<?php
if (!defined('WPINC')) {
    die;
}
?>
<div id="wpbody" role="main">
    <div class="wrap">
        <h2><?php _e('Easy Filtering :: Filters', EASY_FILTERING_TEXT_DOMAIN); ?> <a
                    href="<?php echo admin_url('admin.php?page=easy-filtering-create-filter'); ?>"
                    class="add-new-h2"><?php _e('Add New', EASY_FILTERING_TEXT_DOMAIN); ?></a></h2>

        <form method="post">
            <input type="hidden" name="page" value="ttest_list_table">

            <?php

            $list_table->search_box('search', 'search_id');
            $list_table->display();
            ?>
        </form>
    </div>


</div>
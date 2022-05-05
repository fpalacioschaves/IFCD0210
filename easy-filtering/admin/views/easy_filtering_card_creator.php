<?php
if (!defined('WPINC')) {
    die;
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e("Easy Filtering :: Card Creator", EASY_FILTERING_TEXT_DOMAIN); ?></h1>
        <div class="wrap">
            <form id="easy-filtering-card-generation" method="post" action="options.php">

                <table class="form-table widefat">
                    <tr>
                        <th scope="row"><?php _e('Card Title', EASY_FILTERING_TEXT_DOMAIN); ?></th>
                        <td>
                            <input type="text" name="easy_filtering_card_title" id="easy_filtering_card_title"
                                   placeholder="Card Title">
                        </td>
                    </tr>
                </table>


                <div class="slider table_container">

                    <div class="pieces_container">

                        <h3 class="unsortable">
                            <?php _e("Select the card pieces and move to card generator", EASY_FILTERING_TEXT_DOMAIN); ?>
                        </h3>

                        <p class="unsortable">Drag and drop the pieces you want in your card. drop in the card generator zone. If you want, you can reorder it.</p>

                        <div class="piece" data-type="title">The title</div>

                        <div class="piece" data-type="image">The featured image</div>

                        <div class="piece" data-type="excerpt">The excerpt</div>

                        <div class="piece" data-type="read-more">The read more</div>

                        <div class="piece" data-type="terms">The terms</div>

                    </div>



                    <div id="card-generate">

                        <h3 class="unsortable"><?php _e("Card generated", EASY_FILTERING_TEXT_DOMAIN); ?></h3>

                    </div>

                    <div id="card-preview">

                       <!-- <h3 class="unsortable"><?php //_e("Card generated", EASY_FILTERING_TEXT_DOMAIN); ?></h3> -->

                    </div>

                </div>


            </form>
        </div>
        <button class="button button-primary easy-filtering-card-generate"><?php _e("Generate card", EASY_FILTERING_TEXT_DOMAIN); ?></button>
        <div class="result"></div>
    </div>
</div>
<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e( "Postem Ipsum :: Woocommerce Orders", POSTEM_IPSUM_TEXT_DOMAIN ); ?></h1>
        <div class="wrap">
            <form id="postem-ipsum-woo-orders-generation" method="post" action="options.php">
				<?php settings_fields( 'postem-ipsum-woo-orders-settings' ); ?>
				<?php do_settings_sections( 'postem-ipsum-woo-orders-settings' ); ?>

                <div class="table_container order-settings-table">
                    <table class="form-table widefat">
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'How many orders', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" min="1" step="1" name="postem_ipsum_woo_orders_number"
                                       id="postem_ipsum_woo_orders_number" value="1">
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>
        <button class="button button-primary postem-ipsum-generate-orders"><?php _e( "Generate", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <button class="button button-primary postem-ipsum-delete-orders"><?php _e( "Delete all orders generated with Postem Ipsum", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <div class="result"></div>

    </div>
</div>
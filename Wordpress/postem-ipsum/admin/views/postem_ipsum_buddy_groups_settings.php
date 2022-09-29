<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e( "Postem Ipsum :: BuddyPress Groups", POSTEM_IPSUM_TEXT_DOMAIN ); ?></h1>
        <div class="wrap">
            <form id="postem-ipsum-buddy-groups-generation" method="post" action="options.php">
				<?php settings_fields( 'postem-ipsum-buddy-groups-settings' ); ?>
				<?php do_settings_sections( 'postem-ipsum-buddy-groups-settings' ); ?>

                <div class="table_container buddy-groups-settings-table">
                    <table class="form-table widefat">
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'How many groups', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" min="1" step="1" name="postem_ipsum_buddy_groups_number"
                                       id="postem_ipsum_buddy_groups_number" value="1">
                            </td>
                        </tr>
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Group status', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <label><?php _e( "Random", POSTEM_IPSUM_TEXT_DOMAIN ); ?>: </label>
                                <input type="checkbox" name="group_status_random" id="group_status_random">
                                <select  name="postem_ipsum_buddy_groups_status" id="postem_ipsum_buddy_groups_status">
                                    <option value = "public">Public</option>
                                    <option value = "private">Private</option>
                                    <option value = "hidden">Hidden</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>
        <button class="button button-primary postem-ipsum-buddy-generate-groups"><?php _e( "Generate", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <button class="button button-primary postem-ipsum-buddy-delete-groups"><?php _e( "Delete all groups generated with Postem Ipsum", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <div class="result"></div>


    </div>
</div>
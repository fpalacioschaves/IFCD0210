<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e( "Postem Ipsum :: Users", POSTEM_IPSUM_TEXT_DOMAIN ); ?></h1>
        <div class="wrap">
            <form id="postem-ipsum-user-generation" method="post" action="options.php">
				<?php settings_fields( 'postem-ipsum-users-settings' ); ?>
				<?php do_settings_sections( 'postem-ipsum-users-settings' ); ?>

                <div class="table_container user-settings-table">
                    <table class="form-table widefat">

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Select users role', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_users_role" id="postem_ipsum_users_role">
                                    <option value="0"
                                            selected><?php _e( 'Select a role', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <?php foreach ( $roles as $key => $value ): ?>

                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'How many users', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" min="1" step="1" name="postem_ipsum_users_number"
                                       id="postem_ipsum_users_number" value="1">
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>
        <button class="button button-primary postem-ipsum-generate-users"><?php _e( "Generate", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <button class="button button-primary postem-ipsum-delete-users"><?php _e( "Delete all users generated with Postem Ipsum", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <div class="result"></div>


    </div>
</div>
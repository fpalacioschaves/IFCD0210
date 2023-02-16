<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e( "Postem Ipsum :: Terms and Categories", POSTEM_IPSUM_TEXT_DOMAIN ); ?></h1>
        <div class="wrap">
            <form id="postem-ipsum-terms-generation" method="post" action="options.php">
				<?php settings_fields( 'postem-ipsum-terms-settings' ); ?>
				<?php do_settings_sections( 'postem-ipsum-terms-settings' ); ?>

                <div class="table_container taxonomy-settings-table">
                    <table class="form-table widefat">

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Select Post Type', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_post_type" id="postem_ipsum_post_type">
                                    <option value="0"
                                            selected><?php _e( 'Select a post type', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <?php foreach ( $post_types as $post_type ): ?>
                                        <?php if ( $post_type->name != "attachment" && $post_type->name != "page" ): ?>
                                            <option value="<?php echo $post_type->name; ?>"><?php echo $post_type->labels->name; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>

                        <tr class="select_taxonomy">
                            <th class="table-header" scope="row"><?php _e( 'Select Taxonomy', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_taxonomy" id="postem_ipsum_taxonomy">
                                    <option value="0"
                                            selected><?php _e( 'Select a taxonomy', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'How many terms/categories', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" min="1" step="1" name="postem_ipsum_terms_number"
                                       id="postem_ipsum_terms_number" value="1">
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>
        <button class="button button-primary postem-ipsum-generate-terms"><?php _e( "Generate", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <button class="button button-primary postem-ipsum-delete-terms"><?php _e( "Delete all terms generated with Postem Ipsum", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <div class="result"></div>


    </div>
</div>
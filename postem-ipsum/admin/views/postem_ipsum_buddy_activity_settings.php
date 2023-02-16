<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e( "Postem Ipsum :: BuddyPress Activity", POSTEM_IPSUM_TEXT_DOMAIN ); ?></h1>
        <div class="wrap">
            <form id="postem-ipsum-buddy-activity-generation" method="post" action="options.php">
				<?php settings_fields( 'postem-ipsum-buddy-activity-settings' ); ?>
				<?php do_settings_sections( 'postem-ipsum-buddy-activity-settings' ); ?>

                <div class="table_container buddy-activity-settings-table">
                    <table class="form-table widefat">
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'How many activities', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" min="1" step="1" name="postem_ipsum_buddy_activities_number"
                                       id="postem_ipsum_buddy_activities_number" value="1">
                            </td>
                        </tr>
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Activity type', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <label><?php _e( "Random", POSTEM_IPSUM_TEXT_DOMAIN ); ?>: </label>
                                <input type="checkbox" name="activity_type_random" id="activity_type_random">
                                <select id="postem_ipsum_buddy_activity_type" name="postem_ipsum_buddy_activity_type">
                                    <option value="new_member">New Members</option>
                                    <option value="updated_profile">Profile Updates</option>
                                    <option value="activity_update">Updates</option>
                                    <option value="friendship_accepted,friendship_created">Friendships</option>
                                    <option value="created_group">New Groups</option>
                                    <option value="joined_group">Group Memberships</option>
                                    <option value="group_details_updated">Group Updates</option>
                                    <option value="new_blog_post">Posts</option>
                                    <option value="new_blog_comment">Comments</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Select User', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <label><?php _e( "Random", POSTEM_IPSUM_TEXT_DOMAIN ); ?>: </label>
                                <input type="checkbox" name="user_random" id="user_random">
                                <select name="postem_ipsum_buddy_activity_user" id="postem_ipsum_buddy_activity_user">
				                    <?php foreach($authors as $author):?>
                                        <option value="<?php echo $author->ID;?>"
                                        ><?php echo $author->display_name; ?></option>
				                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>
        <button class="button button-primary postem-ipsum-buddy-generate-activities"><?php _e( "Generate", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <button class="button button-primary postem-ipsum-buddy-delete-activities"><?php _e( "Delete all activities generated with Postem Ipsum", POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <div class="result"></div>


    </div>


</div>
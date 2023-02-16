<?php
/**
 * Plugin Name:       Postem Ipsum
 * Plugin URI:
 * Description:       Plugin to create some random posts from scratch
 * Version:           3.0.1
 * Author:            <a href="https://profiles.wordpress.org/franciscopalacios/#content-plugins">Fco Palacios</a> | <a href="https://wordpress.org/plugins/postem-ipsum/" target="_blank">Rate it or make a suggestion</a>
 * Author URI:
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       postem-ipsum
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'POSTEM_IPSUM_TEXT_DOMAIN', 'postem-ipsum' );

/* Register activation hook. */
register_activation_hook(
	__FILE__,
	'fx_admin_notice_example_activation_hook'
);

/* Add admin notice */
add_action(
	'admin_notices',
	'fx_admin_notice_example_notice'
);

/**
 * Runs only when the plugin is activated.
 * @since 0.1.0
 */
function fx_admin_notice_example_activation_hook() {

	/* Create transient data */
	set_transient( 'fx-admin-notice-example', true, 5 );
}





/**
 * Admin Notice on Activation.
 * @since 0.1.0
 */
function fx_admin_notice_example_notice(){

	/* Check transient, if available display notice */
	if( get_transient( 'fx-admin-notice-example' ) ){

		?>
		<div class="updated notice is-dismissible">
			<p>Thank you for using Postem Ipsum! <strong>You are awesome</strong>.</p>
            <p>Do you like it? Have you any suggestion to improve it? We are waiting your collaboration. Thanks you.</p>
            <p><a class="button button-primary" href="https://wordpress.org/plugins/postem-ipsum/" target="_blank">Please, rate us or review</a> </p>
		</div>
		<?php
		/* Delete transient, only display this notice once. */
		delete_transient( 'fx-admin-notice-example' );
	}
}

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'core/postem-ipsum-core.php';
$PluginName = new PostemIpsum_Core ();

/**
 * Begins execution of the plugin.
 *
 */
$PluginName->run();

<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class PluginName_Plugin_Core
 */
class PostemIpsum_Core {

	public function __construct() {

		/**
		 * Define the locale for this plugin for internationalization.
		 *
		 * set the domain and to register the hook
		 * with WordPress.
		 */
		add_action( 'plugins_loaded', array(
			$this,
			'load_plugin_textdomain'
		) );



	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run() {

		// Register Admin and public classes  ...
		$this->define_admin_hooks();
	}

	/**
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 */
	private function define_admin_hooks() {

		// The class responsible for defining all actions that occur in the Dashboard.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/postem-ipsum-admin.php';

		return new  PostemIpsum_Admin();
	}

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			POSTEM_IPSUM_TEXT_DOMAIN,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}







}

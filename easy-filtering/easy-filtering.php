<?php
/**
 * Plugin Name:       Easy Filtering
 * Plugin URI:
 * Description:       Filter contents via ajax
 * Version:           2.5.0
 * Author:            Fco Palacios Chaves
 * Author URI:
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-filtering
 * Domain Path:       /languages
 *
 * @package         : Easy Filtering
 * @package_version : 1.0.0
 * @package_author  : Fco Palacios Chaves
 */
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}

$__ROOT_FILE__ = __FILE__;

require_once ( dirname ( __FILE__ ) . '/config.php' );

require_once ( dirname ( __FILE__ ) . '/includes/functions.php' );

require_once ( dirname ( __FILE__ ) . '/includes/activator.php' );

if ( is_admin () )
{
	// Admin hooks / functions
	require_once ( dirname ( __FILE__ ) . '/admin/admin.php' );
}



// Public hooks / functions
require_once ( dirname ( __FILE__ ) . '/public/public.php' );

add_action (
	'plugins_loaded' ,
	function ()
	{

		load_plugin_textdomain ( get_file_data ( __FILE__ , array ( 'text_domain' => 'Text Domain' ) )[ 'text_domain' ] , FALSE , dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );

		// Is Admin ...
		if ( is_admin () )
		{
			// Initialize Admin hooks
			new EasyFiltering_Admin();
		}

		// Initialize Public hooks
		new EasyFiltering_Public();
	}
);

// HAPPY CODDING !!

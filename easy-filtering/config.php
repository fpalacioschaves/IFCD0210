<?php
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}


// Store your plugin header details.
global $plugin_name_settings;

define( 'EASY_FILTERING_TEXT_DOMAIN', 'easy-filtering' );

define( 'EASY_FILTERING_PATH', plugin_dir_path(__FILE__) );

$plugin_name_settings = get_file_data (
	$__ROOT_FILE__ , array (
		               'name'        => 'Easy Filter' ,
		               'version'     => '1.0' ,
		               'description' => 'Filter contents by taxonomy' ,
		               'author'      => 'Fco Palacios' ,
		               'author_uri'  => '' ,
		               'license'     => '' ,
		               'license_uri' => '' ,
		               'text_domain' => 'easy-filtering' ,
		               'domain_path' => '' ,
	               )
);

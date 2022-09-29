<?php
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}

register_activation_hook (
	$__ROOT_FILE__ ,
	function ()
	{

		if ( check_permissions () )
		{

            global $wpdb;

            $wp_track_table = $wpdb->prefix . "easy_filtering_filters";
            $wp_cards_table = $wpdb->prefix . "easy_filtering_card";

            if($wpdb->get_var( "show tables like '$wp_track_table'" ) != $wp_track_table)
            {

                $sql = "CREATE TABLE ". $wp_track_table . " ( ";
                $sql .= "  filter_id  int(11)   NOT NULL auto_increment, ";
                $sql .= "  filter_title  varchar(128)   NOT NULL, ";
                $sql .= "  filter_data  text   NOT NULL,  ";
                $sql .= "  primary key (filter_id) ";
                $sql .= ") ;";

                //echo $sql;
                require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
                dbDelta($sql);

                $sql2 = "CREATE TABLE ". $wp_cards_table . " ( ";
                $sql2 .= "  card_id  int(11)   NOT NULL auto_increment, ";
                $sql2 .= "  card_title  varchar(128)   NOT NULL, ";
                $sql2 .= "  card_data  text   NOT NULL, ";
                $sql2 .= "  primary key (card_id) ";
                $sql2 .= ") ; ";

                dbDelta($sql2);

            }
            else{
                $sql = "ALTER TABLE " . $wp_track_table . " ADD COLUMN filter_data text NOT NULL AFTER filter_title;";
            }

		}

		flush_rewrite_rules ();
	}
);







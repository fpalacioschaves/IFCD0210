<?php
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}


if ( ! function_exists ( 'check_permissions' ) )
{


	function check_permissions ()
	{
		return current_user_can ( 'activate_plugins' );
	}


}

/**
 * Get all filter
 *
 * @param $args array
 *
 * @return array
 */
function easy_filtering_get_all_filter( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'filter_id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'filter-all';
    $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'easy_filtering_filters ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

    return $items;
}

/**
 * Fetch all filter from database
 *
 * @return array
 */
function easy_filtering_get_filter_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'easy_filtering_filters' );
}


/**
 * Get all filter
 *
 * @param $args array
 *
 * @return array
 */
function easy_filtering_get_all_cards( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'card_id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'card-all';
    $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'easy_filtering_card ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

    return $items;
}

/**
 * Fetch all filter from database
 *
 * @return array
 */
function easy_filtering_get_card_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'easy_filtering_card' );
}

function easy_filtering_get_attrs(){
    global $wpdb;

    $attrs = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'woocommerce_attribute_taxonomies' );

    return $attrs;

}

function isMobile() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}


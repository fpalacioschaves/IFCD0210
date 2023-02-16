<?php

if ( ! class_exists ( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List table class
 */
class Filter_List_Table extends \WP_List_Table {

    function __construct() {
        parent::__construct( array(
            'singular' => 'filter',
            'plural'   => 'filters',
            'ajax'     => false
        ) );
    }

    function get_table_classes() {
        return array( 'widefat', 'fixed', 'striped', $this->_args['plural'] );
    }

    /**
     * Message to show if no designation found
     *
     * @return void
     */
    function no_items() {
        _e( 'No filters found', 'easy-filtering' );
    }

    /**
     * Default column values if no callback found
     *
     * @param  object  $item
     * @param  string  $column_name
     *
     * @return string
     */
    function column_default( $item, $column_name ) {

        $filter_data = json_decode($item->filter_data);

        $filter_taxonomny = isset($filter_data->easy_filtering_taxonomy) ? $filter_data->easy_filtering_taxonomy : array();

        switch ( $column_name ) {
            case 'filter_id':
                return $item->filter_id;

            case 'filter_title':
                return $filter_data->easy_filtering_title;

            case 'filter_shortcode':
                return "[easy-filtering filter_id='".$item->filter_id."']";

            case 'filter_mode':
                return ucfirst($filter_data->easy_filtering_mode);

            case 'filter_post_type':
                return ucfirst($filter_data->easy_filtering_post_type);

            case 'filter_taxonomy':
                return implode(",",$filter_taxonomny);

            case 'filter_pagination':
                return ucfirst(str_replace("_"," ",$filter_data->easy_filtering_pagination));

            case 'filter_posts_number':
                return $filter_data->easy_filtering_post_number;

            default:
                return isset( $filter_data->$column_name ) ? $filter_data->$column_name : '';
        }
    }

    /**
     * Get the column names
     *
     * @return array
     */
    function get_columns() {
        $columns = array(
            'filter_title'      => __( 'Title', EASY_FILTERING_TEXT_DOMAIN ),
            'filter_shortcode'      => __( 'Shortcode', EASY_FILTERING_TEXT_DOMAIN ),
            'filter_mode'      => __( 'Mode', EASY_FILTERING_TEXT_DOMAIN ),
            'filter_post_type'      => __( 'Post Type', EASY_FILTERING_TEXT_DOMAIN ),
            'filter_taxonomy'      => __( 'Taxonomy', EASY_FILTERING_TEXT_DOMAIN ),
            'filter_pagination'      => __( 'Pagination', EASY_FILTERING_TEXT_DOMAIN ),
            'filter_posts_number'      => __( 'Post per page', EASY_FILTERING_TEXT_DOMAIN ),
        );

        return $columns;
    }

    /**
     * Render the designation name column
     *
     * @param  object  $item
     *
     * @return string
     */
    function column_filter_title( $item ) {

        $item_data = $item->filter_data;

        $item_data_decoded = json_decode($item_data);

        $post_type = $item_data_decoded->easy_filtering_post_type;

        $actions           = array();

        if($post_type == "product"){

            $actions['edit']   = sprintf( '<a href="%s" data-id="%d" title="%s">%s</a>', admin_url( 'admin.php?page=easy-filtering-edit-filter-product&filter_id=' . $item->filter_id ), $item->filter_id, __( 'Edit this item', EASY_FILTERING_TEXT_DOMAIN ), __( 'Edit', EASY_FILTERING_TEXT_DOMAIN ) );
            $actions['delete'] = sprintf( '<a href="#" class="easy-filtering-delete" data-filter-id="'.$item->filter_id.'" title="'. __( "Delete this item", EASY_FILTERING_TEXT_DOMAIN ).'">'. __( "Delete this item", EASY_FILTERING_TEXT_DOMAIN ).'</a>', admin_url( 'admin.php?page=filterr&action=delete&id=' . $item->filter_id ), $item->filter_id, __( 'Delete this item', EASY_FILTERING_TEXT_DOMAIN ), __( 'Delete', EASY_FILTERING_TEXT_DOMAIN ) );

        }
        else{

            $actions['edit']   = sprintf( '<a href="%s" data-id="%d" title="%s">%s</a>', admin_url( 'admin.php?page=easy-filtering-edit-filter&filter_id=' . $item->filter_id ), $item->filter_id, __( 'Edit this item', EASY_FILTERING_TEXT_DOMAIN ), __( 'Edit', EASY_FILTERING_TEXT_DOMAIN ) );
            $actions['delete'] = sprintf( '<a href="#" class="easy-filtering-delete" data-filter-id="'.$item->filter_id.'" title="'. __( "Delete this item", EASY_FILTERING_TEXT_DOMAIN ).'">'. __( "Delete this item", EASY_FILTERING_TEXT_DOMAIN ).'</a>', admin_url( 'admin.php?page=filterr&action=delete&id=' . $item->filter_id ), $item->filter_id, __( 'Delete this item', EASY_FILTERING_TEXT_DOMAIN ), __( 'Delete', EASY_FILTERING_TEXT_DOMAIN ) );

        }

        if($post_type == "product"){

            return sprintf( '<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url( 'admin.php?page=easy-filtering-edit-filter-product&filter_id=' . $item->filter_id ), $item->filter_title, $this->row_actions( $actions ) );

        }
        else{

            return sprintf( '<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url( 'admin.php?page=easy-filtering-edit-filter&filter_id=' . $item->filter_id ), $item->filter_title, $this->row_actions( $actions ) );

        }




    }

    /**
     * Get sortable columns
     *
     * @return array
     */
    function get_sortable_columns() {
        $sortable_columns = array(
            'filter_title' => array( 'filter_title', true ),
        );

        return $sortable_columns;
    }

    /**
     * Set the bulk actions
     *
     * @return array
     */
    function get_bulk_actions() {
        $actions = array(
            //'trash'  => __( 'Move to Trash', 'easy-filtering' ),
        );
        return $actions;
    }

    /**
     * Render the checkbox column
     *
     * @param  object  $item
     *
     * @return string
     */
    function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="filter_id[]" value="%d" />', $item->filter_id
        );
    }

    /**
     * Set the views
     *
     * @return array
     */
    public function get_views_() {
        $status_links   = array();
        $base_link      = admin_url( 'admin.php?page=sample-page' );

        foreach ($this->counts as $key => $value) {
            $class = ( $key == $this->page_status ) ? 'current' : 'status-' . $key;
            $status_links[ $key ] = sprintf( '<a href="%s" class="%s">%s <span class="count">(%s)</span></a>', add_query_arg( array( 'status' => $key ), $base_link ), $class, $value['label'], $value['count'] );
        }

        return $status_links;
    }

    /**
     * Prepare the class items
     *
     * @return void
     */
    function prepare_items() {

        $columns               = $this->get_columns();
        $hidden                = array( );
        $sortable              = $this->get_sortable_columns();
        $this->_column_headers = array( $columns, $hidden, $sortable );

        $per_page              = 20;
        $current_page          = $this->get_pagenum();
        $offset                = ( $current_page -1 ) * $per_page;
        $this->page_status     = isset( $_GET['status'] ) ? sanitize_text_field( $_GET['status'] ) : '2';

        // only ncessary because we have sample data
        $args = array(
            'offset' => $offset,
            'number' => $per_page,
        );

        if ( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order']   = $_REQUEST['order'] ;
        }

        $this->items  = easy_filtering_get_all_filter( $args );

        $this->set_pagination_args( array(
            'total_items' => easy_filtering_get_filter_count(),
            'per_page'    => $per_page
        ) );
    }
}
<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'EasyFiltering_Admin' ) ) {
	class EasyFiltering_Admin {

		public function __construct() {

			/**
			 * Register tinymce button
			 */
			add_action( 'admin_init', array(
					$this,
					'easy_filtering_tinyMCE_setting'
				)
			);

			add_action( 'wp_ajax_easy_filtering_list_ajax', array(
					$this,
					'easy_filtering_list_ajax'
				)
			);

			add_action( 'admin_footer', array(
					$this,
					'easy_filtering_list'
				)
			);

			if ( ! class_exists( 'WP_List_Table' ) ) {
				require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
			}

			require_once( dirname( __FILE__ ) . '/class-filter-list-table.php' );
			require_once( dirname( __FILE__ ) . '/class-card-list-table.php' );


			// Add Admin scripts ...
			add_action(
				'admin_enqueue_scripts', function () {


				if ( ! isset( $_GET["page"] ) ) {
					return;
				}
				if ( isset( $_GET["page"] ) &&
				     $_GET["page"] == "easy-filtering-create-filter" ||
				     $_GET["page"] == "easy-filtering-view-filters" ||
				     $_GET["page"] == "easy-filtering-edit-filter" ||
				     $_GET["page"] == "easy-filtering-view-cards" ||
				     $_GET["page"] == "easy-filtering-card-creator" ||
				     $_GET["page"] == "easy-filtering-edit-card" ||
				     $_GET["page"] == "easy-filtering-create-filter-product" ||
				     $_GET["page"] == "easy-filtering-edit-filter-product" ||
				     $_GET["page"] == "easy-filtering-help"
				) {

					// Sortable UI
					wp_enqueue_script( 'jquery-ui-sortable' );
					wp_enqueue_script( 'jquery-ui-droppable' );
					wp_enqueue_script( 'jquery-effects-core' );


					wp_enqueue_script( 'postem-ipsum-loadingModal-jquery-js', plugins_url( 'assets/js/jquery.loadingModal.js', __FILE__ ), array( 'jquery' ), null, false );
					wp_enqueue_script( 'easy-filtering-admin-jquery-js', plugins_url( 'assets/js/easy_filtering_admin_main.js', __FILE__ ), false, true );

					wp_enqueue_style( 'postem-ipsum-loadingModal-style', plugins_url( 'assets/css/jquery.loadingModal.css', __FILE__ ) );
					wp_enqueue_style( 'easy-filtering-admin-style', plugins_url( 'assets/css/easy_filtering_admin_style.css', __FILE__ ) );

				}
			}
			);

			add_action(
				'admin_menu', array(
					$this,
					'easy_filtering_setup_menu',
				)
			);

			add_action(
				'wp_ajax_easy_filtering_get_taxonomies', array(
					$this,
					'easy_filtering_get_taxonomies',
				)
			);

			add_action(
				'wp_ajax_easy_filtering_generate_shortcode', array(
					$this,
					'easy_filtering_generate_shortcode',
				)
			);

			add_action(
				'wp_ajax_easy_filtering_edit_shortcode', array(
					$this,
					'easy_filtering_edit_shortcode',
				)
			);

			add_action(
				'wp_ajax_easy_filtering_remove_shortcode', array(
					$this,
					'easy_filtering_remove_shortcode',
				)
			);


			add_action(
				'wp_ajax_easy_filtering_generate_card', array(
					$this,
					'easy_filtering_generate_card',
				)
			);

			add_action(
				'wp_ajax_easy_filtering_edition_card', array(
					$this,
					'easy_filtering_edition_card',
				)
			);

			add_action(
				'wp_ajax_easy_filtering_remove_card', array(
					$this,
					'easy_filtering_remove_card',
				)
			);

			add_action(
				'wp_ajax_easy_filtering_generate_shortcode_product', array(
					$this,
					'easy_filtering_generate_shortcode_product',
				)
			);

			add_action(
				'wp_ajax_postem_ipsum_add_metabox', array(
					$this,
					'postem_ipsum_add_metabox',
				)
			);


			add_action(
				'wp_ajax_easy_filtering_edit_shortcode_product', array(
					$this,
					'easy_filtering_edit_shortcode_product',
				)
			);

			add_action(
				'wp_ajax_easy_filtering_refresch_card_preview', array(
					$this,
					'easy_filtering_refresch_card_preview',
				)
			);


		}


		public function easy_filtering_setup_menu() {

			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			add_menu_page(
				"Easy Filtering"
				, "Easy Filtering"
				, 'nosuchcapability'
				, 'easy-filtering'
			);

			add_submenu_page(
				EASY_FILTERING_TEXT_DOMAIN
				, __( "How works", EASY_FILTERING_TEXT_DOMAIN )
				, __( "How works", EASY_FILTERING_TEXT_DOMAIN )
				, 'manage_options'
				, 'easy-filtering-help'
				, array( $this, 'easy_filtering_help' )
			);

			add_submenu_page(
				EASY_FILTERING_TEXT_DOMAIN
				, __( "Filters", EASY_FILTERING_TEXT_DOMAIN )
				, __( "Filters", EASY_FILTERING_TEXT_DOMAIN )
				, 'manage_options'
				, 'easy-filtering-view-filters'
				, array( $this, 'easy_filtering_view_filters' )
			);

			add_submenu_page(
				EASY_FILTERING_TEXT_DOMAIN
				, __( "Create Filter", EASY_FILTERING_TEXT_DOMAIN )
				, __( "Create Filter", EASY_FILTERING_TEXT_DOMAIN )
				, 'manage_options'
				, 'easy-filtering-create-filter'
				, array( $this, 'easy_filtering_create_filter' )
			);

			// Check if Woocommerce is active
			if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
				/*add_submenu_page(
					EASY_FILTERING_TEXT_DOMAIN
					, "Crete Products Filter"
					, "Create Products Filter"
					, 'manage_options'
					, 'easy-filtering-create-filter-product'
					, array($this, 'easy_filtering_create_filter_product')
				);

				add_submenu_page(
					null
					, __("Edit Product Filter", EASY_FILTERING_TEXT_DOMAIN)
					, __("Edit Product Filter", EASY_FILTERING_TEXT_DOMAIN)
					, 'manage_options'
					, 'easy-filtering-edit-filter-product'
					, array($this, 'easy_filtering_edit_filter_product')
				);
			*/

			}


			add_submenu_page(
				null
				, __( "Edit Filter", EASY_FILTERING_TEXT_DOMAIN )
				, __( "Edit Filter", EASY_FILTERING_TEXT_DOMAIN )
				, 'manage_options'
				, 'easy-filtering-edit-filter'
				, array( $this, 'easy_filtering_edit_filter' )
			);


			add_submenu_page(
				EASY_FILTERING_TEXT_DOMAIN
				, __( "Cards", EASY_FILTERING_TEXT_DOMAIN )
				, __( "Cards", EASY_FILTERING_TEXT_DOMAIN )
				, 'manage_options'
				, 'easy-filtering-view-cards'
				, array( $this, 'easy_filtering_view_cards' )
			);

			add_submenu_page(
				EASY_FILTERING_TEXT_DOMAIN
				, __( "Create Card", EASY_FILTERING_TEXT_DOMAIN )
				, __( "Create Card", EASY_FILTERING_TEXT_DOMAIN )
				, 'manage_options'
				, 'easy-filtering-card-creator'
				, array( $this, 'easy_filtering_card_creator' )
			);

			add_submenu_page(
				null
				, __( "Edit Card", EASY_FILTERING_TEXT_DOMAIN )
				, __( "Edit CARd", EASY_FILTERING_TEXT_DOMAIN )
				, 'manage_options'
				, 'easy-filtering-edit-card'
				, array( $this, 'easy_filtering_edit_card' )
			);


		}


		// HELP
		public function easy_filtering_help() {

			require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_help.php';
		}


		// GERNERIC POSTS
		public function easy_filtering_create_filter() {
			$args_post_types = array(
				'public' => true,
			);
			$operator        = 'and';

			// Get card files
			$dir = EASY_FILTERING_PATH . 'public/views/cards';

			$theme_url = get_stylesheet_directory() . "/templates/views/cards/";

			if ( file_exists( $theme_url ) ) {
				$card_files = scandir( $theme_url );
			} else {
				$handle     = opendir( $dir );
				$card_files = scandir( $dir );
			}


			$post_types = get_post_types( $args_post_types, 'objects', $operator );

			$cards = easy_filtering_get_all_cards();

			require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_create_filter.php';
		}

		public function easy_filtering_edit_filter() {
			if ( isset( $_GET["filter_id"] ) ) {
				$filter_id       = $_GET["filter_id"];
				$args_post_types = array(
					'public' => true,
				);

				// Get card files
				$dir = EASY_FILTERING_PATH . 'public/views/cards';

				$theme_url = get_stylesheet_directory() . "/templates/views/cards/";

				if ( file_exists( $theme_url ) ) {
					$card_files = scandir( $theme_url );
				} else {
					$handle     = opendir( $dir );
					$card_files = scandir( $dir );
				}

				$operator = 'and';

				$cards = easy_filtering_get_all_cards();

				$filter = $this->get_filter_data( $filter_id );

				$my_filter = $filter[0];

				$filter_data = json_decode( $my_filter->filter_data );

				$filter_columns = isset( $filter_data->easy_filtering_columns ) ? $filter_data->easy_filtering_columns : "2";

				$filter_mode = isset( $filter_data->easy_filtering_mode ) ? $filter_data->easy_filtering_mode : "filter";

				$filter_post_type = isset( $filter_data->easy_filtering_post_type ) ? $filter_data->easy_filtering_post_type : "";

				$filter_title = isset( $filter_data->easy_filtering_title ) ? $filter_data->easy_filtering_title : "";

				$filter_taxonomy = isset( $filter_data->easy_filtering_taxonomy ) ? $filter_data->easy_filtering_taxonomy : "";

				$filter_show_count = isset( $filter_data->easy_filtering_show_count ) ? $filter_data->easy_filtering_show_count : "no";

				$filter_show_empty = isset( $filter_data->easy_filtering_show_empty_terms ) ? $filter_data->easy_filtering_show_empty_terms : "no";

				$filter_post_number = isset( $filter_data->easy_filtering_post_number ) ? $filter_data->easy_filtering_post_number : 5;

				$filter_show_search = isset( $filter_data->easy_filtering_show_search ) ? $filter_data->easy_filtering_show_search : "no";

				$filter_order_frontend = isset( $filter_data->easy_filtering_order_frontend ) ? $filter_data->easy_filtering_order_frontend : "no";

				$filter_order = isset( $filter_data->easy_filtering_order ) ? $filter_data->easy_filtering_order : "ASC";

				$filter_order_orderby = isset( $filter_data->easy_filtering_orderby ) ? $filter_data->easy_filtering_orderby : "default";

				$filter_pagination = isset( $filter_data->easy_filtering_pagination ) ? $filter_data->easy_filtering_pagination : "none";

				$filter_select_type = isset( $filter_data->easy_filtering_select_type ) ? $filter_data->easy_filtering_select_type : "tabs";

				$filter_select_card = isset( $filter_data->easy_filtering_select_card ) ? $filter_data->easy_filtering_select_card : "default";

				$filter_taxonomies = get_object_taxonomies( $filter_post_type, 'object' );

				$post_types = get_post_types( $args_post_types, 'objects', $operator );

				require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_edit_filter.php';
			}

		}

		public function easy_filtering_view_filters() {
			$args_post_types = array(
				'public' => true,
			);
			$operator        = 'and';

			$list_table = new Filter_List_Table();
			$list_table->prepare_items();

			$post_types = get_post_types( $args_post_types, 'objects', $operator );
			require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_view_filters.php';
		}

		// CARDS
		public function easy_filtering_view_cards() {

			$card_table = new Card_List_Table();
			$card_table->prepare_items();

			require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_view_cards.php';
		}

		public function easy_filtering_card_creator() {

			require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_card_creator.php';
		}

		public function easy_filtering_edit_card() {
			if ( isset( $_GET["card_id"] ) ) {
				$card_id = $_GET["card_id"];

				$card = $this->get_card_data( $card_id );

				$my_card = $card[0];

				$card_data = json_decode( $my_card->card_data );

				$all_blocks = array( "title", "image", "excerpt", "terms", "read-more" );

				$selected_blocks = $card_data;

				if ( ! empty( $selected_blocks ) ) {
					$unselected_blocks = array_diff( $all_blocks, $selected_blocks );
				} else {
					$unselected_blocks = $all_blocks;
				}


				require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_edit_card.php';
			}

		}


		// PRODUCTS
		public function easy_filtering_create_filter_product() {

			// GET ALL POSSIBLE ATTRIBUTES
			$attributes = easy_filtering_get_attrs();


			$cards = easy_filtering_get_all_cards();

			require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_create_filter_product.php';
		}

		public function easy_filtering_edit_filter_product() {
			if ( isset( $_GET["filter_id"] ) ) {
				$filter_id = $_GET["filter_id"];

				// GET ALL POSSIBLE ATTRIBUTES
				$attributes = easy_filtering_get_attrs();


				$cards = easy_filtering_get_all_cards();

				$filter = $this->get_filter_data( $filter_id );

				$my_filter = $filter[0];

				$filter_data = json_decode( $my_filter->filter_data );

				$filter_attributes = isset( $filter_data->easy_filtering_attrs ) ? $filter_data->easy_filtering_attrs : array();

				$filter_title = isset( $filter_data->easy_filtering_title ) ? $filter_data->easy_filtering_title : "";

				$filter_columns = isset( $filter_data->easy_filtering_columns ) ? $filter_data->easy_filtering_columns : "2";

				$filter_show_count = isset( $filter_data->easy_filtering_show_count ) ? $filter_data->easy_filtering_show_count : "no";

				$filter_show_price_filter = isset( $filter_data->easy_filtering_show_price_filter ) ? $filter_data->easy_filtering_show_price_filter : "no";

				$filter_show_empty = isset( $filter_data->easy_filtering_show_empty_terms ) ? $filter_data->easy_filtering_show_empty_terms : "no";

				$filter_post_number = isset( $filter_data->easy_filtering_post_number ) ? $filter_data->easy_filtering_post_number : 5;

				$filter_show_search = isset( $filter_data->easy_filtering_show_search ) ? $filter_data->easy_filtering_show_search : "no";

				$filter_order_frontend = isset( $filter_data->easy_filtering_order_frontend ) ? $filter_data->easy_filtering_order_frontend : "no";

				$filter_order = isset( $filter_data->easy_filtering_order ) ? $filter_data->easy_filtering_order : "ASC";

				$filter_order_orderby = isset( $filter_data->easy_filtering_orderby ) ? $filter_data->easy_filtering_orderby : "default";

				$filter_pagination = isset( $filter_data->easy_filtering_pagination ) ? $filter_data->easy_filtering_pagination : "none";

				$filter_select_type = isset( $filter_data->easy_filtering_select_type ) ? $filter_data->easy_filtering_select_type : "tabs";

				$filter_select_card = isset( $filter_data->easy_filtering_select_card ) ? $filter_data->easy_filtering_select_card : "default";


				require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_edit_filter_product.php';
			}

		}

		////////////////////////////////// GENERATE SHORTCODES ///////////////////////////////////

		public function get_filter_data( $filter_id ) {

			global $wpdb;

			$my_filter = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "easy_filtering_filters WHERE filter_id = $filter_id" );

			return $my_filter;

		}

		public function get_card_data( $card_id ) {

			global $wpdb;

			$my_card = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "easy_filtering_card WHERE card_id = $card_id" );

			return $my_card;

		}

		public function easy_filtering_get_taxonomies() {
			if ( isset( $_POST['post_type'] ) ) {
				$post_type               = $_POST['post_type'];
				$postem_ipsum_taxonomies = get_object_taxonomies( $post_type, 'object' );
				if ( ! empty( $postem_ipsum_taxonomies ) ) {
					require plugin_dir_path( __FILE__ ) . 'views/easy_filtering_get_taxonomies.php';
				} else {
					?>
					<?php _e( 'There arent taxonomies', EASY_FILTERING_TEXT_DOMAIN ); ?>

				<?php }
			}
			die();
		}

		public function easy_filtering_generate_shortcode() {
			if ( isset( $_POST["variables"] ) ) {

				global $wpdb;

				$variables = $_POST["variables"];

				$filter_title = isset( $variables['easy_filtering_title'] ) ? sanitize_text_field( $variables['easy_filtering_title'] ) : "";

				$variables["easy_filtering_taxonomy"] = $_POST["taxonomies"];

				$json_data = json_encode( $variables );
				//echo $json_data;

				$wpdb->insert(
					$wpdb->prefix . 'easy_filtering_filters',
					array(
						'filter_title' => $filter_title,
						'filter_data'  => $json_data,
					),
					array(
						'%s',
						'%s',
						'%s',
					)
				);

				echo "done";

			}

			wp_die();
		}

		public function easy_filtering_edit_shortcode() {

			if ( isset( $_POST["variables"] ) ) {

				global $wpdb;

				$variables = $_POST["variables"];

				$filter_id = isset( $variables['easy_filtering_filter_id'] ) ? sanitize_text_field( $variables['easy_filtering_filter_id'] ) : "";

				$filter_title = isset( $variables['easy_filtering_title'] ) ? sanitize_text_field( $variables['easy_filtering_title'] ) : "";

				$variables["easy_filtering_taxonomy"] = $_POST["taxonomies"];


				$json_data = json_encode( $variables );
				echo $json_data;

				$wpdb->update(
					$wpdb->prefix . 'easy_filtering_filters',
					array(
						'filter_title' => $filter_title,
						'filter_data'  => $json_data,
					),
					array( 'filter_id' => $filter_id ),
					array(
						'%s',
						'%s',
					),
					array( '%d' )
				);

				echo "done";

			}

			wp_die();
		}

		public function easy_filtering_remove_shortcode() {

			if ( isset( $_POST["filter_id"] ) ) {

				global $wpdb;


				$filter_id = isset( $_POST['filter_id'] ) ? sanitize_text_field( $_POST['filter_id'] ) : "";

				$wpdb->delete( $wpdb->prefix . 'wp_easy_filtering_filters', array( 'filter_id' => $filter_id ), array( '%d' ) );

				echo "done";

			}

			wp_die();
		}


		/**
		 * Register tinymce button and plugin
		 */
		public function easy_filtering_tinyMCE_setting() {

			add_filter( 'mce_external_plugins', array( $this, '_add_easy_filtering_tinyMCE_plugin' ) );
			add_filter( 'mce_buttons', array( $this, '_add_easy_filtering_tinyMCE_button' ) );
		}

		public function _add_easy_filtering_tinyMCE_plugin( $plugins_array ) {
			$plugins_array['easy_filtering'] = plugin_dir_url( __FILE__ ) . '/assets/tinymce/plugins/easy_filtering/plugin.js';

			return $plugins_array;
		}

		public function _add_easy_filtering_tinyMCE_button( $buttons ) {
			array_push( $buttons, 'easy_filtering' );

			return $buttons;
		}

		public function easy_filtering_read_filters() {

			global $wpdb;

			$filters_list = $wpdb->get_results( "SELECT filter_id, filter_title FROM " . $wpdb->prefix . "easy_filtering_filters ORDER BY filter_id DESC" );

			$list = array();

			foreach ( $filters_list as $filter ) {

				$filter_id = $filter->filter_id;

				$filter_title = $filter->filter_title;

				$list[] = array(
					'text'  => $filter_title,
					'value' => $filter_id
				);
			}

			wp_send_json( $list );
		}


		public function easy_filtering_list_ajax() {
			// check for nonce
			check_ajax_referer( 'easy_filtering-nonce', 'security' );
			$filters = $this->easy_filtering_read_filters();

			return $filters;
		}

		public function easy_filtering_list() {
			// create nonce
			global $pagenow;
			if ( $pagenow != 'admin.php' ) {
				$nonce = wp_create_nonce( 'easy_filtering-nonce' );
				?>
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        var data = {
                            'action': 'easy_filtering_list_ajax',
                            'security': '<?php echo $nonce; ?>'
                        };
                        // fire ajax
                        jQuery.post(ajaxurl, data, function (response) {

                            if (response === '-1') {

                                console.log('error');
                            } else {

                                if (typeof(tinyMCE) != 'undefined') {
                                    if (tinyMCE.DOM != null) {
                                        tinyMCE.DOM.easy_filtering_filters_list = response;
                                    }
                                }
                            }
                        });
                    });
                </script>
				<?php
			}
		}


		/////////////////////////// CARDS ///////////////////////////////
		public function easy_filtering_generate_card() {
			if ( isset( $_POST["card_title"] ) ) {

				global $wpdb;

				$card_title = isset( $_POST["card_title"] ) ? sanitize_text_field( $_POST["card_title"] ) : "";

				$json_data = json_encode( $_POST["pieces"] );


				$wpdb->insert(
					$wpdb->prefix . 'easy_filtering_card',
					array(
						'card_title' => $card_title,
						'card_data'  => $json_data,
					),
					array(
						'%s',
						'%s',
					)
				);

				echo "done";

			}

			wp_die();
		}

		public function easy_filtering_edition_card() {
			if ( isset( $_POST["card_title"] ) ) {

				global $wpdb;

				$card_title = isset( $_POST["card_title"] ) ? sanitize_text_field( $_POST["card_title"] ) : "";

				$card_id = $_POST["card_id"];

				$json_data = json_encode( $_POST["pieces"] );

				$wpdb->update(
					$wpdb->prefix . 'easy_filtering_card',
					array(
						'card_title' => $card_title,
						'card_data'  => $json_data,
					),
					array( 'card_id' => $card_id ),
					array(
						'%s',
						'%s',
					),
					array( '%d' )
				);


				echo "done";

			}

			wp_die();
		}

		public function easy_filtering_remove_card() {

			if ( isset( $_POST["card_id"] ) ) {

				global $wpdb;


				$card_id = isset( $_POST['card_id'] ) ? sanitize_text_field( $_POST['card_id'] ) : "";

				$wpdb->delete( $wpdb->prefix . 'easy_filtering_card', array( 'card_id' => $card_id ), array( '%d' ) );

				echo "done";

			}

			wp_die();
		}


		////////////////////// PRODUCTS //////////////////////////

		public function easy_filtering_generate_shortcode_product() {
			if ( isset( $_POST["variables"] ) ) {

				global $wpdb;
				$variables = $_POST["variables"];

				$filter_title = isset( $variables['easy_filtering_title'] ) ? sanitize_text_field( $variables['easy_filtering_title'] ) : "";

				$variables["easy_filtering_post_type"] = "product";

				$variables["easy_filtering_taxonomy"] = "product_cat";

				$variables["easy_filtering_attrs"] = $_POST["filter_attributes"];

				$json_data = json_encode( $variables );

				$wpdb->insert(
					$wpdb->prefix . 'easy_filtering_filters',
					array(
						'filter_title' => $filter_title,
						'filter_data'  => $json_data,
					),
					array(
						'%s',
						'%s',
						'%s',
					)
				);

				echo "done";

			}

			wp_die();
		}

		public function easy_filtering_edit_shortcode_product() {

			if ( isset( $_POST["variables"] ) ) {

				global $wpdb;
				$variables = $_POST["variables"];


				$filter_id = isset( $variables['easy_filtering_filter_id'] ) ? sanitize_text_field( $variables['easy_filtering_filter_id'] ) : "";

				$filter_title = isset( $variables['easy_filtering_title'] ) ? sanitize_text_field( $variables['easy_filtering_title'] ) : "";

				$variables["easy_filtering_post_type"] = "product";

				$variables["easy_filtering_taxonomy"] = "product_cat";

				$variables["easy_filtering_attrs"] = $_POST["filter_attributes"];

				$json_data = json_encode( $variables );
				//echo $json_data;

				$wpdb->update(
					$wpdb->prefix . 'easy_filtering_filters',
					array(
						'filter_title' => $filter_title,
						'filter_data'  => $json_data,
					),
					array( 'filter_id' => $filter_id ),
					array(
						'%s',
						'%s',
					),
					array( '%d' )
				);

				echo "done";

			}

			wp_die();
		}


		public function easy_filtering_refresch_card_preview() {

			global $wpdb;

			$json_data = $_POST["pieces"];

			include plugin_dir_path(__FILE__) . 'views/easy_filtering_refresh_card.php';

			die();

		}

	}


}


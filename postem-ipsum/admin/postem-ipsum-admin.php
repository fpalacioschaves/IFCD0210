<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

class PostemIpsum_Admin {

	public function __construct() {

		add_action( 'init', array( $this, 'postem_ipsum_enqueue_admin_scripts' ), 10000 );

		add_action(
			'wp_ajax_postem_ipsum_get_taxonomies', array(
				$this,
				'postem_ipsum_get_taxonomies',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_get_terms', array(
				$this,
				'postem_ipsum_get_terms',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_generate_posts', array(
				$this,
				'postem_ipsum_generate_posts',
			)
		);


		add_action(
			'wp_ajax_postem_ipsum_remove_posts', array(
				$this,
				'postem_ipsum_remove_posts',
			)
		);


		add_action(
			'admin_menu', array(
				$this,
				'postem_ipsum_setup_menu',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_generate_products', array(
				$this,
				'postem_ipsum_generate_products',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_remove_products', array(
				$this,
				'postem_ipsum_remove_products',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_generate_users', array(
				$this,
				'postem_ipsum_generate_users',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_remove_users', array(
				$this,
				'postem_ipsum_remove_users',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_generate_terms', array(
				$this,
				'postem_ipsum_generate_terms',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_remove_terms', array(
				$this,
				'postem_ipsum_remove_terms',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_generate_orders', array(
				$this,
				'postem_ipsum_generate_orders',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_remove_orders', array(
				$this,
				'postem_ipsum_remove_orders',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_generate_woo_attribute', array(
				$this,
				'postem_ipsum_generate_woo_attribute',
			)
		);


		add_action( 'init', array(
				$this,
				'register_postem_ipsum_order_status'
			)
		);

		add_filter( "wc_order_statuses", array(
				$this,
				"add_postem_ipsum_to_order_statuses"
			)
		);

		add_action( 'pre_user_query', array(
				$this,
				'random_user_query'
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_add_metabox', array(
				$this,
				'postem_ipsum_add_metabox',
			)
		);
		add_action(
			'wp_ajax_postem_ipsum_buddy_generate_groups', array(
				$this,
				'postem_ipsum_buddy_generate_groups',
			)
		);

		add_action(
			'wp_ajax_postem_ipsum_remove_groups', array(
				$this,
				'postem_ipsum_remove_groups',
			)
		);



		add_action(
			'wp_ajax_postem_ipsum_buddy_remove_activities', array(
				$this,
				'postem_ipsum_buddy_remove_activities',
			)
		);




		// add posts formats
		add_theme_support( 'post-formats', array(
			'aside',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
			'audio'
		) );
	}

	public function postem_ipsum_general_settings() {

		// Testing metaboxes
		// Authors
		$args = array(
			'blog_id'     => $GLOBALS['blog_id'],
			'orderby'     => 'login',
			'order'       => 'ASC',
			'offset'      => '',
			'search'      => '',
			'number'      => '',
			'count_total' => false,
			'fields'      => array( 'ID', 'display_name' ),
			'who'         => 'author',
		);

		$authors = get_users( $args );

		$args_post_types = array(
			'public' => true,
		);
		$operator        = 'and';
		$post_types      = get_post_types( $args_post_types, 'objects', $operator );

		require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_settings.php';
		require plugin_dir_path( __FILE__ ) . 'views/notice.php';
	}

	public function postem_ipsum_woocommerce_settings() {
		require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_woo_settings.php';
		require plugin_dir_path( __FILE__ ) . 'views/notice.php';
	}

	public function postem_ipsum_users_settings() {
		global $wp_roles;

		$all_roles = $wp_roles->roles;
		$wp_roles  = new WP_Roles();
		$roles     = $wp_roles->get_names();
		require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_users_settings.php';
		require plugin_dir_path( __FILE__ ) . 'views/notice.php';
	}

	public function postem_ipsum_woocommerce_orders_settings() {

		require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_woocommerce_orders_settings.php';
		require plugin_dir_path( __FILE__ ) . 'views/notice.php';
	}

	public function postem_ipsum_terms_settings() {
		$args_post_types = array(
			'public' => true,
		);
		$operator        = 'and';
		$post_types      = get_post_types( $args_post_types, 'objects' );

		require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_terms_settings.php';
		require plugin_dir_path( __FILE__ ) . 'views/notice.php';
	}

	public function postem_ipsum_woocommerce_attribute_settings() {

		require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_attribute_settings.php';
		require plugin_dir_path( __FILE__ ) . 'views/notice.php';
	}

	public function postem_ipsum_buddy_groups_settings() {
		require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_buddy_groups_settings.php';
		require plugin_dir_path( __FILE__ ) . 'views/notice.php';
	}

	public function postem_ipsum_buddy_activity_settings() {

		$args = array(
			'blog_id'     => $GLOBALS['blog_id'],
			'orderby'     => 'login',
			'order'       => 'ASC',
			'offset'      => '',
			'search'      => '',
			'number'      => '',
			'count_total' => false,
			'fields'      => array( 'ID', 'display_name' ),
			'who'         => 'author',
		);

		$authors = get_users( $args );

		require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_buddy_activity_settings.php';
		require plugin_dir_path( __FILE__ ) . 'views/notice.php';
	}

	public function postem_ipsum_setup_menu() {

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		add_menu_page(
			__( "PI :: Wordpress", POSTEM_IPSUM_TEXT_DOMAIN )
			, __( "PI :: Wordpress", POSTEM_IPSUM_TEXT_DOMAIN )
			, 'nosuchcapability'
			, 'postem-ipsum-wp-parent'
			, array( $this, 'postem_ipsum_general_settings' )
			, "dashicons-wordpress-alt"
		);

		add_submenu_page(
			'postem-ipsum-wp-parent'
			, __( "Generic Posts", POSTEM_IPSUM_TEXT_DOMAIN )
			, __( "Generic Posts", POSTEM_IPSUM_TEXT_DOMAIN )
			, 'read'
			, 'postem-ipsum-general-settings'
			, array( $this, 'postem_ipsum_general_settings' )
		);

		// Users
		add_submenu_page(
			'postem-ipsum-wp-parent'
			, __( "Users", POSTEM_IPSUM_TEXT_DOMAIN )
			, __( "Users", POSTEM_IPSUM_TEXT_DOMAIN )
			, 'manage_options'
			, 'postem-ipsum-users-settings'
			, array( $this, 'postem_ipsum_users_settings' )
		);

		// Taxonomy terms
		add_submenu_page(
			'postem-ipsum-wp-parent'
			, __( "Taxonomy terms", POSTEM_IPSUM_TEXT_DOMAIN )
			, __( "Taxonomy terms", POSTEM_IPSUM_TEXT_DOMAIN )
			, 'manage_options'
			, 'postem-ipsum-terms-settings'
			, array( $this, 'postem_ipsum_terms_settings' )
		);

		// Check if Woocommerce is active
		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

			add_menu_page(
				__( "PI :: Woocomerce", POSTEM_IPSUM_TEXT_DOMAIN )
				, __( "PI :: Woocommerce", POSTEM_IPSUM_TEXT_DOMAIN )
				, 'nosuchcapability'
				, 'postem-ipsum-woo-parent'
				, array( $this, 'postem_ipsum_woocommerce_settings' )
				, "dashicons-cart"
			);


			add_submenu_page(
				"postem-ipsum-woo-parent"
				, "Woo Products"
				, "Woo Products"
				, 'manage_options'
				, 'postem-ipsum-woocommerce-settings'
				, array( $this, 'postem_ipsum_woocommerce_settings' )
			);

			add_submenu_page(
				"postem-ipsum-woo-parent"
				, "Woo Orders"
				, "Woo Orders"
				, 'manage_options'
				, 'postem-ipsum-woocommerce-orders-settings'
				, array( $this, 'postem_ipsum_woocommerce_orders_settings' )
			);

		}

		// Check if BuddyPress is active
		if ( function_exists( 'bp_is_active' ) ) {
			add_menu_page(
				"PI :: BuddyPress"
				, "PI :: BuddyPress"
				, 'nosuchcapability'
				, 'postem-ipsum-buddy-parent'
				, array( $this, 'postem_ipsum_buddy_groups_settings' )
				, "dashicons-groups"
			);

			add_submenu_page(
				"postem-ipsum-buddy-parent"
				, "BuddyPress Groups"
				, "BuddyPress Groups"
				, 'manage_options'
				, 'postem-ipsum-buddy-groups-settings'
				, array( $this, 'postem_ipsum_buddy_groups_settings' )
			);

			add_submenu_page(
				"postem-ipsum-buddy-parent"
				, "BuddyPress Activity"
				, "BuddyPress Activity"
				, 'manage_options'
				, 'postem-ipsum-buddy-activity-settings'
				, array( $this, 'postem_ipsum_buddy_activity_settings' )
			);
		} else {

		}


	}

	public function postem_ipsum_enqueue_admin_scripts() {
		if ( ! isset( $_GET["page"] ) ) {
			return;
		}
		if ( isset( $_GET["page"] ) &&
		     $_GET["page"] == "postem-ipsum-general-settings" ||
		     $_GET['page'] == "postem-ipsum-woocommerce-settings" ||
		     $_GET['page'] == "postem-ipsum-users-settings" ||
		     $_GET['page'] == "postem-ipsum-terms-settings" ||
		     $_GET['page'] == "postem-ipsum-woocommerce-orders-settings" ||
		     $_GET['page'] == "postem-ipsum-woocommerce-attribute-settings" ||
		     $_GET['page'] == "postem-ipsum-buddy-members-settings" ||
		     $_GET['page'] == "postem-ipsum-buddy-groups-settings" ||
		     $_GET['page'] == "postem-ipsum-buddy-activity-settings"

		) {
			// Add the color picker css file
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'jquery-ui-datepicker' );
			wp_enqueue_script( 'postem-ipsum-loadingModal-jquery-js', plugins_url( 'assets/js/jquery.loadingModal.js', __FILE__ ), array( 'jquery' ), null, false );
			wp_enqueue_script( 'postem-ipsum-slider-jquery-js', plugins_url( 'assets/js/nouislider.js', __FILE__ ), array( 'jquery' ), null, false );

			//wp_enqueue_script( 'nice-select', plugins_url( 'assets/js/jquery.nice-select.js', __FILE__ ), array( 'jquery' ), null, false );


			wp_enqueue_script( 'postem-ipsum-admin-jquery-js', plugins_url( 'assets/js/postem_ipsum_admin_main.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

			wp_enqueue_style( 'postem-ipsum-slider-style', plugins_url( 'assets/css/nouislider.css', __FILE__ ) );
			wp_enqueue_style( 'postem-ipsum-loadingModal-style', plugins_url( 'assets/css/jquery.loadingModal.css', __FILE__ ) );

			wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
			wp_enqueue_style( 'jquery-ui' );

			wp_enqueue_style( 'postem-ipsum-admin-style', plugins_url( 'assets/css/postem_ipsum_admin_style.css', __FILE__ ) );


		}
	}

	////////////////////////////////// CUSTOM POSTS ///////////////////////////////////
	public function postem_ipsum_get_taxonomies() {
		if ( isset( $_POST['post_type'] ) ) {
			$post_type               = $_POST['post_type'];
			$postem_ipsum_taxonomies = get_object_taxonomies( $post_type, 'object' );
			if ( ! empty( $postem_ipsum_taxonomies ) ) {
				require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_get_taxonomies.php';
			} else {
				?>
                <th></th>
                <td><?php _e( 'There arent taxonomies', POSTEM_IPSUM_TEXT_DOMAIN ); ?></td>

			<?php }
		}
		die();
	}

	public function postem_ipsum_get_terms() {
		if ( isset( $_POST['taxonomy'] ) ) {
			$taxonomy = $_POST['taxonomy'];
			if ( $taxonomy != "category" ) {
				$postem_ipsum_terms = get_terms( $taxonomy, array( 'hide_empty' => false ) );
			} else {
				$postem_ipsum_terms = get_categories( array( 'hide_empty' => 0 ) );
			}
			if ( ! empty( $postem_ipsum_terms ) ) {
				require plugin_dir_path( __FILE__ ) . 'views/postem_ipsum_get_terms.php';
			} else {
				?>
                <th></th>
                <td><?php _e( 'There arent terms', POSTEM_IPSUM_TEXT_DOMAIN ); ?></td>

			<?php }
		}
		die();
	}

	public function postem_ipsum_generate_posts() {

		if ( isset( $_POST['variables'] ) ) {


			$variables = $_POST['variables'];

			$metaboxes = $_POST['metaboxes'];


			$background_color = isset( $_POST['bg_color'] ) ? sanitize_text_field( $_POST['bg_color'] ) : "#000";
			$bg_color         = substr( $background_color, 1 );
			$bg_random        = isset( $_POST["bg_random"] ) ? sanitize_text_field( $_POST["bg_random"] ) : "";
			$post_type        = isset( $variables['postem_ipsum_post_type'] ) ? sanitize_text_field( $variables['postem_ipsum_post_type'] ) : "post";
			$cat_random       = isset( $_POST["cat_random"] ) ? sanitize_text_field( $_POST["cat_random"] ) : "0";
			$taxonomy         = isset( $variables['postem_ipsum_taxonomy'] ) ? sanitize_text_field( $variables['postem_ipsum_taxonomy'] ) : "";

			$author_random = isset( $_POST["author_random"] ) ? sanitize_text_field( $_POST["author_random"] ) : "0";
			$author        = isset( $variables['postem_ipsum_author'] ) ? sanitize_text_field( $variables['postem_ipsum_author'] ) : "";

			$format_random = isset( $_POST["format_random"] ) ? sanitize_text_field( $_POST["format_random"] ) : "0";
			$format        = isset( $variables['postem_ipsum_format'] ) ? sanitize_text_field( $variables['postem_ipsum_format'] ) : "";

			$date_begin = isset( $variables['postem_ipsum_date_begin'] ) ? sanitize_text_field( $variables['postem_ipsum_date_begin'] ) : date( "Y-m-d" );
			$date_end   = isset( $variables['postem_ipsum_date_end'] ) ? sanitize_text_field( $variables['postem_ipsum_date_end'] ) : date( "Y-m-d" );


			// Cogemos todas las categorias por si queremos coger una aleatoria
			$args              = array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => 0,
			);
			$categories        = get_terms( $args );
			$categories_number = sizeof( $categories );


			// Authors if we choose random
			$args = array(
				'blog_id'     => $GLOBALS['blog_id'],
				'orderby'     => 'login',
				'order'       => 'ASC',
				'offset'      => '',
				'search'      => '',
				'number'      => '',
				'count_total' => false,
				'fields'      => array( 'ID', 'display_name' ),
				'who'         => 'autrhor',
			);

			$authors        = get_users( $args );
			$authors_number = sizeof( $authors );


			$terms              = isset( $_POST['postem_ipsum_term'] ) ? $_POST['postem_ipsum_term'] : 0;
			$post_number        = isset( $variables['postem_ipsum_post_number'] ) ? intval( $variables['postem_ipsum_post_number'] ) : 5;
			$paragraph_number   = isset( $variables['postem_ipsum_paragraphs'] ) ? intval( $variables['postem_ipsum_paragraphs'] ) . "/" : "5/";
			$paragraph_length   = isset( $variables['postem_ipsum_paragraph_length'] ) ? sanitize_text_field( $variables['postem_ipsum_paragraph_length'] ) . "/" : "short/";
			$paragraph_decorate = isset( $variables['postem_ipsum_paragraph_decorate'] ) ? ( $variables['postem_ipsum_paragraph_decorate'] == "yes" ? "decorate/" : "" ) : "";
			$paragraph_links    = isset( $variables['postem_ipsum_paragraph_links'] ) ? ( $variables['postem_ipsum_paragraph_links'] == "yes" ? "link/" : "" ) : "";
			$paragraph_ul       = isset( $variables['postem_ipsum_paragraph_ul'] ) ? ( $variables['postem_ipsum_paragraph_ul'] == "yes" ? "ul/" : "" ) : "";
			$paragraph_ol       = isset( $variables['postem_ipsum_paragraph_ol'] ) ? ( $variables['postem_ipsum_paragraph_ol'] == "yes" ? "ol/" : "" ) : "";
			$paragraph_dl       = isset( $variables['postem_ipsum_paragraph_dl'] ) ? ( $variables['postem_ipsum_paragraph_dl'] == "yes" ? "dl/" : "" ) : "";
			$paragraph_bq       = isset( $variables['postem_ipsum_paragraph_bq'] ) ? ( $variables['postem_ipsum_paragraph_bq'] == "yes" ? "bq/" : "" ) : "";
			$paragraph_code     = isset( $variables['postem_ipsum_paragraph_code'] ) ? ( $variables['postem_ipsum_paragraph_code'] == "yes" ? "code/" : "" ) : "";
			$paragraph_headers  = isset( $variables['postem_ipsum_paragraph_header'] ) ? ( $variables['postem_ipsum_paragraph_header'] == "yes" ? "headers/" : "" ) : "";

			$comments        = $variables['postem_ipsum_comments'];
			$comments_number = isset( $variables['postem_ipsum_comments_number'] ) ? intval( $variables['postem_ipsum_comments_number'] ) : 0;

			for ( $contador = 0; $contador < $post_number; $contador ++ ) {

				// The content
				$content_url = 'http://loripsum.net/api/' . $paragraph_number . $paragraph_length . $paragraph_decorate . $paragraph_links . $paragraph_ul . $paragraph_ol . $paragraph_dl . $paragraph_bq . $paragraph_code . $paragraph_headers;
				$response    = wp_remote_get( $content_url );
				if ( is_array( $response ) ) {
					$header = $response['headers']; // array of http header lines
					$data   = $response['body']; // use the content
				}

				// The title
				$response_title = wp_remote_get( 'http://loripsum.net/api/2/short' );
				if ( is_array( $response_title ) ) {
					$header      = $response_title['headers']; // array of http header lines
					$title_array = explode( ".", $response_title['body'] ); // use the content
					$title_text  = $title_array[1];

				}

				// The author
				if ( $author_random == "1" ) {

					$author = $authors[ rand( 0, $authors_number - 1 ) ]->ID;

				} else {

					if ( $author != "" && sizeof( $authors ) != 0 ) {


					}
				}

				// Random date between begin and end
				//Start point of our date range.
				$start     = strtotime( $date_begin );
				$end       = strtotime( $date_end );
				$timestamp = mt_rand( $start, $end );
				$post_date = date( "Y-m-d", $timestamp );


				$title                 = $this->postem_ipsum_truncate_words( $title_text, 10 );
				$short_description_url = 'http://loripsum.net/api/1/short';

				$response_desc = wp_remote_get( $short_description_url );
				if ( is_array( $response_desc ) ) {
					$header            = $response_desc['headers']; // array of http header lines
					$short_description = $response_desc['body']; // use the content

					// SI HAY RESPUESTA
					// Creamos el post type
					$post_id = wp_insert_post( array(
						'post_type'    => $post_type,
						'post_date'    => $post_date,
						'post_title'   => sanitize_text_field( $title ),
						'post_content' => $data,
						'post_status'  => 'publish',
						'post_author'  => $author,
						'post_excerpt' => sanitize_textarea_field( $short_description ),
					) );

					// Insert post format
					$all_formats = array(
						0,
						'aside',
						'chat',
						'gallery',
						'image',
						'link',
						'quote',
						'status',
						'video',
						'audio'
					);
					if ( $format_random == '1' ) {
						$format = $all_formats[ rand( 0, count( $all_formats ) - 1 ) ];
						set_post_format( $post_id, $format ); //sets the given post to the 'gallery' format
					} else {
						set_post_format( $post_id, $format ); //sets the given post to the 'gallery' format
					}


					if ( $cat_random == "1" ) {

						$term = $categories[ rand( 0, $categories_number - 1 ) ]->term_id;
						wp_set_post_terms( $post_id, $term, $taxonomy );

					} else {

						if ( $taxonomy != "" && sizeof( $terms ) != 0 ) {

							wp_set_post_terms( $post_id, $terms, $taxonomy );

						}
					}


					// Le asignamos taxonomia y term


					// le añadimos un meta flag para poder borrarlos cuando lo crea necesario el usuario
					add_post_meta( $post_id, 'postem_ipsum_flag', "yes" );

					// check if we want comments
					if ( $comments == "yes" ) {

						$response = wp_remote_get( "https://randomuser.me/api/?results=" . $comments_number );
						if ( is_array( $response ) ) {
							$header       = $response['headers']; // array of http header lines
							$data         = json_decode( $response['body'] ); // use the content
							$commentators = $data->results;
						}


						for ( $comment_counter = 0; $comment_counter < $comments_number; $comment_counter ++ ) {

							$time           = current_time( 'mysql' );
							$comment_author = $commentators[ $comment_counter ];

							$comment_name  = $comment_author->name;
							$comment_email = $comment_author->email;

							$response_comment = wp_remote_get( 'http://loripsum.net/api/1/short' );
							if ( is_array( $response_comment ) ) {
								$header        = $response_comment['headers']; // array of http header lines
								$comments_text = $response_comment['body']; // use the content
							} else {
								$comments_text = "This is a dummy comment text";
							}

							$data_comment = array(
								'comment_post_ID'      => $post_id,
								'comment_author'       => ucfirst( $comment_name->title ) . " " . ucfirst( $comment_name->first ) . " " . ucfirst( $comment_name->last ),
								'comment_author_email' => $comment_email,
								'comment_author_url'   => 'http://',
								'comment_content'      => $comments_text,
								'comment_type'         => '',
								'comment_parent'       => 0,
								'user_id'              => 1,
								'comment_author_IP'    => '127.0.0.1',
								'comment_agent'        => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.10) Gecko/2009042316 Firefox/3.0.10 (.NET CLR 3.5.30729)',
								'comment_date'         => $time,
								'comment_approved'     => 1,
							);


							wp_insert_comment( $data_comment );

						}

					}


					$image = $variables['postem_ipsum_featured_image'];

					if ( $image == "yes" ) {

						$image_w = intval( $variables['postem_ipsum_image_w'] );
						$image_h = intval( $variables['postem_ipsum_image_h'] );

						if ( $bg_random == "1" ) {
							$bg_color = $this->postem_ipsum_rand_color();
						}

						// Add Featured Image to Post
						$image_url  = 'https://dummyimage.com/' . $image_w . 'x' . $image_w . '/' . $bg_color . '/fff/&text=Postem+Ipsum+rules';
						$image_name = $title . '.png';
						$upload_dir = wp_upload_dir(); // Set upload folder

						$image_data_conection = wp_remote_get( $image_url );
						if ( is_array( $image_data_conection ) ) {
							$header     = $image_data_conection['headers']; // array of http header lines
							$image_data = $image_data_conection['body']; // use the content
						}

						$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
						$filename         = basename( $unique_file_name ); // Create image file name

						// Check folder permission and define file location
						if ( wp_mkdir_p( $upload_dir['path'] ) ) {
							$file = $upload_dir['path'] . '/' . $filename;
						} else {
							$file = $upload_dir['basedir'] . '/' . $filename;
						}

						// Create the image  file on the server
						file_put_contents( $file, $image_data );

						// Check image file type
						$wp_filetype = wp_check_filetype( $filename, null );

						// Set attachment data
						$attachment = array(
							'post_mime_type' => $wp_filetype['type'],
							'post_title'     => sanitize_file_name( $filename ),
							'post_content'   => '',
							'post_status'    => 'inherit'
						);

						// Create the attachment
						$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

						// Include image.php
						require_once( ABSPATH . 'wp-admin/includes/image.php' );

						// Define attachment metadata
						$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

						// Assign metadata to attachment
						wp_update_attachment_metadata( $attach_id, $attach_data );

						// And finally assign featured image to post
						set_post_thumbnail( $post_id, $attach_id );

					}

					// Metaboxes
					if ( isset( $metaboxes ) ) {

						$meta_counter = sizeof( $metaboxes );

						for ( $i = 0; $i < $meta_counter; $i ++ ) {

							if ( $i % 3 == 0 ) {

								$position = $i / 3;

								$metabox_id = $metaboxes["postem_ipsum_meta_field_$position"];

								$metabox_type = $metaboxes["postem_ipsum_meta_field_type_$position"];

								if ( isset( $metaboxes["dynamic_metabox_select_options_$position"] ) && $metaboxes["dynamic_metabox_select_options_$position"] != "" ) {
									$select_values_string = $metaboxes["dynamic_metabox_select_options_$position"];
									$select_values_array  = explode( ",", $select_values_string );
									$number_options       = sizeof( $select_values_array );
									$random_index         = rand( 0, $number_options - 1 );
									$random_selection     = $select_values_array[ $random_index ];
								}

								// Elegimos un valor random para cada opcion en funcion del tipo de meta

								if ( $metabox_type == "single_text" ) { // Una palabra al azar
									$meta_value = $this->postem_ipsum_generateRandomString( 15 );
								}
								if ( $metabox_type == "textarea" ) { // 2 párrafos medianos de texto plano
									$metabox_url      = 'http://loripsum.net/api/2/medium/plaintext';
									$metabox_response = wp_remote_get( $metabox_url );
									if ( is_array( $metabox_response ) ) {
										$header     = $metabox_response['headers']; // array of http header lines
										$meta_value = $metabox_response['body']; // use the content
									}
								}
								if ( $metabox_type == "date" ) { // una fecha al azar
									$meta_value = $this->postem_ipsum_rand_date();
								}
								if ( $metabox_type == "color" ) { // un color al azar
									$meta_value = "#" . $this->postem_ipsum_rand_color();
								}

								if ( $metabox_type == "url" ) { // una url al azar
									$meta_value = "https://wwww." .
									              $this->postem_ipsum_generateRandomString( 10 ) .
									              ".com?" .
									              $this->postem_ipsum_generateRandomString( 6 ) .
									              "=" .
									              $this->postem_ipsum_generateRandomString( 10 );
								}

								if ( $metabox_type == "select" || $metabox_type == "checkboxes" || $metabox_type == "radio" ) { // un color al azar

									$meta_value = $random_selection;

								}

								if ( $metabox_id != "" && $metabox_type != "0" ) {
									add_post_meta( $post_id, $metabox_id, $meta_value );
								}
							}

						}


					}
				}
			}
		}
		die();
	}

	public function postem_ipsum_remove_posts() {

		global $wpdb;
		$result = $wpdb->get_results( "SELECT ID  FROM {$wpdb->prefix}posts INNER JOIN {$wpdb->prefix}postmeta ON {$wpdb->prefix}postmeta.post_id = {$wpdb->prefix}posts.ID WHERE ({$wpdb->prefix}postmeta.meta_key = 'postem_ipsum_flag' AND  {$wpdb->prefix}postmeta.meta_value IS NOT NULL);" );
		foreach ( $result as $post ) {
			$post_id = $post->ID;
			// remove image
			$this->postem_ipsum_remove_attachment_with_post( $post_id );
			// remove post
			wp_delete_post( $post_id );
		}
		die();
	}


////////////////////////////////// WOO ///////////////////////////////////
	public function postem_ipsum_generate_products() {
		if ( isset( $_POST['variables'] ) ) {
			$variables = $_POST['variables'];

			// Cogemos todas las categorias por si queremos coger una aleatoria
			$args               = array(
				'taxonomy'   => "product_cat",
				'hide_empty' => 0,
			);
			$product_categories = get_terms( $args );
			$categories_number  = sizeof( $product_categories );
			$price_min          = isset( $_POST['price_min'] ) ? intval( $_POST['price_min'] ) : 0;
			$price_max          = isset( $_POST['price_max'] ) ? intval( $_POST['price_max'] ) : 1000;
			$weight_min         = isset( $_POST['weight_min'] ) ? intval( $_POST['weight_min'] ) : 0;
			$weight_max         = isset( $_POST['weight_max'] ) ? intval( $_POST['weight_max'] ) : 1000;
			$length_min         = isset( $_POST['length_min'] ) ? intval( $_POST['length_min'] ) : 0;
			$length_max         = isset( $_POST['length_max'] ) ? intval( $_POST['length_max'] ) : 1000;
			$width_min          = isset( $_POST['width_min'] ) ? intval( $_POST['width_min'] ) : 0;
			$width_max          = isset( $_POST['width_max'] ) ? intval( $_POST['width_max'] ) : 1000;
			$height_min         = isset( $_POST['height_min'] ) ? intval( $_POST['height_min'] ) : 0;
			$height_max         = isset( $_POST['height_max'] ) ? intval( $_POST['height_max'] ) : 1000;
			$cat_random         = isset( $_POST["cat_random"] ) ? sanitize_text_field( $_POST["cat_random"] ) : "0";
			$background_color   = isset( $_POST['bg_color'] ) ? sanitize_text_field( $_POST['bg_color'] ) : "#000";
			$bg_color           = $str = substr( $background_color, 1 );
			$bg_random          = isset( $_POST["bg_random"] ) ? sanitize_text_field( $_POST["bg_random"] ) : "";
			$post_type          = "product";
			$taxonomy           = "product_cat";
			$term               = $variables['cat'];
			$post_number        = isset( $variables['postem_ipsum_woo_products_number'] ) ? intval( $variables['postem_ipsum_woo_products_number'] ) : 5;
			$paragraph_number   = isset( $variables['postem_ipsum_woo_product_paragraphs'] ) ? intval( $variables['postem_ipsum_woo_product_paragraphs'] ) . "/" : "1/";
			$paragraph_length   = isset( $variables['postem_ipsum_woo_product_paragraph_length'] ) ? sanitize_text_field( $variables['postem_ipsum_woo_product_paragraph_length'] ) . "/decorate/" : "short/decorate/";


			$product_type = isset( $variables['postem_ipsum_woo_product_type'] ) ? sanitize_text_field( $variables['postem_ipsum_woo_product_type'] ) : "simple";

			$comments        = $variables['postem_ipsum_woo_comments'];
			$comments_number = isset( $variables['postem_ipsum_woo_comments_number'] ) ? intval( $variables['postem_ipsum_woo_comments_number'] ) : 0;

			$date_begin = isset( $variables['postem_ipsum_woo_date_begin'] ) ? sanitize_text_field( $variables['postem_ipsum_woo_date_begin'] ) : date( "Y-m-d" );
			$date_end   = isset( $variables['postem_ipsum_woo_date_end'] ) ? sanitize_text_field( $variables['postem_ipsum_woo_date_end'] ) : date( "Y-m-d" );


			for ( $contador = 0; $contador < $post_number; $contador ++ ) {

				$weight = isset( $variables['postem_ipsum_woo_weight'] ) && $variables['postem_ipsum_woo_weight'] == "yes" ? wc_format_decimal( floatval( rand( $weight_min, $weight_max ) ) ) : "";
				$length = isset( $variables['postem_ipsum_woo_length'] ) && $variables['postem_ipsum_woo_length'] == "yes" ? wc_format_decimal( floatval( rand( $length_min, $length_max ) ) ) : "";
				$width  = isset( $variables['postem_ipsum_woo_width'] ) && $variables['postem_ipsum_woo_width'] == "yes" ? wc_format_decimal( floatval( rand( $width_min, $width_max ) ) ) : "";
				$height = isset( $variables['postem_ipsum_woo_height'] ) && $variables['postem_ipsum_woo_height'] == "yes" ? wc_format_decimal( floatval( rand( $height_min, $height_max ) ) ) : "";


				// The content
				$content_url = 'http://loripsum.net/api/' . $paragraph_number . $paragraph_length;
				$response    = wp_remote_get( $content_url );
				if ( is_array( $response ) ) {
					$header = $response['headers']; // array of http header lines
					$data   = $response['body']; // use the content

					// Short description
					$response_desc = wp_remote_get( 'http://loripsum.net/api/1/short' );
					if ( is_array( $response_desc ) ) {
						$header            = $response_desc['headers']; // array of http header lines
						$short_description = $response_desc['body']; // use the content
					}

					// The title
					$response_title = wp_remote_get( 'http://loripsum.net/api/2/short' );
					if ( is_array( $response_title ) ) {
						$header      = $response_title['headers']; // array of http header lines
						$title_array = explode( ".", $response_title['body'] ); // use the content
						$title_text  = $title_array[1];
					}

					$title = $this->postem_ipsum_truncate_words( $title_text, 15 );

					// Random date between begin and end
					//Start point of our date range.
					$start     = strtotime( $date_begin );
					$end       = strtotime( $date_end );
					$timestamp = mt_rand( $start, $end );
					$post_date = date( "Y-m-d", $timestamp );

					// Creamos el post type
					$post_id = wp_insert_post( array(
						'post_type'    => $post_type,
						'post_date'    => $post_date,
						'post_title'   => sanitize_text_field( $title ),
						'post_content' => $data,
						'post_status'  => 'publish',
						'post_excerpt' => sanitize_textarea_field( $short_description ),
					) );

					// Le asignamos taxonomia y term

					if ( $cat_random == "1" ) {
						$term = $product_categories[ rand( 0, $categories_number - 1 ) ]->term_id;
					}

					wp_set_post_terms( $post_id, $term, $taxonomy );

					$price = wc_format_decimal( floatval( rand( $price_min, $price_max ) ) );
					$sku   = $this->postem_ipsum_generateRandomString( 15 );
					$stock = rand( 0, 500 );

					// meta values de producto
					wp_set_object_terms( $post_id, $product_type, 'product_type' );
					update_post_meta( $post_id, '_visibility', 'visible' );
					update_post_meta( $post_id, '_stock_status', 'instock' );
					update_post_meta( $post_id, 'total_sales', '0' );
					update_post_meta( $post_id, '_downloadable', 'no' );
					update_post_meta( $post_id, '_virtual', 'no' );
					update_post_meta( $post_id, '_regular_price', $price );
					update_post_meta( $post_id, '_sale_price', $price );
					update_post_meta( $post_id, '_purchase_note', '' );
					update_post_meta( $post_id, '_featured', 'no' );
					update_post_meta( $post_id, '_weight', $weight );
					update_post_meta( $post_id, '_length', $length );
					update_post_meta( $post_id, '_width', $width );
					update_post_meta( $post_id, '_height', $height );
					update_post_meta( $post_id, '_sku', $sku );
					update_post_meta( $post_id, '_product_attributes', array() );
					update_post_meta( $post_id, '_sale_price_dates_from', '' );
					update_post_meta( $post_id, '_sale_price_dates_to', '' );
					update_post_meta( $post_id, '_price', $price );
					update_post_meta( $post_id, '_sold_individually', '' );
					update_post_meta( $post_id, '_manage_stock', 'yes' );
					update_post_meta( $post_id, '_backorders', 'no' );
					update_post_meta( $post_id, '_stock', $stock );
					update_post_meta( $post_id, '_wc_average_rating', rand( 0, 5 ) );

					// le añadimos un meta flag para poder borrarlos cuando lo crea necesario el usuario
					add_post_meta( $post_id, 'postem_ipsum_woo_flag', "yes" );

					$image   = $variables['postem_ipsum_woo_product_image'];
					$image_w = $variables['postem_ipsum_woo_product_image_w'];
					$image_h = $variables['postem_ipsum_woo_product_image_h'];

					if ( $product_type == "variable" ) {
						// Le metemos las variaciones
						$attribute = $variables['postem_ipsum_woo_attribute'];

						$terms = get_terms( 'pa_' . $attribute,
							array(
								'hide_empty' => false,
							) );

						foreach ( $terms as $term ) {

						}


					}


					// check if we want comments
					if ( $comments == "yes" ) {

						$response = wp_remote_get( "https://randomuser.me/api/?results=" . $comments_number );
						if ( is_array( $response ) ) {
							$header       = $response['headers']; // array of http header lines
							$data         = json_decode( $response['body'] ); // use the content
							$commentators = $data->results;
						}


						for ( $comment_counter = 0; $comment_counter < $comments_number; $comment_counter ++ ) {

							$time           = current_time( 'mysql' );
							$comment_author = $commentators[ $comment_counter ];

							$comment_name  = $comment_author->name;
							$comment_email = $comment_author->email;

							$response_comment = wp_remote_get( 'http://loripsum.net/api/1/short' );
							if ( is_array( $response_comment ) ) {
								$header        = $response_comment['headers']; // array of http header lines
								$comments_text = $response_comment['body']; // use the content
							} else {
								$comments_text = "This is a dummy comment text";
							}

							$data_comment = array(
								'comment_post_ID'      => $post_id,
								'comment_author'       => ucfirst( $comment_name->title ) . " " . ucfirst( $comment_name->first ) . " " . ucfirst( $comment_name->last ),
								'comment_author_email' => $comment_email,
								'comment_author_url'   => 'http://',
								'comment_content'      => $comments_text,
								'comment_type'         => '',
								'comment_parent'       => 0,
								'user_id'              => 1,
								'comment_author_IP'    => '127.0.0.1',
								'comment_agent'        => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.10) Gecko/2009042316 Firefox/3.0.10 (.NET CLR 3.5.30729)',
								'comment_date'         => $time,
								'comment_approved'     => 1,
							);


							wp_insert_comment( $data_comment );

						}

					}

					if ( $image == "yes" ) {
						if ( $bg_random == "1" ) {
							$bg_color = $this->postem_ipsum_rand_color();
						}

						// Add Featured Image to Post
						$image_url = 'https://dummyimage.com/' . $image_w . 'x' . $image_h . '/' . $bg_color . '/fff/&text=Postem+Ipsum+rules';

						$image_name = $title . '.png';
						$upload_dir = wp_upload_dir(); // Set upload folder

						$image_data_conection = wp_remote_get( $image_url );
						if ( is_array( $image_data_conection ) ) {
							$header     = $image_data_conection['headers']; // array of http header lines
							$image_data = $image_data_conection['body']; // use the content
						}

						$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
						$filename         = basename( $unique_file_name ); // Create image file name

						// Check folder permission and define file location
						if ( wp_mkdir_p( $upload_dir['path'] ) ) {
							$file = $upload_dir['path'] . '/' . $filename;
						} else {
							$file = $upload_dir['basedir'] . '/' . $filename;
						}

						// Create the image  file on the server
						file_put_contents( $file, $image_data );

						// Check image file type
						$wp_filetype = wp_check_filetype( $filename, null );

						// Set attachment data
						$attachment = array(
							'post_mime_type' => $wp_filetype['type'],
							'post_title'     => sanitize_file_name( $filename ),
							'post_content'   => '',
							'post_status'    => 'inherit'
						);

						// Create the attachment
						$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

						// Include image.php
						require_once( ABSPATH . 'wp-admin/includes/image.php' );

						// Define attachment metadata
						$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

						// Assign metadata to attachment
						wp_update_attachment_metadata( $attach_id, $attach_data );

						// And finally assign featured image to post
						set_post_thumbnail( $post_id, $attach_id );

					}

				}

			}

		}
		die();
	}

	public function postem_ipsum_remove_products() {
		global $wpdb;
		$result = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts INNER JOIN {$wpdb->prefix}postmeta ON {$wpdb->prefix}postmeta.post_id = {$wpdb->prefix}posts.ID WHERE ({$wpdb->prefix}postmeta.meta_key = 'postem_ipsum_woo_flag' AND {$wpdb->prefix}postmeta.meta_value IS NOT NULL);" );
		foreach ( $result as $post ) {
			$post_id = $post->ID;
			// remove image
			$this->postem_ipsum_remove_attachment_with_post( $post_id );
			// remove post
			wp_delete_post( $post_id );
		}
		die();
	}


	/////////////// RANDOM STRING ///////////////////////////
	public function postem_ipsum_generateRandomString( $length = 10 ) {
		$characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen( $characters );
		$randomString     = '';
		for ( $i = 0; $i < $length; $i ++ ) {
			$randomString .= $characters[ rand( 0, $charactersLength - 1 ) ];
		}

		return $randomString;
	}

	public function postem_ipsum_truncate_words( $string, $words = 20 ) {
		return preg_replace( '/((\w+\W*){' . ( $words - 1 ) . '}(\w+))(.*)/', '${1}', $string );
	}

	public function postem_ipsum_remove_attachment_with_post( $post_id ) {
		if ( has_post_thumbnail( $post_id ) ) {
			$attachment_id = get_post_thumbnail_id( $post_id );
			wp_delete_attachment( $attachment_id, true );
		}
	}

	public function postem_ipsum_rand_color() {
		return sprintf( '%06X', mt_rand( 0, 0xFFFFFF ) );
	}

	public function postem_ipsum_rand_date() {
		//Generate a timestamp using mt_rand.
		$timestamp = mt_rand( 1, time() );

		$wpDateFormat = get_option( 'date_format' );

		//Format that timestamp into a readable date string.
		$randomDate = date( $wpDateFormat, $timestamp );

		//Print it out.
		return $randomDate;
	}

	////////////////////////////////////// USERS /////////////////////////////////////////////////////////////
	public function postem_ipsum_generate_users() {

		if ( isset( $_POST['users_data'] ) ) {


			$variables = $_POST['variables'];
			$users     = $_POST["users_data"]["results"];
			$role      = $variables["postem_ipsum_users_role"];
			foreach ( $users as $user ) {

				$user_data     = $user;
				$user_login    = $user_data["login"];
				$user_name     = $user_data["name"];
				$user_location = $user_data["location"];
				$user_email    = $user_data["email"];
				$user_picture  = $user_data["picture"];

				// First,  user creation

				$username        = $user_login["username"];
				$password        = $user_login["password"];
				$user_data_array = array(
					'user_login'    => $username,
					'user_email'    => $user_email,
					'user_pass'     => $password,
					'first_name'    => ucfirst( $user_name["first"] ),
					'last_name'     => ucfirst( $user_name["last"] ),
					'user_nicename' => ucfirst( $user_name["title"] ) . " " . ucfirst( $user_name["first"] ) . " " . $user_name["last"],
					'role'          => $role
				);

				$user_id = wp_insert_user( $user_data_array );

				// add flag to remove users
				add_user_meta( $user_id, 'postem_ipsum_user_flag', "yes" );

				// add user meta fields if Woocommerce is active
				// Check if Woocommerce is active
				if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

					// billling
					add_user_meta( $user_id, 'billing_address_1', $user_location["street"] );
					add_user_meta( $user_id, 'billing_city', ucfirst( $user_location["city"] ) );
					add_user_meta( $user_id, 'billing_state', ucfirst( $user_location["state"] ) );
					add_user_meta( $user_id, 'billing_postcode', $user_location["postcode"] );
					add_user_meta( $user_id, 'billing_country', $user_data["nat"] );

					// shipping
					add_user_meta( $user_id, 'shipping_first_name', ucfirst( $user_name["first"] ) );
					add_user_meta( $user_id, 'shipping_last_name', ucfirst( $user_name["last"] ) );
					add_user_meta( $user_id, 'shipping_address_1', $user_location["street"] );
					add_user_meta( $user_id, 'shipping_city', ucfirst( $user_location["city"] ) );
					add_user_meta( $user_id, 'shipping_postcode', $user_location["postcode"] );
					add_user_meta( $user_id, 'shipping_country', $user_data["nat"] );
					add_user_meta( $user_id, 'shipping_state', ucfirst( $user_location["state"] ) );
				}

			}

		}
		die();
	}

	public function postem_ipsum_remove_users() {

		global $wpdb;

		$result = $wpdb->get_results( "SELECT ID  FROM {$wpdb->prefix}users INNER JOIN {$wpdb->prefix}usermeta ON {$wpdb->prefix}usermeta.user_id = {$wpdb->prefix}users.ID WHERE ({$wpdb->prefix}usermeta.meta_key = 'postem_ipsum_user_flag' AND {$wpdb->prefix}usermeta.meta_value IS NOT NULL);" );
		foreach ( $result as $post ) {
			$user_id = $post->ID;

			// remove user
			wp_delete_user( $user_id );
		}
		die();
	}

	////////////////////////////////////// TERMS /////////////////////////////////////////////////////////////
	public function postem_ipsum_generate_terms() {

		if ( isset( $_POST['variables'] ) ) {


			$variables = $_POST['variables'];

			$terms_number = isset( $variables['postem_ipsum_terms_number'] ) ? intval( $variables['postem_ipsum_terms_number'] ) : 5;

			$taxonomy = $variables["postem_ipsum_taxonomy"];

			$post_type = $variables["postem_ipsum_post_type"];
			for ( $counter = 0; $counter < $terms_number; $counter ++ ) {

				$term_slug = $this->readable_random_string( rand( 8, 14 ) );
				$term_name = ucfirst( $term_slug );

				$term = wp_insert_term(
					$term_name, // the term
					$taxonomy, // the taxonomy
					array(
						'description' => 'Created by Postem Ipsum',
						'slug'        => $term_slug,
					)
				);

				$term_id = $term["term_id"];

				// add flag to remove
				add_term_meta( $term_id, "postem_ipsum_term_flag", "yes" );
			}


		}
		die();
	}

	public function postem_ipsum_remove_terms() {

		global $wpdb;

		$result = $wpdb->get_results( "SELECT {$wpdb->prefix}terms.term_id  FROM {$wpdb->prefix}terms INNER JOIN {$wpdb->prefix}termmeta ON {$wpdb->prefix}termmeta.term_id = {$wpdb->prefix}terms.term_id WHERE ({$wpdb->prefix}termmeta.meta_key = 'postem_ipsum_term_flag' AND {$wpdb->prefix}termmeta.meta_value IS NOT NULL);" );

		var_dump( $result );

		foreach ( $result as $term ) {
			$term_id = $term->term_id;

			echo $term_id;
			echo "REMOVE FROM wp_terms WHERE term_id = " . $term_id;
			// remove term
			$result = $wpdb->get_results( "DELETE FROM wp_terms WHERE term_id = " . $term_id );

			$result = $wpdb->get_results( "DELETE FROM wp_termmeta WHERE term_id = " . $term_id );

		}
		die();
	}

	public function readable_random_string( $length = 6 ) {
		$string     = '';
		$vowels     = array( "a", "e", "i", "o", "u" );
		$consonants = array(
			'b',
			'c',
			'd',
			'f',
			'g',
			'h',
			'j',
			'k',
			'l',
			'm',
			'n',
			'p',
			'r',
			's',
			't',
			'v',
			'w',
			'x',
			'y',
			'z'
		);
		// Seed it
		srand( (double) microtime() * 1000000 );
		$max = $length / 2;
		for ( $i = 1; $i <= $max; $i ++ ) {
			$string .= $consonants[ rand( 0, 19 ) ];
			$string .= $vowels[ rand( 0, 4 ) ];
		}

		return $string;
	}

	////////////////////////////////////// ORDERS /////////////////////////////////////////////////////////////
	public function postem_ipsum_generate_orders() {



		if ( isset( $_POST['users'] ) ) {

			global $woocommerce;

			$users_number = $_POST["users"];

			//echo $users_number;

			$users = get_users( array(
				'fields'  => 'ID',
				//'role'    => 'customer',
				'orderby' => 'rand',
				'number'  => $users_number,
			) );






			foreach ( $users as $user_id ) {
				$user_data  = get_userdata( $user_id );
				$user_name  = $user_data->user_nicename;
				$user_email = $user_data->user_email;

				// First,  order creation
				$address = array(
					'first_name' => ucfirst( $user_data->first_name ),
					'last_name'  => ucfirst( $user_data->last_name ),
					'company'    => '',
					'email'      => $user_email,
					'phone'      => get_user_meta( $user_id, 'phone_number', true ),
					'address_1'  => get_user_meta( $user_id, 'shipping_address_1', true ),
					'city'       => ucfirst( get_user_meta( $user_id, 'shipping_city', true ) ),
					'state'      => ucfirst( get_user_meta( $user_id, 'shipping_state', true ) ),
					'postcode'   => get_user_meta( $user_id, 'shipping_postcode', true ),
					'country'    => get_user_meta( $user_id, 'shipping_country', true )
				);

				// Now we create the order
				$order = wc_create_order($address);

				// The add_product() function below is located in /plugins/woocommerce/includes/abstracts/abstract_wc_order.php
				$products_number = rand( 1, 5 );

				$args = array(
					'posts_per_page' => $products_number,
					'orderby'        => 'rand',
					'post_type'      => 'product'
				);

				$random_products = get_posts( $args );

				foreach ( $random_products as $product ) {

					$_product = new WC_Product( $product->ID );

					$order->add_product( $_product, rand( 1, 5 ) ); // Use the product IDs to add
				}


				// Set addresses
				$order->set_address( $address, 'billing' );
				$order->set_address( $address, 'shipping' );

				// Set date

				$random_date = $this->postem_ipsum_rand_date() . " 00:00:00";

				//echo $order->get_id();

				//wp_update_post(array ('ID' => $order->get_id(), 'post_date'=> $random_date,'post_date_gmt' => get_gmt_from_date( $random_date )));

				clean_post_cache( $order->get_id() );

                $update_data = array(
                        "ID" => $order->get_id(),
                        "post_date" => $random_date
                );

				wp_update_post($update_data);

                //echo $random_date .  "-" . get_gmt_from_date( $random_date );

				// Set payment gateway
				$payment_gateways = WC()->payment_gateways->payment_gateways();
				$order->set_payment_method( $payment_gateways['bacs'] );

				// Calculate totals
				$order->calculate_totals();
				$order->update_status( 'wc-postem-ipsum', '', true );


			}

		}
		die();
	}

	public function postem_ipsum_remove_orders() {

		$args   = array(
			'status' => 'wc-postem-ipsum',
		);
		$orders = wc_get_orders( $args );

		foreach ( $orders as $order ) {
			$order_id = trim( str_replace( '#', '', $order->get_order_number() ) );

			wp_delete_post( $order_id, true );
		}


		die();
	}

	// Create Custom Order Status
	public function register_postem_ipsum_order_status() {
		register_post_status( 'wc-postem-ipsum', array(
			'label'                     => 'Postem Ipsum Order',
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label_count'               => _n_noop( 'Postem Ipsum <span class="count">(%s)</span>', 'Postem Ipsum <span class="count">(%s)</span>' )
		) );
	}

	// Add to list of WC Order statuses
	public function add_postem_ipsum_to_order_statuses( $order_statuses ) {
		$new_order_statuses = array();
		// add new order status after processing
		foreach ( $order_statuses as $key => $status ) {
			$new_order_statuses[ $key ] = $status;
			if ( 'wc-processing' === $key ) {
				$new_order_statuses['wc-postem-ipsum'] = 'Created by Postem Ipsum';
			}
		}

		return $new_order_statuses;
	}

	public function random_user_query( $class ) {
		if ( 'rand' == $class->query_vars['orderby'] ) {
			$class->query_orderby = str_replace( 'user_login', 'RAND()', $class->query_orderby );
		}

		return $class;
	}

	///////////////////////////////////// META BOXES ///////////////////////////////////
	public function postem_ipsum_add_metabox() {

		$meta_number = $_POST["meta_number"] / 3;

		$meta_field_name     = "postem_ipsum_meta_field_" . $meta_number;
		$meta_select_name    = "postem_ipsum_meta_field_type_" . $meta_number;
		$select_options_name = 'dynamic_metabox_select_options_' . $meta_number;

		echo '          
          <tr>
            <th class="table-header" scope="row">' . __( "Meta field id?", POSTEM_IPSUM_TEXT_DOMAIN ) . '</th>
            <td>
                <input class="dynamic_metabox" type="text" name="' . $meta_field_name . '" id="' . $meta_field_name . '">
            </td>
          </tr>
          <tr>
            <th class="table-header" scope="row">' . __( "Select Meta field Type", POSTEM_IPSUM_TEXT_DOMAIN ) . '</th>
            <td>
                <select data-order="' . $meta_number . '" class="dynamic_metabox" name="' . $meta_select_name . '" id="' . $meta_select_name . '">
                    <option value="0" selected>' . __( "Select a meta field type", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                    <option value="single_text">' . __( "Single text", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                    <option value="textarea">' . __( "Textarea", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                    <option value="select">' . __( "Select list", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                    <option value="checkboxes">' . __( "Checkboxes", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                    <option value="radio">' . __( "Radio", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                    <option value="date">' . __( "Date", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                    <option value="color">' . __( "Color", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                    <option value="url">' . __( "URL", POSTEM_IPSUM_TEXT_DOMAIN ) . '</option>
                </select>
                
               
            </td>
          </tr>
          
          <tr class="meta_select_options" data-order="' . $meta_number . '" style="display: none;">
          
              <th class="table-header" scope="row">' . __( "Select Values (separate by commas)", POSTEM_IPSUM_TEXT_DOMAIN ) . '</th>    
            
            <td>
                <input class="dynamic_metabox" type="text" name="' . $select_options_name . '" id="' . $select_options_name . '">
            </td>
            
            </tr>';

		wp_die();
	}

///////////////////////////////// BUDDYPRESS GROUPS ////////////////////////////////
	public function postem_ipsum_buddy_generate_groups() {

		if ( isset( $_POST['variables'] ) ) {

			$variables = $_POST['variables'];

			$group_number = isset( $variables['postem_ipsum_buddy_groups_number'] ) ? intval( $variables['postem_ipsum_buddy_groups_number'] ) : 5;


			$status_array = array( "public", "private", "hidden" );

			$group_status_random = isset( $_POST["group_status_random"] ) ? sanitize_text_field( $_POST["group_status_random"] ) : "0";


			for ( $counter = 0; $counter < $group_number; $counter ++ ) {

				if ( $group_status_random == '1' ) {
					$group_status = $status_array[ rand( 0, count( $status_array ) - 1 ) ];
				} else {
					$group_status = isset( $variables['postem_ipsum_buddy_groups_status'] ) ? $variables['postem_ipsum_buddy_groups_status'] : "public";
				}

				$group_slug = $this->readable_random_string( rand( 8, 14 ) );
				$group_name = ucfirst( $group_slug );

				$content_url = 'http://loripsum.net/api/1';
				$response    = wp_remote_get( $content_url );
				if ( is_array( $response ) ) {
					$header = $response['headers']; // array of http header lines
					$desc   = $response['body']; // use the content
				}


				$new_group = new BP_Groups_Group;

				//$new_group->creator_id = 1;
				$new_group->name               = $group_name;
				$new_group->slug               = $group_slug;
				$new_group->description        = $desc;
				$new_group->news               = ‘whatever’;
				$new_group->status             = $group_status;
				$new_group->is_invitation_only = 1;
				$new_group->enable_wire        = 1;
				$new_group->enable_forum       = 1;
				$new_group->enable_photos      = 1;
				$new_group->photos_admin_only  = 1;
				$new_group->date_created       = current_time( ‘mysql’ );
				$new_group->total_member_count = 1;
				//$new_group->avatar_thumb = ‘some kind of path’;
				//$new_group->avatar_full = ‘some kind of path’;

				$saved = $new_group->save();

				if ( $saved ) {
					$id = $new_group->id;
					groups_update_groupmeta( $id, 'total_member_count', 1 );
					groups_update_groupmeta( $id, 'last_activity', time() );
					groups_update_groupmeta( $id, 'theme’, ‘buddypress' );
					groups_update_groupmeta( $id, 'stylesheet’, ‘buddypress' );

				} else {
					return false;
				}

				// add flag to remove
				add_term_meta( $id, "postem_ipsum_buddy_group_flag", "yes" );
			}


		}
		die();
	}

	public function postem_ipsum_remove_groups() {

		global $wpdb;

		$vgroups = BP_Groups_Group::get( array( 'type' => 'alphabetical', 'per_page' => 999, 's' => $q['term'] ) );
		$return  = array();
		foreach ( $vgroups['groups'] as $vgroup ) {

			$group_id = $vgroup->id;

			global $bp;
			$group = new BP_Groups_Group( $group_id );
			if ( ! $group->delete() ) {
				return false;
			}

			groups_delete_all_group_invites( $group_id );

			do_action( 'groups_delete_group', $group_id );

		}

		die();
	}

	public function postem_ipsum_buddy_generate_activities() {

		if ( isset( $_POST['variables'] ) ) {

			$variables = $_POST['variables'];

			$activity_type = isset( $variables['postem_ipsum_buddy_activity_type'] ) ? $variables['postem_ipsum_buddy_activity_type'] : "";

			$activities_number = isset( $variables['postem_ipsum_buddy_activities_number'] ) ? intval( $variables['postem_ipsum_buddy_activities_number'] ) : 5;

			$user_random = isset( $_POST["user_random"] ) ? sanitize_text_field( $_POST["user_random"] ) : "0";

			$activity_type_random= isset( $_POST["activity_type_random"] ) ? sanitize_text_field( $_POST["activity_type_random"] ) : "0";


			// Authors if we choose random
			$args = array(
				'blog_id'     => $GLOBALS['blog_id'],
				'orderby'     => 'login',
				'order'       => 'ASC',
				'offset'      => '',
				'search'      => '',
				'number'      => '',
				'count_total' => false,
				'fields'      => array( 'ID', 'display_name' ),
				'who'         => '',
			);

			$activity_types_array = array(
			        "new_member",
                "updated_profile",
                "activity_update",
                "friendship_accepted",
                "friendship_created",
                "created_group",
                "joined_group",
                "group_details_updated",
                "new_blog_post",
                "new_blog_comment"
            );

			$activities_number = sizeof( $activity_types_array );

			$users        = get_users( $args );
			$users_number = sizeof( $users );


			for ( $counter = 0; $counter < $activities_number; $counter ++ ) {

				if ( $user_random == "1" ) {

					$author = $users[ rand( 0, $users_number - 1 ) ]->ID;
					$author_name = $users[ rand( 0, $users_number - 1 ) ]->display_name;

				} else {
					$author = $variables['postem_ipsum_buddy_activity_user'];
					$user_data = get_userdata( $author );
					$author_name = $user_data->display_name;
				}

				if ( $activity_type_random == "1" ) {

					$activity_type = $activity_types_array[ rand( 0, $activities_number - 1 ) ];

				}

				$activity_action = $this->readable_random_string( rand( 8, 14 ) );

				$content_url = 'http://loripsum.net/api/1';
				$response    = wp_remote_get( $content_url );
				if ( is_array( $response ) ) {
					$header = $response['headers']; // array of http header lines
					$content   = $response['body']; // use the content
				}

				$args = array(
					'id'                => null,
					'user_id'           => $author,
					'type'              => $activity_type,
					'action'            => '<p>' . ucfirst ($activity_action) . " by " .$author_name . '</p>',
					'item_id'           => '',
					'secondary_item_id' => '',
					'content'           => $content,
					'primary_link'      => '',
					'component'         => 'postem-ipsum-component',
					'recorded_time'     => bp_core_current_time(),
					'hide_sitewide'     => false
				);

				//var_dump($args);

				// Add the activity
				$activity_id = bp_activity_add( $args );

			}


		}
		die();
	}

	public function postem_ipsum_buddy_remove_activities(){
		global $wpdb;

		$result = $wpdb->get_results( "DELETE FROM {$wpdb->prefix}bp_activity WHERE component = 'postem-ipsum-component'" );

		die();
    }

}
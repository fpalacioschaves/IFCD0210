<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e( "Postem Ipsum :: Woocommerce Products", POSTEM_IPSUM_TEXT_DOMAIN ); ?></h1>
        <div class="wrap">
            <form id="postem-ipsum-product-generation" method="post" action="options.php">
				<?php settings_fields( 'postem-ipsum-woo-settings' ); ?>
				<?php do_settings_sections( 'postem-ipsum-woo-settings' ); ?>

                <h2 class="nav-tab-wrapper">
                    <a class="nav-tab nav-tab-active" href="#" data-tab="generic-woo-table"><span class="dashicons dashicons-admin-generic"></span><?php _e( "Woocommerce General Settings", POSTEM_IPSUM_TEXT_DOMAIN ); ?></a>
                    <a class="nav-tab" href="#" data-tab="product-table"><span class="dashicons dashicons-cart"></span><?php _e( "Product Settings", POSTEM_IPSUM_TEXT_DOMAIN ); ?></a>
                    <a class="nav-tab" href="#" data-tab="comments-woo-table"><span class="dashicons  dashicons-testimonial"> </span><?php _e( "Comments Settings", POSTEM_IPSUM_TEXT_DOMAIN ); ?></a>
                    <a class="nav-tab" href="#" data-tab="image-product-table"><span class="dashicons dashicons-format-image"></span><?php _e( "Product Image Settings", POSTEM_IPSUM_TEXT_DOMAIN ); ?></span></a>

                <div class="table_container generic-woo-table">
                    <table class="form-table widefat">
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Select Product Category', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td class="select_product_category">
                                <label><?php _e( "Random", POSTEM_IPSUM_TEXT_DOMAIN ); ?>: </label>
                                <input type="checkbox" name="cat_random" id="cat_random">
								<?php
								wp_dropdown_categories(
									array(
										'hide_empty'   => 0,
										'hierarchical' => 1,
										'taxonomy'     => 'product_cat',
										'class'        => "select_category"
									) );
								?>
                            </td>
                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Select Date', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>

                                <label><?php _e( "From", POSTEM_IPSUM_TEXT_DOMAIN ); ?></label> <input name="postem_ipsum_woo_date_begin" id="postem_ipsum_woo_date_begin" type="text">
                                <label><?php _e( "To", POSTEM_IPSUM_TEXT_DOMAIN ); ?></label> <input name="postem_ipsum_woo_date_end" id="postem_ipsum_woo_date_end" type="text">
                            </td>
                        </tr>


                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'How many products', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td colspan="2">
                                <input type="number" step="1" min="1" name="postem_ipsum_woo_products_number"
                                       id="postem_ipsum_woo_products_number" value="1">
                            </td>
                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Variable or single?', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_woo_product_type" id="postem_ipsum_woo_product_type">
                                    <option value="0"><?php _e( 'Select an option', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="simple"><?php _e( 'Simple', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="variable"><?php _e( 'Variable', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr class="attributer_selection" style="display: none;">
                            <th class="table-header" scope="row"><?php _e( 'Select attribute', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_woo_attribute" id="postem_ipsum_woo_attribute">
									<?php
									global $wpdb;
									$attribute_taxonomies = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_name != '' ORDER BY attribute_name ASC;" );
									set_transient( 'wc_attribute_taxonomies', $attribute_taxonomies );
									$attribute_taxonomies = array_filter( $attribute_taxonomies );
                                    foreach ( $attribute_taxonomies as $attribute ) : ?>
                                        <option value="<?php echo $attribute->attribute_name; ?>"><?php echo $attribute->attribute_label; ?></option>
									<?php endforeach; ?>
                                </select>
                            </td>

                        </tr>


                    </table>
                </div>

                <div class="table_container product-table">
                    <table class="form-table widefat">
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Long description Paragraphs', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" step="1" min="1" max="5"
                                       name="postem_ipsum_woo_product_long_paragraphs"
                                       id="postem_ipsum_woo_product_long_paragraphs" value="1">
                            </td>
                        </tr>
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Long Description Average length', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_woo_product_long_paragraph_length"
                                        id="postem_ipsum_woo_product_long_paragraph_length">
                                    <option value="0"><?php _e( "Select an option", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="short"><?php _e( "Short", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="medium"><?php _e( "Medium", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="long"><?php _e( "Long", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="verylong"><?php _e( "Very Long", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Short description Paragraphs', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" step="1" min="1" max="5"
                                       name="postem_ipsum_woo_product_short_paragraphs"
                                       id="postem_ipsum_woo_product_short_paragraphs" value="1">
                            </td>
                        </tr>
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Short Description Average length', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_woo_product_short_paragraph_length"
                                        id="postem_ipsum_woo_product_short_paragraph_length">
                                    <option value="0"><?php _e( "Select an option", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="short"><?php _e( "Short", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="medium"><?php _e( "Medium", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="long"><?php _e( "Long", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="verylong"><?php _e( "Very Long", POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Set min and max price', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <div id="price_slider"></div>
                            </td>
                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Weight?', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td style="width: 200px !important;">
                                <select name="postem_ipsum_woo_weight" id="postem_ipsum_woo_weight">
                                    <option value="0"><?php _e( 'Select an option', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="yes"><?php _e( 'Yes', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="no"><?php _e( 'No', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>

                            <td class="weight_row" style="display: none;">
                                <div id="weight_slider"></div>
                            </td>

                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Length?', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td style="width: 200px !important;">
                                <select name="postem_ipsum_woo_length" id="postem_ipsum_woo_length">
                                    <option value="0"><?php _e( 'Select an option', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="yes"><?php _e( 'Yes', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="no"><?php _e( 'No', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>

                            <td class="length_row" style="display: none;">
                                <div id="length_slider"></div>
                            </td>

                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Width?', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td style="width: 200px !important;">
                                <select name="postem_ipsum_woo_width" id="postem_ipsum_woo_width">
                                    <option value="0"><?php _e( 'Select an option', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="yes"><?php _e( 'Yes', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="no"><?php _e( 'No', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>

                            <td class="width_row" style="display: none;">
                                <div id="width_slider"></div>
                            </td>
                        </tr>

                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Height?', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td style="width: 200px !important;">
                                <select name="postem_ipsum_woo_height" id="postem_ipsum_woo_height">
                                    <option value="0"><?php _e( 'Select an option', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="yes"><?php _e( 'Yes', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="no"><?php _e( 'No', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>

                            <td class="height_row" style="display: none;">
                                <div id="height_slider"></div>
                            </td>

                        </tr>
                    </table>
                </div>

                <div class="table_container comments-woo-table">
                    <table class="form-table widefat">
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Comments?', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_woo_comments" id="postem_ipsum_woo_comments">
                                    <option value="0"><?php _e( 'Select an option', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="yes"><?php _e( 'Yes', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="no"><?php _e( 'No', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>
                        </tr>

                        <tr class="postem_ipsum_woo_comments_row" style="display: none;">
                            <th class="table-header" scope="row"><?php _e( 'How many comments', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" min="1" step="1" name="postem_ipsum_woo_comments_number"
                                       id="postem_ipsum_woo_comments_number" value="1">
                            </td>
                        </tr>


                    </table>
                </div>

                <div class="table_container image-product-table">
                    <table class="form-table  widefat postem_ipsum_image_table">
                        <tr>
                            <th class="table-header" scope="row"><?php _e( 'Product Image?', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <select name="postem_ipsum_woo_product_image" id="postem_ipsum_woo_product_image">
                                    <option value="0"><?php _e( 'Select an option', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="yes"><?php _e( 'Yes', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                    <option value="no"><?php _e( 'No', POSTEM_IPSUM_TEXT_DOMAIN ); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr class="postem_ipsum_image_color" style="display: none;">
                            <th class="table-header" scope="row"><?php _e( 'Image Color', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td style="height: 0px;">
                                <label style="float: left; margin-top: 5px;"><?php _e( 'Random: ', POSTEM_IPSUM_TEXT_DOMAIN ); ?></label>
                                <input type="checkbox" name="bg_random" id="bg_random"
                                       style="float: left; margin: 5px 10px 0 5px;">
                                <input class="color-field" type="text" name="postem_ipsum_product_image_bg"
                                       id="postem_ipsum_product_image_bg" value="" style="float: left; width: 80%;">
                            </td>
                        </tr>
                        <tr class="postem_ipsum_image_w" style="display: none;">
                            <th class="table-header" scope="row"><?php _e( 'Image Width', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" step="10" min="10" name="postem_ipsum_woo_product_image_w"
                                       id="postem_ipsum_woo_product_image_w" value="300">
                            </td>
                        </tr>
                        <tr class="postem_ipsum_image_h" style="display: none;">
                            <th class="table-header" scope="row"><?php _e( 'Image Height', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
                            <td>
                                <input type="number" step="10" min="10" name="postem_ipsum_woo_product_image_h"
                                       id="postem_ipsum_woo_product_image_h" value="300">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <button class="button button-primary postem-ipsum-generate-products"><?php _e( 'Generate products', POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <button class="button button-primary postem-ipsum-delete-products"><?php _e( 'Delete all products generated with Postem Ipsum', POSTEM_IPSUM_TEXT_DOMAIN ); ?></button>
        <div class="result"></div>


    </div>
</div>
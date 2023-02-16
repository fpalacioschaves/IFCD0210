<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

$image_source = plugin_dir_url( __FILE__ ) . ( "/images/placeholder.png" );


$preview_pieces = array(
	"title"     => "Card Title",
	"image"     => "<img src='$image_source'>",
	"read-more" => "Read More",
	"terms"     => array( "Term 1", "Term 2", "Term 3" )
);

?>
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
        <h1><?php _e( "Easy Filtering :: Card Edition", EASY_FILTERING_TEXT_DOMAIN ); ?></h1>
        <div class="wrap">
            <form id="easy-filtering-card-generation" method="post" action="options.php">

                <input type="hidden" name="easy_filtering_card_id" id="easy_filtering_card_id"
                       value="<?php echo $my_card->card_id; ?>">

                <table class="form-table widefat">
                    <tr>
                        <th scope="row"><?php _e( 'Card Title', EASY_FILTERING_TEXT_DOMAIN ); ?></th>
                        <td>
                            <input type="text" name="easy_filtering_card_title" id="easy_filtering_card_title"
                                   placeholder="Card Title" value="<?php echo $my_card->card_title; ?>">
                        </td>
                    </tr>
                </table>


                <div class="slider table_container">

                    <div class="pieces_container">

                        <h3><?php _e( "Select the card pieces and move to card generator", EASY_FILTERING_TEXT_DOMAIN ); ?></h3>

                        <p>Drag and drop the pieces you want in your card. drop in the card generator zone. If you want,
                            you can reorder it.</p>

						<?php foreach ( $unselected_blocks as $u_block ): ?>

                            <div class="piece" data-type="<?php echo $u_block; ?>">
                                The <?php echo ucfirst( $u_block ); ?></div>

						<?php endforeach; ?>

                    </div>


                    <div id="card-generate">

                        <h3 class="unsortable"><?php _e( "Card generated", EASY_FILTERING_TEXT_DOMAIN ); ?></h3>

						<?php
						if ( ! empty( $selected_blocks ) ):
							foreach ( $selected_blocks as $s_block ): ?>

                                <div class="piece" data-type="<?php echo $s_block; ?>">
                                    The <?php echo ucfirst( $s_block ); ?>
                                </div>

							<?php
							endforeach;
						endif; ?>

                    </div>

                    <div id="card-preview">

						<?php
						if ( ! empty( $selected_blocks ) ):
							foreach ( $selected_blocks as $s_block ):
								switch ( $s_block ) {
									case "terms":
										?>
                                        <div class="preview-piece"
                                             data-type="<?php echo $s_block; ?>">
                                            <div class="card-terms">
												<?php
												foreach ( $preview_pieces[ $s_block ] as $taxonomy ) {
													echo "<span class='tag-block-card'>$taxonomy</span>";
												}
												?>
                                            </div>
                                        </div>
										<?php
										break;
									case "image":
										?>
                                        <div class="preview-piece"
                                             data-type="<?php echo $s_block; ?>"><?php echo $preview_pieces[ $s_block ]; ?></div>
										<?php
										break;
									case "read-more":
										?>

                                        <div class="preview-piece"
                                             data-type="<?php echo $s_block; ?>">
                                            <div class="card-link">Read more</div>
                                        </div>
										<?php
										break;

									case "excerpt":
										?>

                                        <div class="preview-piece"
                                             data-type="<?php echo $s_block; ?>">
                                            <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Rationis enim perfectio est virtus; Quo tandem modo? Eadem nunc mea adversum te oratio est. Vestri haec verecundius, illi fortasse constantius.</p>
                                        </div>
										<?php
										break;
									case "title":
										?>
                                        <div class="preview-piece"
                                             data-type="<?php echo $s_block; ?>"><h3
                                                    class="card-title"><?php echo $preview_pieces[ $s_block ]; ?></h3>
                                        </div>
										<?php
										break;
								}

								?>


							<?php
							endforeach;
						endif; ?>


                    </div>

                </div>


            </form>
        </div>
        <button class="button button-primary easy-filtering-card-edit"><?php _e( "Edit card", EASY_FILTERING_TEXT_DOMAIN ); ?></button>
        <div class="result"></div>
    </div>
</div>
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



foreach ( $json_data as $s_block ):

	switch ( $s_block ) {
		case "terms":

			echo '<div class="preview-piece"';
			echo 'data-type="' . $s_block . '">';
			echo '<div class="card-terms">';
			foreach ( $preview_pieces[ $s_block ] as $taxonomy ) {
				echo "<span class='tag-block-card'>$taxonomy</span>";
			}
			echo '</div>';
			echo '</div>';

			break;
		case "image":

            echo '<div class="preview-piece"';
                 echo 'data-type="'.$s_block.'">'.$preview_pieces[ $s_block ].'</div>';
			break;
		case "read-more":

            echo '<div class="preview-piece"';
                 echo 'data-type="'.$s_block.'">';
                echo '<div class="card-link">Read more</div>';
            echo '</div>';
			break;

		case "excerpt":

			echo '<div class="preview-piece"';
			echo 'data-type="' . $s_block . '">';
            echo '<p class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Rationis enim
                    perfectio est virtus; Quo tandem modo? Eadem nunc mea adversum te oratio est. Vestri haec
                    verecundius, illi fortasse constantius.</p>';
			echo '</div>';
			break;
		case "title":

            echo '<div class="preview-piece"';
			echo 'data-type="' . $s_block . '">';
            echo '<h3 class="card-title">'.$preview_pieces[ $s_block ].'</h3>';
			echo '</div>';

			break;
	}


endforeach;

?>


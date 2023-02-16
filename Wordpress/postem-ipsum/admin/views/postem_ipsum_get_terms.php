<th class="table-header" scope="row"><?php _e( 'Select Term/Category', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
<td>
    <input type="checkbox" name="cat_random" id="cat_random"><?php _e( "Random", POSTEM_IPSUM_TEXT_DOMAIN ); ?><br/>
    <hr>
	<!--<select name="postem_ipsum_term" id="postem_ipsum_term">
		<option value="0" selected>Select a term</option>-->
		<?php foreach ( $postem_ipsum_terms as $term ): ?>

            <input class="checks_terms" type="checkbox" class="postem_ipsum_term" name="postem_ipsum_term[]"
                   value="<?php echo $term->term_id; ?>" /><?php echo $term->name; ?><br/>
			<!--<option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>-->
		<?php endforeach; ?>
	<!--</select>-->
</td>

<th class="table-header" scope="row"><?php _e( 'Select Taxonomy', POSTEM_IPSUM_TEXT_DOMAIN ); ?></th>
<td>

	<select name="postem_ipsum_taxonomy" id="postem_ipsum_taxonomy">
		<option value="0" selected>Select a taxonomy</option>
		<?php foreach ( $postem_ipsum_taxonomies as $taxonomy ): ?>
			<?php // Para posts solo seleccionamos category ?>
			<?php if (  $taxonomy->name != "post_format" ): ?>
				<option value="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->label; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</td>
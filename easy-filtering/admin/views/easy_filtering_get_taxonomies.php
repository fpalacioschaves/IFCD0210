

    <?php foreach ($postem_ipsum_taxonomies as $taxonomy): ?>

        <?php if ($taxonomy->name != "post_format"): ?>

            <input type="checkbox" class="easy_filtering_taxonomy" name="easy_filtering_taxonomy[]" id="<?php echo $taxonomy->name; ?>"
                   value="<?php echo $taxonomy->name; ?>" /><label for="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->label; ?></label>

        <?php endif; ?>

    <?php endforeach; ?>

<?php

$args = array('hide_empty' => false);

$terms = get_terms("pa_$attribute", $args);

?>

<ul class="attribute-list" data-attribute-list="<?php echo $attribute; ?>">

    <h3 class="filter-header"><?php echo ucfirst($attribute);?></h3>

    <ul class="filter-attribute-dropdown" data-attribute-name="<?php echo $attribute; ?>">

        <li class="filter-attribute-dropdown-li" data-attribute-slug='all'
            data-attribute-name='<?php echo $attribute; ?>'
            data-<?php echo $attribute; ?>-slug='all'
            data-reset='true'><?php _e("All", EASY_FILTERING_TEXT_DOMAIN); ?></li>

        <?php foreach ($terms as $term): ?>

            <li class="filter-attribute-dropdown-li" data-attribute-name='<?php echo $attribute; ?>'
                data-attribute-slug='<?php echo $term->slug; ?>'
                data-<?php echo $attribute; ?>='<?php echo $term->term_id; ?>'><?php echo $term->name; ?></li>

        <?php endforeach; ?>
    </ul>

</ul>


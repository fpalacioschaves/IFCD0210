<?php

if(isMobile()){
	$width = 100;
}
else{
	$width = ( (100 - $filter_columns * 2) / $filter_columns );
}


?>

<div class="filter-grid-item" style="width: <?php echo $width;?>%;">

    <div class="card" data-card-type="card-work">

        <div class="card-body">

            <?php foreach ($card_blocks as $block):

                switch ($block) {
                    case "title":
                        ?>
                        <h3 class="card-title">

                            <a href="<?php the_permalink() ?>">

                                <?php echo the_title(); ?>

                            </a>

                        </h3>
                        <?php

                        break;
                    case "excerpt" : ?>
                        <p class="card-description">

                            <?php the_excerpt(); ?>
                        </p>

                        <?php
                        break;
                    case "image": ?>
                        <div class="card-image">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } else { ?>
                                <img src="<?php echo plugin_dir_url(__FILE__) . 'img/no-image.png'; ?>">
                            <?php }
                            ?>
                        </div>
                        <?php
                        break;

                    case "read-more": ?>

                        <div class="card-link"><a class="link" href="<?php the_permalink(); ?>"
                                                  data-link-style="primary 1">Read
                                more</a></div>

                        <?php
                        break;
                    case "terms":
                        $args = array('fields' => 'names');
                        $taxonomies = get_post_taxonomies(get_the_ID());
                        if (!empty($taxonomies)) {

                            ?>
                            <div class="card-terms">
                                <?php
                                foreach ($taxonomies as $taxonomy) {
                                    $terms = wp_get_post_terms(get_the_ID(), $taxonomy, $args);
                                    foreach ($terms as $term):
                                        echo "<span class='tag-block-card'>$term</span>";
                                    endforeach;
                                }
                                ?>
                            </div>
                            <?php

                        }
                        break;
                }

            endforeach;
            ?>


        </div>

    </div>

</div>
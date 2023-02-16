<?php
$args = array('fields' => 'names');
$terms = wp_get_post_terms(get_the_ID(), $filter_taxonomy, $args);
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

            <h3 class="card-title">

                <a href="<?php the_permalink() ?>">

                    <?php echo the_title(); ?>

                </a>

            </h3>

            <p class="card-description">

               <?php the_excerpt(); ?>
            </p>
            <?php
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
            <?php } ?>
            <div class="card-link"><a class="link" href="<?php the_permalink(); ?>" data-link-style="primary 1">Read more</a></div>

        </div>

    </div>

</div>
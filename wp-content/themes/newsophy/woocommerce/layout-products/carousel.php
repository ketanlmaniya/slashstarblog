<?php
$product_item = isset($product_item) ? $product_item : 'inner';
$show_nav = isset($show_nav) ? $show_nav : false;
$show_smalldestop = isset($show_smalldestop) ? $show_smalldestop : false;
$show_pagination = isset($show_pagination) ? $show_pagination : false;
$infinite_scroll = isset($infinite_scroll) ? $infinite_scroll : false;
$rows = isset($rows) ? $rows : 1;
$columns = isset($columns) ? $columns : 3;
$products = isset($products) ? $products : '';

$small_cols = $columns <= 1 ? 1 : 2; 
$slick_top = (!empty($slick_top)) ? $slick_top : '';
?>
<div class="slick-carousel products <?php echo esc_attr($slick_top); ?>" data-carousel="slick" data-items="<?php echo esc_attr($columns); ?>"
    <?php echo trim($columns >= 8 ? 'data-large="6"' : ''); ?> 
    <?php echo trim($columns >= 5 ? 'data-medium="4" data-large="4" ' : ''); ?> 
    <?php echo trim( $columns >= 2 ? 'data-extrasmall="2"' : 'data-extrasmall="1"'); ?> 
    data-smallmedium="<?php echo esc_attr($small_cols); ?>"
    data-pagination="<?php echo esc_attr( $show_pagination ? 'true' : 'false' ); ?>" data-nav="<?php echo esc_attr( $show_nav ? 'true' : 'false' ); ?>" data-rows="<?php echo esc_attr( $rows ); ?>" data-infinite="<?php echo esc_attr( $infinite_scroll ? 'true' : 'false' ); ?>">

    <?php wc_set_loop_prop( 'loop', 0 ); ?>
    <?php while ( $loop->have_posts() ): $loop->the_post(); global $product; ?>
        <div class="product clearfix" <?php wc_product_class( 'product clearfix', $product ); ?>>
            <?php wc_get_template_part( 'item-product/'.$product_item ); ?>
        </div>
    <?php endwhile; ?>
</div>
<?php wp_reset_postdata(); ?>
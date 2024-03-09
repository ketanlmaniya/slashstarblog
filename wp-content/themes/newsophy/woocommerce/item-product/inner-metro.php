<?php 
global $product;
$product_id = $product->get_id();
?>
<div class="product-block grid grid-metro" data-product-id="<?php echo esc_attr($product_id); ?>">
    <div class="grid-inner">
        <?php 
            do_action( 'newsophy_woocommerce_loop_sale_flash' );
        ?>
        <div class="block-inner">
            <figure class="image">
                <?php
                    $image_size = isset($image_size) ? $image_size : 'woocommerce_thumbnail';
                    newsophy_product_image($image_size);
                ?>
                <?php
                    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
                    remove_action('woocommerce_before_shop_loop_item_title', 'newsophy_swap_images', 10);
                    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
                    do_action( 'woocommerce_before_shop_loop_item_title' );
                ?>
            </figure>
            <?php
                if ( class_exists( 'YITH_WCWL' ) ) {
                    echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                }
            ?>   

            <div class="view">
                <?php
                    if ( newsophy_get_config('show_shop_add_to_cart_btn', false) ) {
                        do_action( 'woocommerce_after_shop_loop_item' );
                    }
                ?>     
                <?php if (newsophy_get_config('show_quickview', false)) { ?>                
                    <a href="#" class="quickview" data-product_id="<?php echo esc_attr($product_id); ?>" data-toggle="modal" data-target="#apus-quickview-modal">
                        <span><?php esc_html_e('quick view','newsophy') ?></span>
                        <i class="fa fa-long-arrow-right"></i>
                    </a>                
                <?php } ?>
                <?php if( class_exists( 'YITH_Woocompare_Frontend' ) ) { ?>
                    <?php
                        $obj = new YITH_Woocompare_Frontend();
                        $url = $obj->add_product_url($product_id);
                        $compare_class = '';
                        if ( isset($_COOKIE['yith_woocompare_list']) ) {
                            $compare_ids = json_decode( $_COOKIE['yith_woocompare_list'] );
                            if ( in_array($product_id, $compare_ids) ) {
                                $compare_class = 'added';
                                $url = $obj->view_table_url($product_id);
                            }
                        }
                    ?>
                    <div class="yith-compare">
                        <a title="<?php esc_attr_e('compare','newsophy') ?>" href="<?php echo esc_url( $url ); ?>" class="compare <?php echo esc_attr($compare_class); ?>" data-product_id="<?php echo esc_attr($product_id); ?>">
                            <i class="fa fa-random" aria-hidden="true"></i>
                        </a>
                    </div>
                <?php } ?>
            </div> 

            <?php
                $time_sale = get_post_meta( $product_id, '_sale_price_dates_to', true );
                if ( $time_sale ) { ?>
                    <div class="time-wrapper">
                        <div class="apus-countdown clearfix" data-time="timmer"
                            data-date="<?php echo date('m', $time_sale).'-'.date('d', $time_sale).'-'.date('Y', $time_sale).'-'. date('H', $time_sale) . '-' . date('i', $time_sale) . '-' .  date('s', $time_sale) ; ?>">
                        </div>
                    </div>
                <?php } ?>           
            </div>

        <div class="metas">
            <div class="title-wrapper">
                <div class="clearfix">
                    <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php
                        /**
                        * woocommerce_after_shop_loop_item_title hook
                        *
                        * @hooked woocommerce_template_loop_rating - 5
                        * @hooked woocommerce_template_loop_price - 10
                        */
                        remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);                        
                    ?>    
                </div>
                <div class="product-metro-bottom">
                    <div class="product-rating">
                        <?php
                            $rating_html = wc_get_rating_html( $product->get_average_rating() );
                            if ( $rating_html ) {
                                ?>
                                <div class="rating clearfix">
                                    <?php echo trim( $rating_html ); ?>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                        do_action( 'woocommerce_after_shop_loop_item_title');
                    ?>                       
                </div>                                  
            </div>
        </div>
    </div>
</div>

<?php 
global $product;
$product_id = $product->get_id();
$image_size = isset($image_size) ? $image_size : 'woocommerce_thumbnail';
?>
<div class="product-block product-block-list" data-product-id="<?php echo esc_attr($product_id); ?>">	
	<div class="row flex-middle">
		<div class="col-xs-5 col-sm-3 col-lg-4">	
			<div class="wrapper-image">
				<?php 
			        do_action( 'newsophy_woocommerce_loop_sale_flash' );
			    ?>
				<?php if (newsophy_get_config('show_quickview', false)) { ?>
		            <a href="#" class="quickview" data-product_id="<?php echo esc_attr($product_id); ?>" data-toggle="modal" data-target="#apus-quickview-modal">
						<span><?php esc_html_e('quick view','newsophy') ?></span>
						<i class="fa fa-long-arrow-right"></i>
		            </a>
		        <?php } ?>
			    <figure class="image">
			        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="product-image">
			            <?php
			                /**
			                * woocommerce_before_shop_loop_item_title hook
			                *
			                * @hooked woocommerce_show_product_loop_sale_flash - 10
			                * @hooked woocommerce_template_loop_product_thumbnail - 10
			                */
			                remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
			                do_action( 'woocommerce_before_shop_loop_item_title' );
			            ?>
			        </a>
			        <?php do_action('newsophy_woocommerce_before_shop_loop_item'); ?>
			    </figure>
				<?php newsophy_Woo_Swatches::swatches_list( $image_size ); ?>
			</div> 
		</div>
		<div class="col-xs-7 col-sm-5 col-lg-8">
		    <div class="wrapper-info">
		    	<div class="wrapper-list-intro">
					<div class="top-list-info">				    	
				    	<h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				    	<?php
				            /**
				            * woocommerce_after_shop_loop_item_title hook
				            *
				            * @hooked woocommerce_template_loop_rating - 5
				            * @hooked woocommerce_template_loop_price - 10
				            */
				            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);
				            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10);
				            do_action( 'woocommerce_after_shop_loop_item_title');
				        ?>
			            <div class="rating clearfix">
			                <?php
			                    $rating_html = wc_get_rating_html( $product->get_average_rating() );
			                    $count = $product->get_rating_count();
			                    if ( $rating_html ) {
			                        echo trim( $rating_html );
			                    } else {
			                        echo '<div class="star-rating"></div>';
			                    }
			                    echo '<span class="counts">('.$count.')</span>';
			                ?>
			            </div>
			        </div>
			        <?php 
						do_action('newsophy_list_shipping_info');
						add_action( 'newsophy_list_price', 'woocommerce_template_loop_price', 10 );
						do_action('newsophy_list_price');
					?>
					<div class="product-excerpt">
			           <?php echo newsophy_substring( get_the_excerpt(), 50, '...' ); ?>
			        </div>
			        <div class="left-infor">		        	
						<?php
		                    if ( newsophy_get_config('show_shop_add_to_cart_btn', false) ) {
		                        do_action( 'woocommerce_after_shop_loop_item' );
		                    }
		                ?>
						<?php
				            if ( class_exists( 'YITH_WCWL' ) ) {
				                echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
				            }
				        ?>	                    
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
				                    <?php echo esc_html__('ADD to Compare','newsophy'); ?>
				                </a>
				            </div>
				        <?php } ?>
			        </div>		    		
		    	</div>	    		
			</div>
		</div> 
	</div>
</div>
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version   8.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div id="main-area"> 
  <div class="container"> 
  <div class="category-box">
    <h1><?php woocommerce_page_title(); ?></h1>
  </div>  


  <div class="content-wrapper">
    <div class="content-area">
      <div class="posts-sec <?php if ( get_theme_mod('newsophy_woo_sidebar') && is_active_sidebar('sidebar-4')) : ?>has-sidebar<?php endif; ?>">
      <div class="posts-wrap">
      <?php do_action( 'woocommerce_before_main_content' ); ?>

      <?php if ( have_posts() ) : ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>
        
        <?php if (woocommerce_maybe_show_product_subcategories('')) : ?>
          <div class="woo-product-categories">
             <ul><?php echo woocommerce_maybe_show_product_subcategories(''); ?></ul>
          </div>  
        <?php endif; ?> 
          
          <?php do_action( 'woocommerce_before_shop_loop' );?>

          <?php woocommerce_product_loop_start(); ?>

              <?php while ( have_posts() ) : the_post(); ?>

                <?php wc_get_template_part( 'content', 'product-archive' ); ?>

              <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

          <?php do_action( 'woocommerce_after_shop_loop' ); ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

          <?php do_action( 'woocommerce_no_products_found' ); ?>

        <?php endif; ?>
    </div>    
  </div>
        <?php if ( get_theme_mod('newsophy_woo_sidebar') && is_active_sidebar('sidebar-4')) : ?>
           <aside class="sidebar <?php if (get_theme_mod('newsophy_sticky_sidebar', true)) : ?> sticky<?php endif; ?>">
              <?php if (!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-4')) ?>
           </aside>
        <?php endif; ?>
<?php do_action( 'woocommerce_after_main_content' ); ?>

</div>
</div>
  </div>
</div>
<?php get_footer( 'shop' ); ?> 




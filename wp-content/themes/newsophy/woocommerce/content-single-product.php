<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version   8.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php
  /**
   * woocommerce_before_single_product hook.
   *
   * @hooked wc_print_notices - 10
   */
   do_action( 'woocommerce_before_single_product' );

   if ( post_password_required() ) {
       echo get_the_password_form();
       return;
   }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="product-gallery">
    <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
  </div>
  
  <div class="product-summary">

  <?php wc_print_notices(); ?>
    <div class="summary entry-summary">
      <?php do_action( 'woocommerce_single_product_summary' ); ?>
    </div><!-- .summary -->
  
  </div>

    <div class="shop-single-additional-info">
      <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
    </div>
   
    <div class="related-products">
      <?php woocommerce_output_related_products(); ?>
    </div>

    </div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

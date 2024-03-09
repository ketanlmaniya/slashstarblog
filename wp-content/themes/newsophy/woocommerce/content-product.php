<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version   8.2.2
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
global $product;
// Ensure visibility
if ( ! $product || ! $product->is_visible() )
  return;
$count = $product->get_rating_count();
$classes = array();
?>

<li <?php post_class( $classes ); ?>>
  <div class="product-item">
    <div class="product-image">
      <?php if ( $product->is_on_sale() ) : ?>
        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale"><span class="sale-text">' . esc_html__( 'Sale', 'newsophy' ) . '</span></span>', $post, $product ); ?>
      <?php endif; ?>
      <!-- end sale label -->
      <div class="product-thumb">
        <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
        <?php 
          echo wp_kses($product->get_image('shop_catalog', array('class'=>'primary_image')), array(
            'a'=>array(
              'href'=>array(),
              'title'=>array(),
              'class'=>array(),
            ),
            'img'=>array(
              'src'=>array(),
              'height'=>array(),
              'width'=>array(),
              'class'=>array(),
              'alt'=>array(),
            )
          ));
            $attachment_ids = $product->get_gallery_image_ids();
              if ( $attachment_ids ) {
                echo wp_get_attachment_image( $attachment_ids[0], apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), false, array('class'=>'secondary_image') );
              }
        ?>
        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
      </div>
      <div class="actions">
        <ul >
          <li class="add-to-cart">
            <?php echo do_shortcode('[add_to_cart id="'.$product->get_id().'"]') ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="product-info">
      <div class="product-title">
        <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
        <h6><a class="product-link" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h6>
      </div>
      <!-- end title -->
      <?php if ($count) { ?>
        <div class="star-rating">
          <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
        </div>
      <?php } ?>
      <!-- end rating -->
      <?php if ( $product->get_price() != '' )  { ?>
        <div class="price">
          <?php printf( '%s', $product->get_price_html() ); ?>
        </div>
      <?php } ?>
      <!-- end price -->
    </div>
  </div>
</li>
<?php
$product_item = 'inner-list-small';
?>
<ul class="apus-products-list">
	<?php wc_set_loop_prop( 'loop', 0 ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
		<li <?php wc_product_class( 'product-block widget-product', $product ); ?>>
			<?php wc_get_template_part( 'item-product/'.$product_item ); ?>
		</li>
	<?php endwhile; ?>
</ul>
<?php wp_reset_postdata(); ?>
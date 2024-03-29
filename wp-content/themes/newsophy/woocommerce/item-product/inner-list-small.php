<?php global $product; ?>
<div class="product-block shop-list-small flex-middle">
	<div class="content-left">
		<figure class="image">
			<?php newsophy_product_image('thumbnail'); ?>
		</figure>
	</div>
	<div class="content-body">
		<h3 class="name">
			<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php echo trim( $product->get_title() ); ?></a>
		</h3>
		<span class="price"><?php echo trim($product->get_price_html()); ?></span>
	</div>
</div>
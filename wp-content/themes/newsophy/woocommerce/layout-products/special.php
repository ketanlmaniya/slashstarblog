<?php

wc_set_loop_prop( 'loop', 0 );
wc_set_loop_prop( 'columns', $columns );

$image_size = 'newsophy-special-small';
?>
<div class="products products-grid">
	<div class="row row-products">
		
		<?php $i = 0; while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			if ( $i == 0 || $i == 3 ) {
				$image_size = 'newsophy-metro-small';
				?>
				<div class="col-md-3 col-sm-4 col-xs-6">
				<?php
			} elseif ( $i == 2 || $i == 5 ) {
				$image_size = 'newsophy-metro-large';
				?>
				<div class="col-md-6 col-sm-4 col-xs-6">
				<?php
			} elseif ( $i > 5 ) {
				$image_size = 'newsophy-metro-small';
				?>
				<div class="col-md-3 col-sm-4 col-xs-6">
				<?php
			}
		?>
			<div <?php wc_product_class( '', $product ); ?>>
		 		<?php wc_get_template( 'item-product/inner-metro.php', array( 'image_size' => $image_size ) ); ?>
			</div>
			<?php if ( $i == 1 || $loop->post_count == ($i + 1) || $i == 2 || $i == 4 || $i == 5 || $i > 5 ) { ?>
				</div>
			<?php } ?>

		<?php $i++; endwhile; ?>

	</div>
</div>
<?php wp_reset_postdata(); ?>
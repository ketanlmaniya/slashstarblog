<?php
$product_item = isset($product_item) ? $product_item : 'inner';

wc_set_loop_prop( 'loop', 0 );
wc_set_loop_prop( 'columns', $columns );

    
		switch ($columns) {
    case '1':
      $columns = 'one-fr';
      break;
    case '2':
      $columns = 'two-fr';
      break;
    case '3':
      $columns = 'three-fr';
      break;
    case '4':
      $columns = 'four-fr';
      break;
    case '5':
      $columns = 'five-fr';
      break;
    }
?>

<ul class="products products-grid <?php echo esc_attr($columns) ?>">

		<?php $count = 0; while ( $loop->have_posts() ) : $loop->the_post(); global $product;		?>

			 	<?php wc_get_template_part( 'item-product/'.$product_item ); ?>

		<?php $count++; endwhile; ?>

</ul>
<?php wp_reset_postdata(); ?>
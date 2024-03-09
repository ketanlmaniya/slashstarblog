<?php 

  global $post;
	$orig_post = $post;

		$args = array(
			'post__not_in'     => array($post->ID),
			'posts_per_page'   => 3, // Number of random posts that will be shown.
			'ignore_sticky_posts' => 1,
			'orderby' => 'rand'
		);

		$my_query = new wp_query( $args );
		if( $my_query->have_posts() ) { ?>
    <div class="related-posts">
		<div class="section-title">
			<h4 class="post-box-title">
				<span><?php esc_html_e('You Might Also Like', 'newsophy'); ?></span>
			</h4>
		</div>

			<div class="random-items three-fr">
			<?php while( $my_query->have_posts() ) {
				$my_query->the_post();?>
					<div class="item-related">
						<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
	          <div class="related-image">
						  <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('newsophy-misc'); ?></a>
						</div>
						<?php endif; ?>
						<div class="content-part">
							<?php if(get_theme_mod('newsophy_show_categ', true)) : ?>	
								<div class="categ">
									<?php echo trs_render_categories('no-thumb');?>
								</div>
             <?php endif; ?>
							<h3 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php if (get_theme_mod('newsophy_random_date', true)):?>
					  	<span class="post-meta"><?php the_time( get_option('date_format') ); ?></span>
					  <?php endif; ?>	
						</div>
					</div>
			<?php
			}?>
			</div>
    </div>
		<?php 
	  }
	$post = $orig_post;
	wp_reset_postdata();
?>
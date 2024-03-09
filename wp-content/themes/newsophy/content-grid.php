<?php 
$excerpt_cnt = get_theme_mod('newsophy_excerpt_lenght', '20'); 
$postsec = get_query_var( 'my_var_name' );
?>
<div class="post-item <?php echo esc_attr($postsec) ?>">
	<article <?php if(!has_post_thumbnail()) :?> class="no-image"<?php endif; ?>>
		<?php if(has_post_thumbnail()) : ?>
		<div class="image-part">
			<div class="overlay"></div>
			<?php if(has_post_format('video')) : ?>
        <div class="post-format video-post"><i class="icon-videocam-1"></i></div>
      <?php elseif(has_post_format('audio')) : ?>
        <div class="post-format audio-post"><i class="icon-volume-middle"></i></div>
      <?php endif; ?>  
			<a href="<?php the_permalink() ?>">
	      <?php the_post_thumbnail('newsophy-big-thumb'); ?>
			</a>
		</div>
		<?php endif; ?>
		
				<div class="content-part<?php if (is_sticky() && !is_paged()){printf(' sticky-post', 'newsophy');}?>">
			
			<?php if($args['data']['categ'] == 1) : ?>
			<div class="categ">
				<?php echo trs_render_categories( 'no-thumb' );?>
			</div>
			<?php endif; ?>

			<h3 class="post-title">
			<?php  if ( is_sticky() && !is_paged() ) {
	      printf( '<span class="sticky-post-icon"></span>', 'newsophy' );
	    }?>	
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			
			<?php if($args['data']['excerpt'] == 1) : ?>
				<div class="post-excerpt">	
					<p><?php echo newsophy_excerpt($excerpt_cnt); ?></p>
				</div>
			<?php endif; ?>
			
			<ul class="post-meta">
				<?php if($args['data']['author'] == 1) : ?>
				  <li class="post-author">
					  <?php if($args['data']['avatar'] == 1) : ?>
					  	<?php echo get_avatar( get_the_author_meta( 'ID' ), 25 ); ?>
					  <?php endif; ?>
            <span class="metaby"><?php esc_html_e( 'By ', 'newsophy' ); ?></span><span class="author"><?php the_author_posts_link(); ?></span>
          </li>
				<?php endif; ?>
				<?php if($args['data']['date'] == 1) : ?>
				  <li class="post-date"><?php the_time( get_option('date_format') ); ?></li>
				<?php endif; ?>
				<?php if($args['data']['comments'] == 1) : ?>
					<li class="list-comment">
           <?php  if ( comments_open() || get_comments_number() ) {
              comments_number( esc_html__( '0 comments', 'newsophy' ), esc_html__( '1 Comment', 'newsophy' ), esc_html__( '% Comments', 'newsophy' ) );
           } ?>
          </li>
          <?php endif; ?> 
			</ul>
		</div>
	</article>
</div>	

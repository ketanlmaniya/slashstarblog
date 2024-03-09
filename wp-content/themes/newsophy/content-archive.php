<?php  
$excerpt_cnt = get_theme_mod('newsophy_excerpt_lenght', '20'); 
$postsec = get_query_var( 'my_var_name' );
?>

<div class="post-item <?php echo esc_attr($postsec) ?>">
	<article <?php if(!has_post_thumbnail()) :?> class="no-image"<?php endif; ?>>
		<?php if(has_post_thumbnail()) : ?>
		<div class="image-part">
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
		
		<?php if(get_theme_mod('newsophy_show_categ', true)) : ?>	
			<div class="categ">
				<?php echo trs_render_categories('no-thumb');?>
			</div>
    <?php endif; ?>

			<h3 class="post-title">
			<?php  if ( is_sticky() && !is_paged() ) {
	      printf( '<span class="sticky-post-icon"></span>', 'newsophy' );
	    }?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			
			<?php if (get_theme_mod('newsophy_show_excerpt', true)) : ?>	
			<div class="post-excerpt">	
					<p><?php echo newsophy_excerpt($excerpt_cnt); ?></p>
				</div>
     <?php endif; ?>
			
			<ul class="post-meta">
        <?php if (get_theme_mod('newsophy_show_author', true)) : ?>	
			  <li class="post-author">
          <span class="metaby"><?php esc_html_e( "By ", 'newsophy' ); ?></span><span class="author"><?php the_author_posts_link(); ?></span>
        </li>
        <?php endif; ?>
        <?php if (get_theme_mod('newsophy_show_date', true)) : ?>	
				  <li class="post-date"><?php the_time( get_option('date_format') ); ?></li>
        <?php endif; ?>
         <?php if (get_theme_mod('newsophy_arch_comment')) : ?>	
					<li class="list-comment">
           <?php  if ( comments_open() || get_comments_number() ) {
              comments_number( esc_html__( '0 comments', 'newsophy' ), esc_html__( '1 Comment', 'newsophy' ), esc_html__( '% Comments', 'newsophy' ) );
           } ?>
          </li>
          <?php endif; ?> 
			</ul>
			<?php if (get_theme_mod('newsophy_show_readmore', true)) : ?>
			  <div class="post-readmore">
          <a href="<?php echo get_permalink(); ?>"><?php esc_html_e("Read More", 'newsophy');?></a>
        </div>
      <?php endif; ?>  
		</div>
	</article>
</div>	

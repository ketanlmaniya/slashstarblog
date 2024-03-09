<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if( $paged == 1 ) :
?>
<div class="picked-area<?php if(get_theme_mod('newsophy_use_shadow')) : ?> innershadow<?php endif; ?>">
	<div class="container">
  <?php  if(get_theme_mod('newsophy_picked_title')) : ?>
	<div class="section-title">
	  <h4><?php echo esc_attr(get_theme_mod('newsophy_picked_title')); ?></h4>
	</div>
  <?php endif; ?> 
	<div class="blog-posts three-fr">
	<?php 
	 
	if (!get_theme_mod('newsophy_pick_latest')){
		$post_ids = get_posts(array(
		    'numberposts'  => -1, // get all posts.
		    'meta_query'   => array(
		        array(
	        	  'post_type'	=> 'post',
	            'field'     => 'id',
	            'terms'     => 5,
	            'key'		    => 'newsophy_picked_post',
		          'value'	    => true
	        ),
		    ),
		    'fields' => 'ids', // Only get post IDs
		));
  }
  else{
		$post_ids = get_posts(array(
	    'numberposts'   => 6, // get all posts.
	    'meta_query'    => array(
	        array(
            'post_type'	=> 'post',
						'orderby'   => 'post_date',
						'order'     => 'DESC',
						'key'		    => 'newsophy_pick_latest',
						'value'    	=> true
	        ),
	    ),
	    'fields' => 'ids', // Only get post IDs
		));
	}	


		$args = array( 
						    'ignore_sticky_posts' => 1,
						    'showposts' => 6,
						    'post__in' => $post_ids,
						);

		$feat_query = new WP_Query( $args );

	?>

	<?php 
	  if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post(); 
	?>


	<div class="picked-item post-item">
		<?php if(has_post_thumbnail()) : ?>
		<div class="image-part">
		  <?php if(has_post_format('video')) : ?>
          <div class="post-format video-post"><i class="icon-videocam-1"></i></div>
        <?php elseif(has_post_format('audio')) : ?>
          <div class="post-format audio-post"><i class="icon-volume-middle"></i></div>
      <?php endif; ?>  
			<a href="<?php the_permalink() ?>">
	      <?php the_post_thumbnail('newsophy-mid-thumb'); ?>
			</a>
		</div>
		<?php endif; ?>
		<div class="picked-cont">
			<?php if(get_theme_mod('newsophy_pick_categ', true)) : ?>
	  		<div class="post-categs-box picked-meta">
			  	 <div class="categ"><?php echo trs_render_categories( 'no-thumb' ); ?></div>
			  </div> 
			<?php endif; ?> 
		  <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		  <ul class="post-meta">
	    <?php if(get_theme_mod('newsophy_pick_author', true)) : ?>
	      <li class="post-author">
	        <span class="metaby"><?php esc_html_e( 'By ', 'newsophy' ); ?></span><span class="author"><?php the_author_posts_link(); ?></span>
	      </li>
	    <?php endif; ?>
	    <?php if(get_theme_mod('newsophy_pick_date', true)) : ?>
	      <li class="single-post-date"><?php the_time( get_option('date_format') ); ?></li>
	    <?php endif; ?>
	    	    <?php if(get_theme_mod('newsophy_pick_comments', true)) : ?>
	      <li class="list-comment">
	      	   <?php  if ( comments_open() || get_comments_number() ) {
              comments_number( esc_html__( '0 comments', 'newsophy' ), esc_html__( '1 Comment', 'newsophy' ), esc_html__( '% Comments', 'newsophy' ) );
           } ?>
	      </li>
	    <?php endif; ?>
	    </ul>
    </div>
	</div>	
		
  <?php 
  endwhile;
  wp_reset_postdata();
  endif; ?>
  </div>
</div>
</div>
<?php endif; ?> <!-- #if paged -->
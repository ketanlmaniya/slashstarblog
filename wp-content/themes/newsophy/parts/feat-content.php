<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if( $paged == 1 ) :
$area_style	= get_theme_mod('newsophy_feat_style', 1);
?>

<div class="feat-area style<?php echo esc_attr($area_style) ?>">
  <div class="container">	
	<?php 
		


    if (!get_theme_mod('newsophy_feat_latest')){
			$post_ids = get_posts(array(
			    'numberposts'   => 4, // get all posts.
			    'meta_query'    => array(
			        array(
			        	  'post_type' => 'post',
			            'field'     => 'id',
			            'terms'     => 5,
			            'key'		    => 'newsophy_feat_post',
				          'value'    	=> true
			        ),
			    ),
			    'fields' => 'ids', // Only get post IDs
			));
		}
		else {
			$post_ids = get_posts(array(
		    'numberposts'   => 4, // get all posts.
		    'meta_query'    => array(
		        array(
              'post_type'		 => 'post',
							'orderby'      => 'post_date',
							'order'        => 'DESC',
							'key'		       => 'newsophy_latest_post',
							'value'    	=> true
		        ),
		    ),
		    'fields' => 'ids', // Only get post IDs
		));

		}	

		$args = array( 
						    'ignore_sticky_posts' => 1,
						    'showposts' => 4,
						    'post__in' => $post_ids,
						);
			

		$feat_query = new WP_Query( $args );
?>

	<?php 
  	if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post(); 
	?>

	<div class="feat-item post-item">
		<div class="overlay"></div>
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
		<div class="feat-cont">
			<?php if(get_theme_mod('newsophy_feat_categ', true)) : ?>
	  		<div class="post-categs-box feat-meta">
			  	 <div class="categ"><?php echo trs_render_categories( 'no-thumb' ); ?></div>
			  </div> 
			<?php endif; ?> 
		  <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
	    <ul class="post-meta">
	    <?php if(get_theme_mod('newsophy_feat_author', true)) : ?>
	      <li class="post-author">
	        <span class="metaby"><?php esc_html_e( 'By ', 'newsophy' ); ?></span><span class="author"><?php the_author_posts_link(); ?></span>
	      </li>
	    <?php endif; ?>
	    <?php if(get_theme_mod('newsophy_feat_date', true)) : ?>
	      <li class="single-post-date"><?php the_time( get_option('date_format') ); ?></li>
	    <?php endif; ?>
	    <?php if(get_theme_mod('newsophy_feat_comments', true)) : ?>
	      <li class="list-comment">
	      	   <?php  if ( comments_open() || get_comments_number() ) {
              comments_number( esc_html__( '0 comments', 'newsophy' ), esc_html__( '1 Comment', 'newsophy' ), esc_html__( '% Comments', 'newsophy' ) );
           } ?>
	      </li>
	    <?php endif; ?>  
	    </ul>
    </div>

	</div>	
		
  <?php endwhile; endif; ?>
  </div>
</div>
<?php endif; ?> <!-- #if paged -->
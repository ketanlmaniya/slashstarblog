<?php if(is_single()) : ?>
<?php if(!has_post_format('video') && !has_post_format('audio')) : ?>
  <?php if(has_post_thumbnail()) : ?>
  <div class="single-image">  
    <?php if(get_theme_mod('newsophy_single_img', true)) : ?>
    <div class="single-bg"></div> 
    <?php endif; ?> 
     <div class="container">  
      <?php if(get_theme_mod('newsophy_top_head')) : ?>
        <div class="post-heading"> 
          <?php if(get_theme_mod('newsophy_single_categ', true)) : ?>
          <div class="categ"><?php echo trs_render_single_categories('no-thumb');?></div>
          <?php endif; ?>
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php if(get_theme_mod('newsophy_single_author', true) || get_theme_mod('newsophy_single_date', true) ) : ?>
          <ul class="post-meta">
          <?php if(get_theme_mod('newsophy_single_author', true)) : ?>
            <li class="post-author">
              <?php if(get_theme_mod('newsophy_single_avatar', true)) : ?>
              <?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?>
              <?php endif; ?>
              <span class="metaby"><?php esc_html_e( 'By ', 'newsophy' ); ?></span><span class="author"><?php the_author_posts_link(); ?></span>
            </li>
          <?php endif; ?>
          <?php if(get_theme_mod('newsophy_single_date', true)) : ?>
            <li class="single-post-date"><span><span class="date updated published"><?php the_time( get_option('date_format') ); ?></span></span></li>
          <?php endif; ?>
          </ul>
          <?php endif; ?>
        </div>
      <?php endif; ?> 
      <?php if(get_theme_mod('newsophy_single_img', true)) : ?>
      <div class="image-container">
        <div class="entry-image">
        <?php the_post_thumbnail('newsophy-post'); ?>
          <?php if(get_theme_mod('newsophy_content_share', true)) : ?>
            <?php get_template_part('parts/social-share'); ?>
          <?php endif; ?>
        </div> 
      </div>
     <?php endif; ?> 
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>

<div class="single-content">
  <div class="container">
    <div class="content-area"> 
      <?php if(!get_theme_mod('newsophy_top_head')) : ?>
       <div class="post-heading"> 
        <?php if(get_theme_mod('newsophy_single_categ', true)) : ?>
          <div class="categ"><?php echo trs_render_single_categories('no-thumb');?></div>
        <?php endif; ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php if(get_theme_mod('newsophy_single_author', true) || get_theme_mod('newsophy_single_date', true) ) : ?>
        <ul class="post-meta">
        <?php if(get_theme_mod('newsophy_single_author', true)) : ?>
          <li class="post-author">
            <?php if(get_theme_mod('newsophy_single_avatar', true)) : ?>
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?>
            <?php endif; ?>
            <span class="metaby"><?php esc_html_e( 'By ', 'newsophy' ); ?></span><span class="author"><?php the_author_posts_link(); ?></span>
          </li>
        <?php endif; ?>
        <?php if(get_theme_mod('newsophy_single_date', true)) : ?>
          <li class="single-post-date"><span><span class="date updated published"><?php the_time( get_option('date_format') ); ?></span></span></li>
        <?php endif; ?>
        </ul>
        <?php endif; ?>
      </div>
     <?php endif; ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
   
        <div class="post-content">
          <?php the_content(); ?>
        </div> 

        <?php wp_link_pages(array('before' =>'<div class="pagination-post aligncenter">', 'after'  =>'</div>', 'pagelink' => '<span>%</span>')); ?>
        
        <?php if(get_theme_mod('newsophy_post_tags', true)) : ?>
          <?php if(has_tag()) : ?>
            <div class="post-tags">
              <?php the_tags("",""); ?>
            </div>
          <?php endif; ?> 
        <?php endif; ?> 

        <?php if(get_theme_mod('newsophy_content_share', true)) : ?>
          <?php get_template_part('parts/social-share'); ?>
        <?php endif; ?>

        <?php if(get_theme_mod('newsophy_about_author') == true) : ?>
          <?php get_template_part('parts/about-author'); ?>
        <?php endif; ?>

        <?php if(get_theme_mod('newsophy_single_nav', true)) : ?>
          <?php get_template_part('parts/post-navigation'); ?>
        <?php endif; ?>

        <?php if(get_theme_mod('newsophy_post_comments', true)) : ?>
          <?php comments_template( '', true );  ?>
        <?php endif; ?>

        <?php if(get_theme_mod('newsophy_related_posts', true)) : ?>
          <?php if(is_single()) : ?>
            <?php get_template_part('parts/related-posts'); ?>
          <?php endif; ?>
        <?php endif; ?>
    </article> 
    </div>
    <?php if ( get_theme_mod('newsophy_single_sidebar') && is_active_sidebar('sidebar-4')) : ?>
    <aside class="sidebar <?php if (get_theme_mod('newsophy_sticky_sidebar', true)) : ?> sticky<?php endif; ?>">
        <?php if (!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-4')) ?>
     </aside>
    <?php endif; ?>
  </div>
</div>

<?php endif; ?>
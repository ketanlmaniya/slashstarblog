<?php get_header(); ?>
<div id="main-area">
  <div class="container">  
    <div class="category-box">
      <span><?php esc_html_e( 'Search results for:', 'newsophy' ); ?></span>
      <h1><?php printf( esc_html__( '%s', 'newsophy' ), get_search_query() ); ?></h1>
    </div>
    <div class="content-wrapper">
      <div class="content-area">
        <div class="posts-sec <?php if ( get_theme_mod('newsophy_archive_sidebar') && is_active_sidebar('sidebar-1')) : ?>has-sidebar<?php endif; ?>">
      		 <?php if (have_posts()) : ?>
          <div class="posts-wrap">
             <div class="blog-posts one-fr">
              <?php  while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', 'archive'); ?>
              <?php endwhile; ?>
            </div> 
            <?php else: ?>
              <div class="error-page">
                <h2><?php esc_html_e('Nothing Found', 'newsophy') ?></h2>
                <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'newsophy'); ?></p>
                <?php get_search_form(); ?>
              </div>
            <?php endif; ?> 
            <?php
              the_posts_pagination( array(
                'prev_text'          => '<i class="fa fa-angle-left"></i>',
                'next_text'          => '<i class="fa fa-angle-right"></i>',
                'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
              ) );
            ?>
          </div>
         </div>  
  	    </div>
      </div>
  </div>	
</div>  
<?php get_footer(); ?>

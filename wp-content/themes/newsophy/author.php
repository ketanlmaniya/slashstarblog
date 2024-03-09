<?php $cat_style = get_theme_mod('newsophy_categ_layout', 'two-fr'); ?>
<?php get_header(); ?>
<div id="main-area">
  <div class="container">
    <div class="category-box author">
      <div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></div>
      <h1><?php the_author(); ?></h1>
    </div>     
    <div class="content-wrapper">
      <div class="content-area">
        <div class="posts-sec <?php if ( get_theme_mod('newsophy_archive_sidebar') && is_active_sidebar('sidebar-4')) : ?>has-sidebar<?php endif; ?>">
          <div class="posts-wrap">
            <div class="blog-posts <?php echo esc_attr($cat_style); ?>">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <?php get_template_part('content', 'archive'); ?>
            <?php endwhile; ?>
            </div>  
            <?php
              the_posts_pagination( array(
                'prev_text'          => '<i class="fa fa-angle-left"></i>',
                'next_text'          => '<i class="fa fa-angle-right"></i>',
                'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
              ) );
            ?>  
          </div>
        <?php else : ?>
          <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
          <?php if ( get_theme_mod('newsophy_archive_sidebar') && is_active_sidebar('sidebar-4')) : ?>
           <aside class="sidebar <?php if (get_theme_mod('newsophy_sticky_sidebar', true)) : ?> sticky<?php endif; ?>">
              <?php if (!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-4')) ?>
           </aside>
          <?php endif; ?>
        </div>
      </div> 
    </div>
  </div>
</div> 
<?php get_footer(); ?>
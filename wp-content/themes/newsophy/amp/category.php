<?php
  $category = get_queried_object();
  $cat_id ='category_'.$category->term_id;
  $cat_image = '';
  if (class_exists('ACF')) {
    $cat_image = get_field('category_image', $cat_id);
    $cat_color = get_field('category_color', $cat_id);
  } 
  $cat_style = get_theme_mod('newsophy_categ_layout', 'two-fr');
?>
<?php get_template_part('amp/header'); ?>
<div id="main-area">
  <div class="container">
    <?php if ($cat_image) : ?> 
       <div class="category-box image-box">
        <div class="overlay"></div> 
          <div class="cat-title">
            <?php echo trs_render_singlecat('has-thumb');?>
            <?php echo category_description(); ?>
          </div>
          <img src="<?php echo esc_attr($cat_image ['sizes']['newsophy-post']);?>" alt="">
      </div> 
    <?php else : ?>
      <div class="category-box">
        <?php echo trs_render_singlecat('no-thumb');?>
          <?php echo category_description(); ?>
      </div> 
    <?php endif; ?>

      <div class="content-wrapper">
        <div class="content-area">
          <div class="posts-sec <?php if ( get_theme_mod('newsophy_archive_sidebar') && is_active_sidebar('sidebar-1')) : ?>has-sidebar<?php endif; ?>">
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
<?php if(has_post_thumbnail()) : ?>
  <div class="single-image">  
    <div class="single-bg"></div> 
     <div class="container">  
      <div class="image-container">
        <div class="entry-image">
        <?php the_post_thumbnail('newsophy-post'); ?>
          <?php if(get_theme_mod('newsophy_content_share', true)) : ?>
            <?php get_template_part('parts/social-share'); ?>
          <?php endif; ?>
        </div> 
      </div>
    </div>
  </div>
  <?php endif; ?>

  <div class="single-content">
    <div class="container">
        <div class="content-area"> 
        <div class="post-heading"> 
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </div>
     <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

          <div class="post-content">
            <?php  the_content(); ?>
            <?php if (class_exists('ACF') && get_field('field_newsophy_show_related')==true) {
              get_template_part('parts/random-posts');  
            }; ?>
            <?php 
             if(get_theme_mod('newsophy_page_share')) {
              get_template_part('parts/social-share'); 
             } 
            ?>
          </div> 
   
      </article>
      </div> 
        <?php if ( get_theme_mod('newsophy_page_sidebar') && is_active_sidebar('sidebar-4')) : ?>
         <aside class="sidebar <?php if (get_theme_mod('newsophy_sticky_sidebar', true)) : ?> sticky<?php endif; ?>">
            <?php if (!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-4')) ?>
         </aside>
        <?php endif; ?>
      </div>
   </div>


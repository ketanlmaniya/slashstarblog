<?php get_template_part('amp/header'); ?>

<div id="main-area" <?php if ( get_theme_mod('newsophy_page_sidebar') && is_active_sidebar('sidebar-4')) : ?>class="has-sidebar"<?php endif; ?>>

  <div class="content-wrapper">
    <div class="single-wrapper">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php get_template_part('content', 'page'); ?>
      <?php endwhile; ?>
    <?php endif; ?>
   </div>
  </div>

</div>
<?php get_footer(); ?>
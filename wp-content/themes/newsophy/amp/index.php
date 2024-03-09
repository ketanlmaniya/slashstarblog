<?php get_template_part('amp/header'); ?>

<div id="main-area">

  <?php if(get_theme_mod('newsophy_feat_posts')) : ?>
    <?php get_template_part('parts/feat-content'); ?>
  <?php endif; ?>

  <?php if(get_theme_mod('newsophy_picked')) : ?>
    <?php get_template_part('parts/hand-picked'); ?>
  <?php endif; ?>
    
  <div class="content-wrapper">
    <div class="content-area">
     <?php 
     $home_type = get_theme_mod('newsophy_home_page', 'standard');
       if ($home_type == 'standard') {
       get_template_part('content','home'); 
       }
       else 
      get_template_part('content','blocks'); 
      ?>
    </div>
  </div>  
</div>

<?php get_footer(); ?>
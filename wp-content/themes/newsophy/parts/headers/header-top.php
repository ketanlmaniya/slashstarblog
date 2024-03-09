<header id="header">
	<div class="container">
  	<div id="top-logo">
      <?php if (get_theme_mod('newsophy_site_logo')) : ?>
       <a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php  echo esc_url(get_theme_mod('newsophy_site_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
      <?php else : ?>
       <a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/site-logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
     <?php endif; ?> 
  	</div>
	
  <div class ="top-bar-right">  
    <?php if (get_theme_mod('newsophy_header_social')) : ?>
      <?php get_template_part('parts/social','header'); ?> 
    <?php endif; ?> 
      <?php if (class_exists('WooCommerce')) : ?>
        <div class="wc-shopping-cart">
        <?php $count = WC()->cart->get_cart_contents_count(); ?>
          <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'newsophy' ); ?>"><?php if ( $count >= 0 ) echo '<span class="cart-count">' . $count . '</span>'; ?>
          </a>
        </div>
      <?php endif; ?>

    <?php if (get_theme_mod('newsophy_topbar_search', true)) : ?>
    <div id="top-search">
      <a href="#" class="search"></a>
    </div>
    <?php endif; ?>
    <div id="menu-toggle">
        <a href="#" class="open-menu">
          <span class="bar-1"></span>
          <span class="bar-2"></span>
          <span class="bar-3"></span>
        </a>
    </div>
     <?php if (get_theme_mod('newsophy_cta_text')) : ?>
        <a class="cta-btn" href="<?php echo esc_url(get_theme_mod('newsophy_cta_link')) ?>" title="<?php get_theme_mod('newsophy_cta_text') ?>"><?php echo esc_attr(get_theme_mod('newsophy_cta_text')) ?>
     </a> 
    <?php endif; ?> 
    </div>  
  </div>   
</header>
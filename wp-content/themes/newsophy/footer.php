</div><!-- End Site Wrapper -->
<footer id="footer">
  <div class="container">
	 <?php if(get_theme_mod('newsophy_show_footer_logo', true)) : ?>     
    <?php if (get_theme_mod( 'newsophy_footer_logo' )) : ?>
       <div class="footer-logo">
          <a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url(get_theme_mod('newsophy_footer_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
       </div> 
       <?php else : ?>
       <div class="footer-logo">
          <a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/site-logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
       </div>   
    <?php endif; ?> 
  <?php endif; ?>  

  <?php if (get_theme_mod( 'newsophy_footer_menu' )) : ?>
    <?php 
      wp_nav_menu( array(
      'theme_location' => 'footer-menu',
      'menu_class' => 'footer-menu')); 
    ?>
  <?php endif; ?>  

  <?php if (get_theme_mod('newsophy_footer_social')) : ?>
    <?php get_template_part('parts/social','footer'); ?> 
  <?php endif; ?> 
	
    <?php if(get_theme_mod( 'newsophy_show_copyright', true )) { ?>
      <?php if( !get_theme_mod( 'newsophy_copyright_text' ) ) { ?>
        <div id="footer-copyright">
          <?php esc_html_e( '&copy;', 'newsophy' ); ?><?php echo date(' Y '); ?>
          <?php bloginfo( 'name' ); ?>
          <?php esc_html_e( ' - All Rights Reserved.', 'newsophy' ); ?>
        </div>
      <?php } else { ?>
      <div id="footer-copyright">
    
<?php
    $output = get_theme_mod( 'newsophy_copyright_text', sprintf(
      esc_html__( 'Copyright &copy; [current_year] %1$s | Made by %2$s3Styler%3$s' , 'newsophy' ),
      get_bloginfo( 'name' ),
      '<a href="'. esc_url( 'https://3styler.net' ) . '">',
      '</a>'
    ) );

    $output = str_replace( '[current_year]', date_i18n( 'Y' ), $output );

    echo do_shortcode( wp_kses_post( $output ) );
?>
      </div>
     <?php }} ?>  
  </div>
</footer>

</div><!-- End Site -->


<?php get_template_part( 'parts/mobile-menu' ); ?>



<div class="searchform-overlay">
  <a href="javascript:;" class="btn-close-search"></a>
    <div class="searchform">
      <p><?php echo esc_html_x('Start typing and press Enter to search', 'front-view', 'newsophy')?></p>
      <?php get_search_form(); ?>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
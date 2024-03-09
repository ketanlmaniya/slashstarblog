<?php $menu = newsophy_mobile_menu(); ?>

<?php if ($menu): ?>
	<div id="nav-panel" class="nav-panel">
		<div class="nav-menu-header">
		  <a href="#" class="close-menu"></a>
		</div>
    <div class="mobmenu-wrapper">
    	<?php if (get_theme_mod('newsophy_cta_text')) : ?>
	      <div class="cta-cont">	
		      <a class="cta-btn" href="<?php echo esc_url(get_theme_mod('newsophy_cta_link')) ?>" title="<?php get_theme_mod('newsophy_cta_text') ?>"><?php echo esc_attr(get_theme_mod('newsophy_cta_text')) ?>
		      </a> 
	      </div>		    
      <?php endif; ?> 
	    	<?php echo '<nav class="nav-menu-wrap">'. $menu .'</nav>'; ?>
			  <?php if (get_theme_mod('newsophy_header_social')) : ?>
		      <?php get_template_part('parts/social','header'); ?> 
		    <?php endif; ?> 
	    </div>
  	</div>
<?php endif; ?>
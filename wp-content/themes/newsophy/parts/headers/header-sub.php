<div id="menuheader">
	<div class="container">
    <div id="nav-wrapper">
        <?php
        if (has_nav_menu('main-menu')) :
         wp_nav_menu( array( '
          container' => '', 
          'theme_location' => 'main-menu', 
          'menu_class' => 'topmenu'
         ) ); 
       endif;
       ?>
    </div>
    <?php if( is_active_sidebar('hidden-sidebar') ) { ?>
    <div class="header-icon">
      <div class="hidden-sidebar-button">
        <a href="#" class="open-hidden-sidebar">
          <span class="bar-1"></span>
          <span class="bar-2"></span>
          <span class="bar-3"></span>
        </a>
      </div>
    </div>
  <?php } ?>
  </div>  
</div>
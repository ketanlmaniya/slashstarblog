<?php

/* ------------------------------------------------------------------------ */
/* Define Sidebars */
/* ------------------------------------------------------------------------ */

add_action( 'widgets_init', 'newsophy_fn_widgets_init', 1000 );

function newsophy_fn_widgets_init() {
	if (function_exists('register_sidebar')) {
		$newsophy_option = newsophy_theme_option();
		/* ------------------------------------------------------------------------ */
		/* Main Sidebar
		/* ------------------------------------------------------------------------ */
		register_sidebar(array(
			'name' 			=> 'Home Sidebar 1',
			'id'   			=> 'sidebar-1',
			'description'   => esc_html__('These are widgets for the sidebar.', 'newsophy'),
			'before_widget' => '<div id="%1$s" class="widget-block">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
	}
}

    
?>
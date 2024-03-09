<?php
/**
 * Theme Customizer
 * @author  	 3Styler
 * @copyright  (c) Copyright by 3Styler
 * @link       https://deothemes.com
 * @package 	 Newsophy
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

function newsophy_customize_register( $wp_customize ) {

	// Customize Background Settings
	$wp_customize->get_section('background_image')->title = esc_html__('Background Styles', 'newsophy');
	$wp_customize->get_control('background_color')->section = 'background_image';

	// Remove Custom Header Section
	$wp_customize->remove_section('colors');
}
add_action( 'customize_register', 'newsophy_customize_register' );

// Check if Kirki is installed
if ( class_exists( 'Kirki' ) ) {

	function newsophy_customizer_options() {

		// Selector Vars
		$selectors = array(
			'primary_color'			=>
			 'a,
			  #nav-wrapper .topmenu a:hover,
			  .post-title a:hover,
			  .post-meta .author a:hover,
			  .sticky-post-icon,
        .feat-cont .post-meta a:hover,
        .loadmore-container a::after,
        .item-related a:hover,
        .picked-cont .picked-area h2 a:hover,
        .picked-area .post-meta a:hover',

			'primary_border_color' =>
				'.widget-title::after,
				 #nav-wrapper .topmenu .sub-menu, 
         #nav-wrapper .topmenu .children,
				 .post-content blockquote.wp-block-quote,
				 .categ a::after,
				 .picked-area h4:after,
         .post-box-title:after,
         .post-tags a,
				 input:focus,
				 textarea:focus',

			'primary_background_color' => 
		  	'.nav-links .page-numbers.current, 
			   .post-page-numbers.current,
			   input[type="submit"], 
			   input.button,
			   ul.post-meta li:not(:last-child)::after',

			'border_color' => 
				'input,
				select,
				textarea,
				.pagination a,
				.pagination span,
				.elementor-widget-sidebar .widget,
				.sidebar .widget,
				.entry,
				table>tbody>tr>td,
				table>tbody>tr>th,
				table>tfoot>tr>td,
				table>tfoot>tr>th,
				table>thead>tr>td,
				table>thead>tr>th',

			'headings_color'  =>
				'h1,h2,h3,h4,h5,h6,
				.post-meta .author a,
				.thecomment .comment-text h6.author,
				.item-related h5 a',

			'text_color'  =>
				'body,
				input,
				figcaption,
				.comment-form-cookies-consent label,
				.pagination span,
				.pagination a,
				.search-button,
				.search-form__button,
				.widget-search-button,
				.widget a,
				.footer,
				.footer__nav-menu li a,
				.newsophy-header .nav__dropdown-menu > li > a',
				'post_links_color' => '.single-post__entry-article p a, .single-post__entry-article li:not(.wp-social-link) a',
				'post_meta_color' => '.entry__meta-item, .entry__meta li, .entry__meta a, .comment-date',

				'headings'        => 'h1,h2,h3,h4,h5,h6,
				.post-title,
				.widget_recent_entries ul li a,
				.wp-block-latest-posts__post-title, 
				.wp-block-latest-comments__comment-link',
				
				'base_font'				=> 'body, body p',

		);

		if ( function_exists( 'newsophy_get_typekit_fonts') ) {
			$typekit_fonts = newsophy_get_typekit_fonts();
		}

		$heading_color = '#1D1D1D';
		$text_color = '#555555';
		$meta_color = '#555555';
		$primary_color = '#2c40ff';
		$secondary_color = '#ec1f1f';
		$border_color = '#ebebeb';
		$mobile_menu_dividers_color = '#eaeaea';
		$bg_light = '#FBFBFB';
		$bg_dark = '#242424';

		$bp_xl_up   = '@media (min-width: 1400px)';
		$bp_xl_down = '@media (min-width: 1399px)';
		$bp_lg_up   = '@media (min-width: 1025px)';
		$bp_lg_down = '@media (max-width: 1024px)';

		// Kirki
		Kirki::add_config( 'newsophy_settings_config', array(
			'capability'    => 'edit_theme_options',
			'option_type'   => 'theme_mod',
			'option_name'   => 'newsophy_settings_config'
		) );


		/**
		* SECTIONS / PANELS
		**/

		$priority = 20;
		$uniqid = 1;

		// 1. GENERAL PANEL

		Kirki::add_section( 'newsophy_settings_general', array(
			'title'          => esc_html__( 'General Settings', 'newsophy' ),
			'priority'       => $priority++,
		) );


		// 2. HEADER PANEL
		Kirki::add_panel( 'newsophy_settings_header', array(
			'title'          => esc_html__( 'Header & Logo', 'newsophy' ),
			'priority'       => $priority++,
		) );

				// Default Header
				Kirki::add_section( 'newsophy_settings_default_header', array(
					'title'          => esc_html__( 'Default Header', 'newsophy' ),
					'panel'			 		 => 'newsophy_settings_header',
				) );
				// Primary Menu
				Kirki::add_section( 'newsophy_settings_primary_menu', array(
					'title'          => esc_html__( 'Primary Menu', 'newsophy' ),
					'panel'			 		 => 'newsophy_settings_header',
				) );

		// 3. FEATURED AREA
		Kirki::add_section( 'newsophy_settings_featured', array(
			'title'          => esc_html__( 'Featured Area', 'newsophy' ),
			'priority'       => $priority++,
		) );
		// 4. PICKED AREA
		Kirki::add_section( 'newsophy_settings_picked', array(
			'title'          => esc_html__( 'Picked Area', 'newsophy' ),
			'priority'       => $priority++,
		) );

		// 5. COLORS
		Kirki::add_section( 'newsophy_settings_colors', array(
			'title'          => esc_html__( 'Colors', 'newsophy' ),
			'priority'       => $priority++,
		) );

		// 6. TYPOGRAPHY
		Kirki::add_section( 'newsophy_settings_typography', array(
			'title'          => esc_html__( 'Typography', 'newsophy' ),
			'priority'       => $priority++,
		) );

		// 7. HOME PAGE BLOCKS
		Kirki::add_panel( 'newsophy_settings_blocks', array(
			'title'       => esc_attr__( 'Blocks', 'newsophy' ),
			'priority'    => $priority++,
		) );

		 $blocknum = get_theme_mod('newsophy_blocknum', 5);

			$cnt = 1;
      while ($cnt <= $blocknum) {

				// Block 1
				Kirki::add_section( 'newsophy_settings_blocks_'.$cnt, array(
					'title' => esc_html__( 'Block '.$cnt, 'newsophy' ),
					'panel'	=> 'newsophy_settings_blocks',
				) );

				$cnt++;
		}	
	  
	  // 7. POST ARCHIVE
		Kirki::add_section( 'newsophy_settings_archive', array(
			'title'          => esc_html__( 'Archive Settings', 'newsophy' ),
			'priority'       => $priority++,
		) );

		// 8. SINGLE POST/PAGE
		Kirki::add_panel( 'newsophy_settings_single', array(
			'title'          => esc_html__( 'Single Post & Page', 'newsophy' ),
			'priority'       => $priority++,
		) );

				// Single Post
				Kirki::add_section( 'newsophy_settings_post_single', array(
					'title'          => esc_html__( 'Single Post', 'newsophy' ),
					'panel'			 		 => 'newsophy_settings_single',
				) );
				// Single Page
				Kirki::add_section( 'newsophy_settings_page_single', array(
					'title'          => esc_html__( 'Single Page', 'newsophy' ),
					'panel'			 		 => 'newsophy_settings_single',
				) );

		// 7. BLOG PANEL
		Kirki::add_panel( 'newsophy_settings_blog', array(
			'title'       => esc_html__( 'Blog', 'newsophy' ),
			'priority'    => $priority++,
		) );

				// Post Meta
				Kirki::add_section( 'newsophy_settings_post_meta', array(
					'title'          => esc_html__( 'Post Meta', 'newsophy' ),
					'description'    => esc_html__( 'These options will apply to the default WordPress posts. Customize Elementor widgets post meta via Elementor.', 'newsophy' ),
					'panel'          => 'newsophy_settings_blog',
				) );

				// Single Post
				Kirki::add_section( 'newsophy_settings_single_post', array(
					'title'          => esc_html__( 'Single Post', 'newsophy' ),
					'panel'          => 'newsophy_settings_blog',
				) );

				// Social Share
				Kirki::add_section( 'newsophy_settings_social_share', array(
					'title'          => esc_html__( 'Social Share Buttons', 'newsophy' ),
					'panel'          => 'newsophy_settings_blog',
				) );

				// Read More
				Kirki::add_section( 'newsophy_settings_read_more', array(
					'title'          => esc_html__( 'Read More', 'newsophy' ),
					'panel'          => 'newsophy_settings_blog',
				) );

		// 3. Socials
		Kirki::add_section( 'newsophy_settings_socials', array(
			'title'       => esc_html__( 'Social Links', 'newsophy' ),
			'priority'    => $priority++,
		) );		

		// 3. FOOTER
		Kirki::add_section( 'newsophy_settings_footer', array(
			'title'       => esc_html__( 'Footer', 'newsophy' ),
			'priority'    => $priority++,
		) );		


		// Load classes
		require_once get_template_directory() . '/customize/customizer-classes.php';

		// Load styles
		require_once get_template_directory() . '/customize/kirki-css.php';

		// Load modules
		require_once get_template_directory() . '/customize/modules/general.php';
		require_once get_template_directory() . '/customize/modules/header.php';
		require_once get_template_directory() . '/customize/modules/featured.php';
		require_once get_template_directory() . '/customize/modules/picked.php';
		require_once get_template_directory() . '/customize/modules/layout.php';
		require_once get_template_directory() . '/customize/modules/colors.php';
		require_once get_template_directory() . '/customize/modules/blocks.php';
		require_once get_template_directory() . '/customize/modules/archive.php';
		require_once get_template_directory() . '/customize/modules/single.php';
		require_once get_template_directory() . '/customize/modules/socials.php';
		require_once get_template_directory() . '/customize/modules/typography.php';
		require_once get_template_directory() . '/customize/modules/footer.php';
	}

	newsophy_customizer_options();

} // endif Kirki check


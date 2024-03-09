<?php
/**
 * Customizer Header
 *
 * @package newsophy
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Logo
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'image',
	'settings'    => 'newsophy_site_logo',
	'label'       => esc_html__( 'Upload logo', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'priority'    => 1,
) );	
// Top height
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'newsophy_top_height',
	'label'       => esc_attr__( 'Top bar height', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => 90,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '#header, #header .container',
			'property'    => 'height',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
	'priority'    => 2,
) );
// Logo width
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'newsophy_logo_width',
	'label'       => esc_attr__( 'Header logo width', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => 160,
	'choices'     => array(
		'min'  => '0',
		'max'  => '600',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '#top-logo',
			'property'    => 'width',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
	'priority'    => 2,
) );
// Show search icon
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_topbar_search',
	'label'       => esc_html__( 'Show Search Icon', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => true,
	'priority'    => 4,
) );
// Show social links
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_header_social',
	'label'       => esc_html__( 'Show Social Links', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => false,
	'priority'    => 5,
) );
// Background Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_topbar_color',
	'label'       => esc_html__( 'Background Color', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => '#FFFFFF',
	'output' => array(
		array(
			'element'  => '#header',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'priority'    => 6,
) );
// Links Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_topbar_linkcolor',
	'label'       => esc_html__( 'Links Color', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => '#030b12',
	'output' => array(
		array(
			'element'  => '.header-social-links a, #top-search a.search, .mobile-menu li.menu-item a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'priority'    => 7,
) );
// Links Hover Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_topbar_linkhover',
	'label'       => esc_html__( 'Links Hover Color', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => '#2c40ff',
	'output' => array(
		array(
			'element'  => '.header-social-links a:hover, #top-search a.search:hover, .mobile-menu li a:hover, #menu-toggle a:hover',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'priority'    => 8,
) );
// Heading Label
Kirki::add_field( 'newsophy_settings_config', array(
  'type'        => 'heading',
  'settings'    => 'newsophy_menu_heading_1',
  'label'       => 'CTA Button',
  'section'     => 'newsophy_settings_default_header',
  'priority'    => 9,
) );
// CTA Link
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'text',
	'settings'    => 'newsophy_cta_link',
	'label'       => esc_html__( 'Button Link', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'priority'    => 10,
) );
// CTA text
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'text',
	'settings'    => 'newsophy_cta_text',
	'label'       => esc_html__( 'Button Text', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'priority'    => 11,
) );
// Links Hover Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophycta_cta_bg',
	'label'       => esc_html__( 'Button Color', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => '#ff3562',
	'output' => array(
		array(
			'element'  => '.top-bar-right a.cta-btn, .mobmenu-wrapper a.cta-btn',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'priority'    => 12,
) );
// Show social links
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_header_sticky',
	'label'       => esc_html__( 'Sticky Header', 'newsophy' ),
	'section'     => 'newsophy_settings_default_header',
	'default'     => false,
	'priority'    => 13,
) );


// Menu  height
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'newsophy_settings_header_mobile_height',
	'label'       => esc_attr__( 'Menu Height', 'newsophy' ),
	'section'     => 'newsophy_settings_primary_menu',
	'default'     => 55,
	'choices'     => array(
		'min'  => '30',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '#menuheader .container',
			'property'    => 'height',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
) );
// Background Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_header_color',
	'label'       => esc_html__( 'Background Color', 'newsophy' ),
	'section'     => 'newsophy_settings_primary_menu',
	'default'     => '#FFFFFF',
	'output' => array(
		array(
			'element'  => '#menuheader',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );
// Links Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_topmenu_linkcolor',
	'label'       => esc_html__( 'Links Color', 'newsophy' ),
	'section'     => 'newsophy_settings_primary_menu',
	'default'     => '#1a1f28',
	'output' => array(
		array(
			'element'  => 'li.menu-item a, .hidden-sidebar-button a.open-hidden-sidebar, .cart-contents::before',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Links Hover Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_topmenu_linkhover',
	'label'       => esc_html__( 'Links Hover Color', 'newsophy' ),
	'section'     => 'newsophy_settings_primary_menu',
	'default'     => 'var(--accent)',
	'output' => array(
		array(
			'element'  => 'li.menu-item a:hover, #menuheader #nav-wrapper .topmenu .current-menu-item a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Border Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_menuborder_color',
	'label'       => esc_html__( 'Bottom Border Color', 'newsophy' ),
	'section'     => 'newsophy_settings_primary_menu',
	'default'     => '#f4f6fa',
	'output' => array(
		array(
			'element'  => '#menuheader',
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
) );


<?php
/**
 * Customizer General
 *
 * @package newsophy
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// SLayout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'radio',
	'settings'    => 'newsophy_home_page',
	'label'       => esc_attr__( 'Home Page', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => 'standard',
	'choices'     => array(
		'standard'    => esc_html__('Standard','newsophy'),
    'blocks'    => esc_html__('Blocks','newsophy'),
   ),
) );

// Post Number
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'number',
	'settings'    => 'newsophy_blocknum',
	'label'       => esc_html__( 'Blocks Number', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	 'default'  => 5,
		'choices'  => [
			'min'  => 1,
			'max'  => 20,
			'step' => 1,
		],
) );

// Widgets Number
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'number',
	'settings'    => 'newsophy_sidenum',
	'label'       => esc_html__( 'Home Sidebars Number', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	 'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 20,
			'step' => 1,
		],
) );

// Boxed Layout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_boxed',
	'label'       => esc_html__( 'Boxed Layout', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => false,
	'priority'    => $priority++,
) );

// Logo
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'image',
	'settings'    => 'newsophy_bg_image',
	'label'       => esc_html__( 'Site Background Image', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'priority'    => $priority++,
) );

// Border Radius
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'newsophy_image_border',
	'label'       => esc_attr__( 'Image Border Radius', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => 0,
	'choices'     => array(
		'min'  => '0',
		'max'  => '50',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.site-wrapper img',
			'property'    => 'border-radius',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
	'priority'    => $priority++,
) );

// Border Radius
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'newsophy_ani_speed',
	'label'       => esc_attr__( 'Image Animation Speed', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => 5,
	'choices'     => array(
		'min'  => '1',
		'max'  => '20',
		'step' => '1',
	),
	'priority'    => $priority++,
) );

Kirki::add_field( 'newsophy_settings_config', array(
  'type'        => 'heading',
  'settings'    => 'newsophy_sidebars',
  'label'       => 'Sidebars',
  'section'     => 'newsophy_settings_general',
  'priority'    => $priority++,
) );
// Single Post Sidebar
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_single_sidebar',
	'label'       => esc_html__( 'Single Post Sidebar', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => true,
	'priority'    => $priority++,
) );
// Archive and Category Sidebar
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_archive_sidebar',
	'label'       => esc_html__( 'Archive and Category Sidebar', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => true,
	'priority'    => $priority++,
) );
// Page Sidebar
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_page_sidebar',
	'label'       => esc_html__( 'Page Sidebar', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => false,
	'priority'    => $priority++,
) );
// WooCommerce Page Sidebar
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_woo_sidebar',
	'label'       => esc_html__( 'WooCommerce Page Sidebar', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => false,
	'priority'    => $priority++,
) );
// WooCommerce Page Sidebar
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_sticky_sidebar',
	'label'       => esc_html__( 'Sticky Sidebars', 'newsophy' ),
	'section'     => 'newsophy_settings_general',
	'default'     => true,
	'priority'    => $priority++,
) );
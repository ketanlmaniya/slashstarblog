<?php
/**
 * Customizer Layout
 *
 * @package Newsophy
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Enable Area
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_picked',
	'label'       => esc_html__( 'Enable Picked Area', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'priority'    => 1,
	'default'     => false,
	'priority'    => $priority++,
) );
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_pick_latest',
	'label'       => esc_html__( 'Display Latest Posts', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'default'     => false,
	'priority'    => $priority++,
) );
// Title
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'text',
	'settings'    => 'newsophy_picked_title',
	'label'       => esc_html__( 'Block Title', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'priority'    => 2,
) );
// Show Categories
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_pick_categ',
	'label'       => esc_html__( 'Show Categories', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Author
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_pick_author',
	'label'       => esc_html__( 'Show Author', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Date
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_pick_date',
	'label'       => esc_html__( 'Show Date', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Comments
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_pick_comments',
	'label'       => esc_html__( 'Show Comments', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'default'     => true,
	'priority'    => $priority++,
) );
// Disable Posts from Timeline
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_pick_exclude',
	'label'       => esc_html__( 'Disable Picked from Timeline', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'default'     => true,
	'priority'    => $priority++,
) );
// Disable Posts from Timeline
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_use_shadow',
	'label'       => esc_html__( 'Use Shadow', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'default'     => true,
	'priority'    => $priority++,
) );
// Header Label
Kirki::add_field( 'newsophy_settings_config', array(
  'type'        => 'heading',
  'settings'    => 'newsophy_pick_heading_1',
  'label'       => 'Background and Colors',
  'section'     => 'newsophy_settings_picked',
  'priority'    => $priority++,
) );
// Background Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_pick_bg',
	'label'       => esc_html__( 'Background Color', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'priority'    => $priority++,
	'default'     => '#e9ebf3',
	'output' => array(
		array(
			'element'  => '.picked-area',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );
// Headings Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_pick_heading',
	'label'       => esc_html__( 'Headings Color', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'priority'    => $priority++,
	'default'     => '#030b12',
	'output' => array(
		array(
			'element'  => '.picked-area h2 a, .picked-area .post-meta .post-author .author a, .picked-area .section-title h4',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Headings Hover Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_pick_heading_hover',
	'label'       => esc_html__( 'Headings Hover Color', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'priority'    => $priority++,
	'default'     => '#2c40ff',
	'output' => array(
		array(
			'element'  => '.picked-area h2 a:hover, .post-meta .post-author .author a:hover',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Text Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_pick_text',
	'label'       => esc_html__( 'Text Color', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'priority'    => $priority++,
	'default'     => 'var(--main)',
	'output' => array(
		array(
			'element'  => '.picked-area .categ a, .picked-area .post-meta li',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Shadow Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_picked_border_color',
	'label'       => esc_html__( 'Border Color', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'priority'    => $priority++,
	'default'     => '#cfe0e9',
	'output' => array(
	array(
		'element'  => '.picked-area .section-title h4',
		'property' => 'border-color',
	  ),
	),
	'transport' => 'auto',
) );
// Shadow Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_shadow_color',
	'label'       => esc_html__( 'Shadow Color', 'newsophy' ),
	'section'     => 'newsophy_settings_picked',
	'priority'    => $priority++,
	'default'     => '#1b2b34',
	'transport' => 'auto',
) );
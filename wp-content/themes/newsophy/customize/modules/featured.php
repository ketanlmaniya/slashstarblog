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
	'settings'    => 'newsophy_feat_posts',
	'label'       => esc_html__( 'Enable Featured Area', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'priority'    => $priority++,
	'default'     => false,
) );
// Show Author
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_feat_latest',
	'label'       => esc_html__( 'Show Latest Posts', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'default'     => false,
	'priority'    => $priority++,
) );
// Style
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'newsophy_feat_style',
	'label'       => esc_html__( 'Layout Type', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'priority'    => $priority++,
	'default'     => '1',
	'choices'     => array(
		'1'  => get_template_directory_uri() . '/customize/assets/img/feat/feat-1.png',
		'2'  => get_template_directory_uri() . '/customize/assets/img/feat/feat-2.png',
		'3'  => get_template_directory_uri() . '/customize/assets/img/feat/feat-3.png',
	),
) );
// Show Categories
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_feat_categ',
	'label'       => esc_html__( 'Show Categories', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Author
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_feat_author',
	'label'       => esc_html__( 'Show Author', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Date
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_feat_date',
	'label'       => esc_html__( 'Show Date', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Comments
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_feat_comments',
	'label'       => esc_html__( 'Show Comments', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'default'     => true,
	'priority'    => $priority++,
) );
// Disable Posts from Timeline
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_feat_exclude',
	'label'       => esc_html__( 'Disable Featured Posts from Timeline', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'default'     => true,
	'priority'    => $priority++,
) );
// Header Label
Kirki::add_field( 'newsophy_settings_config', array(
  'type'        => 'heading',
  'settings'    => 'newsophy_feat_heading_1',
  'label'       => 'Background and Colors',
  'section'     => 'newsophy_settings_featured',
  'priority'    => $priority++,
) );
// Background Image
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'image',
	'settings'    => 'newsophy_feat_bg_img',
	'label'       => esc_html__( 'Upload Background Image', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'priority'    => $priority++,
) );

// Background Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_feat_bg',
	'label'       => esc_html__( 'Background Color', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'priority'    => $priority++,
	'default'     => '#f1f3f8',
	'output' => array(
		array(
			'element'  => '.feat-area',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );
// Headings Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_feat_heading',
	'label'       => esc_html__( 'Headings Color', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'priority'    => $priority++,
	'default'     => '#030b12',
	'output' => array(
		array(
			'element'  => '.feat-area h2 a, .feat-area .post-meta .post-author .author a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Headings Hover Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_feat_heading_hover',
	'label'       => esc_html__( 'Headings Hover Color', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'priority'    => $priority++,
	'default'     => '#2c40ff',
	'output' => array(
		array(
			'element'  => '.feat-area h2 a:hover, .feat-area .post-meta .post-author .author a:hover',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Text Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_feat_text',
	'label'       => esc_html__( 'Text Color', 'newsophy' ),
	'section'     => 'newsophy_settings_featured',
	'priority'    => $priority++,
	'default'     => 'var(--main)',
	'output' => array(
		array(
			'element'  => '.feat-area .categ a, .feat-area .post-meta li ',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
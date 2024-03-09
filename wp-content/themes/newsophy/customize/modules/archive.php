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
// SLayout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'radio',
	'settings'    => 'newsophy_categ_layout',
	'label'       => esc_attr__( 'Category and Archive Layout', 'newsophy' ),
	'section'     => 'newsophy_settings_archive',
	'default'     => 'one-fr',
	'choices'     => array(
		'one-fr'    => esc_html__('List Layout','newsophy'),
    'two-fr'    => esc_html__('Grid 2 Columns','newsophy'),
    'three-fr'  => esc_html__('Grid 3 Columns','newsophy'),
    'four-fr'   => esc_html__('Grid 4 Columns','newsophy'),
   ),
) );
// Show category
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_show_categ',
	'label'       => esc_html__( 'Show Categories', 'newsophy' ),
	'section'     => 'newsophy_settings_archive',
	'default'     => true,
) );
// Show Date
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_show_author',
	'label'       => esc_html__( 'Show Author', 'newsophy' ),
	'section'     => 'newsophy_settings_archive',
	'default'     => true,
) );
// Show Date
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_show_date',
	'label'       => esc_html__( 'Show Date', 'newsophy' ),
	'section'     => 'newsophy_settings_archive',
	'default'     => true,
) );
// Show Comments
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_show_readmore',
	'label'       => esc_html__( 'Show Readmore', 'newsophy' ),
	'section'     => 'newsophy_settings_archive',
	'default'     => false,
) );
// Show Excerpt
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_arch_comment',
	'label'       => esc_html__( 'Show Comments', 'newsophy' ),
	'section'     => 'newsophy_settings_archive',
	'default'     => true,
) );
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'newsophy_excerpt_lenght',
	'label'       => esc_attr__( 'Exerpt Length(words)', 'newsophy' ),
	'section'     => 'newsophy_settings_archive',
	'default'     => 20,
		'choices'     => [
			'min'  => 5,
			'max'  => 80,
			'step' => 1,
		],
) );
// Show Readmore
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_show_readmore',
	'label'       => esc_html__( 'Show Readmore', 'newsophy' ),
	'section'     => 'newsophy_settings_archive',
	'default'     => true,
) );





<?php
/**
 * Customizer Layout
 *
 * @package newsophy
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Content layout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'number',
	'settings'    => 'newsophy_settings_content_layout_container_width',
	'label'       => esc_html__( 'Container Width (px)', 'newsophy' ),
	'section'     => 'newsophy_settings_content_layout',
	'default'     => 1260,
	'choices'     => array(
		'min'  => '400',
		'max'  => '1920',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.container',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_xl_up,
		),
	),
	'transport' => 'auto',
) );


// Blog layout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'newsophy_settings_blog_layout_type',
	'label'       => esc_html__( 'Blog layout type', 'newsophy' ),
	'section'     => 'newsophy_settings_blog_layout',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Single post layout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'newsophy_settings_single_post_layout_type',
	'label'       => esc_html__( 'Single post layout type', 'newsophy' ),
	'section'     => 'newsophy_settings_blog_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Blog columns
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'select',
	'settings'    => 'newsophy_settings_blog_columns',
	'label'       => esc_html__( 'Columns', 'newsophy' ),
	'description' => esc_html__( 'Use this option for regular blog pages, such as homepage', 'newsophy' ),
	'section'     => 'newsophy_settings_blog_layout',
	'default'     => 'col-lg-12',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'newsophy' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'newsophy' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'newsophy' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'newsophy' ),
	),
) );

// Page Layout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'newsophy_settings_page_layout_type',
	'label'       => esc_html__( 'Layout type', 'newsophy' ),
	'section'     => 'newsophy_settings_page_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives Layout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'newsophy_settings_archive_layout_type',
	'label'       => esc_html__( 'Layout type', 'newsophy' ),
	'section'     => 'newsophy_settings_archive_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives columns
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'select',
	'settings'    => 'newsophy_settings_archive_columns',
	'label'       => esc_html__( 'Columns', 'newsophy' ),
	'section'     => 'newsophy_settings_archive_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'newsophy' ),
		'col-lg-6'  => esc_attr__( '2 Columns', 'newsophy' ),
		'col-lg-4'  => esc_attr__( '3 Columns', 'newsophy' ),
		'col-lg-3'  => esc_attr__( '4 Columns', 'newsophy' ),
	),
) );


// Search Layout
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'newsophy_settings_search_results_layout_type',
	'label'       => esc_html__( 'Layout type', 'newsophy' ),
	'section'     => 'newsophy_settings_search_results_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Search columns
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'select',
	'settings'    => 'newsophy_settings_search_results_columns',
	'label'       => esc_html__( 'Columns', 'newsophy' ),
	'section'     => 'newsophy_settings_search_results_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'newsophy' ),
		'col-lg-6'  => esc_attr__( '2 Columns', 'newsophy' ),
		'col-lg-4'  => esc_attr__( '3 Columns', 'newsophy' ),
		'col-lg-3'  => esc_attr__( '4 Columns', 'newsophy' ),
	),
) );
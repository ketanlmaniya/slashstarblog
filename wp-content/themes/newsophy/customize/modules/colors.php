<?php
/**
 * Customizer Colors
 *
 * @package Newsophy
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* General Colors
/*-------------------------------------------------------*/


// Background color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_site_bg',
	'label'       => esc_html__( 'Site Background', 'newsophy' ),
	'section'     => 'newsophy_settings_colors',
	'default'     => '#fff',
	'output' => array(
		array(
			'element'  => 'body, #hidden-sidebar .widgets-side',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );


// Primary color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_settings_primary_color',
	'label'       => esc_html__( 'Accent', 'newsophy' ),
	'section'     => 'newsophy_settings_colors',
	'default'     => '#2c40ff',
	'output' => array(
		array(
			'element'  => $selectors['primary_color'],
			'property' => 'color',
		),
		array(
			'element'  => $selectors['primary_background_color'],
			'property' => 'background-color',
		),
		array(
			'element'  => $selectors['primary_border_color'],
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
) );

// Headings colors
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_settings_headings_color',
	'label'       => esc_html__( 'Headings', 'newsophy' ),
	'section'     => 'newsophy_settings_colors',
	'default'     => '#1a1f28',
	'output' => array(
		array(
			'element'  => $selectors['headings_color'],
			'property' => 'color',
		),
		array(
			'element'  => isset( $selectors['shop_headings_color'] ) ? $selectors['shop_headings_color'] : null,
			'property' => 'color',
		),
		array(
			'element'  => '.nav__icon-toggle-bar',
			'property' => 'background-color',
		),
		array(
			'element' => '.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h2.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h3.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h4.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h5.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
			'property' => 'color',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
) );

// Text color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_settings_text_color',
	'label'       => esc_html__( 'Text', 'newsophy' ),
	'section'     => 'newsophy_settings_colors',
	'default'     => '#717582',
	'output' => array(
		array(
			'element'  => $selectors['text_color'],
			'property' => 'color',
		),
		array(
			'element'  => isset( $selectors['shop_text_color'] ) ? $selectors['shop_text_color'] : null,
			'property' => 'color',
		),
		array(
			'element'  => 'input::-webkit-input-placeholder',
			'property' => 'color',
			'context' => array( 'front' ),
		),
		array(
			'element'  => 'input:-moz-placeholder, input::-moz-placeholder',
			'property' => 'color',
			'context' => array( 'front' ),
		),
		array(
			'element'  => 'input:-ms-input-placeholder',
			'property' => 'color',
			'context' => array( 'front' ),
		),
		array(
			'element' => '.edit-post-visual-editor .editor-styles-wrapper',
			'property' => 'color',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
) );


// Borders color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_settings_borders_color',
	'label'       => esc_html__( 'Borders', 'newsophy' ),
	'section'     => 'newsophy_settings_colors',
	'default'     => $border_color,
	'output' => array(
		array(
			'element' => $selectors['border_color'],
			'property' => 'border-color',
		),
		array(
			'element'  => isset( $selectors['shop_border_color'] ) ? $selectors['shop_border_color'] : null,
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
) );
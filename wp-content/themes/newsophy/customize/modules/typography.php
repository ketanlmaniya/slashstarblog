<?php
/**
 * Customizer Typography
 *
 * @package Newsophy
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Add custom choice
 */
if ( ! function_exists( 'newsophy_add_custom_choice' ) ) {
	function newsophy_add_custom_choice() {
		return array(
			'fonts' => apply_filters( 'newsophy_kirki_font_choices', array() ),
			'variant' => array( 'regular', 'italic' )
		);
	}
}

// Header Label
Kirki::add_field( 'newsophy_settings_config', array(
  'type'        => 'heading',
  'settings'    => 'newsophy_font_heading_1',
  'label'       => 'Base Font',
  'section'     => 'newsophy_settings_typography',
  'priority'    => 1,
) );

// Base font
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'newsophy_settings_base_font',
	'section'     => 'newsophy_settings_typography',
	'priority'    => 2,
	'default'     => array(
		'font-family'    => '',
		'font-size'      => '15px',
		'line-height'    => '1.6em',
		'letter-spacing' => '',
		'variant' => 'regular',
	),
	'choices'  => newsophy_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['base_font'],
		),
		array(
			'element' => '.edit-post-visual-editor .editor-styles-wrapper',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

/*-------------------------------------------------------*/
/* Headings font
/*-------------------------------------------------------*/

// Header Label
Kirki::add_field( 'newsophy_settings_config', array(
  'type'        => 'heading',
  'settings'    => 'newsophy_font_heading_2',
  'label'       => 'Headings Font',
  'section'     => 'newsophy_settings_typography',
  'priority'    => 3,
) );

// Headings
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'newsophy_settings_headings_font',
	'section'     => 'newsophy_settings_typography',
	'priority'    => 4,
	'default'     => array(
	'font-family' => '',
	'font-weight' 	 => '',
	'letter-spacing' => '',
	'text-transform' => '',
	'variant' => 'regular',
	),
	'choices'  => newsophy_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['headings'],
		),
		array(
			'element' => '.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor h2.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h3.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h4.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h5.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

/*-------------------------------------------------------*/
/* Header
/*-------------------------------------------------------*/

// Header Label
Kirki::add_field( 'newsophy_settings_config', array(
  'type'        => 'heading',
  'settings'    => 'newsophy_font_heading_3',
  'label'       => 'Top Menu Font',
  'section'     => 'newsophy_settings_typography',
  'priority'    => 5,
) );

// Menu Links typography
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'newsophy_settings_menu_links_typography',
	'section'     => 'newsophy_settings_typography',
	'default'     => array(
		'font-family'    => '',
		'font-size'      => '12px',
		'letter-spacing' => '',
		'variant' => '',
	),
	'choices'  => newsophy_add_custom_choice(),
	'output' => array(
		array(
			'element' => '#menuheader #nav-wrapper .topmenu a',
		),
	),
	'transport' => 'auto',
));
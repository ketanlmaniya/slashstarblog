<?php
/**
 * Customizer Colors
 *
 * @package newsophy
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* General Colors
/*-------------------------------------------------------*/

// Logo
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'image',
	'settings'    => 'newsophy_footer_logo',
	'label'       => esc_html__( 'Upload logo', 'newsophy' ),
	'section'     => 'newsophy_settings_footer',
) );
// Show logo
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_show_footer_logo',
	'label'       => esc_html__( 'Show Footer Logo', 'newsophy' ),
	'section'     => 'newsophy_settings_footer',
	'default'     => false,
) );
// Show Socials
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_footer_social',
	'label'       => esc_html__( 'Show Footer Socials', 'newsophy' ),
	'section'     => 'newsophy_settings_footer',
	'default'     => true,
) );
// Show Menu
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_footer_menu',
	'label'       => esc_html__( 'Show Footer Menu', 'newsophy' ),
	'section'     => 'newsophy_settings_footer',
	'default'     => true,
) );
// Background Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_footer_bg',
	'label'       => esc_html__( 'Footer Background Color', 'newsophy' ),
	'section'     => 'newsophy_settings_footer',
	'default'     => '#fff',
	'output' => array(
		array(
			'element'  => '#footer',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );
// Text Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_footer_text',
	'label'       => esc_html__( 'Footer Text Color', 'newsophy' ),
	'section'     => 'newsophy_settings_footer',
	'default'     => '#717582',
	'output' => array(
		array(
			'element'  => '#footer, #footer-copyright',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Links Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_footer_links',
	'label'       => esc_html__( 'Footer Links Color', 'newsophy' ),
	'section'     => 'newsophy_settings_footer',
	'default'     => '#1a1f28',
	'output' => array(
		array(
			'element'  => '#footer a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Links Hover Color
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'color',
	'settings'    => 'newsophy_footer_hover',
	'label'       => esc_html__( 'Links Hover Color', 'newsophy' ),
	'section'     => 'newsophy_settings_footer',
	'default'     => '#2c40ff',
	'output' => array(
		array(
			'element'  => '#footer a:hover',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Bottom footer text
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'textarea',
	'settings'    => 'newsophy_copyright_text',
	'section'     => 'newsophy_settings_footer',
	'label'       => esc_html__( 'Bottom footer text', 'newsophy' ),
	'description' => esc_html__( 'Allowed HTML: a, span, i, em, strong', 'newsophy' ),
	'sanitize_callback' => 'wp_kses_post',
	'default'     => sprintf( esc_html__( 'Copyright &copy; [current_year] %1$s | Made by %2$s3styler%3$s' , 'newsophy' ), get_bloginfo( 'name' ), '<a href="'. esc_url( 'www://3styler.in' ) .'">', '</a>' ),
	'active_callback' => array(
		array(
			'setting'  => 'newsophy_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


<?php
/**
 * Customizer Socials
 *
 * @package newsophy
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*-------------------------------------------------------*/
/* Socials
/*-------------------------------------------------------*/

// Socials
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_facebook',
	'label'       => esc_html__( 'Facebook', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_twitter',
	'label'       => esc_html__( 'Twitter', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_instagram',
	'label'       => esc_html__( 'Instagram', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_youtube',
	'label'       => esc_html__( 'Youtube', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_vimeo',
	'label'       => esc_html__( 'Vimeo', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_pinterest',
	'label'       => esc_html__( 'Pinterest', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_whatsapp',
	'label'       => esc_html__( 'Whatsapp', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_snapchat',
	'label'       => esc_html__( 'Snapchat', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );	

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_tiktok',
	'label'       => esc_html__( 'TikTok', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );	

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_mastodon',
	'label'       => esc_html__( 'Mastodon', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );	

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_linkedin',
	'label'       => esc_html__( 'Linkedin', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_tumblr',
	'label'       => esc_html__( 'Tumblr', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_reddit',
	'label'       => esc_html__( 'Reddit', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_behance',
	'label'       => esc_html__( 'Behance', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_vko',
	'label'       => esc_html__( 'VKontakte', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'url',
	'settings'    => 'newsophy_rss',
	'label'       => esc_html__( 'RSS', 'newsophy' ),
	'section'     => 'newsophy_settings_socials',
) );

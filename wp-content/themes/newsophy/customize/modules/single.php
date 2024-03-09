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

// Heading
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_top_head',
	'label'       => esc_html__( 'Heading above the image', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => false,
	'priority'    => $priority++,
) );
// Image
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_single_img',
	'label'       => esc_html__( 'Show Featured Image', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show category
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_single_categ',
	'label'       => esc_html__( 'Show Categories', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show author
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_single_author',
	'label'       => esc_html__( 'Show Author', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show avatar
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_single_avatar',
	'label'       => esc_html__( 'Show Author Avatar', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show date
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_single_date',
	'label'       => esc_html__( 'Show Date', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show tags
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_post_tags',
	'label'       => esc_html__( 'Show Tags', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show tags
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_content_share',
	'label'       => esc_html__( 'Show Social Share', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show about author
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_about_author',
	'label'       => esc_html__( 'Show About Author Box', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Post Nav
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_single_nav',
	'label'       => esc_html__( 'Show Prev/Next Navigation', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Comments
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_post_comments',
	'label'       => esc_html__( 'Show Comments', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Related
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_related_posts',
	'label'       => esc_html__( 'Show Related Posts', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Show Related
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_sort_related',
	'label'       => esc_html__( 'Show Latest Related Posts', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => false,
	'priority'    => $priority++,
) );
// Heading Label
Kirki::add_field( 'newsophy_settings_config', array(
  'type'        => 'heading',
  'settings'    => 'newsophy_single_heading',
  'label'       => 'Social Share',
  'section'     => 'newsophy_settings_post_single',
  'priority'    => $priority++,
) );
// Facebook
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_share_facebook',
	'label'       => esc_html__( 'Share Facebook', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Twitter
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_share_twitter',
	'label'       => esc_html__( 'Share Twitter', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Linkedin
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_share_linkedin',
	'label'       => esc_html__( 'Share Linkedin', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Pinterest
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_share_pinterest',
	'label'       => esc_html__( 'Share Pinterest', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Whatsapp
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_share_whatsapp',
	'label'       => esc_html__( 'Share Whatsapp', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );
// Telegram
Kirki::add_field( 'newsophy_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'newsophy_share_telegram',
	'label'       => esc_html__( 'Share Telegram', 'newsophy' ),
	'section'     => 'newsophy_settings_post_single',
	'default'     => true,
	'priority'    => $priority++,
) );




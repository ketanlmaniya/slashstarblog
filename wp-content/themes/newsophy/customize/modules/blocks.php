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
/* General
/*-------------------------------------------------------*/

$blocks = Kirki::get_option('newsophy_blocknum');
$snum = Kirki::get_option('newsophy_sidenum');

$cnt = 1;
while ($cnt <= $blocks) {
if 	($cnt==1) {
	$def = 'all';
	$sidebar = 'sidebar-1';
}
else {
  $def = 'none';
  $sidebar = 'none';
}


/* Block 
/*-----------------------------------*/
// Title
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'text',
	'settings'    => 'newsophy_block_title_'.$cnt,
	'label'       => esc_html__( 'Title', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
) );
// Category
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
  'type'        => 'catdrop',
  'settings'    => 'newsophy_block_cat_'.$cnt,
  'label'       => __( 'Category', 'newsophy' ),
  'placeholder' => esc_attr__( 'Select a category', 'newsophy' ),
  'section'     => 'newsophy_settings_blocks_'.$cnt,
  'default'     => $def,
) );
// Tag
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
  'type'        => 'tagdrop',
  'settings'    => 'newsophy_block_tag_'.$cnt,
  'label'       => __( 'Tag', 'newsophy' ),
  'placeholder' => esc_attr__( 'Select a tag', 'newsophy' ),
  'section'     => 'newsophy_settings_blocks_'.$cnt,
  'default'     => 'all',
) );
// Post Number
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'number',
	'settings'    => 'newsophy_potsnum_'.$cnt,
	'label'       => esc_html__( 'Posts per Block', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	 'default'  => 4,
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
) );
// Blog Style
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'select',
	'settings'    => 'newsophy_block_style_'.$cnt,
	'label'       => esc_html__( 'Block Style', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => 'one-fr',
	'choices'     => array(
    'one-fr'            => esc_html__('One', 'newsophy'),
    'two-fr'            => esc_html__( 'Two', 'newsophy' ),
    'three-fr'          => esc_html__( 'Three', 'newsophy' ),
    'four-fr'           => esc_html__( 'Four', 'newsophy' ),
    'two-fr ovrlay'     => esc_html__( 'Two Overlay', 'newsophy' ),
    'three-fr ovrlay'   => esc_html__( 'Three Overlay', 'newsophy' ),
    'four-fr ovrlay'    => esc_html__( 'Four Overlay', 'newsophy' ),
),
) );
// Show Load More
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'toggle',
	'settings'    => 'newsophy_show_more_'.$cnt,
	'label'       => esc_html__( 'Show Pagination (Load More)', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => false,
) );
// Show Category
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'toggle',
	'settings'    => 'newsophy_show_cat_'.$cnt,
	'label'       => esc_html__( 'Show Category', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => true,
) );
// Show Author
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'toggle',
	'settings'    => 'newsophy_block_author_'.$cnt,
	'label'       => esc_html__( 'Show Author', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => true,
) );
// Show Author
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'toggle',
	'settings'    => 'newsophy_block_avatar_'.$cnt,
	'label'       => esc_html__( 'Show Author Avatar', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => true,
) );
// Show Date
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'toggle',
	'settings'    => 'newsophy_block_date_'.$cnt,
	'label'       => esc_html__( 'Show Date', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => true,
) );
// Show Comments
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'toggle',
	'settings'    => 'newsophy_block_comments_'.$cnt,
	'label'       => esc_html__( 'Show Comments', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => true,
) );
// Show Excerpt
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'toggle',
	'settings'    => 'newsophy_block_excerpt_'.$cnt,
	'label'       => esc_html__( 'Show Excerpt', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => true,
) );
// Sidebar
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'sidebars',
	'settings'    => 'newsophy_sidebar_'.$cnt,
	'label'       => esc_html__( 'Sidebar', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => $sidebar,
) );
// Background Color
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'color',
	'settings'    => 'newsophy_block_bg_'.$cnt,
	'label'       => esc_html__( 'Background Color', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => '#fff',
	'output' => array(
		array(
			'element'  => '#section-'.$cnt.', #section-'.$cnt.' .postnum',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );
// Heading Color
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'color',
	'settings'    => 'newsophy_block_heading_'.$cnt,
	'label'       => esc_html__( 'Heading Color', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => '#030b12',
	'output' => array(
		array(
			'element'  => '#section-'.$cnt.' a, #section-'.$cnt.' h4.widget-title, #section-'.$cnt.' .section-title h1',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Heading Hover Color
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'color',
	'settings'    => 'newsophy_block_hover_'.$cnt,
	'label'       => esc_html__( 'Heading Hover Color', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => '#2c40ff',
	'output' => array(
		array(
			'element'  => '#section-'.$cnt.' a:hover, #section-'.$cnt.' .post-title a:hover, #section-'.$cnt.' .postnum, #section-'.$cnt.' .loadmore-container a::after',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Text Color
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'color',
	'settings'    => 'newsophy_block_text_'.$cnt,
	'label'       => esc_html__( 'Text Color', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => '#717582',
	'output' => array(
		array(
			'element'  => '#section-'.$cnt.', #section-'.$cnt.' .post-meta, #section-'.$cnt.' .categ a, #section-'.$cnt.' .categ a:hover, #section-'.$cnt.' #section-'.$cnt.' span, #section-'.$cnt.' .wp-block-tag-cloud a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );
// Border Color
Kirki::add_field( 'newsophy_settings_config', array(
	'priority'    => $priority++,
	'type'        => 'color',
	'settings'    => 'newsophy_block_border_'.$cnt,
	'label'       => esc_html__( 'Border Color', 'newsophy' ),
	'section'     => 'newsophy_settings_blocks_'.$cnt,
	'default'     => '#cfe0e9',
	'output' => array(
		array(
			'element'  => '#section-'.$cnt.' .section-title h1, #section-'.$cnt.' .loadmore-container a',
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
) );
$cnt++;
}
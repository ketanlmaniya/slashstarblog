<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f4ccaecd2702',
	'title' => esc_html__( 'Category', 'newsophy' ),
	'fields' => array(
		array(
			'key' => 'field_1',
			'label' => 'Category Image',
			'name' => 'category_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
		),
		array(
		   'key' => 'field_newsophy_categ_color',
		   'label' => esc_html__('Category Color', 'newsophy' ),
		   'name' => 'category_color',
		   'type' => 'color_picker',
		   'instructions' => '',
		   'required' => 0,
		   'conditional_logic' => 0,
		   'wrapper' => array(
		       'width' => '',
		       'class' => '',
		       'id' => '',
		    ),
		    'default_value' => '',
		  ),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'category',
			),
		),
	),
));	

acf_add_local_field_group(array(
	'key' => 'group_5fbbda45eb451',
	'title' => esc_html__('Post Options', 'newsophy' ),
	'fields' => array(
		array(
			'key' => 'field_newsophy_feat_post',
			'label' => esc_html__('Featured', 'newsophy' ),
			'name' => 'newsophy_feat_post',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_newsophy_picked_post',
			'label' => esc_html__('Hand Picked', 'newsophy' ),
			'name' => 'newsophy_picked_post',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
));

acf_add_local_field_group(array(
	'key' => 'group_5face3f303ddd',
	'title' => esc_html__('Page Options', 'newsophy' ),
	'fields' => array(
		array(
			'key' => 'field_newsophy_show_related',
			'label' => esc_html__('Show Random Blog Posts', 'newsophy' ),
			'name' => 'newsophy_page_hide_title',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
));



endif;
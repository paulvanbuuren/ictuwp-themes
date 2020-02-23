<?php

/**
 * Internetspiegel (Beaver Builder Child Theme) - acf-definitions.php
 * ----------------------------------------------------------------------------------
 * ACF velden
 * ----------------------------------------------------------------------------------
 * @author  Paul van Buuren
 * @license GPL-2.0+
 * @package bb-child-internetspiegel
 * @version 1.0.7
 * @desc.   Related posts functionality
 * @link    http://wbvb.nl/themes/bb-child-internetspiegel/
 */



//========================================================================================================
// citaten voor blogpost

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
  	'key' => 'group_5846a645ef710',
  	'title' => 'Citaten voor blogpost',
  	'fields' => array (
  		array (
  			'default_value' => '',
  			'new_lines' => '',
  			'maxlength' => '',
  			'placeholder' => '',
  			'rows' => '',
  			'key' => 'field_5846a698c3ed9',
  			'label' => 'Inleiding',
  			'name' => 'single_inleiding',
  			'type' => 'textarea',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array (
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  		),
  		array (
  			'default_value' => '',
  			'new_lines' => '',
  			'maxlength' => '',
  			'placeholder' => '',
  			'rows' => '',
  			'key' => 'field_5846a64fc3ed8',
  			'label' => 'Citaat',
  			'name' => 'single_citaat',
  			'type' => 'textarea',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array (
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  		),
  		array (
  			'default_value' => '',
  			'maxlength' => '',
  			'placeholder' => '',
  			'prepend' => '',
  			'append' => '',
  			'key' => 'field_5846a6b9b50b5',
  			'label' => 'Citaat auteur',
  			'name' => 'single_citaat_auteur',
  			'type' => 'text',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array (
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  		),
  	),
  	'location' => array (
  		array (
  			array (
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'post',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => 1,
  	'description' => '',
  ));

endif;

//========================================================================================================
// Instellingen voor gerelateerde berichten

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_593e8a16c31ee',
	'title' => 'Gerelateerde berichten',
	'fields' => array (
		array (
			'key' => 'field_593e8a2210a49',
			'label' => 'Wil je gerelateerde berichten tonen?',
			'name' => 'related_posts_truefalse',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'ja' => 'Ja en ik wil zelf de berichten kiezen',
				'yarpp' => 'Ja, maar laat het systeem zelf maar kiezen',
				'nee' => 'Nee',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'yarpp',
			'layout' => 'vertical',
			'return_format' => 'value',
		),
		array (
			'key' => 'field_593e8a5010a4a',
			'label' => 'Gerelateerde berichten',
			'name' => 'related_posts_list',
			'type' => 'relationship',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_593e8a2210a49',
						'operator' => '==',
						'value' => 'ja',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
			),
			'taxonomy' => array (
			),
			'filters' => array (
				0 => 'search',
				1 => 'post_type',
				2 => 'taxonomy',
			),
			'elements' => array (
				0 => 'featured_image',
			),
			'min' => 2,
			'max' => '',
			'return_format' => 'object',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
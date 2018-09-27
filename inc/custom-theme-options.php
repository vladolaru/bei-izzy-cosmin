<?php
//add_action( 'customize_register', 'panel' );
//function panel( $wp_customize ) {
//	$wp_customize->add_panel( 'theme-options', array(
//		'title'       => __('Theme Options'),
//		'description' => __('Customize your theme options'),
//		'priority'    => 10,
//	) );
//	$wp_customize->add_section( 'post-section', array(
//		'title'    => __('Post Options'),
//		'priority' => 10,
//		'panel'    => 'theme-options',
//	) );
//	$wp_customize->add_section( 'project-section', array(
//		'title'    => __('Project Options'),
//		'priority' => 20,
//		'panel'    => 'theme-options',
//	) );
//	add_checkbox( $wp_customize, 'project', __('Show categories on archives') );
//	add_checkbox( $wp_customize, 'project', __('Show customer on archives' ) );
//	add_checkbox( $wp_customize, 'project', __('Show year on archives' ));
//	add_checkbox( $wp_customize, 'post', __('Show featured image on archives' ));
//	add_checkbox( $wp_customize, 'post', __('Show categories on archives' ));
//	add_checkbox( $wp_customize, 'post', __('Show date on archives' ));
//	add_checkbox( $wp_customize, 'post', __('Show author on archives' ));
//	add_checkbox( $wp_customize, 'post', __('Show author box on single' ));
//	add_checkbox( $wp_customize, 'post', __('Show featured image on single' ));
//}
//function add_checkbox( $wp_customize, $post_type, $label ) {
//	$settingId = $post_type . '-' . strtolower( str_replace( ' ', '-', $label ) );
//	$wp_customize->add_setting( $settingId, array(
//		'default' => get_theme_mod( $settingId ),
//	) );
//	$wp_customize->add_control( $settingId . '-control', array(
//		'label'    => $label ,
//		'type'     => 'checkbox',
//		'section'  => $post_type . '-section',
//		'settings' => $settingId,
//	) );
//	return $settingId;
//}
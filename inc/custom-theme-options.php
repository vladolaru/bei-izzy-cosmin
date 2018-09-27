<?php
function izzy_panel( $wp_customize ) {
	$wp_customize->add_panel( 'theme-options', array(
		'title'       => __('Theme Options izzy'),
		'description' => __('Customize your izzy theme options, regarding posts and projects.'),
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'post-section', array(
		'title'    => __('Post Options'),
		'priority' => 10,
		'panel'    => 'theme-options',
	) );
	$wp_customize->add_section( 'project-section', array(
		'title'    => __('Project Options'),
		'priority' => 20,
		'panel'    => 'theme-options',
	) );
	add_checkbox( $wp_customize, 'project', __('Show categories on project archive page.') );
	add_checkbox( $wp_customize, 'project', __('Show customer on project archive page.' ) );
	add_checkbox( $wp_customize, 'project', __('Show year on project archive page.' ));
	add_checkbox( $wp_customize, 'post', __('Show featured image on post archive page.' ));
	add_checkbox( $wp_customize, 'post', __('Show categories on post archive page.' ));
	add_checkbox( $wp_customize, 'post', __('Show date on post archive page.' ));
	add_checkbox( $wp_customize, 'post', __('Show author on post archive page.' ));
	add_checkbox( $wp_customize, 'post', __('Show author box on single post page.' ));
	add_checkbox( $wp_customize, 'post', __('Show featured image on single post page.' ));
}


function add_checkbox( $wp_customize, $post_type, $label ) {
	$settingId = $post_type . '-' . strtolower( str_replace( ' ', '-', $label ) );
	$wp_customize->add_setting( $settingId, array(
		'default' => get_theme_mod( $settingId ),
	) );
	$wp_customize->add_control( $settingId . '-control', array(
		'label'    => $label ,
		'type'     => 'checkbox',
		'section'  => $post_type . '-section',
		'settings' => $settingId,
	) );
	return $settingId;
}

add_action( 'customize_register', 'izzy_panel' );

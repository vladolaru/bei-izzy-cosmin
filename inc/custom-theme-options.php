<?php
/**
 * Adds the Theme-Options izzy panel in the Customizer, with 3 features regarding projects and 6 regarding posts.
 *
 * @param object We are using the $wp_customize object within the customize_register action hook to access
 *        the WP_Customize_Manager() class .
 *
 */
function izzy_panel( $wp_customize ) {
	$wp_customize->add_panel( 'theme-options', array(
		'title'       => __('Theme Options izzy','izzy'),
		'description' => __('Customize your izzy theme options, regarding posts and projects.','izzy'),
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'post-section', array(
		'title'    => __('Post Options','izzy'),
		'priority' => 10,
		'panel'    => 'theme-options',
	) );
	$wp_customize->add_section( 'project-section', array(
		'title'    => __('Project Options','izzy'),
		'priority' => 20,
		'panel'    => 'theme-options',
	) );
	add_checkbox( $wp_customize, 'project', __('Show categories on project archive page.','izzy'),1 );
	add_checkbox( $wp_customize, 'project', __('Show customer on project archive page.','izzy' ),2 );
	add_checkbox( $wp_customize, 'project', __('Show year on project archive page.','izzy' ),3);
	add_checkbox( $wp_customize, 'post', __('Show featured image on post archive page.','izzy' ),4);
	add_checkbox( $wp_customize, 'post', __('Show categories on post archive page.','izzy' ),5);
	add_checkbox( $wp_customize, 'post', __('Show date on post archive page.','izzy' ),6);
	add_checkbox( $wp_customize, 'post', __('Show author on post archive page.','izzy' ),7);
	add_checkbox( $wp_customize, 'post', __('Show author box on single post page.','izzy' ),8);
	add_checkbox( $wp_customize, 'post', __('Show featured image on single post page.','izzy' ),9);
}

/**
 * Adds a checkbox on the Customizer interface, with a specific slug, so that the user can change features in real-time.
 *
 * @param object $wp_customize The object of the WP_Customize_Manager that we need to access to reach its methods.
 * @param string $post_type The post element of the respective type that will be modified.
 * @param string $label The control description that will be transformed into a slug.
 * @param int $id The unique identifier that will be added to the specific checkbox, so that it will be easy to know which options are active.
 *
 * @return string $settingId The string that will create the slug-like id for a control box.
 */
function add_checkbox( $wp_customize, $post_type, $label, $id ) {
	$settingId = $post_type . '-' . $id;
	$wp_customize->add_setting( $settingId, array(
		'default' => get_theme_mod( $settingId ),
		'sanitize_callback' => 'esc_attr',
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

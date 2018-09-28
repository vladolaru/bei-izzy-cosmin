<?php
/**
 * Initializing the Project Custom Post type.
 *
 */
function izzy_project_init() {
// set up project labels
	$labels = array(
		'name'               =>  __(' Projects'),
		'singular_name'      =>  __(' Project'),
		'add_new'            =>  __(' Add New Project'),
		'add_new_item'       =>  __(' Add New Project'),
		'edit_item'          =>  __(' Edit Project'),
		'new_item'           =>  __(' New Project'),
		'all_items'          =>  __(' All Projects'),
		'view_item'          =>  __(' View Project'),
		'search_items'       =>  __(' Search Projects'),
		'not_found'          =>  __(' No Projects Found'),
		'not_found_in_trash' =>  __(' No Projects found in Trash'),
		'parent_item_colon'  => '',
		'menu_name'          =>  __('Projects'),
	);

// register post type
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'has_archive'     => true,
		'show_ui'         => true,
		'capability_type' => 'post',
		'hierarchical'    => false,
		'rewrite'         => array( 'slug' => 'project' ),
		'query_var'       => true,
		'menu_icon'       => 'dashicons-admin-customizer',
		'supports'        => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes'
		)
	);
	register_post_type(  __('project'), $args );

// register taxonomy
	register_taxonomy(  __('project_category'), 'project',
		array(
			'hierarchical' => true,
			'label'        =>  __('Project Categories'),
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'project-category' )
		) );
}

add_action( 'init', 'izzy_project_init' );

/**
 * Change the wording of actions regarding projects.
 *
 * @param array $messages Array of dashboard messages.
 *
 * @return array $messages The messages array appropriate for the Project post type.
 */

function my_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['project'] = array(
		0  => '’',
		1  => sprintf( __( 'Project updated. <a href="%s">View project</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		2  => __( 'Custom field updated.' ),
		3  => __( 'Custom field deleted.' ),
		4  => __( 'Project updated.' ),
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Project restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => sprintf( __( 'Project published. <a href="%s">View project</a>' ), esc_url( get_permalink( $post_ID ) ) ),
		7  => __( 'Project saved.' ),
		8  => sprintf( __( 'Project submitted. <a target="_blank" href="%s">Preview project</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9  => sprintf( __( 'Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Project draft updated. <a target="_blank" href="%s">Preview project</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);

	return $messages;
}

add_filter( 'post_updated_messages', 'my_updated_messages' );

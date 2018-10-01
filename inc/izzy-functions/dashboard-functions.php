<?php
/**
 * Initializing the Project Custom Post type.
 *
 */
function izzy_project_init() {
// set up project labels
	$labels = array(
		'name'               =>  __('Projects','izzy'),
		'singular_name'      =>  __('Project','izzy'),
		'add_new'            =>  __(' Add New Project','izzy'),
		'add_new_item'       =>  __(' Add New Project','izzy'),
		'edit_item'          =>  __(' Edit Project','izzy'),
		'new_item'           =>  __(' New Project','izzy'),
		'all_items'          =>  __(' All Projects','izzy'),
		'view_item'          =>  __(' View Project','izzy'),
		'search_items'       =>  __(' Search Projects','izzy'),
		'not_found'          =>  __(' No Projects Found','izzy'),
		'not_found_in_trash' =>  __(' No Projects found in Trash','izzy'),
		'parent_item_colon'  => '',
		'menu_name'          =>  __('Projects','izzy'),
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
	register_post_type('project', $args );

// register taxonomy
	register_taxonomy(  __('project_category','izzy'), 'project',
		array(
			'hierarchical' => true,
			'label'        =>  __('Project Categories','izzy'),
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
		1  => sprintf( __( 'Project updated. <a href="%s">View project</a>', 'izzy' ), esc_url( get_permalink( $post_ID ) ) ),
		2  => __( 'Custom field updated.','izzy' ),
		3  => __( 'Custom field deleted.','izzy' ),
		4  => __( 'Project updated.','izzy' ),
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Project restored to revision from %s','izzy' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => sprintf( __( 'Project published. <a href="%s">View project</a>','izzy' ), esc_url( get_permalink( $post_ID ) ) ),
		7  => __( 'Project saved.', 'izzy' ),
		8  => sprintf( __( 'Project submitted. <a target="_blank" href="%s">Preview project</a>','izzy' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9  => sprintf( __( 'Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>','izzy' ), date_i18n( __( 'M j, Y @ G:i', 'izzy' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Project draft updated. <a target="_blank" href="%s">Preview project</a>','izzy' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);

	return $messages;
}

add_filter( 'post_updated_messages', 'my_updated_messages' );

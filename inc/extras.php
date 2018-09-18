<?php

// Project Custom Post Type
function project_init() {
// set up project labels
$labels = array(
'name' => 'Projects',
'singular_name' => 'Project',
'add_new' => 'Add New Project',
'add_new_item' => 'Add New Project',
'edit_item' => 'Edit Project',
'new_item' => 'New Project',
'all_items' => 'All Projects',
'view_item' => 'View Project',
'search_items' => 'Search Projects',
'not_found' =>  'No Projects Found',
'not_found_in_trash' => 'No Projects found in Trash',
'parent_item_colon' => '',
'menu_name' => 'Projects',
);

// register post type
$args = array(
'labels' => $labels,
'public' => true,
'has_archive' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => false,
'rewrite' => array('slug' => 'project'),
'query_var' => true,
'menu_icon' => 'dashicons-admin-customizer',
'supports' => array(
'title',
'editor',
'excerpt',
'trackbacks',
'custom-fields',
'comments',
'revisions',
'thumbnail',
'author',
'page-attributes'
)
);
register_post_type( 'project', $args );

// register taxonomy
register_taxonomy('project_category', 'project', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'project-category' )));
}

add_action( 'init', 'project_init' );
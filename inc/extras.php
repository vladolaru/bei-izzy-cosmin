<?php

// Project Custom Post Type
function izzy_project_init() {
// set up project labels
	$labels = array(
		'name'               => 'Projects',
		'singular_name'      => 'Project',
		'add_new'            => 'Add New Project',
		'add_new_item'       => 'Add New Project',
		'edit_item'          => 'Edit Project',
		'new_item'           => 'New Project',
		'all_items'          => 'All Projects',
		'view_item'          => 'View Project',
		'search_items'       => 'Search Projects',
		'not_found'          => 'No Projects Found',
		'not_found_in_trash' => 'No Projects found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Projects',
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
	register_post_type( 'project', $args );

// register taxonomy
	register_taxonomy( 'project_category', 'project',
		array(
			'hierarchical' => true,
			'label'        => 'Project Categories',
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'project-category' )
		) );
}

add_action( 'init', 'izzy_project_init' );

/**
 * Change the wording of actions regarding projects.
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


//Year custom field display function
if ( ! function_exists( 'izzy_project_year' ) ) {

	function izzy_project_year() {
		global $wp_query;
		$postid = $wp_query->post->ID;
		echo '<p class="project-details">' . 'Release year: ' . get_field( 'year', $postid ) . '</p>';
		wp_reset_query();
	}

}

//Customer custom field display function
if ( ! function_exists( 'izzy_project_customer' ) ) {

	function izzy_project_customer() {
		global $wp_query;
		$postid = $wp_query->post->ID;
		if ( get_post_meta( $postid, 'customer', true ) == false ) {
			echo '<p class="project-details">' . 'No customer for this theme yet.' . '</p>';
		} else {
			echo '<p class="project-details">' . 'Customer: ' . get_post_meta( $postid, 'customer', true ) . '</p>';
		}

		wp_reset_query();
	}

}

//Grouping all the necessary details and displaying them as a block
if ( ! function_exists( 'izzy_project_details' ) ) {


	function izzy_project_details() {
		echo izzy_display_categories() .
		     izzy_project_year() .
		     izzy_project_customer();
	}

}
//Custom excerpt

function izzy_custom_excerpt( $limit ) {
	$content = explode( ' ', get_the_content(), $limit );
	if ( count( $content ) >= $limit ) {
		array_pop( $content );
		$content = implode( " ", $content ) . ' ...';
	} else {
		$content = implode( " ", $content );
	}
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );

	echo $content;
}


//Display post ( including project) categories
if ( ! function_exists( 'izzy_display_categories' ) ) {

	function izzy_display_categories() {
		$categories = get_the_terms( get_the_ID(), 'project_category' );
		if ( is_array( $categories ) && ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				if ( 1 == count( $categories ) ) {
					echo '<p class="project-details">' . 'Categories: ';
					echo $category->name;
				} else {
					echo '<p class="project-details">' . 'Categories: ';
					echo $category->name . ', ';
				}
				echo '</p>';
			}
		} else {
			echo '<p class="project-details">' . "Categories: None" . '</p>';
		}
	}

}

if ( ! function_exists( 'izzy_project_slider' ) ) {

	function izzy_project_slider() {
		$id     = get_the_ID();
		$images = get_field( 'gallery', $id );
		if ( ! empty( $images ) ) {
			echo '<div class="one-time">';
			foreach ( $images as $image ) {
				echo '<div class="slider-image"><img src="' . $image['url'] . '" alt="slider image" ></div>';
			}
			echo '</div>';

		}
	}
}

/**
 * Display footer widgets.
 */
if ( ! function_exists( 'izzy_footer_widgets' ) ) {

	function izzy_footer_widgets() {
		if ( ! is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-2' ) ) {
			return;
		}

		if ( is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-2' ) ) { ?>
            <aside id="footer-widget-area" class="widget-area footer-widget">
				<?php dynamic_sidebar( 'footer-1' ); ?>
            </aside><!-- #footer-1 -->
			<?php return;
		}

		if ( ! is_active_sidebar( 'footer-1' ) && is_active_sidebar( 'footer-2' ) ) { ?>
            <aside id="footer-widget-area" class="widget-area footer-widget">
				<?php dynamic_sidebar( 'footer-2' ); ?>
            </aside><!-- #footer-2 -->
			<?php return;
		} else {
			?>
            <aside id="footer-widget-area" class="widget-area footer-widget">
				<?php dynamic_sidebar( 'footer-1' ); ?>
            </aside><!-- #footer-1 -->

            <aside id="footer-widget-area" class="widget-area footer-widget">
				<?php dynamic_sidebar( 'footer-2' ); ?>
            </aside><!-- #footer-2 -->

		<?php }
	}
} ?>



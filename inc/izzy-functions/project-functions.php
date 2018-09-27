<?php

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

//Grouping all the necessary details and displaying them as a block
if ( ! function_exists( 'izzy_project_details' ) ) {


	function izzy_project_details() {
		echo izzy_display_categories() .
		     izzy_project_year() .
		     izzy_project_customer();
	}

}

/**
 * Outputs the content of a single project.
 */
if ( ! function_exists( 'izzy_single_project' ) ) {

	function izzy_single_project() {

		echo "<header class='entry-header'>";

		izzy_project_slider();

		echo '<br>';

		the_title( '<h1 class="entry-title title-project" align="center">', '</h1>' );

		//Display the gallery slider of the specific project

		echo "</header><!-- .entry-header-project -->";

		//Display the details of the project

		izzy_project_details();

		//End of the display

		echo "<!--        Display project content-->

        <div class='entry-content'>";
		the_content( sprintf(
			wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'izzy' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		echo "</div><!-- .entry-content -->";
	}
}



/**
 * Outputs the content of the project archive.
 */
if ( ! function_exists( 'izzy_archive_project' ) ) {

function izzy_archive_project() {
the_title( '<h2 class="entry-title-project-archive"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

if(	has_post_thumbnail() ) {
		the_post_thumbnail( 'medium', [ 'class' => 'project-archive-thumbnail' ] );
	}
	else
	{
		echo "<div class='no-thumbnail'><p >There is no featured image available.</p></div>";
	}
?>
<div class="details-block">
	<?php
	izzy_project_details();
	echo "<p class='excerpt'>" . get_the_excerpt() . "</p>";
    echo "<div class='continue-reading'>
        <a href='" . esc_url( get_permalink() ) . "' rel='bookmark'>Continue Reading</a></div></div>";

}
}

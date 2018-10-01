<?php

if ( ! function_exists( 'izzy_project_year' ) ) {

	/**
	 * Outputs the year in which the project has been released or will be released.
	 *
	 */
	function izzy_project_year() {
		global $wp_query;
		$postid = $wp_query->post->ID;
		echo '<p class="project-details">' . __( 'Release year: ','izzy' ) . get_field( 'year', $postid ) . '</p>';
		wp_reset_query();
	}

}

if ( ! function_exists( 'izzy_project_customer' ) ) {

	/**
	 * Outputs the customer of the project in cause.
	 *
	 */
	function izzy_project_customer() {
		global $wp_query;
		$postid = $wp_query->post->ID;
		if ( get_post_meta( $postid, 'customer', true ) == false ) {
			echo '<p class="project-details">' . __( 'No customer for this theme yet.','izzy' ) . '</p>';
		} else {
			echo '<p class="project-details">' . __( 'Customer: ','izzy' ) . get_post_meta( $postid, 'customer', true ) . '</p>';
		}

		wp_reset_query();
	}

}

if ( ! function_exists( 'izzy_project_categories' ) ) {

	/**
	 * Outputs the categories that a project has.
	 *
	 */
	function izzy_project_categories() {
		$categories = get_the_terms( get_the_ID(), 'project_category' );
		if ( is_array( $categories ) && ! empty( $categories ) ) {
			echo '<p class="project-details">' . __( "Categories: ",'izzy' );
			foreach ( $categories as $category ) {
				if ( 1 == count( $categories ) ) {
					esc_html_e( $category->name,'izzy' );
				} else {
					esc_html_e( $category->name,'izzy' );
					echo ', ';
				}
			}
			echo '</p>';
		} else {
			echo '<p class="project-details">' . __( "Categories: None",'izzy' ) . '</p>';
		}
	}

}

if ( ! function_exists( 'izzy_project_details' ) ) {

	/**
	 * Outputs all the details regarding a project, using a set of functions.
	 *
	 */
	function izzy_project_details() {
		if ( get_theme_mod( 'project-1' ) ) {
			izzy_project_categories();
		}
		if ( get_theme_mod( 'project-3' ) ) {
			izzy_project_year();
		}
		if ( get_theme_mod( 'project-2' ) ) {
			izzy_project_customer();
		}
	}

}


if ( ! function_exists( 'izzy_single_project' ) ) {

	/**
	 * Outputs the content of a single project.
	 *
	 */
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


if ( ! function_exists( 'izzy_archive_project' ) ) {

	/**
	 * Outputs the content of the project archive.
	 *
	 */
	function izzy_archive_project() {
		the_title( '<h2 class="entry-title-project-archive"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'medium', [ 'class' => 'project-archive-thumbnail' ] );
		} else {
			echo "<div class='no-thumbnail'><p>" . __( "There is no featured image available.",'izzy' ) . "</p></div>";
		}
		?>
        <div class="details-block">
		<?php
		izzy_project_details();
		echo "<p class='excerpt'>" . esc_html( get_the_excerpt() ) . "</p>";
		echo "<div class='continue-reading'>
        <a href='" . esc_url( get_permalink() ) . "' rel='bookmark'>" . __( "Continue Reading",'izzy' ) . "</a></div></div>";

	}
}

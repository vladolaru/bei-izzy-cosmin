<?php

/**
 * Outputs the post archive template and the desired details for every post.
 *
 */
if ( ! function_exists( 'izzy_archive_post' ) ) {

	function izzy_archive_post() {

		the_title( '<h2 class="entry-title-post-archive"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if(	has_post_thumbnail() && get_theme_mod( 'post-4' ) ) {
			the_post_thumbnail( 'medium', [ 'class' => 'post-archive-thumbnail' ] );
		}
		else
			{
				echo "<div class='no-thumbnail'><p>" . __("There is no featured image available.",'izzy') . "</p></div>";
			}

		echo "<div class='details-block-post'>";
		echo "<div class='entry-meta'>";
		if(get_theme_mod( 'post-6' ) ) {
			izzy_posted_on();
		}
		echo "<br>";
		if(get_theme_mod( 'post-7' ) ) {
			izzy_posted_by();
		}
		echo "<br>";
		if(get_theme_mod( 'post-5' ) ) {
			izzy_entry_footer();
		}
		echo "</div><!-- .entry-meta -->";
		echo "<br>";
		echo "<p class='excerpt'>" . get_the_excerpt() . "</p>";
		echo "<div class='continue-reading'>
        <a href='" . esc_url( get_permalink() ) . "' rel='bookmark'>" . __("Continue Reading",'izzy'). "</a></div></div><!-- .details-block-post -->";
	}
}

/**
 * Outputs the single post template and author details, if option is checked.
 *
 */
if ( ! function_exists( 'izzy_single_post' ) ) {

	function izzy_single_post() {

		echo "<header class='entry-header'>";
		the_title( '<h1 class="entry-title">', '</h1>' );

		echo "<div class='entry-meta'>";
		izzy_posted_by();
		echo "<br>";
		izzy_posted_on();
		echo "<br>";
		izzy_entry_footer();

		echo "</div><!-- .entry-meta -->";
		echo "</header><!-- .entry-header -->";
		if(	has_post_thumbnail() && get_theme_mod( 'post-9' ) ) {
			echo "<div class='post-image'>";
			the_post_thumbnail( 'large', [ 'class' => 'post-single-thumbnail' ] );
			echo "</div>";
		}
		else
		{
			echo "<div class='no-thumbnail-single-post'><p>" . __("There is no featured image available for this post.","izzy") . "</p></div>";
		}

		echo "<div class='entry-content'>";
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


		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'izzy' ),
			'after'  => '</div>',
		) );

		echo "</div><!-- .entry-content -->" . "<br>" . "<br>";

		if(get_theme_mod( 'post-8' ) ) {
			get_template_part('/inc/custom-author-box');
		}

		}
}
<?php

if ( ! function_exists( 'izzy_archive_post' ) ) {

	function izzy_archive_post() {

		the_title( '<h2 class="entry-title-post-archive"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		if(	has_post_thumbnail() ) {
			the_post_thumbnail( 'medium', [ 'class' => 'post-archive-thumbnail' ] );
		}
		else
			{
				echo "<div class='no-thumbnail'><p >There is no featured image available.</p></div>";
			}

		echo "<div class='details-block-post'>";
		echo "<div class='entry-meta'>";
		izzy_posted_on();
		echo "<br>";
		izzy_posted_by();
		echo "<br>";
		izzy_entry_footer();
		echo "</div><!-- .entry-meta -->";
		echo "<br>";
		echo "<p class='excerpt'>" . get_the_excerpt() . "</p>";
		echo "<div class='continue-reading'>
        <a href='" . esc_url( get_permalink() ) . "' rel='bookmark'>Continue Reading</a></div></div><!-- .details-block-post -->";
	}
}


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
		if(	has_post_thumbnail() ) {
			echo "<div class='post-image'>";
			the_post_thumbnail( 'large', [ 'class' => 'post-single-thumbnail' ] );
			echo "</div>";
		}
		else{
			echo "<div class='no-thumbnail-single-post'><p >There is no featured image available for this post.</p></div>";
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

		echo "</div><!-- .entry-content -->";

	}
}
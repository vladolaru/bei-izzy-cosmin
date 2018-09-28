<?php

require 'izzy-functions/dashboard-functions.php';

require 'izzy-functions/post-functions.php';

require 'izzy-functions/project-functions.php';

require 'izzy-functions/project-slider-functions.php';

require 'izzy-functions/widgets-functions.php';

/**
 * Hooks a custom excerpt length, using a filter, in case the type of the post is either project or post.
 *
 * @param int $length The default value of an excerpt.
 *
 * @return int Either the default $length value, or a post/project custom excerpt length.
 */
function custom_excerpt_length( $length ) {
	if ( get_post_type()=='project' ) {
		return 25;
	}
	elseif ( get_post_type()=='post' ) {
		return 50;
	}
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
















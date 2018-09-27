<?php

require 'izzy-functions/dashboard-functions.php';

require 'izzy-functions/post-functions.php';

require 'izzy-functions/project-functions.php';

require 'izzy-functions/project-slider-functions.php';

require 'izzy-functions/widgets-functions.php';

//Custom excerpt

function izzy_custom_excerpt() {
	return get_the_excerpt();
}

function custom_excerpt_length( $length ) {
	if ( get_post_type( 'project' ) ) {
		return 25;
	}
	if ( get_post_type( 'post' ) ) {
		return 50;
	}
	return $length;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
















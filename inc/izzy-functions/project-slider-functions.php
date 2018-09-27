<?php

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
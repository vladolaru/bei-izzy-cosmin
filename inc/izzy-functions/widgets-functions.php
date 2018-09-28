<?php

/**
 * Displays footer widgets, the footer having 2 widget areas.
 *
 */
if ( ! function_exists( 'izzy_footer_widgets' ) ) {

	function izzy_footer_widgets() {

		if ( is_active_sidebar( 'footer-1' ) ) { ?>
			<aside id="footer-widget-area" class="widget-area footer-widget">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</aside><!-- #footer-1 -->
			<?php
		}

		if ( is_active_sidebar( 'footer-2' ) ) { ?>
			<aside id="footer-widget-area" class="widget-area footer-widget">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</aside><!-- #footer-2 -->
			<?php
		}

		return;
	}
}

/**
 * Displays front page widgets, the page having 3 front-page widget areas.
 *
 */
if ( ! function_exists( 'izzy_front_page_widgets' ) ) {

	function izzy_front_page_widgets() {

		if ( is_active_sidebar( 'front-sidebar-1' ) ) { ?>
			<aside id="front-widget-area-1" class="widget-area-front front-widget-1">
				<?php dynamic_sidebar( 'front-sidebar-1' ); ?>
			</aside><!-- #front-sidebar-1 -->
			<?php
		}

		if ( is_active_sidebar( 'front-sidebar-2' ) ) { ?>
			<aside id="front-widget-area-2" class="widget-area-front front-widget-2">
				<?php dynamic_sidebar( 'front-sidebar-2' ); ?>
			</aside><!-- #front-sidebar-2 -->
			<?php
		}

		if ( is_active_sidebar( 'front-sidebar-3' ) ) { ?>
			<aside id="front-widget-area-3" class="widget-area-front front-widget-3">
				<?php dynamic_sidebar( 'front-sidebar-3' ); ?>
			</aside><!-- #front-sidebar-3 -->
			<?php
		}
		return;
	}
}
<?php
register_sidebar( array(
        'name' => __( 'Footer Widget Area 1', 'izzy' ),
        'id' => 'footer-widget-area-1',
        'description' => __( 'Widgets in this footer area will be shown on all posts and pages.', 'izzy' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="footer-widget-area-1">',
	'after_title'   => '</h2>',
    ) );

register_sidebar( array(
        'name' => __( 'Footer Widget Area 2', 'izzy' ),
        'id' => 'footer-widget-area-2',
        'description' => __( 'Widgets in this footer area will be shown on all posts and pages.', 'izzy' ),
        'before_widget' => '<li id="%1$s" class="widget %3$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="footer-widget-area-2">',
	'after_title'   => '</h2>',
    ) );
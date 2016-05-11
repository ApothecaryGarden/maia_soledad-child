<?php
add_action( 'widgets_init', 'maia_discussions_widgets_init' );
function maia_discussions_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Discussions Landing Area', 'theme-slug' ),
        'id' => 'sidebar-discussion_landing',
        'description' => __( 'Something cool', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'maia_premium_widgets_init' );
function maia_premium_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Premium Landing Area', 'theme-slug' ),
        'id' => 'sidebar-premium_landing',
        'description' => __( 'Something cool', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

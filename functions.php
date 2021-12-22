<?php

function theme_setup() {
    register_nav_menus(
        array(
        'primary' => __( 'Primary Menu', 'ivan' ),
        )
    );
}
add_action( 'after_setup_theme', 'theme_setup' );

function my_custom_theme_sidebar() {
    register_sidebar( array(
        'name' => __( 'Primary Sidebar', 'ivan' ),
        'id'   => 'sidebar-1',
    ) );
}
add_action( 'widgets_init', 'my_custom_theme_sidebar' );

function my_custom_theme_enqueue() {
    wp_enqueue_style( 'ivan', get_stylesheet_uri() , array(), '20211222');
    
}
add_action( 'wp_enqueue_scripts', 'my_custom_theme_enqueue' );

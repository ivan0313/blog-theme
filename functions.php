<?php
/**
 * Theme functions and definitions
 *
 * @package IvanTheme
 * @since IvanTheme 1.0
 */

function theme_setup() {
    	
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'title-tag' );

    register_nav_menus(
        array(
        'primary' => __( 'Primary Menu', 'ivan' ),
        )
    );

}
add_action( 'after_setup_theme', 'theme_setup' );

function ivan_get_font_url() {
	$font_url = '';

    $query_args = array(
        'family'  => urlencode( 'Montserrat:400,700' ),
        'display' => urlencode( 'fallback' ),
    );
    $font_url   = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );


	return $font_url;
}

function my_custom_theme_sidebar() {

    register_sidebar( array(
        'name' => __( 'Primary Sidebar', 'ivan' ),
        'id'   => 'sidebar-1',
    ) );

    register_sidebar( array(
        'name' => __( 'Avatar', 'ivan' ),
        'id'   => 'avatar-1',
    ) );

}
add_action( 'widgets_init', 'my_custom_theme_sidebar' );

function my_custom_theme_enqueue() {
    wp_enqueue_style( 'ivan', get_stylesheet_uri() , array(), '1.0.3' );

    $font_url = ivan_get_font_url();
	if ( ! empty( $font_url ) ) {
		wp_enqueue_style( 'ivan-fonts', esc_url_raw( $font_url ), array(), null );
	}
    
}
add_action( 'wp_enqueue_scripts', 'my_custom_theme_enqueue' );

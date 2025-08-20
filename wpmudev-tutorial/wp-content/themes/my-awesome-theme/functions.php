<?php
add_action( 'wp_enqueue_scripts', 'mat_assets' );
function mat_assets() {
    wp_enqueue_style( 'my-awesome-theme', get_stylesheet_uri() );
}

add_action( 'widgets_init', 'mat_widget_areas' );
function mat_widget_areas() {
    register_sidebar( array(
        'name' => 'Theme Sidebar',
        'id' => 'mat-sidebar',
        'description' => 'The main sidebar shown on the right in our awesome theme',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}

register_nav_menus( array(
    'header-menu' => 'Our Awesome Header Menu',
) );
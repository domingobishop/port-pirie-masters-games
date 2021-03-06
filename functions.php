<?php

include 'inc/functions-global.php';
include 'inc/functions-admin.php';
include 'inc/functions-metaboxes.php';




// add_action
add_action('wp_enqueue_scripts', 'bc_styles');
add_action('wp_enqueue_scripts', 'bc_scripts');
add_action('widgets_init', 'bc_footer_widgets_init');
add_action('init', 'meta_boxes');
add_action('after_setup_theme', 'register_bc_menu');
add_action( 'admin_menu', 'hp_settings' );
add_action( 'admin_init', 'hp_settings_data' );

add_filter('excerpt_more', 'new_excerpt_more');
add_filter('wp_title', 'bc_wp_title', 10, 2);
add_filter('the_content', 'add_image_responsive_class');
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function wpse_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'sponsor-logo', 180, 180 );
    the_post_thumbnail('sponsor-logo');
}

add_action( 'after_setup_theme', 'wpse_setup_theme' );

function add_cats_to_pages() {
    register_taxonomy_for_object_type('category', 'page');
}

add_action( 'init', 'add_cats_to_pages' );
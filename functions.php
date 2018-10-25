<?php

include 'inc/functions-global.php';
include 'inc/functions-metaboxes.php';

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

// add_action
add_action( 'wp_enqueue_scripts', 'bc_styles' );
add_action( 'wp_enqueue_scripts', 'bc_scripts' );
add_action( 'widgets_init', 'bc_footer_widgets_init' );
add_action( 'init', 'meta_boxes' );
add_action( 'after_setup_theme', 'register_bc_menu' );

add_filter('excerpt_more', 'new_excerpt_more');
add_filter( 'wp_title', 'bc_wp_title', 10, 2 );
add_filter('the_content', 'add_image_responsive_class');


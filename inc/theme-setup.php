<?php
/**
 * Theme Setup & Registration
 */

function modmy_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // WooCommerce support
    add_theme_support('woocommerce');

    // Register Navigation Menus
    register_nav_menus(array(
        'primary'       => __('Primary Menu', 'modafinil-malaysia'),
        'mobile_cities' => __('Mobile Cities Grid', 'modafinil-malaysia'),
        'footer_quick'  => __('Footer Quick Links', 'modafinil-malaysia'),
        'footer_info'   => __('Footer Information', 'modafinil-malaysia'),
        'footer_cities' => __('Footer Delivery Cities', 'modafinil-malaysia'),
    ));

    // HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'modmy_theme_setup');

/**
 * Register Custom Post Types
 */
function modmy_register_cpt() {
    // Reviews CPT
    register_post_type('review', array(
        'labels' => array(
            'name' => 'Reviews',
            'singular_name' => 'Review',
            'add_new_item' => 'Add New Review'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title'), // ACF will handle the rest
        'menu_icon' => 'dashicons-star-filled'
    ));
}
add_action('init', 'modmy_register_cpt');

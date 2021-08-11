<?php

/**
 * Enqueue all the stylesheets and scripts files here.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

function jaybee_comic_scripts() {
    wp_enqueue_style('jaybee_comic_style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all');
    wp_enqueue_script('jaybee_fontawesome', 'https://kit.fontawesome.com/40c199a931.js');
    wp_enqueue_script('jaybee_navigation_script', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'jaybee_comic_scripts');

function jaybee_comic_admin_scripts() {
    wp_enqueue_style('jaybee_dashboard_style', get_template_directory_uri() . '/assets/css/dashboard_style.css', array(), '1.0.0', 'all');
    wp_enqueue_script('jaybee_upload_comic_script', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'jaybee_comic_admin_scripts');

function jaybee_customizer_scripts() {

    wp_enqueue_script('jaybee_color_customizer_script', get_template_directory_uri() . '/assets/js/customizer.js', ['jquery', 'customize-preview'], '1.0.0', true);
}
add_action('customize_preview_init', 'jaybee_customizer_scripts');

// EOF

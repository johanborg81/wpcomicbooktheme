<?php

/**
 * Create all the menus
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

function add_navbar() {
    register_nav_menus(
        [
            'jaybee-navbar' => __('JayBee Navbar'),
            'jaybee-footer' => __('JayBee Footer Navbar')
        ]
    );
}
add_action('init', 'add_navbar');

// EOF

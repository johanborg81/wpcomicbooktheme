<?php

/**
 * Include all function files here.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
} 

require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/dashboard-functions.php';
require_once get_template_directory() . '/inc/menus.php';
require_once get_template_directory() . '/inc/customizer/customizer.php';
// Custom Single comic page functions
require_once get_template_directory() . '/inc/posts/jaybee_comics/customizer.php';
// Custom navbar customizer
require_once get_template_directory() . '/inc/customizer/customizer_navbar.php';

// Custom archive functions
require_once get_template_directory() . '/inc/archives-functions.php';

// Custom footer functions
require_once get_template_directory() . '/inc/customizer/footer-customizer.php';

/**
 * Custom post type files
 */
require_once get_template_directory() . '/inc/posts/jaybee_comics/functions.php';
require_once get_template_directory() . '/inc/posts/characters/functions.php';

// EOF

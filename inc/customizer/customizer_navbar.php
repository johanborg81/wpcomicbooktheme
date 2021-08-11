<?php

/**
 * Navigation bar customizer 
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class to handle the Navigation bar customizer
 */
class NavigationCustomizer {
    /**
     * Initializing of the customizer
     * 
     * @package jaybeecomictheme
     * @author Johan Borg
     * @access public
     */
    public function __construct() {
        add_action('customize_register', [$this, 'jaybee_customizer_navbar']);
        add_action('wp_head', [$this, 'jaybee_navbar_style']);
    }

    /**
     * Customize function for the navbar
     * 
     * @package jaybeecomictheme
     * @author Johan Borg 
     * @access public
     */
    public function jaybee_customizer_navbar($wp_customize) {
        $wp_customize->add_section('custom_navbar', [
            'title'         => __('JayBee Navbar Section', 'jaybeecomictheme'),
            'description'   => sprintf(__('Customize the navbar')),
            'priority'      => 221
        ]);

        // Change the background color of the Navbar
        $wp_customize->add_setting('navbar_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navbar_color', [
            'label'     => __('Background Color', 'jaybeecomictheme'),
            'section'   => 'custom_navbar',
            'settings'  => 'navbar_color',
            'priority'  => 1
        ]));

        // Change menu text color
        $wp_customize->add_setting('navbar_text_color', [
            'default'   => '#fcfbfa',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navbar_text_color', [
            'label'     => __('Navbar Text Color', 'jaybeecomictheme'),
            'section'   => 'custom_navbar',
            'settings'  => 'navbar_text_color',
            'priority'  => 2
        ]));
    }

    /**
     * Adding style dynamically in the customizer
     * 
     * @package jaybeecomictheme
     * @author Johan Borg
     * @access public
     */
    public function jaybee_navbar_style() {
        ?>
            <style type="text/css">
                .navbar {background: <?= get_theme_mod('navbar_color', '#1A3263'); ?>;}
                .side__nav {background: <?= get_theme_mod('navbar_color', '#1A3263'); ?>;}
                .navbar a {color: <?= get_theme_mod('navbar_text_color', '#fcfbfa'); ?>;}

            </style>
        <?php
    }
}

$comic_navbar = new NavigationCustomizer();
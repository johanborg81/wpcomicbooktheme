<?php

/**
 * This is the main header for all front-end files.
 * The main navigation bar is included in this file.
 * Include it in every using get_header()
 * 
 * @package jaybeecomictheme
 * 
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly.
    exit;
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name');
            wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <nav class="navbar">
        <span class="navbar__slider">
            <a href="#" class="sidemenu__open">
                <i class="fas fa-bars"></i>
            </a>
        </span>
        <div class="navbar__nav">
            <div class="navbar__logo">
                <a href="<?= esc_url(home_url('/')); ?>"><img src="<?= get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt=""></a>
            </div>
            <?php

            wp_nav_menu([
                'theme_location'    => 'jaybee-navbar'
            ]);

            ?>
        </div>
        <div class="navbar__logo_mob">
            <a href="<?= esc_url(home_url('/')); ?>"><img src="<?= get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt=""></a>
        </div>
    </nav>
    <div id="navbar__side-menu" class="side__nav">
        <a class="btn__close sidemenu__close" href="#">&times;</a>
        <?php

        wp_nav_menu([
            'theme_location'    => 'jaybee-navbar'
        ]);

        ?>
    </div>
    <div id="main">
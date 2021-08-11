<?php

/**
 * The fallback page template. 
 * If no other page template is loaded it will fall back to this file.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

if (have_posts()): 
    while (have_posts()) : the_post();
        the_post_thumbnail();
        the_title();
        the_content();
    endwhile;
endif;

// EOF

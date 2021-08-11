<?php

/**
 * Functions for the custom archive page.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

function show_last_pages() {
    $last_posts = intval(get_post_meta($post->ID, 'comics', true));

    if ($last_posts > 200 || $last_posts < 2) $last_posts = 15;

    $my_query = new WP_QUERY('post_type=comics&nopaging=1');

    if ($my_query->have_posts()) :

    ?>
        <h2>Last <?= $last_posts; ?> Comic Pages</h2>
        <div class="latest">
            <ol>
            <?php

            $counter = 1;

            while ($my_query->have_posts() && $counter <= $last_posts) :
                $my_query->the_post();

            ?>
                <li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php
            
            $counter++;

            endwhile;

            ?>
            </ol>
        </div>
    <?php

    wp_reset_postdata();
    endif;
}

/**
 * Show comic pages after months.
 * 
 * @author Jaybee studios
 * @since 1.0.0
 */
function show_pages_by_months() {
    $args = [
        'type'      => 'monthly',
        'format'    => 'custom',
        'after'     => ' | ',
        'post_type' => 'comics'
    ];

    wp_get_archives($args);
}

// EOF

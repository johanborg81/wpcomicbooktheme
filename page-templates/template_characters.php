<?php

/**
 * The character template.
 * Change the layout of the characters page here.
 * 
 * @package jaybeecomictheme
 * 
 * Template Name: Character Page
 * Character Pages Template
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

get_header();

?>
<div class="container">
    <section class="section section__characters">
    <?php

    if (have_posts()) :

        while(have_posts()) : the_post();
            get_template_part('content/content', 'template_character');    
        endwhile;
    endif;
    
    ?>
    </section>
</div>
<?php

get_footer();

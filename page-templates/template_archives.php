<?php

/**
 * The archive for the comic pages.
 * Change the layout of the archive page here.
 * 
 * @package jaybeecomictheme
 * 
 * Template Name: Archive Page Comic Pages
 * Archive Comic Pages Template
 */

get_header();

?>
<div class="container">
    <section class="section section__archive">
        <?php

        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('content/content', 'template_archive');
            endwhile;
        endif;

        ?>
    </section>
</div>
<?php

get_footer();

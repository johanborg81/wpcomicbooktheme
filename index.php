<?php

/**
 * The main template file
 * 
 * This page is a fallback page if all other files fails to load.
 * @package jaybeecomictheme
 * @since 1.0.0
 * 
 * Index Page
 */

get_header();
?>
<div class="container">
    <section class="section section__container">
        <?php

        // if (have_posts()) :
        //     while (have_posts()) : the_post();
        //         get_template_part('content/content', 'template_archive');
        //     endwhile;
        // endif;

        ?>
    </section>
</div>
<?php

get_footer();

// EOF

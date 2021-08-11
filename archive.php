<?php

/**
 * The fallback template to display the archive.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */
get_header();

?>
<div class="container">
    <div class="content__archive">


        <h2><?php single_month_title(' '); ?></h2>
        <?php

        if (have_posts()) :
            while (have_posts()) : the_post();

        ?>
                <ul>
                    <li>
                        <a href="<?= the_permalink(); ?>">
                            <?php


                            the_post_thumbnail();
                            the_title();
                            the_content();

                            ?>
                        </a>
                    </li>
                </ul>
        <?php

            endwhile;
        endif;

        ?>
    </div>
    <div class="content__archive-months">
        <?php

        // From archives-functions.php
        show_pages_by_months();

        ?>
    </div>
</div>
<?php

get_footer();

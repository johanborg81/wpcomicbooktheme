<?php

/**
 * This is the post template for the individual comic page.
 * Here you can customize the look of your comic book pages.
 * 
 * @package jaybeecomictheme
 *  
 * Comic Post Template
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly.
    exit;
}

get_header();

?>
<div class="container">
    <section class="ad__top section"></section>
    <div class="ad__left"></div>
    <section class="section section__container">
<?php
    if (have_posts()) : 
        while (have_posts()) : the_post();
?>
    <h2><?php //the_title(); ?></h2>
    <div class="comic__page">
        <?php //the_content(); ?>
    </div>
    <?php

    endwhile;
    wp_reset_postdata();
    endif;

    ?>
    <div class="page__pagination">
        <p>Pagination here</p>
    </div>
    </section>
    <div class="ad__right"></div>
    <section class="section section__social">
        Share buttons here
    </section>
    <section class="comic__footer section">
        <div class="page__links">
            <div class="square__store">
                Link to store
            </div>
            <div class="square__news">
                A news link here
            </div>
        </div>
    </section>
</div>
<?php

get_footer();

// EOF

<?php

/**
 * Single comic page layout.
 * Change the layout of your comic pages here.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

get_header();

?>
<div class="container">
    <section class="section section__comic">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
                <h2><?php the_title(); ?></h2>
                <div class="comic__page">
                    <?php

                    $my_page = get_post_meta(get_the_ID(), '_jaybee_comics_pages_field', true);

                    if (!empty($my_page)) : ?>
                        <img src="<?php echo $my_page; ?>" alt="">

                    <?php

                    endif;

                    ?>
                </div>
                <div class="comic__description">
                    <?php

                    $my_description = get_post_meta(get_the_ID(), '_jaybee_comics_field', true);

                    if (!empty($my_description)) : ?>
                        <p><?= $my_description; ?></p>

                    <?php
                    endif;

                    ?>
                </div>
        <?php

            endwhile;
            wp_reset_postdata();
        endif;

        ?>
        <div class="page__pagination">
            <?php
            previous_post_link();
            ?>
            <p> | </p>
            <?php
            next_post_link();
            ?>
        </div>
    </section>
    <?php if (get_theme_mod('archive_social_media_display', 'show') == 'show') : ?>
        <section class="section section__social">
            <div class="contact__social-media">
                <?php if (get_theme_mod('archive_social_media_icon_1_display', 'show') == 'show') : ?>
                    <a class="comic_social_icon_one" href="<?= get_theme_mod('url_one', '#'); ?>"><?= get_theme_mod('social_media_fb', '<i class="fab fa-facebook-square"></i>'); ?></a>
                <?php endif; ?>
                <?php if (get_theme_mod('archive_social_media_icon_2_display', 'show') == 'show') : ?>
                    <a class="comic_social_icon_two" href="<?= get_theme_mod('url_two', '#'); ?>"><?= get_theme_mod('social_media_insta', '<i class="fab fa-instagram-square"></i>'); ?></a>
                <?php endif; ?>
                <?php if (get_theme_mod('archive_social_media_icon_3_display', 'show') == 'show') : ?>
                    <a class="comic_social_icon_three" href="<?= get_theme_mod('url_three', '#'); ?>"><?= get_theme_mod('social_media_pinterest', '<i class="fab fa-pinterest-square"></i>'); ?></a>
                <?php endif; ?>
                <?php if (get_theme_mod('archive_social_media_icon_4_display', 'show') == 'show') : ?>
                    <a class="comic_social_icon_four" href="<?= get_theme_mod('url_four', '#'); ?>"><?= get_theme_mod('social_media_twitter', '<i class="fab fa-tumblr-square"></i>'); ?></a>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <section class="comic__footer section">
        <div class="page__links">
            <?php if (get_theme_mod('archive_store_display', 'show') == 'show') : ?>
                <div class="square__store">
                    <a href="<?= get_theme_mod('store_url', '#'); ?>"><?= get_theme_mod('store_name', 'Link to store'); ?></a>
                </div>
            <?php endif; ?>
            <?php if (get_theme_mod('archive_news_display', 'show') == 'show') : ?>
                <div class="square__news">
                    <a href="<?= get_theme_mod('news_url', '#'); ?> "><?= get_theme_mod('news_title', 'A news link here'); ?></a>
                </div>
            <?php endif; ?>
            <?php if (get_theme_mod('archive_custom_links_display', 'show') == 'show') : ?>
                <div class="square__custom-links">
                    <?php if (get_theme_mod('archive_custom_links_one_display', 'show') == 'show') : ?>
                        <a href="<?= get_theme_mod('custom_url_one', '#') ?>"><?= get_theme_mod('custom_link_one', 'Your link 1'); ?></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('archive_custom_links_two_display', 'show') == 'show') : ?>
                        <a href="<?= get_theme_mod('custom_url_two', '#') ?>"><?= get_theme_mod('custom_link_two', 'Your link 2'); ?></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('archive_custom_links_three_display', 'show') == 'show') : ?>
                        <a href="<?= get_theme_mod('custom_url_three', '#') ?>"><?= get_theme_mod('custom_link_three', 'Your link 3'); ?></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('archive_custom_links_four_display', 'show') == 'show') : ?>
                        <a href="<?= get_theme_mod('custom_url_four', '#') ?>"><?= get_theme_mod('custom_link_four', 'Your link 4'); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>
<?php

get_footer();

// EOF

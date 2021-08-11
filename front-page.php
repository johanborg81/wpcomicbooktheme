<?php

/**
 * This is the custom front-page for this theme.
 * All the customizations on this page happens in the customizer.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */
get_header();

?>
<!-- Header Section -->
<header class="showcase" style="background-image: url(<?= get_theme_mod('header_image', get_template_directory_uri() . '/assets/img/header-pic.jpg'); ?>)" ;>
    <div class="container showcase__inner">
        <h2><?= get_theme_mod('header_text', 'The most amazing comic you have ever read!'); ?></h2>
    </div>
</header>

<!-- Text Section -->
<div class="container">
    <?php if (get_theme_mod('cta_section_display', 'show') == 'show') : ?>
        <section class="section">
            <div class="section__container section__three-parts">
                <?php if (get_theme_mod('cta_section_one_display', 'show') == 'show') : ?>
                    <div class="section__left">
                        <h3><?= get_theme_mod('cta_heading_1', 'Read From Start'); ?></h3>
                        <a href="<?= the_permalink(get_theme_mod('cta_btn_link_1')); ?>" class="btn btn__link custom__btn-one"><?= get_theme_mod('cta_btn_text_1', 'Read'); ?></a>
                    </div>
                <?php endif; ?>
                <?php if (get_theme_mod('cta_section_two_display', 'show') == 'show') : ?>
                    <div class="section__middle">
                        <h3><?= get_theme_mod('cta_heading_2', 'Latest Page'); ?></h3>
                        <a href="<?= get_permalink(get_theme_mod('cta_btn_link_2')); ?>" class="btn btn__link custom__btn-two"><?= get_theme_mod('cta_btn_text_2', 'Read'); ?></a>
                    </div>
                <?php endif; ?>
                <?php if (get_theme_mod('cta_section_three_display', 'show') == 'show') : ?>
                    <div class="section__right">
                        <h3><?= get_theme_mod('cta_heading_3', 'Buy my stuff'); ?></h3>
                        <a href="<?= get_permalink(get_theme_mod('cta_btn_link_3')); ?>" class="btn btn__link custom__btn-three"><?= get_theme_mod('cta_btn_text_3', 'Buy Now'); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <!-- About The Comic Section -->
    <?php if (get_theme_mod('about_section_display', 'show') == 'show') : ?>
        <section class="section section__about">
            <h3><?= get_theme_mod('about_title', 'About the Comic'); ?></h3>
            <p><?= get_theme_mod('about_desc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore animi non delectus eius expedita obcaecati provident dolore quisquam omnis recusandae!'); ?></p>
        </section>
    <?php endif; ?>
    <!-- The Author Section -->
    <?php if (get_theme_mod('author_section_display', 'show') == 'show') : ?>
        <section class="section section__about">
            <h3><?= get_theme_mod('author_name', 'The Author'); ?></h3>
            <div class="grid">
                <div class="grid__left">
                    <img src="<?= get_theme_mod('author_img', get_template_directory_uri() . '/assets/img/profile_man_beard.jpg'); ?>" alt="">
                </div>
                <div class="grid__right">
                    <p><?= get_theme_mod('author_desc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, officiis! Natus qui totam, quia aperiam atque corrupti sit blanditiis eos.') ?></p>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Sales Promotion -->
    <?php if (get_theme_mod('promotion_section_display', 'show') == 'show') : ?>
        <section class="section section__about">
            <h3><?= get_theme_mod('promotion_title', 'Promotion'); ?></h3>
            <div class="grid">
                <div class="grid__left">
                    <p><?= get_theme_mod('promotion_desc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, deserunt quasi sint doloremque aliquam odit doloribus quia consequuntur debitis quidem.'); ?></p>
                </div>
                <div class="grid__right">
                    <img src="<?= get_theme_mod('promotion_img', get_template_directory_uri() . '/assets/img/profile_man_beard.jpg'); ?>" alt="">
                </div>
            </div>
            <a href="<?= get_theme_mod('promotion_btn_link'); ?>" class="btn btn__link custom__btn-promo"><?= get_theme_mod('promotion_btn_text', 'Get It'); ?></a>
        </section>
    <?php endif; ?>
    <!-- News -->
    <?php if (get_theme_mod('news_section_display', 'show') == 'show') : ?>
        <section class="section section__about">
            <div class="blog">
                <h3><?= get_theme_mod('custom_news_title', 'Lorem Ipsum'); ?></h3>
                <p><?= get_theme_mod('news_text', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur, minus.'); ?></p>
            </div>
        </section>
    <?php endif; ?>
    <!-- Contact Section -->
    <?php if (get_theme_mod('contact_section_display', 'show') == 'show') : ?>
        <section class="section section__contact">
            <h3><?= get_theme_mod('contact_section_title', 'Contact'); ?></h3>
            <p><?= get_theme_mod('contact_section_intro', 'Drop me a message or get in touch on social media'); ?></p>
            <div class="contact__social-media">
                <?php if (get_theme_mod('social_media_icon_1_display', 'show') == 'show') : ?>
                    <a class="contact__color-social-one" href="<?= get_theme_mod('contact_url_one', '#'); ?>"><?= get_theme_mod('contact_social_media_icon_1', '<i class="fab fa-facebook-square"></i>'); ?></a>
                <?php endif; ?>
                <?php if (get_theme_mod('social_media_icon_2_display', 'show') == 'show') : ?>
                    <a class="contact__color-social-two" href="<?= get_theme_mod('contact_url_two', '#'); ?>"><?= get_theme_mod('contact_social_media_icon_2', '<i class="fab fa-instagram-square"></i>'); ?></a>
                <?php endif; ?>
                <?php if (get_theme_mod('social_media_icon_3_display', 'show') == 'show') : ?>
                    <a class="contact__color-social-three" href="<?= get_theme_mod('contact_url_three', '#'); ?>"><?= get_theme_mod('contact_social_media_icon_3', '<i class="fab fa-pinterest-square"></i>'); ?></a>
                <?php endif; ?>
                <?php if (get_theme_mod('social_media_icon_4_display', 'show') == 'show') : ?>
                    <a class="contact__color-social-four" href="<?= get_theme_mod('contact_url_four', '#'); ?>"><?= get_theme_mod('contact_social_media_icon_4', '<i class="fab fa-tumblr-square"></i>'); ?></a>
                <?php endif; ?>
            </div>
            <?php if (get_theme_mod('contact_email_address_display', 'show') == 'show') : ?>
                <div class="contact__email">
                    <a href="mailto:<?= get_theme_mod('contact_email_address_text', 'contact@mail.com'); ?>"><?= get_theme_mod('contact_email_address_text', 'contact@mail.com'); ?></a>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>
</div>

<?php

get_footer();

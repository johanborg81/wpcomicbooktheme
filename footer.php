<?php

/**
 * The footer template.
 * Contains the opening of the footer div and all the footer content.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

?>
<footer>
    <div class="footer">
        <?php if (get_theme_mod('footer_menu_display', 'show') == 'show') : ?>
            <section class="footer__left">
                <?php

                wp_nav_menu([
                    'theme_location' => 'jaybee-footer'
                ]);

                ?>
            </section>
        <?php endif; ?>
        <?php if (get_theme_mod('footer_email_display', 'show') == 'show') : ?>
            <section class="footer__middle">
                <a href="mailto:<?= get_theme_mod('contact_email', 'contact@mymail.com'); ?>"><?= get_theme_mod('contact_email', 'contact@mymail.com'); ?></a>
            </section>
        <?php endif; ?>
        <?php if (get_theme_mod('footer_icon_display', 'show') == 'show') : ?>
            <section class="footer__right">
                <div class="contact__social-media">
                    <a href="<?= get_theme_mod('footer_url_one', '#'); ?>"><?= get_theme_mod('footer_social_media_fb', '<i class="fab fa-facebook-square"></i>'); ?></a>
                    <a href="<?= get_theme_mod('footer_url_two', '#'); ?>"><?= get_theme_mod('footer_social_media_insta', '<i class="fab fa-instagram-square"></i>'); ?></a>
                    <a href="<?= get_theme_mod('footer_url_three', '#'); ?>"><?= get_theme_mod('footer_social_media_pinterest', '<i class="fab fa-pinterest-square"></i>'); ?></a>
                    <a href="<?= get_theme_mod('footer_url_four', '#'); ?>"><?= get_theme_mod('footer_social_media_twitter', '<i class="fab fa-twitter-square"></i>'); ?></a>
                </div>
            </section>
        <?php endif; ?>
    </div>
    <?php if (get_theme_mod('footer_copyright_display', 'show') == 'show') : ?>
        <div class="copyright">
            <p>Copyright&copy <?= get_theme_mod('footer_copyright_year', '2021'); ?> <?= get_theme_mod('footer_copyright_name', 'JayBee Studios'); ?></p>
        </div>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>
</div>

</body>

</html>
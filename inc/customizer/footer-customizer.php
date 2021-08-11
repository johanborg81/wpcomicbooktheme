<?php

/**
 * Front-end footer customizer functions here. 
 * Everything that is customizable on the front-page is controlled from here.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class FooterCustomizer
{
    /**
     * Initializing customizer function for the footer.
     * 
     * @access public
     * @author Johan Borg
     */
    public function __construct()
    {
        // Register action
        add_action('customize_register', [$this, 'jaybee_comic_footer_customizer']);
        add_action('wp_head', [$this, 'jaybee_customizer_color']);
    }

    /**
     * Customizer function for the footer
     * 
     * @access public
     * @author Johan Borg
     * @param WP_Customize_Manager $wp_customize
     */
    public function jaybee_comic_footer_customizer($wp_customize)
    {
        $wp_customize->add_section('jaybee_comic_footer', [
            'title'         => __('Footer', 'jaybeecomictheme'),
            'description'   => sprintf(__('Customize the footer')),
            'priority'      => 265
        ]);

        // Custom background color
        $wp_customize->add_setting('footer_bckg_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bckg_color', [
            'label'     => __('Background Color', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_bckg_color',
            'priority'  => 1
        ]));

        // Custom menu color
        $wp_customize->add_setting('footer_menu_color', [
            'default'   => '#E8E2DB',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_menu_color', [
            'label'     => __('Footer Menu Color', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_menu_color',
            'priority'  => 2
        ]));

        // Hide/Show button footer menu
        $wp_customize->add_setting('footer_menu_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('footer_menu_display', [
            'label'     => __('Show or Hide Footer menu', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_menu_display',
            'priority'  => 3,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Button',
                'hide'  => 'Hide Button'
            ]
        ]);

        // Hide/Show button footer email
        $wp_customize->add_setting('footer_email_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('footer_email_display', [
            'label'     => __('Show or Hide Footer email', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_email_display',
            'priority'  => 4,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Button',
                'hide'  => 'Hide Button'
            ]
        ]);

        // Custom contact email color
        $wp_customize->add_setting('footer_contact_email', [
            'default'   => '#E8E2DB',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_contact_email', [
            'label'     => __('Footer Email Color', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_contact_email',
            'priority'  => 5
        ]));

        // Custom contact email
        $wp_customize->add_setting('contact_email', [
            'default'   => _x('contact@myemail.com', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('contact_email', [
            'label'         => __('Your Email', 'jaybeecomictheme'),
            'description'   => sprintf(__('Your contact email', 'jaybeecomictheme')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 6
        ]);

        // Custom social media icon color
        $wp_customize->add_setting('footer_social_media_color', [
            'default'   => '#E8E2DB',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_social_media_color', [
            'label'     => __('Footer Social Media Icon Color', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_social_media_color',
            'priority'  => 7
        ]));

        // Hide/Show button footer social media icons
        $wp_customize->add_setting('footer_icon_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('footer_icon_display', [
            'label'     => __('Show or Hide Footer icons', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_icon_display',
            'priority'  => 8,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Button',
                'hide'  => 'Hide Button'
            ]
        ]);

        // Footer social media links
        $wp_customize->add_setting('footer_social_media_fb', [
            'default'   => _x('<i class="fab fa-facebook-square"></i>', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_social_media_fb', [
            'label'         => __('Social Media Links 1', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 9,
            'type'          => 'select',
            'choices'       => [
                'default'   => '<i class="fab fa-facebook-square"></i>',
                '<i class="fab fa-facebook-square"></i>'    => 'Facebook',
                '<i class="fab fa-twitter-square"></i>'     => 'Twitter',
                '<i class="fab fa-pinterest-square"></i>'   => 'Pinterest',
                '<i class="fab fa-instagram"></i>'          => 'Instagram'
            ]
        ]));

        // Set the url for icon 1
        $wp_customize->add_setting('footer_url_one', [
            'default'       => _x('http://www.facebook.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('footer_url_one', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 10
        ]);

        // Set icon 2
        $wp_customize->add_setting('footer_social_media_insta', [
            'default'       => _x('<i class="fab fa-instagram"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_social_media_insta', [
            'label'         => __('Social Media Links 2', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 11,
            'type'          => 'select',
            'choices'       => [
                'default'   => '<i class="fab fa-instagram"></i>',
                '<i class="fab fa-facebook-square"></i>'    => 'Facebook',
                '<i class="fab fa-twitter-square"></i>'     => 'Twitter',
                '<i class="fab fa-pinterest-square"></i>'   => 'Pinterest',
                '<i class="fab fa-instagram"></i>'          => 'Instagram'
            ]
        ]));

        // Set the color for icon 2
        $wp_customize->add_setting('footer_url_two', [
            'default'       => _x('http://www.instagram.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('footer_url_two', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 12
        ]);

        // Set icon 3
        $wp_customize->add_setting('footer_social_media_pinterest', [
            'default'       => _x('<i class="fab fa-pinterest-square"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_social_media_pinterest', [
            'label'         => __('Social Media Links 3', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 13,
            'type'          => 'select',
            'choices'       => [
                'default'   => '<i class="fab fa-pinterest-square"></i>',
                '<i class="fab fa-facebook-square"></i>'    => 'Facebook',
                '<i class="fab fa-twitter-square"></i>'     => 'Twitter',
                '<i class="fab fa-pinterest-square"></i>'   => 'Pinterest',
                '<i class="fab fa-instagram"></i>'          => 'Instagram'
            ]
        ]));

        // Set the url for icon 3
        $wp_customize->add_setting('footer_url_three', [
            'default'       => _x('http://www.pinterest.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('footer_url_three', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 14
        ]);

        // Set the icon 4
        $wp_customize->add_setting('footer_social_media_twitter', [
            'default'       => _x('<i class="fab fa-twitter-square"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_social_media_twitter', [
            'label'         => __('Social Media Links 4', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 15,
            'type'          => 'select',
            'choices'       => [
                'default'   => '<i class="fab fa-twitter-square"></i>',
                '<i class="fab fa-facebook-square"></i>'    => 'Facebook',
                '<i class="fab fa-twitter-square"></i>'     => 'Twitter',
                '<i class="fab fa-pinterest-square"></i>'   => 'Pinterest',
                '<i class="fab fa-instagram"></i>'          => 'Instagram'
            ]
        ]));

        // Set the url for icon 4
        $wp_customize->add_setting('footer_url_four', [
            'default'       => _x('http://www.twitter.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('footer_url_four', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 16
        ]);

        // Custom copyright color
        $wp_customize->add_setting('footer_copyright_color', [
            'default'   => '#E8E2DB',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_copyright_color', [
            'label'     => __('Footer Copyright Color', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_copyright_color',
            'priority'  => 17
        ]));

        // Hide/Show button copyright
        $wp_customize->add_setting('footer_copyright_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('footer_copyright_display', [
            'label'     => __('Show or Hide Copyright', 'jaybeecomictheme'),
            'section'   => 'jaybee_comic_footer',
            'settings'  => 'footer_copyright_display',
            'priority'  => 18,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Button',
                'hide'  => 'Hide Button'
            ]
        ]);

        // Copyright
        $wp_customize->add_setting('footer_copyright_year', [
            'default'       => _x('2021', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('footer_copyright_year', [
            'label'         => __('Copyright', 'jaybeecomictheme'),
            'description'   => sprintf(__('Copyright year', 'jaybeecomictheme')),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 19
        ]);

        // Set the copyright holder
        $wp_customize->add_setting('footer_copyright_name', [
            'default'       => _x('JayBee Studios', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('footer_copyright_name', [
            'label'         => __('Copyright Name', 'jaybeecomictheme'),
            'description'   => sprintf('Add the name of the copyright holder', 'jaybeecomictheme'),
            'section'       => 'jaybee_comic_footer',
            'priority'      => 20
        ]);
    }

    /**
     * Adding style dynamically in the customizer
     *
     * @access public
     * @author Johan Borg
     */
    public function jaybee_customizer_color()
    {
    ?>
        <style type="text/css">
            footer {
                background: <?= get_theme_mod('footer_bckg_color', '#1A3263'); ?>;
            }

            .footer__left ul li a {
                color: <?= get_theme_mod('footer_menu_color', '#E8E2DB'); ?>;
            }

            .footer__middle a {
                color: <?= get_theme_mod('footer_contact_email', '#E8E2DB'); ?>;
            }

            .footer__right a {
                color: <?= get_theme_mod('footer_social_media_color', '#E8E2DB'); ?>;
            }

            .copyright p {
                color: <?= get_theme_mod('footer_copyright_color', '#E8E2DB'); ?>;
            }
        </style>
<?php
    }
}

$comic_footer = new FooterCustomizer();

// EOF

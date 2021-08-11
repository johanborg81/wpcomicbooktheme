<?php

/**
 * Single-comic customizer functions here.
 * Everything that is customizable on the single comic page is controlled from here.
 * 
 * @package jaybeecomictheme
 * @author Johan <johanborg81@hotmail.com>
 * @since 1.0.0
 */

//  Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class SingleComic
{
    /**
     * Initializing of the customizer function.
     *
     * @access public
     * @author Johan Borg
     */
    public function __construct()
    {
        // Register action
        add_action('customize_register', [$this, 'jaybee_comic_customizer_options']);
        add_action('wp_head', [$this, 'custom_single_comic_styling']);
    }

    /**
     * Customizer functions for the single comic page
     * 
     * @access public
     * @author Johan Borg
     * @param WP_Customize_Manager $wp_customize
     */
    public function jaybee_comic_customizer_options($wp_customize)
    {
        // Add the single comic page section
        $wp_customize->add_section('single_comic', [
            'title'         => __('Single Comic Page Social media', 'jaybeecomictheme'),
            'description'   => sprintf(__('Customize the comic page')),
            'priority'      => 261
        ]);

        // Show or hide social media section
        $wp_customize->add_setting('archive_social_media_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_social_media_display', [
            'label'     => __('Show or Hide social media section', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_display',
            'priority'  => 1,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Social media section',
                'hide'  => 'Hide Social media section'
            ]
        ]);

        // Add icon 1
        $wp_customize->add_setting('social_media_fb', [
            'default'   => _x('<i class="fab fa-facebook-square"></i>', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'social_media_fb', [
            'label'         => __('Social Media Links 1', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'single_comic',
            'priority'      => 2,
            'type'          => 'select',
            'choices'       => [
                'default'   => '<i class="fab fa-facebook-square"></i>',
                '<i class="fab fa-facebook-square"></i>'    => 'Facebook',
                '<i class="fab fa-twitter-square"></i>'     => 'Twitter',
                '<i class="fab fa-pinterest-square"></i>'   => 'Pinterest',
                '<i class="fab fa-instagram"></i>'          => 'Instagram'
            ]
        ]));

        // Add url for icon 1
        $wp_customize->add_setting('url_one', [
            'default'       => _x('http://www.facebook.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('url_one', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'single_comic',
            'priority'      => 3
        ]);

        // Set the color on icon 1
        $wp_customize->add_setting('archive_social_media_color_1', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'archive_social_media_color_1', [
            'label'     => __('Social media icon color 1', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_color_1',
            'priority'  => 4
        ]));

        // Show or hide icon 1
        $wp_customize->add_setting('archive_social_media_icon_1_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_social_media_icon_1_display', [
            'label'     => __('Show or Hide social media icon 1', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_icon_1_display',
            'priority'  => 5,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Social media icon 1',
                'hide'  => 'Hide Social media icon 1'
            ]
        ]);

        // Set icon 2
        $wp_customize->add_setting('social_media_insta', [
            'default'       => _x('<i class="fab fa-instagram"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'social_media_insta', [
            'label'         => __('Social Media Links 2', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'single_comic',
            'priority'      => 6,
            'type'          => 'select',
            'choices'       => [
                'default'   => '<i class="fab fa-instagram"></i>',
                '<i class="fab fa-facebook-square"></i>'    => 'Facebook',
                '<i class="fab fa-twitter-square"></i>'     => 'Twitter',
                '<i class="fab fa-pinterest-square"></i>'   => 'Pinterest',
                '<i class="fab fa-instagram"></i>'          => 'Instagram'
            ]
        ]));

        // Set the url for icon 2
        $wp_customize->add_setting('url_two', [
            'default'       => _x('http://www.instagram.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('url_two', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'single_comic',
            'priority'      => 7
        ]);

        // Set the color on icon 2
        $wp_customize->add_setting('archive_social_media_color_2', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'archive_social_media_color_2', [
            'label'     => __('Social media icon color 2', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_color_2',
            'priority'  => 8
        ]));

        // Show or hide icon 2
        $wp_customize->add_setting('archive_social_media_icon_2_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_social_media_icon_2_display', [
            'label'     => __('Show or Hide social media icon 2', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_icon_2_display',
            'priority'  => 9,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Social media icon 2',
                'hide'  => 'Hide Social media icon 2'
            ]
        ]);

        // Set icon 3
        $wp_customize->add_setting('social_media_pinterest', [
            'default'       => _x('<i class="fab fa-pinterest-square"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'social_media_pinterest', [
            'label'         => __('Social Media Links 3', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'single_comic',
            'priority'      => 10,
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
        $wp_customize->add_setting('url_three', [
            'default'       => _x('http://www.pinterest.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('url_three', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'single_comic',
            'priority'      => 11
        ]);

        // Set the color on icon 3
        $wp_customize->add_setting('archive_social_media_color_3', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'archive_social_media_color_3', [
            'label'     => __('Social media icon color 3', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_color_3',
            'priority'  => 12
        ]));

        // Show or hide icon 3
        $wp_customize->add_setting('archive_social_media_icon_3_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_social_media_icon_3_display', [
            'label'     => __('Show or Hide social media icon 3', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_icon_3_display',
            'priority'  => 13,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Social media icon 3',
                'hide'  => 'Hide Social media icon 3'
            ]
        ]);

        // Set icon 4
        $wp_customize->add_setting('social_media_twitter', [
            'default'       => _x('<i class="fab fa-twitter-square"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'social_media_twitter', [
            'label'         => __('Social Media Links 4', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'single_comic',
            'priority'      => 14,
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
        $wp_customize->add_setting('url_four', [
            'default'       => _x('http://www.twitter.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('url_four', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'single_comic',
            'priority'      => 15
        ]);

        // Set the color for icon 4
        $wp_customize->add_setting('archive_social_media_color_4', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'archive_social_media_color_4', [
            'label'     => __('Social media icon color 4', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_color_4',
            'priority'  => 16
        ]));

        // Show or hide icon 4
        $wp_customize->add_setting('archive_social_media_icon_4_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_social_media_icon_4_display', [
            'label'     => __('Show or Hide social media icon 4', 'jaybeecomictheme'),
            'section'   => 'single_comic',
            'settings'  => 'archive_social_media_icon_4_display',
            'priority'  => 17,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Social media icon 4',
                'hide'  => 'Hide Social media icon 4'
            ]
        ]);

        // Add store section
        $wp_customize->add_section('the_store', [
            'title'         => __('Add Store to the comic page', 'jaybeecomictheme'),
            'description'   => sprintf(__('Add the name and link to your store')),
            'priority'      => 262
        ]);

        // Show or hide the store
        $wp_customize->add_setting('archive_store_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_store_display', [
            'label'     => __('Show or Hide the store', 'jaybeecomictheme'),
            'section'   => 'the_store',
            'settings'  => 'archive_store_display',
            'priority'  => 1,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show The Store Link',
                'hide'  => 'Hide The Store Link'
            ]
        ]);

        // Set the color
        $wp_customize->add_setting('archive_store_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'archive_store_color', [
            'label'     => __('Store link color', 'jaybeecomictheme'),
            'section'   => 'the_store',
            'settings'  => 'archive_store_color',
            'priority'  => 2
        ]));

        // Set the name
        $wp_customize->add_setting('store_name', [
            'default'   => 'My Store',
            'type'      => 'theme_mod',
        ]);

        $wp_customize->add_control('store_name', [
            'label'     => __('Store Name', 'jaybeecomictheme'),
            'section'   => 'the_store',
            'priority'  => 3
        ]);

        // Set the url
        $wp_customize->add_setting('store_url', [
            'default'   => 'http://www.mystore.com',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('store_url', [
            'label'     => __('Store Url', 'jaybeecomictheme'),
            'section'   => 'the_store',
            'priority'  => 4
        ]);

        // Add news link section
        $wp_customize->add_section('news_link', [
            'title'         => __('Add a news link to comic page', 'jaybeecomictheme'),
            'description'   => sprintf(__('Add a link to news about you or your comic.')),
            'priority'      => 263
        ]);

        // Show or hide news section
        $wp_customize->add_setting('archive_news_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_news_display', [
            'label'     => __('Show or Hide the news link', 'jaybeecomictheme'),
            'section'   => 'news_link',
            'settings'  => 'archive_news_display',
            'priority'  => 1,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show The News Link',
                'hide'  => 'Hide The News Link'
            ]
        ]);

        // Set the link color
        $wp_customize->add_setting('archive_news_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'archive_news_color', [
            'label'     => __('News link color', 'jaybeecomictheme'),
            'section'   => 'news_link',
            'settings'  => 'archive_news_color',
            'priority'  => 2
        ]));

        // Set the title
        $wp_customize->add_setting('news_title', [
            'default'       => 'A news link here',
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('news_title', [
            'label'     => __('News Title', 'jaybeecomictheme'),
            'section'   => 'news_link',
            'priority'  => 3
        ]);

        // Set the url
        $wp_customize->add_setting('news_url', [
            'default'   => 'http://www.yourlink.com',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('news_url', [
            'label'     => __('News url', 'jaybeecomictheme'),
            'section'   => 'news_link',
            'priority'  => 4
        ]);

        // Custom links
        $wp_customize->add_section('custom_links', [
            'title'         => __('Add custom links on the comic page', 'jaybeecomictheme'),
            'description'   => sprintf(__('Add any custom links you want here')),
            'priority'      => 264
        ]);

        // Show or hide custom links
        $wp_customize->add_setting('archive_custom_links_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_custom_links_display', [
            'label'     => __('Show or Hide the custom links section', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'archive_custom_links_display',
            'priority'  => 1,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show The Custom Links Section',
                'hide'  => 'Hide The Custom Links Section'
            ]
        ]);

        // Set the name on link 1
        $wp_customize->add_setting('custom_link_one', [
            'default'   => 'Link 1',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_link_one', [
            'label'     => __('Custom Link Title 1', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'priority'  => 2
        ]);

        // Set the url to link 1
        $wp_customize->add_setting('custom_url_one', [
            'default'   => 'http://www.linkhere.com',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_url_one', [
            'label'     => __('Custom url 1', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'priority'  => 3
        ]);

        // Set the color on link 1
        $wp_customize->add_setting('custom_url_one_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_url_one_color', [
            'label'     => __('Custom Link one Color', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'custom_url_one_color',
            'priority'  => 4
        ]));

        // Set the background color on link 1
        $wp_customize->add_setting('custom_url_one_bckg_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_url_one_bckg_color', [
            'label'     => __('Custom Link one Background Color', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'custom_url_one_bckg_color',
            'priority'  => 5
        ]));

        // Show or hide custom link 1
        $wp_customize->add_setting('archive_custom_links_one_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_custom_links_one_display', [
            'label'     => __('Show or Hide custom link one', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'archive_custom_links_one_display',
            'priority'  => 6,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show The Custom Link One',
                'hide'  => 'Hide The Custom Link One'
            ]
        ]);

        // Set link 2
        $wp_customize->add_setting('custom_link_two', [
            'default'   => 'Link 2',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_link_two', [
            'label'     => __('Custom Link Title 2', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'priority'  => 7
        ]);

        // Set the url to link 2
        $wp_customize->add_setting('custom_url_two', [
            'default'   => 'http://www.linkhere.com',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_url_two', [
            'label'     => __('Custom url 2', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'priority'  => 8
        ]);

        // Set the color on link 2
        $wp_customize->add_setting('custom_url_two_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_url_two_color', [
            'label'     => __('Custom Link two Color', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'custom_url_two_color',
            'priority'  => 9
        ]));

        // Set the background color on link 2
        $wp_customize->add_setting('custom_url_two_bckg_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_url_two_bckg_color', [
            'label'     => __('Custom Link two Background Color', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'custom_url_two_bckg_color',
            'priority'  => 10
        ]));

        // Show or hide link 2
        $wp_customize->add_setting('archive_custom_links_two_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_custom_links_two_display', [
            'label'     => __('Show or Hide custom link two', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'archive_custom_links_two_display',
            'priority'  => 11,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show The Custom Link Two',
                'hide'  => 'Hide The Custom Link Two'
            ]
        ]);

        // Set link 3
        $wp_customize->add_setting('custom_link_three', [
            'default'   => 'Link 3',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_link_three', [
            'label'     => __('Custom Link Title 3', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'priority'  => 12
        ]);

        // Set the url for link 3
        $wp_customize->add_setting('custom_url_three', [
            'default'   => 'http://www.linkhere.com',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_url_three', [
            'label'     => __('Custom url 3', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'priority'  => 13
        ]);

        // Set the color on link 3
        $wp_customize->add_setting('custom_url_three_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_url_three_color', [
            'label'     => __('Custom Link three Color', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'custom_url_three_color',
            'priority'  => 14
        ]));

        // Set the background color on link 3
        $wp_customize->add_setting('custom_url_three_bckg_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_url_three_bckg_color', [
            'label'     => __('Custom Link three Background Color', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'custom_url_three_bckg_color',
            'priority'  => 15
        ]));

        // Show or hide link 3
        $wp_customize->add_setting('archive_custom_links_three_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_custom_links_three_display', [
            'label'     => __('Show or Hide custom link three', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'archive_custom_links_three_display',
            'priority'  => 16,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show The Custom Link Three',
                'hide'  => 'Hide The Custom Link Three'
            ]
        ]);

        // Set link 4
        $wp_customize->add_setting('custom_link_four', [
            'default'   => 'Link 4',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_link_four', [
            'label'     => __('Custom Link Title 4', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'priority'  => 17
        ]);

        // Set the url on link 4
        $wp_customize->add_setting('custom_url_four', [
            'default'   => 'http://www.linkhere.com',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_url_four', [
            'label'     => __('Custom url 4', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'priority'  => 18
        ]);

        // Set the color on link 4
        $wp_customize->add_setting('custom_url_four_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_url_four_color', [
            'label'     => __('Custom Link four Color', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'custom_url_four_color',
            'priority'  => 19
        ]));

        // Set the background color on link 4
        $wp_customize->add_setting('custom_url_four_bckg_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_url_four_bckg_color', [
            'label'     => __('Custom Link four Background Color', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'custom_url_four_bckg_color',
            'priority'  => 20
        ]));

        // Show or hide link 4
        $wp_customize->add_setting('archive_custom_links_four_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('archive_custom_links_four_display', [
            'label'     => __('Show or Hide custom link four', 'jaybeecomictheme'),
            'section'   => 'custom_links',
            'settings'  => 'archive_custom_links_four_display',
            'priority'  => 21,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show The Custom Link Four',
                'hide'  => 'Hide The Custom Link Four'
            ]
        ]);
    }

    /**
     * Add styling to the customize functions on the single comic page
     * 
     * @package jaybeecomictheme
     * @author Johan Borg
     * @access public
     */
    public function custom_single_comic_styling()
    {
?>
        <style type="text/css">
            .comic_social_icon_one {
                color: <?= get_theme_mod('archive_social_media_color_1', '#1A3263'); ?>
            }

            .comic_social_icon_two {
                color: <?= get_theme_mod('archive_social_media_color_2', '#1A3263'); ?>
            }

            .comic_social_icon_three {
                color: <?= get_theme_mod('archive_social_media_color_3', '#1A3263'); ?>
            }

            .comic_social_icon_four {
                color: <?= get_theme_mod('archive_social_media_color_4', '#1A3263'); ?>
            }
        </style>
<?php
    }
}

$comic_customizer = new SingleComic();

// EOF

<?php

/**
 * Front-end customizer functions here. 
 * Everything that is customizable on the front-page is controlled from here.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class FrontPageCustomizer
{
    /**
     * Initialization of Front page customizations
     *
     * @author Jaybee Studios
     * @package jaybeecomictheme
     * @access public
     */
    public function __construct()
    {
        add_action('customize_register', [$this, 'jaybee_customizer_options']);
        add_action('wp_head', [$this, 'custom_frontpage_styling']);
    }

    /**
     * Front page customization
     *
     * @author Jaybee Studios
     * @package jaybeecomictheme
     * @access public
     * @param WP_Customize_Manager $wp_customize
     */
    public function jaybee_customizer_options($wp_customize)
    {
        // Main header picture
        $wp_customize->add_section('custom_header', [
            'title'         => __('JayBee Header Section', 'jaybeecomictheme'),
            'description'   => sprintf(__('Customize the Header Section')),
            'priority'      => 220
        ]);

        // Set the Header image
        $wp_customize->add_setting('header_image', [
            'default'   => get_template_directory_uri() . '/assets/img/header-pic.jpg',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_image', [
            'label'     => __('Header Image', 'jaybeecomictheme'),
            'section'   => 'custom_header',
            'settings'  => 'header_image',
            'priority'  => 1
        ]));

        // Main text on the picture.
        $wp_customize->add_setting('header_text', [
            'default'   => _x('The most amazing comic you have ever read!', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('header_text', [
            'label'     => __('Header Text', 'jaybeecomictheme'),
            'section'   => 'custom_header',
            'priority'  => 2
        ]);

        // Color on the main text on the picture
        $wp_customize->add_setting('color_header_text', [
            'default'   => '#000',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_header_text', [
            'label'     => __('Header Text Color', 'jaybeecomictheme'),
            'section'   => 'custom_header',
            'settings'  => 'color_header_text',
            'priority'  => 3
        ]));

        // Set the buttons and links in the CTA section
        $wp_customize->add_section('cta_section', [
            'title'         => __('CTA Section', 'jaybeecomictheme'),
            'description'   => sprintf(__('Set Links and buttons')),
            'priority'      => 230
        ]);

        // Hide or show the cta section
        $wp_customize->add_setting('cta_section_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('cta_section_display', [
            'label'     => __('Show or Hide CTA section', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_section_display',
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show Button',
                'hide'  => 'Hide Button'
            ]
        ]);

        // Set the title for CTA 1
        $wp_customize->add_setting('cta_heading_1', [
            'default'   => _x('Read From Start', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_heading_1', [
            'label'     => __('Header for CTA 1', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_heading_1',
            'priority'  => 1
        ]);

        // Set the title of the button for CTA 1
        $wp_customize->add_setting('cta_btn_text_1', [
            'default'   => _x('Read', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_btn_text_1', [
            'label'     => __('Text for button in section 1', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_btn_text_1',
            'priority'  => 2
        ]);

        // Change background color of button 1
        $wp_customize->add_setting('cta_one_bckg_color', [
            'default'   => '#F5564E',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_one_bckg_color', [
            'label'     => __('Background Color for CTA button 1', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_one_bckg_color',
            'priority'  => 3
        ]));

        // Change color of text on button 1
        $wp_customize->add_setting('cta_one_btn_text_color', [
            'default'   => '#000',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_one_btn_text_color', [
            'label'     => __('Color for CTA button text 1', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_one_btn_text_color',
            'priority'  => 4
        ]));

        // Set the link of the button for CTA 1
        $wp_customize->add_setting('cta_btn_link_1', [
            'default'   => _x('http://www.page.com', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_btn_link_1', [
            'label'     => __('Link for button in section 1', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_btn_link_1',
            'priority'  => 5
        ]);

        // Hide or show the cta section 1
        $wp_customize->add_setting('cta_section_one_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('cta_section_one_display', [
            'label'     => __('Show or Hide CTA section 1', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_section_one_display',
            'type'      => 'radio',
            'priority'  => 6,
            'choices'   => [
                'show'  => 'Show Button',
                'hide'  => 'Hide Button'
            ]
        ]);

        // Title for CTA 2
        $wp_customize->add_setting('cta_heading_2', [
            'default'   => _x('Latest Page', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_heading_2', [
            'label'     => __('Header for CTA 2', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_heading_2',
            'priority'  => 7
        ]);

        // Set the title of the button for CTA 2
        $wp_customize->add_setting('cta_btn_text_2', [
            'default'   => _x('Read', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_btn_text_2', [
            'label'     => __('Text for button in section 2', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_btn_text_2',
            'priority'  => 8
        ]);

        // Change background color of button 2
        $wp_customize->add_setting('cta_two_bckg_color', [
            'default'   => '#F5564E',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_two_bckg_color', [
            'label'     => __('Background Color for CTA button 2', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_two_bckg_color',
            'priority'  => 9
        ]));

        // Change color of text on button 2
        $wp_customize->add_setting('cta_two_btn_text_color', [
            'default'   => '#000',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_two_btn_text_color', [
            'label'     => __('Color for CTA button text 2', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_two_btn_text_color',
            'priority'  => 10
        ]));

        // Set the link of the button for CTA 2
        $wp_customize->add_setting('cta_btn_link_2', [
            'default'   => _x('http://www.page.com', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_btn_link_2', [
            'label'     => __('Link for button in section 2', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_btn_link_2',
            'priority'  => 11
        ]);

        // Hide or show the cta section 2
        $wp_customize->add_setting('cta_section_two_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('cta_section_two_display', [
            'label'     => __('Show or Hide CTA section 2', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_section_two_display',
            'type'      => 'radio',
            'priority'  => 12,
            'choices'   => [
                'show'  => 'Show Button',
                'hide'  => 'Hide Button'
            ]
        ]);

        // Title for CTA 3
        $wp_customize->add_setting('cta_heading_3', [
            'default'   => _x('Buy My Stuff', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_heading_3', [
            'label'     => __('Header for CTA 3', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_heading_3',
            'priority'  => 13
        ]);

        // Set the title of the button for CTA 3
        $wp_customize->add_setting('cta_btn_text_3', [
            'default'   => _x('Buy Now', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_btn_text_3', [
            'label'     => __('Text for button in section 3', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_btn_text_3',
            'priority'  => 14
        ]);

        // Change background color of button 3
        $wp_customize->add_setting('cta_three_bckg_color', [
            'default'   => '#F5564E',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_three_bckg_color', [
            'label'     => __('Background Color for CTA button 3', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_three_bckg_color',
            'priority'  => 15
        ]));

        // Change color of text on button 3
        $wp_customize->add_setting('cta_three_btn_text_color', [
            'default'   => '#000',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cta_three_btn_text_color', [
            'label'     => __('Color for CTA button text 3', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_three_btn_text_color',
            'priority'  => 16
        ]));

        // Set the link of the button for CTA 3
        $wp_customize->add_setting('cta_btn_link_3', [
            'default'   => _x('http://www.page.com', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('cta_btn_link_3', [
            'label'     => __('Link for button in section 3', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_btn_link_3',
            'priority'  => 17
        ]);

        // Hide or show the cta section 3
        $wp_customize->add_setting('cta_section_three_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('cta_section_three_display', [
            'label'     => __('Show or Hide CTA section 3', 'jaybeecomictheme'),
            'section'   => 'cta_section',
            'settings'  => 'cta_section_three_display',
            'type'      => 'radio',
            'priority'  => 18,
            'choices'   => [
                'show'  => 'Show Button',
                'hide'  => 'Hide Button'
            ]
        ]);

        // The about section
        $wp_customize->add_section('about_section', [
            'title'         => __('About Section', 'jaybeecomictheme'),
            'description'   => sprintf(__('Set the About section')),
            'priority'      => 240
        ]);

        // The about section title
        $wp_customize->add_setting('about_title', [
            'default'   => _x('About the Comic', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('about_title', [
            'label'     => __('The title', 'jaybeecomictheme'),
            'section'   => 'about_section',
            'settings'  => 'about_title',
            'priority'  => 1
        ]);

        // The about section description
        $wp_customize->add_setting('about_desc', [
            'default'   => _x('Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore animi non delectus eius expedita obcaecati provident dolore quisquam omnis recusandae!', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('about_desc', [
            'label'     => __('Describe the Comic', 'jaybeecomictheme'),
            'section'   => 'about_section',
            'settings'  => 'about_desc',
            'type'      => 'textarea',
            'priority'  => 2
        ]);

        // Hide or show the about section
        $wp_customize->add_setting('about_section_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('about_section_display', [
            'label'     => __('Show or Hide About section', 'jaybeecomictheme'),
            'section'   => 'about_section',
            'settings'  => 'about_section_display',
            'type'      => 'radio',
            'priority'  => 3,
            'choices'   => [
                'show'  => 'Show About Section',
                'hide'  => 'Hide About Section'
            ]
        ]);

        // The author section
        $wp_customize->add_section('author_section', [
            'title'     => __('About the Author', 'jaybeecomictheme'),
            'type'      => 'theme_mod',
            'priority'  => 250
        ]);

        // The author name
        $wp_customize->add_setting('author_name', [
            'default'   => _x('The Author', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('author_name', [
            'label'     => __('The Author Name', 'jaybeecomictheme'),
            'section'   => 'author_section',
            'settings'  => 'author_name',
            'priority'   => 1
        ]);

        // The author picture
        $wp_customize->add_setting('author_img', [
            'default'   => get_template_directory_uri() . '/assets/img/profile_man_beard.jpg',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'author_img', [
            'label'     => __('Author Image', 'jaybeecomictheme'),
            'section'   => 'author_section',
            'settings'  => 'author_img',
            'priority'  => 2
        ]));

        // The author description
        $wp_customize->add_setting('author_desc', [
            'default'   => _x('Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, officiis! Natus qui totam, quia aperiam atque corrupti sit blanditiis eos.', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('author_desc', [
            'label'     => __('The Author Description', 'jaybeecomictheme'),
            'section'   => 'author_section',
            'settings'  => 'author_desc',
            'type'      => 'textarea',
            'priority'  => 3
        ]);

        // Hide or show the author section
        $wp_customize->add_setting('author_section_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('author_section_display', [
            'label'     => __('Show or Hide the Author section', 'jaybeecomictheme'),
            'section'   => 'author_section',
            'settings'  => 'author_section_display',
            'type'      => 'radio',
            'priority'  => 4,
            'choices'   => [
                'show'  => 'Show Author Section',
                'hide'  => 'Hide Author Section'
            ]
        ]);

        // The Promotion section
        $wp_customize->add_section('promotion_section', [
            'title'     => __('Promotion Section', 'jaybeecomictheme'),
            'type'      => 'theme_mod',
            'priority'  => 258
        ]);

        // The Promotion title
        $wp_customize->add_setting('promotion_title', [
            'default'   => _x('Promotion', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('promotion_title', [
            'label'     => __('The Author Name', 'jaybeecomictheme'),
            'section'   => 'promotion_section',
            'settings'  => 'promotion_title',
            'priority'  => 1
        ]);

        // The promotion description
        $wp_customize->add_setting('promotion_desc', [
            'default'   => _x('Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, deserunt quasi sint doloremque aliquam odit doloribus quia consequuntur debitis quidem.', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('promotion_desc', [
            'label'     => __('The Description for the promotion', 'jaybeecomictheme'),
            'section'   => 'promotion_section',
            'settings'  => 'promotion_desc',
            'type'      => 'textarea',
            'priority'  => 2
        ]);

        // The promotion image
        $wp_customize->add_setting('promotion_img', [
            'default'   => get_template_directory_uri() . '/assets/img/profile_man_beard.jpg',
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'promotion_img', [
            'label'     => __('Image for the promotion section', 'jaybeecomictheme'),
            'section'   => 'promotion_section',
            'settings'  => 'promotion_img',
            'priority'  => 3
        ]));

        // Promotion button
        $wp_customize->add_setting('promotion_btn_text', [
            'default'    => _x('Get it', 'jaybeecomictheme'),
            'type'       => 'theme_mode'
        ]);

        $wp_customize->add_control('promotion_btn_text', [
            'label'     => __('Button text', 'jaybeecomictheme'),
            'section'   => 'promotion_section',
            'settings'  => 'promotion_btn_text',
            'priority'  => 4
        ]);

        // Promotion button link
        $wp_customize->add_setting('promotion_btn_link', [
            'default'   => _x('http://www.page.com', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('promotion_btn_link', [
            'label'     => __('Button link', 'jaybeecomictheme'),
            'section'   => 'promotion_section',
            'settings'  => 'promotion_btn_link',
            'priority'  => 5
        ]);

        // Set button background color
        $wp_customize->add_setting('promotion_btn_color', [
            'default'   => '#F5564E',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'promotion_btn_color', [
            'label'     => __('Background color for the button', 'jaybeecomictheme'),
            'section'   => 'promotion_section',
            'settings'  => 'promotion_btn_color',
            'priority'  => 6
        ]));

        // Change the color of the button text
        $wp_customize->add_setting('promotion_btn_text_color', [
            'default'   => '#000',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'promotion_btn_text_color', [
            'label'     => __('Button text color', 'jaybeecomictheme'),
            'section'   => 'promotion_section',
            'settings'  => 'promotion_btn_text_color',
            'priority'  => 7
        ]));

        // Hide or show the promotion section
        $wp_customize->add_setting('promotion_section_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('promotion_section_display', [
            'label'     => __('Show or hide the Promotion section', 'jaybeecomictheme'),
            'section'   => 'promotion_section',
            'settings'  => 'promotion_section_display',
            'type'      => 'radio',
            'priority'  => 8,
            'choices'   => [
                'show'  => 'Show Promotion Section',
                'hide'  => 'Hide Promotion Section'
            ]
        ]);

        // News section
        $wp_customize->add_section('news_section', [
            'title'         => __('News Section', 'jaybeecomictheme'),
            'description'   => sprintf(__('Customize the news section')),
            'priority'      => 259
        ]);

        // SShow or hide the news section
        $wp_customize->add_setting('news_section_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('news_section_display', [
            'label'     => __('Show or hide the News section', 'jaybeecomictheme'),
            'section'   => 'news_section',
            'settings'  => 'news_section_display',
            'type'      => 'radio',
            'priority'  => 1,
            'choices'   => [
                'show'  => 'Show News Section',
                'hide'  => 'Hide News Section'
            ]
        ]);

        // Set the title
        $wp_customize->add_setting('custom_news_title', [
            'default'   => _x('Lorem Ipsum', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('custom_news_title', [
            'label'     => __('News Title', 'jaybeecomictheme'),
            'section'   => 'news_section',
            'settings'  => 'custom_news_title',
            'priority'  => 2
        ]);

        // Set the news text
        $wp_customize->add_setting('news_text', [
            'default'   => _x('Drop me a message or get in touch on social media', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('news_text', [
            'label'     => __('News content', 'jaybeecomictheme'),
            'section'   => 'news_section',
            'settings'  => 'news_text',
            'type'      => 'textarea',
            'priority'  => 3
        ]);

        // Contact section
        $wp_customize->add_section('contact_section', [
            'title'         => __('Contact Section', 'jaybeecomictheme'),
            'description'   => sprintf(__('Customize the Contact section')),
            'priority'  => 260
        ]);

        // Show or hide contact section
        $wp_customize->add_setting('contact_section_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('contact_section_display', [
            'label'     => __('Show or Hide Contact section', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'contact_section_display',
            'type'      => 'radio',
            'priority'  => 1,
            'choices'   => [
                'show'  => 'Show Contact Section',
                'hide'  => 'Hide Contact Section'
            ]
        ]);

        // Set contact section title
        $wp_customize->add_setting('contact_section_title', [
            'default'   => _x('Contact', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('contact_section_title', [
            'label'     => __('Section Title', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'contact_section_title',
            'priority'  => 2
        ]);

        // Contact section intro
        $wp_customize->add_setting('contact_section_intro', [
            'default'   => _x('Drop me a message or get in touch on social media', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('contact_section_intro', [
            'label'     => __('Set the intro', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'contact_section_intro',
            'type'      => 'textarea',
            'priority'  => 3
        ]);

        // contact section Social media 
        // Hide or show the social media section
        $wp_customize->add_setting('contact_social_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('contact_social_display', [
            'label'     => __('Show or hide the social media section', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'contact_social_display',
            'type'      => 'radio',
            'priority'  => 4,
            'choices'   => [
                'show'  => 'Show Social Media section',
                'Hide'  => 'Hide Social Media section'
            ]
        ]);

        // Change social media icons
        $wp_customize->add_setting('contact_social_media_icon_1', [
            'default'   => _x('<i class="fab fa-facebook-square"></i>', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_social_media_icon_1', [
            'label'         => __('Social Media Icon 1', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'contact_section',
            'priority'      => 5,
            'type'          => 'select',
            'choices'       => [
                'default'   => '<i class="fab fa-facebook-square"></i>',
                '<i class="fab fa-facebook-square"></i>'    => 'Facebook',
                '<i class="fab fa-twitter-square"></i>'     => 'Twitter',
                '<i class="fab fa-pinterest-square"></i>'   => 'Pinterest',
                '<i class="fab fa-instagram"></i>'          => 'Instagram'
            ]
        ]));

        // Set the url for the first icon
        $wp_customize->add_setting('contact_url_one', [
            'default'       => _x('http://www.facebook.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('contact_url_one', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'contact_section',
            'priority'      => 6
        ]);

        // Hide or show icon 1
        $wp_customize->add_setting('social_media_icon_1_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('social_media_icon_1_display', [
            'label'     => __('Show or Hide social media icon 1', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'social_media_icon_1_display',
            'priority'  => 7,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show icon 1',
                'hide'  => 'Hide icon 1'
            ]
        ]);

        // Set the color on icon 1
        $wp_customize->add_setting('social_media_icon_1_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'social_media_icon_1_color', [
            'label'     => __('Social Media Icon 1 Color', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'social_media_icon_1_color',
            'priority'  => 8
        ]));

        // Set Icon 2
        $wp_customize->add_setting('contact_social_media_icon_2', [
            'default'       => _x('<i class="fab fa-instagram"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_social_media_icon_2', [
            'label'         => __('Social Media Links 2', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'contact_section',
            'priority'      => 9,
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
        $wp_customize->add_setting('contact_url_two', [
            'default'       => _x('http://www.instagram.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('contact_url_two', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'contact_section',
            'priority'      => 10
        ]);

        // Hide or show icon 2
        $wp_customize->add_setting('social_media_icon_2_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('social_media_icon_2_display', [
            'label'     => __('Show or Hide social media icon 2', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'social_media_icon_2_display',
            'priority'  => 11,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show icon 2',
                'hide'  => 'Hide icon 2'
            ]
        ]);

        // Set the color on icon 2
        $wp_customize->add_setting('social_media_icon_2_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'social_media_icon_2_color', [
            'label'     => __('Social Media Icon 2 Color', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'social_media_icon_2_color',
            'priority'  => 12
        ]));

        // Set icon 3
        $wp_customize->add_setting('contact_social_media_icon_3', [
            'default'       => _x('<i class="fab fa-pinterest-square"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_social_media_icon_3', [
            'label'         => __('Social Media Links 3', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'contact_section',
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
        $wp_customize->add_setting('contact_url_three', [
            'default'       => _x('http://www.pinterest.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('contact_url_three', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'contact_section',
            'priority'      => 14
        ]);

        // Show or hide icon 3
        $wp_customize->add_setting('social_media_icon_3_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('social_media_icon_3_display', [
            'label'     => __('Show or Hide social media icon 3', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'social_media_icon_3_display',
            'priority'  => 15,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show icon 3',
                'hide'  => 'Hide icon 3'
            ]
        ]);

        // Set the color on icon 3
        $wp_customize->add_setting('social_media_icon_3_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'social_media_icon_3_color', [
            'label'     => __('Social Media Icon 3 Color', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'social_media_icon_3_color',
            'priority'  => 16
        ]));

        // Set icon 4
        $wp_customize->add_setting('contact_social_media_icon_4', [
            'default'       => _x('<i class="fab fa-twitter-square"></i>', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_social_media_icon_4', [
            'label'         => __('Social Media Links 4', 'jaybeecomictheme'),
            'description'   => sprintf(__('Pick a social media icon')),
            'section'       => 'contact_section',
            'priority'      => 17,
            'type'          => 'select',
            'choices'       => [
                'default'   => '<i class="fab fa-twitter-square"></i>',
                '<i class="fab fa-facebook-square"></i>'    => 'Facebook',
                '<i class="fab fa-twitter-square"></i>'     => 'Twitter',
                '<i class="fab fa-pinterest-square"></i>'   => 'Pinterest',
                '<i class="fab fa-instagram"></i>'          => 'Instagram'
            ]
        ]));

        // Set url for icon 4
        $wp_customize->add_setting('contact_url_four', [
            'default'       => _x('http://www.twitter.com/user', 'jaybeecomictheme'),
            'type'          => 'theme_mod'
        ]);

        $wp_customize->add_control('contact_url_four', [
            'description'   => sprintf(__('Put the link here!', 'jaybeecomictheme')),
            'section'       => 'contact_section',
            'priority'      => 18
        ]);

        // Show or hide icon 4
        $wp_customize->add_setting('social_media_icon_4_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('social_media_icon_4_display', [
            'label'     => __('Show or Hide social media icon 4', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'social_media_icon_4_display',
            'priority'  => 19,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show icon 4',
                'hide'  => 'Hide icon 4'
            ]
        ]);

        // Set the color on icon 4
        $wp_customize->add_setting('social_media_icon_4_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'social_media_icon_4_color', [
            'label'     => __('Social Media Icon 4 Color', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'social_media_icon_4_color',
            'priority'  => 20
        ]));

        // Contact email
        // Show or hide contact email
        $wp_customize->add_setting('contact_email_address_display', [
            'default'   => true,
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('contact_email_address_display', [
            'label'     => __('Show or Hide contact email', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'contact_email_address_display',
            'priority'  => 21,
            'type'      => 'radio',
            'choices'   => [
                'show'  => 'Show contact email',
                'hide'  => 'Hide contact email'
            ]
        ]);

        // Set the email address
        $wp_customize->add_setting('contact_email_address_text', [
            'default'   => _x('contact@mail.com', 'jaybeecomictheme'),
            'type'      => 'theme_mod'
        ]);

        $wp_customize->add_control('contact_email_address_text', [
            'label'         => __('Set your email', 'jaybeecomictheme'),
            'description'   => sprintf(__('Your contact email', 'jaybeecomictheme')),
            'section'       => 'contact_section',
            'priority'      => 22
        ]);

        // Set the color on the email address
        $wp_customize->add_setting('contact_email_color', [
            'default'   => '#1A3263',
            'transport' => 'postMessage'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'contact_email_color', [
            'label'     => __('Contact email color', 'jaybeecomictheme'),
            'section'   => 'contact_section',
            'settings'  => 'contact_email_color',
            'priority'  => 23
        ]));
    }

    /**
     * Add styling to the customize functions
     * 
     * @package jaybeecomictheme
     * @author JayBee Studios
     * @access public
     */
    public function custom_frontpage_styling()
    {
?>
        <style type="text/css">
            .showcase__inner h2 {
                color: <?= get_theme_mod('color_header_text', '#000'); ?>;
            }

            .custom__btn-one {
                background: <?= get_theme_mod('cta_one_bckg_color', '#000'); ?>;
                color: <?= get_theme_mod('cta_one_btn_text_color', '#000'); ?>;
            }

            .custom__btn-two {
                background: <?= get_theme_mod('cta_two_bckg_color', '#000'); ?>;
                color: <?= get_theme_mod('cta_two_btn_text_color', '#000'); ?>;
            }

            .custom__btn-three {
                background: <?= get_theme_mod('cta_three_bckg_color', '#000'); ?>;
                color: <?= get_theme_mod('cta_three_btn_text_color', '#000'); ?>;
            }

            .custom__btn-promo {
                background: <?= get_theme_mod('promotion_btn_color', '#000'); ?>;
                color: <?= get_theme_mod('promotion_btn_text_color', '#000'); ?>;
            }

            .contact__color-social-one {
                color: <?= get_theme_mod('social_media_icon_1_color', '#1A3263'); ?>;
            }

            .contact__color-social-two {
                color: <?= get_theme_mod('social_media_icon_2_color', '#1A3263'); ?>;
            }

            .contact__color-social-three {
                color: <?= get_theme_mod('social_media_icon_3_color', '#1A3263'); ?>;
            }

            .contact__color-social-four {
                color: <?= get_theme_mod('social_media_icon_4_color', '#1A3263'); ?>;
            }

            .contact__email a {
                color: <?= get_theme_mod('contact_email_color', '#1A3263'); ?>;
            }
        </style>
    <?php
    }
}

$front_page = new FrontPageCustomizer();

// EOF

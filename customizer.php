<?php

/**
 * Growth Legacy Capital Theme Customizer
 *
 * @package Growth_Legacy_Capital
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function growth_legacy_capital_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'growth_legacy_capital_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'growth_legacy_capital_customize_partial_blogdescription',
            )
        );
    }
    // Footer Section
    $wp_customize->add_section('footer_section', array(
        'title'       => __('Copyright', 'growth-legacy-capital'),
        'priority'    => 160,
        'description' => __('Customize the footer settings.', 'growth-legacy-capital'),
    ));

    // Copyright Text Setting
    $wp_customize->add_setting('copyright_text', array(
        'default'           => __('© ' . date('Y') . ' Your Company Name. All Rights Reserved.', 'growth-legacy-capital'),
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('copyright_text', array(
        'label'   => __('Copyright Text', 'growth-legacy-capital'),
        'section' => 'footer_section',
        'type'    => 'textarea',
    ));

    // Selective Refresh for Copyright Text
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('copyright_text', array(
            'selector'        => '.footer-copyright',
            'render_callback' => 'growth_legacy_capital_customize_partial_copyright',
        ));
    }
    // Background Image Section
    $wp_customize->add_section('background_image_section', array(
        'title'       => __('Background', 'growth-legacy-capital'),
        'priority'    => 120,
        'description' => __('Customize the background image.', 'growth-legacy-capital'),
    ));

    // Background Image Setting
    $wp_customize->add_setting('background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'background_image',
        array(
            'label'    => __('Upload Background Image', 'growth-legacy-capital'),
            'section'  => 'background_image_section',
            'settings' => 'background_image',
        )
    ));
}
add_action('customize_register', 'growth_legacy_capital_customize_register');

/**
 * Sanitize checkbox input.
 */
function growth_legacy_capital_sanitize_checkbox($checked)
{
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Render the site title for the selective refresh partial.
 */
function growth_legacy_capital_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function growth_legacy_capital_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function growth_legacy_capital_customize_preview_js()
{
    wp_enqueue_script('growth-legacy-capital-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'growth_legacy_capital_customize_preview_js');

/**
 * Growth Legacy Capital - Customizer Settings using Kirki
 */
if (class_exists('Kirki')) {

    // Add "Theme Settings" Panel
    new \Kirki\Panel(
        'theme_settings',
        [
            'priority'    => 10,
            'title'       => esc_html__('Theme Settings', 'growth-legacy-capital'),
            'description' => esc_html__('Manage your theme settings including colors, typography, and contact details.', 'growth-legacy-capital'),
        ]
    );

    // Add Colors Section Inside "Theme Settings" Panel
    new \Kirki\Section(
        'colors_section',
        [
            'title'       => esc_html__('Colors', 'growth-legacy-capital'),
            'description' => esc_html__('Customize your theme colors', 'growth-legacy-capital'),
            'panel'       => 'theme_settings',
            'priority'    => 20,
        ]
    );

    // Primary Color
    new \Kirki\Field\Color(
        [
            'settings'  => 'primary_color',
            'label'     => esc_html__('Primary Color', 'growth-legacy-capital'),
            'section'   => 'colors_section',
            'default'   => '#006980',
            'transport' => 'auto',
            'output'    => [
                [
                    'element'  => ':root',
                    'property' => '--primary-color',
                ],
            ],
        ]
    );

    // Secondary Color
    new \Kirki\Field\Color(
        [
            'settings'  => 'secondary_color',
            'label'     => esc_html__('Secondary Color', 'growth-legacy-capital'),
            'section'   => 'colors_section',
            'default'   => '#B24D26',
            'transport' => 'auto',
            'output'    => [
                [
                    'element'  => ':root',
                    'property' => '--secondary-color',
                ],
            ],
        ]
    );

    // Ordinary Color
    new \Kirki\Field\Color(
        [
            'settings'  => 'ordinary_color',
            'label'     => esc_html__('Ordinary Color', 'growth-legacy-capital'),
            'section'   => 'colors_section',
            'default'   => '#ffffff',
            'transport' => 'auto',
            'output'    => [
                [
                    'element'  => ':root',
                    'property' => '--ordinary-color',
                ],
            ],
        ]
    );

    // Paragraph Color
    new \Kirki\Field\Color(
        [
            'settings'  => 'paragraph_color',
            'label'     => esc_html__('Paragraph Color', 'growth-legacy-capital'),
            'section'   => 'colors_section',
            'default'   => '#6E6E66',
            'transport' => 'auto',
            'output'    => [
                [
                    'element'  => 'p',
                    'property' => 'color',
                ],
                [
                    'element'  => ':root',
                    'property' => '--paragraph-color',
                ],
            ],
        ]
    );

    // Body Background Color
    new \Kirki\Field\Color(
        [
            'settings'  => 'body_background_color',
            'label'     => esc_html__('Body Background Color', 'growth-legacy-capital'),
            'section'   => 'colors_section',
            'default'   => '#ffffff',
            'transport' => 'auto',
            'output'    => [
                [
                    'element'  => 'body',
                    'property' => 'background-color',
                ],
                [
                    'element'  => ':root',
                    'property' => '--body-bg-color',
                ],
            ],
        ]
    );

    // Anchor (Link) Color
    new \Kirki\Field\Color(
        [
            'settings'  => 'anchor_color',
            'label'     => esc_html__('Anchor Color', 'growth-legacy-capital'),
            'section'   => 'colors_section',
            'default'   => '#1e73be',
            'transport' => 'auto',
            'output'    => [
                [
                    'element'  => 'a',
                    'property' => 'color',
                ],
                [
                    'element'  => ':root',
                    'property' => '--anchor-color',
                ],
            ],
        ]
    );

    // Heading Colors (H1 - H6)
    foreach (['h1', 'h2', 'h3', 'h4', 'h5', 'h6'] as $heading) {
        new \Kirki\Field\Color(
            [
                'settings'  => $heading . '_color',
                'label'     => esc_html__(strtoupper($heading) . ' Color', 'growth-legacy-capital'),
                'section'   => 'colors_section',
                'default'   => '#000000',
                'transport' => 'auto',
                'output'    => [
                    [
                        'element'  => $heading,
                        'property' => 'color',
                    ],
                ],
            ]
        );
    }

    // Typography Section
    new \Kirki\Section(
        'typography_section',
        [
            'title'       => esc_html__('Typography', 'growth-legacy-capital'),
            'description' => esc_html__('Customize your typography settings', 'growth-legacy-capital'),
            'panel'       => 'theme_settings',
            'priority'    => 30,
        ]
    );

    // Body (Primary Font)
    new \Kirki\Field\Typography(
        [
            'settings' => 'primary_font_family',
            'label'    => esc_html__('Primary Font Family', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => 'regular',
                'color'          => '#333333',
                'font-size'      => '14px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'text-decoration' => 'none',
                'text-align'     => 'left',
                'font-weight'    => '400',
            ],
            'output'   => [
                ['element' => 'body'],
            ],
        ]
    );

    // Secondary Font
    new \Kirki\Field\Typography(
        [
            'settings' => 'secondary_font_family',
            'label'    => esc_html__('Secondary Font Family', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Kanit, sans-serif',
                'variant'        => 'regular',
                'color'          => '#333333',
                'font-size'      => '14px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'text-decoration' => 'none',
                'text-align'     => 'left',
                'font-weight'    => '400',
            ],
            'output'   => [
                ['element' => 'body'],
            ],
        ]
    );

    // Heading H1
    new \Kirki\Field\Typography(
        [
            'settings' => 'h1_typography',
            'label'    => esc_html__('Heading H1', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => '700',
                'color'          => '#000000',
                'font-size'      => '32px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'output'   => [
                ['element' => 'h1'],
            ],
        ]
    );

    // Heading H2
    new \Kirki\Field\Typography(
        [
            'settings' => 'h2_typography',
            'label'    => esc_html__('Heading H2', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => '700',
                'color'          => '#000000',
                'font-size'      => '28px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'output'   => [
                ['element' => 'h2'],
            ],
        ]
    );

    // Heading H3
    new \Kirki\Field\Typography(
        [
            'settings' => 'h3_typography',
            'label'    => esc_html__('Heading H3', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => '700',
                'color'          => '#000000',
                'font-size'      => '24px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'output'   => [
                ['element' => 'h3'],
            ],
        ]
    );

    // Heading H4
    new \Kirki\Field\Typography(
        [
            'settings' => 'h4_typography',
            'label'    => esc_html__('Heading H4', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => '600',
                'color'          => '#000000',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'output'   => [
                ['element' => 'h4'],
            ],
        ]
    );

    // Heading H5
    new \Kirki\Field\Typography(
        [
            'settings' => 'h5_typography',
            'label'    => esc_html__('Heading H5', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => '600',
                'color'          => '#000000',
                'font-size'      => '18px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'output'   => [
                ['element' => 'h5'],
            ],
        ]
    );

    // Heading H6
    new \Kirki\Field\Typography(
        [
            'settings' => 'h6_typography',
            'label'    => esc_html__('Heading H6', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => '600',
                'color'          => '#000000',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ],
            'output'   => [
                ['element' => 'h6'],
            ],
        ]
    );

    // Paragraph (P)
    new \Kirki\Field\Typography(
        [
            'settings' => 'paragraph_typography',
            'label'    => esc_html__('Paragraph (P)', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => 'regular',
                'color'          => '#333333',
                'font-size'      => '16px',
                'line-height'    => '1.8',
                'font-style'     => 'normal',
            ],
            'output'   => [
                ['element' => 'p'],
            ],
        ]
    );

    // Anchor (A)
    new \Kirki\Field\Typography(
        [
            'settings' => 'anchor_typography',
            'label'    => esc_html__('Anchor (Links - A)', 'growth-legacy-capital'),
            'section'  => 'typography_section',
            'default'  => [
                'font-family'    => 'Noto Sans, sans-serif',
                'variant'        => 'regular',
                'color'          => '#1e73be',
                'font-size'      => '16px',
                'line-height'    => '1.5',
                'font-style'     => 'normal',
                'text-decoration' => 'underline',
            ],
            'output'   => [
                ['element' => 'a'],
            ],
        ]
    );


    // Contact Section
    new \Kirki\Section(
        'contact_section',
        [
            'title'       => esc_html__('Contact Settings', 'growth-legacy-capital'),
            'description' => esc_html__('Customize your contact details and social media links.', 'growth-legacy-capital'),
            'panel'       => 'theme_settings',
            'priority'    => 40,
        ]
    );

    // Contact Fields
    $contact_fields = [
        'contact_phone'       => '+1 234 567 890',
        'contact_phone_link'  => 'tel:+1234567890',
        'contact_email'       => 'info@example.com',
        'contact_email_link'  => 'mailto:info@example.com',
    ];

    foreach ($contact_fields as $setting => $default) {
        new \Kirki\Field\Text(
            [
                'settings'  => $setting,
                'label'     => esc_html__(ucwords(str_replace('_', ' ', $setting)), 'growth-legacy-capital'),
                'section'   => 'contact_section',
                'default'   => $default,
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );
    }

    // Social Media Links
    $social_links = [
        'facebook'  => 'Facebook URL',
        'instagram' => 'Instagram URL',
        'linkedin'  => 'LinkedIn URL',
        'x'         => 'X (formerly Twitter) URL',
    ];

    foreach ($social_links as $key => $label) {
        new \Kirki\Field\Text(
            [
                'settings'  => "contact_{$key}",
                'label'     => esc_html__($label, 'growth-legacy-capital'),
                'section'   => 'contact_section',
                'default'   => '',
                'sanitize_callback' => 'esc_url_raw',
            ]
        );
    }
    new \Kirki\Section(
        'home_settings_section',
        [
            'title'       => esc_html__('Hero Container Settings', 'growth-legacy-capital'),
            'description' => esc_html__('Choose which section to display on the homepage.', 'growth-legacy-capital'),
            'panel'       => 'theme_settings',
            'priority'    => 50,
        ]
    );

    // Home Container Radio Button
    new \Kirki\Field\Radio(
        [
            'settings'    => 'home_container_toggle',
            'label'       => esc_html__('Hero Container', 'growth-legacy-capital'),
            'section'     => 'home_settings_section',
            'default'     => 'main_home',
            'choices'     => [
                'main_home'      => esc_html__('Main Container', 'growth-legacy-capital'),
                'contact_form'   => esc_html__('Contact Container', 'growth-legacy-capital'),
            ],
            'output'      => [
                [
                    'element'  => 'body',
                    'property' => '--home-container',
                ],
            ],
        ]
    );
    // Insights Banner Section
    new \Kirki\Section(
        'insights_banner_section',
        [
            'title'       => esc_html__('Insights Banner', 'growth-legacy-capital'),
            'description' => esc_html__('Upload an image for the Insights banner.', 'growth-legacy-capital'),
            'panel'       => 'theme_settings',
            'priority'    => 60,
        ]
    );

    // Insights Banner Image
    new \Kirki\Field\Image(
        [
            'settings'  => 'insights_banner_image',
            'label'     => esc_html__('Insights Banner Image', 'growth-legacy-capital'),
            'section'   => 'insights_banner_section',
            'default'   => '', // No default image
            'choices'   => [
                'save_as' => 'id', // Save the image as an attachment ID
            ],
            'output'    => [
                [
                    'element'  => '.insights-banner',
                    'property' => 'background-image',
                    'value_pattern' => 'url(\'$\')',
                ],
            ],
        ]
    );
}

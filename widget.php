<?php
function growth_legacy_capital_widgets_init()
{
    // Main Sidebar
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'growth-legacy-capital'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'growth-legacy-capital'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    // Footer Widget Areas
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(
            array(
                'name'          => esc_html__("Footer Widget Area $i", 'growth-legacy-capital'),
                'id'            => "footer-widget-$i",
                'description'   => esc_html__("Add widgets to footer area $i.", 'growth-legacy-capital'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
}
add_action('widgets_init', 'growth_legacy_capital_widgets_init');

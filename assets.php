<?php
function growth_legacy_capital_scripts()
{
    // Define a fallback version if _S_VERSION is not defined
    $theme_version = defined('_S_VERSION') ? _S_VERSION : wp_get_theme()->get('Version');

    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null);

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');

    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2');

    // Enqueue main stylesheet
    wp_enqueue_style('growth-legacy-capital-main-style', get_template_directory_uri() . '/css/main.css', array(), $theme_version);

    // Enqueue theme's default stylesheet
    wp_enqueue_style('growth-legacy-capital-style', get_stylesheet_uri(), array(), $theme_version);

    // Enqueue home stylesheet
    if (is_page_template('template-parts/page-home.php')) {
        wp_enqueue_style('growth-legacy-capital-home-style', get_template_directory_uri() . '/css/home.css', array(), $theme_version);
    }
    // Enqueue Services stylesheet
    if (is_page_template('template-parts/page-services.php')) {
        wp_enqueue_style('growth-legacy-capital-services-style', get_template_directory_uri() . '/css/services.css', array(), $theme_version);
    }
    // Enqueue Partners stylesheet
    if (is_page_template('template-parts/page-partners.php')) {
        wp_enqueue_style('growth-legacy-capital-partners-style', get_template_directory_uri() . '/css/partners.css', array(), $theme_version);
    }
    // Enqueue Partners stylesheet
    if (is_page_template('template-parts/page-education.php')) {
        wp_enqueue_style('growth-legacy-capital-education-style', get_template_directory_uri() . '/css/education.css', array(), $theme_version);
    }
    // Enqueue Partners stylesheet
    if (is_home() && !is_front_page() || is_page_template('template-parts/page-insights.php')) {
        wp_enqueue_style('growth-legacy-capital-insights-style', get_template_directory_uri() . '/css/insights.css', array(), $theme_version);
    }
    // Enqueue Single stylesheet
    if (is_single()) {
        wp_enqueue_style('growth-legacy-capital-single-style', get_template_directory_uri() . '/css/single.css', array(), $theme_version);
    }
    // Enqueue Contact stylesheet
    if (is_page_template('template-parts/page-contact.php')) {
        wp_enqueue_style('growth-legacy-capital-contact-style', get_template_directory_uri() . '/css/contact.css', array(), $theme_version);
    }
    // Enqueue jQuery (already included in WordPress)
    wp_enqueue_script('jquery');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);

    // Enqueue Font Awesome JS (optional, for icons that require JavaScript)
    wp_enqueue_script('font-awesome-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js', array(), '6.4.2', true);

    // Enqueue navigation script
    wp_enqueue_script('growth-legacy-capital-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), $theme_version, true);

    // Enqueue main JS file
    wp_enqueue_script('growth-legacy-capital-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), $theme_version, true);

    // Enqueue comment-reply script if applicable
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'growth_legacy_capital_scripts');

<?php

/* Growth Legacy Capital functions and definitions*/
if (! defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.0');
}

/*Sets up theme defaults and registers support for various WordPress features. */
function growth_legacy_capital_setup()
{
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'growth-legacy-capital'),
			'menu-2' => esc_html__('Secondary', 'growth-legacy-capital'),
			'menu-3' => esc_html__('Footer', 'growth-legacy-capital'),
		)
	);
	/*Switch default core markup for search form, comment form, and comments*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');
	/* Add support for core custom logo.*/
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'growth_legacy_capital_setup');
// Menu Walker
class Custom_Nav_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$active_class = (in_array('current-menu-item', $item->classes)) ? ' active' : '';
		$output .= '<li class="menu-item' . $active_class . '">';
		$output .= '<a href="' . esc_url($item->url) . '" class="menu-item' . $active_class . '">' . esc_html($item->title) . '</a>';
	}
}


/* Set the content width in pixels, based on the theme's design and stylesheet.*/
function growth_legacy_capital_content_width()
{
	$GLOBALS['content_width'] = apply_filters('growth_legacy_capital_content_width', 640);
}
add_action('after_setup_theme', 'growth_legacy_capital_content_width', 0);
// Post Excerpt
function custom_excerpt_length($excerpt, $limit = 200) {
    $excerpt = strip_tags(strip_shortcodes($excerpt)); 
    $words = explode(' ', $excerpt, $limit + 1);
    
    if (count($words) > $limit) {
        array_pop($words);
        $excerpt = implode(' ', $words) . '...';
    }
    
    return $excerpt;
}

/*Register Field Group area.*/
require get_template_directory() . '/inc/field-group.php';
/*Register widget area.*/
require get_template_directory() . '/inc/widget.php';
/*Enqueue scripts and styles.*/
require get_template_directory() . '/inc/assets.php';
/*Custom template tags for this theme.*/
require get_template_directory() . '/inc/template-tags.php';

/*Functions which enhance the theme by hooking into WordPress.*/
require get_template_directory() . '/inc/template-functions.php';
/*Customizer additions.*/
require get_template_directory() . '/inc/customizer.php';
/*Install Required Plugin*/
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/install-plugin.php';

<?php
// Get basic color settings
$body_background_color = get_theme_mod('body_background_color', '#ffffff');
$paragraph_color       = get_theme_mod('paragraph_color', '#333333');
$anchor_color          = get_theme_mod('anchor_color', '#1e73be');

// Get extra color settings
$primary_color   = get_theme_mod('primary_color', '#006980');
$secondary_color = get_theme_mod('secondary_color', '#B24D26');
$ordinary_color  = get_theme_mod('ordinary_color', '#ffffff');

// Get typography settings (Extract only 'font-family' from the array)
$primary_typography   = get_theme_mod('primary_font_family', []);
$secondary_typography = get_theme_mod('secondary_font_family', []);

$primary_font   = !empty($primary_typography['font-family']) ? $primary_typography['font-family'] : 'Noto Sans, sans-serif';
$secondary_font = !empty($secondary_typography['font-family']) ? $secondary_typography['font-family'] : 'Kanit, sans-serif';

// Build dynamic typography for headings (H1 - H6)
$headings_styles = '';
for ($i = 1; $i <= 6; $i++) {
    $heading_color = get_theme_mod("h{$i}_color", '#000000');
    $headings_styles .= "h{$i} {
        color: {$heading_color};
    } ";
}
?>
<style>
    :root {
        --body-bg-color: <?php echo esc_attr($body_background_color); ?>;
        --paragraph-color: <?php echo esc_attr($paragraph_color); ?>;
        --anchor-color: <?php echo esc_attr($anchor_color); ?>;
        --primary-color: <?php echo esc_attr($primary_color); ?>;
        --secondary-color: <?php echo esc_attr($secondary_color); ?>;
        --ordinary-color: <?php echo esc_attr($ordinary_color); ?>;
        --text-color: <?php echo esc_attr($paragraph_color); ?>;
        --primary-font: "<?php echo esc_attr($primary_font); ?>";
        --secondary-font: "<?php echo esc_attr($secondary_font); ?>";
    }

    body {
        background-color: var(--body-bg-color);
    }
    <?php echo $headings_styles; ?>
</style>
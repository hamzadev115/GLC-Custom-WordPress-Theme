<?php

/**
 * The header for our theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<?php include get_template_directory() . '/inc/dynamic-style.php'; ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'growth-legacy-capital'); ?></a>
		<?php
		$background_image = get_theme_mod('background_image', '');
		?>
		<div class="header-bg" style="background: url('<?php echo esc_url($background_image); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
		</div>
		<header class="container">
			<div class="logo">
				<?php if (has_custom_logo()) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<h1 class="site-title"><?php bloginfo('name'); ?></h1>
				<?php endif; ?>
			</div>
			<nav>
				<div class="menu-toggle">
					<i class="fas fa-bars"></i>
				</div>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'menu-1',
					'menu_class'     => 'menu',
					'container'      => 'ul',
					'fallback_cb'    => false,
					'walker'         => new Custom_Nav_Walker()
				));
				?>
			</nav>
		</header>
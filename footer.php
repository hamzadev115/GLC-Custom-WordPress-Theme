<?php

/**
 * The template for displaying the footer
 *
 */

?>

<footer>
	<?php
	$background_image = get_theme_mod('background_image', '');
	?>
	<div style="background: url('<?php echo esc_url($background_image); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
		<div class="container footer-main d-flex flex-column">
			<div class="row d-flex flex-wrap text-center text-md-start">
				<!-- Footer Widget 1 -->
				<div class="col-12 col-md-6 col-lg-3 mb-2 mb-lg-0 d-flex justify-content-center">
					<div class="footer-logo">
						<?php if (is_active_sidebar('footer-widget-1')) : ?>
							<?php dynamic_sidebar('footer-widget-1'); ?>
						<?php endif; ?>
						<p class="copyright d-none d-md-block">
							<?php echo esc_html(get_theme_mod('copyright_text', '© ' . date('Y') . ' Growth Legacy Capital. All Rights Reserved.')); ?>
						</p>
					</div>
				</div>
				<!-- Footer Widget 2 -->
				<div class="col-12 col-md-6 col-lg-3 mb-2 mb-lg-0 d-flex justify-content-center">
					<div class="footer-menu d-flex justify-content-start justify-content-md-center">
						<?php if (is_active_sidebar('footer-widget-2')) : ?>
							<?php dynamic_sidebar('footer-widget-2'); ?>
						<?php endif; ?>
					</div>
				</div>
				<!-- Footer Widget 3 -->
				<div class="col-12 col-md-6 col-lg-3 mb-2 mb-lg-0">
					<div class="footer-contact d-flex flex-column justify-content-start justify-content-md-center">
						<?php if (is_active_sidebar('footer-widget-3')) : ?>
							<?php dynamic_sidebar('footer-widget-3'); ?>
						<?php endif; ?>
					</div>
				</div>
				<!-- Footer Widget 4 -->
				<div class="col-12 col-md-6 col-lg-3 mb-2 mb-lg-0 d-flex justify-content-center">
					<div class="footer-social">
						<?php
						$social_icons = [
							'linkedin'  => 'fab fa-linkedin-in',
							'x'         => 'fab fa-x-twitter',
							'facebook'  => 'fab fa-facebook-f',
							'instagram' => 'fab fa-instagram'
						];

						foreach ($social_icons as $key => $icon) {
							$link = get_theme_mod("contact_{$key}", '');
							if (!empty($link)) {
								echo '<a href="' . esc_url($link) . '" target="_blank" class="social-icon"><i class="' . esc_attr($icon) . '"></i></a>';
							}
						}
						?>
					</div>

				</div>
			</div>
			<p class="copyright d-block d-md-none text-center py-2">
				<?php echo esc_html(get_theme_mod('copyright_text', '© ' . date('Y') . ' Growth Legacy Capital. All Rights Reserved.')); ?>
			</p>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>
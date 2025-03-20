<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Growth_Legacy_Capital
 */

get_header();
?>
<?php
// Get the Insights Banner Image (saved as an attachment ID)
$insights_banner_id = get_theme_mod('insights_banner_image');
$insights_banner_url = $insights_banner_id ? wp_get_attachment_url($insights_banner_id) : '';
?>
<!-- Hero Section -->
<section class="partner-section"
	style="width: 100%; 
           background-image: url('<?php echo esc_url($insights_banner_url); ?>'); 
           background-position: center; 
           background-size: cover;">
</section>

<!-- insight Section -->
<section>
	<div class="container py-5 py-md-5">
		<div class="row">
			<div class="col-12">
				<h2 class="insight-title">Creating A Passive Insight</h2>
			</div>
		</div>
		<?php
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => -1,
			'order'          => 'DESC'
		);

		$query = new WP_Query($args);

		if ($query->have_posts()) :
			$count = 0;
			while ($query->have_posts()) : $query->the_post();
				$count++;
				$post_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
				$post_title = get_the_title();
				$post_excerpt = get_the_excerpt();
				$post_link = get_permalink();
		?>

				<!-- Dynamic Blog Post Section -->
				<div class="row align-items-center py-3 <?php echo ($count % 2 == 0) ? 'flex-md-row-reverse' : ''; ?>">
					<div class="col-12 col-md-8">
						<div class="insight-details">
							<h3 class="insight-card-name"><?php echo esc_html($post_title); ?></h3>
							<p class="insight-card-details">
								<?php echo esc_html(wp_trim_words($post_excerpt, 20)); ?>
							</p>
							<a href="<?php echo esc_url($post_link); ?>" class="btn btn-primary hero-button">Read More</a>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="insight-card-image">
							<img src="<?php echo esc_url($post_thumbnail ? $post_thumbnail : 'http://via.placeholder.com/300'); ?>" alt="<?php echo esc_attr($post_title); ?>" />
						</div>
					</div>
				</div>

		<?php
			endwhile;
			wp_reset_postdata();
		else :
			echo '<p>No blog posts found.</p>';
		endif;
		?>
	</div>
</section>
<?php
get_footer();
?>
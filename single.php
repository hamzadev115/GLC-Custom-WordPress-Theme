<?php

/**
 * The template for displaying all single posts
 */

get_header();

if (have_posts()) :
	while (have_posts()) : the_post();
?>

		<!-- Hero Section -->
		<section class="partner-section"
			style="width: 100%; background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>'); background-position: center; background-size: cover;">
		</section>

		<section class="py-5">
			<div class="container">
				<div class="row p-2">
					<!-- Main Content Column -->
					<div class="col-12 col-md-8">
						<!-- Post Info -->
						<div class="post-info mb-4">
							<div class="d-flex flex-wrap align-items-center text-muted">
								<span class="me-3"><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
								<span class="me-3"><i class="fas fa-folder"></i> <?php the_category(', '); ?></span>
								<span><i class="far fa-comments"></i> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span>
							</div>
						</div>

						<!-- Post Title -->
						<h1 class="post-title mb-4"><?php the_title(); ?></h1>

						<!-- Post Content -->
						<div class="post-content">
							<?php the_content(); ?>
						</div>
					</div>

					<!-- Sidebar Column -->
					<div class="col-12 col-md-4 p-4 rounded border">
						<!-- Related Posts -->
						<h3 class="related-posts-title mb-4">Related Posts</h3>
						<div class="related-posts">
							<?php
							$related_posts = new WP_Query(array(
								'category__in'   => wp_get_post_categories(get_the_ID()),
								'posts_per_page' => 3,
								'post__not_in'   => array(get_the_ID())
							));

							if ($related_posts->have_posts()) :
								while ($related_posts->have_posts()) : $related_posts->the_post();
							?>
									<div class="related-post mb-3 d-flex flex-md-column flex-lg-row">
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?php the_title(); ?>" class="me-3" style="width: 80px; height: 80px; object-fit: cover;">
										<h5 class="m-0 align-self-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
									</div>
							<?php
								endwhile;
								wp_reset_postdata();
							else :
								echo '<p>No related posts found.</p>';
							endif;
							?>
						</div>
					</div>
				</div>

				<!-- Comments Section -->
				<div class="row mt-5">
					<div class="col-12 col-md-8">
						<h3 class="comments-title mb-4">Comments</h3>
						<div class="comment-box">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php
	endwhile;
endif;

get_footer();

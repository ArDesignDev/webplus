<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aquaAr
 */

get_header();
?>

<main class="site-main blog-single">
	<div class="container">

			<?php
			while ( have_posts() ) :
				the_post(); ?>

				<!-- blog content -->
				
					<div class="blog-content">
						<div class="blog-back">
							<div class="blog-back-icon">
								<a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
									<img src="<?php echo get_theme_file_uri();?>/img/icon/arrow-left.svg" alt="back" width="20" height="20" />
								</a>
							</div>
							<a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Back</a>
						</div>
						<div class="container-mini">
							<div class="blog-meta">
								<span class="blog-meta-category"><?php the_category(' '); ?></span>
								<span class="blog-meta-date"><?php the_date(); ?></span>
							</div>

							<h1><?php the_title(); ?></h1>

							<div class="blog-content-excerpt">
								<?php the_field('post_description'); ?>
							</div>

							<div class="blog-main-img">
								<?php the_post_thumbnail('full'); ?>
							</div>
						</div>
		
					</div>
				
				<!-- / blog content -->

				<div class="container-mini blog-content-inner">
					<?php the_content(); ?>

					<?php $author_name = get_field('author_name');
						if( $author_name ) { ?>
							<div class="blog-content-author">
								<div class="blog-content-author-img">
									<?php $author_image = get_field('author_image');
									if( $author_image ) { ?>
										<img src="<?php echo esc_url($author_image['url']); ?>" alt="<?php echo esc_attr($author_image['alt']); ?>" width="72" height="72" />
									<?php } else {?>
										<img src="<?php echo get_theme_file_uri();?>/img/template-author.png" alt="author" width="72" height="72"/>
									<?php } ?>
								</div>
								<div class="blog-content-author-info">
									<p class="blog-content-author-name"><strong> <?php echo $author_name; ?></strong></p>
									<p class="blog-content-author-desc"> <?php echo the_field('author_bio'); ?></p>
									<div class="blog-content-author-follow">
									<?php
										$linkIn = get_field('author_linked_in');
		
										if( $linkIn ) { ?>
											<a href="<?php echo $linkIn; ?>" target="_blank">
												<img src="<?php echo get_theme_file_uri();?>/img/icon/icon-li-black.svg" alt="Linked in">
											</a>
											<a href="<?php echo $linkIn; ?>" target="_blank" class="blog-content-follow-link">Follow author</a>
										<?php } ?>

									</div>
								</div>
							</div>
						<?php } ?>
				</div>

				
				
			<?php	
			endwhile;
			?>

			<!-- Bottom form -->
			<div class="blog-form subscribe-form subscribe-form-single" id="blog-form">
				<h2> <?php the_field('footer_form_title', 'option'); ?></h2>
				<div class="subscribe-form-single-text"><?php the_field('footer_form_text', 'option'); ?></div>

				<?php the_field('blog_form', 'option'); ?>
			</div>

			<div class="single-related">
			<h2><?php the_field('related_posts', 'option'); ?></h2>
			<div class="blog-articles-list">
					
					<?php
					$current_post_id = get_the_ID();
					$categories = get_the_category($current_post_id);
					if ($categories) {
						$cat_ids = array();
						foreach ($categories as $category) {
							$cat_ids[] = $category->term_id;
						}

						$related_args = array(
							'category__in' => $cat_ids,
							'post__not_in' => array($current_post_id),
							'posts_per_page' => 3, 
						);

						$related_posts = new WP_Query($related_args);

						if ($related_posts->have_posts()) {
							while ($related_posts->have_posts()) {
								$related_posts->the_post();
								?>
								<div class="blog-post">

									<div class="blog-img">
										<a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
									</div>

									<div class="blog-content-top">
										<div class="blog-category">
											<?php the_category(); ?>
										</div>
										<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
										<a href="<?php the_permalink();?>">
											<?php the_excerpt(); ?>
										</a>
									</div>

									<div class="blog-post-footer">
										<div class="link"><a href="<?php the_permalink(); ?>">Read more</a></div>
									</div>

								</div>
								<?php
							}
						}
						wp_reset_postdata();
					}
					?>
				</div>
			</div>


	</div>



	</div>
</main>


<?php
get_footer();

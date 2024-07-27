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
 * @package aquaAr
 */

get_header();
?>

<main id="primary" class="site-main blog">

	<div class="container-wide">
		<div class="blog-header">
			<h1><?php single_cat_title(); ?></h1>

			<div class="blog-desc">
				<?php echo category_description(); ?>
			</div>


		</div>

		<div class="blog-wrapper">

			<div class="blog-sidebar">
				<div class="blog-sidebar-inner">

					<div class="blog-sidebar-search">
						<h5><?php the_field('search_title', 'option'); ?></h5>
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<label>
								<span class="screen-reader-text">Search for:</span>
								<input type="search" class="search-field" placeholder="Search" value="" name="s">
							</label>
							<input type="hidden" name="search_type" value="blog_posts">
							<input type="submit" class="search-submit" value="Search">
						</form>
					</div>

					<div class="blog-sidebar-category">
						<h6><?php the_field('category_title', 'option'); ?></h6>
						<ul class="blog-sidebar-category-items">
							<li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" <?php if (!is_archive() && !is_search()) echo 'class="active"'; ?>>All</a></li>
							<?php
							$categories = get_categories();

							foreach ($categories as $category) {
								$category_link = get_category_link($category->term_id);
								$active_class = (is_category($category->term_id)) ? 'active' : '';

								echo '<li><a href="' . esc_url($category_link) . '" class="' . $active_class . '">' . esc_html($category->name) . '</a></li>';
							}
							?>
						</ul>
					</div>

				</div>
				
			</div>
			<div class="blog-articles">

				<form id="sortingForm" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="GET">
					<select name="orderby" onchange="this.form.submit()">
						<option value="">Sort by</option>
						<option value="name-asc" <?php if (isset($_GET['orderby']) && $_GET['orderby'] == 'name-asc') echo 'selected'; ?>>By name (A-Z)</option>
						<option value="name-desc" <?php if (isset($_GET['orderby']) && $_GET['orderby'] == 'name-desc') echo 'selected'; ?>>By name (Z-A)</option>
						<option value="date-asc" <?php if (isset($_GET['orderby']) && $_GET['orderby'] == 'date-asc') echo 'selected'; ?>>Oldest first</option>
						<option value="date-desc" <?php if (isset($_GET['orderby']) && $_GET['orderby'] == 'date-desc') echo 'selected'; ?>>Newest first</option>
					</select>
				</form>

				<div class="blog-articles-list">
							<?php	
							 $current_cat = get_category($cat);
						   

							if( have_posts() ) : 
								while (have_posts()) : the_post(); ?>
		

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
													<?php the_excerpt('Read more'); ?>
												</a>
											</div>
											
											<div class="blog-post-footer">
												<div class="link">
													<a href="<?php the_permalink();?>"><?php  esc_html_e( 'Read more', 'aquaAr' );?></a>
												</div>
												<div class="blog-post-author">
														<div class="blog-post-author-img">
															<?php $author_image = get_field('author_image');
															if( $author_image ) { ?>
																<img src="<?php echo esc_url($author_image['url']); ?>" alt="<?php echo esc_attr($author_image['alt']); ?>" width="72" height="72" />
															<?php } else {?>
																<img src="<?php echo get_theme_file_uri();?>/img/template-author.png" alt="author" width="72" height="72"/>
															<?php } ?>
														</div>
														<div class="blog-post-author-name">
															<?php $author_name = get_field('author_name');
																if( $author_name ) { ?>
																	<p><strong> <?php echo $author_name; ?></strong></p>
																<?php } else {?>
																	<p><strong> Unknown author</strong></p>
																<?php } ?>
																<p><?php echo get_the_date(); ?></p>
														</div>
												</div>
											</div>
		
											
										</div>
								
								<?php

								endwhile; ?>

						</div>

							<div class="blog-pagination">
	
								<div class="blog-pagination-navigation">
									<?php aqua_numeric_posts_nav();?>
								</div>
							</div>

							<?php endif;
							 // Reset the query back to the default
    						wp_reset_query();
						?>
			
				</div>
	
		</div>

		    <!-- Bottom banner -->
			<div class="wp-block-group container is-layout-constrained wp-block-group-is-layout-constrained">
				<div class="wp-block-group__inner-container">
					<div class="wp-block-group section-banner is-layout-constrained wp-block-group-is-layout-constrained">
						<div class="wp-block-group__inner-container">
							<h2 class="wp-block-heading has-text-align-center"><?php  echo the_field('footer_banner_title', 'option')?></h2>
							<div
								class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-layout-6 wp-block-buttons-is-layout-flex">
								<div class="wp-block-button btn">
								<?php
									$link = get_field('footer_banner_button', 'option');
	
									if( $link ) {
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';

										echo '<a href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a>';
									}
							
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- / Bottom banner -->
	</div>


</main>

<?php
get_footer();

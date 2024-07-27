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

<main id="primary" class="site-main blog blog-archive">

	<div class="container-wide">

		<div class="blog-wrapper">

			<div class="blog-sidebar">
				<div class="blog-sidebar-inner">

					<?php if ( isset( $_GET['search_type'] ) && $_GET['search_type'] == 'resources' ) { ?>

						<!-- Resources search -->
						<div class="blog-sidebar-search">
							<h5><?php the_field('search_title', 'option'); ?></h5>
							<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<label>
									<span class="screen-reader-text">Search for:</span>
									<input type="search" class="search-field" placeholder="Search" value="" name="s">
								</label>
								<input type="hidden" name="search_type" value="resources">
								<input type="submit" class="search-submit" value="Search">
							</form>
						</div>

						<div class="blog-sidebar-category">
							<h6><?php the_field('category_title', 'option'); ?></h6>
							<ul class="blog-sidebar-category-items">
								<li><a href="http://localhost/grouglobal/resources/" <?php if (is_post_type_archive('resources')) echo 'class="active"'; ?>>All</a></li>
								<?php
								$terms = get_terms('topics', array('hide_empty' => false));

								foreach ($terms as $term) {
									$term_link = get_term_link($term);
									if (is_wp_error($term_link)) {
										continue;
									}
									$active_class = (is_tax('topics', $term->term_id)) ? 'active' : '';

									echo '<li><a href="' . esc_url($term_link) . '" class="' . $active_class . '">' . esc_html($term->name) . '</a></li>';
								}
								?>
							</ul>

							<div class="blog-sidebar-category-second">
								<h6><?php the_field('content_types', 'option'); ?></h6>
								<ul class="blog-sidebar-category-items">
									<?php
									$terms = get_terms('content_type', array('hide_empty' => false));

									foreach ($terms as $term) {
										$term_link = get_term_link($term);
										if (is_wp_error($term_link)) {
											continue;
										}
										$active_class = (is_tax('content_type', $term->term_id)) ? 'active' : '';

										echo '<li><a href="' . esc_url($term_link) . '" class="' . $active_class . '">' . esc_html($term->name) . '</a></li>';
									}
									?>
								</ul>
							</div>

						</div>

					<?php } else { ?>

						<!-- Blog search -->
						<?php $blog_text = get_field('blog_text' , 'option'); ?>

						<div class="blog-sidebar-search">
							<?php if(!empty($blog_text['search_text'])) { echo "<h4>" . $blog_text['search_text'] . "</h4>";} ?>
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
							<?php if(!empty($blog_text['category_text'])) { echo "<h4>" . $blog_text['category_text'] . "</h4>";} ?>
							<ul class="blog-sidebar-category-items">
								<li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" <?php if (!is_archive() && !is_search()) echo 'class="active"'; ?>>All Posts</a></li>
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

					<?php } ?>

				</div>
				
			</div>
			<div class="blog-articles">
				<?php $category = get_queried_object(); ?>
				<h1><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'aquaAr' ), '<span>' . get_search_query() . '</span>' );
					?></h1>

				<div class="blog-articles-list">
						<?php

							if( have_posts() ) : 
								while (have_posts()) : the_post(); ?>
								

									<div class="blog-post">

										<div class="blog-img">
											<a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
										</div>
								
										<div class="blog-content">
											<div class="blog-content-top">
												<div class="blog-category">
													<?php the_category(); ?>
												</div>
												<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3> 
												<h5 class="blog-post-date"><?php the_date(); ?></h5>
											
												<a href="<?php the_permalink();?>">
													<?php the_excerpt('Read more'); ?>
												</a>
											</div>
											
											<div class="btn">
												<a href="<?php the_permalink();?>"><?php  esc_html_e( 'Read more', 'aquaAr' );?></a>
											</div>
										</div>
						
									</div>
		
								<?php

								endwhile; ?>

									</div>			
								<div class="blog-pagination">
	
									<div class="blog-pagination-navigation">
										<?php aqua_numeric_posts_nav(); ?>
									</div>
							   </div>


								<?php else : ?>

							<?php endif;
							 // Reset the query back to the default
    						wp_reset_query();
						?>
				
			</div>
	
		</div>
	</div>


</main>

<?php
get_footer();

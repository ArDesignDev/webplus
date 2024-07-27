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



<main id="home-page" class="site-main">

	<!--section 1-->

	<section id="home" class="hero-wrapper">

		
		<div id="particles-js"></div>
		

		<header class="main-header">
			<div class="main-header-inner">
				<!--
				<div class="hero-img">
					<?php
					$imageAbout = get_field('hero_image');
					if (!empty($imageAbout)): ?>
						<img src="<?php echo esc_url($imageAbout['url']); ?>" alt="<?php echo esc_attr($imageAbout['alt']); ?>" />
					<?php endif; ?>
				</div>-->
				
				<div class="main-header-img">
				<?php 
				$image = get_field('hero_image');
				if (!empty($image)): ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>

				</div>
				<div class="main-header-text">
					<a href="#intro" id="link1">
						<h1><?php //the_field('page_title'); ?><span>WEB</span><span>Plus</span></h1>
					</a>
					<a href="#intro" id="link2">
						<div class="main-header-text-wrapper">
							<p class="first-text"><span>Find</span> <span>the</span> <span>Best</span> <span>solution</span> <span>for</span> <span>your</span> <span>Website!</span></p>
							<p class="second-text"><span>Click</span> <span>here</span> <span>to</span> <span>start</span></p>
						</div>
					</a>
				</div>

				<!--
				<a href="#service" class="hero-arrow">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"></path>
                    </svg>
                </a>-->
			</div>

			<ul class="social social-header">
                <li>
                    <a href="https://www.facebook.com/aljosa.rencof/" target="_blank">
                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_316_1493)">
                                <path d="M4.08398 5.625C3.04688 5.625 2.20898 6.46289 2.20898 7.5V9.83789L13.6699 18.2402C14.6602 18.9668 16.0078 18.9668 16.998 18.2402L28.459 9.83789V7.5C28.459 6.46289 27.6211 5.625 26.584 5.625H4.08398ZM2.20898 12.1641V22.5C2.20898 23.5371 3.04688 24.375 4.08398 24.375H26.584C27.6211 24.375 28.459 23.5371 28.459 22.5V12.1641L18.1055 19.752C16.4531 20.959 14.209 20.959 12.5625 19.752L2.20898 12.1641ZM0.333984 7.5C0.333984 5.43164 2.01562 3.75 4.08398 3.75H26.584C28.6523 3.75 30.334 5.43164 30.334 7.5V22.5C30.334 24.5684 28.6523 26.25 26.584 26.25H4.08398C2.01562 26.25 0.333984 24.5684 0.333984 22.5V7.5Z" fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_316_1493">
                                    <rect width="30" height="30" fill="white" transform="translate(0.333984)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/aljosarencof/" target="_blank">
                        <svg width="27" height="30" viewBox="0 0 27 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_316_1491)">
                                <path d="M13.4653 8.26172C9.73877 8.26172 6.73291 11.2676 6.73291 14.9941C6.73291 18.7207 9.73877 21.7266 13.4653 21.7266C17.1919 21.7266 20.1978 18.7207 20.1978 14.9941C20.1978 11.2676 17.1919 8.26172 13.4653 8.26172ZM13.4653 19.3711C11.0571 19.3711 9.08838 17.4082 9.08838 14.9941C9.08838 12.5801 11.0513 10.6172 13.4653 10.6172C15.8794 10.6172 17.8423 12.5801 17.8423 14.9941C17.8423 17.4082 15.8735 19.3711 13.4653 19.3711ZM22.0435 7.98633C22.0435 8.85938 21.3403 9.55664 20.4731 9.55664C19.6001 9.55664 18.9028 8.85352 18.9028 7.98633C18.9028 7.11914 19.606 6.41602 20.4731 6.41602C21.3403 6.41602 22.0435 7.11914 22.0435 7.98633ZM26.5024 9.58008C26.4028 7.47656 25.9224 5.61328 24.3813 4.07812C22.8462 2.54297 20.9829 2.0625 18.8794 1.95703C16.7114 1.83398 10.2134 1.83398 8.04541 1.95703C5.94775 2.05664 4.08447 2.53711 2.54346 4.07227C1.00244 5.60742 0.527832 7.4707 0.422363 9.57422C0.299316 11.7422 0.299316 18.2402 0.422363 20.4082C0.521973 22.5117 1.00244 24.375 2.54346 25.9102C4.08447 27.4453 5.94189 27.9258 8.04541 28.0312C10.2134 28.1543 16.7114 28.1543 18.8794 28.0312C20.9829 27.9316 22.8462 27.4512 24.3813 25.9102C25.9165 24.375 26.397 22.5117 26.5024 20.4082C26.6255 18.2402 26.6255 11.748 26.5024 9.58008ZM23.7017 22.7344C23.2446 23.8828 22.3599 24.7676 21.2056 25.2305C19.4771 25.916 15.3755 25.7578 13.4653 25.7578C11.5552 25.7578 7.44775 25.9102 5.7251 25.2305C4.57666 24.7734 3.69189 23.8887 3.229 22.7344C2.54346 21.0059 2.70166 16.9043 2.70166 14.9941C2.70166 13.084 2.54932 8.97656 3.229 7.25391C3.68604 6.10547 4.5708 5.2207 5.7251 4.75781C7.45361 4.07227 11.5552 4.23047 13.4653 4.23047C15.3755 4.23047 19.4829 4.07812 21.2056 4.75781C22.354 5.21484 23.2388 6.09961 23.7017 7.25391C24.3872 8.98242 24.229 13.084 24.229 14.9941C24.229 16.9043 24.3872 21.0117 23.7017 22.7344Z" fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_316_1491">
                                    <rect width="26.25" height="30" fill="white" transform="translate(0.333984)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/aljo%C5%A1a-ren%C4%8Dof-429933158/" target="_blank">
                        <svg width="27" height="30" viewBox="0 0 27 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_316_1485)">
                                <path d="M6.45977 26.2504H1.01758V8.725H6.45977V26.2504ZM3.73574 6.33437C1.99551 6.33437 0.583984 4.89297 0.583984 3.15273C0.583984 2.31684 0.916044 1.51517 1.50711 0.924105C2.09818 0.333036 2.89984 0.000976562 3.73574 0.000976562C4.57164 0.000976562 5.3733 0.333036 5.96437 0.924105C6.55544 1.51517 6.8875 2.31684 6.8875 3.15273C6.8875 4.89297 5.47539 6.33437 3.73574 6.33437ZM26.8281 26.2504H21.3977V17.7191C21.3977 15.6859 21.3566 13.0785 18.5682 13.0785C15.7387 13.0785 15.3051 15.2875 15.3051 17.5727V26.2504H9.86875V8.725H15.0883V11.1156H15.1645C15.891 9.73867 17.6658 8.28555 20.3137 8.28555C25.8215 8.28555 26.834 11.9125 26.834 16.6234V26.2504H26.8281Z" fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_316_1485">
                                    <rect width="26.25" height="30" fill="white" transform="translate(0.583984)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </li>
            </ul>
		</header>
					
	</section>

	<section class="section intro-section section-active desktop-only" id="intro">
		<div class="container">
			<h2><span>Hello!</span> <span>My</span> <span>name</span> <span>is</span> <span>Aljoša,</span> <span>and</span> <span>I</span> <span>can</span> <span>turn</span> <span>your</span> <span>ideas</span> <span>into</span> <span>an</span> <span>awesome</span> <span>website.</span> <span>Scroll</span> <span>down</span> <span>and</span> <span>we</span> <span>can</span> <span>bring</span> <span>your</span> <span>vision</span> <span>to</span> <span>life!</span> <span><!--<a href="#service" style="text-decoration: underline;">Click if you are ready!</a></span>-->
			</h2>
		</div>
	</section>

	<!--section 2-->
	<section id="service" class="section service-section section-active">

		<div class="container">
		<h2 class="section-title"><?php //the_field('service_title'); ?>As a Web Developer, I Offer a Variety of Services to Realize Your Ideas</h2>
			<div class="service-section-items-wrapper">
				<ul class="service-section-items">
					<?php
					// Check if the repeater field has rows of data
					if( have_rows('services') ):
						// loop through the rows of data
						while ( have_rows('services') ) : the_row();
							$icon = get_sub_field('icon_image');
							$title = get_sub_field('service_title');
							$description = get_sub_field('service_desc');
							$descriptionFull = get_sub_field('service_full_desc');
					?>
							<li>
								<span class="service-icons"><img src="<?php echo esc_url($icon); ?>" alt="service icon" /></span>
								<h4><?php echo $title; ?></h4>
								<p><?php echo $description; ?></p>
								<div class="services-desc">
									<p><?php echo $descriptionFull; ?></p>
								</div>
								<div class="btn service-section-more"><a href="javascript:;">Read more</a></div>
								<div class="service-all">
									<div class="btn btn-primary"><a href="#projects">Check my projects</a></div>
									<div class="btn"><a href="#contact">Let's talk</a></div>
								</div>


							</li>
					<?php
						endwhile;
					else :
						// no rows found
						echo '<li>No services found</li>';
					endif;
					?>
				</ul>
			</div>

		</div>
	</section>
	

	<!--section 3-->
	<section id="projects" class="section project-section section-active">
		<div class="container">
		  <h2 class="section-title"><?php //the_field('projects_title'); ?>Explore My Portfolio: Diverse Web Projects and Custom Solutions</h2>

			<ul id="category-filter" class="category-filter">
				<li data-cat-id="" class="active">All</li>
				<?php 
				$categories = get_categories();
				foreach ($categories as $category) {
					echo '<li data-cat-id="' . $category->term_id . '">' . $category->name . '</li>';
				}
				?>
			</ul>

			<div id="posts-container" class="project-section-list">
					<?php

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 6 // Adjust the number as needed
					);

					$query = new WP_Query($args);

					if ($query->have_posts()) : 
						while ($query->have_posts()) : $query->the_post();
							get_template_part('template-parts/projects');
						endwhile;
						wp_reset_postdata();
					else :
						echo '<p>No posts found.</p>';
					endif;

					?>
			</div>

	
			<button class="btn-load-more" id="load-more" data-page="1">Load More</button> <!-- Load more button -->

		</div>
	

	</section>

	<!-- popup posts -->
	<div id="popup-container" style="display:none;">
		<div class="popup-container-inner">		
			<div id="popup-content"></div>
		</div>
		<div onclick="closePopup()" class="popup-close" style="display:none;">
		<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="50px" height="50px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/></svg>
		</div>
	</div>

	<section id="about" class="section about-section section-active">
		<div class="container">
			<div class="about-section-row">
				<div class="about-section-col">
					<div class="fixer-left">
					<?php
					$imageAbout = get_field('about_me_img');
					if (!empty($imageAbout)): ?>
						<img class="about-section-img" src="<?php echo esc_url($imageAbout['url']); ?>" alt="<?php echo esc_attr($imageAbout['alt']); ?>" />
					<?php endif; ?>
					</div>
				</div>
				<div class="about-section-col about-section-text">
					<h2><?php the_field('about_me_title'); ?></h2>
					<div class="about-text">
						<?php the_field('about_me_description'); ?>
					</div>
				</div>
			</div>
		
		</div>

			
	</section>
	
	<!--

	<section id="references" class="section references-section section-active">
		<div class="container">
			<h3 class="section-subtitle">Over the years, I have collaborated with many companies. Some that I had the pleasure of working with include: </h3>
			<ul class="references-section-list">
				<li><a href="#"><img src="<?php echo get_theme_file_uri();?>/img/references/studio_moderna_logo.png" alt="Webplus Aljosa Bold"></a></li>
				<li><a href="#"><img src="<?php echo get_theme_file_uri();?>/img/references/bold-logo.svg" alt="Webplus Aljosa Bold"></a></li>
				<li><a href="#"><img src="<?php echo get_theme_file_uri();?>/img/references/zvezdaaaa.png" alt="Webplus Aljosa Bold"></a></li>
				<li><a href="#"><img src="<?php echo get_theme_file_uri();?>/img/references/mv-agency.png" alt="Webplus Aljosa Bold"></a></li>

			</ul>
		</div>
	</section>

				-->

	<section id="contact" class="section contact-section section-active">
		<div class="container">
			<h2 class="section-title"><?php //the_field('contact_title'); ?>I’m excited to hear from you and discuss how we can create something amazing together!</h2>
		     <h2 class="section-title"><?php //the_field('contact_title'); ?><strong> Fill out the form to get in touch.</strong> </h2>
			<div class="contact-section-form">
				<?php echo do_shortcode('[contact-form-7 id="ab80481" title="Contact me"]');?>
			</div>
		</div>
	</section>



</main>


<?php

get_footer();


<?php
/* Template Name: Terms*/

get_header();
?>

	<main id="primary" class="site-main terms-page">

		<div class="container">

			<div class="basic-page-inner">
				<?php
				while ( have_posts() ) :
					the_post();
					
					the_content();
					
				endwhile;
				?>

			</div>
		</div>

	</main>

<?php
get_footer();

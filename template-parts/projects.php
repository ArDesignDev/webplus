<div id="post-<?php the_ID(); ?>" class="project-section-item">

    <?php the_post_thumbnail(); ?>

    <div class="project-section-item-text">
        <h3><?php the_title(); ?></h3>
        <h4><?php the_field('project_subtitle'); ?></h4>

        <!-- Data attribute `data-post-id` is used here for the button -->
        <?php $direct_link = get_field('direct_link'); 
			if ($direct_link) { ?>
            <div class="btn btn-light">
			    <a href="<?php echo $direct_link; ?>" class="read-more" target="_blank">Visit the webiste</a>
            </a>
            </div>
        <?php } else { ?>
            <div class="btn btn-light">
                 <button class="read-more" data-post-id="<?php the_ID(); ?>">Read More</button>
            </div>
        <?php } ?>

    
    
    </div>

</div>
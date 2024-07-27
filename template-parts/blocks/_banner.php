<div class="slick-banner kv-banner">

        <?php 
        $args = array(
            'posts_per_page' => 3,
            'post_type' => 'banners',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms' => 'home-banner'
                )
            )
        );

        $topPosts = new WP_Query($args);

        if ($topPosts->have_posts()) :
        while ($topPosts->have_posts()) : $topPosts->the_post(); ?>
                <div class="banner">
                     <div class="banner-img">
                         <?php the_post_thumbnail('medium_large');?>
                    </div>
                    <div class="banner-text">
                        <div class="banner-text-inner">
                            <h2><?php the_title();?></h2>
                            <div class="banner-text-content"><?php the_content(); ?></div>

                            <?php if(get_field('button_text')) { ?>
                                <div class="btn">
                                    <a href="<?php the_field('link'); ?>"><?php the_field('button_text'); ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
              
        <?php endwhile;

        else: echo '';

        endif;

        wp_reset_postdata();  
        ?>

</div>
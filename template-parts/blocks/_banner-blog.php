<div class="kv-banner">

        <?php 
        $args = array(
            'posts_per_page' => 3,
            'post_type' => 'banners',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms' => 'blog-banner'
                )
            )
        );

        $topPosts = new WP_Query($args);

        if ($topPosts->have_posts()) :
        while ($topPosts->have_posts()) : $topPosts->the_post(); ?>
                
                 <?php the_content(); ?>
              
        <?php endwhile;

        else: echo '';

        endif;

        wp_reset_postdata();  
        ?>

</div>
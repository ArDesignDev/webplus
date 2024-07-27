<?php
/**
 * Block Name: home-slick
 *
 * This is the template that displays the home-slick block.
 */


// create id attribute for specific styling
$id = 'home-slick-' . $block['id']; ?>

<div class="home-slick" id="<?php echo $id; ?>">
    <?php if( have_rows('home_slick') ): ?>
        
            <?php while( have_rows('home_slick') ): the_row(); ?>
                <div class="home-slick-item">
                <?php 
                    $image = the_field('home_slick_img');
                    $size = 'full'; 
           
                    if( $image ) { ?>
                        <img src="<?php $image; ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php } ?>

        
                </div>
            <?php endwhile; ?>
        
    <?php endif; ?>
</div>

<?php if (is_admin()) { ?>
    <style>
        .home-slick {
            background-color: #f4f4f4;
            padding: 1rem;
        }
        .home-slick-q {
            background-color: #ddd;
            padding: 10px;
        }

        .home-slick h4 {
            margin: 0;
        }
    </style>
<?php } ?>
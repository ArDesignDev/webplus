<?php
/**
 * Block Name: Accordian
 *
 * This is the template that displays the Accordian block.
 */


// create id attribute for specific styling
$id = 'map-' . $block['id']; ?>

<div class="map-container desktop-only" id="<?php echo $id; ?>">
    <?php if( have_rows('map') ): ?>
             <img src="<?php echo the_field('map_image'); ?>" alt="Map" class="map-image">
            <?php while( have_rows('map') ): the_row(); ?>
              <div class="pin">
                <span><img src="https://bgl.si/drogart/wp-content/uploads/2023/06/map-locator.svg" alt="Pin"
                    class="pin-image"> <?php the_sub_field('city'); ?></span>
                    <div class="map-popup">
                        <div class="map-popup-inner">
                            <?php the_sub_field('description'); ?>
                        </div>
                    </div>
               </div>
            <?php endwhile; ?>
        
    <?php endif; ?>
</div>


<?php if (is_admin()) { ?>
    <style>
        .accordian {
            background-color: #f4f4f4;
            padding: 1rem;
        }
        .accordian-q {
            background-color: #ddd;
            padding: 10px;
        }

        .accordian h4 {
            margin: 0;
        }
    </style>
<?php } ?>
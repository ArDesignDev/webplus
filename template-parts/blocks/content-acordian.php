<?php
/**
 * Block Name: Accordian
 *
 * This is the template that displays the Accordian block.
 */


// create id attribute for specific styling
$id = 'accordian-' . $block['id']; ?>

<div class="accordian" id="<?php echo $id; ?>">
    <?php if( have_rows('accordion') ): ?>
        
            <?php while( have_rows('accordion') ): the_row(); ?>
                <div class="accordian-row">
                    <div class="accordian-q"><h5><?php the_sub_field('question'); ?></h5></div>
                    <div class="accordian-a"><?php the_sub_field('answer'); ?></div>
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
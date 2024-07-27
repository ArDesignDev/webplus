
<?php
// image link ?>

<img src="<?php echo get_theme_file_uri();?>/img/logo.svg" alt="Bold Group Logo">


<?php
/////////// 
// ACF 
///////////
?>

<?php 
// banner with link ?>
<div class="product-banner">
    <?php 
    $link = get_field('product_banner_link');
    $image = get_field('product_banner_image');
    $size = 'full'; 

    if( $link ): ?>
        <a href="<?php echo esc_url( $link ); ?>">
            <?php 
            if( $image ) { ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php } ?>
        </a>
    <?php endif; ?>
</div>


<?php 
// just images
$image = get_field('work_logo');

if( $image ) {
        if( $image ) { ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="300" height="150#" />
        <?php } ?>
<?php } ?>


<?php
// loop ?>
<div class="product-properties">
    <?php if( have_rows('additional_info') ): ?>
        <h3>Lastnosti</h3>
        <ul>
            <?php while( have_rows('additional_info') ): the_row(); ?>	
                <li><?php the_sub_field('title'); ?></li>
                <li><?php the_sub_field('content'); ?></li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</div>

<?php
// woocommerce minicart ?>

<?php woocommerce_mini_cart(); ?>

<?PHP
// EXTRA CODE IF i NEED IT LATER
// Display pagination
	
    /*
    $pagination_links = paginate_links(array(
        'total' => $query->max_num_pages,
    ));
    
    if ($pagination_links) {
        echo '<div class="pagination">';
        echo $pagination_links;
        echo '</div>';
    }
    */
    
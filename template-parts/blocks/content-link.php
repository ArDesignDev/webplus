<?php
/**
 * Block Name: Link
 *
 * This is the template that displays the Link block.
 */


$link = get_field( "block_link" );
$name = get_field( "block_link_name" );

if( $name ) { ?>

    <h3 class="subpages-link"><a href="<?php echo $link; ?>"> <?php echo $name; ?></a></h3>

<?php } ?>


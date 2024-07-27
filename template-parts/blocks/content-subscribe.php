<?php
/**
 * Block Name: Accordian
 *
 * This is the template that displays the Accordian block.
 */


 $link = get_field( "block_file" );
 $name = get_field( "block_file_name" );
 
 if( $name ) { ?>


     <div class="subscribe-widget">
        <h2> Prenesi našo novo knjigo</h2>
        <p>Prijavite se na naše novice in prejeli boste e-knjigo, polno praktičnih nasvetov o negi veših očeh.</p>
        <div class="btn">
            <a href="<?php echo $link; ?>" download> <?php echo $name; ?></a>
        </div>
    </div>
 
<?php } ?>



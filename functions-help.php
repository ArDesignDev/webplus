<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */


 /*
	========================
		Enqueue scripts and styles.
	========================
*/

function wallart_files() {

   wp_enqueue_script('wallart-js', get_theme_file_uri('/js/script.js'), array('jquery'), '1.12', true);
   wp_enqueue_style('wallart-product-styles', get_theme_file_uri('/css/product-page.css'), array(), '1.0.22.', 'all');
   wp_enqueue_style('wallart-cart-styles', get_theme_file_uri('/css/cart.css'), array(), '1.0.22.', 'all');
   wp_enqueue_style('wallart-landing-styles', get_theme_file_uri('/css/landing-pages.css'), array(), '1.0.22.', 'all');
   wp_enqueue_style('wallart-grid-styles', get_theme_file_uri('/css/grid.css'), array(), '1.0.22.', 'all');
   wp_enqueue_style('wallart-styles', get_theme_file_uri('/css/style.css'), array(), '1.0.22.', 'all');
}

add_action('wp_enqueue_scripts', 'wallart_files');


// svg suppor
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }

add_filter('upload_mimes', 'cc_mime_types');

/*
	========================
		Bages
	========================
*/

// New badge for recent products
/*
add_action( 'woocommerce_before_shop_loop_item_title', 'new_badge', 3 );
          
function new_badge() {
   global $product;
   $newness_days = 30; // Number of days the badge is shown
   $created = strtotime( $product->get_date_created() );
   if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
      echo '<span class="new-badge new">' . esc_html__( 'Novo', 'woocommerce' ) . '</span>';
   }
}
// change sale! text on badge
add_filter( 'woocommerce_sale_flash', 'change_on_sale_badge', 10, 2 );

function change_on_sale_badge( $badge_html, $post ) {
	return '<span class="onsale">Akcija</span>';
}

/*

	========================
		Adding + and - to products
	========================
*/

// change quantity + and -
add_action( 'woocommerce_after_add_to_cart_quantity', 'ts_quantity_plus_sign' );
 
function ts_quantity_plus_sign() {
   echo '<button type="button" class="plus" >+</button>';
}
 
add_action( 'woocommerce_before_add_to_cart_quantity', 'ts_quantity_minus_sign' );

function ts_quantity_minus_sign() {
   echo '<button type="button" class="minus" >-</button>';
}
 
add_action( 'wp_footer', 'ts_quantity_plus_minus' );
 
function ts_quantity_plus_minus() {
   // To run this on the single product page
   if ( ! is_product() ) return;
   ?>
   <script type="text/javascript">
          
      jQuery(document).ready(function($){   
          
            $('form.cart').on( 'click', 'button.plus, button.minus', function() {
 
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
 
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } 
            else {
               qty.val( val + step );
                 }
            } 
            else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } 
               else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
             
         });
          
      });
          
   </script>
   <?php
}


/*

	========================
		Product page position fixes and text
	========================
*/

function woocommerce_add_custom_text_after_product_title(){

    dynamic_sidebar('product-guarantee');

}
add_action( 'woocommerce_single_product_summary', 'woocommerce_add_custom_text_after_product_title', 11);

// review stars position
function add_new_star_rating() {
   add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action('init', 'add_new_star_rating');

// text changes
function bbloomer_rename_description_tab_heading() {
   return 'Opis izdelkov';
}

add_filter( 'woocommerce_product_description_heading', 'bbloomer_rename_description_tab_heading' );

add_filter('woocommerce_product_related_products_heading',function(){

   return 'Ostali so si ogledovali tudi ...';

});

// showen content on product pages
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

/*

	========================
		WIDGET AREA
	========================
*/

 function ourWidgetsInit() {

    // Product guarante
    register_sidebar( array(
        'name' => 'Product guarantee',
        'id' => 'product-guarantee',
        'before_widget' => '<div class="product-guarantee">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="product-guarantee-title">',
        'after_title' => '</h4>',
    ));

   register_sidebar( array(
        'name' => 'Product guarantee bottom',
        'id' => 'product-guarantee-bottom',
        'before_widget' => '<div class="product-guarantee-bottom">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

   register_sidebar( array(
      'name' => 'FAQ',
      'id' => 'faq',
      'before_widget' => '<div class="faq-block">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ));

  register_sidebar( array(
   'name' => 'All reviews',
   'id' => 'all-reviews',
   'before_widget' => '<div class="faq-block">',
   'after_widget' => '</div>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ));

   register_sidebar( array(
      'name' => 'Footer 1',
      'id' => 'footer-1',
      'before_widget' => '<div class="footer-1">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
   ));

   register_sidebar( array(
      'name' => 'Footer 2',
      'id' => 'footer-2',
      'before_widget' => '<div class="footer-2">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
   ));

   register_sidebar( array(
      'name' => 'Slim Banner',
      'id' => 'slim-banner',
      'before_widget' => '<div class="slim-banner-inner">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="slim-banner-title">',
      'after_title' => '</h3>',
   ));

}

add_action('widgets_init', 'ourWidgetsInit');

/*
	========================
		Show cart contents / total Ajax
	========================
*/
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
		<span class="cart-icon-number"><span>	<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span></span></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}


/*
	========================
		THEME SUPPORT - Menus
	========================
*/

function wpb_custom_new_menu() {
   // menu-1 in main theme
   register_nav_menu('menu-3',__( 'Header 2' ));
 }
 add_action( 'init', 'wpb_custom_new_menu' );




/*
	========================
		CHECKOUT ADD IMAGES
	========================
*/
add_filter( 'woocommerce_cart_item_name', 'ts_product_image_on_checkout', 10, 3 );

function ts_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {  

    /* Return if not checkout page */
    if ( ! is_checkout() ) {
        return $name;
    }

    /* Get product object */
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

    /* Get product thumbnail */
    $thumbnail = $_product->get_image();

    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>';

    /* Prepend image to name and return it */
    return $image . $name;

}


/*
	========================
		Add To Cart Button
	========================
*/

// Change the Add To Cart Button Text on the Product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
return __( 'Dodaj v košarico', 'woocommerce' ); 
}

// Change the Add To Cart Button Text on the Product Archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' ); 
function woocommerce_custom_product_add_to_cart_text() {
return __( 'Dodaj v košarico', 'woocommerce' );
}

// Change checkout button text
add_filter( 'woocommerce_order_button_text', 'woocommerce_custom_checkout_button_text' ); 
   function woocommerce_custom_checkout_button_text() {
   return __( 'ZAKLJUČITE NAROČILO', 'woocommerce' );
}


/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


/*
	========================
		Upsell Area - WooCommerce Checkout
	========================
*/


/*
/* remove button on checkout */
  add_filter('woocommerce_cart_item_name', 'custom_filter_wc_cart_item_remove_link', 10, 3);
function custom_filter_wc_cart_item_remove_link($product_name, $cart_item, $cart_item_key)
{
  
    if (is_checkout()) {
        $product_name .= apply_filters('woocommerce_cart_item_remove_link', sprintf(
            '<a href="%s" rel="nofollow" class="remove" style="float:left;">&times;</a>',
            esc_url(WC_Cart::get_remove_url($cart_item_key)),
            __('Remove this item', 'woocommerce'),
            esc_attr($cart_item['product_id']),
            esc_attr($cart_item['data']->get_sku())
        ), $cart_item_key);
        return $product_name;
    }
}


add_action( 'woocommerce_review_order_before_submit', 'bbloomer_find_product_in_cart' );
    
function bbloomer_find_product_in_cart() {
  
   $product_id = 2210;
  
   $product_cart_id = WC()->cart->generate_cart_id( $product_id );
   $in_cart_One = WC()->cart->find_product_in_cart( $product_cart_id );
  
   if ( !$in_cart_One ) {
  
      echo '<div class="checkout-upsell"><a class="checkout-upsell-premium" style="margin-right: 1em; width: auto" href="?add-to-cart=2210"> <h3>Premium zavarovanje paketa <span class="checkout-upsell-price">0.79 €</spa></h3> <p>Izogni se dolgotrajnim reklamacijskim postopkom s kurirji. V primeru, da je paket izgubljen ali poškodovan, bomo nemudoma odposlali nov paket, vračanje ali reklamiranje starega pa ni potrebno.</p> </a></div>';
  
   }

   $product_id = 2213;
  
   $product_cart_id = WC()->cart->generate_cart_id( $product_id );
   $in_cart_One = WC()->cart->find_product_in_cart( $product_cart_id );
  
   if ( !$in_cart_One ) {
      echo '<div class="checkout-upsell"><a class="checkout-upsell-years" style="margin-right: 1em; width: auto" href="?add-to-cart=2213"> <h3>2-letno Jamstvo <span class="checkout-upsell-price">6.99 €</spa></h3> <p>Izogni se dolgotrajnim reklamacijskim postopkom s kurirji. V primeru, da je paket izgubljen ali poškodovan, bomo nemudoma odposlali nov paket, vračanje ali reklamiranje starega pa ni potrebno.</p> </a></div>';
   }
/*
   $product_id = 2213;
  
   $product_cart_id = WC()->cart->generate_cart_id( $product_id );
   $in_cart_One = WC()->cart->find_product_in_cart( $product_cart_id );
  
   if ( !$in_cart_One ) {
      echo '<div class="checkout-upsell"><a class="checkout-upsell-gift" style="margin-right: 1em; width: auto" href="?add-to-cart=2213"> <h3>Premium zavarovanje paketa <span class="checkout-upsell-price">0.79 €</spa></h3> <p>Izogni se dolgotrajnim reklamacijskim postopkom s kurirji. V primeru, da je paket izgubljen ali poškodovan, bomo nemudoma odposlali nov paket, vračanje ali reklamiranje starega pa ni potrebno.</p> </a></div>';
   }
  */
}


// Extra info
/*
function woocommerce_add_custom_text_after_product_title(){

    echo 'test';
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_add_custom_text_after_product_title', 11);
*/
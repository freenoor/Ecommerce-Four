<?php

function style_on_load(){
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css', array(), '1.0.2', 'all');
    wp_enqueue_style('main-css', get_template_directory_uri().'/assets/bootstrap/css/main.css', array(), '1.0.2', 'all');
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css', array(), '1.0.0', 'all');
    wp_enqueue_style('slick-css', get_template_directory_uri().'/assets/slick/slick.css', array(), '1.8.1', 'all');
    wp_enqueue_style('slick-css1', get_template_directory_uri().'/assets/slick/slick-theme.css', array(), '1.8.1', 'all');
    wp_enqueue_script('slick-js', get_template_directory_uri().'/assets/slick/slick.js', array(), '1.8.1', true);
    wp_enqueue_script('jquery', get_template_directory_uri().'/assets/jquery/jquery.slim.min.js', array(), '2.0.1', 'all');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array(), '2.0.2', 'all');
   
}
add_action('wp_enqueue_scripts','style_on_load');

register_nav_menus(array(
  'primary'=>__('Primary Menu'),
  'footer'=>__('Footer Menu'),
  'topmenu'=>__('Top Menu'),

));

//Logo, Page header image, Post thumbnails
add_theme_support("custom-logo");
add_theme_support("custom-header");
add_theme_support("post-thumbnails");



add_theme_support( 'woocommerce' );


function myWidget(){
  register_sidebar(array(
    'name'=>'Text Logo Footer',
    'id' => 'txt_logo_footer'
  ));
  register_sidebar(array(
      'name'=>'Follow Us',
      'id' => 'follow_us'
  ));
  register_sidebar(array(
    'name'=>'Contact Us Footer',
    'id' => 'contact_us_adress'
  ));
  register_sidebar(array(
    'name'=>'tel',
    'id' => 'tel'
  ));
  register_sidebar(array(
    'name'=>'img_card_footer',
    'id' => 'img_card_footer'
  ));
  
  register_sidebar(array(
    'name'=>'email',
    'id' => 'email'
  ));

  register_sidebar(array(
    'name'=>'Information',
    'id' => 'information'
  ));
  register_sidebar(array(
    'name'=>'Service',
    'id' => 'service'
  ));
  register_sidebar(array(
    'name'=>'Extras',
    'id' => 'extras'
  ));
  register_sidebar(array(
    'name'=>'My Account',
    'id' => 'my_account'
  ));
  register_sidebar(array(
    'name'=>'Userful Links',
    'id' => 'userful_links'
  ));
  register_sidebar(array(
    'name'=>'Our Offers',
    'id' => 'our_offers'
  ));
  register_sidebar(array(
    'name'=>'subscribe',
    'id' => 'subscribe'
  ));
  register_sidebar(array(
    'name'=>'Foter social media',
    'id' => 'social_media'
  ));
  register_sidebar(array(
    'name'=>'Best seller',
    'id' => 'best_seller'
  ));
  register_sidebar(array(
    'name'=>'Language',
    'id' => 'language'
  ));

  register_sidebar(array(
    'name'=>'currency',
    'id' => 'currency'
  ));
  register_sidebar(array(
    'name'=>'search_pro',
    'id' => 'search_pro'
  ));
  register_sidebar(array(
    'name'=>'Best Seller Slider',
    'id' => 'best_seller_slider'
  ));

}
add_action('widgets_init', 'myWidget');


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Remove the Product Description Title
add_filter('woocommerce_product_description_heading', 'hjs_product_description_heading');
function hjs_product_description_heading() {
 return '';
}


add_filter( 'woocommerce_product_description_tab_title', 'bbloomer_rename_description_product_tab_label' );
 
function bbloomer_rename_description_product_tab_label() {
    return 'Product Information';
}



function uw_custom_product_tab( $tabs ) {

	global $post;

 	$tabs['uw_custom_product_tab'] = array(
	 	'title' => 'Another tab',
	 	'priority' => 50,
	 	'callback' => function( $key, $tab ) {
	 		echo "Our custom test tab's content, added via PHP!";
	 	}
 	);

	return $tabs;
}
add_action( 'woocommerce_product_tabs', 'uw_custom_product_tab' );



// Change WooCommerce "Related products" text

add_filter('gettext', 'change_rp_text', 10, 3);
add_filter('ngettext', 'change_rp_text', 10, 3);

function change_rp_text($translated, $text, $domain)
{
     if ($text === 'Related products' && $domain === 'woocommerce') {
         $translated = esc_html__('RELATED PRODUCTS', $domain);
     }
     return $translated;
}






// ADDING TOP HEADER CART ITEMS

//* Make Font Awesome available
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

}

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'topmenu' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'your-theme-slug');
		$start_shopping = __('Start shopping', 'your-theme-slug');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="fa fa-shopping-basket"></i> ';

			$menu_item .= $cart_contents.' - '. $cart_total;
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// }
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary2', 'woocommerce_output_related_products', 6 );




add_action('woocommerce_before_single_product_summary','custom_hot_product');
function custom_hot_product(){
  global $product;
  $is_hot = get_post_meta( $product->id, '_checkbox', true );
  if ( 'yes' == $is_hot ) {
    echo '<span class="hot-product"></span>';
  }
}






function woocommerce_button_proceed_to_checkout() { ?>
  <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward">
  <?php esc_html_e( 'Check out', 'woocommerce' ); ?>
  </a>
  <?php
 }
 






 // rename the coupon field on the cart page
function woocommerce_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ( 'Coupon:' === $text ) {
		$translated_text = 'Discount Code:';
	}
	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );

// rename the "Have a Coupon?" message on the checkout page
function woocommerce_rename_coupon_message_on_checkout() {
	return 'Have a Discount Code?' . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>';
}
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );
// rename the coupon field on the checkout page
function woocommerce_rename_coupon_field_on_checkout( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ( 'Coupon code' === $text ) {
		$translated_text = 'Voucher code';
	
	} elseif ( 'Apply coupon' === $text ) {
		$translated_text = 'Reedem';
	}
	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_checkout', 10, 3 );








add_filter('gettext', 'wc_renaming_checkout_total', 20, 3);
function wc_renaming_checkout_total( $translated_text, $untranslated_text, $domain ) {

    if( !is_admin() && is_checkout() ) {
        if( $untranslated_text == 'Total' )
            $translated_text = __( 'TOTAL','theme_slug_domain' );
    }
    return $translated_text;
}








// Shipping fee change name 
add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
  return 'Shipping fee';
}







// Quantity fee change name 
add_filter('gettext', 'translate_reply');
add_filter('ngettext', 'translate_reply');

function translate_reply($translated) {
$translated = str_ireplace('Quantity', 'QTY', $translated);
return $translated;
}





//svg add to cart button
add_filter( 'woocommerce_loop_add_to_cart_link', 'ts_replace_add_to_cart_button', 10, 2 );
function ts_replace_add_to_cart_button( $button, $product ) {
  // if (is_product_category() || is_shop() || is_front_page() || is_single()) {
    $button_text = __("", "woocommerce");
    $button_link = $product->get_permalink();
    $button = '<a class="fa fa-shopping-cart button" href="' . $button_link . '">' . $button_text . '</a>';
  return $button;
// }
}










add_shortcode('woocs_in_menu', function() {
    if (defined('WOOCS_LINK')) {
        $styles_link = WOOCS_LINK . 'views/shortcodes/styles/for-menu/';
        wp_enqueue_style('woocs-style-in-menu', $styles_link . "styles.css", array(), WOOCS_VERSION);
        wp_enqueue_script('woocs-style-in-menu', $styles_link . "actions.js", array('jquery'), WOOCS_VERSION);
 
        ob_start();
        ?>
        <span style="cursor: pointer;">Click on me!!</span><br />
        <div class="woocs-style-for-menu-dialog" style="display:none; text-align: left; width: 160px;">
            <div class="woocs-style-for-menu-title">Select Currency</div>
            <div class="woocs-style-for-menu-form"><?php echo do_shortcode('[woocs style=3]') ?></div>
        </div>
 
        <?php
        return ob_get_clean();
    }
});








// Remove SKU
function sv_remove_product_page_skus( $enabled ) {
  if ( ! is_admin() && is_product() ) {
      return false;
  }

  return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );





add_filter( 'woocommerce_sale_flash', 'wc_custom_replace_sale_text' );
function wc_custom_replace_sale_text( $html ) {
return str_replace( __( 'Sale!', 'woocommerce' ), __( 'HOT', 'woocommerce' ), $html );
}



// gb
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15 );


// Change product availability text
// add_filter( 'woocommerce_get_availability_text', 'filter_product_availability_text', 10, 2);
// function filter_product_availability_text( $availability, $product ) {
//     $date_of_availability = get_field('date_of_availability');

//     if ( ! $product->is_in_stock() && ! empty($date_of_availability) ) {
//         $availability .= '<span style="color:#e2401c;"><strong>- (' . __('Available from:', 'flatsome') . ' </strong>' . get_field('date_of_availability') . ')</span>';
//     }
//     return $availability;
// }




/**
 * @snippet       Display "Quantity: #" @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.6.2
 */
  
add_filter( 'woocommerce_get_availability_text', 'bbloomer_custom_get_availability_text', 99, 2 );
  
function bbloomer_custom_get_availability_text( $availability, $product ) {
  $stock = $product->get_stock_quantity();
  $stock_availability = ('in stock');
  if ( $product->is_in_stock() && $product->managing_stock() ) $availability = __( 'Availability : ' . $stock_availability, 'woocommerce' );
  return $availability;
}


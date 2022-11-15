<?php
/**
 * Rapid STD Testing
 *
 * Customize Theme for RST.
 *
 * @package Starter Theme
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'rst_localization_setup' );
function rst_localization_setup(){
	load_child_theme_textdomain( 'rst', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Add Custom shortcode
include_once( get_stylesheet_directory() . '/inc/custom-shortcode.php' );

include_once( get_stylesheet_directory() . '/inc/jerome-shortcode.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'RST' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'rst_enqueue_scripts_styles' );
function rst_enqueue_scripts_styles() {

	// CSS
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Poppins:100,200,300,300i,400,400i,500,600,700,700i,800,900&display=swap' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'slicktheme', get_stylesheet_directory_uri() . '/lib/slick/slick-theme.css', array(), "1.8.1" );
	//wp_enqueue_style( 'slicktheme-min', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', array(), CHILD_THEME_VERSION );
	//wp_enqueue_style( 'slicktheme-map', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css.map', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/lib/slick/slick.css', array(), "1.8.1" ); 
	
	wp_enqueue_style( 'exit', get_stylesheet_directory_uri() . '/css/stick-to-me.css', array(), CHILD_THEME_VERSION );  	
	wp_enqueue_style( 'child', get_stylesheet_directory_uri() . '/child.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'child-2', get_stylesheet_directory_uri() . '/child2.css', array(), CHILD_THEME_VERSION );
	
	// JS
	//wp_enqueue_script( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ), "1.12.1" ); // sample
	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/lib/slick/slick.min.js', array( 'jquery' ), "1.8.1", true );
	wp_enqueue_script ( 'matchheight' , '//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	//wp_enqueue_script( 'mansory', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	//wp_enqueue_script( 'mansory2', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'exit-js', get_stylesheet_directory_uri() . '/js/stick-to-me.js', array( 'jquery' ), CHILD_THEME_VERSION );
	wp_enqueue_script ( 'maps' , '//maps.googleapis.com/maps/api/js?key=AIzaSyAC0pGXorK82o3r7otui1zb6naTkny4_oY&callback=initAutocomplete&libraries=places&v=weekly', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'tel-input','//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js', array( 'jquery' ), CHILD_THEME_VERSION );
	wp_enqueue_script( 'polyfill','//polyfill.io/v3/polyfill.min.js?features=default', array( 'jquery' ), CHILD_THEME_VERSION );	
	wp_enqueue_script( 'child-js', get_stylesheet_directory_uri() . '/js/child.js', array( 'jquery', 'slick', 'matchheight', 'exit-js' ), CHILD_THEME_VERSION );

	wp_enqueue_script( 'custom-js-paylater', get_stylesheet_directory_uri() . '/js/jerome-js.js', array( 'jquery' ), CHILD_THEME_VERSION );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	//wp_enqueue_script( 'rst-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	//wp_localize_script(
		//'rst-responsive-menu',
		//'genesis_responsive_menu',
		//rst_responsive_menu_settings()
	//);

}

// Define our responsive menu settings.
function rst_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'rst' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'rst' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}


/** CHANGE ADMIN CSS **/
/** http://www.code-slap.com/4-space-tabs-in-textarea-editors/ **/
if ( !function_exists('base_admin_css') ) {
	function base_admin_css()
	{
		wp_enqueue_style('base-admin-css', get_stylesheet_directory_uri() .'/admin.css', false, '1.0', 'all');
	}
	add_action( 'admin_print_styles', 'base_admin_css' );
}

//woo support
add_action( 'after_setup_theme', 'setup_woocommerce_support' );
function setup_woocommerce_support() {
  add_theme_support('woocommerce');
}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
//add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'rst' ), 'secondary' => __( 'Footer Menu', 'rst' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'rst_secondary_menu_args' );
function rst_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'rst_author_box_gravatar' );
function rst_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'rst_comments_gravatar' );
function rst_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}


add_action( 'get_header', 'rst_remove_titles_all_single_pages' );
function rst_remove_titles_all_single_pages() {
    if ( is_singular() ) {
        remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
        remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
        remove_action( 'genesis_after_post_content', 'genesis_post_meta', 12 );
        remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
    }
}

add_action('template_redirect', 'remove_primary_nav_front_page');
function remove_primary_nav_front_page() {
	remove_action('genesis_after_header', 'genesis_do_nav');
}


add_filter( 'wpsl_templates', 'custom_templates' );

function custom_templates( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    if ( is_page( '13229' ) || is_page('checkout-location') || is_page('checkout-change-location') ) {
	    $templates[] = array (
	        'id'   => 'custom',
	        'name' => 'Custom template',
	        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/custom2.php',
	    );
	}
	else {
	    $templates[] = array (
	        'id'   => 'custom',
	        'name' => 'Custom template',
	        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/custom.php',
	    );   
	}

	return $templates;
}


add_filter( 'wpsl_listing_template', 'custom_listing_template' );

function custom_listing_template() {
	ob_start();
		global $wpsl, $wpsl_settings;
		if ( is_page( '13229' ) || is_page('checkout-location') || is_page('checkout-change-location') ) {
		    echo '<li data-store-id="<%= id %>">';
		    echo '<div class="wpsl-store-location">';
		    echo '<p><%= thumb %>';
		    echo wpsl_store_header_template( 'listing' ); // Check which header format we use
		    echo '<span class="wpsl-street"><%= address %></span>';
		    echo '<% if ( address2 ) { %>';
		    echo '<span class="wpsl-street"><%= address2 %></span>';
		    echo '<% } %>';
		    echo '<span>' . wpsl_address_format_placeholders() . '</span>'; // Use the correct address format

		    if ( !$wpsl_settings['hide_country'] ) {
		        echo '<span class="wpsl-country"><%= country %></span>';
		    }

		    echo '</p>';
		    
		  

		    // Show the phone, fax or email data if they exist.
		    if ( $wpsl_settings['show_contact_details'] ) {
		        echo '<p class="wpsl-contact-details">';
		        echo '<% if ( phone ) { %>';
		        echo '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>';
		        echo '<% } %>';
		        echo '<% if ( fax ) { %>';
		        echo '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>';
		        echo '<% } %>';
		        echo '<% if ( email ) { %>';
		        echo '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= email %></span>';
		        echo '<% } %>';
		        echo '</p>';
		    }

		    echo wpsl_more_info_template(); // Check if we need to show the 'More Info' link and info
		    echo '</div>';
		    echo '<div class="wpsl-direction-wrap"><p>Distance: ';

		    if ( !$wpsl_settings['hide_distance'] ) {
		        echo '<%= distance %> ' . esc_html( $wpsl_settings['distance_unit'] );
		    }

		    echo '</p></div>';
		     echo '<% if ( hours ) { %>';
		    echo '<div class="wpsl-store-hours"><strong>Show Business Hours <i class="fas fa-arrow-right"></i></strong> <%= hours %></div>';
		    echo '<% } %>';
		    if ( is_page('checkout-location') ) {
		    	echo '<a href="/checkout-change-location/" class="btn">Change Location</a>';
		    }
		    else if( is_page('checkout-change-location') ) {
		    	echo '<a href="/checkout-info/?testing_location_id=<%= store_location_id %>&zip_search=<%= zip %>&testing_address=<%= address %> ' . wpsl_address_format_placeholders() . '" class="btn">Select This Location</a>';	
		    } 
		    else {
		    	if( class_exists( 'WooCommerce' ) ) {
				    if ( WC()->cart->get_cart_contents_count() == 0 ) {
				    	echo '<a href="/test-and-panels/?testing_location_id=<%= store_location_id %>&zip_search=<%= zip %>&testing_address=<%= address %> ' . wpsl_address_format_placeholders() .'" class="btn">Select This Location</a>';
				    }	
				    else {
				    	echo '<a href="/checkout-location/?testing_location_id=<%= store_location_id %>&zip_search=<%= zip %>&testing_address=<%= address %> ' . wpsl_address_format_placeholders() . '" class="btn">Select This Location</a>';
					}
				}
			}
		    echo '</li>';
		}

	return ob_get_clean();	
}

add_filter( 'wpsl_js_settings', 'custom_wpsl_js_settings' );
function custom_wpsl_js_settings( $args ) {

    if ( is_page( 'checkout-location' ) ) {
        $args['maxResults'] = 1;
    } 
    return $args;

}

add_action('wp_head', 'wpsl_hide_div');
function wpsl_hide_div() {
	if ( is_page( 'checkout-location' ) ) {
       ?>
       <style type="text/css">
       	.wpsl-search {
       		display: none;
       	}
       </style>
       <?php
    } 

    if( !empty( $_GET['key'] ) ) {
    	?>
    	<style type="text/css">
       	.pay-tab .fl-tabs-labels,
       	div.h2,
       	div.col2,
       	.checkout-hero-row .fl-tabs-horizontal .fl-tabs-label {
       		display: none !important;
       	}
       </style>
    	<?php
    }
}


add_action( 'wp_head', 'wpsl_hide_test_panel' );
function wpsl_hide_test_panel() {
	if( is_page('checkout-change-location') || is_page('checkout-info') || is_page('checkout-location') || is_page('checkout') ) {
		global $woocommerce;
	    $items = $woocommerce->cart->get_cart();
	    foreach($items as $item => $values) { 
	        $pid  = $values['product_id'];
	        if( $pid == '13254') {
	        	?>
	        	<style type="text/css">
		       	#cr13253 {
		       		display: none !important;
		       	}
		       </style>
	        	<?php
	        }
	    } 
	    if( !empty( $_GET['state'] ) ) {
		    if( $_GET['state'] == 'NY' || $_GET['zip'] == '10001' ) {
		    	?>
		    	<style type="text/css">
			       	#cr13460 {
			       		display: none !important;
			       	}
			    </style>
		    	<?php
		    }
		}
	}
}

add_filter( 'wpsl_js_settings', 'custom_js_settings' );
function custom_js_settings( $settings ) {

    $settings['startMarker'] = '';

    return $settings;
}


add_filter( 'fl_builder_loop_query_args', 'fl_builder_loop_query_args_filter' );
function fl_builder_loop_query_args_filter( $query_args ) {
	if ( !class_exists('ACF') ) {
		return;
	}

	if ( 'locationchild1' == $query_args['settings']->id ) {
		$query_args['post_parent'] = get_the_ID();
	}
	elseif ( 'locationchild2' == $query_args['settings']->id ) {
		$query_args['post_parent'] = 3025;
	}
	elseif ( 'locationblog1' == $query_args['settings']->id ) {
		if( get_field('state_name') ) {
			$tax_query = array(
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'post_tag',
			            'field'    => 'name',
			            'terms'    => get_field('state_name'),
			        ),
			    ),
			);

			$query_args['tax_query'] = $tax_query;
		}
		elseif( get_field('city_state_name') ) {
			$tax_query = array(
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'post_tag',
			            'field'    => 'name',
			            'terms'    => get_field('city_state_name'),
			        ),
			    ),
			);

			$query_args['tax_query'] = $tax_query;
		}
		elseif( get_field('location_state') ) {
			$tax_query = array(
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'post_tag',
			            'field'    => 'name',
			            'terms'    => get_field('location_state'),
			        ),
			    ),
			);

			$query_args['tax_query'] = $tax_query;
		}
	}
    return $query_args;
}

add_filter( 'the_content', 'remove_divi_shortcodes' );
function remove_divi_shortcodes( $content ) {
    $content = preg_replace('/\[\/?et_pb.*?\]/', '', $content);
    return $content;
}

add_action( 'wp_loaded', 'add_multiple_to_cart_action', 20 );
function add_multiple_to_cart_action() {
    if ( ! isset( $_REQUEST['multiple-item-to-cart'] ) || false === strpos( wp_unslash( $_REQUEST['multiple-item-to-cart'] ), '|' ) ) { // phpcs:ignore WordPress.Security.NonceVerification.NoNonceVerification, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
        return;
    }

    wc_nocache_headers();

    $product_ids        = apply_filters( 'woocommerce_add_to_cart_product_id', wp_unslash( $_REQUEST['multiple-item-to-cart'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.NoNonceVerification
    $product_ids = explode( '|', $product_ids );
    if( ! is_array( $product_ids ) ) return;

    $product_ids = array_map( 'absint', $product_ids );
    $was_added_to_cart = false;
    $last_product_id = end($product_ids);
    //stop re-direction
    add_filter( 'woocommerce_add_to_cart_redirect', '__return_false' );
    foreach ($product_ids as $index => $product_id ) {
        $product_id = absint(  $product_id  );
        if( empty( $product_id ) ) continue;
        $_REQUEST['add-to-cart'] = $product_id;
        if( $product_id === $last_product_id ) {

            add_filter( 'option_woocommerce_cart_redirect_after_add', function() { 
                return 'yes'; 
            } );
        } else {
            add_filter( 'option_woocommerce_cart_redirect_after_add', function() { 
                return 'no'; 
            } );
        }

        WC_Form_Handler::add_to_cart_action();
    }
}

add_action( 'template_redirect', 'ja_remove_product_from_cart' );
 
function ja_remove_product_from_cart() {
	if ( is_admin() ) return;
	$product_ids = apply_filters( 'woocommerce_add_to_cart_product_id', wp_unslash( $_REQUEST['rem-item-to-cart'] ) );
	$product_ids = explode( '|', $product_ids );
    if( ! is_array( $product_ids ) ) return;
   	$product_ids = array_map( 'absint', $product_ids );
   	foreach ($product_ids as $index => $product_id ) {
   		$product_id = absint(  $product_id  );
	   	$product_cart_id = WC()->cart->generate_cart_id( $product_id );
	   	$cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
	   	if ( $cart_item_key ) WC()->cart->remove_cart_item( $cart_item_key );
   	}
}

add_shortcode( 'ja_product_price', 'ja_woo_product_price_shortcode' );
function ja_woo_product_price_shortcode( $atts ) {
 
	if ( empty( get_the_ID() ) ) {
		return '';
	}
 
	$product = wc_get_product( get_the_ID() );
 
	if ( ! $product ) {
		return '';
	}
 
	return $product->get_price_html();
}

//remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );


// Removes Order Notes Title - Additional Information & Notes Field
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

// Remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );

function remove_order_notes( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}

//Custom Cross sell to show on checkout pages
function ja_woocommerce_cross_sell_display( $limit = 2, $columns = 2, $orderby = 'rand', $order = 'desc' ) {
	// Get visible cross sells then sort them at random.
	$cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );

	wc_set_loop_prop( 'name', 'cross-sells' );
	wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_cross_sells_columns', $columns ) );

	// Handle orderby and limit results.
	$orderby     = apply_filters( 'woocommerce_cross_sells_orderby', $orderby );
	$order       = apply_filters( 'woocommerce_cross_sells_order', $order );
	$cross_sells = wc_products_array_orderby( $cross_sells, $orderby, $order );
	$limit       = apply_filters( 'woocommerce_cross_sells_total', $limit );
	$cross_sells = $limit > 0 ? array_slice( $cross_sells, 0, $limit ) : $cross_sells;

	wc_get_template(
		'cart/cross-sells.php',
		array(
			'cross_sells'    => $cross_sells,

			// Not used now, but used in previous version of up-sells.php.
			'posts_per_page' => $limit,
			'orderby'        => $orderby,
			'columns'        => $columns,
		)
	);
}

/**
 * Pre-populate Woocommerce checkout fields
 * Note that this filter populates shipping_ and billing_ fields with a different meta field eg 'first_name'
 */


add_filter( 'gettext', 'ja_custom_paypal_button_text', 20, 3 );
function ja_custom_paypal_button_text( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Proceed to PayPal' :
		$translated_text = __( 'Pay Now', 'woocommerce' );
		case 'Place order' :
		$translated_text = __( 'Pay Now', 'woocommerce' );
		break;
	}
	return $translated_text;
}

add_action( 'template_redirect', 'define_default_payment_gateway' );
function define_default_payment_gateway() {
    if( is_checkout() && ! is_wc_endpoint_url() ) {
        // HERE define the default payment gateway ID
        $default_payment_id = 'payment_method_authorize_net_cim_credit_card';

        WC()->session->set( 'chosen_payment_method', $default_payment_id );
    }
}

//add_filter( 'woocommerce_add_cart_item_data', 'wdm_empty_cart', 10,  3);

function wdm_empty_cart( $cart_item_data, $product_id, $variation_id ) {
	if( !is_page( 'test-and-panels') ) {
	    global $woocommerce;
	    $woocommerce->cart->empty_cart();

	    // Do nothing with the data and return
	    return $cart_item_data;
	}
}

function get_term_name_cross( $pid ) {
	if( !empty( $pid ) ) {
		$terms = get_the_terms ( $pid, 'product_cat' );
		foreach ( $terms as $term ) {
			$cat_name = $term->name;
			if( $cat_name != 'Uncategorized' ) {
				return $cat_name;	
			}
		}
	}
}

// check for empty-cart get param to clear the cart
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
  global $woocommerce;
	
	if ( isset( $_GET['empty-cart'] ) ) {
		$woocommerce->cart->empty_cart(); 
	}
}

// Order by
add_filter( 'woocommerce_cross_sells_orderby', 'filter_cross_sells_orderby', 10, 1 );
function filter_cross_sells_orderby( $orderby ){
    return 'price'; // Default is 'rand'
}

// Order
add_filter( 'woocommerce_cross_sells_order', 'filter_cross_sells_order', 10, 1 );
function filter_cross_sells_order( $order ){
    return 'desc'; // Default is 'desc'
}

// Add Google Tag Manager code immediately below opening <body> tag
add_action( 'genesis_before', 'sk_google_tag_manager2', 1 );

function add_rel_preload($html, $handle, $href, $media) {
    
    if (is_admin())
        return $html;

     $html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
EOT;
    return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );
function sk_google_tag_manager2() { ?>
	<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<?php }

//remove_action( 'wp_ajax_genesis_sample_dismiss_woocommerce_notice', 'genesis_sample_dismiss_woocommerce_notice' );

add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_fields' );

function custom_meta_box_fields( $meta_fields ) {

    /**
     * If no 'type' is defined it will show a normal text input field.
     *
     * Supported field types are checkbox, textarea and dropdown.
     */
    $meta_fields[ __( 'Store ID', 'wpsl' ) ] = array(
        'store_location_id' => array(
            'label'    => __( 'Store Location ID', 'wpsl' ),
        )
    );

    return $meta_fields;
}

add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_fields' );

function custom_frontend_meta_fields( $store_fields ) {

    $store_fields['wpsl_store_location_id'] = array( 
        'name' => 'store_location_id',
        'type' => 'text'
    );

    return $store_fields;
}










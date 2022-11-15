<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( $cross_sells ) : ?>

	<div class="cross-sells">
	
		<?php woocommerce_product_loop_start(); ?>
		<?php 
			if( empty( $_GET['sf_product_id'] ) ) { 
				$cart_sku = displays_cart_sku();
			} else {
				$cart_sku = $_GET['sf_product_id'];
			}
		?>

			<?php foreach ( $cross_sells as $cross_sell ) : ?>

				<?php
					$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited, Squiz.PHP.DisallowMultipleAssignments.Found
					$cross_term_name = get_term_name_cross( $cross_sell->get_id() );
					if( $cross_term_name == 'Bundled') {
						$empty_cart = 'empty-cart&';
						$upgrade_label = 'Want to upgrade to';
						$button_label = 'Upgrade';
					}
					else {
						$empty_cart = '';
						$upgrade_label = 'Want to add';
						$button_label = 'Yes, Add This';
					}
					
					$cross_style = ''; 
					if( $cross_sell->get_id() == 13460 ) {
						if( !empty( $_GET['testing_address'] ) ) {
							$se_get = $_GET['testing_address'];
							$se_search   = "New York";
							$flag = strstr($se_get, $se_search);
							if ($flag) {
								$cross_style = "style='display:none;'";
							}
						}
					}
					echo '<li ' . $cross_style . ' id="cr' . $cross_sell->get_id() . '">';
					$current_user = '';
					$user_id = '';
					$cart_cust_first_name = '';
					$cart_cust_last_name = '';
					$cart_cust_gender = '';
					$cart_cust_email = '';
					$cart_cust_phone = '';
					$cart_cust_address = '';
					$cart_cust_zip = '';
					$cart_cust_state = '';
					$cart_cust_city = '';
					$cart_cust_date_of_birth = ''; 
					if ( is_user_logged_in() ) {
						$current_user = wp_get_current_user();
						$user_id = get_current_user_id();
					}
					if ( isset( $_GET['firstname'] ) ) {
						$cart_cust_first_name = $_GET['firstname'];
					}
					if ( isset( $_GET['lastname'] ) ) {
						$cart_cust_last_name = $_GET['lastname'];
					}
					if ( isset( $_GET['gender'] ) ) {
						$cart_cust_gender = $_GET['gender'];
					}
					if ( isset( $_GET['email'] ) ) {
						$cart_cust_email = $_GET['email'];
					}
					if ( isset( $_GET['phone'] ) ) {
						$cart_cust_phone = $_GET['phone'];
					}
					if ( isset( $_GET['address'] ) ) {
						$cart_cust_address = $_GET['address2'].' '.$_GET['address'];
					}
					if ( isset( $_GET['zip'] ) ) {
						$cart_cust_zip = $_GET['zip'];
					}
					if ( isset( $_GET['state'] ) ) {
						$cart_cust_state = $_GET['state'];
					}
					if ( isset( $_GET['city'] ) ) {
						$cart_cust_city = $_GET['city'];
					}
					if ( isset( $_GET['birth'] ) ) {
						$cart_cust_date_of_birth = $_GET['birth'];
					}
					if ( isset( $_GET['zip_search'] ) ) {
						$cart_location = $_GET['zip_search'];
					}
					if ( isset( $_GET['testing_address'] ) ) {
						$cart_location_address = $_GET['testing_address'];
					}
					if ( isset( $_GET['testing_location_id'] ) ) {
						$cart_location_address_id = $_GET['testing_location_id'];
					}
				
				
					if ( is_page('checkout-info') ) {
						echo '<div class="top-content">';
							echo '<h3>' . $upgrade_label . ' ' . get_the_title() . '? ' . $cross_sell->get_price_html() . '</h3>';
							echo '<div class="cross-sells-button-row">';
								
								echo '<div>';
									echo'<p class="product woocommerce add_to_cart_inline " style="border:4px solid #ccc; padding: 12px;"><a href="?' . $empty_cart . 'add-to-cart=' . $cross_sell->get_id() . '&zip_search='.$cart_location.'&testing_address='.$cart_location_address.'&testing_location_id='.$cart_location_address_id.'&sf_product_id='.$cart_sku.'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cartx" data-product_id="' . $cross_sell->get_id() . '" data-product_sku="" rel="nofollow">' . $button_label . '</a></p>';
								
								//echo do_shortcode('[add_to_cart id="'.$cross_sell->get_id().'" show_price="false"]');
								echo '</div>';
								if( !empty( get_the_content() ) ) {
									echo '<div>';
									echo '<a href="#btn'.$cross_sell->get_id().'" class="btn-content">What is This?</a>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					}
					else if ( is_page('checkout') ) {
						echo '<div class="top-content">';
							echo '<h3>' . $upgrade_label . ' ' . get_the_title() . '? ' . $cross_sell->get_price_html() . '</h3>';
							echo '<div class="cross-sells-button-row">';
								if ( is_user_logged_in() ){
									echo '<div>';
										echo'<p class="product woocommerce add_to_cart_inline " style="border:4px solid #ccc; padding: 12px;"><a href="?' . $empty_cart . 'add-to-cart=' . $cross_sell->get_id() . '&zip_search='.$_GET['zip_search'].'&testing_address='.$_GET['testing_address'].'&user_id='.$user_id.'&firstname='.$cart_cust_first_name.'&lastname='.$cart_cust_last_name.'&birth='.$cart_cust_date_of_birth.'&gender='.$cart_cust_gender.'&email='.$cart_cust_email.'&address='.$cart_cust_address.'&city='.$cart_cust_city .'&state='.$cart_cust_state.'&zip='.$cart_cust_zip.'&testing_location_id='.$cart_location_address_id.'&sf_product_id='.$cart_sku.'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cartx" data-product_id="' . $cross_sell->get_id() . '" data-product_sku="" rel="nofollow">' . $button_label . '</a></p>';
									
									//echo do_shortcode('[add_to_cart id="'.$cross_sell->get_id().'" show_price="false"]');
									echo '</div>';
								}
								else {
									echo '<div>';
										echo'<p class="product woocommerce add_to_cart_inline " style="border:4px solid #ccc; padding: 12px;"><a href="?' . $empty_cart . 'add-to-cart=' . $cross_sell->get_id() . '&zip_search='.$_GET['zip_search'].'&testing_address='.$_GET['testing_address'].'&firstname='.$cart_cust_first_name.'&lastname='.$cart_cust_last_name.'&birth='.$cart_cust_date_of_birth.'&gender='.$cart_cust_gender.'&email='.$cart_cust_email.'&address='.$cart_cust_address.'&city='.$cart_cust_city .'&state='.$cart_cust_state.'&zip='.$cart_cust_zip.'&testing_location_id='.$cart_location_address_id.'&sf_product_id='.$cart_sku.'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cartx" data-product_id="' . $cross_sell->get_id() . '" data-product_sku="" rel="nofollow">' . $button_label . '</a></p>';
									
									//echo do_shortcode('[add_to_cart id="'.$cross_sell->get_id().'" show_price="false"]');
									echo '</div>';
								}
								if( !empty( get_the_content() ) ) {
									echo '<div>';
									echo '<a href="#btn'.$cross_sell->get_id().'" class="btn-content">What is This?</a>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					}
					else {
						echo '<div class="top-content">';
							echo '<h3>' . $upgrade_label . ' ' . get_the_title() . '? ' . $cross_sell->get_price_html() . '</h3>';
							echo '<div class="cross-sells-button-row">';
								
								echo '<div>';
									echo'<p class="product woocommerce add_to_cart_inline " style="border:4px solid #ccc; padding: 12px;"><a href="?' . $empty_cart . 'add-to-cart=' . $cross_sell->get_id() . '&zip_search='.$_GET['zip_search'].'&testing_address='.$_GET['testing_address'].'&testing_location_id='.$cart_location_address_id.'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cartx" data-product_id="' . $cross_sell->get_id() . '" data-product_sku="" rel="nofollow">' . $button_label . '</a></p>';
								
								//echo do_shortcode('[add_to_cart id="'.$cross_sell->get_id().'" show_price="false"]');
								echo '</div>';
								if( !empty( get_the_content() ) ) {
									echo '<div>';
									echo '<a href="#btn'.$cross_sell->get_id().'" class="btn-content">What is This?</a>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					}
					if( !empty( get_the_content() ) ) {
						echo '<div class="btn-main-content" id="btn'.$cross_sell->get_id().'">';
						echo wpautop( get_the_content() );
						echo '</div>';
					}
					echo '</li>';

				?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>
	<?php
endif;

wp_reset_postdata();
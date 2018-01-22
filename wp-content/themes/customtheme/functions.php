<?php
function enqueue_styles() {
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'main-min-style', get_template_directory_uri() . '/css/main.min.css' );
	wp_enqueue_style( 'admin', get_template_directory_uri() . '/css/admin.css' );
	wp_enqueue_style( 'vendors', get_template_directory_uri() . '/css/vendors.min.css' );
	wp_enqueue_style( 'owl-default-style', get_template_directory_uri() . '/css/owl.theme.default.min.css' );
	wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-default-style', get_template_directory_uri() . '/css/owl.theme.default.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function enqueue_scripts() {
	wp_enqueue_script( 'vendors', get_template_directory_uri() . '/js/vendors.min.js' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.min.js' );
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js' );
	wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

register_nav_menu( 'top', 'Top Menu' );

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( 'Theme settings' );
}

add_image_size( 'Logo-size', 425, 145, false );

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

function custom_override_checkout_fields( $fields ) {
	$fields['billing']['billing_company']['required']   = false;
	$fields['billing']['billing_address_2']['required'] = false;
	unset( $fields['billing']['billing_state'] );
	$fields['billing']['billing_city']['required'] = false;
	unset( $fields['billing']['billing_company'] );
	unset( $fields['billing']['billing_country'] );
	unset( $fields['billing']['billing_postcode'] );
	unset( $fields['billing']['billing_address_2'] );
	unset( $fields['billing']['billing_address_1'] );
	unset( $fields['billing']['billing_city'] );
	$fields['order']['order_comments']['placeholder'] = '';
	$fields['billing']['billing_phone']               = array(
		'label'    => __( 'Телефон', 'woocommerce' ),
		'required' => true,
		'class'    => array( 'form-row-first' ),
		'priority' => 20,
		'clear'    => true,
	);
	$fields['billing']['billing_first_name']['label'] = 'Имя';
	$fields['billing']['billing_last_name']['label']  = 'Фамилия';
	$fields['billing']['billing_email']               = array(
		'label'    => __( 'Электронная почта', 'woocommerce' ),
		'required' => true,
		'class'    => array( 'form-row-first' ),
		'priority' => 25,
		'clear'    => true,
	);
	// $fields['billing']['house_custom']                = array(
	// 'placeholder' => _x( 'Дом', 'placeholder', 'woocommerce' ),
	// 'required'    => true,
	// 'class'       => array( 'cart__shipping-col' ),
	// 'priority'    => 35,
	// 'clear'       => true,
	// );
	// $fields['billing']['apartament_custom']           = array(
	// 'placeholder' => _x( 'Квартира', 'placeholder', 'woocommerce' ),
	// 'required'    => true,
	// 'class'       => array( 'cart__shipping-col' ),
	// 'priority'    => 35,
	// 'clear'       => true,
	// );
	unset( $fields['shipping'] );
	return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'custom_override_checkout_fields' );

function my_custom_checkout_field( $checkout ) {

	echo '<div class="cart__title cart__title_shipping">ДОСТАВКА</div>';

	woocommerce_form_field(
		'custom_city', array(
			'label'       => __( 'Город', 'woocommerce' ),
			'placeholder' => _x( '', 'placeholder', 'woocommerce' ),
			'required'    => false,
			'clear'       => false,
			'class'       => array( 'form-row-first' ),
			'type'        => 'select',
			'options'     => array(
				'Moscow' => __( 'Москва', 'woocommerce' ),
				'Omsk'   => __( 'Омск', 'woocommerce' ),
				'Tomsk'  => __( 'Томск', 'woocommerce' ),
			),
		), $checkout->get_value( 'custom_city' )
	);
	woocommerce_form_field(
		'billing_address_1', array(
			'placeholder' => _x( 'Улица', 'placeholder', 'woocommerce' ),
			'required'    => true,
			'class'       => array( 'form-row-first' ),
			'clear'       => true,
			'type'        => 'text',
		), $checkout->get_value( 'billing_address_1' )
	);
	woocommerce_form_field(
		'house_custom', array(
			'placeholder' => _x( 'Дом', 'placeholder', 'woocommerce' ),
			'required'    => true,
			'class'       => array( 'cart__shipping-col' ),
			'clear'       => true,
			'type'        => 'text',
		), $checkout->get_value( 'house_custom' )
	);
	woocommerce_form_field(
		'apartament_custom', array(
			'placeholder' => _x( 'Квартира', 'placeholder', 'woocommerce' ),
			'required'    => true,
			'class'       => array( 'cart__shipping-col' ),
			'clear'       => true,
			'type'        => 'text',
		), $checkout->get_value( 'apartament_custom' )
	);

}
add_action( 'woocommerce_after_checkout_billing_form', 'my_custom_checkout_field' );

function my_custom_checkout_field_process() {
	if ( ! $_POST['billing_address_1'] ) {
		wc_add_notice( __( 'Пожалуйста, введите название улицы.' ), 'error' );
	}
	if ( ! $_POST['house_custom'] ) {
		wc_add_notice( __( 'Пожалуйста, введите номер дома.' ), 'error' );
	}
	if ( ! $_POST['apartament_custom'] ) {
		wc_add_notice( __( 'Пожалуйста, введите номер квартиры.' ), 'error' );
	}
}
add_action( 'woocommerce_checkout_process', 'my_custom_checkout_field_process' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
	if ( ! empty( $_POST['billing_address_1'] ) ) {
		update_post_meta( $order_id, 'Street', sanitize_text_field( $_POST['billing_address_1'] ) );
	}
	if ( ! empty( $_POST['house_custom'] ) ) {
		update_post_meta( $order_id, 'House', sanitize_text_field( $_POST['house_custom'] ) );
	}
	if ( ! empty( $_POST['apartament_custom'] ) ) {
		update_post_meta( $order_id, 'Apartament', sanitize_text_field( $_POST['apartament_custom'] ) );
	}
	if ( ! empty( $_POST['custom_city'] ) ) {
		update_post_meta( $order_id, 'City', esc_attr( $_POST['custom_city'] ) );
	}
}
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_display_admin_order_meta( $order ) {
	echo '<p><strong>' . ( 'City' ) . ':</strong> ' . get_post_meta( $order->id, 'City', true ) . '</p>';
	echo '<p><strong>' . ( 'Street' ) . ':</strong> ' . get_post_meta( $order->id, 'Street', true ) . '</p>';
	echo '<p><strong>' . ( 'House' ) . ':</strong> ' . get_post_meta( $order->id, 'House', true ) . '</p>';
	echo '<p><strong>' . ( 'Apartament' ) . ':</strong> ' . get_post_meta( $order->id, 'Apartament', true ) . '</p>';
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function display_custom_field_on_order_details( $order ) {
	echo '<br>' . ( 'City' ) . ': ' . get_post_meta( $order->id, 'City', true ) . '<br>';
	echo ( 'Street' ) . ': ' . get_post_meta( $order->id, 'Street', true ) . '<br>';
	echo ( 'House' ) . ': ' . get_post_meta( $order->id, 'House', true ) . '<br>';
	echo ( 'Apartament' ) . ': ' . get_post_meta( $order->id, 'Apartament', true ) . '<br>';
}
add_action( 'woocommerce_order_details_after_customer_details', 'display_custom_field_on_order_details', 10, 1 );

// add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );
function cu_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => ' / ',
		'wrap_before' => '<div class="breadcrumbs">',
		'wrap_after'  => '</div>',
		'before'      => '',
		'after'       => '',
		'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	);
}
add_filter( 'woocommerce_breadcrumb_defaults', 'cu_woocommerce_breadcrumbs' );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 35 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 30 );

function custom_meta_data_product() {
	global $product;
	$dimensions = $product->get_dimensions();
	$sku        = $product->get_sku();
	if ( ! empty( $sku ) ) {
		echo '<div class="product__article">Артикул: ' . $sku . '</div>';
	}
	echo $product->list_attributes();
}
add_action( 'woocommerce_single_product_summary', 'custom_meta_data_product', 9 );

// function woo_custom_order_button_text() {
// return __( 'Создать и оплатить', 'woocommerce' );
// }
// add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' );

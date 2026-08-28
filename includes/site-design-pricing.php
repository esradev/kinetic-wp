<?php
/**
 * Romonet Custom Website Booking + WooCommerce
 *
 * Flow:
 *
 * Frontend Calculator
 *      ↓
 * AJAX
 *      ↓
 * Server-side validation
 *      ↓
 * Server-side price calculation
 *      ↓
 * Hidden Virtual Dummy Product
 *      ↓
 * WooCommerce Cart Item
 *      ↓
 * Custom Cart Item Price
 *      ↓
 * Checkout
 *      ↓
 * WooCommerce Order
 *
 * IMPORTANT:
 * The Dummy Product has a technical price of 1.
 * The REAL price is stored in the Cart Item and applied
 * before WooCommerce calculates totals.
 */


/*
|--------------------------------------------------------------------------
| Configuration
|--------------------------------------------------------------------------
*/

defined( 'ABSPATH' ) || exit;

define(
	'ROMONET_BOOKING_PRODUCT_SKU',
	'romonet-custom-booking'
);

define(
	'ROMONET_BOOKING_PRODUCT_NAME',
	'رزرو پروژه طراحی سایت رومونت'
);

define(
	'ROMONET_BOOKING_NONCE_ACTION',
	'romonet_create_custom_order'
);


/*
|--------------------------------------------------------------------------
| 1. Expose AJAX URL + Nonce
|--------------------------------------------------------------------------
|
| Your frontend already expects:
|
| window.romonetAjaxUrl
|
| We additionally provide:
|
| window.romonetAjaxNonce
|
*/

add_action(
	'wp_head',
	'romonet_booking_expose_ajax_config',
	1
);

function romonet_booking_expose_ajax_config() {

	?>
	<script>
		window.romonetAjaxUrl = <?php echo wp_json_encode( admin_url( 'admin-ajax.php' ) ); ?>;
		window.romonetAjaxNonce = <?php echo wp_json_encode( wp_create_nonce( ROMONET_BOOKING_NONCE_ACTION ) ); ?>;
	</script>
	<?php
}


/*
|--------------------------------------------------------------------------
| 2. AJAX Hooks
|--------------------------------------------------------------------------
*/

add_action(
	'wp_ajax_romonet_create_custom_order',
	'romonet_booking_ajax_create_order'
);

add_action(
	'wp_ajax_nopriv_romonet_create_custom_order',
	'romonet_booking_ajax_create_order'
);


/*
|--------------------------------------------------------------------------
| 3. Get / Create Dummy Product
|--------------------------------------------------------------------------
|
| IMPORTANT:
|
| The product MUST have a non-zero price because WooCommerce's
| default is_purchasable() requires the product price not to be empty.
|
| Therefore:
|
|     Technical product price = 1
|
| But:
|
|     Actual booking price = Cart Item price
|
| This prevents the "product cannot be purchased" problem.
|
*/

function romonet_booking_get_product_id() {

	if ( ! class_exists( 'WooCommerce' ) ) {

		return new WP_Error(
			'woocommerce_missing',
			'ووکامرس فعال نیست.'
		);
	}

	if ( ! function_exists( 'wc_get_product_id_by_sku' ) ) {

		return new WP_Error(
			'woocommerce_functions_missing',
			'توابع ووکامرس در دسترس نیستند.'
		);
	}

	$product_id = wc_get_product_id_by_sku(
		ROMONET_BOOKING_PRODUCT_SKU
	);

	/*
	|--------------------------------------------------------------------------
	| Existing product
	|--------------------------------------------------------------------------
	*/

	if ( $product_id ) {

		$product = wc_get_product(
			$product_id
		);

		if ( ! $product instanceof WC_Product ) {

			return new WP_Error(
				'invalid_booking_product',
				'محصول رزرو ووکامرس معتبر نیست.'
			);
		}

		/*
		 * Always make sure the product is configured correctly.
		 */

		$product->set_status( 'publish' );

		/*
		 * Hidden from shop/catalog/search.
		 */

		$product->set_catalog_visibility( 'hidden' );

		/*
		 * No shipping.
		 */

		$product->set_virtual( true );

		$product->set_downloadable( false );

		/*
		 * Technical price.
		 *
		 * DO NOT set this to 0.
		 */

		if ( '' === $product->get_price() || 0 >= (float) $product->get_price() ) {

			$product->set_regular_price( '1' );
			$product->set_price( '1' );
		}

		/*
		 * Make sure product is in stock.
		 */

		$product->set_stock_status( 'instock' );

		$product->save();

		return (int) $product_id;
	}


	/*
	|--------------------------------------------------------------------------
	| Create product
	|--------------------------------------------------------------------------
	*/

	$product = new WC_Product_Simple();

	$product->set_name(
		ROMONET_BOOKING_PRODUCT_NAME
	);

	$product->set_status(
		'publish'
	);

	$product->set_catalog_visibility(
		'hidden'
	);

	$product->set_virtual(
		true
	);

	$product->set_downloadable(
		false
	);

	$product->set_sold_individually(
		false
	);

	/*
	 * IMPORTANT:
	 *
	 * Price cannot be 0 because WooCommerce considers an empty/zero
	 * price product not purchasable by default.
	 *
	 * This is ONLY a technical price.
	 */

	$product->set_regular_price(
		'1'
	);

	$product->set_price(
		'1'
	);

	$product->set_stock_status(
		'instock'
	);

	$product->set_manage_stock(
		false
	);

	$product->set_sku(
		ROMONET_BOOKING_PRODUCT_SKU
	);

	$product_id = $product->save();

	if ( ! $product_id ) {

		return new WP_Error(
			'booking_product_creation_failed',
			'ساخت محصول رزرو امکان‌پذیر نبود.'
		);
	}

	return (int) $product_id;
}


/*
|--------------------------------------------------------------------------
| 4. Project Type Map
|--------------------------------------------------------------------------
*/

function romonet_booking_project_types() {

	return array(
		'شرکتی / آژانسی' => array(
			'key'   => 'brand',
			'price' => 38500000,
		),

		'فروشگاه تخصصی ووکامرس' => array(
			'key'   => 'store',
			'price' => 68000000,
		),

		'هدلس Next.js' => array(
			'key'   => 'headless',
			'price' => 128000000,
		),
	);
}


/*
|--------------------------------------------------------------------------
| 5. Ready-made Packages
|--------------------------------------------------------------------------
*/

function romonet_booking_packages() {

	return array(

		'پکیج آماده: اسپرینت اختصاصی شرکتی و آژانسی' => array(
			'price' => 38500000,
		),

		'پکیج آماده: معماری فروشگاه پرسرعت ووکامرس' => array(
			'price' => 68000000,
		),

		'پکیج آماده: سامانه هدلس وردپرس (Next.js 15)' => array(
			'price' => 128000000,
		),
	);
}


/*
|--------------------------------------------------------------------------
| 6. Calculate Custom Project Price
|--------------------------------------------------------------------------
|
| This MUST remain synchronized with the frontend calculator.
|
*/

function romonet_booking_calculate_custom_price(
	$project_type,
	$page_count,
	$features
) {

	$project_type = sanitize_text_field(
		$project_type
	);

	$page_count = absint(
		$page_count
	);

	$features = sanitize_text_field(
		$features
	);

	$types = romonet_booking_project_types();

	if ( ! isset( $types[ $project_type ] ) ) {

		return new WP_Error(
			'invalid_project_type',
			'نوع پروژه نامعتبر است.'
		);
	}

	/*
	|--------------------------------------------------------------------------
	| Page validation
	|--------------------------------------------------------------------------
	*/

	if (
		$page_count < 3 ||
		$page_count > 25
	) {

		return new WP_Error(
			'invalid_page_count',
			'تعداد صفحات باید بین ۳ تا ۲۵ باشد.'
		);
	}

	/*
	|--------------------------------------------------------------------------
	| Base price
	|--------------------------------------------------------------------------
	*/

	$base_price = (int) $types[ $project_type ]['price'];

	/*
	|--------------------------------------------------------------------------
	| Page addon
	|--------------------------------------------------------------------------
	|
	| Frontend:
	|
	| Math.max(0, pageCount - 5) * 2800000
	|
	*/

	$page_addon =
		max(
			0,
			$page_count - 5
		) * 2800000;


	/*
	|--------------------------------------------------------------------------
	| Feature detection
	|--------------------------------------------------------------------------
	*/

	$needs_custom_blocks = false;
	$needs_migration     = false;
	$needs_custom_api    = false;
	$needs_speed         = false;

	if (
		$features !== '' &&
		$features !== 'بدون امکانات اضافه'
	) {

		$feature_list = array_map(
			'trim',
			explode(
				'،',
				$features
			)
		);

		$needs_custom_blocks = in_array(
			'توسعه بلوک‌های گوتنبرگ',
			$feature_list,
			true
		);

		$needs_migration = in_array(
			'انتقال محتوا و سئو',
			$feature_list,
			true
		);

		$needs_custom_api = in_array(
			'اتصال API/CRM',
			$feature_list,
			true
		);

		$needs_speed = in_array(
			'تضمین سرعت ۱۰۰',
			$feature_list,
			true
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Feature prices
	|--------------------------------------------------------------------------
	*/

	$blocks_addon = $needs_custom_blocks
		? 8500000
		: 0;

	$migration_addon = $needs_migration
		? 6500000
		: 0;

	$api_addon = $needs_custom_api
		? 14500000
		: 0;

	$speed_addon = $needs_speed
		? 4500000
		: 0;


	/*
	|--------------------------------------------------------------------------
	| Full price
	|--------------------------------------------------------------------------
	*/

	$full_price =
		$base_price
		+ $page_addon
		+ $blocks_addon
		+ $migration_addon
		+ $api_addon
		+ $speed_addon;


	/*
	|--------------------------------------------------------------------------
	| 50% deposit
	|--------------------------------------------------------------------------
	*/

	$deposit = (int) round(
		$full_price * 0.5
	);

	return array(
		'full_price' => $full_price,
		'deposit'    => $deposit,
	);
}


/*
|--------------------------------------------------------------------------
| 7. Calculate Ready-made Package Price
|--------------------------------------------------------------------------
*/

function romonet_booking_calculate_package_price(
	$project_type
) {

	$packages = romonet_booking_packages();

	if ( ! isset( $packages[ $project_type ] ) ) {

		return new WP_Error(
			'invalid_package',
			'پکیج انتخاب‌شده معتبر نیست.'
		);
	}

	$full_price = (int) $packages[ $project_type ]['price'];

	$deposit = (int) round(
		$full_price * 0.5
	);

	return array(
		'full_price' => $full_price,
		'deposit'    => $deposit,
	);
}


/*
|--------------------------------------------------------------------------
| 8. Calculate Booking Price
|--------------------------------------------------------------------------
*/

function romonet_booking_calculate_price(
	$project_type,
	$page_count,
	$features
) {

	$project_type = sanitize_text_field(
		$project_type
	);

	/*
	|--------------------------------------------------------------------------
	| First check ready-made packages.
	|--------------------------------------------------------------------------
	*/

	$packages = romonet_booking_packages();

	if (
		isset(
			$packages[ $project_type ]
		)
	) {

		return romonet_booking_calculate_package_price(
			$project_type
		);
	}

	/*
	|--------------------------------------------------------------------------
	| Otherwise custom project.
	|--------------------------------------------------------------------------
	*/

	return romonet_booking_calculate_custom_price(
		$project_type,
		$page_count,
		$features
	);
}


/*
|--------------------------------------------------------------------------
| 9. AJAX Handler
|--------------------------------------------------------------------------
*/

function romonet_booking_ajax_create_order() {

	/*
	|--------------------------------------------------------------------------
	| WooCommerce
	|--------------------------------------------------------------------------
	*/

	if ( ! class_exists( 'WooCommerce' ) ) {

		wp_send_json_error(
			'ووکامرس فعال نیست.',
			500
		);
	}


	/*
	|--------------------------------------------------------------------------
	| POST only
	|--------------------------------------------------------------------------
	*/

	if (
		isset( $_SERVER['REQUEST_METHOD'] ) &&
		'POST' !== strtoupper(
			sanitize_text_field(
				wp_unslash(
					$_SERVER['REQUEST_METHOD']
				)
			)
		)
	) {

		wp_send_json_error(
			'متد درخواست نامعتبر است.',
			405
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Nonce
	|--------------------------------------------------------------------------
	*/

	if (
		! isset( $_POST['_ajax_nonce'] )
		|| ! wp_verify_nonce(
			sanitize_text_field(
				wp_unslash(
					$_POST['_ajax_nonce']
				)
			),
			ROMONET_BOOKING_NONCE_ACTION
		)
	) {

		wp_send_json_error(
			'درخواست امنیتی معتبر نیست. لطفاً صفحه را تازه‌سازی کنید.',
			403
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Read input
	|--------------------------------------------------------------------------
	*/

	$project_type = isset( $_POST['projectType'] )
		? sanitize_text_field(
			wp_unslash(
				$_POST['projectType']
			)
		)
		: '';

	$page_count = isset( $_POST['pageCount'] )
		? absint(
			$_POST['pageCount']
		)
		: 0;

	$features = isset( $_POST['features'] )
		? sanitize_text_field(
			wp_unslash(
				$_POST['features']
			)
		)
		: 'بدون امکانات اضافه';

	$frontend_price = isset( $_POST['totalPrice'] )
		? wp_unslash(
			$_POST['totalPrice']
		)
		: '';


	/*
	|--------------------------------------------------------------------------
	| Basic validation
	|--------------------------------------------------------------------------
	*/

	if ( '' === $project_type ) {

		wp_send_json_error(
			'نوع پروژه مشخص نشده است.',
			400
		);
	}


	if ( '' === $features ) {
		$features = 'بدون امکانات اضافه';
	}


	/*
	|--------------------------------------------------------------------------
	| Validate frontend price format
	|--------------------------------------------------------------------------
	*/

	if (
		! is_scalar( $frontend_price ) ||
		! preg_match(
			'/^\d+(?:\.\d+)?$/',
			(string) $frontend_price
		)
	) {

		wp_send_json_error(
			'مبلغ پرداختی نامعتبر است.',
			400
		);
	}

	$frontend_price = (int) round(
		(float) $frontend_price
	);


	/*
	|--------------------------------------------------------------------------
	| Calculate actual price on server
	|--------------------------------------------------------------------------
	*/

	$price = romonet_booking_calculate_price(
		$project_type,
		$page_count,
		$features
	);

	if ( is_wp_error( $price ) ) {

		wp_send_json_error(
			$price->get_error_message(),
			400
		);
	}


	$server_deposit = (int) $price['deposit'];


	/*
	|--------------------------------------------------------------------------
	| NEVER trust frontend price
	|--------------------------------------------------------------------------
	*/

	if (
		$frontend_price !== $server_deposit
	) {

		wp_send_json_error(
			'مبلغ سفارش با محاسبات سرور مطابقت ندارد. لطفاً صفحه را تازه‌سازی کنید.',
			400
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Initialize WooCommerce Cart
	|--------------------------------------------------------------------------
	*/

	if ( ! function_exists( 'WC' ) ) {

		wp_send_json_error(
			'هسته ووکامرس در دسترس نیست.',
			500
		);
	}


	/*
	 * Explicitly initialize the customer/session/cart.
	 *
	 * This is important for admin-ajax requests.
	 */

	if ( ! WC()->session ) {
		WC()->initialize_session();
	}

	if ( ! WC()->customer ) {
		WC()->initialize_customer();
	}

	if ( ! WC()->cart ) {
		WC()->initialize_cart();
	}

	if (
		! WC()->session ||
		! WC()->cart
	) {

		wp_send_json_error(
			'امکان ایجاد سبد خرید وجود ندارد.',
			500
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Ensure session cookie exists
	|--------------------------------------------------------------------------
	*/

	if (
		method_exists(
			WC()->session,
			'set_customer_session_cookie'
		)
	) {

		WC()->session->set_customer_session_cookie(
			true
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Remove previous Romonet booking
	|--------------------------------------------------------------------------
	|
	| The customer should pay for the newly configured project,
	| not an old configuration.
	|
	*/

	foreach (
		WC()->cart->get_cart()
		as $cart_item_key => $cart_item
	) {

		if (
			! empty(
				$cart_item['romonet_custom_booking']
			)
		) {

			WC()->cart->remove_cart_item(
				$cart_item_key
			);
		}
	}


	/*
	|--------------------------------------------------------------------------
	| Get / create dummy product
	|--------------------------------------------------------------------------
	*/

	$product_id = romonet_booking_get_product_id();

	if ( is_wp_error( $product_id ) ) {

		wp_send_json_error(
			$product_id->get_error_message(),
			500
		);
	}


	$product = wc_get_product(
		$product_id
	);

	if (
		! $product instanceof WC_Product
	) {

		wp_send_json_error(
			'محصول رزرو پیدا نشد.',
			500
		);
	}


	/*
	|--------------------------------------------------------------------------
	| IMPORTANT:
	|
	| Verify the product is actually purchasable BEFORE add_to_cart.
	|--------------------------------------------------------------------------
	*/

	if ( ! $product->is_purchasable() ) {

		wp_send_json_error(
			'محصول رزرو ووکامرس قابل خرید نیست.',
			500
		);
	}


	if ( ! $product->is_in_stock() ) {

		wp_send_json_error(
			'محصول رزرو در وضعیت موجودی مناسب نیست.',
			500
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Unique booking ID
	|--------------------------------------------------------------------------
	*/

	$booking_id = wp_generate_uuid4();


	/*
	|--------------------------------------------------------------------------
	| Cart Item Data
	|--------------------------------------------------------------------------
	*/

	$cart_item_data = array(

		'romonet_custom_booking' => true,

		'romonet_booking_id' => $booking_id,

		/*
		 * Server calculated REAL price.
		 */

		'romonet_price' => $server_deposit,

		/*
		 * Full project price.
		 */

		'romonet_full_price' => (int) $price['full_price'],

		/*
		 * Customer configuration.
		 */

		'romonet_project_type' => $project_type,

		'romonet_page_count' => $page_count,

		'romonet_features' => $features,

		/*
		 * Prevent WooCommerce from merging this booking
		 * with another identical booking.
		 */

		'romonet_unique_key' => $booking_id,
	);


	/*
	|--------------------------------------------------------------------------
	| Add to cart
	|--------------------------------------------------------------------------
	*/

	try {

		$cart_item_key = WC()->cart->add_to_cart(
			$product_id,
			1,
			0,
			array(),
			$cart_item_data
		);

	} catch ( Exception $e ) {

		wp_send_json_error(
			$e->getMessage(),
			500
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Verify add_to_cart
	|--------------------------------------------------------------------------
	*/

	if ( ! $cart_item_key ) {

		/*
		 * Try to get WooCommerce's latest notice for debugging-safe
		 * user feedback.
		 */

		$error_message = 'افزودن پروژه به سبد خرید امکان‌پذیر نبود.';

		$notices = wc_get_notices(
			'error'
		);

		if (
			! empty( $notices ) &&
			isset( $notices[0]['notice'] )
		) {

			$error_message = wp_strip_all_tags(
				$notices[0]['notice']
			);
		}

		wp_send_json_error(
			$error_message,
			500
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Calculate totals
	|--------------------------------------------------------------------------
	|
	| This triggers:
	|
	| woocommerce_before_calculate_totals
	|
	| and our custom price is applied there.
	|
	*/

	WC()->cart->calculate_totals();


	/*
	|--------------------------------------------------------------------------
	| Verify cart item exists
	|--------------------------------------------------------------------------
	*/

	$cart_item = WC()->cart->get_cart_item(
		$cart_item_key
	);

	if ( empty( $cart_item ) ) {

		wp_send_json_error(
			'پروژه به سبد خرید اضافه نشد.',
			500
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Verify final Cart Item price
	|--------------------------------------------------------------------------
	*/

	$cart_product = $cart_item['data'];

	$actual_cart_price = (float) $cart_product->get_price();

	if (
		(int) round( $actual_cart_price )
		!== $server_deposit
	) {

		WC()->cart->remove_cart_item(
			$cart_item_key
		);

		WC()->cart->calculate_totals();

		wp_send_json_error(
			'قیمت پروژه در سبد خرید معتبر نیست.',
			500
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Force cart session save
	|--------------------------------------------------------------------------
	*/

	if (
		WC()->session &&
		method_exists(
			WC()->session,
			'set_session'
		)
	) {

		WC()->session->set_session();
	}


	/*
	|--------------------------------------------------------------------------
	| Final response
	|--------------------------------------------------------------------------
	*/

	wp_send_json_success(
		array(

			'redirect_url' => esc_url_raw(
				wc_get_checkout_url()
			),

			'cart_url' => esc_url_raw(
				wc_get_cart_url()
			),

			'booking_id' => $booking_id,

			'price' => $server_deposit,
		)
	);
}


/*
|--------------------------------------------------------------------------
| 10. Apply REAL price to Cart Item
|--------------------------------------------------------------------------
|
| The Product price is technically 1.
|
| The Cart Item price is the REAL booking price.
|
*/

add_action(
	'woocommerce_before_calculate_totals',
	'romonet_booking_set_cart_item_price',
	20
);

function romonet_booking_set_cart_item_price(
	$cart
) {

	if (
		! $cart instanceof WC_Cart
	) {
		return;
	}


	/*
	|--------------------------------------------------------------------------
	| Avoid interfering with unrelated admin calculations.
	|--------------------------------------------------------------------------
	*/

	if (
		is_admin() &&
		! wp_doing_ajax()
	) {
		return;
	}


	foreach (
		$cart->get_cart()
		as $cart_item
	) {

		if (
			empty(
				$cart_item['romonet_custom_booking']
			)
		) {
			continue;
		}


		if (
			! isset(
				$cart_item['romonet_price']
			)
		) {
			continue;
		}


		$price = (float) $cart_item['romonet_price'];


		if ( $price <= 0 ) {
			continue;
		}


		/*
		 * This changes ONLY the product object used by this
		 * particular Cart Item.
		 *
		 * It does NOT change the global database product price.
		 */

		$cart_item['data']->set_price(
			$price
		);
	}
}


/*
|--------------------------------------------------------------------------
| 11. Restore custom price when Cart is loaded from Session
|--------------------------------------------------------------------------
|
| This is important because the product in the database has
| technical price = 1.
|
| When WooCommerce reloads the cart from session, we need to
| restore our custom price before the cart is displayed.
|
*/

add_filter(
	'woocommerce_get_cart_item_from_session',
	'romonet_booking_restore_cart_item_price',
	20,
	3
);

function romonet_booking_restore_cart_item_price(
	$cart_item,
	$values,
	$key
) {

	if (
		empty(
			$values['romonet_custom_booking']
		)
	) {
		return $cart_item;
	}


	if (
		isset(
			$values['romonet_price']
		)
	) {

		$price = (float) $values['romonet_price'];

		if ( $price > 0 ) {

			$cart_item['data']->set_price(
				$price
			);
		}
	}


	/*
	 * Restore our custom data explicitly.
	 */

	$cart_item['romonet_custom_booking'] =
		true;

	if (
		isset(
			$values['romonet_booking_id']
		)
	) {

		$cart_item['romonet_booking_id'] =
			sanitize_text_field(
				$values['romonet_booking_id']
			);
	}

	if (
		isset(
			$values['romonet_price']
		)
	) {

		$cart_item['romonet_price'] =
			(float) $values['romonet_price'];
	}

	if (
		isset(
			$values['romonet_full_price']
		)
	) {

		$cart_item['romonet_full_price'] =
			(int) $values['romonet_full_price'];
	}

	if (
		isset(
			$values['romonet_project_type']
		)
	) {

		$cart_item['romonet_project_type'] =
			sanitize_text_field(
				$values['romonet_project_type']
			);
	}

	if (
		isset(
			$values['romonet_page_count']
		)
	) {

		$cart_item['romonet_page_count'] =
			absint(
				$values['romonet_page_count']
			);
	}

	if (
		isset(
			$values['romonet_features']
		)
	) {

		$cart_item['romonet_features'] =
			sanitize_text_field(
				$values['romonet_features']
			);
	}

	return $cart_item;
}


/*
|--------------------------------------------------------------------------
| 12. Display metadata in Cart / Checkout
|--------------------------------------------------------------------------
*/

add_filter(
	'woocommerce_get_item_data',
	'romonet_booking_display_cart_data',
	10,
	2
);

function romonet_booking_display_cart_data(
	$item_data,
	$cart_item
) {

	if (
		empty(
			$cart_item['romonet_custom_booking']
		)
	) {
		return $item_data;
	}


	if (
		! empty(
			$cart_item['romonet_project_type']
		)
	) {

		$item_data[] = array(
			'key'   => 'نوع پروژه',
			'value' => sanitize_text_field(
				$cart_item['romonet_project_type']
			),
		);
	}


	if (
		! empty(
			$cart_item['romonet_page_count']
		)
	) {

		$item_data[] = array(
			'key'   => 'تعداد قالب صفحات',
			'value' => absint(
				$cart_item['romonet_page_count']
			),
		);
	}


	if (
		! empty(
			$cart_item['romonet_features']
		)
	) {

		$item_data[] = array(
			'key'   => 'امکانات انتخاب‌شده',
			'value' => sanitize_text_field(
				$cart_item['romonet_features']
			),
		);
	}


	return $item_data;
}


/*
|--------------------------------------------------------------------------
| 13. Change Cart Item Name
|--------------------------------------------------------------------------
*/

add_filter(
	'woocommerce_cart_item_name',
	'romonet_booking_cart_item_name',
	10,
	3
);

function romonet_booking_cart_item_name(
	$product_name,
	$cart_item,
	$cart_item_key
) {

	if (
		empty(
			$cart_item['romonet_custom_booking']
		)
	) {
		return $product_name;
	}


	$project_type = isset(
		$cart_item['romonet_project_type']
	)
		? sanitize_text_field(
			$cart_item['romonet_project_type']
		)
		: 'پروژه سفارشی';


	return esc_html(
		'رزرو پروژه: ' . $project_type
	);
}


/*
|--------------------------------------------------------------------------
| 14. Save data to WooCommerce Order Item
|--------------------------------------------------------------------------
*/

add_action(
	'woocommerce_checkout_create_order_line_item',
	'romonet_booking_save_order_item_meta',
	10,
	4
);

function romonet_booking_save_order_item_meta(
	$item,
	$cart_item_key,
	$values,
	$order
) {

	if (
		empty(
			$values['romonet_custom_booking']
		)
	) {
		return;
	}


	/*
	|--------------------------------------------------------------------------
	| Customer-facing metadata
	|--------------------------------------------------------------------------
	*/

	if (
		! empty(
			$values['romonet_project_type']
		)
	) {

		$item->add_meta_data(
			'نوع پروژه',
			sanitize_text_field(
				$values['romonet_project_type']
			),
			true
		);
	}


	if (
		! empty(
			$values['romonet_page_count']
		)
	) {

		$item->add_meta_data(
			'تعداد قالب صفحات',
			absint(
				$values['romonet_page_count']
			),
			true
		);
	}


	if (
		! empty(
			$values['romonet_features']
		)
	) {

		$item->add_meta_data(
			'امکانات انتخاب‌شده',
			sanitize_text_field(
				$values['romonet_features']
			),
			true
		);
	}


	/*
	|--------------------------------------------------------------------------
	| Internal metadata
	|--------------------------------------------------------------------------
	|
	| Prefix "_" means these are internal and normally hidden
	| from customer-facing metadata.
	|--------------------------------------------------------------------------
	*/

	if (
		! empty(
			$values['romonet_booking_id']
		)
	) {

		$item->add_meta_data(
			'_romonet_booking_id',
			sanitize_text_field(
				$values['romonet_booking_id']
			),
			true
		);
	}


	if (
		isset(
			$values['romonet_full_price']
		)
	) {

		$item->add_meta_data(
			'_romonet_full_project_price',
			(int) $values['romonet_full_price'],
			true
		);
	}


	if (
		isset(
			$values['romonet_price']
		)
	) {

		$item->add_meta_data(
			'_romonet_deposit_amount',
			(int) $values['romonet_price'],
			true
		);
	}
}


/*
|--------------------------------------------------------------------------
| 15. Better Order Item Name
|--------------------------------------------------------------------------
*/

add_filter(
	'woocommerce_order_item_name',
	'romonet_booking_order_item_name',
	10,
	2
);

function romonet_booking_order_item_name(
	$item_name,
	$item
) {

	$project_type = $item->get_meta(
		'نوع پروژه',
		true
	);

	if ( ! empty( $project_type ) ) {

		return esc_html(
			'رزرو پروژه: ' .
			$project_type
		);
	}

	return $item_name;
}


/*
|--------------------------------------------------------------------------
| 16. Keep Dummy Product hidden from catalog queries
|--------------------------------------------------------------------------
*/

add_action(
	'woocommerce_product_query',
	'romonet_booking_hide_product_from_catalog'
);

function romonet_booking_hide_product_from_catalog(
	$query
) {

	if (
		! $query instanceof WP_Query
	) {
		return;
	}


	$product_id = wc_get_product_id_by_sku(
		ROMONET_BOOKING_PRODUCT_SKU
	);


	if ( ! $product_id ) {
		return;
	}


	$excluded = $query->get(
		'post__not_in'
	);


	if ( ! is_array( $excluded ) ) {
		$excluded = array();
	}


	$excluded[] = (int) $product_id;


	$query->set(
		'post__not_in',
		array_unique(
			$excluded
		)
	);
}


/*
|--------------------------------------------------------------------------
| 17. Prevent quantity changes
|--------------------------------------------------------------------------
|
| A booking represents exactly one project reservation.
|
*/

add_filter(
	'woocommerce_cart_item_quantity',
	'romonet_booking_lock_quantity',
	10,
	3
);

function romonet_booking_lock_quantity(
	$product_quantity,
	$cart_item_key,
	$cart_item
) {

	if (
		empty(
			$cart_item['romonet_custom_booking']
		)
	) {
		return $product_quantity;
	}


	return '1';
}

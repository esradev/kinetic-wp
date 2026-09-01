<?php
/**
 * Romonet Custom Website Booking - Custom DB Table
 */

defined( 'ABSPATH' ) || exit;

define( 'ROMONET_BOOKING_NONCE_ACTION', 'romonet_create_custom_request' );
define( 'ROMONET_DB_VERSION', '1.0.0' ); // تغییر این نسخه در آینده باعث بروزرسانی جدول می‌شود

/*
|--------------------------------------------------------------------------
| 1. Expose AJAX URL + Nonce
|--------------------------------------------------------------------------
*/
add_action( 'wp_head', 'romonet_booking_expose_ajax_config', 1 );
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
| 2. Create Database Table
|--------------------------------------------------------------------------
*/
add_action( 'after_setup_theme', 'romonet_create_booking_db_table' );
function romonet_create_booking_db_table() {
    $current_version = get_option( 'romonet_booking_db_version' );
    
    if ( $current_version !== ROMONET_DB_VERSION ) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'romonet_project_requests';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            customer_name varchar(100) NOT NULL,
            customer_phone varchar(20) NOT NULL,
            project_type varchar(255) NOT NULL,
            page_count int(11) DEFAULT 0 NOT NULL,
            features text NOT NULL,
            full_price bigint(20) NOT NULL,
            deposit_price bigint(20) NOT NULL,
            status varchar(20) DEFAULT 'pending' NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        update_option( 'romonet_booking_db_version', ROMONET_DB_VERSION );
    }
}

/*
|--------------------------------------------------------------------------
| 3. Pricing Logic (Kept from your old code)
|--------------------------------------------------------------------------
*/
function romonet_booking_project_types() {
	return array(
		'شرکتی / آژانسی' => array( 'price' => 38500000 ),
		'فروشگاه تخصصی ووکامرس' => array( 'price' => 68000000 ),
		'هدلس Next.js' => array( 'price' => 128000000 ),
	);
}

function romonet_booking_packages() {
	return array(
		'پکیج آماده: اسپرینت اختصاصی شرکتی و آژانسی' => array( 'price' => 38500000 ),
		'پکیج آماده: معماری فروشگاه پرسرعت ووکامرس' => array( 'price' => 68000000 ),
		'پکیج آماده: سامانه هدلس وردپرس (Next.js 15)' => array( 'price' => 128000000 ),
	);
}

function romonet_booking_calculate_custom_price( $project_type, $page_count, $features ) {
	$types = romonet_booking_project_types();
	if ( ! isset( $types[ $project_type ] ) ) {
		return new WP_Error( 'invalid_project_type', 'نوع پروژه نامعتبر است.' );
	}

	$page_count = absint( $page_count );
	if ( $page_count < 3 || $page_count > 25 ) {
		return new WP_Error( 'invalid_page_count', 'تعداد صفحات باید بین ۳ تا ۲۵ باشد.' );
	}

	$base_price = (int) $types[ $project_type ]['price'];
	$page_addon = max( 0, $page_count - 5 ) * 2800000;

	$needs_custom_blocks = false;
	$needs_migration     = false;
	$needs_custom_api    = false;
	$needs_speed         = false;

	if ( $features !== '' && $features !== 'بدون امکانات اضافه' ) {
		$feature_list = array_map( 'trim', explode( '،', $features ) );
		$needs_custom_blocks = in_array( 'توسعه بلوک‌های گوتنبرگ', $feature_list, true );
		$needs_migration     = in_array( 'انتقال محتوا و سئو', $feature_list, true );
		$needs_custom_api    = in_array( 'اتصال API/CRM', $feature_list, true );
		$needs_speed         = in_array( 'تضمین سرعت ۱۰۰', $feature_list, true );
	}

	$full_price = $base_price + $page_addon 
        + ($needs_custom_blocks ? 8500000 : 0) 
        + ($needs_migration ? 6500000 : 0) 
        + ($needs_custom_api ? 14500000 : 0) 
        + ($needs_speed ? 4500000 : 0);

	return array(
		'full_price' => $full_price,
		'deposit'    => (int) round( $full_price * 0.5 ),
	);
}

function romonet_booking_calculate_price( $project_type, $page_count, $features ) {
	$packages = romonet_booking_packages();
	if ( isset( $packages[ $project_type ] ) ) {
		$full_price = (int) $packages[ $project_type ]['price'];
		return array(
			'full_price' => $full_price,
			'deposit'    => (int) round( $full_price * 0.5 ),
		);
	}
	return romonet_booking_calculate_custom_price( $project_type, $page_count, $features );
}

/*
|--------------------------------------------------------------------------
| 4. AJAX Handler - Save to Database
|--------------------------------------------------------------------------
*/
add_action( 'wp_ajax_romonet_submit_booking_request', 'romonet_booking_ajax_save_db' );
add_action( 'wp_ajax_nopriv_romonet_submit_booking_request', 'romonet_booking_ajax_save_db' );

function romonet_booking_ajax_save_db() {
	if ( ! isset( $_POST['_ajax_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_ajax_nonce'] ) ), ROMONET_BOOKING_NONCE_ACTION ) ) {
		wp_send_json_error( 'درخواست امنیتی معتبر نیست. لطفاً صفحه را تازه‌سازی کنید.', 403 );
	}

	$customer_name  = isset($_POST['customerName']) ? sanitize_text_field(wp_unslash($_POST['customerName'])) : '';
	$customer_phone = isset($_POST['customerPhone']) ? sanitize_text_field(wp_unslash($_POST['customerPhone'])) : '';
	$project_type   = isset($_POST['projectType']) ? sanitize_text_field(wp_unslash($_POST['projectType'])) : '';
	$page_count     = isset($_POST['pageCount']) ? absint($_POST['pageCount']) : 0;
	$features       = isset($_POST['features']) ? sanitize_text_field(wp_unslash($_POST['features'])) : 'بدون امکانات اضافه';

	if ( empty( $customer_name ) || empty( $customer_phone ) ) {
		wp_send_json_error( 'نام و شماره تماس الزامی است.', 400 );
	}
    if ( empty( $project_type ) ) {
		wp_send_json_error( 'نوع پروژه مشخص نشده است.', 400 );
	}

	$price_data = romonet_booking_calculate_price( $project_type, $page_count, $features );

	if ( is_wp_error( $price_data ) ) {
		wp_send_json_error( $price_data->get_error_message(), 400 );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'romonet_project_requests';

	$inserted = $wpdb->insert(
		$table_name,
		array(
			'customer_name'  => $customer_name,
			'customer_phone' => $customer_phone,
			'project_type'   => $project_type,
			'page_count'     => $page_count,
			'features'       => $features,
			'full_price'     => $price_data['full_price'],
			'deposit_price'  => $price_data['deposit'],
			'status'         => 'pending',
            'created_at'     => current_time('mysql', 1)
		),
		array( '%s', '%s', '%s', '%d', '%s', '%d', '%d', '%s', '%s' )
	);

	if ( false === $inserted ) {
		wp_send_json_error( 'خطا در ثبت اطلاعات در سیستم. لطفا با پشتیبانی تماس بگیرید.', 500 );
	}

	wp_send_json_success( array(
		'message' => 'درخواست شما با موفقیت ثبت شد. همکاران ما به زودی با شما تماس خواهند گرفت.',
	) );
}
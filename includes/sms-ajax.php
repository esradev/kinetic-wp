<?php
/**
 * Romonet SMS Requests - DB & AJAX Setup
 */
defined( 'ABSPATH' ) || exit;

// Create Database Table for SMS
add_action( 'after_setup_theme', 'romonet_create_sms_db_table' );
function romonet_create_sms_db_table() {
    $current_version = get_option( 'romonet_sms_db_version' );
    $db_version      = '1.0.0';
    
    if ( $current_version !== $db_version ) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'romonet_sms_requests';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            customer_name varchar(100) NOT NULL,
            customer_phone varchar(20) NOT NULL,
            request_type varchar(20) NOT NULL, /* 'plan' or 'credits' */
            plan_title varchar(150) NOT NULL,
            sms_volume int(11) DEFAULT 0 NOT NULL,
            country_code varchar(10) NOT NULL,
            final_price bigint(20) NOT NULL,
            status varchar(20) DEFAULT 'pending' NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        update_option( 'romonet_sms_db_version', $db_version );
    }
}

// Handle AJAX Request
add_action( 'wp_ajax_romonet_submit_sms_request', 'romonet_ajax_save_sms_db' );
add_action( 'wp_ajax_nopriv_romonet_submit_sms_request', 'romonet_ajax_save_sms_db' );

function romonet_ajax_save_sms_db() {
	if ( ! isset( $_POST['_ajax_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_ajax_nonce'] ) ), 'romonet_create_custom_request' ) ) {
		wp_send_json_error( 'درخواست نامعتبر است. لطفاً صفحه را رفرش کنید.', 403 );
	}

	$customer_name  = isset($_POST['customerName']) ? sanitize_text_field(wp_unslash($_POST['customerName'])) : '';
	$customer_phone = isset($_POST['customerPhone']) ? sanitize_text_field(wp_unslash($_POST['customerPhone'])) : '';
	$request_type   = isset($_POST['requestType']) ? sanitize_text_field(wp_unslash($_POST['requestType'])) : 'plan';
	$plan_title     = isset($_POST['planTitle']) ? sanitize_text_field(wp_unslash($_POST['planTitle'])) : '';
	$sms_volume     = isset($_POST['smsVolume']) ? absint($_POST['smsVolume']) : 0;
	$country_code   = isset($_POST['countryCode']) ? sanitize_text_field(wp_unslash($_POST['countryCode'])) : 'ir';
	$final_price    = isset($_POST['finalPrice']) ? absint($_POST['finalPrice']) : 0;

	if ( empty( $customer_name ) || empty( $customer_phone ) ) {
		wp_send_json_error( 'نام و شماره تماس الزامی است.', 400 );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'romonet_sms_requests';

	$inserted = $wpdb->insert(
		$table_name,
		array(
			'customer_name'  => $customer_name,
			'customer_phone' => $customer_phone,
			'request_type'   => $request_type,
			'plan_title'     => $plan_title,
			'sms_volume'     => $sms_volume,
			'country_code'   => $country_code,
			'final_price'    => $final_price,
			'status'         => 'pending',
			'created_at'     => current_time('mysql', 1)
		),
		array( '%s', '%s', '%s', '%s', '%d', '%s', '%d', '%s', '%s' )
	);

	if ( false === $inserted ) {
		wp_send_json_error( 'خطای سیستمی در ثبت اطلاعات. لطفاً تماس بگیرید.', 500 );
	}

	wp_send_json_success( array(
		'message' => 'درخواست سامانه پیامک با موفقیت ثبت شد. به‌زودی برای ارائه دسترسی با شما تماس می‌گیریم.',
	) );
}
<?php
/**
 * Romonet Maintenance Requests - DB & AJAX Setup
 */

defined( 'ABSPATH' ) || exit;

// Create Database Table for Maintenance
add_action( 'after_setup_theme', 'romonet_create_maintenance_db_table' );
function romonet_create_maintenance_db_table() {
    $current_version = get_option( 'romonet_maintenance_db_version' );
    $db_version      = '1.0.0';
    
    if ( $current_version !== $db_version ) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'romonet_maintenance_requests';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            customer_name varchar(100) NOT NULL,
            customer_phone varchar(20) NOT NULL,
            plan_type varchar(20) NOT NULL,
            plan_name varchar(150) NOT NULL,
            billing_cycle varchar(20) NOT NULL,
            site_count int(11) DEFAULT 1 NOT NULL,
            is_ecommerce tinyint(1) DEFAULT 0 NOT NULL,
            needs_sla tinyint(1) DEFAULT 0 NOT NULL,
            dev_hours int(11) DEFAULT 0 NOT NULL,
            final_price bigint(20) NOT NULL,
            status varchar(20) DEFAULT 'pending' NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        update_option( 'romonet_maintenance_db_version', $db_version );
    }
}

// Handle AJAX Request
add_action( 'wp_ajax_romonet_submit_maintenance_request', 'romonet_ajax_save_maintenance_db' );
add_action( 'wp_ajax_nopriv_romonet_submit_maintenance_request', 'romonet_ajax_save_maintenance_db' );

function romonet_ajax_save_maintenance_db() {
	if ( ! isset( $_POST['_ajax_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_ajax_nonce'] ) ), 'romonet_create_custom_request' ) ) {
		wp_send_json_error( 'درخواست نامعتبر است. لطفاً صفحه را رفرش کنید.', 403 );
	}

	$customer_name  = isset($_POST['customerName']) ? sanitize_text_field(wp_unslash($_POST['customerName'])) : '';
	$customer_phone = isset($_POST['customerPhone']) ? sanitize_text_field(wp_unslash($_POST['customerPhone'])) : '';
	$plan_type      = isset($_POST['planType']) ? sanitize_text_field(wp_unslash($_POST['planType'])) : 'standard';
	$plan_name      = isset($_POST['planName']) ? sanitize_text_field(wp_unslash($_POST['planName'])) : '';
	$billing_cycle  = isset($_POST['billingCycle']) ? sanitize_text_field(wp_unslash($_POST['billingCycle'])) : 'monthly';
	
	// Custom Plan specifics
	$site_count     = isset($_POST['siteCount']) ? absint($_POST['siteCount']) : 1;
	$is_ecommerce   = isset($_POST['isEcommerce']) ? (int) $_POST['isEcommerce'] : 0;
	$needs_sla      = isset($_POST['needsSla']) ? (int) $_POST['needsSla'] : 0;
	$dev_hours      = isset($_POST['devHours']) ? absint($_POST['devHours']) : 0;
	$final_price    = isset($_POST['finalPrice']) ? absint($_POST['finalPrice']) : 0;

	if ( empty( $customer_name ) || empty( $customer_phone ) ) {
		wp_send_json_error( 'نام و شماره تماس الزامی است.', 400 );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'romonet_maintenance_requests';

	$inserted = $wpdb->insert(
		$table_name,
		array(
			'customer_name'  => $customer_name,
			'customer_phone' => $customer_phone,
			'plan_type'      => $plan_type,
			'plan_name'      => $plan_name,
			'billing_cycle'  => $billing_cycle,
			'site_count'     => $site_count,
			'is_ecommerce'   => $is_ecommerce,
			'needs_sla'      => $needs_sla,
			'dev_hours'      => $dev_hours,
			'final_price'    => $final_price,
			'status'         => 'pending',
			'created_at'     => current_time('mysql', 1)
		),
		array( '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d', '%d', '%d', '%s', '%s' )
	);

	if ( false === $inserted ) {
		wp_send_json_error( 'خطای سیستمی. لطفاً با پشتیبانی تماس بگیرید.', 500 );
	}

	wp_send_json_success( array(
		'message' => 'درخواست پشتیبانی شما با موفقیت ثبت شد. به زودی با شما تماس می‌گیریم.',
	) );
}
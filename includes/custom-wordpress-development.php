<?php
/**
 * Custom WordPress development landing page support.
 *
 * @package Romonet_WPStorm
 */

defined( 'ABSPATH' ) || exit;

function romonet_custom_development_url( $path ) {
	$page = get_page_by_path( trim( $path, '/' ) );
	return $page ? get_permalink( $page ) : '';
}

function romonet_create_custom_development_requests_table() {
	$version = '1.0.0';
	if ( get_option( 'romonet_custom_development_db_version' ) === $version ) {
		return;
	}
	global $wpdb;
	$table = $wpdb->prefix . 'romonet_custom_development_requests';
	$sql = "CREATE TABLE {$table} (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		customer_name varchar(100) NOT NULL,
		customer_phone varchar(30) NOT NULL,
		business_name varchar(150) NOT NULL,
		site_url varchar(255) NOT NULL,
		request_type varchar(100) NOT NULL,
		notes text NOT NULL,
		status varchar(20) DEFAULT 'pending' NOT NULL,
		created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		PRIMARY KEY (id)
	) {$wpdb->get_charset_collate()};";
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
	update_option( 'romonet_custom_development_db_version', $version );
}
add_action( 'after_setup_theme', 'romonet_create_custom_development_requests_table' );

add_action( 'wp_ajax_romonet_submit_custom_development_request', 'romonet_save_custom_development_request' );
add_action( 'wp_ajax_nopriv_romonet_submit_custom_development_request', 'romonet_save_custom_development_request' );

function romonet_save_custom_development_request() {
	if ( ! isset( $_POST['_ajax_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_ajax_nonce'] ) ), 'romonet_create_custom_request' ) ) {
		wp_send_json_error( 'درخواست امنیتی معتبر نیست. لطفاً صفحه را تازه‌سازی کنید.', 403 );
	}
	$name = isset( $_POST['customerName'] ) ? sanitize_text_field( wp_unslash( $_POST['customerName'] ) ) : '';
	$phone = isset( $_POST['customerPhone'] ) ? sanitize_text_field( wp_unslash( $_POST['customerPhone'] ) ) : '';
	$business = isset( $_POST['businessName'] ) ? sanitize_text_field( wp_unslash( $_POST['businessName'] ) ) : '';
	$url = isset( $_POST['siteUrl'] ) ? esc_url_raw( wp_unslash( $_POST['siteUrl'] ) ) : '';
	$type = isset( $_POST['requestType'] ) ? sanitize_text_field( wp_unslash( $_POST['requestType'] ) ) : '';
	$notes = isset( $_POST['notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['notes'] ) ) : '';
	if ( ! $name || ! $phone || ! $type || ! $notes ) {
		wp_send_json_error( 'لطفاً فیلدهای الزامی را تکمیل کنید.', 400 );
	}
	if ( ! preg_match( '/^(?:\+98|0098|98|0)?9[0-9]{9}$/', preg_replace( '/[\s-]/', '', $phone ) ) ) {
		wp_send_json_error( 'شماره تماس معتبر نیست.', 400 );
	}
	if ( $url && ! wp_http_validate_url( $url ) ) {
		wp_send_json_error( 'آدرس سایت معتبر نیست.', 400 );
	}
	global $wpdb;
	$inserted = $wpdb->insert(
		$wpdb->prefix . 'romonet_custom_development_requests',
		array(
			'customer_name' => $name,
			'customer_phone' => $phone,
			'business_name' => $business,
			'site_url' => $url,
			'request_type' => $type,
			'notes' => $notes,
			'status' => 'pending',
			'created_at' => current_time( 'mysql', true ),
		),
		array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
	);
	if ( false === $inserted ) {
		wp_send_json_error( 'خطایی هنگام ثبت درخواست رخ داد. لطفاً با رومونت تماس بگیرید.', 500 );
	}
	wp_send_json_success( array( 'message' => 'درخواست شما با موفقیت ثبت شد. همکاران ما برای بررسی پروژه با شما تماس می‌گیرند.' ) );
}

function romonet_register_custom_development_admin_page() {
	add_submenu_page( 'romonet-project-requests', 'درخواست‌های توسعه اختصاصی', 'درخواست‌های توسعه اختصاصی', 'manage_options', 'romonet-custom-development-requests', 'romonet_render_custom_development_admin_page' );
}
add_action( 'admin_menu', 'romonet_register_custom_development_admin_page', 21 );

function romonet_render_custom_development_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	global $wpdb;
	$rows = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}romonet_custom_development_requests ORDER BY created_at DESC LIMIT 200", ARRAY_A );
	?>
	<div class="wrap" dir="rtl">
		<h1>درخواست‌های توسعه اختصاصی وردپرس</h1>
		<table class="widefat striped"><thead><tr><th>نام</th><th>کسب‌وکار</th><th>تماس</th><th>نوع درخواست</th><th>آدرس سایت</th><th>توضیحات</th><th>تاریخ</th></tr></thead><tbody>
		<?php if ( $rows ) : foreach ( $rows as $row ) : ?>
			<tr><td><?php echo esc_html( $row['customer_name'] ); ?></td><td><?php echo esc_html( $row['business_name'] ); ?></td><td dir="ltr"><?php echo esc_html( $row['customer_phone'] ); ?></td><td><?php echo esc_html( $row['request_type'] ); ?></td><td><?php if ( $row['site_url'] ) : ?><a href="<?php echo esc_url( $row['site_url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $row['site_url'] ); ?></a><?php endif; ?></td><td><?php echo esc_html( $row['notes'] ); ?></td><td><?php echo esc_html( wp_date( get_option( 'date_format' ), strtotime( $row['created_at'] ) ) ); ?></td></tr>
		<?php endforeach; else : ?><tr><td colspan="7">هنوز درخواستی ثبت نشده است.</td></tr><?php endif; ?>
		</tbody></table>
	</div>
	<?php
}

function romonet_custom_development_seo() {
	if ( ! is_page_template( 'page-custom-wordpress-development.php' ) || class_exists( 'WPSEO_Frontend' ) || defined( 'RANK_MATH_VERSION' ) ) {
		return;
	}
	$title = 'توسعه اختصاصی وردپرس | برنامه‌نویسی افزونه و قالب رومونت';
	$description = 'رومونت خدمات توسعه اختصاصی وردپرس، برنامه‌نویسی افزونه، طراحی قالب، توسعه ووکامرس و اتصال API را متناسب با نیاز پروژه ارائه می‌دهد.';
	$url = romonet_custom_development_url( 'custom-wordpress-development' ) ?: home_url( '/custom-wordpress-development/' );
	echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'romonet_custom_development_seo', 2 );

function romonet_custom_development_title( $title ) {
	return is_page_template( 'page-custom-wordpress-development.php' ) ? 'توسعه اختصاصی وردپرس | برنامه‌نویسی افزونه و قالب رومونت' : $title;
}
add_filter( 'pre_get_document_title', 'romonet_custom_development_title' );

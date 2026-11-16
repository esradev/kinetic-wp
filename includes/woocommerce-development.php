<?php
/**
 * WooCommerce development landing page support.
 *
 * @package Romonet_WPStorm
 */

defined( 'ABSPATH' ) || exit;

function romonet_woocommerce_development_url( $path ) {
	$page = get_page_by_path( trim( $path, '/' ) );
	return $page ? get_permalink( $page ) : '';
}

function romonet_create_woocommerce_requests_table() {
	$version = '1.0.0';
	if ( get_option( 'romonet_woocommerce_requests_db_version' ) === $version ) {
		return;
	}
	global $wpdb;
	$table = $wpdb->prefix . 'romonet_woocommerce_requests';
	$charset = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE {$table} (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		customer_name varchar(100) NOT NULL,
		customer_phone varchar(30) NOT NULL,
		business_name varchar(150) NOT NULL,
		active_store varchar(10) NOT NULL,
		project_type varchar(100) NOT NULL,
		site_url varchar(255) NOT NULL,
		notes text NOT NULL,
		status varchar(20) DEFAULT 'pending' NOT NULL,
		created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		PRIMARY KEY (id)
	) {$charset};";
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
	update_option( 'romonet_woocommerce_requests_db_version', $version );
}
add_action( 'after_setup_theme', 'romonet_create_woocommerce_requests_table' );

add_action( 'wp_ajax_romonet_submit_woocommerce_request', 'romonet_save_woocommerce_request' );
add_action( 'wp_ajax_nopriv_romonet_submit_woocommerce_request', 'romonet_save_woocommerce_request' );

function romonet_save_woocommerce_request() {
	if ( ! isset( $_POST['_ajax_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_ajax_nonce'] ) ), 'romonet_create_custom_request' ) ) {
		wp_send_json_error( 'درخواست امنیتی معتبر نیست. لطفاً صفحه را تازه‌سازی کنید.', 403 );
	}
	$name = isset( $_POST['customerName'] ) ? sanitize_text_field( wp_unslash( $_POST['customerName'] ) ) : '';
	$phone = isset( $_POST['customerPhone'] ) ? sanitize_text_field( wp_unslash( $_POST['customerPhone'] ) ) : '';
	$business = isset( $_POST['businessName'] ) ? sanitize_text_field( wp_unslash( $_POST['businessName'] ) ) : '';
	$active = isset( $_POST['activeStore'] ) ? sanitize_key( wp_unslash( $_POST['activeStore'] ) ) : '';
	$type = isset( $_POST['projectType'] ) ? sanitize_text_field( wp_unslash( $_POST['projectType'] ) ) : '';
	$url = isset( $_POST['siteUrl'] ) ? esc_url_raw( wp_unslash( $_POST['siteUrl'] ) ) : '';
	$notes = isset( $_POST['notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['notes'] ) ) : '';
	if ( ! $name || ! $phone || ! $business || ! $type || ! $notes ) {
		wp_send_json_error( 'لطفاً همه فیلدهای الزامی را تکمیل کنید.', 400 );
	}
	$normalized_phone = preg_replace( '/[\s-]/', '', $phone );
	if ( ! preg_match( '/^(?:\+98|0098|98|0)?9[0-9]{9}$/', $normalized_phone ) ) {
		wp_send_json_error( 'شماره تماس معتبر نیست.', 400 );
	}
	if ( $url && ! wp_http_validate_url( $url ) ) {
		wp_send_json_error( 'آدرس سایت معتبر نیست.', 400 );
	}
	global $wpdb;
	$inserted = $wpdb->insert(
		$wpdb->prefix . 'romonet_woocommerce_requests',
		array(
			'customer_name' => $name,
			'customer_phone' => $phone,
			'business_name' => $business,
			'active_store' => in_array( $active, array( 'yes', 'no' ), true ) ? $active : 'no',
			'project_type' => $type,
			'site_url' => $url,
			'notes' => $notes,
			'status' => 'pending',
			'created_at' => current_time( 'mysql', true ),
		),
		array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
	);
	if ( false === $inserted ) {
		wp_send_json_error( 'خطایی هنگام ثبت درخواست رخ داد. لطفاً با رومونت تماس بگیرید.', 500 );
	}
	wp_send_json_success( array( 'message' => 'درخواست شما با موفقیت ثبت شد. همکاران ما برای بررسی پروژه با شما تماس می‌گیرند.' ) );
}

function romonet_register_woocommerce_requests_admin_page() {
	add_submenu_page( 'romonet-project-requests', 'درخواست‌های ووکامرس', 'درخواست‌های ووکامرس', 'manage_options', 'romonet-woocommerce-requests', 'romonet_render_woocommerce_requests_admin_page' );
}
add_action( 'admin_menu', 'romonet_register_woocommerce_requests_admin_page', 20 );

function romonet_render_woocommerce_requests_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	global $wpdb;
	$rows = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}romonet_woocommerce_requests ORDER BY created_at DESC LIMIT 200", ARRAY_A );
	?>
	<div class="wrap" dir="rtl">
		<h1>درخواست‌های توسعه ووکامرس</h1>
		<table class="widefat striped"><thead><tr><th>نام</th><th>کسب‌وکار</th><th>تماس</th><th>نوع پروژه</th><th>فروشگاه فعال</th><th>آدرس سایت</th><th>توضیحات</th><th>تاریخ</th></tr></thead><tbody>
		<?php if ( $rows ) : foreach ( $rows as $row ) : ?>
			<tr><td><?php echo esc_html( $row['customer_name'] ); ?></td><td><?php echo esc_html( $row['business_name'] ); ?></td><td dir="ltr"><?php echo esc_html( $row['customer_phone'] ); ?></td><td><?php echo esc_html( $row['project_type'] ); ?></td><td><?php echo 'yes' === $row['active_store'] ? 'بله' : 'خیر'; ?></td><td><?php if ( $row['site_url'] ) : ?><a href="<?php echo esc_url( $row['site_url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $row['site_url'] ); ?></a><?php endif; ?></td><td><?php echo esc_html( $row['notes'] ); ?></td><td><?php echo esc_html( wp_date( get_option( 'date_format' ), strtotime( $row['created_at'] ) ) ); ?></td></tr>
		<?php endforeach; else : ?><tr><td colspan="8">هنوز درخواستی ثبت نشده است.</td></tr><?php endif; ?>
		</tbody></table>
	</div>
	<?php
}

function romonet_woocommerce_development_seo() {
	if ( ! is_page_template( 'page-woocommerce-development.php' ) || class_exists( 'WPSEO_Frontend' ) || defined( 'RANK_MATH_VERSION' ) ) {
		return;
	}
	$title = 'طراحی فروشگاه اینترنتی با ووکامرس | توسعه فروشگاه رومونت';
	$description = 'رومونت فروشگاه‌های ووکامرسی را متناسب با مدل کسب‌وکار، تجربه خرید و نیازهای فنی شما طراحی و توسعه می‌دهد.';
	$url = romonet_woocommerce_development_url( 'woocommerce-development' ) ?: home_url( '/woocommerce-development/' );
	echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'romonet_woocommerce_development_seo', 2 );

function romonet_woocommerce_development_title( $title ) {
	if ( is_page_template( 'page-woocommerce-development.php' ) ) {
		return 'طراحی فروشگاه اینترنتی با ووکامرس | توسعه فروشگاه رومونت';
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'romonet_woocommerce_development_title' );

<?php
/**
 * Romonet SMS Requests - Admin Display Page
 */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Romonet_SMS_List_Table extends WP_List_Table {

	public function __construct() {
		parent::__construct( array(
			'singular' => 'sms_request',
			'plural'   => 'sms_requests',
			'ajax'     => false,
		) );
	}

	public function get_columns() {
		return array(
			'id'             => 'شناسه',
			'customer_name'  => 'نام مشتری',
			'customer_phone' => 'شماره تماس',
			'request_type'   => 'نوع درخواست',
			'plan_title'     => 'جزئیات بسته/پلن',
			'country_code'   => 'مقصد',
			'final_price'    => 'مبلغ (تومان)',
			'status'         => 'وضعیت',
			'created_at'     => 'تاریخ ثبت',
		);
	}

	public function get_sortable_columns() {
		return array(
			'id'          => array( 'id', false ),
			'created_at'  => array( 'created_at', true ),
			'final_price' => array( 'final_price', false ),
		);
	}

	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'id':
			case 'customer_name':
			case 'customer_phone':
				return esc_html( $item[ $column_name ] );
				
			case 'request_type':
			    return $item['request_type'] === 'credits' 
			        ? '<span style="color:#0073aa;font-weight:bold;">خرید اعتبار پیامک</span>' 
			        : '<span style="color:#46b450;font-weight:bold;">اشتراک ماهانه</span>';

			case 'plan_title':
			    $vol = $item['sms_volume'] > 0 ? "<br><small style='color:#777'>حجم: ".number_format($item['sms_volume'])." عدد</small>" : "";
			    return esc_html( $item['plan_title'] ) . $vol;

			case 'country_code':
			    $flags = array('ir' => '🇮🇷 ایران', 'tr' => '🇹🇷 ترکیه', 'uae' => '🇦🇪 امارات');
			    return isset($flags[$item['country_code']]) ? $flags[$item['country_code']] : strtoupper($item['country_code']);

			case 'final_price':
				return number_format( (int) $item['final_price'] );
				
			case 'status':
				if ( 'pending' === $item['status'] ) {
					return '<span style="background:#f0b849; color:#fff; padding:4px 8px; border-radius:4px; font-size:12px;">در انتظار تایید</span>';
				}
				return esc_html( $item['status'] );

			case 'created_at':
				return wp_date( get_option( 'date_format' ) . ' - H:i', strtotime( $item['created_at'] ) );
				
			default:
				return '-';
		}
	}

	public function prepare_items() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'romonet_sms_requests';
		$per_page = 20;
		$columns  = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array( $columns, $hidden, $sortable );

		$orderby = ( isset( $_GET['orderby'] ) && in_array( $_GET['orderby'], array('id', 'created_at', 'final_price') ) ) ? sanitize_text_field( $_GET['orderby'] ) : 'id';
		$order   = ( isset( $_GET['order'] ) && strtolower( $_GET['order'] ) === 'asc' ) ? 'ASC' : 'DESC';

		$current_page = $this->get_pagenum();
		$offset       = ( $current_page - 1 ) * $per_page;
		$total_items  = $wpdb->get_var( "SELECT COUNT(id) FROM {$table_name}" );

		$this->items = $wpdb->get_results( 
			$wpdb->prepare( "SELECT * FROM {$table_name} ORDER BY {$orderby} {$order} LIMIT %d OFFSET %d", $per_page, $offset ), ARRAY_A 
		);

		$this->set_pagination_args( array(
			'total_items' => $total_items,
			'per_page'    => $per_page,
			'total_pages' => ceil( $total_items / $per_page ),
		) );
	}
}

// Add to Admin Menu
add_action( 'admin_menu', 'romonet_register_sms_admin_page' );
function romonet_register_sms_admin_page() {
	add_menu_page(
		'درخواست‌های پیامک',
		'خرید پیامک SMS',
		'manage_options',
		'romonet-sms-requests',
		'romonet_render_sms_admin_page',
		'dashicons-smartphone', // آیکون موبایل
		27
	);
}

function romonet_render_sms_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) return;

	$table = new Romonet_SMS_List_Table();
	$table->prepare_items();
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline">درخواست‌های خرید اعتبار و اشتراک پیامک</h1>
		<hr class="wp-header-end">
		
		<div class="notice notice-info inline" style="margin: 15px 0;">
			<p>لیست کاربرانی که درخواست فعال‌سازی اشتراک پیامک یا خرید بسته‌های اعتباری داشته‌اند.</p>
		</div>

		<form id="romonet-sms-filter" method="get">
			<input type="hidden" name="page" value="<?php echo isset($_REQUEST['page']) ? esc_attr($_REQUEST['page']) : ''; ?>" />
			<?php $table->display(); ?>
		</form>
	</div>
	<?php
}
<?php
/**
 * Romonet Maintenance Requests - Admin Display Page
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Romonet_Maintenance_List_Table extends WP_List_Table {

	public function __construct() {
		parent::__construct( array(
			'singular' => 'maintenance_request',
			'plural'   => 'maintenance_requests',
			'ajax'     => false,
		) );
	}

	public function get_columns() {
		return array(
			'id'             => 'شناسه',
			'customer_name'  => 'نام مشتری',
			'customer_phone' => 'شماره تماس',
			'site_url'       => 'آدرس سایت',
			'site_type'      => 'نوع سایت',
			'request_type'   => 'نوع درخواست',
			'plan_name'      => 'نام پلن / نوع',
			'details'        => 'جزئیات پلن سفارشی',
			'notes'          => 'توضیحات',
			'billing_cycle'  => 'دوره پرداخت',
			'final_price'    => 'مبلغ ماهیانه (تومان)',
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

			case 'site_url':
				return $item['site_url'] ? '<a href="' . esc_url( $item['site_url'] ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( $item['site_url'] ) . '</a>' : '-';

			case 'site_type':
			case 'request_type':
			case 'notes':
				return ! empty( $item[ $column_name ] ) ? esc_html( $item[ $column_name ] ) : '-';
				
			case 'plan_name':
			    $type_label = 'inquiry' === $item['plan_type'] ? 'استعلام' : ( 'custom' === $item['plan_type'] ? 'پلن سفارشی' : 'پکیج آماده' );
			    $type = '<br><span style="color:#777; font-size:11px;">(' . esc_html( $type_label ) . ')</span>';
			    return esc_html( $item['plan_name'] ) . $type;

			case 'details':
			    if ( $item['plan_type'] !== 'custom' ) return '-';
			    $html  = "سایت‌ها: <strong>{$item['site_count']}</strong><br>";
			    $html .= "فروشگاهی: " . ( $item['is_ecommerce'] ? '<strong style="color:green">بله</strong>' : 'خیر' ) . "<br>";
			    $html .= "اورژانسی: " . ( $item['needs_sla'] ? '<strong style="color:green">بله</strong>' : 'خیر' ) . "<br>";
			    $html .= "توسعه: <strong>{$item['dev_hours']} ساعت</strong>";
			    return $html;

            case 'billing_cycle':
                return 'custom' === $item['billing_cycle'] ? 'استعلام' : ( 'annual' === $item['billing_cycle'] ? '<span style="color:#46b450">سالانه</span>' : 'ماهانه' );

			case 'final_price':
				return number_format( (int) $item['final_price'] );
				
			case 'status':
				if ( 'pending' === $item['status'] ) {
					return '<span style="background:#f0b849; color:#fff; padding:4px 8px; border-radius:4px; font-size:12px;">بررسی نشده</span>';
				}
				return esc_html( $item['status'] );

			case 'created_at':
				return wp_date( get_option( 'date_format' ) . ' - ' . get_option( 'time_format' ), strtotime( $item['created_at'] ) );
				
			default:
				return '-';
		}
	}

	public function prepare_items() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'romonet_maintenance_requests';
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
add_action( 'admin_menu', 'romonet_register_maintenance_admin_page' );
function romonet_register_maintenance_admin_page() {
	add_menu_page(
		'درخواست‌های نگهداری',
		'درخواست پشتیبانی',
		'manage_options',
		'romonet-maintenance-requests',
		'romonet_render_maintenance_admin_page',
		'dashicons-shield', // آیکون سپر مناسب برای نگهداری/امنیت
		26
	);
}

function romonet_render_maintenance_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) return;

	$table = new Romonet_Maintenance_List_Table();
	$table->prepare_items();
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline">درخواست‌های پشتیبانی و نگهداری (Maintenance)</h1>
		<hr class="wp-header-end">
		
		<div class="notice notice-info inline" style="margin: 15px 0;">
			<p>در این جدول می‌توانید درخواست‌های پشتیبانی و نگهداری سایت را مشاهده کنید.</p>
		</div>

		<form id="romonet-maintenance-filter" method="get">
			<input type="hidden" name="page" value="<?php echo isset($_REQUEST['page']) ? esc_attr($_REQUEST['page']) : ''; ?>" />
			<?php $table->display(); ?>
		</form>
	</div>
	<?php
}
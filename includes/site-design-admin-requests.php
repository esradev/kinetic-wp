<?php
/**
 * Romonet Custom Website Booking - Admin Display
 * Creates a custom admin menu and displays requests using WP_List_Table.
 */

defined( 'ABSPATH' ) || exit;

// Ensure the core WP_List_Table class is loaded.
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * 1. Define the Custom List Table Class
 */
class Romonet_Requests_List_Table extends WP_List_Table {

	public function __construct() {
		parent::__construct( array(
			'singular' => 'romonet_request',
			'plural'   => 'romonet_requests',
			'ajax'     => false,
		) );
	}

	/**
	 * Define columns for the table.
	 */
	public function get_columns() {
		return array(
			'id'             => 'شناسه',
			'customer_name'  => 'نام مشتری',
			'customer_phone' => 'شماره تماس',
			'project_type'   => 'نوع پروژه',
			'page_count'     => 'تعداد صفحات',
			'features'       => 'امکانات',
			'full_price'     => 'مبلغ کل (تومان)',
			'deposit_price'  => 'پیش پرداخت (تومان)',
			'status'         => 'وضعیت',
			'created_at'     => 'تاریخ ثبت',
		);
	}

	/**
	 * Define which columns are sortable.
	 */
	public function get_sortable_columns() {
		return array(
			'id'         => array( 'id', false ),
			'created_at' => array( 'created_at', true ),
			'full_price' => array( 'full_price', false ),
		);
	}

	/**
	 * Default column output.
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'id':
			case 'customer_name':
			case 'customer_phone':
			case 'project_type':
			case 'page_count':
			case 'features':
				return esc_html( $item[ $column_name ] );
			
			case 'full_price':
			case 'deposit_price':
				return number_format( (int) $item[ $column_name ] );
				
			case 'created_at':
				// Output localized date and time
				return wp_date( get_option( 'date_format' ) . ' - ' . get_option( 'time_format' ), strtotime( $item[ $column_name ] ) );
				
			default:
				return print_r( $item, true ); // For debugging unknown columns
		}
	}

	/**
	 * Custom output for the status column (adds a nice visual badge).
	 */
	public function column_status( $item ) {
		$status = $item['status'];
		
		if ( 'pending' === $status ) {
			return '<span style="background:#f0b849; color:#fff; padding:4px 8px; border-radius:4px; font-size:12px;">در انتظار بررسی</span>';
		} elseif ( 'completed' === $status ) {
			return '<span style="background:#46b450; color:#fff; padding:4px 8px; border-radius:4px; font-size:12px;">تکمیل شده</span>';
		}
		
		return esc_html( $status );
	}

	/**
	 * Fetch data from the database and prepare items for the table.
	 */
	public function prepare_items() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'romonet_project_requests';

		// Number of items per page
		$per_page = 20;

		// Define columns
		$columns  = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();
		
		$this->_column_headers = array( $columns, $hidden, $sortable );

		// Handle sorting
		$valid_sort_columns = array( 'id', 'created_at', 'full_price' );
		$orderby = ( isset( $_GET['orderby'] ) && in_array( $_GET['orderby'], $valid_sort_columns ) ) ? sanitize_text_field( wp_unslash( $_GET['orderby'] ) ) : 'id';
		$order   = ( isset( $_GET['order'] ) && strtolower( $_GET['order'] ) === 'asc' ) ? 'ASC' : 'DESC';

		// Handle pagination
		$current_page = $this->get_pagenum();
		$offset       = ( $current_page - 1 ) * $per_page;

		// Get total items count
		$total_items = $wpdb->get_var( "SELECT COUNT(id) FROM {$table_name}" );

		// Fetch items
		$this->items = $wpdb->get_results( 
			$wpdb->prepare( 
				"SELECT * FROM {$table_name} ORDER BY {$orderby} {$order} LIMIT %d OFFSET %d", 
				$per_page, 
				$offset 
			), 
			ARRAY_A 
		);

		// Register pagination variables
		$this->set_pagination_args( array(
			'total_items' => $total_items,
			'per_page'    => $per_page,
			'total_pages' => ceil( $total_items / $per_page ),
		) );
	}
}

/**
 * 2. Register the Admin Menu Page
 */
add_action( 'admin_menu', 'romonet_register_requests_admin_page' );
function romonet_register_requests_admin_page() {
	add_menu_page(
		'درخواست‌های پروژه',                // Page title
		'درخواست‌های پروژه',                // Menu title
		'manage_options',                   // Capability (Admin only)
		'romonet-project-requests',         // Menu slug
		'romonet_render_requests_admin_page', // Callback function to render the page
		'dashicons-clipboard',              // Icon
		25                                  // Position
	);
}

/**
 * 3. Render the Admin Page UI
 */
function romonet_render_requests_admin_page() {
	// Check user permissions
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Instantiate the table class
	$requests_table = new Romonet_Requests_List_Table();
	$requests_table->prepare_items();
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline">درخواست‌های ثبت شده پروژه‌ها</h1>
		<hr class="wp-header-end">
		
		<!-- Optional: A small settings/info box -->
		<div class="notice notice-info inline" style="margin: 15px 0;">
			<p>در این بخش می‌توانید تمامی درخواست‌های ثبت شده از سمت فرم سایت را مشاهده کنید.</p>
		</div>

		<!-- Render the WP_List_Table -->
		<form id="romonet-requests-filter" method="get">
			<!-- Keep the current page slug in the URL when sorting/paginating -->
			<input type="hidden" name="page" value="<?php echo isset($_REQUEST['page']) ? esc_attr($_REQUEST['page']) : ''; ?>" />
			<?php 
				$requests_table->display(); 
			?>
		</form>
	</div>
	<?php
}
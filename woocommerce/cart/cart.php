<?php
/**
 * Cart Page
 *
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' );
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8 text-right woocommerce">
	<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-stone-200 dark:border-slate-800 pb-4">
		<div>
			<h1 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">سبد خرید شما</h1>
			<p class="text-xs text-slate-500 mt-1">
				شامل <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?> کالا
			</p>
		</div>
		<a href="<?php echo esc_url( wc_get_cart_url() . '?empty-cart' ); ?>" class="text-xs text-rose-500 hover:underline flex items-center gap-1 font-semibold self-start sm:self-auto">
			<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><path d="M10 11v6m4-6v6"/></svg>
			<span>خالی کردن سبد خرید</span>
		</a>
	</div>

	<form class="woocommerce-cart-form grid grid-cols-1 lg:grid-cols-12 gap-8 items-start" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<div class="lg:col-span-8 space-y-4">
			<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
				$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="p-5 sm:p-6 rounded-3xl bg-white dark:bg-slate-900 border border-stone-200 dark:border-slate-800 shadow-sm hover:border-teal-200 dark:hover:border-teal-900 transition-all flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
						<div class="flex items-start gap-4 flex-1">
							<a href="<?php echo esc_url( $product_permalink ); ?>" class="w-24 h-24 rounded-2xl bg-stone-50 dark:bg-slate-800 p-2 shrink-0 border border-stone-200 dark:border-slate-700 overflow-hidden flex items-center justify-center">
								<?php echo $_product->get_image( 'woocommerce_thumbnail', array( 'class' => 'w-full h-full object-contain mix-blend-multiply dark:mix-blend-normal hover:scale-105 transition-transform' ) ); ?>
							</a>
							<div class="space-y-1.5 flex-1">
								<a href="<?php echo esc_url( $product_permalink ); ?>" class="font-bold text-sm sm:text-base text-slate-900 dark:text-white hover:text-teal-600 transition-colors">
									<?php echo wp_kses_post( $_product->get_name() ); ?>
								</a>
								<div class="flex flex-wrap items-center gap-2 pt-1 text-xs text-slate-600 dark:text-slate-300">
									<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
								</div>
							</div>
						</div>

						<div class="flex sm:flex-col items-center sm:items-end justify-between w-full sm:w-auto gap-4 pt-4 sm:pt-0 border-t sm:border-t-0 border-stone-100 dark:border-slate-800">
							<div class="text-sm sm:text-base font-black text-slate-900 dark:text-white">
								<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
							</div>
							<div class="flex items-center gap-3">
								<div class="flex items-center gap-1 bg-stone-100 dark:bg-slate-800 p-1 rounded-xl border border-stone-200 dark:border-slate-700 custom-qty">
									<button type="button" class="p-1 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700 minus" aria-label="کاهش تعداد">−</button>
									<?php
									echo woocommerce_quantity_input(
										array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->get_max_purchase_quantity(),
											'min_value'   => '0',
											'classes'     => array( 'qty', 'w-8', 'text-center', 'font-bold', 'text-xs', 'bg-transparent', 'border-none', 'p-0', 'focus:ring-0', 'text-slate-900', 'dark:text-white' ),
										),
										$_product,
										false
									);
									?>
									<button type="button" class="p-1 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-700 plus" aria-label="افزایش تعداد">+</button>
								</div>
								<?php
								echo apply_filters(
									'woocommerce_cart_item_remove_link',
									sprintf( '<a href="%s" class="p-2 rounded-xl text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/60 transition-colors" aria-label="%s">×</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__( 'Remove this item', 'woocommerce' ) ),
									$cart_item_key
								);
								?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>

			<div class="hidden">
				<button type="submit" class="button update-cart-btn" name="update_cart"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>
		</div>

		<div class="lg:col-span-4 space-y-6">
			<?php if ( wc_coupons_enabled() ) : ?>
				<div class="p-5 rounded-3xl bg-white dark:bg-slate-900 border border-stone-200 dark:border-slate-800 space-y-3">
					<div class="flex items-center gap-2 font-bold text-xs text-slate-900 dark:text-white">
						<span>کد تخفیف یا هدیه:</span>
					</div>
					<div class="flex gap-2">
						<input type="text" name="coupon_code" class="input-text min-w-0 flex-1 bg-stone-100 dark:bg-slate-800 text-slate-900 dark:text-slate-100 px-3 py-2 rounded-xl text-xs border border-stone-200 dark:border-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 font-mono" id="coupon_code" placeholder="کد تخفیف" />
						<button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 dark:bg-slate-700 text-white rounded-xl text-xs font-bold" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">اعمال</button>
					</div>
				</div>
			<?php endif; ?>

			<div class="p-6 rounded-3xl bg-white dark:bg-slate-900 border border-stone-200 dark:border-slate-800 shadow-sm space-y-5">
				<h3 class="font-black text-sm text-slate-900 dark:text-white border-b border-stone-100 dark:border-slate-800 pb-3">خلاصه فاکتور سفارش</h3>
				<?php do_action( 'woocommerce_cart_collaterals' ); ?>
			</div>
		</div>
	</form>
</div>

<script>
document.querySelectorAll('.custom-qty').forEach(function (wrapper) {
	const input = wrapper.querySelector('input.qty');
	const updateButton = document.querySelector('.update-cart-btn');
	if (!input || !updateButton) return;
	wrapper.querySelector('.minus').addEventListener('click', function () {
		input.value = Math.max(parseInt(input.value, 10) - 1, parseInt(input.min || 0, 10));
		updateButton.click();
	});
	wrapper.querySelector('.plus').addEventListener('click', function () {
		const max = parseInt(input.max || 999999, 10);
		input.value = Math.min(parseInt(input.value, 10) + 1, max);
		updateButton.click();
	});
});
</script>

<?php do_action( 'woocommerce_after_cart' ); ?>

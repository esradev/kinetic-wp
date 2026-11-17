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

<style>
	.romonet-cart-item dl.variation {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		gap: 0.375rem 0.625rem;
		margin: 0;
	}
	.romonet-cart-item dl.variation dt {
		font-weight: 600;
		color: #737373;
		margin: 0;
	}
	.dark .romonet-cart-item dl.variation dt {
		color: #a3a3a3;
	}
	.romonet-cart-item dl.variation dd {
		margin: 0;
		font-weight: 600;
		color: #262626;
		background-color: rgba(163, 163, 163, 0.14);
		padding: 0.125rem 0.5rem;
		border-radius: 0.375rem;
	}
	.dark .romonet-cart-item dl.variation dd {
		color: #f5f5f5;
		background-color: rgba(255, 255, 255, 0.08);
	}
	.romonet-cart-item dl.variation dd p {
		margin: 0;
	}
	.custom-qty input.qty::-webkit-outer-spin-button,
	.custom-qty input.qty::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
	.custom-qty input.qty[type="number"] {
		-moz-appearance: textfield;
	}
	.woocommerce-cart-form.is-updating .romonet-cart-ledger {
		opacity: 0.65;
		pointer-events: none;
	}
	@media (prefers-reduced-motion: reduce) {
		.romonet-cart-transition {
			transition: none !important;
		}
	}
</style>

<div class="woocommerce woocommerce-cart-page max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 space-y-8 text-right" dir="rtl">

	<!-- Editorial Header & Checkout Progress -->
	<header class="rounded-2xl bg-white dark:bg-neutral-900/80 border border-stone-200 dark:border-white/10 p-5 sm:p-7 shadow-sm">
		<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
			<div class="space-y-2.5">
				<div class="flex flex-wrap items-center gap-2.5">
					<span class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-700 dark:text-amber-400">
						<span class="w-1.5 h-1.5 rounded-full bg-amber-500" aria-hidden="true"></span>
						<span>مرور سفارش</span>
					</span>
					<span class="text-stone-300 dark:text-white/15" aria-hidden="true">/</span>
					<span class="inline-flex items-center px-2.5 py-0.5 rounded-md bg-stone-100 dark:bg-white/[0.05] border border-stone-200/80 dark:border-white/10 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
						<?php echo esc_html( number_format_i18n( WC()->cart->get_cart_contents_count() ) ); ?> کالا در سبد
					</span>
				</div>
				<h1 class="text-2xl sm:text-3xl font-black tracking-tight text-neutral-900 dark:text-white">سبد خرید شما</h1>
			</div>

			<!-- Progress Steps + Actions -->
			<div class="flex flex-col sm:flex-row sm:items-center gap-4 lg:gap-6">
				<nav aria-label="مراحل خرید" class="flex items-center gap-2 text-xs">
					<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-amber-500/15 border border-amber-500/35 font-bold text-amber-800 dark:text-amber-300">
						<span class="w-1.5 h-1.5 rounded-full bg-amber-500 dark:bg-amber-400" aria-hidden="true"></span>
						<span>۱. سبد خرید</span>
					</span>
					<svg class="w-3.5 h-3.5 text-stone-400 dark:text-neutral-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6" />
					</svg>
					<span class="px-2 py-1 text-neutral-500 dark:text-neutral-400 font-medium">۲. تسویه حساب</span>
					<svg class="hidden sm:block w-3.5 h-3.5 text-stone-400 dark:text-neutral-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6" />
					</svg>
					<span class="hidden sm:inline px-2 py-1 text-neutral-500 dark:text-neutral-400 font-medium">۳. ثبت نهایی</span>
				</nav>

				<div class="flex items-center justify-between sm:justify-start gap-2.5 pt-3 sm:pt-0 border-t sm:border-t-0 sm:border-r border-stone-200 dark:border-white/10 sm:pr-5">
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-stone-200 dark:border-white/10 bg-stone-50 dark:bg-white/[0.03] text-xs font-semibold text-neutral-700 dark:text-neutral-200 hover:border-amber-500/50 hover:text-amber-700 dark:hover:text-amber-300 transition-colors">
						<span>ادامه خرید</span>
					</a>
					<a href="<?php echo esc_url( kinetic_wp_cart_url() . '?empty-cart' ); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-500/10 transition-colors">
						<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M3 6h18"/>
							<path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
							<path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
						</svg>
						<span>خالی کردن سبد</span>
					</a>
				</div>
			</div>
		</div>
	</header>

	<form class="woocommerce-cart-form grid grid-cols-1 lg:grid-cols-12 gap-8 items-start" action="<?php echo esc_url( kinetic_wp_cart_url() ); ?>" method="post">

		<!-- Order Items Ledger -->
		<div class="lg:col-span-8 romonet-cart-ledger romonet-cart-transition transition-opacity">
			<div class="rounded-2xl bg-white dark:bg-neutral-900/75 border border-stone-200 dark:border-white/10 overflow-hidden shadow-sm">
				<!-- Ledger Header Bar -->
				<div class="cart-box-heading px-5 sm:px-6 py-3.5 bg-stone-50/90 dark:bg-neutral-950/60 border-b border-stone-200 dark:border-white/10 flex items-center justify-between text-xs font-bold text-neutral-600 dark:text-neutral-300">
					<span>اقلام سفارش</span>
					<span class="hidden sm:inline">تعداد و جمع ردیف</span>
				</div>

				<div class="divide-y divide-stone-200/80 dark:divide-white/10">
					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
						$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<div class="woocommerce-cart-item romonet-cart-item romonet-cart-transition p-5 sm:p-6 hover:bg-stone-50/70 dark:hover:bg-white/[0.02] transition-colors flex flex-col sm:flex-row items-start sm:items-center justify-between gap-5 sm:gap-6">
								<!-- Product Info & Thumbnail -->
								<div class="flex items-start gap-4 flex-1 min-w-0 w-full">
									<a href="<?php echo esc_url( $product_permalink ); ?>" class="w-20 h-20 sm:w-24 sm:h-24 rounded-xl bg-stone-50 dark:bg-neutral-950 p-2 shrink-0 border border-stone-200 dark:border-white/10 overflow-hidden flex items-center justify-center group">
										<?php echo $_product->get_image( 'woocommerce_thumbnail', array( 'class' => 'w-full h-full object-contain mix-blend-multiply dark:mix-blend-normal romonet-cart-transition group-hover:scale-105 transition-transform' ) ); ?>
									</a>

									<div class="space-y-2 flex-1 min-w-0">
										<a href="<?php echo esc_url( $product_permalink ); ?>" class="block font-bold text-sm sm:text-base text-neutral-900 dark:text-white hover:text-amber-700 dark:hover:text-amber-300 transition-colors leading-snug">
											<?php echo wp_kses_post( $_product->get_name() ); ?>
										</a>

										<?php
										$item_data = wc_get_formatted_cart_item_data( $cart_item );
										if ( ! empty( $item_data ) ) :
											?>
											<div class="text-xs text-neutral-600 dark:text-neutral-300">
												<?php echo $item_data; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											</div>
										<?php endif; ?>

										<div class="text-xs text-neutral-500 dark:text-neutral-400 flex items-center gap-1.5">
											<span>قیمت واحد:</span>
											<span class="font-semibold text-neutral-700 dark:text-neutral-300 tabular-nums">
												<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											</span>
										</div>
									</div>
								</div>

								<!-- Quantity Controls, Row Subtotal & Remove -->
								<div class="flex sm:flex-col items-center sm:items-end justify-between w-full sm:w-auto gap-4 pt-4 sm:pt-0 border-t sm:border-t-0 border-stone-100 dark:border-white/10 shrink-0">
									<div class="text-right sm:text-left">
										<span class="block text-[10px] text-neutral-500 dark:text-neutral-400 sm:hidden">جمع ردیف</span>
										<div class="text-base sm:text-lg font-black text-neutral-900 dark:text-white tabular-nums">
											<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</div>
									</div>

									<div class="flex items-center gap-2.5">
										<div class="inline-flex items-center bg-stone-100 dark:bg-neutral-950 rounded-xl border border-stone-200 dark:border-white/15 p-0.5 custom-qty">
											<button type="button" class="w-8 h-8 flex items-center justify-center rounded-lg text-neutral-600 dark:text-neutral-300 hover:bg-white dark:hover:bg-white/10 hover:text-neutral-900 dark:hover:text-white transition-colors font-bold text-sm minus" aria-label="کاهش تعداد">−</button>
											<?php
											echo woocommerce_quantity_input(
												array(
													'input_name'  => "cart[{$cart_item_key}][qty]",
													'input_value' => $cart_item['quantity'],
													'max_value'   => $_product->get_max_purchase_quantity(),
													'min_value'   => '0',
													'classes'     => array( 'qty', 'w-9', 'h-8', 'text-center', 'font-bold', 'text-xs', 'bg-transparent', 'border-none', 'p-0', 'focus:ring-0', 'text-neutral-900', 'dark:text-white' ),
												),
												$_product,
												false
											);
											?>
											<button type="button" class="w-8 h-8 flex items-center justify-center rounded-lg text-neutral-600 dark:text-neutral-300 hover:bg-white dark:hover:bg-white/10 hover:text-neutral-900 dark:hover:text-white transition-colors font-bold text-sm plus" aria-label="افزایش تعداد">+</button>
										</div>

										<?php
										$remove_icon = '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>';
										echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											'woocommerce_cart_item_remove_link',
											sprintf(
												'<a href="%s" class="w-9 h-9 inline-flex items-center justify-center rounded-xl border border-transparent text-neutral-400 hover:text-rose-600 dark:hover:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-500/10 hover:border-rose-200 dark:hover:border-rose-500/30 transition-colors" aria-label="%s" title="%s">%s</a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												esc_attr__( 'Remove this item', 'woocommerce' ),
												esc_attr__( 'Remove this item', 'woocommerce' ),
												$remove_icon
											),
											$cart_item_key
										);
										?>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="hidden">
				<button type="submit" class="button update-cart-btn" name="update_cart"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>
		</div>

		<!-- Sticky Summary & Coupon Sidebar -->
		<aside class="lg:col-span-4 lg:sticky lg:top-8 space-y-5">
			<!-- Coupon Card (Placed ABOVE totals so users apply discount before checkout) -->
			<?php if ( wc_coupons_enabled() ) : ?>
				<div class="woocommerce-cart-coupon p-5 rounded-2xl bg-white dark:bg-neutral-900/75 border border-stone-200 dark:border-white/10 space-y-3 shadow-sm">
					<label for="coupon_code" class="flex items-center gap-2 font-bold text-xs text-neutral-800 dark:text-neutral-200">
						<svg class="w-4 h-4 text-amber-600 dark:text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/>
							<path d="M13 5v2"/><path d="M13 17v2"/><path d="M13 11v2"/>
						</svg>
						<span>کد تخفیف دارید؟</span>
					</label>
					<div class="flex gap-2">
						<input
							type="text"
							name="coupon_code"
							id="coupon_code"
							dir="ltr"
							placeholder="CODE"
							class="input-text min-w-0 flex-1 bg-stone-50 dark:bg-neutral-950/80 text-neutral-900 dark:text-white px-3.5 py-2.5 rounded-xl text-xs border border-stone-200 dark:border-white/15 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 font-mono uppercase text-left"
						/>
						<button type="submit" class="px-4 py-2.5 bg-neutral-900 hover:bg-neutral-800 dark:bg-white/10 dark:hover:bg-white/15 text-white border border-transparent dark:border-white/10 rounded-xl text-xs font-bold transition-colors shrink-0" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">
							اعمال
						</button>
					</div>
				</div>
			<?php endif; ?>

			<!-- Invoice Summary Card -->
			<div class="woocommerce-cart-summary rounded-2xl bg-white dark:bg-neutral-900/80 border border-stone-200 dark:border-white/10 border-t-2 border-t-amber-500 shadow-sm overflow-hidden">
				<div class="cart-box-heading px-6 py-4 bg-stone-50/80 dark:bg-neutral-950/60 border-b border-stone-200 dark:border-white/10 flex items-center justify-between">
					<h2 class="font-black text-sm text-neutral-900 dark:text-white flex items-center gap-2">
						<svg class="w-4 h-4 text-amber-600 dark:text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/>
							<path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/>
							<path d="M12 17.5v-11"/>
						</svg>
						<span>خلاصه فاکتور سفارش</span>
					</h2>
				</div>

				<div class="p-6">
					<?php do_action( 'woocommerce_cart_collaterals' ); ?>

					<div class="mt-4 pt-4 border-t border-stone-200/80 dark:border-white/10 flex items-center gap-2 text-[11px] text-neutral-500 dark:text-neutral-400">
						<svg class="w-4 h-4 text-amber-600 dark:text-amber-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
						</svg>
						<span>پرداخت امن از طریق درگاه بانکی و ثبت آنی سفارش</span>
					</div>
				</div>
			</div>
		</aside>
	</form>
</div>

<script>
(function () {
	const cartForm = document.querySelector('.woocommerce-cart-form');
	const updateButton = document.querySelector('.update-cart-btn');
	if (!cartForm || !updateButton) return;

	document.querySelectorAll('.custom-qty').forEach(function (wrapper) {
		const input = wrapper.querySelector('input.qty');
		const minus = wrapper.querySelector('.minus');
		const plus = wrapper.querySelector('.plus');
		if (!input || !minus || !plus) return;

		minus.addEventListener('click', function () {
			const current = parseInt(input.value, 10) || 0;
			const min = parseInt(input.min || '0', 10);
			input.value = Math.max(current - 1, min);
			cartForm.classList.add('is-updating');
			updateButton.click();
		});

		plus.addEventListener('click', function () {
			const current = parseInt(input.value, 10) || 0;
			const max = input.max ? parseInt(input.max, 10) : 999999;
			input.value = Math.min(current + 1, max);
			cartForm.classList.add('is-updating');
			updateButton.click();
		});
	});
})();
</script>

<?php do_action( 'woocommerce_after_cart' ); ?>
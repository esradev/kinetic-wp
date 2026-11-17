<?php
/**
 * Empty cart page
 *
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_cart_is_empty' );
?>

<style>
	.romonet-empty-grid {
		background-image:
			linear-gradient(to left, rgba(163, 163, 163, 0.12) 1px, transparent 1px),
			linear-gradient(to bottom, rgba(163, 163, 163, 0.12) 1px, transparent 1px);
		background-size: 28px 28px;
	}
	@media (prefers-reduced-motion: reduce) {
		.romonet-motion-safe {
			transition: none !important;
			transform: none !important;
		}
	}
</style>

<div class="woocommerce woocommerce-cart-page max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 text-right" dir="rtl">
	<div class="rounded-2xl bg-white dark:bg-neutral-900/80 border border-stone-200 dark:border-white/10 overflow-hidden shadow-sm">
		<!-- Top Architectural Status Bar -->
		<div class="px-6 sm:px-8 py-3.5 bg-stone-50/90 dark:bg-neutral-950/60 border-b border-stone-200 dark:border-white/10 flex items-center justify-between gap-4">
			<div class="flex items-center gap-2.5">
				<span class="w-2 h-2 rounded-full bg-amber-500 dark:bg-amber-400" aria-hidden="true"></span>
				<span class="text-xs font-bold text-neutral-700 dark:text-neutral-200">سبد خرید</span>
			</div>
			<span class="text-xs font-mono text-neutral-500 dark:text-neutral-400">۰ کالا</span>
		</div>

		<!-- Asymmetric Editorial Canvas -->
		<div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
			<!-- Typography-led Primary Column -->
			<div class="lg:col-span-7 p-7 sm:p-10 lg:p-12 flex flex-col justify-center">
				<span class="inline-flex items-center self-start px-3 py-1 rounded-lg bg-amber-500/10 border border-amber-500/25 text-xs font-semibold text-amber-800 dark:text-amber-300">
					آماده ثبت سفارش جدید
				</span>

				<h1 class="mt-5 text-2xl sm:text-3xl font-black tracking-tight text-neutral-900 dark:text-white leading-snug">
					سبد خرید شما در حال حاضر خالی است
				</h1>

				<p class="mt-3 text-sm sm:text-base text-neutral-600 dark:text-neutral-400 leading-relaxed max-w-xl">
					هنوز محصولی به سبد خرید اضافه نشده است. می‌توانید محصولات و راهکارهای موجود در فروشگاه را بررسی کرده و گزینه مورد نظر خود را انتخاب کنید.
				</p>

				<div class="mt-8 flex flex-wrap items-center gap-3">
					<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="romonet-motion-safe group inline-flex min-h-12 items-center gap-2.5 px-7 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-neutral-950 font-extrabold text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900">
						<span>مشاهده فروشگاه</span>
						<svg class="w-4 h-4 romonet-motion-safe group-hover:-translate-x-0.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M19 12H5" />
							<path d="m12 19-7-7 7-7" />
						</svg>
					</a>
				</div>
			</div>

			<!-- Technical Schematic Visual Column -->
			<div class="lg:col-span-5 romonet-empty-grid bg-stone-50/70 dark:bg-neutral-950/40 border-t lg:border-t-0 lg:border-r border-stone-200 dark:border-white/10 p-8 sm:p-10 flex items-center justify-center min-h-[240px]" aria-hidden="true">
				<div class="relative w-full max-w-[260px]">
					<div class="rounded-2xl bg-white dark:bg-neutral-900 border border-stone-200 dark:border-white/10 p-6 shadow-sm">
						<div class="flex items-center justify-between border-b border-stone-100 dark:border-white/10 pb-3 mb-5">
							<span class="text-[11px] font-mono text-neutral-400 dark:text-neutral-500">CART // 00</span>
							<span class="w-2 h-2 rounded-full bg-amber-400/60"></span>
						</div>

						<div class="w-16 h-16 mx-auto rounded-xl bg-amber-500/10 border border-amber-500/25 flex items-center justify-center text-amber-600 dark:text-amber-400">
							<svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
								<path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
								<path d="M3 6h18" />
								<path d="M16 10a4 4 0 0 1-8 0" />
							</svg>
						</div>

						<div class="mt-5 space-y-2">
							<div class="h-2 rounded-full bg-stone-200/80 dark:bg-white/15 w-3/4 mx-auto"></div>
							<div class="h-2 rounded-full bg-stone-100 dark:bg-white/10 w-1/2 mx-auto"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Factual Purchase Flow Footer -->
		<div class="px-6 sm:px-8 py-4 bg-stone-50/60 dark:bg-neutral-950/40 border-t border-stone-200 dark:border-white/10 grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs text-neutral-600 dark:text-neutral-400">
			<div class="flex items-center gap-2.5">
				<span class="w-6 h-6 rounded-lg bg-white dark:bg-neutral-900 border border-stone-200 dark:border-white/10 flex items-center justify-center font-mono text-[11px] font-bold text-amber-600 dark:text-amber-400 shrink-0">۰۱</span>
				<span>انتخاب محصول از فروشگاه</span>
			</div>
			<div class="flex items-center gap-2.5">
				<span class="w-6 h-6 rounded-lg bg-white dark:bg-neutral-900 border border-stone-200 dark:border-white/10 flex items-center justify-center font-mono text-[11px] font-bold text-neutral-500 dark:text-neutral-400 shrink-0">۰۲</span>
				<span>بررسی جزئیات در سبد خرید</span>
			</div>
			<div class="flex items-center gap-2.5">
				<span class="w-6 h-6 rounded-lg bg-white dark:bg-neutral-900 border border-stone-200 dark:border-white/10 flex items-center justify-center font-mono text-[11px] font-bold text-neutral-500 dark:text-neutral-400 shrink-0">۰۳</span>
				<span>تکمیل اطلاعات و ثبت سفارش</span>
			</div>
		</div>
	</div>
</div>
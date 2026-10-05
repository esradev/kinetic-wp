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

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center woocommerce">
	<div class="max-w-lg mx-auto p-8 rounded-3xl bg-white dark:bg-slate-900 border border-stone-200 dark:border-slate-800 shadow-sm">
		<div class="w-20 h-20 mx-auto rounded-3xl bg-stone-100 dark:bg-slate-800 flex items-center justify-center text-teal-600">
			<svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
				<path d="M3 6h18" />
				<path d="M16 10a4 4 0 0 1-8 0" />
			</svg>
		</div>
		<h1 class="mt-6 text-2xl font-black text-slate-900 dark:text-white">سبد خرید شما خالی است</h1>
		<p class="mt-2 text-sm text-slate-500">محصول موردنظر خود را از فروشگاه انتخاب کنید.</p>
		<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="inline-flex mt-6 px-6 py-3 rounded-xl bg-teal-600 hover:bg-teal-500 text-white font-bold text-sm transition-colors">
			مشاهده فروشگاه
		</a>
	</div>
</div>

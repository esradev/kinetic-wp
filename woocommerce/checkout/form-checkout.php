<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is required and the customer is not logged in, show the login message.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8 text-right">
	<form name="checkout" method="post" class="checkout woocommerce-checkout grid grid-cols-1 lg:grid-cols-12 gap-8 items-start" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

		<div class="lg:col-span-8 space-y-6">
			<?php if ( $checkout->get_checkout_fields() ) : ?>
				<div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-stone-200 dark:border-slate-800 space-y-4" id="customer_details">
					<div class="flex items-center gap-2 font-bold text-sm text-slate-900 dark:text-white border-b border-stone-100 dark:border-slate-800 pb-3 mb-4">
						<svg class="w-5 h-5 text-teal-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
							<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
							<circle cx="12" cy="10" r="3" />
						</svg>
						<span>اطلاعات خریدار و آدرس تحویل</span>
					</div>

					<?php do_action( 'woocommerce_checkout_billing' ); ?>
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="lg:col-span-4 space-y-5">
			<div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-stone-200 dark:border-slate-800 space-y-4 shadow-sm sticky top-24">
				<h3 class="font-bold text-sm text-slate-900 dark:text-white border-b border-stone-100 dark:border-slate-800 pb-3">
					بازبینی و پرداخت نهایی
				</h3>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
			</div>
		</div>
	</form>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

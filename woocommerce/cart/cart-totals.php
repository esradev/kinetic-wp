<?php
/**
 * Cart totals
 *
 * @package WooCommerce\Templates
 * @version 2.3.0
 */

defined( 'ABSPATH' ) || exit;
?>

<style>
	.romonet-cart-totals table.shop_table {
		width: 100%;
		border-collapse: separate;
		border-spacing: 0;
		margin: 0;
		border: 0;
		background: transparent;
	}
	.romonet-cart-totals table.shop_table tr th,
	.romonet-cart-totals table.shop_table tr td {
		padding: 0.75rem 0;
		border: 0;
		border-bottom: 1px solid rgba(163, 163, 163, 0.22);
		background: transparent !important;
		vertical-align: middle;
	}
	.dark .romonet-cart-totals table.shop_table tr th,
	.dark .romonet-cart-totals table.shop_table tr td {
		border-bottom-color: rgba(255, 255, 255, 0.1);
	}
	.romonet-cart-totals table.shop_table tr th {
		text-align: right;
		font-size: 0.8125rem;
		font-weight: 500;
		color: #737373;
		width: 44%;
	}
	.dark .romonet-cart-totals table.shop_table tr th {
		color: #a3a3a3;
	}
	.romonet-cart-totals table.shop_table tr td {
		text-align: left;
		font-size: 0.875rem;
		font-weight: 700;
		color: #171717;
		font-variant-numeric: tabular-nums;
	}
	.dark .romonet-cart-totals table.shop_table tr td {
		color: #fafafa;
	}
	.romonet-cart-totals table.shop_table tr.cart-discount th,
	.romonet-cart-totals table.shop_table tr.cart-discount td {
		color: #b45309;
	}
	.dark .romonet-cart-totals table.shop_table tr.cart-discount th,
	.dark .romonet-cart-totals table.shop_table tr.cart-discount td {
		color: #fbbf24;
	}
	.romonet-cart-totals table.shop_table tr.cart-discount .woocommerce-remove-coupon {
		display: inline-block;
		margin-right: 0.375rem;
		font-size: 0.75rem;
		font-weight: 600;
		color: #e11d48;
		text-decoration: underline;
	}
	.dark .romonet-cart-totals table.shop_table tr.cart-discount .woocommerce-remove-coupon {
		color: #fb7185;
	}
	.romonet-cart-totals table.shop_table tr.shipping td {
		text-align: right;
		font-weight: 500;
	}
	.romonet-cart-totals table.shop_table ul#shipping_method {
		list-style: none;
		margin: 0;
		padding: 0;
		display: flex;
		flex-direction: column;
		gap: 0.5rem;
	}
	.romonet-cart-totals table.shop_table ul#shipping_method li {
		display: flex;
		align-items: center;
		gap: 0.5rem;
		font-size: 0.8125rem;
	}
	.romonet-cart-totals table.shop_table ul#shipping_method input[type="radio"] {
		accent-color: #f59e0b;
	}
	.romonet-cart-totals table.shop_table tr.order-total th,
	.romonet-cart-totals table.shop_table tr.order-total td {
		border-bottom: 0;
		padding-top: 1.125rem;
		padding-bottom: 0.25rem;
	}
	.romonet-cart-totals table.shop_table tr.order-total th {
		font-size: 0.9375rem;
		font-weight: 800;
		color: #171717;
	}
	.dark .romonet-cart-totals table.shop_table tr.order-total th {
		color: #ffffff;
	}
	.romonet-cart-totals table.shop_table tr.order-total td {
		font-size: 1.125rem;
		font-weight: 900;
		color: #b45309;
	}
	.dark .romonet-cart-totals table.shop_table tr.order-total td {
		color: #fbbf24;
	}
	.romonet-cart-totals .wc-proceed-to-checkout {
		margin-top: 1.25rem;
		padding: 0;
	}
	.romonet-cart-totals .wc-proceed-to-checkout a.checkout-button {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 100%;
		min-height: 3rem;
		padding: 0.875rem 1.25rem;
		border-radius: 0.75rem;
		background-color: #f59e0b;
		color: #09090b !important;
		font-size: 0.875rem;
		font-weight: 800;
		text-align: center;
		text-decoration: none;
		border: 1px solid transparent;
		transition: background-color 0.2s ease, transform 0.15s ease;
	}
	.romonet-cart-totals .wc-proceed-to-checkout a.checkout-button:hover {
		background-color: #fbbf24;
	}
	.romonet-cart-totals .wc-proceed-to-checkout a.checkout-button:focus-visible {
		outline: 2px solid #f59e0b;
		outline-offset: 2px;
	}
	@media (max-width: 768px) {
		.romonet-cart-totals table.shop_table_responsive tr {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 1rem;
			border-bottom: 1px solid rgba(163, 163, 163, 0.22);
		}
		.dark .romonet-cart-totals table.shop_table_responsive tr {
			border-bottom-color: rgba(255, 255, 255, 0.1);
		}
		.romonet-cart-totals table.shop_table_responsive tr.shipping {
			flex-direction: column;
			align-items: stretch;
			gap: 0.375rem;
			padding: 0.75rem 0;
		}
		.romonet-cart-totals table.shop_table_responsive tr.shipping th,
		.romonet-cart-totals table.shop_table_responsive tr.shipping td {
			padding: 0;
			width: 100%;
		}
		.romonet-cart-totals table.shop_table_responsive tr.order-total {
			border-bottom: 0;
		}
		.romonet-cart-totals table.shop_table_responsive tr th,
		.romonet-cart-totals table.shop_table_responsive tr td {
			display: block;
			width: auto;
			border-bottom: 0;
		}
		.romonet-cart-totals table.shop_table_responsive tr td::before {
			content: none !important;
		}
	}
	@media (prefers-reduced-motion: reduce) {
		.romonet-cart-totals .wc-proceed-to-checkout a.checkout-button {
			transition: none;
		}
	}
</style>

<div class="cart-collaterals">
	<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
	<div class="cart_totals woocommerce-cart-totals romonet-cart-totals">
		<?php do_action( 'woocommerce_before_cart_totals' ); ?>

		<h3 class="sr-only"><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h3>

		<table cellspacing="0" class="shop_table shop_table_responsive">
			<tr class="cart-subtotal">
				<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>

			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
					<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
				<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>
				<?php wc_cart_totals_shipping_html(); ?>
				<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
			<?php elseif ( WC()->cart->needs_shipping() && 'no' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
				<tr class="shipping">
					<th><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
					<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php esc_html_e( 'Shipping costs will be calculated during checkout.', 'woocommerce' ); ?></td>
				</tr>
			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<tr class="fee">
					<th><?php echo esc_html( $fee->name ); ?></th>
					<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
				</tr>
			<?php endforeach; ?>

			<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
				<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
						<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
							<th><?php echo esc_html( $tax->label ); ?></th>
							<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr class="tax-total">
						<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
						<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
					</tr>
				<?php endif; ?>
			<?php endif; ?>

			<tr class="order-total">
				<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
			</tr>
		</table>

		<div class="wc-proceed-to-checkout">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>

		<?php do_action( 'woocommerce_after_cart_totals' ); ?>
	</div>
</div>
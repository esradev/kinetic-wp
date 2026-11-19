<?php
/**
 * The header for our theme
 *
 * @package Romonet_WPStorm
 */

// دریافت اطلاعات واقعی سبد خرید ووکامرس
$wc_cart_items = array();
if ( function_exists( 'WC' ) && ! is_null( WC()->cart ) ) {
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
			$variation_data  = wc_get_formatted_cart_item_data( $cart_item, true );
			$wc_cart_items[] = array(
				'id'         => $cart_item_key,
				'product_id' => $cart_item['product_id'],
				'itemType'   => 'product',
				'title'      => $_product->get_name(),
				'subtitle'   => $variation_data ? wp_strip_all_tags( $variation_data ) : '',
				'price'      => (float) $_product->get_price(),
				'quantity'   => $cart_item['quantity'],
			);
		}
	}
}
$cart_json = wp_json_encode( $wc_cart_items );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl" class="dark">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<script>
		(() => {
			try {
				const theme = localStorage.getItem('romonet_theme') === 'light' ? 'light' : 'dark';
				document.documentElement.classList.toggle('dark', theme === 'dark');
				document.documentElement.classList.toggle('light', theme === 'light');
			} catch (error) {
				document.documentElement.classList.add('dark');
			}
		})();
	</script>

	<!-- پاس دادن اطلاعات PHP به اسکریپت‌های Build شده Alpine -->
	<script>
		window.romonetHeaderData = {
			shopUrl: '<?php echo esc_url( home_url( '/shop' ) ); ?>',
			siteDesignUrl: '<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>',
			cart: <?php echo empty( $cart_json ) ? '[]' : $cart_json; ?>
		};
	</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-2FPNH2YPW8"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-2FPNH2YPW8');
	</script>

	<?php wp_head(); ?>

	<style>
		/* Theme-aware Header, Drawer, Footer & Sticky support */
		:root {
			--rm-chrome-bg: rgba(8, 9, 13, 0.88);
			--rm-dropdown-bg: #11131b;
			--rm-mobile-bg: #0a0c12;
			--rm-footer-bg: #06070a;
			--rm-control-bg: rgba(255, 255, 255, 0.05);
			--rm-control-hover: rgba(255, 255, 255, 0.09);
			--rm-drawer-bg: #0d0f17;
			--rm-drawer-bar: #111420;
			--rm-drawer-item: rgba(255, 255, 255, 0.05);
			--rm-input-surface: rgba(0, 0, 0, 0.4);
			--rm-gold-ink: #08090d;
		}
		html.light {
			--rm-chrome-bg: rgba(238, 242, 248, 0.9);
			--rm-dropdown-bg: #ffffff;
			--rm-mobile-bg: #f8fafc;
			--rm-footer-bg: #e4eaf3;
			--rm-control-bg: rgba(255, 255, 255, 0.78);
			--rm-control-hover: #ffffff;
			--rm-drawer-bg: #f8fafc;
			--rm-drawer-bar: #ffffff;
			--rm-drawer-item: #ffffff;
			--rm-input-surface: #ffffff;
			--rm-gold-ink: #0f172a;
		}
		body {
			background-color: var(--bg-main, #08090d);
			color: var(--text-primary, #f3f4f6);
			overflow-x: clip !important;
		}
		.rm-site-header {
			position: sticky;
			top: 0;
			background-color: var(--rm-chrome-bg);
			border-bottom: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.1));
			backdrop-filter: blur(18px);
			-webkit-backdrop-filter: blur(18px);
		}
		.rm-nav-link {
			color: var(--text-secondary, #d4d4d4);
			transition: color 0.2s ease, background-color 0.2s ease;
		}
		.rm-nav-link:hover {
			color: var(--accent-gold, #fbbf24);
			background-color: var(--rm-control-bg);
		}
		.rm-nav-link.is-active {
			color: var(--accent-gold, #fbbf24);
			background-color: var(--rm-control-bg);
		}
		.rm-header-control {
			background-color: var(--rm-control-bg);
			border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.1));
			color: var(--text-secondary, #d4d4d4);
			transition: border-color 0.2s ease, color 0.2s ease, background-color 0.2s ease;
		}
		.rm-header-control:hover {
			background-color: var(--rm-control-hover);
			border-color: var(--border-glow, rgba(245, 158, 11, 0.4));
			color: var(--accent-gold, #fbbf24);
		}
		.rm-header-cta {
			background-color: var(--accent-gold, #f59e0b);
			color: var(--rm-gold-ink);
			transition: filter 0.2s ease;
		}
		.rm-header-cta:hover {
			filter: brightness(1.08);
		}
		.rm-dropdown-panel {
			background-color: var(--rm-dropdown-bg);
			border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.1));
		}
		.rm-dropdown-trigger[aria-expanded="true"] .rm-chevron {
			transform: rotate(180deg);
		}
		.rm-mobile-drawer {
			background-color: var(--rm-mobile-bg);
			border-left: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.1));
		}
		.rm-site-footer {
			background-color: var(--rm-footer-bg);
			border-top: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.1));
			color: var(--text-secondary, #9ca3af);
		}
		.rm-cart-drawer-panel {
			background-color: var(--rm-drawer-bg);
			border-right: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.1));
		}
		.rm-cart-drawer-bar {
			background-color: var(--rm-drawer-bar);
			border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));
		}
		.rm-cart-item-card {
			background-color: var(--rm-drawer-item);
			border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.1));
		}
		.rm-toast-card {
			background-color: var(--rm-dropdown-bg);
			border: 1px solid var(--border-glow, rgba(245, 158, 11, 0.4));
			color: var(--text-primary, #ffffff);
		}
	</style>
</head>

<body <?php body_class( 'selection:bg-amber-500 selection:text-black antialiased' ); ?>
	xyz-data="romonetHeader()"
	xyz-init="initHeader()"
	@keydown.window.escape="isCartDrawerOpen = false; closeNavigation()">

	<?php wp_body_open(); ?>

	<?php get_template_part( 'template-parts/header/main', 'header' ); ?>
	<?php get_template_part( 'template-parts/header/mobile', 'menu' ); ?>
	<?php get_template_part( 'template-parts/header/cart', 'drawer' ); ?>
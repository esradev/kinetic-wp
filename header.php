<?php
/**
 * The header for our theme
 *
 * @package Romonet_WPStorm
 */

// دریافت اطلاعات واقعی سبد خرید ووکامرس
$wc_cart_items = array();
if (function_exists('WC') && ! is_null(WC()->cart)) {
  foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
      $variation_data = wc_get_formatted_cart_item_data($cart_item, true);
      $wc_cart_items[] = array(
        'id'         => $cart_item_key,
        'product_id' => $cart_item['product_id'],
        'itemType'   => 'product',
        'title'      => $_product->get_name(),
        'subtitle'   => $variation_data ? wp_strip_all_tags($variation_data) : '',
        'price'      => (float) $_product->get_price(), 
        'quantity'   => $cart_item['quantity']
      );
    }
  }
}
$cart_json = wp_json_encode($wc_cart_items);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl" class="dark">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- پاس دادن اطلاعات PHP به اسکریپت‌های Build شده Alpine -->
  <script>
    window.romonetHeaderData = {
      shopUrl: '<?php echo esc_url(home_url('/shop')); ?>',
      siteDesignUrl: '<?php echo esc_url(home_url('/site-design-pricing')); ?>',
      cart: <?php echo empty($cart_json) ? '[]' : $cart_json; ?>
    };
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-[#08090d] text-white selection:bg-amber-500 selection:text-black antialiased'); ?>
  xyz-data="romonetHeader()"
  xyz-init="initHeader()"
  @keydown.window.ctrl.k.prevent="isSearchOpen = !isSearchOpen"
  @keydown.window.cmd.k.prevent="isSearchOpen = !isSearchOpen"
  @keydown.window.escape="isSearchOpen = false; isCartDrawerOpen = false; isMobileMenuOpen = false">
  
  <?php wp_body_open(); ?>

  <?php get_template_part('template-parts/header/notification', 'bar'); ?>
  <?php get_template_part('template-parts/header/main', 'header'); ?>
  <?php get_template_part('template-parts/header/sticky', 'nav'); ?>
  <?php get_template_part('template-parts/header/search', 'modal'); ?>
  <?php get_template_part('template-parts/header/cart', 'drawer'); ?>
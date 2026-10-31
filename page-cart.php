<?php
/**
 * Stable cart page at /cart/.
 */

defined('ABSPATH') || exit;

get_header();
echo do_shortcode('[woocommerce_cart]');
get_footer();

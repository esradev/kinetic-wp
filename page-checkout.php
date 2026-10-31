<?php
/**
 * Stable checkout page at /checkout/.
 */

defined('ABSPATH') || exit;

get_header();
echo do_shortcode('[woocommerce_checkout]');
get_footer();

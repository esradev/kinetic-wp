<?php
/**
 * SMS services landing page SEO support.
 *
 * @package Romonet_WPStorm
 */

defined( 'ABSPATH' ) || exit;

function romonet_sms_services_url( $path ) {
	$page = get_page_by_path( trim( $path, '/' ) );
	return $page ? get_permalink( $page ) : '';
}

function romonet_sms_services_seo() {
	if ( ! is_page_template( 'page-sms-services.php' ) || class_exists( 'WPSEO_Frontend' ) || defined( 'RANK_MATH_VERSION' ) ) {
		return;
	}
	$title = 'پنل پیامکی رومونت | مدیریت پیامک کسب‌وکار';
	$description = 'با پنل پیامکی رومونت، امکانات مدیریت پیامک، سوابق ارسال و اتصال پنل‌های پیامکی را متناسب با نیاز کسب‌وکار بررسی کنید.';
	$url = romonet_sms_services_url( 'sms-services' ) ?: home_url( '/sms-services/' );
	echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'romonet_sms_services_seo', 2 );

function romonet_sms_services_title( $title ) {
	return is_page_template( 'page-sms-services.php' ) ? 'پنل پیامکی رومونت | مدیریت پیامک کسب‌وکار' : $title;
}
add_filter( 'pre_get_document_title', 'romonet_sms_services_title' );

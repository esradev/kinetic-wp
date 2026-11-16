<?php
/**
 * Verified global navigation destinations.
 */

defined( 'ABSPATH' ) || exit;

function romonet_global_navigation() {
	return array(
		'home'         => home_url( '/' ),
		'services'     => home_url( '/#services' ),
		'pricing'      => home_url( '/site-design-pricing/' ),
		'products'     => home_url( '/shop/' ),
		'portfolio'    => home_url( '/#projects' ),
		'articles'     => home_url( '/blog/' ),
		'about'        => home_url( '/about-us/' ),
		'contact'      => home_url( '/contact-us/' ),
		'consultation' => home_url( '/contact-us/' ),
		'service_items' => array(
			array( 'label' => 'طراحی سایت', 'url' => home_url( '/website-design/' ) ),
			array( 'label' => 'پشتیبانی وردپرس', 'url' => home_url( '/maintenance-pricing/' ) ),
			array( 'label' => 'طراحی و توسعه فروشگاه ووکامرس', 'url' => home_url( '/site-design-pricing/' ) ),
			array( 'label' => 'توسعه اختصاصی افزونه و قالب', 'url' => home_url( '/shop/' ) ),
		),
		'pricing_items' => array(
			array( 'label' => 'قیمت طراحی سایت', 'url' => home_url( '/site-design-pricing/' ) ),
			array( 'label' => 'قیمت پشتیبانی سایت', 'url' => home_url( '/maintenance-pricing/' ) ),
			array( 'label' => 'قیمت پنل پیامکی', 'url' => home_url( '/sms-pricing/' ) ),
		),
	);
}

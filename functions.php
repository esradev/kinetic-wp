<?php

// ۱. یکپارچه کردن لود فایل‌های استایل و جاوااسکریپت
function kinetic_wp_load_assets() {
    // لود کردن استایل‌های اصلی تم (فایل بیلد شده Tailwind یا CSS شما)
    wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));

    // پیدا کردن مسیر دقیق فایل JS بیلد شده Alpine
    $js_path = '/assets/js/app.bundle.js';
    $absolute_js_path = get_theme_file_path($js_path);
    
    // گرفتن ورژن داینامیک بر اساس زمان ویرایش فایل (جلوگیری از کش شدن کدهای قدیمی در مرورگر)
    $js_version = file_exists($absolute_js_path) ? filemtime($absolute_js_path) : '1.0.0';

    // انکیو کردن فایل جاوااسکریپت هدر و Alpine (مقدار true یعنی در فوتر لود شود)
    wp_enqueue_script(
        'romonet-app-js', 
        get_theme_file_uri($js_path), 
        array(), 
        $js_version, 
        true 
    );
}
add_action('wp_enqueue_scripts', 'kinetic_wp_load_assets');


// ۲. اضافه کردن type="module" به تگ فایل جاوااسکریپت (دقت کنید این قطعه کد باید مستقل و بیرون توابع دیگر باشد)
add_filter('script_loader_tag', function($tag, $handle, $src) {
    if ('romonet-app-js' === $handle) {
        // Vite فایل‌ها را به صورت ES Module می‌دهد. پس type="module" اجباری است
        return '<script type="module" src="' . esc_url($src) . '"></script>' . "\n";
    }
    return $tag;
}, 10, 3);


// ۳. پشتیبانی‌های تم
function kinetic_wp_add_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(
        array(
            'primary' => 'Primary Menu',
        )
    );

   // افزودن پشتیبانی از ووکامرس
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width'    => 600,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );

    // فعال‌سازی امکانات گالری محصول ووکامرس (زوم، لایت‌باکس، اسلایدر)
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action('after_setup_theme', 'kinetic_wp_add_support');


// ۴. رندر کردن کدهای SVG
function kinetic_wp_render_svg($filename) {
    $file = get_theme_file_path("/assets/images/{$filename}.svg");
    if (file_exists($file)) {
        return file_get_contents($file);
    }
    return '';
}


// ۵. ویرایش فیلدهای صفحه تسویه حساب ووکامرس
function kinetic_wp_remove_checkout_fields($fields) {
    // Keep the compact visible form while still submitting the fields required by WooCommerce and gateways.
    $visible_fields = array(
        'billing_first_name',
        'billing_last_name',
        'billing_phone',
    );
    $hidden_defaults = array(
        'billing_company'   => '',
        'billing_country'   => 'IR',
        'billing_address_1' => 'ثبت دیجیتال',
        'billing_address_2' => '',
        'billing_city'      => 'تهران',
        'billing_state'     => 'THR',
        'billing_postcode'  => '1111111111',
    );

    $billing_fields = array();

    foreach ($visible_fields as $field_key) {
        if (isset($fields['billing'][$field_key])) {
            $billing_fields[$field_key] = $fields['billing'][$field_key];
            $billing_fields[$field_key]['required'] = true;
            $billing_fields[$field_key]['validate'] = array();
        }
    }

    foreach ($hidden_defaults as $field_key => $default) {
        if (isset($fields['billing'][$field_key])) {
            $billing_fields[$field_key] = $fields['billing'][$field_key];
            $billing_fields[$field_key]['type'] = 'hidden';
            $billing_fields[$field_key]['default'] = $default;
            $billing_fields[$field_key]['label'] = '';
            $billing_fields[$field_key]['required'] = false;
            $billing_fields[$field_key]['validate'] = array();
        }
    }

    $fields['billing'] = $billing_fields;

    // Remove shipping fields
    unset($fields['shipping']);
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'kinetic_wp_remove_checkout_fields');

/**
 * Return the stable frontend URL for the cart page.
 */
function kinetic_wp_cart_url() {
    return home_url('/cart/');
}

/** 
 * Return the stable frontend URL for the checkout page.
 */
function kinetic_wp_checkout_url() {
    return home_url('/checkout/');
}

/**
 * Load the store pages even when their WordPress pages have not been assigned
 * in WooCommerce settings yet.
 */
function kinetic_wp_store_page_template($template) {
    if (is_admin()) {
        return $template;
    }

    $request_path = untrailingslashit(wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $home_path = untrailingslashit(wp_parse_url(home_url('/'), PHP_URL_PATH));
    $request_path = preg_replace('#^' . preg_quote($home_path, '#') . '#', '', $request_path);

    if ('/cart' === $request_path) {
        return get_theme_file_path('/page-cart.php');
    }

    if ('/checkout' === $request_path) {
        return get_theme_file_path('/page-checkout.php');
    }

    return $template;
}
add_filter('template_include', 'kinetic_wp_store_page_template');

require_once get_theme_file_path('/includes/site-design-pricing.php');
require_once get_theme_file_path('/includes/site-design-admin-requests.php');
require_once get_theme_file_path('/includes/admin-maintenance.php');
require_once get_theme_file_path('/includes/maintenance-ajax.php');
require_once get_theme_file_path('/includes/sms-pricing-config.php');
require_once get_theme_file_path('/includes/navigation.php');
require_once get_theme_file_path('/includes/search-ajax.php');
require_once get_theme_file_path('/includes/sms-ajax.php');
require_once get_theme_file_path('/includes/admin-sms.php');
require_once get_theme_file_path('/includes/portfolio.php');
require_once get_theme_file_path('/includes/woocommerce-development.php');
require_once get_theme_file_path('/includes/custom-wordpress-development.php');
require_once get_theme_file_path('/includes/sms-services.php');

/**
 * Add focused SEO metadata for the website design pricing landing page.
 */
function kinetic_wp_site_design_pricing_seo() {
    if ( ! is_page_template( 'page-site-design-pricing.php' ) ) {
        return;
    }

    $title       = 'قیمت طراحی سایت در سال ۱۴۰۵ | تعرفه طراحی سایت رومونت';
    $description = 'هزینه طراحی سایت در سال ۱۴۰۵ به نوع سایت، امکانات و طراحی بستگی دارد. با عوامل مؤثر بر قیمت، انواع سایت و روش دریافت برآورد هزینه از رومونت آشنا شوید.';
    $url         = home_url( '/site-design-pricing/' );

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta name="robots" content="index,follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'kinetic_wp_site_design_pricing_seo', 2 );

function kinetic_wp_site_design_pricing_title( $title ) {
    if ( is_page_template( 'page-site-design-pricing.php' ) ) {
        return 'قیمت طراحی سایت در سال ۱۴۰۵ | تعرفه طراحی سایت رومونت';
    }

    return $title;
}
add_filter( 'pre_get_document_title', 'kinetic_wp_site_design_pricing_title' );

function kinetic_wp_maintenance_pricing_seo() {
    if ( ! is_page_template( 'page-maintenance-pricing.php' ) ) {
        return;
    }

    $title       = 'قیمت پشتیبانی سایت در سال ۱۴۰۵ | تعرفه پشتیبانی وردپرس رومونت';
    $description = 'قیمت پشتیبانی سایت به امکانات، میزان نگهداری و سطح خدمات موردنیاز بستگی دارد. با خدمات، عوامل مؤثر بر هزینه و پلن‌های پشتیبانی وردپرس رومونت آشنا شوید.';
    $url         = home_url( '/maintenance-pricing/' );

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta name="robots" content="index,follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'kinetic_wp_maintenance_pricing_seo', 2 );

function kinetic_wp_maintenance_pricing_title( $title ) {
    if ( is_page_template( 'page-maintenance-pricing.php' ) ) {
        return 'قیمت پشتیبانی سایت در سال ۱۴۰۵ | تعرفه پشتیبانی وردپرس رومونت';
    }

    return $title;
}
add_filter( 'pre_get_document_title', 'kinetic_wp_maintenance_pricing_title' );

function kinetic_wp_sms_pricing_seo() {
    if ( ! is_page_template( 'page-sms-pricing.php' ) ) {
        return;
    }

    $title       = 'قیمت پنل پیامکی رومونت | تعرفه و خرید اشتراک';
    $description = 'پلن‌های پنل پیامکی رومونت را مقایسه کنید. با مشاهده امکانات و قیمت اشتراک‌های ماهانه، پلن مناسب کسب‌وکار خود را انتخاب کنید.';
    $url         = home_url( '/sms-pricing/' );

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta name="robots" content="index,follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'kinetic_wp_sms_pricing_seo', 2 );

function kinetic_wp_sms_pricing_title( $title ) {
    if ( is_page_template( 'page-sms-pricing.php' ) ) {
        return 'قیمت پنل پیامکی رومونت | تعرفه و خرید اشتراک';
    }

    return $title;
}
add_filter( 'pre_get_document_title', 'kinetic_wp_sms_pricing_title' );

function kinetic_wp_about_seo() {
    if ( ! is_page_template( 'page-about.php' ) ) {
        return;
    }

    $title       = 'درباره رومونت | شرکت طراحی سایت و توسعه وردپرس';
    $description = 'با رومونت آشنا شوید؛ ارائه‌دهنده خدمات طراحی سایت، توسعه وردپرس، فروشگاه اینترنتی، برنامه‌نویسی اختصاصی و پشتیبانی وب‌سایت.';
    $url         = home_url( '/about-us/' );

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta name="robots" content="index,follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'kinetic_wp_about_seo', 2 );

function kinetic_wp_about_title( $title ) {
    return is_page_template( 'page-about.php' ) ? 'درباره رومونت | شرکت طراحی سایت و توسعه وردپرس' : $title;
}
add_filter( 'pre_get_document_title', 'kinetic_wp_about_title' );

function kinetic_wp_contact_seo() {
    if ( ! is_page_template( 'page-contact.php' ) ) {
        return;
    }

    $title       = 'ارتباط با رومونت | تماس و درخواست مشاوره طراحی سایت';
    $description = 'برای دریافت مشاوره طراحی سایت، پشتیبانی وردپرس، توسعه فروشگاه اینترنتی و خدمات برنامه‌نویسی با رومونت در ارتباط باشید.';
    $url         = home_url( '/contact-us/' );

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta name="robots" content="index,follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'kinetic_wp_contact_seo', 2 );

function kinetic_wp_contact_title( $title ) {
    return is_page_template( 'page-contact.php' ) ? 'ارتباط با رومونت | تماس و درخواست مشاوره طراحی سایت' : $title;
}
add_filter( 'pre_get_document_title', 'kinetic_wp_contact_title' );

function kinetic_wp_website_design_seo() {
    if ( ! is_page_template( 'page-website-design.php' ) ) {
        return;
    }

    $title       = 'طراحی سایت حرفه‌ای | طراحی سایت شرکتی و فروشگاهی رومونت';
    $description = 'رومونت ارائه‌دهنده خدمات طراحی سایت شرکتی و فروشگاهی، طراحی وردپرسی و توسعه اختصاصی وب‌سایت است. برای بررسی نیازهای پروژه و دریافت مشاوره اقدام کنید.';
    $url         = home_url( '/website-design/' );

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta name="robots" content="index,follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'kinetic_wp_website_design_seo', 2 );

function kinetic_wp_website_design_title( $title ) {
    return is_page_template( 'page-website-design.php' ) ? 'طراحی سایت حرفه‌ای | طراحی سایت شرکتی و فروشگاهی رومونت' : $title;
}
add_filter( 'pre_get_document_title', 'kinetic_wp_website_design_title' );

function kinetic_wp_wordpress_support_seo() {
    if ( ! is_page_template( 'page-wordpress-support.php' ) ) {
        return;
    }

    $title       = 'پشتیبانی وردپرس | نگهداری و رفع مشکلات سایت – رومونت';
    $description = 'رومونت ارائه‌دهنده خدمات پشتیبانی وردپرس، نگهداری سایت، به‌روزرسانی، رفع خطا و توسعه وب‌سایت است. برای بررسی نیاز سایت خود و دریافت مشاوره اقدام کنید.';
    $url         = home_url( '/wordpress-support/' );

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta name="robots" content="index,follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
}
add_action( 'wp_head', 'kinetic_wp_wordpress_support_seo', 2 );

function kinetic_wp_wordpress_support_title( $title ) {
    return is_page_template( 'page-wordpress-support.php' ) ? 'پشتیبانی وردپرس | نگهداری و رفع مشکلات سایت – رومونت' : $title;
}
add_filter( 'pre_get_document_title', 'kinetic_wp_wordpress_support_title' );

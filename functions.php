<?php

// ۱. یکپارچه کردن لود فایل‌های استایل و جاوااسکریپت
function boilerplate_load_assets() {
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
add_action('wp_enqueue_scripts', 'boilerplate_load_assets');


// ۲. اضافه کردن type="module" به تگ فایل جاوااسکریپت (دقت کنید این قطعه کد باید مستقل و بیرون توابع دیگر باشد)
add_filter('script_loader_tag', function($tag, $handle, $src) {
    if ('romonet-app-js' === $handle) {
        // Vite فایل‌ها را به صورت ES Module می‌دهد. پس type="module" اجباری است
        return '<script type="module" src="' . esc_url($src) . '"></script>' . "\n";
    }
    return $tag;
}, 10, 3);


// ۳. پشتیبانی‌های تم
function boilerplate_add_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'boilerplate_add_support');


// ۴. رندر کردن کدهای SVG
function boilerplate_render_svg($filename) {
    $file = get_theme_file_path("/assets/images/{$filename}.svg");
    if (file_exists($file)) {
        return file_get_contents($file);
    }
    return '';
}


// ۵. ویرایش فیلدهای صفحه تسویه حساب ووکامرس
function boilerplate_remove_checkout_fields($fields) {
    // Remove all fields except for billing first name, last name, and email and phone number
    $fields['billing'] = array(
        'billing_first_name' => $fields['billing']['billing_first_name'],
        'billing_last_name'  => $fields['billing']['billing_last_name'],
        'billing_email'      => $fields['billing']['billing_email'],
        'billing_phone'      => $fields['billing']['billing_phone'],
    );

    // Remove shipping fields
    unset($fields['shipping']);
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'boilerplate_remove_checkout_fields');

require_once get_theme_file_path('/includes/site-design-pricing.php');
require_once get_theme_file_path('/includes/site-design-admin-requests.php');
require_once get_theme_file_path('/includes/admin-maintenance.php');
require_once get_theme_file_path('/includes/maintenance-ajax.php');

<?php

/**
 * Thank You / Order Received Page Template (WooCommerce Override)
 *
 * @package Romonet_WPStorm
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

// این متغیر به صورت پیش‌فرض توسط ووکامرس به این قالب پاس داده می‌شود
global $wp;

// اطمینان از وجود آبجکت سفارش
if (! isset($order) && isset($wp->query_vars['order-received'])) {
    $order = wc_get_order(absint($wp->query_vars['order-received']));
}

$order_data = null;

if ($order && is_a($order, 'WC_Order')) {
    $items_data = array();

    // دریافت تمام فایل‌های مجاز برای دانلود در این سفارش
    $downloads = $order->get_downloadable_items();

    foreach ($order->get_items() as $item_id => $item) {
        $product = $item->get_product();
        if (! $product) continue;

        $product_name = $item->get_name();
        $variation_data = wc_get_formatted_cart_item_data($item, true);

        // تطبیق فایل‌های دانلودی با این آیتم خاص از سفارش
        $item_downloads = array();
        foreach ($downloads as $download) {
            if ($download['product_id'] == $item->get_product_id() || $download['product_id'] == $item->get_variation_id()) {
                $item_downloads[] = array(
                    'name' => $download['download_name'],
                    'url'  => $download['download_url']
                );
            }
        }

        // استخراج کلید لایسنس از متای آیتم سفارش (بستگی به افزونه لایسنس شما دارد)
        // کلیدهای متداول: '_license_key' یا 'License Key'
        $license_key = $item->get_meta('License Key') ?: $item->get_meta('_license_key');

        $items_data[] = array(
            'productName' => $product_name,
            'tier'        => $variation_data ? wp_strip_all_tags($variation_data) : 'محصول دیجیتال',
            'expires'     => 'آپدیت پیوسته و منظم',
            'licenseKey'  => $license_key, // اگر افزونه لایسنس ندارید این مقدار خالی میماند و باکس آن در ظاهر مخفی میشود
            'downloads'   => $item_downloads
        );
    }

    // ساخت آرایه دیتای سفارش برای پاس دادن به جاوا اسکریپت
    $order_data = array(
        'orderId'       => $order->get_order_number(),
        'date'          => wc_format_datetime($order->get_date_created(), 'j F Y - H:i'),
        'paymentMethod' => $order->get_payment_method_title() ?: 'پرداخت آنلاین',
        'total'         => (float) $order->get_total(),
        'customer'      => array(
            'fullName' => trim($order->get_billing_first_name() . ' ' . $order->get_billing_last_name()) ?: 'کاربر گرامی',
            'email'    => $order->get_billing_email() ?: ''
        ),
        'items'         => $items_data
    );
}
?>

<!-- Confetti CDN Script -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>

<div class="min-h-screen pb-24 pt-8" dir="rtl" x-data="romonetThankYou(<?php echo esc_attr(wp_json_encode($order_data)); ?>)" x-init="initConfetti()">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- ==================== NO ORDER FALLBACK ==================== -->
        <template x-if="!order">
            <div class="min-h-[70vh] flex flex-col items-center justify-center p-6 text-center space-y-6">
                <div class="w-16 h-16 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-neutral-500">
                    <svg class="w-8 h-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white">سفارش یافت نشد یا منقضی شده است</h2>
                <p class="text-sm text-neutral-400 max-w-sm">
                    لطفاً ایمیل رسید خرید خود را بررسی کنید یا به پنل کاربری خود مراجعه نمایید.
                </p>
                <a
                    href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
                    class="px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-bold text-xs transition">
                    ورود به حساب کاربری
                </a>
            </div>
        </template>

        <!-- ==================== CELEBRATION ORDER SUCCESS ==================== -->
        <template x-if="order">
            <div class="space-y-10">

                <!-- Celebration Header -->
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 rounded-3xl bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 flex items-center justify-center mx-auto shadow-2xl shadow-emerald-500/30 animate-bounce">
                        <!-- CheckCircle2 Icon -->
                        <svg class="w-9 h-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>

                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-300 border border-emerald-500/20 text-xs">
                        <span>سفارش شما با موفقیت ثبت و تایید گردید</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                        با تشکر از خرید شما، <span x-text="order.customer.fullName"></span>!
                    </h1>

                    <p class="text-sm sm:text-base text-neutral-300 max-w-lg mx-auto leading-relaxed">
                        پرداخت با موفقیت انجام شد. رسید پرداخت و مشخصات نرم‌افزار به آدرس ایمیل <strong class="text-amber-400 " dir="ltr" x-text="order.customer.email"></strong> ارسال گردید.
                    </p>
                </div>

                <!-- Order Meta Bar -->
                <div class="glass-panel p-4 sm:p-6 rounded-2xl border border-white/10 flex flex-wrap items-center justify-between gap-4 text-xs bg-white/5 backdrop-blur-xl">
                    <div>
                        <span class="text-neutral-400 block text-[11px]">شماره پیگیری فاکتور</span>
                        <span class="text-amber-400 font-bold text-sm " x-text="order.orderId"></span>
                    </div>
                    <div>
                        <span class="text-neutral-400 block text-[11px]">تاریخ ثبت سفارش</span>
                        <span class="text-white " x-text="order.date"></span>
                    </div>
                    <div>
                        <span class="text-neutral-400 block text-[11px]">شیوه پرداخت</span>
                        <span class="text-cyan-400" x-text="order.paymentMethod"></span>
                    </div>
                    <div>
                        <span class="text-neutral-400 block text-[11px]">مبلغ کل تسویه‌شده</span>
                        <span class="text-white font-bold text-sm " x-text="formatCurrency(order.total)"></span>
                    </div>
                    <button
                        type="button"
                        @click="handlePrint()"
                        class="p-2 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white border border-white/10 flex items-center gap-1.5 transition"
                        title="چاپ فاکتور رسمی">
                        <!-- Printer Icon -->
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 6 2 18 2 18 9" />
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                            <rect width="12" height="8" x="6" y="14" />
                        </svg>
                        <span class="hidden sm:inline">چاپ فاکتور</span>
                    </button>
                </div>

                <!-- ISSUED SOFTWARE LICENSES & DOWNLOADS -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-2 border-b border-white/10">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2">
                            <!-- Sparkles Icon -->
                            <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                            </svg>
                            <span>جزئیات سفارش و فایل‌های دانلود</span>
                        </h2>
                        <span class="text-xs text-neutral-400 ">
                            <span x-text="order.items.length"></span> محصول
                        </span>
                    </div>

                    <div class="space-y-4">
                        <template x-for="(item, idx) in order.items" :key="idx">
                            <div class="glass-card p-6 rounded-2xl border border-amber-500/30 bg-gradient-to-r from-[#141724] to-[#0f111a] space-y-4 shadow-xl backdrop-blur-md">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <div>
                                        <h3 class="text-base font-bold text-white" x-text="item.productName"></h3>
                                        <div class="text-xs text-neutral-400 flex items-center gap-2 mt-0.5">
                                            <span class="text-amber-400" x-text="item.tier"></span>
                                            <span>•</span>
                                            <span>اعتبار: <span x-text="item.expires"></span></span>
                                        </div>
                                    </div>

                                    <!-- Downloads Loop -->
                                    <template x-if="item.downloads && item.downloads.length > 0">
                                        <div class="flex flex-col gap-2 w-full sm:w-auto">
                                            <template x-for="dl in item.downloads" :key="dl.url">
                                                <a
                                                    :href="dl.url"
                                                    class="px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-bold text-xs flex items-center gap-2 transition active:scale-95 shadow-lg shadow-amber-500/20 w-full justify-center">
                                                    <!-- DownloadCloud Icon -->
                                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                                        <path d="M12 12v9" />
                                                        <path d="m8 17 4 4 4-4" />
                                                    </svg>
                                                    <span x-text="'دانلود ' + dl.name"></span>
                                                </a>
                                            </template>
                                        </div>
                                    </template>
                                </div>

                                <!-- Key Box (Only shows if a license key is found) -->
                                <template x-if="item.licenseKey">
                                    <div class="p-3.5 rounded-xl bg-black/60 border border-white/15 flex items-center justify-between gap-3" dir="ltr">
                                        <div class="space-y-0.5 truncate text-left">
                                            <span class="text-[10px] text-neutral-500 uppercase block ">License Authorization Key</span>
                                            <span class="text-sm font-bold text-emerald-400 tracking-wider select-all truncate block " x-text="item.licenseKey"></span>
                                        </div>

                                        <button
                                            type="button"
                                            @click="handleCopyKey(item.licenseKey)"
                                            class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white text-xs flex items-center gap-1.5 transition shrink-0">
                                            <template x-if="copiedKey === item.licenseKey">
                                                <span class="flex items-center gap-1 text-emerald-400">
                                                    <!-- Check Icon -->
                                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polyline points="20 6 9 17 4 12" />
                                                    </svg>
                                                    <span>کپی شد</span>
                                                </span>
                                            </template>

                                            <template x-if="copiedKey !== item.licenseKey">
                                                <span class="flex items-center gap-1">
                                                    <!-- Copy Icon -->
                                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                                        <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                                                    </svg>
                                                    <span>کپی کلید</span>
                                                </span>
                                            </template>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- 3-STEP QUICK START GUIDE -->
                <div class="glass-panel p-6 sm:p-8 rounded-3xl border border-white/10 space-y-6 bg-white/5 backdrop-blur-xl">
                    <div class="space-y-1">
                        <h3 class="text-lg font-bold text-white">
                            راهنمای نصب و راه‌اندازی سریع
                        </h3>
                        <p class="text-xs text-neutral-400">
                            در صورتی که افزونه یا قالب تهیه کرده‌اید، مراحل زیر را طی کنید:
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                        <div class="p-4 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                            <span class="text-amber-400 font-bold text-sm block">۱. دانلود و آپلود فایل</span>
                            <p class="text-neutral-300 leading-relaxed">
                                فایل را از طریق دکمه بالا دانلود کرده و در بخش <strong>افزونه‌ها / نمایش → افزودن → بارگذاری</strong> وردپرس آپلود کنید.
                            </p>
                        </div>

                        <div class="p-4 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                            <span class="text-cyan-400 font-bold text-sm block">۲. درج کلید لایسنس</span>
                            <p class="text-neutral-300 leading-relaxed">
                                در صورت داشتن لایسنس اختصاصی، به منوی فعال‌سازی محصول در پیشخوان وردپرس رفته و کلید را وارد کنید.
                            </p>
                        </div>

                        <div class="p-4 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                            <span class="text-emerald-400 font-bold text-sm block">۳. استفاده از محصول</span>
                            <p class="text-neutral-300 leading-relaxed">
                                به همین سادگی! در صورت بروز هرگونه مشکل، تیم پشتیبانی ما به صورت ۲۴ ساعته در خدمت شماست.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- NEXT ACTIONS -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a
                        href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
                        class="w-full sm:w-auto px-6 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white text-xs border border-white/10 transition text-center">
                        ورود به پنل کاربری من
                    </a>

                    <a
                        href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                        class="w-full sm:w-auto px-8 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition shadow-lg shadow-amber-500/25 flex items-center justify-center gap-2 text-center">
                        <span>مشاهده سایر محصولات فروشگاه</span>
                        <!-- ArrowLeft Icon -->
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </a>
                </div>

            </div>
        </template>

    </div>
</div>

<script>
    // خالی کردن سبد خرید محلی (Alpine / localStorage) چون پرداخت انجام شده
    window.addEventListener('load', () => {
        // اگر سبد خریدی در استیت هدر دارید در اینجا آن را ریست کنید.
        window.dispatchEvent(new CustomEvent('clear-cart'));
    });

    function romonetThankYou(orderData) {
        return {
            order: orderData,
            copiedKey: null,

            initConfetti() {
                if (this.order && typeof confetti === 'function') {
                    try {
                        confetti({
                            particleCount: 100,
                            spread: 70,
                            origin: {
                                y: 0.6
                            }
                        });
                    } catch (e) {
                        console.error('Confetti error:', e);
                    }
                }
            },

            handleCopyKey(key) {
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(key).then(() => {
                        this.copiedKey = key;
                        window.dispatchEvent(new CustomEvent('show-toast', {
                            detail: 'کلید لایسنس در کلیپ‌بورد کپی شد!'
                        }));
                        setTimeout(() => {
                            this.copiedKey = null;
                        }, 2500);
                    });
                }
            },

            handlePrint() {
                window.print();
            },

            formatCurrency(amount) {
                if (!amount) return 'رایگان';
                return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
            }
        };
    }
</script>

<?php
// به دلیل اینکه این صفحه درون ساختار ووکامرس لود می‌شود، نیاز به فوتر سفارشی نیست
// و پوسته شما آن را از فایل‌های پایه فراخوانی خواهد کرد. 
?>
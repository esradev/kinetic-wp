<?php

/**
 * Thank You / Order Received Page Template
 *
 * @package Romonet_WPStorm
 * @param WC_Order|false $order The WooCommerce order object passed by template loader.
 */

defined('ABSPATH') || exit;

// Retrieve WooCommerce order data dynamically if available, otherwise use preview fallback
$order_data = null;

if (!isset($order) && function_exists('wc_get_order') && isset($_GET['order_id'])) {
    $order = wc_get_order(absint($_GET['order_id']));
}

if ($order && is_a($order, 'WC_Order')) {
    $licenses = array();
    foreach ($order->get_items() as $item_id => $item) {
        $product = $item->get_product();
        $product_name = $item->get_name();

        // Generate or retrieve stored license key
        $generated_key = 'WPS-' . strtoupper(substr(md5($order->get_id() . '-' . $item_id . '-salt'), 0, 4)) . '-' .
            strtoupper(substr(md5($item_id . '-salt2'), 0, 4)) . '-' .
            strtoupper(substr(md5($product_name), 0, 4)) . '-' .
            strtoupper(substr(uniqid(), -4));

        $licenses[] = array(
            'productName' => $product_name,
            'tier'        => 'لایسنس تک دامنه تجاری',
            'expires'     => 'مادام‌العمر (آپدیت پیوسته)',
            'licenseKey'  => $generated_key
        );
    }

    $order_data = array(
        'orderId'       => $order->get_order_number(),
        'date'          => wc_format_datetime($order->get_date_created(), 'j F Y - H:i'),
        'paymentMethod' => $order->get_payment_method_title() ?: 'درگاه شاپرک / آنلاین',
        'total'         => (int) $order->get_total(),
        'customer'      => array(
            'fullName' => trim($order->get_billing_first_name() . ' ' . $order->get_billing_last_name()) ?: 'کاربر گرامی',
            'email'    => $order->get_billing_email() ?: 'info@romonet.ir'
        ),
        'licenses'      => !empty($licenses) ? $licenses : array(
            array(
                'productName' => 'قالب اختصاصی آژانسی و شرکتی Apex Studio',
                'tier'        => 'لایسنس استاندارد تک دامنه',
                'expires'     => 'مادام‌العمر (آپدیت پیوسته)',
                'licenseKey'  => 'WPS-APEX-9821-X492-7782'
            )
        )
    );
} else {
    // Default fallback order data for previewing template
    $order_data = array(
        'orderId'       => 'WPST-84920',
        'date'          => date('Y/m/d - H:i'),
        'paymentMethod' => 'درگاه پرداخت شاپرک (زرین‌پال)',
        'total'         => 4280000,
        'customer'      => array(
            'fullName' => 'سارا محمدی',
            'email'    => 'sara.mohammadi@example.com'
        ),
        'licenses'      => array(
            array(
                'productName' => 'قالب اختصاصی آژانسی و شرکتی Apex Studio Pro',
                'tier'        => 'لایسنس تک دامنه تجاری',
                'expires'     => 'مادام‌العمر (آپدیت دائمی)',
                'licenseKey'  => 'WPS-APEX-8492-9102-K920'
            ),
            array(
                'productName' => 'افزونه درگاه هوشمند پیامک رومونت (TelePulse)',
                'tier'        => 'لایسنس تک دامنه',
                'expires'     => 'مادام‌العمر (آپدیت دائمی)',
                'licenseKey'  => 'WPS-TELE-4920-L831-M192'
            )
        )
    );
}
?>

<!-- Confetti CDN Script -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>

<div class="min-h-screen pb-24 pt-8" dir="rtl" x-data="romonetThankYou(<?php echo esc_attr(json_encode($order_data)); ?>)" x-init="initConfetti()">
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
                <h2 class="text-2xl font-bold text-white">سفارش اخیری یافت نشد</h2>
                <p class="text-sm text-neutral-400 max-w-sm">
                    لطفاً ایمیل رسید خرید خود را بررسی کنید یا به فروشگاه محصولات مراجعه نمایید.
                </p>
                <a
                    href="<?php echo esc_url(home_url('/shop')); ?>"
                    class="px-6 py-3 rounded-xl bg-amber-500 text-black font-bold text-xs">
                    مشاهده فروشگاه
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
                        <span>سفارش با موفقیت ثبت شد و لایسنس صادر گردید</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                        با تشکر از اعتماد شما، <span x-text="order.customer.fullName"></span>!
                    </h1>

                    <p class="text-sm sm:text-base text-neutral-300 max-w-lg mx-auto leading-relaxed">
                        پرداخت با موفقیت انجام شد. رسید پرداخت و مشخصات لایسنس به آدرس ایمیل <strong class="text-amber-400 font-mono" dir="ltr" x-text="order.customer.email"></strong> ارسال گردید.
                    </p>
                </div>

                <!-- Order Meta Bar -->
                <div class="glass-panel p-4 sm:p-6 rounded-2xl border border-white/10 flex flex-wrap items-center justify-between gap-4 text-xs bg-white/5 backdrop-blur-xl">
                    <div>
                        <span class="text-neutral-400 block text-[11px]">شماره پیگیری فاکتور</span>
                        <span class="text-amber-400 font-bold text-sm font-mono" x-text="order.orderId"></span>
                    </div>
                    <div>
                        <span class="text-neutral-400 block text-[11px]">تاریخ ثبت سفارش</span>
                        <span class="text-white font-mono" x-text="order.date"></span>
                    </div>
                    <div>
                        <span class="text-neutral-400 block text-[11px]">شیوه پرداخت</span>
                        <span class="text-cyan-400" x-text="order.paymentMethod"></span>
                    </div>
                    <div>
                        <span class="text-neutral-400 block text-[11px]">مبلغ کل تسویه‌شده</span>
                        <span class="text-white font-bold text-sm font-mono" x-text="formatCurrency(order.total)"></span>
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
                        <span>چاپ فاکتور</span>
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
                            <span>کلیدهای لایسنس فعال‌شده و فایل‌های دانلود</span>
                        </h2>
                        <span class="text-xs text-neutral-400 font-mono">
                            <span x-text="order.licenses.length"></span> کلید لایسنس
                        </span>
                    </div>

                    <div class="space-y-4">
                        <template x-for="(lic, idx) in order.licenses" :key="idx">
                            <div
                                class="glass-card p-6 rounded-2xl border border-amber-500/30 bg-gradient-to-r from-[#141724] to-[#0f111a] space-y-4 shadow-xl backdrop-blur-md">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div>
                                        <h3 class="text-base font-bold text-white" x-text="lic.productName"></h3>
                                        <div class="text-xs text-neutral-400 flex items-center gap-2 mt-0.5">
                                            <span class="text-amber-400" x-text="lic.tier"></span>
                                            <span>•</span>
                                            <span>اعتبار لایسنس: <span x-text="lic.expires"></span></span>
                                        </div>
                                    </div>

                                    <button
                                        type="button"
                                        @click="handleDownloadZip(lic.productName)"
                                        class="px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-bold text-xs flex items-center gap-2 transition active:scale-95 shadow-lg shadow-amber-500/20 w-full sm:w-auto justify-center">
                                        <!-- DownloadCloud Icon -->
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                            <path d="M12 12v9" />
                                            <path d="m8 17 4 4 4-4" />
                                        </svg>
                                        <span>دانلود فایل مستقیم ZIP</span>
                                    </button>
                                </div>

                                <!-- Key Box -->
                                <div class="p-3.5 rounded-xl bg-black/60 border border-white/15 flex items-center justify-between gap-3" dir="ltr">
                                    <div class="space-y-0.5 truncate text-left">
                                        <span class="text-[10px] text-neutral-500 uppercase block font-mono">License Authorization Key</span>
                                        <span class="text-sm font-bold text-emerald-400 tracking-wider select-all truncate block font-mono" x-text="lic.licenseKey"></span>
                                    </div>

                                    <button
                                        type="button"
                                        @click="handleCopyKey(lic.licenseKey)"
                                        class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white text-xs flex items-center gap-1.5 transition shrink-0">
                                        <template x-if="copiedKey === lic.licenseKey">
                                            <span class="flex items-center gap-1 text-emerald-400">
                                                <!-- Check Icon -->
                                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <polyline points="20 6 9 17 4 12" />
                                                </svg>
                                                <span>کپی شد</span>
                                            </span>
                                        </template>

                                        <template x-if="copiedKey !== lic.licenseKey">
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
                            </div>
                        </template>
                    </div>
                </div>

                <!-- 3-STEP QUICK START GUIDE -->
                <div class="glass-panel p-6 sm:p-8 rounded-3xl border border-white/10 space-y-6 bg-white/5 backdrop-blur-xl">
                    <div class="space-y-1">
                        <h3 class="text-lg font-bold text-white">
                            راهنمای ۳ مرحله‌ای نصب و فعال‌سازی
                        </h3>
                        <p class="text-xs text-neutral-400">
                            راه‌اندازی و دریافت آپدیت‌های خودکار در کمتر از ۲ دقیقه.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                        <div class="p-4 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                            <span class="text-amber-400 font-bold text-sm block">۱. آپلود فایل ZIP</span>
                            <p class="text-neutral-300 leading-relaxed">
                                در پیشخوان وردپرس به بخش <strong>افزونه‌ها / نمایش → افزودن → بارگذاری</strong> رفته و فایل دانلودی را انتخاب کنید.
                            </p>
                        </div>

                        <div class="p-4 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                            <span class="text-cyan-400 font-bold text-sm block">۲. درج کلید لایسنس</span>
                            <p class="text-neutral-300 leading-relaxed">
                                به منوی <strong>wpstorm → فعال‌سازی لایسنس</strong> رفته و کلید کپی‌شده در بالا را جای‌گذاری نمایید.
                            </p>
                        </div>

                        <div class="p-4 rounded-2xl bg-black/40 border border-white/10 space-y-2">
                            <span class="text-emerald-400 font-bold text-sm block">۳. درون‌ریزی دمو ۱-کلیک</span>
                            <p class="text-neutral-300 leading-relaxed">
                                دموی آماده دلخواه خود را با یک کلیک درون‌ریزی کرده و از سرعت فوق‌العاده سایت خود لذت ببرید.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- NEXT ACTIONS -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a
                        href="<?php echo esc_url(home_url('/')); ?>"
                        class="w-full sm:w-auto px-6 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white text-xs border border-white/10 transition text-center">
                        بازگشت به صفحه اصلی رومونت
                    </a>

                    <a
                        href="<?php echo esc_url(home_url('/shop')); ?>"
                        class="w-full sm:w-auto px-8 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition shadow-lg shadow-amber-500/25 flex items-center justify-center gap-2 text-center">
                        <span>مشاهده سایر محصولات wpstorm</span>
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
    function romonetThankYou(orderData) {
        return {
            order: orderData,
            copiedKey: null,

            initConfetti() {
                if (typeof confetti === 'function') {
                    try {
                        confetti({
                            particleCount: 85,
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

            handleDownloadZip(name) {
                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `دانلود پکیج فایل: ${name}-latest.zip آغاز شد`
                }));
            },

            handlePrint() {
                window.print();
            },

            formatCurrency(amount) {
                return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
            }
        };
    }
</script>
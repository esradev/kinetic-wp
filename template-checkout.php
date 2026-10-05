<?php

/**
 * Template Name: تسویه‌حساب اختصاصی رومونت
 *
 * @package Romonet_WPStorm
 */

defined('ABSPATH') || exit;

// اگر سبد خرید خالی است، به صفحه سبد خرید یا فروشگاه برگردانده شود
if (function_exists('WC') && WC()->cart->is_empty()) {
    wp_redirect(wc_get_page_permalink('shop'));
    exit;
}

get_header();

// 1. دریافت اطلاعات واقعی سبد خرید از ووکامرس
$wc_cart_items = array();
$wc_subtotal   = 0;
$wc_discount   = 0;
$wc_tax        = 0;
$wc_total      = 0;

if (function_exists('WC') && WC()->cart) {
    // گرفتن مقادیر محاسبه شده ووکامرس (اعداد خام)
    $wc_subtotal = WC()->cart->get_subtotal();
    $wc_discount = WC()->cart->get_discount_total();
    $wc_tax      = WC()->cart->get_taxes_total();
    $wc_total    = WC()->cart->get_total('edit');
    $applied_coupons = WC()->cart->get_applied_coupons();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

        if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
            $variation_data = wc_get_formatted_cart_item_data($cart_item, true);

            $wc_cart_items[] = array(
                'id'           => $cart_item_key,
                'title'        => $_product->get_name(),
                'price'        => (float) $_product->get_price(),
                'quantity'     => (int) $cart_item['quantity'],
                'licenseLabel' => $variation_data ? wp_strip_all_tags($variation_data) : 'محصول دیجیتال'
            );
        }
    }
}

// 2. دریافت درگاه‌های پرداخت فعال ووکامرس
$available_gateways = array();
if (function_exists('WC') && WC()->payment_gateways()) {
    $gateways = WC()->payment_gateways->get_available_payment_gateways();
    foreach ($gateways as $gateway) {
        $available_gateways[] = array(
            'id'    => $gateway->id,
            'title' => $gateway->title,
            'desc'  => $gateway->description,
        );
    }
}

// 3. کاربر لاگین شده
$current_user = wp_get_current_user();
$default_name = $current_user->exists() ? trim($current_user->first_name . ' ' . $current_user->last_name) : '';
if (empty($default_name)) $default_name = $current_user->exists() ? $current_user->display_name : '';
$default_email = $current_user->exists() ? $current_user->user_email : '';
$default_phone = get_user_meta($current_user->ID, 'billing_phone', true) ?: '';

// توکن امنیتی تسویه حساب ووکامرس
$checkout_nonce = wp_create_nonce('woocommerce-process_checkout');
$cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart');
?>

<div
    class="min-h-screen pb-24 pt-8"
    dir="rtl"
    xyz-data="romonetCheckout(<?php echo esc_attr(wp_json_encode(array(
                                'cart'       => $wc_cart_items,
                                'subtotal'   => $wc_subtotal,
                                'discount'   => $wc_discount,
                                'tax'        => $wc_tax,
                                'total'      => $wc_total,
                                'coupons'    => $applied_coupons,
                                'gateways'   => $available_gateways,
                                'name'       => $default_name,
                                'email'      => $default_email,
                                'phone'      => $default_phone,
                                'nonce'      => $checkout_nonce,
                                'checkoutUrl' => wc_get_checkout_url()
                            ))); ?>)">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- ==================== BREADCRUMB ==================== -->
        <div class="flex items-center justify-between">
            <a
                href="<?php echo esc_url($cart_url); ?>"
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white text-xs transition border border-white/10">
                <!-- ArrowRight Icon -->
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
                <span>بازگشت به بررسی سبد خرید</span>
            </a>

            <div class="flex items-center gap-2 text-xs text-emerald-400">
                <!-- Lock Icon -->
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                </svg>
                <span>پروتکل امن رمزنگاری ۲۵۶ بیتی SSL</span>
            </div>
        </div>

        <!-- ==================== CHECKOUT FORM ==================== -->
        <form @submit.prevent="handleCheckoutSubmit()" class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

            <!-- Right Column in RTL: Customer Details & Payment -->
            <div class="lg:col-span-7 space-y-8">

                <!-- Step 1: Customer Contact Info -->
                <div class="glass-panel p-6 sm:p-8 rounded-3xl border border-white/15 space-y-6 bg-white/5 backdrop-blur-xl">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4">
                        <div class="flex items-center gap-2.5">
                            <span class="w-7 h-7 rounded-full bg-amber-500 text-black font-bold text-xs flex items-center justify-center">
                                ۱
                            </span>
                            <h2 class="text-lg font-bold text-white">مشخصات صاحب لایسنس و فاکتور</h2>
                        </div>
                        <span class="text-[11px] text-neutral-400">تحویل آنی سفارش</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5 sm:col-span-2">
                            <label class="text-xs text-neutral-400">نام و نام خانوادگی خریدار *</label>
                            <input
                                type="text"
                                required
                                xyz-model="fullName"
                                placeholder="مثال: سارا محمدی"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition" />
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs text-neutral-400">آدرس ایمیل کاری *</label>
                            <input
                                type="email"
                                required
                                xyz-model="email"
                                placeholder="name@company.com"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition text-left"
                                dir="ltr" />
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs text-neutral-400">شماره موبایل *</label>
                            <input
                                type="tel"
                                required
                                xyz-model="phone"
                                placeholder="09120000000"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition text-left"
                                dir="ltr" />
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs text-neutral-400">نام شرکت / سازمان (اختیاری)</label>
                            <input
                                type="text"
                                xyz-model="company"
                                placeholder="شرکت/آژانس شما"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition" />
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs text-neutral-400">کشور / منطقه *</label>
                            <select
                                xyz-model="country"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition">
                                <option value="IR">ایران (پرداخت ریالی شتاب)</option>
                                <option value="AE">امارات متحده عربی</option>
                                <option value="TR">ترکیه</option>
                                <option value="DE">آلمان و اروپا</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Dynamic Payment Methods from WooCommerce -->
                <div class="glass-panel p-6 sm:p-8 rounded-3xl border border-white/15 space-y-6 bg-white/5 backdrop-blur-xl">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4">
                        <div class="flex items-center gap-2.5">
                            <span class="w-7 h-7 rounded-full bg-amber-500 text-black font-bold text-xs flex items-center justify-center">
                                ۲
                            </span>
                            <h2 class="text-lg font-bold text-white">انتخاب درگاه و شیوه پرداخت</h2>
                        </div>
                        <span class="text-[11px] text-emerald-400 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            کاملاً امن
                        </span>
                    </div>

                    <template xyz-if="gateways.length === 0">
                        <div class="p-4 bg-rose-500/10 border border-rose-500/20 rounded-xl text-rose-400 text-sm text-center">
                            هیچ درگاه پرداختی در ووکامرس فعال نیست.
                        </div>
                    </template>

                    <!-- Dynamic Gateway Tabs -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                        <template xyz-for="gw in gateways" xyz-bind:key="gw.id">
                            <button
                                type="button"
                                xyz-on:click="paymentMethod = gw.id"
                                class="p-3 rounded-xl border text-center transition flex flex-col items-center justify-center gap-2 h-full"
                                xyz-bind:class="paymentMethod === gw.id ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'">
                                <div xyz-html="getGatewayIcon(gw.id)" class="text-current"></div>
                                <span class="text-xs leading-tight" xyz-text="gw.title"></span>
                            </button>
                        </template>
                    </div>

                    <!-- Dynamic Gateway Description -->
                    <template xyz-for="gw in gateways" xyz-bind:key="'desc-'+gw.id">
                        <div xyz-show="paymentMethod === gw.id" xyz-cloak class="p-5 rounded-2xl bg-white/5 border border-white/10 text-center space-y-2">
                            <div class="text-xs font-bold text-amber-300" xyz-text="gw.title"></div>
                            <p class="text-xs text-neutral-400" xyz-html="gw.desc || 'پرداخت امن و سریع از طریق این درگاه.'"></p>
                        </div>
                    </template>
                </div>

            </div>

            <!-- Left Column in RTL: Order Review & Submit -->
            <div class="lg:col-span-5 space-y-6">
                <div class="glass-panel p-6 sm:p-8 rounded-3xl border border-white/15 bg-gradient-to-b from-[#111422] to-[#0c0f1a] space-y-6 backdrop-blur-xl">
                    <h3 class="text-lg font-bold text-white border-b border-white/10 pb-4">
                        تایید نهایی و صدور فاکتور
                    </h3>

                    <!-- Items List -->
                    <div class="space-y-3 max-h-60 overflow-y-auto pl-1">
                        <template xyz-for="item in cart" xyz-bind:key="item.id">
                            <div class="flex items-center justify-between text-xs py-1 border-b border-white/5">
                                <div>
                                    <div class="font-bold text-white line-clamp-1" xyz-text="item.title"></div>
                                    <div class="text-[11px] text-neutral-400 mt-1">
                                        <span xyz-text="item.quantity"></span> عدد • <span xyz-text="item.licenseLabel"></span>
                                    </div>
                                </div>
                                <div class="text-amber-400 font-bold mr-2" xyz-text="formatCurrency(item.price * item.quantity)"></div>
                            </div>
                        </template>
                    </div>

                    <!-- Calculations (Real WooCommerce Data) -->
                    <div class="space-y-2.5 text-xs border-t border-white/10 pt-4">
                        <div class="flex justify-between text-neutral-300">
                            <span>مبلغ کل سفارش</span>
                            <span class="font-bold text-white" xyz-text="formatCurrency(subtotal)"></span>
                        </div>

                        <template xyz-if="discount > 0">
                            <div class="flex justify-between text-emerald-400">
                                <span>تخفیف سایت</span>
                                <span>-<span xyz-text="formatCurrency(discount)"></span></span>
                            </div>
                        </template>

                        <template xyz-if="tax > 0">
                            <div class="flex justify-between text-neutral-300">
                                <span>مالیات بر ارزش افزوده</span>
                                <span class="font-bold text-white" xyz-text="formatCurrency(tax)"></span>
                            </div>
                        </template>

                        <div class="flex justify-between text-base font-bold text-white pt-3 border-t border-white/10">
                            <span>مبلغ قابل پرداخت</span>
                            <span class="text-amber-400 font-bold text-xl" xyz-text="formatCurrency(total)"></span>
                        </div>
                    </div>

                    <!-- Submit CTA -->
                    <button
                        type="submit"
                        :disabled="isProcessing"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500 hover:brightness-110 active:scale-95 text-black font-black text-sm transition shadow-xl shadow-amber-500/30 flex items-center justify-center gap-2 disabled:opacity-50">
                        <template xyz-if="isProcessing">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 12a9 9 0 1 1-6.219-8.56" />
                                </svg>
                                <span>در حال پردازش و انتقال به درگاه...</span>
                            </span>
                        </template>

                        <template xyz-if="!isProcessing">
                            <div class="flex items-center gap-2">
                                <span>پرداخت امن <span xyz-text="formatCurrency(total)"></span> و فعال‌سازی</span>
                                <!-- ArrowLeft Icon -->
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m12 19-7-7 7-7" />
                                    <path d="M19 12H5" />
                                </svg>
                            </div>
                        </template>
                    </button>

                    <p class="text-[11px] text-center text-neutral-500 leading-relaxed">
                        با تکمیل سفارش، شرایط و قوانین خدمات سایت را می‌پذیرید.
                    </p>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
    function romonetCheckout(serverData) {
        return {
            cart: serverData.cart || [],
            gateways: serverData.gateways || [],
            subtotal: serverData.subtotal || 0,
            discount: serverData.discount || 0,
            tax: serverData.tax || 0,
            total: serverData.total || 0,
            nonce: serverData.nonce,

            fullName: serverData.name || '',
            email: serverData.email || '',
            phone: serverData.phone || '',
            company: '',
            country: 'IR',

            // پیش‌فرض کردن اولین درگاه پرداخت
            paymentMethod: (serverData.gateways && serverData.gateways.length > 0) ? serverData.gateways[0].id : '',

            isProcessing: false,

            // آیکون داینامیک برای درگاه‌ها (میتوانید بر اساس ID درگاه‌های خود آن را تغییر دهید)
            getGatewayIcon(id) {
                const zarinpal = '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="14" x="2" y="5" rx="2" /><line x1="2" x2="22" y1="10" y2="10" /></svg>';
                const bank = '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" /><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" /><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" /><path d="M10 6h4" /><path d="M10 10h4" /></svg>';
                const crypto = '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" /></svg>';

                if (id.includes('zarin') || id.includes('payping') || id.includes('saman') || id.includes('mellat')) return zarinpal;
                if (id.includes('bacs') || id.includes('cheque')) return bank;
                if (id.includes('crypto') || id.includes('coin')) return crypto;
                return zarinpal; // Default
            },

            async handleCheckoutSubmit() {
                if (!this.fullName.trim() || !this.email.trim() || !this.phone.trim()) {
                    alert('لطفاً نام، ایمیل و شماره موبایل خود را وارد نمایید.');
                    return;
                }

                if (!this.paymentMethod) {
                    alert('لطفاً یک درگاه پرداخت انتخاب کنید.');
                    return;
                }

                this.isProcessing = true;

                // جداسازی نام و نام خانوادگی
                const nameParts = this.fullName.trim().split(' ');
                const fName = nameParts[0];
                const lName = nameParts.length > 1 ? nameParts.slice(1).join(' ') : '-';

                // آماده‌سازی داده‌های فرم منطبق با هسته ووکامرس
                const formData = new URLSearchParams();
                formData.append('billing_first_name', fName);
                formData.append('billing_last_name', lName);
                formData.append('billing_email', this.email);
                formData.append('billing_phone', this.phone);
                formData.append('billing_company', this.company);
                formData.append('billing_country', this.country);

                // مقادیر اجباری ووکامرس برای جلوگیری از خطای "آدرس وارد نشده است"
                formData.append('billing_address_1', 'ثبت دیجیتال - ' + this.country);
                formData.append('billing_city', 'دیجیتال');

                formData.append('payment_method', this.paymentMethod);
                formData.append('security', this.nonce);

                try {
                    const response = await fetch('<?php echo esc_url_raw(wc_get_checkout_url()); ?>?wc-ajax=checkout', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        body: formData
                    });

                    const data = await response.json().catch(() => null);

                    if (data && data.result === 'success' && data.redirect) {
                        // در صورت موفقیت، ووکامرس ما را به درگاه پرداخت یا صفحه تشکر می‌فرستد
                        window.location.href = data.redirect;
                    } else if (data && data.result === 'failure') {
                        // تمیز کردن پیام خطای ووکامرس از تگ‌های HTML
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = data.messages;
                        alert('خطا در ثبت سفارش:\n' + tempDiv.textContent.trim());
                        this.isProcessing = false;
                    } else {
                        alert('پاسخ نامعتبر از سرور دریافت شد. لطفاً دوباره تلاش کنید.');
                        this.isProcessing = false;
                    }
                } catch (error) {
                    console.error('Checkout error:', error);
                    alert('ارتباط با سرور قطع شد. لطفاً دوباره تلاش کنید.');
                    this.isProcessing = false;
                }
            },

            formatCurrency(amount) {
                if (!amount || amount == 0) return 'رایگان';
                return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
            }
        };
    }
</script>

<?php get_footer(); ?>
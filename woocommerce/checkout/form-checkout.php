<?php

/**
 * Custom Checkout Page Template
 *
 * @package Romonet_WPStorm
 */

defined('ABSPATH') || exit;

// Prepare initial checkout cart data from WooCommerce (if available)
$wc_cart_items = array();
$wc_subtotal   = 0;
$wc_discount   = 0;
$wc_tax        = 0;
$wc_total      = 0;
$applied_coupons = array();

if (function_exists('WC') && WC()->cart) {
    $wc_subtotal = WC()->cart->get_subtotal();
    $wc_discount = WC()->cart->get_discount_total();
    $wc_tax      = WC()->cart->get_taxes_total();
    $wc_total    = WC()->cart->get_total('edit');
    $applied_coupons = WC()->cart->get_applied_coupons();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

        if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
            $wc_cart_items[] = array(
                'id'           => $cart_item_key,
                'productId'    => $product_id,
                'itemType'     => $_product->is_type('subscription') ? 'maintenance_plan' : 'product',
                'title'        => $_product->get_name(),
                'price'        => (int) $_product->get_price(),
                'quantity'     => (int) $cart_item['quantity'],
                'licenseLabel' => 'لایسنس تک دامنه'
            );
        }
    }
}

// Current logged-in user defaults
$current_user = wp_get_current_user();
$default_name = $current_user->exists() ? $current_user->display_name : 'سارا محمدی';
$default_email = $current_user->exists() ? $current_user->user_email : 'sara.mohammadi@example.com';
$initial_coupon = !empty($applied_coupons) ? strtoupper($applied_coupons[0]) : 'ROMONET20';

$cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart');
$thank_you_url = function_exists('wc_get_endpoint_url') ? wc_get_endpoint_url('order-received', '', wc_get_checkout_url()) : home_url('/thank-you');
?>

<div
    class="min-h-screen pb-24 pt-8"
    dir="rtl"
    x-data="romonetCheckout({
    initialCart: <?php echo esc_attr(json_encode($wc_cart_items)); ?>,
    defaultName: '<?php echo esc_js($default_name); ?>',
    defaultEmail: '<?php echo esc_js($default_email); ?>',
    initialCoupon: '<?php echo esc_js($initial_coupon); ?>',
    thankYouUrl: '<?php echo esc_url($thank_you_url); ?>'
  })">
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
                        <span class="text-[11px] text-neutral-400">تحویل آنی کلید لایسنس</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5 sm:col-span-2">
                            <label class="text-xs text-neutral-400">نام و نام خانوادگی خریدار *</label>
                            <input
                                type="text"
                                required
                                x-model="fullName"
                                placeholder="مثال: سارا محمدی"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition" />
                        </div>

                        <div class="space-y-1.5 sm:col-span-2">
                            <label class="text-xs text-neutral-400">آدرس ایمیل کاری (جهت ارسال فایل و لایسنس اختصاصی) *</label>
                            <input
                                type="email"
                                required
                                x-model="email"
                                placeholder="name@company.com"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition text-left"
                                dir="ltr" />
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs text-neutral-400">نام شرکت / سازمان (اختیاری)</label>
                            <input
                                type="text"
                                x-model="company"
                                placeholder="آژانس دیجیتال روناک"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition" />
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs text-neutral-400">کشور / منطقه *</label>
                            <select
                                x-model="country"
                                class="w-full bg-black/50 border border-white/15 focus:border-amber-400 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none transition">
                                <option value="ایران">ایران (پرداخت ریالی شتاب)</option>
                                <option value="امارات متحده عربی">امارات متحده عربی (AED)</option>
                                <option value="ترکیه">ترکیه (TRY)</option>
                                <option value="آلمان و اروپا">آلمان و اروپا (EUR)</option>
                                <option value="سایر کشورها">سایر کشورها (ارز دیجیتال USDT)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Payment Method -->
                <div class="glass-panel p-6 sm:p-8 rounded-3xl border border-white/15 space-y-6 bg-white/5 backdrop-blur-xl">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4">
                        <div class="flex items-center gap-2.5">
                            <span class="w-7 h-7 rounded-full bg-amber-500 text-black font-bold text-xs flex items-center justify-center">
                                ۲
                            </span>
                            <h2 class="text-lg font-bold text-white">انتخاب درگاه و شیوه پرداخت</h2>
                        </div>
                        <span class="text-[11px] text-emerald-400 flex items-center gap-1">
                            <!-- ShieldCheck Icon -->
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            اتصال امن شاپرک
                        </span>
                    </div>

                    <!-- Payment selector tabs -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                        <!-- Zarinpal -->
                        <button
                            type="button"
                            @click="paymentMethod = 'zarinpal'"
                            class="p-3 rounded-xl border text-center transition flex flex-col items-center gap-1.5"
                            :class="paymentMethod === 'zarinpal' ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'">
                            <!-- CreditCard Icon -->
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect width="20" height="14" x="2" y="5" rx="2" />
                                <line x1="2" x2="22" y1="10" y2="10" />
                            </svg>
                            <span class="text-xs">درگاه شاپرک آنلاین</span>
                        </button>

                        <!-- Card to Card -->
                        <button
                            type="button"
                            @click="paymentMethod = 'card'"
                            class="p-3 rounded-xl border text-center transition flex flex-col items-center gap-1.5"
                            :class="paymentMethod === 'card' ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span class="text-xs">کارت به کارت</span>
                        </button>

                        <!-- Crypto -->
                        <button
                            type="button"
                            @click="paymentMethod = 'crypto'"
                            class="p-3 rounded-xl border text-center transition flex flex-col items-center gap-1.5"
                            :class="paymentMethod === 'crypto' ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'">
                            <!-- Sparkles Icon -->
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                            </svg>
                            <span class="text-xs">تتر / رمزارز (USDT)</span>
                        </button>

                        <!-- Wire / Paya -->
                        <button
                            type="button"
                            @click="paymentMethod = 'wire'"
                            class="p-3 rounded-xl border text-center transition flex flex-col items-center gap-1.5"
                            :class="paymentMethod === 'wire' ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'">
                            <!-- Building2 Icon -->
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                                <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />
                                <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />
                                <path d="M10 6h4" />
                                <path d="M10 10h4" />
                                <path d="M10 14h4" />
                                <path d="M10 18h4" />
                            </svg>
                            <span class="text-xs">حواله پایا / ساتنا</span>
                        </button>
                    </div>

                    <template x-if="paymentMethod === 'zarinpal'">
                        <div class="p-5 rounded-2xl bg-amber-500/10 border border-amber-500/30 text-center space-y-2">
                            <div class="text-xs font-bold text-amber-300">درگاه پرداخت اینترنتی آنلاین بانکی</div>
                            <p class="text-xs text-neutral-400">با کلیه کارت‌های عضو شبکه شتاب می‌توانید سفارش خود را آنی پرداخت و فعال‌سازی نمایید.</p>
                        </div>
                    </template>

                    <template x-if="paymentMethod === 'card'">
                        <div class="p-5 rounded-2xl bg-blue-500/10 border border-blue-500/30 text-center space-y-2">
                            <div class="text-xs font-bold text-blue-300">کارت به کارت مستقیم شتاب</div>
                            <p class="text-xs text-neutral-400">شماره کارت مقصد پس از ثبت سفارش نمایش داده خواهد شد و فیش واریزی فوراً تایید می‌گردد.</p>
                        </div>
                    </template>

                    <template x-if="paymentMethod === 'crypto'">
                        <div class="p-5 rounded-2xl bg-purple-500/10 border border-purple-500/30 text-center space-y-2">
                            <div class="text-xs font-bold text-purple-300">تسویه با تتر (USDT / TRC-20 یا BEP-20)</div>
                            <p class="text-xs text-neutral-400">مناسب مشتریان بین‌المللی با تایید خودکار هش بلاک‌چین در چند ثانیه.</p>
                        </div>
                    </template>

                    <template x-if="paymentMethod === 'wire'">
                        <div class="p-5 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-center space-y-2">
                            <div class="text-xs font-bold text-emerald-300">حواله رسمی شرکتی با فاکتور رسمی رومونت</div>
                            <p class="text-xs text-neutral-400">شماره شبا و فاکتور رسمی ممهور شرکتی برای ثبت در سامانه مودیان صادر می‌شود.</p>
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
                        <template x-for="item in cart" :key="item.id">
                            <div class="flex items-center justify-between text-xs py-1 border-b border-white/5">
                                <div>
                                    <div class="font-bold text-white line-clamp-1" x-text="item.title"></div>
                                    <div class="text-[11px] text-neutral-400">
                                        <span x-text="item.quantity"></span> عدد • <span x-text="item.licenseLabel || 'استاندارد'"></span>
                                    </div>
                                </div>
                                <div class="text-amber-400 font-bold mr-2" x-text="formatCurrency(item.price * item.quantity)"></div>
                            </div>
                        </template>
                    </div>

                    <!-- Calculations -->
                    <div class="space-y-2.5 text-xs border-t border-white/10 pt-4">
                        <div class="flex justify-between text-neutral-300">
                            <span>جمع کل</span>
                            <span class="font-bold text-white" x-text="formatCurrency(getSubtotal())"></span>
                        </div>

                        <template x-if="getDiscount() > 0">
                            <div class="flex justify-between text-emerald-400">
                                <span>تخفیف (<span x-text="couponCode"></span>)</span>
                                <span>-<span x-text="formatCurrency(getDiscount())"></span></span>
                            </div>
                        </template>

                        <div class="flex justify-between text-neutral-300">
                            <span>ارزش افزوده (۹٪)</span>
                            <span class="font-bold text-white" x-text="formatCurrency(getTax())"></span>
                        </div>

                        <div class="flex justify-between text-base font-bold text-white pt-3 border-t border-white/10">
                            <span>مبلغ قابل پرداخت</span>
                            <span class="text-amber-400 font-bold text-xl" x-text="formatCurrency(getTotal())"></span>
                        </div>
                    </div>

                    <!-- Submit CTA -->
                    <button
                        type="submit"
                        :disabled="isProcessing"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500 hover:brightness-110 active:scale-95 text-black font-black text-sm transition shadow-xl shadow-amber-500/30 flex items-center justify-center gap-2 disabled:opacity-50">
                        <template x-if="isProcessing">
                            <span class="flex items-center gap-2">
                                <span class="w-4 h-4 border-2 border-black border-t-transparent rounded-full animate-spin"></span>
                                <span>در حال انتقال به درگاه پرداخت شاپرک...</span>
                            </span>
                        </template>

                        <template x-if="!isProcessing">
                            <div class="flex items-center gap-2">
                                <span>پرداخت امن <span x-text="formatCurrency(getTotal())"></span> و فعال‌سازی</span>
                                <!-- ArrowLeft Icon -->
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m12 19-7-7 7-7" />
                                    <path d="M19 12H5" />
                                </svg>
                            </div>
                        </template>
                    </button>

                    <p class="text-[11px] text-center text-neutral-500 leading-relaxed">
                        با تکمیل سفارش، شرایط و قوانین خدمات هلدینگ رومونت (Romonet.ir) و دپارتمان wpstorm را می‌پذیرید.
                    </p>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
    function romonetCheckout(config) {
        return {
            fullName: config.defaultName || 'سارا محمدی',
            email: config.defaultEmail || 'sara.mohammadi@example.com',
            company: 'آژانس دیجیتال روناک',
            country: 'ایران',
            paymentMethod: 'zarinpal',
            isProcessing: false,
            couponCode: config.initialCoupon || 'ROMONET20',

            // Cart items with fallback
            cart: config.initialCart && config.initialCart.length > 0 ? config.initialCart : [{
                    id: 'item-1',
                    title: 'قالب اختصاصی آژانسی و شرکتی Apex Studio',
                    price: 2450000,
                    quantity: 1,
                    licenseLabel: 'لایسنس تک دامنه'
                },
                {
                    id: 'item-2',
                    title: 'پلن پشتیبانی تجاری و فروشگاهی (wpstorm)',
                    price: 3880000,
                    quantity: 1,
                    licenseLabel: 'سطح تجاری'
                }
            ],

            getSubtotal() {
                return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            },

            getDiscount() {
                if (this.couponCode === 'ROMONET20') {
                    return this.getSubtotal() * 0.20;
                } else if (this.couponCode === 'WPSTORM50') {
                    return this.getSubtotal() * 0.50;
                }
                return 0;
            },

            getTax() {
                return Math.round((this.getSubtotal() - this.getDiscount()) * 0.09);
            },

            getTotal() {
                return (this.getSubtotal() - this.getDiscount()) + this.getTax();
            },

            handleCheckoutSubmit() {
                if (!this.fullName.trim() || !this.email.trim()) {
                    window.dispatchEvent(new CustomEvent('show-toast', {
                        detail: 'لطفاً نام و نام خانوادگی و ایمیل معتبر خود را وارد نمایید'
                    }));
                    return;
                }

                this.isProcessing = true;

                setTimeout(() => {
                    window.dispatchEvent(new CustomEvent('show-toast', {
                        detail: 'سفارش شما با موفقیت ثبت شد! در حال انتقال...'
                    }));

                    // Redirect to WooCommerce thank you / order received URL
                    window.location.href = config.thankYouUrl;
                }, 1200);
            },

            formatCurrency(amount) {
                return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
            }
        };
    }
</script>
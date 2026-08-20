<?php

/**
 * Template Name: سبد خرید اختصاصی رومونت
 *
 * @package Romonet_WPStorm
 */

defined('ABSPATH') || exit;

get_header();

// خواندن اطلاعات واقعی سبد خرید از ووکامرس
$wc_cart_items = array();
$wc_subtotal   = 0;
$wc_discount   = 0;
$wc_tax        = 0;
$wc_total      = 0;

if (function_exists('WC') && !is_null(WC()->cart)) {
    $wc_subtotal = WC()->cart->get_subtotal();
    $wc_discount = WC()->cart->get_discount_total();
    $wc_tax      = WC()->cart->get_taxes_total();
    $wc_total    = WC()->cart->get_total('edit');

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

        if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {

            // گرفتن ویژگی‌های متغیر محصول در صورت وجود
            $variation_data = wc_get_formatted_cart_item_data($cart_item, true);

            $wc_cart_items[] = array(
                'id'           => $cart_item_key, // شناسه سبد خرید برای آپدیت/حذف
                'productId'    => $product_id,
                'itemType'     => $_product->is_type('subscription') ? 'maintenance_plan' : 'product',
                'title'        => $_product->get_name(),
                'subtitle'     => $variation_data ? strip_tags($variation_data) : ($_product->get_short_description() ? wp_strip_all_tags($_product->get_short_description()) : ''),
                'price'        => (int) $_product->get_price(),
                'quantity'     => (int) $cart_item['quantity'],
                'licenseLabel' => '' // در صورت نیاز داینامیک شود
            );
        }
    }
}

$checkout_url = function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout');
?>

<div class="min-h-screen pb-24 pt-8" dir="rtl" x-data="romonetCartPage(<?php echo esc_attr(wp_json_encode($wc_cart_items)); ?>)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- ==================== EMPTY STATE ==================== -->
        <template x-if="cart.length === 0">
            <div class="min-h-[70vh] flex flex-col items-center justify-center p-6 text-center space-y-6">
                <div class="w-20 h-20 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-neutral-500 shadow-xl backdrop-blur-md">
                    <!-- ShoppingBag Icon -->
                    <svg class="w-10 h-10 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                        <path d="M3 6h18" />
                        <path d="M16 10a4 4 0 0 1-8 0" />
                    </svg>
                </div>

                <div class="space-y-2">
                    <h2 class="text-2xl font-bold text-white">سبد خرید شما خالی است</h2>
                    <p class="text-sm text-neutral-400 max-w-sm mx-auto leading-relaxed">
                        از قالب‌ها، افزونه‌ها یا خدمات طراحی و نگهداری دپارتمان <strong class="text-amber-400">wpstorm</strong> دیدن فرمایید.
                    </p>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a
                        href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                        class="px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition shadow-lg shadow-amber-500/25 text-center">
                        مشاهده فروشگاه
                    </a>
                    <a
                        href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>"
                        class="px-6 py-3 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold text-xs border border-white/10 transition text-center">
                        تعرفه‌های پشتیبانی سایت
                    </a>
                </div>
            </div>
        </template>

        <!-- ==================== FILLED CART ==================== -->
        <template x-if="cart.length > 0">
            <div class="space-y-8">

                <!-- Header -->
                <div class="flex items-center justify-between pb-4 border-b border-white/10">
                    <div class="space-y-1">
                        <h1 class="text-3xl font-extrabold text-white">سبد خرید</h1>
                        <p class="text-xs text-neutral-400">
                            <span x-text="totalItemsCount()"></span> مورد در سبد خرید شما موجود است
                        </p>
                    </div>

                    <button
                        type="button"
                        @click="clearCart()"
                        class="text-xs text-rose-400 hover:text-rose-300 flex items-center gap-1.5 transition">
                        <!-- Trash2 Icon -->
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 6h18" />
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            <line x1="10" x2="10" y1="11" y2="17" />
                            <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                        <span>خالی کردن سبد خرید</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

                    <!-- Cart Items List -->
                    <div class="lg:col-span-8 space-y-4">
                        <template x-for="item in cart" :key="item.id">
                            <div
                                class="glass-card p-6 rounded-2xl border border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 bg-white/5 backdrop-blur-md">
                                <div class="space-y-1 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="text-[10px] px-2 py-0.5 rounded bg-amber-500/10 text-amber-300 border border-amber-500/20"
                                            x-text="getItemTypeLabel(item.itemType)"></span>
                                        <template x-if="item.licenseLabel">
                                            <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-neutral-300 border border-white/10" x-text="item.licenseLabel"></span>
                                        </template>
                                    </div>

                                    <h3 class="text-lg font-bold text-white" x-text="item.title"></h3>

                                    <template x-if="item.subtitle">
                                        <p class="text-xs text-neutral-400" x-text="item.subtitle"></p>
                                    </template>

                                    <div class="text-xs text-emerald-400 flex items-center gap-1 pt-1">
                                        <!-- DownloadCloud Icon -->
                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                            <path d="M12 12v9" />
                                            <path d="m8 17 4 4 4-4" />
                                        </svg>
                                        <span>تحویل آنی فایل دانلود و صدور خودکار لایسنس</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-6">
                                    <!-- Quantity controls -->
                                    <div class="flex items-center bg-black/40 rounded-xl border border-white/10 p-1">
                                        <button
                                            type="button"
                                            @click="updateQuantity(item.id, -1)"
                                            class="p-1.5 rounded-lg text-neutral-400 hover:text-white hover:bg-white/10 transition">
                                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M5 12h14" />
                                            </svg>
                                        </button>
                                        <span class="px-3 text-xs font-bold text-white font-mono" x-text="item.quantity"></span>
                                        <button
                                            type="button"
                                            @click="updateQuantity(item.id, 1)"
                                            class="p-1.5 rounded-lg text-neutral-400 hover:text-white hover:bg-white/10 transition">
                                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M5 12h14" />
                                                <path d="M12 5v14" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="text-left min-w-[120px]" dir="ltr">
                                        <div class="text-lg font-extrabold text-amber-400 font-mono" x-text="formatCurrency(item.price * item.quantity)"></div>
                                        <template x-if="item.quantity > 1">
                                            <div class="text-[10px] text-neutral-500 font-mono">
                                                هر عدد <span x-text="formatCurrency(item.price)"></span>
                                            </div>
                                        </template>
                                    </div>

                                    <button
                                        type="button"
                                        @click="removeFromCart(item.id)"
                                        class="p-2 text-neutral-500 hover:text-rose-400 transition"
                                        title="حذف آیتم">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>

                        <!-- Back to shop -->
                        <div class="pt-4">
                            <a
                                href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                                class="inline-flex items-center gap-2 text-xs text-neutral-400 hover:text-amber-400 transition">
                                <!-- ArrowRight Icon -->
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14" />
                                    <path d="m12 5 7 7-7 7" />
                                </svg>
                                <span>ادامه خرید در مارکت‌پلیس محصولات</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right: Order Summary Card -->
                    <div class="lg:col-span-4 space-y-6">
                        <div class="glass-panel p-6 sm:p-8 rounded-3xl border border-white/15 bg-gradient-to-b from-[#111422] to-[#0c0f1a] space-y-6 backdrop-blur-xl">
                            <h3 class="text-lg font-bold text-white border-b border-white/10 pb-4">
                                خلاصه فاکتور سفارش
                            </h3>

                            <!-- Promo code form -->
                            <div>
                                <template x-if="couponCode">
                                    <div class="flex items-center justify-between p-3 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs">
                                        <div class="flex items-center gap-2">
                                            <!-- Tag Icon -->
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z" />
                                                <path d="M7 7h.01" />
                                            </svg>
                                            <div>
                                                کد تخفیف <span class="font-mono font-bold" x-text="couponCode"></span> با موفقیت اعمال شد!
                                            </div>
                                        </div>
                                        <button type="button" @click="couponCode = null; couponError = null;" class="underline hover:text-emerald-200">
                                            حذف
                                        </button>
                                    </div>
                                </template>

                                <template x-if="!couponCode">
                                    <form @submit.prevent="handleApplyPromo()" class="space-y-1.5">
                                        <div class="flex gap-2">
                                            <input
                                                type="text"
                                                x-model="promoInput"
                                                placeholder="کد تخفیف یا معرف"
                                                class="flex-1 bg-black/50 border border-white/10 rounded-xl px-3 py-2.5 text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-amber-400 uppercase font-mono" />
                                            <button
                                                type="submit"
                                                class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-bold transition">
                                                اعمال کد
                                            </button>
                                        </div>
                                        <template x-if="couponError">
                                            <p class="text-[11px] text-rose-400" x-text="couponError"></p>
                                        </template>
                                    </form>
                                </template>
                            </div>

                            <!-- Calculations -->
                            <div class="space-y-3 text-xs border-t border-white/10 pt-4">
                                <div class="flex justify-between text-neutral-300">
                                    <span>جمع اقلام سبد خرید</span>
                                    <span class="font-bold text-white" x-text="formatCurrency(getSubtotal())"></span>
                                </div>

                                <template x-if="getDiscount() > 0">
                                    <div class="flex justify-between text-emerald-400">
                                        <span>تخفیف ویژه (<span x-text="couponCode"></span>)</span>
                                        <span>-<span x-text="formatCurrency(getDiscount())"></span></span>
                                    </div>
                                </template>

                                <div class="flex justify-between text-base font-bold text-white pt-3 border-t border-white/10">
                                    <span>مبلغ نهایی قابل پرداخت</span>
                                    <span class="text-amber-400 text-xl font-bold" x-text="formatCurrency(getTotal())"></span>
                                </div>
                            </div>

                            <!-- Proceed to Checkout CTA -->
                            <a
                                href="<?php echo esc_url($checkout_url); ?>"
                                class="w-full py-4 rounded-xl bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500 hover:brightness-110 active:scale-95 text-black font-black text-sm transition shadow-xl shadow-amber-500/25 flex items-center justify-center gap-2 text-center">
                                <span>تکمیل اطلاعات و ثبت نهایی سفارش</span>
                                <!-- ArrowLeft Icon -->
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m12 19-7-7 7-7" />
                                    <path d="M19 12H5" />
                                </svg>
                            </a>

                            <div class="space-y-2 text-[11px] text-neutral-400 pt-2 border-t border-white/5">
                                <div class="flex items-center gap-2">
                                    <!-- ShieldCheck Icon -->
                                    <svg class="w-4 h-4 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    <span>تضمین اصالت کالا و گارانتی وجه</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <!-- Lock Icon -->
                                    <svg class="w-4 h-4 text-cyan-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                    <span>اتصال امن به درگاه‌های شاپرک</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </template>

    </div>
</div>

<script>
    function romonetCartPage(initialWcItems) {
        return {
            promoInput: '',
            couponCode: null,
            couponError: null,

            // استفاده از داده‌های واقعی سرور (و حذف دیتای فیک)
            cart: initialWcItems || [],

            totalItemsCount() {
                return this.cart.reduce((sum, i) => sum + i.quantity, 0);
            },

            updateQuantity(id, delta) {
                const item = this.cart.find(i => i.id === id);
                if (item) {
                    item.quantity += delta;
                    if (item.quantity <= 0) {
                        this.removeFromCart(id);
                    }
                    // نکته توسعه‌دهنده: در اینجا باید درخواست AJAX به ووکامرس برای آپدیت سبد خرید ارسال شود
                    // مثلا: fetch('/?wc-ajax=update_order_review' ...)
                }
            },

            removeFromCart(id) {
                const item = this.cart.find(i => i.id === id);
                this.cart = this.cart.filter(i => i.id !== id);
                if (item) {
                    window.dispatchEvent(new CustomEvent('show-toast', {
                        detail: `«${item.title}» از سبد خرید حذف شد.`
                    }));
                    // نکته توسعه‌دهنده: در اینجا باید درخواست AJAX به ووکامرس برای حذف آیتم ارسال شود
                }
            },

            clearCart() {
                this.cart = [];
                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: 'سبد خرید با موفقیت خالی شد.'
                }));
            },

            handleApplyPromo() {
                const code = this.promoInput.trim().toUpperCase();
                if (!code) return;

                // در حالت واقعی این قسمت هم باید با یک درخواست AJAX به ووکامرس اعتبارسنجی شود
                if (code === 'ROMONET20') {
                    this.couponCode = 'ROMONET20';
                    this.couponError = null;
                    window.dispatchEvent(new CustomEvent('show-toast', {
                        detail: 'کد تخفیف با موفقیت اعمال گردید!'
                    }));
                } else {
                    this.couponError = 'کد تخفیف وارد شده معتبر یا فعال نمی‌باشد.';
                }
                this.promoInput = '';
            },

            getSubtotal() {
                return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            },

            getDiscount() {
                if (this.couponCode === 'ROMONET20') {
                    return this.getSubtotal() * 0.20;
                }
                return 0;
            },

            getTax() {
                // صفر شده (در صورت نیاز می‌توانید مالیات را محاسبه کنید)
                return 0;
            },

            getTotal() {
                return (this.getSubtotal() - this.getDiscount()) + this.getTax();
            },

            getItemTypeLabel(type) {
                const labels = {
                    'product': 'محصول',
                    'sms_plan': 'اشتراک پیامک',
                    'sms_credits': 'شارژ پیامک',
                    'maintenance_plan': 'پشتیبانی وردپرس',
                    'design_package': 'طراحی سایت'
                };
                return labels[type] || 'محصول';
            },

            formatCurrency(amount) {
                return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
            }
        };
    }
</script>

<?php get_footer(); ?>
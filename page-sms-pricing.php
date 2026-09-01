<?php
/**
 * Template Name: تعرفه‌های سامانه پیامک و OTP رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-20 relative" dir="rtl" xyz-data="romonetSmsPricing()">

    <!-- 1. Header Hero -->
    <?php get_template_part('template-parts/sms/hero'); ?>

    <!-- 2. Monthly Recurring Plans -->
    <?php get_template_part('template-parts/sms/monthly', 'plans'); ?>

    <!-- 3. Interactive Estimator & Country Rate Calculator -->
    <?php get_template_part('template-parts/sms/estimator'); ?>

    <!-- 4. Prepaid Pay-As-You-Go Credit Bundles -->
    <?php get_template_part('template-parts/sms/bundles'); ?>

    <!-- 5. Telco Infrastructure Guarantees -->
    <?php get_template_part('template-parts/sms/guarantees'); ?>

    <!-- NEW: Modal for Lead Capture (SMS) -->
    <div xyz-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm transition-opacity">
        <div xyz-on:click.outside="closeBookingModal()" class="bg-[#111521] border border-white/10 rounded-3xl p-6 sm:p-8 max-w-md w-full relative shadow-[0_10px_40px_rgba(6,182,212,0.15)] overflow-hidden">
            
            <!-- Close Button -->
            <button xyz-on:click="closeBookingModal()" class="absolute top-5 left-5 text-neutral-500 hover:text-white transition z-10">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>

            <!-- Success Message State -->
            <div xyz-show="submitSuccess" class="text-center py-6 space-y-5">
                <div class="w-16 h-16 bg-cyan-500/20 text-cyan-400 rounded-full flex items-center justify-center mx-auto shadow-[0_0_30px_rgba(6,182,212,0.3)]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white">درخواست ثبت شد!</h3>
                <p class="text-sm text-neutral-400 leading-relaxed" xyz-text="successMessage"></p>
                <button xyz-on:click="closeBookingModal()" class="mt-4 w-full py-3.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-white text-sm font-bold transition">
                    بستن پنجره
                </button>
            </div>

            <!-- Lead Form State -->
            <div xyz-show="!submitSuccess" class="space-y-6">
                <div>
                    <h3 class="text-xl font-bold text-white mb-2">ثبت سفارش خدمات پیامکی</h3>
                    <p class="text-xs text-neutral-400 leading-relaxed">
                        جهت دریافت فاکتور برای 
                        <strong class="text-cyan-400 text-sm" xyz-text="activeDetails?.title"></strong> 
                        (به مبلغ <span xyz-text="activeDetails?.price ? formatCurrency(activeDetails.price) : '0'"></span>)، 
                        لطفاً شماره تماس خود را وارد نمایید.
                    </p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs text-neutral-400 mb-1.5">نام و نام خانوادگی / شرکت</label>
                        <input type="text" xyz-model="customerName" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 outline-none transition placeholder:text-neutral-600" placeholder="مثال: فروشگاه ...">
                    </div>
                    <div>
                        <label class="block text-xs text-neutral-400 mb-1.5">شماره موبایل مدیر سایت</label>
                        <input type="tel" xyz-model="customerPhone" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 outline-none transition text-left placeholder:text-neutral-600" dir="ltr" placeholder="09123456789">
                    </div>
                </div>

                <div class="pt-2">
                    <button xyz-on:click="submitSmsRequest()" xyz-bind:disabled="isSubmitting" class="w-full py-3.5 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-extrabold text-sm transition active:scale-95 flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                        <svg xyz-show="isSubmitting" class="animate-spin h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span xyz-text="isSubmitting ? 'در حال ارسال درخواست...' : 'تایید و صدور فاکتور'"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
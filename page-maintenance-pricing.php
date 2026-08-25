<?php

/**
 * Template Name: تعرفه‌های پشتیبانی و نگهداری وردپرس
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-20" dir="rtl" xyz-data="romonetMaintenancePricing()">

    <!-- ==================== HEADER HERO ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs">
                <!-- ShieldCheck Icon -->
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                    <path d="m9 12 2 2 4-4"></path>
                </svg>
                <span>پشتیبانی و نگهداری تخصصی وردپرس (wpstorm / Romonet.ir)</span>
            </div>

            <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight">
                پشتیبانی <span class="bg-gradient-to-r from-amber-400 via-amber-300 to-amber-500 bg-clip-text text-transparent">پیشگیرانه وردپرس</span> با تعهدنامه رسمی SLA
            </h1>

            <p class="text-base sm:text-lg text-neutral-300 leading-relaxed">
                دیگر نگران خراب شدن سایت هنگام آپدیت افزونه‌ها، کندی دیتابیس یا قطعی‌های سرور نباشید. تیم فنی <strong class="text-amber-400">wpstorm</strong> با پاسخگویی اضطراری ۱۵ دقیقه‌ای و تست تمام تغییرات در محیط شبیه‌ساز استیجینگ همراه شماست.
            </p>

            <!-- Billing Cycle Toggle -->
            <div class="pt-6 flex items-center justify-center gap-3">
                <div class="bg-white/5 p-1 rounded-xl border border-white/10 flex items-center backdrop-blur-md">
                    <button
                        type="button"
                        xyz-on:click="billingCycle = 'monthly'"
                        xyz-bind:class="billingCycle === 'monthly' ? 'bg-emerald-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="px-4 py-2 rounded-lg text-xs font-bold transition">
                        پرداخت ماهانه
                    </button>

                    <button
                        type="button"
                        xyz-on:click="billingCycle = 'annual'"
                        xyz-bind:class="billingCycle === 'annual' ? 'bg-emerald-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="px-4 py-2 rounded-lg text-xs font-bold transition flex items-center gap-1.5">
                        <span>پرداخت سالانه</span>
                        <span class="text-[10px] bg-black/40 text-emerald-300 px-1.5 py-0.5 rounded ">
                            ۲۰٪ تخفیف
                        </span>
                    </button>
                </div>
            </div>

        </div>
    </section>

    <!-- ==================== THREE MAIN PRICING TIERS ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <template xyz-for="plan in plans" xyz-bind:key="plan.id">
                <div
                    class="glass-panel rounded-3xl p-8 border flex flex-col justify-between transition-all relative backdrop-blur-xl"
                    xyz-bind:class="plan.popular 
            ? 'border-emerald-500/60 shadow-2xl shadow-emerald-500/10 bg-gradient-to-b from-[#0f171e] to-[#0c1017]' 
            : 'border-white/10 hover:border-white/20 bg-white/5'">
                    <!-- Popular Badge -->
                    <template xyz-if="plan.popular">
                        <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-emerald-500 text-black text-[11px] font-bold shadow-lg whitespace-nowrap">
                            پیشنهاد ویژه سایت‌های پربازدید و فروشگاهی
                        </span>
                    </template>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-2xl font-extrabold text-white" xyz-text="plan.name"></h3>
                            <p class="text-xs text-neutral-400 mt-1" xyz-text="plan.tierSubtitle"></p>
                        </div>

                        <div class="pt-2 flex items-baseline gap-2">
                            <span class="text-3xl sm:text-4xl font-black text-white" xyz-text="formatCurrency(billingCycle === 'annual' ? plan.annualPricePerMonth : plan.monthlyPrice)"></span>
                            <span class="text-xs text-neutral-400">/ ماهانه</span>
                            <template xyz-if="billingCycle === 'annual'">
                                <span class="text-[10px] text-emerald-400">تسویه سالانه</span>
                            </template>
                        </div>

                        <!-- Highlights Bar -->
                        <div class="p-3.5 rounded-xl bg-black/40 border border-white/10 space-y-1.5 text-xs">
                            <div class="flex justify-between text-neutral-300">
                                <span>زمان پاسخگویی SLA:</span>
                                <span class="text-emerald-400 font-bold" xyz-text="plan.responseTimeSLA"></span>
                            </div>
                            <div class="flex justify-between text-neutral-400 text-[11px]">
                                <span>تهیه نسخه پشتیبان:</span>
                                <span class="text-white" xyz-text="plan.backupFrequency"></span>
                            </div>
                            <div class="flex justify-between text-neutral-400 text-[11px]">
                                <span>پایش آپ‌تایم سرور:</span>
                                <span class="text-amber-400" xyz-text="plan.uptimeCheckInterval"></span>
                            </div>
                            <div class="flex justify-between text-neutral-400 text-[11px]">
                                <span>ساعات اختصاصی توسعه:</span>
                                <span class="text-cyan-400" xyz-text="plan.devHoursIncluded"></span>
                            </div>
                        </div>

                        <!-- Features List -->
                        <div class="space-y-2.5 pt-2">
                            <template xyz-for="(f, idx) in plan.features" xyz-bind:key="idx">
                                <div class="flex items-start gap-2.5 text-xs text-neutral-300">
                                    <!-- CheckCircle2 Icon -->
                                    <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    <span xyz-text="f"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Plan Action -->
                    <div class="pt-8 mt-6 border-t border-white/10">
                        <button
                            type="button"
                            xyz-on:click="subscribePlan(plan)"
                            class="w-full py-3.5 rounded-xl text-xs font-extrabold transition active:scale-95 flex items-center justify-center gap-2"
                            xyz-bind:class="plan.popular 
                ? 'bg-emerald-500 hover:bg-emerald-400 text-black shadow-lg shadow-emerald-500/25' 
                : 'bg-white/10 hover:bg-white/20 text-white'">
                            <span>سفارش اشتراک <span xyz-text="plan.name"></span></span>
                            <!-- ArrowLeft Icon -->
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m12 19-7-7 7-7" />
                                <path d="M19 12H5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </section>

    <!-- ==================== CUSTOM MAINTENANCE SCOPE ESTIMATOR ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-white/15 bg-gradient-to-r from-[#0c1219] via-[#0f1722] to-[#0c1219] space-y-8 backdrop-blur-xl">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-white/10">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs mb-2">
                        <!-- Sliders Icon -->
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="4" x2="4" y1="21" y2="14" />
                            <line x1="4" x2="4" y1="10" y2="3" />
                            <line x1="12" x2="12" y1="21" y2="12" />
                            <line x1="12" x2="12" y1="8" y2="3" />
                            <line x1="20" x2="20" y1="21" y2="16" />
                            <line x1="20" x2="20" y1="12" y2="3" />
                            <line x1="2" x2="6" y1="14" y2="14" />
                            <line x1="10" x2="14" y1="8" y2="8" />
                            <line x1="18" x2="22" y1="16" y2="16" />
                        </svg>
                        <span>شخصی‌سازی پکیج چند دامنه‌ای و سازمانی</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                        پیکربندی قرارداد پشتیبانی متناسب با تعداد سایت‌های شما
                    </h2>
                </div>
                <div class="text-xs text-neutral-400">
                    صدور آنی پیش‌فاکتور و عقد قرارداد رسمی شرکتی
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                <!-- Right Controls in RTL -->
                <div class="lg:col-span-7 space-y-6">

                    <!-- Site Count Slider -->
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs">
                            <span class="text-neutral-400">تعداد وب‌سایت‌های وردپرسی تحت پوشش:</span>
                            <span class="text-base font-bold text-white bg-black/60 px-3 py-1 rounded-lg border border-white/10 ">
                                <span xyz-text="siteCount"></span> <span xyz-text="siteCount === 1 ? 'سایت' : 'سایت (ناوگان)'"></span>
                            </span>
                        </div>
                        <input
                            type="range"
                            min="1"
                            max="20"
                            xyz-model.number="siteCount"
                            class="w-full h-2 bg-neutral-700 rounded-lg appearance-none cursor-pointer accent-emerald-400" />
                    </div>

                    <!-- Toggles -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <button
                            type="button"
                            xyz-on:click="isEcommerce = !isEcommerce"
                            xyz-bind:class="isEcommerce ? 'bg-emerald-500/15 border-emerald-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'"
                            class="p-4 rounded-xl border text-right transition flex items-center justify-between">
                            <div>
                                <div class="text-xs font-bold text-white">فروشگاه ووکامرس فعال</div>
                                <div class="text-[11px] text-neutral-400">پایش ۲۴ ساعته فرآیند تسویه‌حساب و پرداخت</div>
                            </div>
                            <svg class="w-5 h-5" xyz-bind:class="isEcommerce ? 'text-emerald-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                        </button>

                        <button
                            type="button"
                            xyz-on:click="needs15mSla = !needs15mSla"
                            xyz-bind:class="needs15mSla ? 'bg-emerald-500/15 border-emerald-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'"
                            class="p-4 rounded-xl border text-right transition flex items-center justify-between">
                            <div>
                                <div class="text-xs font-bold text-white">پاسخگویی اضطراری ۱۵ دقیقه‌ای</div>
                                <div class="text-[11px] text-neutral-400">تیم مهندسی آماده‌باش ۲۴/۷/۳۶۵</div>
                            </div>
                            <svg class="w-5 h-5" xyz-bind:class="needs15mSla ? 'text-emerald-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                        </button>
                    </div>

                    <!-- Included Dev Hours -->
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs">
                            <span class="text-neutral-400">ساعت ماهانه اختصاصی برای توسعه و تغییرات قالب:</span>
                            <span class="text-xs font-bold text-white bg-black/60 px-3 py-1 rounded-lg border border-white/10 ">
                                <span xyz-text="extraDevHours"></span> ساعت در ماه
                            </span>
                        </div>
                        <input
                            type="range"
                            min="0"
                            max="20"
                            step="2"
                            xyz-model.number="extraDevHours"
                            class="w-full h-2 bg-neutral-700 rounded-lg appearance-none cursor-pointer accent-emerald-400" />
                    </div>

                </div>

                <!-- Left Quote Card in RTL -->
                <div class="lg:col-span-5 bg-gradient-to-br from-[#101824] to-[#0a0f18] p-6 sm:p-8 rounded-2xl border border-emerald-500/30 space-y-6">
                    <h3 class="text-base font-bold text-white border-b border-white/10 pb-3">
                        خلاصه پلن سفارشی شما
                    </h3>

                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between text-neutral-300">
                            <span>تعداد سایت‌ها:</span>
                            <span class="text-white "><span xyz-text="siteCount"></span> دامنه فعال</span>
                        </div>
                        <div class="flex justify-between text-neutral-300">
                            <span>نوع معماری:</span>
                            <span class="text-emerald-400" xyz-text="isEcommerce ? 'فروشگاهی ووکامرس پربازدید' : 'شرکتی / پرتال وردپرس'"></span>
                        </div>
                        <div class="flex justify-between text-neutral-300">
                            <span>سطح پاسخگویی SLA:</span>
                            <span class="text-emerald-400" xyz-text="needs15mSla ? '۱۵ دقیقه اضطراری (۲۴ ساعته)' : '۱ ساعت استاندارد'"></span>
                        </div>
                        <div class="flex justify-between text-neutral-300">
                            <span>ساعات توسعه و تغییرات:</span>
                            <span class="text-amber-400 "><span xyz-text="extraDevHours"></span> ساعت در ماه</span>
                        </div>
                        <div class="flex justify-between text-base font-bold text-white pt-3 border-t border-white/10">
                            <span>سرمایه‌گذاری ماهانه:</span>
                            <span class="text-emerald-400 font-bold text-xl"><span xyz-text="formatCurrency(calculateCustomMonthly())"></span>/ماه</span>
                        </div>
                    </div>

                    <button
                        type="button"
                        xyz-on:click="orderCustomPlan()"
                        class="w-full py-3.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-black font-extrabold text-xs transition active:scale-95 shadow-lg shadow-emerald-500/25 text-center">
                        <span>ثبت سفارش پلن سفارشی (<span xyz-text="formatCurrency(calculateCustomMonthly())"></span>)</span>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== SECURITY PROTOCOLS BREAKDOWN ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Feature 1: Staging -->
            <div class="glass-card p-6 rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                    <!-- RefreshCw Icon -->
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8" />
                        <path d="M21 3v5h-5" />
                        <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16" />
                        <path d="M8 16H3v5" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-white">تست تغییرات در استیجینگ شبیه‌ساز</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">
                    هرگونه به‌روزرسانی قالب یا افزونه ابتدا در سرور استیجینگ کلون شده و با مقایسه خودکار اسکرین‌شات‌ها بررسی می‌شود، سپس روی سایت اصلی اعمال خواهد شد.
                </p>
            </div>

            <!-- Feature 2: 15m Response -->
            <div class="glass-card p-6 rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center">
                    <!-- Clock Icon -->
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-white">پاسخگویی ۱۵ دقیقه‌ای تیم مهندسی</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">
                    در صورت بروز هرگونه اختلال پیش‌بینی‌نشده در پایگاه‌داده یا سرور، سیستم مانیتورینگ رومونت بلافاصله مهندس کشیک را آگاه کرده و مشکل سریعاً برطرف می‌شود.
                </p>
            </div>

            <!-- Feature 3: Malware Guarantee -->
            <div class="glass-card p-6 rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center">
                    <!-- Lock Icon -->
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-white">گارانتی پاکسازی بدافزار و ویروس</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">
                    در صورت نفوذ به لایه‌های امنیتی، کارشناسان امنیت سایبری wpstorm فایل‌ها را ایزوله و پایگاه‌داده را بدون دریافت هیچ‌گونه هزینه اضافه پاکسازی کامل می‌کنند.
                </p>
            </div>

        </div>
    </section>

</main>

<script>
    function romonetMaintenancePricing() {
        return {
            billingCycle: 'annual',

            // Scope Calculator State
            siteCount: 1,
            isEcommerce: true,
            needs15mSla: false,
            extraDevHours: 2,

            plans: [{
                    id: 'plan-starter',
                    name: 'پایه و شرکتی',
                    tierSubtitle: 'مناسب سایت‌های شخصی، نمونه‌کار و وبلاگ‌های شرکتی',
                    monthlyPrice: 2450000,
                    annualPricePerMonth: 1960000,
                    popular: false,
                    responseTimeSLA: 'حداکثر ۲ ساعت',
                    backupFrequency: 'روزانه (نگهداری ۳۰ روز)',
                    uptimeCheckInterval: 'هر ۵ دقیقه',
                    devHoursIncluded: '۱ ساعت در ماه',
                    features: [
                        'به‌روزرسانی امن هسته، قالب و تمام افزونه‌ها',
                        'پایش مداوم ۲۴ ساعته آپ‌تایم و در دسترس بودن سرور',
                        'بک‌آپ روزانه ابری در ۲ دیتاسنتر مجزا',
                        'گزارش ماهانه سلامت فنی، سئو و سرعت لود',
                        'پشتیبانی تیکتی در ساعات اداری'
                    ]
                },
                {
                    id: 'plan-business',
                    name: 'تجاری و فروشگاهی',
                    tierSubtitle: 'ایده‌آل برای فروشگاه‌های ووکامرس فعال و وب‌سایت‌های پرترافیک',
                    monthlyPrice: 4850000,
                    annualPricePerMonth: 3880000,
                    popular: true,
                    responseTimeSLA: '۳۰ دقیقه اضطراری',
                    backupFrequency: 'ساعتی (پایگاه‌داده و سفارشات)',
                    uptimeCheckInterval: 'هر ۱ دقیقه',
                    devHoursIncluded: '۳ ساعت در ماه',
                    features: [
                        'تست تغییرات در سرور استیجینگ شبیه‌ساز قبل از انتشار',
                        'پایش لحظه‌ای درگاه‌های بانکی و تراکنش‌های ناموفق',
                        'بک‌آپ ساعتی زنده از جدول سفارشات و مشتریان',
                        'بهینه‌سازی مستمر دیتابیس و کش آبجکت ردیس (Redis)',
                        'اسکن امنیتی خودکار و فایروال WAF اختصاصی',
                        'پشتیبانی اولویت‌دار ۲۴/۷ حتی در روزهای تعطیل'
                    ]
                },
                {
                    id: 'plan-enterprise',
                    name: 'سازمانی و پربازدید',
                    tierSubtitle: 'مخصوص پرتال‌های بزرگ، هلدینگ‌ها و ترافیک‌های بسیار سنگین',
                    monthlyPrice: 9800000,
                    annualPricePerMonth: 7840000,
                    popular: false,
                    responseTimeSLA: '۱۵ دقیقه اضطراری (تیم اختصاصی)',
                    backupFrequency: 'همگام‌سازی لحظه‌ای (Real-time)',
                    uptimeCheckInterval: 'هر ۳۰ ثانیه',
                    devHoursIncluded: '۸ ساعت در ماه',
                    features: [
                        'مدیر فنی اختصاصی و خط تماس اضطراری مستقیم',
                        'قرارداد مکتوب و رسمی SLA با پرداخت خسارت قطعی',
                        'مدیریت و تیونینگ مستقیم وب‌سرور (Nginx/LiteSpeed)',
                        'بهینه‌سازی تخصصی کوئری‌های سنگین دیتابیس',
                        'گارانتی بازیابی زیر ۱۰ دقیقه در شرایط بحرانی (Disaster Recovery)',
                        'تست نفوذ دوره‌ای و پایش روز صفر (Zero-Day)'
                    ]
                }
            ],

            calculateCustomMonthly() {
                const baseCost = this.isEcommerce ? 4200000 : 2500000;
                const siteMultiplier = this.siteCount === 1 ? 1 : this.siteCount * 0.85;
                const slaAddon = this.needs15mSla ? 2800000 : 0;
                const devHoursAddon = this.extraDevHours * 650000;
                return Math.round((baseCost * siteMultiplier) + slaAddon + devHoursAddon);
            },

            subscribePlan(plan) {
                const price = this.billingCycle === 'annual' ? plan.annualPricePerMonth : plan.monthlyPrice;

                // Push into header cart if available
                if (typeof this.cart !== 'undefined') {
                    this.cart.push({
                        id: 'maint-' + plan.id + '-' + Date.now(),
                        itemType: 'maintenance_plan',
                        title: `پلن پشتیبانی ${plan.name} (wpstorm)`,
                        subtitle: `${plan.responseTimeSLA} پاسخگویی SLA • پرداخت ${this.billingCycle === 'annual' ? 'سالانه' : 'ماهانه'}`,
                        price: price,
                        quantity: 1,
                        billingPeriod: this.billingCycle,
                        licenseLabel: `سطح پشتیبانی ${plan.name}`
                    });
                    this.isCartDrawerOpen = true;
                }

                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `پلن پشتیبانی «${plan.name}» (${this.formatCurrency(price)}/ماه) به سبد سفارشات افزوده شد.`
                }));
            },

            orderCustomPlan() {
                const cost = this.calculateCustomMonthly();

                if (typeof this.cart !== 'undefined') {
                    this.cart.push({
                        id: 'custom-maint-' + Date.now(),
                        itemType: 'maintenance_plan',
                        title: `پلن سفارشی پشتیبانی (${this.siteCount} سایت)`,
                        subtitle: `${this.needs15mSla ? 'پاسخگویی ۱۵ دقیقه‌ای' : 'پاسخگویی ۱ ساعته'} • ${this.extraDevHours} ساعت توسعه`,
                        price: cost,
                        quantity: 1,
                        billingPeriod: 'monthly',
                        licenseLabel: `قرارداد پشتیبانی ${this.siteCount} سایته`
                    });
                    this.isCartDrawerOpen = true;
                }

                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `پلن سفارشی ${this.siteCount} سایته (${this.formatCurrency(cost)}/ماه) به سبد سفارشات افزوده شد.`
                }));
            },

            formatCurrency(amount) {
                return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
            }
        };
    }
</script>

<?php
get_footer();

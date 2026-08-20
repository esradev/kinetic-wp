<?php

/**
 * Template Name: تعرفه‌های طراحی سایت اختصاصی
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-20" dir="rtl" x-data="romonetDesignPricing()">

    <!-- ==================== HEADER HERO ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs">
                <!-- Layers Icon -->
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"></path>
                    <path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"></path>
                    <path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"></path>
                </svg>
                <span>مهندسی و طراحی اختصاصی دپارتمان wpstorm (Romonet.ir)</span>
            </div>

            <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight">
                تعرفه‌های <span class="bg-gradient-to-r from-amber-400 via-amber-300 to-amber-500 bg-clip-text text-transparent">طراحی سایت و فروشگاه اختصاصی</span> وردپرس
            </h1>

            <p class="text-base sm:text-lg text-neutral-300 leading-relaxed">
                ما صفحه‌سازهای سنگین را با سیستم طراحی دیزاین سیستم فیگما، بلوک‌های اختصاصی ری‌اکت در گوتنبرگ و تضمین سرعت لود زیر ۱۸۰ میلی‌ثانیه جایگزین کرده‌ایم.
            </p>
        </div>
    </section>

    <!-- ==================== 3 CORE DESIGN PACKAGES ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <template x-for="pkg in packages" :key="pkg.id">
                <div
                    class="glass-panel rounded-3xl p-8 border flex flex-col justify-between transition-all relative backdrop-blur-xl"
                    :class="pkg.popular 
            ? 'border-amber-500/60 shadow-2xl shadow-amber-500/10 bg-gradient-to-b from-[#18140c] to-[#0f0e0c]' 
            : 'border-white/10 hover:border-white/20 bg-white/5'">
                    <!-- Popular Badge -->
                    <template x-if="pkg.badge">
                        <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-amber-500 text-black text-[11px] font-bold shadow-lg" x-text="pkg.badge"></span>
                    </template>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-2xl font-extrabold text-white" x-text="pkg.title"></h3>
                            <p class="text-xs text-neutral-400 mt-1" x-text="pkg.idealFor"></p>
                        </div>

                        <div class="pt-2 flex items-baseline gap-2">
                            <span class="text-xs text-neutral-400">شروع سرمایه‌گذاری از</span>
                            <span class="text-3xl sm:text-4xl font-black text-white" x-text="formatCurrency(pkg.priceStartingAt)"></span>
                        </div>

                        <div class="p-3.5 rounded-xl bg-black/40 border border-white/10 space-y-1 text-xs">
                            <div class="flex justify-between text-neutral-300">
                                <span>مدت زمان اسپرینت تحویل:</span>
                                <span class="text-amber-400 font-bold" x-text="pkg.timeline"></span>
                            </div>
                            <div class="flex justify-between text-neutral-400 text-[11px]">
                                <span>تضمین امتیاز سرعت موبایل:</span>
                                <span class="text-emerald-400 font-bold">۱۰۰ از ۱۰۰ گوگل</span>
                            </div>
                        </div>

                        <p class="text-xs text-neutral-300 leading-relaxed" x-text="pkg.description"></p>

                        <!-- Deliverables -->
                        <div class="space-y-2.5 pt-2">
                            <div class="text-[11px] text-neutral-400 font-semibold">اقلام تحویلی در این پکیج:</div>
                            <template x-for="(d, idx) in pkg.deliverables" :key="idx">
                                <div class="flex items-start gap-2.5 text-xs text-neutral-300">
                                    <!-- CheckCircle2 Icon -->
                                    <svg class="w-4 h-4 text-amber-400 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    <span x-text="d"></span>
                                </div>
                            </template>
                        </div>

                        <!-- Tech Stack Badges -->
                        <div class="pt-2">
                            <div class="text-[11px] text-neutral-400 font-semibold mb-2">استک فنی مدرن:</div>
                            <div class="flex flex-wrap gap-1.5">
                                <template x-for="(tech, idx) in pkg.techStack" :key="idx">
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-amber-300 border border-white/10 font-mono" x-text="tech"></span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="pt-8 mt-6 border-t border-white/10">
                        <button
                            @click="bookPackageSprint(pkg)"
                            class="w-full py-3.5 rounded-xl text-xs font-extrabold transition active:scale-95 flex items-center justify-center gap-2"
                            :class="pkg.popular 
                ? 'bg-amber-500 hover:bg-amber-400 text-black shadow-lg shadow-amber-500/25' 
                : 'bg-white/10 hover:bg-white/20 text-white'">
                            <span>رزرو اسپرینت و پرداخت بیعانه (<span x-text="formatCurrency(Math.round(pkg.priceStartingAt * 0.5))"></span>)</span>
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

    <!-- ==================== INTERACTIVE SCOPE & SPRINT ESTIMATOR ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-white/15 bg-gradient-to-r from-[#14110b] via-[#1b150c] to-[#14110b] space-y-8 backdrop-blur-xl">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-white/10">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs mb-2">
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
                        <span>محاسبه‌گر آنلاین هزینه و زمان‌بندی پروژه</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                        پیکربندی هوشمند مشخصات و برآورد اسپرینت
                    </h2>
                </div>
                <div class="text-xs text-neutral-400">
                    قیمت کاملاً مقطوع بدون هزینه‌های پنهان آتی
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                <!-- Right Controls in RTL -->
                <div class="lg:col-span-7 space-y-6">

                    <!-- Project Type Selector -->
                    <div class="space-y-2">
                        <label class="text-xs text-neutral-400">دسته‌بندی اصلی پروژه شما</label>
                        <div class="grid grid-cols-3 gap-2">
                            <button
                                type="button"
                                @click="projectType = 'brand'"
                                :class="projectType === 'brand' 
                  ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' 
                  : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'"
                                class="p-3 rounded-xl border text-center transition">
                                <div class="text-xs">شرکتی و سازمانی</div>
                                <div class="text-[10px] text-neutral-500">طراحی برند بوک</div>
                            </button>

                            <button
                                type="button"
                                @click="projectType = 'store'"
                                :class="projectType === 'store' 
                  ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' 
                  : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'"
                                class="p-3 rounded-xl border text-center transition">
                                <div class="text-xs">فروشگاه ووکامرس</div>
                                <div class="text-[10px] text-neutral-500">معماری تبدیل بالا</div>
                            </button>

                            <button
                                type="button"
                                @click="projectType = 'headless'"
                                :class="projectType === 'headless' 
                  ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' 
                  : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'"
                                class="p-3 rounded-xl border text-center transition">
                                <div class="text-xs">هدلس Next.js 15</div>
                                <div class="text-[10px] text-neutral-500">React Micro-Frontend</div>
                            </button>
                        </div>
                    </div>

                    <!-- Page Count Slider -->
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs">
                            <span class="text-neutral-400">تعداد صفحات و تمپلیت‌های اختصاصی:</span>
                            <span class="text-base font-bold text-white bg-black/60 px-3 py-1 rounded-lg border border-white/10 font-mono">
                                <span x-text="pageCount"></span> قالب صفحه
                            </span>
                        </div>
                        <input
                            type="range"
                            min="3"
                            max="25"
                            x-model.number="pageCount"
                            class="w-full h-2 bg-neutral-700 rounded-lg appearance-none cursor-pointer accent-amber-400" />
                    </div>

                    <!-- Add-on Features Toggles -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <button
                            type="button"
                            @click="needsCustomBlocks = !needsCustomBlocks"
                            :class="needsCustomBlocks ? 'bg-amber-500/15 border-amber-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'"
                            class="p-3 rounded-xl border text-right flex items-center justify-between transition">
                            <div class="text-xs">توسعه بلوک‌های اختصاصی ری‌اکت در گوتنبرگ</div>
                            <svg class="w-4 h-4" :class="needsCustomBlocks ? 'text-amber-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                        </button>

                        <button
                            type="button"
                            @click="needsMigration = !needsMigration"
                            :class="needsMigration ? 'bg-amber-500/15 border-amber-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'"
                            class="p-3 rounded-xl border text-right flex items-center justify-between transition">
                            <div class="text-xs">انتقال کامل محتوا و ریدایرکت‌های ۳۰۱ سئو</div>
                            <svg class="w-4 h-4" :class="needsMigration ? 'text-amber-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                        </button>

                        <button
                            type="button"
                            @click="needsCustomApi = !needsCustomApi"
                            :class="needsCustomApi ? 'bg-amber-500/15 border-amber-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'"
                            class="p-3 rounded-xl border text-right flex items-center justify-between transition">
                            <div class="text-xs">اتصال دوطرفه به وب‌سرویس و نرم‌افزار حسابداری/CRM</div>
                            <svg class="w-4 h-4" :class="needsCustomApi ? 'text-amber-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                        </button>

                        <button
                            type="button"
                            @click="needsSpeedGuarantee = !needsSpeedGuarantee"
                            :class="needsSpeedGuarantee ? 'bg-amber-500/15 border-amber-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'"
                            class="p-3 rounded-xl border text-right flex items-center justify-between transition">
                            <div class="text-xs">تضمین کتبی رتبه ۱۰۰ Core Web Vitals گوگل</div>
                            <svg class="w-4 h-4" :class="needsSpeedGuarantee ? 'text-amber-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                        </button>
                    </div>

                </div>

                <!-- Left Quote Summary Card in RTL -->
                <div class="lg:col-span-5 bg-gradient-to-br from-[#1c160e] to-[#0f0c08] p-6 sm:p-8 rounded-2xl border border-amber-500/40 space-y-6">
                    <h3 class="text-base font-bold text-white border-b border-white/10 pb-3">
                        خلاصه برآورد پروژه اختصاصی
                    </h3>

                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between text-neutral-300">
                            <span>نوع معماری:</span>
                            <span class="text-white" x-text="projectType === 'brand' ? 'سایت شرکتی / آژانسی' : projectType === 'store' ? 'فروشگاه تخصصی ووکامرس' : 'پرتال هدلس Next.js'"></span>
                        </div>

                        <div class="flex justify-between text-neutral-300">
                            <span>تعداد قالب‌های اختصاصی:</span>
                            <span class="font-mono text-white"><span x-text="pageCount"></span> تمپلیت</span>
                        </div>

                        <div class="flex justify-between text-neutral-300">
                            <span>زمان اسپرینت تحویل:</span>
                            <span class="text-amber-400 font-bold" x-text="estimatedTimeline()"></span>
                        </div>

                        <div class="flex justify-between text-base font-bold text-white pt-3 border-t border-white/10">
                            <span>کل برآورد سرمایه‌گذاری:</span>
                            <span class="text-amber-400 font-bold text-xl" x-text="formatCurrency(calculateTotal())"></span>
                        </div>

                        <div class="flex justify-between text-xs text-neutral-400">
                            <span>بیعانه ۵۰٪ شروع پروژه:</span>
                            <span class="text-white font-bold" x-text="formatCurrency(Math.round(calculateTotal() * 0.5))"></span>
                        </div>
                    </div>

                    <button
                        type="button"
                        @click="bookCustomSprint()"
                        class="w-full py-3.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition active:scale-95 shadow-lg shadow-amber-500/25 text-center">
                        <span>رزرو نوبت اسپرینت با پیش‌پرداخت (<span x-text="formatCurrency(Math.round(calculateTotal() * 0.5))"></span>)</span>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== 5-PHASE SPRINT ROADMAP ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-12 space-y-2">
            <div class="text-xs text-amber-400 font-semibold">
                متدولوژی مهندسی ما
            </div>
            <h2 class="text-3xl font-extrabold text-white">
                مراحل ۵‌گانه اسپرینت توسعه در wpstorm
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="glass-card p-5 rounded-2xl border border-white/10 space-y-2 relative bg-white/5 backdrop-blur-md">
                <span class="text-2xl font-black font-mono text-amber-500/30">۰۱</span>
                <h3 class="text-sm font-bold text-white">شناخت و معماری داده</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">تعریف انواع پست‌های سفارشی، پلن ایندکس دیتابیس و ساختار اطلاعاتی.</p>
            </div>

            <div class="glass-card p-5 rounded-2xl border border-white/10 space-y-2 relative bg-white/5 backdrop-blur-md">
                <span class="text-2xl font-black font-mono text-amber-500/30">۰۲</span>
                <h3 class="text-sm font-bold text-white">کیت دیزاین فیگما</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">طراحی اجزای واکنش‌گرا، تایپوگرافی اختصاصی و حالت‌های مختلف موبایل.</p>
            </div>

            <div class="glass-card p-5 rounded-2xl border border-white/10 space-y-2 relative bg-white/5 backdrop-blur-md">
                <span class="text-2xl font-black font-mono text-amber-500/30">۰۳</span>
                <h3 class="text-sm font-bold text-white">کدنویسی بلوک‌ها</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">توسعه بلوک‌های بومی گوتنبرگ با ری‌اکت و افکت‌های مینیمال پرسرعت.</p>
            </div>

            <div class="glass-card p-5 rounded-2xl border border-white/10 space-y-2 relative bg-white/5 backdrop-blur-md">
                <span class="text-2xl font-black font-mono text-amber-500/30">۰۴</span>
                <h3 class="text-sm font-bold text-white">تست سرعت و امنیت</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">رساندن امتیاز Core Web Vitals به ۱۰۰ و اسکن نفوذپذیری روز صفر.</p>
            </div>

            <div class="glass-card p-5 rounded-2xl border border-white/10 space-y-2 relative bg-white/5 backdrop-blur-md">
                <span class="text-2xl font-black font-mono text-amber-500/30">۰۵</span>
                <h3 class="text-sm font-bold text-white">راه‌اندازی بدون قطعی</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">تنظیم شبکه توزیع محتوا، بهینه‌سازی کش سرور و ۶۰ روز گارانتی بی‌قیدوشرط.</p>
            </div>
        </div>
    </section>

</main>

<script>
    function romonetDesignPricing() {
        return {
            // Project Estimator State
            projectType: 'store',
            pageCount: 8,
            needsCustomBlocks: true,
            needsMigration: true,
            needsSpeedGuarantee: true,
            needsCustomApi: false,

            packages: [{
                    id: 'brand-sprint',
                    title: 'اسپرینت اختصاصی شرکتی و آژانسی',
                    idealFor: 'برندهای پیشرو، شرکت‌های B2B و استارتاپ‌های در حال رشد',
                    priceStartingAt: 38500000,
                    timeline: '۲ الی ۳ هفته کاری',
                    popular: false,
                    description: 'طراحی اختصاصی از صفر در فیگما و پیاده‌سازی بلوک‌های فوق سبک گوتنبرگ با رعایت کامل هویت بصری، سئو و سرعت لود رعدآسا.',
                    deliverables: [
                        'طراحی اختصاصی UI/UX در فیگما با دیزاین سیستم کامل',
                        'کدنویسی ۱۰ بلوک سفارشی گوتنبرگ با ری‌اکت',
                        'بهینه‌سازی ۱۰۰٪ تصاویر با فرمت WebP/AVIF',
                        'تنظیمات سئو تکنیکال و اسکیما استراکچر'
                    ],
                    techStack: ['Figma UI', 'Gutenberg Blocks', 'Tailwind CSS', 'PHP 8.3']
                },
                {
                    id: 'store-turbo',
                    title: 'معماری فروشگاه پرسرعت ووکامرس',
                    idealFor: 'فروشگاه‌های آنلاین با ترافیک بالا و بیش از ۱۰۰۰ محصول',
                    badge: 'انتخاب اول برندها',
                    priceStartingAt: 68000000,
                    timeline: '۳ الی ۵ هفته کاری',
                    popular: true,
                    description: 'سبد خرید شناور ایجکس، تسویه‌حساب تک‌مرحله‌ای، فیلترهای آنی بدون رفرش و پایگاه داده بهینه‌شده برای حراجی‌ها و کمپین‌های پرفشار.',
                    deliverables: [
                        'طراحی اختصاصی صفحات محصول، دسته‌بندی و تسویه‌حساب',
                        'پیاده‌سازی سبد خرید کشویی Ajax Drawer',
                        'اتصال به سامانه پیامک خدماتی رومونت (کد تایید OTP)',
                        'بهینه‌سازی کوئری‌های SQL برای تحمل ۱۰ هزار کاربر همزمان',
                        'گارانتی ۶۰ روزه نرخ تبدیل و پشتیبانی طلایی'
                    ],
                    techStack: ['WooCommerce High-Perf', 'Ajax Engine', 'Redis Object Cache', 'Romonet SMS API']
                },
                {
                    id: 'headless-enterprise',
                    title: 'سامانه هدلس وردپرس (Next.js 15)',
                    idealFor: 'سازمان‌های بزرگ، پلتفرم‌های مقیاس‌پذیر و ترافیک میلیونی',
                    badge: 'سازمانی',
                    priceStartingAt: 128000000,
                    timeline: '۶ الی ۸ هفته کاری',
                    popular: false,
                    description: 'جداسازی کامل فرانت‌اند با Next.js 15 App Router، کش Edge جهانی و پنل مدیریت امن وردپرس در بک‌اند برای حداکثر انعطاف.',
                    deliverables: [
                        'فرانت‌اند React 19 / Next.js 15 با ISR و کش Edge',
                        'اتصال GraphQL / REST API اختصاصی فوق امن',
                        'سرعت پاسخگویی سرور (TTFB) کمتر از ۵۰ میلی‌ثانیه',
                        'امنیت بی‌نقص بدون دسترسی عمومی به فایل‌های وردپرس',
                        'استقرار روی سرورهای ابری اختصاصی و CDN رومونت'
                    ],
                    techStack: ['Next.js 15', 'WP GraphQL', 'TypeScript', 'Edge Cache', 'Cloudflare']
                }
            ],

            calculateTotal() {
                let baseRate = this.projectType === 'brand' ? 38500000 : this.projectType === 'store' ? 68000000 : 128000000;
                let pageAddon = Math.max(0, this.pageCount - 5) * 2800000;
                let blocksAddon = this.needsCustomBlocks ? 8500000 : 0;
                let migrationAddon = this.needsMigration ? 6500000 : 0;
                let apiAddon = this.needsCustomApi ? 14500000 : 0;
                let speedAddon = this.needsSpeedGuarantee ? 4500000 : 0;
                return baseRate + pageAddon + blocksAddon + migrationAddon + apiAddon + speedAddon;
            },

            estimatedTimeline() {
                if (this.projectType === 'brand') return '۲ الی ۳ هفته';
                if (this.projectType === 'store') return '۴ الی ۵ هفته';
                return '۶ الی ۸ هفته';
            },

            bookPackageSprint(pkg) {
                const depositAmount = Math.round(pkg.priceStartingAt * 0.5);

                // Add to Alpine header cart if available
                if (typeof this.cart !== 'undefined') {
                    this.cart.push({
                        id: 'sprint-' + pkg.id + '-' + Date.now(),
                        itemType: 'design_package',
                        title: `${pkg.title} (پیش‌پرداخت اسپرینت)`,
                        subtitle: `اسپرینت ${pkg.timeline} • ۵۰٪ بیعانه رزرو`,
                        price: depositAmount,
                        quantity: 1,
                        licenseLabel: '۵۰٪ بیعانه شروع پروژه'
                    });
                    this.isCartDrawerOpen = true;
                }

                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `اسپرینت «${pkg.title}» با بیعانه ${this.formatCurrency(depositAmount)} به سبد سفارشات افزوده شد.`
                }));
            },

            bookCustomSprint() {
                const total = this.calculateTotal();
                const depositAmount = Math.round(total * 0.5);
                const typeLabel = this.projectType === 'brand' ? 'شرکتی' : this.projectType === 'store' ? 'فروشگاهی' : 'هدلس';

                // Add to Alpine header cart if available
                if (typeof this.cart !== 'undefined') {
                    this.cart.push({
                        id: 'custom-sprint-' + Date.now(),
                        itemType: 'design_package',
                        title: `پکیج طراحی اختصاصی سفارشی (${typeLabel})`,
                        subtitle: `${this.pageCount} قالب صفحه • زمان ${this.estimatedTimeline()} • ۵۰٪ بیعانه`,
                        price: depositAmount,
                        quantity: 1,
                        licenseLabel: 'بیعانه ۵۰٪ اسپرینت سفارشی'
                    });
                    this.isCartDrawerOpen = true;
                }

                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `پکیج سفارشی ${typeLabel} (${this.formatCurrency(depositAmount)}) به سبد سفارشات اضافه شد.`
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

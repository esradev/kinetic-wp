<?php

/**
 * The template for displaying the Front Page / Home Page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen space-y-24 pb-20" dir="rtl" x-data="romonetFrontPage()">

    <!-- ==================== HERO SECTION ==================== -->
    <section class="relative pt-12 md:pt-20 overflow-hidden">
        <!-- Ambient Gradients -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[600px] bg-radial from-amber-500/15 via-purple-600/5 to-transparent blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto space-y-6">

                <!-- Top Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/5 border border-white/15 text-amber-300 text-xs font-medium shadow-inner">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                    <span>هلدینگ رومونت (Romonet.ir) & دپارتمان تخصصی وردپرس wpstorm</span>
                    <span class="text-neutral-500">|</span>
                    <span class="text-neutral-400">تضمین سرعت ۱۰۰/۱۰۰ در موبایل</span>
                </div>

                <!-- Headline -->
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-white leading-[1.2]">
                    ما وردپرس را برای برندهایی می‌سازیم که حاضر نیستند 
                    <span class="bg-linear-to-r from-amber-400 via-amber-300 to-amber-500 bg-clip-text text-transparent">کُند</span> باشند.
                </h1>

                <!-- Subheading -->
                <p class="text-lg sm:text-xl text-neutral-300 max-w-2xl mx-auto font-normal leading-relaxed">
                    طراحی اختصاصی سایت با بلوک‌های بومی گوتنبرگ در <strong class="text-amber-400">wpstorm</strong>، پشتیبانی ۲۴ ساعته با قرارداد رسمی SLA، سامانه پیامک فوق سریع <strong class="text-white">رومونت (Romonet.ir)</strong> و قالب‌های پرسرعت ووکامرس.
                </p>

                <!-- Hero CTAs -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a
                        href="<?php echo esc_url(home_url('/site-design-pricing')); ?>"
                        class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500 hover:brightness-110 text-black font-extrabold text-sm shadow-xl shadow-amber-500/25 active:scale-95 transition-all flex items-center justify-center gap-2">
                        <span>مشاهده تعرفه‌های طراحی و اسپرینت‌ها</span>
                        <!-- ArrowLeft Icon -->
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </a>

                    <a
                        href="<?php echo esc_url(home_url('/shop')); ?>"
                        class="w-full sm:w-auto px-8 py-4 rounded-xl glass-card hover:bg-white/10 text-white font-bold text-sm border border-white/15 hover:border-amber-400/40 transition active:scale-95 flex items-center justify-center gap-2 bg-white/5 backdrop-blur-md">
                        <!-- Sparkles Icon -->
                        <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                        </svg>
                        <span>فروشگاه قالب‌ها و افزونه‌های wpstorm</span>
                    </a>
                </div>

                <!-- Live Metrics Trust Bar -->
                <div class="pt-12 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                    <div class="glass-card p-4 rounded-xl text-center border border-white/10 bg-white/5 backdrop-blur-md">
                        <div class="text-2xl sm:text-3xl font-black  text-amber-400">۹۹.۸٪</div>
                        <div class="text-xs text-neutral-400 mt-1">قبولی در تست Core Web Vitals</div>
                    </div>
                    <div class="glass-card p-4 rounded-xl text-center border border-white/10 bg-white/5 backdrop-blur-md">
                        <div class="text-2xl sm:text-3xl font-black  text-cyan-400">&lt; ۰.۳s</div>
                        <div class="text-xs text-neutral-400 mt-1">زمان پاسخگویی سرور (TTFB)</div>
                    </div>
                    <div class="glass-card p-4 rounded-xl text-center border border-white/10 bg-white/5 backdrop-blur-md">
                        <div class="text-2xl sm:text-3xl font-black  text-emerald-400">۱۵ دقیقه</div>
                        <div class="text-xs text-neutral-400 mt-1">پاسخگویی اضطراری SLA</div>
                    </div>
                    <div class="glass-card p-4 rounded-xl text-center border border-white/10 bg-white/5 backdrop-blur-md">
                        <div class="text-2xl sm:text-3xl font-black  text-purple-400">۱۵۰۰+</div>
                        <div class="text-xs text-neutral-400 mt-1">وب‌سایت و فروشگاه فعال</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== CORE 4 AGENCY PILLARS GRID ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs">
                خدمات هلدینگ رومونت
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                چهار دپارتمان تخصصی. یک استاندارد مهندسی بی‌نقص.
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Pillar 1: Bespoke Site Design -->
            <a
                href="<?php echo esc_url(home_url('/site-design-pricing')); ?>"
                class="glass-card p-6 rounded-2xl border border-white/10 hover:border-amber-500/50 transition-all group cursor-pointer flex flex-col justify-between bg-white/5 backdrop-blur-md">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center group-hover:bg-amber-500/20 transition">
                        <!-- Layers Icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z" />
                            <path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65" />
                            <path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white group-hover:text-amber-400 transition flex items-center justify-between">
                        <span>طراحی اختصاصی سایت</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-transform group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </h3>
                    <p class="text-xs text-neutral-400 leading-relaxed">
                        قالب‌های اختصاصی گوتنبرگ با ری‌اکت، بدون افزونه‌های سنگین صفحه‌ساز و بهینه‌سازی شده برای حداکثر نرخ تبدیل ووکامرس.
                    </p>
                    <div class="space-y-1.5 pt-2">
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>طراحی اختصاصی فیگما به گوتنبرگ</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>سرعت لود زیر ۱۸۰ میلی‌ثانیه</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>تجربه کاربری بی‌نقص در موبایل</span>
                        </div>
                    </div>
                </div>
                <div class="pt-6 border-t border-white/5 mt-6 flex items-center justify-between">
                    <span class="text-xs text-neutral-400">شروع از ۲ هفته کاری</span>
                    <span class="text-xs font-bold text-amber-400 group-hover:underline">مشاهده پکیج‌ها ←</span>
                </div>
            </a>

            <!-- Pillar 2: 24/7 Managed Maintenance -->
            <a
                href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>"
                class="glass-card p-6 rounded-2xl border border-white/10 hover:border-emerald-500/50 transition-all group cursor-pointer flex flex-col justify-between bg-white/5 backdrop-blur-md">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center group-hover:bg-emerald-500/20 transition">
                        <!-- Shield Icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white group-hover:text-emerald-400 transition flex items-center justify-between">
                        <span>پشتیبانی وردپرس (wpstorm)</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-transform group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </h3>
                    <p class="text-xs text-neutral-400 leading-relaxed">
                        نگهداری ۲۴ ساعته، پاسخگویی اضطراری ۱۵ دقیقه‌ای، تست آپدیت‌ها در محیط استیجینگ و بک‌آپ‌های منظم ساعتی در سرورهای ابری رومونت.
                    </p>
                    <div class="space-y-1.5 pt-2">
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>پاسخگویی اضطراری ۱۵ دقیقه‌ای</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>تست بدون قطعی در استیجینگ</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>بک‌آپ زنده ساعتی دیتابیس</span>
                        </div>
                    </div>
                </div>
                <div class="pt-6 border-t border-white/5 mt-6 flex items-center justify-between">
                    <span class="text-xs text-neutral-400">۳ پلن متناسب با نیاز شما</span>
                    <span class="text-xs font-bold text-emerald-400 group-hover:underline">مشاهده پلن‌ها ←</span>
                </div>
            </a>

            <!-- Pillar 3: Tier-1 SMS Provider -->
            <a
                href="<?php echo esc_url(home_url('/sms-pricing')); ?>"
                class="glass-card p-6 rounded-2xl border border-white/10 hover:border-cyan-500/50 transition-all group cursor-pointer flex flex-col justify-between bg-white/5 backdrop-blur-md">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center group-hover:bg-cyan-500/20 transition">
                        <!-- MessageSquareCode Icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            <path d="m10 8-2 2 2 2" />
                            <path d="m14 8 2 2-2 2" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white group-hover:text-cyan-400 transition flex items-center justify-between">
                        <span>سامانه پیامک رومونت</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-transform group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </h3>
                    <p class="text-xs text-neutral-400 leading-relaxed">
                        ارسال پیامک با خطوط خدماتی بدون بلک‌لیست، کدهای تایید هویت OTP زیر ۳ ثانیه و اطلاع‌رسانی خودکار مراحل ارسال در ووکامرس.
                    </p>
                    <div class="space-y-1.5 pt-2">
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-cyan-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>تحویل زیر ۳ ثانیه با خطوط خدماتی</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-cyan-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>پوشش تمام اپراتورها و بین‌الملل</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-cyan-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>افزونه اختصاصی TelePulse وردپرس</span>
                        </div>
                    </div>
                </div>
                <div class="pt-6 border-t border-white/5 mt-6 flex items-center justify-between">
                    <span class="text-xs text-neutral-400">بسته‌های شارژ متنوع</span>
                    <span class="text-xs font-bold text-cyan-400 group-hover:underline">تعرفه پیامک ←</span>
                </div>
            </a>

            <!-- Pillar 4: Shop Themes & Plugins -->
            <a
                href="<?php echo esc_url(home_url('/shop')); ?>"
                class="glass-card p-6 rounded-2xl border border-white/10 hover:border-purple-500/50 transition-all group cursor-pointer flex flex-col justify-between bg-white/5 backdrop-blur-md">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center group-hover:bg-purple-500/20 transition">
                        <!-- Sparkles Icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white group-hover:text-purple-400 transition flex items-center justify-between">
                        <span>محصولات دپارتمان wpstorm</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-transform group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </h3>
                    <p class="text-xs text-neutral-400 leading-relaxed">
                        قالب‌ها و افزونه‌های تجاری استاندارد با لایسنس خودکار، آپدیت‌های پیوسته و گارانتی بازگشت وجه از هلدینگ رومونت.
                    </p>
                    <div class="space-y-1.5 pt-2">
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-purple-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>قالب‌های ApexStudio و AeroCommerce</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-purple-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>افزونه سرعت PulseSpeed Turbo</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-neutral-300">
                            <svg class="w-3.5 h-3.5 text-purple-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                            <span>افزونه امنیتی FortressShield</span>
                        </div>
                    </div>
                </div>
                <div class="pt-6 border-t border-white/5 mt-6 flex items-center justify-between">
                    <span class="text-xs text-neutral-400">محصولات آماده خرید</span>
                    <span class="text-xs font-bold text-purple-400 group-hover:underline">ورود به مارکت ←</span>
                </div>
            </a>

        </div>
    </section>

    <!-- ==================== MARKETPLACE SHOWCASE SECTION ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 pb-4 border-b border-white/10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-500/10 text-purple-400 border border-purple-500/20 text-xs mb-2">
                    محصولات تخصصی wpstorm
                </div>
                <h2 class="text-3xl font-extrabold text-white tracking-tight">
                    قالب‌ها و افزونه‌های آزموده‌شده در پروژه‌های واقعی
                </h2>
                <p class="text-sm text-neutral-400 mt-1">
                    توسعه‌یافته بر پایه PHP 8.2+، بلوک‌های بومی ری‌اکت و کاملاً سازگار با آخرین نسخه وردپرس و ووکامرس.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <div class="bg-white/5 p-1 rounded-xl border border-white/10 flex items-center">
                    <button
                        @click="activeTab = 'all'"
                        :class="activeTab === 'all' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                        همه
                    </button>
                    <button
                        @click="activeTab = 'themes'"
                        :class="activeTab === 'themes' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                        قالب‌ها
                    </button>
                    <button
                        @click="activeTab = 'plugins'"
                        :class="activeTab === 'plugins' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                        class="px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                        افزونه‌ها
                    </button>
                </div>

                <a
                    href="<?php echo esc_url(home_url('/shop')); ?>"
                    class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-xs text-amber-400 border border-white/10 flex items-center gap-1.5">
                    <span>مشاهده کاتالوگ کامل</span>
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m12 19-7-7 7-7" />
                        <path d="M19 12H5" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <template x-for="product in filteredProducts()" :key="product.id">
                <div class="glass-card rounded-2xl border border-white/10 overflow-hidden flex flex-col justify-between group hover:border-amber-500/40 transition-all bg-white/5 backdrop-blur-md">
                    <div>
                        <!-- Image Banner -->
                        <div class="relative h-48 overflow-hidden bg-black/50">
                            <img
                                :src="product.bannerImage"
                                :alt="product.name"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0d0f17] via-transparent to-transparent"></div>

                            <template x-if="product.badge">
                                <span class="absolute top-3 right-3 px-2.5 py-1 rounded-md bg-amber-500/90 text-black text-[11px] font-bold shadow-md" x-text="product.badge"></span>
                            </template>

                            <span class="absolute top-3 left-3 px-2 py-0.5 rounded bg-black/70 backdrop-blur text-neutral-300 text-[10px] border border-white/10" x-text="product.type === 'theme' ? 'قالب' : 'افزونه'"></span>
                        </div>

                        <!-- Content -->
                        <div class="p-5 space-y-3">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-neutral-400" x-text="product.category"></span>
                                <div class="flex items-center gap-1 text-amber-400 ">
                                    <svg class="w-3.5 h-3.5 fill-current text-amber-400" viewBox="0 0 24 24">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                    <span x-text="product.rating"></span>
                                    <span class="text-neutral-500">(<span x-text="product.reviewsCount"></span>)</span>
                                </div>
                            </div>

                            <a :href="product.url" class="block">
                                <h3 class="text-base font-bold text-white group-hover:text-amber-400 transition line-clamp-1" x-text="product.name"></h3>
                            </a>

                            <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed" x-text="product.tagline"></p>

                            <div class="pt-2 flex flex-wrap gap-1.5">
                                <template x-for="(tag, idx) in product.tags.slice(0, 3)" :key="idx">
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-neutral-400 border border-white/5" x-text="'#' + tag"></span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Price & Action -->
                    <div class="p-5 pt-0">
                        <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-neutral-500 block">لایسنس استاندارد</span>
                                <span class="text-base font-bold text-white" x-text="formatCurrency(product.price)"></span>
                            </div>

                            <div class="flex items-center gap-2">
                                <a
                                    :href="product.url"
                                    class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white border border-white/10 transition"
                                    title="مشاهده جزییات و پیش‌نمایش">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                        <polyline points="15 3 21 3 21 9" />
                                        <line x1="10" x2="21" y1="14" y2="3" />
                                    </svg>
                                </a>

                                <button
                                    @click="quickBuy(product)"
                                    class="px-3.5 py-2 rounded-lg bg-amber-500 hover:bg-amber-400 text-black font-bold text-xs transition">
                                    خرید سریع
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </section>

    <!-- ==================== INTERACTIVE SMS SIMULATOR SHOWCASE ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-panel rounded-3xl p-8 md:p-12 border border-cyan-500/20 bg-gradient-to-br from-[#0b101c] via-[#0d1222] to-[#090c15] relative overflow-hidden backdrop-blur-xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

                <!-- Right Content in RTL -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 text-xs">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            <path d="m10 8-2 2 2 2" />
                            <path d="m14 8 2 2-2 2" />
                        </svg>
                        <span>سامانه پیامک فوق سریع رومونت (Romonet.ir SMS)</span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                        اتصال مستقیم به خطوط مخابراتی خدماتی برای وردپرس و ووکامرس.
                    </h2>

                    <p class="text-sm text-neutral-300 leading-relaxed">
                        سایت خود را به زیرساخت مخابراتی پرسرعت رومونت متصل کنید. پیامک‌های تغییر وضعیت سفارش، رمزهای یکبار مصرف (OTP) ورود و بازگردانی سبدهای خرید رهاشده را با نرخ بازگشایی ۹۸٪ در کمتر از ۳ ثانیه ارسال نمایید.
                    </p>

                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <div class="p-3.5 rounded-xl bg-black/40 border border-white/10 text-center sm:text-right">
                            <div class="text-xl font-bold text-cyan-400">۹۹.۹۸٪</div>
                            <div class="text-xs text-neutral-400 mt-1">نرخ تحویل موفق پیامک</div>
                        </div>
                        <div class="p-3.5 rounded-xl bg-black/40 border border-white/10 text-center sm:text-right">
                            <div class="text-xl font-bold text-cyan-400">&lt; ۲.۱ ثانیه</div>
                            <div class="text-xs text-neutral-400 mt-1">میانگین ارسال کدهای تایید OTP</div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <a
                            href="<?php echo esc_url(home_url('/sms-pricing')); ?>"
                            class="px-6 py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-extrabold text-xs transition flex items-center gap-2 shadow-lg shadow-cyan-500/20">
                            <span>مشاهده تعرفه‌های پیامک و شارژ آنلاین</span>
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m12 19-7-7 7-7" />
                                <path d="M19 12H5" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Left: Live Interactive Smartphone Simulator -->
                <div class="lg:col-span-6 flex justify-center">
                    <div class="w-full max-w-sm rounded-[36px] bg-[#000000] border-4 border-neutral-700 shadow-2xl p-4 relative" dir="rtl">
                        <!-- Speaker notch -->
                        <div class="w-24 h-4 bg-neutral-800 rounded-full mx-auto mb-4"></div>

                        <!-- Virtual Phone Screen -->
                        <div class="bg-[#121624] rounded-[24px] p-4 text-white min-h-[380px] flex flex-col justify-between border border-white/10">
                            <!-- Status Bar -->
                            <div class="flex items-center justify-between text-[11px] text-neutral-400 pb-3 border-b border-white/10">
                                <span>۰۹:۴۱</span>
                                <span class="text-cyan-400 font-bold">5G • ROMONET-SMS</span>
                                <span>۱۰۰٪</span>
                            </div>

                            <!-- SMS Message Bubble -->
                            <div class="py-4 space-y-3">
                                <div class="text-center text-[10px] text-neutral-500">
                                    پیامک خط خدماتی رومونت • هم‌اکنون
                                </div>

                                <div class="bg-gradient-to-r from-cyan-600/30 to-blue-600/30 border border-cyan-500/40 rounded-2xl rounded-tr-sm p-3.5 space-y-1.5 shadow-lg text-right">
                                    <div class="flex items-center justify-between text-xs text-cyan-300 font-bold">
                                        <span>Romonet.ir</span>
                                        <span class="text-[10px] text-cyan-400/80">تحویل داده شد</span>
                                    </div>

                                    <!-- Order SMS View -->
                                    <template x-if="smsType === 'order'">
                                        <p class="text-xs text-neutral-200 leading-relaxed">
                                            📦 <strong>سفارش #۴۸۹۲۱ شما ارسال گردید!</strong> مرسوله شما تحویل پست پیشتاز شد. کد رهگیری ۲۴ رقمی: <span class="text-amber-400">۴۵۹۸۲۱۳۶۷۲۹۰</span>. پیگیری زنده: <span class="text-cyan-400 underline">romonet.ir/track</span>
                                        </p>
                                    </template>

                                    <!-- OTP SMS View -->
                                    <template x-if="smsType === 'otp'">
                                        <p class="text-xs text-neutral-200 leading-relaxed">
                                            🔒 کد ورود و تایید هویت شما در سایت: <strong class="text-amber-400 tracking-widest text-sm">۸۴۹۲۱۰</strong>. معتبر به مدت ۲ دقیقه. این کد را در اختیار دیگران قرار ندهید.
                                        </p>
                                    </template>

                                    <!-- Cart Recovery SMS View -->
                                    <template x-if="smsType === 'cart'">
                                        <p class="text-xs text-neutral-200 leading-relaxed">
                                            🛒 سلام علی عزیز، محصول <strong>AeroCommerce Max</strong> در سبد خرید شما باقی مانده است. کد تخفیف ویژه ۱۵٪: <strong>ROMONET20</strong> برای تکمیل خرید: <span class="text-cyan-400 underline">wpstorm.ir/cart</span>
                                        </p>
                                    </template>
                                </div>
                            </div>

                            <!-- Simulator Controls -->
                            <div class="pt-3 border-t border-white/10 space-y-2">
                                <div class="text-[10px] text-neutral-400 text-center">
                                    تست زنده نمونه پیامک‌های ارسالی
                                </div>
                                <div class="grid grid-cols-3 gap-1">
                                    <button
                                        @click="smsType = 'order'"
                                        :class="smsType === 'order' ? 'bg-cyan-500 text-black font-bold' : 'bg-white/5 text-neutral-300'"
                                        class="py-1.5 text-[10px] rounded-lg transition">
                                        ارسال سفارش
                                    </button>
                                    <button
                                        @click="smsType = 'otp'"
                                        :class="smsType === 'otp' ? 'bg-cyan-500 text-black font-bold' : 'bg-white/5 text-neutral-300'"
                                        class="py-1.5 text-[10px] rounded-lg transition">
                                        کد تایید OTP
                                    </button>
                                    <button
                                        @click="smsType = 'cart'"
                                        :class="smsType === 'cart' ? 'bg-cyan-500 text-black font-bold' : 'bg-white/5 text-neutral-300'"
                                        class="py-1.5 text-[10px] rounded-lg transition">
                                        سبد رهاشده
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== CASE STUDIES WITH METRICS ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs">
                نتایج واقعی در پروژه‌های مشتریان
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                تغییرات شگفت‌انگیز سرعت قبل و بعد از تحویل
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Case Study 1 -->
            <div class="glass-card rounded-2xl p-6 sm:p-8 border border-white/10 space-y-6 bg-white/5 backdrop-blur-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white">فروشگاه زنجیره‌ای مد و پوشاک دیاموند</h3>
                        <span class="text-xs text-amber-400">مهاجرت از قالب آماده به گوتنبرگ اختصاصی</span>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                        <!-- TrendingUp Icon -->
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                            <polyline points="16 7 22 7 22 13" />
                        </svg>
                    </div>
                </div>

                <!-- Stats benchmark -->
                <div class="grid grid-cols-3 gap-3 bg-black/40 p-4 rounded-xl border border-white/5">
                    <div class="text-center space-y-1">
                        <div class="text-[10px] text-neutral-500">امتیاز موبایل گوگل</div>
                        <div class="text-xs text-rose-400 line-through ">31/100</div>
                        <div class="text-sm font-extrabold text-emerald-400 ">99/100</div>
                    </div>
                    <div class="text-center space-y-1">
                        <div class="text-[10px] text-neutral-500">زمان لود صفحه (LCP)</div>
                        <div class="text-xs text-rose-400 line-through ">4.8s</div>
                        <div class="text-sm font-extrabold text-emerald-400 ">0.6s</div>
                    </div>
                    <div class="text-center space-y-1">
                        <div class="text-[10px] text-neutral-500">نرخ تبدیل نهایی</div>
                        <div class="text-xs text-rose-400 line-through ">1.2%</div>
                        <div class="text-sm font-extrabold text-emerald-400 ">+240%</div>
                    </div>
                </div>

                <blockquote class="text-xs text-neutral-300 italic border-r-2 border-amber-500 pr-4 py-1 leading-relaxed">
                    «پس از بازنویسی کامل توسط تیم wpstorm، نه تنها قطعی‌های سرور ما به صفر رسید، بلکه درآمد فروشگاه در جمعه سیاه ۳ برابر شد.»
                </blockquote>

                <div class="pt-2">
                    <a
                        href="<?php echo esc_url(home_url('/site-design-pricing')); ?>"
                        class="text-xs text-amber-400 hover:text-amber-300 flex items-center gap-1.5">
                        <span>بررسی فرآیند مهندسی و اجرای اسپرینت</span>
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Case Study 2 -->
            <div class="glass-card rounded-2xl p-6 sm:p-8 border border-white/10 space-y-6 bg-white/5 backdrop-blur-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white">پلتفرم آموزشی و وبینار تخصصی تک‌آکادمی</h3>
                        <span class="text-xs text-amber-400">پلن پشتیبانی سازمانی و بهینه‌سازی دیتابیس</span>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                            <polyline points="16 7 22 7 22 13" />
                        </svg>
                    </div>
                </div>

                <!-- Stats benchmark -->
                <div class="grid grid-cols-3 gap-3 bg-black/40 p-4 rounded-xl border border-white/5">
                    <div class="text-center space-y-1">
                        <div class="text-[10px] text-neutral-500">پاسخگویی سرور (TTFB)</div>
                        <div class="text-xs text-rose-400 line-through">1.9s</div>
                        <div class="text-sm font-extrabold text-emerald-400">0.18s</div>
                    </div>
                    <div class="text-center space-y-1">
                        <div class="text-[10px] text-neutral-500">کاربران همزمان فعال</div>
                        <div class="text-xs text-rose-400 line-through">400 کاربر</div>
                        <div class="text-sm font-extrabold text-emerald-400">8,500+</div>
                    </div>
                    <div class="text-center space-y-1">
                        <div class="text-[10px] text-neutral-500">تحویل OTP ورود</div>
                        <div class="text-xs text-rose-400 line-through">45s (خطوط عادی)</div>
                        <div class="text-sm font-extrabold text-emerald-400">1.8s (رومونت)</div>
                    </div>
                </div>

                <blockquote class="text-xs text-neutral-300 italic border-r-2 border-amber-500 pr-4 py-1 leading-relaxed">
                    «با قرارداد پشتیبانی SLA رومونت، در زمان پروموشن‌های سنگین بدون کوچک‌ترین افت سرعت به هزاران دانشجو سرویس‌دهی کردیم.»
                </blockquote>

                <div class="pt-2">
                    <a
                        href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>"
                        class="text-xs text-amber-400 hover:text-amber-300 flex items-center gap-1.5">
                        <span>مشاهده جزییات پلن‌های نگهداری سازمانی</span>
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ==================== EDITORIAL BLOG HIGHLIGHTS ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-white/10">
            <div>
                <div class="text-xs text-amber-400 font-semibold mb-1">
                    مجموعه مقالات تخصصی wpstorm
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                    جدیدترین مقالات و تحلیل‌های معماری وردپرس
                </h2>
            </div>
            <a
                href="<?php echo esc_url(home_url('/blog')); ?>"
                class="text-xs text-neutral-300 hover:text-amber-400 flex items-center gap-1.5">
                <span>مشاهده همه مقالات</span>
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'ignore_sticky_posts' => 1
            );
            $recent_posts = new WP_Query($args);

            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'تخصصی';
                    $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium_large') : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80';
                    $author_id = get_the_author_meta('ID');
            ?>
                    <div
                        class="glass-card rounded-2xl border border-white/10 overflow-hidden group hover:border-amber-400/40 transition flex flex-col justify-between bg-white/5 backdrop-blur-md">
                        <div>
                            <div class="h-44 overflow-hidden relative">
                                <img
                                    src="<?php echo esc_url($thumbnail_url); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                                <span class="absolute bottom-3 right-3 px-2.5 py-0.5 rounded bg-black/80 backdrop-blur text-amber-400 text-[11px] border border-amber-500/30">
                                    <?php echo $category_name; ?>
                                </span>
                            </div>

                            <div class="p-5 space-y-2">
                                <div class="flex items-center justify-between text-xs text-neutral-400">
                                    <span><?php echo get_the_date(); ?></span>
                                    <span>۵ دقیقه مطالعه</span>
                                </div>
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="text-base font-bold text-white group-hover:text-amber-400 transition line-clamp-2 leading-snug">
                                        <?php the_title(); ?>
                                    </h3>
                                </a>
                                <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed">
                                    <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                                </p>
                            </div>
                        </div>

                        <div class="p-5 pt-0">
                            <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-neutral-400">
                                <div class="flex items-center gap-2">
                                    <img src="<?php echo esc_url(get_avatar_url($author_id)); ?>" alt="<?php the_author(); ?>" class="w-5 h-5 rounded-full object-cover" />
                                    <span><?php the_author(); ?></span>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="text-amber-400 group-hover:-translate-x-1 transition-transform">مطالعه مقاله ←</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <!-- Fallback Editorial Cards if no posts yet -->
                <div class="glass-card rounded-2xl border border-white/10 overflow-hidden group hover:border-amber-400/40 transition flex flex-col justify-between bg-white/5 backdrop-blur-md">
                    <div>
                        <div class="h-44 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80" alt="معماری گوتنبرگ" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <span class="absolute bottom-3 right-3 px-2.5 py-0.5 rounded bg-black/80 backdrop-blur text-amber-400 text-[11px] border border-amber-500/30">معماری نرم‌افزار</span>
                        </div>
                        <div class="p-5 space-y-2">
                            <div class="flex items-center justify-between text-xs text-neutral-400">
                                <span>امروز</span>
                                <span>۶ دقیقه مطالعه</span>
                            </div>
                            <h3 class="text-base font-bold text-white group-hover:text-amber-400 transition line-clamp-2 leading-snug">
                                چگونه با بلوک‌های بومی گوتنبرگ سرعت لود را به زیر ۵۰۰ میلی‌ثانیه برسانیم؟
                            </h3>
                            <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed">
                                بررسی فنی معماری React در ادیتور وردپرس و حذف کامل وابستگی به المنتور و کامپوزر.
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-neutral-400">
                            <span>تیم فنی wpstorm</span>
                            <span class="text-amber-400">مطالعه مقاله ←</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ==================== FINAL BOTTOM CTA ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-panel rounded-3xl p-10 sm:p-16 border border-amber-500/30 bg-gradient-to-r from-[#14120c] via-[#1c160e] to-[#14120c] text-center space-y-6 relative overflow-hidden backdrop-blur-xl">
            <div class="w-16 h-16 rounded-2xl bg-amber-500/20 text-amber-400 flex items-center justify-center mx-auto border border-amber-500/30 shadow-xl shadow-amber-500/20">
                <!-- Zap Icon -->
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                </svg>
            </div>

            <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight max-w-2xl mx-auto leading-tight">
                آماده ارتقای اساسی زیرساخت وب‌سایت خود هستید؟
            </h2>

            <p class="text-sm sm:text-base text-neutral-300 max-w-xl mx-auto leading-relaxed">
                با معماران ارشد تیم <strong className="text-amber-400">wpstorm</strong> در هلدینگ <strong className="text-white">رومونت (Romonet.ir)</strong> گفتگو کنید. مهاجرت بدون قطعی، کدنویسی بلوک‌های اختصاصی و پشتیبانی ۲۴ ساعته.
            </p>

            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a
                    href="<?php echo esc_url(home_url('/site-design-pricing')); ?>"
                    class="px-8 py-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-sm transition active:scale-95 shadow-xl shadow-amber-500/25 text-center">
                    درخواست استعلام و شروع پروژه
                </a>
                <a
                    href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>"
                    class="px-8 py-4 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold text-sm border border-white/15 transition text-center">
                    مشاهده پلن‌های پشتیبانی SLA
                </a>
            </div>
        </div>
    </section>

</main>

<!-- Alpine.js Front Page State Handler -->
<script>
    function romonetFrontPage() {
        return {
            activeTab: 'all',
            smsType: 'order',

            products: [{
                    id: 'apex-studio-pro',
                    name: 'قالب اختصاصی آژانسی و شرکتی Apex Studio',
                    type: 'theme',
                    category: 'قالب اختصاصی وردپرس',
                    tagline: 'سرعت لود فوق‌العاده با بلوک‌های گوتنبرگ و Tailwind CSS',
                    rating: '۴.۹',
                    reviewsCount: '۲۸',
                    price: 2450000,
                    badge: 'پرفروش‌ترین',
                    tags: ['Gutenberg', 'Tailwind', 'SLA'],
                    bannerImage: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/apex-studio-pro')); ?>'
                },
                {
                    id: 'aerocommerce-max',
                    name: 'قالب فروشگاهی ایروکامرس مکس (AeroCommerce)',
                    type: 'theme',
                    category: 'ووکامرس فوق سریع',
                    tagline: 'معماری مدرن سبد خرید ایجکس و بهینه‌سازی شده برای موبایل',
                    rating: '۵.۰',
                    reviewsCount: '۴۲',
                    price: 2890000,
                    badge: 'جدید',
                    tags: ['WooCommerce', 'Speed', 'High-Convert'],
                    bannerImage: 'https://images.unsplash.com/photo-1557821552-17105176677c?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/aerocommerce-max')); ?>'
                },
                {
                    id: 'telepulse-sms-engine',
                    name: 'افزونه درگاه هوشمند پیامک رومونت (TelePulse)',
                    type: 'plugin',
                    category: 'افزونه پیامکی وردپرس',
                    tagline: 'ارسال پیامک با خطوط خدماتی بدون بلک‌لیست و کدهای OTP زیر ۳ ثانیه',
                    rating: '۴.۸',
                    reviewsCount: '۱۹',
                    price: 890000,
                    badge: 'ضروری',
                    tags: ['SMS', 'OTP', 'WooCommerce'],
                    bannerImage: 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/telepulse-sms-engine')); ?>'
                },
                {
                    id: 'pulsespeed-turbo-cache',
                    name: 'افزونه بهینه‌ساز کش و دیتابیس PulseSpeed Turbo',
                    type: 'plugin',
                    category: 'سرعت و عملکرد',
                    tagline: 'تضمین نمره بالای ۹۵ در تست PageSpeed گوگل بدون باگ رندرینگ',
                    rating: '۴.۹',
                    reviewsCount: '۳۴',
                    price: 1150000,
                    badge: 'ویژه',
                    tags: ['Speed', 'Core-Web-Vitals', 'Cache'],
                    bannerImage: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80',
                    url: '<?php echo esc_url(home_url('/shop/pulsespeed-turbo-cache')); ?>'
                }
            ],

            filteredProducts() {
                if (this.activeTab === 'themes') {
                    return this.products.filter(p => p.type === 'theme');
                }
                if (this.activeTab === 'plugins') {
                    return this.products.filter(p => p.type === 'plugin');
                }
                return this.products;
            },

            quickBuy(product) {
                // Push into cart state if parent header Alpine context exists
                if (typeof this.cart !== 'undefined') {
                    const existing = this.cart.find(i => i.id === product.id);
                    if (existing) {
                        existing.quantity += 1;
                    } else {
                        this.cart.push({
                            id: product.id,
                            itemType: 'product',
                            title: product.name,
                            subtitle: 'لایسنس تک دامنه',
                            price: product.price,
                            quantity: 1,
                            licenseLabel: 'تک دامنه'
                        });
                    }
                    this.isCartDrawerOpen = true;
                }

                // Trigger global toast alert
                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `محصول «${product.name}» با موفقیت به سبد سفارشات افزوده شد.`
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

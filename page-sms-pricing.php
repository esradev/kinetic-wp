<?php

/**
 * Template Name: تعرفه‌های سامانه پیامک و OTP رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="min-h-screen pb-24 pt-8 space-y-20" dir="rtl" x-data="romonetSmsPricing()">

    <!-- ==================== HEADER HERO ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 text-xs">
                <!-- MessageSquareCode Icon -->
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    <path d="m10 8-2 2 2 2"></path>
                    <path d="m14 8 2 2-2 2"></path>
                </svg>
                <span>سامانه پیامک فوق سریع هلدینگ رومونت (Romonet.ir SMS)</span>
            </div>

            <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight">
                سامانه پیامکی <span class="bg-gradient-to-r from-cyan-400 via-cyan-300 to-blue-500 bg-clip-text text-transparent">فوق سریع و خطوط خدماتی</span> رومونت
            </h1>

            <p class="text-base sm:text-lg text-neutral-300 leading-relaxed">
                ارسال آنی پیامک‌های تغییر وضعیت سفارشات ووکامرس، کدهای تایید OTP دو مرحله‌ای با خطوط خدماتی بدون مسدودی (بلک‌لیست) و سناریوهای بازگردانی سبد خرید رهاشده زیر ۳ ثانیه.
            </p>
        </div>
    </section>

    <!-- ==================== MONTHLY RECURRING PLANS ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-10 space-y-2">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                پلن‌های اشتراکی سامانه پیامک رومونت
            </h2>
            <p class="text-xs text-neutral-400">
                شامل وب‌هوک اختصاصی، لایسنس رایگان افزونه TelePulse وردپرس و سهمیه اعتبار پیامک اولیه.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <template x-for="plan in smsPlans" :key="plan.id">
                <div
                    class="glass-panel rounded-3xl p-8 border flex flex-col justify-between transition-all relative backdrop-blur-xl"
                    :class="plan.popular 
            ? 'border-cyan-500/50 shadow-2xl shadow-cyan-500/10 bg-gradient-to-b from-[#101524] to-[#0c0f1a]' 
            : 'border-white/10 hover:border-white/20 bg-white/5'">
                    <!-- Popular Badge -->
                    <template x-if="plan.popular">
                        <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-cyan-500 text-black text-[11px] font-bold shadow-lg whitespace-nowrap">
                            محبوب‌ترین پلن فروشگاه‌ها
                        </span>
                    </template>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-bold text-white" x-text="plan.name"></h3>
                            <p class="text-xs text-neutral-400 mt-1" x-text="plan.tagline"></p>
                        </div>

                        <div class="pt-2 flex items-baseline gap-2">
                            <span class="text-3xl sm:text-4xl font-extrabold text-white" x-text="formatCurrency(plan.monthlyPrice)"></span>
                            <span class="text-xs text-neutral-400">/ ماهانه</span>
                        </div>

                        <div class="p-3.5 rounded-xl bg-black/40 border border-white/10 space-y-1 text-xs">
                            <div class="flex justify-between text-neutral-300">
                                <span>اعتبار پیامک اولیه:</span>
                                <span class="text-cyan-400 font-bold "><span x-text="plan.includedCredits.toLocaleString('fa-IR')"></span> عدد</span>
                            </div>
                            <div class="flex justify-between text-neutral-400 text-[11px]">
                                <span>تعرفه هر پیامک اضافه:</span>
                                <span x-text="plan.extraRatePerSms"></span>
                            </div>
                            <div class="flex justify-between text-neutral-400 text-[11px]">
                                <span>سرعت تحویل مخابراتی:</span>
                                <span class="text-emerald-400 font-bold" x-text="plan.webhookSpeed"></span>
                            </div>
                        </div>

                        <!-- Features List -->
                        <div class="space-y-2.5 pt-2">
                            <template x-for="(f, idx) in plan.features" :key="idx">
                                <div class="flex items-start gap-2.5 text-xs text-neutral-300">
                                    <!-- CheckCircle2 Icon -->
                                    <svg class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    <span x-text="f"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Action -->
                    <div class="pt-8 mt-6 border-t border-white/10">
                        <button
                            type="button"
                            @click="subscribeSmsPlan(plan)"
                            class="w-full py-3.5 rounded-xl text-xs font-extrabold transition active:scale-95 flex items-center justify-center gap-2"
                            :class="plan.popular 
                ? 'bg-cyan-500 hover:bg-cyan-400 text-black shadow-lg shadow-cyan-500/25' 
                : 'bg-white/10 hover:bg-white/20 text-white'">
                            <span>فعال‌سازی <span x-text="plan.name"></span></span>
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

    <!-- ==================== INTERACTIVE ESTIMATOR & COUNTRY RATE CALCULATOR ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-white/15 bg-gradient-to-r from-[#0d111d] via-[#111626] to-[#0d111d] space-y-8 backdrop-blur-xl">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-white/10">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 text-xs mb-2">
                        <!-- Calculator Icon -->
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect width="16" height="20" x="4" y="2" rx="2" />
                            <line x1="8" x2="16" y1="6" y2="6" />
                            <line x1="16" x2="16" y1="14" y2="18" />
                            <path d="M16 10h.01" />
                            <path d="M12 10h.01" />
                            <path d="M8 10h.01" />
                            <path d="M12 14h.01" />
                            <path d="M8 14h.01" />
                            <path d="M12 18h.01" />
                            <path d="M8 18h.01" />
                        </svg>
                        <span>محاسبه‌گر آنلاین هزینه و بازگشت سرمایه (ROI)</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                        تخمین هزینه و نرخ بازگشت سرمایه پیامک‌های شما
                    </h2>
                </div>
                <div class="flex items-center gap-2 text-xs text-neutral-400">
                    <!-- ShieldCheck Icon -->
                    <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                    <span>اتصال بدون واسطه به گیت‌وی اپراتورها</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                <!-- Right Controls in RTL -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- Destination Country -->
                    <div class="space-y-2">
                        <label class="text-xs text-neutral-400">
                            انتخاب مسیر مخابراتی و کشور مقصد
                        </label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                            <template x-for="(item, code) in countryRates" :key="code">
                                <button
                                    type="button"
                                    @click="selectedCountry = code"
                                    class="p-2.5 rounded-xl border text-right flex items-center gap-2 transition"
                                    :class="selectedCountry === code 
                    ? 'bg-cyan-500/15 border-cyan-400 text-white font-bold' 
                    : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white hover:bg-white/5'">
                                    <span class="text-base" x-text="item.flag"></span>
                                    <div class="truncate">
                                        <div class="text-xs truncate" x-text="item.name"></div>
                                        <div class="text-[10px] text-cyan-400 "><span x-text="item.tomanPrice"></span> تومان/پیامک</div>
                                    </div>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Slider -->
                    <div class="space-y-3 pt-2">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-neutral-400">تعداد پیامک‌های تخمینی ماهانه:</span>
                            <span class="text-base font-bold text-white bg-black/60 px-3 py-1 rounded-lg border border-white/10 ">
                                <span x-text="smsVolume.toLocaleString('fa-IR')"></span> پیامک / ماه
                            </span>
                        </div>
                        <input
                            type="range"
                            min="1000"
                            max="100000"
                            step="1000"
                            x-model.number="smsVolume"
                            class="w-full h-2 bg-neutral-700 rounded-lg appearance-none cursor-pointer accent-cyan-400" />
                        <div class="flex justify-between text-[10px]  text-neutral-500">
                            <span>۱,۰۰۰</span>
                            <span>۲۵,۰۰۰</span>
                            <span>۵۰,۰۰۰</span>
                            <span>۱۰۰,۰۰۰+</span>
                        </div>
                    </div>

                    <!-- Active Carrier Info -->
                    <div class="p-4 rounded-xl bg-black/40 border border-white/10 text-xs text-neutral-400 flex items-center gap-3">
                        <!-- Server Icon -->
                        <svg class="w-5 h-5 text-cyan-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect width="20" height="8" x="2" y="2" rx="2" ry="2" />
                            <rect width="20" height="8" x="2" y="14" rx="2" ry="2" />
                            <line x1="6" x2="6.01" y1="6" y2="6" />
                            <line x1="6" x2="6.01" y1="18" y2="18" />
                        </svg>
                        <div>
                            <span class="text-neutral-300 font-semibold">زیرساخت فعال: </span>
                            <span><span x-text="currentCountry().carrier"></span> مجهز به سوئیچ خودکار در صورت قطعی اپراتور.</span>
                        </div>
                    </div>
                </div>

                <!-- Left Result Card in RTL -->
                <div class="lg:col-span-5 bg-gradient-to-br from-[#131a2d] to-[#0c101c] p-6 sm:p-8 rounded-2xl border border-cyan-500/30 space-y-6">
                    <h3 class="text-base font-bold text-white border-b border-white/10 pb-3">
                        برآورد تحویل و بازگشت سرمایه
                    </h3>

                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between text-neutral-300">
                            <span>حجم ارسال ماهانه:</span>
                            <span class="font-bold text-white "><span x-text="smsVolume.toLocaleString('fa-IR')"></span> پیامک</span>
                        </div>

                        <div class="flex justify-between text-neutral-300">
                            <span>مسیر تحویل (<span x-text="currentCountry().name"></span>):</span>
                            <span class="text-cyan-400 "><span x-text="currentCountry().tomanPrice"></span> تومان / پیامک</span>
                        </div>

                        <div class="flex justify-between text-neutral-300">
                            <span>میانگین نرخ بازگشایی پیامک:</span>
                            <span class="text-emerald-400 font-bold ">۹۸.۲٪</span>
                        </div>

                        <div class="flex justify-between text-neutral-300">
                            <span>سفارشات نجات‌یافته سبد رهاشده:</span>
                            <span class="text-amber-400 font-bold ">~<span x-text="estimatedRecoveredOrders().toLocaleString('fa-IR')"></span> سفارش</span>
                        </div>

                        <div class="flex justify-between text-base font-bold text-white pt-3 border-t border-white/10">
                            <span>هزینه کل شارژ پیامک:</span>
                            <span class="text-cyan-400 font-bold text-xl" x-text="formatCurrency(calculatedCostToman())"></span>
                        </div>

                        <div class="flex justify-between text-xs text-emerald-400 pt-1">
                            <span>فروش تخمینی ایجادشده با پیامک:</span>
                            <span class="font-bold ">+<span x-text="estimatedRecoveredRevenue().toLocaleString('fa-IR')"></span> تومان</span>
                        </div>
                    </div>

                    <button
                        type="button"
                        @click="orderCalculatedCredits()"
                        class="w-full py-3.5 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-extrabold text-xs transition active:scale-95 shadow-lg shadow-cyan-500/25 text-center">
                        افزودن بسته <span x-text="smsVolume.toLocaleString('fa-IR')"></span> پیامک به سبد خرید
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- ==================== PREPAID PAY-AS-YOU-GO CREDIT BUNDLES ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-10 space-y-2">
            <div class="text-xs text-amber-400 font-semibold">
                اعتبار بدون تاریخ انقضا
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                بسته‌های شارژ اعتباری پیامک (Pay-As-You-Go)
            </h2>
            <p class="text-xs text-neutral-400">
                نیازی به اشتراک ماهانه ندارید؟ در هر زمان شارژ کنید؛ اعتبار شما هرگز منقضی نمی‌شود.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <template x-for="bundle in smsCreditBundles" :key="bundle.id">
                <div
                    class="glass-card p-6 rounded-2xl border flex flex-col justify-between space-y-6 transition bg-white/5 backdrop-blur-md"
                    :class="bundle.popular ? 'border-amber-500/50 bg-[#14121a]' : 'border-white/10'">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-black text-white " x-text="bundle.credits.toLocaleString('fa-IR')"></span>
                            <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/20 text-amber-300 font-bold" x-text="bundle.bonus"></span>
                        </div>
                        <div class="text-xs text-neutral-400 mt-1">پیامک ارسالی</div>

                        <div class="pt-6">
                            <span class="text-2xl font-extrabold text-amber-400" x-text="formatCurrency(bundle.price)"></span>
                            <div class="text-[11px] text-neutral-500 mt-0.5" x-text="bundle.pricePerSms + ' (بدون انقضا)'"></div>
                        </div>
                    </div>

                    <button
                        type="button"
                        @click="orderCreditBundle(bundle)"
                        class="w-full py-2.5 rounded-xl bg-white/10 hover:bg-amber-500 hover:text-black text-white font-bold text-xs transition active:scale-95 text-center">
                        خرید آنلاین بسته
                    </button>
                </div>
            </template>
        </div>
    </section>

    <!-- ==================== TELCO INFRASTRUCTURE GUARANTEES ==================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Guarantee 1 -->
            <div class="glass-card p-6 rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center">
                    <!-- Zap Icon -->
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-white">تضمین تحویل زیر ۳ ثانیه (SLA)</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">
                    کدهای تایید و ورود دو مرحله‌ای تا زمانی که کاربر هنوز به صفحه گوشی نگاه می‌کند می‌رسند، بدون ماندن در صف ارسال.
                </p>
            </div>

            <!-- Guarantee 2 -->
            <div class="glass-card p-6 rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                    <!-- ShieldCheck Icon -->
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-white">خطوط خدماتی اشتراکی و اختصاصی</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">
                    ارسال پیامک به تمام شماره‌ها حتی افرادی که دریافت پیامک‌های تبلیغاتی را مسدود کرده‌اند (عبور کامل از بلک‌لیست).
                </p>
            </div>

            <!-- Guarantee 3 -->
            <div class="glass-card p-6 rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
                <div class="w-10 h-10 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center">
                    <!-- Globe2 Icon -->
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-white">افزونه TelePulse وردپرس</h3>
                <p class="text-xs text-neutral-400 leading-relaxed">
                    افزونه اختصاصی دپارتمان wpstorm برای ارسال خودکار نوتیفیکیشن وضعیت سفارشات و فرم‌های ورود بدون نیاز به کدنویسی وب‌سرویس.
                </p>
            </div>

        </div>
    </section>

</main>

<script>
    function romonetSmsPricing() {
        return {
            selectedCountry: 'IR',
            smsVolume: 15000,

            countryRates: {
                IR: {
                    name: 'ایران (خط خدماتی بدون بلک‌لیست)',
                    rate: 0.0035,
                    tomanPrice: 165,
                    flag: '🇮🇷',
                    carrier: 'همراه اول / ایرانسل / رایتل (مسیر مستقیم 1000/2000/3000)'
                },
                AE: {
                    name: 'امارات متحده عربی',
                    rate: 0.0195,
                    tomanPrice: 980,
                    flag: '🇦🇪',
                    carrier: 'اتصالات (e&) / du Direct Carrier'
                },
                TR: {
                    name: 'ترکیه',
                    rate: 0.0125,
                    tomanPrice: 620,
                    flag: '🇹🇷',
                    carrier: 'Turkcell / Vodafone TR Tier-1'
                },
                OM: {
                    name: 'عمان',
                    rate: 0.0180,
                    tomanPrice: 900,
                    flag: '🇴🇲',
                    carrier: 'Omantel / Ooredoo Direct'
                },
                DE: {
                    name: 'آلمان و اروپا',
                    rate: 0.0165,
                    tomanPrice: 830,
                    flag: '🇩🇪',
                    carrier: 'Deutsche Telekom / Vodafone DE'
                },
                US: {
                    name: 'آمریکا و کانادا (10DLC)',
                    rate: 0.0098,
                    tomanPrice: 490,
                    flag: '🇺🇸',
                    carrier: 'AT&T / Verizon / T-Mobile Direct'
                },
                UK: {
                    name: 'انگلستان',
                    rate: 0.0142,
                    tomanPrice: 710,
                    flag: '🇬🇧',
                    carrier: 'Vodafone / EE / O2 SS7 Direct'
                },
                IQ: {
                    name: 'عراق',
                    rate: 0.0175,
                    tomanPrice: 880,
                    flag: '🇮🇶',
                    carrier: 'Zain / Asiacell / Korek Telecom'
                }
            },

            smsPlans: [{
                    id: 'sms-starter',
                    name: 'پایه و استارتر',
                    tagline: 'مناسب فروشگاه‌های نوپا با ارسال تا ۱,۵۰۰ پیامک ماهانه',
                    monthlyPrice: 490000,
                    includedCredits: 1500,
                    extraRatePerSms: '۱۷۵ تومان',
                    webhookSpeed: '< ۲.۴ ثانیه',
                    popular: false,
                    features: [
                        'دسترسی به خط خدماتی عمومی اشتراکی',
                        'وب‌هوک هوشمند OTP برای افزونه Digits و ووکامرس',
                        'پشتیبانی تیکتی و راه‌اندازی اولیه رایگان',
                        'گزارش‌گیری آنلاین وضعیت دلیوری پیامک‌ها'
                    ]
                },
                {
                    id: 'sms-pro',
                    name: 'حرفه‌ای و فروشگاهی',
                    tagline: 'ایده‌آل برای فروشگاه‌های پرفروش و ارسال کمپین‌های تخفیفی',
                    monthlyPrice: 1150000,
                    includedCredits: 5000,
                    extraRatePerSms: '۱۵۵ تومان',
                    webhookSpeed: '< ۱.۵ ثانیه (اولویت بالا)',
                    popular: true,
                    features: [
                        'ارسال همزمان با ۲ مسیر مخابراتی بک‌آپ بدون قطعی',
                        'سناریوهای خودکار بازگردانی سبد خرید رهاشده',
                        'سفارشی‌سازی متن پترن‌های پیامکی بدون انتظار تایید',
                        'لایسنس دائمی افزونه TelePulse پرو',
                        'پشتیبانی تلفنی و تلگرامی ۲۴ ساعته'
                    ]
                },
                {
                    id: 'sms-enterprise',
                    name: 'سازمانی و نامحدود',
                    tagline: 'مخصوص پلتفرم‌ها و اپلیکیشن‌ها با ترافیک ارسال فوق سنگین',
                    monthlyPrice: 2850000,
                    includedCredits: 20000,
                    extraRatePerSms: '۱۳۵ تومان',
                    webhookSpeed: '< ۰.۸ ثانیه (مسیر اختصاصی)',
                    popular: false,
                    features: [
                        'اختصاص خط خدماتی اختصاصی با نام برند (Masking)',
                        'سرور ایزوله با ظرفیت ارسال ۵۰۰ پیامک در ثانیه',
                        'اتصال به تمام اپراتورهای بین‌المللی با تسویه ریالی',
                        'قرارداد رسمی SLA تحویل با تضمین بازگشت وجه',
                        'مدیر اکانت اختصاصی و مانیتورینگ زنده صف ارسال'
                    ]
                }
            ],

            smsCreditBundles: [{
                    id: 'bundle-5k',
                    credits: 5000,
                    price: 890000,
                    bonus: '+۳۰۰ پیامک هدیه',
                    pricePerSms: '۱۷۸ تومان/پیامک',
                    popular: false
                },
                {
                    id: 'bundle-15k',
                    credits: 15000,
                    price: 2450000,
                    bonus: '+۱,۵۰۰ پیامک هدیه',
                    pricePerSms: '۱۶۳ تومان/پیامک',
                    popular: true
                },
                {
                    id: 'bundle-50k',
                    credits: 5000,
                    price: 7450000,
                    bonus: '+۷,۵۰۰ پیامک هدیه',
                    pricePerSms: '۱۴۹ تومان/پیامک',
                    popular: false
                },
                {
                    id: 'bundle-100k',
                    credits: 100000,
                    price: 13500000,
                    bonus: '+۲۰,۰۰۰ پیامک هدیه',
                    pricePerSms: '۱۳۵ تومان/پیامک',
                    popular: false
                }
            ],

            currentCountry() {
                return this.countryRates[this.selectedCountry] || this.countryRates['IR'];
            },

            calculatedCostToman() {
                return Math.round(this.smsVolume * this.currentCountry().tomanPrice);
            },

            estimatedRecoveredOrders() {
                return Math.floor(this.smsVolume * 0.035);
            },

            estimatedRecoveredRevenue() {
                return this.estimatedRecoveredOrders() * 4500000;
            },

            subscribeSmsPlan(plan) {
                if (typeof this.cart !== 'undefined') {
                    this.cart.push({
                        id: 'sms-plan-' + plan.id + '-' + Date.now(),
                        itemType: 'sms_plan',
                        title: `اشتراک ${plan.name} سامانه پیامک رومونت`,
                        subtitle: `${plan.includedCredits.toLocaleString('fa-IR')} پیامک هدیه اولیه`,
                        price: plan.monthlyPrice,
                        quantity: 1,
                        billingPeriod: 'monthly',
                        licenseLabel: 'اشتراک ماهانه سامانه پیامک'
                    });
                    this.isCartDrawerOpen = true;
                }

                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `پلن پیامکی «${plan.name}» (${this.formatCurrency(plan.monthlyPrice)}/ماه) به سبد سفارشات افزوده شد.`
                }));
            },

            orderCalculatedCredits() {
                const cost = this.calculatedCostToman();
                const country = this.currentCountry();

                if (typeof this.cart !== 'undefined') {
                    this.cart.push({
                        id: 'sms-custom-' + Date.now(),
                        itemType: 'sms_credits',
                        title: `بسته شارژ اختصاصی (${this.smsVolume.toLocaleString('fa-IR')} پیامک)`,
                        subtitle: `مسیر مخابراتی: ${country.name}`,
                        price: cost,
                        quantity: 1,
                        billingPeriod: 'one-time',
                        licenseLabel: `${this.smsVolume.toLocaleString('fa-IR')} اعتبار پیامک`
                    });
                    this.isCartDrawerOpen = true;
                }

                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `بسته شارژ ${this.smsVolume.toLocaleString('fa-IR')} پیامک (${this.formatCurrency(cost)}) به سبد سفارشات اضافه شد.`
                }));
            },

            orderCreditBundle(bundle) {
                if (typeof this.cart !== 'undefined') {
                    this.cart.push({
                        id: 'sms-bundle-' + bundle.id + '-' + Date.now(),
                        itemType: 'sms_credits',
                        title: `بسته شارژ ${bundle.credits.toLocaleString('fa-IR')} پیامک`,
                        subtitle: bundle.bonus,
                        price: bundle.price,
                        quantity: 1,
                        billingPeriod: 'one-time',
                        licenseLabel: `${bundle.credits.toLocaleString('fa-IR')} پیامک رومونت`
                    });
                    this.isCartDrawerOpen = true;
                }

                window.dispatchEvent(new CustomEvent('show-toast', {
                    detail: `بسته شارژ ${bundle.credits.toLocaleString('fa-IR')} پیامک به سبد سفارشات افزوده شد.`
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

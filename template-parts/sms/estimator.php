
<!-- Calculator Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-white/15 bg-gradient-to-r from-[#0d111d] via-[#111626] to-[#0d111d] space-y-8 backdrop-blur-xl">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-white/10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 text-xs mb-2">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect width="16" height="20" x="4" y="2" rx="2" /><line x1="8" x2="16" y1="6" y2="6" /><line x1="16" x2="16" y1="14" y2="18" /><path d="M16 10h.01" /><path d="M12 10h.01" /><path d="M8 10h.01" /><path d="M12 14h.01" /><path d="M8 14h.01" /><path d="M12 18h.01" /><path d="M8 18h.01" />
                    </svg>
                    <span>محاسبه‌گر آنلاین هزینه و بازگشت سرمایه (ROI)</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                    تخمین هزینه و نرخ بازگشت سرمایه پیامک‌های شما
                </h2>
            </div>
            <div class="flex items-center gap-2 text-xs text-neutral-400">
                <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" /><path d="m9 12 2 2 4-4" />
                </svg>
                <span>اتصال بدون واسطه به گیت‌وی اپراتورها</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <!-- Right Controls in RTL -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Destination Country -->
                <div class="space-y-2">
                    <label class="text-xs text-neutral-400">انتخاب مسیر مخابراتی و کشور مقصد</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                        <template xyz-for="(item, code) in countryRates" xyz-bind:key="code">
                            <button type="button" xyz-on:click="selectedCountry = code" class="p-2.5 rounded-xl border text-right flex items-center gap-2 transition" xyz-bind:class="selectedCountry === code ? 'bg-cyan-500/15 border-cyan-400 text-white font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white hover:bg-white/5'">
                                <span class="text-base" xyz-text="item.flag"></span>
                                <div class="truncate">
                                    <div class="text-xs truncate" xyz-text="item.name"></div>
                                    <div class="text-[10px] text-cyan-400 "><span xyz-text="item.tomanPrice"></span> تومان/پیامک</div>
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
                            <span xyz-text="smsVolume.toLocaleString('fa-IR')"></span> پیامک / ماه
                        </span>
                    </div>
                    <input type="range" min="1000" max="100000" step="1000" xyz-model.number="smsVolume" class="w-full h-2 bg-neutral-700 rounded-lg appearance-none cursor-pointer accent-cyan-400" />
                    <div class="flex justify-between text-[10px] text-neutral-500">
                        <span>۱,۰۰۰</span><span>۲۵,۰۰۰</span><span>۵۰,۰۰۰</span><span>۱۰۰,۰۰۰+</span>
                    </div>
                </div>

                <!-- Active Carrier Info -->
                <div class="p-4 rounded-xl bg-black/40 border border-white/10 text-xs text-neutral-400 flex items-center gap-3">
                    <svg class="w-5 h-5 text-cyan-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect width="20" height="8" x="2" y="2" rx="2" ry="2" /><rect width="20" height="8" x="2" y="14" rx="2" ry="2" /><line x1="6" x2="6.01" y1="6" y2="6" /><line x1="6" x2="6.01" y1="18" y2="18" />
                    </svg>
                    <div>
                        <span class="text-neutral-300 font-semibold">زیرساخت فعال: </span>
                        <span><span xyz-text="currentCountry().carrier"></span> مجهز به سوئیچ خودکار در صورت قطعی.</span>
                    </div>
                </div>
            </div>

            <!-- Left Result Card in RTL -->
            <div class="lg:col-span-5 bg-gradient-to-br from-[#131a2d] to-[#0c101c] p-6 sm:p-8 rounded-2xl border border-cyan-500/30 space-y-6">
                <h3 class="text-base font-bold text-white border-b border-white/10 pb-3">برآورد تحویل و بازگشت سرمایه</h3>

                <div class="space-y-3 text-xs">
                    <div class="flex justify-between text-neutral-300">
                        <span>حجم ارسال ماهانه:</span>
                        <span class="font-bold text-white "><span xyz-text="smsVolume.toLocaleString('fa-IR')"></span> پیامک</span>
                    </div>
                    <div class="flex justify-between text-neutral-300">
                        <span>مسیر تحویل (<span xyz-text="currentCountry().name"></span>):</span>
                        <span class="text-cyan-400 "><span xyz-text="currentCountry().tomanPrice"></span> تومان / پیامک</span>
                    </div>
                    <div class="flex justify-between text-neutral-300">
                        <span>میانگین نرخ بازگشایی پیامک:</span>
                        <span class="text-emerald-400 font-bold ">۹۸.۲٪</span>
                    </div>
                    <div class="flex justify-between text-neutral-300">
                        <span>سفارشات نجات‌یافته سبد رهاشده:</span>
                        <span class="text-amber-400 font-bold ">~<span xyz-text="estimatedRecoveredOrders().toLocaleString('fa-IR')"></span> سفارش</span>
                    </div>
                    <div class="flex justify-between text-base font-bold text-white pt-3 border-t border-white/10">
                        <span>هزینه کل شارژ پیامک:</span>
                        <span class="text-cyan-400 font-bold text-xl" xyz-text="formatCurrency(calculatedCostToman())"></span>
                    </div>
                    <div class="flex justify-between text-xs text-emerald-400 pt-1">
                        <span>فروش تخمینی ایجادشده با پیامک:</span>
                        <span class="font-bold ">+<span xyz-text="estimatedRecoveredRevenue().toLocaleString('fa-IR')"></span> تومان</span>
                    </div>
                </div>

                <button type="button" xyz-on:click="orderCalculatedCredits()" class="w-full py-3.5 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-black font-extrabold text-xs transition active:scale-95 shadow-lg shadow-cyan-500/25 text-center">
                    افزودن بسته <span xyz-text="smsVolume.toLocaleString('fa-IR')"></span> پیامک به سبد خرید
                </button>
            </div>
        </div>
    </div>
</section>

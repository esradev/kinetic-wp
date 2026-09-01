<!-- Standard Plans Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <template xyz-for="plan in plans" xyz-bind:key="plan.id">
            <div class="glass-panel rounded-3xl p-8 border flex flex-col justify-between transition-all relative backdrop-blur-xl"
                xyz-bind:class="plan.popular ? 'border-emerald-500/60 shadow-2xl shadow-emerald-500/10 bg-gradient-to-b from-[#0f171e] to-[#0c1017]' : 'border-white/10 hover:border-white/20 bg-white/5'">
                
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
                            <span class="text-[10px] text-emerald-400 px-2">تسویه سالانه</span>
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
                                <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" /><path d="m9 12 2 2 4-4" />
                                </svg>
                                <span xyz-text="f"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Plan Action -->
                <div class="pt-8 mt-6 border-t border-white/10">
                    <button type="button" xyz-on:click="subscribePlan(plan)" class="w-full py-3.5 rounded-xl text-xs font-extrabold transition active:scale-95 flex items-center justify-center gap-2" xyz-bind:class="plan.popular ? 'bg-emerald-500 hover:bg-emerald-400 text-black shadow-lg shadow-emerald-500/25' : 'bg-white/10 hover:bg-white/20 text-white'">
                        <span>سفارش اشتراک <span xyz-text="plan.name"></span></span>
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m12 19-7-7 7-7" /><path d="M19 12H5" />
                        </svg>
                    </button>
                </div>
            </div>
        </template>
    </div>
</section>
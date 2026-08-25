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
        <template xyz-for="plan in smsPlans" xyz-bind:key="plan.id">
            <div
                class="glass-panel rounded-3xl p-8 border flex flex-col justify-between transition-all relative backdrop-blur-xl"
                xyz-bind:class="plan.popular 
        ? 'border-cyan-500/50 shadow-2xl shadow-cyan-500/10 bg-gradient-to-b from-[#101524] to-[#0c0f1a]' 
        : 'border-white/10 hover:border-white/20 bg-white/5'">
                <!-- Popular Badge -->
                <template xyz-if="plan.popular">
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-cyan-500 text-black text-[11px] font-bold shadow-lg whitespace-nowrap">
                        محبوب‌ترین پلن فروشگاه‌ها
                    </span>
                </template>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-white" xyz-text="plan.name"></h3>
                        <p class="text-xs text-neutral-400 mt-1" xyz-text="plan.tagline"></p>
                    </div>

                    <div class="pt-2 flex items-baseline gap-2">
                        <span class="text-3xl sm:text-4xl font-extrabold text-white" xyz-text="formatCurrency(plan.monthlyPrice)"></span>
                        <span class="text-xs text-neutral-400">/ ماهانه</span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-black/40 border border-white/10 space-y-1 text-xs">
                        <div class="flex justify-between text-neutral-300">
                            <span>اعتبار پیامک اولیه:</span>
                            <span class="text-cyan-400 font-bold "><span xyz-text="plan.includedCredits.toLocaleString('fa-IR')"></span> عدد</span>
                        </div>
                        <div class="flex justify-between text-neutral-400 text-[11px]">
                            <span>تعرفه هر پیامک اضافه:</span>
                            <span xyz-text="plan.extraRatePerSms"></span>
                        </div>
                        <div class="flex justify-between text-neutral-400 text-[11px]">
                            <span>سرعت تحویل مخابراتی:</span>
                            <span class="text-emerald-400 font-bold" xyz-text="plan.webhookSpeed"></span>
                        </div>
                    </div>

                    <!-- Features List -->
                    <div class="space-y-2.5 pt-2">
                        <template xyz-for="(f, idx) in plan.features" xyz-bind:key="idx">
                            <div class="flex items-start gap-2.5 text-xs text-neutral-300">
                                <!-- CheckCircle2 Icon -->
                                <svg class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="m9 12 2 2 4-4" />
                                </svg>
                                <span xyz-text="f"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Action -->
                <div class="pt-8 mt-6 border-t border-white/10">
                    <button
                        type="button"
                        xyz-on:click="subscribeSmsPlan(plan)"
                        class="w-full py-3.5 rounded-xl text-xs font-extrabold transition active:scale-95 flex items-center justify-center gap-2"
                        xyz-bind:class="plan.popular 
            ? 'bg-cyan-500 hover:bg-cyan-400 text-black shadow-lg shadow-cyan-500/25' 
            : 'bg-white/10 hover:bg-white/20 text-white'">
                        <span>فعال‌سازی <span xyz-text="plan.name"></span></span>
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
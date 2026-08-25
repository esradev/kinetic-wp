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
        <template xyz-for="bundle in smsCreditBundles" xyz-bind:key="bundle.id">
            <div
                class="glass-card p-6 rounded-2xl border flex flex-col justify-between space-y-6 transition bg-white/5 backdrop-blur-md"
                xyz-bind:class="bundle.popular ? 'border-amber-500/50 bg-[#14121a]' : 'border-white/10'">
                <div>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-black text-white " xyz-text="bundle.credits.toLocaleString('fa-IR')"></span>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/20 text-amber-300 font-bold" xyz-text="bundle.bonus"></span>
                    </div>
                    <div class="text-xs text-neutral-400 mt-1">پیامک ارسالی</div>

                    <div class="pt-6">
                        <span class="text-2xl font-extrabold text-amber-400" xyz-text="formatCurrency(bundle.price)"></span>
                        <div class="text-[11px] text-neutral-500 mt-0.5" xyz-text="bundle.pricePerSms + ' (بدون انقضا)'"></div>
                    </div>
                </div>

                <button
                    type="button"
                    xyz-on:click="orderCreditBundle(bundle)"
                    class="w-full py-2.5 rounded-xl bg-white/10 hover:bg-amber-500 hover:text-black text-white font-bold text-xs transition active:scale-95 text-center">
                    خرید آنلاین بسته
                </button>
            </div>
        </template>
    </div>
</section>
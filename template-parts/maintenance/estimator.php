<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-white/15 bg-gradient-to-r from-[#0c1219] via-[#0f1722] to-[#0c1219] space-y-8 backdrop-blur-xl">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-white/10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs mb-2">
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

            <!-- Right Controls -->
            <div class="lg:col-span-7 space-y-6">

                <!-- Site Count Slider -->
                <div class="space-y-2">
                    <div class="flex justify-between text-xs">
                        <span class="text-neutral-400">تعداد وب‌سایت‌های وردپرسی تحت پوشش:</span>
                        <span class="text-base font-bold text-white bg-black/60 px-3 py-1 rounded-lg border border-white/10 ">
                            <span xyz-text="siteCount"></span> <span xyz-text="siteCount === 1 ? 'سایت' : 'سایت (ناوگان)'"></span>
                        </span>
                    </div>
                    <input type="range" min="1" max="20" xyz-model.number="siteCount" class="w-full h-2 bg-neutral-700 rounded-lg appearance-none cursor-pointer accent-emerald-400" />
                </div>

                <!-- Toggles -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <button type="button" xyz-on:click="isEcommerce = !isEcommerce" xyz-bind:class="isEcommerce ? 'bg-emerald-500/15 border-emerald-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'" class="p-4 rounded-xl border text-right transition flex items-center justify-between">
                        <div>
                            <div class="text-xs font-bold text-white">فروشگاه ووکامرس فعال</div>
                            <div class="text-[11px] text-neutral-400">پایش ۲۴ ساعته فرآیند تسویه‌حساب و پرداخت</div>
                        </div>
                        <svg class="w-5 h-5" xyz-bind:class="isEcommerce ? 'text-emerald-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="m9 12 2 2 4-4" />
                        </svg>
                    </button>

                    <button type="button" xyz-on:click="needs15mSla = !needs15mSla" xyz-bind:class="needs15mSla ? 'bg-emerald-500/15 border-emerald-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'" class="p-4 rounded-xl border text-right transition flex items-center justify-between">
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
                    <input type="range" min="0" max="20" step="2" xyz-model.number="extraDevHours" class="w-full h-2 bg-neutral-700 rounded-lg appearance-none cursor-pointer accent-emerald-400" />
                </div>

            </div>

            <!-- Left Quote Card -->
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
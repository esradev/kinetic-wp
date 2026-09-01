<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="glass-panel rounded-3xl p-8 sm:p-12 border border-white/15 bg-gradient-to-r from-[#14110b] via-[#1b150c] to-[#14110b] space-y-8 backdrop-blur-xl">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-white/10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs mb-2">
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
            <div class="text-xs text-neutral-400">ثبت درخواست مشاوره و بررسی رایگان</div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <!-- Right Controls -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Project Type Selector -->
                <div class="space-y-2">
                    <label class="text-xs text-neutral-400">دسته‌بندی اصلی پروژه شما</label>
                    <div class="grid grid-cols-3 gap-2">
                        <button type="button" xyz-on:click="projectType = 'brand'" xyz-bind:class="projectType === 'brand' ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'" class="p-3 rounded-xl border text-center transition">
                            <div class="text-xs">شرکتی و سازمانی</div>
                            <div class="text-[10px] text-neutral-500">طراحی برند بوک</div>
                        </button>
                        <button type="button" xyz-on:click="projectType = 'store'" xyz-bind:class="projectType === 'store' ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'" class="p-3 rounded-xl border text-center transition">
                            <div class="text-xs">فروشگاه ووکامرس</div>
                            <div class="text-[10px] text-neutral-500">معماری تبدیل بالا</div>
                        </button>
                        <button type="button" xyz-on:click="projectType = 'headless'" xyz-bind:class="projectType === 'headless' ? 'bg-amber-500/20 border-amber-400 text-amber-300 font-bold' : 'bg-black/30 border-white/10 text-neutral-400 hover:text-white'" class="p-3 rounded-xl border text-center transition">
                            <div class="text-xs">هدلس Next.js 15</div>
                            <div class="text-[10px] text-neutral-500">React Micro-Frontend</div>
                        </button>
                    </div>
                </div>

                <!-- Page Count Slider -->
                <div class="space-y-2">
                    <div class="flex justify-between text-xs">
                        <span class="text-neutral-400">تعداد صفحات و تمپلیت‌های اختصاصی:</span>
                        <span class="text-base font-bold text-white bg-black/60 px-3 py-1 rounded-lg border border-white/10 ">
                            <span xyz-text="pageCount"></span> قالب صفحه
                        </span>
                    </div>
                    <input type="range" min="3" max="25" xyz-model.number="pageCount" class="w-full h-2 bg-neutral-700 rounded-lg appearance-none cursor-pointer accent-amber-400" />
                </div>

                <!-- Add-on Features Toggles -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <button type="button" xyz-on:click="needsCustomBlocks = !needsCustomBlocks" xyz-bind:class="needsCustomBlocks ? 'bg-amber-500/15 border-amber-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'" class="p-3 rounded-xl border text-right flex items-center justify-between transition">
                        <div class="text-xs">توسعه بلوک‌های اختصاصی ری‌اکت در گوتنبرگ</div>
                        <svg class="w-4 h-4" xyz-bind:class="needsCustomBlocks ? 'text-amber-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10" /><path d="m9 12 2 2 4-4" /></svg>
                    </button>
                    <button type="button" xyz-on:click="needsMigration = !needsMigration" xyz-bind:class="needsMigration ? 'bg-amber-500/15 border-amber-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'" class="p-3 rounded-xl border text-right flex items-center justify-between transition">
                        <div class="text-xs">انتقال کامل محتوا و ریدایرکت‌های ۳۰۱ سئو</div>
                        <svg class="w-4 h-4" xyz-bind:class="needsMigration ? 'text-amber-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10" /><path d="m9 12 2 2 4-4" /></svg>
                    </button>
                    <button type="button" xyz-on:click="needsCustomApi = !needsCustomApi" xyz-bind:class="needsCustomApi ? 'bg-amber-500/15 border-amber-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'" class="p-3 rounded-xl border text-right flex items-center justify-between transition">
                        <div class="text-xs">اتصال دوطرفه به وب‌سرویس و نرم‌افزار حسابداری/CRM</div>
                        <svg class="w-4 h-4" xyz-bind:class="needsCustomApi ? 'text-amber-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10" /><path d="m9 12 2 2 4-4" /></svg>
                    </button>
                    <button type="button" xyz-on:click="needsSpeedGuarantee = !needsSpeedGuarantee" xyz-bind:class="needsSpeedGuarantee ? 'bg-amber-500/15 border-amber-400 text-white' : 'bg-black/30 border-white/10 text-neutral-400'" class="p-3 rounded-xl border text-right flex items-center justify-between transition">
                        <div class="text-xs">تضمین کتبی رتبه ۱۰۰ Core Web Vitals گوگل</div>
                        <svg class="w-4 h-4" xyz-bind:class="needsSpeedGuarantee ? 'text-amber-400' : 'text-neutral-600'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10" /><path d="m9 12 2 2 4-4" /></svg>
                    </button>
                </div>
            </div>

            <!-- Left Quote Summary Card -->
            <div class="lg:col-span-5 bg-gradient-to-br from-[#1c160e] to-[#0f0c08] p-6 sm:p-8 rounded-2xl border border-amber-500/40 space-y-6">
                <h3 class="text-base font-bold text-white border-b border-white/10 pb-3">خلاصه برآورد پروژه اختصاصی</h3>
                <div class="space-y-3 text-xs">
                    <div class="flex justify-between text-neutral-300">
                        <span>نوع معماری:</span>
                        <span class="text-white" xyz-text="projectType === 'brand' ? 'سایت شرکتی / آژانسی' : projectType === 'store' ? 'فروشگاه تخصصی ووکامرس' : 'پرتال هدلس Next.js'"></span>
                    </div>
                    <div class="flex justify-between text-neutral-300">
                        <span>تعداد قالب‌های اختصاصی:</span>
                        <span class=" text-white"><span xyz-text="pageCount"></span> تمپلیت</span>
                    </div>
                    <div class="flex justify-between text-neutral-300">
                        <span>زمان اسپرینت تحویل:</span>
                        <span class="text-amber-400 font-bold" xyz-text="estimatedTimeline()"></span>
                    </div>
                    <div class="flex justify-between text-base font-bold text-white pt-3 border-t border-white/10">
                        <span>کل برآورد سرمایه‌گذاری:</span>
                        <span class="text-amber-400 font-bold text-xl" xyz-text="formatCurrency(calculateTotal())"></span>
                    </div>
                    <div class="flex justify-between text-xs text-neutral-400">
                        <span>مبلغ بیعانه حدودی:</span>
                        <span class="text-white font-bold" xyz-text="formatCurrency(Math.round(calculateTotal() * 0.5))"></span>
                    </div>
                </div>

                <!-- دکمه باز کردن پاپ‌آپ درخواست -->
                <button type="button" 
                        xyz-on:click="openBookingModal('custom')" 
                        class="w-full py-3.5 flex items-center justify-center gap-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition active:scale-95 shadow-lg shadow-amber-500/25">
                    <span>ثبت درخواست مشاوره و بررسی این پروژه</span>
                </button>
            </div>
        </div>
    </div>
</section>
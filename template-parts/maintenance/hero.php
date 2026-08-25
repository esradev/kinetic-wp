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
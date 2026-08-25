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
                                <template xyz-if="smsType === 'order'">
                                    <p class="text-xs text-neutral-200 leading-relaxed">
                                    📦 <strong>سفارش #۴۸۹۲۱ شما ارسال گردید!</strong> مرسوله شما تحویل پست پیشتاز شد. کد رهگیری ۲۴ رقمی: <span class="text-amber-400">۴۵۹۸۲۱۳۶۷۲۹۰</span>. پیگیری زنده: <span class="text-cyan-400 underline">romonet.ir/track</span>
                                    </p>
                                </template>
                                <!-- OTP SMS View -->
                                <template xyz-if="smsType === 'otp'">
                                    <p class="text-xs text-neutral-200 leading-relaxed">
                                        🔒 کد ورود و تایید هویت شما در سایت: <strong class="text-amber-400 tracking-widest text-sm">849210</strong>. معتبر به مدت ۲ دقیقه. این کد را در اختیار دیگران قرار ندهید.
                                    </p>
                                </template>
                                <!-- Cart Recovery SMS View -->
                                <template xyz-if="smsType === 'cart'"> 
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
                                    xyz-on:click="smsType = 'order'"
                                    xyz-bind:class="smsType === 'order' ? 'bg-cyan-500 text-black font-bold' : 'bg-white/5 text-neutral-300'"
                                    class="py-1.5 text-[10px] rounded-lg transition">
                                    ارسال سفارش
                                </button>
                                <button
                                    xyz-on:click="smsType = 'otp'"
                                    xyz-bind:class="smsType === 'otp' ? 'bg-cyan-500 text-black font-bold' : 'bg-white/5 text-neutral-300'"
                                    class="py-1.5 text-[10px] rounded-lg transition">
                                    کد تایید OTP
                                </button>
                                <button
                                    xyz-on:click="smsType = 'cart'"
                                    xyz-bind:class="smsType === 'cart' ? 'bg-cyan-500 text-black font-bold' : 'bg-white/5 text-neutral-300'"
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

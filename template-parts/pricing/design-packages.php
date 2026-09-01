<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <template xyz-for="pkg in packages" xyz-bind:key="pkg.id">
            <div
                class="glass-panel rounded-3xl p-8 border flex flex-col justify-between transition-all relative backdrop-blur-xl"
                xyz-bind:class="pkg.popular 
        ? 'border-amber-500/60 shadow-2xl shadow-amber-500/10 bg-gradient-to-b from-[#18140c] to-[#0f0e0c]' 
        : 'border-white/10 hover:border-white/20 bg-white/5'">
                
                <!-- Popular Badge -->
                <template xyz-if="pkg.badge">
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-amber-500 text-black text-[11px] font-bold shadow-lg" xyz-text="pkg.badge"></span>
                </template>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-2xl font-extrabold text-white" xyz-text="pkg.title"></h3>
                        <p class="text-xs text-neutral-400 mt-1" xyz-text="pkg.idealFor"></p>
                    </div>

                    <div class="pt-2 flex items-baseline gap-2">
                        <span class="text-xs text-neutral-400">شروع سرمایه‌گذاری از</span>
                        <span class="text-3xl sm:text-4xl font-black text-white" xyz-text="formatCurrency(pkg.priceStartingAt)"></span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-black/40 border border-white/10 space-y-1 text-xs">
                        <div class="flex justify-between text-neutral-300">
                            <span>مدت زمان اسپرینت تحویل:</span>
                            <span class="text-amber-400 font-bold" xyz-text="pkg.timeline"></span>
                        </div>
                    </div>

                    <p class="text-xs text-neutral-300 leading-relaxed" xyz-text="pkg.description"></p>

                    <!-- Deliverables -->
                    <div class="space-y-2.5 pt-2">
                        <div class="text-[11px] text-neutral-400 font-semibold">اقلام تحویلی در این پکیج:</div>
                        <template xyz-for="(d, idx) in pkg.deliverables" xyz-bind:key="idx">
                            <div class="flex items-start gap-2.5 text-xs text-neutral-300">
                                <svg class="w-4 h-4 text-amber-400 shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="m9 12 2 2 4-4" />
                                </svg>
                                <span xyz-text="d"></span>
                            </div>
                        </template>
                    </div>

                    <!-- Tech Stack Badges -->
                    <div class="pt-2">
                        <div class="text-[11px] text-neutral-400 font-semibold mb-2">استک فنی مدرن:</div>
                        <div class="flex flex-wrap gap-1.5">
                            <template xyz-for="(tech, idx) in pkg.techStack" xyz-bind:key="idx">
                                <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-amber-300 border border-white/10 " xyz-text="tech"></span>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-8 mt-6 border-t border-white/10">
                    <button
                        xyz-on:click="openBookingModal('package', pkg)"
                        class="w-full py-3.5 rounded-xl text-xs font-extrabold transition active:scale-95 flex items-center justify-center gap-2"
                        xyz-bind:class="pkg.popular 
            ? 'bg-amber-500 hover:bg-amber-400 text-black shadow-lg shadow-amber-500/25' 
            : 'bg-white/10 hover:bg-white/20 text-white'">
                        <span>درخواست مشاوره برای این پکیج</span>
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

<!-- Lead Capture Modal Popup -->
<div xyz-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm">
    <div xyz-on:click.away="closeBookingModal()" class="bg-[#14110b] border border-white/10 rounded-2xl w-full max-w-md p-6 sm:p-8 relative shadow-2xl">
        
        <!-- دکمه بستن -->
        <button xyz-on:click="closeBookingModal()" class="absolute top-4 left-4 text-neutral-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <template xyz-if="!submitSuccess">
            <div>
                <h3 class="text-xl font-bold text-white mb-2">ثبت درخواست پروژه</h3>
                <p class="text-xs text-neutral-400 mb-6">برای تماس کارشناسان ما و بررسی جزئیات، لطفا اطلاعات خود را وارد کنید.</p>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs text-neutral-300 mb-1.5">نام و نام خانوادگی</label>
                        <input type="text" xyz-model="customerName" class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-amber-500 transition" placeholder="مثال: علی احمدی">
                    </div>
                    <div>
                        <label class="block text-xs text-neutral-300 mb-1.5">شماره موبایل</label>
                        <input type="tel" xyz-model="customerPhone" class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-amber-500 transition text-left" dir="ltr" placeholder="09123456789">
                    </div>

                    <button type="button" 
                            xyz-on:click="submitBooking()" 
                            xyz-bind:disabled="isSubmitting"
                            class="w-full mt-4 py-3.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-sm transition active:scale-95 flex items-center justify-center gap-2 disabled:opacity-75 disabled:cursor-not-allowed">
                        <svg xyz-show="isSubmitting" class="animate-spin h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span xyz-show="!isSubmitting">ثبت نهایی درخواست</span>
                        <span xyz-show="isSubmitting" style="display: none;">در حال ثبت...</span>
                    </button>
                </div>
            </div>
        </template>

        <!-- حالت موفقیت‌آمیز -->
        <template xyz-if="submitSuccess">
            <div class="text-center py-6">
                <div class="w-16 h-16 bg-emerald-500/20 text-emerald-400 rounded-full flex items-center justify-center mx-auto mb-4 border border-emerald-500/30">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">درخواست ثبت شد!</h3>
                <p class="text-sm text-neutral-300 leading-relaxed" xyz-text="successMessage"></p>
                <button xyz-on:click="closeBookingModal()" class="mt-6 px-6 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs transition">متوجه شدم</button>
            </div>
        </template>

    </div>
</div>
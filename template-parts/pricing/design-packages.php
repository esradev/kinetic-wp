<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                        <div class="flex justify-between text-neutral-400 text-[11px]">
                            <span>تضمین امتیاز سرعت موبایل:</span>
                            <span class="text-emerald-400 font-bold">۱۰۰ از ۱۰۰ گوگل</span>
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
                        xyz-on:click="bookPackageSprint(pkg)"
                        class="w-full py-3.5 rounded-xl text-xs font-extrabold transition active:scale-95 flex items-center justify-center gap-2"
                        xyz-bind:class="pkg.popular 
            ? 'bg-amber-500 hover:bg-amber-400 text-black shadow-lg shadow-amber-500/25' 
            : 'bg-white/10 hover:bg-white/20 text-white'">
                        <span>رزرو اسپرینت و پرداخت بیعانه (<span xyz-text="formatCurrency(Math.round(pkg.priceStartingAt * 0.5))"></span>)</span>
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
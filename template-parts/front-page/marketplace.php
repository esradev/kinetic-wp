<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 pb-4 border-b border-white/10">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-500/10 text-purple-400 border border-purple-500/20 text-xs mb-2">
                محصولات تخصصی wpstorm
            </div>
            <h2 class="text-3xl font-extrabold text-white tracking-tight">
                قالب‌ها و افزونه‌های آزموده‌شده در پروژه‌های واقعی
            </h2>
            <p class="text-sm text-neutral-400 mt-1">
                توسعه‌یافته بر پایه PHP 8.2+، بلوک‌های بومی ری‌اکت و کاملاً سازگار با آخرین نسخه وردپرس و ووکامرس.
            </p>
        </div>

        <div class="flex items-center gap-2">
            <div class="bg-white/5 p-1 rounded-xl border border-white/10 flex items-center">
                <button
                    xyz-on:click="activeTab = 'all'"
                    xyz-bind:class="activeTab === 'all' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                    class="px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                    همه
                </button>
                <button
                    xyz-on:click="activeTab = 'themes'"
                    xyz-bind:class="activeTab === 'themes' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                    class="px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                    قالب‌ها
                </button>
                <button
                    xyz-on:click="activeTab = 'plugins'"
                    xyz-bind:class="activeTab === 'plugins' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                    class="px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                    افزونه‌ها
                </button>
            </div>

            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-xs text-amber-400 border border-white/10 flex items-center gap-1.5">
                <span>مشاهده کاتالوگ کامل</span>
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Products Grid (Real WooCommerce Data) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <template xyz-for="product in filteredProducts()" xyz-bind:key="product.id">
            <div class="glass-card rounded-2xl border border-white/10 overflow-hidden flex flex-col justify-between group hover:border-amber-500/40 transition-all bg-white/5 backdrop-blur-md">
                <div>
                    <!-- Image Banner -->
                    <div class="relative h-48 overflow-hidden bg-black/50">
                        <img
                            xyz-bind:src="product.bannerImage"
                            xyz-bind:alt="product.name"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0d0f17] via-transparent to-transparent"></div>

                        <template xyz-if="product.badge">
                            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-md bg-amber-500/90 text-black text-[11px] font-bold shadow-md" xyz-text="product.badge"></span>
                        </template>

                        <span class="absolute top-3 left-3 px-2 py-0.5 rounded bg-black/70 backdrop-blur text-neutral-300 text-[10px] border border-white/10" xyz-text="product.type === 'theme' ? 'قالب' : 'افزونه'"></span>
                    </div>

                    <!-- Content -->
                    <div class="p-5 space-y-3">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-neutral-400" xyz-text="product.category"></span>
                            <div class="flex items-center gap-1 text-amber-400 ">
                                <svg class="w-3.5 h-3.5 fill-current text-amber-400" viewBox="0 0 24 24">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                                <span xyz-text="product.rating"></span>
                                <span class="text-neutral-500">(<span xyz-text="product.reviewsCount"></span>)</span>
                            </div>
                        </div>

                        <a xyz-bind:href="product.url" class="block">
                            <h3 class="text-base font-bold text-white group-hover:text-amber-400 transition line-clamp-1" xyz-text="product.name"></h3>
                        </a>

                        <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed" xyz-text="product.tagline"></p>

                        <div class="pt-2 flex flex-wrap gap-1.5">
                            <template xyz-for="(tag, idx) in product.tags" xyz-bind:key="idx">
                                <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-neutral-400 border border-white/5" xyz-text="'#' + tag"></span>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Price & Action -->
                <div class="p-5 pt-0">
                    <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-neutral-500 block">لایسنس استاندارد</span>
                            <span class="text-base font-bold text-white" xyz-text="formatCurrency(product.price)"></span>
                        </div>

                        <div class="flex items-center gap-2">
                            <a
                                xyz-bind:href="product.url"
                                class="p-2 rounded-lg bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white border border-white/10 transition"
                                title="مشاهده جزییات">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                    <polyline points="15 3 21 3 21 9" />
                                    <line x1="10" x2="21" y1="14" y2="3" />
                                </svg>
                            </a>
                            <button
                                xyz-on:click="quickBuy(product)"
                                class="px-3.5 py-2 rounded-lg bg-amber-500 hover:bg-amber-400 text-black font-bold text-xs transition">
                                خرید سریع
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</section>
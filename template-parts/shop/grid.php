<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <template xyz-for="product in filteredProducts()" xyz-bind:key="product.id">
        <div class="glass-card rounded-2xl border border-white/10 overflow-hidden flex flex-col justify-between group hover:border-amber-500/50 transition-all shadow-xl hover:shadow-2xl bg-white/5 backdrop-blur-md">
            <div>
                <!-- Banner & Badges -->
                <a xyz-bind:href="product.url" class="relative h-56 overflow-hidden bg-black/60 block">
                    <img
                        xyz-bind:src="product.bannerImage"
                        xyz-bind:alt="product.name"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0d0f17] via-black/20 to-transparent"></div>

                    <template xyz-if="product.badge">
                        <span class="absolute top-3 right-3 px-3 py-1 rounded-md bg-amber-500 text-black text-[11px] font-bold shadow-md" xyz-text="product.badge"></span>
                    </template>

                    <span
                        class="absolute top-3 left-3 px-2.5 py-1 rounded bg-black/80 backdrop-blur text-neutral-300 text-[10px] border border-white/15"
                        xyz-text="product.type === 'theme' ? 'قالب وردپرس' : 'افزونه وردپرس'"></span>

                    <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs text-neutral-300">
                        <span class="bg-black/70 px-2 py-0.5 rounded border border-white/10">
                            نسخه <span xyz-text="product.version"></span>
                        </span>
                        <span class="bg-black/70 px-2 py-0.5 rounded border border-white/10 text-emerald-400">
                            وردپرس <span xyz-text="product.wpVersion"></span>
                        </span>
                    </div>
                </a>

                <!-- Body Content -->
                <div class="p-6 space-y-3">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-neutral-400" xyz-text="product.category"></span>
                        <div class="flex items-center gap-1 text-amber-400 ">
                            <svg class="w-3.5 h-3.5 fill-current text-amber-400" viewBox="0 0 24 24">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                            <span class="font-bold" xyz-text="product.rating"></span>
                            <span class="text-neutral-500">(<span xyz-text="product.reviewsCount"></span> نظر)</span>
                        </div>
                    </div>

                    <a xyz-bind:href="product.url" class="block">
                        <h2 class="text-lg font-bold text-white group-hover:text-amber-400 transition cursor-pointer line-clamp-1" xyz-text="product.name"></h2>
                    </a>

                    <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed" xyz-text="product.tagline"></p>

                    <!-- Feature Bullets -->
                    <div class="space-y-1.5 pt-2">
                        <template xyz-for="(kf, idx) in product.keyFeatures.slice(0, 2)" xyz-bind:key="idx">
                            <div class="flex items-center gap-2 text-xs text-neutral-300">
                                <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                <span class="truncate" xyz-text="kf.title"></span>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Price Footer -->
            <div class="p-6 pt-0">
                <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-neutral-500 block">شروع قیمت از</span>
                        <span class="text-lg font-black text-white" xyz-text="formatCurrency(product.licenses[0].price)"></span>
                    </div>

                    <div class="flex items-center gap-2">
                        <a
                            xyz-bind:href="product.url"
                            class="px-3 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-white border border-white/10 text-xs transition">
                            جزییات کالا
                        </a>

                        <button
                            type="button"
                            xyz-on:click="buyProduct(product, $event)"
                            class="px-3.5 py-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-extrabold text-xs transition active:scale-95 shadow-lg shadow-amber-500/25 flex items-center justify-center gap-1.5 min-w-[70px]">
                            <span>خرید</span>
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m12 19-7-7 7-7" />
                                <path d="M19 12H5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>

<!-- No Products Found -->
<template xyz-if="filteredProducts().length === 0">
    <div class="glass-panel p-12 text-center rounded-2xl border border-white/10 space-y-3 bg-white/5 backdrop-blur-md">
        <p class="text-neutral-400 text-sm">هیچ محصولی با مشخصات و فیلترهای انتخابی یافت نشد.</p>
        <button
            xyz-on:click="filterType = 'all'; selectedTag = 'همه'; searchQuery = '';"
            class="text-xs text-amber-400 underline">
            پاک کردن تمام فیلترها
        </button>
    </div>
</template>
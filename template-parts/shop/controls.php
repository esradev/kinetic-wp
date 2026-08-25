<div class="glass-panel p-4 rounded-2xl border border-white/10 space-y-4 bg-white/5 backdrop-blur-xl">
    <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">

        <!-- Type selector -->
        <div class="flex items-center bg-white/5 p-1 rounded-xl border border-white/10 w-full sm:w-auto">
            <button
                type="button"
                xyz-on:click="filterType = 'all'"
                xyz-bind:class="filterType === 'all' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition">
                همه محصولات (<span xyz-text="products.length"></span>)
            </button>

            <button
                type="button"
                xyz-on:click="filterType = 'theme'"
                xyz-bind:class="filterType === 'theme' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition">
                فقط قالب‌ها
            </button>

            <button
                type="button"
                xyz-on:click="filterType = 'plugin'"
                xyz-bind:class="filterType === 'plugin' ? 'bg-amber-500 text-black shadow' : 'text-neutral-400 hover:text-white'"
                class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition">
                فقط افزونه‌ها
            </button>
        </div>

        <!-- Search & Sort -->
        <div class="flex items-center gap-3 w-full lg:w-auto">
            <div class="relative flex-1 sm:w-64">
                <svg class="w-4 h-4 text-neutral-500 absolute right-3.5 top-1/2 -translate-y-1/2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                <input
                    type="text"
                    xyz-model="searchQuery"
                    placeholder="جستجو در محصولات..."
                    class="w-full bg-black/50 border border-white/10 focus:border-amber-400 rounded-xl pr-10 pl-4 py-2 text-xs text-white placeholder-neutral-500 focus:outline-none transition font-sans" />
            </div>

            <select
                xyz-model="sortBy"
                class="bg-black/50 border border-white/10 text-xs text-neutral-300 rounded-xl px-3 py-2 focus:outline-none">
                <option value="popular">محبوب‌ترین‌ها</option>
                <option value="rating">بالاترین امتیاز</option>
                <option value="price-asc">قیمت: کم به زیاد</option>
                <option value="price-desc">قیمت: زیاد به کم</option>
            </select>
        </div>
    </div>

    <!-- Tags scroll -->
    <div class="flex items-center gap-1.5 overflow-x-auto pt-2 border-t border-white/5 pb-1">
        <span class="text-[11px] text-neutral-400 ml-2 shrink-0">فیلتر بر اساس تگ:</span>
        <template xyz-for="tag in tags" xyz-bind:key="tag">
            <button
                type="button"
                xyz-on:click="selectedTag = tag"
                xyz-bind:class="selectedTag === tag 
      ? 'bg-amber-500/20 text-amber-300 border border-amber-500/40 font-semibold' 
      : 'bg-white/5 text-neutral-400 hover:text-white hover:bg-white/10'"
                class="px-3 py-1 rounded-lg text-xs whitespace-nowrap transition"
                xyz-text="tag">
            </button>
        </template>
    </div>
</div>
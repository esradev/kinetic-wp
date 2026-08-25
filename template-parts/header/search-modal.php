<!-- Search Modal -->
<div xyz-show="isSearchOpen" class="fixed inset-0 z-50 overflow-y-auto p-4 sm:p-6 md:p-20 flex items-start justify-center" dir="rtl" style="display: none;">
  <div xyz-show="isSearchOpen" xyz-transition.opacity class="fixed inset-0 bg-black/80 backdrop-blur-md" xyz-on:click="isSearchOpen = false"></div>

  <div xyz-show="isSearchOpen" xyz-transition class="relative w-full max-w-2xl bg-[#0e101a] border border-white/15 rounded-2xl shadow-2xl overflow-hidden z-10">
    <div class="p-4 border-b border-white/10 flex items-center gap-3 bg-[#131624]">
      <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8" />
        <path d="m21 21-4.3-4.3" />
      </svg>
      <input type="text" xyz-model="searchQuery" xyz-ref="searchInput" placeholder="جستجو در قالب‌ها، افزونه‌های wpstorm، مقالات..." class="flex-1 bg-transparent text-white placeholder-neutral-500 text-sm focus:outline-none font-sans" />
      <button xyz-show="searchQuery.length > 0" xyz-on:click="searchQuery = ''" class="p-1 rounded text-neutral-400 hover:text-white">
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M18 6 6 18" />
          <path d="m6 6 12 12" />
        </svg>
      </button>
      <kbd class="hidden sm:inline-block px-2 py-0.5 text-[10px]  text-neutral-400 bg-white/5 border border-white/10 rounded">ESC</kbd>
    </div>

    <!-- Results List -->
    <div class="max-h-96 overflow-y-auto p-4 space-y-5">
      <template xyz-if="filteredServices().length > 0">
        <div>
          <div class="text-[11px] uppercase text-neutral-400 font-semibold px-2 mb-2">خدمات تخصصی مهندسی و تعرفه‌ها</div>
          <div class="space-y-1">
            <template xyz-for="srv in filteredServices()" xyz-bind:key="srv.title">
              <a xyz-bind:href="srv.url" class="w-full text-right p-2.5 rounded-xl hover:bg-white/5 transition flex items-center justify-between group">
                <div class="flex items-center gap-3">
                  <div class="p-2 rounded-lg bg-amber-500/10 text-amber-400 group-hover:bg-amber-500/20">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z" /><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65" /><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65" /></svg>
                  </div>
                  <div>
                    <div class="text-sm font-semibold text-white group-hover:text-amber-300" xyz-text="srv.title"></div>
                    <div class="text-xs text-neutral-400" xyz-text="srv.desc"></div>
                  </div>
                </div>
              </a>
            </template>
          </div>
        </div>
      </template>

      <template xyz-if="filteredProducts().length > 0">
        <div>
          <div class="text-[11px] uppercase text-neutral-400 font-semibold px-2 mb-2">قالب‌ها و افزونه‌های wpstorm (<span xyz-text="filteredProducts().length"></span>)</div>
          <div class="space-y-1">
            <template xyz-for="prod in filteredProducts()" xyz-bind:key="prod.id">
              <a xyz-bind:href="prod.url" class="w-full text-right p-2.5 rounded-xl hover:bg-white/5 transition flex items-center justify-between group">
                <div class="flex items-center gap-3">
                  <div class="p-2 rounded-lg bg-cyan-500/10 text-cyan-400 group-hover:bg-cyan-500/20">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" /><path d="M3 6h18" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
                  </div>
                  <div>
                    <div class="text-sm font-semibold text-white group-hover:text-cyan-300 flex items-center gap-2">
                      <span xyz-text="prod.name"></span>
                      <span class="text-[10px] px-1.5 py-0.2 bg-white/10 rounded text-neutral-300" xyz-text="prod.type === 'theme' ? 'قالب' : 'افزونه'"></span>
                    </div>
                    <div class="text-xs text-neutral-400 line-clamp-1" xyz-text="prod.tagline"></div>
                  </div>
                </div>
                <div class="text-xs font-bold text-amber-400" dir="ltr">شروع از <span xyz-text="formatCurrency(prod.price)"></span></div>
              </a>
            </template>
          </div>
        </div>
      </template>

      <template xyz-if="filteredServices().length === 0 && filteredProducts().length === 0">
        <div class="py-10 text-center text-neutral-500 text-sm">
          نتیجه‌ای برای عبارت «<span xyz-text="searchQuery"></span>» یافت نشد.
        </div>
      </template>
    </div>
  </div>
</div>
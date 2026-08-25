<!-- Main Glass Header -->
<header class="relative z-30 w-full backdrop-blur-xl bg-[#08090d]/85 border-b border-white/10 transition-colors duration-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-18">
      
      <!-- Brand Logo & wpstorm Badge -->
      <div class="flex items-center gap-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 group text-right focus:outline-none">
          <div
            class="relative flex items-center justify-center w-11 h-11 rounded-xl bg-linear-to-br from-amber-400 via-amber-500 to-amber-600 p-0.5 shadow-[0_0_20px_rgba(245,158,11,0.25)] group-hover:shadow-[0_0_30px_rgba(245,158,11,0.45)] transition-all duration-500"
            xyz-bind:class="isScrolled ? 'opacity-0 translate-y-8 scale-95' : 'opacity-100 translate-y-0 scale-100'">
            <div class="w-full h-full bg-[#090a0f] rounded-[10px] flex items-center justify-center transition-colors group-hover:bg-transparent">
              <span class=" font-black text-xl text-amber-400 group-hover:text-black transition-colors">
                R
              </span>
            </div>
          </div>
          <div>
            <div class="flex items-center gap-2">
              <span class="font-bold text-xl tracking-tight text-white group-hover:text-amber-400 transition-colors">
                رومونت
              </span>
              <span class="text-xs  font-bold text-amber-400 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/20">
                .ir
              </span>
            </div>
            <div class="flex items-center gap-1.5 text-[10px] text-neutral-400">
              <span class="text-amber-500 font-bold ">wpstorm</span>
              <span>/ دپارتمان تخصصی وردپرس</span>
            </div>
          </div>
        </a>
      </div>

      <!-- Centered Search Trigger -->
      <div class="hidden md:flex absolute left-1/2 -translate-x-1/2">
        <button
          xyz-on:click="isSearchOpen = true"
          class="p-2.5 w-md rounded-lg bg-white/5 border border-white/10 hover:border-amber-400/40 hover:bg-white/10 text-neutral-300 hover:text-white transition-all flex items-center gap-2 group"
          title="جستجوی سریع در محصولات، پلن‌ها و مقالات (Ctrl+K)">
          <svg class="w-4 h-4 text-neutral-400 group-hover:text-amber-400 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.3-4.3" />
          </svg>
          <span class="hidden xl:inline text-xs text-neutral-400 group-hover:text-neutral-200">
            جستجو...
          </span>
          <kbd class="hidden xl:inline-block text-[10px]  bg-black/40 border border-white/10 text-neutral-400 px-1.5 py-0.5 rounded">
            ⌘K
          </kbd>
        </button>
      </div>

      <!-- Right Action Icons & Controls -->
      <div class="flex items-center gap-2 sm:gap-3">
        <!-- Theme Toggle -->
        <button
          xyz-on:click="toggleTheme()"
          class="flex p-2.5 rounded-lg transition-all duration-300 relative group overflow-hidden border"
          xyz-bind:class="theme === 'dark' ? 'bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-amber-300 border-white/10' : 'bg-white/80 hover:bg-white text-slate-800 hover:text-amber-600 border-slate-200 shadow-sm'">
          <div class="relative w-4 h-4 flex items-center justify-center">
            <template xyz-if="theme === 'dark'">
              <svg class="w-4 h-4 text-amber-400 transition-transform duration-500 group-hover:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="4" />
                <path d="M12 2v2" />
                <path d="M12 20v2" />
                <path d="m4.93 4.93 1.41 1.41" />
                <path d="m17.66 17.66 1.41 1.41" />
                <path d="M2 12h2" />
                <path d="M20 12h2" />
                <path d="m6.34 17.66-1.41 1.41" />
                <path d="m19.07 4.93-1.41 1.41" />
              </svg>
            </template>
            <template xyz-if="theme === 'light'">
              <svg class="w-4 h-4 text-slate-800 transition-transform duration-500 group-hover:-rotate-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
              </svg>
            </template>
          </div>
        </button>

        <!-- Shopping Cart Drawer Trigger -->
        <button
          xyz-on:click="isCartDrawerOpen = true"
          class="relative p-2.5 rounded-lg bg-white/5 border border-white/10 hover:border-amber-400/40 hover:bg-white/10 text-neutral-300 hover:text-white transition-all group"
          title="مشاهده سبد خرید و تسویه‌حساب">
          <svg class="w-4 h-4 text-neutral-400 group-hover:text-amber-400 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="8" cy="21" r="1" />
            <circle cx="19" cy="21" r="1" />
            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
          </svg>
          <template xyz-if="totalItemsCount() > 0">
            <span
              xyz-text="totalItemsCount()"
              class="absolute -top-1.5 -right-1.5 bg-linear-to-r from-amber-500 to-amber-600 text-black text-[11px] font-bold w-5 h-5 rounded-full flex items-center justify-center shadow-lg shadow-amber-500/30 animate-pulse ">
            </span>
          </template>
        </button>

        <!-- Consultation / Quote CTA -->
        <a
          href="<?php echo esc_url(home_url('/site-design-pricing')); ?>"
          class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-linear-to-r from-amber-400 via-amber-500 to-amber-600 text-black font-semibold text-xs hover:brightness-110 active:scale-95 transition-all shadow-[0_0_15px_rgba(245,158,11,0.25)]">
          <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
          </svg>
          <span>استعلام پروژه</span>
        </a>

        <!-- Mobile Hamburger Toggle -->
        <button
          xyz-on:click="isMobileMenuOpen = !isMobileMenuOpen"
          class="lg:hidden p-2.5 rounded-xl border shadow-[0_8px_24px_rgba(0,0,0,0.25)] transition-all duration-300"
          xyz-bind:class="isMobileMenuOpen ? 'bg-amber-500/15 border-amber-400/40 text-amber-300' : 'bg-white/5 border-white/10 text-neutral-300 hover:text-white hover:bg-white/10 hover:border-amber-400/40'">
          <template xyz-if="!isMobileMenuOpen">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="4" x2="20" y1="12" y2="12" />
              <line x1="4" x2="20" y1="6" y2="6" />
              <line x1="4" x2="20" y1="18" y2="18" />
            </svg>
          </template>
          <template xyz-if="isMobileMenuOpen">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </template>
        </button>
      </div>
    </div>
  </div>
  
  <!-- فایل Mobile Menu در این قسمت لود میشود -->
  <?php get_template_part('template-parts/header/mobile', 'menu'); ?>
</header>
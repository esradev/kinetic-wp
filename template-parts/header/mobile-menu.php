<!-- Mobile Navigation Drawer -->
<div
  xyz-show="isMobileMenuOpen"
  xyz-transition:enter="transition ease-out duration-200"
  xyz-transition:enter-start="opacity-0 -translate-y-2"
  xyz-transition:enter-end="opacity-100 translate-y-0"
  xyz-transition:leave="transition ease-in duration-150"
  xyz-transition:leave-start="opacity-100 translate-y-0"
  xyz-transition:leave-end="opacity-0 -translate-y-2"
  class="lg:hidden bg-[#0a0c12]/95 border-b border-white/10 px-4 pt-3 pb-6 space-y-3"
  style="display: none;">
  <div class="grid gap-1">
    <a href="<?php echo esc_url(home_url('/site-design-pricing')); ?>" class="flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium transition-all text-neutral-300 hover:text-white hover:bg-white/5">
      <div class="flex items-center gap-2.5">
        <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z" />
          <path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65" />
          <path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65" />
        </svg>
        <span>طراحی سایت اختصاصی</span>
      </div>
      <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">اسپرینت</span>
    </a>
    <a href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>" class="flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium transition-all text-neutral-300 hover:text-white hover:bg-white/5">
      <div class="flex items-center gap-2.5">
        <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
          <path d="m9 12 2 2 4-4" />
        </svg>
        <span>پشتیبانی وردپرس (wpstorm)</span>
      </div>
      <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">SLA</span>
    </a>
    <a href="<?php echo esc_url(home_url('/sms-pricing')); ?>" class="flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium transition-all text-neutral-300 hover:text-white hover:bg-white/5">
      <div class="flex items-center gap-2.5">
        <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
          <path d="M8 12a2 2 0 0 0 2-2V8H8" />
          <path d="M14 12a2 2 0 0 0 2-2V8h-2" />
        </svg>
        <span>سامانه پیامک رومونت</span>
      </div>
      <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">خط خدماتی</span>
    </a>
    <a href="<?php echo esc_url(home_url('/shop')); ?>" class="flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium transition-all text-neutral-300 hover:text-white hover:bg-white/5">
      <div class="flex items-center gap-2.5">
        <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="m18 16 4-4-4-4" />
          <path d="m6 8-4 4 4 4" />
          <path d="m14.5 4-5 16" />
        </svg>
        <span>مارکت‌پلیس قالب و افزونه</span>
      </div>
      <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">اورجینال</span>
    </a>
    <a href="<?php echo esc_url(home_url('/blog')); ?>" class="flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium transition-all text-neutral-300 hover:text-white hover:bg-white/5">
      <div class="flex items-center gap-2.5">
        <span>وبلاگ و آموزش‌ها</span>
      </div>
    </a>
  </div>

  <div class="border-t border-white/5 pt-3 pb-1 flex items-center justify-between px-3">
    <span class="text-xs text-neutral-400">پوسته ظاهری:</span>
    <div class="inline-flex items-center p-1 rounded-xl bg-black/40 border border-white/10 backdrop-blur-md">
      <button
        xyz-on:click="setTheme('dark')"
        xyz-bind:class="theme === 'dark' ? 'bg-linear-to-r from-amber-500/20 to-amber-600/20 text-amber-300 border border-amber-500/30 shadow-sm' : 'text-neutral-400 hover:text-white'"
        class="flex items-center gap-1.5 px-2.5 py-1 text-xs font-sans rounded-lg transition-all">
        <svg class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
        </svg>
        <span>شب</span>
      </button>

      <button
        xyz-on:click="setTheme('light')"
        xyz-bind:class="theme === 'light' ? 'bg-white text-slate-900 border border-slate-200 shadow-md font-semibold' : 'text-neutral-400 hover:text-white'"
        class="flex items-center gap-1.5 px-2.5 py-1 text-xs font-sans rounded-lg transition-all">
        <svg class="w-3.5 h-3.5 text-amber-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
        <span>روز</span>
      </button>
    </div>
  </div>

  <div class="pt-2">
    <a
      href="<?php echo esc_url(home_url('/site-design-pricing')); ?>"
      class="w-full py-3 rounded-lg bg-linear-to-r from-amber-400 via-amber-500 to-amber-600 text-black font-bold text-sm flex items-center justify-center gap-2 shadow-lg shadow-amber-500/20">
      <span>مشاوره و استعلام پروژه اختصاصی</span>
      <svg class="w-4 h-4 rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M5 12h14" />
        <path d="m12 5 7 7-7 7" />
      </svg>
    </a>
  </div>
</div>
<!-- Third Navigation Bar (Full Text Visibility) -->
<div
  xyz-transition:enter="transition ease-out duration-300"
  xyz-transition:enter-start="opacity-0 -translate-y-2"
  xyz-transition:enter-end="opacity-100 translate-y-0"
  xyz-transition:leave="transition ease-in duration-200"
  xyz-transition:leave-start="opacity-100 translate-y-0"
  xyz-transition:leave-end="opacity-0 -translate-y-2"
  class="block sticky top-0 z-40 border-t border-white/10 bg-[#0b0d14]/90 backdrop-blur-xl">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center  gap-2 py-2 overflow-x-auto whitespace-nowrap scrollbar-thin">
      <a
        xyz-show="isScrolled"
        xyz-transition:enter="transition ease-out duration-300"
        xyz-transition:enter-start="opacity-0 -translate-y-6 scale-95"
        xyz-transition:enter-end="opacity-100 translate-y-0 scale-100"
        xyz-transition:leave="transition ease-in duration-200"
        xyz-transition:leave-start="opacity-100 translate-y-0 scale-100"
        xyz-transition:leave-end="opacity-0 -translate-y-6 scale-95"
        href="<?php echo esc_url(home_url('/')); ?>"
        class="group relative flex items-center justify-center w-9 h-9 rounded-xl bg-linear-to-br from-amber-400 via-amber-500 to-amber-600 p-0.5 shadow-[0_0_20px_rgba(245,158,11,0.25)] hover:shadow-[0_0_30px_rgba(245,158,11,0.45)] transition-all duration-300 shrink-0"
        style="display: none;">
        <div class="w-full h-full bg-[#090a0f] rounded-[10px] flex items-center justify-center transition-colors group-hover:bg-transparent">
          <span class=" font-black text-xl text-amber-400 group-hover:text-black transition-colors">R</span>
        </div>
      </a>

      <a href="<?php echo esc_url(home_url('/site-design-pricing')); ?>" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-sm font-medium rounded-xl bg-white/5 border border-white/10 text-neutral-200 hover:text-white hover:bg-white/10 hover:border-amber-400/40 transition-all">
        <span>طراحی سایت اختصاصی</span>
        <span class="text-[10px] px-1.5 py-0.5 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">اسپرینت</span>
      </a>
      <a href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-sm font-medium rounded-xl bg-white/5 border border-white/10 text-neutral-200 hover:text-white hover:bg-white/10 hover:border-amber-400/40 transition-all">
        <span>پشتیبانی وردپرس (wpstorm)</span>
        <span class="text-[10px] px-1.5 py-0.5 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">SLA</span>
      </a>
      <a href="<?php echo esc_url(home_url('/sms-pricing')); ?>" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-sm font-medium rounded-xl bg-white/5 border border-white/10 text-neutral-200 hover:text-white hover:bg-white/10 hover:border-amber-400/40 transition-all">
        <span>سامانه پیامک رومونت</span>
        <span class="text-[10px] px-1.5 py-0.5 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">خط خدماتی</span>
      </a>
      <a href="<?php echo esc_url(home_url('/shop')); ?>" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-sm font-medium rounded-xl bg-white/5 border border-white/10 text-neutral-200 hover:text-white hover:bg-white/10 hover:border-amber-400/40 transition-all">
        <span>مارکت‌پلیس قالب و افزونه</span>
        <span class="text-[10px] px-1.5 py-0.5 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">اورجینال</span>
      </a>
      <a href="<?php echo esc_url(home_url('/blog')); ?>" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-sm font-medium rounded-xl bg-white/5 border border-white/10 text-neutral-200 hover:text-white hover:bg-white/10 hover:border-amber-400/40 transition-all">
        <span>وبلاگ و آموزش‌ها</span>
      </a>
    </nav>
  </div>
</div>
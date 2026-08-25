<div class="mt-12 pt-8 border-t border-white/10 flex flex-col md:flex-row items-center justify-between text-xs text-neutral-400 gap-4">
  <p>© <?php echo date('Y'); ?> تمامی حقوق برای هلدینگ رومونت (Romonet.ir) و دپارتمان تخصصی وردپرس wpstorm محفوظ است.</p>
  <div class="flex flex-wrap items-center gap-4 sm:gap-6">

    <!-- Segmented Theme Toggle -->
    <div class="inline-flex items-center p-1 rounded-xl bg-black/40 border border-white/10 backdrop-blur-md">
      <button
        xyz-on:click="setGlobalTheme('dark')"
        xyz-bind:class="currentTheme === 'dark' ? 'bg-gradient-to-r from-amber-500/20 to-amber-600/20 text-amber-300 border border-amber-500/30 shadow-sm' : 'text-neutral-400 hover:text-white'"
        class="flex items-center gap-1.5 px-2.5 py-1 text-xs font-sans rounded-lg transition-all"
        title="حالت دارک ابسیدین">
        <svg class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
        </svg>
        <span>شب</span>
      </button>

      <button
        xyz-on:click="setGlobalTheme('light')"
        xyz-bind:class="currentTheme === 'light' ? 'bg-white text-slate-900 border border-slate-200 shadow-md font-semibold' : 'text-neutral-400 hover:text-white'"
        class="flex items-center gap-1.5 px-2.5 py-1 text-xs font-sans rounded-lg transition-all"
        title="حالت پلاتینیوم روز">
        <svg class="w-3.5 h-3.5 text-amber-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="4"></circle>
          <path d="M12 2v2"></path>
          <path d="M12 20v2"></path>
          <path d="m4.93 4.93 1.41 1.41"></path>
          <path d="m17.66 17.66 1.41 1.41"></path>
          <path d="M2 12h2"></path>
          <path d="M20 12h2"></path>
          <path d="m6.34 17.66-1.41 1.41"></path>
          <path d="m19.07 4.93-1.41 1.41"></path>
        </svg>
        <span>روز</span>
      </button>
    </div>

    <a href="<?php echo esc_url(home_url('/terms')); ?>" class="hover:text-neutral-300 transition">قوانین و مقررات</a>
    <a href="<?php echo esc_url(home_url('/privacy')); ?>" class="hover:text-neutral-300 transition">حریم خصوصی</a>
    <a href="<?php echo esc_url(home_url('/sla')); ?>" class="hover:text-neutral-300 transition">قرارداد SLA</a>
    <span class="text-neutral-500 ">v4.8.2-prod</span>
  </div>
</div>
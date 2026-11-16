<?php
$is_home = is_front_page();
$services_url = $is_home ? '#services' : home_url( '/site-design-pricing' );
$projects_url = $is_home ? '#projects' : home_url( '/blog' );
$about_url = $is_home ? '#contact' : home_url( '/' );
?>
<header class="relative z-30 w-full border-b border-white/10 bg-[#08090d]/90 backdrop-blur-xl">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex min-h-[4.5rem] items-center justify-between gap-6">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex shrink-0 items-center gap-3 group" aria-label="رومونت، صفحه اصلی">
        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500 text-xl font-black text-black transition group-hover:bg-amber-400">R</span>
        <span>
          <span class="block text-lg font-bold tracking-tight text-white transition group-hover:text-amber-300">رومونت<span class="text-amber-400">.ir</span></span>
          <span class="hidden text-[10px] text-neutral-500 sm:block">راهکارهای دیجیتال برای رشد</span>
        </span>
      </a>

      <nav class="hidden items-center gap-7 lg:flex" aria-label="ناوبری اصلی">
        <a href="<?php echo esc_url( $services_url ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">خدمات</a>
        <a href="<?php echo esc_url( $projects_url ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">پروژه‌ها</a>
        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">وبلاگ</a>
        <a href="<?php echo esc_url( $about_url ); ?>" class="text-sm text-neutral-300 transition hover:text-amber-300">درباره ما</a>
      </nav>

      <div class="flex items-center gap-2 sm:gap-3">
        <button xyz-on:click="toggleTheme()" class="hidden rounded-lg border border-white/10 bg-white/5 p-2.5 text-neutral-300 transition hover:border-amber-400/40 hover:text-amber-300 sm:flex" aria-label="تغییر پوسته">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
        </button>
        <button xyz-on:click="isCartDrawerOpen = true" class="relative rounded-lg border border-white/10 bg-white/5 p-2.5 text-neutral-300 transition hover:border-amber-400/40 hover:text-amber-300" aria-label="سبد خرید">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
          <template xyz-if="totalItemsCount() > 0"><span xyz-text="totalItemsCount()" class="absolute -right-2 -top-2 flex h-5 w-5 items-center justify-center rounded-full bg-amber-500 text-[10px] font-bold text-black"></span></template>
        </button>
        <a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="hidden min-h-10 items-center rounded-lg bg-amber-500 px-4 text-xs font-bold text-black transition hover:bg-amber-400 sm:inline-flex">درخواست مشاوره</a>
        <button xyz-on:click="isMobileMenuOpen = !isMobileMenuOpen" class="rounded-lg border border-white/10 bg-white/5 p-2.5 text-neutral-300 transition hover:border-amber-400/40 hover:text-amber-300 lg:hidden" aria-label="باز کردن منو">
          <template xyz-if="!isMobileMenuOpen"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg></template>
          <template xyz-if="isMobileMenuOpen"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 6 12 12M18 6 6 18"/></svg></template>
        </button>
      </div>
    </div>
  </div>
  <?php get_template_part( 'template-parts/header/mobile', 'menu' ); ?>
</header>

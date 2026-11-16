<?php
$is_home = is_front_page();
$services_url = $is_home ? '#services' : home_url( '/site-design-pricing' );
$projects_url = $is_home ? '#projects' : home_url( '/blog' );
$about_url = $is_home ? '#contact' : home_url( '/' );
?>
<div xyz-show="isMobileMenuOpen" xyz-transition class="border-t border-white/10 bg-[#0a0c12] px-4 py-4 lg:hidden" style="display: none;">
  <nav class="grid gap-1" aria-label="ناوبری موبایل">
    <a href="<?php echo esc_url( $services_url ); ?>" class="rounded-lg px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">خدمات</a>
    <a href="<?php echo esc_url( $projects_url ); ?>" class="rounded-lg px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">پروژه‌ها</a>
    <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="rounded-lg px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">وبلاگ</a>
    <a href="<?php echo esc_url( $about_url ); ?>" class="rounded-lg px-3 py-3 text-sm text-neutral-200 transition hover:bg-white/5 hover:text-amber-300">درباره ما</a>
  </nav>
  <a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="mt-3 flex min-h-11 items-center justify-center rounded-lg bg-amber-500 text-sm font-bold text-black">درخواست مشاوره</a>
</div>

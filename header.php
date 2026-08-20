<?php

/**
 * The header for our theme
 *
 * @package Romonet_WPStorm
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl" class="dark">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- Alpine.js (Include if not enqueued in functions.php) -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-[#08090d] text-white selection:bg-amber-500 selection:text-black antialiased'); ?>
  x-data="romonetHeader()"
  x-init="initHeader()"
  @keydown.window.ctrl.k.prevent="isSearchOpen = !isSearchOpen"
  @keydown.window.cmd.k.prevent="isSearchOpen = !isSearchOpen"
  @keydown.window.escape="isSearchOpen = false; isCartDrawerOpen = false; isMobileMenuOpen = false">
  <?php wp_body_open(); ?>

  <!-- Top Notification Announcement Bar -->
  <div class="bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 text-black text-xs py-1.5 px-4 font-medium relative z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
      <div class="flex items-center gap-2 mx-auto sm:mx-0">
        <span class="bg-black text-amber-300 text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded-full flex items-center gap-1">
          <!-- Flame Icon -->
          <svg class="w-3 h-3 text-amber-400 fill-current" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 3.5z" />
          </svg>
          جشنواره ویژه
        </span>
        <span class="hidden sm:inline">
          دپارتمان تخصصی وردپرس wpstorm در هلدینگ رومونت (Romonet.ir): ۲۰٪ تخفیف روی تمام قالب‌ها و خدمات با کد:
        </span>
        <span class="sm:hidden">۲۰٪ تخفیف با کد:</span>
        <span class="font-mono bg-black/20 px-2 py-0.5 rounded text-[11px] font-bold border border-black/20">
          ROMONET20
        </span>
      </div>

      <div class="hidden md:flex items-center gap-4 text-[11px] opacity-90">
        <span class="flex items-center gap-1">
          <!-- PhoneCall Icon -->
          <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
          </svg>
          مشاوره تلفنی مستقیم: ۰۲۱-۹۱۰۱۵۶۴۲
        </span>
        <span>تحویل فوق‌سریع کمتر از ۳ ثانیه در سامانه پیامک</span>
      </div>
    </div>
  </div>

  <!-- Main Glass Header -->
  <header class="sticky top-0 z-40 w-full backdrop-blur-xl bg-[#08090d]/85 border-b border-white/10 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">

        <!-- Brand Logo & wpstorm Badge -->
        <div class="flex items-center gap-4">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 group text-right focus:outline-none">
            <div class="relative flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-br from-amber-400 via-amber-500 to-amber-600 p-0.5 shadow-[0_0_20px_rgba(245,158,11,0.25)] group-hover:shadow-[0_0_30px_rgba(245,158,11,0.45)] transition-all duration-300">
              <div class="w-full h-full bg-[#090a0f] rounded-[10px] flex items-center justify-center transition-colors group-hover:bg-transparent">
                <span class="font-mono font-black text-xl text-amber-400 group-hover:text-black transition-colors">
                  R
                </span>
              </div>
            </div>

            <div>
              <div class="flex items-center gap-2">
                <span class="font-sans font-black text-xl tracking-tight text-white group-hover:text-amber-400 transition-colors">
                  رومونت
                </span>
                <span class="text-xs font-mono font-bold text-amber-400 bg-amber-400/10 px-1.5 py-0.5 rounded border border-amber-400/20">
                  .ir
                </span>
              </div>
              <div class="flex items-center gap-1.5 text-[10px] text-neutral-400">
                <span class="text-amber-500 font-bold font-mono">wpstorm</span>
                <span>/ دپارتمان تخصصی وردپرس</span>
              </div>
            </div>
          </a>
        </div>

        <!-- Desktop Navigation Links -->
        <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
          <a href="<?php echo esc_url(home_url('/site-design-pricing')); ?>" class="relative px-3.5 py-2 text-sm font-medium rounded-lg transition-all duration-200 flex items-center gap-1.5 text-neutral-300 hover:text-white hover:bg-white/5">
            <span>طراحی سایت اختصاصی</span>
            <span class="text-[10px] px-1.5 py-0.2 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">اسپرینت</span>
          </a>
          <a href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>" class="relative px-3.5 py-2 text-sm font-medium rounded-lg transition-all duration-200 flex items-center gap-1.5 text-neutral-300 hover:text-white hover:bg-white/5">
            <span>پشتیبانی وردپرس (wpstorm)</span>
            <span class="text-[10px] px-1.5 py-0.2 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">SLA</span>
          </a>
          <a href="<?php echo esc_url(home_url('/sms-pricing')); ?>" class="relative px-3.5 py-2 text-sm font-medium rounded-lg transition-all duration-200 flex items-center gap-1.5 text-neutral-300 hover:text-white hover:bg-white/5">
            <span>سامانه پیامک رومونت</span>
            <span class="text-[10px] px-1.5 py-0.2 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">خط خدماتی</span>
          </a>
          <a href="<?php echo esc_url(home_url('/shop')); ?>" class="relative px-3.5 py-2 text-sm font-medium rounded-lg transition-all duration-200 flex items-center gap-1.5 text-neutral-300 hover:text-white hover:bg-white/5">
            <span>مارکت‌پلیس قالب و افزونه</span>
            <span class="text-[10px] px-1.5 py-0.2 rounded bg-amber-500/15 text-amber-300 border border-amber-500/30">اورجینال</span>
          </a>
          <a href="<?php echo esc_url(home_url('/blog')); ?>" class="relative px-3.5 py-2 text-sm font-medium rounded-lg transition-all duration-200 flex items-center gap-1.5 text-neutral-300 hover:text-white hover:bg-white/5">
            <span>وبلاگ و آموزش‌ها</span>
          </a>
        </nav>

        <!-- Right Action Icons & Controls -->
        <div class="flex items-center gap-2 sm:gap-3">

          <!-- Theme Toggle Desktop (Pill) -->
          <button
            @click="toggleTheme()"
            class="group hidden md:flex items-center gap-2 px-3 py-1.5 rounded-xl border transition-all duration-300"
            :class="theme === 'dark' ? 'bg-white/5 hover:bg-white/10 border-white/10 text-neutral-300 hover:border-amber-500/30' : 'bg-white/90 hover:bg-white border-slate-200 text-slate-800 shadow-sm hover:border-amber-500/40'"
            :title="theme === 'dark' ? 'تغییر به حالت پلاتینیوم روز' : 'تغییر به حالت دارک ابسیدین'">
            <div class="relative flex items-center justify-center">
              <template x-if="theme === 'dark'">
                <div class="flex items-center gap-1.5">
                  <span class="w-2 h-2 rounded-full bg-amber-400 shadow-[0_0_8px_rgba(245,158,11,0.8)] animate-pulse"></span>
                  <!-- Moon Icon -->
                  <svg class="w-3.5 h-3.5 text-amber-400 group-hover:rotate-12 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                  </svg>
                </div>
              </template>
              <template x-if="theme === 'light'">
                <div class="flex items-center gap-1.5">
                  <span class="w-2 h-2 rounded-full bg-amber-500 shadow-[0_0_8px_rgba(245,158,11,0.6)]"></span>
                  <!-- Sun Icon -->
                  <svg class="w-3.5 h-3.5 text-amber-600 group-hover:rotate-45 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                </div>
              </template>
            </div>
            <div class="text-[11px] font-sans font-medium hidden sm:flex items-center gap-1">
              <span x-text="theme === 'dark' ? 'تم شب' : 'تم روز'"></span>
            </div>
          </button>

          <!-- Theme Toggle Mobile (Compact) -->
          <button
            @click="toggleTheme()"
            class="flex md:hidden p-2.5 rounded-lg transition-all duration-300 relative group overflow-hidden border"
            :class="theme === 'dark' ? 'bg-white/5 hover:bg-white/10 text-neutral-300 hover:text-amber-300 border-white/10' : 'bg-white/80 hover:bg-white text-slate-800 hover:text-amber-600 border-slate-200 shadow-sm'">
            <div class="relative w-4 h-4 flex items-center justify-center">
              <template x-if="theme === 'dark'">
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
              <template x-if="theme === 'light'">
                <svg class="w-4 h-4 text-slate-800 transition-transform duration-500 group-hover:-rotate-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                </svg>
              </template>
            </div>
          </button>

          <!-- Currency Selector -->
          <div class="hidden sm:flex items-center bg-white/5 rounded-lg border border-white/10 p-0.5">
            <button
              @click="currency = 'IRT'"
              :class="currency === 'IRT' ? 'bg-amber-500 text-black font-bold shadow-sm' : 'text-neutral-400 hover:text-white'"
              class="px-2 py-1 text-xs font-mono rounded transition-all">
              تومان
            </button>
            <button
              @click="currency = 'USD'"
              :class="currency === 'USD' ? 'bg-amber-500 text-black font-bold shadow-sm' : 'text-neutral-400 hover:text-white'"
              class="px-2 py-1 text-xs font-mono rounded transition-all">
              $ USD
            </button>
            <button
              @click="currency = 'EUR'"
              :class="currency === 'EUR' ? 'bg-amber-500 text-black font-bold shadow-sm' : 'text-neutral-400 hover:text-white'"
              class="px-2 py-1 text-xs font-mono rounded transition-all">
              € EUR
            </button>
          </div>

          <!-- Quick Search Trigger -->
          <button
            @click="isSearchOpen = true"
            class="p-2.5 rounded-lg bg-white/5 border border-white/10 hover:border-amber-400/40 hover:bg-white/10 text-neutral-300 hover:text-white transition-all flex items-center gap-2 group"
            title="جستجوی سریع در محصولات، پلن‌ها و مقالات (Ctrl+K)">
            <!-- Search Icon -->
            <svg class="w-4 h-4 text-neutral-400 group-hover:text-amber-400 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.3-4.3" />
            </svg>
            <span class="hidden xl:inline text-xs text-neutral-400 group-hover:text-neutral-200">
              جستجو...
            </span>
            <kbd class="hidden xl:inline-block text-[10px] font-mono bg-black/40 border border-white/10 text-neutral-400 px-1.5 py-0.5 rounded">
              ⌘K
            </kbd>
          </button>

          <!-- Shopping Cart Drawer Trigger -->
          <button
            @click="isCartDrawerOpen = true"
            class="relative p-2.5 rounded-lg bg-white/5 border border-white/10 hover:border-amber-400/40 hover:bg-white/10 text-neutral-300 hover:text-white transition-all group"
            title="مشاهده سبد خرید و تسویه‌حساب">
            <!-- ShoppingCart Icon -->
            <svg class="w-4 h-4 text-neutral-400 group-hover:text-amber-400 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="8" cy="21" r="1" />
              <circle cx="19" cy="21" r="1" />
              <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
            </svg>

            <template x-if="totalItemsCount() > 0">
              <span
                x-text="totalItemsCount()"
                class="absolute -top-1.5 -right-1.5 bg-gradient-to-r from-amber-500 to-amber-600 text-black text-[11px] font-bold w-5 h-5 rounded-full flex items-center justify-center shadow-lg shadow-amber-500/30 animate-pulse font-mono">
              </span>
            </template>
          </button>

          <!-- Consultation / Quote CTA -->
          <a
            href="<?php echo esc_url(home_url('/site-design-pricing')); ?>"
            class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 text-black font-semibold text-xs hover:brightness-110 active:scale-95 transition-all shadow-[0_0_15px_rgba(245,158,11,0.25)]">
            <!-- Sparkles Icon -->
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
            </svg>
            <span>استعلام پروژه</span>
          </a>

          <!-- Mobile Hamburger Toggle -->
          <button
            @click="isMobileMenuOpen = !isMobileMenuOpen"
            class="lg:hidden p-2.5 rounded-lg bg-white/5 border border-white/10 text-neutral-300 hover:text-white transition-colors"
            aria-label="باز کردن منو">
            <template x-if="!isMobileMenuOpen">
              <!-- Menu Icon -->
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="4" x2="20" y1="12" y2="12" />
                <line x1="4" x2="20" y1="6" y2="6" />
                <line x1="4" x2="20" y1="18" y2="18" />
              </svg>
            </template>
            <template x-if="isMobileMenuOpen">
              <!-- X Icon -->
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
              </svg>
            </template>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div
      x-show="isMobileMenuOpen"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 -translate-y-2"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-2"
      class="lg:hidden bg-[#0a0c12]/95 border-b border-white/10 px-4 pt-3 pb-6 space-y-3"
      style="display: none;">
      <div class="grid gap-1">
        <a href="<?php echo esc_url(home_url('/site-design-pricing')); ?>" class="flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium transition-all text-neutral-300 hover:text-white hover:bg-white/5">
          <div class="flex items-center gap-2.5">
            <!-- Layers Icon -->
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
            <!-- ShieldCheck Icon -->
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
            <!-- MessageSquareQuote Icon -->
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
            <!-- Code2 Icon -->
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

      <!-- Mobile Currency & Theme Controls -->
      <div class="border-t border-white/10 pt-3 flex items-center justify-between">
        <span class="text-xs text-neutral-400">واحد پولی:</span>
        <div class="flex items-center bg-white/5 rounded-lg border border-white/10 p-0.5">
          <button @click="currency = 'IRT'" :class="currency === 'IRT' ? 'bg-amber-500 text-black font-bold' : 'text-neutral-400'" class="px-2.5 py-1 text-xs font-mono rounded transition-all">تومان</button>
          <button @click="currency = 'USD'" :class="currency === 'USD' ? 'bg-amber-500 text-black font-bold' : 'text-neutral-400'" class="px-2.5 py-1 text-xs font-mono rounded transition-all">USD</button>
          <button @click="currency = 'EUR'" :class="currency === 'EUR' ? 'bg-amber-500 text-black font-bold' : 'text-neutral-400'" class="px-2.5 py-1 text-xs font-mono rounded transition-all">EUR</button>
        </div>
      </div>

      <div class="border-t border-white/5 pt-3 pb-1 flex items-center justify-between px-3">
        <span class="text-xs text-neutral-400">پوسته ظاهری:</span>
        <!-- Segmented Theme Toggle -->
        <div class="inline-flex items-center p-1 rounded-xl bg-black/40 border border-white/10 backdrop-blur-md">
          <button
            @click="setTheme('dark')"
            :class="theme === 'dark' ? 'bg-gradient-to-r from-amber-500/20 to-amber-600/20 text-amber-300 border border-amber-500/30 shadow-sm' : 'text-neutral-400 hover:text-white'"
            class="flex items-center gap-1.5 px-2.5 py-1 text-xs font-sans rounded-lg transition-all"
            title="حالت دارک ابسیدین">
            <svg class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
            </svg>
            <span>شب</span>
          </button>

          <button
            @click="setTheme('light')"
            :class="theme === 'light' ? 'bg-white text-slate-900 border border-slate-200 shadow-md font-semibold' : 'text-neutral-400 hover:text-white'"
            class="flex items-center gap-1.5 px-2.5 py-1 text-xs font-sans rounded-lg transition-all"
            title="حالت پلاتینیوم روز">
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
          class="w-full py-3 rounded-lg bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 text-black font-bold text-sm flex items-center justify-center gap-2 shadow-lg shadow-amber-500/20">
          <span>مشاوره و استعلام پروژه اختصاصی</span>
          <!-- ArrowRight (Mirrored) -->
          <svg class="w-4 h-4 rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M5 12h14" />
            <path d="m12 5 7 7-7 7" />
          </svg>
        </a>
      </div>
    </div>
  </header>

  <!-- Search Modal -->
  <div
    x-show="isSearchOpen"
    class="fixed inset-0 z-50 overflow-y-auto p-4 sm:p-6 md:p-20 flex items-start justify-center"
    dir="rtl"
    style="display: none;">
    <!-- Backdrop -->
    <div
      x-show="isSearchOpen"
      x-transition:enter="transition-opacity ease-out duration-200"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition-opacity ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 bg-black/80 backdrop-blur-md"
      @click="isSearchOpen = false"></div>

    <div
      x-show="isSearchOpen"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      class="relative w-full max-w-2xl bg-[#0e101a] border border-white/15 rounded-2xl shadow-2xl overflow-hidden z-10">
      <!-- Search Input Box -->
      <div class="p-4 border-b border-white/10 flex items-center gap-3 bg-[#131624]">
        <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8" />
          <path d="m21 21-4.3-4.3" />
        </svg>
        <input
          type="text"
          x-model="searchQuery"
          x-ref="searchInput"
          placeholder="جستجو در قالب‌ها، افزونه‌های wpstorm، مقالات و پلن‌های رومونت..."
          class="flex-1 bg-transparent text-white placeholder-neutral-500 text-sm focus:outline-none font-sans" />
        <button x-show="searchQuery.length > 0" @click="searchQuery = ''" class="p-1 rounded text-neutral-400 hover:text-white">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
          </svg>
        </button>
        <kbd class="hidden sm:inline-block px-2 py-0.5 text-[10px] font-mono text-neutral-400 bg-white/5 border border-white/10 rounded">
          ESC
        </kbd>
      </div>

      <!-- Results List -->
      <div class="max-h-96 overflow-y-auto p-4 space-y-5">
        <!-- Services -->
        <template x-if="filteredServices().length > 0">
          <div>
            <div class="text-[11px] font-mono uppercase text-neutral-400 font-semibold px-2 mb-2">
              خدمات تخصصی مهندسی و تعرفه‌ها
            </div>
            <div class="space-y-1">
              <template x-for="srv in filteredServices()" :key="srv.title">
                <a :href="srv.url" class="w-full text-right p-2.5 rounded-xl hover:bg-white/5 transition flex items-center justify-between group">
                  <div class="flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-amber-500/10 text-amber-400 group-hover:bg-amber-500/20">
                      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z" />
                        <path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65" />
                        <path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65" />
                      </svg>
                    </div>
                    <div>
                      <div class="text-sm font-semibold text-white group-hover:text-amber-300" x-text="srv.title"></div>
                      <div class="text-xs text-neutral-400" x-text="srv.desc"></div>
                    </div>
                  </div>
                  <svg class="w-4 h-4 text-neutral-500 group-hover:text-amber-400 opacity-0 group-hover:opacity-100 transition" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                  </svg>
                </a>
              </template>
            </div>
          </div>
        </template>

        <!-- Products -->
        <template x-if="filteredProducts().length > 0">
          <div>
            <div class="text-[11px] font-mono uppercase text-neutral-400 font-semibold px-2 mb-2">
              قالب‌ها و افزونه‌های wpstorm (<span x-text="filteredProducts().length"></span>)
            </div>
            <div class="space-y-1">
              <template x-for="prod in filteredProducts()" :key="prod.id">
                <a :href="prod.url" class="w-full text-right p-2.5 rounded-xl hover:bg-white/5 transition flex items-center justify-between group">
                  <div class="flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-cyan-500/10 text-cyan-400 group-hover:bg-cyan-500/20">
                      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                        <path d="M3 6h18" />
                        <path d="M16 10a4 4 0 0 1-8 0" />
                      </svg>
                    </div>
                    <div>
                      <div class="text-sm font-semibold text-white group-hover:text-cyan-300 flex items-center gap-2">
                        <span x-text="prod.name"></span>
                        <span class="text-[10px] px-1.5 py-0.2 bg-white/10 rounded text-neutral-300" x-text="prod.type === 'theme' ? 'قالب' : 'افزونه'"></span>
                      </div>
                      <div class="text-xs text-neutral-400 line-clamp-1" x-text="prod.tagline"></div>
                    </div>
                  </div>
                  <div class="text-xs font-bold text-amber-400" dir="ltr">
                    شروع از <span x-text="formatCurrency(prod.price)"></span>
                  </div>
                </a>
              </template>
            </div>
          </div>
        </template>

        <!-- No Results -->
        <template x-if="filteredServices().length === 0 && filteredProducts().length === 0">
          <div class="py-10 text-center text-neutral-500 text-sm">
            نتیجه‌ای برای عبارت «<span x-text="searchQuery"></span>» یافت نشد. کلماتی مانند «قالب»، «پشتیبانی»، «پیامک» یا «ووکامرس» را جستجو کنید.
          </div>
        </template>
      </div>
    </div>
  </div>

  <!-- Cart Drawer -->
  <div
    x-show="isCartDrawerOpen"
    class="fixed inset-0 z-50 overflow-hidden"
    dir="rtl"
    style="display: none;">
    <!-- Backdrop -->
    <div
      x-show="isCartDrawerOpen"
      x-transition:enter="transition-opacity ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition-opacity ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="absolute inset-0 bg-black/80 backdrop-blur-sm"
      @click="isCartDrawerOpen = false"></div>

    <div class="fixed inset-y-0 left-0 max-w-full flex pr-10">
      <div
        x-show="isCartDrawerOpen"
        x-transition:enter="transform transition ease-in-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="w-screen max-w-md bg-[#0d0f17] border-r border-white/10 shadow-2xl flex flex-col">
        <!-- Cart Header -->
        <div class="p-5 border-b border-white/10 flex items-center justify-between bg-[#111420]">
          <div class="flex items-center gap-2.5">
            <div class="p-2 rounded-lg bg-amber-500/10 text-amber-400">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                <path d="M3 6h18" />
                <path d="M16 10a4 4 0 0 1-8 0" />
              </svg>
            </div>
            <div>
              <h3 class="text-base font-bold text-white tracking-tight">سبد سفارشات شما</h3>
              <p class="text-xs text-neutral-400">
                <span x-text="totalItemsCount()"></span> مورد انتخاب‌شده در سبد خرید
              </p>
            </div>
          </div>

          <button @click="isCartDrawerOpen = false" class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-white/5 transition" title="بستن">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>

        <!-- Cart Content -->
        <div class="flex-1 overflow-y-auto p-5 space-y-4">
          <template x-if="cart.length === 0">
            <div class="h-full flex flex-col items-center justify-center text-center p-6 space-y-4">
              <div class="w-16 h-16 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-neutral-500">
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                  <path d="M3 6h18" />
                  <path d="M16 10a4 4 0 0 1-8 0" />
                </svg>
              </div>
              <div>
                <h4 class="text-lg font-bold text-white">سبد خرید شما در حال حاضر خالی است</h4>
                <p class="text-xs text-neutral-400 mt-1 max-w-xs leading-relaxed">
                  می‌توانید از قالب‌ها و افزونه‌های تخصصی wpstorm یا پلن‌های پشتیبانی و پیامک رومونت دیدن کنید.
                </p>
              </div>
              <div class="pt-2 flex flex-col w-full gap-2">
                <a href="<?php echo esc_url(home_url('/shop')); ?>" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-bold text-xs transition text-center">
                  مشاهده مارکت قالب‌ها و افزونه‌ها
                </a>
                <a href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>" class="w-full py-2.5 px-4 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 font-medium text-xs transition text-center">
                  بررسی پلن‌های پشتیبانی وردپرس (SLA)
                </a>
              </div>
            </div>
          </template>

          <template x-if="cart.length > 0">
            <div>
              <div class="flex items-center justify-between pb-3">
                <span class="text-xs text-neutral-400">اقلام انتخاب‌شده</span>
                <button @click="cart = []" class="text-xs text-rose-400 hover:text-rose-300 font-medium flex items-center gap-1 transition">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 6h18" />
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                  </svg>
                  <span>حذف همه اقلام</span>
                </button>
              </div>

              <div class="space-y-3">
                <template x-for="(item, index) in cart" :key="item.id">
                  <div class="glass-card p-4 rounded-xl border border-white/10 space-y-3 relative group bg-white/5">
                    <div class="flex items-start justify-between gap-3">
                      <div class="flex-1">
                        <div class="flex items-center gap-1.5 flex-wrap">
                          <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/10 text-amber-300 border border-amber-500/20" x-text="getItemTypeLabel(item.itemType)"></span>
                          <template x-if="item.licenseLabel">
                            <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-neutral-300 border border-white/10" x-text="item.licenseLabel"></span>
                          </template>
                        </div>
                        <h4 class="text-sm font-bold text-white mt-1.5 line-clamp-1" x-text="item.title"></h4>
                        <template x-if="item.subtitle">
                          <p class="text-xs text-neutral-400 mt-0.5 line-clamp-1" x-text="item.subtitle"></p>
                        </template>
                      </div>

                      <div class="text-left" dir="ltr">
                        <span class="text-sm font-bold text-amber-400 font-sans" x-text="formatCurrency(item.price * item.quantity)"></span>
                        <template x-if="item.quantity > 1">
                          <p class="text-[10px] text-neutral-500">هر عدد <span x-text="formatCurrency(item.price)"></span></p>
                        </template>
                      </div>
                    </div>

                    <div class="flex items-center justify-between pt-2 border-t border-white/5">
                      <!-- Quantity buttons -->
                      <div class="flex items-center bg-black/40 rounded-lg border border-white/10 p-0.5">
                        <button @click="updateQuantity(item.id, -1)" class="p-1 rounded text-neutral-400 hover:text-white hover:bg-white/10 transition" title="کاهش">
                          <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14" />
                          </svg>
                        </button>
                        <span class="px-2 text-xs font-mono text-white" x-text="item.quantity"></span>
                        <button @click="updateQuantity(item.id, 1)" class="p-1 rounded text-neutral-400 hover:text-white hover:bg-white/10 transition" title="افزایش">
                          <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                          </svg>
                        </button>
                      </div>

                      <button @click="removeFromCart(item.id)" class="text-xs text-neutral-500 hover:text-rose-400 transition">
                        حذف از سبد
                      </button>
                    </div>
                  </div>
                </template>
              </div>

              <!-- Promo Code Box -->
              <div class="pt-4">
                <template x-if="couponCode">
                  <div class="flex items-center justify-between p-3 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs">
                    <div class="flex items-center gap-2">
                      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z" />
                        <path d="M7 7h.01" />
                      </svg>
                      <div>
                        کد تخفیف <span class="font-mono font-bold" x-text="couponCode"></span> اعمال گردید!
                      </div>
                    </div>
                    <button @click="couponCode = null" class="text-emerald-400 hover:text-emerald-200 underline text-xs">
                      حذف کد
                    </button>
                  </div>
                </template>

                <template x-if="!couponCode">
                  <form @submit.prevent="applyCoupon()" class="flex gap-2">
                    <input
                      type="text"
                      x-model="promoInput"
                      placeholder="کد تخفیف (مثلاً ROMONET20)"
                      class="flex-1 bg-black/40 border border-white/10 rounded-xl px-3 py-2 text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-amber-400 uppercase" />
                    <button type="submit" class="px-3.5 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-white font-medium text-xs transition">
                      اعمال کد
                    </button>
                  </form>
                </template>
                <template x-if="couponError">
                  <p class="text-[11px] text-rose-400 mt-1" x-text="couponError"></p>
                </template>
              </div>
            </div>
          </template>
        </div>

        <!-- Footer Totals & Checkout -->
        <template x-if="cart.length > 0">
          <div class="p-5 border-t border-white/10 bg-[#111420] space-y-3">
            <div class="space-y-1.5 text-xs">
              <div class="flex justify-between text-neutral-400">
                <span>جمع اقلام:</span>
                <span class="font-semibold text-white" x-text="formatCurrency(getSubtotal())"></span>
              </div>
              <template x-if="couponCode">
                <div class="flex justify-between text-emerald-400">
                  <span>تخفیف (<span x-text="couponCode"></span>):</span>
                  <span class="font-semibold">-<span x-text="formatCurrency(getDiscount())"></span></span>
                </div>
              </template>
              <div class="flex justify-between text-neutral-400">
                <span>مالیات بر ارزش افزوده (۵٪):</span>
                <span class="font-semibold text-white" x-text="formatCurrency(getTax())"></span>
              </div>
              <div class="flex justify-between text-sm font-bold text-white pt-2 border-t border-white/10">
                <span>مبلغ نهایی قابل پرداخت:</span>
                <span class="text-amber-400 font-bold text-base" x-text="formatCurrency(getTotal())"></span>
              </div>
            </div>

            <div class="pt-2 space-y-2">
              <a
                href="<?php echo esc_url(function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout')); ?>"
                class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-amber-500 via-amber-400 to-amber-500 hover:brightness-110 active:scale-95 text-black font-extrabold text-sm transition shadow-lg shadow-amber-500/25 flex items-center justify-center gap-2">
                <span>ادامه و تسویه‌حساب سریع</span>
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="m12 19-7-7 7-7" />
                  <path d="M19 12H5" />
                </svg>
              </a>

              <a
                href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart')); ?>"
                class="w-full py-2.5 px-4 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 font-medium text-xs transition text-center block">
                مشاهده سبد کامل و جزییات لایسنس‌ها
              </a>
            </div>

            <div class="flex items-center justify-center gap-2 text-[11px] text-neutral-400 pt-1">
              <svg class="w-3.5 h-3.5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                <path d="m9 12 2 2 4-4" />
              </svg>
              <span>گارانتی ۳۰ روزه بازگشت وجه + تحویل آنی کلید لایسنس</span>
            </div>
          </div>
        </template>
      </div>
    </div>
  </div>

  <!-- Header State Engine (Alpine.js) -->
  <script>
    function romonetHeader() {
      return {
        isMobileMenuOpen: false,
        isSearchOpen: false,
        isCartDrawerOpen: false,
        theme: 'dark',
        currency: 'IRT',
        searchQuery: '',
        promoInput: '',
        couponCode: null,
        couponError: null,

        // Sample product dataset for instant live search
        allProducts: [{
            id: 1,
            name: 'قالب فروشگاهی آذرخش (Gutenberg UI)',
            type: 'theme',
            tagline: 'سازگار کامل با ووکامرس، سرعت رندرینگ زیر ۵۰۰ میلی‌ثانیه',
            price: 1890000,
            url: '<?php echo esc_url(home_url('/shop')); ?>'
          },
          {
            id: 2,
            name: 'افزونه درگاه هوشمند OTP پیامک رومونت',
            type: 'plugin',
            tagline: 'اتصال سریع به خطوط خدماتی بدون بلک‌لیست',
            price: 850000,
            url: '<?php echo esc_url(home_url('/shop')); ?>'
          },
          {
            id: 3,
            name: 'قالب اختصاصی آژانسی و شرکتی نئون',
            type: 'theme',
            tagline: 'بهینه‌شده با Tailwind CSS و پنل تنظیمات پیشرفته',
            price: 2150000,
            url: '<?php echo esc_url(home_url('/shop')); ?>'
          }
        ],

        // Sample services dataset
        allServices: [{
            title: 'تعرفه‌های طراحی اختصاصی سایت و فروشگاه',
            url: '<?php echo esc_url(home_url('/site-design-pricing')); ?>',
            desc: 'قالب‌های سفارشی گوتنبرگ و معماری پرسرعت ووکامرس در wpstorm'
          },
          {
            title: 'پلن‌های پشتیبانی و نگهداری وردپرس (SLA)',
            url: '<?php echo esc_url(home_url('/maintenance-pricing')); ?>',
            desc: 'آپدیت‌های بدون قطعی، پاسخگویی ۱۵ دقیقه‌ای اضطراری و بک‌آپ ساعتی'
          },
          {
            title: 'سامانه پیامک هوشمند و OTP رومونت',
            url: '<?php echo esc_url(home_url('/sms-pricing')); ?>',
            desc: 'خطوط خدماتی بلک‌لیست، ارسال کدهای تایید زیر ۳ ثانیه و وب‌هوک ووکامرس'
          }
        ],

        // Sample Cart Items
        cart: [{
          id: 'item-1',
          itemType: 'product',
          title: 'قالب فروشگاهی آذرخش (Gutenberg)',
          subtitle: 'لایسنس تک‌دامین تجاری',
          price: 1890000,
          quantity: 1,
          licenseLabel: 'تک دامین'
        }],

        initHeader() {
          const savedTheme = localStorage.getItem('romonet_theme') || 'dark';
          this.setTheme(savedTheme);
          this.$watch('isSearchOpen', value => {
            if (value) setTimeout(() => this.$refs.searchInput && this.$refs.searchInput.focus(), 100);
          });
        },

        toggleTheme() {
          this.setTheme(this.theme === 'dark' ? 'light' : 'dark');
        },

        setTheme(mode) {
          this.theme = mode;
          localStorage.setItem('romonet_theme', mode);
          if (mode === 'dark') {
            document.documentElement.classList.add('dark');
          } else {
            document.documentElement.classList.remove('dark');
          }
        },

        totalItemsCount() {
          return this.cart.reduce((sum, item) => sum + item.quantity, 0);
        },

        updateQuantity(id, delta) {
          const item = this.cart.find(i => i.id === id);
          if (item) {
            item.quantity += delta;
            if (item.quantity <= 0) {
              this.removeFromCart(id);
            }
          }
        },

        removeFromCart(id) {
          this.cart = this.cart.filter(i => i.id !== id);
        },

        applyCoupon() {
          if (!this.promoInput.trim()) return;
          if (this.promoInput.trim().toUpperCase() === 'ROMONET20') {
            this.couponCode = 'ROMONET20';
            this.couponError = null;
          } else {
            this.couponError = 'کد وارد شده معتبر نمی‌باشد.';
          }
          this.promoInput = '';
        },

        getSubtotal() {
          return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        },

        getDiscount() {
          return this.couponCode === 'ROMONET20' ? this.getSubtotal() * 0.20 : 0;
        },

        getTax() {
          return (this.getSubtotal() - this.getDiscount()) * 0.05;
        },

        getTotal() {
          return (this.getSubtotal() - this.getDiscount()) + this.getTax();
        },

        formatCurrency(amount) {
          if (this.currency === 'IRT') {
            return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
          } else if (this.currency === 'USD') {
            return '$' + (amount / 60000).toFixed(2);
          } else {
            return '€' + (amount / 65000).toFixed(2);
          }
        },

        getItemTypeLabel(type) {
          const labels = {
            'product': 'قالب / افزونه wpstorm',
            'sms_plan': 'اشتراک سامانه پیامک',
            'sms_credits': 'بسته شارژ پیامک',
            'maintenance_plan': 'پلن پشتیبانی وردپرس',
            'design_package': 'پکیج طراحی اختصاصی'
          };
          return labels[type] || 'سفارش';
        },

        filteredServices() {
          const q = this.searchQuery.toLowerCase();
          if (!q) return this.allServices;
          return this.allServices.filter(s => s.title.toLowerCase().includes(q) || s.desc.toLowerCase().includes(q));
        },

        filteredProducts() {
          const q = this.searchQuery.toLowerCase();
          if (!q) return this.allProducts;
          return this.allProducts.filter(p => p.name.toLowerCase().includes(q) || p.tagline.toLowerCase().includes(q));
        }
      };
    }
  </script>
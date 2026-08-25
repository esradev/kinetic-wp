<?php

/**
 * The template for displaying the footer
 *
 * @package Romonet_WPStorm
 */
?>

<footer class="bg-[#06070a] border-t border-white/10 text-neutral-400 text-sm transition-colors duration-300" x-data="romonetFooter()">

  <!-- Top Value Propositions Banner -->
  <div class="border-b border-white/5 bg-white/[0.02]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- Zap: Speed -->
        <div class="flex items-center gap-3.5">
          <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 shrink-0">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
            </svg>
          </div>
          <div>
            <h4 class="text-white font-semibold text-sm">سرعت لود زیر ۳۰۰ میلی‌ثانیه</h4>
            <p class="text-xs text-neutral-400">تضمین امتیاز ۱۰۰/۱۰۰ گوگل Core Web Vitals</p>
          </div>
        </div>

        <!-- ShieldCheck: Security -->
        <div class="flex items-center gap-3.5">
          <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 shrink-0">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
              <path d="m9 12 2 2 4-4"></path>
            </svg>
          </div>
          <div>
            <h4 class="text-white font-semibold text-sm">امنیت زرو تراست (Zero-Trust)</h4>
            <p class="text-xs text-neutral-400">فایروال پایش روز صفر و بک‌آپ‌های ساعتی ابری</p>
          </div>
        </div>

        <!-- MessageSquare: SMS -->
        <div class="flex items-center gap-3.5">
          <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
          </div>
          <div>
            <h4 class="text-white font-semibold text-sm">سامانه پیامک زیر ۳ ثانیه</h4>
            <p class="text-xs text-neutral-400">خطوط خدماتی اختصاصی با عبور از بلک‌لیست</p>
          </div>
        </div>

        <!-- Headphones: SLA Support -->
        <div class="flex items-center gap-3.5">
          <div class="w-10 h-10 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400 shrink-0">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path>
            </svg>
          </div>
          <div>
            <h4 class="text-white font-semibold text-sm">پشتیبانی اضطراری ۲۴/۷</h4>
            <p class="text-xs text-neutral-400">قرارداد رسمی SLA و پاسخگویی ۱۵ دقیقه‌ای</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Main Footer Links -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">

      <!-- Col 1: Brand & Bio -->
      <div class="lg:col-span-2 space-y-4">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-black font-black  text-lg shadow-[0_0_15px_rgba(245,158,11,0.3)]">
            R
          </div>
          <div>
            <span class="font-sans font-black text-xl text-white tracking-tight">
              رومونت
            </span>
            <span class="text-amber-400  text-xs font-bold mr-1">.ir</span>
          </div>
        </div>

        <p class="text-xs text-neutral-400 leading-relaxed max-w-sm">
          <strong class="text-white">رومونت (Romonet.ir)</strong> همراه با دپارتمان مهندسی تخصصی <strong class="text-amber-400">wpstorm</strong>، پیشرو در ارائه راهکارهای نوین طراحی اختصاصی سایت، پشتیبانی و نگهداری فوق‌سریع وردپرس، سامانه پیامکی اختصاصی و محصولات توسعه‌یافته بر پایه استانداردهای جهانی.
        </p>

        <div class="pt-2 space-y-2 text-xs">
          <div class="flex items-center gap-2 text-neutral-300">
            <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <span class="">۰۲۱-۹۱۰۱۵۶۴۲ (پشتیبانی ۲۴ ساعته)</span>
          </div>
          <div class="flex items-center gap-2 text-neutral-300">
            <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect width="20" height="16" x="2" y="4" rx="2"></rect>
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
            </svg>
            <span class="">info@romonet.ir / wpstormdev@gmail.com</span>
          </div>
          <div class="flex items-center gap-2 text-neutral-300">
            <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <span>تهران، پارک فناوری پردیس، مجتمع نوآوری رومونت</span>
          </div>
        </div>
      </div>

      <!-- Col 2: Services -->
      <div class="space-y-3">
        <h3 class="text-white font-bold text-sm tracking-wide">خدمات مهندسی</h3>
        <ul class="space-y-2 text-xs">
          <li>
            <a href="<?php echo esc_url(home_url('/site-design-pricing')); ?>" class="hover:text-amber-400 transition">
              طراحی سایت شرکتی و آژانسی
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/site-design-pricing')); ?>" class="hover:text-amber-400 transition">
              فروشگاه ووکامرس پرسرعت
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/site-design-pricing')); ?>" class="hover:text-amber-400 transition">
              وردپرس هدلس (Next.js 15)
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>" class="hover:text-amber-400 transition">
              پشتیبانی و نگهداری SLA
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>" class="hover:text-amber-400 transition">
              بهینه‌سازی Core Web Vitals
            </a>
          </li>
        </ul>
      </div>

      <!-- Col 3: Products (wpstorm) -->
      <div class="space-y-3">
        <h3 class="text-white font-bold text-sm tracking-wide">محصولات wpstorm</h3>
        <ul class="space-y-2 text-xs">
          <li>
            <a href="<?php echo esc_url(home_url('/shop/apex-studio-pro')); ?>" class="hover:text-amber-400 transition">
              قالب اپکس استودیو پرو
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/shop/aerocommerce-max')); ?>" class="hover:text-amber-400 transition">
              قالب فروشگاهی ایروکامرس مکس
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/shop/telepulse-sms-engine')); ?>" class="hover:text-amber-400 transition">
              افزونه پیامک هوشمند تله‌پالس
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/shop/pulsespeed-turbo-cache')); ?>" class="hover:text-amber-400 transition">
              افزونه توربو کش پالس‌اسپید
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/shop/fortress-shield-secops')); ?>" class="hover:text-amber-400 transition">
              افزونه امنیتی فورتریس شیلد
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="text-amber-400 hover:underline flex items-center gap-1 font-semibold pt-1">
              <span>مشاهده همه محصولات</span>
              <svg class="w-3 h-3 rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="m12 5 7 7-7 7"></path>
              </svg>
            </a>
          </li>
        </ul>
      </div>

      <!-- Col 4: Newsletter & Guarantee -->
      <div class="space-y-3">
        <h3 class="text-white font-bold text-sm tracking-wide">خبرنامه و تخفیف‌ها</h3>
        <p class="text-xs text-neutral-400">
          با عضویت در خبرنامه، از جدیدترین آپدیت‌های فنی و کدهای تخفیف جشنواره‌ای مطلع شوید:
        </p>

        <form @submit.prevent="handleNewsletter()" class="space-y-2">
          <div class="relative">
            <input
              type="email"
              x-model="newsletterEmail"
              placeholder="ایمیل خود را وارد کنید..."
              class="w-full bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-xs text-white placeholder-neutral-500 focus:outline-none focus:border-amber-400 transition"
              dir="ltr" />
            <button
              type="submit"
              class="absolute left-1.5 top-1.5 p-1 bg-amber-500 text-black rounded hover:bg-amber-400 transition"
              title="ارسال">
              <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m22 2-7 20-4-9-9-4Z"></path>
                <path d="M22 2 11 13"></path>
              </svg>
            </button>
          </div>

          <span x-show="isSubscribed" x-cloak class="text-[11px] text-emerald-400 flex items-center gap-1">
            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
              <path d="m9 12 2 2 4-4"></path>
            </svg>
            ایمیل شما ثبت شد.
          </span>
        </form>

        <div class="pt-2 border-t border-white/5">
          <div class="flex items-center gap-2 text-neutral-400 text-xs">
            <svg class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <span>پرداخت امن شتابی با نماد اعتماد و گارانتی بازگشت وجه</span>
          </div>
        </div>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="mt-12 pt-8 border-t border-white/10 flex flex-col md:flex-row items-center justify-between text-xs text-neutral-400 gap-4">
      <p>© <?php echo date('Y'); ?> تمامی حقوق برای هلدینگ رومونت (Romonet.ir) و دپارتمان تخصصی وردپرس wpstorm محفوظ است.</p>
      <div class="flex flex-wrap items-center gap-4 sm:gap-6">

        <!-- Segmented Theme Toggle -->
        <div class="inline-flex items-center p-1 rounded-xl bg-black/40 border border-white/10 backdrop-blur-md">
          <button
            @click="setGlobalTheme('dark')"
            :class="currentTheme === 'dark' ? 'bg-gradient-to-r from-amber-500/20 to-amber-600/20 text-amber-300 border border-amber-500/30 shadow-sm' : 'text-neutral-400 hover:text-white'"
            class="flex items-center gap-1.5 px-2.5 py-1 text-xs font-sans rounded-lg transition-all"
            title="حالت دارک ابسیدین">
            <svg class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
            </svg>
            <span>شب</span>
          </button>

          <button
            @click="setGlobalTheme('light')"
            :class="currentTheme === 'light' ? 'bg-white text-slate-900 border border-slate-200 shadow-md font-semibold' : 'text-neutral-400 hover:text-white'"
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
  </div>
</footer>

<!-- Global Toast Notification Modal -->
<div
  x-data="romonetToast()"
  x-show="visible"
  x-cloak
  x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0 translate-y-5"
  x-transition:enter-end="opacity-100 translate-y-0"
  x-transition:leave="transition ease-in duration-200"
  x-transition:leave-start="opacity-100 translate-y-0"
  x-transition:leave-end="opacity-0 translate-y-5"
  @show-toast.window="triggerToast($event.detail)"
  class="fixed bottom-6 right-6 z-50"
  dir="rtl"
  style="display: none;">
  <div class="glass-panel px-4 py-3 rounded-2xl border border-amber-500/40 shadow-2xl bg-[#0f121d]/95 backdrop-blur-xl flex items-center gap-3 text-xs text-white font-medium max-w-sm">
    <div class="p-1.5 rounded-lg bg-amber-500/20 text-amber-400 shrink-0">
      <!-- Sparkles Icon -->
      <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path>
      </svg>
    </div>
    <p class="flex-1 leading-relaxed" x-text="message"></p>
  </div>
</div>

<!-- Alpine.js Component Scripts for Footer & Toast -->
<script>
  function romonetFooter() {
    return {
      newsletterEmail: '',
      isSubscribed: false,
      currentTheme: localStorage.getItem('romonet_theme') || 'dark',

      setGlobalTheme(mode) {
        this.currentTheme = mode;
        localStorage.setItem('romonet_theme', mode);
        if (mode === 'dark') {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      },

      handleNewsletter() {
        if (!this.newsletterEmail || !this.newsletterEmail.includes('@')) {
          window.dispatchEvent(new CustomEvent('show-toast', {
            detail: 'لطفاً یک آدرس ایمیل معتبر وارد کنید.'
          }));
          return;
        }

        this.isSubscribed = true;
        window.dispatchEvent(new CustomEvent('show-toast', {
          detail: 'عضویت شما در خبرنامه تخصصی رومونت با موفقیت ثبت شد!'
        }));
        this.newsletterEmail = '';
      }
    };
  }

  function romonetToast() {
    return {
      visible: false,
      message: '',
      timeout: null,

      triggerToast(msg) {
        this.message = typeof msg === 'string' ? msg : (msg.message || '');
        this.visible = true;

        if (this.timeout) clearTimeout(this.timeout);
        this.timeout = setTimeout(() => {
          this.visible = false;
        }, 4000);
      }
    };
  }
</script>

<?php wp_footer(); ?>
</body>

</html>
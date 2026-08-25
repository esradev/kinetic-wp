export function romonetDesignPricing() {
  return {
    // Project Estimator State
    projectType: "store",
    pageCount: 8,
    needsCustomBlocks: true,
    needsMigration: true,
    needsSpeedGuarantee: true,
    needsCustomApi: false,

    packages: [
      {
        id: "brand-sprint",
        title: "اسپرینت اختصاصی شرکتی و آژانسی",
        idealFor: "برندهای پیشرو، شرکت‌های B2B و استارتاپ‌های در حال رشد",
        priceStartingAt: 38500000,
        timeline: "۲ الی ۳ هفته کاری",
        popular: false,
        description:
          "طراحی اختصاصی از صفر در فیگما و پیاده‌سازی بلوک‌های فوق سبک گوتنبرگ با رعایت کامل هویت بصری، سئو و سرعت لود رعدآسا.",
        deliverables: [
          "طراحی اختصاصی UI/UX در فیگما با دیزاین سیستم کامل",
          "کدنویسی ۱۰ بلوک سفارشی گوتنبرگ با ری‌اکت",
          "بهینه‌سازی ۱۰۰٪ تصاویر با فرمت WebP/AVIF",
          "تنظیمات سئو تکنیکال و اسکیما استراکچر",
        ],
        techStack: ["Figma UI", "Gutenberg Blocks", "Tailwind CSS", "PHP 8.3"],
      },
      {
        id: "store-turbo",
        title: "معماری فروشگاه پرسرعت ووکامرس",
        idealFor: "فروشگاه‌های آنلاین با ترافیک بالا و بیش از ۱۰۰۰ محصول",
        badge: "انتخاب اول برندها",
        priceStartingAt: 68000000,
        timeline: "۳ الی ۵ هفته کاری",
        popular: true,
        description:
          "سبد خرید شناور ایجکس، تسویه‌حساب تک‌مرحله‌ای، فیلترهای آنی بدون رفرش و پایگاه داده بهینه‌شده برای حراجی‌ها و کمپین‌های پرفشار.",
        deliverables: [
          "طراحی اختصاصی صفحات محصول، دسته‌بندی و تسویه‌حساب",
          "پیاده‌سازی سبد خرید کشویی Ajax Drawer",
          "اتصال به سامانه پیامک خدماتی رومونت (کد تایید OTP)",
          "بهینه‌سازی کوئری‌های SQL برای تحمل ۱۰ هزار کاربر همزمان",
          "گارانتی ۶۰ روزه نرخ تبدیل و پشتیبانی طلایی",
        ],
        techStack: [
          "WooCommerce High-Perf",
          "Ajax Engine",
          "Redis Object Cache",
          "Romonet SMS API",
        ],
      },
      {
        id: "headless-enterprise",
        title: "سامانه هدلس وردپرس (Next.js 15)",
        idealFor: "سازمان‌های بزرگ، پلتفرم‌های مقیاس‌پذیر و ترافیک میلیونی",
        badge: "سازمانی",
        priceStartingAt: 128000000,
        timeline: "۶ الی ۸ هفته کاری",
        popular: false,
        description:
          "جداسازی کامل فرانت‌اند با Next.js 15 App Router، کش Edge جهانی و پنل مدیریت امن وردپرس در بک‌اند برای حداکثر انعطاف.",
        deliverables: [
          "فرانت‌اند React 19 / Next.js 15 با ISR و کش Edge",
          "اتصال GraphQL / REST API اختصاصی فوق امن",
          "سرعت پاسخگویی سرور (TTFB) کمتر از ۵۰ میلی‌ثانیه",
          "امنیت بی‌نقص بدون دسترسی عمومی به فایل‌های وردپرس",
          "استقرار روی سرورهای ابری اختصاصی و CDN رومونت",
        ],
        techStack: [
          "Next.js 15",
          "WP GraphQL",
          "TypeScript",
          "Edge Cache",
          "Cloudflare",
        ],
      },
    ],

    calculateTotal() {
      let baseRate =
        this.projectType === "brand"
          ? 38500000
          : this.projectType === "store"
          ? 68000000
          : 128000000;
      let pageAddon = Math.max(0, this.pageCount - 5) * 2800000;
      let blocksAddon = this.needsCustomBlocks ? 8500000 : 0;
      let migrationAddon = this.needsMigration ? 6500000 : 0;
      let apiAddon = this.needsCustomApi ? 14500000 : 0;
      let speedAddon = this.needsSpeedGuarantee ? 4500000 : 0;
      return (
        baseRate +
        pageAddon +
        blocksAddon +
        migrationAddon +
        apiAddon +
        speedAddon
      );
    },

    estimatedTimeline() {
      if (this.projectType === "brand") return "۲ الی ۳ هفته";
      if (this.projectType === "store") return "۴ الی ۵ هفته";
      return "۶ الی ۸ هفته";
    },

    bookPackageSprint(pkg) {
      const depositAmount = Math.round(pkg.priceStartingAt * 0.5);

      // Trigger global toast alert
      window.dispatchEvent(
        new CustomEvent("show-toast", {
          detail: `اسپرینت «${pkg.title}» با بیعانه ${this.formatCurrency(
            depositAmount,
          )} به سبد سفارشات افزوده شد.`,
        }),
      );

      // In a real WooCommerce scenario, you would trigger an AJAX add_to_cart here
      // using the WC Product ID for the specific package, similar to front-page logic.
    },

    bookCustomSprint() {
      const total = this.calculateTotal();
      const depositAmount = Math.round(total * 0.5);
      const typeLabel =
        this.projectType === "brand"
          ? "شرکتی"
          : this.projectType === "store"
          ? "فروشگاهی"
          : "هدلس";

      window.dispatchEvent(
        new CustomEvent("show-toast", {
          detail: `پکیج سفارشی ${typeLabel} (${this.formatCurrency(
            depositAmount,
          )}) به سبد سفارشات اضافه شد.`,
        }),
      );
    },

    formatCurrency(amount) {
      return (
        new Intl.NumberFormat("fa-IR").format(Math.round(amount)) + " تومان"
      );
    },
  };
}

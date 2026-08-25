export function romonetMaintenancePricing() {
  return {
    billingCycle: "annual",

    // Scope Calculator State
    siteCount: 1,
    isEcommerce: true,
    needs15mSla: false,
    extraDevHours: 2,

    plans: [
      {
        id: "plan-starter",
        name: "پایه و شرکتی",
        tierSubtitle: "مناسب سایت‌های شخصی، نمونه‌کار و وبلاگ‌های شرکتی",
        monthlyPrice: 2450000,
        annualPricePerMonth: 1960000,
        popular: false,
        responseTimeSLA: "حداکثر ۲ ساعت",
        backupFrequency: "روزانه (نگهداری ۳۰ روز)",
        uptimeCheckInterval: "هر ۵ دقیقه",
        devHoursIncluded: "۱ ساعت در ماه",
        features: [
          "به‌روزرسانی امن هسته، قالب و تمام افزونه‌ها",
          "پایش مداوم ۲۴ ساعته آپ‌تایم و در دسترس بودن سرور",
          "بک‌آپ روزانه ابری در ۲ دیتاسنتر مجزا",
          "گزارش ماهانه سلامت فنی، سئو و سرعت لود",
          "پشتیبانی تیکتی در ساعات اداری",
        ],
      },
      {
        id: "plan-business",
        name: "تجاری و فروشگاهی",
        tierSubtitle:
          "ایده‌آل برای فروشگاه‌های ووکامرس فعال و وب‌سایت‌های پرترافیک",
        monthlyPrice: 4850000,
        annualPricePerMonth: 3880000,
        popular: true,
        responseTimeSLA: "۳۰ دقیقه اضطراری",
        backupFrequency: "ساعتی (پایگاه‌داده و سفارشات)",
        uptimeCheckInterval: "هر ۱ دقیقه",
        devHoursIncluded: "۳ ساعت در ماه",
        features: [
          "تست تغییرات در سرور استیجینگ شبیه‌ساز قبل از انتشار",
          "پایش لحظه‌ای درگاه‌های بانکی و تراکنش‌های ناموفق",
          "بک‌آپ ساعتی زنده از جدول سفارشات و مشتریان",
          "بهینه‌سازی مستمر دیتابیس و کش آبجکت ردیس (Redis)",
          "اسکن امنیتی خودکار و فایروال WAF اختصاصی",
          "پشتیبانی اولویت‌دار ۲۴/۷ حتی در روزهای تعطیل",
        ],
      },
      {
        id: "plan-enterprise",
        name: "سازمانی و پربازدید",
        tierSubtitle:
          "مخصوص پرتال‌های بزرگ، هلدینگ‌ها و ترافیک‌های بسیار سنگین",
        monthlyPrice: 9800000,
        annualPricePerMonth: 7840000,
        popular: false,
        responseTimeSLA: "۱۵ دقیقه اضطراری (تیم اختصاصی)",
        backupFrequency: "همگام‌سازی لحظه‌ای (Real-time)",
        uptimeCheckInterval: "هر ۳۰ ثانیه",
        devHoursIncluded: "۸ ساعت در ماه",
        features: [
          "مدیر فنی اختصاصی و خط تماس اضطراری مستقیم",
          "قرارداد مکتوب و رسمی SLA با پرداخت خسارت قطعی",
          "مدیریت و تیونینگ مستقیم وب‌سرور (Nginx/LiteSpeed)",
          "بهینه‌سازی تخصصی کوئری‌های سنگین دیتابیس",
          "گارانتی بازیابی زیر ۱۰ دقیقه در شرایط بحرانی (Disaster Recovery)",
          "تست نفوذ دوره‌ای و پایش روز صفر (Zero-Day)",
        ],
      },
    ],

    calculateCustomMonthly() {
      const baseCost = this.isEcommerce ? 4200000 : 2500000;
      const siteMultiplier = this.siteCount === 1 ? 1 : this.siteCount * 0.85;
      const slaAddon = this.needs15mSla ? 2800000 : 0;
      const devHoursAddon = this.extraDevHours * 650000;
      return Math.round(baseCost * siteMultiplier + slaAddon + devHoursAddon);
    },

    subscribePlan(plan) {
      const price =
        this.billingCycle === "annual"
          ? plan.annualPricePerMonth
          : plan.monthlyPrice;

      if (typeof this.cart !== "undefined") {
        this.cart.push({
          id: "maint-" + plan.id + "-" + Date.now(),
          itemType: "maintenance_plan",
          title: `پلن پشتیبانی ${plan.name} (wpstorm)`,
          subtitle: `${plan.responseTimeSLA} SLA • پرداخت ${
            this.billingCycle === "annual" ? "سالانه" : "ماهانه"
          }`,
          price: price,
          quantity: 1,
          billingPeriod: this.billingCycle,
          licenseLabel: `سطح پشتیبانی ${plan.name}`,
        });
        this.isCartDrawerOpen = true;
      }

      window.dispatchEvent(
        new CustomEvent("show-toast", {
          detail: `پلن پشتیبانی «${plan.name}» (${this.formatCurrency(
            price,
          )}/ماه) به سبد سفارشات افزوده شد.`,
        }),
      );
    },

    orderCustomPlan() {
      const cost = this.calculateCustomMonthly();

      if (typeof this.cart !== "undefined") {
        this.cart.push({
          id: "custom-maint-" + Date.now(),
          itemType: "maintenance_plan",
          title: `پلن سفارشی پشتیبانی (${this.siteCount} سایت)`,
          subtitle: `${
            this.needs15mSla ? "پاسخگویی ۱۵ دقیقه‌ای" : "پاسخگویی ۱ ساعته"
          } • ${this.extraDevHours} ساعت توسعه`,
          price: cost,
          quantity: 1,
          billingPeriod: "monthly",
          licenseLabel: `قرارداد پشتیبانی ${this.siteCount} سایته`,
        });
        this.isCartDrawerOpen = true;
      }

      window.dispatchEvent(
        new CustomEvent("show-toast", {
          detail: `پلن سفارشی ${this.siteCount} سایته (${this.formatCurrency(
            cost,
          )}/ماه) به سبد سفارشات افزوده شد.`,
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

export function romonetSmsPricing() {
  return {
    selectedCountry: "IR",
    smsVolume: 15000,

    countryRates: {
      IR: {
        name: "ایران (خط خدماتی بدون بلک‌لیست)",
        rate: 0.0035,
        tomanPrice: 165,
        flag: "🇮🇷",
        carrier: "همراه اول / ایرانسل / رایتل (مسیر مستقیم 1000/2000/3000)",
      },
      AE: {
        name: "امارات متحده عربی",
        rate: 0.0195,
        tomanPrice: 980,
        flag: "🇦🇪",
        carrier: "اتصالات (e&) / du Direct Carrier",
      },
      TR: {
        name: "ترکیه",
        rate: 0.0125,
        tomanPrice: 620,
        flag: "🇹🇷",
        carrier: "Turkcell / Vodafone TR Tier-1",
      },
      OM: {
        name: "عمان",
        rate: 0.018,
        tomanPrice: 900,
        flag: "🇴🇲",
        carrier: "Omantel / Ooredoo Direct",
      },
      DE: {
        name: "آلمان و اروپا",
        rate: 0.0165,
        tomanPrice: 830,
        flag: "🇩🇪",
        carrier: "Deutsche Telekom / Vodafone DE",
      },
      US: {
        name: "آمریکا و کانادا (10DLC)",
        rate: 0.0098,
        tomanPrice: 490,
        flag: "🇺🇸",
        carrier: "AT&T / Verizon / T-Mobile Direct",
      },
      UK: {
        name: "انگلستان",
        rate: 0.0142,
        tomanPrice: 710,
        flag: "🇬🇧",
        carrier: "Vodafone / EE / O2 SS7 Direct",
      },
      IQ: {
        name: "عراق",
        rate: 0.0175,
        tomanPrice: 880,
        flag: "🇮🇶",
        carrier: "Zain / Asiacell / Korek Telecom",
      },
    },

    smsPlans: [
      {
        id: "sms-starter",
        name: "پایه و استارتر",
        tagline: "مناسب فروشگاه‌های نوپا با ارسال تا ۱,۵۰۰ پیامک ماهانه",
        monthlyPrice: 490000,
        includedCredits: 1500,
        extraRatePerSms: "۱۷۵ تومان",
        webhookSpeed: "< ۲.۴ ثانیه",
        popular: false,
        features: [
          "دسترسی به خط خدماتی عمومی اشتراکی",
          "وب‌هوک هوشمند OTP برای افزونه Digits و ووکامرس",
          "پشتیبانی تیکتی و راه‌اندازی اولیه رایگان",
          "گزارش‌گیری آنلاین وضعیت دلیوری پیامک‌ها",
        ],
      },
      {
        id: "sms-pro",
        name: "حرفه‌ای و فروشگاهی",
        tagline: "ایده‌آل برای فروشگاه‌های پرفروش و ارسال کمپین‌های تخفیفی",
        monthlyPrice: 1150000,
        includedCredits: 5000,
        extraRatePerSms: "۱۵۵ تومان",
        webhookSpeed: "< ۱.۵ ثانیه (اولویت بالا)",
        popular: true,
        features: [
          "ارسال همزمان با ۲ مسیر مخابراتی بک‌آپ بدون قطعی",
          "سناریوهای خودکار بازگردانی سبد خرید رهاشده",
          "سفارشی‌سازی متن پترن‌های پیامکی بدون انتظار تایید",
          "لایسنس دائمی افزونه TelePulse پرو",
          "پشتیبانی تلفنی و تلگرامی ۲۴ ساعته",
        ],
      },
      {
        id: "sms-enterprise",
        name: "سازمانی و نامحدود",
        tagline: "مخصوص پلتفرم‌ها و اپلیکیشن‌ها با ترافیک ارسال فوق سنگین",
        monthlyPrice: 2850000,
        includedCredits: 20000,
        extraRatePerSms: "۱۳۵ تومان",
        webhookSpeed: "< ۰.۸ ثانیه (مسیر اختصاصی)",
        popular: false,
        features: [
          "اختصاص خط خدماتی اختصاصی با نام برند (Masking)",
          "سرور ایزوله با ظرفیت ارسال ۵۰۰ پیامک در ثانیه",
          "اتصال به تمام اپراتورهای بین‌المللی با تسویه ریالی",
          "قرارداد رسمی SLA تحویل با تضمین بازگشت وجه",
          "مدیر اکانت اختصاصی و مانیتورینگ زنده صف ارسال",
        ],
      },
    ],

    smsCreditBundles: [
      {
        id: "bundle-5k",
        credits: 5000,
        price: 890000,
        bonus: "+۳۰۰ پیامک هدیه",
        pricePerSms: "۱۷۸ تومان/پیامک",
        popular: false,
      },
      {
        id: "bundle-15k",
        credits: 15000,
        price: 2450000,
        bonus: "+۱,۵۰۰ پیامک هدیه",
        pricePerSms: "۱۶۳ تومان/پیامک",
        popular: true,
      },
      {
        id: "bundle-50k",
        credits: 50000,
        price: 7450000,
        bonus: "+۷,۵۰۰ پیامک هدیه",
        pricePerSms: "۱۴۹ تومان/پیامک",
        popular: false,
      },
      {
        id: "bundle-100k",
        credits: 100000,
        price: 13500000,
        bonus: "+۲۰,۰۰۰ پیامک هدیه",
        pricePerSms: "۱۳۵ تومان/پیامک",
        popular: false,
      },
    ],

    currentCountry() {
      return this.countryRates[this.selectedCountry] || this.countryRates["IR"];
    },

    calculatedCostToman() {
      return Math.round(this.smsVolume * this.currentCountry().tomanPrice);
    },

    estimatedRecoveredOrders() {
      return Math.floor(this.smsVolume * 0.035);
    },

    estimatedRecoveredRevenue() {
      return this.estimatedRecoveredOrders() * 4500000;
    },

    subscribeSmsPlan(plan) {
      if (typeof this.cart !== "undefined") {
        this.cart.push({
          id: "sms-plan-" + plan.id + "-" + Date.now(),
          itemType: "sms_plan",
          title: `اشتراک ${plan.name} سامانه پیامک رومونت`,
          subtitle: `${plan.includedCredits.toLocaleString(
            "fa-IR",
          )} پیامک هدیه اولیه`,
          price: plan.monthlyPrice,
          quantity: 1,
          billingPeriod: "monthly",
          licenseLabel: "اشتراک ماهانه سامانه پیامک",
        });
        this.isCartDrawerOpen = true;
      }

      window.dispatchEvent(
        new CustomEvent("show-toast", {
          detail: `پلن پیامکی «${plan.name}» (${this.formatCurrency(
            plan.monthlyPrice,
          )}/ماه) به سبد سفارشات افزوده شد.`,
        }),
      );
    },

    orderCalculatedCredits() {
      const cost = this.calculatedCostToman();
      const country = this.currentCountry();

      if (typeof this.cart !== "undefined") {
        this.cart.push({
          id: "sms-custom-" + Date.now(),
          itemType: "sms_credits",
          title: `بسته شارژ اختصاصی (${this.smsVolume.toLocaleString(
            "fa-IR",
          )} پیامک)`,
          subtitle: `مسیر مخابراتی: ${country.name}`,
          price: cost,
          quantity: 1,
          billingPeriod: "one-time",
          licenseLabel: `${this.smsVolume.toLocaleString(
            "fa-IR",
          )} اعتبار پیامک`,
        });
        this.isCartDrawerOpen = true;
      }

      window.dispatchEvent(
        new CustomEvent("show-toast", {
          detail: `بسته شارژ ${this.smsVolume.toLocaleString(
            "fa-IR",
          )} پیامک (${this.formatCurrency(cost)}) به سبد سفارشات اضافه شد.`,
        }),
      );
    },

    orderCreditBundle(bundle) {
      if (typeof this.cart !== "undefined") {
        this.cart.push({
          id: "sms-bundle-" + bundle.id + "-" + Date.now(),
          itemType: "sms_credits",
          title: `بسته شارژ ${bundle.credits.toLocaleString("fa-IR")} پیامک`,
          subtitle: bundle.bonus,
          price: bundle.price,
          quantity: 1,
          billingPeriod: "one-time",
          licenseLabel: `${bundle.credits.toLocaleString(
            "fa-IR",
          )} پیامک رومونت`,
        });
        this.isCartDrawerOpen = true;
      }

      window.dispatchEvent(
        new CustomEvent("show-toast", {
          detail: `بسته شارژ ${bundle.credits.toLocaleString(
            "fa-IR",
          )} پیامک به سبد سفارشات افزوده شد.`,
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

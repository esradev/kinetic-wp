export function romonetSmsPricing() {
  return {
    // Calculator State
    smsVolume: 10000,
    selectedCountry: "ir",

    countryRates: {
      ir: {
        name: "ایران (خطوط خدماتی)",
        flag: "🇮🇷",
        tomanPrice: 135,
        carrier: "همراه اول / ایرانسل / رایتل",
      },
      tr: {
        name: "ترکیه",
        flag: "🇹🇷",
        tomanPrice: 950,
        carrier: "Turkcell / Vodafone / Turk Telekom",
      },
      uae: {
        name: "امارات متحده",
        flag: "🇦🇪",
        tomanPrice: 1650,
        carrier: "Etisalat / Du",
      },
    },

    // Subscription Plans State
    smsPlans: [
      {
        id: "starter",
        name: "استارتر فروشگاهی",
        tagline: "مناسب پیج‌های اینستاگرامی و سایت‌های نوپا",
        monthlyPrice: 199000,
        includedCredits: 1000,
        extraRatePerSms: "۱۴۵ تومان / پیامک",
        webhookSpeed: "زیر ۳ ثانیه (OTP)",
        popular: false,
        features: [
          "خط خدماتی عمومی رایگان",
          "پلاگین وردپرس و ووکامرس",
          "ارسال پترن (بدون تایید ناظر)",
          "پشتیبانی تیکتی",
        ],
      },
      {
        id: "pro",
        name: "حرفه‌ای (محبوب)",
        tagline: "ایده‌آل برای فروشگاه‌های ووکامرسی پرفروش",
        monthlyPrice: 450000,
        includedCredits: 5000,
        extraRatePerSms: "۱۳۵ تومان / پیامک",
        webhookSpeed: "زیر ۱ ثانیه (Ultra OTP)",
        popular: true,
        features: [
          "خط خدماتی نیمه‌اختصاصی",
          "سیستم بازگردانی سبد خرید رهاشده",
          "اتصال به فرم‌های گرویتی و المنتور",
          "پشتیبانی تلفنی اختصاصی",
        ],
      },
      {
        id: "enterprise",
        name: "سازمانی",
        tagline: "شرکت‌های بزرگ، اپلیکیشن‌ها و فین‌تک‌ها",
        monthlyPrice: 1250000,
        includedCredits: 20000,
        extraRatePerSms: "۱۱۵ تومان / پیامک",
        webhookSpeed: "آنی (Dedicated Node)",
        popular: false,
        features: [
          "خط خدماتی اختصاصی با نام برند",
          "وب‌هوک و API اختصاصی نامحدود",
          "ارسال پیامک بین‌المللی (OTP ارزی)",
          "مدیر اکانت اختصاصی ۲۴ ساعته",
        ],
      },
    ],

    // Lead Capture & Modal State
    isModalOpen: false,
    customerName: "",
    customerPhone: "",
    requestType: null, // 'credits' or 'plan'
    activeDetails: null, // Details for modal display
    isSubmitting: false,
    submitSuccess: false,
    successMessage: "",

    // Calculator Methods
    currentCountry() {
      return this.countryRates[this.selectedCountry];
    },
    calculatedCostToman() {
      return this.smsVolume * this.currentCountry().tomanPrice;
    },
    estimatedRecoveredOrders() {
      // Assuming 2% conversion/recovery rate on SMS notifications
      return Math.floor(this.smsVolume * 0.02);
    },
    estimatedRecoveredRevenue() {
      // Assuming average order value is 450,000 Toman
      return this.estimatedRecoveredOrders() * 450000;
    },
    formatCurrency(amount) {
      return (
        new Intl.NumberFormat("fa-IR").format(Math.round(amount)) + " تومان"
      );
    },

    // Modal Triggers
    orderCalculatedCredits() {
      this.requestType = "credits";
      this.activeDetails = {
        title: `بسته ${this.smsVolume.toLocaleString("fa-IR")} پیامکی (${
          this.currentCountry().name
        })`,
        price: this.calculatedCostToman(),
      };
      this.isModalOpen = true;
      this.submitSuccess = false;
    },
    subscribeSmsPlan(plan) {
      this.requestType = "plan";
      this.activeDetails = {
        title: `اشتراک ماهانه: ${plan.name}`,
        price: plan.monthlyPrice,
      };
      this.isModalOpen = true;
      this.submitSuccess = false;
    },
    closeBookingModal() {
      this.isModalOpen = false;
    },

    // Submit to PHP Backend via AJAX
    async submitSmsRequest() {
      if (!this.customerName.trim() || !this.customerPhone.trim()) {
        alert("لطفاً نام و شماره تماس خود را وارد نمایید.");
        return;
      }

      this.isSubmitting = true;

      const payload = new URLSearchParams({
        action: "romonet_submit_sms_request",
        _ajax_nonce: window.romonetAjaxNonce,
        customerName: this.customerName,
        customerPhone: this.customerPhone,
        requestType: this.requestType,
        planTitle: this.activeDetails.title,
        smsVolume: this.requestType === "credits" ? this.smsVolume : 0,
        countryCode:
          this.requestType === "credits" ? this.selectedCountry : "ir",
        finalPrice: this.activeDetails.price,
      });

      try {
        const response = await fetch(window.romonetAjaxUrl, {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: payload,
        });

        const result = await response.json();

        if (result.success) {
          this.submitSuccess = true;
          this.successMessage = result.data.message;
          this.customerName = "";
          this.customerPhone = "";
        } else {
          alert("خطا: " + (result.data || "درخواست ثبت نشد."));
        }
      } catch (error) {
        console.error("Error:", error);
        alert("خطا در ارتباط با سرور. لطفاً مجدداً تلاش کنید.");
      } finally {
        this.isSubmitting = false;
      }
    },
  };
}

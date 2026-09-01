export function romonetMaintenancePricing() {
  return {
    // State for Custom Plan
    siteCount: 1,
    isEcommerce: false,
    needs15mSla: false,
    extraDevHours: 0,

    // General State
    billingCycle: "monthly", // 'monthly' | 'annual'

    // Lead Capture & Modal State
    customerName: "",
    customerPhone: "",
    isModalOpen: false,
    activePlanType: null, // 'custom' or 'standard'
    activePlanDetails: null, // Holds standard plan data or custom title

    // Form Status
    isSubmitting: false,
    submitSuccess: false,
    successMessage: "",

    // Standard Plans Array
    plans: [
      {
        id: "essential",
        name: "استاندارد شرکتی",
        tierSubtitle: "مناسب برای پرتال‌ها و سایت‌های شرکتی",
        monthlyPrice: 2800000,
        annualPricePerMonth: 2300000,
        popular: false,
        responseTimeSLA: "حداکثر ۴ ساعت",
        backupFrequency: "هفتگی (فضای ابری)",
        uptimeCheckInterval: "هر ۳۰ دقیقه",
        devHoursIncluded: "ندارد",
        features: [
          "بروزرسانی امن هسته و افزونه‌ها",
          "اسکن امنیتی و بدافزار هفتگی",
          "گزارش‌گیری ماهانه عملکرد",
          "پشتیبانی تیکتی",
        ],
      },
      {
        id: "business",
        name: "کسب و کار (ووکامرس)",
        tierSubtitle: "مناسب فروشگاه‌های آنلاین در حال رشد",
        monthlyPrice: 5800000,
        annualPricePerMonth: 4800000,
        popular: true,
        responseTimeSLA: "حداکثر ۱ ساعت",
        backupFrequency: "روزانه (فضای ابری)",
        uptimeCheckInterval: "هر ۵ دقیقه",
        devHoursIncluded: "۳ ساعت در ماه",
        features: [
          "بهینه‌سازی دیتابیس فروشگاه",
          "پایش سلامت فرآیند پرداخت",
          "مدیریت کش و Redis",
          "پشتیبانی تیکتی و تلفنی",
        ],
      },
      {
        id: "enterprise",
        name: "سازمانی ویژه",
        tierSubtitle: "ترافیک بالا و نیازمند پایداری ۱۰۰٪",
        monthlyPrice: 12500000,
        annualPricePerMonth: 10500000,
        popular: false,
        responseTimeSLA: "۱۵ دقیقه (اورژانسی ۲۴ ساعته)",
        backupFrequency: "ساعتی (لحظه‌ای)",
        uptimeCheckInterval: "هر ۱ دقیقه",
        devHoursIncluded: "۱۰ ساعت در ماه",
        features: [
          "مدیریت سرور و کانفیگ Nginx",
          "کانال ارتباطی مستقیم در تلگرام",
          "تست نفوذ و امنیت پیشرفته",
          "توسعه فیچرهای اختصاصی",
        ],
      },
    ],

    // Formula for custom plan calculation
    calculateCustomMonthly() {
      let baseRatePerSite = 2500000;

      // Additions
      if (this.isEcommerce) baseRatePerSite += 1500000;

      let total = this.siteCount * baseRatePerSite;

      // SLA and Dev Hours are usually calculated globally per project, not per site
      if (this.needs15mSla) total += 3500000;
      total += this.extraDevHours * 750000; // 750k toman per extra dev hour

      return total;
    },

    formatCurrency(amount) {
      return (
        new Intl.NumberFormat("fa-IR").format(Math.round(amount)) + " تومان"
      );
    },

    // Triggered by Custom Plan Button
    orderCustomPlan() {
      this.activePlanType = "custom";
      this.activePlanDetails = {
        name: "پلن سفارشی اختصاصی",
        price: this.calculateCustomMonthly(),
      };
      this.isModalOpen = true;
      this.submitSuccess = false;
    },

    // Triggered by Standard Plan Button
    subscribePlan(plan) {
      this.activePlanType = "standard";
      this.activePlanDetails = plan;
      this.isModalOpen = true;
      this.submitSuccess = false;
    },

    closeBookingModal() {
      this.isModalOpen = false;
    },

    // Submit to PHP Backend
    async submitMaintenanceRequest() {
      if (!this.customerName.trim() || !this.customerPhone.trim()) {
        alert("لطفا نام و شماره تماس خود را وارد نمایید.");
        return;
      }

      this.isSubmitting = true;

      // Prepare Payload Data Based on Plan Type
      let planName = this.activePlanDetails.name;
      let finalPrice =
        this.activePlanType === "custom"
          ? this.activePlanDetails.price
          : this.billingCycle === "annual"
          ? this.activePlanDetails.annualPricePerMonth
          : this.activePlanDetails.monthlyPrice;

      const payload = new URLSearchParams({
        action: "romonet_submit_maintenance_request",
        _ajax_nonce: window.romonetAjaxNonce,
        customerName: this.customerName,
        customerPhone: this.customerPhone,
        planType: this.activePlanType,
        planName: planName,
        billingCycle: this.billingCycle,
        siteCount: this.activePlanType === "custom" ? this.siteCount : 1,
        isEcommerce:
          this.activePlanType === "custom" ? (this.isEcommerce ? 1 : 0) : -1,
        needsSla:
          this.activePlanType === "custom" ? (this.needs15mSla ? 1 : 0) : -1,
        devHours: this.activePlanType === "custom" ? this.extraDevHours : 0,
        finalPrice: finalPrice,
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

export function romonetMaintenancePricing() {
  return {
    customerName: "",
    customerPhone: "",
    siteUrl: "",
    siteType: "شرکتی",
    requestType: "پشتیبانی ماهانه",
    notes: "",
    isSubmitting: false,
    submitSuccess: false,
    submitError: "",
    successMessage: "",

    async submitMaintenanceRequest() {
      this.submitError = "";

      if (
        !this.customerName.trim() ||
        !this.customerPhone.trim() ||
        !this.siteUrl.trim()
      ) {
        this.submitError = "لطفاً نام، شماره تماس و آدرس سایت را وارد کنید.";
        return;
      }

      if (!window.romonetAjaxUrl || !window.romonetAjaxNonce) {
        this.submitError =
          "ارتباط با سامانه درخواست در دسترس نیست. لطفاً با رومونت تماس بگیرید.";
        return;
      }

      this.isSubmitting = true;
      const planName = `${this.siteType} - ${this.requestType}`;
      const details = [
        `آدرس سایت: ${this.siteUrl.trim()}`,
        this.notes.trim() ? `توضیحات: ${this.notes.trim()}` : "",
      ]
        .filter(Boolean)
        .join(" | ");

      const payload = new URLSearchParams({
        action: "romonet_submit_maintenance_request",
        _ajax_nonce: window.romonetAjaxNonce,
        customerName: this.customerName.trim(),
        customerPhone: this.customerPhone.trim(),
        planType: "inquiry",
        planName,
        billingCycle: "custom",
        siteCount: "1",
        isEcommerce: this.siteType === "فروشگاهی" ? "1" : "0",
        needsSla: "0",
        devHours: "0",
        finalPrice: "0",
        notes: details,
      });

      try {
        const response = await fetch(window.romonetAjaxUrl, {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: payload,
        });
        const result = await response.json();

        if (!result.success) {
          this.submitError =
            result.data || "ثبت درخواست انجام نشد. لطفاً دوباره تلاش کنید.";
          return;
        }

        this.submitSuccess = true;
        this.successMessage =
          result.data?.message ||
          "درخواست شما ثبت شد. همکاران ما به‌زودی با شما تماس می‌گیرند.";
        this.customerName = "";
        this.customerPhone = "";
        this.siteUrl = "";
        this.notes = "";
      } catch (error) {
        console.error("Romonet maintenance inquiry failed:", error);
        this.submitError =
          "خطا در ارتباط با سرور. لطفاً بعداً دوباره تلاش کنید.";
      } finally {
        this.isSubmitting = false;
      }
    },
  };
}

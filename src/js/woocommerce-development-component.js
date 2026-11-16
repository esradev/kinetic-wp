export function romonetWooCommerceDevelopment() {
  return {
    customerName: "",
    customerPhone: "",
    businessName: "",
    activeStore: "no",
    projectType: "راه‌اندازی فروشگاه جدید",
    siteUrl: "",
    notes: "",
    isSubmitting: false,
    submitSuccess: false,
    submitError: "",
    successMessage: "",

    async submitWooCommerceRequest() {
      this.submitError = "";
      if (!this.customerName.trim() || !this.customerPhone.trim() || !this.businessName.trim() || !this.notes.trim()) {
        this.submitError = "لطفاً فیلدهای الزامی را تکمیل کنید.";
        return;
      }
      if (!window.romonetAjaxUrl || !window.romonetAjaxNonce) {
        this.submitError = "ارتباط با سامانه درخواست در دسترس نیست. لطفاً با رومونت تماس بگیرید.";
        return;
      }
      this.isSubmitting = true;
      const payload = new URLSearchParams({
        action: "romonet_submit_woocommerce_request",
        _ajax_nonce: window.romonetAjaxNonce,
        customerName: this.customerName.trim(),
        customerPhone: this.customerPhone.trim(),
        businessName: this.businessName.trim(),
        activeStore: this.activeStore,
        projectType: this.projectType,
        siteUrl: this.siteUrl.trim(),
        notes: this.notes.trim(),
      });
      try {
        const response = await fetch(window.romonetAjaxUrl, {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: payload,
        });
        const result = await response.json();
        if (!result.success) {
          this.submitError = result.data || "ثبت درخواست انجام نشد. لطفاً دوباره تلاش کنید.";
          return;
        }
        this.submitSuccess = true;
        this.successMessage = result.data?.message || "درخواست شما ثبت شد.";
      } catch (error) {
        console.error("Romonet WooCommerce inquiry failed:", error);
        this.submitError = "خطا در ارتباط با سرور. لطفاً بعداً دوباره تلاش کنید.";
      } finally {
        this.isSubmitting = false;
      }
    },
  };
}

export function romonetDesignPricing() {
  return {
    projectType: "شرکتی / آژانسی",
    pageCount: 3,
    customerName: "",
    customerPhone: "",
    projectDetails: "",
    budget: "",
    isSubmitting: false,
    submitSuccess: false,
    submitError: "",
    successMessage: "",

    async submitBooking() {
      this.submitError = "";

      if (!this.customerName.trim() || !this.customerPhone.trim()) {
        this.submitError = "لطفاً نام و شماره تماس خود را وارد کنید.";
        return;
      }

      if (!window.romonetAjaxUrl || !window.romonetAjaxNonce) {
        this.submitError = "ارتباط با سامانه درخواست در دسترس نیست. لطفاً با رومونت تماس بگیرید.";
        return;
      }

      this.isSubmitting = true;
      const details = [
        this.projectDetails.trim()
          ? `توضیحات پروژه: ${this.projectDetails.trim()}`
          : "",
        this.budget.trim() ? `بودجه تقریبی: ${this.budget.trim()}` : "",
      ]
        .filter(Boolean)
        .join(" | ");

      const payload = new URLSearchParams({
        action: "romonet_submit_booking_request",
        _ajax_nonce: window.romonetAjaxNonce,
        customerName: this.customerName.trim(),
        customerPhone: this.customerPhone.trim(),
        projectType: this.projectType,
        pageCount: String(this.pageCount),
        features: details || "بدون امکانات اضافه",
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
        this.projectDetails = "";
        this.budget = "";
      } catch (error) {
        console.error("Romonet project inquiry failed:", error);
        this.submitError =
          "خطا در ارتباط با سرور. لطفاً بعداً دوباره تلاش کنید.";
      } finally {
        this.isSubmitting = false;
      }
    },
  };
}

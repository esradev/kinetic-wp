export function romonetContact() {
  return {
    customerName: "",
    customerPhone: "",
    website: "",
    requestType: "طراحی سایت شرکتی",
    budget: "هنوز مشخص نیست",
    description: "",
    isSubmitting: false,
    submitSuccess: false,
    submitError: "",
    successMessage: "",

    async submitContactRequest() {
      this.submitError = "";
      const phonePattern = /^(?:\+98|0098|98|0)?9\d{9}$/;

      if (
        !this.customerName.trim() ||
        !phonePattern.test(this.customerPhone.replace(/[\s-]/g, "")) ||
        !this.requestType ||
        !this.description.trim()
      ) {
        this.submitError =
          "لطفاً نام، شماره تماس معتبر، نوع درخواست و توضیحات پروژه را کامل کنید.";
        return;
      }

      if (!window.romonetAjaxUrl || !window.romonetAjaxNonce) {
        this.submitError =
          "ارتباط با سامانه درخواست در دسترس نیست. لطفاً با رومونت تماس بگیرید.";
        return;
      }

      this.isSubmitting = true;
      const projectType =
        this.requestType === "طراحی سایت فروشگاهی"
          ? "فروشگاه تخصصی ووکامرس"
          : this.requestType === "طراحی سایت شرکتی"
            ? "شرکتی / آژانسی"
            : "شرکتی / آژانسی";
      const details = [
        `نوع درخواست: ${this.requestType}`,
        this.website.trim() ? `آدرس وب‌سایت: ${this.website.trim()}` : "",
        `بودجه تقریبی: ${this.budget}`,
        `توضیحات پروژه: ${this.description.trim()}`,
      ]
        .filter(Boolean)
        .join(" | ");

      const payload = new URLSearchParams({
        action: "romonet_submit_booking_request",
        _ajax_nonce: window.romonetAjaxNonce,
        customerName: this.customerName.trim(),
        customerPhone: this.customerPhone.trim(),
        projectType,
        pageCount: "3",
        features: details,
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
        this.website = "";
        this.description = "";
      } catch (error) {
        console.error("Romonet contact inquiry failed:", error);
        this.submitError =
          "خطا در ارتباط با سرور. لطفاً بعداً دوباره تلاش کنید.";
      } finally {
        this.isSubmitting = false;
      }
    },
  };
}

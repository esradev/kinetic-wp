export function romonetFooter() {
  return {
    newsletterEmail: "",
    isSubscribed: false,
    currentTheme: localStorage.getItem("romonet_theme") || "dark",

    setGlobalTheme(mode) {
      const normalizedMode = mode === "light" ? "light" : "dark";
      this.currentTheme = normalizedMode;
      localStorage.setItem("romonet_theme", normalizedMode);
      document.documentElement.classList.toggle(
        "dark",
        normalizedMode === "dark",
      );
      document.documentElement.classList.toggle(
        "light",
        normalizedMode === "light",
      );
    },

    handleNewsletter() {
      if (!this.newsletterEmail || !this.newsletterEmail.includes("@")) {
        window.dispatchEvent(
          new CustomEvent("show-toast", {
            detail: "لطفاً یک آدرس ایمیل معتبر وارد کنید.",
          }),
        );
        return;
      }

      this.isSubscribed = true;
      window.dispatchEvent(
        new CustomEvent("show-toast", {
          detail: "عضویت شما در خبرنامه تخصصی رومونت با موفقیت ثبت شد!",
        }),
      );
      this.newsletterEmail = "";
    },
  };
}

export function romonetToast() {
  return {
    visible: false,
    message: "",
    timeout: null,

    triggerToast(msg) {
      this.message = typeof msg === "string" ? msg : msg.message || "";
      this.visible = true;

      if (this.timeout) clearTimeout(this.timeout);
      this.timeout = setTimeout(() => {
        this.visible = false;
      }, 4000);
    },
  };
}

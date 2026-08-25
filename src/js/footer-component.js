export function romonetFooter() {
  return {
    newsletterEmail: "",
    isSubscribed: false,
    currentTheme: localStorage.getItem("romonet_theme") || "dark",

    setGlobalTheme(mode) {
      this.currentTheme = mode;
      localStorage.setItem("romonet_theme", mode);
      if (mode === "dark") {
        document.documentElement.classList.add("dark");
      } else {
        document.documentElement.classList.remove("dark");
      }
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

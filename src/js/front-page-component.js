export function romonetFrontPage() {
  return {
    activeTab: "all",
    smsType: "order",

    // واکشی داده‌های واقعی از ووکامرس که توسط PHP پاس داده شده‌اند
    products: window.romonetFrontPageData
      ? window.romonetFrontPageData.products
      : [],

    filteredProducts() {
      if (this.activeTab === "themes") {
        return this.products.filter((p) => p.type === "theme");
      }
      if (this.activeTab === "plugins") {
        return this.products.filter((p) => p.type === "plugin");
      }
      return this.products;
    },

    async quickBuy(product) {
      // شبیه‌سازی افزودن محصول به سبد خرید از طریق ارتباط با Header.js
      // اگر کامپوننت هدر وجود داشته باشد از آن استفاده میکنیم
      if (typeof this.$store !== "undefined" || true) {
        try {
          const formData = new URLSearchParams();
          formData.append("product_id", product.product_id); // استفاده از آیدی واقعی ووکامرس
          formData.append("quantity", 1);

          await fetch("/?wc-ajax=add_to_cart", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: formData,
          });

          // نمایش پیام موفقیت (Global Toast)
          window.dispatchEvent(
            new CustomEvent("show-toast", {
              detail: `محصول «${product.name}» به سبد خرید افزوده شد.`,
            }),
          );

          // رفرش کردن صفحه برای آپدیت هدر ووکامرس (یا می‌توانید متد سفارشی سبد خرید خود را فراخوانی کنید)
          setTimeout(() => window.location.reload(), 1500);
        } catch (error) {
          window.dispatchEvent(
            new CustomEvent("show-toast", {
              detail: "خطا در برقراری ارتباط با ووکامرس.",
            }),
          );
        }
      }
    },

    formatCurrency(amount) {
      return (
        new Intl.NumberFormat("fa-IR").format(Math.round(amount)) + " تومان"
      );
    },
  };
}

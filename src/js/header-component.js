export function romonetHeader() {
  return {
    isMobileMenuOpen: false,
    isSearchOpen: false,
    isCartDrawerOpen: false,
    isCartUpdating: false,
    isScrolled: false,
    theme: "dark",
    currency: "IRT",
    searchQuery: "",
    promoInput: "",
    couponCode: null,
    couponError: null,

    allProducts: [
      {
        id: 1,
        name: "قالب فروشگاهی آذرخش (Gutenberg UI)",
        type: "theme",
        tagline: "سازگار کامل با ووکامرس، سرعت رندرینگ زیر ۵۰۰ میلی‌ثانیه",
        price: 1890000,
        url: window.romonetHeaderData ? window.romonetHeaderData.shopUrl : "#",
      },
    ],

    allServices: [
      {
        title: "تعرفه‌های طراحی اختصاصی سایت و فروشگاه",
        url: window.romonetHeaderData
          ? window.romonetHeaderData.siteDesignUrl
          : "#",
        desc: "قالب‌های سفارشی گوتنبرگ و معماری پرسرعت ووکامرس در wpstorm",
      },
    ],

    cart: window.romonetHeaderData ? window.romonetHeaderData.cart : [],

    initHeader() {
      const savedTheme = localStorage.getItem("romonet_theme") || "dark";
      this.setTheme(savedTheme);
      this.onScroll();
      window.addEventListener("scroll", () => this.onScroll(), {
        passive: true,
      });
      this.$watch("isSearchOpen", (value) => {
        if (value)
          setTimeout(
            () => this.$refs.searchInput && this.$refs.searchInput.focus(),
            100,
          );
      });
    },

    onScroll() {
      this.isScrolled = window.scrollY > 48;
    },

    toggleTheme() {
      this.setTheme(this.theme === "dark" ? "light" : "dark");
    },

    setTheme(mode) {
      this.theme = mode;
      localStorage.setItem("romonet_theme", mode);
      if (mode === "dark") {
        document.documentElement.classList.add("dark");
      } else {
        document.documentElement.classList.remove("dark");
      }
    },

    totalItemsCount() {
      return this.cart.reduce((sum, item) => sum + item.quantity, 0);
    },

    async updateQuantity(id, delta) {
      const item = this.cart.find((i) => i.id === id);
      if (!item) return;

      const newQty = item.quantity + delta;
      if (newQty <= 0) {
        return this.removeFromCart(id);
      }

      this.isCartUpdating = true;

      try {
        if (delta > 0) {
          const formData = new URLSearchParams();
          formData.append("product_id", item.product_id);
          formData.append("quantity", delta);
          await fetch("/?wc-ajax=add_to_cart", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: formData,
          });

          item.quantity = newQty;
          this.isCartUpdating = false;
        } else {
          let fdRemove = new URLSearchParams();
          fdRemove.append("cart_item_key", id);
          await fetch("/?wc-ajax=remove_from_cart", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: fdRemove,
          });

          let fdAdd = new URLSearchParams();
          fdAdd.append("product_id", item.product_id);
          fdAdd.append("quantity", newQty);
          await fetch("/?wc-ajax=add_to_cart", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: fdAdd,
          });

          window.location.reload();
        }
      } catch (error) {
        console.error("Error updating cart:", error);
        this.isCartUpdating = false;
      }
    },

    async removeFromCart(id) {
      this.isCartUpdating = true;
      try {
        const formData = new URLSearchParams();
        formData.append("cart_item_key", id);

        await fetch("/?wc-ajax=remove_from_cart", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: formData,
        });

        this.cart = this.cart.filter((i) => i.id !== id);
        window.dispatchEvent(
          new CustomEvent("show-toast", {
            detail: "آیتم با موفقیت از سبد خرید حذف شد.",
          }),
        );
      } catch (error) {
        console.error("Error removing item:", error);
      } finally {
        this.isCartUpdating = false;
      }
    },

    applyCoupon() {
      if (!this.promoInput.trim()) return;
      this.couponError = "لطفاً کد تخفیف را در صفحه تسویه‌حساب وارد کنید.";
    },

    getSubtotal() {
      return this.cart.reduce(
        (sum, item) => sum + item.price * item.quantity,
        0,
      );
    },

    getDiscount() {
      return this.couponCode === "ROMONET20" ? this.getSubtotal() * 0.2 : 0;
    },

    getTax() {
      return 0;
    },

    getTotal() {
      return this.getSubtotal() - this.getDiscount() + this.getTax();
    },

    formatCurrency(amount) {
      if (this.currency === "IRT") {
        return (
          new Intl.NumberFormat("fa-IR").format(Math.round(amount)) + " تومان"
        );
      } else if (this.currency === "USD") {
        return "$" + (amount / 60000).toFixed(2);
      } else {
        return "€" + (amount / 65000).toFixed(2);
      }
    },

    getItemTypeLabel(type) {
      const labels = {
        product: "محصول فروشگاه",
        sms_plan: "اشتراک سامانه پیامک",
        sms_credits: "بسته شارژ پیامک",
        maintenance_plan: "پلن پشتیبانی وردپرس",
        design_package: "پکیج طراحی اختصاصی",
      };
      return labels[type] || "محصول فروشگاه";
    },

    filteredServices() {
      const q = this.searchQuery.toLowerCase();
      if (!q) return this.allServices;
      return this.allServices.filter(
        (s) =>
          s.title.toLowerCase().includes(q) || s.desc.toLowerCase().includes(q),
      );
    },

    filteredProducts() {
      const q = this.searchQuery.toLowerCase();
      if (!q) return this.allProducts;
      return this.allProducts.filter(
        (p) =>
          p.name.toLowerCase().includes(q) ||
          p.tagline.toLowerCase().includes(q),
      );
    },
  };
}

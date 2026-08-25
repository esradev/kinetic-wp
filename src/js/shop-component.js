export function romonetShop() {
  return {
    filterType: "all",
    selectedTag: "همه",
    searchQuery: "",
    sortBy: "popular",

    // دریافت اتوماتیک تگ‌ها و محصولات از PHP
    tags: window.romonetShopData ? window.romonetShopData.tags : [],
    products: window.romonetShopData ? window.romonetShopData.products : [],

    filteredProducts() {
      let list = this.products.filter((p) => {
        const matchesType =
          this.filterType === "all" || p.type === this.filterType;
        const matchesTag =
          this.selectedTag === "همه" ||
          p.tags.includes(this.selectedTag) ||
          (this.selectedTag === "گوتنبرگ" && p.tags.includes("Gutenberg"));
        const q = this.searchQuery.toLowerCase().trim();
        const matchesSearch =
          !q ||
          p.name.toLowerCase().includes(q) ||
          p.tagline.toLowerCase().includes(q) ||
          p.tags.some((t) => t.toLowerCase().includes(q));
        return matchesType && matchesTag && matchesSearch;
      });

      // Sorting logic
      if (this.sortBy === "popular") {
        list.sort((a, b) => b.downloads - a.downloads);
      } else if (this.sortBy === "rating") {
        list.sort((a, b) => parseFloat(b.rating) - parseFloat(a.rating));
      } else if (this.sortBy === "price-asc") {
        list.sort((a, b) => a.licenses[0].price - b.licenses[0].price);
      } else if (this.sortBy === "price-desc") {
        list.sort((a, b) => b.licenses[0].price - a.licenses[0].price);
      }

      return list;
    },

    async buyProduct(product, event) {
      // تغییر وضعیت دکمه به حالت لودینگ
      const btn = event.currentTarget;
      const originalText = btn.innerHTML;
      btn.innerHTML =
        '<svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>';
      btn.style.pointerEvents = "none";
      btn.style.opacity = "0.8";

      try {
        // ارسال درخواست به سرور ووکامرس (AJAX)
        const formData = new URLSearchParams();
        formData.append("product_id", product.id);
        formData.append("quantity", 1);

        const response = await fetch("/?wc-ajax=add_to_cart", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: formData,
        });

        const data = await response.json();

        if (data.error) {
          alert(
            "خطا: " + (data.error_message || "محصول به سبد خرید اضافه نشد."),
          );
          return;
        }

        // اضافه کردن به سبد خرید فرانت‌اند (برای نمایش سریع در هدر)
        if (typeof this.cart !== "undefined") {
          const existing = this.cart.find(
            (i) => i.productId == product.id || i.id == product.id,
          );
          if (existing) {
            existing.quantity += 1;
          } else {
            this.cart.push({
              id: product.id,
              productId: product.id,
              itemType: "product",
              title: product.name,
              subtitle: "",
              price: product.licenses[0].price,
              quantity: 1,
            });
          }
          this.isCartDrawerOpen = true;
        } else {
          // در صورت عدم دسترسی به متغیر هدر، صفحه رفرش شود
          window.location.reload();
        }

        window.dispatchEvent(
          new CustomEvent("show-toast", {
            detail: `محصول «${product.name}» با موفقیت به سبد سفارشات افزوده شد.`,
          }),
        );
      } catch (error) {
        console.error("Error adding to cart:", error);
        alert("خطا در برقراری ارتباط با سرور.");
      } finally {
        // بازگردانی دکمه به حالت عادی
        btn.innerHTML = originalText;
        btn.style.pointerEvents = "auto";
        btn.style.opacity = "1";
      }
    },

    formatCurrency(amount) {
      if (!amount) return "رایگان";
      return (
        new Intl.NumberFormat("fa-IR").format(Math.round(amount)) + " تومان"
      );
    },
  };
}

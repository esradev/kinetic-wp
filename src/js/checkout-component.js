const gatewayIcon = {
  card: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="14" x="2" y="5" rx="2" /><line x1="2" x2="22" y1="10" y2="10" /></svg>',
  bank: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" /><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" /><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" /><path d="M10 6h4" /><path d="M10 10h4" /></svg>',
  crypto: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" /></svg>',
};

export function romonetCheckout(config = {}) {
  const isDynamicCheckout = Array.isArray(config.gateways);
  const cart = config.cart || config.initialCart || [
    { id: 'item-1', title: 'قالب اختصاصی آژانسی و شرکتی Apex Studio', price: 2450000, quantity: 1, licenseLabel: 'لایسنس تک دامنه' },
    { id: 'item-2', title: 'پلن پشتیبانی تجاری و فروشگاهی (wpstorm)', price: 3880000, quantity: 1, licenseLabel: 'سطح تجاری' },
  ];

  return {
    cart: cart.length ? cart : [],
    gateways: config.gateways || [],
    subtotal: config.subtotal || 0,
    discount: config.discount || 0,
    tax: config.tax || 0,
    total: config.total || 0,
    fullName: config.name || config.defaultName || (isDynamicCheckout ? '' : 'سارا محمدی'),
    email: config.email || config.defaultEmail || (isDynamicCheckout ? '' : 'sara.mohammadi@example.com'),
    phone: config.phone || config.defaultPhone || '',
    company: isDynamicCheckout ? '' : 'آژانس دیجیتال روناک',
    country: isDynamicCheckout ? 'IR' : 'ایران',
    paymentMethod: config.gatewayId || (config.gateways?.[0]?.id || (isDynamicCheckout ? '' : 'zarinpal')),
    nonce: config.nonce || '',
    checkoutUrl: config.checkoutUrl || '',
    isProcessing: false,
    couponCode: config.initialCoupon || 'ROMONET20',

    getGatewayIcon(id) {
      if (id.includes('bacs') || id.includes('cheque')) return gatewayIcon.bank;
      if (id.includes('crypto') || id.includes('coin')) return gatewayIcon.crypto;
      return gatewayIcon.card;
    },

    getSubtotal() {
      return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    },

    getDiscount() {
      if (this.discount) return this.discount;
      if (this.couponCode === 'ROMONET20') return this.getSubtotal() * 0.20;
      if (this.couponCode === 'WPSTORM50') return this.getSubtotal() * 0.50;
      return 0;
    },

    getTax() {
      if (this.tax) return this.tax;
      return Math.round((this.getSubtotal() - this.getDiscount()) * 0.09);
    },

    getTotal() {
      if (this.total) return this.total;
      return (this.getSubtotal() - this.getDiscount()) + this.getTax();
    },

    async handleCheckoutSubmit() {
      if (!this.fullName.trim() || !this.email.trim() || !this.phone.trim()) {
        alert('لطفاً نام، ایمیل و شماره موبایل خود را وارد نمایید.');
        return;
      }

      if (!this.paymentMethod) {
        alert('لطفاً یک درگاه پرداخت انتخاب کنید.');
        return;
      }

      this.isProcessing = true;
      const nameParts = this.fullName.trim().split(/\s+/);
      const formData = new URLSearchParams();
      formData.append('billing_first_name', nameParts[0]);
      formData.append('billing_last_name', nameParts.slice(1).join(' ') || '-');
      formData.append('billing_email', this.email.trim());
      formData.append('billing_phone', this.phone.trim());
      formData.append('billing_company', this.company || '');
      formData.append('billing_country', 'IR');
      formData.append('billing_address_1', 'ثبت دیجیتال - ' + this.country);
      formData.append('billing_city', 'دیجیتال');
      formData.append('payment_method', this.paymentMethod);
      formData.append('security', this.nonce);

      try {
        const response = await fetch(`${this.checkoutUrl || window.location.origin + '/'}?wc-ajax=checkout`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
          body: formData,
        });
        const data = await response.json().catch(() => null);

        if (data?.result === 'success' && data.redirect) {
          window.location.href = data.redirect;
          return;
        }

        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = data?.messages || '';
        alert(tempDiv.textContent.trim() || 'ثبت سفارش انجام نشد. لطفاً دوباره تلاش کنید.');
      } catch (error) {
        console.error('Checkout error:', error);
        alert('ارتباط با سرور قطع شد. لطفاً دوباره تلاش کنید.');
      } finally {
        this.isProcessing = false;
      }
    },

    formatCurrency(amount) {
      if (!amount || amount === 0) return 'رایگان';
      return new Intl.NumberFormat('fa-IR').format(Math.round(amount)) + ' تومان';
    },
  };
}

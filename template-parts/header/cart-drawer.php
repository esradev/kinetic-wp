<!-- Cart Drawer -->
<div xyz-show="isCartDrawerOpen" class="fixed inset-0 z-50 overflow-hidden" dir="rtl" style="display: none;">
  <div xyz-show="isCartDrawerOpen" xyz-transition.opacity class="absolute inset-0 bg-black/80 backdrop-blur-sm" xyz-on:click="isCartDrawerOpen = false"></div>

  <div class="fixed inset-y-0 left-0 max-w-full flex pr-10">
    <div xyz-show="isCartDrawerOpen" xyz-transition class="w-screen max-w-md bg-[#0d0f17] border-r border-white/10 shadow-2xl flex flex-col relative overflow-hidden">

      <div xyz-show="isCartUpdating" class="absolute inset-0 z-100 bg-[#0d0f17]/70 backdrop-blur-sm flex flex-col items-center justify-center transition-all" style="display: none;">
        <svg class="w-10 h-10 text-amber-500 animate-spin mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56" /></svg>
        <span class="text-sm font-bold text-white">در حال همگام‌سازی...</span>
      </div>

      <div class="p-5 border-b border-white/10 flex items-center justify-between bg-[#111420]">
        <div class="flex items-center gap-2.5">
          <div class="p-2 rounded-lg bg-amber-500/10 text-amber-400">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" /><path d="M3 6h18" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
          </div>
          <div>
            <h3 class="text-base font-bold text-white tracking-tight">سبد سفارشات شما</h3>
            <p class="text-xs text-neutral-400"><span xyz-text="totalItemsCount()"></span> مورد انتخاب‌شده</p>
          </div>
        </div>
        <button xyz-on:click="isCartDrawerOpen = false" class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-white/5 transition" title="بستن">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18" /><path d="m6 6 12 12" /></svg>
        </button>
      </div>

      <div class="flex-1 overflow-y-auto p-5 space-y-4">
        <template xyz-if="cart.length === 0">
          <div class="h-full flex flex-col items-center justify-center text-center p-6 space-y-4">
            <div class="w-16 h-16 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-neutral-500">
              <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" /><path d="M3 6h18" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
            </div>
            <div>
              <h4 class="text-lg font-bold text-white">سبد خرید شما در حال حاضر خالی است</h4>
              <p class="text-xs text-neutral-400 mt-1 max-w-xs leading-relaxed">می‌توانید از قالب‌ها و افزونه‌های تخصصی wpstorm یا پلن‌های پشتیبانی و پیامک رومونت دیدن کنید.</p>
            </div>
            <div class="pt-2 flex flex-col w-full gap-2">
              <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-black font-bold text-xs transition text-center">مشاهده فروشگاه</a>
              <a href="<?php echo esc_url(home_url('/maintenance-pricing')); ?>" class="w-full py-2.5 px-4 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 font-medium text-xs transition text-center">بررسی پلن‌های پشتیبانی</a>
            </div>
          </div>
        </template>

        <template xyz-if="cart.length > 0">
          <div>
            <div class="space-y-3">
              <template xyz-for="(item, index) in cart" xyz-bind:key="item.id">
                <div class="glass-card p-4 rounded-xl border border-white/10 space-y-3 relative group bg-white/5">
                  <div class="flex items-start justify-between gap-3">
                    <div class="flex-1">
                      <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/10 text-amber-300 border border-amber-500/20" xyz-text="getItemTypeLabel(item.itemType)"></span>
                      <h4 class="text-sm font-bold text-white mt-1.5 line-clamp-1" xyz-text="item.title"></h4>
                      <template xyz-if="item.subtitle"><p class="text-xs text-neutral-400 mt-0.5" xyz-text="item.subtitle"></p></template>
                    </div>
                    <div class="text-left" dir="ltr">
                      <span class="text-sm font-bold text-amber-400 font-sans" xyz-text="formatCurrency(item.price * item.quantity)"></span>
                    </div>
                  </div>
                  <div class="flex items-center justify-between pt-2 border-t border-white/5">
                    <div class="flex items-center bg-black/40 rounded-lg border border-white/10 p-0.5">
                      <button xyz-on:click="updateQuantity(item.id, -1)" class="p-1 rounded text-neutral-400 hover:text-white hover:bg-white/10"><svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14" /></svg></button>
                      <span class="px-2 text-xs  text-white" xyz-text="item.quantity"></span>
                      <button xyz-on:click="updateQuantity(item.id, 1)" class="p-1 rounded text-neutral-400 hover:text-white hover:bg-white/10"><svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14" /><path d="M12 5v14" /></svg></button>
                    </div>
                    <button xyz-on:click="removeFromCart(item.id)" class="text-xs text-neutral-500 hover:text-rose-400">حذف از سبد</button>
                  </div>
                </div>
              </template>
            </div>
            <div class="pt-4">
              <template xyz-if="!couponCode">
                <form @submit.prevent="applyCoupon()" class="flex gap-2">
                  <input type="text" xyz-model="promoInput" placeholder="کد تخفیف" class="flex-1 bg-black/40 border border-white/10 rounded-xl px-3 py-2 text-xs text-white uppercase" />
                  <button type="submit" class="px-3.5 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-white font-medium text-xs">اعمال</button>
                </form>
              </template>
              <template xyz-if="couponError"><p class="text-[11px] text-rose-400 mt-1" xyz-text="couponError"></p></template>
            </div>
          </div>
        </template>
      </div>

      <template xyz-if="cart.length > 0">
        <div class="p-5 border-t border-white/10 bg-[#111420] space-y-3">
          <div class="space-y-1.5 text-xs">
            <div class="flex justify-between text-neutral-400">
              <span>مجموع اولیه:</span><span class="font-semibold text-white" xyz-text="formatCurrency(getSubtotal())"></span>
            </div>
            <div class="flex justify-between text-sm font-bold text-white pt-2 border-t border-white/10">
              <span>مبلغ نهایی:</span><span class="text-amber-400 font-bold text-base" xyz-text="formatCurrency(getTotal())"></span>
            </div>
          </div>
          <div class="pt-2 space-y-2">
            <a href="<?php echo esc_url(function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout')); ?>" class="w-full py-3 px-4 rounded-xl bg-linear-to-r from-amber-500 via-amber-400 to-amber-500 hover:brightness-110 active:scale-95 text-black font-extrabold text-sm transition shadow-lg shadow-amber-500/25 flex items-center justify-center gap-2">
              <span>ادامه و تسویه‌حساب سریع</span>
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 19-7-7 7-7" /><path d="M19 12H5" /></svg>
            </a>
            <a href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart')); ?>" class="w-full py-2.5 px-4 rounded-xl bg-white/5 hover:bg-white/10 text-neutral-300 font-medium text-xs text-center block">مشاهده سبد کامل خرید</a>
          </div>
        </div>
      </template>
    </div>
  </div>
</div>
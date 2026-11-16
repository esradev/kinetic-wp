<!-- Cart Drawer -->
<div xyz-show="isCartDrawerOpen" class="fixed inset-0 z-50 overflow-hidden" dir="rtl" style="display: none;">
	<div xyz-show="isCartDrawerOpen" xyz-transition.opacity class="absolute inset-0 bg-black/80 backdrop-blur-sm" xyz-on:click="isCartDrawerOpen = false"></div>

	<div class="fixed inset-y-0 left-0 max-w-full flex pr-10">
		<div xyz-show="isCartDrawerOpen" xyz-transition class="cart-drawer rm-cart-drawer-panel w-screen max-w-md shadow-2xl flex flex-col relative overflow-hidden">

			<div xyz-show="isCartUpdating" class="absolute inset-0 z-100 backdrop-blur-sm flex flex-col items-center justify-center transition-all" style="display: none; background-color: var(--rm-chrome-bg);">
				<svg class="w-10 h-10 text-amber-500 animate-spin mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-6.219-8.56" /></svg>
				<span class="text-sm font-bold" style="color: var(--text-primary, #ffffff);">در حال همگام‌سازی...</span>
			</div>

			<div class="cart-drawer-header rm-cart-drawer-bar p-5 border-b flex items-center justify-between">
				<div class="flex items-center gap-2.5">
					<div class="p-2 rounded-lg bg-amber-500/10 text-amber-400">
						<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" /><path d="M3 6h18" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
					</div>
					<div>
						<h3 class="text-base font-bold tracking-tight" style="color: var(--text-primary, #ffffff);">سبد سفارشات شما</h3>
						<p class="text-xs" style="color: var(--text-muted, #9ca3af);"><span xyz-text="totalItemsCount()"></span> مورد انتخاب‌شده</p>
					</div>
				</div>
				<button xyz-on:click="isCartDrawerOpen = false" class="rm-header-control p-2 rounded-lg" title="بستن">
					<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18" /><path d="m6 6 12 12" /></svg>
				</button>
			</div>

			<div class="flex-1 overflow-y-auto p-5 space-y-4">
				<template xyz-if="cart.length === 0">
					<div class="h-full flex flex-col items-center justify-center text-center p-6 space-y-4">
						<div class="w-16 h-16 rounded-2xl border flex items-center justify-center" style="background-color: var(--rm-control-bg); border-color: var(--border-subtle, rgba(255, 255, 255, 0.1)); color: var(--text-muted, #6b7280);">
							<svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" /><path d="M3 6h18" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
						</div>
						<div>
							<h4 class="text-lg font-bold" style="color: var(--text-primary, #ffffff);">سبد خرید شما در حال حاضر خالی است</h4>
							<p class="text-xs mt-1 max-w-xs leading-relaxed" style="color: var(--text-secondary, #9ca3af);">می‌توانید از قالب‌ها و افزونه‌های تخصصی wpstorm یا پلن‌های پشتیبانی و پیامک رومونت دیدن کنید.</p>
						</div>
						<div class="pt-2 flex flex-col w-full gap-2">
							<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="rm-header-cta w-full py-2.5 px-4 rounded-xl font-bold text-xs transition text-center">مشاهده فروشگاه</a>
							<a href="<?php echo esc_url( home_url( '/maintenance-pricing' ) ); ?>" class="rm-header-control w-full py-2.5 px-4 rounded-xl font-medium text-xs transition text-center">بررسی پلن‌های پشتیبانی</a>
						</div>
					</div>
				</template>

				<template xyz-if="cart.length > 0">
					<div>
						<div class="space-y-3">
							<template xyz-for="(item, index) in cart" xyz-bind:key="item.id">
								<div class="glass-card rm-cart-item-card p-4 rounded-xl space-y-3 relative group">
									<div class="flex items-start justify-between gap-3">
										<div class="flex-1">
											<span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/10 border border-amber-500/20" style="color: var(--accent-gold, #fcd34d);" xyz-text="getItemTypeLabel(item.itemType)"></span>
											<h4 class="text-sm font-bold mt-1.5 line-clamp-1" style="color: var(--text-primary, #ffffff);" xyz-text="item.title"></h4>
											<template xyz-if="item.subtitle"><p class="text-xs mt-0.5" style="color: var(--text-muted, #9ca3af);" xyz-text="item.subtitle"></p></template>
										</div>
										<div class="text-left" dir="ltr">
											<span class="text-sm font-bold font-sans" style="color: var(--accent-gold, #fbbf24);" xyz-text="formatCurrency(item.price * item.quantity)"></span>
										</div>
									</div>
									<div class="flex items-center justify-between pt-2 border-t" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.08));">
										<div class="flex items-center rounded-lg border p-0.5" style="background-color: var(--rm-input-surface); border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">
											<button xyz-on:click="updateQuantity(item.id, -1)" class="p-1 rounded transition" style="color: var(--text-secondary, #9ca3af);"><svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14" /></svg></button>
											<span class="px-2 text-xs font-semibold" style="color: var(--text-primary, #ffffff);" xyz-text="item.quantity"></span>
											<button xyz-on:click="updateQuantity(item.id, 1)" class="p-1 rounded transition" style="color: var(--text-secondary, #9ca3af);"><svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14" /><path d="M12 5v14" /></svg></button>
										</div>
										<button xyz-on:click="removeFromCart(item.id)" class="text-xs transition hover:text-rose-400" style="color: var(--text-muted, #6b7280);">حذف از سبد</button>
									</div>
								</div>
							</template>
						</div>
						<div class="pt-4">
							<template xyz-if="!couponCode">
								<form @submit.prevent="applyCoupon()" class="flex gap-2">
									<input type="text" xyz-model="promoInput" placeholder="کد تخفیف" class="flex-1 border rounded-xl px-3 py-2 text-xs uppercase outline-none focus:border-amber-400" style="background-color: var(--rm-input-surface); border-color: var(--border-subtle, rgba(255, 255, 255, 0.1)); color: var(--text-primary, #ffffff);" />
									<button type="submit" class="rm-header-control px-3.5 py-2 rounded-xl font-medium text-xs">اعمال</button>
								</form>
							</template>
							<template xyz-if="couponError"><p class="text-[11px] text-rose-400 mt-1" xyz-text="couponError"></p></template>
						</div>
					</div>
				</template>
			</div>

			<template xyz-if="cart.length > 0">
				<div class="cart-drawer-footer rm-cart-drawer-bar p-5 border-t space-y-3">
					<div class="space-y-1.5 text-xs">
						<div class="flex justify-between" style="color: var(--text-secondary, #9ca3af);">
							<span>مجموع اولیه:</span><span class="font-semibold" style="color: var(--text-primary, #ffffff);" xyz-text="formatCurrency(getSubtotal())"></span>
						</div>
						<div class="flex justify-between text-sm font-bold pt-2 border-t" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1)); color: var(--text-primary, #ffffff);">
							<span>مبلغ نهایی:</span><span class="font-bold text-base" style="color: var(--accent-gold, #fbbf24);" xyz-text="formatCurrency(getTotal())"></span>
						</div>
					</div>
					<div class="pt-2 space-y-2">
						<a href="<?php echo esc_url( function_exists( 'kinetic_wp_checkout_url' ) ? kinetic_wp_checkout_url() : home_url( '/checkout/' ) ); ?>" class="rm-header-cta w-full py-3 px-4 rounded-xl active:scale-95 font-extrabold text-sm transition shadow-lg shadow-amber-500/20 flex items-center justify-center gap-2">
							<span>ادامه و تسویه‌حساب سریع</span>
							<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 19-7-7 7-7" /><path d="M19 12H5" /></svg>
						</a>
						<a href="<?php echo esc_url( function_exists( 'kinetic_wp_cart_url' ) ? kinetic_wp_cart_url() : home_url( '/cart/' ) ); ?>" class="rm-header-control w-full py-2.5 px-4 rounded-xl font-medium text-xs text-center block">مشاهده سبد کامل خرید</a>
					</div>
				</div>
			</template>
		</div>
	</div>
</div>
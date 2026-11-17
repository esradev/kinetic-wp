<!-- Cart Drawer -->
<div xyz-show="isCartDrawerOpen" class="fixed inset-0 z-50 overflow-hidden" dir="rtl" style="display: none;">
	<div xyz-show="isCartDrawerOpen" xyz-transition.opacity class="absolute inset-0 bg-black/75 backdrop-blur-sm" xyz-on:click="isCartDrawerOpen = false"></div>

	<div class="fixed inset-y-0 left-0 max-w-full flex pl-0 sm:pr-10">
		<div xyz-show="isCartDrawerOpen" xyz-transition class="cart-drawer rm-cart-drawer-panel w-screen max-w-md shadow-2xl flex flex-col relative overflow-hidden border-r" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">

			<!-- Syncing / Loading Overlay -->
			<div xyz-show="isCartUpdating" class="absolute inset-0 backdrop-blur-sm flex flex-col items-center justify-center transition-all" style="display: none; z-index: 60; background-color: var(--rm-chrome-bg);">
				<svg class="w-9 h-9 text-amber-500 animate-spin mb-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 12a9 9 0 1 1-6.219-8.56" /></svg>
				<span class="text-sm font-bold" style="color: var(--text-primary, #ffffff);">در حال همگام‌سازی...</span>
			</div>

			<!-- Drawer Header -->
			<div class="cart-drawer-header rm-cart-drawer-bar px-5 py-4 border-b flex items-center justify-between gap-3">
				<div class="flex items-center gap-3">
					<div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/25 flex items-center justify-center text-amber-400 shrink-0" aria-hidden="true">
						<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" /><path d="M3 6h18" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
					</div>
					<div>
						<div class="flex items-center gap-2">
							<h3 class="text-base font-bold tracking-tight" style="color: var(--text-primary, #ffffff);">سبد سفارشات شما</h3>
							<span class="px-2 py-0.5 rounded-md text-[11px] font-bold bg-amber-500/15 border border-amber-500/30" style="color: var(--accent-gold, #fbbf24);" xyz-text="totalItemsCount()"></span>
						</div>
						<p class="text-[11px] mt-0.5" style="color: var(--text-muted, #9ca3af);">مرور سریع اقلام و تسویه‌حساب</p>
					</div>
				</div>
				<button type="button" xyz-on:click="isCartDrawerOpen = false" class="rm-header-control w-9 h-9 inline-flex items-center justify-center rounded-xl transition focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400" title="بستن" aria-label="بستن سبد خرید">
					<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 6 6 18" /><path d="m6 6 12 12" /></svg>
				</button>
			</div>

			<!-- Drawer Body -->
			<div class="flex-1 overflow-y-auto p-5 space-y-4">
				<template xyz-if="cart.length === 0">
					<div class="h-full flex flex-col items-center justify-center text-center p-6 space-y-5">
						<div class="w-16 h-16 rounded-2xl border flex items-center justify-center" style="background-color: var(--rm-control-bg); border-color: var(--border-subtle, rgba(255, 255, 255, 0.1)); color: var(--accent-gold, #fbbf24);" aria-hidden="true">
							<svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" /><path d="M3 6h18" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
						</div>
						<div class="space-y-2">
							<h4 class="text-lg font-bold" style="color: var(--text-primary, #ffffff);">سبد خرید شما در حال حاضر خالی است</h4>
							<p class="text-xs max-w-xs mx-auto leading-6" style="color: var(--text-secondary, #9ca3af);">می‌توانید از قالب‌ها و افزونه‌های تخصصی wpstorm یا پلن‌های پشتیبانی و پیامک رومونت دیدن کنید.</p>
						</div>
						<div class="pt-1 flex flex-col w-full max-w-xs gap-2.5">
							<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="rm-header-cta w-full py-3 px-4 rounded-xl font-bold text-xs transition text-center">مشاهده فروشگاه</a>
							<a href="<?php echo esc_url( home_url( '/maintenance-pricing' ) ); ?>" class="rm-header-control w-full py-2.5 px-4 rounded-xl font-medium text-xs transition text-center">بررسی پلن‌های پشتیبانی</a>
						</div>
					</div>
				</template>

				<template xyz-if="cart.length > 0">
					<div class="space-y-4">
						<div class="space-y-3">
							<template xyz-for="(item, index) in cart" xyz-bind:key="item.id">
								<div class="glass-card rm-cart-item-card p-4 rounded-2xl border space-y-3.5 relative group" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1));">
									<div class="flex items-start justify-between gap-3">
										<div class="flex-1 min-w-0">
											<span class="inline-block text-[10px] font-semibold px-2 py-0.5 rounded-md bg-amber-500/10 border border-amber-500/25" style="color: var(--accent-gold, #fcd34d);" xyz-text="getItemTypeLabel(item.itemType)"></span>
											<h4 class="text-sm font-bold mt-2 line-clamp-2 leading-snug" style="color: var(--text-primary, #ffffff);" xyz-text="item.title"></h4>
											<template xyz-if="item.subtitle">
												<p class="text-xs mt-1 leading-relaxed" style="color: var(--text-muted, #9ca3af);" xyz-text="item.subtitle"></p>
											</template>
										</div>
										<div class="text-left shrink-0 pt-0.5" dir="ltr">
											<span class="text-sm font-black font-sans tabular-nums" style="color: var(--accent-gold, #fbbf24);" xyz-text="formatCurrency(item.price * item.quantity)"></span>
										</div>
									</div>

									<div class="flex items-center justify-between pt-3 border-t" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.08));">
										<div class="inline-flex items-center rounded-xl border p-0.5" style="background-color: var(--rm-input-surface); border-color: var(--border-subtle, rgba(255, 255, 255, 0.12));">
											<button type="button" xyz-on:click="updateQuantity(item.id, -1)" class="w-7 h-7 inline-flex items-center justify-center rounded-lg transition hover:opacity-80" style="color: var(--text-secondary, #9ca3af);" aria-label="کاهش تعداد">
												<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14" /></svg>
											</button>
											<span class="px-2.5 text-xs font-bold tabular-nums" style="color: var(--text-primary, #ffffff);" xyz-text="item.quantity"></span>
											<button type="button" xyz-on:click="updateQuantity(item.id, 1)" class="w-7 h-7 inline-flex items-center justify-center rounded-lg transition hover:opacity-80" style="color: var(--text-secondary, #9ca3af);" aria-label="افزایش تعداد">
												<svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14" /><path d="M12 5v14" /></svg>
											</button>
										</div>

										<button type="button" xyz-on:click="removeFromCart(item.id)" class="inline-flex items-center gap-1 text-xs font-medium transition hover:text-rose-400" style="color: var(--text-muted, #9ca3af);">
											<svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
											<span>حذف</span>
										</button>
									</div>
								</div>
							</template>
						</div>

						<!-- Promo Code Section -->
						<div class="pt-2">
							<template xyz-if="!couponCode">
								<form @submit.prevent="applyCoupon()" class="flex gap-2">
									<input type="text" xyz-model="promoInput" dir="ltr" placeholder="کد تخفیف" class="flex-1 border rounded-xl px-3.5 py-2.5 text-xs uppercase text-left font-mono outline-none focus:border-amber-400" style="background-color: var(--rm-input-surface); border-color: var(--border-subtle, rgba(255, 255, 255, 0.12)); color: var(--text-primary, #ffffff);" />
									<button type="submit" class="rm-header-control px-4 py-2.5 rounded-xl font-bold text-xs shrink-0">اعمال</button>
								</form>
							</template>
							<template xyz-if="couponCode">
								<div class="flex items-center justify-between rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-3.5 py-2 text-xs text-emerald-300">
									<span>کد تخفیف فعال:</span>
									<span class="font-mono font-bold uppercase" xyz-text="couponCode"></span>
								</div>
							</template>
							<template xyz-if="couponError">
								<p class="text-[11px] text-rose-400 mt-1.5" xyz-text="couponError"></p>
							</template>
						</div>
					</div>
				</template>
			</div>

			<!-- Drawer Footer -->
			<template xyz-if="cart.length > 0">
				<div class="cart-drawer-footer rm-cart-drawer-bar p-5 border-t space-y-4">
					<div class="space-y-2 text-xs">
						<div class="flex justify-between" style="color: var(--text-secondary, #9ca3af);">
							<span>مجموع اولیه:</span>
							<span class="font-semibold tabular-nums" style="color: var(--text-primary, #ffffff);" xyz-text="formatCurrency(getSubtotal())"></span>
						</div>
						<div class="flex justify-between items-center text-sm font-bold pt-2.5 border-t" style="border-color: var(--border-subtle, rgba(255, 255, 255, 0.1)); color: var(--text-primary, #ffffff);">
							<span>مبلغ نهایی:</span>
							<span class="font-black text-base tabular-nums" style="color: var(--accent-gold, #fbbf24);" xyz-text="formatCurrency(getTotal())"></span>
						</div>
					</div>

					<div class="space-y-2">
						<a href="<?php echo esc_url( function_exists( 'kinetic_wp_checkout_url' ) ? kinetic_wp_checkout_url() : home_url( '/checkout/' ) ); ?>" class="rm-header-cta w-full py-3 px-4 rounded-xl active:scale-95 font-extrabold text-sm transition shadow-lg shadow-amber-500/20 flex items-center justify-center gap-2">
							<span>ادامه و تسویه‌حساب سریع</span>
							<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="m12 19-7-7 7-7" /><path d="M19 12H5" /></svg>
						</a>
						<a href="<?php echo esc_url( function_exists( 'kinetic_wp_cart_url' ) ? kinetic_wp_cart_url() : home_url( '/cart/' ) ); ?>" class="rm-header-control w-full py-2.5 px-4 rounded-xl font-semibold text-xs text-center block">
							مشاهده سبد کامل خرید
						</a>
					</div>
				</div>
			</template>
		</div>
	</div>
</div>
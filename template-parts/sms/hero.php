<?php
/**
 * SMS & OTP Pricing Hero section
 *
 * @package Romonet_WPStorm
 */
?>
<section class="relative overflow-hidden border-b rm-border-subtle">
	<div class="rm-grid-bg pointer-events-none absolute inset-0"></div>
	<div class="pointer-events-none absolute -top-28 right-1/4 h-80 w-80 rounded-full opacity-20 blur-[110px]" style="background-color: var(--accent-gold, #f59e0b);"></div>

	<div class="relative mx-auto max-w-7xl px-4 pb-16 pt-12 sm:px-6 sm:pb-24 sm:pt-20 lg:px-8">
		<div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-12">

			<!-- Editorial Content -->
			<div class="lg:col-span-7">
				<span class="rm-pill-gold inline-flex items-center gap-2 rounded-full px-3.5 py-1.5 text-xs font-semibold sm:text-sm">
					<span class="h-1.5 w-1.5 rounded-full" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
					<span>اشتراک ماهانه پنل پیامکی</span>
				</span>

				<h1 class="rm-text-primary mt-6 text-3xl font-extrabold leading-[1.38] tracking-tight sm:text-5xl sm:leading-[1.28] lg:text-[3.35rem]">
					تعرفه و قیمت پنل پیامکی رومونت
				</h1>

				<p class="rm-text-secondary mt-6 max-w-2xl text-base leading-8 sm:text-lg">
					با پنل پیامکی رومونت، ارتباط با مشتریان و ارسال پیامک‌های کسب‌وکارتان را ساده‌تر مدیریت کنید. سه پلن اشتراکی متناسب با نیازهای مختلف در اختیار شماست؛ پلن مناسب خود را انتخاب کنید و در مراحل بعدی ثبت‌نام را انجام دهید.
				</p>

				<div class="mt-9 flex flex-col gap-3.5 sm:flex-row sm:items-center">
					<a href="#sms-plans" class="rm-btn-primary group inline-flex min-h-12 w-full items-center justify-center gap-2.5 rounded-xl px-7 text-sm font-bold sm:w-auto">
						<span>مشاهده پلن‌ها</span>
						<svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M19 12H5" />
							<path d="m12 19-7-7 7-7" />
						</svg>
					</a>
					<a href="tel:+982191015642" class="rm-btn-secondary inline-flex min-h-12 w-full items-center justify-center rounded-xl px-7 text-sm font-semibold sm:w-auto">
						مشاوره و راهنمایی
					</a>
				</div>
			</div>

			<!-- SMS Gateway & OTP Flow Card -->
			<aside class="lg:col-span-5" aria-label="ساختار پنل پیامکی رومونت">
				<div class="rm-card rounded-2xl p-6 sm:p-7">
					<div class="flex items-center justify-between border-b rm-border-subtle pb-4">
						<div class="flex items-center gap-2.5">
							<span class="flex h-8 w-8 items-center justify-center rounded-lg rm-text-gold" style="background-color: var(--rm-gold-soft);">
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
								</svg>
							</span>
							<p class="rm-text-primary text-sm font-bold">ساختار مدیریت پیامک و OTP</p>
						</div>
						<span class="rm-text-muted font-mono text-xs" dir="ltr">SMS PANEL</span>
					</div>

					<div class="mt-5 space-y-3">
						<div class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
							<div>
								<p class="rm-text-primary text-sm font-bold">مدیریت متمرکز وب‌سایت‌ها</p>
								<p class="rm-text-muted mt-0.5 text-xs">اتصال ۱ تا حداکثر ۱۰ وب‌سایت مطابق پلن</p>
							</div>
							<span class="rm-text-gold font-mono text-xs font-semibold">۰۱</span>
						</div>

						<div class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
							<div>
								<p class="rm-text-primary text-sm font-bold">اتصال پنل پیامکی و سوابق ارسال</p>
								<p class="rm-text-muted mt-0.5 text-xs">پیگیری وضعیت و گزارش‌ها مطابق قابلیت محصول</p>
							</div>
							<span class="rm-text-gold font-mono text-xs font-semibold">۰۲</span>
						</div>

						<div class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
							<div>
								<p class="rm-text-primary text-sm font-bold">شفافیت کامل در هزینه اشتراک</p>
								<p class="rm-text-muted mt-0.5 text-xs">اشتراک ماهانه پنل، مستقل از اعتبار پیامک</p>
							</div>
							<span class="rm-text-gold font-mono text-xs font-semibold">۰۳</span>
						</div>
					</div>

					<div class="mt-5 flex items-center justify-between border-t rm-border-subtle pt-4 text-xs">
						<span class="rm-text-muted">مقایسه کامل در جدول امکانات</span>
						<a href="#sms-comparison" class="rm-text-gold font-semibold transition hover:opacity-80">مقایسه پلن‌ها ←</a>
					</div>
				</div>
			</aside>

		</div>
	</div>
</section>
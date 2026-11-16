<?php
/**
 * Maintenance Pricing Estimator / Inquiry Form section
 *
 * @package Romonet_WPStorm
 */
?>
<section id="inquiry" class="scroll-mt-24">
	<div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-12 lg:items-start lg:px-8 lg:py-24">

		<!-- Right Column: Context & Guidance -->
		<div class="lg:col-span-5">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>درخواست بررسی سایت</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
				برای انتخاب پلن مناسب، اطلاعات سایت را ارسال کنید
			</h2>
			<p class="rm-text-secondary mt-5 text-sm leading-8 sm:text-base">
				پس از بررسی اولیه، محدوده خدمات، سطح پشتیبانی و هزینه متناسب با شرایط سایت به شما پیشنهاد می‌شود.
			</p>

			<div class="rm-card mt-8 rounded-2xl p-5 sm:p-6">
				<p class="rm-text-primary text-xs font-bold sm:text-sm">در بررسی اولیه چه مواردی ارزیابی می‌شود؟</p>
				<ul class="mt-4 space-y-3 text-sm">
					<li class="rm-text-secondary flex items-start gap-2.5">
						<span class="rm-text-gold font-bold" aria-hidden="true">✓</span>
						<span>ساختار سایت، نوع سیستم و افزونه‌های فعال</span>
					</li>
					<li class="rm-text-secondary flex items-start gap-2.5">
						<span class="rm-text-gold font-bold" aria-hidden="true">✓</span>
						<span>تناسب پشتیبانی موردی یا ماهانه با نیاز فعلی</span>
					</li>
					<li class="rm-text-secondary flex items-start gap-2.5">
						<span class="rm-text-gold font-bold" aria-hidden="true">✓</span>
						<span>شفاف‌سازی موارد داخل و خارج از قرارداد</span>
					</li>
				</ul>
			</div>
		</div>

		<!-- Left Column: Interactive Inquiry Form (xyz-* contracts preserved) -->
		<div class="lg:col-span-7">
			<form xyz-on:submit.prevent="submitMaintenanceRequest()" class="rm-card rounded-2xl p-6 sm:p-8">
				<div xyz-show="!submitSuccess" class="space-y-5">
					<div class="grid gap-5 sm:grid-cols-2">
						<label class="rm-text-secondary block text-sm font-medium">
							نام و نام خانوادگی <span class="rm-text-gold">*</span>
							<input type="text" xyz-model="customerName" required autocomplete="name" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm" placeholder="مثال: علی احمدی">
						</label>
						<label class="rm-text-secondary block text-sm font-medium">
							شماره تماس <span class="rm-text-gold">*</span>
							<input type="tel" xyz-model="customerPhone" required autocomplete="tel" inputmode="tel" dir="ltr" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-left text-sm" placeholder="09123456789">
						</label>
					</div>

					<label class="rm-text-secondary block text-sm font-medium">
						آدرس سایت <span class="rm-text-gold">*</span>
						<input type="url" xyz-model="siteUrl" required dir="ltr" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-left text-sm" placeholder="https://example.com">
					</label>

					<div class="grid gap-5 sm:grid-cols-2">
						<label class="rm-text-secondary block text-sm font-medium">
							نوع سایت <span class="rm-text-gold">*</span>
							<select xyz-model="siteType" required class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm"><option>شرکتی</option><option>فروشگاهی</option><option>شخصی</option><option>سایر</option></select>
						</label>
						<label class="rm-text-secondary block text-sm font-medium">
							نوع درخواست <span class="rm-text-gold">*</span>
							<select xyz-model="requestType" required class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm"><option>پشتیبانی ماهانه</option><option>رفع مشکل</option><option>بررسی فنی</option><option>توسعه سایت</option></select>
						</label>
					</div>

					<label class="rm-text-secondary block text-sm font-medium">
						توضیحات تکمیلی
						<textarea xyz-model="notes" rows="4" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm leading-7" placeholder="مشکل یا نیاز اصلی سایت را توضیح دهید."></textarea>
					</label>

					<p xyz-show="submitError" xyz-text="submitError" class="rounded-xl border border-rose-500/35 bg-rose-500/10 px-4 py-3 text-sm leading-6 text-rose-500 dark:text-rose-300" style="display: none;"></p>

					<button type="submit" xyz-bind:disabled="isSubmitting" class="rm-btn-primary inline-flex min-h-12 w-full items-center justify-center rounded-xl text-sm font-bold disabled:cursor-not-allowed disabled:opacity-70">
						<span xyz-show="!isSubmitting">درخواست بررسی و استعلام قیمت</span>
						<span xyz-show="isSubmitting" style="display: none;">در حال ارسال...</span>
					</button>
				</div>

				<div xyz-show="submitSuccess" class="py-10 text-center" style="display: none;">
					<div class="rm-text-emerald mx-auto flex h-14 w-14 items-center justify-center rounded-full text-xl font-bold" style="background-color: var(--rm-emerald-soft);">✓</div>
					<h3 class="rm-text-primary mt-5 text-xl font-bold">درخواست شما ثبت شد</h3>
					<p class="rm-text-secondary mx-auto mt-3 max-w-md text-sm leading-7" xyz-text="successMessage"></p>
				</div>
			</form>
		</div>

	</div>
</section>
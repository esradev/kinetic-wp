<?php
/**
 * Design Pricing Estimator / Inquiry Form section
 *
 * @package Romonet_WPStorm
 */
?>
<section id="inquiry" class="scroll-mt-24">
	<div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-12 lg:items-start lg:px-8 lg:py-24">

		<!-- Right Column: Process & Guidance -->
		<div class="lg:col-span-5">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>درخواست بررسی پروژه</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
				برای دریافت برآورد هزینه، از نیازتان بگویید
			</h2>
			<p class="rm-text-secondary mt-5 text-sm leading-8 sm:text-base">
				اطلاعات اولیه پروژه را ارسال کنید. پس از بررسی، درباره مسیر مناسب اجرا و محدوده تقریبی کار با شما تماس می‌گیریم.
			</p>

			<ol class="mt-9 space-y-4">
				<li class="rm-card flex items-start gap-3.5 rounded-xl p-4">
					<span class="rm-pill-gold flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-xs font-bold">۱</span>
					<span class="rm-text-secondary pt-0.5 text-sm leading-6">نوع کسب‌وکار و هدف سایت را مشخص کنید.</span>
				</li>
				<li class="rm-card flex items-start gap-3.5 rounded-xl p-4">
					<span class="rm-pill-gold flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-xs font-bold">۲</span>
					<span class="rm-text-secondary pt-0.5 text-sm leading-6">امکانات و نمونه‌های موردنظر را توضیح دهید.</span>
				</li>
				<li class="rm-card flex items-start gap-3.5 rounded-xl p-4">
					<span class="rm-pill-gold flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-xs font-bold">۳</span>
					<span class="rm-text-secondary pt-0.5 text-sm leading-6">برای گفت‌وگوی دقیق‌تر، شماره تماس خود را وارد کنید.</span>
				</li>
			</ol>
		</div>

		<!-- Left Column: Interactive Inquiry Form (xyz-* contracts preserved) -->
		<div class="lg:col-span-7">
			<form xyz-on:submit.prevent="submitBooking()" class="rm-card rounded-2xl p-6 sm:p-8">
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
						نوع وب‌سایت موردنیاز <span class="rm-text-gold">*</span>
						<select xyz-model="projectType" required class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm">
							<option value="شرکتی / آژانسی">سایت شرکتی یا خدماتی</option>
							<option value="فروشگاه تخصصی ووکامرس">فروشگاه اینترنتی</option>
							<option value="هدلس Next.js">سایت با امکانات اختصاصی</option>
						</select>
					</label>

					<label class="rm-text-secondary block text-sm font-medium">
						امکانات یا توضیحات پروژه
						<textarea xyz-model="projectDetails" rows="4" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm leading-7" placeholder="هدف سایت، امکانات مهم یا نمونه‌های موردنظر را بنویسید."></textarea>
					</label>

					<label class="rm-text-secondary block text-sm font-medium">
						بودجه تقریبی <span class="rm-text-muted font-normal">(اختیاری)</span>
						<input type="text" xyz-model="budget" inputmode="numeric" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm" placeholder="در صورت تمایل وارد کنید">
					</label>

					<p xyz-show="submitError" xyz-text="submitError" class="rounded-xl border border-rose-500/35 bg-rose-500/10 px-4 py-3 text-sm leading-6 text-rose-500 dark:text-rose-300" style="display: none;"></p>

					<button type="submit" xyz-bind:disabled="isSubmitting" class="rm-btn-primary inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl text-sm font-bold disabled:cursor-not-allowed disabled:opacity-70">
						<span xyz-show="!isSubmitting">درخواست بررسی و برآورد هزینه</span>
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
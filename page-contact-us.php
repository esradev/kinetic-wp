<?php
/**
 * Template Name: تماس با رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<style>
	/* Scoped theme-aware tokens & surface styles (Dark + html.light compatible) */
	.rm-contact-page {
		overflow-x: clip;
		background-color: var(--bg-main, #08090d);
		color: var(--text-primary, #f3f4f6);
		--rm-band-alt: rgba(255, 255, 255, 0.02);
		--rm-surface-glass: linear-gradient(180deg, rgba(255, 255, 255, 0.035) 0%, rgba(255, 255, 255, 0.012) 100%);
		--rm-card-shadow: 0 20px 45px -26px rgba(0, 0, 0, 0.75);
		--rm-input-bg: rgba(0, 0, 0, 0.28);
		--rm-input-focus-ring: rgba(245, 158, 11, 0.2);
		--rm-gold-soft: rgba(245, 158, 11, 0.1);
		--rm-emerald-soft: rgba(16, 185, 129, 0.12);
		--rm-btn-primary-text: #08090d;
		--rm-btn-secondary-bg: rgba(255, 255, 255, 0.03);
		--rm-btn-secondary-hover: rgba(255, 255, 255, 0.07);
	}

	html.light .rm-contact-page {
		--rm-band-alt: rgba(15, 23, 42, 0.03);
		--rm-surface-glass: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 255, 255, 0.84) 100%);
		--rm-card-shadow: 0 18px 38px -22px rgba(15, 23, 42, 0.12);
		--rm-input-bg: #ffffff;
		--rm-input-focus-ring: rgba(217, 119, 6, 0.18);
		--rm-gold-soft: rgba(217, 119, 6, 0.12);
		--rm-emerald-soft: rgba(5, 150, 105, 0.1);
		--rm-btn-primary-text: #0f172a;
		--rm-btn-secondary-bg: rgba(255, 255, 255, 0.78);
		--rm-btn-secondary-hover: #ffffff;
	}

	.rm-contact-page .rm-grid-bg {
		background-image:
			linear-gradient(to left, var(--grid-line, rgba(255, 255, 255, 0.035)) 1px, transparent 1px),
			linear-gradient(to bottom, var(--grid-line, rgba(255, 255, 255, 0.035)) 1px, transparent 1px);
		background-size: 52px 52px;
		mask-image: radial-gradient(ellipse 85% 75% at 50% 20%, #000 35%, transparent 100%);
		-webkit-mask-image: radial-gradient(ellipse 85% 75% at 50% 20%, #000 35%, transparent 100%);
	}

	.rm-contact-page .rm-band-surface {
		background-color: var(--rm-band-alt);
		border-top: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		border-bottom: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
	}

	.rm-contact-page .rm-card {
		background-color: var(--bg-card, #11131c);
		background-image: var(--rm-surface-glass);
		border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		transition: background-color 0.25s ease, border-color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
	}

	.rm-contact-page .rm-card-interactive:hover {
		background-color: var(--bg-card-hover, #161a26);
		border-color: var(--border-glow, rgba(245, 158, 11, 0.25));
		box-shadow: var(--rm-card-shadow);
	}

	.rm-contact-page .rm-cta-banner {
		background-color: var(--bg-card, #11131c);
		background-image: radial-gradient(100% 100% at 50% 0%, var(--rm-gold-soft) 0%, transparent 65%);
		border: 1px solid var(--border-glow, rgba(245, 158, 11, 0.25));
		box-shadow: var(--rm-card-shadow);
	}

	.rm-contact-page .rm-text-primary { color: var(--text-primary, #f3f4f6); }
	.rm-contact-page .rm-text-secondary { color: var(--text-secondary, #9ca3af); }
	.rm-contact-page .rm-text-muted { color: var(--text-muted, #6b7280); }
	.rm-contact-page .rm-text-gold { color: var(--accent-gold, #f59e0b); }
	.rm-contact-page .rm-text-emerald { color: var(--accent-emerald, #10b981); }
	.rm-contact-page .rm-border-subtle { border-color: var(--border-subtle, rgba(255, 255, 255, 0.08)); }

	.rm-contact-page .rm-pill-gold {
		background-color: var(--rm-gold-soft);
		border: 1px solid var(--border-glow, rgba(245, 158, 11, 0.25));
		color: var(--accent-gold, #f59e0b);
	}

	.rm-contact-page .rm-btn-primary {
		background-color: var(--accent-gold, #f59e0b);
		color: var(--rm-btn-primary-text);
		transition: filter 0.2s ease, transform 0.2s ease, opacity 0.2s ease;
	}
	.rm-contact-page .rm-btn-primary:hover {
		filter: brightness(1.06);
	}
	.rm-contact-page .rm-btn-primary:focus-visible {
		outline: 2px solid var(--accent-gold, #f59e0b);
		outline-offset: 3px;
	}

	.rm-contact-page .rm-btn-secondary {
		background-color: var(--rm-btn-secondary-bg);
		border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		color: var(--text-primary, #f3f4f6);
		transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
	}
	.rm-contact-page .rm-btn-secondary:hover {
		background-color: var(--rm-btn-secondary-hover);
		border-color: var(--border-glow, rgba(245, 158, 11, 0.25));
		color: var(--accent-gold, #f59e0b);
	}

	.rm-contact-page .rm-input {
		background-color: var(--rm-input-bg);
		border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		color: var(--text-primary, #f3f4f6);
		transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
	}
	.rm-contact-page .rm-input::placeholder {
		color: var(--text-muted, #6b7280);
	}
	.rm-contact-page .rm-input:focus {
		outline: none;
		border-color: var(--accent-gold, #f59e0b);
		box-shadow: 0 0 0 3px var(--rm-input-focus-ring);
	}
	.rm-contact-page select.rm-input {
		background-color: var(--bg-card, #11131c);
	}
	.rm-contact-page select.rm-input option {
		background-color: var(--bg-card, #11131c);
		color: var(--text-primary, #f3f4f6);
	}

	@media (prefers-reduced-motion: reduce) {
		.rm-contact-page *,
		.rm-contact-page *::before,
		.rm-contact-page *::after {
			animation-duration: 0.01ms !important;
			animation-iteration-count: 1 !important;
			transition-duration: 0.01ms !important;
			scroll-behavior: auto !important;
		}
	}
</style>

<main class="rm-contact-page min-h-screen pb-20 antialiased" dir="rtl" xyz-data="romonetContact()">

	<!-- 1. Hero Section -->
	<section class="relative overflow-hidden border-b rm-border-subtle">
		<div class="rm-grid-bg pointer-events-none absolute inset-0"></div>
		<div class="pointer-events-none absolute -top-28 right-1/4 h-80 w-80 rounded-full opacity-20 blur-[110px]" style="background-color: var(--accent-gold, #f59e0b);"></div>

		<div class="relative mx-auto max-w-7xl px-4 pb-16 pt-12 sm:px-6 sm:pb-24 sm:pt-20 lg:px-8">
			<div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-12">
				<div class="lg:col-span-7">
					<span class="rm-pill-gold inline-flex items-center gap-2 rounded-full px-3.5 py-1.5 text-xs font-semibold sm:text-sm">
						<span class="h-1.5 w-1.5 rounded-full" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
						<span>شروع گفتگو</span>
					</span>

					<h1 class="rm-text-primary mt-6 text-3xl font-extrabold leading-[1.38] tracking-tight sm:text-5xl sm:leading-[1.28] lg:text-[3.35rem]">
						ارتباط با رومونت
					</h1>

					<p class="rm-text-primary mt-4 text-lg font-semibold opacity-90 sm:text-2xl">
						برای شروع همکاری با ما در ارتباط باشید
					</p>

					<p class="rm-text-secondary mt-5 max-w-2xl text-base leading-8 sm:text-lg">
						اگر برای کسب‌وکار خود به طراحی سایت، راه‌اندازی فروشگاه اینترنتی، پشتیبانی وردپرس یا توسعه اختصاصی نیاز دارید، درخواست خود را برای ما ارسال کنید.
					</p>

					<div class="mt-9 flex flex-col gap-3.5 sm:flex-row sm:items-center">
						<a href="#inquiry" class="rm-btn-primary group inline-flex min-h-12 w-full items-center justify-center gap-2.5 rounded-xl px-7 text-sm font-bold sm:w-auto">
							<span>ثبت درخواست مشاوره</span>
							<svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M19 12H5" />
								<path d="m12 19-7-7 7-7" />
							</svg>
						</a>
						<a href="#contact-channels" class="rm-btn-secondary inline-flex min-h-12 w-full items-center justify-center rounded-xl px-7 text-sm font-semibold sm:w-auto">
							اطلاعات تماس مستقیم
						</a>
					</div>
				</div>

				<!-- Direct Summary Card -->
				<aside class="lg:col-span-5" aria-label="راه‌های ارتباطی رومونت">
					<div class="rm-card rounded-2xl p-6 sm:p-7">
						<div class="flex items-center justify-between border-b rm-border-subtle pb-4">
							<p class="rm-text-primary text-sm font-bold">مسیرهای ارتباط و مشاوره</p>
							<span class="rm-text-gold font-mono text-xs font-semibold" dir="ltr">ROMONET</span>
						</div>
						<ul class="mt-5 space-y-3.5 text-sm">
							<li class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
								<span class="rm-text-muted text-xs">تماس مستقیم</span>
								<a href="tel:+989155772051" dir="ltr" class="rm-text-primary font-mono text-xs font-bold transition hover:text-[var(--accent-gold)]">09155772051</a>
							</li>
							<li class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
								<span class="rm-text-muted text-xs">پست الکترونیک</span>
								<a href="mailto:info@romonet.ir" dir="ltr" class="rm-text-primary font-mono text-xs font-bold transition hover:text-[var(--accent-gold)]">info@romonet.ir</a>
							</li>
							<li class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
								<span class="rm-text-muted text-xs">وب‌سایت</span>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" dir="ltr" class="rm-text-gold font-mono text-xs font-bold transition hover:opacity-80">romonet.ir</a>
							</li>
						</ul>
						<p class="rm-text-muted mt-5 border-t rm-border-subtle pt-4 text-xs leading-6">
							برای بررسی دقیق‌تر نیاز پروژه و پیشنهاد مسیر اجرا، فرم پایین صفحه سریع‌ترین راه است.
						</p>
					</div>
				</aside>
			</div>
		</div>
	</section>

	<!-- 2. Contact Channels Cards -->
	<section id="contact-channels" class="rm-band-surface scroll-mt-24">
		<div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
			<div class="grid gap-5 md:grid-cols-3">
				<div class="rm-card rm-card-interactive group rounded-2xl p-6 sm:p-7">
					<div class="flex items-center justify-between">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl border rm-border-subtle rm-text-gold" style="background-color: var(--rm-gold-soft);">
							<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
							</svg>
						</span>
						<span class="rm-text-muted font-mono text-xs">۰۱</span>
					</div>
					<h2 class="rm-text-primary mt-5 text-base font-bold">تلفن</h2>
					<a href="tel:+989155772051" dir="ltr" class="rm-text-secondary mt-3 inline-block font-mono text-sm font-semibold transition hover:text-[var(--accent-gold)]">09155772051</a>
				</div>

				<div class="rm-card rm-card-interactive group rounded-2xl p-6 sm:p-7">
					<div class="flex items-center justify-between">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl border rm-border-subtle rm-text-gold" style="background-color: var(--rm-gold-soft);">
							<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<rect width="20" height="16" x="2" y="4" rx="2" />
								<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
							</svg>
						</span>
						<span class="rm-text-muted font-mono text-xs">۰۲</span>
					</div>
					<h2 class="rm-text-primary mt-5 text-base font-bold">ایمیل</h2>
					<a href="mailto:info@romonet.ir" dir="ltr" class="rm-text-secondary mt-3 inline-block font-mono text-sm font-semibold transition hover:text-[var(--accent-gold)]">info@romonet.ir</a>
				</div>

				<div class="rm-card rm-card-interactive group rounded-2xl p-6 sm:p-7">
					<div class="flex items-center justify-between">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl border rm-border-subtle rm-text-gold" style="background-color: var(--rm-gold-soft);">
							<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
								<circle cx="12" cy="10" r="3" />
							</svg>
						</span>
						<span class="rm-text-muted font-mono text-xs">۰۳</span>
					</div>
					<h2 class="rm-text-primary mt-5 text-base font-bold">آدرس</h2>
					<p class="rm-text-secondary mt-3 text-sm leading-7">مشهد مقدس، بلوار موسوی قوچانی، موسوی قوچانی ۱۹، برج فدک، بلوک A شمالی، واحد ۳۰۸</p>
				</div>
			</div>
		</div>
	</section>

	<!-- 3. Inquiry Form Section -->
	<section id="inquiry" class="scroll-mt-24">
		<div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-12 lg:items-start lg:px-8 lg:py-24">

			<div class="lg:col-span-5 lg:sticky lg:top-28">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
					<span>درخواست بررسی پروژه</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
					درخواست مشاوره و بررسی پروژه
				</h2>
				<p class="rm-text-secondary mt-5 text-sm leading-8 sm:text-base">
					اطلاعات اولیه پروژه خود را ثبت کنید تا بتوانیم درخواست شما را بهتر بررسی کنیم.
				</p>

				<div class="rm-card mt-8 rounded-2xl p-5 sm:p-6">
					<p class="rm-text-primary text-xs font-bold sm:text-sm">اطلاعات تکمیلی</p>
					<p class="rm-text-secondary mt-3 text-sm leading-7">
						وب‌سایت رسمی:
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" dir="ltr" class="rm-text-gold font-mono font-semibold transition hover:opacity-80">romonet.ir</a>
					</p>
					<p class="rm-text-muted mt-2 text-xs leading-6">
						شرح شفاف نیاز و هدف پروژه کمک می‌کند گفت‌وگوی اولیه دقیق‌تر و کاربردی‌تر پیش برود.
					</p>
				</div>
			</div>

			<div class="lg:col-span-7">
				<form xyz-on:submit.prevent="submitContactRequest()" class="rm-card rounded-2xl p-6 sm:p-8">
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
							آدرس وب‌سایت <span class="rm-text-muted font-normal">(اختیاری)</span>
							<input type="url" xyz-model="website" dir="ltr" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-left text-sm" placeholder="https://example.com">
						</label>

						<div class="grid gap-5 sm:grid-cols-2">
							<label class="rm-text-secondary block text-sm font-medium">
								نوع درخواست <span class="rm-text-gold">*</span>
								<select xyz-model="requestType" required class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm">
									<option>طراحی سایت شرکتی</option>
									<option>طراحی سایت فروشگاهی</option>
									<option>پشتیبانی وردپرس</option>
									<option>توسعه اختصاصی افزونه یا قالب</option>
									<option>خدمات پنل پیامکی</option>
									<option>سایر موارد</option>
								</select>
							</label>

							<label class="rm-text-secondary block text-sm font-medium">
								بودجه تقریبی <span class="rm-text-muted font-normal">(اختیاری)</span>
								<select xyz-model="budget" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm">
									<option>کمتر از ۲۰ میلیون تومان</option>
									<option>۲۰ تا ۵۰ میلیون تومان</option>
									<option>۵۰ تا ۱۰۰ میلیون تومان</option>
									<option>بیش از ۱۰۰ میلیون تومان</option>
									<option>هنوز مشخص نیست</option>
								</select>
							</label>
						</div>

						<label class="rm-text-secondary block text-sm font-medium">
							توضیحات پروژه <span class="rm-text-gold">*</span>
							<textarea xyz-model="description" required rows="5" class="rm-input mt-2 w-full rounded-xl px-4 py-3 text-sm leading-7" placeholder="نیاز، هدف یا مسئله اصلی پروژه را توضیح دهید."></textarea>
						</label>

						<p xyz-show="submitError" xyz-text="submitError" class="rounded-xl border border-rose-500/35 bg-rose-500/10 px-4 py-3 text-sm leading-6 text-rose-500 dark:text-rose-300" style="display: none;"></p>

						<button type="submit" xyz-bind:disabled="isSubmitting" class="rm-btn-primary inline-flex min-h-12 w-full items-center justify-center rounded-xl text-sm font-bold disabled:cursor-not-allowed disabled:opacity-70">
							<span xyz-show="!isSubmitting">ارسال درخواست مشاوره</span>
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

	<!-- 4. Bottom CTA -->
	<section class="px-4 sm:px-6 lg:px-8">
		<div class="rm-cta-banner relative mx-auto max-w-6xl overflow-hidden rounded-3xl px-6 py-14 text-center sm:px-12 sm:py-16">
			<div class="rm-grid-bg pointer-events-none absolute inset-0 opacity-60"></div>
			<div class="relative mx-auto max-w-2xl">
				<h2 class="rm-text-primary text-3xl font-extrabold leading-[1.4] sm:text-4xl">
					آماده شروع پروژه خود هستید؟
				</h2>
				<p class="rm-text-secondary mx-auto mt-5 max-w-xl text-sm leading-8 sm:text-base">
					درخواست خود را ثبت کنید تا درباره نیازهای پروژه و راهکار مناسب با شما گفت‌وگو کنیم.
				</p>
				<a href="#inquiry" class="rm-btn-primary mt-8 inline-flex min-h-12 items-center justify-center rounded-xl px-8 text-sm font-bold">
					ثبت درخواست همکاری
				</a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
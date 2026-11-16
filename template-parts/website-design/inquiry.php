<?php
/**
 * Website Design Inquiry Section
 *
 * @package Romonet_WPStorm
 */
?>
<section id="inquiry" class="scroll-mt-24 border-t border-white/10 bg-white/[0.015]">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="grid gap-12 lg:grid-cols-12 lg:items-start lg:gap-14">

			<!-- Left/Start Column (RTL): Editorial Intro, Clarity Steps & Links -->
			<div class="lg:col-span-5">
				<div class="inline-flex items-center gap-2 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-3.5 py-1 text-xs font-semibold text-amber-300">
					<span class="h-1.5 w-1.5 rounded-full bg-amber-400" aria-hidden="true"></span>
					<span>شروع پروژه</span>
				</div>

				<h2 class="mt-4 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
					پروژه طراحی سایت خود را با رومونت شروع کنید
				</h2>

				<p class="mt-5 text-sm leading-8 text-neutral-300 sm:text-base">
					برای بررسی نیازهای کسب‌وکار خود و دریافت پیشنهاد متناسب با پروژه، اطلاعات اولیه را برای ما ارسال کنید.
				</p>

				<!-- Transparent Next Steps -->
				<div class="mt-8 space-y-3 rounded-2xl border border-white/10 bg-white/[0.02] p-5">
					<p class="text-xs font-bold text-neutral-200">مسیر بررسی درخواست شما</p>
					<ul class="space-y-2.5 text-xs leading-6 text-neutral-400">
						<li class="flex items-center gap-2.5">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۱</span>
							<span>بررسی اولیه نوع وب‌سایت، امکانات و توضیحات پروژه</span>
						</li>
						<li class="flex items-center gap-2.5">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۲</span>
							<span>تماس جهت گفت‌وگو و شفاف‌سازی جزئیات فنی</span>
						</li>
						<li class="flex items-center gap-2.5">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۳</span>
							<span>ارائه راهکار پیشنهادی، محدوده اجرا و برآورد هزینه</span>
						</li>
					</ul>
				</div>

				<!-- Direct Contact & Related Pages -->
				<div class="mt-8 space-y-5 border-t border-white/10 pt-7">
					<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="group flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.025] px-4 py-3.5 text-sm font-semibold text-white transition hover:border-amber-400/40 hover:bg-amber-500/[0.05]">
						<span class="flex items-center gap-2.5">
							<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400" aria-hidden="true">
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
									<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
								</svg>
							</span>
							<span>راه‌های ارتباط با رومونت</span>
						</span>
						<svg class="h-4 w-4 text-amber-400 transition group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>

					<nav aria-label="لینک‌های مرتبط" class="flex flex-wrap gap-2 text-xs text-neutral-400">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">صفحه اصلی</a>
						<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">درباره رومونت</a>
						<a href="<?php echo esc_url( home_url( '/maintenance-pricing/' ) ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">پشتیبانی وردپرس</a>
					</nav>
				</div>
			</div>

			<!-- Right/End Column (RTL): Elevated Form Container -->
			<div class="lg:col-span-7">
				<form xyz-on:submit.prevent="submitBooking()" class="relative overflow-hidden rounded-2xl border border-white/10 bg-neutral-900/75 shadow-2xl">
					<!-- Subtle Top Accent Line -->
					<div class="h-1 w-full bg-gradient-to-l from-amber-500 via-amber-400/60 to-transparent" aria-hidden="true"></div>

					<!-- Form Header Bar -->
					<div class="flex items-center justify-between border-b border-white/10 px-6 py-4 sm:px-8">
						<span class="text-sm font-bold text-white">فرم درخواست مشاوره طراحی سایت</span>
						<span class="text-[11px] font-medium text-neutral-400">فیلدهای ستاره‌دار (*) الزامی هستند</span>
					</div>

					<div class="p-6 sm:p-8">
						<!-- Active Form Fields -->
						<div xyz-show="!submitSuccess" class="space-y-5">
							<div class="grid gap-5 sm:grid-cols-2">
								<label class="block text-sm font-medium text-neutral-200">
									<span>نام و نام خانوادگی <span class="text-amber-400">*</span></span>
									<input
										type="text"
										xyz-model="customerName"
										required
										autocomplete="name"
										placeholder="نام و نام خانوادگی شما"
										class="mt-2 w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-sm text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
									>
								</label>

								<label class="block text-sm font-medium text-neutral-200">
									<span>شماره تماس <span class="text-amber-400">*</span></span>
									<input
										type="tel"
										xyz-model="customerPhone"
										required
										autocomplete="tel"
										inputmode="tel"
										dir="ltr"
										placeholder="09123456789"
										class="mt-2 w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-left text-sm text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
									>
								</label>
							</div>

							<div class="grid gap-5 sm:grid-cols-2">
								<label class="block text-sm font-medium text-neutral-200">
									<span>نوع وب‌سایت <span class="text-amber-400">*</span></span>
									<div class="relative mt-2">
										<select
											xyz-model="projectType"
											required
											class="w-full appearance-none rounded-xl border border-white/15 bg-[#11131c] py-3 pl-10 pr-4 text-sm text-white outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
										>
											<option value="شرکتی / آژانسی">سایت شرکتی یا خدماتی</option>
											<option value="فروشگاه تخصصی ووکامرس">فروشگاه اینترنتی</option>
											<option value="هدلس Next.js">سایت با امکانات اختصاصی</option>
										</select>
										<svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
										</svg>
									</div>
								</label>

								<label class="block text-sm font-medium text-neutral-200">
									<span>بودجه تقریبی <span class="text-xs font-normal text-neutral-400">(اختیاری)</span></span>
									<input
										type="text"
										xyz-model="budget"
										inputmode="numeric"
										placeholder="مثال: برآورد پیشنهادی یا مبلغ مدنظر"
										class="mt-2 w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-sm text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
									>
								</label>
							</div>

							<label class="block text-sm font-medium text-neutral-200">
								<span>توضیحات پروژه <span class="text-amber-400">*</span></span>
								<textarea
									xyz-model="projectDetails"
									required
									rows="5"
									placeholder="درباره نوع کسب‌وکار، امکانات موردنیاز یا نمونه‌های مدنظر خود بنویسید..."
									class="mt-2 w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-sm leading-7 text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
								></textarea>
							</label>

							<!-- Error Message Banner -->
							<div xyz-show="submitError" class="flex items-start gap-2.5 rounded-xl border border-rose-500/30 bg-rose-500/10 px-4 py-3 text-sm leading-6 text-rose-200" style="display: none;" role="alert">
								<svg class="mt-0.5 h-4 w-4 shrink-0 text-rose-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
									<circle cx="12" cy="12" r="10" />
									<path stroke-linecap="round" d="M12 8v4m0 4h.01" />
								</svg>
								<p xyz-text="submitError"></p>
							</div>

							<!-- Submit Button -->
							<button
								type="submit"
								xyz-bind:disabled="isSubmitting"
								class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-amber-500 px-6 text-sm font-bold text-black transition hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-400/60 disabled:cursor-not-allowed disabled:opacity-70"
							>
								<span xyz-show="!isSubmitting" class="inline-flex items-center gap-2">
									<span>درخواست مشاوره طراحی سایت</span>
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
									</svg>
								</span>
								<span xyz-show="isSubmitting" class="inline-flex items-center gap-2" style="display: none;">
									<svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
										<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v3a5 5 0 0 0-5 5H4Z"></path>
									</svg>
									<span>در حال ارسال...</span>
								</span>
							</button>
						</div>

						<!-- Success Confirmation State -->
						<div xyz-show="submitSuccess" class="py-10 text-center" style="display: none;">
							<div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl border border-emerald-400/30 bg-emerald-500/10 text-emerald-400" aria-hidden="true">
								<svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
									<path stroke-linecap="round" stroke-linejoin="round" d="m5 12 5 5L20 7" />
								</svg>
							</div>
							<h3 class="mt-6 text-xl font-bold text-white">درخواست شما ثبت شد</h3>
							<p class="mx-auto mt-3 max-w-md text-sm leading-7 text-neutral-300" xyz-text="successMessage"></p>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</section>
<?php
/**
 * WordPress Support Inquiry Section
 *
 * @package Romonet_WPStorm
 */
?>
<section id="support-inquiry" class="scroll-mt-24 border-t border-white/10 bg-white/[0.015]">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="grid gap-12 lg:grid-cols-12 lg:items-start lg:gap-14">

			<!-- Left/Start Column (RTL): Context, Process Clarity & Links -->
			<div class="lg:col-span-5">
				<div class="inline-flex items-center gap-2 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-3.5 py-1 text-xs font-semibold text-amber-300">
					<span class="h-1.5 w-1.5 rounded-full bg-amber-400" aria-hidden="true"></span>
					<span>درخواست بررسی سایت</span>
				</div>

				<h2 class="mt-4 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
					درخواست پشتیبانی وردپرس
				</h2>

				<p class="mt-5 text-sm leading-8 text-neutral-300 sm:text-base">
					اطلاعات اولیه سایت و نیاز خود را ارسال کنید تا پس از بررسی، درباره محدوده خدمات با شما گفت‌وگو کنیم.
				</p>

				<!-- Reassurance Note -->
				<div class="mt-8 space-y-3 rounded-2xl border border-white/10 bg-white/[0.02] p-5">
					<p class="text-xs font-bold text-neutral-200">روند بررسی درخواست پشتیبانی</p>
					<ul class="space-y-2.5 text-xs leading-6 text-neutral-400">
						<li class="flex items-center gap-2.5">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۱</span>
							<span>بررسی آدرس سایت و شرح مشکل یا نیاز ارسال‌شده</span>
						</li>
						<li class="flex items-center gap-2.5">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۲</span>
							<span>هماهنگی و دریافت دسترسی تنها در صورت نیاز و به‌صورت امن</span>
						</li>
						<li class="flex items-center gap-2.5">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۳</span>
							<span>اعلام محدوده کار و پلن یا هزینه متناسب پیش از اجرا</span>
						</li>
					</ul>
				</div>

				<!-- Related Links -->
				<div class="mt-8 space-y-5 border-t border-white/10 pt-7">
					<a href="<?php echo esc_url( home_url( '/maintenance-pricing/' ) ); ?>" class="group flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.025] px-4 py-3.5 text-sm font-semibold text-white transition hover:border-amber-400/40 hover:bg-amber-500/[0.05]">
						<span class="flex items-center gap-2.5">
							<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400" aria-hidden="true">
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
									<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z" />
								</svg>
							</span>
							<span>مشاهده تعرفه پشتیبانی</span>
						</span>
						<svg class="h-4 w-4 text-amber-400 transition group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>

					<nav aria-label="لینک‌های مرتبط" class="flex flex-wrap gap-2 text-xs text-neutral-400">
						<a href="<?php echo esc_url( home_url( '/website-design/' ) ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">طراحی سایت</a>
						<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">ارتباط با رومونت</a>
						<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">درباره رومونت</a>
					</nav>
				</div>
			</div>

			<!-- Right/End Column (RTL): Elevated Support Request Form -->
			<div class="lg:col-span-7">
				<form xyz-on:submit.prevent="submitMaintenanceRequest()" class="relative overflow-hidden rounded-2xl border border-white/10 bg-neutral-900/75 shadow-2xl">
					<div class="h-1 w-full bg-gradient-to-l from-amber-500 via-amber-400/60 to-transparent" aria-hidden="true"></div>

					<div class="flex items-center justify-between border-b border-white/10 px-6 py-4 sm:px-8">
						<span class="text-sm font-bold text-white">فرم ثبت درخواست پشتیبانی وردپرس</span>
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
									<span>آدرس وب‌سایت <span class="text-amber-400">*</span></span>
									<input
										type="url"
										xyz-model="siteUrl"
										required
										dir="ltr"
										placeholder="https://example.com"
										class="mt-2 w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-left text-sm text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
									>
								</label>

								<label class="block text-sm font-medium text-neutral-200">
									<span>نوع درخواست <span class="text-amber-400">*</span></span>
									<div class="relative mt-2">
										<select
											xyz-model="requestType"
											required
											class="w-full appearance-none rounded-xl border border-white/15 bg-[#11131c] py-3 pl-10 pr-4 text-sm text-white outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
										>
											<option>پشتیبانی و نگهداری ماهانه</option>
											<option>رفع خطا و مشکل فنی</option>
											<option>به‌روزرسانی وردپرس و افزونه‌ها</option>
											<option>توسعه و افزودن قابلیت</option>
											<option>بررسی امنیت و عملکرد</option>
											<option>سایر موارد</option>
										</select>
										<svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
										</svg>
									</div>
								</label>
							</div>

							<label class="block text-sm font-medium text-neutral-200">
								<span>توضیحات مشکل یا نیاز <span class="text-amber-400">*</span></span>
								<textarea
									xyz-model="notes"
									required
									rows="5"
									placeholder="شرح خطا، تغییرات موردنیاز یا وضعیت فعلی سایت را بنویسید..."
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
									<span>ارسال درخواست پشتیبانی</span>
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

						<!-- Success State -->
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
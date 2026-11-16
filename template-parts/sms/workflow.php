<?php
/**
 * SMS & OTP Onboarding Workflow section
 *
 * @package Romonet_WPStorm
 */
?>
<section class="rm-band-surface">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
		<div class="max-w-2xl">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
				<span>مسیر شروع</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">شروع استفاده از پنل پیامکی رومونت</h2>
		</div>

		<div class="relative mt-12">
			<div class="pointer-events-none absolute left-10 right-10 top-5 hidden h-px md:block" style="background: linear-gradient(to left, var(--border-glow, rgba(245, 158, 11, 0.3)), var(--border-subtle, rgba(255, 255, 255, 0.1)));" aria-hidden="true"></div>
			<div class="pointer-events-none absolute bottom-5 right-5 top-5 w-px md:hidden" style="background: linear-gradient(to bottom, var(--border-glow, rgba(245, 158, 11, 0.3)), transparent);" aria-hidden="true"></div>

			<ol class="grid gap-6 md:grid-cols-4 md:gap-5">
				<?php foreach ( array( 'انتخاب پلن مناسب', 'ثبت‌نام و ایجاد حساب کاربری', 'تکمیل اطلاعات و اتصال پنل پیامکی', 'شروع استفاده از امکانات پنل' ) as $index => $step ) : ?>
					<li class="relative pr-14 md:pr-0">
						<span class="rm-pill-gold absolute right-0 top-0 flex h-10 w-10 items-center justify-center rounded-xl text-xs font-bold md:relative md:right-auto md:top-auto" style="background-color: var(--bg-main, #08090d);">
							۰<?php echo esc_html( $index + 1 ); ?>
						</span>
						<div class="rm-card rounded-2xl p-5 md:mt-5 md:min-h-[160px]">
							<h3 class="rm-text-primary text-base font-bold leading-7"><?php echo esc_html( $step ); ?></h3>
							<p class="rm-text-secondary mt-2 text-sm leading-7">پس از آماده‌شدن فرآیند ثبت‌نام و اشتراک، این مرحله با پلن انتخاب‌شده انجام می‌شود.</p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
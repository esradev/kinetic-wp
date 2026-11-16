<?php
/**
 * Bottom CTA section for Front Page
 *
 * @package Romonet_WPStorm
 */
?>
<section id="contact" class="scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
	<div class="rm-blueprint-panel relative mx-auto max-w-6xl overflow-hidden rounded-3xl border border-amber-400/25 px-6 py-14 sm:px-12 sm:py-20">
		<!-- Subtle architectural grid and warm focal glow -->
		<div class="rm-hairline-grid pointer-events-none absolute inset-0 opacity-60"></div>
		<div class="pointer-events-none absolute -top-24 left-1/2 h-64 w-96 -translate-x-1/2 rounded-full bg-amber-500/15 blur-[100px]"></div>

		<div class="relative mx-auto max-w-2xl text-center">
			<span class="inline-flex items-center gap-2 rounded-full border border-amber-400/30 bg-amber-500/10 px-4 py-1.5 text-xs font-semibold text-amber-300 sm:text-sm">
				شروع یک همکاری خوب
			</span>

			<h2 class="mt-6 text-3xl font-extrabold leading-[1.4] tracking-tight text-white sm:text-5xl sm:leading-[1.3]">
				برای شروع پروژه‌تان آماده‌اید؟
			</h2>

			<p class="mx-auto mt-5 max-w-xl text-sm leading-8 text-neutral-300 sm:text-base">
				نیاز کسب‌وکارتان را با ما در میان بگذارید تا راهکار مناسب و مسیر اجرای پروژه را بررسی کنیم.
			</p>

			<div class="mt-9 flex flex-col items-center justify-center gap-3.5 sm:flex-row">
				<a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="group inline-flex min-h-12 w-full items-center justify-center gap-2.5 rounded-xl bg-amber-500 px-8 text-sm font-bold text-neutral-950 shadow-lg shadow-amber-500/20 transition duration-200 hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:ring-offset-2 focus:ring-offset-[#08090d] sm:w-auto">
					<span>درخواست مشاوره</span>
					<svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
						<path d="M19 12H5" />
						<path d="m12 19-7-7 7-7" />
					</svg>
				</a>
				<a href="#services" class="inline-flex min-h-12 w-full items-center justify-center rounded-xl border border-white/15 bg-white/[0.03] px-7 text-sm font-semibold text-white transition duration-200 hover:border-amber-400/50 hover:text-amber-300 focus:outline-none focus:ring-2 focus:ring-white/25 focus:ring-offset-2 focus:ring-offset-[#08090d] sm:w-auto">
					مرور دوباره خدمات
				</a>
			</div>
		</div>
	</div>
</section>
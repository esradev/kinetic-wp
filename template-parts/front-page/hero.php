<?php
/**
 * Hero section for Front Page
 *
 * @package Romonet_WPStorm
 */
?>
<section class="relative overflow-hidden border-b border-white/10">
	<!-- Architectural background layers -->
	<div class="rm-hairline-grid bg-grid-pattern pointer-events-none absolute inset-0 opacity-75"></div>
	<div class="pointer-events-none absolute -top-32 right-1/4 h-96 w-96 rounded-full bg-amber-500/10 blur-[120px]"></div>
	<div class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-amber-400/[0.06] blur-[110px]"></div>

	<div class="relative mx-auto max-w-7xl px-4 pb-16 pt-14 sm:px-6 sm:pb-24 sm:pt-20 lg:px-8 lg:pb-28 lg:pt-24">
		<div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-10">

			<!-- Editorial Content Column -->
			<div class="lg:col-span-7">
				<div class="inline-flex items-center gap-2.5 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-3.5 py-1.5 text-xs font-semibold text-amber-300 sm:text-sm">
					<span class="relative flex h-2 w-2" aria-hidden="true">
						<span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-amber-400 opacity-60 motion-reduce:animate-none"></span>
						<span class="relative inline-flex h-2 w-2 rounded-full bg-amber-400"></span>
					</span>
					<span>رومونت؛ همراه فنی رشد دیجیتال شما</span>
				</div>

				<h1 class="mt-6 max-w-2xl text-3xl font-extrabold leading-[1.35] tracking-tight text-white sm:text-5xl sm:leading-[1.28] lg:text-[3.4rem]">
					راهکارهای دیجیتال برای
					<span class="relative inline-block text-amber-400">
						رشد کسب‌وکار شما
						<span class="absolute -bottom-1 right-0 h-px w-full bg-gradient-to-l from-amber-400/80 via-amber-400/30 to-transparent" aria-hidden="true"></span>
					</span>
				</h1>

				<p class="mt-6 max-w-xl text-base leading-8 text-neutral-300 sm:text-lg sm:leading-8">
					از طراحی وب‌سایت و فروشگاه اینترنتی تا توسعه اختصاصی وردپرس و پشتیبانی فنی؛ در رومونت برای حضور حرفه‌ای‌تر کسب‌وکار شما در فضای دیجیتال راهکار طراحی و اجرا می‌کنیم.
				</p>

				<!-- Primary & Secondary Actions -->
				<div class="mt-9 flex flex-col gap-3.5 sm:flex-row sm:items-center">
					<a href="<?php echo esc_url( home_url( '/site-design-pricing' ) ); ?>" class="group inline-flex min-h-12 w-full items-center justify-center gap-2.5 rounded-xl bg-amber-500 px-7 text-sm font-bold text-neutral-950 shadow-lg shadow-amber-500/15 transition duration-200 hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:ring-offset-2 focus:ring-offset-[#08090d] sm:w-auto">
						<span>درخواست مشاوره</span>
						<svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M19 12H5" />
							<path d="m12 19-7-7 7-7" />
						</svg>
					</a>
					<a href="#services" class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/[0.02] px-7 text-sm font-semibold text-white transition duration-200 hover:border-amber-400/50 hover:bg-white/[0.05] hover:text-amber-300 focus:outline-none focus:ring-2 focus:ring-white/25 focus:ring-offset-2 focus:ring-offset-[#08090d] sm:w-auto">
						<span>مشاهده خدمات</span>
					</a>
				</div>

				<!-- Core Focus Metadata Bar -->
				<div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-3 border-t border-white/10 pt-6 text-xs text-neutral-400 sm:text-sm">
					<div class="flex items-center gap-2">
						<span class="h-1.5 w-1.5 rounded-full bg-amber-400/80" aria-hidden="true"></span>
						<span>طراحی اختصاصی وب‌سایت و فروشگاه</span>
					</div>
					<div class="flex items-center gap-2">
						<span class="h-1.5 w-1.5 rounded-full bg-amber-400/80" aria-hidden="true"></span>
						<span>توسعه افزونه و قالب وردپرس</span>
					</div>
					<div class="flex items-center gap-2">
						<span class="h-1.5 w-1.5 rounded-full bg-amber-400/80" aria-hidden="true"></span>
						<span>پشتیبانی و نگهداری مستمر</span>
					</div>
				</div>
			</div>

			<!-- Architectural System Blueprint Visual (Non-decorative product-storytelling showcase) -->
			<div class="lg:col-span-5">
				<div class="rm-blueprint-panel relative rounded-2xl border border-white/10 p-5 sm:p-6">
					<!-- Top Window Header -->
					<div class="flex items-center justify-between border-b border-white/10 pb-4">
						<div class="flex items-center gap-2">
							<span class="h-2.5 w-2.5 rounded-full bg-white/15" aria-hidden="true"></span>
							<span class="h-2.5 w-2.5 rounded-full bg-white/15" aria-hidden="true"></span>
							<span class="h-2.5 w-2.5 rounded-full bg-amber-400/70" aria-hidden="true"></span>
						</div>
						<span class="font-mono text-[11px] tracking-wider text-neutral-400" dir="ltr">ROMONET // ARCHITECTURE</span>
					</div>

					<!-- Layered Architecture Stack -->
					<div class="mt-5 space-y-3.5">
						<div class="rounded-xl border border-white/10 bg-white/[0.03] p-4 transition hover:border-amber-400/35">
							<div class="flex items-center justify-between gap-3">
								<div class="flex items-center gap-3">
									<span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
										<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
											<rect width="18" height="14" x="3" y="5" rx="2" />
											<path d="M3 10h18" />
										</svg>
									</span>
									<div>
										<p class="text-xs font-semibold text-amber-400">لایه ۰۱ · تجربه و رابط کاربری</p>
										<p class="mt-0.5 text-sm font-bold text-white">وب‌سایت شرکتی و فروشگاه اینترنتی</p>
									</div>
								</div>
								<span class="hidden rounded-md border border-white/10 bg-white/[0.03] px-2 py-1 font-mono text-[11px] text-neutral-400 sm:inline-block" dir="ltr">UI / UX</span>
							</div>
						</div>

						<div class="rounded-xl border border-amber-400/25 bg-amber-500/[0.05] p-4">
							<div class="flex items-center justify-between gap-3">
								<div class="flex items-center gap-3">
									<span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-500/15 text-amber-300">
										<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
											<path d="m8 9-3 3 3 3" />
											<path d="m16 9 3 3-3 3" />
											<path d="m14 5-4 14" />
										</svg>
									</span>
									<div>
										<p class="text-xs font-semibold text-amber-300">لایه ۰۲ · هسته توسعه اختصاصی</p>
										<p class="mt-0.5 text-sm font-bold text-white">توسعه استاندارد وردپرس و ووکامرس</p>
									</div>
								</div>
								<span class="hidden rounded-md border border-amber-400/25 bg-amber-500/10 px-2 py-1 font-mono text-[11px] text-amber-300 sm:inline-block" dir="ltr">CORE</span>
							</div>
						</div>

						<div class="rounded-xl border border-white/10 bg-white/[0.03] p-4 transition hover:border-amber-400/35">
							<div class="flex items-center justify-between gap-3">
								<div class="flex items-center gap-3">
									<span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
										<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
											<path d="M12 3 20 7v5c0 4.8-3.3 7.7-8 9-4.7-1.3-8-4.2-8-9V7l8-4Z" />
											<path d="m9 12 2 2 4-4" />
										</svg>
									</span>
									<div>
										<p class="text-xs font-semibold text-amber-400">لایه ۰۳ · پایداری و پشتیبانی</p>
										<p class="mt-0.5 text-sm font-bold text-white">نگهداری فنی، امنیت و بهبود مستمر</p>
									</div>
								</div>
								<span class="hidden rounded-md border border-white/10 bg-white/[0.03] px-2 py-1 font-mono text-[11px] text-neutral-400 sm:inline-block" dir="ltr">CARE</span>
							</div>
						</div>
					</div>

					<!-- Bottom Blueprint Footer -->
					<div class="mt-5 flex items-center justify-between border-t border-white/10 pt-4 text-xs text-neutral-400">
						<span>ساختار روشن، تمیز و قابل توسعه</span>
						<a href="#workflow" class="inline-flex items-center gap-1.5 font-semibold text-amber-400 transition hover:text-amber-300">
							<span>مسیر اجرا</span>
							<span aria-hidden="true">←</span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
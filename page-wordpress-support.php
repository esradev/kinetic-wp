<?php
/**
 * Template Name: پشتیبانی وردپرس
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="relative min-h-screen overflow-x-clip pb-24 text-neutral-100" dir="rtl" xyz-data="romonetMaintenancePricing()">
	<style>
		.rm-blueprint-bg {
			background-image:
				linear-gradient(to left, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
				linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
			background-size: 48px 48px;
			mask-image: radial-gradient(ellipse 80% 70% at 50% 25%, #000 40%, transparent 100%);
			-webkit-mask-image: radial-gradient(ellipse 80% 70% at 50% 25%, #000 40%, transparent 100%);
		}
		.rm-hero-glow {
			background: radial-gradient(circle at 20% 20%, rgba(245, 158, 11, 0.14), transparent 55%),
						radial-gradient(circle at 85% 65%, rgba(255, 255, 255, 0.04), transparent 50%);
		}
		.rm-surface-card {
			background: linear-gradient(180deg, rgba(255, 255, 255, 0.035) 0%, rgba(255, 255, 255, 0.015) 100%);
			transition: border-color 0.25s ease, background-color 0.25s ease;
		}
		.rm-surface-card:hover {
			border-color: rgba(245, 158, 11, 0.35);
		}
		.rm-matrix-cell {
			position: relative;
			transition: background-color 0.25s ease;
		}
		.rm-matrix-cell:hover {
			background-color: rgba(255, 255, 255, 0.03);
		}
		.rm-matrix-cell::after {
			content: "";
			position: absolute;
			inset-inline-start: 0;
			top: 0;
			width: 0;
			height: 2px;
			background: linear-gradient(to left, #f59e0b, transparent);
			transition: width 0.3s ease;
		}
		.rm-matrix-cell:hover::after {
			width: 100%;
		}
		@media (prefers-reduced-motion: reduce) {
			.rm-surface-card,
			.rm-matrix-cell,
			.rm-matrix-cell::after {
				transition: none !important;
			}
		}
	</style>

	<!-- Ambient Architectural Background -->
	<div class="pointer-events-none absolute inset-x-0 top-0 h-[660px] rm-hero-glow" aria-hidden="true"></div>
	<div class="pointer-events-none absolute inset-x-0 top-0 h-[620px] rm-blueprint-bg" aria-hidden="true"></div>

	<!-- 1. Hero Section: Split Editorial + WordPress Care Console Preview -->
	<section class="relative mx-auto max-w-7xl px-4 pb-20 pt-14 sm:px-6 lg:px-8 lg:pb-28 lg:pt-24">
		<div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-10">
			<!-- Hero Content -->
			<div class="lg:col-span-7">
				<div class="inline-flex items-center gap-2.5 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-4 py-1.5 text-xs font-semibold text-amber-300">
					<span class="h-1.5 w-1.5 rounded-full bg-amber-400" aria-hidden="true"></span>
					<span>خدمات پشتیبانی و نگهداری وردپرس رومونت</span>
				</div>

				<h1 class="mt-6 text-4xl font-bold leading-[1.35] tracking-tight text-white sm:text-5xl lg:text-6xl">
					پشتیبانی وردپرس؛
					<span class="block text-amber-400">همراه مطمئن برای نگهداری و توسعه سایت شما</span>
				</h1>

				<p class="mt-6 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg">
					برای حفظ عملکرد صحیح سایت وردپرسی، فقط راه‌اندازی اولیه کافی نیست. به‌روزرسانی، بررسی مشکلات فنی، رفع خطاها و نگهداری مستمر کمک می‌کند وب‌سایت شما در مسیر فعالیت خود پایدار بماند. رومونت در زمینه پشتیبانی و نگهداری سایت‌های وردپرسی همراه شماست.
				</p>

				<div class="mt-9 flex flex-col gap-3.5 sm:flex-row sm:items-center">
					<a href="#support-inquiry" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-400/60">
						<span>درخواست پشتیبانی وردپرس</span>
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>
					<a href="<?php echo esc_url( home_url( '/maintenance-pricing/' ) ); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 bg-white/[0.03] px-7 text-sm font-semibold text-white transition hover:border-amber-400/50 hover:text-amber-300">
						مشاهده تعرفه پشتیبانی
					</a>
				</div>

				<!-- Quick Section Anchors -->
				<nav aria-label="دسترسی سریع بخش‌ها" class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-2 border-t border-white/10 pt-6 text-xs font-medium text-neutral-400">
					<a href="#support-services" class="transition hover:text-amber-300">خدمات قابل بررسی</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#support-plans" class="transition hover:text-amber-300">سطوح همکاری</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#support-process" class="transition hover:text-amber-300">فرآیند همکاری</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#support-inquiry" class="transition hover:text-amber-300">فرم درخواست</a>
				</nav>
			</div>

			<!-- Hero Visual: WordPress Care & Stability Console -->
			<div class="lg:col-span-5" aria-hidden="true">
				<div class="rounded-2xl border border-white/10 bg-neutral-900/75 p-4 shadow-2xl sm:p-5">
					<div class="flex items-center justify-between border-b border-white/10 pb-3.5">
						<div class="flex items-center gap-2">
							<span class="h-2 w-2 rounded-full bg-amber-400"></span>
							<span class="text-xs font-bold text-neutral-200">چارچوب نگهداری وردپرس</span>
						</div>
						<span class="rounded-md border border-white/10 bg-white/[0.03] px-2.5 py-0.5 text-[11px] font-medium text-neutral-400">
							WordPress Care
						</span>
					</div>

					<div class="mt-4 space-y-3">
						<div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.025] px-4 py-3">
							<div class="flex items-center gap-3">
								<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
										<path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
									</svg>
								</span>
								<div>
									<p class="text-xs font-bold text-white">هسته، قالب و افزونه‌ها</p>
									<p class="text-[11px] text-neutral-400">به‌روزرسانی همراه با بررسی سازگاری</p>
								</div>
							</div>
							<span class="text-[11px] font-semibold text-amber-300">نگهداری</span>
						</div>

						<div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.025] px-4 py-3">
							<div class="flex items-center gap-3">
								<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
										<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63" />
									</svg>
								</span>
								<div>
									<p class="text-xs font-bold text-white">عیب‌یابی و رفع خطا</p>
									<p class="text-[11px] text-neutral-400">رسیدگی به خطاهای فنی و تداخل‌ها</p>
								</div>
							</div>
							<span class="text-[11px] font-semibold text-neutral-300">پشتیبانی</span>
						</div>

						<div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.025] px-4 py-3">
							<div class="flex items-center gap-3">
								<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
									</svg>
								</span>
								<div>
									<p class="text-xs font-bold text-white">امنیت، پایداری و بهبود</p>
									<p class="text-[11px] text-neutral-400">بررسی تنظیمات و توسعه تدریجی</p>
								</div>
							</div>
							<span class="text-[11px] font-semibold text-neutral-300">حفاظت</span>
						</div>
					</div>

					<div class="mt-4 flex items-center justify-between rounded-xl border border-amber-400/20 bg-amber-500/[0.05] px-4 py-2.5 text-[11px]">
						<span class="text-neutral-300">پوشش کامل سایت‌های شرکتی و فروشگاه‌های ووکامرس</span>
						<span class="font-bold text-amber-300">موردی / ماهانه</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 2. Why Maintenance Matters: Cohesive 6-Cell Diagnostic Matrix -->
	<section class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
				<div class="max-w-2xl">
					<p class="text-xs font-bold tracking-wider text-amber-400">نیازهای رایج سایت</p>
					<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">چرا نگهداری وردپرس اهمیت دارد؟</h2>
				</div>
				<p class="max-w-md text-sm leading-7 text-neutral-400">
					هر سایت با توجه به ساختار و میزان استفاده، ممکن است به بررسی و رسیدگی فنی نیاز داشته باشد.
				</p>
			</div>

			<?php
			$challenges = array(
				array(
					'num'   => '۰۱',
					'title' => 'مشکلات فنی و خطاهای سایت',
					'icon'  => '<path d="M12 9v4m0 4h.01" /><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z" />',
				),
				array(
					'num'   => '۰۲',
					'title' => 'به‌روزرسانی هسته وردپرس و افزونه‌ها',
					'icon'  => '<path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" /><path d="M3 3v5h5" /><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16" /><path d="M16 16h5v5" />',
				),
				array(
					'num'   => '۰۳',
					'title' => 'ناسازگاری افزونه‌ها و قالب‌ها',
					'icon'  => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76Z" />',
				),
				array(
					'num'   => '۰۴',
					'title' => 'کاهش سرعت و مشکلات عملکردی',
					'icon'  => '<path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z" />',
				),
				array(
					'num'   => '۰۵',
					'title' => 'مشکلات امنیتی و نگهداری',
					'icon'  => '<path d="M12 3 4 7v5c0 5 3.5 8.5 8 9 4.5-.5 8-4 8-9V7l-8-4Z" />',
				),
				array(
					'num'   => '۰۶',
					'title' => 'نیاز به تغییرات و توسعه قابلیت‌های سایت',
					'icon'  => '<path d="m16 18 6-6-6-6M8 6l-6 6 6 6" />',
				),
			);
			?>

			<div class="mt-12 grid overflow-hidden rounded-2xl border border-white/10 bg-neutral-950/50 sm:grid-cols-2 lg:grid-cols-3">
				<?php foreach ( $challenges as $idx => $item ) : ?>
					<article class="rm-matrix-cell border-b border-white/10 p-6 sm:border-l sm:p-7 <?php echo ( $idx >= 3 ) ? 'lg:border-b-0' : ''; ?>">
						<div class="flex items-center justify-between">
							<span class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] text-amber-400" aria-hidden="true">
								<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
									<?php echo $item['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</svg>
							</span>
							<span class="font-mono text-xs font-bold text-neutral-500">
								<?php echo esc_html( $item['num'] ); ?>
							</span>
						</div>
						<h3 class="mt-5 text-base font-bold leading-7 text-white">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- 3. Support Services: 4 Architectural Pillars -->
	<section id="support-services" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="flex flex-col justify-between gap-6 border-b border-white/10 pb-8 md:flex-row md:items-end">
			<div class="max-w-2xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">خدمات قابل بررسی</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">خدمات پشتیبانی وردپرس رومونت</h2>
			</div>
			<p class="max-w-md text-sm leading-7 text-neutral-400">
				محدوده هر خدمت و اینکه در کدام پلن قرار می‌گیرد، پس از بررسی سایت و توافق مشخص می‌شود.
			</p>
		</div>

		<?php
		$services = array(
			array(
				'tag'   => 'پیشگیری و پایداری',
				'title' => 'نگهداری و به‌روزرسانی',
				'icon'  => '<path d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />',
				'items' => array(
					'بررسی نسخه وردپرس',
					'به‌روزرسانی قالب‌ها و افزونه‌ها',
					'بررسی سازگاری پس از به‌روزرسانی',
					'بررسی عملکرد عمومی سایت',
				),
			),
			array(
				'tag'   => 'عیب‌یابی تخصصی',
				'title' => 'رفع خطا و مشکلات فنی',
				'icon'  => '<path d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />',
				'items' => array(
					'بررسی خطاهای وردپرس',
					'عیب‌یابی مشکلات افزونه و قالب',
					'بررسی خطاهای نمایش و عملکرد',
					'بررسی مشکلات فنی پس از تغییرات سایت',
				),
			),
			array(
				'tag'   => 'حفاظت و بازیابی',
				'title' => 'امنیت و پایداری',
				'icon'  => '<path d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />',
				'items' => array(
					'بررسی تنظیمات امنیتی متداول',
					'بررسی وضعیت افزونه‌ها و قالب‌های نصب‌شده',
					'پیشنهاد اقدامات مناسب برای نگهداری و حفاظت',
					'بررسی نسخه پشتیبان و برنامه بازیابی، در صورت ارائه این خدمت',
				),
			),
			array(
				'tag'   => 'رشد و تکامل فنی',
				'title' => 'بهبود و توسعه سایت',
				'icon'  => '<path d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />',
				'items' => array(
					'اعمال تغییرات موردنیاز',
					'توسعه قابلیت‌های جدید',
					'اصلاح بخش‌های مختلف سایت',
					'بهینه‌سازی فنی در محدوده توافق‌شده',
				),
			),
		);
		?>

		<div class="mt-12 grid gap-5 lg:grid-cols-2">
			<?php foreach ( $services as $service ) : ?>
				<article class="rm-surface-card rounded-2xl border border-white/10 p-6 sm:p-8">
					<div class="flex items-start justify-between gap-4">
						<span class="flex h-12 w-12 items-center justify-center rounded-xl border border-amber-400/25 bg-amber-500/10 text-amber-400" aria-hidden="true">
							<svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
								<?php echo $service['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</svg>
						</span>
						<span class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-[11px] font-medium text-neutral-300">
							<?php echo esc_html( $service['tag'] ); ?>
						</span>
					</div>

					<h3 class="mt-6 text-xl font-bold text-white sm:text-2xl">
						<?php echo esc_html( $service['title'] ); ?>
					</h3>

					<ul class="mt-6 divide-y divide-white/10 border-t border-white/10 text-sm leading-7 text-neutral-300">
						<?php foreach ( $service['items'] as $item ) : ?>
							<li class="flex items-start gap-3 py-3">
								<span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400" aria-hidden="true"></span>
								<span><?php echo esc_html( $item ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- 4. Who Needs WordPress Support: Asymmetric 12-Column Editorial List -->
	<section class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="grid gap-12 lg:grid-cols-12 lg:items-start lg:gap-14">
				<div class="lg:col-span-5">
					<p class="text-xs font-bold tracking-wider text-amber-400">مخاطبان خدمت</p>
					<h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
						چه کسانی به پشتیبانی وردپرس نیاز دارند؟
					</h2>
					<p class="mt-5 text-sm leading-8 text-neutral-400">
						چه یک وب‌سایت شرکتی فعال داشته باشید و چه یک فروشگاه ووکامرس در حال رشد، داشتن یک تیم فنی مطمئن از اختلال‌های ناگهانی جلوگیری می‌کند.
					</p>
				</div>

				<div class="lg:col-span-7">
					<ul class="divide-y divide-white/10 border-y border-white/10">
						<?php
						$audience_numbers = array( '۰۱', '۰۲', '۰۳', '۰۴', '۰۵' );
						$audiences        = array(
							'صاحبان سایت‌های شرکتی',
							'مدیران فروشگاه‌های اینترنتی ووکامرس',
							'کسب‌وکارهایی که سایت فعال دارند اما نیروی فنی ندارند',
							'سایت‌هایی که با خطاها و مشکلات تکرارشونده روبه‌رو هستند',
							'مجموعه‌هایی که به نگهداری و توسعه مستمر نیاز دارند',
						);
						foreach ( $audiences as $idx => $item ) :
						?>
							<li class="group flex items-center justify-between gap-4 py-5 transition hover:pr-2">
								<div class="flex items-center gap-4 sm:gap-5">
									<span class="font-mono text-sm font-bold text-amber-400/80 transition group-hover:text-amber-300">
										<?php echo esc_html( $audience_numbers[ $idx ] ); ?>
									</span>
									<span class="text-sm font-medium leading-7 text-neutral-200 transition group-hover:text-white sm:text-base">
										<?php echo esc_html( $item ); ?>
									</span>
								</div>
								<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full border border-white/10 text-amber-400/80 transition group-hover:border-amber-400/40 group-hover:bg-amber-500/10" aria-hidden="true">
									<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
										<path stroke-linecap="round" stroke-linejoin="round" d="m5 12 5 5L20 7" />
									</svg>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- 5. Support Plans Overview: 3-Tier Architectural Strip -->
	<section id="support-plans" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
			<div class="max-w-2xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">سطح همکاری</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">پلن‌های پشتیبانی برای نیازهای مختلف</h2>
			</div>
			<a href="<?php echo esc_url( home_url( '/maintenance-pricing/' ) ); ?>" class="inline-flex items-center gap-1.5 text-sm font-bold text-amber-400 transition hover:text-amber-300">
				<span>مقایسه جزئیات و تعرفه‌ها</span>
				<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
				</svg>
			</a>
		</div>

		<?php
		$plans = array(
			array(
				'badge'     => 'سطح ۰۱',
				'title'     => 'پشتیبانی پایه',
				'desc'      => 'برای سایت‌هایی که به نگهداری و بررسی دوره‌ای نیاز دارند.',
				'highlight' => false,
			),
			array(
				'badge'     => 'سطح ۰۲ — کسب‌وکارهای فعال',
				'title'     => 'پشتیبانی حرفه‌ای',
				'desc'      => 'برای سایت‌های فعال کسب‌وکاری که به رسیدگی منظم‌تر نیاز دارند.',
				'highlight' => true,
			),
			array(
				'badge'     => 'سطح ۰۳ — پروژه‌های پیشرفته',
				'title'     => 'پشتیبانی اختصاصی',
				'desc'      => 'برای سایت‌های پیچیده با نیازهای اختصاصی و قابل توسعه.',
				'highlight' => false,
			),
		);
		?>

		<div class="mt-12 grid gap-5 lg:grid-cols-3">
			<?php foreach ( $plans as $plan ) : ?>
				<?php
				$plan_classes = ! empty( $plan['highlight'] )
					? 'border-amber-400/40 bg-amber-500/[0.05]'
					: 'rm-surface-card border-white/10';
				?>
				<article class="<?php echo esc_attr( $plan_classes ); ?> flex flex-col justify-between rounded-2xl border p-6 sm:p-8">
					<div>
						<span class="inline-block rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-[11px] font-semibold <?php echo ! empty( $plan['highlight'] ) ? 'border-amber-400/30 text-amber-300' : 'text-neutral-300'; ?>">
							<?php echo esc_html( $plan['badge'] ); ?>
						</span>
						<h3 class="mt-5 text-2xl font-bold text-white">
							<?php echo esc_html( $plan['title'] ); ?>
						</h3>
						<p class="mt-3 text-sm leading-8 text-neutral-300">
							<?php echo esc_html( $plan['desc'] ); ?>
						</p>
					</div>

					<div class="mt-8 border-t border-white/10 pt-5">
						<a href="<?php echo esc_url( home_url( '/maintenance-pricing/' ) ); ?>" class="inline-flex items-center gap-2 text-xs font-bold <?php echo ! empty( $plan['highlight'] ) ? 'text-amber-300 hover:text-amber-200' : 'text-neutral-300 hover:text-amber-300'; ?> transition">
							<span>بررسی شرایط این پلن</span>
							<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
							</svg>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="mt-8 flex flex-col items-start justify-between gap-4 rounded-2xl border border-white/10 bg-white/[0.02] p-6 sm:flex-row sm:items-center">
			<p class="text-sm leading-7 text-neutral-300">
				برای مشاهده جزئیات کامل خدمات هر پلن و انتخاب سطح مناسب وب‌سایت خود، صفحه تعرفه‌ها را ببینید.
			</p>
			<a href="<?php echo esc_url( home_url( '/maintenance-pricing/' ) ); ?>" class="inline-flex min-h-12 shrink-0 items-center justify-center rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400">
				مشاهده تعرفه و پلن‌های پشتیبانی
			</a>
		</div>
	</section>

	<!-- 6. Support Workflow: Connected 5-Step Pipeline -->
	<section id="support-process" class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">
				<div class="max-w-2xl">
					<p class="text-xs font-bold tracking-wider text-amber-400">فرآیند پشتیبانی</p>
					<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">فرآیند همکاری چگونه است؟</h2>
				</div>
				<span class="text-xs font-medium text-neutral-400">۵ گام شفاف از بررسی اولیه تا پیگیری</span>
			</div>

			<?php
			$steps = array(
				array( '۰۱', 'ثبت درخواست پشتیبانی', 'نیاز یا مشکل خود را برای ما ارسال می‌کنید.' ),
				array( '۰۲', 'بررسی اولیه سایت و نیاز شما', 'شرایط و وضعیت فنی سایت بررسی می‌شود.' ),
				array( '۰۳', 'اعلام محدوده کار', 'هزینه یا شرایط پلن متناسب اعلام می‌شود.' ),
				array( '۰۴', 'انجام خدمات پس از توافق', 'خدمات در محدوده تأییدشده انجام می‌گیرد.' ),
				array( '۰۵', 'ارائه نتیجه و پیگیری', 'نتیجه کار و پیگیری‌های لازم ارائه می‌شود.' ),
			);
			?>

			<ol class="relative mt-14 grid gap-8 md:grid-cols-5 md:gap-5">
				<div class="pointer-events-none absolute right-6 left-6 top-5 hidden h-px bg-gradient-to-l from-amber-400/50 via-white/15 to-white/10 md:block" aria-hidden="true"></div>

				<?php foreach ( $steps as $step ) : ?>
					<li class="relative flex flex-row items-start gap-4 md:flex-col md:gap-0">
						<div class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-amber-400/40 bg-neutral-950 text-xs font-bold text-amber-300">
							<?php echo esc_html( $step[0] ); ?>
						</div>
						<div class="md:mt-6">
							<h3 class="text-base font-bold leading-7 text-white">
								<?php echo esc_html( $step[1] ); ?>
							</h3>
							<p class="mt-2 text-sm leading-7 text-neutral-400">
								<?php echo esc_html( $step[2] ); ?>
							</p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<!-- 7. Why Romonet Callout Banner -->
	<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
		<div class="relative overflow-hidden rounded-3xl border border-amber-400/25 bg-neutral-900/70 px-6 py-12 text-center sm:px-12 lg:py-16">
			<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_50%_0%,rgba(245,158,11,0.12),transparent_65%)]" aria-hidden="true"></div>

			<div class="relative mx-auto max-w-3xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">چرا رومونت؟</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">پشتیبانی متناسب با وضعیت واقعی سایت</h2>
				<p class="mx-auto mt-5 max-w-2xl text-sm leading-8 text-neutral-300 sm:text-base">
					پیشنهاد خدمات پس از بررسی نیاز واقعی سایت ارائه می‌شود؛ محدوده کار، هزینه‌ها و امکان توسعه در ادامه مسیر به‌صورت شفاف مشخص می‌شوند.
				</p>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/wordpress-support/faq' ); ?>
	<?php get_template_part( 'template-parts/wordpress-support/inquiry' ); ?>
</main>

<?php get_footer(); ?>
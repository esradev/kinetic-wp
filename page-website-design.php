<?php
/**
 * Template Name: طراحی سایت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<main class="relative min-h-screen overflow-x-clip pb-24 text-neutral-100" dir="rtl" xyz-data="romonetDesignPricing()">
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
			transition: border-color 0.25s ease, background-color 0.25s ease, transform 0.25s ease;
		}
		.rm-surface-card:hover {
			border-color: rgba(245, 158, 11, 0.35);
			background: linear-gradient(180deg, rgba(255, 255, 255, 0.05) 0%, rgba(245, 158, 11, 0.025) 100%);
		}
		.rm-custom-card {
			background: linear-gradient(145deg, rgba(245, 158, 11, 0.09) 0%, rgba(255, 255, 255, 0.02) 60%, rgba(245, 158, 11, 0.04) 100%);
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

	<!-- Background Architectural Layer -->
	<div class="pointer-events-none absolute inset-x-0 top-0 h-[680px] rm-hero-glow" aria-hidden="true"></div>
	<div class="pointer-events-none absolute inset-x-0 top-0 h-[640px] rm-blueprint-bg" aria-hidden="true"></div>

	<!-- 1. Hero Section: Asymmetric Editorial + Visual Architecture Mockup -->
	<section class="relative mx-auto max-w-7xl px-4 pb-20 pt-14 sm:px-6 lg:px-8 lg:pb-28 lg:pt-24">
		<div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-10">
			<!-- Hero Content -->
			<div class="lg:col-span-7">
				<div class="inline-flex items-center gap-2.5 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-4 py-1.5 text-xs font-semibold text-amber-300">
					<span class="h-1.5 w-1.5 rounded-full bg-amber-400" aria-hidden="true"></span>
					<span>خدمات تخصصی طراحی و مهندسی وب رومونت</span>
				</div>

				<h1 class="mt-6 text-4xl font-bold leading-[1.35] tracking-tight text-white sm:text-5xl lg:text-6xl">
					طراحی سایت حرفه‌ای،
					<span class="block text-amber-400">متناسب با ساختار کسب‌وکار شما</span>
				</h1>

				<p class="mt-6 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg">
					در رومونت، هر وب‌سایت بر پایه نیاز واقعی، هویت برند و اهداف تجاری شما طراحی و پیاده‌سازی می‌شود؛ از وب‌سایت‌های شرکتی و خدماتی تا فروشگاه‌های اینترنتی و سامانه‌های اختصاصی.
				</p>

				<div class="mt-9 flex flex-col gap-3.5 sm:flex-row sm:items-center">
					<a href="#inquiry" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-400/60">
						<span>درخواست مشاوره طراحی سایت</span>
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>
					<a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/[0.03] px-7 text-sm font-semibold text-white transition hover:border-amber-400/50 hover:text-amber-300">
						<span>مشاهده نمونه‌کارها</span>
					</a>
				</div>

				<!-- Quick Section Navigation Pills -->
				<nav aria-label="دسترسی سریع بخش‌ها" class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-2 border-t border-white/10 pt-6 text-xs font-medium text-neutral-400">
					<a href="#services" class="transition hover:text-amber-300">نوع پروژه‌ها</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#tech-choice" class="transition hover:text-amber-300">وردپرس یا اختصاصی</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#process" class="transition hover:text-amber-300">مراحل اجرا</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#scope" class="transition hover:text-amber-300">محدوده تحویل</a>
				</nav>
			</div>

			<!-- Hero Architectural Visual Frame -->
			<div class="lg:col-span-5" aria-hidden="true">
				<div class="relative rounded-2xl border border-white/10 bg-neutral-900/75 p-4 shadow-2xl sm:p-5">
					<!-- Browser Header Bar -->
					<div class="flex items-center justify-between border-b border-white/10 pb-3.5">
						<div class="flex items-center gap-1.5">
							<span class="h-2.5 w-2.5 rounded-full bg-white/15"></span>
							<span class="h-2.5 w-2.5 rounded-full bg-white/15"></span>
							<span class="h-2.5 w-2.5 rounded-full bg-amber-400/60"></span>
						</div>
						<div class="rounded-md border border-white/10 bg-white/[0.03] px-3 py-1 text-[11px] font-medium tracking-wide text-neutral-400">
							architecture.romonet
						</div>
					</div>

					<!-- Visual Wireframe Architecture -->
					<div class="mt-4 space-y-3">
						<!-- Top Hero Block Preview -->
						<div class="rounded-xl border border-white/10 bg-white/[0.025] p-4">
							<div class="flex items-center justify-between">
								<span class="rounded bg-amber-500/15 px-2.5 py-0.5 text-[11px] font-semibold text-amber-300">هویت بصری و تجربه کاربری</span>
								<svg class="h-4 w-4 text-amber-400/80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
									<rect x="3" y="3" width="18" height="18" rx="3" />
									<path d="M3 9h18M9 21V9" />
								</svg>
							</div>
							<div class="mt-3.5 space-y-2">
								<div class="h-2.5 w-3/4 rounded-full bg-white/20"></div>
								<div class="h-2 w-1/2 rounded-full bg-white/10"></div>
							</div>
						</div>

						<!-- Two-Column Capabilities Schematic -->
						<div class="grid grid-cols-2 gap-3">
							<div class="rounded-xl border border-white/10 bg-white/[0.02] p-3.5">
								<div class="flex h-7 w-7 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
										<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
									</svg>
								</div>
								<p class="mt-2.5 text-xs font-bold text-white">معماری استاندارد</p>
								<p class="mt-1 text-[11px] leading-5 text-neutral-400">ساختار فنی و سئو پایه</p>
							</div>

							<div class="rounded-xl border border-white/10 bg-white/[0.02] p-3.5">
								<div class="flex h-7 w-7 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
										<rect x="7" y="2" width="10" height="20" rx="2" />
										<path d="M11 18h2" />
									</svg>
								</div>
								<p class="mt-2.5 text-xs font-bold text-white">نمایش واکنش‌گرا</p>
								<p class="mt-1 text-[11px] leading-5 text-neutral-400">موبایل، تبلت و دسکتاپ</p>
							</div>
						</div>

						<!-- Bottom System Layer -->
						<div class="flex items-center justify-between rounded-xl border border-amber-400/20 bg-amber-500/[0.05] px-4 py-3">
							<div class="flex items-center gap-2.5">
								<span class="flex h-6 w-6 items-center justify-center rounded-md bg-amber-500/20 text-amber-300">
									<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<path stroke-linecap="round" stroke-linejoin="round" d="m5 12 5 5L20 7" />
									</svg>
								</span>
								<span class="text-xs font-semibold text-neutral-200">زیرساخت آماده رشد و توسعه</span>
							</div>
							<span class="text-[11px] font-medium text-amber-300">وردپرس / اختصاصی</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 2. Why Professional Website: Editorial Split + Numbered Index -->
	<section class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="grid gap-12 lg:grid-cols-12 lg:gap-14">
				<!-- Sticky Editorial Intro -->
				<div class="lg:col-span-5">
					<div class="lg:sticky lg:top-24">
						<p class="text-xs font-bold tracking-wider text-amber-400">حضور حرفه‌ای در فضای آنلاین</p>
						<h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
							چرا کسب‌وکار شما به یک وب‌سایت حرفه‌ای نیاز دارد؟
						</h2>
						<p class="mt-5 text-sm leading-8 text-neutral-400">
							وب‌سایت تنها یک ویترین نیست؛ نقطه مرکزی اعتبار برند، معرفی دقیق خدمات و مسیر مستقیم ارتباط و دریافت درخواست از مشتریان است.
						</p>
						<div class="mt-8 hidden border-r-2 border-amber-400/50 pr-4 text-xs leading-6 text-neutral-400 lg:block">
							طراحی اصولی از ابتدا، هزینه‌های توسعه آینده را کاهش می‌دهد و پایه فعالیت‌های بازاریابی دیجیتال را محکم می‌کند.
						</div>
					</div>
				</div>

				<!-- Numbered Benefits List -->
				<div class="lg:col-span-7">
					<div class="divide-y divide-white/10 border-y border-white/10">
						<?php
						$persian_numbers = array( '۰۱', '۰۲', '۰۳', '۰۴', '۰۵', '۰۶', '۰۷' );
						$benefits        = array(
							'معرفی حرفه‌ای محصولات و خدمات',
							'افزایش اعتبار برند در فضای آنلاین',
							'ایجاد مسیر ارتباط مستقیم با مشتریان',
							'معرفی و نمایش محصولات و نمونه‌کارها',
							'امکان دریافت سفارش و درخواست آنلاین',
							'توسعه فعالیت بازاریابی دیجیتال',
							'ایجاد زیرساختی قابل توسعه برای آینده',
						);
						foreach ( $benefits as $idx => $benefit ) :
						?>
							<div class="group flex items-center justify-between gap-4 py-5 transition hover:pr-2">
								<div class="flex items-center gap-4 sm:gap-6">
									<span class="font-mono text-sm font-bold text-amber-400/80 transition group-hover:text-amber-300">
										<?php echo esc_html( $persian_numbers[ $idx ] ); ?>
									</span>
									<p class="text-sm font-medium leading-7 text-neutral-200 transition group-hover:text-white sm:text-base">
										<?php echo esc_html( $benefit ); ?>
									</p>
								</div>
								<span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full border border-white/10 text-amber-400/70 transition group-hover:border-amber-400/40 group-hover:bg-amber-500/10 group-hover:text-amber-300" aria-hidden="true">
									<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
										<path stroke-linecap="round" stroke-linejoin="round" d="m5 12 5 5L20 7" />
									</svg>
								</span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 3. Services Section: Distinct Editorial Bento Grid -->
	<section id="services" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="flex flex-col justify-between gap-6 border-b border-white/10 pb-8 md:flex-row md:items-end">
			<div class="max-w-2xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">خدمات رومونت</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">راهکارهای طراحی و توسعه وب</h2>
			</div>
			<p class="max-w-md text-sm leading-7 text-neutral-400">
				متناسب با مدل کسب‌وکار و سطح امکانات موردنیاز، ساختار فنی و طراحی پروژه تعریف می‌شود.
			</p>
		</div>

		<?php
		$services = array(
			array(
				'tag'         => 'معرفی برند و توانمندی‌ها',
				'title'       => 'طراحی سایت شرکتی',
				'description' => 'طراحی وب‌سایت برای معرفی شرکت، خدمات، توانمندی‌ها، پروژه‌ها و ایجاد ارتباط حرفه‌ای با مشتریان و مخاطبان.',
				'features'    => array( 'صفحه معرفی شرکت', 'معرفی خدمات', 'نمایش پروژه‌ها و نمونه‌کارها', 'فرم درخواست مشاوره', 'ساختار مناسب برای توسعه سئو' ),
				'featured'    => false,
				'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />',
			),
			array(
				'tag'         => 'جذب و مدیریت درخواست مشتری',
				'title'       => 'طراحی سایت خدماتی',
				'description' => 'ایجاد وب‌سایتی کاربردی برای معرفی خدمات، دریافت درخواست مشتریان و مدیریت ارتباط با مخاطبان.',
				'features'    => array( 'معرفی خدمات و تعرفه‌ها', 'فرم ثبت درخواست', 'صفحات فرود اختصاصی', 'اتصال ابزارهای ارتباطی', 'امکان توسعه امکانات موردنیاز' ),
				'featured'    => false,
				'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085" />',
			),
			array(
				'tag'         => 'فروش آنلاین با ووکامرس',
				'title'       => 'طراحی سایت فروشگاهی',
				'description' => 'طراحی و توسعه فروشگاه اینترنتی برای معرفی محصولات، مدیریت سفارش‌ها و فروش آنلاین با ووکامرس.',
				'features'    => array( 'مدیریت محصولات و دسته‌بندی‌ها', 'سبد خرید و ثبت سفارش', 'اتصال درگاه پرداخت', 'مدیریت سفارش‌ها', 'اتصال سرویس‌های پیامکی' ),
				'featured'    => false,
				'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />',
			),
			array(
				'tag'         => 'معماری سفارشی و یکپارچه‌سازی',
				'title'       => 'طراحی و توسعه اختصاصی سایت',
				'description' => 'برای پروژه‌هایی که به امکانات و فرآیندهای اختصاصی نیاز دارند، ساختار و قابلیت‌های سایت متناسب با نیاز پروژه توسعه داده می‌شود.',
				'features'    => array( 'تحلیل نیازهای پروژه', 'طراحی ساختار اختصاصی', 'توسعه قابلیت‌های سفارشی', 'اتصال API و سرویس‌های خارجی', 'معماری قابل توسعه' ),
				'featured'    => true,
				'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />',
			),
		);
		?>

		<div class="mt-12 grid gap-5 lg:grid-cols-12">
			<?php foreach ( $services as $index => $service ) : ?>
				<?php
				$is_featured = ! empty( $service['featured'] );
				$col_span    = ( 0 === $index || 3 === $index ) ? 'lg:col-span-7' : 'lg:col-span-5';
				$card_class  = $is_featured
					? 'rm-custom-card border-amber-400/30 hover:border-amber-400/60'
					: 'rm-surface-card border-white/10';
				?>
				<article class="<?php echo esc_attr( $col_span . ' ' . $card_class ); ?> flex flex-col justify-between rounded-2xl border p-6 sm:p-8">
					<div>
						<div class="flex items-start justify-between gap-4">
							<span class="flex h-12 w-12 items-center justify-center rounded-xl border border-amber-400/25 bg-amber-500/10 text-amber-400" aria-hidden="true">
								<svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
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
						<p class="mt-3 text-sm leading-8 text-neutral-300">
							<?php echo esc_html( $service['description'] ); ?>
						</p>
					</div>

					<div class="mt-7 border-t border-white/10 pt-6">
						<ul class="grid gap-2.5 text-sm leading-7 text-neutral-300 sm:grid-cols-2">
							<?php foreach ( $service['features'] as $feature ) : ?>
								<li class="flex items-center gap-2.5">
									<span class="h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400" aria-hidden="true"></span>
									<span><?php echo esc_html( $feature ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- 4. Technical Path Comparison: WordPress vs Custom Engineering -->
	<section id="tech-choice" class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="max-w-3xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">انتخاب مسیر فنی</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">طراحی سایت با وردپرس یا توسعه اختصاصی؟</h2>
				<p class="mt-4 text-sm leading-8 text-neutral-400 sm:text-base">
					انتخاب فناوری مناسب به نیازها، پیچیدگی فرآیندها و مسیر رشد پروژه بستگی دارد. هیچ روش واحدی برای همه کسب‌وکارها بهترین نیست.
				</p>
			</div>

			<div class="mt-12 overflow-hidden rounded-2xl border border-white/10 bg-neutral-950/60 lg:grid lg:grid-cols-2">
				<!-- WordPress Column -->
				<article class="border-b border-white/10 p-6 sm:p-10 lg:border-b-0 lg:border-l">
					<div class="flex items-center justify-between gap-4">
						<div>
							<span class="text-xs font-semibold text-neutral-400">مسیر اول — چابک و مدیریت‌پذیر</span>
							<h3 class="mt-1.5 text-2xl font-bold text-white">وردپرس</h3>
						</div>
						<span class="rounded-lg border border-white/10 bg-white/[0.04] px-3 py-1.5 text-xs font-semibold text-neutral-200">
							CMS / WooCommerce
						</span>
					</div>

					<ul class="mt-8 space-y-4 text-sm leading-7 text-neutral-300">
						<?php
						$wp_items = array(
							'مناسب برای بسیاری از وب‌سایت‌های شرکتی و خدماتی',
							'امکان استفاده از اکوسیستم افزونه‌ها',
							'مدیریت محتوای آسان',
							'توسعه با قالب و افزونه‌های اختصاصی',
							'مناسب برای بسیاری از فروشگاه‌های اینترنتی با WooCommerce',
						);
						foreach ( $wp_items as $item ) :
						?>
							<li class="flex items-start gap-3">
								<span class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white/[0.06] text-amber-400" aria-hidden="true">
									<svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
										<path stroke-linecap="round" stroke-linejoin="round" d="m5 12 5 5L20 7" />
									</svg>
								</span>
								<span><?php echo esc_html( $item ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</article>

				<!-- Custom Development Column -->
				<article class="rm-custom-card p-6 sm:p-10">
					<div class="flex items-center justify-between gap-4">
						<div>
							<span class="text-xs font-semibold text-amber-300/90">مسیر دوم — منطق و معماری سفارشی</span>
							<h3 class="mt-1.5 text-2xl font-bold text-white">توسعه اختصاصی</h3>
						</div>
						<span class="rounded-lg border border-amber-400/30 bg-amber-500/10 px-3 py-1.5 text-xs font-semibold text-amber-300">
							Custom Architecture
						</span>
					</div>

					<ul class="mt-8 space-y-4 text-sm leading-7 text-neutral-200">
						<?php
						$custom_items = array(
							'مناسب برای نیازهای خاص و فرآیندهای پیچیده',
							'امکان طراحی معماری متناسب با پروژه',
							'کنترل بیشتر روی منطق و قابلیت‌های اختصاصی',
							'مناسب برای سامانه‌ها و پروژه‌های نرم‌افزاری خاص',
							'نیازمند تحلیل، زمان و بودجه متناسب با پیچیدگی پروژه',
						);
						foreach ( $custom_items as $item ) :
						?>
							<li class="flex items-start gap-3">
								<span class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/15 text-amber-300" aria-hidden="true">
									<svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
										<path stroke-linecap="round" stroke-linejoin="round" d="m5 12 5 5L20 7" />
									</svg>
								</span>
								<span><?php echo esc_html( $item ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</article>
			</div>

			<!-- Consultative Footer Bar -->
			<div class="mt-8 flex flex-col items-start justify-between gap-4 rounded-2xl border border-white/10 bg-white/[0.025] p-6 sm:flex-row sm:items-center">
				<p class="text-sm leading-7 text-neutral-300">
					مطمئن نیستید کدام ساختار برای پروژه شما به‌صرفه‌تر و آینده‌نگرتر است؟
				</p>
				<a href="#inquiry" class="inline-flex min-h-11 shrink-0 items-center justify-center rounded-xl bg-amber-500 px-6 text-sm font-bold text-black transition hover:bg-amber-400">
					برای انتخاب روش مناسب مشاوره بگیرید
				</a>
			</div>
		</div>
	</section>

	<!-- 5. Quality Matrix: Cohesive Hairline 8-Cell Engineering Grid -->
	<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="max-w-2xl">
			<p class="text-xs font-bold tracking-wider text-amber-400">کیفیت اجرا</p>
			<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">ویژگی‌های یک وب‌سایت حرفه‌ای</h2>
		</div>

		<?php
		$qualities = array(
			array(
				'title' => 'طراحی واکنش‌گرا',
				'desc'  => 'نمایش صحیح وب‌سایت در موبایل، تبلت و دسکتاپ.',
				'icon'  => '<rect x="3" y="4" width="18" height="12" rx="2" /><path d="M7 20h10M12 16v4" />',
			),
			array(
				'title' => 'رابط کاربری مناسب',
				'desc'  => 'طراحی ساده، منظم و متناسب با هویت بصری برند.',
				'icon'  => '<path d="M4 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4H4V5Z" /><path d="M4 9h6v11H5a1 1 0 0 1-1-1V9Zm6 0h10v10a1 1 0 0 1-1 1h-9V9Z" />',
			),
			array(
				'title' => 'تجربه کاربری مطلوب',
				'desc'  => 'دسترسی آسان کاربران به اطلاعات و امکانات سایت.',
				'icon'  => '<circle cx="12" cy="12" r="9" /><path d="m10 10 4 2-2 4-2-6Z" />',
			),
			array(
				'title' => 'ساختار مناسب سئو',
				'desc'  => 'رعایت اصول فنی و ساختاری موردنیاز موتورهای جست‌وجو.',
				'icon'  => '<circle cx="11" cy="11" r="7" /><path d="m20 20-3.5-3.5" />',
			),
			array(
				'title' => 'امنیت و نگهداری',
				'desc'  => 'توجه به اصول امنیتی و امکان نگهداری و به‌روزرسانی سایت.',
				'icon'  => '<path d="M12 3 4 7v5c0 5 3.5 8.5 8 9 4.5-.5 8-4 8-9V7l-8-4Z" />',
			),
			array(
				'title' => 'سرعت و عملکرد',
				'desc'  => 'توجه به بهینه‌سازی منابع و عملکرد مناسب صفحات.',
				'icon'  => '<path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z" />',
			),
			array(
				'title' => 'قابلیت توسعه',
				'desc'  => 'امکان اضافه کردن امکانات جدید متناسب با رشد کسب‌وکار.',
				'icon'  => '<path d="M12 5v14M5 12h14" />',
			),
			array(
				'title' => 'مدیریت آسان',
				'desc'  => 'فراهم کردن امکان مدیریت محتوا و اطلاعات متناسب با نوع پروژه.',
				'icon'  => '<path d="M4 7h16M4 12h10M4 17h13" />',
			),
		);
		?>

		<div class="mt-12 grid overflow-hidden rounded-2xl border border-white/10 bg-white/[0.015] sm:grid-cols-2 lg:grid-cols-4">
			<?php foreach ( $qualities as $idx => $quality ) : ?>
				<article class="rm-matrix-cell border-b border-white/10 p-6 sm:border-l <?php echo ( $idx >= 4 ) ? 'lg:border-b-0' : ''; ?>">
					<div class="flex items-center justify-between">
						<span class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] text-amber-400" aria-hidden="true">
							<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
								<?php echo $quality['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</svg>
						</span>
						<span class="text-xs font-medium text-neutral-500">
							<?php echo esc_html( '۰' . ( $idx + 1 ) ); ?>
						</span>
					</div>
					<h3 class="mt-5 text-base font-bold text-white">
						<?php echo esc_html( $quality['title'] ); ?>
					</h3>
					<p class="mt-2.5 text-sm leading-7 text-neutral-400">
						<?php echo esc_html( $quality['desc'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- 6. Process Pipeline: Connected Architectural Steps -->
	<section id="process" class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">
				<div class="max-w-2xl">
					<p class="text-xs font-bold tracking-wider text-amber-400">فرآیند همکاری</p>
					<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">مراحل طراحی و اجرای سایت در رومونت</h2>
				</div>
				<span class="text-xs font-medium text-neutral-400">۵ گام شفاف از نیازسنجی تا تحویل</span>
			</div>

			<?php
			$steps = array(
				array( '۰۱', 'شناخت نیازها', 'ابتدا نوع کسب‌وکار، مخاطبان، اهداف و امکانات موردنیاز پروژه بررسی می‌شود.' ),
				array( '۰۲', 'تحلیل و پیشنهاد', 'راهکار فنی، محدوده خدمات، زمان‌بندی و هزینه پیشنهادی مشخص می‌شود.' ),
				array( '۰۳', 'طراحی و توسعه', 'طراحی رابط کاربری و پیاده‌سازی فنی بر اساس توافق انجام می‌شود.' ),
				array( '۰۴', 'تست و بهینه‌سازی', 'عملکرد صفحات، نمایش در دستگاه‌های مختلف، فرم‌ها و امکانات بررسی می‌شوند.' ),
				array( '۰۵', 'تحویل و پشتیبانی', 'سایت تحویل می‌شود و شرایط پشتیبانی طبق توافق مشخص خواهد شد.' ),
			);
			?>

			<ol class="relative mt-14 grid gap-8 md:grid-cols-5 md:gap-5">
				<!-- Horizontal Connector Line (Desktop) -->
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

	<!-- 7. Project Scope & Transparency -->
	<section id="scope" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="grid gap-12 lg:grid-cols-12 lg:items-start">
			<div class="lg:col-span-5">
				<p class="text-xs font-bold tracking-wider text-amber-400">محدوده پروژه</p>
				<h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
					در پروژه طراحی سایت چه خدماتی دریافت می‌کنید؟
				</h2>
				<p class="mt-5 text-sm leading-8 text-neutral-400">
					محدوده نهایی بر اساس پیشنهاد تأییدشده مشخص می‌شود تا پیش از شروع همکاری، تمام جزئیات تحویل شفاف باشد. موارد مقابل می‌توانند بخشی از پروژه باشند:
				</p>
			</div>

			<div class="space-y-6 lg:col-span-7">
				<!-- Included Deliverables -->
				<div class="rounded-2xl border border-white/10 bg-white/[0.025] p-6 sm:p-8">
					<h3 class="text-sm font-bold text-white">موارد قابل تعریف در محدوده استاندارد پروژه</h3>
					<div class="mt-5 grid gap-3.5 text-sm leading-7 text-neutral-300 sm:grid-cols-2">
						<?php
						$deliverables = array(
							'تحلیل نیازهای اولیه',
							'طراحی ساختار صفحات',
							'طراحی رابط کاربری',
							'پیاده‌سازی صفحات توافق‌شده',
							'تنظیم نسخه واکنش‌گرا',
							'پیاده‌سازی فرم‌های موردنیاز',
							'تنظیمات اولیه فنی و سئو',
							'بررسی و تست امکانات',
							'تحویل و آموزش اولیه مدیریت سایت، در صورت توافق',
						);
						foreach ( $deliverables as $item ) :
						?>
							<p class="flex items-start gap-2.5">
								<span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400" aria-hidden="true"></span>
								<span><?php echo esc_html( $item ); ?></span>
							</p>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Separate Agreement Note -->
				<div class="flex items-start gap-3.5 rounded-2xl border border-white/10 bg-white/[0.015] p-5 sm:p-6">
					<span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-white/10 bg-white/[0.04] text-amber-300" aria-hidden="true">
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<circle cx="12" cy="12" r="10" />
							<path stroke-linecap="round" d="M12 16v-4m0-4h.01" />
						</svg>
					</span>
					<div>
						<h3 class="text-xs font-bold text-neutral-200">موارد نیازمند توافق جداگانه</h3>
						<p class="mt-1.5 text-sm leading-7 text-neutral-400">
							خرید دامنه و هاست، لایسنس افزونه‌ها و سرویس‌های تجاری، تولید محتوای تخصصی، عکاسی، سئوی مستمر، پشتیبانی ماهانه و توسعه خارج از محدوده اولیه در صورت نیاز، با توافق جداگانه بررسی می‌شوند.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 8. Pricing & Estimation CTA Banner -->
	<section class="mx-auto max-w-7xl px-4 pb-16 sm:px-6 lg:px-8">
		<div class="relative overflow-hidden rounded-3xl border border-amber-400/25 bg-neutral-900/70 px-6 py-14 text-center sm:px-12 lg:py-20">
			<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_50%_0%,rgba(245,158,11,0.14),transparent_65%)]" aria-hidden="true"></div>

			<div class="relative mx-auto max-w-3xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">شفافیت برآورد هزینه</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">هزینه طراحی سایت چقدر است؟</h2>
				<p class="mx-auto mt-5 max-w-2xl text-sm leading-8 text-neutral-300 sm:text-base">
					هزینه به نوع وب‌سایت، تعداد و پیچیدگی صفحات، امکانات، روش پیاده‌سازی، طراحی اختصاصی و اتصال سرویس‌های خارجی بستگی دارد.
				</p>

				<div class="mt-7 flex flex-wrap justify-center gap-2 text-xs text-neutral-300">
					<?php foreach ( array( 'نوع وب‌سایت', 'تعداد و پیچیدگی صفحات', 'امکانات موردنیاز', 'روش پیاده‌سازی', 'اتصال سرویس‌های خارجی' ) as $factor ) : ?>
						<span class="rounded-full border border-white/10 bg-white/[0.04] px-3.5 py-1.5">
							<?php echo esc_html( $factor ); ?>
						</span>
					<?php endforeach; ?>
				</div>

				<div class="mt-9 flex flex-col justify-center gap-3.5 sm:flex-row">
					<a href="<?php echo esc_url( home_url( '/site-design-pricing/' ) ); ?>" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-amber-500 px-8 text-sm font-bold text-black transition hover:bg-amber-400">
						<span>مشاهده قیمت طراحی سایت</span>
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>
					<a href="#inquiry" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 bg-white/[0.03] px-7 text-sm font-semibold text-white transition hover:border-amber-400/50 hover:text-amber-300">
						دریافت برآورد اختصاصی پروژه
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/website-design/faq' ); ?>
	<?php get_template_part( 'template-parts/website-design/inquiry' ); ?>
</main>

<?php get_footer(); ?>
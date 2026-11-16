<?php
/**
 * Template Name: توسعه ووکامرس
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();

$pricing_url   = romonet_woocommerce_development_url( 'site-design-pricing' );
$website_url   = romonet_woocommerce_development_url( 'website-design' );
$support_url   = romonet_woocommerce_development_url( 'wordpress-support' );
$contact_url   = romonet_woocommerce_development_url( 'contact-us' );
$portfolio_url = post_type_exists( 'portfolio' ) ? get_post_type_archive_link( 'portfolio' ) : '';
$custom_url    = romonet_woocommerce_development_url( 'custom-wordpress-development' );

$portfolio_query = new WP_Query(
	array(
		'post_type'      => 'portfolio',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'no_found_rows'  => true,
		'tax_query'      => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'portfolio_category',
				'field'    => 'slug',
				'terms'    => array( 'طراحی-سایت-فروشگاهی', 'توسعه-ووکامرس' ),
			),
			array(
				'taxonomy' => 'portfolio_category',
				'field'    => 'name',
				'terms'    => array( 'طراحی سایت فروشگاهی', 'توسعه ووکامرس' ),
			),
		),
	)
);

$service_groups = array(
	array(
		'tag'   => 'رابط کاربری و مسیر خرید',
		'title' => 'طراحی و راه‌اندازی فروشگاه',
		'icon'  => '<path d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z" />',
		'items' => array(
			'طراحی رابط کاربری متناسب با برند',
			'پیاده‌سازی صفحات اصلی فروشگاه',
			'طراحی صفحه محصول',
			'طراحی سبد خرید و فرایند پرداخت',
			'پیاده‌سازی واکنش‌گرا',
		),
	),
	array(
		'tag'   => 'تنظیمات هسته فروشگاه',
		'title' => 'پیکربندی ووکامرس',
		'icon'  => '<path d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />',
		'items' => array(
			'تنظیم واحد پول و اطلاعات فروشگاه',
			'تنظیم روش‌های ارسال',
			'تنظیمات محصولات',
			'تنظیمات مالیات در صورت نیاز',
			'تنظیم وضعیت سفارش‌ها',
		),
	),
	array(
		'tag'   => 'اکوسیستم پرداخت و لجستیک',
		'title' => 'اتصال سرویس‌ها',
		'icon'  => '<path d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />',
		'items' => array(
			'درگاه‌های پرداخت سازگار',
			'سرویس‌های ارسال و حمل‌ونقل',
			'پنل‌های پیامکی',
			'سرویس‌های مقایسه قیمت مانند ترب، در صورت وجود راهکار فنی مناسب',
			'سرویس‌های پرداخت اعتباری مانند اسنپ‌پی، در صورت امکان و تأیید شرایط ارائه‌دهنده',
		),
	),
	array(
		'tag'   => 'مهندسی و کدنویسی سفارشی',
		'title' => 'توسعه اختصاصی ووکامرس',
		'icon'  => '<path d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />',
		'items' => array(
			'توسعه فیلدهای اختصاصی محصول',
			'توسعه امکانات سبد خرید',
			'سفارشی‌سازی فرایند سفارش',
			'توسعه امکانات مدیریتی',
			'اتصال به API سرویس‌های خارجی',
			'توسعه افزونه‌های اختصاصی موردنیاز فروشگاه',
		),
	),
	array(
		'tag'   => 'ارتقای فروشگاه‌های فعال',
		'title' => 'بهینه‌سازی و توسعه فروشگاه موجود',
		'icon'  => '<path d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />',
		'items' => array(
			'بررسی ساختار فعلی فروشگاه',
			'رفع مشکلات فنی',
			'بهبود تجربه خرید',
			'توسعه قابلیت‌های جدید',
			'بررسی عملکرد و سرعت',
		),
	),
);

$faqs = array(
	'طراحی فروشگاه اینترنتی با ووکامرس چقدر زمان می‌برد؟' => 'زمان به تعداد صفحات، آماده‌بودن محتوا، پیچیدگی محصولات و امکانات و یکپارچه‌سازی‌های موردنیاز بستگی دارد و پس از بررسی پروژه مشخص می‌شود.',
	'آیا امکان طراحی فروشگاه اختصاصی با وردپرس وجود دارد؟' => 'بله، ووکامرس می‌تواند با قالب، افزونه و توسعه اختصاصی برای نیازهای پروژه شخصی‌سازی شود.',
	'آیا می‌توان درگاه پرداخت به فروشگاه متصل کرد؟' => 'اتصال درگاه‌های سازگار با ووکامرس قابل بررسی است و انتخاب نهایی به شرایط درگاه و نیازهای فروشگاه بستگی دارد.',
	'آیا امکان اتصال پنل پیامکی به ووکامرس وجود دارد؟' => 'در صورت وجود افزونه یا API سازگار، اتصال پیامک‌های اطلاع‌رسانی قابل بررسی و اجرا است.',
	'آیا امکان اتصال فروشگاه به ترب وجود دارد؟' => 'در صورت فراهم بودن راهکار فنی و الزامات سرویس، اتصال و آماده‌سازی اطلاعات فروشگاه قابل بررسی است.',
	'آیا امکان فعال‌سازی پرداخت اقساطی یا اعتباری وجود دارد؟' => 'این کار به شرایط و API ارائه‌دهنده سرویس بستگی دارد و پس از تأیید امکان فنی و قراردادی بررسی می‌شود.',
	'آیا می‌توان امکانات اختصاصی برای فروشگاه توسعه داد؟' => 'بله، امکاناتی مانند قیمت‌گذاری، فیلترها، فیلدهای محصول و فرایند سفارش اختصاصی پس از تحلیل قابل توسعه هستند.',
	'آیا رومونت فروشگاه‌های ووکامرسی قدیمی را هم توسعه می‌دهد؟' => 'بله، ابتدا ساختار فعلی، افزونه‌ها و مشکلات فروشگاه بررسی می‌شود و سپس محدوده توسعه پیشنهاد می‌شود.',
	'آیا آموزش مدیریت فروشگاه ارائه می‌شود؟' => 'آموزش مدیریت در صورت قرارگرفتن در محدوده توافق‌شده، هنگام تحویل فروشگاه ارائه می‌شود.',
	'هزینه طراحی فروشگاه اینترنتی چگونه تعیین می‌شود؟' => 'هزینه به صفحات، طراحی اختصاصی، امکانات، یکپارچه‌سازی‌ها، توسعه اختصاصی و پیچیدگی محصولات و فرایند خرید بستگی دارد.',
);
?>

<main class="relative min-h-screen overflow-x-clip pb-24 text-neutral-100" dir="rtl" xyz-data="romonetWooCommerceDevelopment()">
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
		.rm-faq-summary::-webkit-details-marker {
			display: none;
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

	<!-- 1. Hero Section: Split Editorial + Commerce Architecture Preview -->
	<section class="relative mx-auto max-w-7xl px-4 pb-20 pt-14 sm:px-6 lg:px-8 lg:pb-28 lg:pt-24">
		<div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-10">
			<!-- Hero Content -->
			<div class="lg:col-span-7">
				<div class="inline-flex items-center gap-2.5 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-4 py-1.5 text-xs font-semibold text-amber-300">
					<span class="h-1.5 w-1.5 rounded-full bg-amber-400" aria-hidden="true"></span>
					<span>خدمات توسعه فروشگاه رومونت</span>
				</div>

				<h1 class="mt-6 text-4xl font-bold leading-[1.35] tracking-tight text-white sm:text-5xl lg:text-6xl">
					طراحی فروشگاه اینترنتی با ووکامرس؛
					<span class="block text-amber-400">شروع حرفه‌ای فروش آنلاین</span>
				</h1>

				<p class="mt-6 max-w-2xl text-base leading-8 text-neutral-300 sm:text-lg">
					برای راه‌اندازی یک فروشگاه اینترنتی موفق، به بستری نیاز دارید که مدیریت محصولات، سفارش‌ها و فرایند خرید را ساده و قابل توسعه کند. رومونت با طراحی و توسعه فروشگاه‌های ووکامرسی، راهکار متناسب با نیاز کسب‌وکار شما ارائه می‌دهد.
				</p>

				<div class="mt-9 flex flex-col gap-3.5 sm:flex-row sm:items-center">
					<a href="#inquiry" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-amber-500 px-7 text-sm font-bold text-black transition hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-400/60">
						<span>درخواست مشاوره طراحی فروشگاه</span>
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>
					<?php if ( $pricing_url ) : ?>
						<a href="<?php echo esc_url( $pricing_url ); ?>" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 bg-white/[0.03] px-7 text-sm font-semibold text-white transition hover:border-amber-400/50 hover:text-amber-300">
							مشاهده تعرفه طراحی سایت
						</a>
					<?php endif; ?>
				</div>

				<!-- Quick Section Anchors -->
				<nav aria-label="دسترسی سریع بخش‌ها" class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-2 border-t border-white/10 pt-6 text-xs font-medium text-neutral-400">
					<a href="#woo-services" class="transition hover:text-amber-300">محدوده خدمات</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#woo-custom" class="transition hover:text-amber-300">سفارشی‌سازی</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#woo-process" class="transition hover:text-amber-300">مراحل اجرا</a>
					<span class="text-white/15" aria-hidden="true">/</span>
					<a href="#inquiry" class="transition hover:text-amber-300">فرم درخواست</a>
				</nav>
			</div>

			<!-- Hero Visual: WooCommerce Storefront & Order Flow Architecture -->
			<div class="lg:col-span-5" aria-hidden="true">
				<div class="rounded-2xl border border-white/10 bg-neutral-900/75 p-4 shadow-2xl sm:p-5">
					<div class="flex items-center justify-between border-b border-white/10 pb-3.5">
						<div class="flex items-center gap-2">
							<span class="h-2 w-2 rounded-full bg-amber-400"></span>
							<span class="text-xs font-bold text-neutral-200">معماری فروشگاه ووکامرس</span>
						</div>
						<span class="rounded-md border border-white/10 bg-white/[0.03] px-2.5 py-0.5 font-mono text-[11px] text-neutral-400">
							WooCommerce Core
						</span>
					</div>

					<div class="mt-4 space-y-3">
						<!-- Step 1: Catalog -->
						<div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.025] px-4 py-3">
							<div class="flex items-center gap-3">
								<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
										<path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
									</svg>
								</span>
								<div>
									<p class="text-xs font-bold text-white">کاتالوگ، تنوع و موجودی</p>
									<p class="text-[11px] text-neutral-400">ساختار دسته‌بندی، فیلتر و ویژگی‌های محصول</p>
								</div>
							</div>
							<span class="text-[11px] font-semibold text-amber-300">محصولات</span>
						</div>

						<!-- Step 2: Checkout & Gateways -->
						<div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.025] px-4 py-3">
							<div class="flex items-center gap-3">
								<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
										<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
									</svg>
								</span>
								<div>
									<p class="text-xs font-bold text-white">سبد خرید و فرایند پرداخت</p>
									<p class="text-[11px] text-neutral-400">اتصال درگاه‌های سازگار و تخفیف‌ها</p>
								</div>
							</div>
							<span class="text-[11px] font-semibold text-neutral-300">پرداخت</span>
						</div>

						<!-- Step 3: Orders & Shipping -->
						<div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/[0.025] px-4 py-3">
							<div class="flex items-center gap-3">
								<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-500/10 text-amber-400">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
										<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
									</svg>
								</span>
								<div>
									<p class="text-xs font-bold text-white">سفارش‌ها، ارسال و اطلاع‌رسانی</p>
									<p class="text-[11px] text-neutral-400">مدیریت وضعیت سفارش و اتصال پنل پیامکی</p>
								</div>
							</div>
							<span class="text-[11px] font-semibold text-neutral-300">عملیات</span>
						</div>
					</div>

					<div class="mt-4 flex flex-wrap items-center justify-between gap-2 rounded-xl border border-amber-400/20 bg-amber-500/[0.05] px-4 py-2.5 text-[11px]">
						<span class="text-neutral-300">یکپارچه‌سازی با سرویس‌های ارسال و API</span>
						<span class="font-bold text-amber-300">قابل توسعه</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 2. Why WooCommerce: Sticky Editorial Split + Numbered Index -->
	<section class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="grid gap-12 lg:grid-cols-12 lg:gap-14">
				<div class="lg:col-span-5">
					<div class="lg:sticky lg:top-24">
						<p class="text-xs font-bold tracking-wider text-amber-400">انتخاب آگاهانه پلتفرم</p>
						<h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
							چرا ووکامرس برای بسیاری از فروشگاه‌ها مناسب است؟
						</h2>
						<p class="mt-5 text-sm leading-8 text-neutral-400">
							ووکامرس برای بسیاری از کسب‌وکارهایی که به مدیریت محصولات و سفارش‌ها، اکوسیستم وردپرس و امکان توسعه تدریجی نیاز دارند، گزینه قابل بررسی است. انتخاب نهایی باید بر اساس مدل کسب‌وکار و نیازهای واقعی پروژه انجام شود.
						</p>
					</div>
				</div>

				<div class="lg:col-span-7">
					<ul class="divide-y divide-white/10 border-y border-white/10">
						<?php
						$persian_nums = array( '۰۱', '۰۲', '۰۳', '۰۴', '۰۵', '۰۶', '۰۷' );
						$woo_benefits = array(
							'مدیریت محصولات و دسته‌بندی‌ها',
							'مدیریت سفارش‌ها و مشتریان',
							'پشتیبانی از درگاه‌های پرداخت از طریق افزونه‌های سازگار',
							'مدیریت روش‌های ارسال',
							'تعریف تخفیف و کد تخفیف',
							'قابلیت توسعه و شخصی‌سازی',
							'اتصال به ابزارها و سرویس‌های دیگر',
						);
						foreach ( $woo_benefits as $idx => $item ) :
						?>
							<li class="group flex items-center justify-between gap-4 py-5 transition hover:pr-2">
								<div class="flex items-center gap-4 sm:gap-5">
									<span class="font-mono text-sm font-bold text-amber-400/80 transition group-hover:text-amber-300">
										<?php echo esc_html( $persian_nums[ $idx ] ); ?>
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

	<!-- 3. Store Types: Architectural 2x2 Grid with Domain SVG Icons -->
	<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="flex flex-col justify-between gap-4 border-b border-white/10 pb-8 md:flex-row md:items-end">
			<div class="max-w-2xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">برای مدل‌های مختلف کسب‌وکار</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">چه فروشگاه‌هایی با ووکامرس قابل توسعه هستند؟</h2>
			</div>
		</div>

		<?php
		$store_types = array(
			array(
				'tag'   => 'کالای فیزیکی و ارسال',
				'title' => 'فروشگاه محصولات فیزیکی',
				'desc'  => 'محصولات دارای قیمت، موجودی، ارسال و مدیریت سفارش.',
				'icon'  => '<path d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />',
			),
			array(
				'tag'   => 'محصولات قابل دانلود',
				'title' => 'فروشگاه محصولات دیجیتال',
				'desc'  => 'فروش محصولات قابل دانلود و تحویل دیجیتال، در صورت تناسب با مدل کسب‌وکار.',
				'icon'  => '<path d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />',
			),
			array(
				'tag'   => 'کاتالوگ گسترده',
				'title' => 'فروشگاه چنددسته‌ای',
				'desc'  => 'فروشگاه‌هایی با دسته‌بندی‌های متعدد و کاتالوگ محصول گسترده.',
				'icon'  => '<path d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />',
			),
			array(
				'tag'   => 'فرآیندهای سفارشی',
				'title' => 'فروشگاه اختصاصی و توسعه‌یافته',
				'desc'  => 'فروشگاه‌هایی که به قابلیت‌ها، فرآیندها و یکپارچه‌سازی‌های اختصاصی نیاز دارند.',
				'icon'  => '<path d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />',
			),
		);
		?>

		<div class="mt-12 grid gap-5 md:grid-cols-2">
			<?php foreach ( $store_types as $store_type ) : ?>
				<article class="rm-surface-card rounded-2xl border border-white/10 p-6 sm:p-8">
					<div class="flex items-start justify-between gap-4">
						<span class="flex h-12 w-12 items-center justify-center rounded-xl border border-amber-400/25 bg-amber-500/10 text-amber-400" aria-hidden="true">
							<svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
								<?php echo $store_type['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</svg>
						</span>
						<span class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-[11px] font-medium text-neutral-300">
							<?php echo esc_html( $store_type['tag'] ); ?>
						</span>
					</div>
					<h3 class="mt-6 text-xl font-bold text-white"><?php echo esc_html( $store_type['title'] ); ?></h3>
					<p class="mt-3 text-sm leading-8 text-neutral-400"><?php echo esc_html( $store_type['desc'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- 4. Service Groups: Balanced 12-Col Bento (4 Paired + 1 Full-Width Highlighted Banner) -->
	<section id="woo-services" class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="flex flex-col justify-between gap-6 border-b border-white/10 pb-8 md:flex-row md:items-end">
				<div class="max-w-2xl">
					<p class="text-xs font-bold tracking-wider text-amber-400">محدوده خدمات</p>
					<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">خدمات توسعه ووکامرس رومونت</h2>
				</div>
				<p class="max-w-md text-sm leading-7 text-neutral-400">
					محدوده نهایی هر پروژه پس از بررسی نیازها و امکان فنی سرویس‌ها مشخص می‌شود.
				</p>
			</div>

			<div class="mt-12 grid gap-5 lg:grid-cols-12">
				<?php foreach ( $service_groups as $idx => $group ) : ?>
					<?php $is_last = ( 4 === $idx ); ?>
					<article class="<?php echo $is_last ? 'lg:col-span-12 border-amber-400/30 bg-amber-500/[0.04]' : 'lg:col-span-6 rm-surface-card border-white/10'; ?> rounded-2xl border p-6 sm:p-8">
						<div class="flex flex-wrap items-center justify-between gap-4">
							<div class="flex items-center gap-3.5">
								<span class="flex h-11 w-11 items-center justify-center rounded-xl border border-amber-400/25 bg-amber-500/10 text-amber-400" aria-hidden="true">
									<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
										<?php echo $group['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</svg>
								</span>
								<h3 class="text-xl font-bold text-white"><?php echo esc_html( $group['title'] ); ?></h3>
							</div>
							<span class="rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-[11px] font-medium text-neutral-300">
								<?php echo esc_html( $group['tag'] ); ?>
							</span>
						</div>

						<ul class="mt-6 <?php echo $is_last ? 'grid gap-3 sm:grid-cols-2 lg:grid-cols-3 border-t border-white/10 pt-6' : 'divide-y divide-white/10 border-t border-white/10'; ?> text-sm leading-7 text-neutral-300">
							<?php foreach ( $group['items'] as $item ) : ?>
								<li class="flex items-start gap-2.5 <?php echo $is_last ? 'rounded-xl border border-white/10 bg-neutral-950/50 px-4 py-3' : 'py-3'; ?>">
									<span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400" aria-hidden="true"></span>
									<span><?php echo esc_html( $item ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- 5. Execution Standards: 8-Cell Hairline Engineering Matrix -->
	<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="max-w-2xl">
			<p class="text-xs font-bold tracking-wider text-amber-400">استانداردهای اجرا</p>
			<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">ویژگی‌های یک فروشگاه اینترنتی حرفه‌ای</h2>
		</div>

		<?php
		$store_standards = array(
			array( 'طراحی واکنش‌گرا', 'نمایش مناسب فروشگاه در موبایل، تبلت و دسکتاپ.', '<rect x="3" y="4" width="18" height="12" rx="2" /><path d="M7 20h10M12 16v4" />' ),
			array( 'تجربه خرید ساده', 'مسیر قابل فهم برای مشاهده محصول، سبد خرید و پرداخت.', '<circle cx="9" cy="20" r="1" /><circle cx="17" cy="20" r="1" /><path d="M2.5 3.5h3l2.2 11h10.8l2-7.5H6.2" />' ),
			array( 'ساختار مناسب سئو', 'رعایت اصول فنی و ساختاری موردنیاز فروشگاه.', '<circle cx="11" cy="11" r="7" /><path d="m20 20-3.5-3.5" />' ),
			array( 'مدیریت آسان محصولات', 'مدیریت اطلاعات، موجودی و سفارش‌ها متناسب با نیاز تیم.', '<path d="M4 7h16M4 12h10M4 17h13" />' ),
			array( 'فرایند خرید شفاف', 'ارائه اطلاعات روشن درباره محصول، ارسال و پرداخت.', '<path d="M9 12.75 11.25 15 15 9.75" /><circle cx="12" cy="12" r="9" />' ),
			array( 'امنیت و نگهداری اصولی', 'توجه به به‌روزرسانی، سازگاری و نگهداری فنی.', '<path d="M12 3 4 7v5c0 5 3.5 8.5 8 9 4.5-.5 8-4 8-9V7l-8-4Z" />' ),
			array( 'قابلیت توسعه در آینده', 'امکان برنامه‌ریزی برای نیازهای جدید کسب‌وکار.', '<path d="M12 5v14M5 12h14" />' ),
			array( 'نمایش مناسب در موبایل', 'اولویت دادن به استفاده راحت کاربران موبایل.', '<rect x="7" y="2" width="10" height="20" rx="2" /><path d="M11 18h2" />' ),
		);
		?>

		<div class="mt-12 grid overflow-hidden rounded-2xl border border-white/10 bg-white/[0.015] sm:grid-cols-2 lg:grid-cols-4">
			<?php foreach ( $store_standards as $idx => $feature ) : ?>
				<article class="rm-matrix-cell border-b border-white/10 p-6 sm:border-l <?php echo ( $idx >= 4 ) ? 'lg:border-b-0' : ''; ?>">
					<div class="flex items-center justify-between">
						<span class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/[0.03] text-amber-400" aria-hidden="true">
							<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
								<?php echo $feature[2]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</svg>
						</span>
						<span class="font-mono text-xs font-bold text-neutral-500">
							<?php echo esc_html( '۰' . ( $idx + 1 ) ); ?>
						</span>
					</div>
					<h3 class="mt-5 text-base font-bold text-white"><?php echo esc_html( $feature[0] ); ?></h3>
					<p class="mt-2.5 text-sm leading-7 text-neutral-400"><?php echo esc_html( $feature[1] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- 6. Custom WooCommerce Capabilities: Asymmetric Split (Clean 7-Item List) -->
	<section id="woo-custom" class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="grid gap-12 lg:grid-cols-12 lg:items-start lg:gap-14">
				<div class="lg:col-span-5">
					<p class="text-xs font-bold tracking-wider text-amber-400">فراتر از امکانات آماده</p>
					<h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
						سفارشی‌سازی ووکامرس بر اساس نیاز واقعی
					</h2>
					<p class="mt-5 text-sm leading-8 text-neutral-400">
						هر فروشگاه به امکانات یکسانی نیاز ندارد. موارد مقابل نمونه‌هایی از توسعه‌های قابل بررسی هستند و به‌صورت پیش‌فرض بخشی از همه پروژه‌ها محسوب نمی‌شوند.
					</p>
				</div>

				<div class="lg:col-span-7">
					<ul class="divide-y divide-white/10 border-y border-white/10">
						<?php
						$custom_nums  = array( '۰۱', '۰۲', '۰۳', '۰۴', '۰۵', '۰۶', '۰۷' );
						$custom_items = array(
							'فیلدهای اختصاصی محصولات',
							'فیلترهای پیشرفته',
							'قیمت‌گذاری سفارشی',
							'فرایندهای سفارش اختصاصی',
							'امکانات ویژه مشتریان',
							'اتصال به سیستم‌های حسابداری یا انبار، در صورت امکان فنی',
							'ارتباط با سرویس‌های بیرونی از طریق API',
						);
						foreach ( $custom_items as $idx => $item ) :
						?>
							<li class="group flex items-center justify-between gap-4 py-4 transition hover:pr-2">
								<div class="flex items-center gap-4">
									<span class="font-mono text-xs font-bold text-amber-400/80 transition group-hover:text-amber-300">
										<?php echo esc_html( $custom_nums[ $idx ] ); ?>
									</span>
									<span class="text-sm font-medium leading-7 text-neutral-200 transition group-hover:text-white">
										<?php echo esc_html( $item ); ?>
									</span>
								</div>
								<span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md border border-white/10 bg-white/[0.03] text-amber-400" aria-hidden="true">+</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- 7. Execution Workflow: Connected 5-Step Pipeline -->
	<section id="woo-process" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">
			<div class="max-w-2xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">مسیر همکاری</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">مراحل اجرای پروژه فروشگاه</h2>
			</div>
			<span class="text-xs font-medium text-neutral-400">۵ گام شفاف از بررسی مدل فروش تا تحویل</span>
		</div>

		<?php
		$woo_steps = array(
			array( '۰۱', 'نیازسنجی و بررسی مدل کسب‌وکار', 'هدف، محصولات، مخاطبان و نیازهای فنی بررسی می‌شود.' ),
			array( '۰۲', 'پیشنهاد ساختار و امکانات فروشگاه', 'ساختار صفحات، امکانات و محدوده پروژه پیشنهاد می‌شود.' ),
			array( '۰۳', 'طراحی رابط کاربری و تجربه خرید', 'رابط متناسب با برند و مسیر خرید طراحی می‌شود.' ),
			array( '۰۴', 'توسعه، تنظیمات و یکپارچه‌سازی', 'فروشگاه، تنظیمات و سرویس‌های تأییدشده پیاده‌سازی می‌شوند.' ),
			array( '۰۵', 'تست، تحویل و آموزش مدیریت فروشگاه', 'امکانات بررسی و شیوه مدیریت در محدوده توافق‌شده آموزش داده می‌شود.' ),
		);
		?>

		<ol class="relative mt-14 grid gap-8 md:grid-cols-5 md:gap-5">
			<div class="pointer-events-none absolute right-6 left-6 top-5 hidden h-px bg-gradient-to-l from-amber-400/50 via-white/15 to-white/10 md:block" aria-hidden="true"></div>

			<?php foreach ( $woo_steps as $step ) : ?>
				<li class="relative flex flex-row items-start gap-4 md:flex-col md:gap-0">
					<div class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-amber-400/40 bg-neutral-950 text-xs font-bold text-amber-300">
						<?php echo esc_html( $step[0] ); ?>
					</div>
					<div class="md:mt-6">
						<h3 class="text-base font-bold leading-7 text-white"><?php echo esc_html( $step[1] ); ?></h3>
						<p class="mt-2 text-sm leading-7 text-neutral-400"><?php echo esc_html( $step[2] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</section>

	<!-- 8. Decision Callout: WooCommerce vs Custom Development -->
	<section class="border-y border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
			<div class="flex flex-col justify-between gap-8 rounded-3xl border border-white/10 bg-neutral-900/70 p-7 sm:p-10 lg:flex-row lg:items-center">
				<div class="max-w-2xl">
					<p class="text-xs font-bold tracking-wider text-amber-400">انتخاب راهکار مناسب</p>
					<h2 class="mt-3 text-2xl font-bold text-white sm:text-3xl">ووکامرس یا توسعه اختصاصی؟</h2>
					<p class="mt-4 text-sm leading-8 text-neutral-300">
						ووکامرس برای بسیاری از فروشگاه‌هایی که به مدیریت محتوای وردپرس، اکوسیستم افزونه‌ها و توسعه تدریجی نیاز دارند مناسب است. برای فرآیندهای بسیار خاص یا پیچیده، توسعه اختصاصی می‌تواند ارزش بررسی داشته باشد. انتخاب باید بر اساس نیاز واقعی پروژه انجام شود.
					</p>
				</div>
				<?php if ( $custom_url ) : ?>
					<a href="<?php echo esc_url( $custom_url ); ?>" class="inline-flex min-h-12 shrink-0 items-center justify-center gap-2 rounded-xl border border-amber-400/35 bg-amber-500/10 px-6 text-sm font-bold text-amber-300 transition hover:bg-amber-500/20">
						<span>آشنایی با توسعه اختصاصی وردپرس</span>
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- 9. Related Portfolio (Preserved Query & Card Function) -->
	<?php if ( $portfolio_query->have_posts() ) : ?>
		<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="flex flex-col gap-4 border-b border-white/10 pb-8 sm:flex-row sm:items-end sm:justify-between">
				<div>
					<p class="text-xs font-bold tracking-wider text-amber-400">نمونه‌های منتشرشده</p>
					<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">پروژه‌های مرتبط با فروشگاه</h2>
				</div>
				<?php if ( $portfolio_url ) : ?>
					<a href="<?php echo esc_url( $portfolio_url ); ?>" class="inline-flex items-center gap-1.5 text-sm font-bold text-amber-400 transition hover:text-amber-300">
						<span>مشاهده همه نمونه‌کارها</span>
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
						</svg>
					</a>
				<?php endif; ?>
			</div>

			<div class="mt-12 grid gap-5 md:grid-cols-3">
				<?php
				while ( $portfolio_query->have_posts() ) :
					$portfolio_query->the_post();
					romonet_portfolio_card();
				endwhile;
				?>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<!-- 10. Pricing CTA Banner -->
	<section class="mx-auto max-w-7xl px-4 pb-8 pt-10 sm:px-6 lg:px-8">
		<div class="relative overflow-hidden rounded-3xl border border-amber-400/25 bg-neutral-900/75 px-6 py-14 text-center sm:px-12 lg:py-20">
			<div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_50%_0%,rgba(245,158,11,0.14),transparent_65%)]" aria-hidden="true"></div>

			<div class="relative mx-auto max-w-3xl">
				<p class="text-xs font-bold tracking-wider text-amber-400">شفافیت برآورد هزینه</p>
				<h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">هزینه طراحی فروشگاه اینترنتی چگونه تعیین می‌شود؟</h2>
				<p class="mx-auto mt-5 max-w-2xl text-sm leading-8 text-neutral-300 sm:text-base">
					تعداد و پیچیدگی صفحات، طراحی اختصاصی، تعداد و نوع امکانات، یکپارچه‌سازی سرویس‌ها، توسعه اختصاصی و پیچیدگی محصولات و فرایند خرید از عوامل مؤثر هستند.
				</p>

				<div class="mt-7 flex flex-wrap justify-center gap-2 text-xs text-neutral-300">
					<?php foreach ( array( 'تعداد و پیچیدگی صفحات', 'طراحی اختصاصی', 'یکپارچه‌سازی سرویس‌ها', 'توسعه اختصاصی', 'پیچیدگی فرایند خرید' ) as $factor ) : ?>
						<span class="rounded-full border border-white/10 bg-white/[0.04] px-3.5 py-1.5"><?php echo esc_html( $factor ); ?></span>
					<?php endforeach; ?>
				</div>

				<?php if ( $pricing_url ) : ?>
					<div class="mt-9">
						<a href="<?php echo esc_url( $pricing_url ); ?>" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-amber-500 px-8 text-sm font-bold text-black transition hover:bg-amber-400">
							<span>مشاهده تعرفه طراحی سایت</span>
							<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
							</svg>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- 11. FAQs: 12-Column Editorial Accordion -->
	<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
		<div class="grid gap-12 lg:grid-cols-12 lg:gap-14">
			<div class="lg:col-span-4">
				<div class="lg:sticky lg:top-24">
					<p class="text-xs font-bold tracking-wider text-amber-400">پاسخ به پرسش‌های رایج</p>
					<h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
						سؤالات متداول توسعه ووکامرس
					</h2>
					<p class="mt-4 text-sm leading-8 text-neutral-400">
						نکات کلیدی درباره زمان‌بندی، اتصال درگاه‌ها و سرویس‌های بیرونی، توسعه فروشگاه‌های فعلی و عوامل مؤثر بر هزینه.
					</p>

					<div class="mt-8 rounded-2xl border border-white/10 bg-white/[0.025] p-5">
						<p class="text-sm font-bold text-white">نیاز به بررسی اختصاصی فروشگاه دارید؟</p>
						<p class="mt-2 text-xs leading-6 text-neutral-400">
							مشخصات پروژه یا فروشگاه فعلی خود را در فرم زیر ثبت کنید.
						</p>
						<a href="#inquiry" class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-amber-400 transition hover:text-amber-300">
							<span>ثبت درخواست مشاوره</span>
							<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-6-6 6 6 6-6" />
							</svg>
						</a>
					</div>
				</div>
			</div>

			<div class="lg:col-span-8">
				<div class="space-y-3">
					<?php
					$faq_nums  = array( '۰۱', '۰۲', '۰۳', '۰۴', '۰۵', '۰۶', '۰۷', '۰۸', '۰۹', '۱۰' );
					$faq_index = 0;
					foreach ( $faqs as $question => $answer ) :
						$num_label = isset( $faq_nums[ $faq_index ] ) ? $faq_nums[ $faq_index ] : (string) ( $faq_index + 1 );
						$faq_index++;
					?>
						<details class="group rounded-2xl border border-white/10 bg-white/[0.02] transition open:border-amber-400/35 open:bg-amber-500/[0.03] hover:border-white/20">
							<summary class="rm-faq-summary flex cursor-pointer list-none items-center justify-between gap-4 px-5 py-5 sm:px-6">
								<span class="flex items-start gap-3.5 sm:items-center sm:gap-4">
									<span class="mt-0.5 font-mono text-xs font-bold text-amber-400/80 transition group-open:text-amber-300 sm:mt-0">
										<?php echo esc_html( $num_label ); ?>
									</span>
									<span class="text-sm font-bold leading-7 text-white sm:text-base">
										<?php echo esc_html( $question ); ?>
									</span>
								</span>
								<span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-white/10 bg-white/[0.03] text-amber-400 transition group-open:rotate-45 group-open:border-amber-400/30 group-open:bg-amber-500/10" aria-hidden="true">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14" />
									</svg>
								</span>
							</summary>
							<div class="border-t border-white/10 px-5 pb-5 pt-4 sm:px-6 sm:pr-14">
								<p class="text-sm leading-8 text-neutral-300"><?php echo esc_html( $answer ); ?></p>
							</div>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- 12. Inquiry Form (#inquiry) - Preserving All xyz-* Contracts -->
	<section id="inquiry" class="scroll-mt-24 border-t border-white/10 bg-white/[0.015]">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
			<div class="grid gap-12 lg:grid-cols-12 lg:items-start lg:gap-14">
				<div class="lg:col-span-5">
					<div class="inline-flex items-center gap-2 rounded-full border border-amber-400/25 bg-amber-500/[0.08] px-3.5 py-1 text-xs font-semibold text-amber-300">
						<span class="h-1.5 w-1.5 rounded-full bg-amber-400" aria-hidden="true"></span>
						<span>شروع پروژه</span>
					</div>

					<h2 class="mt-4 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
						فروشگاه اینترنتی خود را با رومونت توسعه دهید
					</h2>

					<p class="mt-5 text-sm leading-8 text-neutral-300 sm:text-base">
						اطلاعات اولیه پروژه را ارسال کنید تا مدل کسب‌وکار، وضعیت فعلی فروشگاه و نیازهای فنی شما بررسی شود.
					</p>

					<div class="mt-8 space-y-3 rounded-2xl border border-white/10 bg-white/[0.02] p-5">
						<p class="text-xs font-bold text-neutral-200">روند بررسی پروژه فروشگاهی</p>
						<ul class="space-y-2.5 text-xs leading-6 text-neutral-400">
							<li class="flex items-center gap-2.5">
								<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۱</span>
								<span>بررسی نوع پروژه (راه‌اندازی، بازطراحی یا اتصال سرویس‌ها)</span>
							</li>
							<li class="flex items-center gap-2.5">
								<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۲</span>
								<span>تحلیل وضعیت فروشگاه فعلی یا نیازمندی‌های فروشگاه جدید</span>
							</li>
							<li class="flex items-center gap-2.5">
								<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-amber-500/10 font-bold text-amber-300">۳</span>
								<span>ارائه پیشنهاد ساختار فنی، زمان‌بندی و برآورد هزینه</span>
							</li>
						</ul>
					</div>

					<?php if ( $website_url || $support_url || $portfolio_url || $contact_url ) : ?>
						<nav aria-label="لینک‌های مرتبط" class="mt-8 flex flex-wrap gap-2 border-t border-white/10 pt-7 text-xs text-neutral-400">
							<?php if ( $website_url ) : ?>
								<a href="<?php echo esc_url( $website_url ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">طراحی سایت</a>
							<?php endif; ?>
							<?php if ( $support_url ) : ?>
								<a href="<?php echo esc_url( $support_url ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">پشتیبانی وردپرس</a>
							<?php endif; ?>
							<?php if ( $portfolio_url ) : ?>
								<a href="<?php echo esc_url( $portfolio_url ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">نمونه‌کارها</a>
							<?php endif; ?>
							<?php if ( $contact_url ) : ?>
								<a href="<?php echo esc_url( $contact_url ); ?>" class="rounded-lg border border-white/10 bg-white/[0.02] px-3 py-1.5 transition hover:border-amber-400/40 hover:text-amber-300">ارتباط با رومونت</a>
							<?php endif; ?>
						</nav>
					<?php endif; ?>
				</div>

				<div class="lg:col-span-7">
					<form xyz-on:submit.prevent="submitWooCommerceRequest()" class="relative overflow-hidden rounded-2xl border border-white/10 bg-neutral-900/75 shadow-2xl">
						<div class="h-1 w-full bg-gradient-to-l from-amber-500 via-amber-400/60 to-transparent" aria-hidden="true"></div>

						<div class="flex items-center justify-between border-b border-white/10 px-6 py-4 sm:px-8">
							<span class="text-sm font-bold text-white">فرم ثبت درخواست توسعه ووکامرس</span>
							<span class="text-[11px] font-medium text-neutral-400">فیلدهای ستاره‌دار (*) الزامی هستند</span>
						</div>

						<div class="p-6 sm:p-8">
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

								<label class="block text-sm font-medium text-neutral-200">
									<span>نام کسب‌وکار <span class="text-amber-400">*</span></span>
									<input
										type="text"
										xyz-model="businessName"
										required
										placeholder="نام برند یا فروشگاه شما"
										class="mt-2 w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-sm text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
									>
								</label>

								<div class="grid gap-5 sm:grid-cols-2">
									<label class="block text-sm font-medium text-neutral-200">
										<span>فروشگاه فعال دارید؟ <span class="text-amber-400">*</span></span>
										<div class="relative mt-2">
											<select
												xyz-model="activeStore"
												class="w-full appearance-none rounded-xl border border-white/15 bg-[#11131c] py-3 pl-10 pr-4 text-sm text-white outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
											>
												<option value="yes">بله</option>
												<option value="no">خیر</option>
											</select>
											<svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
												<path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
											</svg>
										</div>
									</label>

									<label class="block text-sm font-medium text-neutral-200">
										<span>نوع پروژه <span class="text-amber-400">*</span></span>
										<div class="relative mt-2">
											<select
												xyz-model="projectType"
												class="w-full appearance-none rounded-xl border border-white/15 bg-[#11131c] py-3 pl-10 pr-4 text-sm text-white outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
											>
												<option>راه‌اندازی فروشگاه جدید</option>
												<option>بازطراحی فروشگاه</option>
												<option>توسعه امکانات ووکامرس</option>
												<option>رفع مشکلات فروشگاه</option>
												<option>اتصال سرویس‌های خارجی</option>
											</select>
											<svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
												<path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
											</svg>
										</div>
									</label>
								</div>

								<label class="block text-sm font-medium text-neutral-200">
									<span>آدرس سایت <span class="text-xs font-normal text-neutral-400">(اختیاری)</span></span>
									<input
										type="url"
										xyz-model="siteUrl"
										dir="ltr"
										placeholder="https://example.com"
										class="mt-2 w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-left text-sm text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
									>
								</label>

								<label class="block text-sm font-medium text-neutral-200">
									<span>توضیحات پروژه <span class="text-amber-400">*</span></span>
									<textarea
										xyz-model="notes"
										required
										rows="5"
										placeholder="درباره نوع محصولات، امکانات موردنیاز یا سرویس‌هایی که قصد اتصال به فروشگاه دارید بنویسید..."
										class="mt-2 w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-sm leading-7 text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"
									></textarea>
								</label>

								<div xyz-show="submitError" class="flex items-start gap-2.5 rounded-xl border border-rose-500/30 bg-rose-500/10 px-4 py-3 text-sm leading-6 text-rose-200" style="display:none" role="alert">
									<svg class="mt-0.5 h-4 w-4 shrink-0 text-rose-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
										<circle cx="12" cy="12" r="10" />
										<path stroke-linecap="round" d="M12 8v4m0 4h.01" />
									</svg>
									<p xyz-text="submitError"></p>
								</div>

								<button
									type="submit"
									xyz-bind:disabled="isSubmitting"
									class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-amber-500 px-6 text-sm font-bold text-black transition hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-400/60 disabled:cursor-not-allowed disabled:opacity-70"
								>
									<span xyz-show="!isSubmitting" class="inline-flex items-center gap-2">
										<span>ثبت درخواست طراحی فروشگاه</span>
										<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 6-6-6 6-6" />
										</svg>
									</span>
									<span xyz-show="isSubmitting" class="inline-flex items-center gap-2" style="display:none">
										<svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
											<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
											<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v3a5 5 0 0 0-5 5H4Z"></path>
										</svg>
										<span>در حال ارسال...</span>
									</span>
								</button>
							</div>

							<div xyz-show="submitSuccess" class="py-10 text-center" style="display:none">
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
</main>

<script>
	document.querySelectorAll( '.rm-faq-summary' ).forEach(
		( summary ) => {
			summary.addEventListener(
				'click',
				( event ) => {
					const details = summary.parentElement;

					if ( ! ( details instanceof HTMLDetailsElement ) ) {
						return;
					}

					event.preventDefault();
					details.open = ! details.open;
				}
			);
		}
	);
</script>

<script type="application/ld+json">
<?php
echo wp_json_encode(
	array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => array_map(
			static function ( $question, $answer ) {
				return array(
					'@type'          => 'Question',
					'name'           => $question,
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $answer,
					),
				);
			},
			array_keys( $faqs ),
			array_values( $faqs )
		),
	),
	JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
);
?>
</script>

<?php get_footer(); ?>
<?php
/**
 * Template Name: درباره رومونت
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

get_header();
?>

<style>
	/* Scoped theme-aware tokens & surface styles (Dark + html.light compatible) */
	.rm-about-page {
		overflow-x: clip;
		background-color: var(--bg-main, #08090d);
		color: var(--text-primary, #f3f4f6);
		--rm-band-alt: rgba(255, 255, 255, 0.02);
		--rm-surface-glass: linear-gradient(180deg, rgba(255, 255, 255, 0.035) 0%, rgba(255, 255, 255, 0.012) 100%);
		--rm-card-shadow: 0 20px 45px -26px rgba(0, 0, 0, 0.75);
		--rm-gold-soft: rgba(245, 158, 11, 0.1);
		--rm-btn-primary-text: #08090d;
		--rm-btn-secondary-bg: rgba(255, 255, 255, 0.03);
		--rm-btn-secondary-hover: rgba(255, 255, 255, 0.07);
	}

	html.light .rm-about-page {
		--rm-band-alt: rgba(15, 23, 42, 0.03);
		--rm-surface-glass: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 255, 255, 0.84) 100%);
		--rm-card-shadow: 0 18px 38px -22px rgba(15, 23, 42, 0.12);
		--rm-gold-soft: rgba(217, 119, 6, 0.12);
		--rm-btn-primary-text: #0f172a;
		--rm-btn-secondary-bg: rgba(255, 255, 255, 0.78);
		--rm-btn-secondary-hover: #ffffff;
	}

	.rm-about-page .rm-grid-bg {
		background-image:
			linear-gradient(to left, var(--grid-line, rgba(255, 255, 255, 0.035)) 1px, transparent 1px),
			linear-gradient(to bottom, var(--grid-line, rgba(255, 255, 255, 0.035)) 1px, transparent 1px);
		background-size: 52px 52px;
		mask-image: radial-gradient(ellipse 85% 75% at 50% 20%, #000 35%, transparent 100%);
		-webkit-mask-image: radial-gradient(ellipse 85% 75% at 50% 20%, #000 35%, transparent 100%);
	}

	.rm-about-page .rm-band-surface {
		background-color: var(--rm-band-alt);
		border-top: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		border-bottom: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
	}

	.rm-about-page .rm-card {
		background-color: var(--bg-card, #11131c);
		background-image: var(--rm-surface-glass);
		border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		transition: background-color 0.25s ease, border-color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
	}

	.rm-about-page .rm-card-interactive:hover {
		background-color: var(--bg-card-hover, #161a26);
		border-color: var(--border-glow, rgba(245, 158, 11, 0.25));
		box-shadow: var(--rm-card-shadow);
	}

	.rm-about-page .rm-cta-banner {
		background-color: var(--bg-card, #11131c);
		background-image: radial-gradient(100% 100% at 50% 0%, var(--rm-gold-soft) 0%, transparent 65%);
		border: 1px solid var(--border-glow, rgba(245, 158, 11, 0.25));
		box-shadow: var(--rm-card-shadow);
	}

	.rm-about-page .rm-text-primary { color: var(--text-primary, #f3f4f6); }
	.rm-about-page .rm-text-secondary { color: var(--text-secondary, #9ca3af); }
	.rm-about-page .rm-text-muted { color: var(--text-muted, #6b7280); }
	.rm-about-page .rm-text-gold { color: var(--accent-gold, #f59e0b); }
	.rm-about-page .rm-border-subtle { border-color: var(--border-subtle, rgba(255, 255, 255, 0.08)); }

	.rm-about-page .rm-pill-gold {
		background-color: var(--rm-gold-soft);
		border: 1px solid var(--border-glow, rgba(245, 158, 11, 0.25));
		color: var(--accent-gold, #f59e0b);
	}

	.rm-about-page .rm-btn-primary {
		background-color: var(--accent-gold, #f59e0b);
		color: var(--rm-btn-primary-text);
		transition: filter 0.2s ease, transform 0.2s ease;
	}
	.rm-about-page .rm-btn-primary:hover {
		filter: brightness(1.06);
	}
	.rm-about-page .rm-btn-primary:focus-visible {
		outline: 2px solid var(--accent-gold, #f59e0b);
		outline-offset: 3px;
	}

	.rm-about-page .rm-btn-secondary {
		background-color: var(--rm-btn-secondary-bg);
		border: 1px solid var(--border-subtle, rgba(255, 255, 255, 0.08));
		color: var(--text-primary, #f3f4f6);
		transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
	}
	.rm-about-page .rm-btn-secondary:hover {
		background-color: var(--rm-btn-secondary-hover);
		border-color: var(--border-glow, rgba(245, 158, 11, 0.25));
		color: var(--accent-gold, #f59e0b);
	}

	@media (prefers-reduced-motion: reduce) {
		.rm-about-page *,
		.rm-about-page *::before,
		.rm-about-page *::after {
			animation-duration: 0.01ms !important;
			animation-iteration-count: 1 !important;
			transition-duration: 0.01ms !important;
			scroll-behavior: auto !important;
		}
	}
</style>

<main class="rm-about-page min-h-screen pb-20 antialiased" dir="rtl">

	<!-- 1. Hero Section -->
	<section class="relative overflow-hidden border-b rm-border-subtle">
		<div class="rm-grid-bg pointer-events-none absolute inset-0"></div>
		<div class="pointer-events-none absolute -top-28 right-1/4 h-80 w-80 rounded-full opacity-20 blur-[110px]" style="background-color: var(--accent-gold, #f59e0b);"></div>

		<div class="relative mx-auto max-w-7xl px-4 pb-16 pt-12 sm:px-6 sm:pb-24 sm:pt-20 lg:px-8">
			<div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-12">
				<div class="lg:col-span-7">
					<span class="rm-pill-gold inline-flex items-center gap-2 rounded-full px-3.5 py-1.5 text-xs font-semibold sm:text-sm">
						<span class="h-1.5 w-1.5 rounded-full" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
						<span>رومونت</span>
					</span>

					<h1 class="rm-text-primary mt-6 text-3xl font-extrabold leading-[1.38] tracking-tight sm:text-5xl sm:leading-[1.28] lg:text-[3.35rem]">
						درباره رومونت
					</h1>

					<p class="rm-text-primary mt-4 text-lg font-semibold opacity-90 sm:text-2xl">
						همراه کسب‌وکار شما در مسیر رشد دیجیتال
					</p>

					<p class="rm-text-secondary mt-5 max-w-2xl text-base leading-8 sm:text-lg">
						رومونت با تمرکز بر طراحی و توسعه وب، برنامه‌نویسی وردپرس و ارائه راهکارهای دیجیتال، به کسب‌وکارها کمک می‌کند حضور حرفه‌ای‌تری در فضای آنلاین داشته باشند.
					</p>

					<div class="mt-9 flex flex-col gap-3.5 sm:flex-row sm:items-center">
						<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="rm-btn-primary group inline-flex min-h-12 w-full items-center justify-center gap-2.5 rounded-xl px-7 text-sm font-bold sm:w-auto">
							<span>مشاهده خدمات</span>
							<svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M19 12H5" />
								<path d="m12 19-7-7 7-7" />
							</svg>
						</a>
						<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="rm-btn-secondary inline-flex min-h-12 w-full items-center justify-center rounded-xl px-7 text-sm font-semibold sm:w-auto">
							درخواست مشاوره
						</a>
					</div>
				</div>

				<!-- Editorial Brand Snapshot -->
				<aside class="lg:col-span-5" aria-label="حوزه‌های تمرکز رومونت">
					<div class="rm-card rounded-2xl p-6 sm:p-7">
						<div class="flex items-center justify-between border-b rm-border-subtle pb-4">
							<p class="rm-text-primary text-sm font-bold">تمرکز فنی در پروژه‌ها</p>
							<span class="rm-text-gold font-mono text-xs font-semibold" dir="ltr">STUDIO</span>
						</div>
						<ul class="mt-5 space-y-3">
							<li class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
								<span class="rm-text-primary text-sm font-semibold">طراحی و پیاده‌سازی وب</span>
								<span class="rm-text-gold font-mono text-xs">۰۱</span>
							</li>
							<li class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
								<span class="rm-text-primary text-sm font-semibold">توسعه اختصاصی وردپرس و ووکامرس</span>
								<span class="rm-text-gold font-mono text-xs">۰۲</span>
							</li>
							<li class="flex items-center justify-between rounded-xl border rm-border-subtle px-4 py-3" style="background-color: var(--rm-band-alt);">
								<span class="rm-text-primary text-sm font-semibold">پشتیبانی و بهبود مستمر</span>
								<span class="rm-text-gold font-mono text-xs">۰۳</span>
							</li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</section>

	<!-- 2. Approach Section -->
	<section class="rm-band-surface">
		<div class="mx-auto grid max-w-7xl gap-12 px-4 py-20 sm:px-6 lg:grid-cols-12 lg:items-start lg:px-8 lg:py-24">
			<div class="lg:col-span-5 lg:sticky lg:top-28">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
					<span>رویکرد رومونت</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
					راهکارهای دیجیتال روشن و قابل توسعه
				</h2>
			</div>

			<div class="space-y-5 lg:col-span-7">
				<div class="rm-card rounded-2xl p-6 sm:p-8">
					<div class="rm-text-secondary space-y-5 text-sm leading-8 sm:text-base">
						<p>رومونت در زمینه طراحی سایت، توسعه وردپرس، ساخت فروشگاه اینترنتی و برنامه‌نویسی اختصاصی فعالیت می‌کند.</p>
						<p>تمرکز ما روی شناخت مسئله واقعی کسب‌وکار، انتخاب راهکار متناسب و ساخت تجربه‌ای است که در ادامه مسیر نیز قابل مدیریت و توسعه باشد.</p>
						<p>از طراحی اولیه تا نگهداری و بهبود فنی، تلاش می‌کنیم ارتباط شفاف و مسیر اجرایی قابل فهمی برای هر پروژه ایجاد کنیم.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 3. Capabilities / Services Bento Grid (Balanced 2 + 3 layout for 5 items) -->
	<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
		<div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
			<div class="max-w-2xl">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
					<span>توانمندی‌های ما</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold sm:text-4xl">خدمات رومونت</h2>
			</div>
			<p class="rm-text-secondary max-w-md text-sm leading-7">
				مجموعه خدمات تخصصی برای شکل‌گیری، توسعه و نگهداری زیرساخت دیجیتال کسب‌وکار شما.
			</p>
		</div>

		<div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-6">
			<?php
			$services = array(
				array(
					'num'         => '۰۱',
					'title'       => 'طراحی سایت',
					'description' => 'وب‌سایت‌های شرکتی و خدماتی متناسب با نیاز کسب‌وکار.',
					'url'         => home_url( '/site-design-pricing/' ),
					'span'        => 'lg:col-span-3',
					'icon'        => '<path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z"/><path d="m4 12 8 4.5 8-4.5"/><path d="m4 16.5 8 4.5 8-4.5"/>',
				),
				array(
					'num'         => '۰۲',
					'title'       => 'پشتیبانی و نگهداری وردپرس',
					'description' => 'نگهداری، رفع خطا و بهبود فنی سایت‌های وردپرسی.',
					'url'         => home_url( '/maintenance-pricing/' ),
					'span'        => 'lg:col-span-3',
					'icon'        => '<path d="M12 3 20 7v5c0 4.8-3.3 7.7-8 9-4.7-1.3-8-4.2-8-9V7l8-4Z"/><path d="m9 12 2 2 4-4"/>',
				),
				array(
					'num'         => '۰۳',
					'title'       => 'طراحی و توسعه فروشگاه اینترنتی',
					'description' => 'راه‌اندازی و توسعه فروشگاه‌های ووکامرسی.',
					'url'         => home_url( '/site-design-pricing/' ),
					'span'        => 'lg:col-span-2',
					'icon'        => '<circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 8H6"/>',
				),
				array(
					'num'         => '۰۴',
					'title'       => 'توسعه اختصاصی افزونه و قالب',
					'description' => 'ساخت امکانات اختصاصی برای وردپرس و ووکامرس.',
					'url'         => home_url( '/shop/' ),
					'span'        => 'lg:col-span-2',
					'icon'        => '<path d="m8 9-3 3 3 3"/><path d="m16 9 3 3-3 3"/><path d="m14 5-4 14"/>',
				),
				array(
					'num'         => '۰۵',
					'title'       => 'راهکارهای پیامکی و اتوماسیون',
					'description' => 'مدیریت پیامک کسب‌وکار با پلن‌های پنل پیامکی.',
					'url'         => home_url( '/sms-pricing/' ),
					'span'        => 'md:col-span-2 lg:col-span-2',
					'icon'        => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
				),
			);
			foreach ( $services as $service ) :
			?>
				<a href="<?php echo esc_url( $service['url'] ); ?>" class="rm-card rm-card-interactive group flex flex-col justify-between rounded-2xl p-6 transition duration-300 hover:-translate-y-1 <?php echo esc_attr( $service['span'] ); ?>">
					<div>
						<div class="flex items-center justify-between">
							<span class="flex h-11 w-11 items-center justify-center rounded-xl border rm-border-subtle rm-text-gold" style="background-color: var(--rm-gold-soft);">
								<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $service['icon']; ?></svg>
							</span>
							<span class="rm-text-muted font-mono text-xs font-semibold"><?php echo esc_html( $service['num'] ); ?></span>
						</div>
						<h3 class="rm-text-primary mt-6 text-lg font-bold leading-7 transition group-hover:text-[var(--accent-gold)]">
							<?php echo esc_html( $service['title'] ); ?>
						</h3>
						<p class="rm-text-secondary mt-2.5 text-sm leading-7">
							<?php echo esc_html( $service['description'] ); ?>
						</p>
					</div>

					<div class="mt-6 flex items-center justify-between border-t rm-border-subtle pt-4">
						<span class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
							<span>مشاهده بیشتر</span>
							<svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M19 12H5" />
								<path d="m12 19-7-7 7-7" />
							</svg>
						</span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- 4. Collaboration Principles -->
	<section class="rm-band-surface">
		<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
			<div class="grid gap-12 lg:grid-cols-12 lg:items-start">
				<div class="lg:col-span-5 lg:sticky lg:top-28">
					<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
						<span class="h-px w-6" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
						<span>شیوه همکاری</span>
					</p>
					<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
						اصولی که در هر پروژه دنبال می‌کنیم
					</h2>
				</div>

				<div class="grid gap-4 sm:grid-cols-2 lg:col-span-7">
					<?php
					$principles = array( 'شناخت نیاز واقعی', 'ارائه راهکار متناسب', 'توسعه اصولی', 'شفافیت در همکاری', 'پشتیبانی و همراهی' );
					$total_principles = count( $principles );
					foreach ( $principles as $index => $principle ) :
						$is_last = ( $index === $total_principles - 1 );
					?>
						<article class="rm-card flex items-center justify-between rounded-2xl p-5 sm:p-6 <?php echo $is_last ? 'sm:col-span-2' : ''; ?>">
							<div class="flex items-center gap-4">
								<span class="rm-pill-gold flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-xs font-bold">
									۰<?php echo esc_html( $index + 1 ); ?>
								</span>
								<h3 class="rm-text-primary text-base font-bold leading-7">
									<?php echo esc_html( $principle ); ?>
								</h3>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- 5. Why Romonet Editorial Synthesis -->
	<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
		<div class="rm-card mx-auto max-w-4xl rounded-3xl p-8 text-center sm:p-12">
			<p class="rm-text-gold text-xs font-semibold sm:text-sm">چرا رومونت؟</p>
			<h2 class="rm-text-primary mt-3 text-2xl font-bold leading-[1.45] sm:text-4xl">
				یک مسیر فنی منسجم برای رشد آنلاین
			</h2>
			<p class="rm-text-secondary mx-auto mt-5 max-w-2xl text-sm leading-8 sm:text-base">
				ترکیب طراحی وب، توسعه وردپرس، برنامه‌نویسی اختصاصی و پشتیبانی فنی کمک می‌کند تصمیم‌های پروژه از ابتدا با نیازهای واقعی کسب‌وکار هماهنگ باشند و در ادامه نیز امکان بهبود و توسعه وجود داشته باشد.
			</p>
		</div>
	</section>

	<!-- 6. Bottom CTA -->
	<section class="px-4 sm:px-6 lg:px-8">
		<div class="rm-cta-banner relative mx-auto max-w-6xl overflow-hidden rounded-3xl px-6 py-14 text-center sm:px-12 sm:py-16">
			<div class="rm-grid-bg pointer-events-none absolute inset-0 opacity-60"></div>
			<div class="relative mx-auto max-w-2xl">
				<h2 class="rm-text-primary text-3xl font-extrabold leading-[1.4] sm:text-4xl">
					آماده همکاری هستیم؟
				</h2>
				<p class="rm-text-secondary mx-auto mt-5 max-w-xl text-sm leading-8 sm:text-base">
					اگر برای کسب‌وکار خود به طراحی سایت، راه‌اندازی فروشگاه اینترنتی، توسعه اختصاصی وردپرس یا پشتیبانی فنی نیاز دارید، خوشحال می‌شویم درباره پروژه شما بیشتر بدانیم.
				</p>
				<div class="mt-8 flex flex-col justify-center gap-3.5 sm:flex-row">
					<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="rm-btn-primary inline-flex min-h-12 items-center justify-center rounded-xl px-7 text-sm font-bold">
						درخواست مشاوره
					</a>
					<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="rm-btn-secondary inline-flex min-h-12 items-center justify-center rounded-xl px-7 text-sm font-semibold">
						مشاهده خدمات رومونت
					</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
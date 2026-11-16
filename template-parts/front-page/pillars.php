<?php
/**
 * Services / Pillars section for Front Page
 *
 * @package Romonet_WPStorm
 */
?>
<section id="services" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
	<div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
		<div class="max-w-2xl">
			<p class="inline-flex items-center gap-2 text-xs font-semibold tracking-wide text-amber-400 sm:text-sm">
				<span class="h-px w-6 bg-amber-400/70" aria-hidden="true"></span>
				<span>خدمات رومونت</span>
			</p>
			<h2 class="mt-3 text-3xl font-bold leading-snug tracking-tight text-white sm:text-4xl">
				برای هر مرحله از مسیر دیجیتال شما
			</h2>
		</div>
		<p class="max-w-md text-sm leading-7 text-neutral-400 sm:text-base">
			راهکارهای کاربردی و قابل توسعه، متناسب با نیاز واقعی کسب‌وکار شما.
		</p>
	</div>

	<div class="mt-12 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-12">
		<?php
		$services = array(
			array(
				'num'         => '۰۱',
				'tag'         => 'طراحی و پیاده‌سازی',
				'title'       => 'طراحی سایت',
				'description' => 'طراحی و پیاده‌سازی وب‌سایت‌های شرکتی، خدماتی و اختصاصی متناسب با نیاز کسب‌وکار.',
				'url'         => home_url( '/site-design-pricing' ),
				'span'        => 'lg:col-span-7',
				'featured'    => true,
				'icon'        => '<path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z"/><path d="m4 12 8 4.5 8-4.5"/><path d="m4 16.5 8 4.5 8-4.5"/>',
			),
			array(
				'num'         => '۰۲',
				'tag'         => 'نگهداری و امنیت',
				'title'       => 'پشتیبانی وردپرس',
				'description' => 'نگهداری، رفع خطا، بهینه‌سازی، امنیت و پشتیبانی فنی وب‌سایت‌های وردپرسی.',
				'url'         => home_url( '/maintenance-pricing' ),
				'span'        => 'lg:col-span-5',
				'featured'    => false,
				'icon'        => '<path d="M12 3 20 7v5c0 4.8-3.3 7.7-8 9-4.7-1.3-8-4.2-8-9V7l8-4Z"/><path d="m9 12 2 2 4-4"/>',
			),
			array(
				'num'         => '۰۳',
				'tag'         => 'فروش آنلاین و ووکامرس',
				'title'       => 'طراحی و توسعه فروشگاه اینترنتی',
				'description' => 'راه‌اندازی و توسعه فروشگاه‌های اینترنتی با ووکامرس، از امکانات پایه تا قابلیت‌های اختصاصی.',
				'url'         => home_url( '/site-design-pricing' ),
				'span'        => 'lg:col-span-5',
				'featured'    => false,
				'icon'        => '<circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 8H6"/>',
			),
			array(
				'num'         => '۰۴',
				'tag'         => 'مهندسی و سفارشی‌سازی',
				'title'       => 'توسعه اختصاصی افزونه و قالب',
				'description' => 'برنامه‌نویسی و توسعه امکانات اختصاصی برای وردپرس و ووکامرس.',
				'url'         => home_url( '/shop' ),
				'span'        => 'lg:col-span-7',
				'featured'    => true,
				'icon'        => '<path d="m8 9-3 3 3 3"/><path d="m16 9 3 3-3 3"/><path d="m14 5-4 14"/>',
			),
		);

		foreach ( $services as $service ) :
		?>
			<a href="<?php echo esc_url( $service['url'] ); ?>" class="rm-surface-card group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-white/10 p-6 transition duration-300 hover:-translate-y-1 hover:border-amber-400/50 focus:outline-none focus:ring-2 focus:ring-amber-400/60 focus:ring-offset-2 focus:ring-offset-[#08090d] sm:p-8 <?php echo esc_attr( $service['span'] ); ?>">
				<!-- Subtle corner index watermark -->
				<span class="pointer-events-none absolute left-6 top-5 font-mono text-xs font-semibold text-white/25 transition group-hover:text-amber-400/60" aria-hidden="true">
					<?php echo esc_html( $service['num'] ); ?>
				</span>

				<div>
					<div class="flex items-center gap-3.5">
						<span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-amber-400/20 bg-amber-500/10 text-amber-400 transition duration-300 group-hover:border-amber-400/40 group-hover:bg-amber-500/15">
							<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $service['icon']; ?></svg>
						</span>
						<span class="rounded-full border border-white/10 bg-white/[0.03] px-3 py-1 text-xs font-medium text-neutral-300">
							<?php echo esc_html( $service['tag'] ); ?>
						</span>
					</div>

					<h3 class="mt-7 text-xl font-bold leading-8 text-white transition group-hover:text-amber-300">
						<?php echo esc_html( $service['title'] ); ?>
					</h3>

					<p class="mt-3 max-w-xl text-sm leading-7 text-neutral-400 sm:text-[15px]">
						<?php echo esc_html( $service['description'] ); ?>
					</p>
				</div>

				<div class="mt-8 flex items-center justify-between border-t border-white/[0.07] pt-5">
					<span class="inline-flex items-center gap-2 text-sm font-semibold text-amber-400 transition group-hover:text-amber-300">
						<span>جزئیات خدمت</span>
						<svg class="h-4 w-4 transition-transform duration-200 group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M19 12H5" />
							<path d="m12 19-7-7 7-7" />
						</svg>
					</span>
					<span class="h-1.5 w-1.5 rounded-full bg-white/15 transition group-hover:bg-amber-400" aria-hidden="true"></span>
				</div>
			</a>
		<?php endforeach; ?>
	</div>
</section>
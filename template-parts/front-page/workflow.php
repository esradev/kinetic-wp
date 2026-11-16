<?php
/**
 * Workflow section for Front Page
 *
 * @package Romonet_WPStorm
 */
?>
<section id="workflow" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
	<div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
		<div class="max-w-2xl">
			<p class="inline-flex items-center gap-2 text-xs font-semibold tracking-wide text-amber-400 sm:text-sm">
				<span class="h-px w-6 bg-amber-400/70" aria-hidden="true"></span>
				<span>فرآیند همکاری</span>
			</p>
			<h2 class="mt-3 text-3xl font-bold leading-snug tracking-tight text-white sm:text-4xl">
				مسیر پروژه، روشن و مرحله‌به‌مرحله
			</h2>
		</div>
		<p class="max-w-md text-sm leading-7 text-neutral-400">
			از اولین گفتگو تا تحویل و پشتیبانی، هر مرحله با چارچوب مشخص و ارتباط مستقیم پیش می‌رود.
		</p>
	</div>

	<?php
	$steps = array(
		array(
			'num'   => '۰۱',
			'title' => 'شناخت نیازها',
			'desc'  => 'بررسی اهداف، ساختار و نیازمندی‌های واقعی کسب‌وکار شما.',
		),
		array(
			'num'   => '۰۲',
			'title' => 'بررسی و پیشنهاد راهکار',
			'desc'  => 'تعیین معماری فنی، دامنه کار و مسیر مناسب اجرا.',
		),
		array(
			'num'   => '۰۳',
			'title' => 'برنامه‌ریزی و توسعه',
			'desc'  => 'طراحی و پیاده‌سازی گام‌به‌گام با ساختار تمیز و شفاف.',
		),
		array(
			'num'   => '۰۴',
			'title' => 'تست و تضمین کیفیت',
			'desc'  => 'ارزیابی عملکرد، سازگاری نمایش و جزئیات فنی پیش از انتشار.',
		),
		array(
			'num'   => '۰۵',
			'title' => 'تحویل و پشتیبانی',
			'desc'  => 'راه‌اندازی نهایی و همراهی فنی برای پایداری و بهبود مستمر.',
		),
	);
	?>

	<div class="relative mt-14">
		<!-- Desktop horizontal blueprint rail -->
		<div class="pointer-events-none absolute left-10 right-10 top-6 hidden h-px bg-gradient-to-l from-amber-400/50 via-white/15 to-amber-400/20 lg:block" aria-hidden="true"></div>

		<!-- Mobile vertical RTL rail -->
		<div class="pointer-events-none absolute bottom-6 right-5 top-6 w-px bg-gradient-to-b from-amber-400/50 via-white/15 to-transparent lg:hidden" aria-hidden="true"></div>

		<ol class="grid grid-cols-1 gap-6 lg:grid-cols-5 lg:gap-4">
			<?php foreach ( $steps as $index => $step ) : ?>
				<li class="group relative pr-14 lg:pr-0">
					<!-- Step Node Badge -->
					<div class="absolute right-0 top-0 flex h-10 w-10 items-center justify-center rounded-xl border border-amber-400/35 bg-[#08090d] text-xs font-bold text-amber-400 shadow-sm transition duration-300 group-hover:border-amber-400 group-hover:bg-amber-500 group-hover:text-neutral-950 lg:relative lg:right-auto lg:top-auto lg:h-12 lg:w-12 lg:text-sm">
						<?php echo esc_html( $step['num'] ); ?>
					</div>

					<!-- Step Content Card -->
					<div class="rounded-2xl border border-white/10 bg-white/[0.02] p-5 transition duration-300 group-hover:border-amber-400/35 group-hover:bg-white/[0.04] lg:mt-6 lg:min-h-[168px]">
						<span class="text-[11px] font-medium text-neutral-500">مرحله <?php echo esc_html( $step['num'] ); ?></span>
						<h3 class="mt-1.5 text-base font-bold leading-7 text-white transition group-hover:text-amber-300">
							<?php echo esc_html( $step['title'] ); ?>
						</h3>
						<p class="mt-2.5 text-xs leading-6 text-neutral-400 sm:text-sm sm:leading-7">
							<?php echo esc_html( $step['desc'] ); ?>
						</p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
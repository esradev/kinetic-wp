<?php
/**
 * Maintenance Pricing Factors & Engagement Models section
 *
 * @package Romonet_WPStorm
 */
?>

<!-- 1. Factors Affecting Price -->
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
	<div class="max-w-2xl">
		<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
			<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
			<span>شفافیت در انتخاب</span>
		</p>
		<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-snug sm:text-4xl">
			چه عواملی بر قیمت پشتیبانی سایت تأثیر می‌گذارند؟
		</h2>
	</div>

	<div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
		<?php
		$factors = array(
			'حجم و پیچیدگی سایت' => 'تعداد صفحات، محصولات، کاربران و وابستگی‌های فنی روی حجم نگهداری اثر دارد.',
			'شرکتی یا فروشگاهی بودن سایت' => 'فروشگاه‌ها معمولاً به بررسی دقیق‌تر پرداخت، سفارش و فرایندهای خرید نیاز دارند.',
			'افزونه‌ها و سرویس‌های متصل' => 'تعداد و حساسیت افزونه‌ها، APIها و سرویس‌های بیرونی باید در محدوده کار دیده شود.',
			'حساسیت اطلاعات و تراکنش‌ها' => 'سایت‌های دارای داده حساس یا پرداخت آنلاین به بررسی و مراقبت متناسب نیاز دارند.',
			'تعداد درخواست‌های ماهانه' => 'حجم درخواست‌های پشتیبانی و تغییرات کوچک، سطح همکاری را مشخص می‌کند.',
			'سطح پاسخ‌گویی موردنیاز' => 'زمان پاسخ‌گویی و روش ارتباط باید در قرارداد شفاف و متناسب با نیاز پروژه تعیین شود.',
		);
		$factor_index = 0;
		foreach ( $factors as $title => $description ) :
			$factor_index++;
		?>
			<article class="rm-card rounded-2xl p-6">
				<div class="flex items-start justify-between gap-4">
					<h3 class="rm-text-primary text-base font-bold sm:text-lg"><?php echo esc_html( $title ); ?></h3>
					<span class="rm-text-gold font-mono text-xs font-semibold">۰<?php echo esc_html( $factor_index ); ?></span>
				</div>
				<p class="rm-text-secondary mt-3 text-sm leading-7"><?php echo esc_html( $description ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<!-- 2. Monthly vs On-Demand Support Comparison -->
<section class="rm-band-surface">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
		<div class="grid gap-10 lg:grid-cols-12 lg:items-center">
			<div class="lg:col-span-5">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
					<span>انتخاب مدل همکاری</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
					پشتیبانی ماهانه بهتر است یا رفع مشکل موردی؟
				</h2>
				<p class="rm-text-secondary mt-5 text-sm leading-8 sm:text-base">
					انتخاب مناسب به اهمیت سایت، تکرار نیازهای فنی و سطح رسیدگی مورد انتظار شما بستگی دارد.
				</p>
			</div>

			<div class="grid gap-5 sm:grid-cols-2 lg:col-span-7">
				<article class="rm-card rounded-2xl p-6 sm:p-7">
					<div class="flex items-center justify-between border-b rm-border-subtle pb-4">
						<h3 class="rm-text-primary text-lg font-bold">پشتیبانی موردی</h3>
						<span class="rm-text-muted text-xs font-medium">درخواست تکی</span>
					</div>
					<ul class="mt-5 space-y-3 text-sm leading-7">
						<li class="rm-text-secondary flex items-start gap-2.5"><span class="rm-text-muted font-bold" aria-hidden="true">•</span><span>مناسب مشکلات مشخص و محدود</span></li>
						<li class="rm-text-secondary flex items-start gap-2.5"><span class="rm-text-muted font-bold" aria-hidden="true">•</span><span>پرداخت بر اساس درخواست یا پروژه</span></li>
						<li class="rm-text-secondary flex items-start gap-2.5"><span class="rm-text-muted font-bold" aria-hidden="true">•</span><span>بدون برنامه نگهداری مستمر</span></li>
						<li class="rm-text-secondary flex items-start gap-2.5"><span class="rm-text-muted font-bold" aria-hidden="true">•</span><span>مناسب سایت‌هایی که نیاز دائمی ندارند</span></li>
					</ul>
				</article>

				<article class="rm-card-featured rounded-2xl p-6 sm:p-7">
					<div class="flex items-center justify-between border-b rm-border-subtle pb-4">
						<h3 class="rm-text-primary text-lg font-bold">پشتیبانی ماهانه</h3>
						<span class="rm-pill-gold rounded-full px-2.5 py-0.5 text-xs font-semibold">مستمر</span>
					</div>
					<ul class="mt-5 space-y-3 text-sm leading-7">
						<li class="rm-text-secondary flex items-start gap-2.5"><span class="rm-text-gold font-bold" aria-hidden="true">✓</span><span>رسیدگی مستمر به وضعیت سایت</span></li>
						<li class="rm-text-secondary flex items-start gap-2.5"><span class="rm-text-gold font-bold" aria-hidden="true">✓</span><span>برنامه منظم نگهداری</span></li>
						<li class="rm-text-secondary flex items-start gap-2.5"><span class="rm-text-gold font-bold" aria-hidden="true">✓</span><span>پیگیری بهتر مشکلات</span></li>
						<li class="rm-text-secondary flex items-start gap-2.5"><span class="rm-text-gold font-bold" aria-hidden="true">✓</span><span>مناسب سایت‌های مهم برای کسب‌وکار</span></li>
					</ul>
				</article>
			</div>
		</div>
	</div>
</section>
<?php
/**
 * Maintenance Pricing Content sections (Short answer & Scope of services)
 *
 * @package Romonet_WPStorm
 */
?>

<!-- 1. Short Answer -->
<section class="rm-band-surface">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
		<div class="grid gap-12 lg:grid-cols-12 lg:items-start">
			<div class="lg:col-span-5 lg:sticky lg:top-28">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
					<span>پاسخ کوتاه</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
					هزینه پشتیبانی سایت چگونه محاسبه می‌شود؟
				</h2>

				<div class="rm-card mt-7 rounded-2xl p-5">
					<p class="rm-text-gold text-xs font-bold">تفاوت نگهداری با توسعه</p>
					<p class="rm-text-secondary mt-2 text-sm leading-7">
						به‌روزرسانی و پایش وضعیت بخشی از نگهداری است؛ اما طراحی قابلیت‌های جدید یا تغییرات بزرگ در چارچوب توسعه جداگانه بررسی می‌شود.
					</p>
				</div>
			</div>

			<div class="space-y-6 lg:col-span-7">
				<div class="rm-text-secondary space-y-4 text-sm leading-8 sm:text-base">
					<p>قیمت پشتیبانی سایت برای همه وب‌سایت‌ها یکسان نیست. نوع و حجم سایت، تعداد افزونه‌ها، پیچیدگی فنی، تعداد درخواست‌ها و سطح پاسخ‌گویی مورد انتظار، محدوده خدمات را مشخص می‌کنند.</p>
					<p>نگهداری دوره‌ای با توسعه مستمر یکسان نیست؛ به‌روزرسانی و بررسی وضعیت سایت بخشی از نگهداری است، اما افزودن قابلیت‌های جدید یا تغییرات بزرگ معمولاً نیازمند توافق جداگانه است.</p>
				</div>

				<div class="rm-card rounded-2xl p-5 sm:p-6">
					<p class="rm-text-primary text-xs font-bold sm:text-sm">پارامترهای تعیین‌کننده محدوده پشتیبانی:</p>
					<ul class="mt-4 grid gap-3 sm:grid-cols-2">
						<?php foreach ( array( 'نوع و حجم سایت', 'تعداد افزونه‌ها و سرویس‌های متصل', 'پیچیدگی فنی', 'تعداد درخواست‌های پشتیبانی', 'بررسی و مراقبت امنیتی', 'سطح پاسخ‌گویی موردنیاز' ) as $item ) : ?>
							<li class="rm-text-secondary flex items-center gap-3 rounded-xl border rm-border-subtle px-3.5 py-2.5 text-sm">
								<span class="h-2 w-2 shrink-0 rounded-full" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
								<span><?php echo esc_html( $item ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 2. Scope of Services -->
<section id="services" class="mx-auto max-w-7xl scroll-mt-24 px-4 py-20 sm:px-6 lg:px-8 lg:py-24">
	<div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
		<div class="max-w-2xl">
			<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
				<span class="h-px w-6" style="background-color: var(--accent-gold);" aria-hidden="true"></span>
				<span>محدوده خدمات</span>
			</p>
			<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-snug sm:text-4xl">
				خدمات پشتیبانی و نگهداری سایت شامل چه مواردی است؟
			</h2>
		</div>
		<p class="rm-text-secondary max-w-md text-sm leading-7">
			محدوده دقیق هر خدمت بر اساس پلن انتخابی و توافق مکتوب مشخص می‌شود.
		</p>
	</div>

	<div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
		<?php
		$services = array(
			array(
				'title' => 'به‌روزرسانی وردپرس',
				'desc'  => 'بررسی و به‌روزرسانی هسته وردپرس با رعایت سازگاری و پایداری سایت.',
				'icon'  => '<path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/>',
			),
			array(
				'title' => 'به‌روزرسانی قالب و افزونه‌ها',
				'desc'  => 'بررسی نسخه‌های جدید و کنترل مشکلات احتمالی پس از به‌روزرسانی.',
				'icon'  => '<path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z"/><path d="m4 12 8 4.5 8-4.5"/><path d="m4 16.5 8 4.5 8-4.5"/>',
			),
			array(
				'title' => 'بررسی امنیت سایت',
				'desc'  => 'بررسی مشکلات امنیتی رایج و ارائه اقدامات اصلاحی در محدوده قرارداد.',
				'icon'  => '<path d="M12 3 20 7v5c0 4.8-3.3 7.7-8 9-4.7-1.3-8-4.2-8-9V7l8-4Z"/><path d="m9 12 2 2 4-4"/>',
			),
			array(
				'title' => 'رفع خطاهای فنی',
				'desc'  => 'بررسی و رفع مشکلات فنی وردپرس، قالب و افزونه‌ها در محدوده توافق‌شده.',
				'icon'  => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76Z"/>',
			),
			array(
				'title' => 'پشتیبان‌گیری',
				'desc'  => 'بررسی وضعیت نسخه‌های پشتیبان و هماهنگی برای تهیه بکاپ مناسب پروژه.',
				'icon'  => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14a9 3 0 0 0 18 0V5"/><path d="M3 12a9 3 0 0 0 18 0"/>',
			),
			array(
				'title' => 'بررسی عملکرد سایت',
				'desc'  => 'بررسی مشکلات رایج سرعت، منابع و عملکرد و ارائه پیشنهادهای بهبود.',
				'icon'  => '<path d="M13 2 3 14h9l-1 8 10-12h-9l1-8z"/>',
			),
			array(
				'title' => 'پشتیبانی و پاسخ‌گویی',
				'desc'  => 'دریافت درخواست‌ها و پیگیری مشکلات فنی در چارچوب قرارداد.',
				'icon'  => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
			),
			array(
				'title' => 'تغییرات و توسعه محدود',
				'desc'  => 'اعمال تغییرات کوچک و مشخص، در صورت پیش‌بینی در پلن پشتیبانی.',
				'icon'  => '<path d="m8 9-3 3 3 3"/><path d="m16 9 3 3-3 3"/><path d="m14 5-4 14"/>',
			),
		);
		foreach ( $services as $index => $service ) :
		?>
			<article class="rm-card rm-card-interactive group rounded-2xl p-6">
				<div class="flex items-center justify-between">
					<span class="flex h-10 w-10 items-center justify-center rounded-xl border rm-border-subtle rm-text-gold" style="background-color: var(--rm-gold-soft);">
						<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $service['icon']; ?></svg>
					</span>
					<span class="rm-text-muted font-mono text-xs">۰<?php echo esc_html( $index + 1 ); ?></span>
				</div>
				<h3 class="rm-text-primary mt-5 text-base font-bold leading-7"><?php echo esc_html( $service['title'] ); ?></h3>
				<p class="rm-text-secondary mt-2 text-sm leading-7"><?php echo esc_html( $service['desc'] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>
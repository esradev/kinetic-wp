<?php
/**
 * SMS & OTP Pricing Transparency Details section
 *
 * @package Romonet_WPStorm
 */
?>
<section class="rm-band-surface">
	<div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
		<div class="grid gap-12 lg:grid-cols-12 lg:items-start">

			<div class="lg:col-span-5 lg:sticky lg:top-28">
				<p class="rm-text-gold inline-flex items-center gap-2 text-xs font-semibold sm:text-sm">
					<span class="h-px w-6" style="background-color: var(--accent-gold, #f59e0b);" aria-hidden="true"></span>
					<span>شفافیت در هزینه‌ها</span>
				</p>
				<h2 class="rm-text-primary mt-3 text-3xl font-bold leading-[1.42] sm:text-4xl">
					نکات مهم درباره هزینه پنل پیامکی
				</h2>
				<p class="rm-text-secondary mt-4 text-sm leading-8">
					مرور این نکات به شما کمک می‌کند تفاوت میان اشتراک ماهانه پنل و هزینه ارسال پیامک اپراتور را به‌وضوح بدانید.
				</p>
			</div>

			<ul class="grid gap-4 sm:grid-cols-2 lg:col-span-7">
				<?php
				$notes = array(
					'مبالغ درج‌شده فقط هزینه اشتراک ماهانه پنل هستند.',
					'اعتبار ارسال پیامک در قیمت اشتراک لحاظ نشده است.',
					'هزینه ارسال پیامک بر اساس تعرفه اپراتور و پنل پیامکی متصل‌شده محاسبه می‌شود.',
					'برای ارسال پیامک باید اعتبار موردنیاز از ارائه‌دهنده پنل پیامکی تهیه شود.',
					'امکانات هر پلن تابع قابلیت‌های واقعی محصول و محدودیت‌های فنی آن است.',
					'قیمت‌ها به تومان هستند.',
				);
				foreach ( $notes as $index => $note ) :
				?>
					<li class="rm-card flex items-start gap-3.5 rounded-2xl p-5">
						<span class="rm-pill-gold flex h-7 w-7 shrink-0 items-center justify-center rounded-lg font-mono text-xs font-bold">
							۰<?php echo esc_html( $index + 1 ); ?>
						</span>
						<span class="rm-text-secondary text-sm leading-7"><?php echo esc_html( $note ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>
	</div>
</section>
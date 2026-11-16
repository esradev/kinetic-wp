<?php
/**
 * WordPress Support FAQ Section & JSON-LD Schema
 *
 * @package Romonet_WPStorm
 */

$faqs = array(
	'پشتیبانی وردپرس شامل چه خدماتی می‌شود؟' => 'بسته به نیاز سایت می‌تواند شامل نگهداری، به‌روزرسانی، رفع خطا، بررسی فنی و توسعه در محدوده توافق‌شده باشد.',
	'آیا برای سایت‌های فروشگاهی ووکامرس هم پشتیبانی ارائه می‌دهید؟' => 'بله، وضعیت فروشگاه و نیازهای ووکامرس در بررسی اولیه مشخص می‌شود.',
	'تفاوت پشتیبانی ماهانه و پشتیبانی موردی چیست؟' => 'پشتیبانی ماهانه برای رسیدگی برنامه‌ریزی‌شده است و پشتیبانی موردی برای یک نیاز یا مشکل مشخص بررسی می‌شود.',
	'آیا می‌توانم فقط برای رفع یک خطای وردپرس درخواست ثبت کنم؟' => 'بله، می‌توانید درخواست موردی برای بررسی و رفع یک خطای مشخص ارسال کنید.',
	'آیا به‌روزرسانی وردپرس و افزونه‌ها هم انجام می‌شود؟' => 'در صورت قرارگرفتن در محدوده خدمت، به‌روزرسانی‌ها با توجه به سازگاری سایت بررسی و انجام می‌شوند.',
	'اگر سایت من دچار مشکل یا از دسترس خارج شود چه کاری باید انجام دهم؟' => 'شرح مشکل و آدرس سایت را ارسال کنید تا وضعیت اولیه بررسی و محدوده اقدام پیشنهادی اعلام شود.',
	'هزینه پشتیبانی وردپرس چگونه محاسبه می‌شود؟' => 'هزینه به وضعیت سایت، حجم نگهداری، نوع درخواست و سطح خدمات موردنیاز بستگی دارد.',
	'آیا امکان توسعه قابلیت‌های جدید در زمان پشتیبانی وجود دارد؟' => 'توسعه قابلیت‌های جدید پس از بررسی جداگانه و مشخص‌شدن محدوده کار قابل برنامه‌ریزی است.',
	'برای شروع همکاری چه اطلاعاتی از سایت لازم است؟' => 'آدرس سایت، نوع درخواست و توضیح مشکل یا نیاز برای بررسی اولیه کافی است؛ دسترسی‌ها فقط در صورت نیاز و به‌صورت امن درخواست می‌شوند.',
	'آیا قبل از شروع پشتیبانی، سایت بررسی می‌شود؟' => 'بله، بررسی اولیه برای شناخت وضعیت سایت و پیشنهاد محدوده مناسب انجام می‌شود.',
);

$faq_numbers = array( '۰۱', '۰۲', '۰۳', '۰۴', '۰۵', '۰۶', '۰۷', '۰۸', '۰۹', '۱۰' );
?>
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
	<style>
		.rm-faq-summary::-webkit-details-marker {
			display: none;
		}
	</style>

	<div class="grid gap-12 lg:grid-cols-12 lg:gap-14">
		<!-- Right Column (RTL): Sticky Heading & Direct Action -->
		<div class="lg:col-span-4">
			<div class="lg:sticky lg:top-24">
				<p class="text-xs font-bold tracking-wider text-amber-400">پاسخ به پرسش‌های رایج</p>
				<h2 class="mt-3 text-3xl font-bold leading-[1.45] text-white sm:text-4xl">
					سؤالات متداول پشتیبانی وردپرس
				</h2>
				<p class="mt-4 text-sm leading-8 text-neutral-400">
					اطلاعات بیشتر درباره نحوه بررسی سایت، تفاوت پشتیبانی موردی و ماهانه و شرایط همکاری.
				</p>

				<div class="mt-8 rounded-2xl border border-white/10 bg-white/[0.025] p-5">
					<p class="text-sm font-bold text-white">سایت شما نیاز به بررسی دارد؟</p>
					<p class="mt-2 text-xs leading-6 text-neutral-400">
						آدرس سایت و توضیح مشکل یا نیاز خود را در فرم زیر ارسال کنید.
					</p>
					<a href="#support-inquiry" class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-amber-400 transition hover:text-amber-300">
						<span>ثبت درخواست پشتیبانی</span>
						<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-6-6 6 6 6-6" />
						</svg>
					</a>
				</div>
			</div>
		</div>

		<!-- Left Column (RTL): Accordion List -->
		<div class="lg:col-span-8">
			<div class="space-y-3">
				<?php
				$faq_index = 0;
				foreach ( $faqs as $question => $answer ) :
					$num_label = isset( $faq_numbers[ $faq_index ] ) ? $faq_numbers[ $faq_index ] : (string) ( $faq_index + 1 );
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
							<p class="text-sm leading-8 text-neutral-300">
								<?php echo esc_html( $answer ); ?>
							</p>
						</div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<script type="application/ld+json">
<?php
$schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array(),
);
foreach ( $faqs as $question => $answer ) {
	$schema['mainEntity'][] = array(
		'@type'          => 'Question',
		'name'           => $question,
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => $answer,
		),
	);
}
echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
?>
</script>